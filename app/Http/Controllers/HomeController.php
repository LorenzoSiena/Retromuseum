<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{


    public function index() {
        return view('home');
    }
    public function aboutus() {
        return view('aboutus');
    }


    public function fetchPodcast(){
        $client_id = "***REMOVED***"; //Identificatore della mia app [pubblica(?)]
        $client_secret = "***REMOVED***"; //"Password" della mia app [per me e per spotify](dovrebbe rimanere nascosta al pubblico)

        if(!isset($token)){
        // ACCESS TOKEN
        $ch = curl_init(); //inizializzo curl
        curl_setopt($ch, CURLOPT_URL, 'https://accounts.spotify.com/api/token' ); //url del token
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //ritorno il risultato
        curl_setopt($ch, CURLOPT_POST, 1); //eseguo la post
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials'); //setto i parametri della post (header+body)
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Basic '.base64_encode($client_id.':'.$client_secret))); //setto l'header (id+password))
        $token=json_decode(curl_exec($ch), true); //eseguo la richiesta e ritorno il risultato (ottengo il mio token)
        curl_close($ch);     //chiudo curl
        }

        $url = "https://api.spotify.com/v1/shows/79AqdlUNncp3KZQJqKv8I7/episodes?market=IT&limit=1&offset=0";
        $ch = curl_init(); //inizializzo curl
        curl_setopt($ch, CURLOPT_URL, $url); //url della query
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //ritorno il risultato

        # Imposto il token
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$token['access_token'])); //setto l'header (col token)
        $res=curl_exec($ch); //eseguo la richiesta
        curl_close($ch); //chiudo curl
        return $res; //ritorno il risultato
    }

















}





