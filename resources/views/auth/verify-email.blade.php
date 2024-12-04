@extends('welcome')
@section('title','Подтвердите вашу почту')

@section('content')
        <div class="container">
            <div class="flex jcc">
                <h3>Необходимо подтверждение e-mail</h3>
                <div>
                <a href="{{route('verification.send')}}">Отправить повторно</a>
                </div>
            </div>
        </div>
@endsection


