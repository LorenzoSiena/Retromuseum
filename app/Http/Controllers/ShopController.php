<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class ShopController extends Controller
{
    public function cart()
    {
        return view('cart')->with('cart', session()->get('cart'));
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id); // Find product of id $id

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantita']++;
            Log::info('Aggiunto al carrello+1 ' . $product->nome);
        } else {
            $cart[$id] = [
                "nome" => $product->nome,
                "quantita" => 1,
                "prezzo" => $product->prezzo ,
                "descr" => $product->descrizione,
                "tipo" => $product->tipo,
                "imag_url" => $product->imag_url

            ];
            Log::info('Aggiunto al carrello ' . $product->nome);
        }

        session()->put('cart', $cart);


        return [ 'success' => true ];

    }

    public function update(Request $request)
    {

        if ($request->id && $request->quantity) {

            $cart = session()->get('cart');

            $cart[$request->id]["quantita"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
            return [ 'success' => true ];
        }

        Log::error("PANICO");

        return [ 'success' => false ];
    }

    public function remove(Request $request)
    {
        Log::info("Rimozione dal carrello");
        Log::info("Richiesta :");
        Log::info($request);
        if ($request->id) {
            Log::info($request->id);

            $cart = session()->get('cart');

            if (isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
            Log::info("OK! NUOVO CARRELLO");
            Log::info($cart);


            return [ 'success' => true ];
        }
        Log::error("PANICO");

        return [ 'success' => false ];
    }


    public function clearAllCart()
    {
        session()->forget('cart');
        session()->flash('success', 'Cart cleared successfully');
        session()->regenerateToken();
        Log::info('Carrello svuotato');

        return redirect()->route('welcome');
    }



}
//form action="{{ route('cart.add', $product->id) }}" method="POST">
//public function add($id)   id = $product->id

//Route::get('/create/search/{type}/{query?}', 'CreateController@search')->name('create.search');
