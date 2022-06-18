<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categories;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index($slug) {

        $article = Article::with(['categories'])->where('slug', $slug)->first();

        // return $article->photo;

        return view('post', compact('article'));
    }
}
