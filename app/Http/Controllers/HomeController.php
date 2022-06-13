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
        $detailService = DetailService::all();
        $service = Service::all();

        return view('home', [
            "title" => "Home"
        ] ,compact('clients', 'detailService', 'service'));
    }
}
