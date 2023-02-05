<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Cashier;
use Carbon\Carbon;
class CashierController extends Controller
{
    public function showSignIn(Request $request){
        return view("cashierSignIn");
    }
    public function signIn(Request $request){
        $validateData = $request->validate([
            "inputUsername" => "required | min:3",
            "inputPassword" => "required | min:8",
        ]);
        if(Auth::attempt([
           "username" => $request->input("inputUsername"),
           "password" => $request->input("inputPassword"),
        ])){
            return redirect("order");
        }
        $request->session()->flash("failed", "Gagal login");
        return redirect("cashierSignIn");
    }
    public function order(){
        return view("order",[
            "user" => Auth::user(),
        ]);
    }
    public function addTransaksi(Request $request){
        $supermarket = Cashier::all()->firstWhere("id_kasir", Auth::user()->id)->supermarket;
        // dd($request->input("inputNominal"));
        Transaksi::create([
            "id_kasir" => Auth::user()->id,
            "id_supermarket" => $supermarket->id_supermarket,
            "quantity" => $request->input("inputQuantity"),
            // "nominal_bayar" => $request->input("inputNominal"),
            // "kembalian" => $request->input("inputKembalian"),
            "total" => $request->input("inputTotal"),
        ]);
        session()->flash("succes","Transaksi Berhasil");
        return redirect("order");
    }
    public function history(){
        return view("cashierHistory",[
            "user" => Auth::user(),
        ]);
    }
}
