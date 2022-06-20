<?php

namespace App\Http\Controllers;
use App\Models\Article;

use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;

class PostsController extends Controller
{
    public function index() {

        SEOTools::setTitle('Vismart Studio | Article', false);
        SEOTools::setDescription('One Stop Solution for Branding, Digital Marketing, Social Media Management & Marketing Communication');
        SEOTools::opengraph()->setUrl('https://vismartstudio.com/posts/');
        SEOTools::setCanonical('https://vismartstudio.com/posts/');
        SEOTools::opengraph()->addProperty('type', 'posts');
        SEOTools::jsonLd()->addImage('');

        $article = Article::latest()->paginate(6)->withQueryString();

        return view('articles', [
           "title" => "Blogs"
        ], compact('article'));
    }
}
