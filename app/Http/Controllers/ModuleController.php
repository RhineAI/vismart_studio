<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $module = Module::all();
        return view('module.index', compact('module'));
    }

    public function data()
    {
        $module = Module::orderBy('id', 'desc')->get();

        return datatables()
            ->of($module)
            ->addIndexColumn()
            ->addColumn('name', function($module) {
                return $module->name;
            })
            ->addColumn('created', function($module) {
                return tanggal($module->created_at);
            })
            ->addColumn('action', function ($module) {
                return '
                    <a href="'. route('module.edit', $module->id) .'" class="btn btn-xs bg-info"><i class="fa-solid fa-pen-to-square"></i></a>
                    <button onclick="deleteData(`'. route('module.destroy', $module->id) .'`)" class="btn btn-xs btn-danger btn-flat delete"><i class="fa-solid fa-trash-can"></i></button>
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
        return view('module.create', [
            'module' => Module::all()
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
        $module = new Module;
        $module->name = $request->name;
        $module->save();
 

        return redirect('/dashboard/module')->with('success', 'Berhasil ditambahkan'); 
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
    public function edit(Module $module)
    {
        return view('module.edit', [
            'testi' => $module,
            'module' => Module::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module)
    {
        $module = Module::find($module->id);
        $module->name = $request->name;
        $module->update();
        return redirect('/dashboard/module')->with('success', 'Berhasil diupdate'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        Module::destroy($module->id);
        return redirect('/dashboard/module')->with('success', 'Berhasil di Delete');
    }
}
