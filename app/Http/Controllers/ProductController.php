<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index(Request $request){
        Log::info('ricerca');
        Log::info($request);
        if ($request->has('query')) {
            $products = Product::where('nome', 'like', '%' . $request->get('query') . '%')->get(); // get the products that match the search ??
            Log::info('Trovati ' . count($products) . ' prodotti');
        } else {
            $products = Product::all(); //get all products
            Log::info('TUTTI I PRODOTTI');
        }
        Log::info($products);
        //stampa il carrello
        $cart = session()->get('cart', []);
        Log::info('Carrello');
        Log::info($cart);
        Log::info('FINE Carrello');
        return view('products') -> with('products', $products); //pass the products to the view ??
        }
}


//Route::post('/results/{search}', [ProductController::class, 'index'])->name('search');
