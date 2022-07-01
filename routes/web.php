<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\ConsumerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;



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

Auth::routes();




Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', [MainController::class, 'index'])->name('index');
    Route::resource('consumers', ConsumerController::class);
    Route::resource('areas', AreaController::class);
    Route::get('consumer/export', [ConsumerController::class, 'export'])->name('consumers.export');
    Route::post('consumer/import', [ConsumerController::class, 'import'])->name('consumers.import');
});
