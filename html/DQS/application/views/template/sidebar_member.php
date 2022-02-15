<?php 
        if(!$this->session->has_userdata('mem_username')){
            $path = site_url()."/Member/Member_login/show_member_login";
            header("Location: ".$path);
            exit();
        }

?>

<div class="sidebar" data-color="yellow" data-background-color="white" data-image="<?php echo base_url().'/assets/img/sidebar-1.jpg'?>">
    <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
            Document QR
        </a>
    </div>
    <div class="sidebar-wrapper ps-container ps-theme-default ps-active-y" data-ps-id="a5787ac4-4df1-fec6-f8e0-33c5f4784969">
        <ul class="nav">
            <li class="<?= $_SERVER['REQUEST_URI'] == "/DQS/index.php/Member/Member_home/show_member_home" ?  'active'  : '' ?> ">
                <a class="nav-link" href="<?php echo site_url().'/Member/Member_home/show_member_home'?>">
                    <i class="fas fa-folder" style="color: rgb(125, 123, 122);"></i>
                    <p style="color: rgb(0,0,0); ">คิวอาร์โค้ดของฉัน</p>
                </a>
            </li>

            <li class="<?= $_SERVER['REQUEST_URI'] == "/DQS/index.php/Member/Member_change_password/show_change_password" ?  'active'  : '' ?> ">
                <a class="nav-link" href="<?php echo site_url().'/Member/Member_change_password/show_change_password'?>">
                    <i class="fas fa-cog" style="color: rgb(125, 123, 122);"></i>
                    <p style="color: rgb(0,0,0); ">จัดการบัญชีผู้ใช้งาน</p>
                </a>
            </li>
            <li class="<?= $_SERVER['REQUEST_URI'] == "/DQS/index.php/Member/Member_report/show_member_report" ?  'active'  : '' ?> ">
                <a class="nav-link" href="<?php echo site_url().'/Member/Member_report/show_member_report'?>">
                    <i class="fas fa-chart-bar" style="color: rgb(125, 123, 122);"></i>
                    <p style="color: rgb(0,0,0); ">รายงานสรุปผล</p>
                </a>
            </li>

        </ul>
        <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
            <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;">
            </div>
        </div>
        <div class="ps-scrollbar-y-rail" style="top: 0px; right: 0px; height: 333px;">
            <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 214px;">
            </div>
        </div>
        <hr style="height:2px;width:70%;border-width:0;color:gray;background-color:gray;margin-left: auto;margin-right: auto;">
    </div>
    <div class="sidebar-background" style="background-image: url(../assets/img/sidebar-1.jpg) ">
    </div>

</div>