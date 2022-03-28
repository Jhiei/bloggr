<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BlogsController;
use App\Http\Controllers\ProfileController;

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
    Route::get('/feed', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/blog/create/{token}/{id}', [BlogsController::class, 'create'])->name('blog-create');
    Route::post('/blog/store', [BlogsController::class, 'store'])->name('blog-store');
    Route::post('/blog/update', [BlogsController::class, 'update'])->name('blog-update');

    Route::get('/profile/{name}/{id}', [ProfileController::class, 'create'])->name('profile-view');
});

require __DIR__.'/auth.php';
