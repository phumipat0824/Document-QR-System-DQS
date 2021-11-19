<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/plugin' ?>/DataTables/datatables.css" />
<script type="text/javascript" src="<?php echo base_url() . 'assets/plugin' ?>/DataTables/datatables.js"></script>
<link href="<?php echo base_url() . 'assets/template/material-dashboard-master' ?>/assets/css/CSS_table_list.css"
    rel="stylesheet" />

<div class="main-panel">
    <div class="container">
        <div class="content">
            <div class=" container-fluid">
                <!-- defual tab -->


                <div class="row" style="margin-top: 10%;">
                    <div class="row">
                        <div class="col-10_5">
                            <h1 class="card-title " style="padding-top: 10px;" font-size="150px;" font_color="Blue">
                                จัดการบัญชีใช้งาน
                                </h1s>
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
                                        <a href="<?php echo site_url() ?>/Member/member_changepass/show_changepass">
                                            <i class="far fa-edit"></i></a>
                                    </td>
                                    <td>

                                        <a href="<?php echo site_url() ?>/Admin/Admin_home/show_admin_home">
                                            <i type=" submit" class="fas fa-trash"></i>



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