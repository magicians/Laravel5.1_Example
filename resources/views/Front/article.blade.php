@extends('front.template')
@section('content')
    <div class="news-content">
        <div class="row">
            <article>
                <h1>{{$article->title}}</h1>
                <ul>
                    <li>{{$article->user->name}}</li>
                    <li>{{$article->published_at}}</li>
                </ul>
                <p></p>
                <p>{{$article->intro}}</p>
                <div>
                    {{$article->content}}
                </div>
            </article>
        </div>
    </div>
@endsection