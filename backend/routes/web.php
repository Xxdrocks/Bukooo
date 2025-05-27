<?php


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyBooksController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\AdminController;
use App\Models\Product;





Route::middleware(['auth'])->prefix('superadmin')->group(function () {
     Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // USER
    Route::get('/users', [AdminController::class, 'getAllUsers'])->name('user.index');
    Route::get('/users/create', [AdminController::class, 'createUser'])->name('user.create');
    Route::post('/users/create', [AdminController::class, 'storeUser'])->name('user.add');
    Route::get('/users/{id}/edit', [AdminController::class,'editUser'])->name('user.edit');
    Route::post('/users/{id}/update', [AdminController::class, 'updateUser'])->name('user.update');
    Route::delete('/users/{id}', [AdminController::class, 'destroyUser'])->name('user.delete');

    // PRODUCT

    Route::get('/products', [AdminController::class, 'getAllProducts'])->name('product.index');
    Route::get('/products/create', [AdminController::class,'createProduct'])->name('product.create');
    Route::post('/products/create', [AdminController::class, 'storeProduct'])->name('product.add');
    Route::get('/products/{id}/edit', [AdminController::class, 'editProduct'])->name('product.edit');
    Route::post('/products/{id}/update', [AdminController::class, 'updateProduct'])->name('product.update');
    Route::delete('/products/{id}', [AdminController::class, 'destroyProduct'])->name('product.delete');

    // PAYMENT
    Route::get('/payments', [AdminController::class, 'getAllPayments'])->name('payments.index');
    Route::get('/payments/create', [AdminController::class,'createPayment'])->name('payments.add');
    Route::post('/payments/create', [AdminController::class, 'storePayment'])->name('payments.edit');
    Route::put('/payments/{id}', [AdminController::class, 'updatePayment']);
    Route::delete('/payments/{id}', [AdminController::class, 'destroyPayment'])->name('payments.delete');
});


Route::resource('products', ProductController::class);
Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');


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
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
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
    Route::get('/checkout/create', [PaymentController::class, 'create'])->name( 'payment.detail');
    Route::post('/checkout', [PaymentController::class, 'prosess'])->name('payment.prosess');
    Route::get('/checkout/{payment}', [PaymentController::class, 'checkout'])->name('payment.checkout');
});

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');






require __DIR__ . '/auth.php';
