<?php

namespace App\Http\Controllers;
use App\Models\Portofolio;

use Illuminate\Http\Request;

class LogoBrandingController extends Controller
{
    public function index()
    {
        $portofolios = Portofolio::all();
        return view('logo_branding', [
            "title" => "Logo dan Branding"
        ] ,compact('portofolios'));
    }
}
