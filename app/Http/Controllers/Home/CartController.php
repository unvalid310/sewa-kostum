<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Cart;
use App\Models\PaymentMethod;

class CartController extends Controller
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;
    use HasRoles;
    //

    public function index(Request $request) {
        $cartModel = new Cart();

        $idUser = $request->session()->get('userId');
        $data = $cartModel->getAll(['cart.id_user' => $idUser]);
        $paymentMethod = PaymentMethod::get();

        if(Auth::user()->hasRole('admin'))
            return redirect()->to('/dashboard');
        else
            return view('default.pages.cart')->with(['cart' => $data, 'payment_method' => $paymentMethod]);
    }

    public function addCart(Request $request) {
        $cartModel = new Cart();

        $idUser = $request->session()->get('userId');
        $idProducts = $request->idProducts;
        $qty = ($request->qty) ? $request->qty : 1;
        $variant = ($request->variant) ?$request->variant : '';
        $size = ($request->size) ?$request->size : '';

        $where = [
            'cart.id_user' => $idUser,
            'cart.id_products' => $idProducts,
        ];

        if(!empty($variant)) $where['cart.variant'] = $variant;
        if(!empty($size)) $where['cart.size'] = $size;

        $data = $cartModel->getAll($where);

        if(count($data)) {
            return response()
                ->json(
                    [
                        'success' => false,
                        'message' => 'Produk sudah ada dikeranjang, silahkan masuk ke keranjang untuk melihat varian / ukuran yang sudah dipesan!',
                        'data' => [
                            'cart_count' => count($cartModel->getAll(['cart.id_user' => $idUser])),
                        ]
                    ],
                    200
                );
        } else {
            $cartModel->id_user = $idUser;
            $cartModel->id_products = $idProducts;
            $cartModel->qty = $qty;

            if(!empty($variant)) $cartModel->variant = $variant;
            if(!empty($size)) $cartModel->size = $size;

            $save = $cartModel->save();
            if($save) {
                $request->session()->put('count_cart', count($cartModel->getAll(['cart.id_user' => $idUser])));
                return response()
                ->json(
                    [
                        'success' => true,
                        'message' => 'Produk berhasil ditamhakan kedalam keranjang!',
                        'data' => [
                            'cart_count' => count($cartModel->getAll(['cart.id_user' => $idUser])),
                        ]
                    ],
                    200
                );
            } else {
                return response()
                ->json(
                    [
                        'success' => false,
                        'message' => 'Gagal menambahkan keranjang!',
                        'data' => [
                            'cart_count' => count($cartModel->getAll(['cart.id_user' => $idUser])),
                        ]
                    ],
                    200
                );
            }
        }
    }

    public function updateCart(Request $request) {
        $data = json_decode($request->getContent(), true);
        for ($i=0; $i < count($data); $i++) {
            # code...
            Cart::where('id_cart', $data[$i]['id_cart'])->update(['qty' => $data[$i]['qty']]);
        }

        return response()
            ->json(
                ['success' => true],
                200
            );
    }

    public function delete(Request $request) {
        $idCart = $request->id;
        $delete = Cart::where('id_cart', $idCart)->delete();
        if($delete) {
            return response()->json(
                [
                    "success" => true,
                    "message" => "Produk berhasil dihapus!"
                ],
                200
            );
        } else {
            return response()->json(
                [
                    "success" => false,
                    "message" => "Produk gagal dihapus!"
                ],
                200
            );
        }
    }
}
