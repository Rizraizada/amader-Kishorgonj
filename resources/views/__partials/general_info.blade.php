<div class="col-md-12">
    <div class="card mb-5">
        <div class="card-header">
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <label for="name" class="label-with-star">নাম (বাংলায়) <span class="star text-danger">
                            *</span></label>
                    <input name="name_bn" type="text" class="form-control" placeholder="" required
                        value="{{ old('name_bn') }}" id="name_bn">
                    @error('name_bn')
                        <span class="text text-danger">{{ $errors->first('name_bn') }}</span>
                    @enderror
                </div>
                <div class="col-md-6 col-sm-6">
                    <label for="name" class="label-with-star">নাম (ইংরেজি) <span class="star text-danger">
                            *</span></label>
                    <input name="name_en" type="text" class="form-control" placeholder="" required
                        value="{{ old('name_en') }}" id="name_en">
                    @error('name_en')
                        <span class="text text-danger">{{ $errors->first('name_en') }}</span>
                    @enderror
                </div>
                <div class="col-md-6 col-sm-6">
                    <label for="name" class="label-with-star">পিতার নাম <span class="star text-danger">
                            *</span></label>
                    <input name="father_name" type="text" class="form-control" placeholder="" required
                        value="{{ old('father_name') }}" id="father_name">
                    @error('father_name')
                        <span class="text text-danger">{{ $errors->first('father_name') }}</span>
                    @enderror
                </div>
                <div class="col-md-6 col-sm-6">
                    <label for="name" class="label-with-star">মাতার নাম <span class="star text-danger">
                            *</span></label>
                    <input name="mother_name" type="text" class="form-control" placeholder="" required
                        value="{{ old('mother_name') }}" id="mother_name">
                    @error('mother_name')
                        <span class="text text-danger">{{ $errors->first('mother_name') }}</span>
                    @enderror
                </div>
                <div class="col-md-6 col-sm-6">
                    <label for="mobile_no" class="label-with-star">মোবাইল নং(১১ডিজিট) <span class="star text-danger">
                            *</span></label>
                    <input name="mobile_no" type="text" class="form-control" id="mobile_no" placeholder=""
                        required value="{{ old('mobile_no') }}">
                    @error('mobile_no')
                        <span class="text text-danger">{{ $errors->first('mobile_no') }}</span>
                    @enderror
                    <!-- <p style="font-size: 14px; margin: 30; margin-top: -18px;">Please enter your mobile number.</p> -->
                </div>

                <div class="col-md-6 col-sm-6">
                    <label for="nid" class="label-with-star">জাতীয় পরিচয় পত্র নং (১০ / ১৭ ডিজিট) <span class="star text-danger">
                            *</span></label>
                    <input name="nid" type="text" class="form-control" required value="{{ old('nid') }}" id="nid">

                    @error('nid')
                        <span class="text text-danger">{{ $errors->first('nid') }}</span>
                    @enderror
                </div>
                <div class="col-md-6 col-sm-6">
                    <label for="birth_date" class="label-with-star">জন্ম তারিখ <span class="star text-danger">
                            *</span></label>
                    <input name="birth_date" id="birth_date" type="date" class="form-control" placeholder="" required
                        value="{{ old('birth_date') }}">
                    @error('birth_date')
                        <span class="text text-danger">{{ $errors->first('birth_date') }}</span>
                    @enderror
                </div>
                <div class="col-md-6 col-sm-6">
                    <label for="religion" class="label-with-star">ধর্ম <span class="star text-danger"> *</span></label>
                    <div class="custom-dropdown">
                        <select name="religion" class="form-control" name="Religion Status" required id="religion">
                            @foreach ($religions as $key => $val)
                                <option value="{{ $key }}" @if($key == old('religion')) selected @endif }}>{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <label for="email" class="label-with-star">ইমেইল <span class="star text-danger"> *</span></label>
                    <input name="email" id="email" type="text" class="form-control" placeholder="" required
                        value="{{ old('email') }}" id="email">
                    @error('email')
                        <span class="text text-danger">{{ $errors->first('email') }}</span>
                    @enderror
                </div>
                <div class="col-md-6 col-sm-6">
                    <label for="marital_status" class="label-with-star">বৈবাহিক অবস্থা <span class="star text-danger">
                            *</span></label>
                    <div class="custom-dropdown">
                        <select class="form-control" name="marital_status" required id="marital_status">
                            @foreach ($marital_status as $key => $val)
                                <option value="{{ $key }}" @if($key == old('marital_status')) selected @endif>{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <label for="gender" class="label-with-star">জেন্ডার <span class="star text-danger">
                            *</span></label>
                    <div class="custom-dropdown">
                        <select class="form-control" name="gender" required id="gender">
                            @foreach ($genders as $key => $val)
                                <option value="{{ $key }}" @if($key == old('gender')) selected @endif>{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <label for="blood_group" class="label-with-star">ব্লাড গ্রুপ <span class="star text-danger">
                            *</span></label>
                    <div class="custom-dropdown">
                        <select class="form-control" name="blood_group" required id="blood_group">
                            @foreach ($blood_groups as $key => $val)
                                <option value="{{ $key }}" @if($key == old('blood_group')) selected @endif>{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
