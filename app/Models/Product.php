<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Table name (if not 'products')
    protected $table = 'products';

    // Mass assignable attributes
    protected $fillable = [
        'nom',
        'description',
        'prix',
    ];
}
