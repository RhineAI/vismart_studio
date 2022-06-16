<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = Client::all();
        return view('client.index', compact('client'));

    }

    public function data()
    {
        $client = Client::orderBy('id', 'desc')->get();

        return datatables()
        ->of($client)
        ->addIndexColumn()
        ->addColumn('logo', function($client) {
            return '
            <img width="90%" class="rounded" src="'. asset('storage/'. $client->logo) .'">
            ';
        })
        ->addColumn('name', function($client) {
            return $client->name;
        })
        ->addColumn('created', function($client) {
            return tanggal($client->created_at);
        })
        ->addColumn('action', function ($client) {
            return '
                <a href="'. route('client.edit', $client->id) .'" class="btn btn-xs bg-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                <button onclick="deleteData(`'. route('client.destroy', $client->id) .'`)" class="btn btn-xs btn-danger btn-flat delete"><i class="fa-solid fa-trash-can"></i></button>
            ';
        })
        ->rawColumns(['action', 'logo'])
        ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create', [
            'client' => Client::all()
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
            'name' => 'required|max:225',
            'logo' => 'image|file|required|max:10240'
        ]);

        if($request->file('logo')) {
            $validate['logo'] = $request->file('logo')->store('client');
        }

        Client::create($validate);

        return redirect()->route('client.index')->with(['success' => 'Berhasil Disimpan!']);
        // return redirect('/dashboard/client')->with('success', 'Klien baru berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('client.edit', [
            'client' => $client
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $rules = $request->validate([
            'name' => 'max:225',
            'logo' => 'image|file|max:10240'
        ]);
        
        if($request->file('logo')) {
            if($request->oldLogo) {
                Storage::delete($request->oldLogo);
            }
            $rules['logo'] = $request->file('logo')->store('client');
        }
        
        
        Client::where('id', $client->id)->update($rules);

        return redirect()->route('client.index')->with(['success' => 'Berhasil Diperbarui!']);
        // return redirect('/dashboard/client')->with('success', 'Klien berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        if($client->logo) {
            Storage::delete($client->logo);
        }

        Client::destroy($client->id);

        return redirect()->route('client.index')->with(['success' => 'Berhasil Dihapus!']);
        // return redirect('/dashboard/client')->with('success', 'Klien berhasil dihapus');
    }
}
