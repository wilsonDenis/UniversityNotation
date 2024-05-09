<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\CritereController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\UniversityPhotoController;
use App\Http\Controllers\AdminController; // Assurez-vous que ce contrôleur est créé

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

    // Routes pour les fonctionnalités de l'application
    Route::resource('comments', CommentController::class);
    Route::resource('university', UniversityController::class);
    Route::resource('critere', CritereController::class);
    Route::resource('ratings', RatingController::class);
    Route::resource('university_photos', UniversityPhotoController::class);
});

// Routes spécifiques pour l'admin
Route::middleware(['auth','admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('university', UniversityController::class);
    // Vous pouvez ajouter d'autres routes administratives ici
});

require __DIR__ . '/auth.php';
