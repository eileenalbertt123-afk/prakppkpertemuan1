<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index']);
use App\Http\Controllers\TaskListController;

Route::middleware('auth')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');
    Route::get('/lists', [TaskListController::class, 'index'])->name('lists.index');
    Route::post('/lists', [TaskListController::class, 'store'])->name('lists.store');
    Route::put('/lists/{list}', [TaskListController::class, 'update'])->name('lists.update');
    Route::delete('/lists/{list}', [TaskListController::class, 'destroy'])->name('lists.destroy');

use App\Http\Controllers\Admin\Auth\AdminLoginController;

// Route Guest Admin (Hanya bisa diakses jika belum login)
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');

});

// Route Proteksi Admin (Hanya bisa diakses jika sudah login & role == admin)
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
});

