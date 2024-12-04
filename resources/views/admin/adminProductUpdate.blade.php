@extends('welcome')
@section('content')
    <div class="container">
        @foreach ($products as $product)
            <div class="aboutProduct">
                <form method="post" enctype="multipart/form-data" s>
                    @csrf
                    <div class="inCard flex jcsb">
                        <input type="hidden" name="idOrder" value="{{$product->id}}">

                        <div class="imgClass">
                            @if($product->image != null)
                                <img src="{{asset('storage/app/public/'.$product->image)}}" class="imgProduct" alt=""
                                     id="output">
                            @else
                                <img src="/public/img/noImage.png" class="imgProduct" alt="" id="output">
                            @endif
                            <div><input type="file" name="image" value="{{$product->image}}"
                                        onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                        </div>
                        <div class="aboutProductClass">

                            <div class="aboutProd flex jcsb aic">
                                <span class="nameDesc">Наименование товара:</span>
                                <input type="text" name="name" value="{{$product->name}}" class="nameProduct">
                            </div>
                            <div class="aboutProd2 flex jcsb aic">
                                <span class="nameDesc">Описание товара:</span>
                                <input type="text" name="description" value="{{$product->description}}"
                                       class="nameProduct">
                            </div>
                            <div class="aboutProd flex jcsb aic">
                                <span class="nameDesc">Цена залога:</span>
                                <input type="text" name="price" value="{{$product->price}}" class="nameProduct">
                            </div>
                            <div class="aboutProd2 flex jcsb aic">
                                <span class="nameDesc">Цена аренды в день:</span>
                                <input type="text" name="price" value="{{$product->pricePledge}}" class="nameProduct">
                            </div>
                            <div class="aboutProd flex jcsb aic">
                                <span class="nameDesc">Длина товара:</span>
                                <input type="text" name="height" value="{{$product->height}}" class="nameProduct">
                            </div>
                            <div class="aboutProd2 flex jcsb aic">
                                <span class="nameDesc">Ширина товара:</span>
                                <input type="text" name="weight" value="{{$product->weight}}" class="nameProduct">
                            </div>

                            <div class="aboutProd flex jcsb aic">
                                <span class="nameDesc">Категория:</span>
                                <select name="category_id" class="nameProduct selectCategory">
                                    @foreach($categories as $cat)
                                        @if($cat->id == $product->category_id)
                                            <option value="{{$cat->id}}" selected>
                                                {{$cat->name}}
                                            </option>
                                        @endif
                                        <option value="{{$cat->id}}">
                                            {{$cat->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="aboutProd2 flex jcsb">
                                <span></span>
                                <button type="submit" class="btnShowThis">
                                    Сохранить
                                </button>

                            </div>
                        </div>

                    </div>
                </form>
            </div>

        @endforeach
    </div>
@endsection
