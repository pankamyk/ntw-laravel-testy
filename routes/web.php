<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserTestController;
use App\Http\Controllers\GroupController;

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


Route::get('/home',              [HomeController::class, 'index'])->name('home');
Route::get('/home/tests',        [UserTestController::class, 'index'])->name('users.tests');
Route::get('/home/{test}/solve', [UserTestController::class, 'create'])->name('users.tests.new');
Route::post('/home/{test}',      [UserTestController::class, 'store'])->name('users.tests.store');
Route::get('/home/{test}/show',  [UserTestController::class, 'show'])->name('users.tests.show');


Route::group(
   ['prefix' => 'admin', 'middleware' => 'is_admin']
   , function() {

   Route::get('/home', [HomeController::class, 'admin'])->name('admin.home');

   Route::resource('/users',     UserController::class);
   Route::resource('/groups',    GroupController::class);
   Route::resource('/tests',     TestController::class);
   Route::resource('/questions', QuestionController::class);
   Route::resource('/answers',   AnswerController::class)->only(['index', 'show', 'delete']);

   Route::get('/tests/{test}/groups',   [TestController::class, 'editGroups'])->name('tests.editGroup');
   Route::patch('/tests/{test}/groups', [TestController::class, 'updateGroups'])->name('tests.updateGroup');

   Route::get('/users/{user}/tests/edit',     [UserController::class, 'editTests'])->name('users.editTest');
   Route::patch('/users/{user}/tests/delete', [UserController::class, 'updateTests'])->name('users.updateTest');

});
