@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-6">
                <h3>Article
                    <small>» List</small>
                </h3>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">

                @include('admin.partials.errors')
                @include('admin.partials.success')

                <table id="posts-table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Carousel</th>
                        <th>Publish_at</th>
                        <th>Status</th>
                        <th data-sortable="false">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($articles as $article)
                        <tr>
                            <td>{{ $article->title }}</td>
                            <td>
                                @if($article->is_carousel)
                                    Yes
                                @endif
                            </td>
                            <td data-order="{{ $article->published_at->timestamp }}">
                                {{ $article->published_at->format('j-M-y H:i') }}
                            </td>
                            <td>
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
                            </td>
                            <td>
                                <a href="/admin/article/{{ $article->id }}" class="btn btn-xs btn-success">
                                    <i class="glyphicon glyphicon-eye-open"></i>
                                    View
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
            $("#posts-table").DataTable({
                order: [[2, "desc"]]
            });
        });
    </script>
@stop