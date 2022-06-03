<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

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