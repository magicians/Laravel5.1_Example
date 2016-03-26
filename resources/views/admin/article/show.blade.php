@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-lg-10 col-md-10">
                <h3>
                    {{$article->title}}
                </h3>
                <img src="{{$article->page_image}}" class="img img_responsive"
                     id="page-image-preview" style="max-height:100px">
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
                        Publish_at:
                        {{$article->published_at}}
                    </li>
                    <li>
                        <i class="glyphicon glyphicon-user"></i>
                        {{$article->user->pen_name}}
                    </li>
                </ul>
                <p>Status:
                    @if($article->is_checked===0)
                        <i class="glyphicon glyphicon-time"></i>
                        Under review
                    @elseif($article->is_checked===1)
                        <i class="glyphicon glyphicon-ok"></i>
                        Accepted
                    @else
                        <i class="glyphicon glyphicon-remove"></i>
                        Rejected
                    @endif
                </p>
                <p>Intro: {{$article->intro}}</p>
                <p>Carousel:
                    @if($article->is_carousel)
                        Yes
                    @else
                        No
                    @endif
                </p>
            </div>
        </div>
        <hr class="col-lg-10 col-md-10">
        <div class="row">
            <div class="col-lg-10 col-md-10">
                {!! $article->content !!}
            </div>
        </div>
        <div class="col-lg-10 col-md-10">
            <div class="row">
                <form class="form-horizontal" role="form" method="POST"
                      action="{{ route('admin.article.update', $article->id) }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="PUT">
                    <div class="col-md-8">
                        <div class="form-group">
                            @if($article->is_checked===0 || $article->is_checked===2)
                                <button type="submit" class="btn btn-success"
                                        name="action" value="approved">
                                    <i class="glyphicon glyphicon-ok"></i>
                                    Accepted?
                                </button>
                            @endif
                            @if($article->is_checked===0 || $article->is_checked===1)
                                <button type="submit" class="btn btn-warning"
                                        name="action" value="unapproved">
                                    <i class="glyphicon glyphicon-remove"></i>
                                    Rejected?
                                </button>
                            @endif
                            <button type="submit" class="btn btn-danger"
                                    name="action" value="review">
                                <i class="glyphicon glyphicon-time"></i>
                                Under review?
                            </button>
                            @if($article->is_checked===1)
                                @if($article->is_carousel)
                                    <button type="submit" class="btn btn-info"
                                            name="carousel" value="0">
                                        Remove carousel
                                    </button>
                                @else
                                    <button type="submit" class="btn btn-info"
                                            name="carousel" value="1">
                                        Set carousel
                                    </button>
                                @endif
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection