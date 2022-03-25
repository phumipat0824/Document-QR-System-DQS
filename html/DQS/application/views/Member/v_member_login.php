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

<div class="row" style="padding-top: 60px ;margin: 50px;" ;>
    <div class="col-lg-4 col-md-4">
    </div>
    <div class="col-lg-4 col-md-4">
        <div class="card" style="border-radius: 20px;">
            <div class="text-center mb-4">
                <div class="card-header card-header-warning" style="border-radius: 10px;">
                    <h1 style="color:#fff; font-family:TH Sarabun New;">เข้าสู่ระบบ</h1>
                </div>
                <form method="POST" action="<?php echo site_url() . '/Member/Member_login/login'; ?>">
                    <div class="card-body " style="padding-top:30px">
                        <div class="form-group">
                            <div class="input-group input-group-merge input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"></span>
                                </div>


                                <!-- Insert username -->

                                <input id="mem_username" name="mem_username"style="height: 55px;margin-top:30px;margin-right:30px" class="form-control" placeholder="ชื่อผู้ใช้/อีเมล" type="text"
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
                                <input id="mem_password" name="mem_password"style="height: 55px;margin-top:10px;margin-right:30px" class="form-control" placeholder="รหัสผ่าน" type="password"
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
                            <button type="submit" class="btn btn-primary" id="btn_login"
                                style="background-color: #100575 ;  font-family:TH Sarabun New; font-size: 30px">
                                เข้าสู่ระบบ</button>
                        </div><br>
                        <div class="text-center" style="padding-top: 20px margin-bottom: 1rem">
                            <!-- Button login -->
                            <a href="<?php echo base_url() . 'Member/Member_login/show_forget_password' ?>"
                                style="font-family:TH Sarabun New;font-size: 30px">ลืมรหัสผ่าน?</a>
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
    width: 300px;
    height: 60px;
}

input,
input::-webkit-input-placeholder {
    font-size: 20px;
    line-height: 3;
}
</style>
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 50%;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 30%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>