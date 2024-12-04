@extends('welcome')
@section('content')
    <div class="container">
        <?php  $totalPrice = 0 ?>
        <?php  $totalPricePledge = 0 ?>

        @foreach ($products as $produce)
            @foreach($produce->product() as $product)
                <div class="aboutProduct">
                    <div class="inCard flex jcsb">
                        <div class="imgClass">
                            @if($product->image == null)
                                <img src="/public/img/noImage.png" class="card__image__cart" alt="">
                            @else
                                <img src="{{asset('storage/app/public/'.$product->image)}}" class="card__image__cart"
                                     alt="">
                            @endif
                        </div>
                        <div class="aboutProductClass">
                            <div class="aboutProd flex jcsb aic">
                                <span class="nameDesc">Наименование товара:</span>
                                <h3 class="nameProduct">{{$product->name}}</h3>
                            </div>

                            <div class="aboutProd2 flex jcsb aic">
                                <span class="nameDesc">Размер товара:</span>
                                <h3 class="nameProduct">{{$product->weight}}</h3>
                            </div>

                            <div class="aboutProd flex jcsb aic">
                                <span class="nameDesc">Цена залога:</span>
                                <h3 class="nameProduct">{{$product->price}} руб.</h3>
                                <input type="hidden" value="{{$totalPrice+=$product->price * $produce->quantity }}">
                            </div>
                            <div class="aboutProd2 flex jcsb aic">
                                <span class="nameDesc">Цена аренды в день:</span>
                                <h3 class="nameProduct">{{$product->pricePledge}} руб.</h3>
                                <input type="hidden" value="{{$totalPricePledge+=$product->pricePledge * $produce->quantity }}">
                            </div>

                            <div class="aboutProd flex jcsb aic">
                                <span class="nameDesc">Количество товара:</span>
                                <h3 class="nameProduct">{{$produce->quantity}} шт</h3>
                            </div>

                            <div class="aboutProd2 flex jcsb">
                                <span></span>
                                <form method="post">
                                    @csrf
                                    <input type="hidden" name="idProduct" value="{{$product->id}}">
                                    <button type="submit" name="action" value="delete"
                                            class="btnShowThis">
                                        Удалить
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach

        <div class="orderProduct">
            <div class="textOrder">
                <ul class="orderHead">
                    <li>Стоимость залога<span class="value">{{$totalPrice}} руб.</span></li>
                    <li>Стоимость аренды<span class="value">{{$totalPricePledge}} руб.</span></li>
                </ul>
            </div>
            <div class="btnOrder flex aic jcsb">
                <span></span>
                <a href="{{ route('makeOrder') }}" class="btnMadeOrder">
                    Сделать заказ
                </a>
            </div>
        </div>
    </div>






@endsection
