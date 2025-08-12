<?php

namespace App\Http\Controllers;

use App\Models\Ship;
use Doctrine\DBAL\Schema\Index;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast\Object_;

class ShipController extends Controller
{
    //Slug is used to create a unique URL for the product --> mario-kart-64 <--
    //Sostituire tutti i campi





    public function store($cart,$totale,$indirizzo)
    {
        $ship = new Ship(); //creo un nuovo oggetto Ship


        $ship->totale=$totale;
        $ship->indirizzo = $indirizzo;
        foreach($cart as $item) {
            $idz=array_keys($cart, $item);

            $ar[] = array(
                'id_prodotto' => $idz[0],
                'nome' => $item['nome'],
                'quantita' => $item['quantita'],
                'prezzo' => $item['prezzo']
            );

        }
        $ship->prodotti = $ar;

        if(in_array("regalo", $cart))
            $ship->regalo = 'true';

        if(in_array("phone", $cart)){
            $ship->phone = $cart->phone;
        }
        //dd($ship);
        $ship->save();
        return $ship->id;
        }




        public function test() //mostra il carrello
    {
        //get cart from session
        $cart = session()->get('cart');
        //get product from cart
        //$ship = new Ship();
       //$ship-> test = "TEST2";
        //$ship->save();
        //dd($ship-> id); 62dd5d0d555c218ff8007a52
        dd($cart);
    }

    public function test2() //mostra il carrello
    {
       //session)
       $test=session()->all();
        dd($test);
    }



    public function show($id)
    {

        $ship = Ship::where('id', '=', $id)->first();
        dd($ship);
    }

    /*
    public function store(Request $request)
    {
        $ship = new Ship();

        $ship->title = $request->title; // PRIMO CAMPO
        $ship->body = $request->body; // SECONDO  CAMPO
        $ship->slug = $request->slug; // TERZO CAMPO

        $ship->save();

        return response()->json(["result" => "ok"], 201);
    }
*/

    public function destroy($shipId) //deve essere autenticato SOLO L'user che ha creato la ship può distruggerlo
    {
        $ship = Ship::find($shipId);
        $ship->delete();

        return response()->json(["result" => "ok"], 200);
    }

    // MI SERVE? :/
    // cambio indirizzo spedizione al massimo
    public function update(Request $request, $shipId)
    {
        $ship = Ship::find($shipId);
        $ship->title = $request->title; // PRIMO CAMPO
        $ship->body = $request->body;  // SECONDO  CAMPO
        $ship->slug = $request->slug;    // TERZO CAMPO
        $ship->save();


        return response()->json(["result" => "ok"], 201);
    }
}
//in web.php??? (oppure api.php come il tutorial)
//Route::resource('posts', ShipController::class)->only(['destroy', 'show',
// 'store', 'update']);
