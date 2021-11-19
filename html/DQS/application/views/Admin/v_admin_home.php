<div class="content">
    <div class="row" style="padding: 100px 10px 10px 20%;">
        <div class="col-md-8">
            <h1 style="color:#003399; font-family:TH Sarabun New; font-weight: 900; font-size: 80px;">คิวอาร์โค้ดของฉัน
            </h1>
        </div>
        <div class="col-md-4">
            <button class="btn btn-primary btn-round" style=" width: 145px; background-color: #F5F5F5 ; border: none;"
                class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <h1 style="font-weight: 900; color:#003399 ; font-size: 50px; font-family:TH Sarabun New; height: 40; width: 50px;"
                    id="button-folder">+ สร้าง</h1>
            </button>
        </div>


        <h3 style="color:#707070; font-family:TH Sarabun New; font-weight: 900;">โฟลเดอร์</h3>

        <div class="row">
            <?php 
    for ($i = 0; $i < count($arr_fol); $i++) {   ?>


            <div class="col-3">
                <div class="card card-frame" style=" height: 60px; width: 260px;">
                    <div class="card-body">
                        <p style="font-size: 26px; font-family:TH Sarabun New;">
                            <i class="material-icons">folder</i>
                            <?php echo $arr_fol[$i]->fol_name ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div>
                        <option for="province" class="card-title " style="padding-top: 10px;" font-size="150px;">
                            <h4>ค้นหาข้อมูล</h4>
                            <!-- <?php print_r($arr_member); ?> -->
                    </div>
                </div>
            </div>
            <br>
            <!-- div header end   -->


            <div class="card-body" style="margin-top: -20px;">

                <div id="create_table"></div>

            </div>

            <br>
            <form>

                <div class="card">
                    <div class="card-body ">
                        <table class="table" id="datatable_anime_list">
                            <thead>
                                <tr class="thead_color">
                                    <th class="text-center">หน่วยงาน</th>
                                    <th>จังหวัด</th>
                                    <th>ชื่อผู้ใช้งาน</th>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>

                            <?php for($i = 0; $i < count($arr_member); $i++){?>
                            <tr>
                                <td>
                                    <?php echo $arr_member[$i]->dep_name; ?>
                                </td>
                                <td>
                                    <?php echo $arr_member[$i]->pro_name; ?>
                                </td>
                                <td>
                                    <?php echo $arr_member[$i]->mem_username; ?>
                                </td>
                                <td>
                                    <?php echo $arr_member[$i]->mem_firstname." ".$arr_member[$i]->mem_lastname; ?>
                                </td>
                                <td>
                                    <i class="far fa-edit"></i>
                                </td>
                                <td>





                                    <input type="hidden" name="mem_id" value='<?php echo $arr_member[$i]->mem_id; ?>'>
                                    <a
                                        href="<?php echo site_url() ?>/Admin/Admin_home/delete_admin/<?php echo $arr_member[$i]->mem_id ?>"><i
                                            type="submit" class="fas fa-trash"></i></a>
                                    <?php echo $arr_member[$i]->mem_id; ?>


                                    <!-- Delete modal -->
                                    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <form id="add-form" method="POST"
                                                        action="<?php echo site_url() ?>/Admin/Admin_home/delete_admin">
                                                        <div class="modal-body">
                                                            <input type="hidden" name="mem_id"
                                                                value='<?php echo $arr_member[$i]->mem_id; ?>'>

                                                            <h5 class="modal-title font-weight-normal"
                                                                id="exampleModalLabel">
                                                                ยืนยันการลบบัญชีผู้ใช้</h5>
                                                            <br>
                                                            <?php echo $arr_member[$i]->mem_id; ?>
                                                            <?php echo $i; ?>
                                                            <center><button type="submit"
                                                                    class="btn bg-gradient-primary">ยืนยัน</button>
                                                                <button type="button" class="btn bg-gradient-secondary"
                                                                    data-bs-dismiss="modal">ยกเลิก</button>
                                                            </center>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div> -->
                                </td>

                            </tr>
                            <?php } ?>
                        </table>

                    </div>
                </div>
        </div>
    </div>
</div>
</div>
<script>
function delete_admin(element, mem_id) {

    $.ajax({
        type: "POST",
        url: "<?php echo site_url() . "/Admin/Admin_home/delete_admin" ?>",
        data: {
            'mem_id': mem_id
        },
        dataType: 'JSON',
        async: false,
        success: function(jsondata) {
            // alert(jsondata)        
        }
    })
}
</script>