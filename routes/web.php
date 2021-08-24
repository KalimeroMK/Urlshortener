<?php

    use App\Http\Controllers\ShortLinksController;
    use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */

    Route::get('/', [ShortLinksController::class, 'index']);
    Route::post('/generate-shorten-link', [ShortLinksController::class, 'store'])->name('generate.shorten.link.post');
    Route::get('/toplink', [ShortLinksController::class, 'topLinks'])->name('topLinks');
    Route::get('{link}', [ShortLinksController::class, 'shortenLink'])->name('shorten.link');



