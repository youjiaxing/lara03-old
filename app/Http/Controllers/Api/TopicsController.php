<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\TopicRequest;
use App\Models\Topic;
use App\Models\User;
use App\Transformers\TopicTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TopicsController extends \App\Http\Controllers\Api\Controller
{
    public function store(TopicRequest $request, Topic $topic)
    {
        $topic->fill($request->all());
        $topic->user_id = $this->user()->id;
        $topic->save();

        return $this->response->item($topic, new TopicTransformer())->setStatusCode(201);
    }

    public function update(TopicRequest $request, Topic $topic)
    {
        $this->authorize('update', $topic);

        $topic->update($request->all());
        return $this->response->item($topic, new TopicTransformer());
    }

    public function destroy(Topic $topic)
    {
        $this->authorize('destroy', $topic);

        $topic->delete();

        return $this->response->noContent();
    }

    public function index(Request $request)
    {
        $query = Topic::query();

        if ($category_id = $request->category_id) {
            $query->where('category_id', $category_id);
        }

        switch ($request->order) {
            case 'recent':
                $query->recent();
                break;

            default:
                $query->recentReplied();
        }

        $topics = $query->paginate(20);
        return $this->response->paginator($topics, new TopicTransformer());
    }

    public function userIndex(Request $request, User $user)
    {
        $topics = $user->topics()->recent()->paginate(20);

        return $this->response->paginator($topics, new TopicTransformer());
    }
}