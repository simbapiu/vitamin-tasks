<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/iniciar-sesion', function() {
    return view('login');
});

Route::controller(UserController::class)->group(function () {
    Route::post('login', 'authenticate');
});

Route::get('/tasks', function() {
    return view('tasks');
});


Route::group(['middleware' => ['jwt.verify']], function() {
    Route::controller(TaskController::class)->group(function () {
        Route::get('/taskslist', 'list')->name('taskslist');
        Route::get('/task/{id}/show', 'show')->name('show');
        Route::post('/task', 'store')->name('task');
        Route::post('/updateStatus', 'updateStatus')->name('updateStatus');
        Route::delete('/task/{id}', 'destroy')->name('deleteTask');
    });
});
