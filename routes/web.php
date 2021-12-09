<?php

use App\Http\Controllers\ProductAttributesController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('products', ProductsController::class)->middleware(['auth']);
//Route::resource('productAttributes', ProductAttributesController::class)->middleware(['auth']);

Route::get('/products/{product}', [ProductAttributesController::class, 'index'])
    ->middleware(['auth'])
    ->name('viewAttr');

Route::get('/products/{product}/newAttribute', [ProductAttributesController::class, 'create'])
    ->middleware(['auth'])
    ->name('addAttr');

Route::post('/products/{product}/saveAttribute', [ProductAttributesController::class, 'store'])
    ->middleware(['auth'])
    ->name('saveAttr');

Route::delete('/products/{product}/delete', [ProductAttributesController::class, 'destroy'])
    ->middleware(['auth'])
    ->name('deleteAttr');

require __DIR__.'/auth.php';
