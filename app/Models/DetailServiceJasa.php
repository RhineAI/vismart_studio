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
}
