<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailServiceJasa extends Model
{
    use HasFactory;

    protected $table = 'detail_service_jasa';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function service() 
    {
        return $this->belongsToMany(Service::class);
    } 

    public function jasa() 
    {
        return $this->belongsToMany(Jasa::class, 'detail_service_jasa');
    }
}
