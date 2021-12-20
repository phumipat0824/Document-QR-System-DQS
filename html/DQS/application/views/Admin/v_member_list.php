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
                                        <a href="<?php echo site_url() ?>/Member/Member_edit/show_member_edit">
                                            <i class="far fa-edit"></i></a>
                                    </td>
                                    <td>

                                        <!-- <a href="<?php echo site_url() ?>/Admin/Admin_home/delete_admin">-->
                                        <!-- <i type=" submit" class="fas fa-trash"></i> -->

                                        <button type="button" class="btn bg-gradient-primary deleteModal"
                                            value='<?php echo $arr_member[$i]->mem_id; ?>'> <i
                                                class="fas fa-trash"></i>
                                        </button>
                                        

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

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<!-- Delete modal -->
<!-- <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="delete-form" method="POST" onsubmit="return false">

                <div class="modal-body">
                    <input type="hidden" name="mem_id" id="mem_id" value="">

                    <h5 class="modal-title font-weight-normal"
                        id="exampleModalLabel">
                        ยืนยันการลบบัญชีผู้ใช้</h5>
                    <br>
                    <center><input type="submit" class="btn bg-gradient-primary"
                            value="ยืนยัน">
                        <button type="button" class="btn bg-gradient-secondary"
                            data-bs-dismiss="modal">ยกเลิก</button>
                    </center>
                </div>
            </form>

        </div>
    </div>
</div> -->

<!-- <script>
function delete_admin(element, mem_id) {

    $.ajax({
        type: "POST",
        url: "<?php echo site_url()."/Admin/Admin_home/delete_admin" ?>",
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
</script> -->
<!-- 
<script type="text/javascript">
$(document).on("click", ".deleteModal", function() {
    // alert('1');
    var id = $(this).attr('data-id');
    $("#mem_id").val(id);
});
</script> -->


<!-- 
<script type="text/javascript">
$('#edit-form').submit(function() {
    alert('2');
    $.ajax({
        type: 'post',
        url: "<?php echo site_url().'/Admin/Admin_home/delete_admin'?>",
        data: $("#edit-form").serialize(),
        dataType: 'json',
        success: function(data) {
            console.log("succ");
            alert('yes');
        },
        error: function(error) {
            alert('no');
            console.log("error");
            location.reload();
        }
    });
});
</script> -->
<script>
    $(document).ready(function(){
        $('.deleteModal').click(function(e){
            e.preventDefault();
            var mem_id = $(this).val() ;
            // console.log(mem_id);

            swal({
            title: "คุณต้องการลบป็อปอัปหรือไม่",
                text: "หากคุณยืนยันการลบแล้วคุณจะไม่สามารถกู้คืนป็อปอัปนี้ได้",
                icon: "warning",
                buttons: ["ยกเลิก","ตกลง"],
                dangerMode: true,
	        })
            .then((willDelete) => {
                if (willDelete) 
                {
                    $.ajax({
                        url: "<?php echo site_url().'/Admin/Admin_home/delete_admin'?>",
                        type:'POST',
                        data:{
                            mem_id :  mem_id
                        },
                        success: function(response){
                            console.log("success")
                            swal({
                                title: "ลบสำเร็จ",
                                text: 'ป็อปอัปถูกลบเรียบร้อยแล้ว',
                                icon: 'success',
                                buttons: false,
                            }).then((confirmed)=>{
                                window.location.reload();
                            });
                        }   
                    });


                } 
            });


        });
        

    

    });
</script>