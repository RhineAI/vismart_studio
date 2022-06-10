<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleAdvantage extends Model
{
    use HasFactory;

    protected $table = 'module_advantage';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function module() 
    {
        return $this->belongsToMany(Module::class, 'module');
    } 
}
