<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Barang;
use App\Models\Cashier;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role',
        'username',
        // 'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function barangs(){
        if(Auth::user()->role === "supermarket"){
            return $this->hasMany(Barang::class, "id_supermarket");
        } 
        if(Auth::user()->role === "kasir"){
            return $this->hasMany(Barang::class, "id_kasir");
        } 
    }
    public function supermarket(){
        return $this->hasOne(Cashier::class, "id_supermarket", "id_supermarket");
    }
    public function kasir(){
        return $this->belongsTo(Cashier::class,"id", "id_supermarket");
    }
    public function transaksis(){
        if(Auth::user()->role === "supermarket"){
            return $this->hasMany(Transaksi::class,"id_supermarket");
        } 
        if(Auth::user()->role === "kasir"){
            return $this->hasMany(Transaksi::class,"id_kasir");
        } 
        
    }
}
