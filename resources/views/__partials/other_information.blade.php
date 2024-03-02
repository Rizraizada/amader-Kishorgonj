            <div class="col-md-12">
                <!-- <h4 class="mb-4 mt-4" style="border-bottom: 1px solid #ccc; margin-bottom: 25px; font-size: 21px;">অন্যান্য তথ্য:</h4> -->
                <h4 class="mb-4 mt-4" style="border-bottom: 1px solid #1b8af3; margin-bottom: 20px; font-size: 21px;">
                    <span style="display: inline-block; transition: background-color 0.3s;">
                        <div style="background-color: #1b8af3; padding: 10px; color: white;">
                            অন্যান্য তথ্য
                        </div>
                    </span>
                </h4>
                <div class="card mb-5 mt-4">
                    <div class="card-header">
                        <!-- <h4 class="mb-0">Vehicle Information :</h4> -->
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <label for="name" class="label-with-star">জরুরী যোগাযোগের মোবাইল নং(১১ডিজিট) <span
                                        class="star text-danger"> *</span></label>
                                <input name="emergency_contact_no" type="text" class="form-control" placeholder=""
                                    value="{{ old('emergency_contact_no') }}" required id="emergency_contact_no">
                                @error('emergency_contact_no')
                                    <span class="text text-danger">{{ $errors->first('emergency_contact_no') }}</span>
                                @enderror
                            </div>


                            <div class="col-md-6 col-sm-6">
                                <label for="name" class="label-with-star">আপনার ছবি আপলোড করুন (ছবি সাইজ ১৫০x১৫০px এবং .jpg, .png ) <span class="star text-danger">
                                        *</span></label>

                                <div class="upload-box">

                                    <div class="hold">
                                        <span class="btn-file"> Browse File
                                            <input name="photo" type="file" id="photo" required>
                                        </span>
                                    </div>
                                    @error('photo')
                                        <span class="text text-danger">{{ $errors->first('photo') }}</span>
                                    @enderror
                                    <p style="margin-top: 10px; font-size: 14px;">আপনার ছবি আপলোড করুন. ফাইল সাইজ: 2 MB.
                                    </p>
                                    <img id="imgFile" alt="img"
                                        src="{{ asset('/assets/images/image-placeholder.png') }}"
                                        style="max-width: 150px; height: 150px; border-radius: 25px;" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @push('custom-js')
                <script>
                    $('#imgFile').hide();
                    $('#photo').change(function() {
                        var url = window.URL.createObjectURL(this.files[0]);
                        $('#imgFile').attr('src', url).show();
                    });
                </script>
            @endpush
