@extends('layouts.shop')



@section('script')
    <script src='{{ asset('js/cart.js') }}' defer></script>
@endsection



@section('top')
    <div class="top">
        <h1 class="title-cart">Il tuo carrello</h1>
    </div>
@endsection



@section('middle')
    <div class="middle-cart">













        @if (isset($cart))
            @forelse ($cart as $product)
                @php
                    $fuck = array_keys($cart, $product);

                @endphp

                <div class="product " data-id="{{ $fuck[0] }}"">
           @csrf
                        <div class="product-image">
                            <img src="https://dummyimage.com/500x500/000/fff&text={{ $product['nome'] }}">
                        </div>
                        <div class="product-details">
                            <div class="product-title">{{ $product['nome'] }}</div>
                            <p class="product-description">{{ $product['descr'] }}</p>
                        </div>
                        <div class="product-price">{{ $product['prezzo'] }}€</div>
                        <div class="product-quantity">
                            <label ">#</label>
                    <input type="number" class="product-quantity-input" value="{{ $product['quantita'] }}" min="1">
                </div>
                <div class="product-removal">
                    <button value="remove" class="product-removal-button">
                        Rimuovi prodotto
                    </button>
                </div>
                <div class="product-line-price"><h3>{{ $product['quantita'] * $product['prezzo'] }}€</h3></div>
    </div>


@empty
    <div class="item_empty">
        <h2>Vuoto!</h2>
    </div>
    @endforelse
    @endif



    </div>
@endsection









@section('bottom')

    <!-- CICLARE TUTTI I PRODOT  -->

    @if (isset($cart) && empty(!$cart))


        @php $total = 0 @endphp

        @forelse ($cart as $product)
            @php $total += $product['quantita'] * $product['prezzo'] @endphp

        @empty
            <div class="item_empty">
                <h2>Il carrello è vuoto</h2>
            </div>
        @endforelse
        <div class="bottom">
            <div class="totals-item">
                <label>Subtotale</label>
                <div class="totals-value" id="cart-subtotal">{{ $total * (1 - 0.22) }}€</div>
            </div>
            <div class="totals-item">
                <label>IVA (22%)</label>
                <div class="totals-value" id="cart-tax">{{ $total * 0.22 }}€</div>
            </div>
            <div class="totals-item">
                <label>Spedizione Express</label>
                <div class="totals-value" id="cart-shipping">10.00€</div>
            </div>
            <div class="totals-item totals-item-total">
                <label>Totale</label>
                <div class="totals-value" id="cart-total">{{ $total + 10 }}€</div>
            </div>
            <form action="{{ route('checkout') }}" method='POST'>
                @csrf
                <button class="checkout" id="order" type="submit">Procedi con l'ordine</button>

            </form>

        </div>
    @endif

@endsection
