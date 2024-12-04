@extends('welcome')
@section('content')
    <div class="container">
        <div class="headerTovar">
            Админка
        </div>
        <div class="addProductAdmin flex jcsb">
            <div></div>
            <a href="{{route('addNewProduct')}}" class="addProductAdminBtn txtc">Создать новый товар</a>
        </div>

        <table class="adminTable txtc">
            <tr>
                <th>Картинка</th>
                <th>Название</th>
                <th>Описание</th>
                <th>Размер</th>
                <th>Категория</th>
                <th>Редактировать</th>
                <th>Удалить</th>
            </tr>
            @foreach ($products as $product)
                <tr class="headTable">
                    <td>  @if($product->image)
                            <img src="{{asset('storage/app/public/'.$product->image)}}" class="card_admin_image"
                                 alt="">
                        @else
                            <img src="/public/img/noImage.png" class="card__image" alt="">
                        @endif
                    </td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->height}} x {{$product->weight}}</td>
                    <td>{{$product->category()}}</td>

                    <td><a href="{{route('adminProductUpdate',$product->id)}}" class="orangeText">Редактировать</a></td>

                    <td>
                        <form action="{{route("deleteProduct",$product->id)}}" method="get">
                            @csrf
                            <div onclick="del({{$product->id}})" id="myBtn" class="btnShowThis">Удалить</div>

                            <div id="myModal{{$product->id}}" class="modalS">

                                <!-- Модальное содержание -->
                                <div class="modal-contentS">
                                    <p>Вы уверенны</p>
                                    <div class="otstup20 flex aic jcsb">
                                        <button type="submit" class="btnShowThis">Удалить</button>
                                        <div class="btnShowThis" id="closeModal{{$product->id}}">Отмена</div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection
