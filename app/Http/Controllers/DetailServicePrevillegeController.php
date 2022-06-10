<?php

namespace App\Http\Controllers;

use App\Models\DetailServicePrevillege;
use Illuminate\Http\Request;

class DetailServicePrevillegeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service_previllege = DetailServicePrevillege::all();
        return view('layanan/detail_layanan_keuntungan/index', compact('service_previllege'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layanan/detail_layanan_keuntungan/create', [
            'service_previllege' => DetailServicePrevillege::all()
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
     * @param  \App\Models\DetailServicePrevillege  $detailServicePrevillege
     * @return \Illuminate\Http\Response
     */
    public function show(DetailServicePrevillege $detailServicePrevillege)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailServicePrevillege  $detailServicePrevillege
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailServicePrevillege $detailServicePrevillege)
    {
        return view('layanan/detail_layanan_keuntungan/create', [
            'service_previllege' => DetailServicePrevillege::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailServicePrevillege  $detailServicePrevillege
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailServicePrevillege $detailServicePrevillege)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailServicePrevillege  $detailServicePrevillege
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailServicePrevillege $detailServicePrevillege)
    {
        //
    }
}
