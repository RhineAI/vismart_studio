<?php

namespace App\Http\Controllers;
use App\Models\Client;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('home', [
            "title" => "Home"
        ] ,compact('clients'));
    }
}
