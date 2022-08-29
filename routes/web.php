<?php

use App\Http\Controllers\InvitesController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\StudentTaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LandingPageController::class, 'index']);
Route::get('/vacancies/{id}', [LandingPageController::class, 'vacancies'])->name('vacancies.show');
Route::post('/vacancies/{id}', [LandingPageController::class, 'apply'])->name('vacancies.apply');

Route::group(['prefix' => '/student'], function () {
    Route::post('/invite', [InvitesController::class, 'invite'])->name('student-invite');
});

Route::get('/success-register', function () {
    return view('mail.success');
})->name('success-register');

Route::get('/student-test', [StudentTaskController::class, 'index'])->middleware('incoming');
Route::post('/student-test', [StudentTaskController::class, 'store'])->middleware('incoming');

Route::resource('zoom_booking', \App\Http\Controllers\zoom\ZoomBookingsController::class);
Route::resource('create-meeting', \App\Http\Controllers\zoom\ZoomMeetingsController::class);


Route::group(['prefix' => '/student'], function () {
    Route::get('/sign-in/{user}', [InvitesController::class, 'checkSignIn'])->name('sign-in');
    Route::get('/logout', [InvitesController::class, 'logout']);
});
