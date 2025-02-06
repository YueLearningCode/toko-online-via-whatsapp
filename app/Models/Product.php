<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products'; // Nama tabel di database

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'image'
        // Tambahkan kolom lain sesuai kebutuhan
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
