@extends('author.layout')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-lg-10 col-md-10">
                <h3>
                    {{$article->title}}
                </h3>
                <ul class="list-inline">
                    @if($article->tags)
                        @foreach($article->tags as $tag)
                            <li>
                                <i class="glyphicon glyphicon-tag"></i>
                                {{$tag->name}}
                            </li>
                        @endforeach
                    @endif
                    <li>
                        <i class="glyphicon glyphicon-time"></i>
                        Publish At:
                        {{$article->published_at}}
                    </li>
                </ul>
            </div>
        </div>
        <hr class="col-lg-10 col-md-10">
        <div class="row">
            <div class="col-lg-10 col-md-10">
                {!! $article->content !!}
            </div>
        </div>
    </div>
@endsection