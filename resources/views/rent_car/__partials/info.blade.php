            <div class="col-md-12 mt-4">
              <h4 class="mb-4 mt-4" style="border-bottom: 1px solid #1b8af3; margin-bottom: 20px; font-size: 21px;">
                <span style="display: inline-block; transition: background-color 0.3s;">
                    <div style="background-color: #1b8af3; padding: 10px; color: white;">
                     গাড়ীর তথ্য:
                     </div>
                </span>
            </h4>
              <div class="card mb-5">
                <div class="card-header">
                  <!-- <h4 class="mb-0">Education Qualification :</h4> -->
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <!-- <label for="education-qualification" class="label-with-star">Education Qualification <span class="star text-danger"> *</span></label> -->
                      <table id="car_type_table" class="table table-bordered">
                        <thead>
                          <tr>
                            <th style="width: 17%; text-align: center; vertical-align: middle; font-size: 14px;">গাড়ির ধরন <span class="star text-danger"> *</span></th>
                            <th style="width: 17%; text-align: center; vertical-align: middle; font-size: 14px;">ব্র্যান্ড <span class="star text-danger"> *</span></th>
                            <th style="width: 17%; text-align: center; vertical-align: middle; font-size: 14px;">সিট সংখ্যা <span class="star text-danger"> *</span></th>
                            <th style="width: 17%; text-align: center; vertical-align: middle; font-size: 14px;">মডেল <span class="star text-danger"> *</span></th>
                            <th style="width: 17%; text-align: center; vertical-align: middle; font-size: 14px;">রেজিস্ট্রেশন নম্বর <span class="star text-danger"> *</span></th>
                            <th style="width: 35%; text-align: center; vertical-align: middle; font-size: 14px;">ছবি <span class="star text-danger"> *</span></th>
                            <th style="width: 35%; text-align: center; vertical-align: middle; font-size: 14px;">করণীয়</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr id="car_type_tr">
                            <td>
                              <select name="car_type[]" class="form-control division_dropdown" required>
                                    <option value="">নির্বাচন করুন</option>
                                    @foreach ($car_types as $key => $val)
                                        <option value="{{ $key}}">{{ $val }}</option>
                                    @endforeach
                              </select>
                            </td>
                            <td>
                              <input type="text" name="car_brand[]" class="form-control" required>
                            </td>
                            <td>
                              <input type="text" name="seat_number[]" class="form-control" required>
                            </td>
                            <td>
                              <input type="text" name="car_model[]" class="form-control" required>
                            </td>
                            <td>
                              <input type="text" name="car_reg_number[]" class="form-control" required>
                            </td>
                            <td style="width: 20%;">
                              <input type="file" name="car_pic[]" class="form-control" required>
                            </td>
                            <td style="width: 25%; text-align: center; vertical-align: middle;">
                              <button type="button" class="btn btn-danger delete-button">
                                <i class="fas fa-trash"></i> Delete
                              </button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <button id="car_type_button" type="button" class="btn btn-success mt-3">
                        <i class="fas fa-plus"></i> Add More
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

    @push('custom-js')
          <script>
            $(function() {
                initial_tr = $('#car_type_table').find('tbody tr:last').html();
                $('#car_type_button').on('click', function(){
                    $('#car_type_table').find('tbody').append('<tr>'+initial_tr+'</tr>');
                });

                $('#car_type_table').on('click', '.delete-button', function(){
                    if($('.delete-button').length > 0) {
                        $(this).closest('tr').remove();
                    }
                });
            });
        </script>
    @endpush
