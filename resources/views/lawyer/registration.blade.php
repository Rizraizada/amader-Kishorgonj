@extends('layouts.layout')
@section('content')
    <section class="account-option">
        <div class="container" style="text-align: center;">
            <div class="inner-box">
                <div class="text-box" style="position: relative;">
                    <h4 style="display: inline-block; font-size: 24px;">আইনজীবী রেজিস্ট্রেশন ফর্ম</h4>
                    <a href="/lawyer"   class="btn-style-1"></i>আইনজীবীর
                        তালিকা দেখতে ক্লিক করুন</a>
                </div>
            </div>
        </div>
        </div>
    </section>
    <section class="resum-form padd-tb">
        <div class="container">

            <h4 class="mandatory-fields" style="text-align: right;">
                ষ্টার <span class="star text-danger">(*)</span> চিহ্নিত ফিল্ড গুলো অবশ্যই পূরণ করতে হবে।
            </h4>
            {{-- dump($errors) --}}
            <form action="/lawyer/registration" method="POST" enctype="multipart/form-data" id="lawyer-form" data-parsley-validate="">
                @csrf
                <h4 class="mb-4 mt-4" style="border-bottom: 1px solid #1b8af3; margin-bottom: 20px; font-size: 21px;">
                    <span style="display: inline-block; transition: background-color 0.3s;">
                        <div style="background-color: #1b8af3; padding: 10px; color: white;">
                            প্রাথমিক তথ্য
                        </div>
                    </span>
                </h4>
                <div class="row">
                    @include('__partials.general_info')
                    @include('__partials.current_address')
                    @include('lawyer.__partials.info')
                    @include('lawyer.__partials.private_place')
                    @include('__partials.education')
                    @include('__partials.training')
                    @include('__partials.address')
                    @include('__partials.other_information')

                    <!-- ... Add more card sections as needed -->
                    <input type="hidden" name="profession_type" value="3"><!-- profession -->
                    <div class="col-md-12">
                        <div class="btn-col">
                            <input type="submit" value="submit">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@push('custom-js')
    <script type="text/javascript">
        $(function () {
            $("form").submit(function (event) {
                event.preventDefault();

                var form = $('#lawyer-form');
                var url = form.attr('data-action');

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: new FormData(this),//form.serialize(),
                    dataType: 'json',
                    processData: false,
                    contentType:false
                })
                .success(function(data){
                    if(data.status == 'success'){
                        $('.form-success').removeClass('hide');
                        $('.form-error').addClass('hide');
                        @php
                            session(['status' =>'success', 'message'=>'Registration successful']);
                        @endphp
                        window.location.assign('/lawyer');
                    }
                    else {
                        $('.form-error').removeClass('hide');
                        $('.form-success').addClass('hide');

                        var dataResponse = data.errors;
                        var objectKeys = Object.keys(dataResponse);
                        if(objectKeys.length > 0) {
                        objectKeys.forEach(function(key, index) {
                                var fieldName = key;
                                var fieldError = dataResponse[fieldName][0];
                                //console.log(fieldName + ' => ' + dataResponse[fieldName][0]);
                                var element = form.find('#' + fieldName);
                                element.addClass('parsley-error');
                                //console.log({element});
                                parselyId = element.data('parsley-id');
                                //console.log(parselyId);
                                modifiedElement = '<ul class="parsley-errors-list filled" id="parsley-id-' + parselyId+'"        aria-hidden="false">\
                                        <li class="parsley-required">' + fieldError + '</li>\
                                    </ul>';
                                element.closest('div').find('.parsley-errors-list').remove();
                                element.closest('div').append(modifiedElement);
                            });
                        }
                    }
                })
                .error(function(data){
                });
            });
        });
        </script>
@endpush
