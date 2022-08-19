<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\DashboardTransactionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*

| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->group(function(){
    Route::get('/', [MainController::class, 'index']);
    Route::get('/products', [MainController::class, 'index']);
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/dashboard/checkSlug', [DashboardProductController::class, 'checkSlug']);
});




Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/dashboard/customers', [DashboardController::class, 'customers']);

Route::get('/dashboard/transactions', [DashboardController::class, 'transactions']);

Route::resource('/dashboard/products', DashboardProductController::class);



Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'auth']);
Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth');
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);




Route::get('/{product:slug}', [MainController::class, 'show']);