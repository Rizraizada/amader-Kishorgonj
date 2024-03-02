<div class="col-md-12">
    <h4 class="mb-4 mt-4" style="border-bottom: 1px solid #1b8af3; margin-bottom: 20px; font-size: 21px;">
        <span style="display: inline-block; transition: background-color 0.3s;">
            <div style="background-color: #1b8af3; padding: 10px; color: white;">
                আইনজীবীর তথ্য:
            </div>
        </span>
    </h4>
    <div class="card mb-5 mt-4">
        <div class="card-header">
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <label for="name" class="label-with-star">মামলা পরিচালনার ক্ষেত্র <span class="star text-danger">
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
                    <label for="court" class="label-with-star">আদালত <span class="star text-danger">
                    *</span></label>
                        <select class="form-control" name="court" required>
                            @foreach ($courts as $key => $val)
                                <option value="{{ $key }}" @if($key == old('designation')) selected @endif>{{ $val }}</option>
                            @endforeach
                        </select>
                </div>

                <div class="col-md-6 col-sm-6">
                    <label for="bar_council_number" class="label-with-star">বার কাউন্সিল সনদের নম্বর <span class="star text-danger">
                            *</span></label>
                    <input type="text" name="bar_council_number" placeholder="" required value="{{ old('bar_council_number') }}">
                    @error('bar_council_number')
                        <span class="text text-danger">{{ $errors->first('bar_council_number') }}</span>
                    @enderror
                </div>

                <div class="col-md-6 col-sm-6">
                    <label for="name" class="label-with-star">কাজের অভিজ্ঞতা(বছর) <span class="star text-danger">
                            *</span></label>
                    <input name="experiences" class="form-control" placeholder="" value="{{ old('experiences') }}" required>
                    @error('experiences')
                        <span class="text text-danger">{{ $errors->first('experiences') }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>
