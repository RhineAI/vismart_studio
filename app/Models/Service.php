<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Service extends Model
{
    use Sluggable;
    use HasFactory;
    

    protected $table = 'service';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function detail_service()
    {
        return $this->hasMany(DetailService::class);
    }

    public function package() 
    {
        return $this->belongsToMany(Package::class, 'service_package');
    } 

    public function module() 
    {
        return $this->belongsToMany(Module::class, 'service_module');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

}
