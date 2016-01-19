@extends('author.layout')

@section('content')
    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-6">
                <h3>Article
                    <small>» List</small>
                </h3>
            </div>
            <div class="col-md-6 text-right">
                <a href="/author/article/create" class="btn btn-success btn-md">
                    <i class="fa fa-plus-circle"></i> New Article
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">

                @include('author.partials.errors')
                @include('author.partials.success')

                <table id="posts-table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Intro</th>
                        <th>Publish_at</th>
                        <th>Status</th>
                        <th data-sortable="false">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($articles as $article)
                        <tr>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->intro }}</td>
                            <td data-order="{{ $article->published_at->timestamp }}">
                                {{ $article->published_at->format('j-M-y H:i') }}
                            </td>
                            <td>
                                @if($article->is_draft)
                                    <i class="glyphicon glyphicon-folder-close"></i>
                                    Draft
                                @elseif($article->is_checked===0)
                                    <i class="glyphicon glyphicon-time"></i>
                                    Awaiting Moderation
                                @elseif($article->is_checked===1)
                                    <i class="glyphicon glyphicon-ok"></i>
                                    Approved
                                @else
                                    <i class="glyphicon glyphicon-remove"></i>
                                    Unapproved
                                @endif
                            </td>
                            <td>
                                @if($article->is_checked==1)
                                    <button class="btn btn-xs disabled">
                                        <i class="glyphicon glyphicon-pencil"></i> Edit
                                    </button>
                                @else
                                    <a href="/author/article/{{ $article->id }}/edit" class="btn btn-xs btn-success">
                                        <i class="glyphicon glyphicon-pencil"></i> Edit
                                    </a>
                                @endif
                                <a href="/author/article/{{ $article->id }}" class="btn btn-xs btn-warning">
                                    <i class="glyphicon glyphicon-eye-open"></i> View
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