<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $primaryKey = 'id_categories';
    protected $keyType = 'int';
    protected $fillable = [
        'id_categories',
        'category',
        'slug'
    ];
    public $timestamps = false;
}
