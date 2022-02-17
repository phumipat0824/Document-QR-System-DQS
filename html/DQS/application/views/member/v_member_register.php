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
                            <form action='<?php echo site_url() . 'Member/Member_register/insert_session' ?>'id="form_id" method="post" name='form'>
                            <!-- เลือกจังหวัดแบบ dropdown list -->
                                <div class="row gx-5">
                                    <div class="col"><br><br>
                                    
                                        <label style = "color: #000000;">จังหวัด</label>
                                        <label style = "color: #FF0000;">*</label>
                                        
                                            <!-- <div class="dropdown">
                                            <select onclick="myFunction()">--------- เลือกจังหวัด ---- -----</select>
                                            <div id="province_choice" class="dropdown-content">
                                            <input type="text" placeholder="ค้นหา" id="mem_province_id" onkeyup="filterFunction()"> -->
                                        <select  onchange="get_pro()" name="mem_province_id" id="mem_province_id" class="form-select" aria-label="Default select example" required>
                                            <option value="" selected>--------- เลือกจังหวัด ---------</option>
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
                                        <label style = "color: #FF0000;">*</label>
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

function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// function filterFunction() {
//   var input, filter, ul, li, a, i;
//   input = document.getElementById("mem_province_id");
//   filter = input.value.toUpperCase();
//   div = document.getElementById("province_choice");
//   a = div.getElementsByTagName("a");
//   for (i = 0; i < a.length; i++) {
//     txtValue = a[i].textContent || a[i].innerText;
//     if (txtValue.toUpperCase().indexOf(filter) > -1) {
//       a[i].style.display = "";
//     } else {
//       a[i].style.display = "none";
//     }
//   }

// }

function check_email_input(){
// $(document).ready(function() {
    // $('#regis').click(function(e) {
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
                        text: 'กรุณากรอกอีเมลใหม่'
                    })
                }
            },
                    
        });
}
        
    // });
// }); 




function get_dept(value_pro_ID){
    $.ajax({
        type: "POST",
      url: "<?php echo site_url() ."Member/Member_register/get_dept_list_ajax" ?>",
      dataType: 'JSON',
      data: {
            'mem_pro_ID': value_pro_ID
        },
      success:function(data){
          console.log(data); 
        dep_input( data['json_station']);
      }
      
     });
     
}// recieve json then send to create data table

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
function get_pro(){
    var mem_pro_ID = document.getElementById("mem_province_id");
    console.log(mem_pro_ID);
    $("#mem_dep_id").empty();
	get_dept(mem_pro_ID.value);
}


</script>
<!-- <script type="text/javascript">
  $('#add-form').submit(function(){
    $.ajax({
        type: 'post',
        url: "<?php echo site_url().'/Member/Member_register/insert_member'?>",
        data: $( "#add-form" ).serialize(),
        dataType: 'json',
        success: function(data) {
              // console.log("succ");
              alert('มีชื่อนี้ในระบบอยู่แล้วหรือไม่ได้กรอกข้อมูล กรุณากรอกใหม่');
        },
        error: function (error) {
          // console.log("error");
          location.reload();
        }
    });
  });
  </script> -->

  <!-- Edit name -->

<script>
    // $(document).on("keyup", "#mem_firstname",function() {
    //     var t = <?php echo json_encode($arr_name) ?>;
    //     var firstname_input = document.getElementById("mem_firstname");
    //     var check_name;
    //     // var div = document.getElementById('target_div');
    //     var dis_button = document.getElementById('regis');

    //     for (let x in t) {
    //         if (t[x].mem_firstname == firstname_input.value) {
                
    //                 check_name = 1;
    //                 break;
                
    //         } else {
    //             check_name = 0;
    //         }
    //     }
    //     console.log(check_name);
    //     if (check_name == 1) {
    //         $("#mem_firstname").css("border-color", "red");
            
    //         // div.style.display = "block";
    //         dis_button.disabled = true;

    //     } else {
    //         $("#mem_firstname").css("border-color", "green");
           
    //         // div.style.display = "none";
    //         dis_button.disabled = false;

    //     }
    // });

     
    // $(document).ready(function() {
    //     $('form #regis').click(function(e) {
    //         let $form = $(this).closest('form');
    //         $.ajax({
    //             type: "POST",
    //             url: "../../Member_register/check_email",
    //             data: {
    //                 mem_email: $('#mem_email').val(),
                    
    //             },
                
    //             success: function(res) {
    //                 console.log(res);
    //                 if (res == "true") {
    //                     // Swal.fire({
    //                     //     icon: 'success',
    //                     //     title: 'รีเซ็ตรหัสผ่านเสร็จสิ้น',
    //                     //     text: 'กำลังกลับไปหน้าหลัก'
    //                     // })
                        
    //                     setTimeout(function() {
    //                         // document.getElementById('regis').type = 'submit';
    //                         // $form.submit();
    //                     }, 1800)
    //                 } else if (res == "false") {
    //                     Swal.fire({
    //                         icon: 'error',
    //                         title: 'อีเมลนี้ถูกใช้งานแล้ว',
    //                         text: 'กรุณากรอกอีเมลใหม่'
    //                     })
    //                 }
    //             }
    //         });
    //     });
    // });

    
</script>


  
<style> 
     /*ปรับรูปแบบตัวอักษร */
    @import url('https://fonts.googleapis.com/css2?family=Sarabun&display=swap');
    *{
        font-family: 'Sarabun', sans-serif;
    }
    

</style>