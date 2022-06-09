<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    DashboardController,
    AuthController,
};
use App\Http\Controllers\AdvantageController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FeatureController;
// use App\Http\Controllers\LogoutController;
// use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PackageFeatureController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UserController;

// use App\Http\Controllers\UserController ;

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

Route::get('/', function () {
    return view('home', [
        'title' => 'Home'
    ]);
});

Route::get('/marketingcommunications', function () {
    return view('marketing_communications', [
        'title' => 'Marketing Communications'
    ]);
});
Route::get('/designfeed', function () {
    return view('design_feed_instagram', [
        'title' => 'Design Feed Instagram'
    ]);
});
Route::get('/digitalmarketing', function () {
    return view('digital_marketing', [
        'title' => 'Digital Marketing'
    ]);
});
Route::get('/smm', function () {
    return view('smm', [
        'title' => 'Social Media Management'
    ]);
});
Route::get('/logobranding', function () {
    return view('logo_branding', [
        'title' => 'Logo dan Branding'
    ]);
});

Route::get('/auth/login', [AuthController::class, 'auth'])->name('auth.index');
Route::post('/auth/process', [AuthController::class, 'process'])->name('auth.process');

// Disini untuk admin
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard']);

    //Service
    Route::resource('/dashboard/service', ServiceController::class);
    Route::post('/dashboard/service/data', [ServiceController::class, 'data'])->name('service.data');
    
    // Testimonial
    Route::resource('/dashboard/testimonial', TestimonialController::class);
    Route::post('/dashboard/testimonial/data', [TestimonialController::class, 'data'])->name('testimonial.data');

    // Portofolio
    Route::resource('/dashboard/portofolio', PortofolioController::class);
    Route::post('/dashboard/portofolio/data', [PortofolioController::class, 'data'])->name('portofolio.data');

    //List Module
    Route::resource('/dashboard/module', ModuleController::class);
    Route::post('/dashboard/module/data', [ModuleController::class, 'data'])->name('module.data');

    //Package
    Route::resource('dashboard/package', PackageController::class);
    Route::post('/dashboard/package/data', [PackageController::class, 'data'])->name('package.data');

    // Client
    Route::resource('/dashboard/client', ClientController::class);
    Route::post('/dashboard/client/data', [ClientController::class, 'data'])->name('client.data');

    //Feature
    Route::resource('dashboard/feature', FeatureController::class);
    Route::post('/dashboard/feature/data', [FeatureController::class, 'data'])->name('feature.data');

    //Advantage
    Route::resource('dashboard/advantage', AdvantageController::class);
    Route::post('/dashboard/advantage/data', [AdvantageController::class, 'data'])->name('advantage.data');

    //User
    Route::resource('dashboard/user', UserController::class);
    Route::post('/dashboard/user/data', [UserController::class, 'data'])->name('user.data');

    //Logout
    Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');    
    
});



