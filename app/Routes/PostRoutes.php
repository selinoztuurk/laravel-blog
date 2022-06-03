<?php

namespace App\Routes;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Uutkukorkmaz\RouteOrganizer\Contracts\RouteContract;

class PostRoutes implements RouteContract {

    public static function register(): void {
        Route::group(['prefix' => 'posts', 'as' => 'posts.'], function () {
            Route::get('/', [PostController::class, 'index'])->name('index');
            Route::get('{post}', [PostController::class, 'show'])->name('show');
        });
    }

}
