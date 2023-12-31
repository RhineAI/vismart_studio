<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
// use File;

class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portofolio = Portofolio::all();
        return view('portofolio.index', compact('portofolio'));
    }

    public function data()
    {
        $portofolio = Portofolio::orderBy('id', 'desc')->get();

        return datatables()
            ->of($portofolio)
            ->addIndexColumn()
            ->addColumn('title', function($portofolio) {
                return $portofolio->title;
            })
            ->addColumn('image', function($portofolio) {
                return '
                <img width="90%" class="rounded" src="'. asset('storage/'.$portofolio->img) .'">
                ';
            })
            
            ->addColumn('created', function($portofolio) {
                return tanggal($portofolio->created_at);
            })
            ->addColumn('action', function ($portofolio) {
                return '
                    <a href="'. route('portofolio.edit', $portofolio->id) .'" class="btn btn-xs bg-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                    <button onclick="deleteData(`'. route('portofolio.destroy', $portofolio->id) .'`)" class="btn btn-xs btn-danger btn-flat delete"><i class="fa-solid fa-trash-can"></i></button>
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
        return view('portofolio.create', [
            'portofolio' => Portofolio::all()
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
        // return $request->file('image')->store('portofolio');

        $validate = $request->validate([
            'title' => 'required|max:225',
            'image' => 'image|file|required|max:12000',
            // 'description' => 'required|max:2500'
        ]);

        if($request->file('image')) {
            $validate['image'] = $request->file('image')->store('portofolio');
        }

        $title = $request['title'];

        $save = new Portofolio();
        $save->title = $title;
        $save->img = $validate['image'];
        $save->save();

        // Portofolio::create($validate);

        return redirect()->route('portofolio.index')->with(['success' => 'Berhasil Disimpan!']);
        // return redirect('/dashboard/portofolio')->with('success', 'Portofolio baru berhasil ditambah'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portofolio $portofolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portofolio $portofolio)
    {
        return view('portofolio.edit', [
            'portofolio' => $portofolio
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, $id)
    {
        // return $request;

        $rules = $request->validate([
            'title' => 'required|max:225',
            'image' => 'image|file|max:12000',
            // 'description' => 'required|max:2500'
        ]);
        
        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $rules['img'] = $request->file('image')->store('portofolio');
        }

        // $title = $request['title'];
        // // $image = $rules['image'];
        
        // $save = Portofolio::where('id', $id);
        // $save->title = $title;
        // $save->img = $rules['image'];
        // $save->update();
        Portofolio::where('id', $id)->update($rules);

        return redirect()->route('portofolio.index')->with(['success' => 'Berhasil Diperbarui!']);
        // return redirect('/dashboard/portofolio')->with('success', 'Portofolio berhasil diupdate'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portofolio $portofolio)
    {
        if($portofolio->img) {
            Storage::delete($portofolio->img);
        //     Public::delete($portofolio->image);
            // File::delete(public_path('portofolio-images/'. $portofolio->image));
        }

        Portofolio::destroy($portofolio->id);

        return redirect()->route('portofolio.index')->with(['success' => 'Berhasil Dihapus!']);
        // return redirect('/dashboard/portofolio')->with('success', 'Portofolio berhasil dihapus');
    }
}
