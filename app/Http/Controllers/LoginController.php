<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{


    public function login()
    {
        Log::info('login');
        if(Auth::check()) { //se l'utente è già loggato, lo reindirizzo alla home
            return redirect("home");
        }else{              //altrimenti lo reindirizzo alla pagina di login
            return view('login')
            ->with('csrf_token', csrf_token());
        }
    }

    public function checkLogin(Request $request)
    {
        Log::info('richiesta');
        Log::info($request);
        $data = $request->only('username','password');

        Log::info('data');
        Log::info($data);
        if (Auth::attempt($data)) {
            return view('home');
        }else{
            //return view('pages.loginform')->with(array('error' => 1));
            Log::info('ERRORE LOGIN!');
            return redirect('login')
            ->with('error', 'Username o password errate');
        }
    }

/*
    public function login_OLD()
    {

        Log::info('login');

        if (auth()->check()) {
            Log::info(auth()->check());
            return redirect("home");
        } else {
            return view('login')
                ->with('csrf_token', csrf_token());
        }
    }




    public function checkLogin_OLD()
    {

        Log::info('checkLogin');
        Log::info(request('username'));
        Log::info(request('password'));

        $user = User::where('username', request('username'))->where('password', request('password'))->first();
        Log::info($user);

        if ($user !== null) {
            Log::info('User found!');
            // Session::put('user_id', $user->id); // salvo l'id dell'utente nella sessione
            //auth()->login($user); // loggo l'utente
            //auth()->loginUsingId($user->id);
            Auth::loginUsingId($user->id);

            return redirect('home');
        } else {
            Log::info('User NOT FOUND!');

            return redirect('login')->withInput();
        }
    }
*/



    public function logout()
    {
        Log::info('Provo a fare Logout');
        Session::flush();
        Auth::logout();
        return redirect('home');
    }


    /*
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'checkLogin']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
*/
}
