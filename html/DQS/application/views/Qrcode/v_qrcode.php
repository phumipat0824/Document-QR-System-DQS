<!-- /*
* v_qrcode.php
* Display Qrcode
* @input url,logo
* @output qrcode
* @author Phumipat
* @Create Date 2564-08-05
*/ -->
<div class="content">
    <div class="row" style="padding: 100px 10px 10px 20%;">
        <a style="color:#100575; font-size: 80px;">สร้างคิวอาร์โค้ด</a>
        <a style="font-size: 35px;">เริ่มสร้าง QR Code กันเลย </a>
    </div>
    <div class="row"style="padding-left:20%;">
            <div class="col-md-5">
                <div class="card" id="oninput"style="border-color:#E4E4E4;border-width: 5px;"> 
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist"style="padding-b :50px;">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fas fa-paperclip"></i> เว็บไซต์</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" href="<?php echo base_url() . 'Member/Member_login/show_member_login' ?>" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="far fa-file-pdf"></i> PDF</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" href="<?php echo base_url() . 'Member/Member_login/show_member_login' ?>" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="far fa-images"></i> รูปภาพ</a>
                </div>
            </nav>                                         
                    <div class="form-row"style="margin-left:10%;margin-top: 10%;margin-bottom: 20px">                
                            <a style="margin-top: 10px;">เว็บไซต์</a>
                            <label style = "color: #FF0000;">*</label>&emsp;
                            <label id="target_div" style = "display:none;margin-top: 3%;color: #FF0000;">กรอกข้อมูลลิงค์เว็บไซต์ (URL)</label>
                    </div>
                            <input id="text" type="text"style="margin: auto;" oninvalid="InvalidMsg(this);"oninput="InvalidMsg(this);"value="https://www.example.com"required="required">
                            <div id="inputlogo"style="margin-top: 30px;">
                                <center>
                                    <button class = "slide" id="up" style="width: 80%;" onclick="showinputlogo()">เพิ่มโลโก้<i class="fas fa-angle-down" style="float: right;"  aria-hidden="true"></i></button>
                                </center>                               
                                </div>      
                                        <div class="form-row" id="vanish"style="display:none;margin-left:10%;margin-top: 30px;"> 
                                        <a style="margin-top: 10px;">โลโก้</a>&emsp;
                                        <label style = "color: #FF0000;">*</label>
                                        <label>jpeg/png</label>&emsp;
                                        <label id="name_img"style = "color: #000;"></label>
                                        </div> 
                                        <div class="parent-div" id="vanish1"style="display:none;margin-left:10%;">      
                                                <button class="btn-upload" style="color:#000;"><i class="fas fa-upload"></i> เลือกโลโก้คิวอาร์โค้ด</button>                   
                                                <input id="logo_img" type="file" name="logo"onchange="getFileData();" accept="image/png, image/jpeg"><br><br>
                                        </div>        
                                        <div class="form-row"style="margin: auto;">                                      
                                        <button type="submit"class="btn btn-dark_blue" id="make" style="margin-bottom: 30px;margin-top: 40px;background-color: #100575;color: #fff; width: 240;font-family:TH sarabun new; font-size: 35px;">สร้างคิวอาร์โค้ด</button>
                                        </div>                                
                    </div>
                    </div>                   
            <div class="col-md-5">
                <div class="card" id="onsave" style="border-color:#E4E4E4;border-width: 5px;">
                        <center>
                            <div id="capture" >
                                <div id="qrcode"style="margin-top:30px;">              
                                    <img id="img" src="<?php echo base_url(). '/assets/image/QR_home.PNG' ?>" height="250" width="250" style="margin: auto;">                       
                                </div> 
                            </div> 
                            <button id="download" class="btn btn-warning" style="margin-top: 40px;margin-bottom: 30px;font-family:TH sarabun new; font-size: 35px; width: 240; ">ดาวน์โหลด</button> 
                        </center>
                </div>
            </div>
    </div>
</div>

<script type="text/javascript">
  $('#tour-edit-save').removeAttr('onclick');
  $(document).ready(function() {
  $(document).on('click', '.stage', function() {
    $(this).remove('.stage');
  });
}); 
function getFileData (){
    var file = document.getElementById("logo_img");
    var file_name = document.getElementById("name_img");
    $('#name_img').text(file.files[0].name);
}
async function uploadFile() {
    let formData = new FormData();
    formData.append("logo", logo.files[0]);
    await fetch("<?php echo site_url() . "/Qrcode/Qrcode_generator/upload/" ?>", {
        method: "POST",
        body: formData
    });
    // alert('The file has been uploaded successfully.');
}

function make() { 
  var logoin = '';
  const [file] = logo_img.files
  if (file) {
    var logoin = URL.createObjectURL(file);
  }
    var text = document.getElementById('text');
    var qrcode = document.getElementById('qrcode');
    


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
// #capture {
//   box-sizing: content-box;  
//   width: 350px;
//   height: 350px;
//   border: 10px solid #fff;
// }
document.getElementById("download").addEventListener("click", function() {
    const note = document.querySelector('#capture');
// note.style.box-sizing = 'content-box';
note.style.border = '10px solid #fff';
note.style.width = '380px';
note.style.height = '370px';
const note1 = document.querySelector('#download');
note1.style.margin = '-10px 0px 30px 0px';

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
        ajax.open("POST", "<?php echo site_url() . "/Qrcode/Qrcode_generator/save_server/" ?>", true);
 
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
$(document).ready(function(){   
     function validateURL(textval) {
  //var urlregex = new RegExp( "^(http|https|ftp)\://([a-zA-Z0-9\.\-]+(\:[a-zA-Z0-9\.&amp;%\$\-]+)*@)*((25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9])\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[0-9])|([a-zA-Z0-9\-]+\.)*[a-zA-Z0-9\-]+\.(com|edu|gov|int|mil|net|org|biz|arpa|info|name|pro|gle|aero|coop|museum|[a-zA-Z]{2}))(\:[0-9]+)*(/($|[a-zA-Z0-9\.\,\?\'\\\+&amp;%\$#\=~_\-]+))*$");
  var re=/^((https?|ftp|smtp):\/\/)?(www.)?[a-z0-9]+(\.[a-z]{2,}){1,3}(#?\/?[a-zA-Z0-9#]+)*\/?(\?[a-zA-Z0-9-_]+=[a-zA-Z0-9-%]+&?)?$/;
  console.log(re.test(textval));
  return re.test(textval);
}
    $("#make").on('click', function() {
      var div = document.getElementById('target_div');
        var url = $("#text").val().trim();
        if(validateURL(url)) {
          $("#text").css("border-color","green");
          div.style.display = "none";
          $("#onsave").css("border-color","green");
          $("#oninput").css("border-color","#E4E4E4");
          make();
          document.getElementById("logo_img").value = "";
        }else{
          $("#text").css("border-color","red");
          $("#oninput").css("border-color","red");
          $("#onsave").css("border-color","#E4E4E4");
          var div = document.getElementById('target_div');
          div.style.display = "block";
        }
    });

});

        
  


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
    background-color: #cfcfcf;
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