<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiplomaInfo extends Model
{
    use HasFactory;
    protected $table = 'diploma_info';

    public $timestamps = false;

    protected $fillable = ['degree_name', 'diploma_institute', 'dip_start_date', 'dip_end_date','primary_info_id'];
}
