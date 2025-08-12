@extends('layouts.guest')

@section('script')
@endsection


@section('content')
    <div class="form">
      <form name='login' method='post' action="{{ route('login') }}">
        <div class="username">
          <div><label for='username'>Username</label></div>
          <div><input type='text' name='username' placeholder ='Utente' ></div>
        </div>
        <div class="password">
          <div><label for='password'>Password</label></div>
          <div><input type='password' name='password' placeholder='password' </div>
        </div>
        <div class="remember">
          <div><input type='checkbox' name='remember' value="1" ></div>
          <div><label for='remember'>Ricorda l'accesso</label></div>
        </div>
        <div>
          <input id='log' type='submit' value="Accedi">
        </div>
        <div class="error">{{session()->get('error')}}</div>

        <p class="message">Non sei ancora registrato? </br><a href="{{ route('register') }}">Crea un account</a></p>
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    </form>
    </div>
@endsection
