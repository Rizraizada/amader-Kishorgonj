
@extends('admin.layouts.layout')

@section('content')
<section class="account">
    <div class="" style="text-align: center;">
        <div class="inner-box">
            <div class="">
                <h4 style="display: inline-block; font-size: 24px; color: white;">ইলেকট্রিশিয়ান এর তথ্য আপডেট করুন!</h4>
            </div>
        </div>
    </div>
</section>

<section class="resum-form padd-tb">
    <div class="container">
        <h4 class="mandatory-fields">
            ষ্টার <span class="star text-danger">(*)</span> চিহ্নিত ফিল্ড গুলো অবশ্যই পূরণ করতে হবে।
        </h4>
            

        <form action="{{ route('adminServiceUpdate', ['name' => $name, 'id' => $primaryInfo->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
             @method('PUT')
       
             <div class="row">
                <div class="container">
                    <div class="row">
                    <div class="col-md-9">
                        <h4 class="mb-9" style="border-bottom: 1px solid #1b8af3; margin-bottom: 20px; font-size: 21px;">
                            <span style="display: inline-block; transition: background-color 0.3s;">
                                <div style="background-color: #1b8af3; padding: 10px; color: white;">
                                    প্রাথমিক তথ্য
                                </div>
                            </span>
                        </h4>
            
                            <div class="card">
                                <div class="card-body">
                                         <div class="row">
                                            <div class="col-md-6">
                                                <label for="name_bn" class="label-with-star">নাম (বাংলায়) <span class="star text-danger">*</span></label>
                                                <input name="name_bn" type="text" class="form-control" placeholder="" required value="{{ $primaryInfo->name_bn }}" id="name_bn">
                                                @error('name_bn')
                                                    <span class="text text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <label for="name_en" class="label-with-star">নাম (ইংরেজি) <span class="star text-danger">*</span></label>
                                                <input name="name_en" type="text" class="form-control" placeholder="" required value="{{ $primaryInfo->name_en }}" id="name_en">
                                                @error('name_en')
                                                    <span class="text text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <label for="father_name" class="label-with-star">পিতার নাম <span class="star text-danger">*</span></label>
                                                <input name="father_name" type="text" class="form-control" placeholder="" required value="{{ $primaryInfo->father_name }}" id="father_name">
                                                @error('father_name')
                                                    <span class="text text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <label for="mother_name" class="label-with-star">মাতার নাম <span class="star text-danger">*</span></label>
                                                <input name="mother_name" type="text" class="form-control" placeholder="" required value="{{ $primaryInfo->mother_name }}" id="mother_name">
                                                @error('mother_name')
                                                    <span class="text text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <label for="mobile_no" class="label-with-star">মোবাইল নং(১১ডিজিট) <span class="star text-danger">*</span></label>
                                                <input name="mobile_no" type="text" class="form-control" id="mobile_no" placeholder="" required value="{{ $primaryInfo->mobile_no }}">
                                                @error('mobile_no')
                                                    <span class="text text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <label for="nid" class="label-with-star">জাতীয় পরিচয় পত্র নং (১০ / ১৭ ডিজিট) <span class="star text-danger">*</span></label>
                                                <input name="nid" type="text" class="form-control" required value="{{ $primaryInfo->nid }}" id="nid">
                                                @error('nid')
                                                    <span class="text text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <label for="birth_date" class="label-with-star">জন্ম তারিখ <span class="star text-danger">*</span></label>
                                                <input name="birth_date" id="birth_date" type="date" class="form-control" placeholder="" required value="{{ $primaryInfo->birth_date }}">
                                                @error('birth_date')
                                                    <span class="text text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                        
                                              <div class="col-md-6 col-sm-6">
                                                 <label for="religion" class="label-with-star">ধর্ম <span class="star text-danger"> *</span></label>
                                                 <div class="custom-dropdown">
                                                     <select name="religion" class="form-control" required id="religion">
                                                         @foreach ($religions as $key => $religion)
                                                             <option value="{{ $key }}" @if($key == $primaryInfo->religion) selected @endif>{{ $religion }}</option>
                                                         @endforeach
                                                     </select>
                                                 </div>
                                             </div>
                        
                                            
                                            <div class="col-md-6 col-sm-6">
                                                <label for="email" class="label-with-star">ইমেইল <span class="star text-danger">*</span></label>
                                                <input name="email" id="email" type="text" class="form-control" placeholder="" required value="{{ $primaryInfo->email }}">
                                                @error('email')
                                                    <span class="text text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <label for="marital_status" class="label-with-star">বৈবাহিক অবস্থা <span class="star text-danger">*</span></label>
                                                <div class="custom-dropdown">
                                                    <select class="form-control" name="marital_status" required id="marital_status">
                                                    @foreach ($marital_status as $key => $marital_status)
                                                      <option value="{{ $key }}" @if($key == $primaryInfo->marital_status) selected @endif>{{ $marital_status }}</option>
                                                   @endforeach                           
                                                 </select>
                                            </div>
                                            </div>
                        
                                            <div class="col-md-6 col-sm-6">
                                                <label for="gender" class="label-with-star">জেন্ডার <span class="star text-danger">*</span></label>
                                                 <div class="custom-dropdown">
                                                     <select class="form-control" name="gender" required id="gender">
                                                         @foreach ($genders as $genderKey => $genderValue)
                                                             <option value="{{ $genderKey }}" @if($genderKey == $primaryInfo->gender) selected @endif>{{ $genderValue }}</option>
                                                         @endforeach
                                                     </select>
                                                 </div>
                                             </div>
                                             
                                             
                                             <div class="col-md-6 col-sm-6">
                                                 <label for="blood_group" class="label-with-star">ব্লাড গ্রুপ <span class="star text-danger">*</span></label>
                                                 <div class="custom-dropdown">
                                                     <select class="form-control" name="blood_group" required id="blood_group">
                                                         @foreach ($blood_groups as $bloodGroupKey => $bloodGroupValue)
                                                             <option value="{{ $bloodGroupKey }}" @if($bloodGroupKey == $primaryInfo->blood_group) selected @endif>{{ $bloodGroupValue }}</option>
                                                         @endforeach
                                                     </select>
                                                 </div>
                                             </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                
                        
                        <div class="col-md-9 mt-4 cur-address">
                            <h4 class="mb-4 mt-4" style="border-bottom: 1px solid #1b8af3; margin-bottom: 20px; font-size: 21px;">
                                <span style="display: inline-block; transition: background-color 0.3s;">
                                    <div style="background-color: #1b8af3; padding: 10px; color: white;">
                                        বর্তমান কর্মস্থল:
                                    </div>
                                </span>
                            </h4>
                            <div class="card">
                                <div class="card-header"></div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="custom-dropdown">
                                                <label for="division_id" class="label-with-star">বিভাগ<span class="star text-danger">*</span></label>
                                                <select class="form-control division_dropdown" name="division_id[]" required>
                                                    <option value="">নির্বাচন করুন</option>
                                                    @foreach ($divisions as $division)
                                                        <option value="{{ $division->division_id }}"
                                                            @if (isset($workingAddressInfo->division_id) && $workingAddressInfo->division_id == $division->division_id) selected @endif>
                                                            {{ $division->division_name_bn }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                        
                                        <div class="col-md-6 col-sm-6">
                                            <div class="custom-dropdown">
                                                <label for="district_id" class="label-with-star">জেলা<span class="star text-danger">*</span></label>
                                                <select class="form-control district_dropdown" name="district_id[]" required>
                                                    @foreach ($districts as $district)
                                                        <option value="{{ $district->district_id }}"
                                                            @if (isset($workingAddressInfo->district_id) && $workingAddressInfo->district_id == $district->district_id) selected @endif>
                                                            {{ $district->district_name_bn }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                        
                                        <div class="col-md-6 col-sm-6">
                                            <div class="custom-dropdown">
                                                <label for="thana_id" class="label-with-star">উপজেলা<span class="star text-danger">*</span></label>
                                                <select class="form-control thana_dropdown" name="thana_id[]" required>
                                                    @foreach ($thanas as $thana)
                                                        <option value="{{ $thana->thana_id }}"
                                                            @if (isset($workingAddressInfo->thana_id) && $workingAddressInfo->thana_id == $thana->thana_id) selected @endif>
                                                            {{ $thana->thana_nameb }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                        
                                        <div class="col-md-6 col-sm-6">
                                            <div class="custom-dropdown">
                                                <label for="union_id" class="label-with-star">ইউনিয়ন<span class="star text-danger">*</span></label>
                                                <select class="form-control union_dropdown" name="union_id[]" required>
                                                    @foreach ($unions as $union)
                                                        <option value="{{ $union->union_id }}"
                                                            @if (isset($workingAddressInfo->union_id) && $workingAddressInfo->union_id == $union->union_id) selected @endif>
                                                            {{ $union->union_nameb }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                        
                                        <div class="col-md-6 col-sm-6">
                                            <div class="custom-dropdown">
                                                <label for="post_id" class="label-with-star">পোস্ট অফিস<span class="star text-danger">*</span></label>
                                                <input type="text" class="form-control" name="post_id[]" value="@if(isset($workingAddressInfo->post_id)){{$workingAddressInfo->post_id}}@endif" />
                                            </div>
                                        </div>
                        
                                        <div class="col-md-6 col-sm-6">
                                            <label for="address" class="label-with-star">ঠিকানার বিবরণ<span class="star text-danger">*</span></label>
                                            <textarea name="address[]" class="form-control" required>
                                                @if (isset($workingAddressInfo->address))
                                                    {{ $workingAddressInfo->address }}
                                                @endif
                                            </textarea>
                                        </div>
                                        
                                        <input type="hidden" name="type[]" value="2">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                
                       <!-- Expertise selection -->
                    <div class="col-md-4 col-sm-6">
                        <label for="expertise" class="label-with-star">
                            কি কি কাজে অভিজ্ঞ
                            <span class="star text-danger">*</span>
                        </label>
                        <div class="custom-dropdown">
                        <select class="form-control select2" name="expertise[]" multiple="multiple" required>
                            @foreach ($expertise as $id => $name)
                                <option value="{{ $id }}" @if(in_array($id, $electricians->pluck('expertise')->toArray())) selected @endif>{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    </div>
                    
                    <!-- Working start year -->
                    <div class="col-md-4 col-sm-6">
                        <label for="working_start_year" class="label-with-star">
                            কত সাল থেকে এই কাজে যুক্ত
                            <span class="star text-danger">*</span>
                        </label>
                        <select name="working_start_year" id="working_start_year" class="form-control" required>
                            @foreach ($electricians->pluck('working_start_year')->unique() as $year)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endforeach
                        </select>
                    </div>
            
            
                
                
                <div class="col-md-9 mt-4">
                    <h4 class="mb-4 mt-4" style="border-bottom: 1px solid #1b8af3; margin-bottom: 20px; font-size: 21px;">
                        <span style="display: inline-block; transition: background-color 0.3s;">
                            <div style="background-color: #1b8af3; padding: 10px; color: white;">
                                শিক্ষাগত যোগ্যতা
                            </div>
                        </span>
                    </h4>
                    <div class="card">
                        <div class="card-header"></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="education_table" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 27%; text-align: center; vertical-align: middle; font-size: 14px;">পরীক্ষার নাম</th>
                                                <th style="width: 27%; text-align: center; vertical-align: middle; font-size: 14px;">প্রতিষ্ঠানের নাম</th>
                                                <th style="width: 27%; text-align: center; vertical-align: middle; font-size: 14px;">বোর্ড</th>
                                                <th style="width: 10%; text-align: center; vertical-align: middle; font-size: 14px;">ফলাফল</th>
                                                <th style="width: 10%; text-align: center; vertical-align: middle; font-size: 14px;">করণীয়</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($educationInfos as $index => $educationInfo)
                                            <tr id="row_{{ $index }}">
                                                <td>
                                                    <select name="exam_name[]" class="form-control">
                                                        <option value="">Select Exam Name</option>
                                                        @foreach ($education_names as $education_nameKey => $education_nameValue)
                                                            <option value="{{ $education_nameKey }}" @if($education_nameKey == $educationInfo->exam_name) selected @endif>{{ $education_nameValue }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td style="width: 25%;">
                                                    <input type="text" name="education_institute[]" class="form-control" placeholder="Enter Institute Name" value="{{ $educationInfo->education_institute ?? '' }}">
                                                </td>
                                                <td>
                                                    <select name="exam_board[]" class="form-control">
                                                        <option value="">Select Board</option>
                                                        @foreach ($education_boards as $education_boardKey => $education_boardValue)
                                                            <option value="{{ $education_boardKey }}" @if($education_boardKey == $educationInfo->board) selected @endif>{{ $education_boardValue }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td style="width: 25%;">
                                                    <input type="number" name="result[]" pattern="[0-9]+" class="form-control" value="{{ $educationInfo->result ?? '' }}">
                                                </td>
                                                <td style="width: 25%; text-align: center; vertical-align: middle;">
                                                    <button type="button" class="btn btn-danger delete-button" onclick="deleteEducationRow(this)">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <button id="add_education_button" type="button" class="btn btn-success mt-3">
                                        <i class="fas fa-plus"></i> Add More
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                
                <div class="col-md-9 mt-4">
                    <h4 class="mb-4 mt-4" style="border-bottom: 1px solid #1b8af3; margin-bottom: 20px; font-size: 21px;">
                        <span style="display: inline-block; transition: background-color 0.3s;">
                            <div style="background-color: #1b8af3; padding: 10px; color: white;">
                                প্রশিক্ষণ তথ্য
                            </div>
                        </span>
                    </h4>
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="training_table" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 40%; text-align: center; vertical-align: middle;">প্রশিক্ষণের নাম</th>
                                                <th style="width: 40%; text-align: center; vertical-align: middle;">প্রশিক্ষণ বিবরণ</th>
                                                <th style="width: 40%; text-align: center; vertical-align: middle;">প্রশিক্ষণ কেন্দ্রের নাম</th>
                                                <th style="width: 40%; text-align: center; vertical-align: middle;">শুরুর তারিখ</th>
                                                <th style="width: 40%; text-align: center; vertical-align: middle;">শেষ তারিখ</th>
                                                <th style="width: 10%; text-align: center; vertical-align: middle;">করণীয়</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($trainingInfos as $index => $trainingInfo)
                                            <tr id="row_tr">
                                                <td>
                                                    <input type="text" name="training_name[]" class="form-control" value="{{ $selectedTrainingNames[$index] ?? '' }}" placeholder="">
                                                </td>
                                                <td>
                                                    <input type="text" name="training_note[]" class="form-control" value="{{ $selectedTrainingNote[$index] ?? '' }}" placeholder="">
                                                </td>
                                                <td>
                                                    <input type="text" name="training_center[]" class="form-control" value="{{ $selectedTrainingCenter[$index] ?? '' }}" placeholder="">
                                                </td>
                                                <td>
                                                    <input type="date" name="tr_start_date[]" class="form-control" value="{{ $selectedTrStartDate[$index] ?? '' }}" placeholder="">
                                                </td>
                                                <td>
                                                    <input type="date" name="tr_end_date[]" class="form-control" value="{{ $selectedTrEndDate[$index] ?? '' }}" placeholder="">
                                                </td>
                                                <td style="width: 25%; text-align: center; vertical-align: middle;">
                                                    <button type="button" class="btn btn-danger delete-button" onclick="deleteEducationRow(this)">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <button id="add_training_button" type="button" class="btn btn-success mt-3">
                                        <i class="fas fa-plus"></i> Add More
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <div class="address">
                    
                    <div class="col-md-9">
                        <h4 class="mb-4 mt-4" style="border-bottom: 1px solid #1b8af3; margin-bottom: 20px; font-size: 21px;">
                            <span style="display: inline-block; transition: background-color 0.3s;">
                                <div style="background-color: #1b8af3; padding: 10px; color: white;">
                                    বর্তমান ঠিকানা
                                </div>
                            </span>
                        </h4>
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="custom-dropdown">
                                            <label for="name" class="label-with-star">বিভাগ<span class="star text-danger"> *</span></label>
                                            <select class="form-control division_dropdown" name="division_id[]" required>
                                                <option value="">নির্বাচন করুন</option>
                                                @foreach ($divisions as $division)
                                                <option value="{{ $division->division_id }}"
                                                    @if ( isset($presentAddressInfo->division_id) && $presentAddressInfo->division_id == $division->division_id) selected @endif>
                                                    {{ $division->division_name_bn }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                
                                    <div class="col-md-6 col-sm-6">
                                        <div class="custom-dropdown">
                                            <label for="name" class="label-with-star">জেলা<span class="star text-danger"> *</span></label>
                                            <select class="form-control district_dropdown" name="district_id[]" required>
                                                @foreach ($districts as $district)
                                                <option value="{{ $district->district_id }}"
                                                    @if (isset($presentAddressInfo->district_id) && $presentAddressInfo->district_id == $district->district_id) selected @endif>
                                                    {{ $district->district_name_bn }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                
                                    <div class="col-md-6 col-sm-6">
                                        <div class="custom-dropdown">
                                            <label for="name" class="label-with-star">উপজেলা<span class="star text-danger"> *</span></label>
                                            <select class="form-control thana_dropdown" name="thana_id[]" required>
                                                @foreach ($thanas as $thana)
                                                <option value="{{ $thana->thana_id }}"
                                                    @if (isset($presentAddressInfo->thana_id)  && $presentAddressInfo->thana_id == $thana->thana_id) selected @endif>
                                                    {{ $thana->thana_nameb }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                
                                    <div class="col-md-6 col-sm-6">
                                        <div class="custom-dropdown">
                                            <label for="name" class="label-with-star">ইউনিয়ন<span class="star text-danger"> *</span></label>
                                            <select class="form-control union_dropdown" name="union_id[]">
                                                @foreach ($unions as $union)
                                                <option value="{{ $union->union_id }}"
                                                    @if (isset($presentAddressInfo->union_id) && $presentAddressInfo->union_id == $union->union_id) selected @endif>
                                                    {{ $union->union_nameb }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                
                                    <div class="col-md-6 col-sm-7">
                                        <div class="custom-dropdown">
                                            <label for="name" class="label-with-star">পোস্ট অফিস<span class="star text-danger"> *</span></label>
                                            <input type="text" class="form-control" name="post_id[]" value="@if(isset($presentAddressInfo->post_id)){{$presentAddressInfo->post_id}}@endif" required />
                                        </div>
                                    </div>
                
                                    <div class="col-md-6 col-sm-6">
                                        <label for="name" class="label-with-star">ঠিকানার বিবরণ<span class="star text-danger"> *</span></label>
                                        <textarea name="address[]" class="form-control" placeholder="" required>
                                            @if (isset($presentAddressInfo->address))
                                            {{ $presentAddressInfo->address }}
                                            @endif
                                        </textarea>
                                    </div>
                
                                    <input type="hidden" name="type[]" value="0">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                                  
                <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h4 class="mb-4 mt-4" style="border-bottom: 1px solid #1b8af3; margin-bottom: 20px; font-size: 21px;">
                        <span style="display: inline-block; transition: background-color 0.3s;">
                            <div style="background-color: #1b8af3; padding: 10px; color: white;">
                                স্থায়ী ঠিকানা
                            </div>
                        </span>
                    </h4>
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="custom-dropdown">
                                        <label for="name" class="label-with-star">বিভাগ<span class="star text-danger"> *</span></label>
                                        <select class="form-control division_dropdown" name="division_id[]" required>
                                            <option value="">নির্বাচন করুন</option>
                                            @foreach ($divisions as $division)
                                            <option value="{{ $division->division_id }}"
                                                @if (isset($permanentAddressInfo->division_id) && $permanentAddressInfo->division_id == $division->division_id) selected @endif>
                                                {{ $division->division_name_bn }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
            
                                <div class="col-md-6 col-sm-6">
                                    <div class="custom-dropdown">
                                        <label for="name" class="label-with-star">জেলা<span class="star text-danger"> *</span></label>
                                        <select class="form-control district_dropdown" name="district_id[]" required>
                                            @foreach ($districts as $district)
                                            <option value="{{ $district->district_id }}"
                                                @if (isset($permanentAddressInfo->district_id) && $permanentAddressInfo->district_id == $district->district_id) selected @endif>
                                                {{ $district->district_name_bn }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
            
                                <div class="col-md-6 col-sm-6">
                                    <div class="custom-dropdown">
                                        <label for="name" class="label-with-star">উপজেলা<span class="star text-danger"> *</span></label>
                                        <select class="form-control thana_dropdown" name="thana_id[]" required>
                                            @foreach ($thanas as $thana)
                                            <option value="{{ $thana->thana_id }}"
                                                @if (isset($permanentAddressInfo->thana_id) && $permanentAddressInfo->thana_id == $thana->thana_id) selected @endif>
                                                {{ $thana->thana_nameb }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
            
                                <div class="col-md-6 col-sm-6">
                                    <div class="custom-dropdown">
                                        <label for="name" class="label-with-star">ইউনিয়ন<span class="star text-danger"> *</span></label>
                                        <select class="form-control union_dropdown" name="union_id[]" required>
                                            @foreach ($unions as $union)
                                            <option value="{{ $union->union_id }}"
                                                @if (isset($permanentAddressInfo->union_id) && $permanentAddressInfo->union_id == $union->union_id) selected @endif>
                                                {{ $union->union_nameb }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
            
                                <div class="col-md-6 col-sm-7">
                                    <div class="custom-dropdown">
                                        <label for="name" class="label-with-star">পোস্ট অফিস<span class="star text-danger"> *</span></label>
                                        <input type="text" class="form-control" name="post_id[]"
                                            value="@if(isset($presentAddressInfo->post_id)){{$presentAddressInfo->post_id}}@endif" />
                                    </div>
                                </div>
            
                                <div class="col-md-6 col-sm-6">
                                    <label for="name" class="label-with-star">ঠিকানার বিবরণ<span class="star text-danger"> *</span></label>
                                    <textarea name="address[]" class="form-control" placeholder="" required>
                                        @if (isset($presentAddressInfo->address))
                                            {{ $presentAddressInfo->address }}
                                        @endif
                                    </textarea>
                                </div>
            
                                <input type="hidden" name="type[]" value="1">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                   <div class="col-md-9">
                       <h4 class="mb-4 mt-4" style="border-bottom: 1px solid #1b8af3; margin-bottom: 20px; font-size: 21px;">
                           <span style="display: inline-block; transition: background-color 0.3s;">
                               <div style="background-color: #1b8af3; padding: 10px; color: white;">
                                   অন্যান্য তথ্য
                               </div>
                           </span>
                       </h4>
                       <div class="card">
                           <div class="card-header">
                           </div>
                           <div class="card-body">
                               <div class="row">
                                   <div class="col-md-6 col-sm-6">
                                       <label for="name" class="label-with-star">জরুরী যোগাযোগের মোবাইল নং(১১ডিজিট) <span
                                               class="star text-danger"> *</span></label>
                                       <input name="emergency_contact_no" type="text" class="form-control" placeholder=""
                                           value="{{ $primaryInfo->emergency_contact_no }}" required id="emergency_contact_no">
                                       @error('emergency_contact_no')
                                           <span class="text text-danger">{{ $errors->first('emergency_contact_no') }}</span>
                                       @enderror
                                   </div>
                
                                   {{-- <div class="col-md-6 col-sm-6">
                                     <label for="name" class="label-with-star">আপনার ছবি আপলোড করুন (ছবি সাইজ ১৫০x১৫০px এবং .jpg, .png ) <span class="star text-danger"> *</span></label>
                                     <div class="upload-box">
                                         <div class="hold">
                                             <span class="btn-file"> Browse File
                                                 <input name="photo" type="file" id="photo">
                                             </span>
                                         </div>
                                         @error('photo')
                                             <span class="text text-danger">{{ $errors->first('photo') }}</span>
                                         @enderror
                                         <p style="margin-top: 10px; font-size: 14px;">আপনার ছবি আপলোড করুন. ফাইল সাইজ: 2 MB.</p>
                                         @if ($primaryInfo->photo)
                                             <img id="imgFile" alt="img" src="{{ asset('uploads/images/electrician/' . $primaryInfo->photo) }}" style="max-width: 150px; height: 150px; border-radius: 25px;" />
                                         @else
                                             <img id="imgFile" alt="img" src="{{ asset('/assets/images/image-placeholder.png') }}" style="max-width: 150px; height: 150px; border-radius: 25px;" />
                                         @endif
                                     </div>
                                 </div>
                                  --}}
                                  
                               </div>
                           </div>
                       </div>
                       <div class="col-md-12">
                            <div class="btn-col">
                        <button type="submit" class="btn btn-primary btn-lg ml-3">Update</button>
                   </div>
               </div>
            </div>



</form>




    </div>
</section>

@endsection

<style>
    .account {
    background-color: #1b8af3;
    padding: 20px;
    border: 1px solid #ccc;
    font-co
}
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
    .custom-alert {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        padding: 10px;
        border: 1px solid #ccc;
        background-color: #f3f3f3;
        color: #333;
        text-align: center;
        display: none;
    }

    .custom-alert.success {
        background-color: #4CAF50;
        color: #fff;
    }
</style>

<div class="custom-alert" id="success-alert">
    {{ session('success') }}
</div>

<script>
    $(document).ready(function () {
        var successMessage = "{{ session('success') }}";
        if (successMessage !== "") {
            $("#success-alert").addClass("success").text(successMessage).slideDown();
            setTimeout(function () {
                $("#success-alert").slideUp();
            }, 5000); 
        }
    });
</script>

@push('custom-js')
    <script>
        $(function() {
            choose = "নির্বাচন করুন";
            $('.address').on('change', '.division_dropdown', function() {
                pr_row = $(this).closest('.row');
                division_id = pr_row.find('.division_dropdown').val();
                district_dropdown = pr_row.find('.district_dropdown');
                district_dropdown.empty();
                if (division_id) {
                    $.get('/districts/' + division_id, function(data) {
                        district_dropdown.append('<option value="">' + choose + '</option>');
                        data = JSON.parse(data);
                        $.each(data, function(key, value) {
                            district_dropdown.append('<option value="' + key + '">' +
                                value + '</option>');
                        });
                    });
                }
            });

            $('.address').on('change', '.district_dropdown',function() {
                pr_row = $(this).closest('.row');
                district_id = pr_row.find('.district_dropdown').val();
                thana_dropdown = pr_row.find('.thana_dropdown');
                thana_dropdown.empty();
                if (district_id) {
                    $.get('/thanas/' + district_id, function(data) {
                        thana_dropdown.append('<option value="">' + choose + '</option>');
                        data = JSON.parse(data);
                        $.each(data, function(key, value) {
                            thana_dropdown.append('<option value="' + key + '">' + value +
                                '</option>');
                        });
                    });
                }
            });

            $('.address').on('change', '.thana_dropdown',function() {
                pr_row = $(this).closest('.row');
                thana_id = pr_row.find('.thana_dropdown').val();
                union_dropdown = pr_row.find('.union_dropdown');
                union_dropdown.empty();
                if (thana_id) {
                    $.get('/unions/' + thana_id, function(data) {
                        union_dropdown.append('<option value="">' + choose + '</option>');
                        data = JSON.parse(data);
                        $.each(data, function(key, value) {
                            union_dropdown.append('<option value="' + key + '">' + value +
                                '</option>');
                        });
                    });
                }
            });
        });
    </script>
@endpush

@push('custom-js')
    <script>
        $(function() {
            choose = "নির্বাচন করুন";
            $('.cur-address').on('change', '.division_dropdown', function() {
                pr_row = $(this).closest('.row');
                division_id = pr_row.find('.division_dropdown').val();
                district_dropdown = pr_row.find('.district_dropdown');
                district_dropdown.empty();
                if (division_id) {
                    $.get('/districts/' + division_id, function(data) {
                        district_dropdown.append('<option value="">' + choose + '</option>');
                        data = JSON.parse(data);
                        $.each(data, function(key, value) {
                            district_dropdown.append('<option value="' + key + '">' +
                                value + '</option>');
                        });
                    });
                }
            });

            $('.cur-address').on('change', '.district_dropdown',function() {
                pr_row = $(this).closest('.row');
                district_id = pr_row.find('.district_dropdown').val();
                thana_dropdown = pr_row.find('.thana_dropdown');
                thana_dropdown.empty();
                if (district_id) {
                    $.get('/thanas/' + district_id, function(data) {
                        thana_dropdown.append('<option value="">' + choose + '</option>');
                        data = JSON.parse(data);
                        $.each(data, function(key, value) {
                            thana_dropdown.append('<option value="' + key + '">' + value +
                                '</option>');
                        });
                    });
                }
            });

            $('.cur-address').on('change', '.thana_dropdown',function() {
                pr_row = $(this).closest('.row');
                thana_id = pr_row.find('.thana_dropdown').val();
                union_dropdown = pr_row.find('.union_dropdown');
                union_dropdown.empty();
                if (thana_id) {
                    $.get('/unions/' + thana_id, function(data) {
                        union_dropdown.append('<option value="">' + choose + '</option>');
                        data = JSON.parse(data);
                        $.each(data, function(key, value) {
                            union_dropdown.append('<option value="' + key + '">' + value +
                                '</option>');
                        });
                    });
                }
            });
        });
    </script>
@endpush


@push('custom-js')
          <script>
            var educationRowCount = 1;

            document.getElementById("add_education_button").addEventListener("click", function() {
            var newRow = document.getElementById("row_0").cloneNode(true);
            newRow.id = "row_" + educationRowCount;
            var selects = newRow.getElementsByTagName("select");
            for (var i = 0; i < selects.length; i++) {
                selects[i].name = selects[i].name.replace("[0]", "[" + educationRowCount + "]");
            }
            var inputs = newRow.getElementsByTagName("input");
            for (var i = 0; i < inputs.length; i++) {
                inputs[i].name = inputs[i].name.replace("[0]", "[" + educationRowCount + "]");
                inputs[i].value = "";
            }
            var deleteButton = newRow.querySelector(".delete-button");
            deleteButton.addEventListener("click", function() {
                deleteEducationRow(this);
            });
            document.querySelector("#education_table tbody").appendChild(newRow);
            educationRowCount++;
            });

            function deleteEducationRow(button) {
                var row = button.closest("tr");
                row.parentNode.removeChild(row);
            }
        </script>
    @endpush

    @push('custom-js')
        <script>
            var trainingRowCount = 1;

            document.getElementById("add_training_button").addEventListener("click", function() {
            var newRow = document.getElementById("row_tr").cloneNode(true);
            newRow.id = "row_" + trainingRowCount;
            var inputs = newRow.getElementsByTagName("input");
            for (var i = 0; i < inputs.length; i++) {
                inputs[i].name = inputs[i].name.replace("[0]", "[" + trainingRowCount + "]");
                inputs[i].value = "";
            }
            var deleteButton = newRow.querySelector(".delete-button");
            deleteButton.addEventListener("click", function() {
                deleteTrainingRow(this);
            });
            document.querySelector("#training_table tbody").appendChild(newRow);
            trainingRowCount++;
            });

            function deleteTrainingRow(button) {
                var row = button.closest("tr");
                row.parentNode.removeChild(row);
            }
        </script>
    @endpush   

    @push('custom-js')
    <script>
        $(function() {
            for (i = new Date().getFullYear(); i > 1970; i--)
                $('#working_start_year').append($('<option />').val(i).html(i));
        });
    </script>
    @endpush

    

    