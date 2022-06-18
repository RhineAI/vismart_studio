<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Categories;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapController extends Controller
{
    public function index()
    {
        $article = Article::with(['categories'])
                ->select('*')
                ->latest()->get();

        $sitemap = Sitemap::create()
                    ->add(Url::create('/'));

        foreach ($article as $key => $value) {
            $sitemap->add(Url::create('article/'.$value->slug));
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));
    }
}
