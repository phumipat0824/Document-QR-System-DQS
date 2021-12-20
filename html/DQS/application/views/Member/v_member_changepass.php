<?php
$old_password = $this->session->mem_password;

?>


<div class="content">
<div class="container-fluid" style="padding-top: 100px ;margin: auto;">
    <div class="row">
        <div class="col-md-6 offset-md-4">
        <center><h1 style="color:#003399">บัญชีผู้ใช้งาน</h1></center>
        </div>
    </div>
    <div class="row">
    <div class="col-md-6 offset-md-4">
        <div class="card"  style="border-radius: 30px;">
            <center><h2 style="color:black; padding-top:50px ">เปลี่ยนรหัสผ่าน</h2></center>
            <div class="card-body " style="padding-top: 10px; padding-right:80px; padding-left:80px; padding-bottom:30px">
            <form id="changepass"  method="post" novalidate>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                
                <label style = "color: #000000;  font-size: 15px;" for="">รหัสผ่านปัจจุบัน</label>
                <label style = "color: #FF0000;">*</label>
                <input type="password" class="form-control"  id="mem_password" name="mem_password" placeholder="รหัสผ่านปัจจุบัน" required pattern="<?php echo $this->session->userdata('old_password')?>"> <br>
                <div class="invalid-feedback">รหัสผ่านปัจจุบันไม่ถูกต้องหรือไม่กรอกรหัสผ่าน กรุณากรอกใหม่อีกครั้ง</div>
                <label style = "color: #000000;  font-size: 15px;" for="">รหัสผ่านใหม่</label>
                <label style = "color: #FF0000;">*</label>
                <input type="password" class="form-control"  id="new_password" name="new_password" placeholder="รหัสผ่านใหม่" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"><br>
                <div class="invalid-feedback">โปรดเลือกรหัสผ่านที่ปลอดภัยยิ่งขึ้น ใช้อักขระ 8 ตัวขึ้นไปสำหรับรหัสผ่าน ใช้ตัวอักษรพิมพ์ใหญ่ พิมพ์เล็ก และตัวเลขผสมกัน</div>
                <label style = "color: #000000; font-size: 15px;" for="">ยืนยันรหัสผ่านใหม่</label>
                <label style = "color: #FF0000;">*</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="ยืนยันรหัสผ่านใหม่" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"><br>
                <div class="invalid-feedback">โปรดเลือกรหัสผ่านที่ปลอดภัยยิ่งขึ้น ใช้อักขระ 8 ตัวขึ้นไปสำหรับรหัสผ่าน ใช้ตัวอักษรพิมพ์ใหญ่ พิมพ์เล็ก และตัวเลขผสมกัน</div>
                <div id="check"> <span id="message"></div>
                
                </div>
            </div>
                <center>
                <input type="submit" id="btn-ok" style="background-color: #100575; border-radius: 30px; padding-left:50px; padding-right:50px;" name="reset_password" class="btn btn-primary" value='บันทึก'>
                </center>
            </form>
            </div>
        </div>
    </div>
    </div>

</div>
</div>
<style>
    body {
        background-color: #eff3f7;
    }
   
</style>
<script  type="text/javascript">
    $('#confirm_password').on('change', function () {
        document.getElementById("check").disabled = false;
        if ($('#new_password').val() == $('#confirm_password').val() ) {
            $('#message').html('รหัสผ่านตรงกัน').css('color', 'green');

        } else 
        $('#message').html('รหัสผ่านใหม่และยืนยันรหัสผ่านไม่ตรงกัน กรุณากรอกใหม่อีกครั้ง').css('color', 'red');
    });
    $('#confirm_password').on('change', function () {
        document.getElementById("check").disabled = false;
        if ($('#new_password').val() == $('#confirm_password').val() && $('#new_password').val() != "Angoon272553.") {
            $('#message').html('รหัสผ่านตรงกัน').css('color', 'green');

        } else 
        $('#message').html('รหัสผ่านใหม่ตรงกับรหัสผ่านปัจจุบัน กรุณากรอกใหม่อีกครั้ง').css('color', 'red');
    });

    $(function(){
        $("#changepass").on("submit",function(){
            var form = $(this)[0];
            if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
            }else if(form.checkValidity() === true){
                Swal.fire({
                icon: 'success',
                title: 'เปลี่ยนแปลงรหัสผ่านสำเร็จ',
                showConfirmButton: false,
                timer: 1500
                })
            }
            form.classList.add('was-validated');
        });
    });

   


   
       
   

    
    
</script>