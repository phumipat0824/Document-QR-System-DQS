<!-- Login -->
<?php
    $mem_username = $mem_username ?? '';
    $mem_password = $mem_password ?? '';
    $error = $error ?? '';
    
    ?>
<div class="row" style="padding-top: 150px ;margin: auto;" ;>
    <div class="col-lg-4 col-md-4">
    </div>
    <div class="col-lg-4 col-md-4" style="padding-left: 100px ">
        <div class="card">
            <div class="text-center mb-4">
                <div class="card-header card-header-warning">
                    <h3 style="color:#000">เข้าสู่ระบบ</h3>
                </div>
                <form method="POST" action="<?php echo site_url() . '/Member/Member_login/login'; ?>">
                    <div class="card-body " style="padding-top:70px">
                        <div class="form-group mb-3">
                            <div class="input-group input-group-merge input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"></span>
                                </div>
                                <!-- Insert username -->

                                <input class="form-control" id="mem_username" name="mem_username" placeholder="ชื่อผู้ใช้/อีเมล" type="text" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-merge input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"></span>
                                </div>
                                <!-- Insert password -->
                                <input class="form-control" id="mem_password" name="mem_password" placeholder="รหัสผ่าน" type="password" required>
                            </div>
                        </div>
                        <center>
                            <!-- แสดง Username หรือ Password ไม่ถูกต้อง -->
                            <p id="error" class="py-2 text-danger"> <?php echo $error; ?> </p>
                        </center>
                        <br>
                        <div class="text-center" style="padding-top: 20px margin-bottom: 1rem">
                            <!-- Button login -->
                            <a href="<?php echo base_url() . 'Member/Member_login/show_forget_password' ?>">ลืมรหัสผ่าน?</a>
                        </div><br>
                        <div class="text-center" style="margin-top: -20px">
                            <!-- Button login -->
                            <button type="submit" class="btn btn-primary my-4" id="btn_login" style="background-color: #100575 ; width:200px "> เข้าสู่ระบบ</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!------------------------------------------------------------------------------------------------------------------>
<!-- <script>
    $(document).ready(function(){
    $("form").submit(function(e){
        e.preventDefault();
        var mem_username = $('#mem_username').val();
        var  mem_password = $("#mem_password").val();
        // console.log(username,password);
        $.ajax({
            type: "POST",
            url: 'is_login',
            dataType: 'JSON',
            data: {
                mem_username: mem_username,
                mem_password: mem_password
            },
        success: function(data){
            console.log(data.isAuth);
            if(data.isAuth == "success"){
                $('.isLogin').removeClass('show');
                window.location.replace( BASE_URL + "/Member/Member_login");
            }else{
                $('.isLogin').addClass('show');
            }   
        },
        error: function(xhr, status, error){
            console.error(xhr);
        }
        });
        console.log("Submitted");
    });
});
</script> -->