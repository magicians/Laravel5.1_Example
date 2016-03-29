@extends('front.template')
@section('content')
    <div class="news-content">
        <div class="row">
            <div class="article-layout-flex">
                @foreach($articles as $article)
                    <div class="article-item col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="article_image responsive-image">
                            <img src="{{$article->page_image}}" alt="{{$article->title}}" class="img-responsive">
                        </div>
                        <div class="article_content">
                            <h3 class="article_title">{{$article->title}}</h3>
                            <p class="article_intro">{{$article->intro}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection