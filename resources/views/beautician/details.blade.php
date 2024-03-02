@extends('layouts.layout')
@section('content')
    <section class="account-option">
        <div class="container" style="text-align: center;">
            <div class="inner-box">
                <div class="text-box" style="position: relative;">
                    <h4 style="display: inline-block; font-size: 24px;">বিউটিশিয়ান অনুসন্ধান</h4>
                </div>
            </div>
        </div>
    </section>
    </div>

    <section class="recent-row padd-tb">
        <div class="container">
            <div class="row" id="myList">
                <div class="col-md-4"style="margin-bottom: 15px;">

                    <div class="job-box" style="width: 350px; height: 200px;">
                        <div class="box" style="padding: 20px;/* margin: 20px; */display: flex;/* width: 100%; */height: 80%;">
                            <div class="thumb" style="flex: 1;/* margin-right: 25px; *//* margin-left: -35px; *//* margin-top: -1px; */">
                                <a href="#"><img src="{{ asset('/uploads/images/beautician/' . $primaryInfo->photo) }}"
                                        alt="img" style="max-width:100%; height: 100%; border-radius: 25px;"></a>
                            </div>
                            <div class="text-col"
                                style="flex: 2;text-align: left;/* padding-left: 60px; */border-radius: 25px;padding-left: inherit;">
                                <h4><a href="/beautician/details/{{ $primaryInfo->id }}" class="job-name"
                                        style="color: #ff6600;">{{ $primaryInfo->name_bn }}</a></h4>
                                <!-- Set color to orange (#ff6600) -->
                                <p><i class="fa fa-phone"></i> {{ $primaryInfo->mobile_no }} <span class="job-phone"></span>
                                </p>
                                 <h4><p><i class="" style="color: #009900;"></i> <span class="job-consultant" style="color: #009900;">{{ isset($primaryInfo->beautician->expertise) ? $expertise[$primaryInfo->beautician->expertise] : '' }}</span></p></h4>
                                {{-- <p><i class="fa fa-map-marker" style="color: #009900;"></i> <span class="job-location" style="color: #009900;font-size: 11px;">Job Location</span></p> <!-- Set color to green (#009900) --> --}}
                                    <p><i class="fa fa-clock"></i> <span class="job-experience">{{ (date('Y') - $primaryInfo->beautician->working_start_year). ' Years' }}</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
