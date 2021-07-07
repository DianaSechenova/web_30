@extends('layout')

@section('title', "Корзина" )

@section('content')
    <!-- Blog Entries Column -->
    <div class="col-md-8">

        @if(\Illuminate\Support\Facades\Session::has('flash'))
            <br>
            <h2><mark>{{\Illuminate\Support\Facades\Session::get('flash')}}</mark></h2>
            <br>
        @endif
        <!-- Blog Post -->
        <div style="width: 755px;padding-top: 20px; border: none;" class="card mb-4">
                <h2>Корзина</h2>
            @if(!\Cart::isEmpty())
            <form id="check" method="post" action="{{route('update_cart')}}">
                @csrf
                <table class="table">
                <thead class="thead" style="background: #6f42c1; color: #e2e6ea">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Превью</th>
                    <th scope="col">Название</th>
                    <th scope="col">Цена</th>
                    <th scope="col">Количество</th>
                    <th scope="col">Сумма</th>
                    <th scope="col">Удалить</th>
                </tr>
                </thead>
                <tbody>
                    @foreach(\Cart::getContent() as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td><img src="{{$post->attributes->image}}" width="70px" height="40px"></td>
                        <td>{{$post->name}}</td>
                        <td style="text-align: center;">{{$post->price}}</td>
                        <td style="text-align: center;">
                            <input type="number"
                                   name="items [{{$post->id}}]"
                                   value="{{$post->quantity}}">
                        </td>
                        <td style="text-align: center;">{{$post->getPriceSum()}}</td>
                        <td><a href="{{route('delete_from_cart', $post->id)}}" class="btn glow-button">Удалить</a></td>
                    </tr>
                    @endforeach
                    <tr  >
                        <td colspan="4"></td>
                        <td style="background: #6f42c1; color: #e2e6ea" class="text-uppercase font-weight-bold">Количество: {{\Cart::getTotalQuantity()}}</td>
                        <td style="background: #6f42c1; color: #e2e6ea" class="text-uppercase font-weight-bold" colspan="2">Cумма: {{\Cart::getTotal()}}</td>
                    </tr>

                </tbody>
            </table>
                <div class="d-flex">
                    <button type="button"
                            href="#"
                            class="btn glow-button ml-auto p-2"
                            onclick="document.getElementById('check').submit()"> Обновить корзину
                    </button>
                </div>

            </form>
            <a
                    href="{{route('checkout')}}"
                    class="btn btn-outline-secondary btn-lg btn-block  p-2"
                    style="margin-top: 50px;">Перейти к оформлению заказа
            </a>
            @else
                <p>Ваша корзина пуста</p>
            @endif
        </div>
    </div>

@endsection

@section('side_bar')
    @include('sidebar')
@endsection
