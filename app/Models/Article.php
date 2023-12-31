<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Article extends Model
{
    use Sluggable;
    use HasFactory;

    public function categories() {
        return $this->belongsToMany(Categories::class, 'article_categories');
    }

    protected $table = 'article';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function category() {
        return $this->belongsTo(Categories::class);
    }
}
