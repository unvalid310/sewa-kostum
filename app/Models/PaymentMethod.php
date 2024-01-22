<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $table = 'payment_method';
    protected $primaryKey = 'id_payment';
    protected $keyType = 'string';
    protected $fillable = [
        'label',
        'bank',
        'va_number',
    ];
    public $timestamps = false;
}
