
<div class="content">
    <div class="content-fluid">
        <div class="row" style="padding: 100px 10px 10px 20%;">       
            <h1>สร้างคิวอาร์โค้ด</h1>
            <h2>เริ่มสร้าง QR Code กันเลย </h2>
            <div class="col-md-5 ">   
                <div class="card card-nav-tabs card-plain">
                    <ul class="nav nav-tabs">
                     <li class="nav-item">
                        <a class="nav-link active" href="#">เว็บไซต์</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#">PDF</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#">รูปภาพ</a>
                     </li>
                    </ul>
 
            <div class="tab-pane active" style="padding: 100px 10px 10px 20%;">
            
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                <label >เว็บไซต์</label>
                                <input placeholder="เว็บไซต์">
                                </div>
                                <br><br>
                                </div>
                                <label >โลโก้:</label><br>
                                <input type="file" name="logoqrcode" required><br><br>
                                <button type="submit" class="btn btn-dark_blue" style="margin-bottom: 20px;background-color: #100575;color: #fff;">สร้างคิวอาร์โค้ด</button> 
                            </form>
                            </div>
                            </div>
                            </div>
              <div class="col-md-5">
                <div class="card"style="padding-top: 10%">                   
                <img src="<?php echo base_url(). '/assets/image/QR_home.PNG' ?>"height="50%" width="50%"style="margin: auto;">
                    <div class="card-body" style="margin: auto;">                   
                            
                            <br>
                            <button type="submit" class="btn btn-warning">ดาวน์โหลด</button> 
                    </div>
                </div>
             </div>
        </div>
    </div>
</div>
