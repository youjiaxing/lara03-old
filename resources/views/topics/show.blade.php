@extends('layouts.app')

@section('title', $topic->title)
@section('description', $topic->excerpt)

@section('content')
    <div class="col-md-3 hidden-sm hidden-xs author-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title text-center">作者: {{ $topic->user->name }}</h3>
            </div>
            <div class="panel-body">
                <div class="text-center">
                    <a href="{{ route('users.show', $topic->user->id) }}">
                        <img src="{{ $topic->user->avatar }}" class="img-thumbnail img-responsive" alt="Image" width="300px" height="300px">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-9 col-xs-12 topic-content">
        <div class="panel panel-default">
            <div class="panel-body">
                <h1 class="text-center">{{ $topic->title }}</h1>

                <div class="text-center article-meta">
                    {{ $topic->created_at->diffForHumans() }} · <span class="glyphicon glyphicon-comment"></span> {{ $topic->reply_count }}
                </div>

                <div class="topic-body">
                    {!! $topic->body !!}
                </div>

                <div class="operate">
                    <hr>
                    <a href="{{ route('topics.edit', [$topic->id]) }}" class="btn btn-default btn-xs"><span
                                class="glyphicon glyphicon-edit"></span> 编辑</a>
                    <a href="#" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-trash"></span> 删除</a>
                </div>
            </div>
        </div>
    </div>

@endsection
