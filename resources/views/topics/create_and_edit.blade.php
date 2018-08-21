@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">

            <div class="panel-body">
                @if ($topic->id)
                    <form action="{{ route('topics.update', [$topic->id]) }}" method="post" class="form-horizontal" role="form"></form>
                    {{ method_field('PATCH') }}
                @else
                    <form action="{{ route('topics.store') }}" method="post" class="form-horizontal" role="form">
                @endif
                    <legend class="text-center"><span class="glyphicon glyphicon-edit"></span>
                        @if ($topic->id)
                            新建话题
                        @else
                            编辑话题
                        @endif
                    </legend>

                    @include('common.error')

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">标题</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" id="title" placeholder="请填写标题" required value="{{ old('title', $topic->title) }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="category_id" class="col-sm-2 control-label">分类</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="category_id" name="category_id" required>
                                @empty(old('category_id', $topic->category))
                                    <option value="" hidden disabled selected>请选择分类</option>
                                @endempty

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $topic->category) == $category->id ? ' selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="body" class="col-sm-2 control-label">内容</label>
                        <div class="col-sm-10">
                            <textarea required class="form-control" name="body" id="body" rows="3" placeholder="请填入至少三个字符的内容">{{ old('body', $topic->body) }}</textarea>
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Submit</button>
                        </div>
                    </div>
                </form>


            </div>

        </div>
    </div>
</div>

@endsection