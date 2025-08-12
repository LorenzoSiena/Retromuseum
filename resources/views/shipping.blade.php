@extends('layouts.shop')



@section('script')
@endsection



@section('top')
    <div class="top">
        <h1 class="title-cart">I tuoi ordini</h1>
            <div style= "background-color: yellow"class="alert alert-success">
                {{session()->get('success')}}
            </div>
            @php
            session()->forget('success');
            @endphp


    </div>
@endsection



@section('middle')
    <div class="middle-cart">

        @foreach ($results as $spedizione)
            <div class="order">
                <div class="title-sped">
                    <div class="title-sped-date">Ordine effettuato il {{ substr($spedizione['created_at'],0,10) }} </div>
                    <div class="title-sped-total">Totale :{{ $spedizione['totale_spesa'] }}€</div>
                    <div class="title-sped-name">Indirizzo :{{ $spedizione['ship']['indirizzo'] }}</div>
                    <div class="title-sped-number">Ordine {{ $spedizione['id_ship'] }}</div>
                </div>
                <div class="sped">

                    @foreach ($spedizione['ship']['prodotti'] as $prodotto)

                    <div class="sped-product">

                        <div class="product">

                            <div class="product-image">
                                <img src="https://dummyimage.com/600x600/000/ffffff&text={{$prodotto['nome']}}">
                             <!--   <img src="https://dummyimage.com/500x500/000/fff&amp;text=">
                             -->
                            </div>
                            <div class="product-details">
                                <div class="product-title">{{$prodotto['nome']}}</div>
                                <p class="product-description">The best dog bones of all time. Holy crap. Your dog will be
                                    begging for
                                    these things! I got curious once and ate one myself. I'm a fan.</p>
                            </div>
                            <div class="product-price">{{$prodotto['prezzo']}}€</div>
                            <div class="product-quantity">&nbspx{{$prodotto['quantita']}}</div>
                            <div class="product-line-price">{{$prodotto['quantita']*$prodotto['prezzo']}}€</div>
                        </div>



                    </div>
                    @endforeach







                    <div class="sped-status">
                        <div class="sped-status-description">
                            <h1>Stato:</h1>
                            @switch($spedizione['stato'])
                                @case(0)
                                In attesa di pagamento
                                @break

                                @case(1)
                                In elaborazione
                                @break


                                @case(2)
                                    Spedito
                                @break


                                @case(3)
                                    Consegnato
                                @break

                                @default
                                In elaborazione
                            @endswitch

                        </div>

                        <a href="https://www.poste.it/cerca/index.html#/" class="sped-status-link checkout">Tracking</a>

                    </div>

                </div>
            </div>
        @endforeach








        <!--
            <div class="order">
                <div class="title-sped" >
                    <div class="title-sped-date">Ordine effettuato il 15/luglio/2025</div>
                    <div class="title-sped-total">Totale :XX€</div>
                    <div class="title-sped-name">Indirizzo :XXXXXXXXXXxx</div>
                    <div class="title-sped-number">Ordine #XXXXXXXXX</div>
                </div>
                <div class="sped">


                    <div class="sped-product">

                        <div class="product">

                            <div class="product-image">
                                <img src="https://s.cdpn.io/3/dingo-dog-bones.jpg">
                            </div>
                            <div class="product-details">
                                <div class="product-title">Dingo Dog Bones</div>
                                <p class="product-description">The best dog bones of all time. Holy crap. Your dog will be
                                    begging for
                                    these things! I got curious once and ate one myself. I'm a fan.</p>
                            </div>
                            <div class="product-price">12.99</div>
                            <div class="product-quantity">X2</div>
                            <div class="product-line-price">25.98</div>
                        </div>



                        <div class="product">

                            <div class="product-image">
                                <img src="https://s.cdpn.io/3/dingo-dog-bones.jpg">
                            </div>
                            <div class="product-details">
                                <div class="product-title">Dingo Dog Bones</div>
                                <p class="product-description">The best dog bones of all time. Holy crap. Your dog will be
                                    begging for
                                    these things! I got curious once and ate one myself. I'm a fan.</p>
                            </div>
                            <div class="product-price">12.99</div>
                            <div class="product-quantity">X2</div>
                            <div class="product-line-price">25.98</div>
                        </div>
                    </div>

                    <div class="sped-status" >
                        <div class="sped-status-description">
                            <h1>Stato:</h1>(0,1,2,3)In attesa di pagamento
                        </div>

                        <a href="https://www.poste.it/cerca/index.html#/" class="sped-status-link checkout">Tracking</a>

                    </div>

                </div>
            </div>
        -->





    </div>
@endsection









@section('bottom')
@endsection
