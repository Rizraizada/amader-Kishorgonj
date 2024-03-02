<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingInfo extends Model
{
    use HasFactory;
    protected $table = 'training_info';

    public $timestamps = false;

    protected $fillable = ['training_name', 'training_note', 'training_center','tr_start_date', 'tr_end_date','primary_info_id'];
}
