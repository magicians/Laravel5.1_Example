@extends('front.template')
@section('content')
    <div class="content">
        <div id="carousel-news-generic" class="carousel slide" data-ride="carousel">
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
                        <img src="{{$carousel_news[$i]->page_image}}" alt="Carousel News">
                        <div class="carousel-caption">
                            {{$carousel_news[$i]->title}}
                        </div>
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
    </div>
@endsection