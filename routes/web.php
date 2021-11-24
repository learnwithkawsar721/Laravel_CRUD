<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/todo-list/create',[HomeController::class,'create'])->name('todo-list-create');
Route::post('/todo-list/add',[HomeController::class,'add'])->name('todo-list-add');
Route::get('/todo-list/{id}/delete',[HomeController::class,'delete'])->name('todd-list-delete');
Route::get('/todo-list/{id}/edit',[HomeController::class,'edit'])->name('todo-list-edit');
Route::put('/todo-list/{id}/update',[HomeController::class,'update'])->name('todo-list-update');
