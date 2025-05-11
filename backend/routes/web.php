<?php


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyBooksController;
use App\Http\Controllers\ProductController;

Route::resource('products', ProductController::class);
Route::get('product', [ProductController::class, 'index'])->name('product');
Route::get('/product/{id}', [ProductController::class,'show'])->name('product.show');


Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
->middleware('guest')
->name('login');

Route::get('/home', function() {
    return view('home');
})->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/mybooks', [MyBooksController::class, 'index'])->middleware('auth');
Route::get('/mybooks', [MyBooksController::class, 'myBooks'])->name('mybooks')->middleware('auth');

require __DIR__.'/auth.php';
