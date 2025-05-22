<?php


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyBooksController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\WishlistController;
use App\Models\Product;
use GuzzleHttp\Middleware;

Route::resource('products', ProductController::class);
Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
// Route::get('/product', [ProductController::class, 'index'])->name('product');


// Route::get('/', function () {
//     return view('home');
// });


// Route::get('/dashboard', function () {
//     return view('home');
// })->middleware(['auth'])->name('home');

Route::get('/', function () {
    $products = Product::all();
    return view('home', compact('products'));
})->middleware('auth')->name('home');


Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');



Route::middleware('auth')->group(function () {
    Route::get('/information', [ProfileController::class, 'index'])->name('profile')->middleware('auth');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::post('/wishlist/toggle', [WishlistController::class, 'toggle'])->name('wishlist.toggle');


Route::middleware('auth')->group(function () {
    Route::get('/mybooks', [MyBooksController::class, 'index'])->name('mybooks');
});


Route::get('/addProduct/create', [ProductController::class, 'create'])->name('products.create');
Route::middleware('auth')->group(function () {
    Route::get('/addProduct/create', [ProductController::class, 'create']);
    Route::patch('/addProduct', [ProductController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::get('/become-seller', [SellerController::class, 'create'])->name('become-seller');
    Route::post('/become-seller', [SellerController::class, 'store'])->name('become-seller.store');
});




Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

// Add Product Route
Route::middleware('auth')->group(function () {
    Route::get('/addProduct/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/addProduct', [ProductController::class, 'store'])->name('products.store');
});

// Payment
Route::middleware('auth')->group(function () {
    Route::get('/payment/create', [PaymentController::class, 'create'])->name('payment.detail');
    Route::post('/payment', [PaymentController::class, 'store'])->name('payment.store');
    Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
});





require __DIR__ . '/auth.php';
