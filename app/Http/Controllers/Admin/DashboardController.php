<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Client;
use App\Models\Service;
use App\Models\Package;
use App\Models\Portofolio;
use App\Models\SettingDashboard;
use App\Models\Testimonial;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function dashboard()
    {   
        $layanan = Service::count();
        $paket = Package::count();
        $portofolio = Portofolio::count();
        $testimonial = Testimonial::count();
        $article = Article::count();
        $client = Client::count();

        // $setting = SettingDashboard::first();

        return view('admin.dashboard', compact('layanan', 'paket', 'portofolio', 'testimonial', 'article', 'client'));
    }
}
