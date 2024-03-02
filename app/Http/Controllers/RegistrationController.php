<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PrimaryInfoRequest;
use App\Models\PrimaryInfo;
use App\Models\DoctorInfo;
use App\Models\EducationInfo;
use App\Models\TrainingInfo;
use App\Models\AddressInfo;

class RegistrationController extends Controller
{
    public function registrationForm() {
        return view('doctor/registration');
    }

    public function registrationFormSubmit(Request $request) {
        $primary = app()->make(PrimaryInfoRequest::class);
        // $validator = $primary->validate();
        // dump($validator);
        // if(!$validator->fails) {
        //     dd('validated');
        // }
        // else {
        //     dd($validator->errors());
        // }
        $primaryInfo = PrimaryInfo::create($request->all());

        $primaryInfo->doctor()->create($request->all());

        for($i = 0; $i < count($request->exam_name); $i++) {
            $educations[] = [
                'exam_name' => $request->exam_name[$i],
                'institute_name' => $request->institute_name[$i],
                'board' => $request->board[$i],
                'result' => $request->result[$i]
            ];
        }
        $primaryInfo->educations()->createMany($educations);

        for($i = 0; $i < count($request->training_name); $i++) {
            $trainings[] = [
                'training_name' => $request->training_name[$i],
                'training_note' => $request->training_note[$i],
                'tr_start_date' => $request->tr_start_date[$i],
                'tr_end_date' => $request->tr_end_date[$i]
            ];
        }
        $primaryInfo->trainings()->createMany($trainings);

        for($i = 0; $i < count($request->division_id); $i++) {
            $addresses[] = [
                'division_id' => $request->division_id[$i],
                'district_id' => $request->district_id[$i],
                'upzilla_id' => $request->upzilla_id[$i],
                'union_id' => $request->union_id[$i],
                'post_id' => $request->post_id[$i],
                'address' => $request->address[$i],
                'type' => $request->type[$i]
            ];
        }
        $primaryInfo->addresses()->createMany($addresses);
        return redirect()->back()->with('success','Registration successful');
    }
}
