<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/psb', [PageController::class, 'psb'])->name('psb.index');
Route::post('/psb', [PageController::class, 'psbStore'])->name('psb.store');

// Feedback (Public)
Route::get('/feedback', [FeedbackController::class, 'create'])->name('feedback.create');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        if (auth()->user()->role === 'parent') {
            return redirect()->route('parent.dashboard');
        }
        return redirect()->route('students.index');
    })->name('dashboard');

    // Admin Routes
    Route::middleware(['can:admin'])->group(function () {
        Route::resource('students', StudentController::class);
        Route::post('activities', [ActivityController::class, 'store'])->name('activities.store');
        Route::delete('activities/{activity}', [ActivityController::class, 'destroy'])->name('activities.destroy');
        
        // Admin Feedback
        Route::get('/admin/feedback', [FeedbackController::class, 'index'])->name('admin.feedback.index');
        Route::patch('/admin/feedback/{feedback}/read', [FeedbackController::class, 'markAsRead'])->name('admin.feedback.read');
        Route::delete('/admin/feedback/{feedback}', [FeedbackController::class, 'destroy'])->name('admin.feedback.destroy');
    });

    // Parent Routes
    Route::get('/parent/dashboard', [ParentController::class, 'index'])->name('parent.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
