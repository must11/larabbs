<?php

namespace App\Observers;

use App\Models\Reply;
use App\Notifications\TopicReplied;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class ReplyObserver
{
    public function created(Reply $reply)
    {   
        $topic =$reply->topic;
        $reply->topic->increment('reply_count', 1);

        $topic->user->notify(new TopicReplied($reply));

    }

    public function destroy(User $user, Reply $reply)
    {
        return $user->isAuthorOf($reply) || $user->isAuthorOf($reply->topic);
    }

    public function deleted(Reply $reply)
    {
        $reply->topic->decrement('reply_count', 1);
    }


}