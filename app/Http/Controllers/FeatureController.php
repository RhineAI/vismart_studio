<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Feature = Feature::all();
        return view('feature.index', compact('Feature'));
    }

    public function data()
    {
        $package = Feature::orderBy('id', 'desc')->get();

        return datatables()
            ->of($package)
            ->addIndexColumn()
            ->addColumn('feature', function($package) {
                return $package->feature;
            })
            ->addColumn('created', function($package) {
                return tanggal($package->created_at);
            })
            ->addColumn('action', function ($package) {
                return '
                    <a href="'. route('feature.edit', $package->id) .'" class="btn btn-xs bg-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                    <button onclick="deleteData(`'. route('feature.destroy', $package->id) .'`)" class="btn btn-xs btn-danger btn-flat delete"><i class="fa-solid fa-trash-can"></i></button>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('feature.create', [
            'feature' => Feature::all()
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
        $feature = new Feature();
        $feature->feature = $request->feature;
        $feature->save();

        return redirect('/dashboard/feature')->with('success', 'Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function show(Feature $feature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function edit(Feature $feature)
    {
        return view('feature.edit', [
            'fitur' => $feature,
            'feature' => Feature::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feature $feature)
    {
        $feature = Feature::find($feature->id);
        $feature->feature = $request->feature;
        $feature->update();

        return redirect('/dashboard/feature')->with('success', 'Berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feature $feature)
    {
        Feature::destroy($feature->id);

        return redirect('/dashboard/feature')->with('success', 'Berhasil di delete');
    }
}
