<?php

use App\Http\Controllers\Backend\RoomController;
use App\Http\Controllers\PaymentController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/about',[\App\Http\Controllers\website\WebsiteController:: class,'about'])->name('about');
// Auth::routes();
Route::get('admin/login', [App\Http\Controllers\Backend\AuthController::class, 'admin_login']);
Route::post('admin/login', [App\Http\Controllers\Backend\AuthController::class, 'login']);
Route::get('admin/logout', [App\Http\Controllers\Backend\AuthController::class, 'admin_logout']);
// use App\Http\Controllers\website\WebsiteController;

// Route for the 'show' method
Route::get('/show', [\App\Http\Controllers\website\WebsiteController::class, 'show'])->name('show');

// Define separate routes for each view file
Route::get('/index',[\App\Http\Controllers\website\WebsiteController:: class,'home'])->name('index');
Route::get('/',[\App\Http\Controllers\website\WebsiteController:: class,'home'])->name('index');
Route::post('/payment', [\App\Http\Controllers\website\WebsiteController::class,'handlePayment'])->name('payment');

Route::view('/404', 'user.404')->name('404');
Route::view('/blog', 'user.blog')->name('blog');
Route::middleware(['auth'])->group(function () {
Route::get('/booking/{hotelId}',[App\Http\Controllers\website\WebsiteController:: class,'go'])->name('booking');


Route::get('/history', [\App\Http\Controllers\website\WebsiteController::class,'bookingHistory'])->name('booking.history');
Route::get('/cart_view', [\App\Http\Controllers\website\WebsiteController::class,'cart_view'])->name('cart_view');
Route::get('/cart_booking/{id}', [\App\Http\Controllers\website\WebsiteController::class,'cart_booking'])->name('cart_booking');
Route::get('/stripe-payment', [\App\Http\Controllers\website\WebsiteController::class, 'handleGet']);
// Route::post('/stripe-payment', [\App\Http\Controllers\website\WebsiteController::class, 'handlePost'])->name('stripe.payment');
Route::delete('/cancel-booking/{id}', [\App\Http\Controllers\website\WebsiteController::class, 'cancelBooking'])->name('cancel-booking');

});

Route::get('/cart/delete/{id}', [\App\Http\Controllers\website\WebsiteController::class,'delete'])->name('cart.delete');
Route::post('/check-availability', [\App\Http\Controllers\website\WebsiteController::class,'checkAvailability']);
Route::post('/avail', [\App\Http\Controllers\website\WebsiteController::class,'checkAvailableRooms'])->name('avialableroomslist');
// Route::post('/search-rooms', [App\Http\Controllers\website\WebsiteController::class,'showAvailableRooms'])->name('search.rooms');
// Route::get('/available-rooms', [App\Http\Controllers\website\WebsiteController::class,'showAvailableRooms']) ->name('available-rooms');
Route::view('/contact', 'user.contact')->name('contact');
Route::view('/gallery', 'user.gallery')->name('gallery');
Route::get('/login/google', [\App\Http\Controllers\website\WebsiteController::class,'redirectToGoogle'])->name('google_login');
Route::get('/google/callback', [App\Http\Controllers\website\WebsiteController::class,'handleGoogleCallback']);

// Route for adding to wishlist
Route::post('/wishlist/add', [App\Http\Controllers\website\WebsiteController::class,'addToWishlist'])->name('wishlist.add');

Route::get('/check-authentication', function() {
    $authenticated = auth()->check();

    return response()->json(['authenticated' => $authenticated]);
});
Route::post('/submit-form', [App\Http\Controllers\website\WebsiteController::class, 'contact'])->name('contact-us');

Route::view('/index-activities', 'user.index-activities')->name('index-activities');
Route::view('/index-gym', 'user.index-gym')->name('index-gym');
Route::view('/index-package-offer', 'user.index-package-offer')->name('index-package-offer');
Route::view('/index-restaurant', 'user.index-restaurant')->name('index-restaurant');
Route::view('/index-spa', 'user.index-spa')->name('index-spa');
Route::view('/location', 'user.location')->name('location');
Route::view('/room-list-compact', 'user.room-list-compact')->name('room-list-compact');
Route::get('/room-list', [\App\Http\Controllers\website\WebsiteController::class, 'index'])->name('room-list');
Route::get('/room/{id}',[\App\Http\Controllers\website\WebsiteController:: class,'room'])->name('room');
Route::get('/room-single',[\App\Http\Controllers\website\WebsiteController:: class,'room'])->name('room-single');
Route::post('/hotel-booking', [\App\Http\Controllers\website\WebsiteController::class, 'store'])->name('booking.store');
Route::get('/avialablerooms', [\App\Http\Controllers\website\WebsiteController::class, 'list'])->name('avialablerooms');
// Route::get('/register', [WebsiteController::class, 'create'])->name('register');
Route::post('/add', [\App\Http\Controllers\website\WebsiteController::class, 'add'])->name('add_user');
Route::post('/cart', [\App\Http\Controllers\website\WebsiteController::class, 'cart'])->name('cart');
Route::view('/single', 'user.single')->name('single');
Route::view('/spa_service_details', 'user.spa_service_details')->name('spa-service-details');
Route::view('/spa_treatment_details', 'user.spa_treatment_details')->name('spa-treatment-details');
Route::post('/login', [\App\Http\Controllers\website\WebsiteController::class,'login'])->name('login');
Route::post('/logout', [\App\Http\Controllers\website\WebsiteController::class,'logout'])->name('logout');
Route::middleware(['auth'])->group(function () {
Route::get('/profile', [\App\Http\Controllers\website\WebsiteController::class,'edit'])->name('profile.edit');
Route::put('/profile/update', [\App\Http\Controllers\website\WebsiteController::class,'update'])->name('profile.update');
Route::post('/profile-picture/edit', [\App\Http\Controllers\website\WebsiteController::class,'editProfilePicture'])->name('profile_picture.edit');

});
Route::get('/room/schedule/{roomId}', [\App\Http\Controllers\website\WebsiteController::class,'roomSchedule'])->name('room.schedule');
Route::get('/hotels', [\App\Http\Controllers\website\WebsiteController::class,'hotel'])->name('hotel.view');
Route::get('/hotel/{id}', [\App\Http\Controllers\website\WebsiteController::class,'hotel_singal'])->name('hotel.singal');
Route::post('/forget_password', [\App\Http\Controllers\website\WebsiteController::class,'initiatePasswordReset'])->name('forgot.password');
Route::post('/otp', [\App\Http\Controllers\website\WebsiteController::class,'verifyOTP'])->name('verify.otp');
Route::group(['middleware' => ['loginCheck']], function () {

    Route::get('/admin/dashboard', [App\Http\Controllers\Backend\DashboardController::class, 'admin_dashboard'])->name('admin_dashboard');

    //USER START
    Route::get('/add-user', [App\Http\Controllers\Backend\UserController::class, 'addusers']);
    Route::post('/add-user', [App\Http\Controllers\Backend\UserController::class, 'insertusers']);
    Route::get('/user-list', [App\Http\Controllers\Backend\UserController::class, 'listusers']);
    Route::get('/user-active/{id}', [App\Http\Controllers\Backend\UserController::class, 'activeusers']);
    Route::get('/user-deactive/{id}', [App\Http\Controllers\Backend\UserController::class, 'deactiveusers']);
    Route::get('/edit-user/{id}', [App\Http\Controllers\Backend\UserController::class, 'edituser']);
    Route::post('/update-user', [App\Http\Controllers\Backend\UserController::class, 'updateusers']);

    //USER END
    Route::post('/create-room-type', [App\Http\Controllers\Backend\RoomController::class, 'createRoomType'])->name('create-room-type');
    Route::get('/room-types/edit/{id}', [App\Http\Controllers\Backend\RoomController::class, 'edit'])->name('edit-room-type');
    Route::put('/room-types/update/{id}', [App\Http\Controllers\Backend\RoomController::class, 'update'])->name('update-room-type');
    Route::get('/room-types/delete/{id}', [App\Http\Controllers\Backend\RoomController::class, 'destroy'])->name('delete-room-type');
    //room DETAILS START
    Route::put('/change-room-status/{id}', [App\Http\Controllers\Backend\RoomController::class,'changeStatus']);

    Route::get('/add-room', [App\Http\Controllers\Backend\RoomController::class, 'addroom']);
    Route::get('/add-room_type', [App\Http\Controllers\Backend\RoomController::class, 'addroom_type'])->name('add-room_type');
    Route::post('/add-room', [App\Http\Controllers\Backend\RoomController::class, 'insertroom']);
    Route::get('room-alist', [App\Http\Controllers\Backend\RoomController::class, 'allroomlist'])->name('room-alist');
    Route::get('/room-image-delete/{id}', [App\Http\Controllers\Backend\RoomController::class, 'delsignImage']);
    Route::get('/room-delete/{id}', [App\Http\Controllers\Backend\RoomController::class, 'roomImage']);
    Route::put('/update-room/{id}', [App\Http\Controllers\Backend\RoomController::class, 'update_room'])->name('update_room');
    Route::get('/view-room/{id}', [App\Http\Controllers\Backend\RoomController::class, 'view_room']);
    Route::get('/edit-room/{id}', [App\Http\Controllers\Backend\RoomController::class, 'edit_room']);
    Route::get('/guests', [App\Http\Controllers\Backend\RoomController::class,'guest'])->name('guests.index');
    Route::get('/guest/bookings/{guestId}', [App\Http\Controllers\Backend\RoomController::class,'guestBookings'])->name('guest.bookings');
    Route::post('/add-hotels', [App\Http\Controllers\Backend\RoomController::class, 'add_hotel'])->name('hotel.add');
    Route::post('/toggle-hotel-status/{id}', [App\Http\Controllers\Backend\RoomController::class, 'toggleStatus']);
    Route::get('/get-cities', [App\Http\Controllers\Backend\RoomController::class, 'getCitiesByState'])->name('get-cities');
    Route::delete('/delete-hotel-image/{id}', [App\Http\Controllers\Backend\RoomController::class,'deleteHotelImage'])->name('delete_hotel_image');
// Define a route for the delete action
Route::delete('delete-hotel/{id}', [App\Http\Controllers\Backend\RoomController::class,'deleteHotel'])->name('delete-hotel');

    //room DETAILS END
    Route::get('/delete-image/{imageId}', [RoomController::class,'deleteImage'])->name('delete-image');

    Route::get('/remove-room/{id}', [RoomController::class,'remove_room'])->name('remove-room');
    Route::get('/hotel-list', [App\Http\Controllers\Backend\RoomController::class,'showHotelList'])->name('hotel');
    Route::get('/create-hotel', [App\Http\Controllers\Backend\RoomController::class,'hotel_create'])->name('hotel_create');
    Route::get('/edit-hotel/{id}', [App\Http\Controllers\Backend\RoomController::class, 'edit_hotel'])->name('edit_hotel');
    Route::put('/update-hotel/{id}', [App\Http\Controllers\Backend\RoomController::class, 'update_hotel'])->name('update_hotel');
    #client page
    Route::get('/client-query', [App\Http\Controllers\Backend\ClientController::class, 'cleint_query']);
    Route::get('/client-active/{id}', [App\Http\Controllers\Backend\ClientController::class, 'activeclient']);
    Route::get('/client-block/{id}', [App\Http\Controllers\Backend\ClientController::class, 'deactiveclient']);
    Route::get('/client-delete/{id}', [App\Http\Controllers\Backend\ClientController::class, 'deactiveDelete']);


    #room Booking
    Route::get('/room-booking', [App\Http\Controllers\Backend\RoomBookingController::class, 'room_booking']);
    Route::post('/room-booking/{id}', [App\Http\Controllers\Backend\RoomBookingController::class, 'room_booking_save']);

    #Room Availability Overview
    Route::get('/room-availability-overview', [App\Http\Controllers\Backend\RoomBookingController::class, 'RoomAvailability']);
    Route::get('/search-room-type', [App\Http\Controllers\Backend\RoomBookingController::class, 'searchRoomType']);
    Route::get('/search-room-status', [App\Http\Controllers\Backend\RoomBookingController::class, 'searchRoomStatus']);
    Route::get('/room-status/{id}', [App\Http\Controllers\Backend\RoomBookingController::class, 'Roomstatus']);
    Route::post('/room-status-update', [App\Http\Controllers\Backend\RoomBookingController::class, 'Roomstatusupdate']);
});


 Route::get('/payment', [PaymentController::class,'showPaymentForm'])->name('payment.form');
 Route::post('/make-payment', [PaymentController::class,'makePayment'])->name('make.payment');
 Route::post('/send-password-reset-email', [App\Http\Controllers\Backend\UserController::class, 'sendPasswordResetEmail'])->name('password.email');
 Route::get('/forgot-password', [App\Http\Controllers\Backend\UserController::class,'forgotPasswordForm'])->name('password.request');
 Route::post('/send-password-reset-email', [App\Http\Controllers\Backend\UserController::class,'sendPasswordResetEmail'])->name('password.email');
 Route::get('/reset-password/{token}', [App\Http\Controllers\Backend\UserController::class,'showResetForm'])->name('password.reset');
 Route::post('/reset-password', [App\Http\Controllers\Backend\UserController::class,'resetPassword'])->name('password.update');
 Route::get('/email', [App\Http\Controllers\Backend\UserController::class,'email'])->name('email');
