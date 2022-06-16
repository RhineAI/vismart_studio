<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingDashboard extends Model
{
    use HasFactory;

    protected $table = 'setting_dashboard';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
