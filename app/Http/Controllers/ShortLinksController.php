<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\Link\StoreRequest;
    use App\Models\ShortLink;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Routing\Redirector;

    class ShortLinksController extends Controller
    {
        /**
         * @return Application|Factory|View
         */
        public function index()
        {
            $shortLinks = ShortLink::latest()->take(10)->get();
            return view('pages.shortenLinks', compact('shortLinks'));
        }

        /**
         * @param  StoreRequest  $request
         * @return RedirectResponse
         */
        public function store(StoreRequest $request): RedirectResponse
        {
            ShortLink::create($request->all());
            return redirect()->back()->with('success', 'Shorten Link Generated Successfully!');
        }

        /**
         * @param $link
         * @return Application|RedirectResponse|Redirector
         */
        public function shortenLink($link)
        {
            $url = ShortLink::whereShortUrl($link)->firstOrFail();
            ShortLink::whereShortUrl($link)->update(['clicks' => $url->clicks + 1]);
            if ($url->safe == false) {
                return view('pages.notification', compact('url'));
            } else {
                return redirect($url->url);
            }
        }

        /**
         * @return Application|Factory|View
         */
        public function topLinks()
        {
            $links = ShortLink::popular();
            return view('pages.popularLinks', compact('links'));
        }
    }
