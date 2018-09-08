<?php
namespace App\Transformers;
use App\Models\Reply;

class ReplyTransformer extends \League\Fractal\TransformerAbstract
{
    public function transform(Reply $reply)
    {
        return [
            'id' => $reply->id,
            'user_id' => (int) $reply->user_id,
            'topic_id' => (int) $reply->topic_id,
            'content' => $reply->content,
            'created_at' => $reply->created_at->toDateTimeString(),
            'updated_at' => $reply->updated_at->toDateTimeString(),
        ];
    }

    public function includeUser(Reply $reply)
    {
        return $this->item($reply->user, new \App\Transformers\UserTransformer());
    }
}