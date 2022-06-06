<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PackageFeatureController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\TestimonialController;

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

Route::get('/dashboard', [DashboardController::class, 'dashboard']);
    
// Testimonial
Route::resource('/dashboard/testimonial', TestimonialController::class);
Route::post('/dashboard/testimonial/data', [TestimonialController::class, 'data'])->name('testimonial.data');

// Portofolio
Route::resource('/dashboard/portofolio', PortofolioController::class);
Route::get('/dashboard/portofolio/data', [PortofolioController::class, 'data'])->name('portofolio.data');
Route::post('/dashboard/portofolio/data', [PortofolioController::class, 'data'])->name('portofolio.data');

// Client
Route::resource('/dashboard/client', ClientController::class);
Route::get('/dashboard/client/data', [ClientController::class, 'data'])->name('client.data');

//Package
Route::resource('dashboard/package', PackageController::class);
Route::post('/dashboard/package/data', [PackageController::class, 'data'])->name('package.data');


//Package Feature
Route::resource('dashboard/package-feature', PackageFeatureController::class);
Route::post('/dashboard/package-feature/data', [PackageFeatureController::class, 'data'])->name('package-feature.data');

