<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class AdminProductController extends Controller
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;
    use HasRoles;
    //
    public function index() {
        $productModel = new Products();
        $product = $productModel->getAll();

        if(Auth::user()->hasRole('customer'))
            return redirect()->to('/');

        return view('admin.pages.produk.admin_daftar_produk')->with(['products' => $product]);
    }

    public function update($idProduct) {
        $categories = Categories::get();
        $productModel = new Products();
        $product = $productModel->getAll(['id_products' => $idProduct]);

        if(count($product)) {
            foreach ($product as $key => $selectedProduct);
            return view('admin.pages.produk.admin_edit_produk')->with(['product' => $selectedProduct, 'categories' => $categories]);
        }

        if(Auth::user()->hasRole('customer'))
            return redirect()->to('/');

        return redirect()->intended('/admin-produk');
    }

    public function put(Request $request) {
        $idProducts = $request->id_products;
        $path = 'default/assets/uploads';

        $data = [
            'name' => $request->name,
            'stock' => $request->stock,
            'price' => $request->price,
            'discount' => $request->discount,
            'old_price' => $request->old_price,
            'id_categories' => $request->categories,
            'variant' => $request->variant,
            'size' => $request->size,
            'description' => $request->description,
            'status' => $request->status,
        ];

        $file = $request->file;
        if($file) {
            $filename = time()."_.".$file->getClientOriginalExtension();
            $file->move($path, $filename);
            $data['image'] = $path.'/'.$filename;
        }

        $update = Products::where('id_products', $idProducts)->update($data);

        if($update) {
            return redirect()->intended('/admin-produk');
        }

        return back()->with('productUpdateError', '<strong>Update gagal,</strong> terjadi kesalahan dalam melakukan penyimpanan data!');
    }

    public function create() {
        $categories = Categories::get();

        if(Auth::user()->hasRole('customer'))
            return redirect()->to('/');
        return view('admin.pages.produk.admin_tambah_produk')->with(['categories' => $categories]);
    }

    public function add(Request $request) {
        $path = 'default/assets/uploads';
        $data = [
            'name' => $request->name,
            'stock' => $request->stock,
            'price' => $request->price,
            'discount' => $request->discount,
            'old_price' => $request->old_price,
            'id_categories' => $request->categories,
            'variant' => $request->variant,
            'size' => $request->size,
            'description' => $request->description,
            'status' => $request->status,
        ];

        $file = $request->file;
        $filename = time()."_.".$file->getClientOriginalExtension();
        $file->move($path, $filename);
        $data['image'] = $path.'/'.$filename;

        $save = Products::insert($data);

        if($save) {
            return redirect()->intended('/admin-produk');
        }

        return back()->with('productAddError', '<strong>Gagal menyimpan,</strong> terjadi kesalahan dalam melakukan penyimpanan data!');
    }

    public function delete(Request $request) {
        $id = $request->id;

        $delete = Products::where('id_products', $id)->delete();

        if($delete) {
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
