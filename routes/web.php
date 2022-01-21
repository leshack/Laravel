<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TblvehiclesController;
use App\Http\Controllers\TblbrandsController;
use App\Http\Controllers\TbltestimonialController;
use App\Http\Controllers\TblpagesController;
use App\Http\Controllers\NewsletterController;
use Illuminate\Support\Facades\Auth;


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

Route::get('/', [PagesController::class, 'index']);

Route::resource('/blog', PostsController::class);


Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'user', 'middleware'=>['auth',]], function(){
    Route::get('dashboard',[ProfileController::class,'index'])->name('user.dashboard');
    Route::get('profile',[ProfileController::class,'profile'])->name('user.profile');
    Route::get('password',[ProfileController::class,'password'])->name('user.password');
    Route::get('bookings',[ProfileController::class,'bookings'])->name('user.bookings');
    Route::get('testimonial',[ProfileController::class,'testimonial'])->name('user.testimonial');
    Route::get('mytestimonial',[ProfileController::class,'mytestimonial'])->name('user.mytestimonial');
   
});




Route::post('newsletter', NewsletterController::class);


Route::prefix('google')->name('google.')->group( function(){
    Route::get('/login', [GoogleController::class, 'loginWithGoogle'])->name('login');
    Route::any('/callback', [GoogleController::class, 'callbackFromGoogle'])->name('callback');
});

