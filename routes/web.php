<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskListController;

Route::middleware('auth')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');
    Route::get('/lists', [TaskListController::class, 'index'])->name('lists.index');
    Route::post('/lists', [TaskListController::class, 'store'])->name('lists.store');
    Route::put('/lists/{list}', [TaskListController::class, 'update'])->name('lists.update');
    Route::delete('/lists/{list}', [TaskListController::class, 'destroy'])->name('lists.destroy');
});