                    <div class="col-md-12 mt-4 cur-address">
                        <h4 class="mb-4 mt-4"
                            style="border-bottom: 1px solid #1b8af3; margin-bottom: 20px; font-size: 21px;">
                            <span style="display: inline-block; transition: background-color 0.3s;">
                                <div style="background-color: #1b8af3; padding: 10px; color: white;">
                                    বর্তমান কর্মস্থল:
                                </div>
                            </span>
                        </h4>
                        <div class="card mb-5 mt-4">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="custom-dropdown">
                                            <label for="name" class="label-with-star">বিভাগ<span
                                                    class="star text-danger"> *</span></label>
                                            <select class="form-control division_dropdown"
                                                name="division_id[]" required>
                                                <option value="">নির্বাচন করুন</option>
                                                @foreach ($divisions as $key => $val)
                                                    <option value="{{ $key }}">{{ $val }}
                                                    </option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6">
                                        <div class="custom-dropdown">
                                            <label for="name" class="label-with-star">জেলা<span
                                                    class="star text-danger"> *</span></label>
                                            <select class="form-control district_dropdown"
                                                name="district_id[]" required>
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6">
                                        <div class="custom-dropdown">
                                            <label for="name" class="label-with-star">উপজেলা<span
                                                    class="star text-danger"> *</span></label>
                                            <select class="form-control thana_dropdown" name="thana_id[]" required>
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6">
                                        <div class="custom-dropdown">
                                            <label for="name" class="label-with-star">ইউনিয়ন<span
                                                    class="star text-danger"> *</span></label>
                                            <select class="form-control union_dropdown" name="union_id[]" required>
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-6 col-sm-7">
                                        <div class="custom-dropdown">
                                            <label for="name" class="label-with-star">পোস্ট অফিস<span
                                                    class="star text-danger"> *</span></label>
                                            <input type="text" class="form-control" name="post_id[]"
                                                required />
                                        </div>
                                    </div>


                                    <div class="col-md-6 col-sm-6">
                                        <label for="name" class="label-with-star">ঠিকানার বিবরণ<span
                                                class="star text-danger"> *</span></label>
                                        <textarea name="address[]" class="form-control" placeholder="" required></textarea>
                                    </div>
                                    <input type="hidden" name="type[]" value="2">
                                </div>
                            </div>
                        </div>
                    </div>

@push('custom-js')
    <script>
        $(function() {
            choose = "নির্বাচন করুন";
            $('.cur-address').on('change', '.division_dropdown', function() {
                pr_row = $(this).closest('.row');
                division_id = pr_row.find('.division_dropdown').val();
                district_dropdown = pr_row.find('.district_dropdown');
                district_dropdown.empty();
                if (division_id) {
                    $.get('/districts/' + division_id, function(data) {
                        district_dropdown.append('<option value="">' + choose + '</option>');
                        data = JSON.parse(data);
                        $.each(data, function(key, value) {
                            district_dropdown.append('<option value="' + key + '">' +
                                value + '</option>');
                        });
                    });
                }
            });

            $('.cur-address').on('change', '.district_dropdown',function() {
                pr_row = $(this).closest('.row');
                district_id = pr_row.find('.district_dropdown').val();
                thana_dropdown = pr_row.find('.thana_dropdown');
                thana_dropdown.empty();
                if (district_id) {
                    $.get('/thanas/' + district_id, function(data) {
                        thana_dropdown.append('<option value="">' + choose + '</option>');
                        data = JSON.parse(data);
                        $.each(data, function(key, value) {
                            thana_dropdown.append('<option value="' + key + '">' + value +
                                '</option>');
                        });
                    });
                }
            });

            $('.cur-address').on('change', '.thana_dropdown',function() {
                pr_row = $(this).closest('.row');
                thana_id = pr_row.find('.thana_dropdown').val();
                union_dropdown = pr_row.find('.union_dropdown');
                union_dropdown.empty();
                if (thana_id) {
                    $.get('/unions/' + thana_id, function(data) {
                        union_dropdown.append('<option value="">' + choose + '</option>');
                        data = JSON.parse(data);
                        $.each(data, function(key, value) {
                            union_dropdown.append('<option value="' + key + '">' + value +
                                '</option>');
                        });
                    });
                }
            });
        });
    </script>
@endpush
