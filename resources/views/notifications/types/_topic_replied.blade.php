<div class="media">
    <div class="avatar media-left">
        <a href="{{ route('users.show', $notification->data['user_id']) }}">
            <img src="{{ $notification->data['user_avatar'] }}" alt="" class="media-object img-thumbnail"   style="width:48px;height:48px;">
        </a>
    </div>

    <div class="infos media-body">
        <div class="media-heading">
            <a href="{{ route('users.show', [$notification->data['user_id']]) }}">{{ $notification->data['user_name'] }}</a>
            评论了
            <a href="{{ $notification->data['topic_link'] }}">{{ $notification->data['topic_title'] }}</a>

            {{-- 回复删除按钮 --}}

        </div>
        <div class="reply-content">
            {!! $notification->data['reply_content'] !!}
        </div>

    </div>

    <div class="media-right meta text-nowrap text-nowrap">
        <span class="glyphicon glyphicon-clock"></span> {{ $notification->created_at->diffForHumans() }}
    </div>
</div>