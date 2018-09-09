<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Transformers\NotificationTransformer;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationsController extends Controller
{
    public function index()
    {
        $notifications = $this->user()->notifications()->paginate(20);
        return $this->response->paginator($notifications, new NotificationTransformer());
    }

    public function stats()
    {
        return $this->response()->array([
            'unread_count' => $this->user()->notification_count,
        ]);
    }

    public function read()
    {
        $this->user()->markAsRead();
        return $this->response->noContent();
    }

    public function readOne(DatabaseNotification $notification)
    {
        if ($notification->notifiable_id != $this->user()->id || $notification->notifiable_type != User::class) {
            return $this->response->errorBadRequest();
        }
        $notification->markAsRead();
        return $this->response->noContent();
    }
}
