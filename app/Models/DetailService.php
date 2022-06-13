<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailService extends Model
{
    use HasFactory;

    protected $table = 'detail_service';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function service() {
        return $this->belongsTo(Service::class, 'service');
        // return $this->hasOne(Service::class, 'id', 'id');
    }

    public function jasa() {
        return $this->belongsToMany(Jasa::class, 'detail_service_jasa');
    }

    public function package() {
        return $this->belongsToMany(Package::class, 'detail_service_package');
    }

    public function advantage() {
        return $this->belongsToMany(Advantage::class, 'detail_service_previllege');
    }
}
