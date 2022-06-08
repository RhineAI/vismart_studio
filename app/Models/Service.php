<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'service';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function package() 
    {
        return $this->belongsToMany(Package::class, 'package');
    } 

    public function module() 
    {
        return $this->belongsToMany(Module::class, 'module');
    } 
}
