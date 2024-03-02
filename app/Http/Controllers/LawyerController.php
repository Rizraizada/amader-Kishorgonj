<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrimaryInfo;
use App\Models\LawyerInfo;
use DB;
use Image;
use Validator;
use Illuminate\Support\Facades\Hash;

class LawyerController extends Controller
{
    public function index(Request $request) {
        $primaryInfo = PrimaryInfo::profession(3)
            ->with('addresses', 'lawyer')
            ->active()
            ->orderBy('id', 'desc');
        $expertise = DB::table("specializations")->where('type', 3)->pluck('name', 'id');

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
                $primaryInfo = $primaryInfo->whereHas('lawyer',
                    function ($query) use ($designation) {
                        return $query->whereIn('expertise', $designation);
                    });
            }
        }
        else
            $designation = [];
        $primaryInfo =  $primaryInfo->simplePaginate(9);
        return view('lawyer.index', compact('primaryInfo', 'expertise', 'name', 'mobile_no', 'designation'));
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
        $specializations = DB::table("specializations")->where('type', 3)->pluck('name', 'id');
        $designations = DB::table("designations")->where('type', 3)->pluck('name', 'id');
        $courts = config('constants.court');

        return view('lawyer.registration', compact('genders', 'religions', 'marital_status', 'divisions', 'blood_groups', 'exams', 'specializations', 'designations', 'boards', 'courts'));
    }

    public function registrationFormSubmit(Request $request)
    {
        $inputs = $request->all();
        //\Log::info($inputs);
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

        $inputs['training_name'] = array_values(array_filter($inputs['training_name']));
        $inputs['training_note'] = array_values(array_filter($inputs['training_note']));
        $inputs['training_center'] = array_values(array_filter($inputs['training_center']));
        $inputs['tr_start_date'] = array_values(array_filter($inputs['tr_start_date']));
        $inputs['tr_end_date'] = array_values(array_filter($inputs['tr_end_date']));

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
            'post_id.*' => 'required_with:thana_id,district_id,division_id | max: 100',
            'address.*' => 'required | max: 255',
            //'clinic_name' => 'required_with:designation | max:100',
            'bar_council_number' => 'required | max:100',
            'experiences' => 'required | max:255',
            //'exam_name.*' => 'max:100',
            'education_institute.*' => 'required_with:exam_name|max:255',
            //'board.*' => 'required_with:education_institute|max:255',
            'result.*' => 'required_with:education_institute|max:10',
            'degree_name.*' => 'max:100',
            'training_name.*' => 'max:100',
            'training_note.*' => 'required_with:training_name|max:255',
            'training_center.*' => 'required_with:training_note|max:255',
            'tr_start_date.*' => 'required_with:training_center|date',
            'tr_end_date.*' => 'required_with:tr_start_date|date',
            'emergency_contact_no' => 'required | digits:11',// | unique:primary_info',
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
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
        $destination = public_path('/uploads/images/lawyer');

        $imgFile = Image::make($photo->getRealPath());
        $imgFile->resize(150, 150, function ($constraint) {
            $constraint->upsize();
        })->save($destination.'/'.$inputs['photo']);

        $primaryInfo = PrimaryInfo::create($inputs);
        $primaryInfo->lawyer()->create($inputs);

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

        $trainings = [];
        //\Log::info('count training: '.count($inputs['training_name']));
        for($i = 0; $i < count($inputs['training_name']); $i++) {
            if(isset($inputs['training_name'][$i]) && isset($inputs['training_note'][$i]) && isset($inputs['training_center'][$i]) && isset($inputs['tr_start_date'][$i]) && isset($inputs['tr_end_date'][$i])) {
                $trainings[] = [
                    'training_name' => $inputs['training_name'][$i],
                    'training_center' => $inputs['training_center'][$i],
                    'training_note' => $inputs['training_note'][$i],
                    'tr_start_date' => $inputs['tr_start_date'][$i],
                    'tr_end_date' => $inputs['tr_end_date'][$i]
                ];
            }
        }
        //\Log::info($trainings);
        if($trainings) {
            $primaryInfo->trainings()->createMany($trainings);
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
        $expertise = DB::table('specializations')->where('type', 3)->pluck('name', 'id');
        return view('lawyer.details', compact('primaryInfo', 'expertise'));
    }
}
