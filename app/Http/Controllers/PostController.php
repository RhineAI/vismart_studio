<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categories;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;

class PostController extends Controller
{
    public function index($slug) {

        $article = Article::with(['categories'])->where('slug', $slug)->first();

        $artikel = Article::with(['categories'])
                ->select('*')
                ->latest()->take(3)->get();

        SEOTools::setTitle('Vismart Studio | '.$article->title, false);
        SEOTools::setDescription('One Stop Solution for Branding, Digital Marketing, Social Media Management & Marketing Communication');
        SEOTools::opengraph()->setUrl('https://vismartstudio.com/article/'.$article->slug);
        SEOTools::setCanonical('https://vismartstudio.com/article/'.$article->slug);
        SEOTools::opengraph()->addProperty('type', 'posts');
        SEOTools::jsonLd()->addImage(asset('storage/'.$article->photo));

        return view('post', compact('article', 'artikel'));
    }
}
