<?php

namespace App\Http\Controllers;

use App\Models\PackageFeature;
use Illuminate\Http\Request;

class PackageFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packageFeature = PackageFeature::all();
        return view('package-feature.index', compact('packageFeature'));
    }

    public function data()
    {
        $package_feature = PackageFeature::orderBy('id', 'desc')->get();

        return datatables()
            ->of($package_feature)
            ->addIndexColumn()
            ->addColumn('feature', function($package_feature) {
                return $package_feature->feature;
            })
            ->addColumn('created', function($package_feature) {
                return tanggal($package_feature->created_at);
            })
            ->addColumn('action', function ($package_feature) {
                return '
                    <a href="'. route('package-feature.edit', $package_feature->id) .'" class="btn btn-xs bg-info"><i class="fa-solid fa-pen-to-square"></i></a>
                    <button onclick="deleteData(`'. route('package-feature.destroy', $package_feature->id) .'`)" class="btn btn-xs btn-danger btn-flat delete"><i class="fa-solid fa-trash-can"></i></button>
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
        return view('package-feature.create', [
            'package-feature' => PackageFeature::all()
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
        $package = new PackageFeature();
        $package->feature = $request->feature;
        $package->save();

        return redirect('/dashboard/package-feature')->with('success', 'Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PackageFeature  $packageFeature
     * @return \Illuminate\Http\Response
     */
    public function show(PackageFeature $packageFeature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PackageFeature  $packageFeature
     * @return \Illuminate\Http\Response
     */
    public function edit(PackageFeature $packageFeature)
    {
        return view('package-feature.edit', [
            'fitur' => $packageFeature,
            'feature' => PackageFeature::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PackageFeature  $packageFeature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PackageFeature $packageFeature)
    {
        $package = PackageFeature::find($packageFeature->id);
        $package->feature = $request->feature;
        $package->update();

        return redirect('/dashboard/package-feature')->with('success', 'Berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PackageFeature  $packageFeature
     * @return \Illuminate\Http\Response
     */
    public function destroy(PackageFeature $packageFeature)
    {
        PackageFeature::destroy($packageFeature->id);

        return redirect('/dashboard/package-feature')->with('success', 'Berhasil di delete');
    }
}
