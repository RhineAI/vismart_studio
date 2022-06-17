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
        // return json_encode($package);
        $feature = PackageFeature::all();
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
            ->addColumn('feature', function ($package) {
                $features = '';
                foreach ($package->feature as $key => $value) {
                    $features .= '<div style="text-left" class="py-1 text-white mb-2 ml-2 px-2 mr-5 bg-primary rounded">'. $value->feature.'</div>';
                }
                return $features;
            })
            ->addColumn('price', function($package) {
                return 'IDR '. format_uang($package->price) .',00';
            })
            ->addColumn('link', function($package) {
                return $package->link;
            })
            ->addColumn('mainView', function($package) {
                if($package->is_first == 1){
                    $is_first = '<span class="badge badge-primary">Ya</span>';   
                } else{
                    $is_first = '<span class="badge badge-info">Tidak</span>';   
                }

                return $is_first;
            })
            ->addColumn('created', function($package) {
                return tanggal($package->created_at);
            })
            ->addColumn('action', function ($package) {
                return '
                    <a href="'. route('package.edit', $package->id) .'" class="btn btn-xs bg-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                    <button onclick="deleteData(`'. route('package.destroy', $package->id) .'`)" class="btn btn-xs btn-danger btn-flat delete"><i class="fa-solid fa-trash-can"></i></button>
                ';
            })
            ->rawColumns(['action', 'feature', 'mainView'])
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
        $package->link = '0'. $request->link;
        $package->is_first = $request->boolean( key:'isFirst');
        $package->save();
        
        // return $package;
        
        $package->feature()->attach($request->feature);

        return redirect()->route('package.index')->with(['success' => 'Berhasil Disimpan!']);

        // return redirect('/dashboard/package')->with('success', 'Paket baru berhasil ditambah');      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        $package = Package::find($package->id);

        dd($package);

        // return view('package.show', [
        //     'pack' => $package,

        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        $pack = Package::findOrFail($package->id);
        $feature = Feature::orderBy('feature', 'ASC')->get();

        return view('package.edit', [
            'pack' => $package,
            'package' => $pack,
            'feature' => $feature,
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
        $package->link = $request->link;
        $package->is_first = $request->boolean( key:'isFirst');
        $package->update();

        $package->feature()->sync($request->feature) ;

        return redirect()->route('package.index')->with(['success' => 'Berhasil Diperbarui!']);

        // return redirect('/dashboard/package')->with('success', 'Paket berhasil diupdate');
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

        return redirect()->route('package.index')->with(['success' => 'Berhasil Dihapus!']);

        // return redirect('/dashboard/package')->with('success', 'Paket berhasil dihapus');
    }
}
