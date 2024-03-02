<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class PrimaryInfo extends Authenticatable
{
    use HasFactory;

    protected $table = 'primary_info';

    protected $fillable = ['name_en', 'name_bn', 'father_name', 'mother_name', 'mobile_no', 'nid', 'birth_date', 'religion', 'email', 'marital_status', 'gender', 'blood_group', 'nid_pic', 'emergency_contact_no', 'photo', 'profession_type', 'status', 'password', 'otp'];

    public $timestamps = false;

    public function educations() {
        return $this->hasMany(EducationInfo::class);
    }

    public function trainings() {
        return $this->hasMany(TrainingInfo::class);
    }

    public function addresses($type = null) {
        \Log::info($type);
        if(isset($type))
            return $this->hasMany(AddressInfo::class)->where('type', $type);
        else
            return $this->hasMany(AddressInfo::class);
    }

    public function diplomas() {
        return $this->hasMany(DiplomaInfo::class);
    }

    public function doctor() {
        return $this->hasOne(DoctorInfo::class);
    }

    public function barbar() {
        return $this->hasOne(BarbarInfo::class);
    }

    public function beautician() {
        return $this->hasOne(BeauticianInfo::class);
    }

    public function electrician() {
        return $this->hasOne(ElectricianInfo::class);
    }

    public function lawyer() {
        return $this->hasOne(LawyerInfo::class);
    }

    public function rent_car() {
        return $this->hasMany(RentCarInfo::class);
    }

    public function scopeProfession($query, $type = null) {
        $query->where('profession_type', $type);
    }

    public function scopeActive($query, $status = 0){
        $query->where('status', $status);
    }
    public function addressInfo()
    {
        return $this->hasMany(AddressInfo::class, 'primary_info_id', 'id');
    }

}
