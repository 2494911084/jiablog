<?php

namespace App\Observers;

use App\Models\Topic;

class TopicObserver
{

    /**
     * Handle the topic "created" event.
     *
     * @param  \App\Topic  $topic
     * @return void
     */
    public function created(Topic $topic)
    {
        $topic->category->updateTopicCount();
    }

    /**
     * Handle the topic "updated" event.
     *
     * @param  \App\Topic  $topic
     * @return void
     */
    public function updated(Topic $topic)
    {
        //
    }

    /**
     * Handle the topic "deleted" event.
     *
     * @param  \App\Topic  $topic
     * @return void
     */
    public function deleted(Topic $topic)
    {
        $topic->category->updateTopicCount();
    }

    /**
     * Handle the topic "restored" event.
     *
     * @param  \App\Topic  $topic
     * @return void
     */
    public function restored(Topic $topic)
    {
        //
    }

    /**
     * Handle the topic "force deleted" event.
     *
     * @param  \App\Topic  $topic
     * @return void
     */
    public function forceDeleted(Topic $topic)
    {
        //
    }
}
