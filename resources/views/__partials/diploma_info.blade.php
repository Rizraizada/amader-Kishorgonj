            <div class="col-md-12 mt-4">
              <h4 class="mb-4 mt-4" style="border-bottom: 1px solid #1b8af3; margin-bottom: 20px; font-size: 21px;">
                <span style="display: inline-block; transition: background-color 0.3s;">
                    <div style="background-color: #1b8af3; padding: 10px; color: white;">
                      ডিপ্লোমা ডিগ্রির তথ্য
                     </div>
                </span>
            </h4>
              <div class="card mb-5">
                <div class="card-header">
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <table id="diploma_table" class="table table-bordered">
                        <thead>
                          <tr>
                            <th style="width: 40%; text-align: center; vertical-align: middle;">ডিপ্লোমা ডিগ্রির নাম</th>
                            <th style="width: 40%; text-align: center; vertical-align: middle;">প্রতিষ্ঠানের নাম</th>
                            <th style="width: 40%; text-align: center; vertical-align: middle;">শুরুর তারিখ</th>
                            <th style="width: 40%; text-align: center; vertical-align: middle;">শেষ তারিখ</th>
                            <th style="width: 10%; text-align: center; vertical-align: middle;">করণীয়</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr id="row_0_tr">
                            <td>
                              <input type="text" name="degree_name[]"  class="form-control" placeholder="">
                            </td>
                            <td>
                              <input type="text" name="diploma_institute[]"  class="form-control" placeholder="">
                            </td>
                            <td>
                              <input type="date" name="dip_start_date[]"  class="form-control" placeholder="">
                            </td>
                            <td>
                              <input type="date" name="dip_end_date[]"  class="form-control" placeholder="">
                            </td>
                            <td style="width: 25%; text-align: center; vertical-align: middle;">
                              <button type="button" class="btn btn-danger delete-button" onclick="deleteEducationRow(this)">
                                <i class="fas fa-trash"></i> Delete
                              </button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <button id="add_diploma_button" type="button" class="btn btn-success mt-3">
                        <i class="fas fa-plus"></i> Add More
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

    @push('custom-js')
        <script>
            var diplomaRowCount = 1;

            document.getElementById("add_diploma_button").addEventListener("click", function() {
            var newRow = document.getElementById("row_0_tr").cloneNode(true);
            newRow.id = "row_" + diplomaRowCount;
            var inputs = newRow.getElementsByTagName("input");
            for (var i = 0; i < inputs.length; i++) {
                inputs[i].name = inputs[i].name.replace("[0]", "[" + diplomaRowCount + "]");
                inputs[i].value = "";
            }
            var deleteButton = newRow.querySelector(".delete-button");
            deleteButton.addEventListener("click", function() {
                deletediplomaRow(this);
            });
            document.querySelector("#diploma_table tbody").appendChild(newRow);
            diplomaRowCount++;
            });

            function deletediplomaRow(button) {
                var row = button.closest("tr");
                row.parentNode.removeChild(row);
            }
        </script>
    @endpush
