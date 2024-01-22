<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ReturnTransaction extends Model
{
    use HasFactory;

    protected $table = 'return_transaction';
    protected $primaryKey = 'id_transaction';
    protected $keyType = 'int';
    protected $fillable = [
        'id_transaction',
        'return_invoice',
        'return_date',
        'late',
        'late_fee',
    ];
    public $timestamps = false;

    public function getAll($where = []) {
        $product = DB::table('return_transaction')
        ->select(
                DB::raw(
                    'return_transaction.id_return, return_transaction.return_invoice, return_transaction.return_date, return_transaction.late, return_transaction.late_fee,
                    transaction.id_transaction, transaction.id_user, users.name, users.email, users.no_hp, transaction.invoice, transaction.order_date, transaction.qty, transaction.total,
                    transaction.shipping_address, transaction.id_card, transaction.id_payment, payment_method.label, transaction.va_number, transaction.pdf_url, transaction.snap_token,
                    transaction.status, transaction.payment_date, transaction.length_rent'
                )
            )
        ->leftJoin('transaction', 'return_transaction.id_transaction', '=', 'transaction.id_transaction')
        ->leftJoin('users', 'transaction.id_user', '=', 'users.id')
        ->leftJoin('payment_method', 'transaction.id_payment', '=', 'payment_method.id_payment');

        if (!empty($where)) {
            # code...
            $product->where($where);
        }

        $product->orderby('return_transaction.id_return', 'desc');

        return $product->get();
    }

    public function getTransactionList() {
        $product = DB::table('transaction')
        ->select(
            DB::raw('transaction.*, users.name')
            )
        ->leftJoin('users', 'transaction.id_user', '=', 'users.id')
        ->where('transaction.status', '2')
        ->whereNotIn('transaction.id_transaction', DB::table('return_transaction')->select('id_transaction'))
        ->orderby('transaction.id_transaction', 'desc');

        return $product->get();
    }
}
