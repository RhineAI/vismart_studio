<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Package;
use App\Models\PackageFeature;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $package = Package::all();
        $feature = Feature::all();
        return view('package.index', compact('package', 'feature'));
    }

    public function data()
    {
        $package = Package::orderBy('id', 'desc')->get();

        return datatables()
            ->of($package)
            ->addIndexColumn()
            ->addColumn('name', function($package) {
                return $package->name;
            })
            ->addColumn('price', function($package) {
                return 'IDR '. format_uang($package->price) .',00';
            })
            ->addColumn('noTelp', function($package) {
                return $package->noTelp;
            })
            ->addColumn('created', function($package) {
                return tanggal($package->created_at);
            })
            ->addColumn('action', function ($package) {
                return '
                    <button onclick="showData(`'. route('package.show', $package->id) .'`)" class="btn btn-xs btn-danger btn-flat delete"><i class="fa-solid fa-trash-can"></i></button>
                    <a href="'. route('package.edit', $package->id) .'" class="btn btn-xs bg-info"><i class="fa-solid fa-pen-to-square"></i></a>
                    <button onclick="deleteData(`'. route('package.destroy', $package->id) .'`)" class="btn btn-xs btn-danger btn-flat delete"><i class="fa-solid fa-trash-can"></i></button>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    public function checkPrice($value)
    {
        if (gettype($value) == "string") {
            $temp = 0;
            for ($i = 0; $i < strlen($value); $i++) {
                if ((isset($value[$i]) == true && $value[$i] != ".") && $value[$i] != ",") {
                    $temp = ($temp * 10) + (int)$value[$i];
                }
            }
            return $temp;
        } else {
            return $value;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('package.create', [
            'package' => Package::all(),
            'feature' => Feature::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $package = new Package;
        $package->name = $request->name;
        $package->price = $this->checkPrice($request->price);
        $package->noTelp = '62 '. $request->noTelp;
        $package->save();
        
        $package->feature()->attach($request->feature) ;

        return redirect('/dashboard/package')->with('success', 'Berhasil ditambahkan');      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        return view('package.show', [
            'pack' => $package,
            'package' => Package::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        return view('package.edit', [
            'pack' => $package,
            'package' => Package::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Package $package)
    {
        $package = Package::find($package->id);
        $package->name = $request->name;
        $package->price = $this->checkPrice($request->price);
        $package->noTelp = '+62 '. $request->noTelp;
        $package->update();

        $package->feature()->sync($request->feature) ;

        return redirect('/dashboard/package')->with('success', 'Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        Package::destroy($package->id);

        return redirect('/dashboard/package')->with('success', 'Berhasil di delete');
    }
}
