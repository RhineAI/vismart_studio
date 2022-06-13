<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    public function service() 
    {
        return $this->belongsToMany(Service::class, 'id', 'title', 'image');
    }
}
