+<!-- นางสาวรัชนีกร ป้อชุมภู
     Date : 23/9/2021 -->
<!-- แสดงแบบฟอร์มการสมัครสมาชิกของหน้าจอสมัครสมาชิก -->
<!-- นางสาวรัชนีกร ป้อชุมภู
     Date : 23/9/2021 -->
<!-- แสดงแบบฟอร์มการสมัครสมาชิกของหน้าจอสมัครสมาชิก -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/all.min.css">
<div class="content">
    <div class="container-fluid" style="padding-top: 100px ;margin: auto;">
        <div class="row gx-5">
            <div class="col-lg-2 col-md-2" style="padding-left: 100px ">
            </div>
            <div class="col-lg-8 col-md-8" style="padding-left: 100px ">
                <div class="card"  style = "border-radius: 30px;">
                    <div class="row gx-5">

                        <div class="col-1"></div>
                        <div class="col-10">
                            <div class="row justify-content-md-center">
                                <div class="col col-lg-1">

                                </div>
                                <div class="col-md-10 justify-content-md-center">
                                    <div class="card-header card-header-warning" style = "padding: 10px; border-radius: 10px;">
                                    
                                        <h2 class= "text-center"  style="color:#000000; font-family:TH sarabun new; font-size: 60px;">สมัครสมาชิก</h2>
                                        
                                    </div>
                                </div>
                                <div class="col col-lg-1">

                                </div>
                            </div>
                            <form action='<?php echo site_url() . 'Member/Member_register/insert_session' ?>' method="post" name='form'>
                            <!-- เลือกจังหวัดแบบ dropdown list -->
                                <div class="row gx-5">
                                    <div class="col"><br><br>
                                        <label style = "color: #000000;">จังหวัด</label>
                                        <label style = "color: #FF0000;">*</label>
                                        <select name="mem_province_id" id="mem_province_id" class="form-select" aria-label="Default select example" required>
                                            <option value="" selected>--------- เลือกจังหวัด ---- -----</option>
                                            <?php foreach ($arr_province as $value) { ?>
                                                <option value='<?php echo $value->pro_id ?>'><?php echo $value->pro_name ?></option>
                                            <?php } ?>
                                        </select><br>

                                </div>
                                <div class="col"><br><br>
                                        <label style = "color: #000000;">หน่วยงาน</label>
                                        <label style = "color: #FF0000;">*</label>
                                        <select name="mem_dep_id" id="mem_dep_id" class="form-select" aria-label="Default select example" required>
                                            <option value="" selected>--------- เลือกหน่วยงาน ---------</option>
                                            <?php foreach ($arr_department as $value) { ?>
                                                <option value='<?php echo $value->dep_id ?>'><?php echo $value->dep_name ?></option>
                                            <?php } ?>
                                        </select><br>
                                    </div>
                                    </div>

                                <div class="row gx-5"> <!-- เลือกคำนำหน้าชื่อแบบ dropdown list -->
                                    <div class="col">
                                        <label style = "color: #000000;">คำนำหน้าชื่อ</label>
                                        <label style = "color: #FF0000;">*</label>
                                        <select name="mem_pref_id" id="mem_pref_id" class="form-select" aria-label="Default select example" required>
                                            <option value="0" selected>------- คำนำหน้า ---------</option>
                                            <option value="1">นาย</option>
                                            <option value="2">นางสาว</option>
                                            <option value="3">นาง</option>
                                        </select><br>

                                </div>
                                <div class="col">
                                        <label style = "color: #000000;">ชื่อ</label>
                                        <label style = "color: #FF0000;">*</label>
                                        <input type="text" class="form-control" id="mem_firstname" name="mem_firstname" placeholder="ชื่อ"><br>
                                    </div>
                                    <div class="col">
                                        <label style = "color: #000000;">นามสกุล</label>
                                        <label style = "color: #FF0000;">*</label>
                                        <input type="text" class="form-control" id="mem_lastname" name="mem_lastname" placeholder="นามสกุล"><br>
                                    </div>

                                </div>
     
                                <div class="row gx-5"> <!-- กรอก Email ลงในกล่องบันทึกข้อความ -->
                                    <div class="col-4">

                                        <label style = "color: #000000;">อีเมล</label>
                                        <label style = "color: #FF0000;">*</label>
                                        <input type="email" class="form-control" id="mem_email" name="mem_email" placeholder="อีเมล" required oninvalid="this.setCustomValidity('กรุณากรอกอีเมลที่ถูกต้อง')" oninput="setCustomValidity('')"></input>

                                    </div> <!-- กำหนดบทบาท-->
                                    <input type="hidden" name="mem_role" id="mem_role" value="0">

                                    <div class="form-group col-md-4"> <!-- กรอกรหัสผ่านลงใน กล่องบันทึกข้อความ -->
                                        <label for="inputPassword4" style = "color: #000000;">รหัสผ่าน</label>
                                        <input type="password" class="form-control" id="mem_password" name="mem_password" placeholder="รหัสผ่าน" onchange="checkpassword()" required oninvalid="this.setCustomValidity('โปรดเลือกรหัสผ่านที่ปลอดภัยยิ่งขึ้น ใช้อักขระ 8 ตัวขึ้นไปสำหรับรหัสผ่าน ใช้ตัวอักษร ตัวเลขผสมกัน')" oninput="this.setCustomValidity('')" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                                            <!-- <i class="show fa fa-eye"></i>
                                            <i class="hide fa fa-eye-slash"></i> -->
                                    </div>
                                    <div class="form-group col-md-4"> <!-- กรอกรหัสยืนยันรหัสผ่านลงใน กล่องบันทึกข้อความ -->
                                        <label for="inputPassword4" style = "color: #000000;">ยืนยันรหัสผ่าน</label>
                                        <label style = "color: #FF0000;">*</label>
                                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="ยืนยันรหัสผ่าน" onchange="checkpassword()" required oninvalid="this.setCustomValidity('โปรดเลือกรหัสผ่านที่ปลอดภัยยิ่งขึ้น ใช้อักขระ 8 ตัวขึ้นไปสำหรับรหัสผ่าน ใช้ตัวอักษร ตัวเลขผสมกัน')" oninput="this.setCustomValidity('')" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"><br> 
                                    </div>
                                <div class=" row gx-5 ">
                                    <div class=" col-1">
                                    </div>
                                    <div class="d-grid gap-2 col-6 mx-auto"><!-- ปุ่มสมัครสมาชิก -->
                                        <span id='message'> </span>
                                        <br><button class="btn btn-primary my-4" id='submit' type="submit" style="background-color: #100575">สมัครสมาชิก</button>
                                    </div>
                                    </div> 
                                    

                                    <div class=" col-2">
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="col-1"></div>
                    </div><br>
                </div>
                <div class="row gx-5">
            </div>
        </div>
    </div>
</div>
<script type="text/javascript"> //ตรวจสอบการเปิด/ปิดการมองเห็นรหัสผ่าน
var passwordField = document.querySelector('.password');
var show = document.querySelector('.show');
var hide = document.querySelector('.hide');

    function checkpassword() { //ตรวจสอบรหัสผ่านว่าตรงกับรหัสยืนยันหรือไม่
        const password = document.querySelector('input[name=mem_password]');
        const confirm = document.querySelector('input[name=confirm_password]');
        if (confirm.value === password.value) {
            confirm.setCustomValidity('');
        } else if (confirm.value !== password.value) {
            confirm.setCustomValidity('โปรดกรอกรหัสผ่านให้ตรงกัน');
        }
    }

show.onclick = function(){ //รหัสผ่านแสดงกดปุ่มแสดงจะปิด
    passwordField.setAttribute("type","text");
    show.style.display = "none";
    hide.style.display = "block";
}

hide.onclick = function(){//รหัสผ่านถูกปิดการมองเห็นกดปุ่มแสดงจะเปิด
    passwordField.setAttribute("type","password");
    hide.style.display = "none";
    show.style.display = "block";
}

// const togglePassword = document.querySelector('#togglePassword');
// const password = document.querySelector('#mem_password');

// togglePassword.addEventListener('click', function (e) {
//     // toggle the type attribute
//     const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
//     password.setAttribute('type', type);
//     // toggle the eye / eye slash icon
//     this.classList.toggle('bi-eye');
// });
// const togglePassword2 = document.querySelector('#togglePassword2');
// const confirm_password = document.querySelector('#confirm_password');

// togglePassword2.addEventListener('click', function (e) {
//     // toggle the type attribute
//     const type = confirm_password.getAttribute('type') === 'password' ? 'text' : 'password';
//     confirm_password.setAttribute('type', type);
//     // toggle the eye / eye slash icon
//     this.classList.toggle('bi-eye');
    
//});
</script>
<style> 
     /*ปรับรูปแบบตัวอักษร */
    @import url('https://fonts.googleapis.com/css2?family=Sarabun&display=swap');
    *{
        font-family: 'Sarabun', sans-serif;
    }
    /* .i {

        margin-left: 300px;
        cursor: pointer   
    } */

    /* .card-header{
        border: 2px solid red;
        padding: 10px;
        border-bottom-left-radius: 50px;

    } */

    /* .select{
    /* margin:40px; */
    /* color:#DCDCDC;

    } */ 
    .show,
    .hide{
        position: absolute;
        right: 15px;
        top: 10px;
        font-size: 28px;
        color: #333;

    }
    .hide{
        display: none;
    }

</style>