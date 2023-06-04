<?php

use App\Models\Profiles\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Skills\SkillController;
use App\Http\Controllers\Profiles\AuthController;
use App\Http\Controllers\Comments\CommentController;
use App\Http\Controllers\Messages\MessageController;
use App\Http\Controllers\Profiles\ProfileController;
use App\Http\Controllers\Projects\ProjectController;

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

//Route::get('/', [IndexController::class, 'index'])->name('index');

// Route::get('/', function () {
//    return view('index');
// });

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

//Route::get('account/{account}', [IndexController::class, 'account'])->name('account');

Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'register_store'])->name('register.store');

// Profile
Route::get('/', [ProfileController::class, 'index'])->name('index');

Route::group(['prefix' => 'profiles', 'middleware' =>'auth'], function () {
    Route::get('/create', [ProfileController::class, 'create'])->name('profile.create');
    Route::get('/{profile}', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/', [ProfileController::class, 'store'])->name('profile.store');
    Route::get('/{profile}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/{profile}', [ProfileController::class, 'update'])->name('profile.update');
});

Route::get('account/{account}/', [ProfileController::class, 'showAccount'])->name('profile.account');

// Project
Route::group(['prefix' => 'projects', 'middleware' =>'auth'], function () {
    Route::get('/', [ProjectController::class, 'index'])->name('project.index');
    Route::get('/create', [ProjectController::class, 'create'])->name('project.create');
    Route::post('/', [ProjectController::class, 'store'])->name('project.store');
    Route::get('/{project}', [ProjectController::class, 'show'])->name('project.show');
    Route::get('/{project}/edit', [ProjectController::class, 'edit'])->name('project.edit');
    Route::put('/{project}', [ProjectController::class, 'update'])->name('project.update');
    Route::delete('/{project}', [ProjectController::class, 'destroy'])->name('project.destroy');
});

Route::get('project/{project}', [ProjectController::class, 'deleteProject'])->name('project.delete');

// Skill
Route::group(['prefix' => 'skills', 'middleware' =>'auth'], function () {
    Route::get('/create', [SkillController::class, 'create'])->name('skill.create');
    Route::post('/', [SkillController::class, 'store'])->name('skill.store');
    Route::get('/{skill}/edit', [SkillController::class, 'edit'])->name('skill.edit');
    Route::put('/{skill}', [SkillController::class, 'update'])->name('skill.update');
    Route::get('/{skill}', [SkillController::class, 'deleteSkill'])->name('skill.delete');
    Route::delete('/{skill}', [SkillController::class, 'destroy'])->name('skill.destroy');
});

Route::resource('comments', CommentController::class);
Route::resource('messages', MessageController::class);
