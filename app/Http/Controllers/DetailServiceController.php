<?php

namespace App\Http\Controllers;

use App\Models\DetailService;
use App\Models\Service;
use Illuminate\Http\Request;

class DetailServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = Service::all()->pluck('id', 'title');
        $detail_service = DetailService::all();
        return view('layanan/detail_layanan/index', compact('service','detail_service'));
    }

    public function data()
    {
        $service = DetailService::orderBy('id', 'desc')->get();

        return datatables()
            ->of($service)
            ->addIndexColumn()
            ->addColumn('layanan', function ($service) {
                return $service->service;
            })
            ->addColumn('created', function($service) {
                return tanggal($service->created_at);
            })
            ->addColumn('action', function ($service) {
                return '
                    
                    <button onclick="deleteData(`'. route('detail_layanan.destroy', $service->id) .'`)" class="btn btn-xs btn-danger btn-flat delete"><i class="fa-solid fa-trash-can"></i></button>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    // <a href="'. route('detail_layanan.edit', $service->id) .'" class="btn btn-xs bg-warning"><i class="fa-solid fa-pen-to-square"></i></a>


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layanan/detail_layanan/create', [
            'service' => Service::all()->pluck('title')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service = new DetailService();
        $service->service = $request->service;
        $service->save();

        return redirect('/dashboard/layanan/detail_layanan')->with('success', 'Berhasil Ditambahkan');


        // $service->service()->attach($request->service);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailService  $detailService
     * @return \Illuminate\Http\Response
     */
    public function show(DetailService $detailService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailService  $detailService
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailService $detailService)
    {
        return view('layanan/detail_layanan/edit', [
            'serv' => $detailService,
            'detail_service' => DetailService::all(),
            'service' => Service::all()->pluck('title')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailService  $detailService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailService $detailService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailService  $detailService
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailService $detailService)
    {
        DetailService::find($detailService->id)->destroy();
        return redirect('/dashboard/layanan/detail_layanan')->with('success', 'Berhasil di delete');
    }
}
