<form id="addform">
    <div class="row">
        <div class="col-md-12">
            <div class="purchasegrp">
                <label class="purchaseinfo"><span class="aster">* </span>Degree and Department</label>
                <input type="text" class="form-control purchaseselects" name="dept" placeholder="Sample: B.Tech. - ECE">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 blkftr">
            <div class="modal-footer taskfooter">
                <button type="submit" class="tasksave1">
                    SAVE
                </button>
            </div>
        </div>
    </div>
</form>
<script>

    $('#addform').formValidation({
        framework: 'bootstrap',
        fields: {
            dept: {
                validators: {
                    notEmpty: {
                        message: 'Enter dept name'
                    },
                },
            },
        },
    })
        .on('success.form.fv', function (e) {
            // Prevent form submission
            e.preventDefault();
            var form = document.querySelector('#addform');
            var dataForm = new FormData(form);
            $.ajax({
                type: 'POST',
                url: '<?= base_url() ?>Admin/addDebtdata',
                data: dataForm,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function (result) {
                    if (result == 1) {
                        $('#modal_md').modal('hide');
                        toastr.success(' Dept add successfully', 'success');
                        // getData();
                    } else {
                        alert('Already exist');
                    }
                }
            });
        });
</script>