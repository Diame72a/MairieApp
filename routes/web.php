<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArreteController;
use App\Http\Controllers\UserController;

// Routes publiques (sans authentification)
Route::get('/', [CategoryController::class, 'index'])->name('home');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/arretes/view/{arrete}', [ArreteController::class, 'view'])->name('arretes.view');
Route::get('/arretes/category/{category}', [ArreteController::class, 'arretesByCategory'])->name('arretes.byCategory');

// Toutes les autres routes nécessitent une authentification
Route::middleware(['auth'])->group(function () {
    
    // Admin Dashboard
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    
    // Gestion des utilisateurs
    Route::resource('users', UserController::class);

    // Gestion des catégories (admin et employé)
    Route::prefix('admin/categories')->name('admin.categories.')->group(function () {
        Route::get('/', [CategoryController::class, 'home'])->name('home');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/', [CategoryController::class, 'store'])->name('store');
        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('edit');
        Route::put('/{category}', [CategoryController::class, 'update'])->name('update');
        Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('destroy');
    });
    
    // Gestion des arrêtés (admin et employé)
    Route::prefix('admin/arretes')->name('admin.arretes.')->group(function () {
        Route::get('/', [ArreteController::class, 'index'])->name('index');
        Route::get('/create', [ArreteController::class, 'create'])->name('create');
        Route::post('/', [ArreteController::class, 'store'])->name('store');
        Route::get('/{arrete}/edit', [ArreteController::class, 'edit'])->name('edit');
        Route::put('/{arrete}', [ArreteController::class, 'update'])->name('update');
        Route::delete('/{arrete}', [ArreteController::class, 'destroy'])->name('destroy');
        Route::get('/{arrete}', [ArreteController::class, 'show'])->name('show');
    });
    
    // Routes spécifiques à l'administrateur
    Route::middleware('role:admin')->group(function () {
        // CRUD des utilisateurs
        Route::prefix('admin/users')->name('admin.users.')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('/create', [UserController::class, 'create'])->name('create');
            Route::post('/', [UserController::class, 'store'])->name('store');
            Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
            Route::put('/{user}', [UserController::class, 'update'])->name('update');
            Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
        });

        // Tableau de bord
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    });

    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});