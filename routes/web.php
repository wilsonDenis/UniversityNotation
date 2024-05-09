<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\UniversityPhotoController;
use App\Http\Controllers\AdminController; 
use App\Http\Controllers\UserController;
use App\Models\University;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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



    Route::resource('ratings', RatingController::class);
    Route::resource('university_photos', UniversityPhotoController::class);


    // ---------------------------------New Router or Root for  a user 
    Route::get('/universities/{university}/details', [UniversityController::class, 'showDetails'])->name('universities.details');
    Route::get('/universities/{university}/comments', [CommentController::class, 'getComments'])->name('universities.comments');

// ----------------------------------------------------------------------------------------------------------------
    Route::get('/universities', [UniversityController::class, 'index'])->name('universities.index');
    Route::post('/ratings', [RatingController::class, 'store'])->name('ratings.store');
    Route::get('/comments/create', [CommentController::class, 'create'])->name('comments.create');
    Route::post('/comments/{university}', [CommentController::class, 'store'])->name('comments.store');
});
Route::get('/dashboard', function () {
   
    if (Auth::check()) {
        $universities = University::all(); 
        return view('dashboard', compact('universities'));
    }
    return view('dashboard');
     // Retournez la vue sans universités si pas d'utilisateur connecté
})->middleware(['auth', 'verified'])->name('dashboard');
// Routes spécifiques pour l'admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/universities/create', [UniversityController::class, 'create'])->name('universities.create');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
    Route::get('/admin/comments', [CommentController::class, 'getCommentToAdmin'])->name('comments.toAdmin');
    Route::resource('university', UniversityController::class);
    Route::get('/admin/users', [UserController::class, 'index'])->name('users.index');
    Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});

require __DIR__ . '/auth.php';
