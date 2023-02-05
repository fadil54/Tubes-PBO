<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        "id_kasir",
        "id_supermarket",
        "quantity",
        // "nominal_bayar",
        // "kembalian",
        "total"
    ];       
    use HasFactory;
}
