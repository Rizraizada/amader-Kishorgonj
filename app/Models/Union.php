<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Union  extends Model
{
    use HasFactory;
    protected $table = 'unions';  

    protected $primaryKey = 'union_id';  

    protected $fillable = [
        'union_code',
        'union_name',
        'union_nameb',
        'entered_by',
        'entry_timestamp',
        'last_updated_by',
        'last_updated_timestamp',
        // 'district_id_old',
        'status',
    ];
}
