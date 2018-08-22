<ul class="media-list">
    @foreach($replies as $reply)
        <li class="media" id="reply-{{ $reply->id }}">
            <div class="media-left">
                <a href="{{ route('users.show', [$reply->user_id]) }}">
                    <img src="{{ $reply->user->avatar }}" alt="" class="media-object img-thumbnail" style="width:48px;height:48px;">
                </a>
            </div>
            <div class="media-body">
                <div class="media-heading">
                    <a href="{{ route('users.show', [$reply->user_id]) }}">{{ $reply->user->name }}</a>
                    <span> •  </span>
                    <span class="meta">{{ $reply->created_at->diffForHumans() }}</span>
                </div>
                <div class="reply-content">
                    {!! $reply->content !!}
                </div>
            </div>
            <div class="media-right">
                <a href="#" class="">
                    <span class="glyphicon glyphicon-trash"></span>
                </a>
            </div>
        </li>
    @endforeach
</ul>