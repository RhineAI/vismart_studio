<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailServicePrevillege extends Model
{
    use HasFactory;

    protected $table = 'detail_service_previllege';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function service() 
    {
        return $this->belongsToMany(Service::class);
    } 

    public function advantage() 
    {
        return $this->belongsToMany(Advantage::class);
    } 
}
