<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cashier;
use Illuminate\Support\Facades\Hash;

class SupermarketController extends Controller
{
    public  function showSignUp(){
        return view("signUp");
    }
    public function signUp(Request $request){
        $isRegistered = User::all()->firstWhere("username", $request->input("inputUsername"));
        $validatedData = $request->validate([
            "inputUsername" => "required|min:3",
            "inputNamaSupermarket" => "required|min:3",
            "inputPassword" => "required|min:8",
            "inputConfirmPass" => "required|same:inputPassword|min:8"
        ]);
        if($isRegistered === null){
            User::create([
                "nama_supermarket" => $request->input("inputNamaSupermarket"),
                "username" => $request->input("inputUsername"),
                "password" => bcrypt($request->input("inputPassword"))
            ]);
            $request->session()->flash("succes", "Registration Succesfull!");
        }else{
            $request->session()->flash("failed", "Username is Used");
            return redirect("signUp");
        }
        
        return redirect("companySignIn");
    }
    public  function showSignIn(){
        return view("companySignIn");
    }
    public  function signIn(Request $request){ 
        $validatedData = $request->validate([
            "inputUsername" => "required|min:3",
            "inputPassword" => "required|min:8",
        ]);
        if(Auth::attempt([
            "username" => $request->input("inputUsername"),
            "password" => $request->input("inputPassword")
        ])){
            $request->session()->regenerate();
            return redirect()->intended("goods");
        }
        $request->session()->flash("failed", "Login Failed!");
        return back();
        // return back()->withErrors([
        //     "failed" => "Login Failed!"
        // ]) redirect("companySignIn");
        // if(Supermarket::all()->contains("username",$inputUsername) && Supermarket::all()->contains("password",$inputPassword)){
        //     return redirect("goods");
        // }
    }
    public function addBarang(Request $request){
        $validatedData = $request->validate([
            "inputNamaBarang" => "required",
            "inputHargaBarang" => "required|numeric",
            "inputStokBarang" => "required|numeric",
            "inputDiscount" => "required|numeric",
        ]);
        if(Auth::user()->kasir == null){
            $request->session()->flash("failed", "Akun kasir belum dibuat");
        }else{
            Barang::create([
                "nama_barang" => $request->input("inputNamaBarang"),
                "stok" => $request->input("inputStokBarang"),
                "harga_barang" => $request->input("inputHargaBarang"),
                "discount" => $request->input("inputDiscount"),
                "id_supermarket" => Auth::user()->id,
                "id_kasir" => Auth::user()->kasir->id_kasir,
            ]);
            $request->session()->flash("succes", "Berhasil ditambahkan");
        }
        return redirect("goods");
    }
    public function updateBarang(Request $request){
        $validatedData = $request->validate([
            "inputNamaBarang" => "required",
            "inputHargaBarang" => "required|numeric",
            "inputStokBarang" => "required|numeric",
            "inputDiscount" => "required|numeric",
        ]);
        if(Auth::user()->kasir == null){
            $request->session()->flash("failed", "Akun kasir belum dibuat");
        }else{
            Barang::find($request->input("inputIdBarang"))->update([
                "nama_barang" => $request->input("inputNamaBarang"),
                "stok" => $request->input("inputStokBarang"),
                "harga_barang" => $request->input("inputHargaBarang"),
                "discount" => $request->input("inputDiscount"),
                "id_supermarket" => Auth::user()->id,
                "id_kasir" => Auth::user()->kasir->id_kasir
            ]);
            $request->session()->flash("succes", "Berhasil diupdate");
        }
        return redirect("goods");
    }
    public function deleteBarang(Request $request){
        if(Auth::user()->kasir == null){
            $request->session()->flash("failed", "Akun kasir belum dibuat");
        }else{
            Barang::find($request->input("inputIdBarang"))->delete();
            $request->session()->flash("succes", "Berhasil dihapus");
        }
        return redirect("goods");
    }
    public function addKasir(Request $request){
        $isRegistered = Cashier::all()->firstWhere("username", $request->input("inputUsername"));
        $validatedData = $request->validate([
            "inputUsername" => "required | min:3",
            "inputPassword" => "required|min:8",
        ]);
        if($isRegistered === null){
            User::create([
                "role" => "kasir",
                "username" => $request->input("inputUsername"),
                "password" => bcrypt($request->input("inputPassword"))
            ]);
            Cashier::create([
                "id_supermarket" => Auth::user()->id,
                "id_kasir" => User::all()->firstWhere("username", $request->input("inputUsername"))->id,
            ]);
            $request->session()->flash("succes", "Berhasil");
        }else{
            $request->session()->flash("failed", "Username is used");
        }    
        return redirect("settings");
    }
    public function updateKasir(Request $request){
        $validatedData = $request->validate([
            "inputUsername" => "required | min:3",
            "inputPassword" => "required|min:8",
        ]);
        Auth::user()->kasir->user->update([
            "username" => $request->input("inputUsername"),
            "password" => bcrypt($request->input("inputPassword")),
            "id_supermarket" => Auth::user()->id
        ]);
        $request->session()->flash("succes", "Berhasil");  
        return redirect("settings");
    }
    public function updateSupermarket(Request $request){
        $validatedData = $request->validate([
            "inputUsername" => "required|min:3",
            "inputNewPassword" => "required|min:8",
        ]);
        if(Auth::user()->username === $request->input("inputUsername")){
            Auth::user()->update([
                "nama_supermarket" => Auth::user()->nama_supermarket,
                "username" => Auth::user()->username,
                "password" => Hash::make($request->input("inputNewPassword"))
            ]);
            $request->session()->flash("succes", "Berhasil");  
        }else{
            $request->session()->flash("failed", "Username salah");  
        }
        return redirect("settings");
    }
    public function goods(){
        return view("goods",[
            "user" => Auth::user(),
        ]);
    }
    public function history(){
        return view("companyHistory",[
            "user" => Auth::user(),
        ]);
    }
    public function settings(){
        return view("settings");
    }
}


