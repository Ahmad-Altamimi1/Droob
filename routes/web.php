<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CVController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\ArticleTypeController;
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





// Route::get('/dashboard', function () {
//     return view('pages.dashboard');
// })->name('dashboard');

Route::prefix('admin')->name('admin.')->group(
    function () {
        Route::view('/login', 'pages.login')->name('login');
        Route::post('/login_handler', [AdminController::class, 'loginHandler'])->name('login_handler');
      
        Route::middleware(['auth:admin'])->group(
            function () {

Route::resource('admins', AdminController::class);
Route::resource('users', UserController::class);
Route::resource('articleType', ArticleTypeController::class);
Route::resource('articles', ArticleController::class);
Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
 Route::post('/logout_handler', [AdminController::class, 'logoutHandler'])->name('logout_handler');

            }
        );  
    }
);

Route::get('/download-cv/{id?}', [ArticleController::class, 'download'])->name('download-cv');
Route::get('/', [ArticleController::class, 'home'])->name('home');
Route::get('/details/{id}', [ArticleController::class, 'details'])->name('details');


Route::get('users/{id}/download-cv', [UserController::class,'downloadCV'])->name('users.downloadCV');


require __DIR__.'/auth.php';
// require __DIR__.'/admin.php';
