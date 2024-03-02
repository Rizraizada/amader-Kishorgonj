<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressInfo extends Model
{
    use HasFactory;

    protected $table = 'address_info';

    protected $fillable = ['division_id', 'district_id', 'thana_id', 'union_id', 'post_id', 'address', 'type', 'primary_info_id'];

    public $timestamps = false;

    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id');
    }
    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }
    public function thana()
    {
        return $this->belongsTo(Thana::class, 'thana_id', 'thana_id');
    }
    
    
    public function union()
    {
        return $this->belongsTo(Union::class, 'union_id');
    }

}
