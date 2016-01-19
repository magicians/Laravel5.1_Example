@extends('author.layout')

@section('styles')
    <link href="/assets/pickadate/themes/default.css" rel="stylesheet">
    <link href="/assets/pickadate/themes/default.date.css" rel="stylesheet">
    <link href="/assets/pickadate/themes/default.time.css" rel="stylesheet">
    <link href="/assets/selectize/css/selectize.css" rel="stylesheet">
    <link href="/assets/selectize/css/selectize.bootstrap3.css" rel="stylesheet">
@stop

@section('content')
    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-12">
                <h3>Articles
                    <small>» Add New Article</small>
                </h3>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">New Article Form</h3>
                    </div>
                    <div class="panel-body">

                        @include('author.partials.errors')

                        <form class="form-horizontal" role="form" method="POST"
                              action="{{ route('author.article.store') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="title" class="col-md-2 control-label">
                                            Title
                                        </label>

                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="title" autofocus id="title"
                                                   value="{{old('title')}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle" class="col-md-2 control-label">
                                            Introduction
                                        </label>

                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="intro" id="intro"
                                                   value="{{old('intro')}}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="content" class="col-md-2 control-label">
                                            Content
                                        </label>

                                        <div class="col-md-10">
                                            <textarea class="form-control" name="content_mark" rows="14"
                                                      id="content_mark">{{old('content_mark')}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="publish_date" class="col-md-3 control-label">
                                            Publish Date
                                        </label>

                                        <div class="col-md-8">
                                            <input class="form-control" name="publish_date" id="publish_date"
                                                   type="text"
                                                   value="{{ $fields['publish_date'] }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="publish_time" class="col-md-3 control-label">
                                            Publish Time
                                        </label>

                                        <div class="col-md-8">
                                            <input class="form-control" name="publish_time" id="publish_time"
                                                   type="text"
                                                   value="{{ $fields['publish_time'] }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-3">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="is_draft" checked>
                                                    Draft?
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tags" class="col-md-3 control-label">
                                            Tags
                                        </label>

                                        <div class="col-md-8">
                                            <select name="tags[]" id="tags" class="form-control" multiple>
                                                @foreach ($allTags as $name=>$id)
                                                    <option value="{{ $id }}">
                                                        {{ $name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class="col-md-10 col-md-offset-2">
                                        <button type="submit" class="btn btn-primary btn-lg">
                                            <i class="fa fa-disk-o"></i>
                                            Save New Article
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')
    <script src="/assets/pickadate/picker.js"></script>
    <script src="/assets/pickadate/picker.date.js"></script>
    <script src="/assets/pickadate/picker.time.js"></script>
    <script src="/assets/selectize/selectize.min.js"></script>
    <script>
        $(function () {
            $("#publish_date").pickadate({
                min: new Date(),
                format: "mmm-d-yyyy"
            });
            $("#publish_time").pickatime({
                format: 'HH:i',
                formatLabel: 'HH:i'
            });
            $("#tags").selectize({
                placeholder: "add tag"
            });
        });
    </script>
@stop
