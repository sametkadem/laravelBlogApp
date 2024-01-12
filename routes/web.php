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
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // BLOG ADMIN ROUTES
    Route::get('/admin/blogs', 'App\Http\Controllers\AdminController@index')->name('blogs.index');
    Route::get('/admin/blogs/create', 'App\Http\Controllers\AdminController@create')->name('blogs.create');
    Route::get('/admin/blogs/{id}', 'App\Http\Controllers\AdminController@show')->name('blogs.show');
    Route::post('/admin/blogs/store', 'App\Http\Controllers\AdminController@store')->name('blogs.store');
    Route::delete('/admin/blogs/{id}', 'AdminController@destroy');


    

});

require __DIR__.'/auth.php';


