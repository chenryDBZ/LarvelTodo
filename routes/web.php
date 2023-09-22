<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoListController;

Route::get('/', [TodoListController::class, 'index']);

Route::get('/editView/{id}', [TodoListController::class, 'editView'])->name('editView');

Route::get('/todoCompleted', [TodoListController::class, 'todoCompleted'])->name('todoCompleted');

Route::get('/todoPending', [TodoListController::class, 'todoPending'])->name('todoPending');

Route::post('/saveItem', [TodoListController::class, 'saveItem'])->name('saveItem');

Route::post('/deleteItem/{id}', [TodoListController::class, 'deleteItem'])->name('deleteItem');

Route::post('/setComplete/{id}', [TodoListController::class, 'setComplete'])->name('setComplete');

Route::post('/editItem/{id}', [TodoListController::class, 'editItem'])->name('editItem');
