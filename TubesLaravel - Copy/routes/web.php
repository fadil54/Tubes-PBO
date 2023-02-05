<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupermarketController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CashierController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    Auth::logout();
    return view('index');
});

Route::get("/signUp", [UserController::class, "showSignUp"])->middleware("guest");
Route::post("/signUp", [UserController::class, "signUp"]);

Route::get("/companySignIn", [UserController::class, "showSignIn"])->middleware("guest");
Route::post("/companySignIn", [UserController::class, "signIn"]);

// Route::get("/goods", [UserController::class, "goods"]);
// Route::post("/goods", [UserController::class, "addBarang"]);
// Route::post("/goods-update", [UserController::class, "updateBarang"]);
// Route::post("/goods-delete", [UserController::class, "deleteBarang"]);

// Route::get("/history", [UserController::class, "history"]);

// Route::get("/settings", [UserController::class, "settings"]);
// Route::post("/settings-create", [UserController::class, "addKasir"]);
// Route::post("/settings-update-supermarket", [UserController::class, "updateSupermarket"]);
// Route::post("/settings-update-cashier", [UserController::class, "updateKasir"]);

Route::get("/cashierSignIn", [CashierController::class, "showSignIn"])->middleware("guest");
Route::post("/cashierSignIn", [CashierController::class, "signIn"]);



Route::group(["middleware" => ["auth", "ceklevel:supermarket"]], function(){
    Route::get("/goods", [SupermarketController::class, "goods"]);
    Route::post("/goods", [SupermarketController::class, "addBarang"]);
    Route::post("/goods-update", [SupermarketController::class, "updateBarang"]);
    Route::post("/goods-delete", [SupermarketController::class, "deleteBarang"]);

    Route::get("/settings", [SupermarketController::class, "settings"]);
    Route::post("/settings-create", [SupermarketController::class, "addKasir"]);
    Route::post("/settings-update-supermarket", [SupermarketController::class, "updateSupermarket"]);
    Route::post("/settings-update-cashier", [SupermarketController::class, "updateKasir"]);

    Route::get("/companyHistory", [SupermarketController::class, "history"]);
});

Route::group(["middleware" => ["auth", "ceklevel:kasir"]], function(){
    Route::get("/order", [CashierController::class, "order"]);
    Route::post("/order", [CashierController::class, "addTransaksi"]);

    Route::get("/cashierHistory", [CashierController::class, "history"]);
});
