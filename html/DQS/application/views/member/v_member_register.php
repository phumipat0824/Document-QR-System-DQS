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
                                    
                                        <h2 class= "text-center" id="*" style="color:#000000; font-family:TH sarabun new; font-size: 60px;">สมัครสมาชิก</h2>
                                        
                                    </div>
                                </div>
                                <div class="col col-lg-1">

                                </div>
                            </div>
                            <form action='<?php echo site_url() . 'Member/Member_register/insert_session' ?>'id="form_id" method="post" name='form'>
                            
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
                                    <label style = "color: #FF0000;">*</label>
                                    <input type="text" class="form-control" id="mem_firstname" name="mem_firstname" placeholder="ชื่อ"><br>
                                </div>

                                    <!-- กรอกชื่อลงในกล่องบันทึกข้อความ -->
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
                                        <label style = "color: #FF0000;">*</label>
                                        <input type="password" class="form-control" id="mem_password" name="mem_password" placeholder="รหัสผ่าน" onchange="checkpassword()" required oninvalid="this.setCustomValidity('โปรดเลือกรหัสผ่านที่ปลอดภัยยิ่งขึ้น ใช้อักขระ 8 ตัวขึ้นไปสำหรับรหัสผ่าน ใช้ตัวอักษร ตัวเลขผสมกัน')" oninput="this.setCustomValidity('')" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                                        <div class="media">
                                        
                                    </div>
                                          
                                    </div>
                                    <div class="form-group col-md-4"> <!-- กรอกรหัสผ่านลงใน กล่องบันทึกข้อความ -->
                                    
                                    <label for="inputPassword4" style = "color: #000000;">รหัสยืนยัน</label>
                                        <label style = "color: #FF0000;">*</label>
                                        <input type="password" class="form-control " id="mem_password" name="mem_password" placeholder="รหัสผ่าน" onchange="checkpassword()" required oninvalid="this.setCustomValidity('โปรดเลือกรหัสผ่านที่ปลอดภัยยิ่งขึ้น ใช้อักขระ 8 ตัวขึ้นไปสำหรับรหัสผ่าน ใช้ตัวอักษร ตัวเลขผสมกัน')" oninput="this.setCustomValidity('')" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                                    </div>
                                    <div class="col-md-12">
                                        <br>
                                        <p class="mb-0" style="font-size: 12px;margin-top:0.001em;color:#100575;">หมายเหตุ: โปรดกรอกรหัสผ่านอย่างน้อย 8 ตัวอักษร ประกอบด้วยตัวพิมพ์ใหญ่ พิมพ์เล็ก และอักขระพิเศษ</p>
                                        <p class="mb-0" style="font-size: 12px;margin-top:0.001em;color:#100575;">หมายเหตุ: หากหน่วยงานถูกสมัครแล้วจะไม่แสดงในรายการเลือก</p>

                                            
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
                        confirmButtonText: 'ตกลง'
                    })
                }
            },
                    
        });
}

function check_department(){

        let $form = $(this).closest('form');      
        $.ajax({
        type: 'POST',
        dataType: "JSON",
        url: "<?php echo site_url().'/Member/Member_register/check_status'?>",
        data:{
        mem_pro_id: $('#mem_pro_id').val(),
        mem_dep_id: $('#mem_dep_id').val(),
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
                title: 'หน่วยงานนี้ถูกใช้แล้ว',
                text: 'กรุณากรอกอีเมลใหม่',
                confirmButtonText: 'ตกลง'
            })
        }
        },
       
});
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
      url: "<?php echo site_url() ."Member/Member_register/get_dept_list_ajax" ?>",
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
    *{
        font-family: 'Sarabun', sans-serif;
    }
    

</style>