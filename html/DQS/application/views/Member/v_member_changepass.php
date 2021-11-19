<div class="content">
<div class="container-fluid" style="padding-top: 100px ;margin: auto;">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <center><h1 style="color:#003399">บัญชีผู้ใช้งาน</h1></center>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <center><h2 style="color:black">เปลี่ยนรหัสผ่าน</h2></center>
        </div>
    </div>
    <div class="row">

    <div class="col-md-4 offset-md-4">
            <br>
            <form action="<?php echo site_url() . 'Member/Member_changepass/changepass' ?>" method="post">
                <label style = "color: #000000;  font-size: 15px;" for="">รหัสผ่านปัจจุบัน</label>
                <input type="password" class="form-control"  id="mem_password" name="mem_password" placeholder="รหัสผ่านใหม่"><br>
                <label style = "color: #000000;  font-size: 15px;" for="">รหัสผ่านใหม่</label>
                <input type="password" class="form-control"  id="new_password" name="new_password" placeholder="รหัสผ่านใหม่"><br>
                <label style = "color: #000000; font-size: 15px;" for="">ยืนยันรหัสผ่านใหม่</label>
                <input type="password" class="form-control" id="mem_confirm" name="mem_confirm" placeholder="ยืนยันรหัสผ่านใหม่"><br>
                <center>
                <input type="button" id="btn-ok" style="background-color: #100575" name="reset_password" class="btn btn-primary" value='บันทึก'>
                </center>
            </form>
        </div>
    </div>

</div>
</div>
<style>
    body {
        background-color: #eff3f7;
    }
    .col-md-4{
        background-color: white;
    }
</style>
