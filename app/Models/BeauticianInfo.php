<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeauticianInfo extends Model
{
    use HasFactory;

    protected $table = 'beautician_info';

    public $timestamps = false;

    protected $fillable = ['expertise', 'working_start_year', 'primary_info_id' ];

}
