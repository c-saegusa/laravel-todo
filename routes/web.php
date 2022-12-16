<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\MemoController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'folder.user', 'prefix' => 'folder','as' => 'folders.'],function(){
Route::get('/top', [FolderController::class, 'top'])->name('top');
Route::get('/create', [FolderController::class, 'create'])->name('create');
Route::post('/store', [FolderController::class, 'store'])->name('store');
Route::get('/show/{folder}', [FolderController::class, 'show'])->name('show');
Route::get('/edit/{folder}', [FolderController::class, 'edit'])->name('edit');
Route::post('/update/{folder}', [FolderController::class, 'update'])->name('update');
Route::post('/destory/{folder}', [FolderController::class, 'destory'])->name('destory');
});

Route::group(['middleware' => 'memo.user', 'prefix' => 'memo','as' => 'memos.'],function(){
Route::get('/create/folder/{folder}', [MemoController::class, 'create'])->name('create');
Route::post('/store/folder/{folder}', [MemoController::class, 'store'])->name('store');
Route::get('/edit/{memo}', [MemoController::class, 'edit'])->name('edit');
Route::post('/update/{memo}', [MemoController::class, 'update'])->name('update');
Route::post('/destory/{memo}', [MemoController::class, 'destory'])->name('destory');
});