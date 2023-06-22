<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\NewsController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {

    // --- News --- \\
    Route::get('all-news', [NewsController::class,'allNews'])->name('getAllNews');
    Route::get('create-news',[NewsController::class,'addNews'])->name('getAddNews');

    // --- Category --- \\
    Route::get('all-category', [CategoryController::class,'allCategory'])->name('getAllCategory');
    Route::get('create-category', [CategoryController::class,'addCategory'])->name('getCategoryAdd');
    Route::post('store-category', [CategoryController::class,'storeCategory'])->name('getStoreCategory');
    Route::get('view-category/{id}', [CategoryController::class,'viewCategory'])->name('getViewCategory');
    Route::post('update-category', [CategoryController::class,'updateCategory'])->name('getUpdateCategory');
    Route::post('category-status-update', [CategoryController::class, 'deleteCategory'])->name('getDeleteCategory');
    Route::post('delete-category', [CategoryController::class, 'statusCategory'])->name('getStatusCategory');
});


require __DIR__.'/auth.php';
