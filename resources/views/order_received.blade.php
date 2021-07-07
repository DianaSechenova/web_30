@extends('layout')

@section('title', "Заказ Оформлен" )

@section('content')
    <!-- Blog Entries Column -->
    <div class="col-md-8">

        <!-- Blog Post -->
        <div style="width: 755px;padding-top: 20px; border: none;" class="card mb-4">
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
                    <tr  style="background: #6f42c1; color: #e2e6ea">
                        <td colspan="3"></td>
                        <td class="text-uppercase font-weight-bold">Количество: {{\Cart::getTotalQuantity()}}</td>
                        <td class="text-uppercase font-weight-bold" colspan="1">Cумма: {{\Cart::getTotal()}}</td>
                    </tr>
                @endif
                </tbody>
            </table>

            <h2 style="margin-top: 50px;">Контактные данные заказчика:</h2>
            <table class="table">
{{--                <thead class="thead" style="background: #6f42c1; color: #e2e6ea">--}}
                <tr>
                    <th >ФИО</th>
                    <td >{{$order->first_name}} {{$order->last_name}}</td>
                </tr>
                <tr>
                    <th >Email</th>
                    <td >{{$order->email}}</td>
                </tr>
                <tr>
                    <th >Телефон</th>
                    <td >{{$order->phone}}</td>
                </tr>
                <tr>
                    <th >Адрес</th>
                    <td >{{$order->address}}</td>
                </tr>
                <tr>
                    <th >Коментарий</th>
                    <td >{{$order->notes}}</td>
                </tr>
{{--                </thead>--}}
            </table>
            <input type="submit"
                   value="Оплатить онлайн"
                   class="btn btn-outline-secondary btn-lg btn-block p-2"
                   style="margin-top: 50px;">
        </div>
    </div>

@endsection

@section('side_bar')
    @include('sidebar')
@endsection


