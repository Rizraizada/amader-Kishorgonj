<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;
    protected $table = 'divisions';  

    protected $primaryKey = 'division_id';  

    protected $fillable = [
        'division_code',
        'division_name',
        'division_name_bn',
        'entered_by',
        'entry_timestamp',
        'last_updated_by',
        'last_updated_timestamp',
        'division_id_old',
        'status',
    ];
}
