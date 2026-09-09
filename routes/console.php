<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Route::get('/lists', [TaskListController::class, 'index'])
    ->name('lists.index');

Route::post('/lists', [TaskListController::class, 'store'])
    ->name('lists.store');

Route::put('/lists/{list}', [TaskListController::class, 'update'])
    ->name('lists.update');

Route::delete('/lists/{list}', [TaskListController::class, 'destroy'])
    ->name('lists.destroy');
