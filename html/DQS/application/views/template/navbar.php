<nav class="navbar navbar-expand-lg bg-dark_blue" style="z-index: 6; position: fixed; width: 100%; top:0;">
 
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-bar navbar-kebab"></span>
    <span class="navbar-toggler-bar navbar-kebab"></span>
    <span class="navbar-toggler-bar navbar-kebab"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <img src="<?php echo base_url(). '/assets/image/logo_dqs.PNG' ?>" height="50" width="50">
      <a class="navbar-brand" href="<?php echo base_url() . 'Qrcode/Qrcode_generator/show_qrcode' ?>"><b>Document QR</b></a>
      <form class="form-inline ml-auto">
     
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo base_url() . 'Qrcode/Qrcode_generator/show_qrcode' ?>">สร้างคิวอาร์โค้ด <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url() . 'Member/Member_register/show_member_register' ?>">สมัครสมาชิก</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url() . 'Member/Member_login/show_member_login' ?>">เข้าสู่ระบบ</a>
        </li>
      </ul>
         
      </form>
    </div>
  
</nav>