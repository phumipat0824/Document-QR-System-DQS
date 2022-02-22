<div class="content">
    <div class="container-fluid" style="padding-top: 100px ;margin: auto;">
        <div class="row gx-5">
            <div class="col-lg-4 col-md-4"></div>
            <div class=" col-lg-4 col-md-4">
                <div class="card">
                    <div class="row justify-content-md-center">
                        <div class="col col-lg-2">

                        </div>
                        <div class="col-md-8 justify-content-md-center">
                            <div class="card-header card-header-warning ">
                                <h2 class="text-center">กู้คืนรหัสผ่าน</h2>
                            </div>
                        </div>
                        <div class="col col-lg-2">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2 "></div>
                        <div class="col-8 " style="text-align: center">
                            <br>
                            <form action="<?php echo site_url() . "Member/Member_login/send_mail" ?>" method="post">
                                <input type="email" class="form-control" id="email" name="email" placeholder="อีเมล"><br>
                                <input type="submit" id="btn-ok" style="background-color: #100575" name="reset_password" class="btn btn-primary" value="ส่งอีเมลกู้คืนรหัสผ่าน">
                            </form>

                        </div>
                    </div>
                    <div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

<script>
function check_email_send_pass(){
    let $form = $(this).closest('form');
            $.ajax({
                type: "POST",
                url: "../../Member/Member_login/check_email",
                data: {
                    mem_email: $('#mem_email').val()

                },
                success: function(res) {

                    if (res == true) {
                        swalWithBootstrapButtons.fire({
                            icon: 'success',
                            title: 'ส่งอีเมลกู้คืนทาง Email',
                            confirmButtonText: 'ตกลง'
                        }).then((result) => {
                            document.getElementById('btn-ok').type = 'submit';
                            $form.submit();
                        });

                    } else if (res == false) {
                        if (data == 0) {
                            console.log('success');
                            document.getElementById('send_pass').type = 'submit';
                            document.getElementById('form_id').submit();
                        } else if (data == 1) {
                            console.log('error');
                            Swal.fire({
                                icon: 'error',
                                title: 'อีเมลถูกใช้แล้ว',
                                text: 'กรุณากรอกอีเมลใหม่',
                                confirmButtonText: 'ตกลง'
                            })
                        }
                    }
                }

            });
}
</script>