@extends('welcome')
@section('content')
    <div class="container">
    <div class="headerTovar">
        ORDER
    </div>
    <div class="addProductAdmin flex jcsb">
        <div></div>
        <a href="{{route('addNewOrder')}}" class="addProductAdminBtn txtc">Создать новый ORDER</a>
    </div>

    <table class="adminTable txtc">
        <tr>
            <th>User_id</th>
            <th>Картинка</th>
            <th>Временная метка</th>
            <th>Название</th>
            <th>Цена залога</th>
            <th>Цена аренды</th>
            <th>Кол-во</th>
            <th>Статус</th>
            <th>Редактировать</th>
            <th>Удалить</th>

        </tr>
        @foreach ($orders as $order)
            <tr class="headTable">
                <td>{{$order->user()->id}}</td>
                <td><img src="{{asset('storage/app/public/'.$order->product()->image)}}" class="tableImg" alt=""></td>
                <td>{{$order->created_at}}</td>
                <td>{{$order->product()->name}}</td>
                <td>{{$order->product()->price}}</td>
                <td>{{$order->product()->pricePledge}}</td>
                <td>{{$order->quantity}}</td>
                <td>{{$order->status()}}</td>


                <td><a href="{{route('adminOrderUpdate',$order->id)}}" class="orangeText">Редактировать</a></td>

                <td>
                    <form action="{{route("deleteOrder",$order->id)}}" method="get">
                        @csrf
                        <div onclick="del({{$order->id}})" id="myBtn" class="btnShowThis">Удалить</div>
                        <div id="myModal{{$order->id}}" class="modalS">
                            <!-- Модальное содержание -->
                            <div class="modal-contentS">
                                <p>Вы уверенны</p>
                                <div class="otstup20 flex aic jcsb">
                                    <button type="submit" class="btnShowThis">Удалить</button>
                                    <div class="btnShowThis" id="closeModal{{$order->id}}">Отмена</div>
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
