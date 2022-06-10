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
}
