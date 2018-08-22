@if (count($replies))
<ul class="list-group">
    @foreach ($replies as $reply)
        <li class="list-group-item">
            <a href="{{ $reply->topic->link(['#reply'.$reply->id]) }}" class="">
                {{ $reply->topic->title }}
            </a>
            
            <div class="reply-content" style="margin: 6px 0;">
                {!! $reply->content !!}
            </div>
            
            <div class="meta">
                <span class="glyphicon glyphicon-time">
                    <span class=""> 回复于 {{ $reply->created_at->diffForHumans() }}</span>
                </span>
            </div>
        </li>
    @endforeach
</ul>
@else
    <div class="empty-block">
        暂无数据 o(*￣︶￣*)o
    </div>

@endif

{!! $replies->appends(Request::except('page'))->render() !!}