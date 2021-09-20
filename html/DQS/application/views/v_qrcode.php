<script type="text/javascript" src="<?php echo base_url() . 'assets/plugin' ?>/qrcode/qrcode.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() . 'assets/plugin' ?>/qrcode/qrcode.js"></script>


<div class="content">
    <div class="content-fluid">
        <div class="row" style="padding: 100px 10px 10px 20%;">       
            <h1>สร้างคิวอาร์โค้ด</h1>
            <h2>เริ่มสร้าง QR Code กันเลย </h2>
            <div class="col-md-5"  >   
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
            
                        
                            <div class="form-row">
                               <div class="form-group col-md-5">
                                <label >เว็บไซต์</label>
                                <input id="text" type="text"  style="width: 230px;" value=""><br />
                                
                                </div>
                                <br><br>
                                </div>
                                <label >โลโก้:</label><br>
                                <input type="file" name="logoqrcode" ><br><br>
                                <button onclick="makeCode()"class="btn btn-dark_blue" style="margin-bottom: 20px;background-color: #100575;color: #fff;">สร้างคิวอาร์โค้ด</button> 
                           
                            </div>
                            </div>
                            </div>
              <div class="col-md-5">
                <div class="card"style="padding-top: 10%" >  

                    <div id="qrcode" style="margin: auto;">
                    <img src="<?php echo base_url(). '/assets/image/QR_home.PNG' ?>"height="256" width="256"style="margin: auto;">
                    </div>
                    <div class="card-body" style="margin: auto;">                   
                            
                            <br>
                            <button type="submit" class="btn btn-warning">ดาวน์โหลด</button> 
                    </div>
                </div>
             </div>
        </div>
    </div>
</div>


<script type="text/javascript">
var qrcode = new QRCode(document.getElementById("qrcode"), {
	width : 50,
	height : 50
});
function makeCode () {		
	// var elText = document.getElementById("text");
	
	// qrcode.makeCode(elText.value);
    var text = document.getElementById('text');
    var qrcode = document.getElementById('qrcode');

        if(text.value.trim() !== ''){
            qrcode.innerHTML = '';
            new QRCode(qrcode, text.value);
            
        }
}

// makeCode();

// $("#text").
// 	on("blur", function () {
// 		makeCode();
// 	}).
// 	on("", function (e) {
// 		if (e.keyCode == 13) {
// 			makeCode();
// 		}
// 	});
</script>

