<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\AuthController;
use App\Models\Produit;

Route::get('/', [ProduitController::class, 'index'])->name('/');

// Routes pour les produits
Route::middleware('auth')->group(function () {
    Route::resource('/produit', ProduitController::class);
    Route::get('/produit/create', [ProduitController::class, 'create'])->name('produit.create');
    Route::post('/update-produit-status/{id}', [ProduitController::class, 'updateStatus'])->name('produit.updateStatus');
    Route::post('produit/store', [ProduitController::class, 'store'])->name('produit.store');
    Route::post('/preview', [ProduitController::class, 'preview'])->name('produit.preview');
});

// Routes pour les templates
Route::middleware('auth')->group(function () {
    Route::get('/templates', [TemplateController::class, 'index'])->name('templates.index');
    Route::get('/templates/{id}', [TemplateController::class, 'show']);
    Route::post('/templates/{id}/product/{productId}', [TemplateController::class, 'generate']);
    Route::get('/template/{templateId}', [TemplateController::class, 'showTemplate']);
    Route::post('/downloadProduct/{produit}', [TemplateController::class, 'downloadProduct'])->name('downloadProduct');
});

// Routes pour l'authentification
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
