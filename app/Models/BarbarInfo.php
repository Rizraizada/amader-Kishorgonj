<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarbarInfo extends Model
{
    use HasFactory;

    protected $table = 'barbar_info';

    public $timestamps = false;

    protected $fillable = ['expertise', 'working_start_year', 'primary_info_id' ];

}
