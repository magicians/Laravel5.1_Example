@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-12">
                <h3>Tags
                    <small>» Create New Tag</small>
                </h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">New Tag Form</h3>
                    </div>
                    <div class="panel-body">

                        @include('admin.partials.errors')

                        <form class="form-horizontal" role="form" method="POST" action="/admin/tag">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label for="tag" class="col-md-3 control-label">Tag name</label>

                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="name" id="tag"
                                           value="{{ $name }}" autofocus required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Show index?</label>
                                <div class="col-md-3">
                                    <label class="radio-inline">
                                        <input name="show_index" id="radio1" value="yes" type="radio">
                                        Yes
                                    </label>
                                    <label class="radio-inline">
                                        <input name="show_index" id="radio2" value="no" checked="checked" type="radio">
                                        No
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-7 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary btn-md">
                                        <i class="glyphicon glyphicon-floppy-disk"></i>
                                        Add New Tag
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop