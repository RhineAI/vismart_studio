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

        $detail = DetailService::with(['service', 'advantage', 'jasa', 'package.feature'])
                                ->select('*')
                                ->where('service_id', $service->id)->first();

        // return $detail->service->title;

        // $detail = DetailService::with(['advantage', 'jasa', 'package.feature'])->leftJoin('service', 'service.id', 'detail_service.service_id')->select('*')->findOrFail($service->id);

        // dd($detail);
        $portofolios = Portofolio::orderBy('title', 'ASC')->get();
        $testimonials = Testimonial::orderBy('name', 'ASC')->get();

        if ($slug == 'marketing-communications') {
            return view('marketing_communications', [
                'title' => 'Marketing Communications',
                'question' => $detail->question,
                'image' => $detail,
                'answer1' => $detail->answer1,
                'answer2' => $detail->answer2,
                'answer3' => $detail->answer3,
                'reason' => $detail->reason,
            ] ,compact('portofolios', 'testimonials', 'detail'));
        } else {
            return view('detail_page', [
                'title' => $detail->service->title,
                'question' => $detail->question,
                'image' => $detail,
                'answer1' => $detail->answer1,
                'answer2' => $detail->answer2,
                'answer3' => $detail->answer3,
                'reason' => $detail->reason,
            ] ,compact('portofolios', 'testimonials', 'detail'));
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
