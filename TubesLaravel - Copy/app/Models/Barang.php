<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_barang',
        'stok',
        'harga_barang',
        'discount',
        'id_supermarket',
        "id_kasir"
    ];
    public function barang(){
        return $this->hasMany(Barang::class, "id_barang");
    }
}
