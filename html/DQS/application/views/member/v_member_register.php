<div class="content">
    <div class="container-fluid" style="padding-top: 100px ;margin: auto;" ;>
        <div class="row gx-5">
            <div class="col-lg-2 col-md-2" style="padding-left: 100px ">
            </div>
            <div class="col-lg-8 col-md-8" style="padding-left: 100px ">
                <div class="card">
                    <div class="row gx-5">

                        <div class="col"></div>
                        <div class="col-10">
                            <div class="row justify-content-md-center">
                                <div class="col col-lg-1">

                                </div>
                                <div class="col-md-10 justify-content-md-center">
                                    <div class="card-header card-header-primary">
                                        <h2 class="text-center">สมัครสมาชิก</h2>
                                    </div>
                                </div>
                                <div class="col col-lg-1">

                                </div>
                            </div>
                            <form action='<?php echo site_url() . 'Member/Member_register/insert_session' ?>' method="post" name='form' onsubmit="checkpassword()">
                                <div class="row gx-5">
                                    <div class="col">
                                        <div class="p-3 ">จังหวัด</div>
                                        <select name="mem_province_id" id="mem_province_id" class="form-select" aria-label="Default select example" required>
                                            <option value="" selected>--------- เลือกจังหวัด ---- -----</option>
                                            <?php foreach ($arr_province as $value) { ?>
                                                <option value='<?php echo $value->pro_id ?>'><?php echo $value->pro_name ?></option>
                                            <?php } ?>
                                        </select><br>
                                    </div>
                                    <div class="col">
                                        <div class="p-3 ">หน่วยงาน</div>
                                        <select name="mem_dep_id" id="mem_dep_id" class="form-select" aria-label="Default select example" required>
                                            <option value="" selected>--------- เลือกหน่วยงาน ---------</option>
                                            <?php foreach ($arr_department as $value) { ?>
                                                <option value='<?php echo $value->dep_id ?>'><?php echo $value->dep_name ?></option>
                                            <?php } ?>
                                        </select><br>
                                    </div>
                                </div>


                                <div class="row gx-5">
                                    <div class="col">
                                        <div class="p-3 ">คำนำหน้าชื่อ</div>
                                        <select name="mem_pref_id" id="mem_pref_id" class="form-select" aria-label="Default select example" required>
                                            <option value="0" selected>------- คำนำหน้า ---------</option>
                                            <option value="1">นาย</option>
                                            <option value="2">นางสาว</option>
                                            <option value="3">นาง</option>
                                        </select><br>
                                    </div>
                                    <div class="col">
                                        <div class="p-3 ">ชื่อ</div>

                                        <input type="text" class="form-control" id="mem_firstname" name="mem_firstname" placeholder="ชื่อ"><br>
                                    </div>
                                    <div class="col">
                                        <div class="p-3 ">นามสกุล</div>
                                        <input type="text" class="form-control" id="mem_lastname" name="mem_lastname" placeholder="นามสกุล"><br>
                                    </div>

                                </div>


                                <div class="row gx-5">
                                    <div class="col">

                                        <div class="p-3 ">อีเมล</div>
                                        <input type="email" class="form-control" id="mem_email" name="mem_email" placeholder="อีเมล" required oninvalid="this.setCustomValidity('กรุณากรอกอีเมลที่ถูกต้อง')" oninput="setCustomValidity('')"></input>
                                    </div>
                                    <input type="hidden" name="mem_role" id="mem_role" value="2">




                                    <div class="col">
                                        <div class="p-3 ">รหัสผ่าน</div>

                                        <input type="password" name="password" class="form-control" id="mem_password" name="mem_password" placeholder="รหัสผ่าน" required onchange="checkpassword()" oninvalid="this.setCustomValidity('โปรดเลือกรหัสผ่านที่ปลอดภัยยิ่งขึ้น ใช้อักขระ 8 ตัวขึ้นไปสำหรับรหัสผ่าน ใช้ตัวอักษร ตัวเลขผสมกัน')" oninput="this.setCustomValidity('')" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"><br>

                                    </div>
                                    <div class=" col">
                                        <div class="p-3 ">ยืนยันรหัสผ่าน</div>
                                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="ยืนยันรหัสผ่าน" onchange="checkpassword()" required oninvalid="this.setCustomValidity('โปรดเลือกรหัสผ่านที่ปลอดภัยยิ่งขึ้น ใช้อักขระ 8 ตัวขึ้นไปสำหรับรหัสผ่าน ใช้ตัวอักษร ตัวเลขผสมกัน')" oninput="this.setCustomValidity('')" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"><br>
                                    </div>
                                </div>

                                <div class=" row gx-5 ">
                                    <div class=" col-4">
                                    </div>
                                    <div class="col-7">
                                        <label id="subtitle_password" class="form-text text-muted">ใช้อักขระ 8 ตัวขึ้นไปสำหรับรหัสผ่าน ใช้ตัวอักษร ตัวเลขผสมกัน</label>
                                    </div>

                                    <div class="col-1"></div>
                                </div>

                                <div class=" row gx-5 ">
                                    <div class=" col-2">
                                    </div>
                                    <div class="d-grid gap-2 col-6 mx-auto">
                                        <span id='message'> </span>
                                        <br><button class="btn btn-primary" id='submit' type="submit">สมัครสมาชิก</button>
                                    </div>

                                    <div class=" col-2">
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="col"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function checkpassword() {
        const password = document.querySelector('input[name=password]');
        const confirm = document.querySelector('input[name=confirm_password]');
        if (confirm.value === password.value) {
            confirm.setCustomValidity('');
        } else if (confirm.value !== password.value) {
            confirm.setCustomValidity('โปรดกรอกรหัสผ่านให้ตรงกัน');
        }
    }
</script>