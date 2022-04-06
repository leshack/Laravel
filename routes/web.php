<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TblvehiclesController;
use App\Http\Controllers\TblbrandsController;
use App\Http\Controllers\TbltestimonialController;
use App\Http\Controllers\TblpagesController;
use App\Http\Controllers\TblcontactusinfoController;
use App\Http\Controllers\TblcontactusqueryController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\AdminprofileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LockAccountScreenController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TblbookingsController;
use App\Http\Controllers\RegusersController;
use App\Http\Controllers\TblsubscribersController;
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
Route::get('verify',[LoginController::class,'verify'])->name('verify');
    //user Routes
Route::group(['prefix'=>'user', 'middleware'=>['auth','is_user_verify_email']], function(){
    Route::get('/', [PagesController::class, 'index'])->name('index');
    Route::get('profile',[ProfileController::class,'profile'])->name('user.profile');
    Route::post('update_profile_info',[ProfileController::class,'updateInfo'])->name('user.updateprofile');
    Route::post('profile',[ProfileController::class,'updatePicture'])->name('user.profilepic');
    Route::get('password',[ProfileController::class,'password'])->name('user.password');
    Route::post('password',[ProfileController::class,'changepassword'])->name('user.passwordchange');
    Route::get('bookings',[ProfileController::class,'bookings'])->name('user.bookings');
    Route::post('bookings',[ProfileController::class,'booking'])->name('user.bookings');
    Route::get('testimonial',[ProfileController::class,'testimonial'])->name('user.testimonial');
    Route::post('testimonial',[ProfileController::class,'testimony'])->name('user.testimonial');
    Route::get('mytestimonial',[ProfileController::class,'mytestimonial'])->name('user.mytestimonial');

});

Route::get('admin',  [AdminAuthController::class,'getLogin'])->name('admin.login');
Route::post('admin', [AdminAuthController::class,'postLogin'])->name('admin.login');
//Route::get('admin/logout', [AdminAuthController::class,'logout'])->name('adminLogout');



        // Admin Dashboard
Route::group(['prefix' => 'admin','middleware' => ['adminauth',]], function () {
    // Route::get('dashboard', function () {
    //     return view('Admin.Layout.content');
    // })->name('admin.dashboard');
    Route::get('dashboard',[DashboardController::class,'dashboard'])->name('admin.dashboard');
                        //Lockscreen
    Route::get('lockscreen',[LockAccountScreenController::class,'lockscreen'])->name('admin.lockscreen');
    Route::post('lockscreen',[LockAccountScreenController::class,'unlock'])->name('admin.unlock');
                         //manage brands
    Route::get('brands',[TblbrandsController::class,'createbrands'])->name('admin.brands');
    Route::post('brands',[TblbrandsController::class,'add'])->name('admin.brands');
    Route::get('managebrands',[TblbrandsController::class,'managebrands'])->name('admin.brandsmanage');
    Route::get('managebrands/edit/{id}',[TblbrandsController::class,'edit'])->name('admin.managebrands/edit/{id}');
    Route::get('managebrands/delete/{id}',[TblbrandsController::class,'delete'])->name('admin.managebrands/delete/{id}');
    Route::post('managebrands/update/{id}',[TblbrandsController::class,'update'])->name('admin.managebrands/update/{id}');
                      //manage vehicles
    Route::get('vehicles',[TblvehiclesController::class,'postvehicle'])->name('admin.vehicle');
    Route::post('vehicles',[TblvehiclesController::class,'addvehicle'])->name('admin.addvehicle');
    Route::get('managevehicles',[TblvehiclesController::class,'managevehicle'])->name('admin.vehiclemanage');
    Route::get('changeimage',[TblvehiclesController::class,'image'])->name('admin.changeimage');
    Route::get('managevehicles/edit/{id}',[TblvehiclesController::class,'edit'])->name('admin.managevehicles/edit/{id}');
    Route::get('managevehicles/delete/{id}',[TblvehiclesController::class,'delete'])->name('admin.managevehicles/delete/{id}');
    Route::post('managevehicles/update/{id}',[TblvehiclesController::class,'update'])->name('admin.managevehicles/update/{id}');
                        //testimonial
    Route::get('testimonials',[TbltestimonialController::class,'managetestimonial'])->name('admin.testimonialmanage');
    Route::get('/testimonials/status',[TbltestimonialController::class,'status'])->name('admin.testimonials.status');
                        //bookings
    Route::get('bookings',[TblbookingsController::class,'managebookings'])->name('admin.bookingmanage');
    Route::post('bookings/confirm/{id}',[TblbookingsController::class,'update'])->name('admin.bookings/confirm/{id}');

    Route::get('users',[RegusersController::class,'regusers'])->name('admin.regusers');
    Route::get('pages',[PagesController::class,'managepage'])->name('admin.managepage');
    Route::get('contact',[TblcontactusinfoController::class,'contact'])->name('admin.contact');
    Route::get('subscriber',[TblsubscribersController::class,'subscriber'])->name('admin.subscriber');
                        //profile
    Route::get('profile',[AdminprofileController::class,'profile'])->name('admin.profile');
    Route::post('update_profile_info',[AdminprofileController::class,'updateInfo'])->name('admin.updateinfo');
    Route::post('Profile',[AdminprofileController::class,'updatepicture'])->name('admin.profilepic');
    Route::post('password_update',[AdminprofileController::class,'changepassword'])->name('admin.password');
    Route::post('logout', [AdminAuthController::class,'logout'])->name('admin.Logout');
});

Route::post('newsletter', NewsletterController::class);


Route::prefix('google')->name('google.')->group( function(){
    Route::get('/login', [GoogleController::class, 'loginWithGoogle'])->name('login');
    Route::any('/callback', [GoogleController::class, 'callbackFromGoogle'])->name('callback');
});

