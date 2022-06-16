<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categories;
use App\Models\Service;
use App\Models\User;
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
        $category = Categories::all();
        // return $category;
        // $service = Service::orderBy('id', 'desc');
        // $category = Category::orderBy('id', 'DESC');
        return view('article.index', compact('article', 'category'));

        
    }

    public function data() {
        $article = Article::leftJoin('categories', 'categories.id', 'article.category_id')
                            ->select('article.*', 'categories')
                            ->orderBy('id', 'desc')->get();

        return datatables()
        ->of($article)
        ->addIndexColumn()
        ->addColumn('image', function($article) {
            return '
            <img width="90%" class="rounded" src="'. asset('storage/'. $article->photo) .'">
            ';
        })
        // ->addColumn('author', function($article) {
        //     return $article->author;
        // })
        ->addColumn('title', function($article) {
            return $article->title;
        })
        // ->addColumn('slug', function($article) {
        //     return $article->slug;
        // })
        ->addColumn('author', function($article) {
            return $article->author;
        })
        ->addColumn('body', function($article) {
            return Str::limit(strip_tags($article->body), 100);
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
        // $category = Categories::orderBy('id', 'desc');
        // return $category;

        return view('article.create', [
            'article' => Article::all(),
            'category' => Categories::orderBy('id', 'desc')->get()
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
            'author' => 'required',
            'body' => 'required'
        ]);

        if ($request->file('image')) {
            $validate['image'] = $request->file('image')->store('post-images');
        }

        $title = $request['title'];
        $slug = $request['slug'];
        $image = $validate['image'];
        $author = $request['author'];
        $body = $request['body'];

        // Article::create($validate);
        $save = new Article();
        $save->title = $title;
        $save->slug = $slug;
        $save->author = $author;
        $save->category_id = $request->category;
        $save->photo = $image;
        $save->body = $body;
        $save->save();

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
            'article' => $article->id,
            'service' => Service::orderBy('id', 'desc')
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
            'article' => $article,
            // 'article' => Article::all(),
            'category' => Categories::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'slug' => 'required|unique:article',
            'photo' => 'image|file|max:10240',
        ];
        
        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $rules['photo'] = $request->file('image')->store('portofolio');
        }

        // $request['photo'] = $request->photo;

        // $slug = $rules['slug'];
        // $image = $rules['image'];

        // $update = Article::find($article->id);
        // $update->title = $request->title;
        // $update->slug = $slug;
        // $update->author = $request->author;
        // $update->category_id = $request->category;
        // $update->photo = $image;
        // $update->body = $request->body;
        // $update->update();      
        
        Article::where('id', $id)->update($rules);
        

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
