<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\DetailService;
use App\Models\DetailServicePrevillege;
use App\Models\Portofolio;
use App\Models\Testimonial;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DetailPageController extends Controller
{
    public function index($slug)
    {
        $service = Service::where('slug', $slug)->first();

        $detail = DetailService::with(['service','advantage', 'jasa', 'package.feature'])
                                // ->leftJoin('service', 'service.id', '=', 'detail_service.service_id')
                                ->select('*')
                                ->where('service_id', $service->id)->first();

        // return $detail;

        // $detail = DetailService::with(['advantage', 'jasa', 'package.feature'])->leftJoin('service', 'service.id', 'detail_service.service_id')->select('*')->findOrFail($service->id);

        // dd($detail);
        $portofolio = DB::table('portofolio')->orderBy('title', 'DESC')->get();
        $testimonial = Testimonial::orderBy('name', 'DESC')->get();

        if ($slug == 'marketing-communications') {
            return view('marketing_communications', [
                'title' => 'Marketing Communications',
                'question' => $detail->question,
                'image' => $detail,
                'answer' => $detail->answer,
                'reason' => $detail->reason,
                'portofolio' => $portofolio,
                'testimonial' => $testimonial,
                ] ,compact('detail'));
        } else if($slug == 'design-feed-instagram') {
            return view('design_feed_instagram', [
                'title' => $detail->service->title,
                'question' => $detail->question,
                'image' => $detail,
                'answer' => $detail->answer,
                'reason' => $detail->reason,
                'portofolio' => $portofolio,
                'testimonial' => $testimonial,
                ] ,compact('detail'));
        } else {
            // return $portofolio;
            return view('detail_page', [
                'title' => $detail->service->title,
                'question' => $detail->question,
                'image' => $detail,
                'answer' => $detail->answer,
                'reason' => $detail->reason,
                'portofolio' => $portofolio,
                'testimonial' => $testimonial,
                ] ,compact('detail'));
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
