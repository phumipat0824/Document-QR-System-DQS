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
                            <form method="POST" name="form" action="<?php echo site_url() . '/Member/Member_login/check_email'; ?>">
                                <input type="email" class="form-control" id="mem_email" name="mem_email" placeholder="อีเมล"><br>
                                <input type="button" id="send_pass" style="background-color: #100575" name="reset_password" class="btn btn-primary " value="ส่งอีเมลกู้คืนรหัสผ่าน"><br><br>
                            </form>

                        </div>
                        <div class="col-2"></div>

                    </div>

                    <div>

                        <!-- Modal send password   -->
                        <!-- <div class="modal fade" id="send_pass_modal" tabindex="-1" role="dialog" aria-labelledby="SendPassModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">ส่งอีเมลกู้คืนรหัสผ่าน</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>                                  
                                    </div>
                                     
                                        <div class="modal-body">
                                        ส่งอีเมลกู้คืนรหัสผ่านไปทาง
                                        </div>
                                        <div class="modal-footer">
                                        <button type="submit" id="btn-ok" class="btn btn-primary">ตกลง</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4"></div>
</div>
</div>
</div>
</div>
<!-- <script>
        
        $(document).ready(function() {
            $('form #send_pass').click(function(e) {
                let $form = $(this).closest('form');
                var $mem_email = $('#mem_username').val();
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false,
                })

                swalWithBootstrapButtons.fire({  
                    icon: 'success',
                    title: 'ส่งอีเมลกู้คืนทาง Email',          
                    confirmButtonText: 'ตกลง'
                }).then((result) => {
                    document.getElementById('btn-ok').type = 'submit';
                    $form.submit();
                });
            });
        });

        
    </script> -->
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