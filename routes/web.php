<?php

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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});

Route::group(
    [
        'name' => 'schools',
        'as' => 'schools.',
        'prefix' => '/schools',
        'middleware' => ['auth', 'role:superadmin,admin'],
    ],
    function () {
        Route::get('/', \App\Livewire\School\Index::class)->name('index');
//        Route::get('/create', \App\Http\Controllers\School\CreateController::class)->name('create');
        Route::get('/{school:uuid}', fn() => view('edit.php'))->name('edit');
//        Route::get('/{school:uuid}', \App\Http\Controllers\School\EditController::class)->name('edit');
        Route::group(
            ['name' => 'users', 'as' => 'users.', 'prefix' => '{school:uuid}/users', 'middleware' => ['scopeSchool']],
            function () {
                Route::get('/', \App\Livewire\User\Index::class)->name('index');
                Route::get('/create', \App\Livewire\User\Create::class)->name('create');
                Route::get('/{user:uuid}', \App\Livewire\User\Edit::class)->name('edit');

            Route::get('/{user:uuid}/work-situation', \App\Http\Controllers\WorkSituationController::class)->name('work-situation');
            }
        );
    }
);

// TODO: Add to middleware

require __DIR__ . '/auth.php';
