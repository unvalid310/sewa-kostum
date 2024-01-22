<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transaction';
    protected $primaryKey = 'id_transaction';
    protected $keyType = 'int';
    protected $fillable = [
        'id_transaction',
        'id_user',
        'invoice',
        'order_date',
        'qty',
        'total',
        'shipping_address',
        'id_card',
        'id_payment',
        'va_number',
        'pdf_url',
        'snap_token',
        'status',
        'payment_date',
        'length_rent',
        'return_date',
    ];
    public $timestamps = false;

    public function getAll($where = []) {
        $product = DB::table('transaction')
        ->select(
                DB::raw(
                    'transaction.id_transaction, transaction.id_user, users.name, users.email, users.no_hp, transaction.invoice, transaction.order_date, transaction.qty, transaction.total,
                    transaction.shipping_address, transaction.id_card, transaction.id_payment, payment_method.label, transaction.va_number, transaction.pdf_url, transaction.snap_token,
                    transaction.status, transaction.payment_date, transaction.length_rent, transaction.return_date'
                )
            )
        ->leftJoin('users', 'transaction.id_user', '=', 'users.id')
        ->leftJoin('payment_method', 'transaction.id_payment', '=', 'payment_method.id_payment');

        if (!empty($where)) {
            # code...
            $product->where($where);
        }

        $product->orderby('transaction.id_transaction', 'desc');

        return $product->get();
    }
}
