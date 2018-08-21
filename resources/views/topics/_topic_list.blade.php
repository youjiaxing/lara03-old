@if (count($topics))
    <ul class="media-list">
        @foreach ($topics as $topic)
            <li class="media">
                <div class="media-left">
                    <a href="{{ route('users.show', [$topic->user_id]) }}">
                        <img src="{{ $topic->user->avatar }}" alt="" class="media-object img-thumbnail" style="width: 52px;height: 52px;" title="{{ $topic->user->name }}">
                    </a>
                </div>

                <div class="media-body">
                    <div class="media-heading">
                        <a href="{{ $topic->link() }}">
                            {{ $topic->title }}
                        </a>
                        <a href="{{ $topic->link() }}" class="pull-right">
                            <span class="badge">{{ $topic->reply_count }}</span>
                        </a>
                    </div>

                    <div class="meta">
                        <a href="{{ route('categories.show', [$topic->category->id]) }}">
                            <span class="glyphicon glyphicon-folder-open"></span>
                            {{ $topic->category->name }}
                        </a>

                        <span> • </span>

                        <a href="{{ route('users.show', [$topic->user_id]) }}">
                            <span class="glyphicon glyphicon-user"></span>
                            {{ $topic->user->name }}
                        </a>

                        <span> • </span>

                        <span class="glyphicon glyphicon-time"></span>
                        <span class="timeago">{{ $topic->updated_at->diffForHumans() }}</span>
                    </div>
                </div>
            </li>

            @if (!$loop->last)
                <hr>
            @endif
        @endforeach
    </ul>

@else
    <div class="empty-block">暂无数据 o(*￣︶￣*)o</div>
@endif
