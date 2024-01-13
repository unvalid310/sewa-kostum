<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'id_products';
    protected $keyType = 'int';
    protected $fillable = [
        'id_products',
        'name',
        'id_categories',
        'stock',
        'discount',
        'price',
        'old_price',
        'description',
        'variant',
        'size',
        'image',
        'status',
    ];
    public $timestamps = false;

    public function getAll($where = []) {
        $product = DB::table('products')
        ->select(
                DB::raw(
                    'products.id_products, products.name, products.description, products.id_categories, categories.category, categories.slug,
                    products.stock, products.discount, products.old_price, products.price, products.variant, products.size, products.image,
                    products.status'
                )
            )
        ->leftJoin('categories', 'products.id_categories', '=', 'categories.id');

        if (!empty($where)) {
            # code...
            $product->where($where);
        }

        $product->orderby('products.id_products', 'desc');

        return $product->get();
    }

    public function getPaginate($where = [], $paginate = 0) {
        $product = DB::table('products')
        ->select(
                DB::raw(
                    'products.id_products, products.name, products.description, products.id_categories, categories.category, categories.slug,
                    products.stock, products.discount, products.old_price, products.price, products.variant, products.size, products.image,
                    products.status'
                )
            )
        ->leftJoin('categories', 'products.id_categories', '=', 'categories.id');

        if (!empty($where)) {
            # code...
            $product->where($where);
        }

        $product->orderby('products.id_products', 'desc');

        if ($paginate) {
            # code...
            return $product->simplePaginate($paginate);
        } else {
            return $product->get();
        }
    }
}
