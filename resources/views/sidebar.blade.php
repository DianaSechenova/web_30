
<!-- Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Search Widget -->
            <div class="card my-4">
                <h5 class="card-header">Курсы валют</h5>
{{--                <div class="card-body">--}}
                <ul class="list-group list-group-flush">
                  @inject('currency', "App\Models\Currency")
                    {{$currency->get_currency()}}
                </ul>
{{--                </div>--}}
            </div>

            <div class="card my-4">
                {{--                @inject('networks', "App\Models\Network")--}}
                <h5 class="card-header">Советуем почитать:</h5>
                <div class="card-body" style="display: flex; justify-content: space-around;">
                    @inject('post', "\App\Models\Post")
                    @foreach($post->getRandomPost() as $p)
                      <a href="{{route('single_post', $p->id)}}">{{$p->title}}</a>
                    @endforeach
{{--                    {{$post->getRandomPost()->title}}--}}
                </div>
            </div>

<!-- Categories Widget -->
<div class="card my-4">
    <h5 class="card-header">Категории </h5>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                    @inject('categories', "\App\Models\Category")
                    @foreach($categories->show_categories() as $category)
                        <li>
                            <a href="{{route('post_by_category', $category->key)}}">{{$category->title}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>

</div>
{{--authors--}}
<div class="card my-4">
    @inject('authors', "\App\Models\Author")
    <h5 class="card-header">Лучшие авторы (из {{$authors->show_count_authors()}} )</h5>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled mb-0">

                    @foreach($authors->show_authors() as $author)
                        <li>
                            <a href="{{route('post_by_author', $author->key)}}">{{$author->name}}</a>

                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
</div>
<!-- Side Widget -->
<div class="card my-4">
    {{--                @inject('networks', "App\Models\Network")--}}
    <h5 class="card-header">Мы в соцсетях</h5>
    <div class="card-body" style="display: flex; justify-content: space-around;">
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

</div>
