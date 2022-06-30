<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\ConsumerController;
use App\Http\Controllers\UserController;



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
    return view('welcome');
})->name('home');

Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/', [MainController::class, 'index'])->name('index');
    Route::resource('consumers', ConsumerController::class);
    Route::resource('areas', AreaController::class);
    Route::get('consumer/export', [ConsumerController::class, 'export'])->name('consumers.export');
    Route::post('consumer/import', [ConsumerController::class, 'import'])->name('consumers.import');
});

Route::middleware('guest')->group(function () {
    Route::get('register', [UserController::class, 'create'])->name('register.create');
    Route::post('register', [UserController::class, 'store'])->name('register.store');
    Route::get('login', [UserController::class, 'login_create'])->name('login.create');
    Route::post('login', [UserController::class, 'login'])->name('login');
});


Route::get('logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');
