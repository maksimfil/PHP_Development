<?php
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\GuestbookController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'execute']);
Route::post('/', [HomeController::class, 'execute_post']);

Route::get('/register', function () {
    return view('register');
});
Route::post('/register', [RegisterController::class, 'save']);

//Route::get('/login', view('login'));
Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [LoginController::class, 'sign']);

Route::get('/logout', [LogoutController::class, 'execute']);

Route::get('/admin', [AdminController::class, 'execute']);



Route::get('/guestbook', [GuestbookController::class, 'execute']);
Route::post('/guestbook', [GuestbookController::class, 'execute']);
