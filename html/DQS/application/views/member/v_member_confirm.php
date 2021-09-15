<div class="content">
    <div class="container-fluid" style="padding-top: 100px ;margin: auto;" ;>
        <div class="row gx-5">
            <div class="col-lg-2 col-md-2" style="padding-left: 100px ">
            </div>
            <div class="col-lg-8 col-md-8" style="padding-left: 100px ">
                <div class="card">
                    <div class="row gx-5">
                        <div class='col'></div>
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

                            <form action="<?php echo site_url() . 'Member/Member_register/insert_member' ?>" method="post">
                                <div class="row gx-5">
                                    <div class="col">
                                        <div class="p-3 ">จังหวัด</div>
                                        <input name="pro_name" id="pro_name" class="form-control" aria-label="Default select example" value="<?php echo $this->session->userdata('pro_name') ?>" required disabled>
                                        <input type="hidden" name="mem_province_id" id="mem_province_id" value="<?php echo $this->session->userdata('mem_province_id') ?>">
                                        <br>
                                    </div>
                                    <div class="col">
                                        <div class="p-3 ">หน่วยงาน</div>
                                        <input name="dep_name" id="dep_name" class="form-control" aria-label="Default select example" value="<?php echo $this->session->userdata('dep_name') ?>" required disabled>
                                        <input type="hidden" name="mem_dep_id" id="mem_dep_id" value="<?php echo $this->session->userdata('mem_dep_id') ?>">
                                        <br>
                                    </div>
                                </div>

                                <div class="row gx-5">
                                    <div class="col">
                                        <div class="p-3 ">คำนำหน้าชื่อ</div>
                                        <select name="mem_pref_id" id="mem_pref_id" class="form-select" aria-label="Default select example" required disabled>

                                            <?php
                                            $check1 = '';
                                            $check2 = '';
                                            $check3 = '';
                                            $check_pref = $this->session->userdata('mem_pref_id');
                                            if ($check_pref == '1') {
                                                $check1 = 'selected';
                                            } else if ($check_pref == '2') {
                                                $check2 = 'selected';
                                            } else if ($check_pref == '3') {
                                                $check3 = 'selected';
                                            }
                                            ?>
                                            <option value="">------- คำนำหน้า ---------</option>
                                            <option value="1" <?php echo $check1 ?>>นาย</option>
                                            <option value="2" <?php echo $check2 ?>>นางสาว</option>
                                            <option value="3" <?php echo $check3 ?>>นาง</option>
                                        </select><br>
                                    </div>

                                    <div class="col">
                                        <div class="p-3 ">ชื่อ</div>

                                        <input type="text" class="form-control" id="mem_firstname" name="mem_firstname" value="<?php echo $this->session->userdata('mem_firstname') ?>" required disabled><br>
                                    </div>
                                    <div class="col">
                                        <div class="p-3 ">นามสกุล</div>
                                        <input type="text" class="form-control" id="mem_lastname" name="mem_lastname" value="<?php echo $this->session->userdata('mem_lastname') ?>" required disabled><br>
                                    </div>
                                    <input type="hidden" name="mem_password" id="mem_password" value="<?php echo $this->session->userdata('mem_password') ?>">
                                </div>

                                <div class="row gx-5">
                                    <div class="col">
                                        <div class="p-3 ">ชื่อผู้ใช้</div>

                                        <input type="text" class="form-control" id="mem_username" name="mem_username" value="<?php echo $this->session->userdata('mem_username') ?>" required disabled><br>
                                    </div>
                                    <div class="col">
                                        <div class="p-3 ">อีเมล</div>
                                        <input type="email" class="form-control" id="mem_email" name="mem_email" value="<?php echo $this->session->userdata('mem_email') ?>" required disabled>
                                    </div>

                                </div>
                                <input type="hidden" name="mem_role" id="mem_role" value="<?php echo $this->session->userdata('mem_role') ?>">


                        </div>
                        <div class="col"></div>

                        <div class="row gx-5 ">
                            <div class="col-2"></div>
                            <div class="d-grid gap-2 d-md-block">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <a href=" <?php echo site_url() . 'Member/Member_register/show_member_register' ?> ">
                                        <button type="button" class="btn btn-light">ยกเลิก</button></a>
                                    <a href=" <?php echo site_url() . 'Member/Member_register/insert_member' ?> ">
                                        <button type="button" class="btn btn-primary">ยืนยัน</button> </a>
                                </div>
                            </div>
                            <!DOCTYPE html>


                            <div class="col-2"></div>
                        </div>
                        </form>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
        </div>
    </div>
</div>