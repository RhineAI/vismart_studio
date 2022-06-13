<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\Home;
use App\Models\DetailService;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        // $detailService = DetailService::all();
        // $service = Service::where('id', $detailService->service_id)->get();
        $service = DetailService::
                leftJoin('service', 'service.id', 'detail_service.service_id')
                ->select('detail_service.*', 'title', 'slug')
                ->orderBy('id', 'asc')->get();

        // return $service;

        return view('home', [
            "title" => "Home"
        ] ,compact('clients', 'service'));
    }

    // public function check() {
    //     $detailService = DetailService::orderBy('id')->get();
    //     $service = Service::where('id', $detailService->service_id)->get();

    //     return $service;
    // }
}
