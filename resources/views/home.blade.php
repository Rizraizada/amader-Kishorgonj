@extends('layouts.layout')
@section('banner')
    @include('layouts.__partials.banner')
@endsection
@section('content')
    <div class="col-md-9 col-sm-9">
        <div class="col-md-12 col-sm-12">
            <div id="content-area">
                <div class="box" style="">
                    <h2>সেবা সমূহ</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
            <aside>
                <div class="sidebar">
                    <div class="box">
                        <div class="thumb"> <a href="#"><img src="{{ asset('assets/images/doctor.png') }}"
                                    alt="img"></a>
                            <div class="caption">
                                <h3 style="text-align:center;margin-top: 0px !important;"><a href="#"
                                        style="color:#ffffff !important;">ডাক্তার</a></h3>
                            </div>
                        </div>
                        <div class="text-box" style="padding-left:0px !important;">
                            <h4 style="text-align:center;margin-top: 0px !important;padding-left:0px !important;"><a
                                    href="/doctor">ডাক্তারের তালিকা</a></h4>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
        <div class="col-md-4 col-sm-4">
            <aside>
                <div class="sidebar">
                    <div class="box">
                        <div class="thumb"> <a href="#"><img src="{{ asset('assets/images/beautician.png') }}"
                                    alt="img"></a>
                            <div class="caption">
                                <h3 style="text-align:center;margin-top: 0px !important;"><a href="#"
                                        style="color:#ffffff !important;">বিউটিশিয়ান </a></h3>
                            </div>
                        </div>
                        <div class="text-box" style="padding-left:0px !important;">
                            <h4 style="text-align:center;margin-top: 0px !important;padding-left:0px !important;"><a
                                    href="/beautician">বিউটিশিয়ানের তালিকা</a></h4>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
        <div class="col-md-4 col-sm-4">
            <aside>
                <div class="sidebar">
                    <div class="box">
                        <div class="thumb"> <a href="#"><img src="{{ asset('assets/images/driver.png') }}"
                                    alt="img"></a>
                            <div class="caption">
                                <h3 style="text-align:center;margin-top: 0px !important;"><a href="#"
                                        style="color:#ffffff !important;">গাড়ি ভাড়া</a></h3>
                            </div>
                        </div>
                        <div class="text-box" style="padding-left:0px !important;">
                            <h4 style="text-align:center;margin-top: 0px !important;padding-left:0px !important;"><a
                                    href="/rent_car">গাড়ীর তালিকা</a></h4>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
        <div class="col-md-4 col-sm-4">
            <aside>
                <div class="sidebar">
                    <div class="box">
                        <div class="thumb"> <a href="#"><img src="{{ asset('assets/images/electratian.png') }}"
                                    alt="img"></a>
                            <div class="caption">
                                <h3 style="text-align:center;margin-top: 0px !important;"><a href="#"
                                        style="color:#ffffff !important;">ইলেকট্রিশিয়ান</a></h3>
                            </div>
                        </div>
                        <div class="text-box" style="padding-left:0px !important;">
                            <h4 style="text-align:center;margin-top: 0px !important;padding-left:0px !important;"><a
                                    href="/electrician">ইলেকট্রিশিয়ানের তালিকা</a></h4>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
        <div class="col-md-4 col-sm-4">
            <aside>
                <div class="sidebar">
                    <div class="box">
                        <div class="thumb"> <a href="#"><img src="{{ asset('assets/images/lawyer.png') }}"
                                    alt="img"></a>
                            <div class="caption">
                                <h3 style="text-align:center;margin-top: 0px !important;"><a href="#"
                                        style="color:#ffffff !important;">আইনজীবী</a></h3>
                            </div>
                        </div>
                        <div class="text-box" style="padding-left:0px !important;">
                            <h4 style="text-align:center;margin-top: 0px !important;padding-left:0px !important;"><a
                                    href="/lawyer">আইনজীবী তালিকা</a></h4>
                        </div>
                    </div>
                </div>
            </aside>
        </div>

        <div class="col-md-4 col-sm-4">
            <aside>
                <div class="sidebar">
                    <div class="box">
                        <div class="thumb"> <a href="javascript:void(0);"><img
                                    src="{{ asset('assets/images/barbar.png') }}" alt="img"></a>
                            <div class="caption">
                                <h3 style="text-align:center;margin-top: 0px !important;"><a href="#"
                                        style="color:#ffffff !important;">নাপিত</a></h3>
                            </div>
                        </div>
                        <div class="text-box" style="padding-left:0px !important;">
                            <h4 style="text-align:center;margin-top: 0px !important;padding-left:0px !important;"><a
                                    href="#">নাপিতের তালিকা</a></h4>

                        </div>
                    </div>
                </div>
            </aside>
        </div>


    </div>

    @include('layouts.__partials.sidebar')
@endsection
