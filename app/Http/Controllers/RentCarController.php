<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrimaryInfo;
use DB;
use Image;
use Validator;
use Illuminate\Support\Facades\Hash;

class RentCarController extends Controller
{
    public function index(Request $request) {
        $primaryInfo = PrimaryInfo::profession(4)
            ->with('addresses','rent_car')
            ->active()
            ->orderBy('id', 'desc');
        $car_types = DB::table("specializations")->where('type', 4)->pluck('name', 'id');

        $name = $request->name ?? null;
        $mobile_no = $request->mobile_no ?? null;
        $designation = $request->designation ?? null;

        if(isset($name) || isset($mobile_no) || isset($designation)) {
            $primaryInfo = $primaryInfo->where(function($query) use ($name, $mobile_no){
                if(isset($name)){
                    $query->orWhere('name_en', 'like' ,'%'.$name.'%');
                    $query->orWhere('name_bn', 'like', '%'.$name.'%');
                }
                if(isset($mobile_no)) {
                    $query->orWhere('mobile_no', 'like', '%'.$mobile_no.'%');
                }
            });
            if(isset($designation)) {
                 $primaryInfo = $primaryInfo->whereHas('rent_car',
                    function ($query) use ($designation) {
                        $query->whereIn('car_type', $designation);
                    }
                );
            }
        }
        else
            $designation = [];

        $primaryInfo =  $primaryInfo->simplePaginate(9);
        return view('rent_car.index', compact('primaryInfo', 'car_types', 'name', 'mobile_no', 'designation'));
    }

    public function registrationForm()
    {
        $marital_status = config('constants.marital_status');
        $genders = config('constants.genders');
        $religions = config('constants.religions');
        $blood_groups = config('constants.blood_groups');
        $exams = config('constants.education_names');
        $boards = config('constants.education_boards');
        $divisions = DB::table("divisions")->pluck('division_name_bn', 'division_id');
        $car_types = DB::table("specializations")->where('type', 4)->pluck('name', 'id');
        $courts = config('constants.court');

        return view('rent_car.registration', compact('genders', 'religions', 'marital_status', 'divisions', 'blood_groups', 'exams', 'car_types', 'boards', 'courts'));
    }

    public function registrationFormSubmit(Request $request)
    {
        $inputs = $request->all();
        \Log::info($inputs);
        $inputs['division_id'] = array_values(array_filter($inputs['division_id']));
        $inputs['district_id'] = array_values(array_filter($inputs['district_id']));
        $inputs['thana_id'] = array_values(array_filter($inputs['thana_id']));
        $inputs['union_id'] = array_values(array_filter($inputs['union_id']));
        $inputs['post_id'] = array_values(array_filter($inputs['post_id']));
        $inputs['address'] = array_values(array_filter($inputs['address']));

        $inputs['exam_name'] = array_values(array_filter($inputs['exam_name']));
        $inputs['education_institute'] = array_values(array_filter($inputs['education_institute']));
        $inputs['board'] = array_values(array_filter($inputs['board']));
        $inputs['result'] = array_values(array_filter($inputs['result']));

        $inputs['car_type'] = array_values(array_filter($inputs['car_type']));
        $inputs['car_brand'] = array_values(array_filter($inputs['car_brand']));
        $inputs['seat_number'] = array_values(array_filter($inputs['seat_number']));
        $inputs['car_model'] = array_values(array_filter($inputs['car_model']));
        $inputs['car_reg_number'] = array_values(array_filter($inputs['car_reg_number']));
        //$inputs['car_pic'] = array_values(array_filter($inputs['car_pic']));

        $validator = Validator::make($inputs, [
            'name_en' => 'required | max:255',
            'name_bn' => 'required | max:255',
            'father_name' => 'required | max:255',
            'mother_name' => 'required | max:255',
            'mobile_no' => 'required | digits:11 | unique:primary_info',
            'nid' => 'required | digits_between:10,17 | unique:primary_info',
            'birth_date' => 'required | date',
            'email' => 'required | max:255 | unique:primary_info',
            'gender' => 'required',
            'blood_group' => 'required',
            'post_id.*' => 'required_with:division_id | max: 100',
            'address.*' => 'required_with:post_id | max: 255',
            //'experiences' => 'required | max:255',
            'education_institute.*' => 'required_with:exam_name|max:255',
            //'board.*' => 'required_with:education_institute|max:255',
            'result.*' => 'required_with:education_institute|max:10',
            'degree_name.*' => 'max:100',
            'emergency_contact_no' => 'required | digits:11',// | unique:primary_info',
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'car_type.*' => 'required|max:255',
            'car_brand.*' => 'required_with:car_type|max:255',
            'seat_number.*' => 'required_with:car_type|max:255',
            'car_model.*' => 'required_with:car_type|max:255',
            'car_reg_number.*' => 'required_with:car_type|max:255',
            'car_pic.*' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);//->validate();
        if($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors(), 'message' => '']);
        }

        $photo = $request->file('photo');
        $inputs['photo'] = time().'.'.$photo->getClientOriginalExtension();
        $random_text = rand();
        $random_text = substr($random_text, 0, 6);
        $inputs['otp'] = $random_text;
        $inputs['password'] = Hash::make($random_text);
        $destination = public_path('/uploads/images/rent_car');

        $imgFile = Image::make($photo->getRealPath());
        $imgFile->resize(150, 150, function ($constraint) {
            $constraint->upsize();
        })->save($destination.'/'.$inputs['photo']);

        $destination = 'uploads/images/rent_car/car_pic';

        $primaryInfo = PrimaryInfo::create($inputs);
        $car_data = [];
        for($i=0; $i<count($inputs['car_type']); $i++) {
            if(isset($request->file('car_pic')[$i]) && isset($inputs['car_type'][$i]) && isset($inputs['car_brand'][$i]) && isset($inputs['seat_number'][$i]) && isset($inputs['car_model'][$i]) && isset($inputs['car_reg_number'][$i])) {
                $car_pic = $request->file('car_pic')[$i];
                $car_pic_name = time().'.'.$car_pic->getClientOriginalExtension();

                $imgFile = Image::make($car_pic->getRealPath());
                $imgFile->resize(150, 150, function ($constraint) {
                    $constraint->upsize();
                })->save($destination.'/'.$car_pic_name);

                $car_data[] = [
                    'car_type' => $inputs['car_type'][$i],
                    'car_brand' => $inputs['car_brand'][$i],
                    'seat_number' => $inputs['seat_number'][$i],
                    'car_model' => $inputs['car_model'][$i],
                    'car_reg_number' => $inputs['car_reg_number'][$i],
                    'car_pic' => $car_pic_name,
                ];
            }
        }
        if(isset($car_data))
            $primaryInfo->rent_car()->createMany($car_data);

        $educations = [];
        for($i = 0; $i < count($inputs['exam_name']); $i++) {
            if(isset($inputs['exam_name'][$i]) && isset($inputs['education_institute'][$i]) && isset($inputs['board'][$i]) && isset($inputs['result'][$i])) {
                $educations[] = [
                    'exam_name' => $inputs['exam_name'][$i],
                    'education_institute' => $inputs['education_institute'][$i],
                    'board' => $inputs['board'][$i],
                    'result' => $inputs['result'][$i]
                ];
            }
        }
        //\Log::info($educations);
        if($educations) {
            $primaryInfo->educations()->createMany($educations);
        }

        $address = [];
        for($i = 0; $i < count($inputs['division_id']); $i++) {
            if(isset($inputs['division_id'][$i]) && isset($inputs['district_id'][$i]) && isset($inputs['thana_id'][$i]) && isset($inputs['union_id'][$i]) && isset($inputs['post_id'][$i]) && isset($inputs['address'][$i])) {
                $address[] = [
                    'division_id' => $inputs['division_id'][$i],
                    'district_id' => $inputs['district_id'][$i],
                    'thana_id' => $inputs['thana_id'][$i],
                    'union_id' => $inputs['union_id'][$i],
                    'post_id' => $inputs['post_id'][$i],
                    'address' => $inputs['address'][$i],
                    'type' => $inputs['type'][$i]
                ];
            }
        }
        //\Log::warning($address);
        if($address) {
            $primaryInfo->addresses()->createMany($address);
        }
        //dd('success');
        return response()->json(['status' =>'success', 'message'=>'Registration successful']);
    }

    public function details(int $id)
    {
        $primaryInfo = PrimaryInfo::find($id);
        $expertise = DB::table('specializations')->where('type', 4)->pluck('name', 'id');
        return view('rent_car.details', compact('primaryInfo', 'expertise'));
    }
}
