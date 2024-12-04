@extends('welcome')
@section('content')
    <script>
        function addToCart(form) {
            let idProduct = form.elements.idProduct.value;
            let inputQuantity = form.elements.inputQuantity.value;

            $.ajax({
                url: '{{route('addToCart')}}',
                type: "post",
                data: {
                    idProduct: idProduct,
                    quantity: inputQuantity,
                },
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    form.innerHTML = `<span> В корзине</span>`;
                    document.getElementById('basket').innerHTML = data;
                },
                error: (data) => {
                    console.log(data);
                }

            });
        }
    </script>
    <div class="container">
        <div class="headerTovar">
            Наши товары
        </div>
        <div class="mobileFilter">
            <div class="hamburger-menu2">
                <input id="menu__toggle2" type="checkbox"/>
                <label class="menu__btn2" for="menu__toggle2">
                    <span></span>
                </label>
                <ul class="menu__box2">
                    <form action="{{route('sortBy',session('category'))}}" method="get" class="choseFilter flex jcsb">


                        <li>
                            <button type="submit" name="orderBy" class="filterButton" value="price,asc">По умолчанию
                            </button>

                        </li>
                        <li>
                            <button type="submit" name="orderBy" class="filterButton" value="price,asc">По
                                возрастанию цены
                            </button>
                        </li>
                        <li>
                            <button type="submit" name="orderBy" class="filterButton" value="price,desc">По
                                убыванию цены
                            </button>
                        </li>
                        <li>
                            <button type="submit" name="orderBy" class="filterButton" value="name,asc">По
                                названию(a-я)
                            </button>
                        </li>
                        <li>
                            <button type="submit" name="orderBy" class="filterButton" value="name,desc">По
                                названию(я-а)
                            </button>
                        </li>

                    </form>
                    <li>
                        <div class="heightSection">
                            <div class="bgSection1 flex aic">
                                <div class="nameCategory2">По цене</div>
                            </div>
                        </div>

                        <form action="{{ route('sortPrice' , session('category')) }}" method="get"
                              class="inputSection flex aic jcsb" id="showPrice">
                            <input type="text" name="smallerPrice" id="inputSearchPriceS" placeholder="от...">
                            <span> — </span>
                            <input type="text" name="biggerPrice" id="inputSearchPriceB" placeholder="до...">

                            <button type="submit" class="arrowBtn flex txtc" id="showBtn">
                                Показать
                            </button>
                        </form>
                    </li>
                    <li>

                    </li>
                    <li>

                    </li>

                </ul>
            </div>
        </div>

        <div class="flex jcsb mobInis">

            <form action="{{route('sortBy',session('category'))}}" method="get" class="choseFilter flex jcsb">
                <button type="submit" name="orderBy" class="filterButton" value="price,asc">По умолчанию
                </button>
                <button type="submit" name="orderBy" class="filterButton" value="price,asc">По
                    возрастанию цены
                </button>
                <button type="submit" name="orderBy" class="filterButton" value="price,desc">По
                    убыванию цены
                </button>
                <button type="submit" name="orderBy" class="filterButton" value="name,asc">По
                    названию(a-я)
                </button>
                <button type="submit" name="orderBy" class="filterButton" value="name,desc">По
                    названию(я-а)
                </button>
            </form>

        </div>

        <div class="flex2">
            <div class="filter mobInis">
                <div class="filterCategory">
                    <div class="priceCategory">
                        <div class="heightSection">
                            <div class="bgSection1 flex aic">
                                <div class="arrow"></div>
                                <div class="nameCategory2">Цена</div>
                            </div>
                        </div>

                        <form action="{{ route('sortPrice' , session('category')) }}" method="get"
                              class="inputSection flex aic jcsb" id="showPrice">
                            <input type="text" name="smallerPrice" id="inputSearchPriceS" placeholder="от...">
                            <span> — </span>
                            <input type="text" name="biggerPrice" id="inputSearchPriceB" placeholder="до...">

                            <button type="submit" class="arrowBtn flex txtc" id="showBtn">
                                Показать
                            </button>
                        </form>

                    </div>
                </div>
            </div>

            <div class="allCard" id="allProduct">
                <div class="flex">
                    @foreach ($products as $product)
                        <div class="card4">
                            <a href="{{route('showProduct',$product->id)}}" class="cardProduct">
                                <div class="inCard">
                                    <div class="imageInCard flex jcc">
                                        @if($product->image)
                                            <img src="{{asset('storage/app/public/'.$product->image)}}"
                                                 class="card__image"
                                                 alt="">
                                        @else
                                            <img src="/public/img/noImage.png" class="card__image" alt="">
                                        @endif
                                    </div>
                                    <h3 class="name">{{$product->name}}</h3>
                                    <p class="price">Цена залога:{{$product->price}}руб</p>
                                    <p class="price">Цена аренды в день:{{$product->pricePledge}}руб</p>
                                </div>
                            </a>

                            <div class="aboutProd2 flex jcsb aic">
                                <span></span>
                                @if( Auth::user()!=null && Auth::user()->role)
                                    <a href="{{route('adminProductUpdate',$product->id)}}"
                                       class="orangeText">Редактировать</a>

                                @endif
                            <!-- <button class="ProductInCard">
                                <span class="nameProduct">В корзине</span>
                            </button>
                            -->
                                @if($carts->where('id',$product->id)->count())
                                    В корзине
                                @else
                                    <form name="form">
                                        @csrf
                                        <input type="hidden" name="idProduct" id="idProduct" value="{{$product->id}}">
                                        <input name="inputQuantity" type="number" min="1" placeholder="1" value="1"
                                               class="inputCountProduct" id="inputQuantity" style="width: 50px"/>
                                        <button type="button" onclick="addToCart(this.form)" class="btnShowThis"
                                                id="btnAddCart">
                                            В корзину
                                        </button>
                                    </form>


                                @endif

                            </div>
                        </div>
                    @endforeach
                </div>
                {{$products->appends(request()->query())->links('pagination.pagination-links')}}
            </div>
        </div>
    </div>

@endsection


