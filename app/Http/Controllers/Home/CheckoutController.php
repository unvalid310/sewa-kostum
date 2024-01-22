<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Products;
use App\Models\Transaction;
use App\Models\DetailTransaction;
use App\Models\PaymentMethod;
use App\Services\Midtrans\CreateSnapTokenService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class CheckoutController extends Controller
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;
    use HasRoles;
    //
    public function checkout(Request $request) {
        $transactionModel = new Transaction();

        $error = [];
        $total = 0;
        $qty = 0;

        $idUser = $request->session()->get('userId');
        $data = \json_decode($request->getContent(), true);
        $idPayment = $data['payment'];
        foreach ($data['cart'] as $key => $value) {
            # code...
            $cart = $data['cart'][$key];
            $product = Products::where('id_products', $cart['id_products'])->first();
            if($cart['qty'] > $product->stock) {
                array_push($error, '<b>'.$product->name.'</b> stok <b>habis</b>');
            }
            $qty = $qty + $cart['qty'];
            $total = $total + ($cart['qty'] * $cart['price'] + 7 * 50000);
        }

        if($error) {
            return response()->json([
                'success' => false,
                'message' => $error,
                'data'  => []
            ], 200);
        } else {
            $transactionModel->id_user = $idUser;
            $transactionModel->invoice = rand();
            $transactionModel->total = $total;
            $transactionModel->qty = $qty;
            $transactionModel->id_payment =$idPayment;

            $transactionModel->save();
            $idTransaction = $transactionModel->id_transaction;

            if($idTransaction) {
                foreach ($data['cart'] as $key => $value) {
                    # code...
                    $cart = $data['cart'][$key];
                    $detailTransactionModel = new DetailTransaction();
                    $product = Products::where('id_products', $cart['id_products'])->first();
                    $detailTransactionModel->id_transaction = $idTransaction;
                    $detailTransactionModel->id_products = $cart['id_products'];
                    $detailTransactionModel->name = $product->name;
                    $detailTransactionModel->variant = $cart['variant'];
                    $detailTransactionModel->size = $cart['size'];
                    $detailTransactionModel->qty = $cart['qty'];
                    $detailTransactionModel->price = $cart['price'];

                    $detailTransactionModel->save();
                }

                $transaction = Transaction::where('id_transaction', $idTransaction)->first();
                $detailTransaction = DetailTransaction::where('id_transaction', $idTransaction)->get();

                $snapToken = $transaction->snap_token;
                if (is_null($snapToken)) {
                    $midtrans = new CreateSnapTokenService($transaction, $detailTransaction, $transaction->id_payment);
                    $snapToken = $midtrans->getSnapToken();

                    Transaction::where('id_transaction', $idTransaction)->update(['snap_token' => $snapToken]);
                }

                $cart = Cart::where('id_user', $idUser)->delete();
                $request->session()->put(['count_cart' => count(Cart::where('id_user', $idUser)->get())]);

                return response()->json([
                    'success' => true,
                    'message' => 'Berhasil checkout.',
                    'data'  => [
                        'id' => $idTransaction,
                    ]
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => ['Gagal menyimpan transaksi.'],
                    'data'  => []
                ], 200);
            }
        }
    }

    public function payment(Request $request) {
        $idTransaction = $request->id;
        $idUser = $request->session()->get('userId');
        $transaction = Transaction::where(['id_transaction' => $idTransaction])->first();
        $detailTransaaction = DetailTransaction::where(['id_transaction' => $idTransaction])->get();

        if(Auth::user()->hasRole('admin'))
            return redirect()->to('/dashboard');

        if($transaction) {
            $payment = PaymentMethod::where(['id_payment' => $transaction->id_payment])->first();
            if(!empty($transaction->id_card) && !empty($transaction->shipping_address) && !empty($transaction->length_rent)) {
                return redirect()->to('/order?id='. $idTransaction);
            } else {
                return view('default.pages.payment')
                ->with([
                    'transaction' => $transaction,
                    'cart' => $detailTransaaction,
                    'payment' => $payment,
                    'snap_token' => $transaction->snap_token
                ]);
            }
        } else {
            return redirect()->to('/');
        }
    }

    public function order(Request $request) {
        $idTransaction = $request->id;
        $idUser = $request->session()->get('userId');
        $detailTransaaction = DetailTransaction::where(['id_transaction' => $idTransaction])->get();
        $transaction = Transaction::getAll(['id_transaction' => $idTransaction]);
        foreach ($transaction as $key => $value)

        if(Auth::user()->hasRole('admin'))
            return redirect()->to('/dashboard');

        return view('default.pages.order')
            ->with([
                'transactions' => $transaction,
                'cart' => $detailTransaaction,
            ]);
    }

    public function add_payment(Request $request) {
        $path = 'default/assets/uploads';

        $message = 'Pesanan berhasil diproses, diharapkan segera melakukan pembayaran';
        $idTransaction = $request->id;
        $status = $request->status;
        $length_rent = $request->length_rent;
        $shippingAddress = $request->shipping_address;
        $va_number = $request->va_number;
        $pdf_url = $request->pdf_url;
        $idUser = $request->session()->get('userId');
        $file = $request->file('file');

        $transaction = Transaction::where('id_transaction', $idTransaction)->first();

        $updatePayment = [
            'status' => $status,
            'shipping_address' => $shippingAddress,
            'va_number' => $va_number,
            'length_rent' => $length_rent,
            'pdf_url' => $pdf_url,
        ];

        if($status == 2) {
            $updatePayment['payment_date'] = date('y-m-d');
            $message = 'Pesanan berhasil dibayar';
        }

        if($file) {
            $filename = time()."_.".$file->getClientOriginalExtension();
            $file->move($path, $filename);
            $updatePayment['id_card'] = $path.'/'.$filename;
        }

        $transaction = Transaction::where(['id_transaction' => $idTransaction])->update($updatePayment);
        $detailTransaaction = DetailTransaction::where(['id_transaction' => $idTransaction])->get();
        foreach ($detailTransaaction as $key => $value) {
            # code...
            $product = Products::where('id_products', $value['id_products'])->first();
            Products::where('id_products', $value['id_products'])->update(['stock' => $product->stock - $value->qty]);
        }

        return response()->json([
            'success' => true,
            'message' => $message,
            'data'  => []
        ], 200);
    }
}
