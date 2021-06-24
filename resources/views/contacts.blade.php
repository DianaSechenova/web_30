@extends('layout')

@section('title', 'CONTACT')

@section('content')

    <!-- Blog Entries Column -->
    <div class="col-md-8">
        <h1 class="my-4">Наши контакты:</h1>
        <ul class="nav-item">
            @foreach($contacts as $contact)
                <li>{{$contact->title}}: {{$contact->value}}</li>
            @endforeach
        </ul>

        <div id="wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3">
            <div id="map-9cd199b9cc5410cd3b1ad21cab2e54d3"></div><script>(function () {
                    var setting = {"height":400,"width":740,"zoom":17,"queryString":"улица Дерибасовская, Одесса, Одесская область, Украина","place_id":"EmTRg9C70LjRhtCwINCU0LXRgNC40LHQsNGB0L7QstGB0LrQsNGPLCDQntC00LXRgdGB0LAsINCe0LTQtdGB0YHQutCw0Y8g0L7QsdC70LDRgdGC0YwsINCj0LrRgNCw0LjQvdCwIi4qLAoUChIJYbz8HZgxxkARcM1dPuGX4w4SFAoSCUNMhguKMcZAEWwX8ozij58S","satellite":false,"centerCoord":[46.48411431672505,30.738844899999975],"cid":"0xee397e13e5dcd70","lang":"ru","cityUrl":"/ukraine/odessa","cityAnchorText":"Карта [CITY1], Черноморское побережье Украины, Украина","id":"map-9cd199b9cc5410cd3b1ad21cab2e54d3","embed_id":"530661"};
                    var d = document;
                    var s = d.createElement('script');
                    s.src = 'https://1map.com/js/script-for-user.js?embed_id=530661';
                    s.async = true;
                    s.onload = function (e) {
                        window.OneMap.initMap(setting)
                    };
                    var to = d.getElementsByTagName('script')[0];
                    to.parentNode.insertBefore(s, to);
                })();</script><a href="https://1map.com/ru/map-embed">1 Map</a></div>
    </div>
@endsection
@section('side_bar')
    <div class="card my-4" style="height: 350px">
        {{--                @inject('networks', "App\Models\Network")--}}
        <h5 class="card-header">Мы в соцсетях</h5>
        <div class="card-body" >
            <a href="#"><img src="/icon/i.png"></a>
            <a href="#"><img src="/icon/f.png"></a>
            <a href="#"><img src="/icon/t.png"></a>
            <a href="#"><img src="/icon/g.png"></a>

            {{--                    <ul>--}}
            {{--                    @foreach($networks as $network)--}}
            {{--                        <li>{{$network->name}}</li>--}}
            {{--                        <li>{{$network->link}}</li>--}}
            {{--                    @endforeach--}}
            {{--                    </ul>--}}
        </div>
    </div>
@endsection
