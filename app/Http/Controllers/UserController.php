<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('user.index', compact('user'));

    }

    public function data()
    {
        $user = User::orderBy('id', 'desc')->get();

        return datatables()
            ->of($user)
            ->addIndexColumn()
            ->addColumn('name', function($user) {
                return $user->name;
            })
            ->addColumn('username', function($user) {
               return $user->username;
            })
            ->addColumn('action', function ($user) {
                return '
                    <a href="'. route('user.edit', $user->id) .'" class="btn btn-xs bg-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                    <button onclick="deleteData(`'. route('user.destroy', $user->id) .'`)" class="btn btn-xs btn-danger btn-flat delete"><i class="fa-solid fa-trash-can"></i></button>
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
        return view('user.create', [
            'user' => User::all()
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
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);

        $user->save();

        // return redirect('/dashboard/user')->response()->json('Data berhasil disimpan', 200);
        return redirect()->route('user.index')->with(['success' => 'Berhasil Disimpan!']);
        // return redirect('/dashboard/user')->with('success', 'Pengguna baru berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return User::find($id);

        return view('user.edit', [
            'user' => User::find($id),
            'users' => User::all()
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
        $user = User::find($id);
        // $user->name = $request->name;
        // $user->username = $request->username;
        // $user->password = bcrypt($request->password);

        // $user = auth()->user();
        
        $user->name = $request->name;
        $user->username = $request->username;

        if ($request->has('password') && $request->password != "") {
            if (Hash::check($request->old_password, $user->password)) {
                if ($request->password == $request->password_confirmation) {
                    $user->password = bcrypt($request->password);
                } else {
                    return redirect('/dashboard/user')->with('error', 'Konfirmasi password tidak sesuai!');
                }
            } else {
                return redirect('/dashboard/user')->with('error', 'Password lama tidak sesuai!');
            }
        }

        $user->update();

        return redirect()->route('user.index')->with(['success' => 'Berhasil Diperbarui!']);
        // return redirect('/dashboard/user')->with('success', 'Pengguna berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);

        return redirect()->route('user.index')->with(['success' => 'Berhasil Dihapus!']);
        // return redirect('/dashboard/user')->with('success', 'Pengguna berhasil dihapus');
    }
}