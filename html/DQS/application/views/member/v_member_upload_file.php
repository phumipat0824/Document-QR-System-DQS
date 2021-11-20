 <script src="<?php echo base_url() . 'node_modules/easyqrcodejs/src' ?>/easy.qrcode.js"></script>



 <div class="content">
     <div class="row" style="padding: 100px 10px 10px 20%;">
         <h1 style="color:#100575; font-family:TH sarabun new; font-size: 80px;">สร้างคิวอาร์โค้ด</h1>
         <h2 style="font-family:TH sarabun new; ">เริ่มสร้าง QR Code กันเลย </h2>
         <div class="col-md-5">
             <div class="card card-nav-tabs card-plain" style="color: #E0FFFF; width: 100%;">
                 <ul class="nav nav-tabs">
                     <li class="nav-item">
                         <div class="card" style="margin: 0px; color: #E0FFFF">
                             <a class="nav-link active" href="#">PDF</a>
                         </div>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="#">เว็บไซต์</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="#">รูปภาพ</a>
                     </li>
                 </ul>

                 <form action="<?php echo site_url() . 'Member/Member_upload_file/upload_file' ?>" method="post">
                     <label style="padding-left: 45px; padding-top: 20px; color: #000000">ไฟล์ PDF</label><br>
                     <div class="row">
                         <div class="col-md-2 offset-md-1">
                             <div class="card" style=" margin-left: 10%; width:640%">
                                 <input type="hidden" name='doc_type' value='pdf'>
                                 <input id="file" type="file" name="doc_path" accept="application/pdf" placeholder="อัปโหลดไฟล์" style="padding: 10px; width: 230px; height: 50px;"><br>
                             </div>
                         </div>
                     </div>

                     <label style="padding-left: 40px; padding-top: 20px; color: #000000">ชื่อ:</label><br>
                     <div class="row">
                         <div class="col-md-2 offset-md-1">
                             <input id="text" type="text" style="margin: 0px;  width: 400px;" value="doc_name" placeholder="ชื่อไฟล์"><br />
                         </div>
                     </div>


                     <label style="padding-left: 40px; padding-top: 20px; color: #000000">โลโก้:</label><br>

                     <div class="row">
                         <div class="col-md-2 offset-md-1">
                             <div class="card" style=" margin-left: 10%; width:640%">
                                 <input id="logo" type="file" name="logo" onchange="uploadFile()" accept="image/png, image/gif, image/jpeg"><br><br>
                             </div>
                         </div>
                     </div>
                     <input id="logoinqr" type="text" name="logoinqr" value="<?php echo $this->session->userdata('logo_name') ?>" hidden>
                     <button onclick="make()" class="btn btn-dark_blue" style="margin-left: 25%; margin-bottom: 50px;margin-top:50px;background-color: #100575;color: #fff; width: 240;font-family:TH sarabun new; font-size: 20px;">สร้างคิวอาร์โค้ด</button>

                 </form>
             </div>
         </div>
         <!-- <div class="col-md-1"></div> -->
         <div class="col-md-5">
             <div class="card" style="padding: 10%" height="500">
                 <div class="card-body" style="margin: auto;">
                     <div id="qrcode">
                         <img id="img" src="<?php echo base_url() . '/assets/image/QR_home.PNG' ?>" height="256" width="256" style="margin: auto;">
                     </div>
                     <br>

                     <a href="#" download><button class="btn btn-warning" style="font-family:TH sarabun new; font-size: 20px; width: 240; ">ดาวน์โหลด</button> </a>
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
    await fetch("<?php echo site_url() . "/Member/Member_upload_file/show_member_upload_file/" ?>", {
        method: "POST",
        body: formData
    });
    alert('The file has been uploaded successfully.');
}


function make() {
    var text = document.getElementById('text');
    var qrcode = document.getElementById('qrcode');
    var logo = "<?php echo base_url() . '/assets/logo/' ?><?php echo $this->session->userdata('logo_name') ?>";
    // var logoin = "<?php echo base_url() . '/assets/logo/' ?><?php echo $this->session->userdata('logo_name') ?>"

    if (text.value.trim() !== '') {
        qrcode.innerHTML = '';
        new QRCode(document.getElementById("qrcode"), {
            text: text.value,
            logo: "<?php echo base_url() . '/assets/logo/' ?><?php echo $this->session->userdata('logo_name') ?>",
            logoWidth: undefined,
            logoHeight: undefined,
            logoBackgroundColor: '#ffffff',
            logoBackgroundTransparent: false
        });

    }
}

// var qrcode = new QRCode(document.getElementById("qrcode"), {
//     text: "https://cssscript.com",
//     logo: "<?php echo base_url() . '/assets/image/logo_dqs.png' ?>",
//     logoWidth: undefined,
//     logoHeight: undefined,
//     logoBackgroundColor: '#ffffff',
//     logoBackgroundTransparent: false
// });
 </script>
 <style>
.nav-tabs .nav-item .nav-link,
.nav-tabs .nav-item .nav-link:focus,
.nav-tabs .nav-item .nav-link:hover {
    border: 0 !important;
    color: #000 !important;
    font-weight: 500;
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

#img {
    -webkit-filter: blur(2px);
    /* Safari 6.0 - 9.0 */
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

.blockInput {
    width: 100%;
    height: 80%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    border-radius: 0px 20px 0px 0px;
}

body {
    background-color: #EFF3F7;
}
 </style>