<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElectricianInfo extends Model
{
    use HasFactory;

    protected $table = 'electrician_info';

    public $timestamps = false;

    protected $fillable = ['expertise', 'working_start_year', 'primary_info_id' ];

    public function electrician()
     {
         return $this->hasOne(ElectricianInfo::class, 'primary_info_id');
     }

     public function scopeByElectrician($query, $electricianPath)
    {
        return $query->where('electrician', $electricianPath);
    }
    
     

}
