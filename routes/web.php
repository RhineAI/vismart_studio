<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    DashboardController,
    AuthController,
};

use App\Http\Controllers\LogoBrandingController;
use App\Http\Controllers\DesignFeedInstagramController;
use App\Http\Controllers\DigitalMarketingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SMMController;
use App\Http\Controllers\MarketingCommunicationsController;

use App\Http\Controllers\AdvantageController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DetailPageController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\DetailServiceController;
use App\Http\Controllers\JasaController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PackageFeatureController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/check', [HomeController::class, 'check'])->name('home.check');

Route::get('/layanan/{slug}', [DetailPageController::class, 'index'])->name('detail_page.index');

// FrontEnd UI/UX
    // Logo Branding
    // Route::get('/logobranding', [LogoBrandingController::class, 'index'])->name('logobranding.index');

   // Design Feed Instagram
    // Route::get('/designfeed', [DesignFeedInstagramController::class, 'index'])->name('designfeed.index');

    // Digital Marketing
    // Route::get('/digitalmarketing', [DigitalMarketingController::class, 'index'])->name('digitalmarketing.index');

    // Social MM
    // Route::get('/smm', [SMMController::class, 'index'])->name('smm.index');

    // Marketing Communications
    // Route::get('/marketingcommunications', [MarketingCommunicationsController::class, 'index'])->name('marketing.index');

    // Login Dashboard
    Route::get('/auth/login', [AuthController::class, 'auth'])->name('auth.index');
    Route::post('/auth/process', [AuthController::class, 'process'])->name('auth.process');

// Disini untuk admin
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard']);

    // Rute Semua Layanan

        // Slug Service 
        Route::get('/dashboard/layanan/service/makeSlug', [ServiceController::class, 'makeSlug'])->middleware('auth');

        // Service
        Route::resource('/dashboard/layanan/service', ServiceController::class);
        Route::post('/dashboard/layanan/service/data', [ServiceController::class, 'data'])->name('service.data');

        // Service - Sub (What are the Service are)
        Route::resource('/dashboard/layanan/jasa', JasaController::class);
        Route::post('/dashboard/layanan/jasa/data', [JasaController::class, 'data'])->name('jasa.data');

         // Detail Services
         Route::resource('/dashboard/layanan/detail_layanan', DetailServiceController::class);
         Route::post('/dashboard/layanan/detail_layanan/data', [DetailServiceController::class, 'data'])->name('detail_service.data');
         Route::get('/dashboard/layanan/detail_layanan/{id}/edit', [DetailServiceController::class, 'ubah'])->name('detail_layanan.ubah');
         Route::delete('/dashboard/layanan/detail_layanan/{id}/hapus', [DetailServiceController::class, 'hapus'])->name('detail_service.hapus');
    //

    // Testimonial
    Route::resource('/dashboard/article', ArticleController::class);
    Route::post('/dashboard/article/data', [ArticleController::class, 'data'])->name('article.data');
        
    // Testimonial
    Route::resource('/dashboard/testimonial', TestimonialController::class);
    Route::post('/dashboard/testimonial/data', [TestimonialController::class, 'data'])->name('testimonial.data');

    // Portofolio
    Route::resource('/dashboard/portofolio', PortofolioController::class);
    Route::post('/dashboard/portofolio/data', [PortofolioController::class, 'data'])->name('portofolio.data');

    //Package
    Route::resource('dashboard/package', PackageController::class);
    Route::post('/dashboard/package/data', [PackageController::class, 'data'])->name('package.data');
    //Feature
    Route::resource('dashboard/feature', FeatureController::class);
    Route::post('/dashboard/feature/data', [FeatureController::class, 'data'])->name('feature.data'); 

    // Client
    Route::resource('/dashboard/client', ClientController::class);
    Route::post('/dashboard/client/data', [ClientController::class, 'data'])->name('client.data');

    //Feature
    Route::resource('dashboard/feature', FeatureController::class);
    Route::post('/dashboard/feature/data', [FeatureController::class, 'data'])->name('feature.data');

    //Advantage or Previllege
    Route::resource('/dashboard/advantage', AdvantageController::class);
    Route::post('/dashboard/advantage/data', [AdvantageController::class, 'data'])->name('advantage.data');

    // Article
    Route::resource('/dashboard/article', ArticleController::class);
    Route::post('/dashboard/article/data', [ArticleController::class, 'data'])->name('article.data');
        // Slug Service 
        Route::get('/dashboard/article/makeSlug', [ServiceController::class, 'makeSlug'])->middleware('auth');

    // User
    Route::resource('dashboard/user', UserController::class);
    Route::post('/dashboard/user/data', [UserController::class, 'data'])->name('user.data');

    //Setting
    Route::resource('/dashboard/setting', SettingController::class);
    Route::put('/dashboard/setting/{id}/setting_home', [SettingController::class, 'updateHome'])->name('setting.updateHome');
    Route::put('/dashboard/setting/{id}/setting_dashboard', [SettingController::class, 'updateDashboard'])->name('setting.updateDashboard');

    //Logout
    Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');    
    
});
