<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|


Route::get('/', function () {
    return view('welcome');
});

*/

Route::get('admin/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // BLOG ADMIN ROUTES
    Route::get('/admin/blogs', 'App\Http\Controllers\AdminController@index')->name('blogs.index');
    Route::get('/admin/blogs/create', 'App\Http\Controllers\AdminController@createShow')->name('blogs.createShow');
    Route::get('/admin/blogs/{id}', 'App\Http\Controllers\AdminController@show')->name('blogs.show');
    Route::put('/admin/blogs/{id}', 'App\Http\Controllers\AdminController@updateBlog')->name('blogs.update');

    Route::post('/admin/blogs/store', 'App\Http\Controllers\AdminController@createBlog')->name('blogs.store');
    Route::delete('/admin/blogs', 'App\Http\Controllers\AdminController@deleteSelected')->name('blogs.destroy');
});

Route::get('/', 'App\Http\Controllers\BlogController@index')->name('users.blogs.index');
Route::get('/blogs/{id}', 'App\Http\Controllers\BlogController@show')->name('users.blogs.show');



require __DIR__.'/auth.php';


