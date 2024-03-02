@extends('layouts.layout')
    @section('content')
            <section class="account-option">
                <div class="container" style="text-align: center;">
                    <div class="inner-box">
                        <div class="text-box" style="position: relative;">
                            <h4 style="display: inline-block; font-size: 24px;">ডাক্তার অনুসন্ধান করুন!</h4>
                            <a href="/doctor/registration" class="btn-style-1"></i>ডাক্তার রেজিস্ট্রেশন করতে ক্লিক করুন</a>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <section class="candidates-search-bar">
            <div class="container">
                <form action="/doctor" id="doctorSearch" style="background-color: #c0c2c4;">
                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            <input type="text" id="name" placeholder="নাম লিখুন" name="name" value="{{ $name }}" required data-parsley-errors-messages-disabled>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <input type="text" id="mobile_no" placeholder="ফোন নম্বর লিখুন" name="mobile_no" value="{{ $mobile_no }}" required data-parsley-errors-messages-disabled>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <select class="form-control" name="designation[]" id="designation" required data-parsley-errors-messages-disabled>
                                <option value="">বিশেষজ্ঞতা নির্বাচন করুন </option>
                                @foreach ($expertise as $key => $value)
                                    <option value="{{ $key }}" @if($key == (current($designation))) selected @endif>
                                        {{ $value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2 col-sm-2 mt-sm">
                            <button type="submit" value="submit" id="searchButton"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <section class="recent-row padd-tb">
            <div class="container">
                @include('__partials.notification')
                <div class="row" id="myList">
                    @forelse ($primaryInfo as $row)
                        <div class="col-md-4"style="margin-bottom: 15px;">
                            <div class="job-box" style="width: 350px; height: 200px;">
                                <div class="box" style="padding: 20px;/* margin: 20px; */display: flex;/* width: 100%; */height: 80%;">
                                    <div class="thumb" style="flex: 1;/* margin-right: 25px; *//* margin-left: -35px; *//* margin-top: -1px; */">
                                    <a href="#"><img src="{{ asset('/uploads/images/doctor/'.$row->photo) }}" alt="img" style="max-width:100%; height: 100%; border-radius: 25px;"></a>
                                    </div>
                                    <div class="text-col" style="flex: 2;text-align: left;/* padding-left: 60px; */border-radius: 25px;padding-left: inherit;">
                                    <h4><a href="#/doctor/details/{{ $row->id}}" class="job-name" style="color: #ff6600;">{{ $row->name_bn }}</a></h4> <!-- Set color to orange (#ff6600) -->
                                    <p class="pt-4"><i class="fa fa-phone"></i> <a href="tel:{{ $row->mobile_no }}">{{ $row->mobile_no }}</a> <span class="job-phone"></span></p>
                                    <h4><p><i class="" style="color: #009900;"></i> <span class="job-consultant" style="color: #009900;">{{ isset($row->doctor->expertise) ? $expertise[$row->doctor->expertise] : '' }}</span></p></h4> <!-- Set color to green (#009900) -->
                                    <p><i class="fa fa-map-marker" style="color: #009900;"></i>
                                        <span class="job-location" style="color: #009900;font-size: 11px;">
                                        {{ Str::limit($row->doctor->clinic_name ?? '', 60, '...') }}
                                    </span></p> <!-- Set color to green (#009900) -->
                                    <p><i class="fa fa-clock"></i> <span class="job-experience">{{ $row->doctor->experiences ?? '5 Years' }}</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p style="text-align: center; margin-top: 20px;margin-bottom: 10px;">There is no data.</p>
                    @endforelse
                </div>
            </div>
            <div id="loadMore" style="text-align: center; margin-top: 20px;margin-bottom: 10px;">
                @if (!empty($primaryInfo))
                    {{ $primaryInfo->appends(request()->query()) }}
                @endif
            </div>
        </section>
    @endsection

@push('custom-js')
    <script>
        $(function () {
            $('#doctorSearch').parsley().subscribe('parsley:form:validate', function (formInstance) {
                // If any of these fields are valid
                if ($("input[name=name]").parsley().isValid() ||
                    $("input[name=mobile_no]").parsley().isValid() ||
                    $("input[name=designation]").parsley().isValid())
                {
                    // Remove the error message
                    $('.invalid-form-error-message').html('');

                    // Remove the required validation from all of them, so the form gets submitted
                    // We already validated each field, so one is filled.
                    // Also, destroy parsley's object
                    $("input[name=name]").removeAttr('required').parsley().destroy();
                    $("input[name=mobile_no]").removeAttr('required').parsley().destroy();
                    $("input[name=designation]").removeAttr('required').parsley().destroy();

                    return;
                }

                // If none is valid, add the validation to them all
                $("input[name=name]").attr('required', 'required').parsley();
                $("input[name=mobile_no]").attr('required', 'required').parsley();
                $("input[name=designation]").attr('required', 'required').parsley();

                // stop form submission
                formInstance.submitEvent.preventDefault();

                // and display a gentle message
                $('.invalid-form-error-message')
                    .html("You must correctly fill the fields of at least one of these three blocks!")
                    .addClass("filled");
                return;
            });
        });
    </script>
@endpush
{{--
    @push('custom-js')
        <script>
            $(function() {
                $('#searchButton').click(function(e){
                    e.preventDefault();

                    name = $('#name').val();
                    mobile_no = $('#mobile_no').val();
                    designation = $('#designation').val();

                    if(name.length > 5 || designation.length > 5 || mobile_no > 5) {
                        $('#searchForm').submit();
                    }
                    else {
                        alert('Please write something for search');
                    }
                });
            })
        </script>
    @endpush --}}

