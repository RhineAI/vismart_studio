<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    DashboardController,
    AuthController,
};

use App\Http\Controllers\LogoBrandingController;
use App\Http\Controllers\DesignFeedInstagramController;
use App\Http\Controllers\DigitalMarketingController;
use App\Http\Controllers\SMMController;
use App\Http\Controllers\MarketingCommunicationsController;


use App\Http\Controllers\AdvantageController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\DetailServiceController;
use App\Http\Controllers\DetailServiceJasaController;
use App\Http\Controllers\DetailServicePackageController;
use App\Http\Controllers\DetailServicePrevillegeController;
use App\Http\Controllers\JasaController;
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
Route::get('/smm', function () {
    return view('smm', [
        'title' => 'Social Media Management'
    ]);
});

// FrontEnd UI/UX
    // Logo Branding
    Route::get('/logobranding', [LogoBrandingController::class, 'index'])->name('logobranding.index');

    // Design Feed Instagram
    Route::get('/designfeed', [DesignFeedInstagramController::class, 'index'])->name('designfeed.index');

    // Digital Marketing
    Route::get('/digitalmarketing', [DigitalMarketingController::class, 'index'])->name('digitalmarketing.index');

    // Social MM
    Route::get('/smm', [SMMController::class, 'index'])->name('smm.index');

    // Marketing Communications
    Route::get('/marketingcommunications', [MarketingCommunicationsController::class, 'index'])->name('marketing.index');
//

// Login Dashboard
    Route::get('/auth/login', [AuthController::class, 'auth'])->name('auth.index');
    Route::post('/auth/process', [AuthController::class, 'process'])->name('auth.process');
//

// Disini untuk admin
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard']);

    // Rute Semua Layanan
        // Service
        Route::resource('/dashboard/layanan/service', ServiceController::class);
        Route::post('/dashboard/layanan/service/data', [ServiceController::class, 'data'])->name('service.data');

        // Service - Sub (What are the Service are)
        Route::resource('/dashboard/layanan/jasa', JasaController::class);
        Route::post('/dashboard/layanan/jasa/data', [JasaController::class, 'data'])->name('jasa.data');

         // Detail Services
         Route::resource('/dashboard/layanan/detail_layanan', DetailServiceController::class);
         Route::post('/dashboard/layanan/detail_layanan/data', [DetailServiceController::class, 'data'])->name('detail_service.data');

         // Detail Service Previlleges
         Route::resource('/dashboard/layanan/detail_layanan_keuntungan', DetailServicePrevillegeController::class);
         Route::post('/dashboard/layanan/detail_layanan_keuntungan/data', [DetailServicePrevillegeController::class, 'data'])->name('detail_service_keuntungan.data');
    
         // Detail Service - Sub
         Route::resource('/dashboard/layanan/detail_layanan_jasa', DetailServiceJasaController::class);
         Route::post('/dashboard/layanan/detail_layanan_jasa/data', [DetailServiceJasaController::class, 'data'])->name('detail_service_jasa.data');
 
         // Detail Service Packages
         Route::resource('/dashboard/layanan/detail_layanan_paket', DetailServicePackageController::class);
         Route::post('/dashboard/layanan/detail_layanan_paket/data', [DetailServicePackageController::class, 'data'])->name('detail_service_package.data');
 
    //
        
    // Testimonial
    Route::resource('/dashboard/testimonial', TestimonialController::class);
    Route::post('/dashboard/testimonial/data', [TestimonialController::class, 'data'])->name('testimonial.data');

    // Portofolio
    Route::resource('/dashboard/portofolio', PortofolioController::class);
    Route::post('/dashboard/portofolio/data', [PortofolioController::class, 'data'])->name('portofolio.data');

    //List Module
    // Route::resource('/dashboard/module', ModuleController::class);
    // Route::post('/dashboard/module/data', [ModuleController::class, 'data'])->name('module.data');

    //Package
        Route::resource('dashboard/package', PackageController::class);
        Route::post('/dashboard/package/data', [PackageController::class, 'data'])->name('package.data');
        //Feature
        Route::resource('dashboard/feature', FeatureController::class);
        Route::post('/dashboard/feature/data', [FeatureController::class, 'data'])->name('feature.data');
     //   

    // Client
    Route::resource('/dashboard/client', ClientController::class);
    Route::post('/dashboard/client/data', [ClientController::class, 'data'])->name('client.data');

    //Advantage or Previllege
    Route::resource('dashboard/advantage', AdvantageController::class);
    Route::post('/dashboard/advantage/data', [AdvantageController::class, 'data'])->name('advantage.data');


    //User
    Route::resource('dashboard/user', UserController::class);
    Route::post('/dashboard/user/data', [UserController::class, 'data'])->name('user.data');

    //Logout
    Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');    
    
});



