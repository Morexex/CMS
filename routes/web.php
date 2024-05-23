<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\ContactGroupController;
use App\Http\Controllers\Home\ContactController;
use App\Http\Controllers\Home\DashboardController;

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
    return view('auth.register');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Admin all Route
Route::middleware(['auth'])->group(function () {
Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout','destroy')->name('admin.logout');
    Route::get('/admin/profile','Profile')->name('admin.profile');
    Route::get('/edit/profile','EditProfile')->name('edit.profile');
    Route::post('/store/profile','StoreProfile')->name('store.profile');
    Route::get('/change/password','ChangePassword')->name('change.password');
    Route::post('/update/password','UpdatePassword')->name('update.password');
});

});

//Dashboard all Route
Route::controller(DashboardController::class)->group(function () {
    Route::get('/index','Index')->name('index');
});


//Contact Group all Route
Route::controller(ContactGroupController::class)->group(function () {
    Route::get('/all/contact/group','AllContactGroup')->name('all.contact.group');
    Route::get('/add/contact/group','AddContactGroup')->name('add.contact.group');
    Route::post('/store/contact/group','StoreContactGroup')->name('store.contact.group');
    Route::get('/edit/contact/group/{id}','EditContactGroup')->name('edit.contact.group');
    Route::post('/update/contact/group','UpdateContactGroup')->name('update.contact.group');
    Route::get('/delete/contact/group/{id}','DeleteContactGroup')->name('delete.contact.group');
});

//Contacts all Route
Route::controller(ContactController::class)->group(function () {
    Route::get('/all/contact','AllContact')->name('all.contact');
    Route::get('/add/contact','AddContact')->name('add.contact');
    Route::post('/store/contact','StoreContact')->name('store.contact');
    Route::get('/edit/contact/{id}','EditContact')->name('edit.contact');
    Route::post('/update/contact','UpdateContact')->name('update.contact');
    Route::get('/delete/contact/{id}','DeleteContact')->name('delete.contact');
    Route::get('/group/contact/{id}','GroupContact')->name('group.contact');
    Route::get('/contact', 'HomeContact')->name('home.contact');
});

require __DIR__.'/auth.php';
