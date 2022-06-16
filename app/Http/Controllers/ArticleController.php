<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::all();
        return view('article.index', compact('article'));

        
    }

    public function data() {
        $article = Article::orderBy('id', 'desc')->get();

        return datatables()
        ->of($article)
        ->addIndexColumn()
        ->addColumn('image', function($article) {
            return '
            <img width="90%" class="rounded" src="'. asset('storage/'. $article->image) .'">
            ';
        })
        ->addColumn('author', function($article) {
            return $article->author;
        })
        ->addColumn('title', function($article) {
            return $article->title;
        })
        ->addColumn('slug', function($article) {
            return $article->slug;
        })
        ->addColumn('body', function($article) {
            return $article->body;
        })
        ->addColumn('created', function($article) {
            return tanggal($article->created_at);
        })
        ->addColumn('action', function ($article) {
            return '
                <a href="'. route('article.edit', $article->id) .'" class="btn btn-xs bg-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                <button onclick="deleteData(`'. route('article.destroy', $article->id) .'`)" class="btn btn-xs btn-danger btn-flat delete"><i class="fa-solid fa-trash-can"></i></button>
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
        return view('article.create', [
            'article' => Article::all()
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
            'author' => 'required|max:255',
            'title' => 'required|max:225',
            'image' => 'image|file|required|max:10240',
            'body' => 'required'
        ]);

        if ($request->file('image')) {
            $validate['image'] = $request->file('image')->store('post-images');
        }

        $validate['slug'] = Str::slug($request->title);

        Article::create($validate);

        return redirect()->route('article.index')->with(['success' => 'Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('article.show', [
            'article' => $article
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('article.edit', [
            'article' => $article
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $rules = [
            'author' => 'max:255',
            'title' => 'max:225',
            'image' => 'image|file|max:10240',
            'body' => 'max:3000'
        ];
        
        $validate = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validate['image'] = $request->file('image')->store('article');
        }

        $validate['slug'] = Str::slug($request->title);

        $article = article::find($article->id);
        $article->update($validate);       

        return redirect()->route('article.index')->with(['success' => 'Berhasil Diperbarui!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if($article->image) {
            Storage::delete($article->image);
        }

        Article::destroy($article->id);

        return redirect()->route('article.index')->with(['success' => 'Berhasil Dihapus!']);
    }

    public function articleSlug(Request $request)
    {
        $slug = SlugService::createSlug(Article::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }}
