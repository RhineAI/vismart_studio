<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $table = 'module';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function service() 
    {
        return $this->belongsToMany(Service::class, 'service');
    } 

    public function advantage() 
    {
        return $this->belongsToMany(Advantage::class, 'module_advantage');
    } 

    // public function moduleAdvantage() 
    // {
    //     return $this->belongsToMany(ModuleAdvantage::class, 'module_advantage', 'module_id');
    // } 
}
