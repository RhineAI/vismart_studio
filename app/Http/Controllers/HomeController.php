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

        $article = Article::with(['categories'])
                ->select('*')
                ->latest()->take(3)->get();

        // return $service;

        return view('home', [
            "title" => "Home"
        ] ,compact('clients', 'service', 'setting', 'article'));
    }

    public function blog($slug) {
        $article = Article::with(['categories'])->where('slug', $slug)->first();

        // return $article->photo;

        return view('articles', compact('article'));
    }

    // public function check() {
    //     $detailService = DetailService::orderBy('id')->get();
    //     $service = Service::where('id', $detailService->service_id)->get();

    //     return $service;
    // }
}
