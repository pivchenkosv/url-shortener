<?php

namespace App\Observers;

use App\Models\Link;

class LinkObserver
{
    /**
     * Handle the link "created" event.
     *
     * @param  \App\Link  $link
     * @return void
     */
    public function created(Link $link)
    {
        $link->code = getShortUrlById($link->id);
        $link->save();
    }

    /**
     * Handle the link "updated" event.
     *
     * @param  \App\Link  $link
     * @return void
     */
    public function updated(Link $link)
    {
        //
    }

    /**
     * Handle the link "deleted" event.
     *
     * @param  \App\Link  $link
     * @return void
     */
    public function deleted(Link $link)
    {
        //
    }

    /**
     * Handle the link "restored" event.
     *
     * @param  \App\Link  $link
     * @return void
     */
    public function restored(Link $link)
    {
        //
    }

    /**
     * Handle the link "force deleted" event.
     *
     * @param  \App\Link  $link
     * @return void
     */
    public function forceDeleted(Link $link)
    {
        //
    }
}
