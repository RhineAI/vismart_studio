<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::all();
        return view('categories.index', compact('categories'));
    }

    public function data()
    {
        $categories = Categories::orderBy('id', 'desc')->get();

        return datatables()
            ->of($categories)
            ->addIndexColumn()
            ->addColumn('categories', function($categories) {
                return $categories->categories;
            })
            ->addColumn('created', function($categories) {
                return tanggal($categories->created_at);
            })
            ->addColumn('action', function ($categories) {
                return '
                    <button onclick="editForm(`'. route('categories.update', $categories->id) .'`)" class="edit btn btn-xs btn-success btn-flat"><i class="fa-solid fa-pen-to-square"></i></button>
                    <button onclick="deleteData(`'. route('categories.destroy', $categories->id) .'`)" class="btn btn-xs btn-danger btn-flat delete"><i class="fa-solid fa-trash-can"></i></button>
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
        return view('categories.create', [
            'categories' => Categories::all()
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
        $categories = new Categories();
        $categories->categories = $request->nama_kategori;
        $categories->save();

        return redirect()->route('categories.index')->with(['success' => 'Berhasil Disimpan!']);
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $satuan = Categories::find($id);
        
        return response()->json($satuan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Categories $categories)
    {
        return view('categories/edit', [
            'det' => $categories->id,
            'categories' => Categories::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categories = Categories::find($id);
        $categories->categories = $request->nama_kategori;
        $categories->update();

        return redirect()->route('categories.index')->with(['success' => 'Berhasil Diperbarui!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Categories::destroy($id);
        return redirect()->route('categories.index')->with(['success' => 'Berhasil Dihapus!']);
     
    }
}
