<div class="col-md-12">
    <h4 class="mb-4 mt-4" style="border-bottom: 1px solid #1b8af3; margin-bottom: 20px; font-size: 21px;">
        <span style="display: inline-block; transition: background-color 0.3s;">
            <div style="background-color: #1b8af3; padding: 10px; color: white;">
                ডাক্তারের তথ্য:
            </div>
        </span>
    </h4>
    <div class="card mb-5 mt-4">
        <div class="card-header">
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <label for="name" class="label-with-star">বিশেষজ্ঞতা <span class="star text-danger">
                            *</span></label>
                    <div class="custom-dropdown">
                        <select class="form-control" name="expertise" required>
                            @foreach ($specializations as $key => $val)
                                <option value="{{ $key }}" @if($key == old('expertise')) selected @endif>{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <label for="name" class="label-with-star">পদবী <span class="star text-danger"> *</span></label>
                    <div class="custom-dropdown">
                        <select class="form-control" name="designation" required>
                            @foreach ($designations as $key => $val)
                                <option value="{{ $key }}" @if($key == old('designation')) selected @endif>{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <label for="name" class="label-with-star">হাসপাতাল/ক্লিনিকের নাম <span class="star text-danger">
                            *</span></label>
                    <input type="text" name="clinic_name" placeholder="" required value="{{ old('clinic_name') }}"
                        required>
                    @error('clinic_name')
                        <span class="text text-danger">{{ $errors->first('clinic_name') }}</span>
                    @enderror
                </div>

                <div class="col-md-6 col-sm-6">
                    <label for="name" class="label-with-star">বিএমডিসি নম্বর <span class="star text-danger">
                            *</span></label>
                    <input type="text" name="bmdc_number" placeholder="" required value="{{ old('bmdc_number') }}">
                    @error('bmdc_number')
                        <span class="text text-danger">{{ $errors->first('bmdc_number') }}</span>
                    @enderror
                </div>

                <div class="col-md-6 col-sm-6">
                    <label for="name" class="label-with-star">কাজের অভিজ্ঞতা(বছর) <span class="star text-danger">
                            *</span></label>
                    <textarea name="experiences" class="form-control" placeholder="" required>{{ old('experiences') }}</textarea>
                    @error('experiences')
                        <span class="text text-danger">{{ $errors->first('experiences') }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>
