<?php

use App\Http\Controllers\UsersController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\PollController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/main', function () {
    return view('main');
})->name('main');
Route::get('/login', [UsersController::class, 'login'])->name('login');
Route::get('/reg', [UsersController::class, 'reg'])->name('reg');
Route::post('/auth', [UsersController::class, 'auth'])->name('auth');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/client', [ClientController::class, 'index'])->name('client.index');
    Route::get('/logout', [UsersController::class, 'logout'])->name('logout');
    Route::get('/client/forms', [PollController::class, 'index'])->name('client.forms');
    Route::post('/polls/{form}/vote', [PollController::class, 'vote'])->name('polls.vote');
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/new_form', [AdminController::class, 'new_form'])->name('admin.new_form');
        Route::get('/forms', [AdminController::class, 'forms'])->name('admin.forms');
        Route::post('/admin/form_finish/{form}', [AdminController::class, 'form_finish'])->name('admin.form_finish')->middleware('admin');
        Route::post('/admin/form_create', [FormController::class, 'create'])->name('admin.form_create');
    });
});
Route::post('/user/store', [UsersController::class, 'store'])->name('user.store');
