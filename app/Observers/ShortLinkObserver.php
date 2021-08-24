<?php

    namespace App\Observers;

    use App\Models\ShortLink;
    use Illuminate\Support\Str;

    class ShortLinkObserver
    {
        public function creating(ShortLink $shortLink)
        {
            $shortLink->short_url = Str::random(20);
        }
    }