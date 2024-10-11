<form id="addform">
    <div class="row">
        <div class="col-md-6">
            <div class="purchasegrp">
                <label class="purchaseinfo"><span class="aster">* </span>Name</label>
                <input type="text" class="form-control purchaseselects" name="name" placeholder="Enter Name">
            </div>
        </div>

        <div class="col-md-6">
            <div class="purchasegrp">
                <label class="purchaseinfo"><span class="aster">* </span>Mobile Number</label>
                <input type="number" class="form-control purchaseselects" name="mobile_number" placeholder="Enter Mob.Num.">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="purchasegrp">
                <label class="purchaseinfo"><span class="aster">* </span>Email</label>
                <input type="text" class="form-control purchaseselects" name="email" placeholder="Enter Email">
            </div>
        </div>
        <div class="col-md-6">
            <div class="purchasegrp">
                <label for="" class="d-block">Gender</label>
                <input type="radio" name="gender" value="Male">
                <label class="purchaseinfo" >Male</label>
                <input type="radio" name="gender" value="Female">
                <label class="purchaseinfo">Female</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label class="purchaseinfo mt-2">Degree and Department</label>
            <div class="purchasegrps">
                <div class=" dropdown-with-icon dropdownalignment">
                    <select class="selectpicker form-control " title="Select Degree & Dept" id="dept" name="dept">
                    </select>
                </div>
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
       function showDropDown() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url('student/showDropDown') ?>',
            dataType: 'json',
            success: function (response) {
                $('#dept').html("");
                $('#dept').html('<option selected value="">Degree & Department</option>');
                $('#dept').append(response);
                // console.log(response)

            },

        });
        }
        showDropDown()
</script>
<script>
    $('#addform').formValidation({
        framework: 'bootstrap',
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'Enter name'
                    },
                },
            },
            mobile_number: {
                validators: {
                    notEmpty: {
                        message: 'Enter mobile number'
                    },
                },
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Enter email'
                    },
                },
            },
            gender: {
                validators: {
                    notEmpty: {
                        message: 'Enter gender'
                    },
                },
            },
            dept: {
                validators: {
                    notEmpty: {
                        message: 'Enter dept'
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
                url: '<?=base_url()?>student/addStudentData',
                data: dataForm,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function (result) {
                    if (result == 1) {
                        $('#modal_md').modal('hide');
                        toastr.success('Student Details add successfully','success');
                        getStudentData();
                    } else {
                        alert('Already exist');
                    }
                }
            });
        });
</script>