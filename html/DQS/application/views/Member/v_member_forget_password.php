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
                        <div class="col-2"></div>

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
<script>
    $(document).ready(function() {
        $('form #btn-ok').click(function(e) {
            let $form = $(this).closest('form');
            $.ajax({
                type: "POST",
                url: "../../Member/Member_login/check_email",
                data: {
                    mem_email: $('#mem_email').val()
                },
                success: function(res) {
                    if (res == true) {
                        Swal.fire({
                            title: 'กรุณาใส่ชื่อและนามสกุล',
                            html: ` <input type="hidden" id="mem_email" name="mem_email" class="swal2-input" placeholder="ชื่อ" value='` + mem_email.value + `'>
                                <input type="text" id="mem_firstname" name="mem_firstname" class="swal2-input" placeholder="ชื่อ">
                                <input type="text" id="mem_lastname" name="mem_lastname" class="swal2-input" placeholder="นามสกุล">`,
                            confirmButtonText: 'ยืนยัน',
                            focusConfirm: false,
                            preConfirm: () => {
                                const mem_email = Swal.getPopup().querySelector('#mem_email').value
                                const mem_firstname = Swal.getPopup().querySelector('#mem_firstname').value
                                const mem_lastname = Swal.getPopup().querySelector('#mem_lastname').value
                                if (!mem_firstname || !mem_lastname) {
                                    Swal.showValidationMessage(`โปรดใส่ชื่อ และ นามสกุล`)
                                }
                                return {
                                    mem_firstname: mem_firstname,
                                    mem_lastname: mem_firstname,
                                    mem_email: mem_email
                                }
                            }
                        }).then((result) => {
                            $.ajax({
                                type: "POST",
                                url: "../../Member/Member_login/check_name",
                                data: {
                                    mem_firstname: $('#mem_firstname').val(),
                                    mem_lastname: $('#mem_lastname').val(),
                                    mem_email: $('#mem_email').val()
                                },
                                success: function(res) {
                                    if (res == true) {
                                        setTimeout(function() {
                                            document.getElementById('btn-ok').type = 'submit';
                                            $form.submit();
                                        }, 1800)

                                        Swal.fire({
                                            icon: 'success',
                                            title: 'ยืนยันตัวตนสำเร็จ',
                                            text: 'กำลังไปหน้ารีเซ็ตรหัสผ่าน'
                                        })
                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'ขออภัย...',
                                            text: 'ชื่อกับนามสกุลไม่ตรงกับฐานข้อมูล'
                                        })
                                    }
                                }
                            });
                        })

                    } else if (res == false) {
                        Swal.fire({
                            icon: 'error',
                            title: 'ขออภัย...',
                            text: 'ไม่เจออีเมลนี้ในระบบ'
                        })
                    }
                }

            });
        });
    });
</script>