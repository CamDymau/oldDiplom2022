@extends('welcome')
@section('content')
    <div class="container">
        <?php  $totalPrice = 0 ?>
        <?php  $totalPricePledge = 0 ?>

        @foreach ($products as $product)
            <div class="aboutProduct">
                <div class="inCard flex jcsb">
                    <div class="imgClass flex jcc">
                        @if($product->options->image == null)
                            <img src="/public/img/noImage.png" class="card__image__cart" alt="">
                        @else
                            <img src="{{asset('storage/app/public/'.$product->options->image)}}"
                                 class="card__image__cart"
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
                            <h3 class="nameProduct">{{$product->weight}} / {{$product->options->height}}</h3>
                        </div>

                        <div class="aboutProd flex jcsb aic">
                            <span class="nameDesc">Цена залога:</span>
                            <h3 class="nameProduct">{{$product->price}} руб.</h3>
                            <input type="hidden" value="{{$totalPrice+=$product->price * $product->qty }}">
                        </div>
                        <div class="aboutProd2 flex jcsb aic">
                            <span class="nameDesc">Цена аренды в день:</span>
                            <h3 class="nameProduct">{{$product->options->pricePledge}} руб.</h3>
                            <input type="hidden" value="{{$totalPricePledge+=$product->options->pricePledge* $product->qty}}">
                        </div>
                        <div class="aboutProd flex jcsb aic">
                            <span class="nameDesc">Количество товара:</span>

                            <h3 class="nameProduct">
                                <div class="quantity">
                                    <form action="{{route('changeQuantity')}}" method="post" class="flex aic">
                                        @csrf
                                        <input type="hidden" name="rowId" value="{{$product->rowId}}">
                                        <button type="submit" value="down" name="change_to" class="quantityBtn" >
                                              -
                                        </button>
                                        <span class="quantityText">{{$product->qty}}</span>
                                        <button type="submit" value="up" name="change_to" class="quantityBtn">
                                          +
                                        </button>
                                    </form>
                                </div>
                            </h3>
                        </div>

                        <div class="aboutProd2 flex jcsb">
                            <span></span>
                            <form method="post">
                                @csrf
                                <input type="hidden" name="rowId" value="{{$product->rowId}}">
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

            <div class="orderProduct">
                <div class="textOrder">
                    <ul class="orderHead">
                        <li>Стоимость залога<span class="value">{{$totalPrice}} руб.</span></li>
                        <li>Стоимость аренды<span class="value">{{$totalPricePledge}} руб.</span></li>
                    </ul>
                </div>
                <div class="btnOrder flex aic jcsb">
                    <span></span>
                    @guest
                        <span>С начала вы должны автризироваться</span>
                    @else
                        <div onclick="del(1)" id="myBtn" class="btnMadeOrder">Сделать заказ</div>

                        <div id="myModal1" class="modalS">

                            <!-- Модальное содержание -->
                            <div class="modal-contentS txtc">

                                <h3 >Вы уверенны</h3>
                                <div class="p10 flex aic jcsb">

                                    <a href="{{ route('makeOrder') }}" class="btnShowThis">
                                        Сделать заказ
                                    </a>
                                    <div class="btnShowThis" id="closeModal1">Отмена</div>

                                </div>
                            </div>

                        </div>
                    @endif
                </div>
            </div>
    </div>


@endsection
