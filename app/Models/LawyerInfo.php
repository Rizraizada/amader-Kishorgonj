<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LawyerInfo extends Model
{
    use HasFactory;

    protected $table = 'lawyer_info';

    public $timestamps = false;

    protected $fillable = ['expertise', 'designation', 'bar_council_number', 'court', 'experiences','primary_info_id' ];

    public function scopeByLawyer($query, $lawyerPath)
    {
        return $query->where('lawyer', $lawyerPath);
    }
}
