@extends('author.layout')

@section('content')

    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-6">
                <h3>Tags
                    <small>» Listing</small>
                </h3>
            </div>
            @if(Auth::user()->is_admin)
                <div class="col-md-6 text-right">
                    <a href="/author/tag/create" class="btn btn-success btn-md">
                        <i class="fa fa-plus-circle"></i> New Tag
                    </a>
                </div>
            @endif
        </div>

        <div class="row">
            <div class="col-sm-12">

                @include('author.partials.errors')
                @include('author.partials.success')

                <table id="tags-table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Tag</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{ $tag->name }}</td>
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