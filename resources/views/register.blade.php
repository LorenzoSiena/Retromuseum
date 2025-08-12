@extends('layouts.guest')


@section('script')
<script src='{{ asset('js/signup.js') }}' defer>
// collegare il JS (registrazione) alla pagina
</script>

<script type="text/javascript">                   // ??
    const REGISTER_ROUTE = "{{route('register')}}"; // per javascript ->checkUsername() ->checkEmail()
</script>
@endsection




@section('content')
<section class=" form">
<h1>Iscrizione</h1>
<form name='signup' method='post' enctype="multipart/form-data" autocomplete="off" action="{{ route('register') }}">
    <div class="username">
        <div class="username">
            <div><label for='username'>Username</label></div>
            <!-- Se il submit non va a buon fine, il server reindirizza su questa stessa pagina, quindi va ricaricata con 
        i valori precedentemente inseriti -->
            <div><input type='text' name='username' ></div>
        <span class="error" ></span>    
    </div>

    </div>
    <div class="name">
        <div><label for='name'>Nome</label></div>
        <div><input type='text' name='name' ></div>
        <span class="error" ></span>
    </div>
    <div class="surname">
        <div><label for='surname'>Cognome</label></div>
        <div><input type='text' name='surname' ></div>
        <span class="error" ></span>
    </div>


    <div class="email">
        <div><label for='email'>Email</label></div>
        <div><input type='text' name='email' ></div>
        <span class="error" ></span>
    </div>
    <div class="address">
        <div><label for='address'>Indirizzo</label></div>
        <div><input type='text' name='address' ></div>
        <span class="error" ></span>
    </div>
    <div class="password">
        <div><label for='password'>Password</label></div>
        <div><input type='password' name='password' ></div>
        <span class="error" ></span>
    </div>

    <div class="confirm_password">
        <div><label for='confirm_password'>Conferma Password</label></div>
        <div><input type='password' name='confirm_password' ></div>
        <span class="error" ></span>
    </div>

    <div class="allow">
        <div><label for='allow'>Acconsento al trattamento dei dati</label></div>
        <div><input type='checkbox' name='allow' value="1" ></div>
    </div>

    <div class="submit">
        <input type='submit' value="Registrati" id="log">
    </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
</form>
<div class="message">Hai già un account? <a href="{{ route('login') }}">Accedi</a>

    </section>
@endsection