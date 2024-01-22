<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Transaction;
use App\Models\DetailTransaction;
use App\Models\ReturnTransaction;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class ReturnController extends Controller
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;
    use HasRoles;
    //
    public function index() {
        $transaction = ReturnTransaction::getAll();

        if(Auth::user()->hasRole('customer'))
            return redirect()->to('/');
        return view('admin.pages.pengembalian.admin_daftar_pengembalian')->with(['transactions' => $transaction]);
    }

    public function add() {
        $transaction = ReturnTransaction::getTransactionList();
        // return response()->json($transaction, 200);

        if(Auth::user()->hasRole('customer'))
            return redirect()->to('/');
        return view('admin.pages.pengembalian.admin_tambah_pengembalian')->with(['transaction' => $transaction]);
    }

    public function transaction(Request $request) {
        $idTransaction = $request->id;
        $transaction = Transaction::where('id_transaction', $idTransaction)->first();

        if($transaction){
            return response()->json([
                    'success' => true,
                    'message' => 'Data berhasil ditampilkan',
                    'data' => $transaction
                ],
                200
            );
        } else {
            return response()->json([
                    'success' => false,
                    'message' => 'Data transaksi tidak ada',
                    'data' => []
                ],
                200
            );
        }
    }

    public function post(Request $request) {
        $idTransaction = $request->id_transaction;
        $data = [
            'return_invoice' => rand(),
            'id_transaction' => $idTransaction,
            'return_date' => date('Y-m-d h:i:s'),
            'late' => $request->late,
            'late_fee' => $request->late_fee
        ];

        $save = ReturnTransaction::insert($data);
        if ($save) {
            # code...
            $detailTransaction = DetailTransaction::where('id_transaction', $idTransaction)->get();
            foreach ($detailTransaction as $key => $value) {
                # code...
                $product = Products::where('id_products', $value->id_products)->first();
                $currStok = $product->stock;
                Products::where('id_products', $value->id_products)->update(['stock' => $currStok+$value->qty]);
            }
        }
        return redirect()->to('/pengembalian');
    }

    public function delete(Request $request) {
        $id = $request->id;

        $transaction = ReturnTransaction::where('id_return', $id)->first();
        $delete = ReturnTransaction::where('id_return', $id)->delete();

        if($delete) {
            $detailTransaction = DetailTransaction::where('id_transaction', $transaction->id_transaction)->get();
            foreach ($detailTransaction as $key => $value) {
                # code...
                $product = Products::where('id_products', $value->id_products)->first();
                $currStok = $product->stock;
                Products::where('id_products', $value->id_products)->update(['stock' => $currStok-$value->qty]);
            }
            return response()->json(
                ['success' => true, 'message' => 'Data berhasil dihapus'],
                200
            );
        } else {
            return response()->json(
                ['success' => false, 'message' => 'Data gagal dihapus'],
                200
            );
        }
    }
}
