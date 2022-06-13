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

        if ($slug == 'marketing-communications') {
            return view('marketing_communications', [
                'title' => 'Marketing Communications',
                'question' => $details->question,
                'image' => $details,
                'answer1' => $details->answer1,
                'answer2' => $details->answer2,
                'answer3' => $details->answer3,
                'reason' => $details->reason,
            ] ,compact('portofolios', 'testimonials', 'details'));
        } else {
            return view('detail_page', [
                'title' => $details->service_id,
                'question' => $details->question,
                'image' => $details->image,
                'answer1' => $details->answer1,
                'answer2' => $details->answer2,
                'answer3' => $details->answer3,
                'reason' => $details->reason,
            ] ,compact('portofolios', 'testimonials', 'details'));
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
