<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jasa = Jasa::all();
        return view('layanan.jasa.index', compact('jasa'));
    }

    public function data()
    {
        $jasa = Jasa::orderBy('id', 'desc')->get();

        return datatables()
            ->of($jasa)
            ->addIndexColumn()
            ->addColumn('title', function($jasa) {
                return $jasa->title;
            })
            ->addColumn('image', function($jasa) {
                return '
                <img width="87%" class="rounded" src="'. asset('storage/'.$jasa->image) .'">
                ';
            })
            ->addColumn('description', function($jasa) {
                return $jasa->description;
            })
            
            // ->addColumn('package', function ($service) {
            //     $packages = '';
            //     foreach ($service->package as $key => $value) {
            //         $packages .= '<div style="text-left" class="py-1 text-white mb-2 ml-2 px-2 mr-5 bg-danger rounded">'. $value->name.'</div>';
            //     }
            //     return $packages;
            // })
            // ->addColumn('module', function ($service) {
            //     $modules = '';
            //     foreach ($service->module as $key => $value) {
            //         $modules .= '<div style="text-left" class="py-1 text-white mb-2 ml-2 px-2 mr-5 bg-primary rounded">'. $value->name.'</div>';
            //     }
            //     return $modules;
            // })
            ->addColumn('created', function($jasa) {
                return tanggal($jasa->created_at);
            })
            ->addColumn('action', function ($jasa) {
                return '
                    <a href="'. route('jasa.edit', $jasa->id) .'" class="btn btn-xs bg-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                    <button onclick="deleteData(`'. route('jasa.destroy', $jasa->id) .'`)" class="btn btn-xs btn-danger btn-flat delete"><i class="fa-solid fa-trash-can"></i></button>
                ';
            })
            ->rawColumns(['action', 'image'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layanan.jasa.create', [
            'jasa' => Jasa::all()
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
            'description' => 'required|max:2500'
        ]);

        if($request->file('image')) {
            $validate['image'] = $request->file('image')->store('jasa');
        }

        $title = $request['title'];
        $image = $validate['image'];
        $description = $validate['description'];
        
        $jasa = new Jasa;
        $jasa->title = $title;
        $jasa->image = $image;
        $jasa->description = $description;
        $jasa->save();
        
        // $service->package()->attach($request->package);        
        // $service->module()->attach($request->module);        

        return redirect('/dashboard/layanan/jasa')->with('success', 'Layanan Jasa baru berhasil ditambah'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jasa  $jasa
     * @return \Illuminate\Http\Response
     */
    public function show(Jasa $jasa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jasa  $jasa
     * @return \Illuminate\Http\Response
     */
    public function edit(Jasa $jasa)
    {
        $jasa = Jasa::findOrFail($jasa->id);

        return view('layanan.jasa.edit', [
            'jasa' => $jasa
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jasa  $jasa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jasa $jasa)
    {
        $validate = $request->validate([
            'title' => 'required|max:50',
            'image' => 'image|file|max:16000',
            'description' => 'required|max:2500'
        ]);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validate['image'] = $request->file('image')->store('jasa');
        }

        $jasa = Jasa::find($jasa->id);
        $jasa->update($validate);
        
        // $service->package()->sync($request->package);        
        // $service->module()->sync($request->module);        

        return redirect('/dashboard/layanan/jasa')->with('success', 'Layanan Jasa berhasil diupdate'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jasa  $jasa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jasa $jasa)
    {
        if($jasa->image) {
            Storage::delete($jasa->image);
        }

        Jasa::destroy($jasa->id);
        return redirect('/dashboard/layanan/jasa')->with('success', 'Layanan Jasa berhasil dihapus');
    }
}
