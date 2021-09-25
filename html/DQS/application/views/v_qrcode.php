
<script src="<?php echo base_url() . 'node_modules/easyqrcodejs/src' ?>/easy.qrcode.js"></script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<div class="content">
    <div class="content-fluid">
        <div class="row" style="padding: 100px 10px 10px 20%;">       
            <h1 style="color:#100575; font-family:TH sarabun new; font-size: 80px;" >สร้างคิวอาร์โค้ด</h1>
            <h2 style="font-family:TH sarabun new; ">เริ่มสร้าง QR Code กันเลย </h2>
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
 
            <div class="tab-pane active" style="padding: 10%; margin: auto; ">
            
                            <div class="form-row" >
                               <div class="form-group col-md-5">
                                    <div class="form-group">
                                        <p style="font-family:TH sarabun new; color:black; font-size: 31px;" >เว็บไซต์ :</p>
                                        <input type="text" id="text"   style="font-family:TH sarabun new; font-size: 22px; width: 300px; height: 35px;" placeholder="เว็บไซต์">
                                        
                                    </div>
                                </div>    
                            </div>
                               <p style="font-family:TH sarabun new; color:black; font-size: 31px;">โลโก้:</p> 
                                <input type="file" name="logoqrcode" ><br><br>
                               <button onclick="makeCode()"class="btn btn-dark_blue" style="font-family:TH sarabun new; font-size: 30px; background-color: #100575;color: #fff; width: 243; height:48" >สร้างคิวอาร์โค้ด</button> 
                           
                            </div>
                            </div>
                            </div>
              <div class="col-md-5">
                <div class="card"style="padding: 10%" >  

                    
                    <!-- <img src="<?php echo base_url(). '/assets/image/QR_home.PNG' ?>"height="256" width="256"style="margin: auto;"> -->
                    
                    <div class="card-body" style="margin: auto;">                   
                          <div id="qrcode">  </div>
                            <br>
                            <button type="submit" class="btn btn-warning" style="font-family:TH sarabun new; font-size: 30px; width: 243; height:48 ;">ดาวน์โหลด</button> 
                    </div>
                </div>
             </div>
        </div>
    </div>
</div>
</body>
</html>

<script>
function make() {		
    var text = document.getElementById('text');
    var qrcode = document.getElementById('qrcode');
    var logo = document.getElementById('logo');

        if(text.value.trim() !== ''){
            qrcode.innerHTML = '';
            new QRCode(qrcode, text.value ,logo.value);
            
        }
}

var qrcode = new QRCode(document.getElementById("qrcode"), {
    text: "https://cssscript.com",
    logo: "<?php echo base_url(). '/assets/image/logo_dqs.png' ?>",
    logoWidth: undefined,
    logoHeight: undefined,
    logoBackgroundColor: '#ffffff',
    logoBackgroundTransparent: false
});

</script>

