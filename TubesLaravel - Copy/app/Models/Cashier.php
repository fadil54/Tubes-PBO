<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Supermarket;
use App\Models\user;
class Cashier extends Model
{
    protected $fillable = [
        // "username",
        // "password",
        "id_supermarket",
        "id_kasir"
    ];
    use HasFactory;
    public function supermarket(){
        return $this->hasOne(Supermarket::class, "id_supermarket", "id_supermarket");
    }
    public function user(){
        return $this->belongsTo(User::class, "id_kasir", "id");
    }
}
