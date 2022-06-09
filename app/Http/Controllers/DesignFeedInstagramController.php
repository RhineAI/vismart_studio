<?php

namespace App\Http\Controllers;
use App\Models\Portofolio;
use App\Models\Testimonial;

use Illuminate\Http\Request;

class DesignFeedInstagramController extends Controller
{
    public function index()
    {
        $portofolios = Portofolio::all();
        $testimonials = Testimonial::all();
        return view('design_feed_instagram', [
            "title" => "Design Feed Instagram"
        ] ,compact('portofolios', 'testimonials'));
    }
}
