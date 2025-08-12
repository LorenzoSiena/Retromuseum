<?php

namespace App\Http\Controllers;

//use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\User;
use App\Models\Ship;
use Termwind\Components\Dd;

class OrderController extends Controller
{

    protected $ShipController;
    public function __construct(ShipController $ShipController)
    {
        $this->ShipController = $ShipController;
    }

    protected function calculateSum($cart)
    {
        $sum = 0;
        foreach ($cart as $item) {
            $sum += $item['prezzo'] * $item['quantita'];
        }
        return $sum;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=Auth::user()->id;

        $orders = Order::where('id_user',$id)->get();
        $orders=$orders->toArray();
        $results = array();
        foreach($orders as $order){
            $ship=Ship::where('_id',$order['id_ship'])->get();//??? STOP!
            $ship=$ship->toArray();
            $order['ship']=$ship[0];
            $results[]=$order;
        }
        //dd($results);
        return view('shipping') -> with('results', $results); //ritorna la view shipping con i dati in json
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$order = new Order(); MA CI SONO I COSTRUTTORI COME IN JAVA? O.o

        $cart = session()->get('cart');
        $cartTot=$this->calculateSum($cart);
        // chiama la funzione Store di ShipController
        //https://infinitbility.com/laravel-call-function-from-another-class
        $indirizzo=Auth::user()->indirizzo;
        $newOrder =  Order::create
        ([
            'id_user' => Auth::id(), //id_user
            'id_ship' => $this->ShipController->store($cart,$cartTot,$indirizzo), //ritorna_id_ship
            'totale_spesa' => $cartTot, //FUNZ()->calcola il totale dell'ordine
            'stato' => 0    //0 = ordine in attesa di pagamento
        ]);
        //svuota il carrello
        session()->forget('cart');
        //risponde con una pagina che ti assicura che va tutto bene
        session()->flash('success', 'Ordine effettuato con successo');
        return $this->index()-> with('newOrder', $newOrder);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //NOPE ONLY ADMIN
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        // AGGIORNA STATO ORDINE DA 0-> 1->2->3
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //SHIPCONTROLLER
        //CHIAMA LA FUNZIONE destroy($shipId)
        //DELETE ORDER
    }

}
