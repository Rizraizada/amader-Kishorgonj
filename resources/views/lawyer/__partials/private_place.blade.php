            <div class="col-md-12 mt-4">
              <h4 class="mb-4 mt-4" style="border-bottom: 1px solid #1b8af3; margin-bottom: 20px; font-size: 21px;">
                <span style="display: inline-block; transition: background-color 0.3s;">
                    <div style="background-color: #1b8af3; padding: 10px; color: white;">
                      প্রাইভেট চেম্বারের স্থান:
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
                      <table id="private_place_table" class="table table-bordered">
                        <thead>
                          <tr>
                            <th style="width: 17%; text-align: center; vertical-align: middle; font-size: 14px;">বিভাগ</th>
                            <th style="width: 17%; text-align: center; vertical-align: middle; font-size: 14px;">জেলা</th>
                            <th style="width: 17%; text-align: center; vertical-align: middle; font-size: 14px;">উপজেলা</th>
                            <th style="width: 17%; text-align: center; vertical-align: middle; font-size: 14px;">ইউনিয়ন</th>
                            <th style="width: 17%; text-align: center; vertical-align: middle; font-size: 14px;">পোস্ট অফিস</th>
                            <th style="width: 35%; text-align: center; vertical-align: middle; font-size: 14px;">ঠিকানার বিবরণ</th>
                            <th style="width: 35%; text-align: center; vertical-align: middle; font-size: 14px;">করণীয়</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr id="row_practicing_place">
                            <td>
                              <select name="division_id[]" class="form-control division_dropdown">
                                    <option value="">নির্বাচন করুন</option>
                                    @foreach ($divisions as $key => $val)
                                        <option value="{{ $key}}">{{ $val }}</option>
                                    @endforeach
                              </select>
                            </td>
                            <td>
                              <select name="district_id[]" class="form-control district_dropdown">
                                    <option value=""> </option>
                              </select>
                            </td>

                            <td>
                              <select name="thana_id[]"  class="form-control thana_dropdown">
                                <option value=""></option>
                              </select>
                            </td>

                            <td>
                              <select name="union_id[]"  class="form-control union_dropdown">
                                <option value=""></option>
                              </select>
                            </td>
                            <td style="width: 20%;">
                              <input type="text" name="post_id[]" class="form-control">
                            </td>
                            <td style="width: 25%;">
                              <input type="text" name="address[]" class="form-control">
                            </td>
                            <input type="hidden" name="type[]" value="3">
                            <td style="width: 25%; text-align: center; vertical-align: middle;">
                              <button type="button" class="btn btn-danger delete-button">
                                <i class="fas fa-trash"></i> Delete
                              </button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <button id="add_practicing_button" type="button" class="btn btn-success mt-3">
                        <i class="fas fa-plus"></i> Add More
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

    @push('custom-js')
          <script>
            // var educationRowCount = 1;

            // document.getElementById("add_practicing_button").addEventListener("click", function() {
            // var newRow = document.getElementById("row_practicing_place").cloneNode(true);
            // newRow.id = "row_" + educationRowCount;
            // var selects = newRow.getElementsByTagName("select");
            // console.log(selects);
            // for (var i = 0; i < selects.length; i++) {
            //     selects[i].name = selects[i].name.replace("[0]", "[" + educationRowCount + "]");
            //     selects[i].options.remove(0);
            //     console.log(selects[i]);
            // }
            // var inputs = newRow.getElementsByTagName("input");
            // for (var i = 0; i < inputs.length; i++) {
            //     inputs[i].name = inputs[i].name.replace("[0]", "[" + educationRowCount + "]");
            //     inputs[i].value = "";
            // }
            // var deleteButton = newRow.querySelector(".delete-button");
            // deleteButton.addEventListener("click", function() {
            //     deleteEducationRow(this);
            // });
            // document.querySelector("#private_place_table tbody").appendChild(newRow);
            // educationRowCount++;
            // });

            // function deleteEducationRow(button) {
            //     var row = button.closest("tr");
            //     row.parentNode.removeChild(row);
            // }
            $(function() {
                initial_tr = $('#private_place_table').find('tbody tr:last').html();
                $('#add_practicing_button').on('click', function(){
                    $('#private_place_table').find('tbody').append('<tr>'+initial_tr+'</tr>');
                });

                $('#private_place_table').on('click', '.delete-button', function(){
                    if($('.delete-button').length > 0) {
                        $(this).closest('tr').remove();
                    }
                });

                //console.log(initial_tr);
                choose = "নির্বাচন করুন";
                $('#private_place_table').on('change', '.division_dropdown', function(){
                    pr_tr = $(this).closest('tr');
                    division_id = pr_tr.find('.division_dropdown').val();
                    district_dropdown = pr_tr.find('.district_dropdown');
                    district_dropdown.empty();
                    if(division_id) {
                        $.get('/districts/'+division_id, function(data){
                            district_dropdown.append('<option value="">'+choose+'</option>');
                            data = JSON.parse(data);
                            $.each(data, function(key, value) {
                                district_dropdown.append('<option value="' + key + '">' + value + '</option>');
                            });
                        });
                    }
                });

                $('#private_place_table').on('change', '.district_dropdown',function(){
                    pr_tr = $(this).closest('tr');
                    district_id = pr_tr.find('.district_dropdown').val();
                    thana_dropdown = pr_tr.find('.thana_dropdown');
                    thana_dropdown.empty();
                    if(district_id) {
                        $.get('/thanas/'+district_id, function(data){
                            thana_dropdown.append('<option value="">'+choose+'</option>');
                            data = JSON.parse(data);
                            $.each(data, function(key, value) {
                                thana_dropdown.append('<option value="' + key + '">' + value + '</option>');
                            });
                        });
                    }
                });

                $('#private_place_table').on('change','.thana_dropdown', function(){
                    pr_tr = $(this).closest('tr');
                    thana_id = pr_tr.find('.thana_dropdown').val();
                    union_dropdown = pr_tr.find('.union_dropdown');
                    union_dropdown.empty();
                    if(thana_id) {
                        $.get('/unions/'+thana_id, function(data){
                            union_dropdown.append('<option value="">'+choose+'</option>');
                            //console.log(JSON.parse(data));
                            data = JSON.parse(data);
                            $.each(data, function(key, value) {
                                union_dropdown.append('<option value="' + key + '">' + value + '</option>');
                            });
                        });
                    }
                });
            });
        </script>
    @endpush
