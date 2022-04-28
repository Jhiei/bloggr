<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\CommentsController;

use App\Http\Controllers\AdminController;

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
    Route::post('/blog/like', [BlogsController::class, 'like'])->name('blog-like');
    Route::post('/blog/unlike', [BlogsController::class, 'unlike'])->name('blog-unlike');

    Route::post('/comment/store', [CommentsController::class, 'store'])->name('comments-store');

    Route::get('/profile/{name}/{id}', [ProfileController::class, 'create'])->name('profile-view');
    Route::get('/profile/view/{name}/{id}', [ProfileController::class, 'other_user_view'])->name('user-profile-view');
    Route::post('/profile/follow', [ProfileController::class, 'follow'])->name('user-follow');
    Route::post('/profile/unfollow', [ProfileController::class, 'unfollow'])->name('user-unfollow');

    Route::get('/settings', [SettingsController::class, 'create'])->name('settings-view');
    Route::post('/settings/edit-profile', [SettingsController::class, 'update'])->name('settings-edit-profile');

    Route::post('/tag/save', [TagsController::class, 'save'])->name('tags-save');
});

Route::middleware(['auth', 'admin'])->group(function() {
    Route::get('/admin/dashboard', [AdminController::class, 'create'])->name('admin-dashboard');

    Route::get('/admin/manage/users', [AdminController::class, 'users'])->name('admin-manage-users');
    Route::post('/admin/manage/users/save-profile', [ProfileController::class, 'update'])->name('admin-manage-users-save');
    Route::post('/admin/manage/users/remove-user', [AdminController::class, 'remove_user'])->name('admin-manage-users-remove');
});

require __DIR__.'/auth.php';
