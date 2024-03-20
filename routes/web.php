<?php

use App\Http\Controllers\Admin\AdminArtistsController;
use App\Http\Controllers\Admin\AdminTagsController;
use App\Http\Controllers\ComicsController;
use App\Http\Controllers\Admin\AdminComicsController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
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

Route::get('/', [HomeController::class, 'index'])->name('home-page');
Route::get('/comics', [ComicsController::class, 'index'])->name('comics-page');
Route::get('/about', [PagesController::class, 'about'])->name('about-page');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact-page');
Route::get('/artists', [PagesController::class, 'artists'])->name('artists-page');
Route::get('/parody', [PagesController::class, 'parody'])->name('parody-page');
Route::get('/filter-tag/{tag}', [FilterController::class, 'index'])->name('filter-by-tag');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/admin/tags', [AdminTagsController::class, 'index'])->name('tags');
    Route::get('/admin/tags/create', [AdminTagsController::class, 'create'])->name('create-tags');
    Route::post('/admin/tags/save', [AdminTagsController::class, 'save'])->name('save-tags');
    Route::post('/admin/tags/update', [AdminTagsController::class, 'update'])->name('update-tags');
    Route::get('/admin/tags/edit/{tag}', [AdminTagsController::class, 'edit'])->name('edit-tags');
    Route::post('/admin/tag/delete/{tag}', [AdminTagsController::class, 'delete'])->name('delete-tags');

    Route::get('/admin/comics', [AdminComicsController::class, 'index'])->name('comics');
    Route::get('/admin/comics/create', [AdminComicsController::class, 'create'])->name('create-comics');
    Route::post('/admin/comics/save', [AdminComicsController::class, 'save'])->name('save-comics');
    Route::post('/admin/comics/update', [AdminComicsController::class, 'update'])->name('update-comics');
    Route::get('/admin/comics/edit/{comics}', [AdminComicsController::class, 'edit'])->name('edit-comics');
    Route::post('/admin/comics/delete/{comics}', [AdminComicsController::class, 'delete'])->name('delete-comics');


    Route::get('/admin/artists', [AdminArtistsController::class, 'index'])->name('artists');
    Route::get('/admin/artists/create', [AdminArtistsController::class, 'create'])->name('create-artist');
    Route::get('/admin/artists/edit/{artist}', [AdminArtistsController::class, 'edit'])->name('edit-artist');
    Route::post('/admin/artists/save', [AdminArtistsController::class, 'save'])->name('save-artist');
    Route::post('/admin/artists/update', [AdminArtistsController::class, 'update'])->name('update-artist');
    Route::post('/admin/artists/delete/{artist}', [AdminArtistsController::class, 'delete'])->name('delete-artist');
});

require __DIR__.'/auth.php';
