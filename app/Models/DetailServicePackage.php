<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailServicePackage extends Model
{
    use HasFactory;

    protected $table = 'detail_service_package';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
