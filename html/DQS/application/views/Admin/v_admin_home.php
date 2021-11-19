<div class="content">
<div class="row" style="padding: 100px 10px 10px 20%;"> 
    <div class="col-md-8">
    <h1 style="color:#003399; font-family:TH Sarabun New; font-weight: 900; font-size: 80px;" >คิวอาร์โค้ดของฉัน</h1>
    </div>
    <div class="col-md-4">
    <button class="btn btn-primary btn-round" style=" width: 145px; background-color: #F5F5F5 ; border: none;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    <h1 style="font-weight: 900; color:#003399 ; font-size: 50px; font-family:TH Sarabun New; height: 40; width: 50px;" id="button-folder" >+ สร้าง</h1>
    </button>
    </div>


<h3 style="color:#707070; font-family:TH Sarabun New; font-weight: 900;" >โฟลเดอร์</h3>
    
<div class="row">
<?php 
    for ($i = 0; $i < count($arr_fol); $i++) {   ?>   
        
    
            <div class="col-3">        
                    <div class="card card-frame" style=" height: 60px; width: 260px;">
                            <div class="card-body"> 
                                <p style="font-size: 26px; font-family:TH Sarabun New;"> 
                                <i class="material-icons">folder</i> 
                                <?php echo $arr_fol[$i]->fol_name ?>
                                </p>
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
</div>

  

