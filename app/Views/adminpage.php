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
                                <button type="button" class="hrbtns contractbtn addbttn" onclick="showModal('<?= base_url() ?>adddept','Add Degree and Department')"> <span class="button_text_container">
                                        <i class="fa fa-plus"></i> ADD Degree & Department
                                    </span></button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            List of the Students should be fetched below:
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
                                                Department
                                            </th>
                                            <th>
                                                Status
                                            </th>
                                            <th>
                                                option
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
     function getStudentDataAdmin() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url('Admin/getStudentDataAdmin') ?>',
            dataType: 'json',
            success: function (response) {
                $('#appenddata').html(response);
            },

        });
    }

    getStudentDataAdmin();
    function status(id,status){
        $.ajax({
            type: 'POST',
            url: '<?= base_url() ?>Admin/upStudentStatus/' +id +'/'+status,
            dataType: 'json',
            success: function (response) {
                toastr.success('status update','success');
                getStudentDataAdmin();
            },

        });
        
    }
</script>