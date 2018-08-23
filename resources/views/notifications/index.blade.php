@extends('layouts.app')

@section('title')
我的通知
@stop

@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title text-center"><span class="glyphicon glyphicon-bell"></span> 我的通知</h3>
            </div>
            <div class="panel-body">

                @if ($notifications->count())
                    <div class="notification-list">
                    @foreach($notifications as $notification)
                        @include('notifications.types._'.snake_case(class_basename($notification->type)))
                    @endforeach
                    </div>

                    {!! $notifications->render() !!}
                @else
                    <div class="empty-block">
                        没有消息通知!
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection