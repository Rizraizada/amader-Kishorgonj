<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationInfo extends Model
{
    use HasFactory;

    protected $table = 'education_info';

    protected $fillable = ['exam_name', 'education_institute', 'board', 'result', 'primary_info_id'];

    public $timestamps = false;
}
