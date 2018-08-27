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
            @can('destroy', $reply)
            <div class="media-right">
                <form action="{{ route('replies.destroy', [$reply->id]) }}" method="post" role="form">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button type="submit" class="btn btn-link btn-xs"><span class="glyphicon glyphicon-trash"></span></button>
                </form>
            </div>
            @endcan
        </li>
    @endforeach
</ul>