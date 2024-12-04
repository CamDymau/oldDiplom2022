@extends('welcome')
@section('content')
    <div class="container p10">
      <div class="headerTovar">Мои заказы</div>
        <div class="p30">

            <table class="adminTable txtc">
                <tr>
                    <th>Картинка</th>
                    <th>Временная метка</th>
                    <th>Название</th>
                    <th>Цена(шт) залога</th>
                    <th>Цена аренды в день</th>
                    <th>Кол-во</th>
                    <th>Статус</th>
                    <th>Удалить</th>

                </tr>
                <?php $totalPrice = 0;?>
                @foreach ($orders as $order)
                    <tr class="headTable">
                        <td><img src="{{asset('storage/app/public/'.$order->product()->image)}}" class="tableImg" alt=""></td>
                        <td>{{$order->created_at}}</td>
                        <td>{{$order->product()->name}}</td>
                        <td>{{$order->product()->price}}</td>
                        <td>{{$order->product()->pricePledge}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>{{$order->status()}}</td>
                        <td>
                            <form action="{{route("deleteOrder",$order->id)}}" method="get">
                                @csrf
                                <div onclick="del({{$order->id}})" id="myBtn" class="btnShowThis">Удалить</div>

                                <div id="myModal{{$order->id}}" class="modalS">

                                    <div class="modal-contentS">
                                        <h3 >Вы уверенны</h3>
                                        <div class="p10 flex aic jcsb">
                                            <button type="submit" class="btnShowThis">Удалить</button>
                                            <div class="btnShowThis" id="closeModal{{$order->id}}">Отмена</div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </td>
                        <input type="hidden" value="{{$totalPrice+=$order->product()->price * $order->quantity }}">
                    </tr>
                @endforeach
            </table>

            <div class="orderProduct">
                <div class="textOrder">
                    <ul class="orderHead">
                        <li>Общая стоимость<span class="value" id="msg">{{$totalPrice}} руб.</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
