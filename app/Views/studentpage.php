<body>
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="button_su">
                                <span class="su_button_circle">
                                </span>
                                <button type="button" class="hrbtns contractbtn addbttn" onclick="showModal('<?= base_url() ?>addstu','Add Students')"> <span class="button_text_container">
                                        <i class="fa fa-plus"></i> ADD Students
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="demo-html mt-0">
                                <table class="example display dataTable display responsive nowrap tblalign table borderless" style="width: 100%" id="example" aria-describedby="example_info">
                                    <thead class="theadrow">
                                        <tr>
                                            <th>S.No</th>
                                            <th>
                                                Name
                                            </th>
                                            <th>
                                                Mobile Number
                                            </th>
                                            <th>
                                                Email
                                            </th>
                                            <th>
                                                Gender
                                            </th>
                                            <th>
                                                Department
                                            </th>
                                            <th>
                                                Status
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="appenddata">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    function getStudentData() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url('student/getStudentData') ?>',
            dataType: 'json',
            success: function (response) {
                $('#appenddata').html(response);
            },

        });
    }

    getStudentData();
</script>