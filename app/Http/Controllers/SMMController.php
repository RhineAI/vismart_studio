<?php

namespace App\Http\Controllers;
use App\Models\Portofolio;

use Illuminate\Http\Request;

class SMMController extends Controller
{
    public function index()
    {
        $portofolios = Portofolio::all();
        return view('smm', [
            "title" => "Social Media Management"
        ] ,compact('portofolios'));
    }
}
