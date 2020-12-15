<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function() {
    Route::post('login', [LoginController::class, 'authenticate'])->name('login.post');
    Route::get('login', [LoginController::class, 'index'])->name('login');

    Route::middleware('auth')->group(function() {
        Route::get('main', [MainController::class, 'index'])->name('main');
        Route::get('logout', [LoginController::class, 'logout'])->name('logout');
        Route::resource('articles', ArticleController::class);
        Route::get('articles.view/{id}', [ArticleController::class, 'showArticle'])->name('articles.view');
        Route::get('articles.delete/{id}', [ArticleController::class, 'deleteArticle'])->name('articles.delete');
    });
});



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

Route::get('/', [HomepageController::class, 'index']);
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::get('/categories/{category}', [HomepageController::class, 'getArticles'])->name('category');
Route::get('/{category}/{slug}', [HomepageController::class, 'singlePage'])->name('post');
Route::post('/mail', [ContactController::class, 'sendMail'])->name('mail');
Route::get('/{page}', [HomepageController::class, 'getPages'])->name('page');