@extends('admin.layouts.layout')

@section('content')

<section style="background-color: white;margin-top: 10px;width:103%">
      <div class="container py-5">


          <!-- Image Column -->
          <div class="col-lg-2" style="margin-top: 10px;">
             <div class="card mb-2" style="padding: 5px;">
               <div class="card-body text-center">
                 <img src="{{ asset('/uploads/images/beautician/' . $primaryInfo['photo']) }}" alt="avatar" class="rounded-circle img-fluid" style="width: 130px;height:130px;" onerror="this.src='/uploads/images/Photo-Placeholder-Image-150x150-1.jpg'">
               </div>
             </div>
           </div>
           
      
          <!-- Details Column -->
          <div class="col-lg-6"style="margin-top: 10px;">
            <div class="card mb-2">
              <div class="card-body">
              <div class="info-item" style="border-bottom: 1px solid #ccc; margin-top:15px">
                  <span class="info-label" style="font-size: 15px; font-weight:bold;">নাম (বাংলায়):</span>
                  <span class="info-value" style="font-size: 13px;font-weight:bold;">{{ $primaryInfo['name_bn'] }}</span>
                </div>
                <div class="info-item" style="border-bottom: 1px solid #ccc;margin-top:10px">
                  <span class="info-label" style="font-size: 15px;font-weight:bold;">নাম (ইংরেজি) :</span>
                  <span class="info-value" style="font-size: 13px;font-weight:bold;">{{ $primaryInfo['name_en'] }}</span>
                </div>
                <div class="info-item" style="border-bottom: 1px solid #ccc;margin-top:10px">
                  <span class="info-label" style="font-size: 15px; font-weight:bold;">মোবাইল নং:</span>
                  <span class="info-value" style="font-size: 13px;font-weight:bold;">{{ $primaryInfo['mobile_no'] }}</span>
                </div>
              </div>
            </div>
          </div>
        

      
      <div class="col-lg-9">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
            <h4 class="mb-4 mt-6" style="border-bottom: 1px solid #1b8af3; margin-bottom: 20px; font-size: 21px;">
                  <span style="display: inline-block; background-color: #1b8af3; padding: 10px; color: white;">
                    প্রাথমিক তথ্য
                  </span>
                </h4>
              <!-- Left Side -->
              <div class="col-sm-6" style="border-right: 1px solid #ccc;">
            
                <div class="info-item" style="border-bottom: 1px solid #ccc; margin-top:10px">
                  <span class="info-label" style="font-size: 15px;">পিতার নাম :</span>
                  <span class="info-value" style="font-size: 13px;">{{ $primaryInfo['father_name'] }}</span>
                </div>
                <div class="info-item" style="border-bottom: 1px solid #ccc;margin-top:10px">
                  <span class="info-label" style="font-size: 15px;">মাতার নাম :</span>
                  <span class="info-value" style="font-size: 13px;">{{ $primaryInfo['mother_name'] }}</span>
                </div>
                <div class="info-item" style="border-bottom: 1px solid #ccc;margin-top:10px">
                  <span class="info-label" style="font-size: 15px;">জাতীয় পরিচয় পত্র নং:</span>
                  <span class="info-value" style="font-size: 13px;">{{ $primaryInfo['nid'] }}</span>
                </div>
                <div class="info-item" style="border-bottom: 1px solid #ccc;margin-top:10px">
                  <span class="info-label" style="font-size: 15px;">জন্ম তারিখ:</span>
                  <span class="info-value" style="font-size: 13px;">{{ $primaryInfo['birth_date'] }}</span>
                </div>
                <div class="info-item" style="border-bottom: 1px solid #ccc;margin-top:10px">
                  <span class="info-label" style="font-size: 15px;">ধর্ম :</span>
                  <span class="info-value" style="font-size: 13px;">{{ $religions[$primaryInfo->religion] }}</span>
                </div>
              </div>
              <!-- Right Side -->
              <div class="col-sm-6">
               
                <div class="info-item" style="border-bottom: 1px solid #ccc;margin-top:10px">
                  <span class="info-label" style="font-size: 15px;">ইমেইল:</span>
                  <span class="info-value" style="font-size: 13px;">{{ $primaryInfo['email'] }}</span>
                </div>
                <div class="info-item" style="border-bottom: 1px solid #ccc;margin-top:10px">
                  <span class="info-label" style="font-size: 15px;">বৈবাহিক অবস্থা:</span>
                  <span class="info-value" style="font-size: 13px;">{{ $marital_status[$primaryInfo->marital_status] }}</span>
                </div>
                <div class="info-item" style="border-bottom: 1px solid #ccc;margin-top:10px">
                  <span class="info-label" style="font-size: 15px;">জেন্ডার:</span>
                  <span class="info-value" style="font-size: 13px;">{{ $genders[$primaryInfo->gender] }}</span>
                </div>
                <div class="info-item" style="border-bottom: 1px solid #ccc;margin-top:10px">
                  <span class="info-label" style="font-size: 15px;">ব্লাড গ্রুপ:</span>
                  <span class="info-value" style="font-size: 13px;">{{ $blood_groups[$primaryInfo->blood_group] }}</span>
                </div>
                <div class="info-item" style="border-bottom: 1px solid #ccc;margin-top:10px">
                  <span class="info-label" style="font-size: 15px;">জরুরী যোগাযোগের মোবাইল নং:</span>
                  <span class="info-value" style="font-size: 13px;">{{ $primaryInfo['emergency_contact_no'] }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="col-lg-9">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <h4 class="mb-4 mt-6" style="border-bottom: 1px solid #1b8af3; margin-bottom: 20px; font-size: 21px;">
                <span style="display: inline-block; background-color: #1b8af3; padding: 10px; color: white; ">
                  শিক্ষাগত যোগ্যতা
                </span>
              </h4>
              <div class="col-sm-9">
                <!-- Content for the right column (if needed) -->
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-12">
                <table class="table table-bordered">
                  <tr>
                    <th style="border-bottom: 1px solid #ccc; font-size: 15px; margin-top: 10px;"> পরীক্ষার নাম</th>
                    <th style="border-bottom: 1px solid #ccc; font-size: 15px; margin-top: 10px;">প্রতিষ্ঠানের নাম</th>
                    <th style="border-bottom: 1px solid #ccc; font-size: 15px; margin-top: 10px;">বোর্ড</th>
                    <th style="border-bottom: 1px solid #ccc; font-size: 15px; margin-top: 10px;">ফলাফল</th>
                  </tr>
                  @foreach ($educations->educations as $education)
                  <tr>
                      <td>{{ $education_names[$education->exam_name] }}</td>
                      <td>{{ $education->education_institute }}</td>
                      <td>{{ $education_boards[$education->exam_name] }}</td>
                      <td>{{ $education->result }}</td>
                  </tr>
                  @endforeach
                  <!-- You can add more rows as needed -->
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-9">
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <h4 class="mb-4 mt-6" style="border-bottom: 1px solid #1b8af3; margin-bottom: 20px; font-size: 21px; text-align:;">
                    <span style="display: inline-block; background-color: #1b8af3; padding: 10px; color: white;">
                        বর্তমান কর্মস্থল:
                    </span>
                </h4>
                <!-- Left Side -->
                <div class="col-sm-6" style="border-right: 1px solid #ccc;">
                    <div class="info-item" style="border-bottom: 1px solid #ccc; margin-top: 10px;">
                        <span class="info-label" style="font-size: 15px;">বিভাগ :</span>
                        <span class="info-value" style="font-size: 13px;">{{ $workingAddressInfo->division->division_name_bn }}</span>
                    </div>
                    <div class="info-item" style="border-bottom: 1px solid #ccc; margin-top: 10px;">
                        <span class "info-label" style="font-size: 15px;">উপজেলা :</span>
                        <span class="info-value" style="font-size: 13px;">{{ $workingAddressInfo->thana->thana_nameb }}</span>
                    </div>
                    <div class="info-item" style="border-bottom: 1px solid #ccc; margin-top: 10px;">
                        <span class="info-label" style="font-size: 15px;">পোস্ট অফিস:</span>
                        <span class="info-value" style="font-size: 13px;">{{ $workingAddressInfo->post_id }}</span>
                    </div>
                    <div class="info-item" style="border-bottom: 1px solid #ccc; margin-top: 10px;">
                        <span class="info-label" style="font-size: 15px;">কি কি কাজে অভিজ্ঞ:</span>
                        @if ($primaryInfo->beautician->expertise)
                             {{ implode(', ', array_map(function ($value) use ($expertisebeautician) {
                                 return $expertisebeautician[$value] ?? 'N/A';
                             }, explode(',', $primaryInfo->beautician->expertise))) }}
                         @else
                             N/A
                         @endif
                    </div>
                </div>
                <!-- Right Side -->
                <div class="col-sm-6">
                    <div class="info-item" style="border-bottom: 1px solid #ccc; margin-top: 10px;">
                        <span class="info-label" style="font-size: 15px;">জেলা :</span>
                        <span class="info-value" style="font-size: 13px;">{{ $workingAddressInfo->district->district_name_bn }}</span>
                    </div>

                    <div class="info-item" style="border-bottom: 1px solid #ccc; margin-top: 10px;">
                        <span class="info-label" style="font-size: 15px;">ইউনিয়ন :</span>
                        <span class="info-value" style="font-size: 13px;">{{ $workingAddressInfo->union->union_nameb }}</span>
                    </div>

                    <div class="info-item" style="border-bottom: 1px solid #ccc; margin-top: 10px;">
                        <span class="info-label" style="font-size: 15px;">ঠিকানার বিবরণ:</span>
                        <span class="info-value" style="font-size: 13px;">{{ $workingAddressInfo->address }}</span>
                    </div>

                    <div class="info-item" style="border-bottom: 1px solid #ccc; margin-top: 10px;">
                        <span class="info-label" style="font-size: 15px;">কত সাল থেকে এই কাজে যুক্ত:</span>
                        <span class="info-value" style="font-size: 13px;">
                        @if ($primaryInfo->beautician)
                             {{ $primaryInfo->beautician->working_start_year ?? 'N/A' }}
                         @else
                             N/A
                         @endif
                      </span>
                    </div>
                    <input type="hidden" name="type[]" value="2">
                </div>
            </div>
        </div>
    </div>
</div>


      

      <div class="col-lg-9">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <h4 class="mb-4 mt-6" style="border-bottom: 1px solid #1b8af3; margin-bottom: 20px; font-size: 21px;">
                <span style="display: inline-block; background-color: #1b8af3; padding: 10px; color: white; ">
                  প্রশিক্ষণ তথ্য
                </span>
              </h4>
              <div class="col-sm-9">
                <!-- Content for the right column (if needed) -->
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-12">
                <table class="table table-bordered">
                  <tr>
                    <th style="border-bottom: 1px solid #ccc; font-size: 15px; margin-top: 10px;"> প্রশিক্ষণের নাম</th>
                    <th style="border-bottom: 1px solid #ccc; font-size: 15px; margin-top: 10px;">প্রশিক্ষণ বিবরণ</th>
                    <th style="border-bottom: 1px solid #ccc; font-size: 15px; margin-top: 10px;">প্রশিক্ষণ কেন্দ্রের নাম</th>
                    <th style="border-bottom: 1px solid #ccc; font-size: 15px; margin-top: 10px;">শুরুর তারিখ</th>
                    <th style="border-bottom: 1px solid #ccc; font-size: 15px; margin-top: 10px;">শেষ তারিখ</th>
                  </tr>
                  @foreach ($trainingInfos->trainings as $training)
                    <tr>
                      <td>{{ $training->training_name }}</td>
                      <td>{{ $training->training_center }}</td>
                      <td>{{ $training->training_note }}</td>
                      <td>{{ $training->tr_start_date }}</td>
                      <td>{{ $training->tr_end_date }}</td>
                    </tr>
                  @endforeach
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-lg-9">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
            <h4 class="mb-4 mt-6" style="border-bottom: 1px solid #1b8af3; margin-bottom: 20px; font-size: 21px; text-align:;">
                  <span style="display: inline-block; background-color: #1b8af3; padding: 10px; color: white; ">
                    বর্তমান ঠিকানা
                  </span>
                </h4>
              <!-- Left Side -->
              <div class="col-sm-6" style="border-right: 1px solid #ccc;">
                <div class="info-item" style="border-bottom: 1px solid #ccc; margin-top: 10px;">
                  <span class="info-label" style="font-size: 15px;">বিভাগ:</span>
                  <span class="info-value" style="font-size: 13px;">{{ $presentAddressInfo->division->division_name_bn ?? '' }}</span>
                </div>
                <div class="info-item" style="border-bottom: 1px solid #ccc; margin-top: 10px;">
                  <span class="info-label" style="font-size: 15px;">উপজেলা:</span>
                  <span class="info-value" style="font-size: 13px;">{{ $presentAddressInfo->thana->thana_nameb ?? '' }}</span>
                </div>
                <div class "info-item" style="border-bottom: 1px solid #ccc; margin-top: 10px;">
                  <span class="info-label" style="font-size: 15px;">পোস্ট অফিস:</span>
                  <span class="info-value" style="font-size: 13px;">{{ $presentAddressInfo->post_id ?? '' }}</span>
                </div>
              </div>
              <!-- Right Side -->
              <div class="col-sm-6">

                <div class "info-item" style="border-bottom: 1px solid #ccc; margin-top: 10px;">
                  <span class="info-label" style="font-size: 15px;">জেলা:</span>
                  <span class="info-value" style="font-size: 13px;">{{ $presentAddressInfo->district->district_name_bn ?? '' }}</span>
                </div>

                <div class="info-item" style="border-bottom: 1px solid #ccc; margin-top: 10px;">
                  <span class="info-label" style="font-size: 15px;">ইউনিয়ন:</span>
                  <span class="info-value" style="font-size: 13px;">{{ $presentAddressInfo->union->union_nameb ?? '' }}</span>
                </div>
              
                <div class="info-item" style="border-bottom: 1px solid #ccc; margin-top: 10px;">
                  <span class="info-label" style="font-size: 15px;">ঠিকানার বিবরণ:</span>
                  <span class="info-value" style="font-size: 13px;">{{ $presentAddressInfo->address ?? '' }}</span>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-lg-9">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
            <h4 class="mb-4 mt-6" style="border-bottom: 1px solid #1b8af3; margin-bottom: 20px; font-size: 21px; text-align:;">
                  <span style="display: inline-block; background-color: #1b8af3; padding: 10px; color: white; ">
                  স্থায়ী ঠিকানা
                  </span>
                </h4>
              <!-- Left Side -->
              <div class="col-sm-6" style="border-right: 1px solid #ccc;">
             
                <div class="info-item" style="border-bottom: 1px solid #ccc; margin-top: 10px;">
                  <span class="info-label" style="font-size: 15px;">বিভাগ:</span>
                  <span class="info-value" style="font-size: 13px;">{{ $permanentAddressInfo->division->division_name_bn ?? '' }}</span>
                </div>
             
                <div class="info-item" style="border-bottom: 1px solid #ccc; margin-top: 10px;">
                  <span class="info-label" style="font-size: 15px;">উপজেলা:</span>
                  <span class="info-value" style="font-size: 13px;">{{ $permanentAddressInfo->thana->thana_nameb ?? '' }}</span>
                </div>

                <div class "info-item" style="border-bottom: 1px solid #ccc; margin-top: 10px;">
                  <span class="info-label" style="font-size: 15px;">পোস্ট অফিস:</span>
                  <span class="info-value" style="font-size: 13px;">{{ $permanentAddressInfo->post_id ?? '' }}</span>
                </div>

              </div>
              <!-- Right Side -->
              <div class="col-sm-6">

                <div class "info-item" style="border-bottom: 1px solid #ccc; margin-top: 10px;">
                  <span class="info-label" style="font-size: 15px;">জেলা:</span>
                  <span class="info-value" style="font-size: 13px;">{{ $permanentAddressInfo->district->district_name_bn ?? '' }}</span>
                </div>

                <div class="info-item" style="border-bottom: 1px solid #ccc; margin-top: 10px;">
                  <span class="info-label" style="font-size: 15px;">ইউনিয়ন:</span>
                  <span class="info-value" style="font-size: 13px;">{{ $permanentAddressInfo->union->union_nameb ?? '' }}</span>
                </div>
              
                <div class="info-item" style="border-bottom: 1px solid #ccc; margin-top: 10px;">
                  <span class="info-label" style="font-size: 15px;">ঠিকানার বিবরণ:</span>
                  <span class="info-value" style="font-size: 13px;">{{ $permanentAddressInfo->address ?? '' }}</span>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
       
    </div>
</section>
      
      
 @endsection