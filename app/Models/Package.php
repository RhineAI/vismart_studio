<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $table = 'package';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function feature() 
    {
        return $this->belongsToMany(Feature::class, 'package_feature');
    }  
    
    public function service() 
    {
        return $this->belongsToMany(Service::class, 'service');
    } 
}
