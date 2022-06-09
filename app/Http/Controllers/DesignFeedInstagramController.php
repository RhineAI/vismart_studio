<?php

namespace App\Http\Controllers;
use App\Models\Portofolio;

use Illuminate\Http\Request;

class DesignFeedInstagramController extends Controller
{
    public function index()
    {
        $portofolios = Portofolio::all();
        return view('design_feed_instagram', [
            "title" => "Design Feed Instagram"
        ] ,compact('portofolios'));
    }
}
