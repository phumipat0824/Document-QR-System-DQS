<div class="content">
    <div class="container-fluid" style="padding-top: 100px ;margin: auto;">
        <div class="row gx-5">
            <div class="col-lg-4 col-md-4"></div>
            <div class=" col-lg-4 col-md-4">
                <div class="card">
                    <div class="row justify-content-md-center">
                        <div class="col col-lg-2">

                        </div>
                        <div class="col-md-8 justify-content-md-center">
                            <div class="card-header card-header-warning ">
                                <h2 class="text-center">รีเซ็ตรหัสผ่าน</h2>
                            </div>
                        </div>
                        <div class="col col-lg-2">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2 "></div>
                        <div class="col-8 " style="text-align: left">
                            <br>
                            <form action="<?php echo site_url() . 'Member/Member_login/login' ?>" method="post">
                                <input type="hidden" name="mem_email" id="mem_email" value="<?php echo $mem_email; ?>">
                                <label style = "color: #000000;  font-size: 15px;" for="">รหัสผ่านใหม่</label>
                                <input type="password" class="form-control"  id="mem_password" name="mem_password" placeholder="รหัสผ่านใหม่"><br>
                                <label style = "color: #000000; font-size: 15px;" for="">ยืนยันรหัสผ่านใหม่</label>
                                <input type="password" class="form-control" id="mem_confirm" name="mem_confirm" placeholder="ยืนยันรหัสผ่านใหม่"><br>
                                <input type="button" id="btn-ok" style="background-color: #100575" name="reset_password" class="btn btn-primary" value='รีเซ็ตรหัสผ่าน'>
                            </form>
                        </div>
                        <div class="col-2"></div>

                    </div>

                </div>


            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4"></div>
</div>
</div>
</div>
</div>

