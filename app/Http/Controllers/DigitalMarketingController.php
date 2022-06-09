<?php

namespace App\Http\Controllers;
use App\Models\Portofolio;

use Illuminate\Http\Request;

class DigitalMarketingController extends Controller
{
    public function index()
    {
        $portofolios = Portofolio::all();
        return view('digital_marketing', [
            "title" => "Digital Marketing"
        ] ,compact('portofolios'));
    }
}
