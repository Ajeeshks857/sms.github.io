<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\StudentMarksController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'teachers', 'middleware' => 'auth'], function () {
    Route::get('/', [TeachersController::class, 'index']);
    Route::get('create', [TeachersController::class, 'addNew']);
    Route::post('add', [TeachersController::class, 'create']);
    Route::get('edit/{id}', [TeachersController::class, 'edit']);
    Route::delete('delete/{id}', [TeachersController::class, 'delete']);
    Route::post('update/{id}', [TeachersController::class, 'update']);
});

Route::group(['prefix' => 'students', 'middleware' => 'auth'], function () {
    Route::get('/', [StudentController::class, 'index']);
    Route::get('create', [StudentController::class, 'addNew']);
    Route::post('add', [StudentController::class, 'create']);
    Route::delete('delete/{id}', [StudentController::class, 'delete']);
    Route::get('edit/{id}', [StudentController::class, 'edit']);
    Route::post('update/{id}', [StudentController::class, 'update']);
    Route::delete('delete/{id}', [StudentController::class, 'delete']);

});

Route::group(['prefix' => 'marks', 'middleware' => 'auth'], function () {
    Route::get('/', [StudentMarksController::class, 'index']);
    Route::get('create', [StudentMarksController::class, 'addNew']);
    Route::post('add', [StudentMarksController::class, 'create']);
    Route::delete('delete/{id}', [StudentMarksController::class, 'delete']);
    Route::get('edit/{id}', [StudentMarksController::class, 'edit']);
    Route::post('update/{id}', [StudentMarksController::class, 'update']);
    Route::delete('delete/{id}', [StudentMarksController::class, 'delete']);

});
