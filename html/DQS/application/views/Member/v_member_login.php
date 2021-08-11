<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
    function login() { //login admin
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url() . 'Member/Member_login/login' ?>',
            data: {
                mem_username: $('#mem_username').val(),
                mem_password: $('#mem_password').val()
            },
            success: function(res) {
                console.log('success')
                console.log(res)
                if (res == true) {
                    setTimeout(function() {
                        window.location.href =
                            '<?php echo site_url() . 'Member/Member_login/member_home' ?>'
                    }, 500)
                } //if
                else {
                    console.log('fail')
                    alert('รหัสผ่านผิด กรุณากรอกใหม่อีกครั้ง')
                    console.log(res)

                } //else
            },
            error: function(res) {
                console.log('fail')
                console.log(res)
            }
        });
    } //end login admin
    </script>
</head>

<body>
    <!-- Login -->
    <div style="margin-left:25%">
        <div class="col-lg-8 col-md-7">
            <<div class="card card-nav-tabs">
  <div class="card-header card-header-warning">
                    <div class="text-center mb-4">
                        <div class="card">
                        <div class="card-body">
                        <h3>เข้าสู่ระบบ</h3>
                    </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="input-group input-group-merge input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"></span>
                            </div>
                            <!-- Insert username -->
                            <input class="form-control" id="mem_username" placeholder="อีเมล" type="text" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group input-group-merge input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"></span>
                            </div>
                            <!-- Insert password -->
                            <input class="form-control" id="mem_password" placeholder="รหัสผ่าน" type="password" required>
                        </div>
                    </div>
                    <div class="text-center">
                        <!-- Button login -->
                        <button type="submit" onclick='  '>ลืมรหัสผ่าน?</button>
                    </div>                   
                    <div class="text-center">
                        <!-- Button login -->
                        <button type="submit" class="btn btn-primary my-4" onclick='login()'>เข้าสู่ระบบ</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!------------------------------------------------------------------------------------------------------------------>
</body>

</html>
<body>
