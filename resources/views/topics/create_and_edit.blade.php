@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/simditor.css') }}">
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
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
                        <label for="title" class="col-md-1 control-label">标题</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" id="title" placeholder="请填写标题" required value="{{ old('title', $topic->title) }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="category_id" class="col-md-1 control-label">分类</label>
                        <div class="col-md-10">
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
                        <label for="editor" class="col-md-1 control-label">内容</label>
                        {{--<div class="col-md-10">--}}
                            {{--<textarea required class="form-control" name="body" id="editor" rows="3" placeholder="请填入至少三个字符的内容">{{ old('body', $topic->body) }}</textarea>--}}
                        {{--</div>--}}

                        <div class="col-md-10">
                        <textarea name="body" hidden id="editor" placeholder="请填入至少三个字符的内容">{{ old('body', $topic->body) }}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-10 col-md-offset-1">
                            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Submit</button>
                        </div>
                    </div>
                </form>


            </div>

        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="{{ asset('js/module.js') }}"></script>
    <script src="{{ asset('js/hotkeys.js') }}"></script>
    <script src="{{ asset('js/uploader.js') }}"></script>
    <script src="{{ asset('js/simditor.js') }}"></script>

    <script>
        $(document).ready(function() {
            var editor = new Simditor({
                textarea: $('#editor'),
                upload: {
                    url: '{{ route('topics.upload_image') }}',
                    params: { _token: '{{ csrf_token() }}'},
                    fillKey: 'upload_file',
                    connectionCount: 3,
                    leaveConfirm: '文件上传中, 关闭此页面将取消上传.'
                },
                pasteImage: true,
            });
        })
    </script>

@endsection