<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index() {
        return view('register');
    }

    protected function create()
    {
        $request = request();
        // $propic = $request->has('avatar') ? $request->file('avatar') : null; /
        $ip = $request->ip(); // get the IP address of the user

        if($this->countErrors($request) === 0) {  // if there are no errors
            $newUser =  User::create([
            'username' => $request['username'],
            // Hash::make($request['password']), LA PASSWORD VA HASHATA
            'password' => Hash::make($request['password']),
            'nome' => $request['name'],
            'cognome' => $request['surname'],
            'indirizzo' => $request['address'],
            'email' => $request['email'],
            //'propic' => $propic ?? null, // if the user doesn't upload an avatar, the default one will be used
            'ip' => $ip,
            //'verified' => false,
            ]);

            if ($newUser) {

                Auth::login($newUser);
               // Auth::attempt(['username' => $request['username'], 'password' => $request['password']]);
               // Auth::loginUsingId($newUser->id);

                //Session::put('user_id', $newUser->id);
                return redirect('home'); // redirect to the home page
            }
            else {
                return redirect('register')->withInput();
            }
        }
        else
            return redirect('register')->withInput();

    }

    private function countErrors($data) { //$data === $request
        $error = array();
        # USERNAME
        // Controlla che l'username rispetti il pattern specificato
        if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $data['username'])) {
            $error[] = "Username non valido";
            Log::error($error[0]);
        } else {
            $username = User::where('username', $data['username'])->first();
            if ($username !== null) {
                $error[] = "Username già utilizzato";
                Log::error($error[0]);
            }
        }

        $pattern = '/^(?=.*[!@#$%^&*_-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/'; #complesso
        $pattern2 = '/^[a-zA-Z0-9_]{1,15}$/';                             #semplice-> Debug

        # PASSWORD
        if (!preg_match($pattern, $data['password'])) {
            $error[] = "password insufficiente (almeno 8 caratteri, almeno un numero, almeno un carattere speciale,almeno una lettera maiuscola)";
            Log::error($error[0]);
        }
        # CONFERMA PASSWORD
        if (strcmp($data["password"], $data["confirm_password"]) != 0) {
            $error[] = "Le password non coincidono";
            Log::error($error[0]);
        }


        # EMAIL
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $error[] = "Email non valida";
            Log::error($error[0]);
        } else {
            $email = User::where('email', $data['email'])->first();
            if ($email !== null) {
                $error[] = "Email già utilizzata";
                Log::error($error[0]);
            }
        }
        return count($error);
    }

    public function checkUsername($query) { // va usata da JS
        $exist = User::where('username', $query)->exists();
        return ['exists' => $exist];
    }

    public function checkEmail($query) {  // va usata da JS
        $exist = User::where('email', $query)->exists();
        return ['exists' => $exist];
    }

    }
