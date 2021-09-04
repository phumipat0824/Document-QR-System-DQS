<div class="content">
    <div class="container-fluid" style="padding-top: 100px ;margin: auto;" ;>
        <div class="row gx-5">
            <div class="col-lg-2 col-md-2" style="padding-left: 100px ">
            </div>
            <div class="col-lg-8 col-md-8" style="padding-left: 100px ">
                <div class="card">
                    <div class="row gx-5">

                        <div class="col"></div>
                        <div class="col-10">
                            <div class="row justify-content-md-center">
                                <div class="col col-lg-1">

                                </div>
                                <div class="col-md-10 justify-content-md-center">
                                    <div class="card-header card-header-primary">
                                        <h2 class="text-center">สมัครสมาชิก</h2>
                                    </div>
                                </div>
                                <div class="col col-lg-1">

                                </div>
                            </div>
                            <form action='<?php echo site_url() . 'Member/Member_register/insert_session' ?>' method="post">
                                <div class="row gx-5">
                                    <div class="col">
                                        <div class="p-3 ">จังหวัด</div>
                                        <select name="mem_province_id" id="mem_province_id" class="form-select" aria-label="Default select example" required>
                                            <option value="" selected>--------- เลือกจังหวัด ---- -----</option>
                                            <?php foreach ($arr_province as $value) { ?>
                                                <option value='<?php echo $value->pro_id ?>'><?php echo $value->pro_name ?></option>
                                            <?php } ?>
                                        </select><br>
                                    </div>
                                    <div class="col">
                                        <div class="p-3 ">หน่วยงาน</div>
                                        <select name="mem_dep_id" id="mem_dep_id" class="form-select" aria-label="Default select example" required>
                                            <option value="" selected>--------- เลือกหน่วยงาน ---------</option>
                                            <?php foreach ($arr_department as $value) { ?>
                                                <option value='<?php echo $value->dep_id ?>'><?php echo $value->dep_name ?></option>
                                            <?php } ?>
                                        </select><br>
                                    </div>
                                </div>


                                <div class="row gx-5">
                                    <div class="col">
                                        <div class="p-3 ">คำนำหน้าชื่อ</div>
                                        <select name="mem_pref_id" id="mem_pref_id" class="form-select" aria-label="Default select example" required>
                                            <option value="0" selected>------- คำนำหน้า ---------</option>
                                            <option value="1">นาย</option>
                                            <option value="2">นางสาว</option>
                                            <option value="3">นาง</option>
                                        </select><br>
                                    </div>
                                    <div class="col">
                                        <div class="p-3 ">ชื่อ</div>

                                        <input type="text" class="form-control" id="mem_firstname" name="mem_firstname" placeholder="ชื่อ"><br>
                                    </div>
                                    <div class="col">
                                        <div class="p-3 ">นามสกุล</div>
                                        <input type="text" class="form-control" id="mem_lastname" name="mem_lastname" placeholder="นามสกุล"><br>
                                    </div>

                                </div>


                                <div class="row gx-5">
                                    <div class="col">

                                        <div class="p-3 ">อีเมล</div>
                                        <input type="email" class="form-control" id="mem_email" name="mem_email" placeholder="อีเมล" required oninvalid="this.setCustomValidity('กรุณากรอกอีเมลที่ถูกต้อง')" oninput="setCustomValidity('')"></input>
                                    </div>
                                    <input type="hidden" name="mem_role" id="mem_role" value="2">




                                    <div class="col">
                                        <div class="p-3 ">รหัสผ่าน</div>

                                        <input type="password" name="password" class="form-control" id="mem_password" name="mem_password" placeholder="รหัสผ่าน" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required oninvalid="กรุณากรอกรหัสผ่าน"><br>
                                    </div>
                                    <div class=" col">
                                        <div class="p-3 ">ยืนยันรหัสผ่าน</div>
                                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="ยืนยันรหัสผ่าน" required oninvalid="กรุณากรอกรหัสผ่าน"><br>
                                    </div>
                                </div>


                                <div class=" row gx-5 ">
                                    <div class=" col-2">
                                    </div>
                                    <div class="d-grid gap-2 col-6 mx-auto">
                                        <span id='message'> </span>
                                        <br><button class="btn btn-primary" type="submit">สมัครสมาชิก</button>
                                    </div>

                                    <div class="col-2"></div>
                                </div>
                            </form>
                            <!-- <form name="thisForm">

Please Enter the One number, One small letter, One capital letter

Password: <input type='text' name="password"/>

<input type='button'onclick="ispwdPolicy()" value='Check Field' />
                            </form> -->
                        </div>
                        <div class="col"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function onChange() {
            const password = document.querySelector('input[name=mem_password]');
            const confirm = document.querySelector('input[name=confirm_password]');
            var pwdPolicy = /^\w*(?=\w*\d)(?=\w*[a-z])(?=\w*[A-Z])\w*$/;
            if (pass.match(policy)) {
                else if (confirm.match(policy)) {
                    if (confirm.value === '') {
                        confirm.setCustomValidity('กรุณากรอกรหัสผ่าน');
                    } else if (confirm.value === password.value) {
                        confirm.setCustomValidity('');
                    } else if (confirm.value !== password.value) {
                        confirm.setCustomValidity('รหัสผ่านไม่ตรงกัน');
                    }
                }
            }
        }
    </script>

    /

    <!-- <div id="message">
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>
				
<script>
var myInput = document.getElementById("mem_password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

<title>Insert title here</title>

<script type="text/javascript">

function ispwdPolicy(){

var pwdPolicy =/^\w*(?=\w*\d)(?=\w*[a-z])(?=\w*[A-Z])\w*$/;

var pass=document.thisForm.password.value;

if(pass.match(pwdPolicy)){

return true;

}else{

alert("Please fallow password policy");

document.thisForm.password.focus();

return false;

}

}

</script>
</head>
<body>

<form name="thisForm">

Please Enter the One number, One small letter, One capital letter

Password: <input type='text' name="password"/>

<input type='button'

onclick="ispwdPolicy()" value='Check Field' />

</form>
</body>
</html> -->