 <!--* v_member_home
                * Display show_member_home , 
                * @input  -
                * @output show folder
                * @author Pongthorn
                * @Create Date 2565-13-01
*/ -->
 <link href="<?php echo base_url() . 'assets/template/material-dashboard-master' ?>/assets/css/dqs_right_click_menu.css"
     rel="stylesheet" />
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 <?php $this->session->set_userdata('fol_id_new', ''); ?>
 <?php $this->session->set_userdata('path_new', ''); ?>

 <div class="content">
     <div class="row" style="padding: 100px 10px 10px 20%;">
         <div class="col-md-8">
             <h1 style="color:#003399; font-family:TH Sarabun New; font-weight: 900; font-size: 80px;">คิวอาร์โค้ดของฉัน
             </h1>
         </div>
         <div class="col-md-4">
             <div class="dropdown">
                 <button onmousedown="rightclick()" class="dropbtn btn btn-round"
                     style=" width: 145px; background-color: #F5F5F5 ; border: none;">
                     <h1 style="font-weight: 900; color:#003399 ; font-size: 50px; font-family:TH Sarabun New; height: 40; width: 50px;"
                         id="button-folder">+ สร้าง</h1>
                 </button>
                 <div id="myDropdown" class="dropdown-content">
                     <div class="custom-cm__item" data-toggle="modal" data-target="#exampleModal"><a>สร้างโฟลเดอร์</a>
                     </div>
                     <?php if ($this->session->userdata('fol_id') == null) { ?>
                     <div class="custom-cm__item"><a
                             href="<?php echo site_url() . '/Member/Member_upload_file/show_member_upload_file/'; ?>">อัปโหลดไฟล์</a>
                     </div>
                     <?php } else { ?>
                     <div class="custom-cm__item"><a
                             href="<?php echo site_url() . '/Member/Member_upload_file/show_member_upload_file_in_floder/' . $this->session->userdata('fol_id'); ?>">อัปโหลดไฟล์</a>
                     </div>
                     <?php } ?>
                 </div>
             </div>
         </div>

         <h3 style="color:#707070; font-family:TH Sarabun New; font-weight: 900;">โฟลเดอร์</h3>
         <br>
         <div>
             <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">

                 <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark"
                         style="color:#707070; font-weight: 900; font-family:TH Sarabun New; font-size: 25px;"
                         href="<?php echo site_url() . '/Member/Member_home/show_member_home'; ?>">หน้าหลัก</a></li>
                 <?php for ($i = 0; $i < count($path_fol); $i++) { ?>
                 <?php if ($path_fol[$i] != '@') { ?>
                 <li class="breadcrumb-item text-sm text-dark active" style="font-size: 20px;"><a
                         class="opacity-5 text-dark"
                         style="color:#707070;  font-weight: 900; font-family:TH Sarabun New; font-size: 25px;"
                         href="<?php echo site_url() . '/Member/Member_home/show_in_folder/66'; ?>"><?php echo $path_fol[$i] ?></a>
                 </li>
                 <?php } ?>
                 <?php } ?>
             </ol>
         </div>
         <br>
         <br>
         <?php

            for ($i = 0; $i < count($arr_fol); $i++) {   ?>

         <div class="col-3">

             <div class="dropdown">
                 <?php if ($arr_fol[$i]->fol_name == 'เอกสารราชการ') { ?>
                 <!--  โฟลเดอร์พิเศษ -->
                 <button onmousedown="rightclickfolder(<?php echo $arr_fol[$i]->fol_id ?>)"
                     class="dropbtn btn btn-secondary btn-lg"
                     style=" background-color:#a19078; border: 2px solid #876a43; height: 60px; width: 300px;">
                     <img src="<?php echo base_url() . '/assets/image/foldersecurity.png' ?>" height="35" width="35"
                         style="margin-left: -20px;">
                     <a style=" font-size: 26px; font-weight:900; font-family:TH Sarabun New; margin-right: 300px;"
                         class="menu"><?php echo $arr_fol[$i]->fol_name ?></a>
                 </button>
                 <div id="showmenu" style="display:block">
                     <div id="folder<?php echo $arr_fol[$i]->fol_id ?>" class="dropdown-content">
                         <a
                             href="<?php echo site_url() . '/Member/Member_home/show_in_folder/'; ?><?php echo $arr_fol[$i]->fol_id ?>">เปิด</a>

                     </div>
                 </div>
                 <?php } else if ($arr_fol[$i]->fol_name == 'เอกสารการประชุม') { ?>
                 <!--  โฟลเดอร์พิเศษ -->
                 <button onmousedown="rightclickfolder(<?php echo $arr_fol[$i]->fol_id ?>)"
                     class="dropbtn btn btn-secondary btn-lg"
                     style=" background-color:#4876d3; border: 2px solid #002b83; height: 60px; width: 300px;">
                     <img src="<?php echo base_url() . '/assets/image/foldersecurity.png' ?>" height="35" width="35"
                         style="margin-left: -20px;">
                     <a style=" font-size: 26px; font-weight:900; font-family:TH Sarabun New; margin-right: 300px;"
                         class="menu"><?php echo $arr_fol[$i]->fol_name ?></a>
                 </button>
                 <div id="showmenu" style="display:block">
                     <div id="folder<?php echo $arr_fol[$i]->fol_id ?>" class="dropdown-content">
                         <a
                             href="<?php echo site_url() . '/Member/Member_home/show_in_folder/'; ?><?php echo $arr_fol[$i]->fol_id ?>">เปิด</a>

                     </div>
                 </div>

                 <?php } else { ?>
                 <!--  โฟลเดอร์ปกติ -->
                 <?php
                            $sub_name_folder = $arr_fol[$i]->fol_name;
                            // if (strlen($sub_name_folder) > 30) {
                            //     $sub_name_folder = substr($sub_name_folder, 0, 30,) . "...";
                            // }
                            if (preg_match('/^[a-z]+/i', $sub_name_folder)) {
                                if (strlen($sub_name_folder) > 18) {
                                    $sub_name_folder = substr($sub_name_folder, 0, 18) . "...";
                                }                               
                            }
                            else{
                                if (strlen($sub_name_folder) > 60) {
                                    $sub_name_folder = substr($sub_name_folder, 0, 60) . "...";
                                }    
                            }
                            ?>

                 <button onmousedown="rightclickfolder(<?php echo $arr_fol[$i]->fol_id ?>)"
                     class="dropbtn btn btn-secondary btn-lg" data-placement="bottom"
                     title="<?php echo $arr_fol[$i]->fol_name ?>"
                     style=" background-color:#ffff; border: 2px solid#c7c6c4; height: 60px; width: 300px;">
                     <i class="material-icons" style="margin-left: -20px; font-size:30px;  color:#f3ff41;">folder</i>
                     <a style=" font-size: 26px; font-weight:900; font-family:TH Sarabun New; margin-right: 300px;"
                         class="menu"><?php echo  $sub_name_folder ?></a>
                 </button>
                 <div id="showmenu" style="display:block">
                     <div id="folder<?php echo $arr_fol[$i]->fol_id ?>" class="dropdown-content">
                         <a
                             href="<?php echo site_url() . '/Member/Member_home/show_in_folder/'; ?><?php echo $arr_fol[$i]->fol_id ?>">เปิด</a>
                         <a href="#" class="editModal" data-toggle="modal" data-target="#editModal"
                             data-id="<?php echo $arr_fol[$i]->fol_id ?>"
                             data-name="<?php echo $arr_fol[$i]->fol_name ?>">แก้ไข</a>
                         <a href="#" class="moveModal" data-toggle="modal" data-target="#moveModal"
                             data-id="<?php echo $arr_fol[$i]->fol_id ?>"
                             data-name="<?php echo $arr_fol[$i]->fol_name ?>">ย้าย</a>
                         <a href="#" class="deleteModal" data-toggle="modal" data-target="#deleteModal"
                             data-id="<?php echo $arr_fol[$i]->fol_id ?>">ลบ</a>
                     </div>
                 </div>
                 <?php } ?>

             </div>
         </div>
         <?php }  ?>
         <!-- /*
    * create folder
    * create folder
    * @input folder name
    * @output show folder
    * @author Pongthorn
    * @Create Date 2565-13-01
*/ -->
         <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
             <div class="modal-dialog" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h1 class="modal-title" id="exampleModalLabel"
                             style="font-weight: 900;font-size: 36px; font-family:TH Sarabun New;">โฟลเดอร์ใหม่</h1>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <form method="POST" name="form"
                         action="<?php echo site_url() . '/Folder/Folder_management/insert_folder'; ?>">
                         <div class="modal-body">
                             <center><input style="font-size: 25px;font-family:TH Sarabun New; " id="fol_name"
                                     type="text" class="col-md-10" placeholder="โฟลเดอร์ไม่มีชื่อ" name="fol_name"
                                     required></center><br>
                             <a id="target_div" style="display: none; color:red;" align='center'>ชื่อโฟลเดอร์ซ้ำ
                                 กรุณากรอกใหม่</a>

                         </div>
                         <div class="modal-footer">

                             <input type="hidden" value="<?php echo $arr_fol[0]->fol_location_id ?>"
                                 name="fol_location_id"></input>

                             <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                             <input type="submit" class="btn btn-success" id="create" value="สร้าง">
                         </div>
                     </form>
                 </div>
             </div>
         </div>
         <!-- /*
    * delete folder
    * delete folder
    * @input  -
    * @output show folder 
    * @author Onticha
    * @Create Date 2565-13-01
*/ -->

         <!-- delete Modal -->
         <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
             <div class="modal-dialog" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">ยืนยันการลบโฟลเดอร์</h5>

                     </div>

                     <form id="delete-form" method="POST"
                         action="<?php echo site_url() . '/Folder/Folder_management/delete_folder/'; ?>">
                         <div class="modal-body">
                             <input type="hidden" name="fol_id" id="fol_id" value="">

                             <input type="hidden" name="fol_location_id" id="fol_location_id"
                                 value="<?php echo $arr_fol[0]->fol_location_id; ?>">
                         </div>
                         <div class="modal-footer">
                             <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                             <input type="submit" class="btn btn-success" value="ยืนยัน">
                         </div>
                     </form>
                 </div>
             </div>
         </div>

         <!-- /*
    * edit folder
    * edit folder
    * @input folder name
    * @output show folder edit
    * @author Onticha
    * @Create Date 2565-13-01
*/ -->
         <!-- edit Modal -->
         <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
             <div class="modal-dialog" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">แก้ไขชื่อโฟลเดอร์</h5>

                     </div>
                     <form id="edit-form" method="POST"
                         action="<?php echo site_url() . '/Folder/Folder_management/update_folder/'; ?>">
                         <div class="modal-body">
                             <center><input onkeyup="check_fol_edit()" type="text" class="col-md-10" id="fol_edit"
                                     placeholder="" name="fol_name" required></center>
                             <br>
                             <a id="edit_mss" style="display: none; color:red;" align='center'>กรุณากรอกข้อมูลใหม่</a>
                             <input type="hidden" name="fol_id" id="folder_id" value="">
                             <input type="hidden" name="fol_location_id" id="fol_location_id"
                                 value="<?php echo $arr_fol[0]->fol_location_id; ?>">
                         </div>
                         <div class="modal-footer">
                             <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                             <input type="submit" class="btn btn-success" id="edit" value="บันทึก">
                         </div>
                     </form>
                 </div>
             </div>
         </div>

         <!-- /*
    * move folder
    * Display show_member_home
    * @input -
    * @output show folder move
    * @author chanyapat
    * @Create Date 2565-13-01
*/ -->
         <!-- start move Modal -->
         <div class="modal fade" id="moveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
             <div class="modal-dialog" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">ย้ายไปที่</h5>
                     </div>
                     <form id="move-form" method="POST"
                         action="<?php echo site_url() . '/Folder/Folder_management/move_folder/';?>">
                         <div class="modal-body">
                             <!-- dropdown folder name -->
                             <div id="select_move"></div>
                         </div>
                         <div class="modal-footer">
                             <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                             <input type="submit" class="btn btn-success" value="บันทึก">
                             <input type="hidden" name="fol_id" id="fold_id" value="">
                             <input type="hidden" name="fol_name" id="folder_name" value="">
                         </div>
                     </form>
                 </div>
             </div>
         </div>
         <!-- end move Modal -->


     </div>
 </div>


 <!-- QR-code -->

 <html>

 <head>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <style>
     * {
         box-sizing: border-box;
     }

     .right {
         border: 3px solid #000000;
         width: 25%;
         padding: 15px 15px;
         margin-top: 10px;
         border-radius: 45px;
     }
     </style>

 <body>

 </body>
 </head>

 </html>


 <div class="row" style="padding: 100px 10px 10px 20%;">
     <h3 style="color:#707070; font-family:TH Sarabun New; font-weight: 900;">คิวอาร์โค้ด</h3>
     <?php for ($i = 0; $i < count($arr_qr); $i++) {   ?>
     <<<<<<< HEAD <?php if ($this->session->userdata('fol_id') == null) { ?>
         <?php if ($arr_qr[$i]->doc_fol_id == null) { ?> <div class="col-md-4">
         <div class="right" id="card-qrcode" style="padding-top: 10px; border-radius: 10px; width:500;">
             <div class="card-header-"
                 style="padding:10px; border-radius: 10px; background-color: #100575; text-align:center;">
                 <h style="color:#FFFFFF; font-family:TH Sarabun New; font-size: 25px; font-weight:bold;">
                     <h5 style="color:#FFFFFF; font-family:TH Sarabun New; font-size: 20px;">
                         <b><?php echo $arr_qr[$i]->qr_name ?></b>
                     </h5>
                 </h>
             </div>

             <div class="card-body">
                 <div class="form-row">
                     <div class="form-group col-md-4" id="qrcode">
                         <img id="img" src="<?php echo base_url() . $arr_qr[$i]->qr_path ?>" height="128" width="128"
                             style="margin: auto;">
                         <button id="download" onclick="" class="btn btn-warning"
                             style="margin-left:5px; margin-top:15px; font-family:TH sarabun new; font-size: 20px; width: 120; "><b>ดาวน์โหลด</b>
                         </button>
                     </div>
                     <div class="form-group col-md-4">
                         <!-- <h5 style="color:#000000; font-family:TH Sarabun New; font-size: 20px; font-weight:bold;">ชื่อ
                             : </h5>
                         <input type="hidden" name="doc_id" id="doc_id" value="">
                         <h5 style="color:#000000; font-family:TH Sarabun New; font-size: 20px;">
                             <?php echo $arr_qr[$i]->qr_name ?></h5> -->
                         =======
                         <?php if ($this->session->userdata('fol_id') == null) { ?>
                         <?php if ($arr_qr[$i]->doc_fol_id == null) { ?>
                         <div class="col-md-4">
                             <div class="card" id="card-qrcode"
                                 style="padding-top: 10px; border-radius: 10px; width:500;">
                                 <div class="card-header-"
                                     style="padding:10px; border-radius: 10px; background-color: #100575; text-align:center;">
                                     <h
                                         style="color:#FFFFFF; font-family:TH Sarabun New; font-size: 25px; font-weight:bold;">
                                         คิวอาร์โค้ด
                                     </h>
                                 </div>
                                 <div class="card-body">
                                     <div class="form-row">
                                         <div class="form-group col-md-4" id="qrcode">
                                             <img id="img" src="<?php echo base_url() . $arr_qr[$i]->qr_path ?>"
                                                 height="128" width="128" style="margin: auto;">
                                             <button id="download" onclick="" class="btn btn-warning"
                                                 style="margin-left:5px;margin-top:15px;font-family:TH sarabun new; font-size: 20px; width: 120; ">ดาวน์โหลด</button>
                                         </div>
                                         <div class="form-group col-md-4">
                                             <h5
                                                 style="color:#000000; font-family:TH Sarabun New; font-size: 20px; font-weight:bold;">
                                                 ชื่อ
                                                 : </h5>
                                             <input type="hidden" name="doc_id" id="doc_id" value="">
                                             <h5 style="color:#000000; font-family:TH Sarabun New; font-size: 20px;">
                                                 <?php echo $arr_qr[$i]->qr_name ?></h5>

                                             <!-- <h5 style="color:#000000; font-family:TH Sarabun New; font-size: 20px; font-weight:bold;">วันที่สร้าง : </h5>
                         <h5 style="color:#000000; font-family:TH Sarabun New; font-size: 20px;"><?php echo $arr_qr[$i]->doc_datetime ?></h5> -->

                                             <h5
                                                 style="color:#000000; font-family:TH Sarabun New; font-size: 20px; font-weight:bold;">
                                                 ชนิด
                                                 : </h5>
                                             <h5 style="color:#000000; font-family:TH Sarabun New; font-size: 20px;">
                                                 <?php echo $arr_qr[$i]->doc_type ?></h5>
                                             >>>>>>> 9e9aa20c96c445f469e43f9070124baf774e3765

                                             <h5
                                                 style="color:#000000; font-family:TH Sarabun New; font-size: 20px; font-weight:bold;">
                                                 <b>วันที่สร้าง :
                                                     <?php echo $arr_qr[$i]->doc_datetime ?>
                                             </h5></b>
                                             <br>
                                             <h5
                                                 style="color:#000000; font-family:TH Sarabun New; font-size: 20px; font-weight:bold;">
                                                 <b>
                                                     ชนิด :
                                                     <!-- <h5 style="color:#000000; font-family:TH Sarabun New; font-size: 20px;"><b> -->
                                                     <?php echo $arr_qr[$i]->doc_type ?>
                                                 </b></h5>
                                             <br>
                                             <h5
                                                 style="color:#000000; font-family:TH Sarabun New; font-size: 20px; font-weight:bold;">
                                                 <b>
                                                     รายงานสรุปผล</b>
                                             </h5>
                                         </div>
                                         <<<<<<< HEAD <div class="form-group col-md-4" style="text-align: center;">
                                             <button id="edit" class="btn btn-"
                                                 style="background-color: #100575; font-family:TH sarabun new; color:#FFFFFF; font-size: 20px; width: 70; "><b>แก้ไข</b>
                                             </button>
                                             =======
                                             <div class="form-group col-md-4">

                                                 <a href="#" class="EditFileModal" data-toggle="modal"
                                                     data-target="#EditFileModal"
                                                     data-id="<?php echo $arr_qr[$i]->qr_id ?>"
                                                     data-name="<?php echo $arr_qr[$i]->qr_name ?>">
                                                     <button id="edit" class="btn btn-"
                                                         style="background-color: #100575; font-family:TH sarabun new; color:#FFFFFF; font-size: 20px; width: 70; ">แก้ไข</button></a>
                                                 >>>>>>> 9e9aa20c96c445f469e43f9070124baf774e3765
                                                 <button id="remove" class="btn btn-"
                                                     style="background-color:#0093EA; font-family:TH sarabun new; color:#FFFFFF; font-size: 20px; width: 70; "><b>ย้าย</b></button>
                                                 <a href="#" class="deleteFileModal" data-toggle="modal"
                                                     data-target="#deleteFileModal"
                                                     onclick="set_delete(<?php echo $arr_qr[$i]->doc_id ?>)">
                                                     <button id="delete" class="btn btn-"
                                                         style="background-color:#E02D2D; font-family:TH sarabun new; color:#FFFFFF; font-size: 20px; width: 70; ">
                                                         <b>ลบ</b></button></a>
                                             </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <?php }  ?>


                         <!-- deleteFile Modal -->
                         <div class="modal fade" id="deleteFileModal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                         <h6 class="modal-title" id="exampleModalLabel"
                                             style="font-family:TH sarabun new; font-size: 30px; "><b>
                                                 ยืนยันการลบเอกสาร</b></h6>

                                     </div>

                                     <form id="deleteFile-form" method="POST"
                                         action="<?php echo site_url() . '/Member/Member_home/delete_file/'.$arr_qr[$i]->doc_id; ?>">
                                         <div class="modal-body">

                                             <input type="hidden" name="doc_id" id="doc_id_delete">


                                         </div>
                                         <div class="modal-footer">
                                             <button type="button" class="btn btn-danger"
                                                 data-dismiss="modal">ยกเลิก</button>
                                             <input type="submit" class="btn btn-success" value="ยืนยัน">
                                         </div>
                                     </form>
                                 </div>
                             </div>
                         </div>

                         <!-- End DeleteFile Model -->

                         <!-- EditFile Modal -->
                         <div class="modal fade" id="EditFileModal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                         <h6 class="modal-title" id="exampleModalLabel"
                                             style="font-family:TH sarabun new; font-size: 30px; ">
                                             <b>แก้ไขชื่อไฟล์
                                         </h6>
                                     </div>

                                     <form id="edit-form" method="POST"
                                         action="<?php echo site_url() .'/Member/Member_home/update_qr_file/'.$arr_qr[$i]->doc_id; ?>">

                                         <div class="modal-body">
                                             <center>
                                                 <input onkeyup="check_file_edit()" type="text" class="col-md-10"
                                                     id="qr_edit" placeholder="" name="qr_name" required>
                                             </center>
                                             <br>
                                             <a id="edit_mss" style="display: none; color:red;"
                                                 align='center'>กรุณากรอกข้อมูลใหม่</a>
                                             <input type="hidden" name="qr_id" id="qr_id" value="">
                                         </div>

                                         <div class="modal-footer">
                                             <button type="button" class="btn btn-danger"
                                                 data-dismiss="modal">ยกเลิก</button>
                                             <input type="submit" class="btn btn-success" id="sub_edit" value="บันทึก">
                                         </div>

                                     </form>
                                 </div>
                             </div>
                         </div>
                         <!-- End UpdateFile Model -->

                         <?php } else{ ?>
                         <?php if ($arr_qr[$i]->doc_fol_id == $this->session->userdata('fol_id')) { ?>
                         <div class="col-md-4">
                             <div class="card" id="card-qrcode"
                                 style="padding-top: 10px; border-radius: 10px; width:500;">
                                 <div class="card-header-"
                                     style="padding:10px; border-radius: 10px; background-color: #100575; text-align:center;">
                                     <h
                                         style="color:#FFFFFF; font-family:TH Sarabun New; font-size: 25px; font-weight:bold;">
                                         คิวอาร์โค้ด
                                     </h>
                                 </div>
                                 <div class="card-body">
                                     <div class="form-row">
                                         <div class="form-group col-md-4" id="qrcode">
                                             <img id="img" src="<?php echo base_url() . $arr_qr[$i]->qr_path ?>"
                                                 height="128" width="128" style="margin: auto;">
                                             <button id="download" onclick="" class="btn btn-warning"
                                                 style="margin-left:5px;margin-top:15px;font-family:TH sarabun new; font-size: 20px; width: 120; ">ดาวน์โหลด</button>
                                         </div>
                                         <div class="form-group col-md-4">
                                             <h5
                                                 style="color:#000000; font-family:TH Sarabun New; font-size: 20px; font-weight:bold;">
                                                 ชื่อ
                                                 : </h5>
                                             <h5 style="color:#000000; font-family:TH Sarabun New; font-size: 20px;">
                                                 <?php echo $arr_qr[$i]->qr_name ?></h5>

                                             <!-- <h5 style="color:#000000; font-family:TH Sarabun New; font-size: 20px; font-weight:bold;">วันที่สร้าง : </h5>
                         <h5 style="color:#000000; font-family:TH Sarabun New; font-size: 20px;"><?php echo $arr_qr[$i]->doc_datetime ?></h5> -->

                                             <h5
                                                 style="color:#000000; font-family:TH Sarabun New; font-size: 20px; font-weight:bold;">
                                                 ชนิด
                                                 : </h5>
                                             <h5 style="color:#000000; font-family:TH Sarabun New; font-size: 20px;">
                                                 <?php echo $arr_qr[$i]->doc_type ?></h5>

                                             <h5
                                                 style="color:#000000; font-family:TH Sarabun New; font-size: 20px; font-weight:bold;">
                                                 รายงานสรุปผล : </h5>
                                         </div>
                                         <div class="form-group col-md-4">
                                             <button id="edit2" class="btn btn-"
                                                 style="background-color: #100575; font-family:TH sarabun new; color:#FFFFFF; font-size: 20px; width: 70; ">แก้ไข</button>
                                             <button id="remove2" class="btn btn-"
                                                 style="background-color:#0093EA; font-family:TH sarabun new; color:#FFFFFF; font-size: 20px; width: 70; ">ย้าย</button>
                                             <button id="delete2" class="btn btn-"
                                                 style="background-color:#E02D2D; font-family:TH sarabun new; color:#FFFFFF; font-size: 20px; width: 70; ">ลบ</button>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <?php }  ?>
                         <?php }  ?>
                         <?php }  ?>

                         <!-- /*
    * move file
    * Display modal move file
    * @input -
    * @output show file move
    * @author natruja
    * @Create Date 2565-03-21
    */ -->
                         <!-- Move File Modal -->
                         <div class="modal fade" id="MoveFileModal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                         <h5 class="modal-title" id="MoveFileModalLabel">ย้ายไฟล์ไปที่</h5>
                                     </div>
                                     <form id="move-form" method="POST"
                                         action="<?php echo site_url() . '/File/File_management/move_file/'; ?>">
                                         <div class="modal-body">
                                             <input type="hidden" name="doc_id" id="file_id" value="">
                                             <input type="hidden" name="qr_id" id="qrcode_id" value="">
                                             <!-- dropdown folder name -->
                                             <select name="doc_fol_id" id="doc_fol_id" class="form-select"
                                                 aria-label="Default select example" placeholder="" required>
                                                 <option value="" disabled selected hidden>เลือกโฟลเดอร์</option>
                                                 <option value='0'>หน้าหลัก</option>
                                                 <?php for ($i = 0; $i < count($arr_folder); $i++) {   ?>
                                                 <?php if ($arr_folder[$i]->fol_mem_id == $this->session->userdata('mem_id')) { ?>
                                                 <option value='<?php echo $arr_folder[$i]->fol_id ?>'>
                                                     <?php echo $arr_folder[$i]->fol_name ?></option>
                                                 <?php } ?>
                                                 <?php } ?>
                                             </select><br>
                                         </div>
                                         <div class="modal-footer">
                                             <button type="button" class="btn btn-danger"
                                                 data-dismiss="modal">ยกเลิก</button>
                                             <input type="submit" class="btn btn-success" value="บันทึก">
                                             <input type="hidden" name="doc_name" id="file_name" value="">
                                             <input type="hidden" name="qr_name" id="qrcode_name" value="">

                                         </div>
                                     </form>
                                 </div>
                             </div>
                         </div>
                         <!-- End move file modal -->


                     </div>




                     <script>
                     <?php $this->session->set_userdata('fol_id', ''); ?>
                     <?php $this->session->set_userdata('path', ''); ?>
                     $(document).on("keyup", "#fol_name", function() {
                         var t = <?php echo json_encode($arr_fol) ?>;
                         var new_name = document.getElementById("fol_name");
                         var check_name;
                         var div = document.getElementById('target_div');
                         var dis_button = document.getElementById('create');

                         for (let x in t) {
                             if (t[x].fol_name == new_name.value) {
                                 check_name = 1;
                                 break;
                             } else {
                                 check_name = 0;
                             }
                         }
                         console.log(check_name);
                         if (check_name == 1) {
                             $("#fol_name").css("border-color", "red");
                             div.style.display = "block";
                             dis_button.disabled = true;

                         } else {
                             $("#fol_name").css("border-color", "green");
                             div.style.display = "none";
                             dis_button.disabled = false;

                         }
                     });

                     function check_fol_edit() {

                         var dis_button = document.getElementById('edit');
                         dis_button.disabled = false;

                         var t = <?php echo json_encode($arr_fol) ?>;
                         var new_name = document.getElementById("fol_edit");
                         var check_name;
                         var div = document.getElementById('edit_mss');


                         for (let x in t) {
                             if (t[x].fol_name == new_name.value || new_name.value == " ") {
                                 check_name = 1;
                                 break;
                             } else {
                                 check_name = 0;
                             }
                         }
                         console.log(check_name);
                         if (check_name == 1) {
                             $("#fol_edit").css("border-color", "red");
                             div.style.display = "block";
                             dis_button.disabled = true;

                         } else {
                             $("#fol_edit").css("border-color", "green");
                             div.style.display = "none";
                             dis_button.disabled = false;

                         }
                     }
                     </script>




                     <script type="text/javascript">
                     $(document).on("click", ".editModal", function() {
                         var id = $(this).attr('data-id');
                         $("#fol_id").val(id);
                         console.log(id);
                         var name = $(this).attr('data-name');
                         $("#fol_name").val(name);
                         document.getElementById("folder_id").value = id;
                         document.getElementById("fol_edit").value = name;
                     });

                     $(document).on("click", ".EditFileModal", function() {
                         var id = $(this).attr('data-id');
                         $("#qr_id").val(id);
                         console.log(id);
                         var name = $(this).attr('data-name');
                         $("#qr_name").val(name);
                         document.getElementById("qr_id").value = id;
                         document.getElementById("qr_edit").value = name;
                     });

                     $(document).on("click", ".deleteModal", function() {
                         var id = $(this).attr('data-id');
                         $("#fol_id").val(id);

                     });

                     $(document).on("click", ".exampleModal", function() {
                         var id = $(this).attr('data-id');
                         $("#fol_id").val(id);

                     });


                     var cm = document.querySelector(".custom-cm");

                     function showContextMenu(show = true) {
                         cm.style.display = show ? "block" : "none";
                     }

                     window.addEventListener("contextmenu", e => {
                         e.preventDefault();

                         showContextMenu();
                         cm.style.top =
                             e.y + cm.offsetHeight > window.innerHeight ?
                             window.innerHeight - cm.offsetHeight :
                             e.y;
                         cm.style.left =
                             e.x + cm.offsetWidth > window.innerWidth ?
                             window.innerWidth - cm.offsetWidth :
                             e.x;
                     });


                     $(document).on("click", ".editModal", function() {
                         var id = $(this).attr('data-id');
                         $("#dep_id").val(id);
                     });

                     function rightclick() {
                         var rightclick;
                         var e = window.event;

                         document.getElementById("myDropdown").classList.toggle("show");
                         if (!event.target.matches('.dropbtn')) {
                             var dropdowns = document.getElementsByClassName("dropdown-content");
                             var i;
                             for (i = 0; i < dropdowns.length; i++) {
                                 var openDropdown = dropdowns[i];
                                 if (openDropdown.classList.contains('show')) {
                                     openDropdown.classList.remove('show');
                                 }
                             }
                         }
                     }
                     </script>
                     <script>
                     $(document).on("keyup", "#fol_name", function() {
                         var t = <?php echo json_encode($arr_fol) ?>;
                         var new_name = document.getElementById("fol_name");
                         var check_name;
                         var div = document.getElementById('target_div');
                         var dis_button = document.getElementById('create');

                         for (let x in t) {
                             if (t[x].fol_name == new_name.value) {
                                 check_name = 1;
                                 break;
                             } else {
                                 check_name = 0;
                             }
                         }
                         console.log(check_name);
                         if (check_name == 1) {
                             $("#fol_name").css("border-color", "red");
                             div.style.display = "block";
                             dis_button.disabled = true;

                         } else {
                             $("#fol_name").css("border-color", "green");
                             div.style.display = "none";
                             dis_button.disabled = false;

                         }
                     });
                     </script>
                     <script type="text/javascript">
                     $(document).on("click", ".editModal", function() {
                         var id = $(this).attr('data-id');
                         $("#fol_id").val(id);
                     });


                     var cm = document.querySelector(".custom-cm");

                     function showContextMenu(show = true) {
                         cm.style.display = show ? "block" : "none";
                     }

                     window.addEventListener("contextmenu", e => {
                         e.preventDefault();

                         showContextMenu();
                         cm.style.top =
                             e.y + cm.offsetHeight > window.innerHeight ?
                             window.innerHeight - cm.offsetHeight :
                             e.y;
                         cm.style.left =
                             e.x + cm.offsetWidth > window.innerWidth ?
                             window.innerWidth - cm.offsetWidth :
                             e.x;
                     });


                     $(document).on("click", ".editModal", function() {
                         var id = $(this).attr('data-id');
                         $("#dep_id").val(id);
                     });

                     function rightclick() {
                         var rightclick;
                         var e = window.event;

                         document.getElementById("myDropdown").classList.toggle("show");
                         if (!event.target.matches('.dropbtn')) {
                             var dropdowns = document.getElementsByClassName("dropdown-content");
                             var i;
                             for (i = 0; i < dropdowns.length; i++) {
                                 var openDropdown = dropdowns[i];
                                 if (openDropdown.classList.contains('show')) {
                                     openDropdown.classList.remove('show');
                                 }
                             }
                         }


                     }


                     function rightclickfolder(folder) {
                         var rightclick;
                         var e = window.event;
                         var getnamefolder = 'folder' + folder;
                         var x = document.getElementById("showmenu");

                         if (e.button == 2) {
                             document.getElementById(getnamefolder).classList.toggle("show");
                             if (!event.target.matches('.dropbtn')) {
                                 var dropdowns = document.getElementsByClassName("dropdown-content");
                                 var i;
                                 for (i = 0; i < dropdowns.length; i++) {
                                     var openDropdown = dropdowns[i];
                                     if (x.style.display === "block") {
                                         x.style.display = "none";
                                     } else {
                                         x.style.display = "block";
                                     }
                                     if (openDropdown.classList.contains('show')) {
                                         openDropdown.classList.remove('show');
                                     }
                                 }
                             }
                         }

                     }

                     $(document).on("click", ".moveModal", function() {
                         var id = $(this).attr('data-id');
                         $("#fol_id").val(id);
                         var name = $(this).attr('data-name');
                         $("#fol_name").val(name);
                         var x = document.getElementById("fold_id").value = id;
                         document.getElementById("folder_name").value = name;
                         console.log(x);
                         console.log(name);
                     });

                     $(document).on("click", ".MoveFileModal", function() {
                         var id = $(this).attr('data-id');
                         $("#doc_id").val(id);
                         var name = $(this).attr('data-name');
                         $("#doc_name").val(name);
                         var qr_id = $(this).attr('data-qr-id');
                         $("#qr_id").val(qr_id);
                         var qr_name = $(this).attr('data-qr-name');
                         $("#qr_name").val(qr_name);
                         document.getElementById("file_id").value = id;
                         document.getElementById("file_name").value = name;
                         document.getElementById("qrcode_id").value = qr_id;
                         document.getElementById("qrcode_name").value = qr_name;
                         console.log(id);
                         console.log(name);

                     });


                     $(document).ready(function() {
                         $('.dropdown-submenu a.test').on("click", function(e) {
                             $(this).next('ul').toggle();
                             e.stopPropagation();
                             e.preventDefault();
                         });
                     }); <<
                     << << < HEAD

                     function set_delete(id) {
                         $('#doc_id_delete').val(id);
                     } ===
                     === =
                     $(document).on("click", ".editModal", function() {
                         var id = $(this).attr('data-id');
                         $("#fol_id").val(id);
                     });


                     var cm = document.querySelector(".custom-cm");

                     function showContextMenu(show = true) {
                         cm.style.display = show ? "block" : "none";
                     }

                     window.addEventListener("contextmenu", e => {
                         e.preventDefault();

                         showContextMenu();
                         cm.style.top =
                             e.y + cm.offsetHeight > window.innerHeight ?
                             window.innerHeight - cm.offsetHeight :
                             e.y;
                         cm.style.left =
                             e.x + cm.offsetWidth > window.innerWidth ?
                             window.innerWidth - cm.offsetWidth :
                             e.x;
                     });


                     $(document).on("click", ".editModal", function() {
                         var id = $(this).attr('data-id');
                         $("#dep_id").val(id);
                     });

                     function rightclick() {
                         var rightclick;
                         var e = window.event;

                         document.getElementById("myDropdown").classList.toggle("show");
                         if (!event.target.matches('.dropbtn')) {
                             var dropdowns = document.getElementsByClassName("dropdown-content");
                             var i;
                             for (i = 0; i < dropdowns.length; i++) {
                                 var openDropdown = dropdowns[i];
                                 if (openDropdown.classList.contains('show')) {
                                     openDropdown.classList.remove('show');
                                 }
                             }
                         }


                     }


                     function rightclickfolder(folder) {
                         var rightclick;
                         var e = window.event;
                         var getnamefolder = 'folder' + folder;
                         var x = document.getElementById("showmenu");

                         if (e.button == 2) {
                             document.getElementById(getnamefolder).classList.toggle("show");
                             if (!event.target.matches('.dropbtn')) {
                                 var dropdowns = document.getElementsByClassName("dropdown-content");
                                 var i;
                                 for (i = 0; i < dropdowns.length; i++) {
                                     var openDropdown = dropdowns[i];
                                     if (x.style.display === "block") {
                                         x.style.display = "none";
                                     } else {
                                         x.style.display = "block";
                                     }
                                     if (openDropdown.classList.contains('show')) {
                                         openDropdown.classList.remove('show');
                                     }
                                 }
                             }
                         }

                     }

                     $(document).ready(function() {
                         $('.dropdown-submenu a.test').on("click", function(e) {
                             $(this).next('ul').toggle();
                             e.stopPropagation();
                             e.preventDefault();
                         });
                     });
                     </script>

                     <!-- Move Folder Script -->
                     <script>
                     $(document).on("click", ".moveModal", function() {
                         var fol_id = $(this).attr('data-id');
                         $("#fol_id").val(fol_id);
                         var name = $(this).attr('data-name');
                         $("#fol_name").val(name);
                         var x = document.getElementById("fold_id").value = fol_id;
                         document.getElementById("folder_name").value = name;

                         $.ajax({
                             type: 'post',
                             url: '<?php echo site_url() . 'Folder/Folder_management/get_dropdown_data_ajax'; ?>',
                             data: {
                                 'fol_id': fol_id
                             },
                             dataType: 'json',
                             success: function(json_data) {
                                 console.log(json_data);

                                 //สร้าง select รอไว้ แล้วค่อยใส่ option ทีหลัง
                                 let html_select =
                                     "<select name='fol_location_id' id='folder_location_id' class='form-select' aria-label='Default select example' placeholder='เลือกโฟลเดอร์' required>'</select>";
                                 $('#select_move').html(html_select);
                                 let html_option =
                                     '<option value="" disabled selected hidden>เลือกโฟลเดอร์</option>';
                                 $('#folder_location_id').html(html_option);

                                 let obj_level = json_data['arr_level'];
                                 let current_path = json_data['current_path'];


                                 if (obj_level[1].length == 0) {

                                     //กรณีไม่มีข้อมูล
                                     html_option = ' <option value="none">ไม่พบข้อมูล</option>';
                                     $('#folder_location_id').html(html_option);
                                 } //if
                                 else {
                                     // html_option = '<option value="" disabled selected hidden>เลือกโฟลเดอร์</option>';
                                     // $('#folder_location_id').prepend(html_option);
                                     //กรณีมีข้อมูล

                                     let max_level = Object.keys(obj_level).length;
                                     let prefix = '&nbsp'; //สัญลักษณ์ข้างหน้าแต่ละ level

                                     for (level = 1; level <= max_level; level++) {

                                         if (level == 1) {
                                             html_option =
                                                 '<option value="" disabled selected hidden>เลือกโฟลเดอร์</option>';
                                             for (i = 0; i < obj_level[level].length; i++) {

                                                 //ลูกของตัวที่ถูกเลือก จะต้องกดไม่ได้
                                                 let disable = '';
                                                 if (obj_level[level][i]["fol_location"].includes(
                                                         current_path + '/') || obj_level[level][i][
                                                         "fol_location"
                                                     ] == current_path) {
                                                     disable = ' disabled ';
                                                 } //if

                                                 html_option += '<option ' + disable + ' id="fol_' +
                                                     obj_level[level][i]["fol_id"] + '" value="' +
                                                     obj_level[level][i]["fol_id"] + '">';
                                                 html_option += obj_level[level][i]["fol_name"];
                                                 html_option += '</option>';

                                             } //for

                                             $('#folder_location_id').html(html_option);
                                         } //if
                                         else {
                                             if (level == 2) {
                                                 let disable = '';
                                                 if (json_data['is_level_1'] == true) {
                                                     disable = ' disabled  hidden ';
                                                 } //if

                                                 html_option = '<option value="0"' + disable +
                                                     ' > หน้าหลัก</option>';
                                                 $('#folder_location_id').prepend(html_option);
                                             } //if

                                             prefix = prefix + '&nbsp' + '&nbsp' + '-';

                                             //แทรกลูกหลังจากตำแหล่งแม่ (ทำจากหลังมาหน้า ลำดับจะไม่เพี้ยน)
                                             for (i = obj_level[level].length - 1; i >= 0; i--) {

                                                 //ลูกของตัวที่ถูกเลือก จะต้องกดไม่ได้
                                                 let disable = '';
                                                 if (obj_level[level][i]["fol_location"].includes(
                                                         current_path + '/') || obj_level[level][i][
                                                         "fol_location"
                                                     ] == current_path) {
                                                     disable = ' disabled ';
                                                 } //if

                                                 html_option = '';
                                                 html_option += '<option ' + disable + ' id="fol_' +
                                                     obj_level[level][i]["fol_id"] + '" value="' +
                                                     obj_level[level][i]["fol_id"] + '">';
                                                 html_option += prefix + ' ' + obj_level[level][i][
                                                     "fol_name"
                                                 ];
                                                 html_option += '</option>';


                                                 //แทรกโค้ดลูก หลังจากตำแหล่งโค้ดแม่
                                                 var tag_parent = document.getElementById('fol_' +
                                                     obj_level[level][i]["fol_location_id"]);
                                                 tag_parent.insertAdjacentHTML('afterend',
                                                     html_option);
                                             } //for
                                         } //else

                                     } //for

                                 } //else
                             }
                         }); //ajax
                     }); //get_dropdown_data
                     </script>

                     <!-- EditFile Script -->
                     <script>
                     <?php $this->session->set_userdata('qr_id', ''); ?>
                     <?php $this->session->set_userdata('path', ''); ?>
                     $(document).on("keyup", "#qr_name", function() {
                         var t = <?php echo json_encode($arr_doc) ?>;
                         var new_name = document.getElementById("qr_name");
                         var check_name;
                         var div = document.getElementById('target_div');
                         var dis_button = document.getElementById('create');

                         for (let x in t) {
                             if (t[x].doc_name == new_name.value) {
                                 check_name = 1;
                                 break;
                             } else {
                                 check_name = 0;
                             }
                         }
                         console.log(check_name);
                         if (check_name == 1) {
                             $("#qr_name").css("border-color", "red");
                             div.style.display = "block";
                             dis_button.disabled = true;

                         } else {
                             $("#qr_name").css("border-color", "green");
                             div.style.display = "none";
                             dis_button.disabled = false;

                         }
                     });

                     function check_file_edit() {

                         var dis_button = document.getElementById('sub_edit');
                         dis_button.disabled = false;

                         var t = <?php echo json_encode($arr_qr) ?>;
                         var new_name = document.getElementById("qr_edit");
                         var check_name;
                         var div = document.getElementById('edit_mss');


                         for (let x in t) {
                             if (t[x].qr_name == new_name.value || new_name.value == " ") {
                                 check_name = 1;
                                 break;
                             } else {
                                 check_name = 0;
                             }
                         }
                         console.log(check_name);
                         if (check_name == 1) {
                             $("#qr_edit").css("border-color", "red");
                             div.style.display = "block";
                             dis_button.disabled = true;

                         } else {
                             $("#qr_edit").css("border-color", "green");
                             div.style.display = "none";
                             dis_button.disabled = false;

                         }
                         console.log(document.getElementById('edit'));
                     } >>>
                     >>> > 9e9 aa20c96c445f469e43f9070124baf774e3765
                     </script>