@extends('admin.layout')

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
                        Publish_at:
                        {{$article->published_at}}
                    </li>
                    <li>
                        <i class="glyphicon glyphicon-user"></i>
                        {{$article->user->pen_name}}
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
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection