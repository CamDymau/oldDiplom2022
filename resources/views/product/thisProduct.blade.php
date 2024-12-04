@extends('welcome')
@section('content')
    <script>
        function addToCart(form){
            let idProduct =form.elements.idProduct.value;
            let inputQuantity =form.elements.inputQuantity.value;
            $.ajax({
                url: '{{route('addToCart')}}',
                type: "post",
                data: {
                    idProduct : idProduct,
                    quantity:inputQuantity,
                },
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    form.innerHTML=`<span> В корзине</span>`;
                    document.getElementById('basket').innerHTML= data;
                },
                error:(data)=>{
                    console.log(data);
                }

            });
        }
    </script>
    <div class="container">
        @foreach ($products as $product)
            <div class="aboutProduct">
                <div class="inCard flex jcc">
                    <div class="imgClass flex jcc">
                        @if($product->image)
                            <img src="{{asset('storage/app/public/'.$product->image)}}"
                                 class="card__image__cart"
                                 alt="">
                        @else
                            <img src="/public/img/noImage.png" class="card__image__cart" alt="">
                        @endif
                    </div>
                    <div class="aboutProductClass">
                        <div class="aboutProd flex jcsb aic">
                            <span class="nameDesc">Наименование товара:</span>
                            <h3 class="nameProduct">{{$product->name}}</h3>
                        </div>

                        <div class="aboutProd2 flex jcsb aic">
                            <span class="nameDesc">Размер товара:</span>
                            <h3 class="nameProduct">{{$product->height}} x {{$product->weight}}</h3>
                        </div>

                        <div class="aboutProd flex jcsb aic">
                            <span class="nameDesc">Описание товара:</span>
                            <h3 class="nameProduct">{{$product->description}}</h3>
                        </div>
                        <div class="aboutProd2 flex jcsb aic">
                            <span class="nameDesc">Цена залога:</span>
                            <h3 class="nameProduct">{{$product->price}} руб.</h3>

                        </div>
                        <div class="aboutProd flex jcsb aic">
                            <span class="nameDesc">Цена аренды в день:</span>
                            <h3 class="nameProduct">{{$product->pricePledge}} руб.</h3>

                        </div>

                        <div class="aboutProd2 flex jcsb">

                            @if($carts->where('id',$product->id)->count())
                                В корзине
                            @else
                                <form name="form">
                                    @csrf
                                    <input type="hidden" name="idProduct" id="idProduct" value="{{$product->id}}">
                                    <input name="inputQuantity" type="number" min="1" placeholder="1" value="1"
                                           class="inputCountProduct" id="inputQuantity" style="width: 50px"/>
                                    <button type="button" onclick="addToCart(this.form)" class="btnShowThis" id="btnAddCart">
                                        В корзину
                                    </button>
                                </form>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
