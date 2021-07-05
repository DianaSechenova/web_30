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
                @if(!\Cart::isEmpty())
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
                        <td><a href="{{route('delete_from_cart', $post->id)}}" class="glow-button">Удалить</a></td>
                    </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
                <button href="#"
                   class="glow-button"
                    onclick="document.getElementById('check').submit()">Обновить корзину</button>
            </form>
        </div>

    </div>

@endsection

@section('side_bar')
    @include('sidebar')
@endsection
