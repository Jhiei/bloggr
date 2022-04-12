<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TagsController;

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

Route::get('/', function () {
    return redirect(route('login'));
})->name('rdr');

Route::middleware(['auth'])->group(function() {
    Route::get('/feed', [DashboardController::class, 'create'])->name('dashboard');

    Route::get('/blog/create/{token}/{id}', [BlogsController::class, 'create'])->name('blog-create');
    Route::post('/blog/store', [BlogsController::class, 'store'])->name('blog-store');
    Route::post('/blog/update', [BlogsController::class, 'update'])->name('blog-update');
    Route::get('/blog/view/{id}/{title}', [BlogsController::class, 'view'])->name('blog-view');

    Route::get('/profile/{name}/{id}', [ProfileController::class, 'create'])->name('profile-view');

    Route::get('/settings', [SettingsController::class, 'create'])->name('settings-view');
    Route::post('/settings/edit-profile', [SettingsController::class, 'update'])->name('settings-edit-profile');

    Route::post('/tag/save', [TagsController::class, 'save'])->name('tags-save');
});

require __DIR__.'/auth.php';
