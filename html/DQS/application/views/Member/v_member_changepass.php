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
            <form action="<?php echo site_url() . 'Member/Member_changepass/changepass' ?>" method="post">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                
                <label style = "color: #000000;  font-size: 15px;" for="">รหัสผ่านปัจจุบัน</label>
                <label style = "color: #FF0000;">*</label>
                <input type="password" class="form-control"  id="mem_password" name="mem_password" placeholder="รหัสผ่านปัจจุบัน" > <br>
                <span id="indicator">
                <label style = "color: #000000;  font-size: 15px;" for="">รหัสผ่านใหม่</label>
                <label style = "color: #FF0000;">*</label>
                <input type="password" class="form-control"  id="new_password" name="new_password" placeholder="รหัสผ่านใหม่"><br>
                <label style = "color: #000000; font-size: 15px;" for="">ยืนยันรหัสผ่านใหม่</label>
                <label style = "color: #FF0000;">*</label>
                <input type="password" class="form-control" id="mem_confirm" name="mem_confirm" placeholder="ยืนยันรหัสผ่านใหม่"><br>
                
                </div>
            </div>
                <center>
                <input type="button" id="btn-ok" style="background-color: #100575; border-radius: 30px; padding-left:50px; padding-right:50px;" name="reset_password" class="btn btn-primary" value='บันทึก'>
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
<script>
     $(document).ready(function() {
    $('#mem_password').keyup(function(){
    var inputpass    =   $('#mem_password').val();
    var oldpass   =   "111";
    if(inputpass!=oldpass){
        $('#indicator').attr({class:'red'});
        $('#regbtn').attr({disabled:true});
    }
    else{
        $('#indicator').attr({class:'green'});
        $('#regbtn').attr({disabled:false});
    }
});
    
    // var typingTimer;                //timer identifier
    // var doneTypingInterval = 5000;  //time in ms, 5 second for example
    // var $input_old_password = $('#mem_password');

    // //on keyup, start the countdown
    // $input_old_password.on('keyup', function () {
    // clearTimeout(typingTimer);
    // typingTimer = setTimeout(doneTyping, doneTypingInterval);
    // });

    // //on keydown, clear the countdown 
    // $input_old_password.on('keydown', function () {
    // clearTimeout(typingTimer);
    // });

    // //user is "finished typing," do something
    // function doneTyping () {
    //     if ($input_old_password == "") {
    //     $(".error-msg").html("กรุณากรอกรหัสผ่านปัจจุบัน.").show();
    //     return false;
    //     }
    //     validate();
    // }
    // function validate() {
    // var password1 = $input_old_password;
    // var password2 = $old_password;
    // if (password1 != password2) {
    //     $(".error-msg").html("รหัสผ่านปัจจุบันไม่ถูกต้อง กรุณากรอกอีกครั้ง").show();
    // }
    // }



    /     // Get the input box
    // let input = document.getElementById('mem_password');

    // // Init a timeout variable to be used below
    // let timeout = null;

    // // Listen for keystroke events
    // input.addEventListener('keyup', function (e) {
    //     // Clear the timeout if it has already been set.
    //     // This will prevent the previous task from executing
    //     // if it has been less than <MILLISECONDS>
    //     clearTimeout(timeout);

    //     // Make a new timeout set to go off in 1000ms (1 second)
    //     timeout = setTimeout(function () {
    //        document.getElementById(".error-msg").innerHTML=input.value;
    //     }, 1000);
    // });
   
    $('form #btn-ok').click(function(e) {
        Swal.fire({
            icon: 'success',
            title: 'เปลี่ยนแปลงรหัสผ่านสำเร็จ',
            showConfirmButton: false,
            timer: 1500
            })
    });
 



    });

    
</script>