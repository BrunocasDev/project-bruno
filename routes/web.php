<?php

use App\Http\Controllers\ContactsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ContactsController::class, 'index'])->name('contacts');

Route::middleware('auth')->group(function () {
    Route::prefix('contacts')->group(static function () {
        Route::get('create', [ ContactsController::class, 'createView' ])->name('contacts.createView');
        Route::post('create', [ ContactsController::class, 'create' ])->name('contacts.create');
        Route::get('view/{id}', [ ContactsController::class, 'view' ])->name('contacts.view');
        Route::get('edit/{id}', [ ContactsController::class, 'edit' ])->name('contacts.edit');
        Route::put('update/{id}', [ ContactsController::class, 'update' ])->name('contacts.update');
        Route::delete('delete/{id}', [ ContactsController::class, 'delete' ])->name('contacts.delete');
    });
});

require __DIR__.'/auth.php';