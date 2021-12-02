<div class="row" style="padding: 100px 10px 10px 20%;">
    <form method='POST' action='<?php echo site_url().'/Member/Member_upload_file/upload_file'; ?>' enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">
                <div class="report">
                    <h1>ทดสอบ</h1>
                </div>
            </div>
            <div class="card-body">
                <div class="pl-lg-4">
                    <div class="row">
                        <!-- Insert Department Name -->
                        <div class="col-lg-6">

                            <label class="form-control-label">ชื่อ</label>
                            <input type="text" name="doc_name" class="form-control" placeholder="ชื่อ" required>

                        </div>
                        <!--------------------------->
                    </div>
                    <!-- Insert Department Image -->
                    <div class="col-lg-6">
                        <input type="hidden" name='doc_type' value='pdf'>
                        <label class="form-control-label">อัปโหลด</label><br>
                        <input type="file" class="form-control" id="showimg" name="doc_path" accept="application/pdf" onchange="preview_image(event)" required>

                    </div>
                    <!--------------------------->
                </div>
                <!-- Button Submit/Reset and Back -->
                <div class="float-right">
                    <button type="button" class="btn btn-light">ย้อนกลับ</button></a>
                    <a><button type="reset" name="ยกเลิก" class="btn btn-danger">ยกเลิก</button></a>
                    <a><button type="submit" name="บันทึก" class="btn btn-success">บันทึก</button></a>
                </div>
                <!---------------------------------->
            </div>
            <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
        </div>
    </form>
</div>
<div class="content">
    <div class="row" style="padding: 100px 10px 10px 20%;">
        <div class="col-md-10">
            <div class="card" style="border-radius: 10px;">
                <div class="text-center mb-4">
                    <div class="card-header card-header-" style="border-radius: 10px; background-color: #191970;">
                        <h style="color:#FFFFFF; font-family:TH Sarabun New; font-size: 35px; margin-right: 1000px; font-weight:bold;">คิวอาร์โค้ด</h>
                    </div>
                </div>