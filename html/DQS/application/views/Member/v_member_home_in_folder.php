<link href="<?php echo base_url() . 'assets/template/material-dashboard-master' ?>/assets/css/dqs_right_click_menu.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<div class="content">
    <div class="row" style="padding: 100px 10px 10px 20%;">
        <div class="col-md-8">
            <h1 style="color:#003399; font-family:TH Sarabun New; font-weight: 900; font-size: 80px;">คิวอาร์โค้ดของฉัน</h1>
        </div>
        <div class="col-md-4">
            <div class="dropdown">
                <button onmousedown="rightclick()" class="dropbtn btn btn-round" style=" width: 145px; background-color: #F5F5F5 ; border: none;">
                    <h1 style="font-weight: 900; color:#003399 ; font-size: 50px; font-family:TH Sarabun New; height: 40; width: 50px;" id="button-folder">+ สร้าง</h1>
                </button>
                <div id="myDropdown" class="dropdown-content">
                    <div class="custom-cm__item" data-toggle="modal" data-target="#exampleModal"><a>สร้างโฟลเดอร์</a></div>

                    <div class="custom-cm__item"><a href="<?php echo site_url() . '/Member/Member_upload_file/show_member_upload_file'; ?>">อัปโหลดไฟล์</a></div>
                </div>
            </div>
        </div>

        <h3 style="color:#707070; font-family:TH Sarabun New; font-weight: 900;">โฟลเดอร์</h3>
        <br>
        <div>
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" style=" color:#707070; font-weight: 900; font-family:TH Sarabun New; font-size: 25px;" href="<?php echo site_url() .'/Member/Member_home/show_member_home'; ?>">คิวอาร์โค้ดของฉัน</a></li>
                    <?php for($i = 0; $i < count($path_fol); $i++){?>
                       <?php  if($path_fol[$i] != '@' ){?>
                            <li  class="breadcrumb-item text-sm"  ><a class="opacity-5 text-dark" style="color:#707070; font-weight: 900; font-family:TH Sarabun New; font-size: 25px;" href="<?php echo site_url() .'/Member/Member_home/show_in_folder/66'; ?>"><?php echo $path_fol[$i] ?></a></li>
                            <?php }?>
                    <?php }?>
                  </ol>
        </div>
        <br>
        <?php
        for ($i = 0; $i < count($arr_fol); $i++) {   ?>
            <!-- style="margin-left: -200px;" -->
            <div class="col-3">
                <!-- <div class="card card-frame" style=" height: 60px; width: 260px;"> -->
                <div class="dropdown">

                    <button onmousedown="rightclickfolder(<?php echo $arr_fol[$i]->fol_id ?>)" class="dropbtn btn btn-secondary btn-lg" style="border: 1px solid #dddada; height: 60px; width: 260px;">
                        <i class="material-icons" style="margin-left: 1px;" >folder</i>
                        <a style=" font-size: 26px; font-family:TH Sarabun New; margin-right: 300px;" class="menu"><?php echo $arr_fol[$i]->fol_name ?></a>
                    </button>
                    <div id="showmenu" style="display:block">
                        <div id="folder<?php echo $arr_fol[$i]->fol_id ?>" class="dropdown-content">
                            <a href="<?php echo site_url() . '/Member/Member_home/show_in_folder/'; ?><?php echo $arr_fol[$i]->fol_id ?>">เปิด</a>
                            <a href="#" class="editModal" data-toggle="modal" data-target="#editModal" data-id="<?php echo $arr_fol[$i]->fol_id ?>" data-name="<?php echo $arr_fol[$i]->fol_name ?>">แก้ไข</a>
                            <a href="#ย้าย">ย้าย</a>
                            <a href="#" class="deleteModal" data-toggle="modal" data-target="#deleteModal" data-id="<?php echo $arr_fol[$i]->fol_id ?>">ลบ</a>
                        </div>
                    </div>

                </div>
            </div>
            <?php }  ?>
        <!--create Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="exampleModalLabel" style="font-weight: 900;font-size: 36px; font-family:TH Sarabun New;">โฟลเดอร์ใหม่</h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" name="form" action="<?php echo site_url() .'/Member/Member_home/create_folder'; ?>">
                    <div class="modal-body">
                        <center><input style="font-size: 25px;font-family:TH Sarabun New; "  id="fol_name" type="text" class="col-md-10" placeholder="โฟลเดอร์ไม่มีชื่อ" name="fol_name" required></center><br>
                        <a id="target_div" style="display: none; color:red;" align = 'center'>ชื่อโฟลเดอร์ซ้ำ กรุณากรอกใหม่</a>
                        
                    </div>
                    <div class="modal-footer">
                        
                        <input type="hidden" value="<?php  echo $this->session->userdata('fol_location_id'); ?>" name="fol_location_id"></input>
                
                        <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                        <input type="submit" class="btn btn-success" id="create"  value="สร้าง">
                    </div>
                    </form>
                </div>
            </div>
        </div>
   

    <!-- delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ยืนยันการลบโฟลเดอร์</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
            </div>
            <!-- action="<?php echo site_url() ?>/Department/Department_list/add_department" -->
            <form id="delete-form" method="POST" action="<?php echo site_url() . '/Member/Member_home/delete_folder/'; ?>">
                <div class="modal-body">
                    <!-- <center><input type="text" class="col-md-10" placeholder="กรอกชื่อโฟลเดอร์" name="fol_name" required></center> -->
                    <input type="hidden" name="fol_id" id="fol_id" value="">
                    <!-- <input type="hidden" name="fol_name" id="fol_name" value=""> -->
                    <input type="hidden" name="fol_location_id" id="fol_location_id" value="<?php echo $arr_fol[0]->fol_location_id; ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                    <input type="submit" class="btn btn-success" value="บันทึก">
                </div>
            </form>
        </div>
    </div>
</div> 

<!-- edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">แก้ไขชื่อโฟลเดอร์</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
            </div>
            <!-- action="<?php echo site_url() ?>/Department/Department_list/add_department" -->
            <form id="edit-form" method="POST" action="<?php echo site_url() . '/Member/Member_home/update_folder/'; ?>">
                <div class="modal-body">
                    <center><input onkeyup = "check_fol_edit()" type="text" class="col-md-10" id="fol_edit" placeholder="" name="fol_name" required></center>
                    <br>
                    <a id="edit_mss" style="display: none; color:red;" align = 'center'>กรุณากรอกข้อมูลใหม่</a>
                    <input type="hidden" name="fol_id" id="folder_id" value="">
                    <input type="hidden" name="fol_location_id" id="fol_location_id" value="<?php echo $arr_fol[0]->fol_location_id; ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                    <input type="submit" class="btn btn-success" id="edit"  value="บันทึก">
                </div>
            </form>
        </div>
    </div>
</div>


</div>
</div>



<!-- QR-code -->

<div class="row" style="padding: 100px 10px 10px 20%;">
    <h3 style="color:#707070; font-family:TH Sarabun New; font-weight: 900;">คิวอาร์โค้ด</h3>
    <?php for ($i = 0; $i < count($arr_qr); $i++) {   ?>
    <div class="col-md-6">
        <div class="card" id="card-qrcode" style="padding-top: 10px; border-radius: 10px; width:500;">
            <div class="card-header-" style="padding:10px; border-radius: 10px; background-color: #100575; text-align:center;">
                <h style="color:#FFFFFF; font-family:TH Sarabun New; font-size: 25px;">คิวอาร์โค้ด</h>
            </div>

            <!-- Confirm Delete -->
            <div class="delete " id="deletefol">
                <form id="delete-form" method="POST" action="<?php echo site_url() . '/Member/Member_home/delete_folder/'; ?>">
                    <button type="button" class="btn btn-danger" data-dismiss="">ยกเลิก</button>
                    <input name="ยืนยัน" onclick="return confirm('ยืนยันการลบโฟลเดอร์')" type="submit" value="ยืนยัน" />
                </form>
            </div>

            <!-- QR-code -->

            <div class="row" style="padding: 100px 10px 10px 20%;">
                <h3 style="color:#707070; font-family:TH Sarabun New; font-weight: 900;">คิวอาร์โค้ด</h3>
                <?php for ($i = 0; $i < count($arr_qr); $i++) {   ?>
                <div class="col-md-4">
                    <div class="card" id="card-qrcode" style="padding-top: 10px; border-radius: 10px; width:500;">
                        <div class="card-header-" style="padding:10px; border-radius: 10px; background-color: #100575; text-align:center;">
                            <h style="color:#FFFFFF; font-family:TH Sarabun New; font-size: 25px; font-weight:bold;">คิวอาร์โค้ด</h>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-4" id="qrcode">
                                    <img id="img" src="<?php echo base_url() . $arr_qr[$i]->qr_path ?>" height="128" width="128" style="margin: auto;">
                                    <button id="download" onclick="" class="btn btn-warning" style="margin-left:5px;margin-top:15px;font-family:TH sarabun new; font-size: 20px; width: 120; ">ดาวน์โหลด</button>
                                </div>
                                <div class="form-group col-md-4">
                                    <h5 style="color:#000000; font-family:TH Sarabun New; font-size: 20px; font-weight:bold;">ชื่อ : </h5>
                                    <h5 style="color:#000000; font-family:TH Sarabun New; font-size: 20px;"><?php echo $arr_qr[$i]->qr_name ?></h5>

                                    <h5 style="color:#000000; font-family:TH Sarabun New; font-size: 20px; font-weight:bold;">วันที่สร้าง : </h5>
                                    <h5 style="color:#000000; font-family:TH Sarabun New; font-size: 20px;"><?php echo $arr_qr[$i]->qr_datetime ?></h5>

                                    <h5 style="color:#000000; font-family:TH Sarabun New; font-size: 20px; font-weight:bold;">ชนิด : </h5>
                                    <h5 style="color:#000000; font-family:TH Sarabun New; font-size: 20px;">pdf</h5>

                                    <h5 style="color:#000000; font-family:TH Sarabun New; font-size: 20px; font-weight:bold;">ราายงานสรุปผล : </h5>
                                </div>
                                <div class="form-group col-md-4">
                                    <button id="edit" class="btn btn-" style="background-color: #100575; font-family:TH sarabun new; color:#FFFFFF; font-size: 20px; width: 120; ">แก้ไข</button>
                                    <button id="remove" class="btn btn-" style="background-color:#0093EA; font-family:TH sarabun new; color:#FFFFFF; font-size: 20px; width: 70; ">ย้าย</button>
                                    <button id="delete" class="btn btn-" style="background-color:#E02D2D; font-family:TH sarabun new; color:#FFFFFF; font-size: 20px; width: 70; ">ลบ</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }  ?>
            </div>
        </div>
    </div>
    <?php }  ?>
</div>




<script>  
    $(document).on("keyup", "#fol_name", function() {
        var t = <?php echo json_encode($arr_fol ) ?>;
        var new_name = document.getElementById("fol_name");
        var check_name ;
        var div = document.getElementById('target_div');
        var dis_button = document.getElementById('create');
        
        for (let x in t) {
        if(t[x].fol_name == new_name.value){
            check_name = 1;
            break;
        } 
        else{
            check_name = 0;
        }
    }
    console.log(check_name);
    if(check_name == 1){
        $("#fol_name").css("border-color","red");  
           div.style.display = "block";
           dis_button.disabled = true;
           
    }
    else{
            $("#fol_name").css("border-color","green");
            div.style.display = "none";
            dis_button.disabled = false;
            
        }
    });

    function check_fol_edit(){

        var dis_button = document.getElementById('edit');
        dis_button.disabled = false;

        var t = <?php echo json_encode($arr_fol ) ?>;
        var new_name = document.getElementById("fol_edit");
        var check_name ;
        var div = document.getElementById('edit_mss');
        
        
        for (let x in t) {
        if(t[x].fol_name == new_name.value || new_name.value == " "){
            check_name = 1;
            break;
        } 
        else{
            check_name = 0;
        }
    }
    console.log(check_name);
    if(check_name == 1){
        $("#fol_edit").css("border-color","red");  
           div.style.display = "block";
           dis_button.disabled = true;
           
    }
    else{
            $("#fol_edit").css("border-color","green");
            div.style.display = "none";
            dis_button.disabled = false;
            
    }
    }



</script>




<script type="text/javascript">
$(document).on("click", ".editModal", function(){
    var id = $(this).attr('data-id');
    $("#fol_id").val(id);
    console.log(id);
    var name = $(this).attr('data-name');
    $("#fol_name").val(name);
    document.getElementById("folder_id").value = id;
    document.getElementById("fol_edit").placeholder = name;
});



$(document).on("click", ".deleteModal", function(){
    var id = $(this).attr('data-id');
    $("#fol_id").val(id);
    // var name = $(this).attr('data-name');
    // $("#fol_name").val(name);
    
    // console.log(name);
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
            $(document).on("keyup", "#fol_name", function(){
                var t = <?php echo json_encode($arr_fol ) ?>;
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
</script>