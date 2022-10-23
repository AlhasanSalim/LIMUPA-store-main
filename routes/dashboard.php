<?php

use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Dashboard\CategoriesController;
use Illuminate\Support\Facades\Route;


Route::group([
  'middleware' => ['auth:admin'],
  'as' => 'dashboard.',
  'prefix' => 'admin/dashboard'
], function(){

   Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');

   Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');

   Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');


   Route::get('categories/trash', [App\Http\Controllers\Dashboard\CategoriesController::class, 'trash'])
   ->name('categories.trash');

   Route::put('categories/{category}/restore',[App\Http\Controllers\Dashboard\CategoriesController::class, 'restore'])
   ->name('categories.restore');

   Route::delete('categories/{category}/force-delete', [App\Http\Controllers\Dashboard\CategoriesController::class, 'forceDelete'])
   ->name('categories.force-delete');

   Route::resource('categories', Dashboard\CategoriesController::class);
   Route::resource('products', Dashboard\ProductsController::class);
});


//Route::middleware('auth')->as('dashboard.')->prefix('dashboard')->group(function(){});

