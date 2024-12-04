@extends('welcome')
@section('content')
    <div class="container">
    <form method="post" enctype="multipart/form-data" action="{{route('addOrder')}}">
        @csrf
        <div class="inCard flex jcsb">
            <div class="imgClass">
                <img src="/public/image/noImage.png" class="imgProduct" alt="">
                <div><input type="file" name="image" ></div>
                @error('image')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="aboutProductClass">
                <div class="aboutProd flex jcsb aic">
                    <span class="nameDesc">Наименование товара:</span>
                    <input type="text" name="name" value="" class="nameProduct">

                </div>
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <div class="aboutProd2 flex jcsb aic">
                    <span class="nameDesc">Описание:</span>
                    <input type="text" name="description" value="" class="nameProduct">

                </div>
                @error('description')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <div class="aboutProd flex jcsb aic">
                    <span class="nameDesc">Категории:</span>
                    <select name="category_id" id="" class="nameProduct selectCategory">
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
@endsection
