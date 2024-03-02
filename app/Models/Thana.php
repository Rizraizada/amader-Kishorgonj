<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thana  extends Model
{
    use HasFactory;
    protected $table = 'thanas';  

    protected $primaryKey = 'thana_id';  

    protected $fillable = [
        'thana_code',
        'thana_name',
        'thana_nameb',
        'entered_by',
        'entry_timestamp',
        'last_updated_by',
        'last_updated_timestamp',
        // 'district_id_old',
        'status',
    ];
}
