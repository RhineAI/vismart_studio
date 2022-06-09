<?php

namespace App\Http\Controllers;
use App\Models\Portofolio;

use Illuminate\Http\Request;

class MarketingCommunicationsController extends Controller
{
    public function index()
    {
        $portofolios = Portofolio::all();
        return view('marketing_communications', [
            "title" => "Marketing Communications"
        ] ,compact('portofolios'));
    }
}
