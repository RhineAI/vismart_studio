<?php

namespace App\Http\Controllers;
use App\Models\Article;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index() {
        $article = Article::latest()->paginate(6)->withQueryString();

        return view('articles', [
           "title" => "Blogs"
        ], compact('article'));
    }
}
