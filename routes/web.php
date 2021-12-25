<?php

use App\Http\Controllers\manager\ManagerController;
use App\Http\Controllers\User\OrderController as OrderControllerAlias;
use Illuminate\Support\Facades\Route;

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
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('order', OrderControllerAlias::class)
    ->middleware(['auth', 'role:user']);

Route::resource('list', ManagerController::class)
    ->middleware(['auth', 'role:manager']);


require __DIR__ . '/auth.php';
