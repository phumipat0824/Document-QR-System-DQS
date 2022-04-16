<div class="content">
    <div class="container-fluid" style="padding-top: 100px ;margin: auto;">

        <div class="row">
            <div class="col-md-8 offset-md-3">

                <form id="form" action="<?php echo site_url() . '/Member/Member_edit/edit_member' ?>" method="post">

                    <div class="card">

                        <div class="card-header card-header-warning" style=" height: 60px; width: 300px;">


                            <h5 class="card-title" style="margin-left: 55px; font-family:TH Sarabun New; font-size:1.8em;"><i class="far fa-file-alt"></i>&ensp;ฟอร์มข้อมูลไฟล์</h5>

                        </div>

                        <div class="card-body table-responsive">
                            <div class="row" style="margin-top: 20px;">
                                <div class="col-md-8 offset-md-2" style="margin: auto;">
                                    <label style="color: #000000;  font-size: 22px; font-family: TH Sarabun New;">เอกสาร</label>
                                    <label style="color: #FF0000;">*</label>
                                    <select onchange="get_doc()" name="doc_id" id="doc_id" class="form-select" aria-label="Default select example" required>
                                        <?php foreach ($arr_doc as $value) { ?>
                                        <option value='<?php echo $value->doc_id ?>'><?php echo $value->doc_name ?></option>
                                        <?php } ?>
                                    </select>
                                    <br>
                                    <label style="color: #000000;  font-size: 22px; font-family: TH Sarabun New;">วันที่เริ่มต้น</label>
                                    <label style="color: #FF0000;">*</label>
                                    <div class="input-group input-group-static my-3">
                                        <input type="date" class="form-select" name="doc_time" id="doc_time" required>
                                    </div>

                                    <label style="color: #000000;  font-size: 22px; font-family: TH Sarabun New;">วันที่สิ้นสุด</label>
                                    <label style="color: #FF0000;">*</label>
                                    <div class="input-group input-group-static my-3">
                                        <input type="date" class="form-select" name="doc_timeend" id="doc_timeend" required>
                                    </div>
                                </div>

                                <div class="col-md-5" style="margin: auto;">

                                </div>
                            </div>
                            <div class="row ">

                                <div class="col-md-3" style="margin: auto; margin-bottom: 20px; margin-top: 40px;">
                                    <input type="button" class="btn btn-danger" onclick="goBack()" value="ยกเลิก">
                                    <input type="button" id="btn-ok" value="ยืนยัน" name="edit" class="btn btn-success">
                                </div>
                            </div>
                        </div>
                        <!-- ปิด body footer -->
                    </div>
            </div>
        </div>
        <!-- ปิด row -->




        </form>

        <!-- cardfooter -->
    </div>
</div>

<script type="text/javascript">
function goBack() {
    window.history.back();
}
</script>


<style>
body {
    background-color: #eff3f7;
}
</style>