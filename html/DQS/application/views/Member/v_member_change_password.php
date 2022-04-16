
<?php
/*
	* v_member_change_password
	* Display member change password
	* @input new_password,confirm_password,mem_password
	* @output change password
	* @author Natruja
	* @Create Date 2564-12-17
    * @Update Date 2565-02-04 change font and name of function
*/
$old_password = $this->session->mem_password;

?>


<div class="content">
<div class="container-fluid" style="padding-top: 100px ;margin: auto;">
    
    <div class="row">
    <div class="col-md-6 offset-md-4">
    
        <div class="card"  style="border-radius: 30px;">
            <div class="card-header card-header-warning" style=" height: 60px; width: 300px;">
                <h5 class="card-title" style="margin-left: 55px; font-family:TH Sarabun New; font-size:1.8em;" ><i class="far fa-edit"></i>เปลี่ยนรหัสผ่านผู้ใช้งาน</h5>
            </div>
            <!-- <center><h2 style="color:black; padding-top:50px; font-family:TH Sarabun New; font-weight: bold;">เปลี่ยนรหัสผ่าน</h2></center> -->
            <div class="card-body " style="padding-top: 30px; padding-right:80px; padding-left:80px; padding-bottom:30px">
            <form id="changepass" action="<?php echo site_url() . '/Member/Member_change_password/change_password' ?>" method="post" >
            <div class="row">
                <div class="col-md-8 offset-md-2">
                <input type="hidden" class="form-control"  id="mem_id" name="mem_id" value="<?php echo $this->session->userdata('mem_id')?>">
                <label style = "color: #000000;  font-size: 22px; font-family:TH Sarabun New; font-weight: bold;" for="">รหัสผ่านปัจจุบัน</label>
                <label style = "color: #FF0000;">*<span id ="text_mempass"></label>
                <input type="hidden" class="form-control"  id="old_password" name="old_password" value="<?php echo $this->session->userdata('old_password')?>">
                <input type="password" class="form-control"  id="mem_password" name="mem_password" placeholder="รหัสผ่านปัจจุบัน" required onchange="old_password_validation()" > <br>
                <!-- <div class="invalid-feedback">รหัสผ่านปัจจุบันไม่ถูกต้องหรือไม่กรอกรหัสผ่าน กรุณากรอกใหม่อีกครั้ง</div> -->
                <input type="hidden" class="form-control"  id="check_oldpass" name="check_oldpass" value="0">
                <input type="hidden" class="form-control"  id="check_newpass" name="check_newpass" value="0">
                <input type="hidden" class="form-control"  id="check_confirmpass" name="check_confirmpass" value="0">
                <label style = "color: #000000;  font-size: 22px; font-family:TH Sarabun New;font-weight: bold;" for="">รหัสผ่านใหม่</label>
                <label style = "color: #FF0000;">*<span id ="text_newpass"></span></label>
                <input type="password" class="form-control"  id="new_password" name="new_password" placeholder="รหัสผ่านใหม่" required onchange="new_password_validation()"><br>
                <p style="font-size: 17px; font-family:TH Sarabun New;">โปรดกรอกอย่างน้อย 8 ตัวอักษร ประกอบด้วยตัวพิมพ์ใหญ่ พิมพ์เล็ก และอักขระพิเศษ</p>
                <label style = "color: #000000; font-size: 22px; font-family:TH Sarabun New; font-weight: bold;" for="">ยืนยันรหัสผ่านใหม่</label>
                <label style = "color: #FF0000;">*<span id ="text_confirmpass"></span></label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="ยืนยันรหัสผ่านใหม่" required onchange="confirm_password_validation()"><br>
                <!-- <div id="check"> <span id="message"></div> -->
                <span id ="text_match" ></span>
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
    p{
        color:#003399;
        
    }
    body {
        background-color: #eff3f7;
    }
    .input-container {
        position:relative;
        
  /* display: -ms-flexbox;
  display: flex; */
  /* width: 100%;
  margin-bottom: 15px; */
}
.icon {
  padding: 10px;
  color: black;
  right:5px;
  min-width: 50px;
  text-align: rtl;
  position:absolute;
  direction: rtl;
}
</style>
<script  type="text/javascript">
    

    /*
		* old_password_validation
		* check old password with input password
		* @input mem_password,old_password
		* @output -
		* @author Natruja
		* @Create Date 2565-01-27
        * @Update Date 2565-02-04 change name function oldpass_validation to old_password_validation
	*/
    function old_password_validation(){
        var text_mempass = document.getElementById("text_mempass");
        var old_pass = document.getElementById("old_password").value;
        var mem_pass = document.getElementById("mem_password").value;
        var check_oldpass = document.getElementById("check_oldpass");
        //var pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/
        var oldpass_check;
        console.log(old_pass);
        if(mem_pass == old_pass){
            text_mempass.innerHTML = "รหัสผ่านปัจจุบันถูกต้อง";
            text_mempass.style.color = "#00D813";
            check_oldpass.value = 1;
            
        }if(mem_pass == ""){
            text_mempass.innerHTML = "กรุณากรอกรหัสผ่านปัจจุบัน";
            text_mempass.style.color = "#ff0000";
            check_oldpass.value = 0;
         
        }else if(mem_pass != old_pass){
            text_mempass.innerHTML = "รหัสผ่านปัจจุบันไม่ถูกต้อง";
            text_mempass.style.color = "#ff0000";
            check_oldpass.value = 0;
       
        }   
    }


    /*
		* new_password_validation
		* check new password validation
		* @input new_password
		* @output -
		* @author Natruja
		* @Create Date 2565-01-27
        * @Update Date 2565-02-04 change name function newpass_validation to new_password_validation
	*/
    function new_password_validation(){
        var text_newpass = document.getElementById("text_newpass");
        var new_pass = document.getElementById("new_password").value;
        var pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/
        var check_newpass = document.getElementById("check_newpass");
        var newpass_check;
        if(new_pass.match(pattern)){
            text_newpass.innerHTML = "";
            check_newpass.value = 1;
            console.log(document.getElementById("check_newpass").value);
            
        }else if(new_pass == ""){
            text_newpass.innerHTML = "กรุณากรอกรหัสผ่านใหม่";
            text_newpass.style.color = "#ff0000";
            check_newpass.value = 0;
            console.log('ใหม่ว่าง');
           
        
        }else if(new_pass != pattern){
            text_newpass.innerHTML = "โปรดกรอกตัวอักษรพิมพ์ใหญ่ พิมพ์เล็ก ตัวเลขและอักขระพิเศษ";
            text_newpass.style.color = "#ff0000";
            check_newpass.value = 0;
            console.log('ใหม่ไม่แมท');
            
        }
        console.log(document.getElementById("check_newpass").value);  
    }

    /*
		* confirm_password_validation
		* check confirm password validation
		* @input confirm_password
		* @output -
		* @author Natruja
		* @Create Date 2564-12-17
        * @Update Date 2565-02-04 change name function confirmpass_validation to confirm_password_validation
	*/
    function confirm_password_validation(){
        var text_confirmpass = document.getElementById("text_confirmpass");
        var confirm_pass = document.getElementById("confirm_password").value;
        var pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/
        var check_confirmpass = document.getElementById("check_confirmpass");
        var confirmpass_check;
       
        if(confirm_pass.match(pattern)){
            text_confirmpass.innerHTML = "";
            check_confirmpass.value = 1;
            console.log('ยืนแมท');
           
        }else if(confirm_pass == ""){
            console.log(confirm_pass);
            text_confirmpass.innerHTML = "กรุณากรอกยืนยันรหัสผ่าน";
            text_confirmpass.style.color = "#ff0000";
            check_confirmpass.value = 0;
            console.log('ยืนว่าง');
           
        }else if(confirm_pass != pattern ){
            text_confirmpass.innerHTML = "โปรดกรอกตัวอักษรพิมพ์ใหญ่ พิมพ์เล็ก ตัวเลขและอักขระพิเศษ";
            text_confirmpass.style.color = "#ff0000";
            check_confirmpass.value = 0;
            console.log('ยืนไม่แมท'); 
        } 
    }
   
    /*
		* check_all_password
		* check all password validation
		* @input new_password,confirm_password,check_newpass,check_oldpass,check_confirmpass
		* @output password can update if it valid at all
		* @author Natruja
		* @Create Date 2564-12-17
	*/
    $(document).on('change', '.form-control', function() {
        console.log("สวัสดีจ้า");
        var submit = document.getElementById("btn-ok");
        var text_match = document.getElementById("text_match");
        if( document.getElementById("check_newpass").value == 0 ||  document.getElementById("check_oldpass").value == 0 || document.getElementById("check_confirmpass").value == 0){
            submit.disabled = true ;
           
        }else{
            if($('#new_password').val() == $('#confirm_password').val()){
                text_match.innerHTML = "รหัสผ่านตรงกัน";
                text_match.style.color = "#00D813";
                submit.disabled = false ;
                
            $(function(){
                $("#changepass").on("submit",function(){
                    var form = $(this)[0];
                    if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                    }else if(form.checkValidity() === true){
                        Swal.fire({
                        icon: 'success',
                        title: '<font face="THSarabunNew">เปลี่ยนแปลงรหัสผ่านสำเร็จ?</font>',
                        showConfirmButton: false,
                        timer: 1500
                        })
                    }
                    form.classList.add('was-validated');
                });

             });
            }else if($('#new_password').val() != $('#confirm_password').val()){
                
                text_match.innerHTML = "รหัสผ่านใหม่และยืนยันรหัสผ่านไม่ตรงกัน กรุณากรอกใหม่อีกครั้ง";
                text_match.style.color = "#ff0000";
                submit.disabled = true ;
            }
            submit.disabled = false ;
        }
         
    });
        
   

    
    
</script>