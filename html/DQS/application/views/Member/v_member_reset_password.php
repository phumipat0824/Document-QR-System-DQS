<div class="content">
    <div class="container-fluid" style="padding-top: 100px ;margin: auto;">
        <div class="row gx-5">
            <div class="col-lg-4 col-md-4"></div>
            <div class=" col-lg-4 col-md-4">
                <div class="card">
                    <div class="row justify-content-md-center">
                        <div class="col-md-8 justify-content-md-center">
                            <div class="card-header card-header-warning ">
                                <h1 class="text-center"style = "font-family:TH sarabun new;">รีเซ็ตรหัสผ่าน</h1>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2 "></div>
                        <div class="col-8 " style="text-align: left">
                            <br>
                            <form action="<?php echo site_url() . '/Member/Member_login/reset_password' ?>" method="post">
                                <input type="hidden" name="mem_id" id="mem_id" value="<?php echo $mem_id ?>">
                                <label style = "color: #000000;  margin-top: 20px;font-size: 15px;font-family:TH sarabun new;" for="">รหัสผ่านใหม่</label>
                                <input type="password" class="form-control" id="mem_password" name="mem_password" placeholder="รหัสผ่านใหม่" onchange="checkpassword()" required oninvalid="this.setCustomValidity('โปรดเลือกรหัสผ่านที่ปลอดภัยยิ่งขึ้น ใช้อักขระ 8 ตัวขึ้นไปสำหรับรหัสผ่าน ใช้ตัวอักษร ตัวเลขผสมกัน')" oninput="this.setCustomValidity('')" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                                <label style = "color: #000000; margin-top: 20px;font-size: 15px;font-family:TH sarabun new;" for="">ยืนยันรหัสผ่านใหม่</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="ยืนยันรหัสผ่านใหม่" onchange="checkpassword()" required oninvalid="this.setCustomValidity('โปรดเลือกรหัสผ่านที่ปลอดภัยยิ่งขึ้น ใช้อักขระ 8 ตัวขึ้นไปสำหรับรหัสผ่าน ใช้ตัวอักษร ตัวเลขผสมกัน')" oninput="this.setCustomValidity('')" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"><br> 
                                <center>
                                <input type="submit" id="btn-ok" style="background-color: #100575; margin-bottom: 20px;font-family:TH sarabun new; " name="reset_password" class="btn btn-primary" value='รีเซ็ตรหัสผ่าน'>
                                </center>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

