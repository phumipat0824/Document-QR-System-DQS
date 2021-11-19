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
                <input type="password" class="form-control"  id="mem_password" name="mem_password" placeholder="รหัสผ่านปัจจุบัน"><br>
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