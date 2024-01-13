<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart';
    protected $primaryKey = 'id_cart';
    protected $keyType = 'int';
    protected $fillable = [
        'id_products',
        'id_user',
        'qty',
        'variant',
        'size',
    ];
    public $timestamps = false;

    public function getAll($where = []) {
        $product = DB::table('cart')
        ->select(
                DB::raw(
                    'cart.id_cart, cart.id_products, products.id_products, products.name, products.description, products.id_categories, categories.category, categories.slug,
                    products.stock, products.discount, products.old_price, products.price, products.variant, products.size, products.image,
                    products.status, cart.qty, cart.variant, cart.size'
                )
            )
        ->leftJoin('products', 'cart.id_products', '=', 'products.id_products')
        ->leftJoin('categories', 'products.id_categories', '=', 'categories.id');

        if (!empty($where)) {
            # code...
            $product->where($where);
        }

        $product->orderby('cart.id_cart', 'desc');

        return $product->get();
    }
}
