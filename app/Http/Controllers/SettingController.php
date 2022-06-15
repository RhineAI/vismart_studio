<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::first();
        return view('setting.index', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $save = new Setting();
        $save->is_info = $request->boolean( key:'is_info');
        $save->is_previllege = $request->boolean( key:'is_previllege');
        $save->is_jasa = $request->boolean( key:'is_jasa');
        $save->is_portofolio = $request->boolean( key:'is_portofolio');
        $save->is_testimonial = $request->boolean( key:'is_testimonial');
        $save->is_package = $request->boolean( key:'is_package');
        $save->save();

        return redirect('/dashboard/setting')->with('success', 'Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }

    public function ubah($id)
    {
        $setting = Setting::find($id);
        return view('setting.index', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Setting::find($id);
        $update->is_info = $request->boolean( key:'is_info');
        $update->is_previllege = $request->boolean( key:'is_previllege');
        $update->is_jasa = $request->boolean( key:'is_jasa');
        $update->is_portofolio = $request->boolean( key:'is_portofolio');
        $update->is_testimonial = $request->boolean( key:'is_testimonial');
        $update->is_package = $request->boolean( key:'is_package');
        $update->update();

        return redirect('/dashboard/setting')->with('success', 'Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
