<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrimaryInfo;
use App\Models\ElectricianInfo;
use App\Models\Division;
use App\Models\AddressInfo;
use App\Models\BeauticianInfo;
use App\Models\District;
use App\Models\Thana;
use App\Models\Union;
use App\Models\EducationInfo;
use App\Models\TrainingInfo;
use App\Models\DoctorInfo;
use App\Models\LawyerInfo;


use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use Illuminate\Validation\Rule;


class ServiceController extends Controller
{


    public function index(Request $request, string $name = null) {
        if ($this->hasService($name)) {
            $type = $this->getServiceKey($name);
            $expertise = DB::table("specializations")->where('type', $type)->pluck('name', 'id');
            $expertiseelectrician = DB::table("specializations")->where('type', 6)->pluck('name', 'id');
            $expertisebeautician = DB::table("specializations")->where('type', 5)->pluck('name', 'id');
            $expertisebarbar = DB::table("specializations")->where('type', 2)->pluck('name', 'id');


   


            $searchName = $request->input('name');
            $specializations = $request->input('specializations');
    
            $primaryInfoQuery = PrimaryInfo::where('profession_type', $type);
    
            if ($searchName) {
                $primaryInfoQuery->where(function ($query) use ($searchName) {
                    $query->where('name_en', 'like', '%' . $searchName . '%')
                        ->orWhere('name_bn', 'like', '%' . $searchName . '%')
                        ->orWhere('email', 'like', '%' . $searchName . '%')
                        ->orWhere('mobile_no', 'like', '%' . $searchName . '%');
                });
            }
    
            if ($specializations) {
                $primaryInfoQuery->where(function ($query) use ($specializations) {
                    $query->whereHas('doctor', function ($query) use ($specializations) {
                        $query->where('expertise', $specializations);
                    })
                    ->orWhereHas('electrician', function ($query) use ($specializations) {
                        $specializationsArray = explode(',', $specializations);
                    
                        $query->where(function ($subquery) use ($specializationsArray) {
                            foreach ($specializationsArray as $specialization) {
                                $subquery->orWhere('expertise', 'LIKE', "%$specialization%");
                            }
                        });
                    })
                                        
                    ->orWhereHas('barbar', function ($query) use ($specializations) {
                        $specializationsArray = explode(',', $specializations);
                    
                        $query->where(function ($subquery) use ($specializationsArray) {
                            foreach ($specializationsArray as $specialization) {
                                $subquery->orWhere('expertise', 'LIKE', "%$specialization%");
                            }
                        });
                    })
                    
                    ->orWhereHas('lawyer', function ($query) use ($specializations) {
                        $query->where('expertise', $specializations);
                    })
                    ->orWhereHas('beautician', function ($query) use ($specializations) {
                        $specializationsArray = explode(',', $specializations);
                    
                        $query->where(function ($subquery) use ($specializationsArray) {
                            foreach ($specializationsArray as $specialization) {
                                $subquery->orWhere('expertise', 'LIKE', "%$specialization%");
                            }
                        });
                    })
                    ->orWhereHas('rent_car', function ($query) use ($specializations) {
                        $specializationsArray = explode(',', $specializations);
                    
                        $query->where(function ($subquery) use ($specializationsArray) {
                            foreach ($specializationsArray as $specialization) {
                                $subquery->orWhere('car_type', 'LIKE', "%$specialization%");
                            }
                        });
                    });
                    
                });
            }

     
                
            $primaryInfo = $primaryInfoQuery->simplePaginate(8);
    
            $photoPath = '';
            if ($type == 6) {
                $photoPath = 'uploads/images/electrician';
            } elseif ($type == 1) {
                $photoPath = 'uploads/images/doctor';
            } elseif ($type == 3) {
                $photoPath = 'uploads/images/lawyer';
            } elseif ($type == 2) {
                $photoPath = 'uploads/images/barbar';
            } elseif ($type == 4) {
                $photoPath = 'uploads/images/rent_car';
            } elseif ($type == 5) {
                $photoPath = 'uploads/images/beautician';
            } // ... your photoPath logic
    
            $service_bn = config('constants.services_bn')[$type];
            $service_en = $name;
            $service_ef = config('constants.services_ef')[$type];
            $service_ez = config('constants.services_ez')[$type];
    
            return view('admin.service.index', compact('primaryInfo', 'expertise', 'service_bn', 'service_en', 'type', 'service_ef', 'photoPath', 'service_ez', 'name','expertiseelectrician','expertisebeautician','expertisebarbar'));
        }
    
        return view('admin.home');
    }
    
    
    
    
    
    public function hasService($name) {
        return isset($name) && in_array($name, config('constants.services_en'));
    }

    public function getServiceKey($name) {
        return array_keys(config('constants.services_en'), $name)[0];
    }



    public function edit($name, $id)
    {
        $electricians = ElectricianInfo::all();
        $primaryInfo = PrimaryInfo::with('addressInfo')->find($id); 
        $divisions = Division::all(); 
        $districts = District::all();   
        $thanas = Thana::all();   
        $unions = Union::all(); 
        $educationInfos = EducationInfo::all();  
        $trainningInfos = TrainingInfo::all(); 

        $primaryInfo->photo;    
        $presentAddressInfo = $primaryInfo->addressInfo->where('type', 0)->first();
        $permanentAddressInfo = $primaryInfo->addressInfo->where('type', 1)->first();
        $workingAddressInfo = $primaryInfo->addressInfo->where('type', 2)->first();
    
        $selectedPrimaryInfoId = $id; 


        $electricians = ElectricianInfo::where('primary_info_id', $selectedPrimaryInfoId)->get(['expertise','working_start_year']);


        $educationInfos = EducationInfo::where('primary_info_id', $selectedPrimaryInfoId)->get(['exam_name', 'education_institute', 'board', 'result']);
        $selectedEducationNames = $educationInfos->pluck('exam_name')->toArray();
        $selectedEducationInstitute = $educationInfos->pluck('education_institute')->toArray();
        $selectedEducationBoard = $educationInfos->pluck('board')->toArray();
        $selectedEducationResult = $educationInfos->pluck('result')->toArray();


        $trainingInfos = TrainingInfo::where('primary_info_id', $selectedPrimaryInfoId)->get(['training_name', 'training_center', 'training_note', 'tr_start_date','tr_end_date']);
        $selectedTrainingNames = $trainingInfos->pluck('training_name')->toArray();
        $selectedTrainingCenter = $trainingInfos->pluck('training_center')->toArray();
        $selectedTrainingNote = $trainingInfos->pluck('training_note')->toArray();
        $selectedTrStartDate = $trainingInfos->pluck('tr_start_date')->toArray();
        $selectedTrEndDate = $trainingInfos->pluck('tr_end_date')->toArray();

        $religions = Config::get('constants.religions');
        $genders = Config::get('constants.genders');
        $blood_groups = Config::get('constants.blood_groups');
        $education_names = Config::get('constants.education_names');
        $marital_status = Config::get('constants.marital_status');
        $education_boards = Config::get('constants.education_boards');
        $expertise = DB::table("specializations")->where('type', 6)->pluck('name', 'id');


    
        return view('electrician.electrician_edit', compact(
            'electricians',
            'primaryInfo',
            'religions',
            'name',
            'marital_status',
            'genders',
            'blood_groups',
            'divisions',
            'districts',
            'thanas',
            'unions',
            'presentAddressInfo',
            'permanentAddressInfo',
            'workingAddressInfo',
            'education_names',
            'educationInfos',
            'selectedEducationNames',
            'education_boards',
            'selectedEducationBoard',
            'selectedEducationInstitute',
            'selectedEducationResult',
            'trainingInfos',
            'selectedTrainingNames',
            'selectedTrainingCenter',
            'selectedTrainingNote',
            'selectedTrStartDate',
            'selectedTrEndDate',
            'expertise'
            
        ));
    }

    
    
    public function update(Request $request, $name, $id)
    {
        $primaryInfo = PrimaryInfo::find($id);
   

        if (!$primaryInfo) {
            return redirect()->back()->with('error', 'Data not found');
        }
        
        // $validator = Validator::make($request->all(), [
        //     'name_en' => 'required|max:255',
        //     'name_bn' => 'required|max:255',
        //     'father_name' => 'required|max:255',
        //     'mother_name' => 'required|max:255',
        //     'mobile_no' => [
        //         'required',
        //         'digits:11',
        //         // Rule::unique('primary_info')->ignore($primaryInfo->id, 'id')
        //     ],
        //     'nid' => [
        //         'required',
        //         'digits_between:10,17',
        //         // Rule::unique('primary_info')->ignore($primaryInfo->id, 'id')
        //     ],
        //     'birth_date' => 'required|date',
        //     'email' => [
        //         'required',
        //         'max:255',
        //         // Rule::unique('primary_info')->ignore($primaryInfo->id, 'id')
        //     ],
        //     'gender' => 'required',
        //     'blood_group' => 'required',
        //     'post_id.*' => 'required_with:thana_id,district_id,division_id|max:100',
        //     'address.*' => 'required|max:255',
        //     // 'expertise.*' => 'required',
        //     // 'working_start_year' => 'required',
        //     'exam_name.*' => 'max:100',
        //     'education_institute.*' => 'required_with:exam_name|max:255',
        //     //'board.*' => 'required_with:education_institute|max:255',
        //     'result.*' => 'required_with:education_institute|max:10',
        //     //'degree_name.*' => 'max:100',
        //     'training_name.*' => 'max:100',
        //     'training_note.*' => 'required_with:training_name|max:255',
        //     'training_center.*' => 'required_with:training_note|max:255',
        //     'tr_start_date.*' => 'required_with:training_center|date',
        //     'tr_end_date.*' => 'required_with:tr_start_date|date',
        //     'emergency_contact_no' => 'required | digits:11',// | unique:primary_info',        
        // ]);
    
        // if ($validator->fails()) {
        //     return redirect()
        //         ->back()
        //         ->withErrors($validator) // Pass validation errors to the view
        //         ->withInput();
        // }

        // dd($request);
        $photo = $request->file('photo');
         if ($photo) {
             $photoName = uniqid() . '.' . $photo->getClientOriginalExtension();
             $photo->move(public_path('storage/uploads/images/'), $photoName);
         } else {
             $photoName = $primaryInfo->photo;
         }
        
        $primaryInfo->update([
            'name_en' => $request->input('name_en'),
            'name_bn' => $request->input('name_bn'),
            'father_name' => $request->input('father_name'),
            'mother_name' => $request->input('mother_name'),
            'mobile_no' => $request->input('mobile_no'),
            'nid' => $request->input('nid'),
            'birth_date' => $request->input('birth_date'),
            'email' => $request->input('email'),
            'gender' => $request->input('gender'),
            'blood_group' => $request->input('blood_group'),
            'emergency_contact_no' => $request->input('emergency_contact_no'),
            'photo' => $photoName,  
        ]);
        
        
        
        $primaryInfo = PrimaryInfo::with('electrician')->find($id);

        $newExpertise = $request->input('expertise', []);
        $newWorkingStartYear = $request->input('working_start_year');
        
        $expertiseString = implode(',', $newExpertise);
        
        ElectricianInfo::where('primary_info_id', $primaryInfo->id)->update(['expertise' => $expertiseString]);
        
        ElectricianInfo::where('primary_info_id', $primaryInfo->id)->update(['working_start_year' => $newWorkingStartYear]);
        
    
        $primaryInfo = PrimaryInfo::with('addressInfo')->find($id);

        if (!$primaryInfo) {
            return redirect()->back()->with('error', 'Data not found');
        }
        
        $presentAddressInfo = $primaryInfo->addressInfo->where('type', 0)->first();
        $permanentAddressInfo = $primaryInfo->addressInfo->where('type', 1)->first();
        $workingAddressInfo = $primaryInfo->addressInfo->where('type', 2)->first();
        
        if ($presentAddressInfo) {
            $presentAddressInfo->division_id = $request->input('division_id')[0]; 
            $presentAddressInfo->district_id = $request->input('district_id')[0]; 
            $presentAddressInfo->thana_id = $request->input('thana_id')[0]; 
            $presentAddressInfo->union_id = $request->input('union_id')[0];
            $presentAddressInfo->post_id = $request->input('post_id')[0]; 
            $presentAddressInfo->address = $request->input('address')[0]; 
        
            $presentAddressInfo->save();
        }
        
        if ($permanentAddressInfo) {
            $permanentAddressInfo->division_id = $request->input('division_id')[1]; 
            $permanentAddressInfo->district_id = $request->input('district_id')[1]; 
            $permanentAddressInfo->thana_id = $request->input('thana_id')[1];
            $permanentAddressInfo->union_id = $request->input('union_id')[1]; 
            $permanentAddressInfo->post_id = $request->input('post_id')[1]; 
            $permanentAddressInfo->address = $request->input('address')[1]; 
        
            $permanentAddressInfo->save();
        }
        
        if ($workingAddressInfo) {
            $workingAddressInfo->division_id = $request->input('division_id')[2]; 
            $workingAddressInfo->district_id = $request->input('district_id')[2]; 
            $workingAddressInfo->thana_id = $request->input('thana_id')[2]; 
            $workingAddressInfo->union_id = $request->input('union_id')[2]; 
            $workingAddressInfo->post_id = $request->input('post_id')[2]; 
            $workingAddressInfo->address = $request->input('address')[2]; 
        
            $workingAddressInfo->save();
        }

        $primaryInfo = PrimaryInfo::with('educations')->find($id);
        $educationRecords = $primaryInfo->educations;
        
        foreach ($educationRecords as $educationRecord) {
            $matchingData = $request->input('exam_name')[$educationRecord->id] ?? null;
        
            if ($matchingData !== null) {
                $educationRecord->update([
                    'exam_name' => $matchingData,
                    'education_institute' => $request->input('education_institute')[$educationRecord->id],
                    'board' => $request->input('exam_board')[$educationRecord->id],
                    'result' => $request->input('result')[$educationRecord->id],
                ]);
            } else {
              
                $educationRecord->delete();
            }
        }
        
        foreach ($request->input('exam_name') as $key => $examName) {
            if (!in_array($key, $educationRecords->pluck('id')->toArray())) {
                EducationInfo::create([
                    'exam_name' => $examName,
                    'education_institute' => $request->input('education_institute')[$key],
                    'board' => $request->input('exam_board')[$key],
                    'result' => $request->input('result')[$key],
                    'primary_info_id' => $primaryInfo->id,
                ]);
            }
        }

        $primaryInfo = PrimaryInfo::with('trainings')->find($id);
         $trainingRecords = $primaryInfo->trainings;
         
         foreach ($trainingRecords as $trainingRecord) {
             $matchingData = $request->input('training_name')[$trainingRecord->id] ?? null;
         
             if ($matchingData !== null) {
                 $trainingRecord->update([
                     'training_name' => $matchingData,
                     'training_center' => $request->input('training_center')[$trainingRecord->id],
                     'training_note' => $request->input('training_note')[$trainingRecord->id],
                     'tr_start_date' => $request->input('tr_start_date')[$trainingRecord->id],
                     'tr_end_date' => $request->input('tr_end_date')[$trainingRecord->id],
                 ]);
             } else {
              
                 $trainingRecord->delete();
             }
         }
         
         foreach ($request->input('training_name') as $key => $trainingName) {
             if (!in_array($key, $trainingRecords->pluck('id')->toArray())) {
                 TrainingInfo::create([
                     'training_name' => $trainingName,
                     'training_center' => $request->input('training_center')[$key],
                     'training_note' => $request->input('training_note')[$key],
                     'tr_start_date' => $request->input('tr_start_date')[$key],
                     'tr_end_date' => $request->input('tr_end_date')[$key],
                     'primary_info_id' => $primaryInfo->id,
                 ]);
             }
         }
         
        
        return redirect()->route('adminServiceEdit', ['name' => $name, 'id' => $id])->with('success', 'Data updated successfully');
        
    }

 

    public function view($name, $id)
    {

        $primaryInfo = PrimaryInfo::with(['addresses', 'educations', 'trainings'])->find($id);
        
        $primaryInfo = DoctorInfo::all(); 
        $primaryInfo = LawyerInfo::all(); 
        $divisions = Division::all(); 
        $districts = District::all();   
        $thanas = Thana::all();   
        $unions = Union::all(); 


        $primaryInfo = PrimaryInfo::with(['doctor', 'barbar', 'beautician', 'electrician', 'lawyer', 'rent_car'])->find($id);


        $primaryInfo = PrimaryInfo::with('doctor')->find($id);
        $doctorInfo = $primaryInfo->doctor; 
        $expertisedoctor = DB::table("specializations")->where('type', 1)->pluck('name', 'id');
        $expertise = DB::table("designations")->where('type', 1)->pluck('name', 'id');
        

        $beautician = PrimaryInfo::with('beautician')->find($id);
        $primaryInfo = PrimaryInfo::with('beautician')->find($id);
        $expertisebeautician = DB::table("specializations")->where('type', 5)->pluck('name', 'id');


        $lawyer = PrimaryInfo::with('lawyer')->find($id);
        $lawyerInfo = $primaryInfo->lawyer; 
        $expertiselawyer = DB::table("specializations")->where('type', 3)->pluck('name', 'id');
        $expertisedesignation = DB::table("designations")->where('type', 3)->pluck('name', 'id');
        $court = Config::get('constants.court');


        $rent_car = PrimaryInfo::with('rent_car')->find($id);
        $rentCars = $primaryInfo->rent_car;
        $expertiserent_car = DB::table("specializations")->where('type', 4)->pluck('name', 'id');
        // $photoPath = '';

        // $barbar = PrimaryInfo::with('barbar')->find($id);
        // $barbars = $primaryInfo->barbar;
        // $expertisebarbar = DB::table("specializations")->where('type', 2)->pluck('name', 'id');


        $barbar = PrimaryInfo::with('barbar')->find($id);
        $primaryInfo = PrimaryInfo::with('barbar')->find($id);
        $expertisebarbar = DB::table("specializations")->where('type', 2)->pluck('name', 'id');




        $electrician = PrimaryInfo::with('electrician')->find($id);
        $primaryInfo = PrimaryInfo::with('electrician')->find($id);
        $expertiseelectrician = DB::table("specializations")->where('type', 6)->pluck('name', 'id');


        

        $educations  = PrimaryInfo::with('educations')->find($id);
        $trainingInfos  = PrimaryInfo::with('trainings')->find($id);
        $educations  = PrimaryInfo::with('diplomas')->find($id);

        
        $primaryInfo = PrimaryInfo::with('addressInfo')->find($id); 
        $presentAddressInfo = $primaryInfo->addressInfo->where('type', 0)->first();
        $permanentAddressInfo = $primaryInfo->addressInfo->where('type', 1)->first();
        $workingAddressInfo = $primaryInfo->addressInfo->where('type', 2)->first();
        $privateAddressInfo = $primaryInfo->addressInfo->where('type', 3)->first();

    

        $religions = Config::get('constants.religions');
        $genders = Config::get('constants.genders');
        $blood_groups = Config::get('constants.blood_groups');
        $education_names = Config::get('constants.education_names');
        $marital_status = Config::get('constants.marital_status');
        $education_boards = Config::get('constants.education_boards');


       





    
        if (!$primaryInfo) {
            return redirect()->route('electrician.index')->with('error', 'Electrician not found.');
        }
        
        $professionType = $primaryInfo->profession_type;
        $viewName = '';
    
        switch ($professionType) {
            case 1:
                $viewName = 'doctor.doctor_view';
                break;
            case 2:
                $viewName = 'barbar.barbar_view';
                break;
            case 3:
                $viewName = 'lawyer.lawyer_view';
                break;
            case 4:
                $viewName = 'rent_car.rentar_view';
                break;
            case 5:
                $viewName = 'beautician.beautician_view';
                break;
            case 6:
                $viewName = 'electrician.electrician_view';
                break;
            
        }

        return view($viewName, compact(
            'primaryInfo',
            'religions',
            'educations',
            'trainingInfos',
            'presentAddressInfo',
            'permanentAddressInfo',
            'workingAddressInfo',
            'divisions',
            'districts',
            'thanas',
            'unions',
            'education_names',
            'education_boards',
            'religions',
            'genders',
            'blood_groups',
            'marital_status',
            'electrician',
            'expertiseelectrician',
            'privateAddressInfo',
            'doctorInfo',
            'expertise',
            'expertisebeautician',
            'beautician',
            'expertisedoctor',
            'lawyer',
            'lawyerInfo',
            'expertiselawyer',
            'expertisedesignation',
            'court',
            'rent_car',
            'rentCars',
            'expertiserent_car',
            'barbar',
            'expertisebarbar'
            


        ));
    }

    public function search(Request $request)
    {
        $searchQuery = $request->input('name');
        $specializations = $request->input('specializations');

        $query = PrimaryInfo::query(); 

        if (!empty($searchQuery)) {
            $query->where(function ($query) use ($searchQuery) {
                $query->where('name_en', 'like', "%$searchQuery%")
                      ->orWhere('name_bn', 'like', "%$searchQuery%")
                      ->orWhere('email', 'like', "%$searchQuery%")
                      ->orWhere('mobile_no', 'like', "%$searchQuery%");
            });
        }

        // if (!empty($specializations)) {
        //     $query->whereIn('specialization_id', $specializations);
        // }

    //    dd() $searchResults = $query->get();

        return view('admin.service.index', compact('searchResults'));
    }
    
    
    
      

    
}    
