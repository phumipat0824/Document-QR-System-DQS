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
            <form action="<?php echo site_url() . 'Member/Member_edit/edit_member' ?>" method="post">
            <div class="row">
                <div class="col-md-5 offset-md-1">
                    <label style = "color: #000000;  font-size: 15px;" for="">หน่วยงาน</label>
                    <label style = "color: #FF0000;">*</label>
                    <select name="mem_dep_id" id="mem_dep_id" class="form-select" aria-label="Default select example"  required>
                        <option style = "color: #000000;  font-size: 15px;" value="" selected >--------- เลือกหน่วยงาน ---------</option>
                    </select>

                    <label style = "color: #000000;  font-size: 15px;" for="">ชื่อ</label>
                    <label style = "color: #FF0000;">*</label>
                    <input type="text" class="form-control"  id="new_password" name="new_password" placeholder="ชื่อ" required><br>

                    <label style = "color: #000000; font-size: 15px;" for="">ชื่อผู้ใช้งาน</label>
                    <label style = "color: #FF0000;">*</label>
                    <input type="text" class="form-control" id="mem_confirm" name="mem_confirm" placeholder="ชื่อผู้ใช้งาน" required><br>

                    <label style = "color: #000000; font-size: 15px;" for="">อีเมล</label>
                    <label style = "color: #FF0000;">*</label>
                    <input type="email" class="form-control" id="mem_confirm" name="mem_confirm" placeholder="อีเมล" required><br>
                    </div>

                <div class="col-md-5 offset-md-1">
                    <label style = "color: #000000;  font-size: 15px;" for="">จังหวัด</label>
                    <label style = "color: #FF0000;">*</label>
                    <select name="mem_dep_id" id="mem_dep_id" class="form-select" aria-label="Default select example"  required>
                        <option style = "color: #000000;  font-size: 15px;" value="" selected >--------- เลือกจังหวัด ---------</option>
                    </select>

                    <label style = "color: #000000;  font-size: 15px;" for="">นามสกุล</label>
                    <label style = "color: #FF0000;">*</label>
                    <input type="text" class="form-control"  id="new_password" name="new_password" placeholder="นามสกุล" required><br>

                    <label style = "color: #000000; font-size: 15px;" for="">รหัสพนักงาน</label>
                    <label style = "color: #FF0000;">*</label>
                    <input type="text" class="form-control" id="mem_confirm" name="mem_confirm" placeholder="รหัสพนักงาน" required><br>
                </div>
            </div>
           
            <div class="row gx-5 ">
                                    <div class="col-2"></div>
                                    <div class="d-grid gap-2 d-md-block">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                                            <input type="button" class="btn btn-light" onclick="goBack()" value="ยกเลิก">
                                            <input type="button" id="btn-ok" style="background-color:  #518FF6; color:white;" value="ยืนยัน" name="register" class="btn">
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
   
</style>
<script>
    $(document).ready(function() {
        $('form #btn-ok').click(function(e) {
            Swal.fire({
            title: 'บันทึกการเปลี่ยนแปลงหรือไม่?',
            showCancelButton: true,
            confirmButtonColor: '#518FF6',
            cancelButtonColor: '#fffff',
            cancelButtonText: 'ยกเลิก',
            confirmButtonText: 'บันทึก'
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                icon: 'success',
                title: 'เปลี่ยนแปลงรหัสผ่านสำเร็จ',
                showConfirmButton: false,
                timer: 1500
            })
            }
            })
        });
    });

  
</script>