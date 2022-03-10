<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/all.min.css">
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
                                <h2 class="text-center" style=" font-family:TH Sarabun New sans-serif;">กู้คืนรหัสผ่าน</h2>
                            </div>
                        </div>
                        <div class="col col-lg-2">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2 "></div>
                        <div class="col-8 " style="text-align: center">
                            <br>
                            
                            <form action='<?php echo site_url() . "/Member/Member_login/send_mail" ?>' id="form_id" method="post">
                                <p align=left style="color:#000000; font-size: 26px; font-family:TH Sarabun New " for="InputEmail1">อีเมล : </p>                    
                                <input type="text" style="font-size: 26px; height: 55px; font-family:TH Sarabun New;" class="form-control" id="mem_email" name="email" placeholder="อีเมล" required><br>
                                <button onclick="check_email_send_pass()" class="btn btn-primary my-4" id='btn-ok' type="bottom" style="background-color: #100575; height: 55px;">ส่งอีเมลกู้คืนรหัสผ่าน</button><br><br>
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
<style>
    input {
    width: 600px;
    padding: 0px 15px;
}

input,
input::-webkit-input-placeholder {
    font-size: 25px;
    line-height: 4;
}
</style>

<script type="text/javascript">
    function check_email_send_pass() {

        let $form = $(this).closest('form');
        $.ajax({
            type: 'POST',
            dataType: "JSON",
            url: "<?php echo site_url() . '/Member/Member_login/check_email' ?>",
            data: {
                mem_email: $('#mem_email').val(),
            },


            success: function(data) {
                if (data == 0) {
                    console.log('error');
                    Swal.fire({
                        icon: 'error',
                        title: 'ไม่มีอีเมลนี้อยู่ในระบบ',
                        text: 'กรุณากรอกอีเมลใหม่',
                        showConfirmButton: false,
                       // confirmButtonText: 'ตกลง'
                      
                    })

                } else if (data == 1) {
                    const swalWithBootstrapButtons = Swal.mixin({
                        
                        customClass: {
                            confirmButton: 'btn btn-success',
                            
                        },
                        buttonsStyling: false,
                        showConfirmButton: false,
                    })

                    swalWithBootstrapButtons.fire({
                        icon: 'success',
                        title: 'ส่งอีเมลกู้คืนทาง Email',

                    }).then((result) => {
                        document.getElementById('btn-ok').type = 'submit';
                        $form.submit();
                    });
                    console.log('success');

                }
            },

        });
    }
    
</script>
