<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\InstructionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ComplaintController;
use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\Admin\MainController;

use App\Http\Controllers\Page\UploadController;
use App\Http\Controllers\Page\PageController;

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

Route::get('/', [PageController::class, 'index'])->name('instruction');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/download/{file}', [PageController::class, 'download']);

Route::get('/view/{id}', [PageController::class, 'show']);

Route::get('/complaint/{id}', [ComplaintController::class, 'create'])->middleware('auth');

Route::resource('upload', UploadController::class)->middleware('auth');

Route::middleware(['role:admin'])->prefix('admin_panel')->group(function () {
        Route::get('/', [MainController::class, 'index'])->name('homeAdmin');
        Route::resource('category', CategoryController::class);
        Route::resource('instruction', InstructionController::class);
        Route::resource('user', UserController::class);
        Route::resource('complaint', ComplaintController::class);
        Route::resource('inquiry', InquiryController::class);
});