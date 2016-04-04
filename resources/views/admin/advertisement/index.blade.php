@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-6">
                <h3>Advertisements
                    <small>» Listing</small>
                </h3>
            </div>
            <div class="col-md-6 text-right">
                <a href="/admin/ad/create" class="btn btn-success btn-md">
                    <i class="fa fa-plus-circle"></i> New Ads
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
                        <th>Advertisement</th>
                        <th>Publish at</th>
                        <th data-sortable="false">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($ads as $ad)
                        <tr>
                            <td>{{ $ad->name }}</td>
                            <td>{{ $ad->created_at }}</td>
                            <td>
                                <a href="/admin/ad/{{ $ad->id }}/edit" class="btn btn-xs btn-info">
                                    <i class="glyphicon glyphicon-pencil"></i> Edit
                                </a>
                                <a href="/admin/ad/{{ $ad->id }}" class="btn btn-xs btn-success">
                                    <i class="glyphicon glyphicon-eye-open"></i> Show
                                </a>
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