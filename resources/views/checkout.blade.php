@extends('layout')

@section('title', "Оформление заказа" )

@section('content')
    <!-- Blog Entries Column -->
    <div class="col-md-8">

    <!-- Blog Post -->
        <div style="width: 755px;padding-top: 20px; border: none;" class="card mb-4">
            <h2>Корзина</h2>
            <form id="check" method="post" action="{{route('checkout')}}">
                @csrf
                    @if($errors->any())
                        <div class="alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                @endif
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Имя:</span>
                    </div>
                    <input type="text" name="first_name" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Фамилия:</span>
                    </div>
                    <input type="text" name="last_name" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                </div>
{{--                <div class="input-group mb-3">--}}
{{--                    <div class="input-group-prepend">--}}
{{--                        <span class="input-group-text" id="inputGroup-sizing-default">Email:</span>--}}
{{--                    </div>--}}
{{--                    <input type="text" name="email" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">--}}
{{--                </div>--}}
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Телефон:</span>
                    </div>
                    <input type="tel" name="phone" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Адрес:</span>
                    </div>
                    <input type="text" name="address" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Коментарии:</span>
                    </div>
                    <textarea name="notes" class="form-control"></textarea>
                </div>

                <h2>Ваш заказ:</h2>
                <table class="table">
                    <thead class="thead" style="background: #6f42c1; color: #e2e6ea">
                    <tr>
                        <th scope="col">Превью</th>
                        <th scope="col">Название</th>
                        <th scope="col">Цена</th>
                        <th scope="col">Количество</th>
                        <th scope="col">Сумма</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!\Cart::isEmpty())
                        @foreach(\Cart::getContent() as $post)
                            <tr>
                                <td><img src="{{$post->attributes->image}}" width="70px" height="40px"></td>
                                <td>{{$post->name}}</td>
                                <td style="text-align: center;">{{$post->price}}</td>
                                <td style="text-align: center;">{{$post->quantity}}</td>
                                <td style="text-align: center;">{{$post->getPriceSum()}}</td>
                            </tr>
                        @endforeach
                        <tr  >
                            <td colspan="3"></td>
                            <td style="background: #6f42c1; color: #e2e6ea" class="text-uppercase font-weight-bold">Количество: {{\Cart::getTotalQuantity()}}</td>
                            <td style="background: #6f42c1; color: #e2e6ea" class="text-uppercase font-weight-bold" colspan="1">Cумма: {{\Cart::getTotal()}}</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
                <input type="submit"
                       value="Оформить Заказ"
                       class="btn btn-outline-secondary btn-lg btn-block p-2"
                       style="margin-top: 50px;">
            </form>
        </div>
    </div>

@endsection

@section('side_bar')
    @include('sidebar')
@endsection

