<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\DetailService;
use App\Models\DetailServicePrevillege;
use App\Models\Portofolio;
use App\Models\Testimonial;

use Illuminate\Http\Request;

class DetailPageController extends Controller
{
    public function index($slug)
    {
        $service = Service::where('slug', $slug)->first();

        $details = DetailService::with(['advantage', 'jasa', 'package.feature'])
                                ->leftJoin('service', 'service.id', '=', 'detail_service.service_id')
                                ->select('*')
                                ->find($service->id);

        // return $details;

        $portofolios = Portofolio::orderBy('title', 'ASC')->get();
        $testimonials = Testimonial::orderBy('name', 'ASC')->get();

        if ($slug == 'logobranding') {
            return view('logo_branding', [
                "title" => 'Logo Branding',
            ] ,compact('portofolios', 'testimonials', 'details'));
        } else {
            return redirect('/');
        }

        // return $service;
        // $detailService = DetailService::all();
        // $service = DetailServicePrevillege::
        // leftJoin('advantage', 'advantage.id' , 'detail_service_previllege.advantage_id')
        // ->select('detail_service_previllege.*', 'advantage')
        // ->orderBy('id', 'asc')->get();

        // return view('logo_branding', [
        //     "title" => "Logo dan Branding"
        // ] ,compact('portofolios', 'testimonials', 'service', 'detailService'));

    }
}
