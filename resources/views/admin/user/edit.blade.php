@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-12">
                <h3>User
                    <small>» Edit User</small>
                </h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">User Edit Form</h3>
                    </div>
                    <div class="panel-body">

                        @include('admin.partials.errors')
                        @include('admin.partials.success')
                        <dl class="dl-horizontal">
                            <dt>Username</dt>
                            <dd>{{$user->name}}</dd>

                            <dt>Nickname</dt>
                            <dd>{{$user->nickname}}</dd>

                            <dt>Created at</dt>
                            <dd>{{$user->created_at}}</dd>

                            <dt>Role</dt>
                            @if($user->is_admin)
                                <dd>Administrator</dd>
                            @else
                                <dd>Author</dd>
                            @endif
                        </dl>
                        <div class="col-md-8">
                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-2">
                                    <button type="submit" class="btn btn-success"
                                            data-toggle="modal" data-target="#modal-change">
                                        <i class="glyphicon glyphicon-user"></i>
                                        Change role
                                    </button>
                                    <button type="button" class="btn btn-danger"
                                            data-toggle="modal" data-target="#modal-delete">
                                        <i class="glyphicon glyphicon-remove"></i>
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--Comfirm change role--}}
    <div class="modal fade" id="modal-change" tabIndex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Please Confirm</h4>
                </div>
                <div class="modal-body">
                    <p class="lead">
                        Are you sure you want to change the user's role?<br>
                        If you change the user to Admin, you can never changer him again!
                    </p>
                </div>
                <div class="modal-footer">
                    <form method="POST" action="{{ route('admin.user.update', $user->id) }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-times-circle"></i> Yes
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{--Comfirm delete user--}}
    <div class="modal fade" id="modal-delete" tabIndex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                    </button>
                    <h4 class="modal-title">Please Confirm</h4>
                </div>
                <div class="modal-body">
                    <p class="lead">
                        <i class="fa fa-question-circle fa-lg"></i>
                        Are you sure you want to delete this User?
                    </p>
                </div>
                <div class="modal-footer">
                    <form method="POST" action="{{ route('admin.user.destroy', $user->id) }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">Close
                        </button>
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-times-circle"></i> Yes
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
