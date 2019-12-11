<?php

namespace App\Observers;

use App\Models\Topic;
use App\Handlers\TranslateHandler;
use App\Jobs\TranslateSlug;


// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class TopicObserver
{
    public function creating(Topic $topic)
    {
        //
    }

    public function saving(Topic $topic)
    {
        $topic->body = clean($topic->body,'user_topic_body');
        $topic->excerpt = make_excerpt($topic->body);
    }

    public function saved(Topic $topic)
    {
        dispatch(new TranslateSlug($topic));

    }

    public function updating(Topic $topic)
    {
        //
    }
}
