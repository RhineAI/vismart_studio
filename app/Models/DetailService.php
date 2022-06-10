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
        return $this->belongsToMany(Service::class);
    }

    public function detail_jasa() {
        return $this->belongsToMany(Jasa::class, 'detail_service_jasa');
    }

    public function detail_package() {
        return $this->belongsToMany(Package::class, 'detail_service_package');
    }

    public function detail_previllege() {
        return $this->belongsToMany(Advantage::class, 'detail_service_previllege');
    }
}
