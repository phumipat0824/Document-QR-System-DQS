<!-- 
/*
* v_member_upload_file.php
* display upload file
* @input file pdf/image, name file, file logo
* @output login
* @author Ashirawat, Krisada, Chanyapat, Ratchaneekorn, Jerasak
* @Create Date 2564-08-05
*
/ -->

<script src="<?php echo base_url() . 'node_modules/easyqrcodejs/src' ?>/easy.qrcode.js"></script>


<div class="content">
    <div class="row" style="padding: 100px 10px 10px 20%;">
        <a style="color:#100575; font-size: 80px;">สร้างคิวอาร์โค้ด</a>
        <a style="font-size: 35px;">เริ่มสร้าง QR Code กันเลย </a>


        <div class="col-md-5">
            <div class="card" style="border-color:#E4E4E4;border-width: 5px;">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist" style="padding-b :50px;">
                        <a class="nav-item nav-link" id="#upweb" data-toggle="tab" href="#upweb" role="tab" aria-controls="nav-home" aria-selected="false"><i class="fas fa-paperclip"></i> เว็บไซต์</a>
                        <a class="nav-item nav-link active" id="#uppdf" data-toggle="tab" href="#uppdf" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="far fa-file-pdf"></i> PDF</a>
                        <a class="nav-item nav-link" id="#upimg" data-toggle="tab" href="#upimg" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="far fa-images"></i> รูปภาพ</a>

                    </div>
                </nav>

                <!--pdf-->
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="uppdf">
                        <form method="post" action="" enctype="multipart/form-data">
                            <label class=" form-control-label" style="padding-left: 45px; padding-top: 20px; color: #000000">ไฟล์ PDF</label>
                            <label style="color: #FF0000;">* <span id="text_namef"> </span> </label><br><br>
                            <div class="row">
                                <center>
                                    <input class="form-control" type="file" id="doc_path" name="doc_path" accept="application/pdf" placeholder="อัปโหลดไฟล์" style="margin: 0px; height: 50px; padding: 10px;" value="" onchange="file_validation()"><br>
                                </center>
                            </div>

                            <label class="form-control-label" style="padding-left: 45px; padding-top: 20px; color: #000000">ชื่อ:</label>
                            <label style="color: #FF0000;">* <span id="text_name"> </span> </label><br>
                            <div class="row">

                                <center>
                                    <input type="text" class="form-control" id="doc_name" name="doc_name" style="margin: 0px; height: 50px; " placeholder="ชื่อไฟล์" value="" onchange="name_validation()"><br />
                                </center>
                            </div>

                            <div id="inputlogo" style="margin-top: 30px;">
                                <center>
                                    <button type="button" class="slide" id="up" style="width: 80%; " onclick="showinputlogo()">เพิ่มโลโก้<i class="fas fa-angle-down" style="float: right;" aria-hidden="true"></i></button>
                                </center>
                            </div>

                            <div class="form-row" id="vanish" style="display:none;margin-left:10%;margin-top: 30px;">
                                <a style="margin-top: 10px;">โลโก้</a>&emsp;
                                <label style="color: #000;"> jpeg/png : </label>
                                <label id="name_img" style="color: #000;"></label>
                            </div>
                            <div class="parent-div" id="vanish1" style="display:none;margin-left:10%;">
                                <button class="btn-upload" style="color:#000;"><i class="fas fa-upload"></i> เลือกโลโก้คิวอาร์โค้ด</button>
                                <input id="logo_img" type="file" name="logo" onchange="getFileData();" accept="image/png, image/jpeg"><br><br>
                            </div>
                            <input id="logoinqr" type="text" name="logoinqr" value="<?php echo $this->session->userdata('logo_name') ?>" hidden>
                            <input type="text" id="text" name='text' value='1' hidden>
                            <center>
                                <button id="upload" name="upload" class="btn btn-dark_blue" style="margin-bottom: 30px;margin-top: 40px;background-color: #100575;color: #fff; width: 240;font-family:TH sarabun new; font-size: 35px;">สร้างคิวอาร์โค้ด</button>
                            </center>

                        </form>
                    </div>

                    <!--image-->

                    <div class="tab-pane fade" id="upimg">

                        <form method="post" action="" enctype="multipart/form-data">
                            <label class=" form-control-label" style="padding-left: 45px; padding-top: 20px; color: #000000">ไฟล์รูปภาพ</label>
                            <label style="color: #FF0000;">* <span id="text_nameimgf"> </span> </label><br><br>
                            <div class="row">
                                <center>
                                    <input class="form-control" type="file" id="doc_pathimg" name="doc_pathimg" accept="image/*" placeholder="อัปโหลดไฟล์" style="margin: 0px; height: 50px; padding: 10px;" value="" onchange="file_validationimg()"><br>
                                </center>
                            </div>

                            <label class="form-control-label" style="padding-left: 45px; padding-top: 20px; color: #000000">ชื่อ:</label>
                            <label style="color: #FF0000;">* <span id="text_imgname"> </span> </label><br>
                            <div class="row">
                                <center>
                                    <input type="text" id="doc_nameimg" name="doc_nameimg" class="form-control" style="margin: 0px; height: 50px;  " placeholder="ชื่อไฟล์" value="" onchange="name_validationimg()"><br />
                                </center>
                            </div>


                            <div id="inputlogo" style="margin-top: 30px;">
                                <center>
                                    <button type="button" class="slide" id="up2" style="width: 80%; " onclick="showinputlogo2()">เพิ่มโลโก้<i class="fas fa-angle-down" style="float: right;" aria-hidden="true"></i></button>
                                </center>
                            </div>

                            <div class="form-row" id="vanish2" style="display:none;margin-left:10%;margin-top: 30px;">
                                <a style="margin-top: 10px;">โลโก้</a>&emsp;
                                <label style="color: #000;"> jpeg/png : </label>
                                <label id="name_img2" style="color: #000;"></label>
                            </div>
                            <div class="parent-div" id="vanish3" style="display:none;margin-left:10%;">
                                <button class="btn-upload" style="color:#000;"><i class="fas fa-upload"></i> เลือกโลโก้คิวอาร์โค้ด</button>
                                <input id="logo_img2" type="file" name="logo" onchange="getFileData2();" accept="image/png, image/jpeg"><br><br>
                            </div>
                            <input id="logoinqr" type="text" name="logoinqr" value="<?php echo $this->session->userdata('logo_name') ?>" hidden>
                            <input type="text" id="text2" name='text2' value='1' hidden>
                            <center>
                                <button id="uploadimg" name="uploadimg" class="btn btn-dark_blue" style="margin-bottom: 30px;margin-top: 40px;background-color: #100575;color: #fff; width: 240;font-family:TH sarabun new; font-size: 35px;">สร้างคิวอาร์โค้ด</button>
                            </center>
                        </form>
                    </div>


                    <!--web-->

                    <div class="tab-pane fade" id="upweb">

                        <label class=" form-control-label" style="padding-left: 45px; padding-top: 20px; color: #000000">เว็บไซต์</label>
                        <label style="color: #FF0000;">* <span id="text_nameweb"> </span> </label><br>

                        <label id="target_div" style="display:none;margin-top: 3%;color: #FF0000;">กรอกข้อมูลลิงค์เว็บไซต์ (URL)</label>
                        <div class="row">
                            <center>
                                <input class="form-control" id="text3" type="text" style="margin: 0px; height: 50px;" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" value="https://www.example.com" required="required">
                            </center>
                        </div>
                        <div id="inputlogo" style="margin-top: 30px;">
                            <center>
                                <button type="button" class="slide" id="up3" style="width: 80%; " onclick="showinputlogo3()">เพิ่มโลโก้<i class="fas fa-angle-down" style="float: right;" aria-hidden="true"></i></button>
                            </center>
                        </div>

                        <div class="form-row" id="vanish4" style="display:none;margin-left:10%;margin-top: 30px;">
                            <a style="margin-top: 10px;">โลโก้</a>&emsp;
                            <label style="color: #000;"> jpeg/png : </label>
                            <label id="name_img3" style="color: #000;"></label>
                        </div>
                        <div class="parent-div" id="vanish5" style="display:none;margin-left:10%;">
                            <button class="btn-upload" style="color:#000;"><i class="fas fa-upload"></i> เลือกโลโก้คิวอาร์โค้ด</button>
                            <input id="logo_img3" type="file" name="logo" onchange="getFileData3();" accept="image/png, image/jpeg"><br><br>
                        </div>
                        <input id="logoinqr" type="text" name="logoinqr" value="<?php echo $this->session->userdata('logo_name') ?>" hidden>
                        <center>
                            <button id="uploadweb" name="uploadweb" class="btn btn-dark_blue" style="margin-bottom: 30px;margin-top: 40px;background-color: #100575;color: #fff; width: 240;font-family:TH sarabun new; font-size: 35px;">สร้างคิวอาร์โค้ด</button>
                        </center>
                    </div>

                    <!--end-->
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card" style="border-color:#E4E4E4;border-width: 5px;" height="500">
                <div class="card-body" style="margin: auto;">
                    <div id="capture" style="margin-top:40px;">
                        <div id="qrcode">
                            <img id="img" src="<?php echo base_url() . '/assets/image/QR_home.PNG' ?>" height="250" width="250" style="margin: auto;">
                        </div>
                    </div>
                    <br>
                    <center>
                        <button id="download" class="btn btn-warning" style="margin-top:40px;margin-bottom: 30px;font-family:TH sarabun new; font-size: 35px; width: 240; ">ดาวน์โหลด</button>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $('#upload').click(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "<?php echo site_url() ?>/Member/Member_upload_file/check_name",
            dataType: 'JSON',
            data: {
                'doc_name': doc_name.value
            },
            success: function(data) {
                if (data == true) {
                    console.log('thailand success');
                    uploadFile();
                } else {
                    console.log('thailand fail');
                    setTimeout('', 2000);
                    Swal.fire({
                        icon: 'warning',
                        title: 'ชื่อซ้ำ กรุณาตั้งชื่อเอกสารใหม่',
                        showConfirmButton: false,
                        timer: 2500
                    })
                }
            }
        })
    });
});

$(document).ready(function() {
    $('#uploadimg').click(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "<?php echo site_url() ?>/Member/Member_upload_file/check_nameimg",
            dataType: 'JSON',
            data: {
                'doc_nameimg': doc_nameimg.value
            },
            success: function(data) {
                if (data == true) {
                    console.log('thailand success');
                    uploadimg();
                } else {
                    console.log('thailand fail');
                    setTimeout('', 2000);
                    Swal.fire({
                        icon: 'warning',
                        title: 'ชื่อซ้ำ กรุณาตั้งชื่อเอกสารใหม่',
                        showConfirmButton: false,
                        timer: 2500
                    })
                }
            }
        })
    });
});

$(document).ready(function() {
    $('#uploadweb').click(function(e) {
        e.preventDefault();
        make3();
        setTimeout('', 2000);
        Swal.fire({
            icon: 'success',
            title: 'สร้างคิวอาร์โค้ดสำเร็จ',
            showConfirmButton: false,
            timer: 2500
        })
    });
});

function delay(delayInms) {
    return new Promise(resolve => {
        setTimeout(() => {
            resolve(2);
        }, delayInms);
    });
}

/*
 * uploadFile
 * send file pdf data and generate qr code
 * @input data file pdf
 * @output data file pdf
 * @author Ashirawat, Jerasak
 * @Create Date 2564-11-17
 */

async function uploadFile() {
    let formData = new FormData();
    formData.append("doc_path", doc_path.files[0]);
    formData.append("doc_name", doc_name.value);
    await fetch("<?php echo site_url() . "/Member/Member_upload_file/upload_file/" ?>", {
        method: "POST",
        data: {
            doc_name: doc_name
        },
        body: formData
    });
    make();
    let delayres = await delay(1000);
    await fetch("<?php echo site_url() . "/Member/Member_upload_file/upload_qrcode_file/" ?>", {
        method: "POST",
        data: {
            doc_name: doc_name
        },
        body: formData
    });

    doCapture();
    setTimeout('', 2000);
    Swal.fire({
        icon: 'success',
        title: 'บันทึกไฟล์สำเร็จ',
        showConfirmButton: false,
        timer: 2500
    })

}

/*
 * uploadimg
 * send file image data and generate qr code
 * @input data file image
 * @output data file image
 * @author Ashirawat
 * @Create Date 2565-02-03
 */

async function uploadimg() {
    let formData = new FormData();
    formData.append("doc_pathimg", doc_pathimg.files[0]);
    formData.append("doc_nameimg", doc_nameimg.value);
    await fetch("<?php echo site_url() . "/Member/Member_upload_file/upload_image/" ?>", {
        method: "POST",
        data: {
            doc_nameimg: doc_nameimg
        },
        body: formData

    });
    make2();
    let delayres = await delay(1000);
    await fetch("<?php echo site_url() . "/Member/Member_upload_file/upload_qrcode_image/" ?>", {
        method: "POST",
        data: {
            doc_nameimg: doc_nameimg
        },
        body: formData
    });
    doCapture();
    setTimeout('', 2000);
    Swal.fire({
        icon: 'success',
        title: 'บันทึกไฟล์สำเร็จ',
        showConfirmButton: false,
        timer: 2500
    })
}

/*
 * doCapture
 * capture qrcode
 * @input file name
 * @output file image qrcode
 * @author Ashirawat, Jerasak
 * @Create Date 2565-01-05
 */

function doCapture(doc_name) {
    window.scrollTo(0, 0);

    html2canvas(document.getElementById("capture")).then(function(canvas) {

        // Create an AJAX object
        var ajax = new XMLHttpRequest();

        // Setting method, server file name, and asynchronous
        ajax.open("POST", "<?php echo site_url() . "/Member/Member_upload_file/save_qrcode_image/" ?>", true);

        // Setting headers for POST method
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        // Sending image data to server
        ajax.send("image=" + canvas.toDataURL("image/jpeg", 0.9));

        // Receiving response from server
        // This function will be called multiple times
        ajax.onreadystatechange = function() {

            // Check when the requested is completed
            if (this.readyState == 4 && this.status == 200) {

                // Displaying response from server
                console.log(this.responseText);
            }
        };
    });
}

/*
 * name_validation
 * check filename pdf
 * @input file name
 * @output warning message
 * @author Ashirawat
 * @Create Date 2565-01-27
 */

function name_validation() {
    var text_n = document.getElementById("text_name");
    var d_name = document.getElementById("doc_name").value;
    var pattern = /^[ก-๏,0-9,a-z,A-Z]+$/;
    var n_check;
    if (d_name.match(pattern)) {
        text_n.innerHTML = "";
        n_check = 1;

    } else {
        text_n.innerHTML = "กรอกชื่อเอกสารไม่ถูกต้องห้ามมีตัวอักษรพิเศษ กรุณากรอกใหม่อีกครั้ง";
        text_n.style.color = "#ff0000";
        n_check = 0;

    }
    if (d_name == "") {
        text_n.innerHTML = "กรุณากรอกชื่อเอกสาร";
        text_n.style.color = "#ff0000";
        n_check = 0;

    }
    return n_check;
}

/*
 * file_validation
 * check the file pdf
 * @input file
 * @output warning message
 * @author Ashirawat
 * @Create Date 2565-01-27
 */

function file_validation() {
    var text_f = document.getElementById("text_namef");
    var f_name = document.getElementById("doc_path").value;
    var f_check;
    if (f_name != "") {
        text_f.innerHTML = "";
        f_check = 1;

    } else {
        text_f.innerHTML = "กรุณาเลือกไฟล์";
        text_f.style.color = "#ff0000";
        f_check = 0;

    }
    if (f_name == "") {
        text_f.innerHTML = "กรุณาเลือกไฟล์";
        text_f.style.color = "#ff0000";
        f_check = 0;

    }
    return f_check;
}
$(document).on('change', '.form-control', function() {
    var submit = document.getElementById("upload");

    if (name_validation() == 0 || file_validation() == 0) {
        submit.disabled = true;

    } else {
        submit.disabled = false;

    }

});

/*
 * name_validation
 * check filename image
 * @input file name
 * @output warning message
 * @author Ashirawat
 * @Create Date 2565-01-28
 */

function name_validationimg() {
    var text_in = document.getElementById("text_imgname");
    var id_name = document.getElementById("doc_nameimg").value;
    var pattern = /^[ก-๏,0-9,a-z,A-Z]+$/;
    var in_check;
    if (id_name.match(pattern)) {
        text_in.innerHTML = "";
        in_check = 1;

    } else {
        text_in.innerHTML = "กรอกชื่อเอกสารไม่ถูกต้องห้ามมีตัวอักษรพิเศษ กรุณากรอกใหม่อีกครั้ง";
        text_in.style.color = "#ff0000";
        in_check = 0;

    }
    if (id_name == "") {
        text_in.innerHTML = "กรุณากรอกชื่อเอกสาร";
        text_in.style.color = "#ff0000";
        in_check = 0;

    }
    return in_check;
}

/*
 * file_validation
 * check the file image
 * @input file
 * @output warning message
 * @author Ashirawat
 * @Create Date 2565-01-28
 */

function file_validationimg() {
    var text_if = document.getElementById("text_nameimgf");
    var if_name = document.getElementById("doc_pathimg").value;
    var if_check;
    if (if_name != "") {
        text_if.innerHTML = "";
        if_check = 1;

    } else {
        text_if.innerHTML = "กรุณาเลือกไฟล์";
        text_if.style.color = "#ff0000";
        if_check = 0;

    }
    if (if_name == "") {
        text_if.innerHTML = "กรุณาเลือกไฟล์";
        text_if.style.color = "#ff0000";
        if_check = 0;

    }
    return if_check;
}
$(document).on('change', '.form-control', function() {
    var submit = document.getElementById("uploadimg");

    if (name_validationimg() == 0 || file_validationimg() == 0) {
        submit.disabled = true;

    } else {
        submit.disabled = false;

    }

});

/*
 * make
 * generate qrcode from pdf file
 * @input file pdf data and logo data
 * @output qrcode file
 * @author Ashirawat, Jerasak
 * @Create Date 2564-11-17
 */

function make() {
    var logoin = '';
    const [file] = logo_img.files
    if (file) {
        var logoin = URL.createObjectURL(file);
    }
    var text = document.getElementById('text');
    var qrcode = document.getElementById('qrcode');



    if (text.value.trim() !== '') {

        $.ajax({
            url: "<?php echo site_url() ?>/Member/Member_upload_file/get_path_document",
            dataType: 'JSON',
            success: function(data) {
                // console.log(data);
                qrcode.innerHTML = '';
                new QRCode(document.getElementById("qrcode"), {
                    text: data,
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

        });

    }
    //qrcode.resize(480, 480);
}

/*
 * make2
 * generate qrcode from image file
 * @input file image data and logo data
 * @output qrcode file
 * @author Ashirawat
 * @Create Date 2565-02-03
 */

function make2() {
    var logoin = '';
    const [file] = logo_img2.files
    if (file) {
        var logoin = URL.createObjectURL(file);
    }
    var text = document.getElementById('text2');
    var qrcode = document.getElementById('qrcode');



    if (text.value.trim() !== '') {

        $.ajax({
            url: "<?php echo site_url() ?>/Member/Member_upload_file/get_path_image",
            dataType: 'JSON',
            success: function(data) {
                // console.log(data);
                qrcode.innerHTML = '';
                new QRCode(document.getElementById("qrcode"), {
                    text: data,
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

        });

    }
    //qrcode.resize(480, 480);
}

/*
 * make3
 * generate qrcode from web
 * @input text web and logo data
 * @output qrcode file
 * @author Ashirawat
 * @Create Date 2565-02-03
 */

function make3() {
    var logoin = '';
    const [file] = logo_img3.files
    if (file) {
        var logoin = URL.createObjectURL(file);
    }
    var text = document.getElementById('text3');
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

document.getElementById("download").addEventListener("click", function() {

    const note = document.querySelector('#capture');
    note.style.border = '10px solid #fff';

    html2canvas(document.querySelector('#capture')).then(function(canvas) {

        saveAs(canvas.toDataURL(), 'DQS_QR.png');
    });

});

/*
 * saveAs
 * download file qrcode 
 * @input filename
 * @output file qrcode 
 * @author Ashirawat, Jerasak
 * @Create Date 2565-01-12
 */

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

/*
 * getFileData
 * get and show name logo
 * @input file logo
 * @output name file logo
 * @author Ashirawat, Jerasak
 * @Create Date 2565-01-12
 */

function getFileData() {
    var file = document.getElementById("logo_img");
    var file_name = document.getElementById("name_img");
    $('#name_img').text(file.files[0].name);
}

/*
 * getFileData2
 * get and show name logo
 * @input file logo
 * @output name file logo
 * @author Ashirawat
 * @Create Date 2565-02-03
 */

function getFileData2() {
    var file = document.getElementById("logo_img2");
    var file_name = document.getElementById("name_img2");
    $('#name_img2').text(file.files[0].name);
}

/*
 * getFileData3
 * get and show name logo
 * @input file logo
 * @output name file logo
 * @author Ashirawat
 * @Create Date 2565-02-03
 */

function getFileData3() {
    var file = document.getElementById("logo_img3");
    var file_name = document.getElementById("name_img3");
    $('#name_img3').text(file.files[0].name);
}

/*
 * showinputlogo
 * show button input logo
 * @input -
 * @output button input logo
 * @author Ashirawat, Jerasak
 * @Create Date 2565-01-13
 */

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

/*
 * showinputlogo2
 * show button input logo
 * @input -
 * @output button input logo
 * @author Ashirawat
 * @Create Date 2565-02-03
 */

function showinputlogo2() {
    $('#up2').find("i").toggleClass("fa-angle-down fa-angle-up");
    var x = document.getElementById("vanish2");
    var y = document.getElementById("vanish3");
    if (x.style.display === "none") {
        x.style.display = "block";
        y.style.display = "block";
    } else {
        x.style.display = "none";
        y.style.display = "none";
    }

}

/*
 * showinputlogo3
 * show button input logo
 * @input -
 * @output button input logo
 * @author Ashirawat
 * @Create Date 2565-02-03
 */

function showinputlogo3() {
    $('#up3').find("i").toggleClass("fa-angle-down fa-angle-up");
    var x = document.getElementById("vanish4");
    var y = document.getElementById("vanish5");
    if (x.style.display === "none") {
        x.style.display = "block";
        y.style.display = "block";
    } else {
        x.style.display = "none";
        y.style.display = "none";
    }

}
</script>
<style>
.show {
    display: block;
}

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

input[type=file],
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
    height: 47px;
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

a {
    font-size: 16px
}

.slide {
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

.nav-tabs .nav-link {
    background-color: #cfcfcf;
    border-color: #fff;
}

.nav-tabs .nav-link.active:focus,
.nav-tabs .nav-link.active:hover {
    border-color: #fff;
}
</style>