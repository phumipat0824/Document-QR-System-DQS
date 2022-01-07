<div class="content">
    <div class="row" style="padding: 100px 10px 10px 20%;">
        <a style="color:#100575; font-size: 80px;">สร้างคิวอาร์โค้ด</a>
        <a style="font-size: 35px;">เริ่มสร้าง QR Code กันเลย </a>
    </div>
    
    <div class="row"style="padding-left:20%;">
            <div class="col-md-5">
                <div class="card"style="border-color:#E4E4E4;border-width: 5px;"> 
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist"style="padding-b :50px;">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fas fa-paperclip"></i> เว็บไซต์</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="far fa-file-pdf"></i> PDF</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="far fa-images"></i> รูปภาพ</a>
                </div>
            </nav>                                         
                    <!-- <form action='' method="post"> -->
                    <div class="form-row"style="margin-left:10%;margin-top: 10%;margin-bottom: 20px">                
                            <a style="margin-top: 10px;">เว็บไซต์</a>
                            <label style = "color: #FF0000;">*</label>
                    </div>

                            <input id="text" type="text"style="margin: auto;" placeholder="http://"oninvalid="InvalidMsg(this);"oninput="InvalidMsg(this);"value="https://www.example.com"required="required">
                                <div id="inputlogo"style="margin-top: 30px;">
                                <center>
                                    <button class = "slide" id="up" style="width: 80%;" onclick="showinputlogo()">เพิ่มโลโก้<i class="fas fa-angle-down" style="float: right;"  aria-hidden="true"></i></button>
                                </center>                               
                                </div> 
                                        
                                        <div class="form-row" id="vanish"style="display:none;margin-left:10%;margin-top: 30px;"> 
                                        <a style="margin-top: 10px;">โลโก้</a>&emsp;
                                            <label>     jpg/png</label>
                                        </div> 
                                        <div class="parent-div" id="vanish1"style="display:none;margin-left:10%;">      
                                                <button class="btn-upload" style="color:#cfcfcf;"><i class="fas fa-upload"></i> เลือกโลโก้คิวอาร์โค้ด</button>                   
                                                <input id="logo_img" type="file" name="logo" accept="image/png, image/jpeg"><br><br>
                                        </div>        
                                        <div class="form-row"style="margin: auto;">                                      
                                        <button type="submit"  onclick="make()" class="btn btn-dark_blue" style="margin-bottom: 30px;margin-top: 40px;background-color: #100575;color: #fff; width: 240;font-family:TH sarabun new; font-size: 35px;">สร้างคิวอาร์โค้ด</button>
                                        </div>                                
                    </div>
                    </div>                   
            <div class="col-md-5">
                <div class="card"style="border-color:#E4E4E4;border-width: 5px;">
                        <center>
                            <div id="capture" style="margin-top:40px;">
                                <div id="qrcode">              
                                    <img id="img" src="<?php echo base_url(). '/assets/image/QR_home.PNG' ?>" height="250" width="250" style="margin: auto;">                       
                                </div> 
                            </div> 
                            <button id="download" class="btn btn-warning" style="margin-top:40px;margin-bottom: 30px;font-family:TH sarabun new; font-size: 35px; width: 240; ">ดาวน์โหลด</button> 
                        </center>
                </div>
            </div>
    </div>

    <div class="stage" id="tour-edit-save">
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
</div>
<style>
.stage {
  height: 300px;
  width: 500px;
  margin: auto;
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  perspective: 9999px;
  transform-style: preserve-3d;
}

.layer {
  width: 100%;
  height: 100%;
  position: absolute;
  transform-style: preserve-3d;
  animation: ಠ_ಠ 5s infinite alternate ease-in-out -7.5s;
  animation-fill-mode: forwards;
  transform: rotateY(40deg) rotateX(33deg) translateZ(0);
}

.layer:after {
  font: 150px/0.65 "Pacifico", "Kaushan Script", Futura, "Roboto", "Trebuchet MS", Helvetica, sans-serif;
  content: "Phumipat\a    Katsuwan!";
  white-space: pre;
  text-align: center;
  height: 100%;
  width: 100%;
  position: absolute;
  top: 50px;
  color: whitesmoke;
  letter-spacing: -2px;
  text-shadow: 4px 0 10px rgba(0, 0, 0, 0.13);
}

.layer:nth-child(1):after {
  transform: translateZ(0px);
}

.layer:nth-child(2):after {
  transform: translateZ(-1.5px);
}

.layer:nth-child(3):after {
  transform: translateZ(-3px);
}

.layer:nth-child(4):after {
  transform: translateZ(-4.5px);
}

.layer:nth-child(5):after {
  transform: translateZ(-6px);
}

.layer:nth-child(6):after {
  transform: translateZ(-7.5px);
}

.layer:nth-child(7):after {
  transform: translateZ(-9px);
}

.layer:nth-child(8):after {
  transform: translateZ(-10.5px);
}

.layer:nth-child(9):after {
  transform: translateZ(-12px);
}

.layer:nth-child(10):after {
  transform: translateZ(-13.5px);
}

.layer:nth-child(11):after {
  transform: translateZ(-15px);
}

.layer:nth-child(12):after {
  transform: translateZ(-16.5px);
}

.layer:nth-child(13):after {
  transform: translateZ(-18px);
}

.layer:nth-child(14):after {
  transform: translateZ(-19.5px);
}

.layer:nth-child(15):after {
  transform: translateZ(-21px);
}

.layer:nth-child(16):after {
  transform: translateZ(-22.5px);
}

.layer:nth-child(17):after {
  transform: translateZ(-24px);
}

.layer:nth-child(18):after {
  transform: translateZ(-25.5px);
}

.layer:nth-child(19):after {
  transform: translateZ(-27px);
}

.layer:nth-child(20):after {
  transform: translateZ(-28.5px);
}

.layer:nth-child(n+10):after {
  -webkit-text-stroke: 3px rgba(0, 0, 0, 0.25);
}

.layer:nth-child(n+11):after {
  -webkit-text-stroke: 15px dodgerblue;
  text-shadow: 6px 0 6px #00366b, 5px 5px 5px #002951, 0 6px 6px #00366b;
}

.layer:nth-child(n+12):after {
  -webkit-text-stroke: 15px #0077ea;
}

.layer:last-child:after {
  -webkit-text-stroke: 17px rgba(0, 0, 0, 0.1);
}

.layer:first-child:after {
  color: #fff;
  text-shadow: none;
}

@keyframes ಠ_ಠ {
  100% {
    transform: rotateY(-40deg) rotateX(-43deg);
  }
}
</style>
</div>

<script type="text/javascript">
  $('#tour-edit-save').removeAttr('onclick');
  $(document).ready(function() {
  $(document).on('click', '.stage', function() {
    $(this).remove('.stage');
  });
});   
async function uploadFile() {
    let formData = new FormData();
    formData.append("logo", logo.files[0]);
    await fetch("<?php echo site_url() . "/Qrcode/QRcode_generator/upload/" ?>", {
        method: "POST",
        body: formData
    });
    // alert('The file has been uploaded successfully.');
}

function make() {
  const [file] = logo_img.files
  if (file) {
    var logoin = URL.createObjectURL(file);
  }else{
      var logoin = '';
} 
    var text = document.getElementById('text');
    var qrcode = document.getElementById('qrcode');
    var logo = "<?php echo base_url(). '/assets/logo/' ?>+<?php echo $this->session->userdata('logo_name')?>";
    


    if (text.value.trim() !== '') {
        qrcode.innerHTML = '';
        new QRCode(document.getElementById("qrcode"), {
            text: text.value,
            width: 300,
            height: 300,
            logo: logoin,
            logoWidth: 80,
            logoHeight: 80,
            //logoBackgroundColor: '#ffffff',
            logoBackgroundTransparent: true,

            // title: 'QR Title', // content 
            // titleFont: "normal normal bold 18px Arial", //font. default is "bold 16px Arial"
            // titleColor: "#004284", // color. default is "#000"
            // titleBackgroundColor: "#fff", // background color. default is "#fff"
            // titleHeight: 70, // height, including subTitle. default is 0
            // titleTop: 25, // draws y coordinates. default is 30
            // drawer: 'canvas',// Which drawing method to use. 'canvas', 'svg'. default is 'canvas'
        });

    }
    //qrcode.resize(480, 480);
}

document.getElementById("download").addEventListener("click", function() {
    
    html2canvas(document.querySelector('#capture')).then(function(canvas) {

        saveAs(canvas.toDataURL(), 'DQS_QR.png');
    });
    
});


function saveAs(uri, filename) {

    var link = document.createElement('a');

    if (typeof link.download === 'string') {

        link.href = uri;
        link.download = filename;

        //Firefox requires the link to be in the body
        document.body.appendChild(link);

        //simulate click
        link.click();

        //remove the link when done
        document.body.removeChild(link);

    } else {

        window.open(uri);

    }
}
function InvalidMsg(textbox) {
    
    if (textbox.value == '') {
        textbox.setCustomValidity('กรุณากรอกลิงก์เว็บไซต์');
    }
    // else if(textbox.validity.typeMismatch){
    //     textbox.setCustomValidity('please enter a valid email address');
    // }
    else {
        textbox.setCustomValidity('');
    }
    return true;
}

function showinputlogo() { 
    $('#up').find("i").toggleClass("fa-angle-down fa-angle-up");
    var x = document.getElementById("vanish");
    var y = document.getElementById("vanish1");
        if (x.style.display === "none") {
            x.style.display = "block";
            y.style.display = "block";
        } else {
            x.style.display = "none";
            y.style.display = "none";
        }
        
}
function doCapture() {
    window.scrollTo(0, 0);
 
    html2canvas(document.getElementById("capture")).then(function (canvas) {
 
        // Create an AJAX object
        var ajax = new XMLHttpRequest();
 
        // Setting method, server file name, and asynchronous
        ajax.open("POST", "<?php echo site_url() . "/Qrcode/QRcode_generator/save_server/" ?>", true);
 
        // Setting headers for POST method
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 
        // Sending image data to server
        ajax.send("image=" + canvas.toDataURL("image/jpeg", 0.9));
 
        // Receiving response from server
        // This function will be called multiple times
        ajax.onreadystatechange = function () {
 
            // Check when the requested is completed
            if (this.readyState == 4 && this.status == 200) {
 
                // Displaying response from server
                console.log(this.responseText);
            }
        };
    });
}

        
  


</script>
<style>
  
.show {display: block;}
.nav-tabs .nav-item .nav-link,
.nav-tabs .nav-item .nav-link:focus,
.nav-tabs .nav-item .nav-link:hover {
    border: 0 !important;
    color: #000 !important;
    font-size: 16px
}

input[type=text],
select {
    width: 80%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}



.parent-div {
  display: inline-block;
  position: relative;
  overflow: hidden;
  /* margin: auto; */
}
.parent-div input[type=file] {
  left: 0;
  top: 0;
  opacity: 0;
  position: absolute;
  font-size: 90px;
}
.btn-upload {
    width: 89%;
    height : 47px;
    padding: 12px 20px;
    margin: auto;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    background-color: #fff;
}
#img {
    -webkit-filter: blur(2px);
    /* Safari 6.0 - 9.0 */
    filter: blur(2px);
}

a{
    font-size: 16px
}
.slide{
    width: 80%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
.nav-tabs .nav-link.active {
    background-color: #fff;
    border-color: #fff;
}
.nav-tabs .nav-link{
    background-color: #cfcfcf;
    border-color: #fff;
}
.nav-tabs .nav-link.active:focus, .nav-tabs .nav-link.active:hover {
    border-color: #fff;
}

</style>