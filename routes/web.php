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
use App\Http\Controllers\TblcontactusinfoController;
use App\Http\Controllers\TblcontactusqueryController;
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
Route::get('page', [PagesController::class, 'page'])->name('?type=');
Route::get('vehicle-details', [PagesController::class, 'vehicledetails'])->name('vehicle-details');
Route::get('car-listing', [PagesController::class, 'carlisting'])->name('car-listing');

Route::get('contact-us',[TblcontactusinfoController::class,'index'])->name('contact-us');
Route::post('contact-us',[TblcontactusqueryController::class,'store'])->name('contact-us');


Route::resource('/blog', PostsController::class);


Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'user', 'middleware'=>['auth',]], function(){
    Route::get('/', [PagesController::class, 'index'])->name('index');
    Route::get('profile',[ProfileController::class,'profile'])->name('user.profile');
    Route::post('profile',[ProfileController::class,'updateInfo'])->name('user.profile');
    Route::post('profile',[ProfileController::class,'updatePicture'])->name('user.profilepic');
    Route::get('password',[ProfileController::class,'password'])->name('user.password');
    Route::post('password',[ProfileController::class,'changepassword'])->name('user.passwordchange');
    Route::get('bookings',[ProfileController::class,'bookings'])->name('user.bookings');
    Route::get('testimonial',[ProfileController::class,'testimonial'])->name('user.testimonial');
    Route::post('testimonial',[ProfileController::class,'testimony'])->name('user.testimonial');
    Route::get('mytestimonial',[ProfileController::class,'mytestimonial'])->name('user.mytestimonial');

});




Route::post('newsletter', NewsletterController::class);


Route::prefix('google')->name('google.')->group( function(){
    Route::get('/login', [GoogleController::class, 'loginWithGoogle'])->name('login');
    Route::any('/callback', [GoogleController::class, 'callbackFromGoogle'])->name('callback');
});

