<script src="<?php echo base_url() . 'node_modules/easyqrcodejs/src' ?>/easy.qrcode.js"></script>
<div class="content">
        <div class="row" style="padding: 100px 10px 10px 20%;">       
            <h1 style="color:#100575; font-family:TH sarabun new; font-size: 80px;" >สร้างคิวอาร์โค้ด</h1>
            <h2 style="font-family:TH sarabun new; ">เริ่มสร้าง QR Code กันเลย </h2>
            <div class="col-md-5"  >   
                <div class="card card-nav-tabs card-plain"style="color: #E0FFFF">
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
                    <div class="card-body" style="margin: auto;margin-top: 50px;">
                            <div class="form-row">
                              <div class="form-group col-md-5">
                                <label >เว็บไซต์</label>
                                <input id="text" type="text"  style="width: 230px;" value=""><br />
                                
                                </div>
                                <br><br>
                                </div>
                                <label  style="margin-top: 10px;">โลโก้:</label><br>
                                <input id="logo" type="file" name="logo" onchange="uploadFile()"accept="image/png, image/gif, image/jpeg"><br><br>
                                <input id="logoinqr" type="text" name="logoinqr" value="<?php echo $this->session->userdata('logo_name')?>" hidden >
                                <button onclick="make()" class="btn btn-dark_blue" style="margin-left: 10px;margin-bottom: 50px;margin-top:50px;background-color: #100575;color: #fff; width: 240;font-family:TH sarabun new; font-size: 20px;">สร้างคิวอาร์โค้ด</button> 
                                
                            
                                </div>
                            </div>
                            </div>

                          <div class="col-md-5">
                          <div class="card"style="padding: 10%" height="500" >                      
                          <div class="card-body" style="margin: auto;">                   
                          <div id="qrcode">
                          <img id="img"src="<?php echo base_url(). '/assets/image/QR_home.PNG' ?>"height="256" width="256"style="margin: auto;">
                          </div>
                            <br>
                          
                             <button onclick="downloadQR()" class="btn btn-warning" style="font-family:TH sarabun new; font-size: 20px; width: 240; ">ดาวน์โหลด</button>

                             
                    </div>
                </div>
             </div>

             <div class="block"></div>
        </div>
</div>
<!-- </form> -->

<script type="text/javascript">

async function uploadFile() {
  let formData = new FormData(); 
  formData.append("logo", logo.files[0]);
  await fetch( "<?php echo site_url() . "/Qrcode/QRcode_generator/upload/" ?>", {
    method: "POST", 
    body: formData
  }); 
  //alert('The file has been uploaded successfully.');
  }


function make() {		
    var text = document.getElementById('text');
    var qrcode = document.getElementById('qrcode');
    var logo = "<?php echo base_url(). '/assets/logo/' ?>+<?php echo $this->session->userdata('logo_name')?>";
    // var logoin = "<?php echo base_url(). '/assets/logo/' ?><?php echo $this->session->userdata('logo_name')?>"

        if(text.value.trim() !== ''){
            qrcode.innerHTML = '';
            new QRCode(document.getElementById("qrcode"), {
            text: text.value,
            width: 256,
            height: 256,
            logo: "<?php echo base_url(). '/assets/logo/' ?><?php echo $this->session->userdata('logo_name')?>",
            logoWidth: 80,
            logoHeight: 80,
            //logoBackgroundColor: '#ffffff',
            logoBackgroundTransparent: true,

            title: 'QR Title', // content 
            titleFont: "normal normal bold 18px Arial", //font. default is "bold 16px Arial"
            titleColor: "#004284", // color. default is "#000"
            titleBackgroundColor: "#fff", // background color. default is "#fff"
            titleHeight: 70, // height, including subTitle. default is 0
            titleTop: 25, // draws y coordinates. default is 30
            drawer: 'canvas',// Which drawing method to use. 'canvas', 'svg'. default is 'canvas'
        });
             
        }
}

// var qrcode = new QRCode(document.getElementById("qrcode"), {
//     text: "https://cssscript.com",
//     logo: "<?php echo base_url(). '/assets/image/logo_dqs.png' ?>",
//     logoWidth: undefined,
//     logoHeight: undefined,
//     logoBackgroundColor: '#ffffff',
//     logoBackgroundTransparent: false
// });

function downloadQR() {
var img = document.getElementById("img");

// Take action when the image has loaded
img.addEventListener("load", function () {
    var imgCanvas = document.createElement("canvas"),
        imgContext = imgCanvas.getContext("2d");

    // Make sure canvas is as big as the picture
    imgCanvas.width = qrcimgode.width;
    imgCanvas.height = img.height;

    // Draw image into canvas element
    imgContext.drawImage(img, 0, 0, img.width, img.height);

    // Get canvas contents as a data URL
    var imgAsDataURL = imgCanvas.toDataURL("image/png");

    // Save image into localStorage
    try {
        localStorage.setItem("img", imgAsDataURL);
    }
    catch (e) {
        console.log("Storage failed: " + e);
    }
}, false);

}



</script>
<style>

.nav-tabs .nav-item .nav-link, .nav-tabs .nav-item .nav-link:focus, .nav-tabs .nav-item .nav-link:hover {
    border: 0!important;
    color: #000!important;
    font-weight: 500;
}
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
#img {
  -webkit-filter: blur(2px); /* Safari 6.0 - 9.0 */
  filter: blur(2px);
}

.block {
    display: -webkit-box;
    display: -webkit-flex;
    display: flex;
    -webkit-box-flex: 0 0 48px;
    -webkit-flex: 0 0 48px;
    flex: 0 0 48px;
}
</style>


