<div class="panel panel-default">
    <div class="panel-body">
        <a href="{{ route('topics.create') }}" class="btn btn-success btn-block"><span class="glyphicon glyphicon-pencil"></span> 新建帖子</a>
    </div>
</div>

@if (!$active_users->isEmpty())
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title text-center">活跃用户</h3>
        </div>
        <div class="panel-body active-users">
            <ul class="media-list">
            @foreach ($active_users as $active_user)
                <a class="media" href="{{ route('users.show', [$active_user->id]) }}">
                    <div class="media-left">
                        <img src="{{ $active_user->avatar }}" alt="" class="media-object" width="24px" height="24px">
                    </div>

                    <div class="media-body">
                        <span class="media-heading">{{ $active_user->name }}</span>
                    </div>
                </a>


                @endforeach
            </ul>
        </div>
    </div>


@endif

@if (!$links->isEmpty())
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title text-center">资源推荐</h3>
        </div>
        <div class="panel-body">
            <ul class="media-list">
                @foreach($links as $link)
                    <li class="media">
                        <a href="{{ $link->link }}">
                            <div class="media-body">{{ $link->title }}</div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif