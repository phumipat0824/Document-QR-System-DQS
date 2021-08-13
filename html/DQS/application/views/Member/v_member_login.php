<!-- Login -->
    <div class= "row" style="padding-top: 150px ;margin: auto;";>
    <div class="col-lg-4 col-md-4">
    </div>
        <div class="col-lg-4 col-md-4" style= "padding-left: 100px ">
        <div class="card">                      
                    <div class="text-center mb-4">
                <div class="card-header card-header-warning">
                    <h3 style = "color:#000">เข้าสู่ระบบ</h3>
                    </div>
                <div class="card-body "style="padding-top:70px">                    
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
                            <input class="form-control" id="mem_password"name="mem_password" placeholder="รหัสผ่าน" type="password" required>
                        </div>
                    </div>
                    <br>
                    <div class="text-center" style="padding-top: 20px">
                        <!-- Button login -->
                        <a href ="#" >ลืมรหัสผ่าน?</a>
                    </div>
                        <div class="text-center"style="margin-top: -20px">       
                        <!-- Button login -->
                        <button type="submit" class="btn btn-primary my-4" id="btn_login" style ="background-color: #100575 ; width:200px "> เข้าสู่ระบบ</button>         
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!------------------------------------------------------------------------------------------------------------------>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js%22%3E">
</script>
<script type="text/javascript">
        $(document).ready(function(){
            $('#btn_login').click(function(e){
                var mem_username = $('#mem_username').val();
                var mem_password = $('#mem_password').val();
                ;

                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url().'Member/Member_login/login'?>",
                    data: {
                        'mem_username' : mem_username,
                        'mem_password' :mem_password
                    },
                    dataType: "JSON",
                    success: function(response) {
                        console.log("response " + response);
                        if (response == 1) {
                            swal(
                                'เข้าสู่ระบบสำเร็จ',
                                '',
                                'success'
                            ).then((result) => {
                                // console.log(result);
                                window.location.href = "<?php echo site_url().'/Member/Member_login/member_home'?>";
                            })
                        } //if
                        else {
                            swal(
                                'เข้าสู่ระบบไม่สำเร็จ',
                                'ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง',
                                'error'
                            )
                        } //else
                    },
                }); //ajax
            });
        }); //check_login
    </script>
