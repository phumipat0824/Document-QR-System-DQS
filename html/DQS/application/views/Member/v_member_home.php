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
            <button   onmousedown="rightclickfolder()"  class="dropbtn btn btn-secondary btn-lg" style=" height: 60px; width: 260px;"  >
            <i class="material-icons"  style="margin-left: 1px;" >folder</i>
            <a style=" font-size: 26px; font-family:TH Sarabun New; margin-right: 300px;" class="menu"><?php echo $arr_fol[$i]->fol_name ?></a>
            

            </button>
            <div id="folder" class="dropdown-content">
              <a href="#home">เปิด</a>
              <a href="#about">แก้ไข</a>
              <a href="<?php echo site_url() . '/Member/Member_home/delete_folder/';?><?php echo $arr_fol[$i]->fol_id;?>/<?php echo $arr_fol[$i]->fol_name;?>">ลบ</a>
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
                <center><input style="font-size: 25px;font-family:TH Sarabun New; " type="text" class="col-md-10" placeholder="โฟลเดอร์ไม่มีชื่อ" name="fol_name" required ></center>    
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
    <!-- Modal -->
    <!-- <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title" id="exampleModalLabel" style="font-weight: 900;font-size: 36px; font-family:TH Sarabun New;">ยืนยันการลบโฟลเดอร์</h1>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div> -->
          <!-- <div class="modal-body">
                <center><input style="font-size: 25px;font-family:TH Sarabun New; " type="text" class="col-md-10" placeholder="โฟลเดอร์ไม่มีชื่อ" name="fol_name" required ></center>    
          </div> -->
          <!-- <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
              <button type="submit" class="btn btn-success" >ยืนยัน</button>
          </div>
        </div>
      </div>
    </div> -->





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


  $(document).on("click", ".editModal", function () {
    var id = $(this).attr('data-id');
    $("#dep_id").val(id);
  });

function rightclick() {
    var rightclick;
    var e = window.event;
     if (e.button == 2){
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
    //alert(rightclick); // true or false, you can trap right click here by if comparison
}
function rightclickfolder() {
    var rightclick;
    var e = window.event;
     if (e.button == 2){
    document.getElementById("folder").classList.toggle("show");
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
    //alert(rightclick); // true or false, you can trap right click here by if comparison
}



</script>




