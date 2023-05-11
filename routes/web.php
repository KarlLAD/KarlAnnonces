<?php

use App\Http\Controllers\admin\AnnonceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardContoller;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TitreAnnonce;
use App\Http\Controllers\TitreAnnonceController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth', 'can:admin')->group(function () {
    Route::get('/admin/dashboard', [DashboardContoller::class, 'index'])->name('admin.dashboard');

    // Afficher les categories
    Route::get('/admin/category', [CategoryController::class, 'index'])->name('admin.category.index');
    Route::post('/admin/category', [CategoryController::class, 'store'])->name('admin.category.store');

    // Modifier une catégorie
    Route::post('/admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');

    // Supprimer une categorie
    Route::post('/admin/category/delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');

    //Afficher les annonces

    Route::get('/admin/annonce', [AnnonceController::class, 'index'])->name('admin.annonce.index');
    Route::post('/admin/annonce', [AnnonceController::class, 'store'])->name('admin.annonce.store');

    // lister les annonces
    Route::get('/admin/annonce', [AnnonceController::class, 'index'])->name('admin.annonce.index');

    // modifier une annonce
    // Route::get('/admin/annonce', [AnnonceController::class, 'update'])->name('admin.annonce.update');
    // Route::post('/admin/annonce/update/{id}', [AnnonceController::class, 'update'])->name('admin.annonce.update');

    //effacer une annonce
    Route::post('/admin/annonce/delete/{id}', [AnnonceController::class, 'delete'])->name('admin.annonce.delete');

    // afficher post

});

Route::get('/post', [PostController::class, 'index'])->name('post');
Route::get('/post/detail', [PostController::class, 'detail'])->name('detail');

// Exercice : afficher Titre
Route::get('/titreAnnonce', [TitreAnnonceController::class, 'index'])->name('titreAnnonce');



require __DIR__ . '/auth.php';
