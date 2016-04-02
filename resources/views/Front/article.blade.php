@extends('front.template')
@section('content')
    <div class="news-content">
        <div class="row">
            <article class="article-body">
                <h1>{{$article->title}}</h1>
                <div class="article-info">
                    <ul class="list-inline">
                        <li class="article-author">{{$article->user->name}}</li>
                        <li>{{$article->publish_date}}</li>
                        <li>{{$article->publish_time}}</li>
                    </ul>
                    <p>{{$article->intro}}</p>
                </div>
                <div>
                    {{$article->content}}
                </div>
            </article>
        </div>
    </div>
@endsection