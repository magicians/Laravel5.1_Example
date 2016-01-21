@extends('admin.layout')

@section('content')

    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-6">
                <h3>Users
                    <small>» Listing</small>
                </h3>
            </div>
            <div class="col-md-6 text-right">
                <a href="/admin/user/create" class="btn btn-success btn-md">
                    <i class="fa fa-plus-circle"></i> Add User
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">

                @include('admin.partials.errors')
                @include('admin.partials.success')

                <table id="tags-table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Username/Nickname</th>
                        <th>Status</th>
                        <th data-sortable="false">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }} / {{$user->nick_name}}</td>
                            @if($user->is_admin)
                                <td>Admin</td>
                            @else
                                <td>Author</td>
                            @endif
                            <td>
                                @if($user->is_admin)
                                    <button class="btn btn-xs disabled">
                                        <i class="glyphicon glyphicon-pencil"></i> Edit
                                    </button>
                                @else
                                    <a href="/admin/user/{{ $user->id }}/edit" class="btn btn-xs btn-info">
                                        <i class="glyphicon glyphicon-pencil"></i> Edit
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $(function () {
            $("#tags-table").DataTable({});
        });
    </script>
@stop