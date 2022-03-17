<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controller\BlogController;

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

    Route::get('/blog/create', [BlogController::class, 'create'])->name('blog-create');
});

require __DIR__.'/auth.php';
