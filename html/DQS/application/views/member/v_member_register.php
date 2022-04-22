 <!--* v_member_register
                * Display show_member_register , 
                * @input  province, department,prefic,firstname,lastname,email,password,password_confirm
                * @output show form
                * @author Ratchaneekorn
                * @Create Date 2564-09-01
*/ -->
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
                                    
                                        <h2 class= "text-center" id="*" style="color:aliceblue ; font-family:TH sarabun new; font-size: 60px;">สมัครสมาชิก</h2>
                                        
                                    </div>
                                </div>
                                <div class="col col-lg-1">

                                </div>
                            </div>
                            <form action='<?php echo site_url() . '/Member/Member_register/insert_session' ?>'id="form_id" method="post" name='form'>
                            
                            <!-- เลือกจังหวัดแบบ dropdown list -->
                                <div class="row gx-5">
                                    <div class="col"><br><br>
                                    
                                        <label style = "color: #000000;">จังหวัด</label>
                                        <label style = "color: #FF0000;">*</label>
                                        
                                            
                                        <select  onchange="get_pro()" name="mem_province_id" id="mem_province_id" class="form-select" aria-label="Default select example" required>
                                            <option value="" selected>--------- เลือกจังหวัด ---------</option>
                                            <?php foreach ($arr_province as $value) { ?>
                                                <option value='<?php echo $value->pro_id ?>'><?php echo $value->pro_name ?></option>
                                                
                                            <?php } ?>
                                        </select><br>
                                </div>
                                <!-- เลือกหน่วยงานแบบ dropdown list -->
                                <div class="col"><br><br>
                                        <label style = "color: #000000;">หน่วยงาน</label>
                                        <label style = "color: #FF0000;">*</label>
                                        <a class="mb-0" style="font-size: 13px;margin-top:0.001em;color:red;">หากหน่วยงานถูกสมัครแล้วจะไม่แสดงในรายการเลือก</a>
                                        <select name="mem_dep_id" id="mem_dep_id" class="form-select" aria-label="Default select example" required>
                                        <option value="" selected>--------- เลือกหน่วยงาน ---------</option>
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
                                <!-- กรอกชื่อลงในกล่องบันทึกข้อความ -->
                                <div class="col"> 
                                    <label style = "color: #000000;">ชื่อ</label>
                                    <label style = "color: #FF0000;">* <span id ="text_fname"></span></label>
                                    <input type="text" class="form-control" id="mem_firstname" name="mem_firstname" placeholder="ชื่อ" onchange ="fname_validation();" ><br>
                                </div>

                                    <!-- กรอกชื่อลงในกล่องบันทึกข้อความ -->
                                    <div class="col">
                                        <label style = "color: #000000;">นามสกุล</label>
                                        <label style = "color: #FF0000;">*<span id ="text_lname"></span></label>
                                        <input type="text" class="form-control" id="mem_lastname" name="mem_lastname" placeholder="นามสกุล" onchange ="lname_validation();" ><br>
                                    </div>

                                </div>
     
                                <div class="row gx-5"> <!-- กรอก Email ลงในกล่องบันทึกข้อความ -->
                                    <div class="col-4">

                                        <label style = "color: #000000;">อีเมล</label>
                                        <label style = "color: #FF0000;">*<span id ="text_email"></span></label>
                                        <input type="email" class="form-control" id="mem_email" name="mem_email" placeholder="อีเมล" required oninvalid="this.setCustomValidity('กรุณากรอกอีเมลที่ถูกต้อง')" oninput="setCustomValidity('')" onchange ="email_validation();" ></input>

                                    </div> <!-- กำหนดบทบาท-->
                                    <input type="hidden" name="mem_role" id="mem_role" value="0">

                                        
                                    <div class="form-group col-md-4"> <!-- กรอกรหัสผ่านลงใน กล่องบันทึกข้อความ -->
                                        <label for="inputPassword4" style = "color: #000000;">รหัสผ่าน</label>
                                        <label style = "color: #FF0000;">*<span id ="text_password"></span></label>
                                        <input type="password" class="form-control" id="mem_password" name="mem_password" placeholder="รหัสผ่าน" onchange="password_validation()" required oninvalid="this.setCustomValidity('โปรดเลือกรหัสผ่านที่ปลอดภัยยิ่งขึ้น ใช้อักขระ 8 ตัวขึ้นไปสำหรับรหัสผ่าน ใช้ตัวอักษร ตัวเลขผสมกัน')" oninput="this.setCustomValidity('')" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                                        <!-- <div class="col-md-4"> -->
                                        <a style="font-size: 13px;margin-top:0.5em;color:red;">กรอกรหัสผ่านอย่างน้อย 8 ตัวอักษรประกอบด้วย </a>
                                        <a style="font-size: 13px;margin-top:0.5em;color:red;"> ตัวพิมพ์ใหญ่ พิมพ์เล็ก และอักขระพิเศษ</a>
                                        
                                    <!-- </div> -->
                                          
                                    </div>
                                    <div class="form-group col-md-4"> <!-- กรอกรหัสผ่านลงใน กล่องบันทึกข้อความ -->
                                    
                                    <label for="inputPassword4" style = "color: #000000;">รหัสยืนยัน</label>
                                        <label style = "color: #FF0000;">*<span id ="text_confirmpass"></span></label>
                                        <input type="password" class="form-control " id="mem_confirmpassword" name="mem_confirmpassword" placeholder="รหัสยืนยัน" onchange="confirmpassword_validation()" required oninvalid="this.setCustomValidity('โปรดเลือกรหัสผ่านที่ปลอดภัยยิ่งขึ้น ใช้อักขระ 8 ตัวขึ้นไปสำหรับรหัสผ่าน ใช้ตัวอักษร ตัวเลขผสมกัน')" oninput="this.setCustomValidity('')" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                                    </div>
                                    
                                <div class=" row gx-5 ">
                                    <div class=" col-1">
                                    </div>
                                    <div class="d-grid gap-2 col-6 mx-auto"><!-- ปุ่มสมัครสมาชิก -->
                                        <span id='message'> </span>
                                        <br><button onclick="check_email_input()" class="btn btn-primary my-4" id='regis' type="button" style="background-color: #100575">สมัครสมาชิก</button>
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



<script> 
function disableDepart(mem_pro){
document.getElementById("mem_pro_list").style.display = 'none';
}

/*
	* check_email_input()
	* check email input
	* @input mem_email
	* @output success,error
	* @author Ratchaneekorn
	* @Create Date 2565-02-15
*/

function check_email_input(){

             let $form = $(this).closest('form');      
           $.ajax({
            type: 'POST',
            dataType: "JSON",
            url: "<?php echo site_url().'/Member/Member_register/check_email'?>",
            data:{
                mem_email: $('#mem_email').val(),
            },
            

            success: function(data) {
                if (data == 0) {
                    console.log('success');
                    document.getElementById('regis').type = 'submit';
                    document.getElementById('form_id').submit();
                } else if (data == 1) {
                    console.log('error');
                    Swal.fire({
                        icon: 'error',
                        title: 'อีเมลถูกใช้แล้ว',
                        text: 'กรุณากรอกอีเมลใหม่',
                        confirmButtonColor: '#5cb85c',
                        confirmButtonShadow: '#5cb85c',
                        confirmButtonText: 'ตกลง'
                    })
                }
            },
                    
        });
}
function fname_validation(){
        var text_fname = document.getElementById("text_fname");
        var f_name = document.getElementById("mem_firstname").value;
        var pattern = /^[ก-๏]+$/;
        var fname_check;
        if(f_name.match(pattern)){
            text_fname.innerHTML = "";
            fname_check = 1;
            
        }else{
            text_fname.innerHTML = "กรอกข้อมูลไม่ถูกต้องกรุณากรอกใหม่อีกครั้ง";
            text_fname.style.color = "#ff0000";
           fname_check = 0;
            
        }if(f_name == ""){
            text_fname.innerHTML = "กรุณากรอกชื่อ";
            text_fname.style.color = "#ff0000";
            fname_check = 0;
            
        }
        return fname_check;
    }
    function lname_validation(){
        var text_lname = document.getElementById("text_lname");
        var l_name = document.getElementById("mem_lastname").value;
        var pattern = /^[ก-๏]+$/;
        var lname_check;
        if(l_name.match(pattern)){
            text_lname.innerHTML = "";
            lname_check =1;
        }else{
            text_lname.innerHTML = "กรอกข้อมูลไม่ถูกต้องกรุณากรอกใหม่อีกครั้ง";
            text_lname.style.color = "#ff0000";
            lname_check =0;
        }if(l_name == ""){
            text_lname.innerHTML = "กรุณากรอกนามสกุล";
            text_lname.style.color = "#ff0000";
            lname_check =0;
        }
        return lname_check;
    }

    $(document).on('change', '.form-control', function() {
        var submit = document.getElementById("regis");
        if(fname_validation() == 0 || lname_validation() == 0 || email_validation() == 0 || password_validation() == 0 || confirmpass_validation() == 0){
            submit.disabled = true ;
           
            
        }else{
            submit.disabled = false;
            
        }
       
    });
    function email_validation(){
        // var form = document.getElementById("form");
        var text = document.getElementById("text_email");
        var email = document.getElementById("mem_email").value;
        var pattern = /^[^]+@[^ ]+\.[a-z]{2,3}$/;
        var email_check;
        if(email.match(pattern)){
            text.innerHTML = "";
            email_check =1;
        }else{
            text.innerHTML = "อีเมลไม่ถูกต้อง กรุณากรอกใหม่อีกครั้ง";
            text.style.color = "#ff0000";
            email_check =0;
        }if(email == ""){
            text.innerHTML = "กรุณากรอกอีเมล";
            text.style.color = "#ff0000";
            email_check =0;
        }
        return email_check;
    }
    function password_validation(){
        // var form = document.getElementById("form");
        var text = document.getElementById("text_password");
        var password = document.getElementById("mem_password").value;
        var pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
        var password_check;
        if(password.match(pattern)){
            text.innerHTML = "";
            password_check =1;
        }else{
            text.innerHTML = "รหัสผ่านไม่ถูกต้อง กรุณากรอกใหม่อีกครั้ง";
            text.style.color = "#ff0000";
            password_check =0;
        }if(password == ""){
            text.innerHTML = "กรุณากรอกรหัสผ่าน";
            text.style.color = "#ff0000";
            password_check =0;
        }
        return password_check;
    }

    function confirmpass_validation(){
        // var form = document.getElementById("form");
        var text = document.getElementById("text_confirmpass");
        var password = document.getElementById("mem_confirmpassword").value;
        var pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
        var password_check;
        if(password.match(pattern)){
            text.innerHTML = "";
            password_check =1;
        }else{
            text.innerHTML = "รหัสผ่านไม่ถูกต้อง กรุณากรอกใหม่อีกครั้ง";
            text.style.color = "#ff0000";
            password_check =0;
        }if(password == ""){
            text.innerHTML = "กรุณากรอกรหัสผ่าน";
            text.style.color = "#ff0000";
            password_check =0;
        }
        return password_check;
    }
   
    
/*
	* get_dept(value_pro_id)
	* get dept
	* @input value_pro_id
	* @output data
	* @author Ratchaneekorn
	* @Create Date 2565-02-15
*/
function get_dept(value_pro_id){
    $.ajax({
        type: "POST",
      url: "<?php echo site_url() ."/Member/Member_register/get_dept_list_ajax" ?>",
      dataType: 'JSON',
      data: {
            'mem_pro_list': value_pro_id
        },
      success:function(data){
          console.log(data);
        dep_input( data['json_station']);     
      }

     });
     
}// recieve json then send to create data table
/*
	* dep_input(arr_dep)
	*  dep input
	* @input mem_dep_id
	* @output arr_dep
	* @author Ratchaneekorn
	* @Create Date 2565-02-15
*/
function dep_input(arr_dep) {//
    
        var select = document.getElementById("mem_dep_id");

        const elmts =  arr_dep;
        
        console.log(arr_dep);
        const dep_optn = JSON.parse(JSON.stringify(elmts));
         
            for (var i of elmts) {
                
                console.log(i.dep_name);
                var optn = i.dep_name;
                var el = document.createElement("option");
                el.textContent = optn;
                el.value = i.dep_id;
                select.appendChild(el);

            }
    
}
/*
	* get_pro()
	* get pro station
	* @input mem_province_id
	* @output mem_pro_list
	* @author Ratchaneekorn
	* @Create Date 2565-02-15
*/
function get_pro(){
    var mem_pro_list = document.getElementById("mem_province_id");
    console.log(mem_pro_list);
    $("#mem_dep_id").empty();
	get_dept(mem_pro_list.value); 
}


</script>

<!-- ปรับฟอนต์ให้เป็นไทยสารบัญ   -->
<style> 
     /*ปรับรูปแบบตัวอักษร */
     @import url('https://fonts.googleapis.com/css2?family=Sarabun&display=swap');

     * {
         font-family: 'Sarabun', sans-serif;
     }
     </style>