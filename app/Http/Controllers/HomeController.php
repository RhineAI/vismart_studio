<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\Home;
use App\Models\DetailService;
use App\Models\Service;
use App\Models\SettingHome;
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

        // return $service;

        return view('home', [
            "title" => "Home"
        ] ,compact('clients', 'service', 'setting'));
    }

    // public function check() {
    //     $detailService = DetailService::orderBy('id')->get();
    //     $service = Service::where('id', $detailService->service_id)->get();

    //     return $service;
    // }
}
