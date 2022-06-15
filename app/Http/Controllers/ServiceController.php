<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Package;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = Service::all();
        return view('layanan.service.index', compact('service'));
    }

    public function data()
    {
        $service = Service::orderBy('id', 'desc')->get();

        return datatables()
            ->of($service)
            ->addIndexColumn()
            ->addColumn('image', function($service) {
                return '
                <img width="87%" class="rounded" src="'. asset('storage/'.$service->logo) .'">
                ';
            })
            ->addColumn('title', function($service) {
                return $service->title;
            })
            ->addColumn('slug', function($service) {
                return $service->slug;
            })
            ->addColumn('created', function($service) {
                return tanggal($service->created_at);
            })
            ->addColumn('action', function ($service) {
                return '
                    <a href="'. route('service.edit', $service->id) .'" class="btn btn-xs bg-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                    <button onclick="deleteData(`'. route('service.destroy', $service->id) .'`)" class="btn btn-xs btn-danger btn-flat delete"><i class="fa-solid fa-trash-can"></i></button>
                ';
            })
            ->rawColumns(['action', 'package', 'module', 'image'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layanan.service.create', [
            'service' => Service::all(),
            // 'module' => Module::all(),
            'package' => Package::all(),
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
        $validate = $request->validate([
            'title' => 'required|max:50',
            'slug' => 'required|unique:service',
            'logo' => 'image|file|required|max:10240'
        ]);

        if($request->file('logo')) {
            $validate['logo'] = $request->file('logo')->store('service');
        }

        $title = $request['title'];
        $logo = $validate['logo'];
        
        $service = new Service;
        $service->title = $title;
        $service->logo = $logo;
        $service->save();

        return redirect('/dashboard/layanan/service')->with('success', 'Layanan Utama baru berhasil ditambah'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $serv = Service::findOrFail($service->id);
        $package = Package::orderBy('name', 'ASC')->get();
        // $module = Module::orderBy('name', 'ASC')->get();

        return view('layanan.service.edit', [
            'service' => $serv,
            'package' => $package
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $rules = [
            'title' => 'max:50',
            'logo' => 'image|file|max:16000'
        ];

        if ($request->slug != $service->slug) {
            $rules['slug'] = 'unique:service';
        }
        
        $validate = $request->validate($rules);

        if($request->file('logo')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validate['logo'] = $request->file('logo')->store('service');
        }

        $service = Service::find($service->id);
        $service->update($validate);       

        return redirect('/dashboard/layanan/service')->with('success', 'Layanan Utama berhasil diupdate'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        if($service->image) {
            Storage::delete($service->image);
        }

        Service::destroy($service->id);
        return redirect('/dashboard/layanan/service')->with('success', 'Layanan Utama berhasil dihapus');
    }

    public function makeSlug(Request $request)
    {
        $slug = SlugService::createSlug(Service::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
