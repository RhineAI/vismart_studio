<?php

namespace App\Http\Controllers;

use App\Models\DetailServicePackage;
use Illuminate\Http\Request;

class DetailServicePackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service_package = DetailServicePackage::all();
        return view('layanan/detail_layanan_paket/index', compact('service_package'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layanan.detail_layanan_paket.create', [
            'service_package' => DetailServicePackage::all()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailServicePackage  $detailServicePackage
     * @return \Illuminate\Http\Response
     */
    public function show(DetailServicePackage $detailServicePackage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailServicePackage  $detailServicePackage
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailServicePackage $detailServicePackage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailServicePackage  $detailServicePackage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailServicePackage $detailServicePackage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailServicePackage  $detailServicePackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailServicePackage $detailServicePackage)
    {
        //
    }
}
