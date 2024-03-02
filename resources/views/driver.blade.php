@extends('layouts.layout')
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
									<div class="thumb"> <a href="#"><img src="{{ asset('assets/images/doctor.png') }}" alt="img"></a>
										<div class="caption">
											<h3 style="text-align:center;margin-top: 0px !important;"><a href="#" style="color:#ffffff !important;">ডাক্তার</a></h3>
										</div>
									</div>
									<div class="text-box" style="padding-left:0px !important;"> <a href="#" class="btn-time">000 জন ডাক্তার</a>
										<h4 style="text-align:center;margin-top: 0px !important;padding-left:0px !important;"><a href="doctorsearch.html">ডাক্তারের তালিকা</a></h4>
									</div>
								</div>
							</div>
						</aside>
					</div>
					<div class="col-md-4 col-sm-4">
						<aside>
							<div class="sidebar">
								<div class="box">
									<div class="thumb"> <a href="#"><img src="{{ asset('assets/images/hospital.png') }}" alt="img"></a>
										<div class="caption">
											<h3 style="text-align:center;margin-top: 0px !important;"><a href="#" style="color:#ffffff !important;">হাসপাতাল / ক্লিনিক </a></h3>
										</div>
									</div>
									<div class="text-box" style="padding-left:0px !important;"> <a href="#" class="btn-time" style="background-color:#f406b9 !important;">000 টি হাসপাতাল / ক্লিনিক</a>
										<h4 style="text-align:center;margin-top: 0px !important;padding-left:0px !important;"><a href="javascript:void(0);">হাসপাতাল / ক্লিনিকের তালিকা</a></h4>

									</div>
								</div>
							</div>
						</aside>
					</div>
					<div class="col-md-4 col-sm-4">
						<aside>
							<div class="sidebar">
								<div class="box">
									<div class="thumb"> <a href="#"><img src="{{ asset('assets/images/driver.png') }}" alt="img"></a>
										<div class="caption">
											<h3 style="text-align:center;margin-top: 0px !important;"><a href="#" style="color:#ffffff !important;">ড্রাইভার </a></h3>
										</div>
									</div>
									<div class="text-box" style="padding-left:0px !important;"> <a href="#" class="btn-time" style="background-color:#24e339 !important;">000 জন ড্রাইভার</a>
										<h4 style="text-align:center;margin-top: 0px !important;padding-left:0px !important;"><a href="driversearch.html">ড্রাইভারের তালিকা</a></h4>
									</div>
								</div>
							</div>
						</aside>
					</div>
					<div class="col-md-4 col-sm-4">
						<aside>
							<div class="sidebar">
								<div class="box">
									<div class="thumb"> <a href="#"><img src="{{ asset('assets/images/driver.png') }}" alt="img"></a>
										<div class="caption">
											<h3 style="text-align:center;margin-top: 0px !important;"><a href="#" style="color:#ffffff !important;">গাড়ি ভাড়া</a></h3>
										</div>
									</div>
									<div class="text-box" style="padding-left:0px !important;"> <a href="#" class="btn-time" style="background-color:#00796b !important;">000 টি গাড়ী</a>
										<h4 style="text-align:center;margin-top: 0px !important;padding-left:0px !important;"><a href="driversearch.html">গাড়ীর তালিকা</a></h4>
									</div>
								</div>
							</div>
						</aside>
					</div>
					<div class="col-md-4 col-sm-4">
						<aside>
							<div class="sidebar">
								<div class="box">
									<div class="thumb"> <a href="#"><img src="{{ asset('assets/images/electratian.png') }}" alt="img"></a>
										<div class="caption">
											<h3 style="text-align:center;margin-top: 0px !important;"><a href="#" style="color:#ffffff !important;">ইলেকট্রিশিয়ান</a></h3>
										</div>
									</div>
									<div class="text-box" style="padding-left:0px !important;"> <a href="#" class="btn-time" style="background-color:#984ac3 !important;">000 জন  ইলেকট্রিশিয়ান</a>
										<h4 style="text-align:center;margin-top: 0px !important;padding-left:0px !important;"><a href="electriciansearch.html">ইলেকট্রিশিয়ানের তালিকা</a></h4>
									</div>
								</div>
							</div>
						</aside>
					</div>
					<div class="col-md-4 col-sm-4">
						<aside>
							<div class="sidebar">
								<div class="box">
									<div class="thumb"> <a href="#"><img src="{{ asset('assets/images/lawyer.png') }}" alt="img"></a>
										<div class="caption">
											<h3 style="text-align:center;margin-top: 0px !important;"><a href="#" style="color:#ffffff !important;">আইনজীবী</a></h3>
										</div>
									</div>
									<div class="text-box" style="padding-left:0px !important;"> <a href="#" class="btn-time" style="background-color:#f7a51e !important;">000 জন আইনজীবী</a>
										<h4 style="text-align:center;margin-top: 0px !important;padding-left:0px !important;"><a href="lawyersearch.html">আইনজীবী তালিকা</a></h4>
									</div>
								</div>
							</div>
						</aside>
					</div>



				</div>
    @endsection
