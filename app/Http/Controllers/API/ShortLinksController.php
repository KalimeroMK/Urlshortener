<?php

    namespace App\Http\Controllers\API;

    use App\Http\Controllers\Controller;
    use App\Http\Requests\Link\StoreRequest;
    use App\Models\ShortLink;
    use Illuminate\Http\JsonResponse;

    class ShortLinksController extends Controller
    {

        /**
         * @return JsonResponse
         */
        public function index(): JsonResponse
        {
            return response()->success(ShortLink::latest()->take(10)->get());
        }

        /**
         * @param  StoreRequest  $request
         * @return JsonResponse
         */
        public function store(StoreRequest $request): JsonResponse
        {
            return response()->success(ShortLink::create($request->all()));
        }

        /**
         * @param $link
         * @return JsonResponse
         */
        public function shortenLink($link): JsonResponse
        {
            $url = ShortLink::whereShortUrl($link)->findOrFail();
            ShortLink::whereShortUrl($link)->update(['clicks' => $url->clicks + 1]);
            return response()->success($url->url);
        }

        /**
         * @return JsonResponse
         */
        public function topLinks(): JsonResponse
        {
            return response()->success(ShortLink::popular());
        }
    }
