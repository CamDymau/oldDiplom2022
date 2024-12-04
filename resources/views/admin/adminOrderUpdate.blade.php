@extends('welcome')
@section('content')
<div class="container">
    @foreach ($orders as $order)
        <div class="aboutProduct">
            <form method="post" enctype="multipart/form-data" action="{{route('uploadOrder')}}">
                @csrf
                <div class="inCard flex jcsb">
                    <input type="hidden" name="idOrder" value="{{$order->id}}">

                    <div class="imgClass">
                        @if($order->product()->image != null)
                            <img src="{{asset('storage/app/public/'.$order->product()->image)}}" class="imgProduct"
                                 alt="" id="output">
                        @else
                            <img src="/public/img/noImage.png" class="imgProduct" alt="" id="output">
                        @endif
                        <div><input type="file" disabled name="image" value="{{$order->product()->image}}"></div>
                    </div>
                    <div class="aboutProductClass">

                        <div class="aboutProd flex jcsb aic">
                            <span class="nameDesc">Наименование заявки:</span>
                            <input type="text" disabled name="name" value="{{$order->product()->name}}"
                                   class="nameProduct">
                        </div>
                        <div class="aboutProd2 flex jcsb aic">
                            <span class="nameDesc">Цена заявки:</span>
                            <input type="text" disabled name="price"
                                   value="{{$order->product()->price * $order->product()->quantity}}"
                                   class="nameProduct">
                        </div>
                        <div class="aboutProd flex jcsb aic">
                            <span class="nameDesc">Статус:</span>
                            <select name="status_id" id="" class="nameProduct selectCategory">
                                @foreach($statuses as $status)
                                    @if($status->id == $order->status_id)
                                        <option value="{{$status->id}}" selected>
                                            {{$status->name}}
                                        </option>
                                    @else
                                        <option value="{{$status->id}}">
                                            {{$status->name}}
                                        </option>
                                    @endif
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
