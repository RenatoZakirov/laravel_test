<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // какие поля можно заполнять
    protected $fillable = [
        'name',
        'price',
        'count',
    ];
}
