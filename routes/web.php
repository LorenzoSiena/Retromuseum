<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShipController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');



Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'checkLogin']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');






Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::get('/register/email/{query}', [RegisterController::class, 'checkEmail']);
Route::get('register/username/{q}', [RegisterController::class, 'checkUsername']);


Route::get('/spot', [HomeController::class, 'fetchPodcast']); //ritorna i podcast in json
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/aboutUs', [HomeController::class, 'aboutus'])->name('aboutus');

//UNICO ROUTE PER I RISULTATI DELLA RICERCA
Route::get('/results', [ProductController::class, 'index'])->name('search');


//MOSTRA LA PAGINA DEL CARRELLO(con i prodotti)
Route::get('/cart', [ShopController::class, 'cart'])->name('cart');

Route::get('add-to-cart/{id}', [ShopController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [ShopController::class, 'update']);
Route::post('remove-from-cart', [ShopController::class, 'remove']);

//svuota il carrello e ritorna alla welcome page (GET)
Route::get('clear', [ShopController::class, 'clearAllCart'])->name('clear.cart');

//MOSTRA LA PAGINA DELLE SPEDIZIONI (con gli ordini)
Route::get('/shipping', [OrderController::class, 'index'])->name('shipping')->middleware('auth');

//Piazza un ordine [tasto carrello]
Route::post('/shipping', [OrderController::class, 'store'])->name('checkout')->middleware('auth');





Route::get('/dumpcarrello', [ShipController::class, 'test'])->name('test');
Route::get('/dumpsessione', [ShipController::class, 'test2'])->name('test2');

//Route::get('/results/{q}', [ProductController::class, 'index'])->name('search');


//form action="{{ route('cart.add', $product->id) }}" method="POST">
//public function add($id)   id = $product->id
