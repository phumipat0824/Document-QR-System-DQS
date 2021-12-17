<div class="content">
    <div class="row" style="padding: 100px 10px 10px 20%;">
        <a style="color:#100575; font-size: 60px;">สร้างคิวอาร์โค้ด</a>
        <a style="font-size: 30px;">เริ่มสร้าง QR Code กันเลย </a>
            <div class="col-md-5">
                <div class="card card-nav-tabs card-plain">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">เว็บไซต์</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url() . 'Member/Member_login/show_member_login' ?>">PDF</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url() . 'Member/Member_login/show_member_login' ?>">รูปภาพ</a>
                        </li>
                    </ul>
                <div class="card-body" style="margin-left:65px;margin-top: 30px;">
                    <!-- <form action='' method="post"> -->
                    <div class="form-row">
                        <div class="form-group col-md-5" style="margin-bottom: 30px">

                            <a style="margin-top: 10px;">เว็บไซต์</a>
                            <label style = "color: #FF0000;">*</label>
                            <input id="text" type="text" style="width: 350px;"placeholder="http://"oninvalid="InvalidMsg(this);"oninput="InvalidMsg(this);"required="required"><br>
                        </div>
                        <br><br>
                    </div>
                            <a style="margin-top: 10px;">โลโก้:</a><br>
                            <div class="parent-div">
                                <button class="btn-upload" style="color:#cfcfcf;"><i class="fas fa-upload"></i> เลือกโลโก้คิวอาร์โค้ด</button> 
                                <input id="logo_img" type="file" name="logo" accept="image/png, image/gif, image/jpeg"><br><br>
                        </div>
                    <button type="submit"  onclick="make()" class="btn btn-dark_blue" style="margin-left:55px;margin-bottom: 50px;margin-top:35px;background-color: #100575;color: #fff; width: 240;font-family:TH sarabun new; font-size: 20px;">สร้างคิวอาร์โค้ด</button>
                    <!-- </form> -->
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card" style="padding: 10%" height="500">
                <div class="card-body" style="margin: auto;">

                <!-- <canvas id="cnv1" width="252" height="322"></canvas> -->
                <div id="capture">
                    <div id="qrcode">              
                        <img id="img" src="<?php echo base_url(). '/assets/image/QR_home.PNG' ?>" height="256" width="256" style="margin: auto;">                       
                    </div> 
                    </div> 
                    <image id="theimage"></image> 
                    <br>
                    <button id="download" onclick="doCapture();" class="btn btn-warning" style="margin-left:10px;margin-top:40px;font-family:TH sarabun new; font-size: 20px; width: 240; ">ดาวน์โหลด</button>               
                    </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
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
            width: 256,
            height: 256,
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
    width: 100%;
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
}
.parent-div input[type=file] {
  left: 0;
  top: 0;
  opacity: 0;
  position: absolute;
  font-size: 90px;
}
.btn-upload {
    width: 350px;
    height : 47px;
    padding: 12px 20px;
    margin: 8px 0;
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

</style>