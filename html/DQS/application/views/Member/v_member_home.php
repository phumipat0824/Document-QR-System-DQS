<link href="<?php echo base_url() . 'assets/template/material-dashboard-master' ?>/assets/css/dqs_right_click_menu.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<div class="content">
<div class="row" style="padding: 100px 10px 10px 20%;"> 
    <div class="col-md-8">
    <h1 style="color:#003399; font-family:TH Sarabun New; font-weight: 900; font-size: 80px;" >คิวอาร์โค้ดของฉัน</h1>
    </div>
    <div class="col-md-4">
    <div class="dropdown">
    <button onmousedown="rightclick()" class="dropbtn btn btn-round"  style=" width: 145px; background-color: #F5F5F5 ; border: none;" >
    <h1 style="font-weight: 900; color:#003399 ; font-size: 50px; font-family:TH Sarabun New; height: 40; width: 50px;" id="button-folder" >+ สร้าง</h1>
    </button>
    <div id="myDropdown" class="dropdown-content">
    <div class="custom-cm__item" data-toggle="modal" data-target="#exampleModal"><a>สร้างโฟลเดอร์</a></div>
    
    <div class="custom-cm__item" ><a href="<?php echo site_url() . '/Member/Member_upload_file/show_member_upload_file'; ?>">อัปโหลดไฟล์</a></div>
  </div>
    </div>
    </div>

<h3 style="color:#707070; font-family:TH Sarabun New; font-weight: 900;" >โฟลเดอร์</h3>

<?php 
    for ($i = 0; $i < count($arr_fol); $i++) {   ?>   
        <!-- style="margin-left: -200px;" -->
            <div class="col-3">        
            <!-- <div class="card card-frame" style=" height: 60px; width: 260px;"> -->
            <div class="dropdown">

            <button onmousedown="rightclickfolder(<?php echo $arr_fol[$i]->fol_id ?>)" class="dropbtn btn btn-secondary btn-lg" style="border: 1px solid #dddada; height: 60px; width: 260px;">
                <i class="material-icons" style="margin-left: 1px;">folder</i>
                <a style=" font-size: 26px; font-family:TH Sarabun New; margin-right: 300px;" class="menu"><?php echo $arr_fol[$i]->fol_name ?></a>
            </button>
            <div id="showmenu" style="display:block">
                <div id="folder<?php echo $arr_fol[$i]->fol_id ?>" class="dropdown-content">
                    <a href="#home">เปิด</a>
                    <a href="#" class="editModal" data-toggle="modal" data-target="#editModal" data-id="<?php echo $arr_fol[$i]->fol_id ?>">แก้ไข</a>
                    <a href="#ย้าย">ย้าย</a>
                    <a href="<?php echo site_url() . '/Member/Member_home/delete_folder/';?><?php echo $arr_fol[$i]->fol_id;?>/<?php echo $arr_fol[$i]->fol_name;?>">ลบ</a>
                </div>
            </div>
        </div>
    </div>

    <?php }  ?>
</div>
<form method="POST" name="form" action="<?php echo site_url() . '/Member/Member_home/create_folder'; ?>">

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLabel" style="font-weight: 900;font-size: 36px; font-family:TH Sarabun New;">โฟลเดอร์ใหม่</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <center><input style="font-size: 25px;font-family:TH Sarabun New; " type="text" class="col-md-10" placeholder="โฟลเดอร์ไม่มีชื่อ" name="fol_name" required></center>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                    <input type="submit" class="btn btn-success" value="สร้าง">
                </div>
            </div>
        </div>
    </div>
</form>
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
            <form id="edit-form" method="POST" actiom="<?php echo site_url() . '/Member/Member_home/update_folder/';?>">
                <div class="modal-body">
                    <center><input type="text" class="col-md-10" placeholder="กรอกชื่อโฟลเดอร์" name="fol_name" required></center>
                    <input type="hidden" name="fol_id" id="fol_id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                    <input type="submit" class="btn btn-success" value="บันทึก">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- QR-code -->
<div class="row" style="padding: 100px 10px 10px 20%;">
    <h3 style="color:#707070; font-family:TH Sarabun New; font-weight: 900;">คิวอาร์โค้ด</h3>
    <div class="col-md-6">
        <div class="card" id="card-qrcode" style="padding-top: 10px; border-radius: 10px; width:500;">
            <div class="card-header-" style="padding:10px; border-radius: 10px; background-color: #100575; text-align:center;">
                <h style="color:#FFFFFF; font-family:TH Sarabun New; font-size: 25px;">คิวอาร์โค้ด</h>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-4" id="qrcode">
                        <img id="img" src="<?php echo base_url() . '/assets/image/QR_home.PNG' ?>" height="128" width="128" style="margin: auto;">
                        <button id="download" onclick="" class="btn btn-warning" style="margin-left:5px;margin-top:15px;font-family:TH sarabun new; font-size: 20px; width: 120; ">ดาวน์โหลด</button>
                    </div>
                    <div class="form-group col-md-4">
                        <h5 style="color:#000000; font-family:TH Sarabun New; font-size: 20px;">ชื่อ</h5>

                        <h5 style="color:#000000; font-family:TH Sarabun New; font-size: 20px;">วันที่สร้าง</h5>

                        <h5 style="color:#000000; font-family:TH Sarabun New; font-size: 20px;">ชนิด</h5>

                        <h5 style="color:#000000; font-family:TH Sarabun New; font-size: 20px;">ราายงานสรุปผล</h5>
                    </div>
                    <div class="form-group col-md-4">
                        <button id="edit" class="btn btn-" style="background-color: #100575; font-family:TH sarabun new; color:#FFFFFF; font-size: 20px; width: 120; ">ดาวน์โหลด</button>
                        <button id="remove" class="btn btn-" style="background-color:#0093EA; font-family:TH sarabun new; color:#FFFFFF; font-size: 20px; width: 70; ">ย้าย</button>
                        <button id="delete" class="btn btn-" style="background-color:#E02D2D; font-family:TH sarabun new; color:#FFFFFF; font-size: 20px; width: 70; ">ลบ</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- send fol_id to edit modal -->
<script type="text/javascript">
$(document).on("click", ".editModal", function() {
    var id = $(this).attr('data-id');
    $("#fol_id").val(id);
});
</script>

<script>
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