<?php
/*
	* v_member_edit
	* Display edit data of member
	* @input mem_dep_id,mem_firstname,mem_username,mem_pro_id,mem_lastname,mem_email
	* @output update data of member
	* @author Natruja
	* @Create Date 2564-12-17
*/
?>
<div class="content">
<div class="container-fluid" style="padding-top: 100px ;margin: auto;">
    <!-- <div class="row">
        <div class="col-md-6 offset-md-4">
        <p style="color:#003399">แก้ไขข้อมูลบัญชีผู้ใช้</p>
        </div>
    </div> -->
    <div class="row">
        <div class="col-md-8 offset-md-3">
    
   
        
            <form id="form" action="<?php echo site_url() . '/Member/Member_edit/edit_member' ?>" method="post">
            
              <div class="card">

                <div class="card-header card-header-warning" style=" height: 60px; width: 300px;">
                
                
                  <h5 class="card-title" style="margin-left: 55px; font-family:TH Sarabun New; font-size:1.8em;" ><i class="far fa-edit"></i>แก้ไขข้อมูลบัญชีผู้ใช้</h5>
     
                </div>

                <div class="card-body table-responsive">
                    <div class="row" style="margin-top: 20px;">
                    <div class="col-md-5" style="margin: auto;">
                    <label style = "color: #000000;  font-size: 22px; font-family: TH Sarabun New;" for="">จังหวัด</label>
                        <label style = "color: #FF0000;">*</label>
                        <select onchange="get_pro()" name="mem_pro_id" id="mem_pro_id" class="form-select" aria-label="Default select example"  required>
                            <option style = "color: #000000;  " value="<?php echo $obj_mem->pro_id ?>"><?php echo $obj_mem->pro_name ?></option>
                            <?php foreach ($arr_province as $value) { ?>
                                <?php if($value ->pro_id != $obj_mem->pro_id){ ?>
                                        <option value='<?php echo $value->pro_id ?>'><?php echo $value->pro_name ?></option>
                                <?php } ?>
                            <?php }?>
                        </select>


                        <input type="hidden"  value="<?php echo $obj_mem->mem_id ?>" name='mem_id' required>
                        <label style = "color: #000000;  font-size: 22px; margin-top:20px; font-family: TH Sarabun New;" for="">ชื่อ</label>
                        <label style = "color: #FF0000;">* <span id ="text_fname"></span>   </label>
                        <input type="text" class="form-control"  id="mem_firstname" name="mem_firstname" placeholder="ชื่อ" required value="<?php echo $obj_mem->mem_firstname ?>" onchange="fname_validation()">
                                
                        <label style = "color: #000000; font-size: 22px; margin-top:25px; font-family: TH Sarabun New;"  for="">ชื่อผู้ใช้งาน</label>
            
                        <input type="text" class="form-control" id="mem_username" name="mem_username" disabled placeholder="ชื่อผู้ใช้งาน"  value="<?php echo $obj_mem->mem_username?>">

                        
                    </div>

                    <div class="col-md-5" style="margin: auto;">
                    <label style = "color: #000000;  font-size: 22px; font-family: TH Sarabun New;" for="">หน่วยงาน</label>
                        <label style = "color: #FF0000;">*หากมีบัญชีหน่วยงานแล้วจะไม่พบในรายการเลือก</label>
                        <select name="mem_dep_id" id="mem_dep_id" class="form-select" aria-label="Default select example"    required>
                            <option style = "color: #000000;  " value="<?php echo $obj_mem->dep_id ?>"><?php echo $obj_mem->dep_name ?></option>
                            <?php foreach ($arr_department as $value) { ?>
                                <?php if($value ->dep_id != $obj_mem->dep_id){ ?>
                                    <option value='<?php echo $value->dep_id ?>'><?php echo $value->dep_name ?></option>             
                                <?php }?>
                            <?php } ?>  
                        </select>

                        <label style = "color: #000000;  font-size: 22px; margin-top:20px; font-family: TH Sarabun New;" for="">นามสกุล</label>
                        <label style = "color: #FF0000;">* <span id ="text_lname"></span>   </label>
                        <input type="text" class="form-control"  id="mem_lastname" name="mem_lastname" placeholder="นามสกุล" required value="<?php echo $obj_mem->mem_lastname?>" onchange="lname_validation()">
                        <input type="hidden" class="form-control"  id="user_email" name="user_email" value="<?php echo $obj_mem->mem_email?>">
                        <label style = "color: #000000; font-size: 22px; margin-top:25px; font-family: TH Sarabun New;" for="">อีเมล</label>
                        <label style = "color: #FF0000;">* <span id ="text"></span></span></label>
                        <input type="text" class="form-control" id="mem_email" name="mem_email" placeholder="อีเมล" required value="<?php echo $obj_mem->mem_email?>" onchange="email_validation()">
                        
                    </div>
                    </div>
                    <div class="row ">
                   
                    <div class="col-md-3" style="margin: auto; margin-bottom: 20px; margin-top: 40px;">
                        <input type="button" class="btn btn-danger" onclick="goBack()" value="ยกเลิก">
                        <input type="button"  id="btn-ok"  value="ยืนยัน" name="edit" class="btn btn-success"  > 
                    </div> 
                    </div>
                </div>
                <!-- ปิด body footer -->
              </div>
        </div>        
    </div> 
            <!-- ปิด row -->
           
            
                
              
            </form>
       
        <!-- cardfooter -->
    </div>
</div>


<style>
   
    body {
        background-color: #eff3f7;
    }
    .swal {
    font-family: 'THSarabunNew', sans-serif;
}
    
</style>

<script type="text/javascript">
/*
	* goBack
	* goback display
	* @input -
	* @output -
	* @author Natruja
	* @Create Date 2564-12-17
*/
    function goBack() {
            window.history.back();
        }

/*
	* fname_validation
	* check firstname validation
	* @input mem_firstname
	* @output fname_check
	* @author Natruja
	* @Create Date 2564-12-17
*/
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

/*
	* lname_validation
	* check lastname validation
	* @input mem_lastname
	* @output lname_check
	* @author Natruja
	* @Create Date 2564-12-17
*/
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

 /*
	* email_validation
	* check email validation
	* @input mem_email
	* @output email_check
	* @author Natruja
	* @Create Date 2564-12-17
*/
    function email_validation(){
        var form = document.getElementById("form");
        var text = document.getElementById("text");
        var email = document.getElementById("mem_email").value;
        var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
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

/*
	* check_email_input
	* check email validation
	* @input mem_email
	* @output success,error
	* @author Ratchaneekorn
	* @Create Date 2565-02-15
*/
    function check_email_input(){
        var submit = document.getElementById("btn-ok");
        var email_used_check;
        var user_email = document.getElementById("user_email").value;
        var email = document.getElementById("mem_email").value;
        console.log(user_email);
     $.ajax({
        type: 'POST',
        dataType: "JSON",
        url: "<?php echo site_url().'/Member/Member_register/check_email'?>",
        data:{
            mem_email: $('#mem_email').val(),
        },
        

        success: function(data) {
            if (data == 0) {
                email_used_check = 1;
            } else if (data == 1 && (user_email != email)) {
                text.innerHTML = "อีเมลนี้ถูกใช้แล้ว กรุณากรอกอีเมลใหม่อีกครั้ง";
                text.style.color = "#ff0000";
                email_used_check = 0;
                submit.disabled = true ;
            }
            //console.log(email_used_check);
        
            return data;
        },
                
        });
      
    }

/*
	* check_all_validation
	* check all validation for submit form
	* @input fname_validation,lname_validation,email_validation
	* @output -
	* @author Natruja
	* @Create Date 2564-12-17
*/
    $(document).on('change', '.form-control', function() {
        var submit = document.getElementById("btn-ok");
        if(fname_validation() == 0 || lname_validation() == 0 || email_validation() == 0 || check_email_input() == 0){
            submit.disabled = true ;
           
            
        }else{
            submit.disabled = false;
            
        }
       
    });

    $(document).ready(function() {
        $('form #btn-ok').click(function(e) {
            let $form = $(this).closest('form');
            Swal.fire({
            title: '<font face="THSarabunNew">บันทึกการแก้ไขข้อมูลหรือไม่?</font>',
            showCancelButton: true,
            confirmButtonColor: '#518FF6',
            cancelButtonColor: '#fffff',
            confirmButtonColor: '#198754',
            cancelButtonColor: '#f44336',
            cancelButtonText: 'ยกเลิก',
            confirmButtonText: 'บันทึก'
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                icon: 'success',
                title: '<font face="THSarabunNew">บันทึกการแก้ไขเรียบร้อยแล้ว</font>',
                showConfirmButton: false,
                timer: 2200
            })
            document.getElementById('btn-ok').type = 'submit';
                    $form.submit();
            }
            })
            
        });
    });

    /*
	* get_province
	* get province from database
	* @input -
	* @output mem_pro_id
	* @author Natruja
	* @Create Date 2565-02-18
    */
    function get_pro(){
        var mem_pro_ID = document.getElementById("mem_pro_id");
        console.log(mem_pro_ID.value);
        $("#mem_dep_id").empty();
        get_dept(mem_pro_ID.value);
    }

    /*
	* get_dept
	* get department from get province
	* @input -
	* @output mem_pro_id
	* @author Natruja
	* @Create Date 2565-02-18
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
	* dep_input
	* get deparment to select option
	* @input -
	* @output -
	* @author Natruja
	* @Create Date 2565-02-18
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

   

    
  
</script>
