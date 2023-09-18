<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoListController;

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

Route::get('/', [TodoListController::class, 'index']);

Route::post('/editView/{id}', [TodoListController::class, 'editView'])->name('editView');

Route::get('/todoCompleted', [TodoListController::class, 'todoCompleted'])->name('todoCompleted');

Route::get('/todoPending', [TodoListController::class, 'todoPending'])->name('todoPending');

//Route::get('/', function () {
//    return view('welcome');
//});

Route::post('/saveItem', [TodoListController::class, 'saveItem'])->name('saveItem');

Route::post('/deleteItem/{id}', [TodoListController::class, 'deleteItem'])->name('deleteItem');

Route::post('/setComplete/{id}', [TodoListController::class, 'setComplete'])->name('setComplete');

Route::post('/editItem/{id}', [TodoListController::class, 'editItem'])->name('editItem');
