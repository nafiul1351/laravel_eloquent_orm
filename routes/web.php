<?php

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
})->name('welcome');
Route::post('/add', [App\Http\Controllers\Inputtest::class, 'add'])->name('add');
Route::get('/view', [App\Http\Controllers\Inputtest::class, 'view'])->name('view');
Route::get('/update/data/{id}', [App\Http\Controllers\Inputtest::class, 'update'])->name('update');
Route::post('/update/data/{id}', [App\Http\Controllers\Inputtest::class, 'update2'])->name('update2');
Route::get('/delete/data/{id}', [App\Http\Controllers\Inputtest::class, 'delete'])->name('delete');
Route::get('/add_2', [App\Http\Controllers\Inputtest::class, 'add2'])->name('add2');
Route::post('/add_2', [App\Http\Controllers\Inputtest::class, 'add3'])->name('add3');
Route::get('/view_2', [App\Http\Controllers\Inputtest::class, 'view2'])->name('view2');
Route::get('/update/data_2/{id}', [App\Http\Controllers\Inputtest::class, 'update3'])->name('update3');
Route::post('/update/data_2/{id}', [App\Http\Controllers\Inputtest::class, 'update4'])->name('update4');
Route::get('/delete/data_2/{id}', [App\Http\Controllers\Inputtest::class, 'delete2'])->name('delete2');
