@extends('welcome')
@section('content')
    <div class="container">
        <div class="aboutProduct">
            <form method="post" enctype="multipart/form-data">
                @csrf
                <div class="inCard flex jcsb">
                    <div class="imgClass">
                        <img src="/public/image/noImage.png" class="imgProduct" alt="">
                        <div><input type="file" name="image"></div>
                    </div>
                    <div class="aboutProductClass">
                        <div class="aboutProd flex jcsb aic">
                            <span class="nameDesc">Наименование товара:</span>
                            <input type="text" name="name" value="" class="nameProduct">
                        </div>
                        <div class="aboutProd2 flex jcsb aic">
                            <span class="nameDesc">Описание товара:</span>
                            <input type="text" name="description" value="" class="nameProduct">
                        </div>
                        <div class="aboutProd flex jcsb aic">
                            <span class="nameDesc">Цена залога:</span>
                            <input type="text" name="price" value="" class="nameProduct">
                        </div>
                        <div class="aboutProd2 flex jcsb aic">
                            <span class="nameDesc">Цена аренды в день:</span>
                            <input type="text" name="pricePledge" value="" class="nameProduct">
                        </div>
                        <div class="aboutProd flex jcsb aic">
                            <span class="nameDesc">Длина товара:</span>
                            <input type="text" name="height" value="" class="nameProduct">
                        </div>
                        <div class="aboutProd2 flex jcsb aic">
                            <span class="nameDesc">Ширина товара:</span>
                            <input type="text" name="weight" value="" class="nameProduct">
                        </div>

                        <div class="aboutProd flex jcsb aic">
                            <span class="nameDesc">Категории:</span>
                            <select name="category_id" class="nameProduct selectCategory">
                                @foreach($categories as $cat)
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
    </div>

@endsection
