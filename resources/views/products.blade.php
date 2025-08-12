@extends('layouts.app')



@section('script')
<script src='{{ asset('js/shop.js') }}' defer>
</script>
@endsection


@section('content')


    <div class="container">



        @if (isset($products))
            @forelse ($products as $product)
                <div class="item">
                    <h2>{{ $product->nome }}</h2>
                    <p>{{ $product->descrizione }}</p>
                    <p>{{ $product->prezzo }}€</p>
                    <img class="imgg" src="https://m.media-amazon.com/images/I/51kWyydz-QL._AC_.jpg" alt="">

                    @if ($product->quantita > 0)

                            <button class="btn" type="submit" value ={{ $product->id }} >Acquista!</button>
                    @else
                        <button style="background-color: rgb(255, 0, 0)" class="btn" type="submit" disabled>Out of
                            Stock!</button>
                    @endif

                </div>

            @empty
                <div class="item_empty">
                    <h2>Nessun elemento trovato!</h2>


                </div>
            @endforelse
        @endif

    </div>
@endsection
