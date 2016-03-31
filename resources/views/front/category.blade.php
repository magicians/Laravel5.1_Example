@extends('front.template')
@section('content')
    <div class="news-content">
        <div class="row">
            <div class="article-layout-flex">
                @foreach($articles as $article)
                    <div class="article-list col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <article class="article-item">
                            <div class="article-image responsive-image">
                                <img src="{{$article->page_image}}" alt="{{$article->title}}" class="img-responsive">
                            </div>
                            <div class="article-text">
                                <h3 class="article-title">{{$article->title}}</h3>
                                <p class="article-intro">{{$article->intro}}</p>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection