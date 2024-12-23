<?php
use App\Models\Agent;
use App\Models\Item;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\CategoryController;

// Rute untuk tampilan laporan (index)
Route::get('report', [ReportController::class, 'index'])->name('report.index');
// Rute untuk halaman tambah laporan (create)
Route::get('report/create', [ReportController::class, 'create'])->name('report.create');
// Rute untuk menyimpan laporan baru (store)
Route::post('report', [ReportController::class, 'createPost'])->name('report.createPost'); // Bisa juga diganti dengan 'store' jika Anda ubah metode di controller
// Rute untuk halaman edit laporan
Route::get('report/{id}/edit', [ReportController::class, 'edit'])->name('report.edit');
// Rute untuk memperbarui laporan yang sudah ada (update)
Route::put('report/{id}', [ReportController::class, 'update'])->name('report.update');
// Rute untuk menghapus laporan
Route::delete('report/{id}', [ReportController::class, 'destroy'])->name('report.destroy');


Route::resource('accounts', AccountController::class);
Route::get('/accounts', [AccountController::class, 'index'])->name('accounts.index');
Route::get('/accounts/{id}/edit', [AccountController::class, 'edit'])->name('accounts.edit');
Route::put('/accounts/{id}', [AccountController::class, 'update'])->name('accounts.update');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('items', ItemController::class);
Route::get('items/create', [ItemController::class, 'create'])->name('items.create');
Route::post('items', [ItemController::class, 'store'])->name('items.store');
Route::resource('agents', AgentController::class);
Route::resource('categories', CategoryController::class);
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
Route::resource('agents', AgentController::class);