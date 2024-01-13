<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetailTransaction extends Model
{
    use HasFactory;

    protected $table = 'detail_transaction';
    protected $fillable = [
        'id_transaction',
        'id_products',
        'name',
        'variant',
        'size',
        'qty',
        'price',
    ];
    public $timestamps = false;
}
