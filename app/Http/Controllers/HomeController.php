<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\Home;
use App\Models\DetailService;
use App\Models\Service;
use App\Models\SettingHome;
use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        $setting = SettingHome::first();
        // $service = Service::where('id', $detailService->service_id)->get();
        $service = DetailService::
                leftJoin('service', 'service.id', 'detail_service.service_id')
                ->select('detail_service.*', 'title', 'logo', 'slug')
                ->orderBy('id', 'asc')->get();

        $article = Article::leftJoin('categories', 'categories.id', 'article.category_id')
                ->select('article.*', 'categories')
                ->orderBy('id', 'desc')->get();

        // return $service;

        return view('home', [
            "title" => "Home"
        ] ,compact('clients', 'service', 'setting', 'article'));
    }

    // public function check() {
    //     $detailService = DetailService::orderBy('id')->get();
    //     $service = Service::where('id', $detailService->service_id)->get();

    //     return $service;
    // }
}
