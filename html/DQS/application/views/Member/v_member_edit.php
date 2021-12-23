<div class="content">
<div class="container-fluid" style="padding-top: 100px ;margin: auto;">
    <div class="row">
        <div class="col-md-6 offset-md-4">
        <center><h1 style="color:#003399">แก้ไขข้อมูลบัญชีผู้ใช้</h1></center>
        </div>
    </div>
    <div class="row">
    <div class="col-md-8 offset-md-3">
        <div class="card"  style="border-radius: 30px; padding: 70px; padding-right: 110px; padding-bottom: 20px;">
            <form action="<?php echo site_url() . '/Member/Member_edit/edit_member' ?>" method="post">
            <div class="row">
                <div class="col-md-5 offset-md-1">
                    <label style = "color: #000000;  font-size: 15px;" for="">หน่วยงาน</label>
                    <label style = "color: #FF0000;">*</label>
                    <select name="mem_dep_id" id="mem_dep_id" class="form-select" aria-label="Default select example"    required>
                        <option style = "color: #000000;  font-size: 15px;" value="<?php echo $obj_mem->dep_id ?>"><?php echo $obj_mem->dep_name ?></option>
                        <?php foreach ($arr_department as $value) { ?>
                            <?php if($value ->dep_id != $obj_mem->dep_id){ ?>
                                <option value='<?php echo $value->dep_id ?>'><?php echo $value->dep_name ?></option>             
                            <?php }?>
                        <?php } ?>  
                    </select>

                    <input type="hidden" class="form-control" value="<?php echo $obj_mem->mem_id ?>" name='mem_id' required>
                    <label style = "color: #000000;  font-size: 15px;" for="">ชื่อ</label>
                    <label style = "color: #FF0000;">*</label>
                    <input type="text" class="form-control"  id="mem_firstname" name="mem_firstname" placeholder="ชื่อ" required value="<?php echo $obj_mem->mem_firstname ?>"><br>

                    <label style = "color: #000000; font-size: 15px;" for="">ชื่อผู้ใช้งาน</label>
        
                    <input type="text" class="form-control" id="mem_username" name="mem_username" disabled placeholder="ชื่อผู้ใช้งาน"  value="<?php echo $obj_mem->mem_username?>"><br>

                    
                    </div>

                <div class="col-md-5 offset-md-1">
                    <label style = "color: #000000;  font-size: 15px;" for="">จังหวัด</label>
                    <label style = "color: #FF0000;">*</label>
                    <select name="mem_pro_id" id="mem_pro_id" class="form-select" aria-label="Default select example"  required>
                        <option style = "color: #000000;  font-size: 15px;" value="<?php echo $obj_mem->pro_id ?>"><?php echo $obj_mem->pro_name ?></option>
                        <?php foreach ($arr_province as $value) { ?>
                            <?php if($value ->pro_id != $obj_mem->pro_id){ ?>
                                    <option value='<?php echo $value->pro_id ?>'><?php echo $value->pro_name ?></option>
                            <?php } ?>
                        <?php }?>
                    </select>

                    <label style = "color: #000000;  font-size: 15px;" for="">นามสกุล</label>
                    <label style = "color: #FF0000;">*</label>
                    <input type="text" class="form-control"  id="mem_lastname" name="mem_lastname" placeholder="นามสกุล" required value="<?php echo $obj_mem->mem_lastname?>"><br>

                    <label style = "color: #000000; font-size: 15px;" for="">อีเมล</label>
                    <label style = "color: #FF0000;">*</label>
                    <input type="email" class="form-control" id="mem_email" name="mem_email" placeholder="อีเมล" required value="<?php echo $obj_mem->mem_email?>"><br>
                    
                </div>
            </div>
           
            <div class="row gx-5 ">
                                    <div class="col-2"></div>
                                    <div class="d-grid gap-2 d-md-block">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                                            <input type="button" class="btn btn-light" onclick="goBack()" value="ยกเลิก">
                                            <input type="button"  id="btn-ok" style="background-color:  #518FF6; color:white;" value="ยืนยัน" name="edit" class="btn">
                                        </div>
                                    </div>
                                    <div class="col-2"></div>
                                </div>
                
              
            </form>
        </div>
    </div>
    </div>

</div>
</div>
<style>
    body {
        background-color: #eff3f7;
    }
    h1{
        font-size: 4.5vw;
    }
   /*ปรับรูปแบบตัวอักษร */
   @import url('https://fonts.googleapis.com/css2?family=Sarabun&display=swap');
    *{
        font-family: 'Sarabun', sans-serif;
    }

</style>

<script>
    function goBack() {
            window.history.back();
        }
    $(document).ready(function() {
        $('form #btn-ok').click(function(e) {
            let $form = $(this).closest('form');
            Swal.fire({
            title: 'บันทึกการแก้ไขข้อมูลหรือไม่?',
            showCancelButton: true,
            confirmButtonColor: '#518FF6',
            cancelButtonColor: '#fffff',
            cancelButtonText: 'ยกเลิก',
            confirmButtonText: 'บันทึก'
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                icon: 'success',
                title: 'บันทึกการแก้ไขเรียบร้อยแล้ว',
                showConfirmButton: false,
                timer: 1500
            })
            document.getElementById('btn-ok').type = 'submit';
                    $form.submit();
            }
            })
            
        });
    });

  
</script>
