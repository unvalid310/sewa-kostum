<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;

class ProductController extends Controller
{
    //
    public function index(Request $request) {
        $productModel = new Products();

        $where = ['products.status' => 'publish'];
        $categories = $request->kategori;
        if($categories) {
            $where['products.id_categories'] = $categories;
        }
        $product = $productModel->getPaginate($where, 16);

        return view('default.pages.product')->with(['products' => $product]);
    }

    public function get($idProduct) {
        $productModel = new Products();
        $product = $productModel->getAll(['products.id_products' => $idProduct]);

        return view('default.pages.detail_product')->with(['products' => $product]);
    }

    public function detail(Request $request) {
        $productModel = new Products();
        $idProduct = $request->idProduct;
        $product = $productModel->getAll(['products.id_products' => $idProduct]);

        return view('default.components.modal_product')->with(['products' => $product]);
    }
}
