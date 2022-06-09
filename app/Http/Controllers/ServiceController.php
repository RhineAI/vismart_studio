<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Package;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        return view('service.index', compact('service'));
    }

    public function data()
    {
        $service = Service::orderBy('id', 'desc')->get();

        return datatables()
            ->of($service)
            ->addIndexColumn()
            ->addColumn('image', function($service) {
                return '
                <img width="87%" class="rounded" src="'. asset('storage/'.$service->image) .'">
                ';
            })
            ->addColumn('title', function($service) {
                return $service->title;
            })
            ->addColumn('package', function ($service) {
                $packages = '';
                foreach ($service->package as $key => $value) {
                    $packages .= '<div style="text-left" class="py-1 text-white mb-2 ml-2 px-2 mr-5 bg-danger rounded">'. $value->name.'</div>';
                }
                return $packages;
            })
            ->addColumn('module', function ($service) {
                $modules = '';
                foreach ($service->module as $key => $value) {
                    $modules .= '<div style="text-left" class="py-1 text-white mb-2 ml-2 px-2 mr-5 bg-primary rounded">'. $value->name.'</div>';
                }
                return $modules;
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
        return view('service.create', [
            'service' => Service::all(),
            'module' => Module::all(),
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
            'image' => 'image|file|required|max:16000',
            // 'description' => 'required|max:2500'
        ]);

        if($request->file('image')) {
            $validate['image'] = $request->file('image')->store('service');
        }

        $title = $request['title'];
        $image = $validate['image'];
        
        $service = new Service;
        $service->title = $title;
        $service->image = $image;
        $service->save();
        
        $service->package()->attach($request->package);        
        $service->module()->attach($request->module);        

        return redirect('/dashboard/service')->with('success', 'Berhasil ditambahkan'); 
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
        $module = Module::orderBy('name', 'ASC')->get();

        return view('service.edit', [
            'service' => $serv,
            'package' => $package,
            'module' => $module,
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
        $validate = $request->validate([
            'title' => 'required|max:50',
            'image' => 'image|file|max:16000',
            // 'description' => 'required|max:2500'
        ]);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validate['image'] = $request->file('image')->store('service');
        }

        $service = Service::find($service->id);
        $service->update($validate);
        
        $service->package()->sync($request->package);        
        $service->module()->sync($request->module);        

        return redirect('/dashboard/service')->with('success', 'Berhasil ditambahkan'); 
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
        return redirect('/dashboard/service')->with('success', 'Berhasil di Delete');
    }
}
