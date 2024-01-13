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
        'snap_token',
        'status',
        'payment_date'
    ];
    public $timestamps = false;
}
