@extends('layouts.master')
@section('content')
    <div id="main">

        <!-- Featured Post -->
        <article class="post featured">
            <header class="major">
                <span class="date">April 22, 2017 | Kateqoriya | Muellif</span>
                <h2><a href="#">And this is a<br />
                        massive headline</a></h2>
                <p>Aenean ornare velit lacus varius enim ullamcorper proin aliquam<br />
                    facilisis ante sed etiam magna interdum congue. Lorem ipsum dolor<br />
                    amet nullam sed etiam veroeros.</p>
            </header>
            <a href="#" class="image main"><img src="images/pic01.jpg" alt="" /></a>
            <ul class="actions special">
                <li><a href="#" class="button large">Full Story</a></li>
            </ul>
        </article>

        <!-- Posts -->
        <section class="posts">
            @foreach($articles as $article)
            <article>
                <header>
                    <span class="date">{{$article->created_at}} |
                    @foreach($article->getCategories as $category)
                        <a href="#">{{$category->category_name}}</a>
                        <span>&bullet;</span>
                    @endforeach

                    </span>
                    <h2><a href="#">{{$article->title}}</a></h2>
                </header>
                <a href="#" class="image fit"><img src="images/pic02.jpg" alt="" /></a>
                <p>Donec eget ex magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque venenatis dolor imperdiet dolor mattis sagittis magna etiam.</p>
                <ul class="actions special">
                    <li><a href="#" class="button">Full Story</a></li>
                </ul>
            </article>
            @endforeach
        </section>

        <!-- Footer -->
        <footer>
            <div class="pagination">
{{--                <!--<a href="#" class="previous">Prev</a>-->--}}
{{--                <a href="#" class="page active">1</a>--}}
{{--                <a href="#" class="page">2</a>--}}
{{--                <a href="#" class="page">3</a>--}}
{{--                <span class="extra">&hellip;</span>--}}
{{--                <a href="#" class="page">8</a>--}}
{{--                <a href="#" class="page">9</a>--}}
{{--                <a href="#" class="page">10</a>--}}
{{--                <a href="#" class="next">Next</a>--}}
                {{$articles->links()}}
            </div>
        </footer>

    </div>
@endsection
