<?php

    use App\Http\Controllers\Api\ShortLinksController;
    use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register API routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | is assigned the "api" middleware group. Enjoy building your API!
    |
    */

    Route::get('/', [ShortLinksController::class, 'index']);
    Route::post('/generate-shorten-link', [ShortLinksController::class, 'store'])->name('api.generate.shorten.link.post');
    Route::get('/toplink', [ShortLinksController::class, 'topLinks'])->name('api.topLinks');
    // this link mast be last
    Route::get('{link}', [ShortLinksController::class, 'shortenLink'])->name('api.shorten.link');

