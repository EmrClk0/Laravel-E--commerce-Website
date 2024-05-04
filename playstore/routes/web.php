<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ECommerController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\AdminController;

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

Route::get('/',[ECommerController::class,"showHomePage"])->name("homePage");;

Route::get('/category/{categoryName}', [ECommerController::class,"showCategoryPage"])->name("categoryPage");

// session('suer) yoksa yapamaz logine eyönlendir hata ile girşi yap
Route::middleware("userCheck2")->get("/basket",[ECommerController::class,"showBasketPage"])->name("basketPage");


//session("user") varsa giremez
Route::middleware("userCheck")->get('/login', [ECommerController::class,"showLoginPage"])->name("loginPage");
// login varsa giremez
Route::middleware("userCheck")->get('/register',[ECommerController::class,"showRegisterPage"])->name("registerPage");

Route::middleware("userCheck2")->get("/userLogout",[ECommerController::class,"userLogout"])->name("userLogout");

Route::post("/registerAuthenication",[AuthenticationController::class,"validateRegister"])->name("registerAuthenication");
Route::post("/loginAuthenication",[AuthenticationController::class,"validateLogin"])->name("loginAuthenication");


// session('suer) yoksa yapamaz logine eyönlendir hata ile girşi yap
//Route::middleware("userCheck2")->middleware("stockCheck")->get("/addBasket/{gameId}",[BasketController::class,"addBasket"])->name("addBasket");
// session('suer) yoksa yapamaz logine eyönlendir hata ile girşi yap
//Route::middleware("userCheck2")->get("/basket",[BasketController::class,"showBasketPage"])->name("basketPage");

//Route::get("/removeProduct/{basketProductId}",[BasketController::class,"removeProduct"])->name("removeProduct");


Route::middleware("userCheck2")->prefix("/basket")->group(function(){
    Route::get("/",[BasketController::class,"showBasketPage"])->name("basketPage");
    Route::middleware("stockCheck")->get("/addGame/{gameId}",[BasketController::class,"addBasket"])->name("addBasket");
    //middleware ekle
    Route::get("/removeProduct/{basketProductId}",[BasketController::class,"removeProduct"])->name("removeProduct");
    Route::get("/decreasePiece/{basketProductId}",[BasketController::class,"decreasePiece"])->name("decreasePiece");
    Route::get("/increasePiece/{basketProductId}",[BasketController::class,"increasePiece"])->name("increasePiece");
    Route::post("/checkout",[BasketController::class,"checkout"])->name("checkout");
}); 



Route::prefix("/admin")->group(function(){
    Route::redirect("/","admin/gameData");
    Route::get("/gameData",[AdminController::class,"gameData"])->name("gameData");

    Route::get("/addGame",[AdminController::class,"showAddGame"])->name("showAddGame");
    Route::post("/addGameProccess",[AdminController::class,"addGameProccess"])->name("addGameProccess");

    Route::get("addGameKey/{gameId?}",[AdminController::class,"showAddGameKey"])->name("showAddGameKey");
    Route::post("addGameKeyProccess",[AdminController::class,"addGameKeyProccess"])->name("addGameKeyProccess");
    

    Route::get("/gameCategory/{gameId?}",[AdminController::class,"showGameCategory"])->name("showGameCategory");
    Route::post("/gameCategoryProccess",[AdminController::class,"gameCategoryProccess"])->name("gameCategoryProccess");

});
/*
Route::fallback(function(){
    return view("404");
});*/