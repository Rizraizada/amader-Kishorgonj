            <div class="col-md-12 mt-4">
              <!-- <h4 class="mb-4 mt-4" style="border-bottom: 1px solid #ccc; margin-bottom: 25px; font-size: 21px;">শিক্ষাগত যোগ্যতা:<h4> -->
                <h4 class="mb-4 mt-4" style="border-bottom: 1px solid #1b8af3; margin-bottom: 20px; font-size: 21px;">
                  <span style="display: inline-block; transition: background-color 0.3s;">
                      <div style="background-color: #1b8af3; padding: 10px; color: white;">
                        শিক্ষাগত যোগ্যতা
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
                      <table id="education_table" class="table table-bordered">
                        <thead>
                          <tr>
                            <th style="width: 27%; text-align: center; vertical-align: middle; font-size: 14px;">পরীক্ষার নাম</th>
                            <!-- <th style="width: 20%; text-align: center; vertical-align: middle;">School</th> -->
                            <th style="width: 27%; text-align: center; vertical-align: middle; font-size: 14px;">প্রতিষ্ঠানের নাম</th>
                            <th style="width: 27%; text-align: center; vertical-align: middle; font-size: 14px;">বোর্ড</th>
                            <th style="width: 10%; text-align: center; vertical-align: middle; font-size: 14px;">ফলাফল</th>
                            <th style="width: 10%; text-align: center; vertical-align: middle; font-size: 14px;">করণীয়</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr id="row_0">
                            <td>
                              <select name="exam_name[]" class="form-control">
                                @foreach ($exams as $key => $val)
                                        <option value="{{ $key}}">{{ $val }}</option>
                                    @endforeach
                              </select>
                            </td>
                            <td>
                                <input type="text" name="education_institute[]" placeholder="">
                            </td>

                            <td>
                              <select name="board[]" class="form-control">
                               @foreach ($boards as $key => $val)
                                        <option value="{{ $key}}">{{ $val }}</option>
                                    @endforeach
                              </select>
                                <!-- Add more board options here -->
                              </select>
                            </td>
                            <td style="width: 25%;">
                              <input type="number" name="result[]" pattern="[0-9]+" class="form-control">
                            </td>
                            <td style="width: 25%; text-align: center; vertical-align: middle;">
                              <button type="button" class="btn btn-danger delete-button" onclick="deleteEducationRow(this)">
                                <i class="fas fa-trash"></i> Delete
                              </button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <button id="add_education_button" type="button" class="btn btn-success mt-3">
                        <i class="fas fa-plus"></i> Add More
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

    @push('custom-js')
          <script>
            var educationRowCount = 1;

            document.getElementById("add_education_button").addEventListener("click", function() {
            var newRow = document.getElementById("row_0").cloneNode(true);
            newRow.id = "row_" + educationRowCount;
            var selects = newRow.getElementsByTagName("select");
            for (var i = 0; i < selects.length; i++) {
                selects[i].name = selects[i].name.replace("[0]", "[" + educationRowCount + "]");
            }
            var inputs = newRow.getElementsByTagName("input");
            for (var i = 0; i < inputs.length; i++) {
                inputs[i].name = inputs[i].name.replace("[0]", "[" + educationRowCount + "]");
                inputs[i].value = "";
            }
            var deleteButton = newRow.querySelector(".delete-button");
            deleteButton.addEventListener("click", function() {
                deleteEducationRow(this);
            });
            document.querySelector("#education_table tbody").appendChild(newRow);
            educationRowCount++;
            });

            function deleteEducationRow(button) {
                var row = button.closest("tr");
                row.parentNode.removeChild(row);
            }
        </script>
    @endpush
