@extends('front.template')
@section('content')
    <div class="news-content">
        <div class="module-highlight">
            <div class="row">
                <div id="carousel-news-generic" class="carousel slide col-sm-12 col-md-6" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        @for ($i = 0; $i < count($carousel_news); $i++)
                            <li data-target="#carousel-news-generic" data-slide-to="{{$i}}"
                                @if($i==0)class="active" @endif></li>
                        @endfor
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        @for ($i = 0; $i < count($carousel_news); $i++)
                            <div class="item @if($i==0) active @endif">
                                <div class="responsive-image">
                                    <img src="{{$carousel_news[$i]->page_image}}" alt="Carousel News"
                                         class="img-responsive">
                                </div>
                                <div class="carousel-caption">
                                    {{$carousel_news[$i]->title}}
                                </div>
                                <a class="article-link" href="/article/{{$carousel_news[$i]->id}}"></a>
                            </div>
                        @endfor
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-news-generic" role="button" data-slide="prev">
                        <span class="iconfont iconfont-left">&#xe62c;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-news-generic" role="button" data-slide="next">
                        <span class="iconfont iconfont-right">&#xe662;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="col-sm-12 col-md-6">
                    @foreach($latest_news as $news)
                        <div class="module col-sm-6 col-lg-6">
                            <div class="responsive-image hidden-xs">
                                <img src="{{$news->page_image}}" alt="{{$news->title}}" class="img-responsive">
                            </div>
                            <div class="latest-caption">
                                <strong>{{$news->title}}</strong>
                            </div>
                            <div class="latest-intro visible-xs">
                                {{$news->intro}}
                            </div>
                            <a class="article-link" href="/article/{{$news->id}}"></a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="module-ads">
            <div class="row">
                @if($i=0)
                @endif
                @foreach($ads as $ad)
                    <div class="col-xs-12 col-sm-6 module-ad @if($i++==1) hidden-xs @endif">
                        <img src="{{$ad->image_path}}" alt="{{$ad->name}}" class="img-responsive ad-image">
                        <a class="article-link" href="http://{{$ad->url}}"></a>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="module-index-article">
            <div class="row">
                @foreach($index_articles as $index_article)
                    <div>
                        <h2 class="module-title">
                            <a href="/subject/{{$index_article->id}}" class="module-title-link">
                                {{$index_article->name}}
                            </a>
                        </h2>
                        <div class="article-layout-flex">
                            @foreach($index_article->articles as $article)
                                <div class="article-list col-xs-12 col-sm-4">
                                    <article class="article-item">
                                        <div class="article-image responsive-image">
                                            <img src="{{$article->page_image}}" alt="{{$article->title}}"
                                                 class="img-responsive">
                                        </div>
                                        <div class="article-text">
                                            <h3 class="article-title">{{$article->title}}</h3>
                                            <p class="article-intro">{{$article->intro}}</p>
                                        </div>
                                        <a class="article-link" href="/article/{{$article->article_id}}"></a>
                                    </article>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection