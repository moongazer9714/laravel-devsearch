<?php

use App\Http\Controllers\Profiles\AuthController;
use App\Http\Controllers\Profiles\IndexController;
use App\Http\Controllers\Profiles\ProfileController;
use App\Http\Controllers\Projects\ProjectController;
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

//Route::get('/', [IndexController::class, 'index'])->name('index');

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

//Route::get('account/{account}', [IndexController::class, 'account'])->name('account');

Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'register_store'])->name('register.store');

Route::get('/', [ProfileController::class, 'index'])->name('index');
Route::get('profiles', [ProfileController::class, 'index'])->name('profile.index');
Route::get('profiles/create', [ProfileController::class, 'create'])->name('profile.create');
Route::post('profiles/', [ProfileController::class, 'store'])->name('profile.store');
Route::get('profiles/{profile}', [ProfileController::class, 'show'])->name('profile.show');
Route::post('profiles/{profile}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::get('account/{account}/', [ProfileController::class, 'showAccount'])->name('profile.account');

//Route::get('account/{account}', [IndexController::class, 'show'])->name('profile.account.show');

Route::get('projects', [ProjectController::class, 'index'])->name('project.index');
Route::get('projects/create', [ProjectController::class, 'create'])->name('project.create');
Route::post('projects', [ProjectController::class, 'store'])->name('project.store');
Route::get('projects/{project}', [ProjectController::class, 'show'])->name('project.show');
Route::get('projects/{project}/edit', [ProjectController::class, 'edit'])->name('project.edit');
Route::put('projects/{project}', [ProjectController::class, 'update'])->name('project.update');
Route::get('project/{project}', [ProjectController::class, 'deleteProject'])->name('project.delete');
Route::delete('projects/{project}', [ProjectController::class, 'destroy'])->name('project.destroy');


