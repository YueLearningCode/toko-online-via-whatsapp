<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

   // Masukkan nama tabel di model
   protected $table = 'keranjang'; // dengan nama tabel di database Anda

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'price',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    
    /**
     * Relasi ke User.
     * 
     * Keranjang milik satu pengguna.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
    
}
