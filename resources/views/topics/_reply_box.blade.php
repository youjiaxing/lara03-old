@include('common.error')


<div class="reply-box">
    <form action="{{ route('replies.store') }}" method="post" role="form">
        {{ csrf_field() }}
        <input type="hidden" name="topic_id" value="{{ $topic->id }}">

        <div class="form-group">
            <textarea class="form-control" name="content" id="" rows="3" placeholder="分享你的想法"></textarea>
        </div>

        <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-comment"></span> 回复</button>
    </form>
</div>

<hr>