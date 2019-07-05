<?php

namespace App\Observers;

use App\Models\Url;

class LinkObserver
{
    /**
     * Handle the link "created" event.
     *
     * @param  \App\Link  $link
     * @return void
     */
    public function created(Url $link)
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
    public function updated(Url $link)
    {
        //
    }

    /**
     * Handle the link "deleted" event.
     *
     * @param  \App\Link  $link
     * @return void
     */
    public function deleted(Url $link)
    {
        //
    }

    /**
     * Handle the link "restored" event.
     *
     * @param  \App\Link  $link
     * @return void
     */
    public function restored(Url $link)
    {
        //
    }

    /**
     * Handle the link "force deleted" event.
     *
     * @param  \App\Link  $link
     * @return void
     */
    public function forceDeleted(Url $link)
    {
        //
    }
}
