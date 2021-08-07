<div class="container">
    <div class="row gx-5">
        <div class="col"></div>
        <div class="col-10">
            <div class="row justify-content-md-center">
                <div class="col col-lg-2">

                </div>
                <div class="col-md-auto">
                    <h2>สมัครสมาชิก</h2>
                </div>
                <div class="col col-lg-2">

                </div>
            </div>
            <form action='<?php echo site_url() . 'DQS_controller/show_register_confirm' ?>' method="post">
                <div class="row gx-5">
                    <div class="col">
                        <div class="p-3 ">จังหวัด</div>
                        <select name="province" class="form-select" aria-label="Default select example" required>
                            <option value="" selected>--------- เลือกจังหวัด ---------</option>
                            <option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
                            <option value="กระบี่">กระบี่ </option>
                            <option value="กาญจนบุรี">กาญจนบุรี </option>
                            <option value="กาฬสินธุ์">กาฬสินธุ์ </option>
                            <option value="กำแพงเพชร">กำแพงเพชร </option>
                            <option value="ขอนแก่น">ขอนแก่น</option>
                            <option value="จันทบุรี">จันทบุรี</option>
                            <option value="ฉะเชิงเทรา">ฉะเชิงเทรา </option>
                            <option value="ชัยนาท">ชัยนาท </option>
                            <option value="ชัยภูมิ">ชัยภูมิ </option>
                            <option value="ชุมพร">ชุมพร </option>
                            <option value="ชลบุรี">ชลบุรี </option>
                            <option value="เชียงใหม่">เชียงใหม่ </option>
                            <option value="เชียงราย">เชียงราย </option>
                            <option value="ตรัง">ตรัง </option>
                            <option value="ตราด">ตราด </option>
                            <option value="ตาก">ตาก </option>
                            <option value="นครนายก">นครนายก </option>
                            <option value="นครปฐม">นครปฐม </option>
                            <option value="นครพนม">นครพนม </option>
                            <option value="นครราชสีมา">นครราชสีมา </option>
                            <option value="นครศรีธรรมราช">นครศรีธรรมราช </option>
                            <option value="นครสวรรค์">นครสวรรค์ </option>
                            <option value="นราธิวาส">นราธิวาส </option>
                            <option value="น่าน">น่าน </option>
                            <option value="นนทบุรี">นนทบุรี </option>
                            <option value="บึงกาฬ">บึงกาฬ</option>
                            <option value="บุรีรัมย์">บุรีรัมย์</option>
                            <option value="ประจวบคีรีขันธ์">ประจวบคีรีขันธ์ </option>
                            <option value="ปทุมธานี">ปทุมธานี </option>
                            <option value="ปราจีนบุรี">ปราจีนบุรี </option>
                            <option value="ปัตตานี">ปัตตานี </option>
                            <option value="พะเยา">พะเยา </option>
                            <option value="พระนครศรีอยุธยา">พระนครศรีอยุธยา </option>
                            <option value="พังงา">พังงา </option>
                            <option value="พิจิตร">พิจิตร </option>
                            <option value="พิษณุโลก">พิษณุโลก </option>
                            <option value="เพชรบุรี">เพชรบุรี </option>
                            <option value="เพชรบูรณ์">เพชรบูรณ์ </option>
                            <option value="แพร่">แพร่ </option>
                            <option value="พัทลุง">พัทลุง </option>
                            <option value="ภูเก็ต">ภูเก็ต </option>
                            <option value="มหาสารคาม">มหาสารคาม </option>
                            <option value="มุกดาหาร">มุกดาหาร </option>
                            <option value="แม่ฮ่องสอน">แม่ฮ่องสอน </option>
                            <option value="ยโสธร">ยโสธร </option>
                            <option value="ยะลา">ยะลา </option>
                            <option value="ร้อยเอ็ด">ร้อยเอ็ด </option>
                            <option value="ระนอง">ระนอง </option>
                            <option value="ระยอง">ระยอง </option>
                            <option value="ราชบุรี">ราชบุรี</option>
                            <option value="ลพบุรี">ลพบุรี </option>
                            <option value="ลำปาง">ลำปาง </option>
                            <option value="ลำพูน">ลำพูน </option>
                            <option value="เลย">เลย </option>
                            <option value="ศรีสะเกษ">ศรีสะเกษ</option>
                            <option value="สกลนคร">สกลนคร</option>
                            <option value="สงขลา">สงขลา </option>
                            <option value="สมุทรสาคร">สมุทรสาคร </option>
                            <option value="สมุทรปราการ">สมุทรปราการ </option>
                            <option value="สมุทรสงคราม">สมุทรสงคราม </option>
                            <option value="สระแก้ว">สระแก้ว </option>
                            <option value="สระบุรี">สระบุรี </option>
                            <option value="สิงห์บุรี">สิงห์บุรี </option>
                            <option value="สุโขทัย">สุโขทัย </option>
                            <option value="สุพรรณบุรี">สุพรรณบุรี </option>
                            <option value="สุราษฎร์ธานี">สุราษฎร์ธานี </option>
                            <option value="สุรินทร์">สุรินทร์ </option>
                            <option value="สตูล">สตูล </option>
                            <option value="หนองคาย">หนองคาย </option>
                            <option value="หนองบัวลำภู">หนองบัวลำภู </option>
                            <option value="อำนาจเจริญ">อำนาจเจริญ </option>
                            <option value="อุดรธานี">อุดรธานี </option>
                            <option value="อุตรดิตถ์">อุตรดิตถ์ </option>
                            <option value="อุทัยธานี">อุทัยธานี </option>
                            <option value="อุบลราชธานี">อุบลราชธานี</option>
                            <option value="อ่างทอง">อ่างทอง </option>
                        </select><br>
                    </div>
                    <div class="col">
                        <div class="p-3 ">หน่วยงาน</div>
                        <select name="agency" class="form-select" aria-label="Default select example" required>
                            <option value="" selected>--------- เลือกหน่วยงาน ---------</option>
                            <option value="ที่ทำการปกครองจังหวัด">ที่ทำการปกครองจังหวัด</option>
                            <option value="สำนักงานจังหวัด ">สำนักงานจังหวัด </option>
                            <option value="สำนักงานสาธารณสุขจังหวัด">สำนักงานสาธารณสุขจังหวัด</option>
                            <option value="สำนักงานที่ดินจังหวัด">สำนักงานที่ดินจังหวัด</option>
                            <option value="สำนักงานพัฒนาชุมชนจังหวัด">สำนักงานพัฒนาชุมชนจังหวัด </option>
                            <option value="สำนักงานโยธาธิการและผังเมืองจังหวัด">สำนักงานโยธาธิการและผังเมืองจังหวัด </option>
                            <option value="เรือนจำจังหวัด">เรือนจำจังหวัด </option>
                            <option value="สำนักงานคลังจังหวัด">สำนักงานคลังจังหวัด</option>
                            <option value="สำนักงานอุตสาหกรรมจังหวัด">สำนักงานอุตสาหกรรมจังหวัด</option>
                            <option value="สำนักงานพาณิชย์จังหวัด">สำนักงานพาณิชย์จังหวัด </option>
                            <option value="สำนักงานพัฒนาสังคมและความมั่นคงของมนุษย์จังหวัด">สำนักงานพัฒนาสังคมและความมั่นคงของมนุษย์จังหวัด</option>
                            <option value="สำนักงานแรงงานจังหวัด">สำนักงานแรงงานจังหวัด </option>
                            <option value="สำนักงานสวัสดิการและคุ้มครองแรงงานจังหวัด">สำนักงานสวัสดิการและคุ้มครองแรงงานจังหวัด</option>
                            <option value="สำนักงานจัดหางานจังหวัด">สำนักงานจัดหางานจังหวัด</option>
                            <option value="สำนักงานประกันสังคมจังหวัด">สำนักงานประกันสังคมจังหวัด </option>
                            <option value="สำนักงานเกษตรและสหกรณ์จังหวัด">สำนักงานเกษตรและสหกรณ์จังหวัด </option>
                            <option value="สำนักงานเกษตรจังหวัด">สำนักงานเกษตรจังหวัด</option>
                            <option value="สำนักงานปศุสัตว์จังหวัด">สำนักงานปศุสัตว์จังหวัด </option>
                            <option value="สำนักงานสหกรณ์จังหวัด">สำนักงานสหกรณ์จังหวัด</option>
                            <option value="สำนักงานปฏิรูปที่ดินจังหวัด">สำนักงานปฏิรูปที่ดินจังหวัด</option>
                            <option value="สำนักงานประมงจังหวัด">สำนักงานประมงจังหวัด </option>
                            <option value="สำนักงานขนส่งจังหวัด">สำนักงานขนส่งจังหวัด </option>
                            <option value="สำนักงานประชาสัมพันธ์จังหวัด">สำนักงานประชาสัมพันธ์จังหวัด</option>
                            <option value="สำนักงานสถิติจังหวัด">สำนักงานสถิติจังหวัด </option>
                            <option value="สำนักงานทรัพยากรธรรมชาติและสิ่งแวดล้อมจังหวัด">สำนักงานทรัพยากรธรรมชาติและสิ่งแวดล้อมจังหวัด</option>
                            <option value="สำนักงานวัฒนธรรมจังหวัด">สำนักงานวัฒนธรรมจังหวัด</option>
                            <option value="สำนักงานป้องกันและบรรเทาสาธารณภัยจังหวัด">สำนักงานป้องกันและบรรเทาสาธารณภัยจังหวัด</option>
                            <option value="สำนักงานบังคับคดีจังหวัด">สำนักงานบังคับคดีจังหวัด </option>
                            <option value="สำนักงานคุมประพฤติจังหวัด">สำนักงานคุมประพฤติจังหวัด</option>
                            <option value="สำนักงานพระพุทธศาสนาจังหวัด">สำนักงานพระพุทธศาสนาจังหวัด </option>
                            <option value="สำนักงานการท่องเที่ยวและกีฬาจังหวัด">สำนักงานการท่องเที่ยวและกีฬาจังหวัด </option>
                            <option value="สำนักงานส่งเสริมการปกครองส่วนท้องถิ่นจังหวัด">สำนักงานส่งเสริมการปกครองส่วนท้องถิ่นจังหวัด</option>
                            <option value="สำนักงานพลังงานจังหวัด">สำนักงานพลังงานจังหวัด </option>
                            <option value="สำนักงานสัสดีจังหวัด">สำนักงานสัสดีจังหวัด </option>
                            <option value="สำนักงานยุติธรรมจังหวัด">สำนักงานยุติธรรมจังหวัด </option>
                        </select><br>
                    </div>
                </div>

                <div class="row gx-5">
                    <div class="col">
                        <div class="p-3 ">รหัสพนักงาน</div>

                        <input type="text" class="form-control" id="mem_emp_id" name="mem_emp_id" required><br>
                    </div>

                    <div class="col">

                        <div class="p-3 ">อีเมล</div>
                        <input type="email" class="form-control" id="mem_email" name="mem_email" placeholder="อีเมล" required oninvalid="this.setCustomValidity('กรุณากรอกอีเมลที่ถูกต้อง')" oninput="setCustomValidity('')"></input>
                    </div>
                </div>



                <div class="row gx-5">
                    <div class="col">
                        <div class="p-3 ">ชื่อ</div>

                        <input type="text" class="form-control" id="mem_firstname" name="mem_firstname"><br>
                    </div>
                    <div class="col">
                        <div class="p-3 ">นามสกุล</div>
                        <input type="text" class="form-control" id="mem_lastname" name="mem_lastname"><br>
                    </div>

                </div>

              

                <div class="row gx-5">
                    <div class="col">
                        <div class="p-3 ">รหัสผ่าน</div>

                        <input type="password" class="form-control" id="mem_password" name="mem_password" required onkeyup='check();'><br>
                    </div>
                    <div class="col">
                        <div class="p-3 ">ยืนยันรหัสผ่าน</div>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required onkeyup='check();'><br>
                    </div>
                </div>


                <div class="row gx-5 ">
                    <div class="col-2"></div>
                    <div class="d-grid gap-2 col-6 mx-auto" >
                    <span id='message'> </span>
                        <br><button class="btn btn-primary" type="submit" >สมัครสมาชิก</button>
                    </div>

                    <div class="col-2"></div>
                </div>
            </form>
        </div>
        <div class="col"></div>
    </div>
</div>

<script>
var check = function() {
  if (document.getElementById('mem_password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
  }
}
 </script>