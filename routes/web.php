<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use  App\Http\Controllers\StudentController;
use  App\Http\Controllers\HomeController;
use  App\Http\Controllers\TeacherController;
use  App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Notifications\VerifyTeacherEmail;
use App\Providers\RouteServiceProvider;



//Admin Controllers
use App\Admin\Controller\Auth\AdminLoginController;
use App\Admin\Controller\AdminDashboardController;
use App\Admin\Controller\AdminSubjectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
// */


Route::get('/preview-email', function () {
    $user = \App\Models\User::find(1); // Replace with an existing user ID
    return (new VerifyTeacherEmail($user))->toMail($user);
});

Auth::routes(['verify' => true]);

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('teacher/dashboard'); // Redirect to the appropriate dashboard
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::post('/email/resend', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');


Route::get('/verify-email/{id}/{hash}', [VerificationController::class, 'verify'])
    ->middleware(['signed', 'throttle:6,1'])
    ->name('verification.verify');

Route::get('/', function () {
    return view('home.index');
});



Route::any('/about', [HomeController::class, 'about'])->name('about');
Route::any('/contact-us', [HomeController::class, 'contact'])->name('contact');
Route::any('/classes', [HomeController::class, 'classes'])->name('class');
Route::any('/tutor', [HomeController::class, 'tutor'])->name('tutor');
Route::any('/course', [HomeController::class, 'course'])->name('courses');
Route::any('/become-tutor', [HomeController::class, 'becomeTeacher'])->name('becomeTeacher');
Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/register/student', [RegisteredUserController::class, 'showStudentRegistrationForm'])->name('register.student');
Route::post('/register/student', [RegisteredUserController::class, 'registerStudent'])->name('register.student.submit');
Route::get('/register/teacher', [RegisteredUserController::class, 'showTeacherRegistrationForm'])->name('register.teacher');
Route::post('/register/teacher', [RegisteredUserController::class, 'registerTeacher']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::get('/dashboard/teacher/verify', [TeacherController::class, 'verify'])->name('dashboard.teacher.teacher_verify');




Route::middleware(['auth'])->group(function () {
    Route::get('/teacher/dashboard', [TeacherController::class, 'dashboard'])->name('teacher.dashboard');
    // GET route to show the profile completion form
    Route::get('/teacher/profile/complete', [TeacherController::class, 'showCompleteProfileForm'])->name('teacher.profile-complete');
   // AJAX routes to get states and cities dynamically
   Route::get('/get-states/{country_id}', [TeacherController::class, 'getStates'])->name('getStates');
   Route::get('/get-cities/{state_id}', [TeacherController::class, 'getCities'])->name('getCities');

    Route::post('/teacher/profile/complete', [TeacherController::class, 'storeProfile'])->name('teacher.profile.store');
});



Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
    Route::get('/student/profile', [StudentController::class, 'show'])->name('student.profile');
    Route::get('/student/profile', [StudentController::class, 'edit'])->name('student.profile');
    Route::put('/student/profile', [StudentController::class, 'update'])->name('student.profile.update');

});


Route::middleware(['auth', 'verified', 'teacher.profile.completed'])->group(function () {
    Route::get('/teacher/dashboard', [TeacherController::class, 'dashboard'])->name('teacher.dashboard');
    Route::get('/teacher/profile', [TeacherController::class, 'show'])->name('teacher.profile');
    Route::get('/teacher/profile/', [TeacherController::class, 'edit'])->name('teacher.profile'); // Edit profile form
    Route::put('/teacher/profile/', [TeacherController::class, 'update'])->name('teacher.profile.update'); // Update profil

});


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');


});






// Student dashboard route
Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
});

// Teacher dashboard route
// Route::middleware(['auth', 'role:teacher'])->group(function () {
//     Route::get('/teacher/dashboard', [TeacherController::class, 'dashboard'])->name('teacher.dashboard');
// });




// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';


Route::prefix('admin')->name('admin.')->namespace('App\Admin\Controller\Auth')->group(function () {
    Route::get('login', 'AdminLoginController@showLoginForm')->name('login');
    Route::post('login', 'AdminLoginController@login');
    Route::post('logout', 'AdminLoginController@logout')->name('logout');
});

 // Protecting Admin Routes with Middleware
Route::prefix('admin')->name('admin.')->namespace('App\Admin\Controller')->middleware(['auth:admin', 'admin.role'])->group(function () {
    Route::get('dashboard', 'AdminDashboardController@index')->name('dashboard');


    // Admin Manage Teachers
    Route::resource('teachers', AdminTeacherController::class);
    Route::post('/teacher/{teacher}/approve', [AdminTeacherController::class, 'approve'])->name('teachers.approve');
    Route::post('/teacher/{teacher}/bar', [AdminTeacherController::class, 'bar'])->name('teachers.bar');

    // Subjects and Categories
    Route::resource('subject', AdminSubjectController::class);
    Route::get('/subjects', [AdminSubjectController::class, 'index'])->name('admin.subject.index');
    Route::get('/subjects/create', [AdminSubjectController::class, 'create'])->name('admin.subjects.create');
    Route::post('/subjects', [AdminSubjectController::class, 'store'])->name('admin.subjects.store');
    Route::get('/subjects/{id}/{type}/edit', [AdminSubjectController::class, 'edit'])->name('admin.subjects.edit');
    Route::put('/subjects/{id}/{type}', [AdminSubjectController::class, 'update'])->name('admin.subjects.update');
    Route::delete('/subjects/{id}/{type}', [AdminSubjectController::class, 'destroy'])->name('admin.subjects.destroy');

    // Languages
    Route::resource('languages', AdminLanguageController::class);

    // Rating System
    Route::post('/teachers/{teacher}/rate', [AdminTeacherController::class, 'rate'])->name('teachers.rate');
});
