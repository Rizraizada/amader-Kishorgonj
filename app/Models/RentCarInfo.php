<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentCarInfo extends Model
{
    use HasFactory;

    protected $table = 'rent_car_info';

    public $timestamps = false;

    protected $fillable = ['car_type', 'car_name', 'car_brand', 'seat_number', 'car_model','car_pic', 'car_reg_number', 'primary_info_id' ];

}
