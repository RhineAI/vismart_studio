<?php

namespace App\Http\Controllers;

use App\Models\DetailServiceJasa;
use Illuminate\Http\Request;

class DetailServiceJasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service_jasa = DetailServiceJasa::all();
        return view('layanan/detail_layanan_jasa/index', compact('service_jasa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layanan.detail_layanan_jasa.create', [
            'service_jasa' => DetailServiceJasa::all()
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
     * @param  \App\Models\DetailServiceJasa  $detailServiceJasa
     * @return \Illuminate\Http\Response
     */
    public function show(DetailServiceJasa $detailServiceJasa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailServiceJasa  $detailServiceJasa
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailServiceJasa $detailServiceJasa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailServiceJasa  $detailServiceJasa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailServiceJasa $detailServiceJasa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailServiceJasa  $detailServiceJasa
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailServiceJasa $detailServiceJasa)
    {
        //
    }
}
