<?php

namespace App\Http\Controllers;

use App\Models\Advantage;
use App\Models\SettingDashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdvantageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advantage = Advantage::all();
        // $setting = SettingDashboard::first();

        return view('advantage.index', compact('advantage'));
    }

    public function data()
    {
        $advantage = Advantage::orderBy('id', 'desc')->get();

        return datatables()
            ->of($advantage)
            ->addIndexColumn()
            ->addColumn('image', function($advantage) {
                return '
                    <img width="90%" class="rounded" src="'. asset('storage/'.$advantage->image) .'">
                ';
            })
            ->addColumn('advantage', function($advantage) {
                return $advantage->advantage;
            })
            ->addColumn('description', function($advantage) {
                return $advantage->description;
            })
            ->addColumn('created', function($advantage) {
                return tanggal($advantage->created_at);
            })
            ->addColumn('action', function ($advantage) {
                return '
                    <a href="'. route('advantage.edit', $advantage->id) .'" class="btn btn-xs bg-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                    <button onclick="deleteData(`'. route('advantage.destroy', $advantage->id) .'`)" class="btn btn-xs btn-danger btn-flat delete"><i class="fa-solid fa-trash-can"></i></button>
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
        return view('advantage.create', [
            'advantage' => Advantage::all(),
            // 'setting' =>  SettingDashboard::first()
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
        // return $request->file('image')->store('advantage');

        $validate = $request->validate([
            'image' => 'image|file|max:12000',
            'advantage' => 'required|min:3|max:100',
            'description' => 'required|max:2500'
        ]);

        if($request->file('image')) {
            $validate['image'] = $request->file('image')->store('advantage');
        }

        $image = $validate['image'];
        $advantage = $request['advantage'];
        $description = $request['description'];

        $save = New Advantage();
        $save->image = $image;
        $save->advantage = $advantage;
        $save->description = $description;
        $save->save();

        return redirect()->route('advantage.index')->with(['success' => 'Berhasil Disimpan!']);
        // return redirect('/dashboard/advantage')->with('success', 'Keunggulan baru berhasil ditambah'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advantage  $advantage
     * @return \Illuminate\Http\Response
     */
    public function show(Advantage $advantage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advantage  $advantage
     * @return \Illuminate\Http\Response
     */
    public function edit(Advantage $advantage)
    {
        return view('advantage.edit', [
            'previllege' => $advantage,
            'advantage' => Advantage::all(),
            // 'setting' =>  SettingDashboard::first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Advantage  $advantage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advantage $advantage)
    {
        $rules = $request->validate([
            'image' => 'image|file|max:12000',
            'advantage' => 'min:3|max:100',
            'description' => 'max:2500'
        ]);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $rules['image'] = $request->file('image')->store('advantage');
        }
        
        
        Advantage::where('id', $advantage->id)->update($rules);
        return redirect()->route('advantage.index')->with(['success' => 'Berhasil Diperbarui!']);
        // return redirect('/dashboard/advantage')->with('success', 'Keunggulan berhasil diupdate'); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advantage  $advantage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advantage $advantage)
    {
        if($advantage->image) {
            Storage::delete($advantage->image);
        //     Public::delete($advantage->image);
            // File::delete(public_path('advantage-images/'. $advantage->image));
        }

        Advantage::destroy($advantage->id);
        return redirect()->route('advantage.index')->with(['success' => 'Berhasil Dihapus!']);
        // return redirect('/dashboard/advantage')->with('success', 'Keunggulan berhasil dihapus');

    }
}
