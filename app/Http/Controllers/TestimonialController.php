<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use DataTables;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonial = Testimonial::all();
        return view('testimonial.index', compact('testimonial'));
    }


    public function data()
    {
        $testimonial = Testimonial::orderBy('id', 'desc')->get();

        return datatables()
            ->of($testimonial)
            ->addIndexColumn()
            ->addColumn('name', function($testimonial) {
                return $testimonial->name;
            })
            ->addColumn('description', function($testimonial) {
                return $testimonial->description;
            })
            ->addColumn('created', function($testimonial) {
                return tanggal($testimonial->created_at);
            })
            ->addColumn('action', function ($testimonial) {
                return '
                    <a href="'. route('testimonial.edit', $testimonial->id) .'" class="btn btn-xs bg-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                    <button onclick="deleteData(`'. route('testimonial.destroy', $testimonial->id) .'`)" class="btn btn-xs btn-danger btn-flat delete"><i class="fa-solid fa-trash-can"></i></button>
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
        return view('testimonial.create', [
            'testimonial' => Testimonial::all()
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
        $testimonial = new Testimonial;
        $testimonial->name = $request->name;
        $testimonial->description = $request->description;
        $testimonial->save();

        return redirect('/dashboard/testimonial')->with('success', 'Berhasil ditambahkan');
        
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
    public function edit(Testimonial $testimonial)
    {
        return view('testimonial.edit', [
            'testi' => $testimonial,
            'testimonial' => Testimonial::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $testi = Testimonial::find($testimonial->id);
        $testi->name = $request->name;
        $testi->description = $request->description;
        $testi->update();

        return redirect('/dashboard/testimonial')->with('success', 'Berhasil diupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        Testimonial::destroy($testimonial->id);
        return redirect('/dashboard/testimonial')->with('success', 'Berhasil di delete');
    }
}
