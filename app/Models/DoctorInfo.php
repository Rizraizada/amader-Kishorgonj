<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorInfo extends Model
{
    use HasFactory;

    protected $table = 'doctor_info';
    
    public $timestamps = false;

    protected $fillable = ['expertise', 'designation', 'clinic_name', 'bmdc_number', 'experiences', 'bmdc_pic', 'primary_info_id' ];
    

    public function scopeByDoctor($query, $doctorPath)
    {
        return $query->where('doctor', $doctorPath);
    }
    
}
