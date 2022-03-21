<!-- Login -->
<?php

/*
    * v_login
    * Display login
    * @input error, username, password
    * @output login
    * @author Ashirawat, Krisada
    * @Create Date 2564-08-05
*/
    $mem_username = $mem_username ?? '';
    $mem_password = $mem_password ?? '';
    $error = $error ?? '';
    
    ?>

<div class="row" style="padding-top: 150px ;margin: auto;" ;>
    <div class="col-lg-4 col-md-4">
    </div>
    <div class="col-lg-4 col-md-4" style="padding-left: 50px ">
        <div class="card" style="border-radius: 10px;">
            <div class="text-center mb-4">
                <div class="card-header card-header-warning" style="border-radius: 10px;">
                    <h style="color:#000; font-family:TH Sarabun New; font-size: 70px">เข้าสู่ระบบ</h>
                </div>
                <form method="POST" action="<?php echo site_url() . '/Member/Member_login/login'; ?>">
                    <div class="card-body " style="padding-top:100px">
                        <div class="form-group mb-3">
                            <div class="input-group input-group-merge input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"></span>
                                </div>


                                <!-- Insert username -->

                                <input id="mem_username" name="mem_username" placeholder="ชื่อผู้ใช้/อีเมล" type="text"
                                    required oninvalid="this.setCustomValidity('กรุณากรอกชื่อผู้ใช้งานหรืออีเมล')"
                                    oninput="this.setCustomValidity('')">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-merge input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"></span>
                                </div>
                                <!-- Insert password -->
                                <input id="mem_password" name="mem_password" placeholder="รหัสผ่าน" type="password"
                                    required oninvalid="this.setCustomValidity('กรุณากรอกรหัสผ่าน')"
                                    oninput="this.setCustomValidity('')">
                            </div>
                        </div>
                        <center>
                            <!-- แสดง Username หรือ Password ไม่ถูกต้อง -->
                            <p id="error" class="py-2 text-danger"> <?php echo $error; ?> </p>
                        </center>
                        <br>

                        <div class="text-center" style="margin-top: -20px">
                            <!-- Button login -->
                            <button type="submit" class="btn btn-primary my-10" id="btn_login"
                                style="background-color: #100575 ; width:400px; font-family:TH Sarabun New; font-size: 40px">
                                เข้าสู่ระบบ</button>
                        </div><br>
                        <div class="text-center" style="padding-top: 20px margin-bottom: 1rem">
                            <!-- Button login -->
                            <a href="<?php echo base_url() . 'Member/Member_login/show_forget_password' ?>"
                                style="font-family:TH Sarabun New;font-size: 40px">ลืมรหัสผ่าน?</a>
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


<script>
function login() { //login member
    $.ajax({
        type: 'POST',
        url: '<?php echo site_url() . 'Member/Member_login/login' ?>',
        data: {
            mem_username: mem_username,
            mem_password: mem_password

        },
        success: function(res) {
            console.log('success')
            console.log(res)
            if (res == true) {
                // setTimeout(function() {
                //     window.location.href =
                //         '<?php echo site_url() . 'Member/Member_login/v_member_home' ?>'
                // }, 500)
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
} //end login member
</script>
<style>
input {
    width: 600px;
    padding: 0px 15px;
    height: 70px;
}

input,
input::-webkit-input-placeholder {
    font-size: 30px;
    line-height: 3;
}
</style>

</html>