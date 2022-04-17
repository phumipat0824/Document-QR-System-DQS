<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Datepicker -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script type="text/javascript" src="../../../assets/calendar/js/bootstrap-datepicker.js"></script>


<!-- main -->
<div class="content">
    <div class="row" style="padding: 100px 10px 10px 20%;">

        <!-- text -->
        <div class="col-md-8">
            <h1 style="color:#003399; font-family:TH Sarabun New; font-weight: 900; font-size: 80px;">รายงานสรุปผล</h1>
        </div>
        <!-- text -->

        <!-- dropdown date -->
        <div class="row">
            <div class="col-5 ">
                <!-- <form method="POST" action=""> -->
                <label style="color: #000000;">สมาชิก</label>
                <label style="color: #FF0000;">*</label>
                <select onchange="get_id()" name="user_id" id="user_id" class="form-select" aria-label="Default select example">
                    <option value="total" selected style="text-align: center;"> สมาชิกทั้งหมด </option>
                    <?php foreach ($arr_member as $value) { ?>
                        <option value='<?php echo $value->mem_id  ?>'><?php echo $value->mem_username ?></option>
                    <?php } ?>
                </select>

            </div>
            <div class="col-5 ">
                <label style="color: #000000;">เอกสาร</label>
                <label style="color: #FF0000;">*</label>
                <select name="mem_doc_id" id="mem_doc_id" class="form-select" aria-label="Default select example">
                    <option value="" selected style="text-align: center;"> เอกสาร </option>
                </select>
            </div>
            <div class="col-5 ">
                <br>
                <label style="color: #000000;  font-size: 22px; font-family: TH Sarabun New;">วันที่เริ่มต้น</label>
                <label style="color: #FF0000;">*</label>
                <div class="input-group input-group-static my-3">
                    <input type="date" class="form-select" name="doc_time" id="doc_time" required>
                </div>
            </div>
            <div class="col-5 ">
                <br>
                <label style="color: #000000;  font-size: 22px; font-family: TH Sarabun New;">วันที่สิ้นสุด</label>
                <label style="color: #FF0000;">*</label>
                <div class="input-group input-group-static my-3">
                    <input type="date" class="form-select" name="doc_timeend" id="doc_timeend" required>
                </div>
            </div>
        </div>
        <!-- <button type="submit" class="btn btn-primary" id="btn_login" style="background-color: #100575 ;  font-family:TH Sarabun New; font-size: 30px">
                        ยืนยัน</button> -->
        <!-- </form> -->

        <!-- dropdown date -->

        <!-- card show number -->
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header card-header-icon card-header">
                        <div class="card-icon" style="background-color: #0000CD;">
                            <i class="material-icons">preview</i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title" style="font-family:TH Sarabun New;">จำนวนคิวอาร์โค้ดทั้งหมด</h4>
                        <h5 class="card-title" style="font-family:TH Sarabun New;"><?php echo count($arr_qr_code) ?></h5>
                    </h5>
                            
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-header card-header-icon card-header">
                        <div class="card-icon" style="background-color: #139447;">
                            <i class="material-icons">preview</i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title" style="font-family:TH Sarabun New;">จำนวนการเข้าชม</h4>
                        <h5 class="card-title" style="font-family:TH Sarabun New;"><?php echo '0' ?></h5>
                    </div>
                </div>
            </div>

            <!-- ----------------------------------------------------------------------------------------------------------------------------- -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header card-header-icon card-header">
                        <div class="card-icon" style="background-color: #BE4734;">
                            <i class="material-icons">file_download</i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title" style="font-family:TH Sarabun New;">จำนวนการดาวน์โหลด</h4>
                        <h5 class="card-title" style="font-family:TH Sarabun New;"><?php echo '0' ?></h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chart -->
        <div>
            <canvas id="myChart" width="500" height="250"></canvas>
        </div>
        <!-- Chart -->
    </div>
</div>

<script>
    function get_id() {
        var mem_list = document.getElementById("user_id");
        // console.log(mem_list);
        $("#mem_doc_id").empty();
        get_doc(mem_list.value);
    }

    function get_doc(value_mem_list) {

        $.ajax({
            type: "POST",
            url: "<?php echo site_url() ?>/Admin/Admin_report/get_file_list_ajax",
            dataType: 'JSON',
            data: {
                'mem_id_list': value_mem_list
            },
            success: function(data) {
                // console.log(data);
                doc_input(data['arr_doc']);
            }

        });


    }

    function doc_input(arr_doc) { //

        var select = document.getElementById("mem_doc_id");

        const elmts = arr_doc;

        // console.log(arr_doc);
        const doc_optn = JSON.parse(JSON.stringify(elmts));

        if (elmts == "") {

            var optn = "ไม่มีเอกสาร";
            var el = document.createElement("option");
            el.textContent = optn;
            el.value = "";
            // console.log(el.value);
            select.appendChild(el);

        } else {
            var optn = "เอกสารทั้งหมด";
            var el = document.createElement("option");
            el.textContent = optn;
            el.value = "total";
            // console.log(el.value);
            select.appendChild(el);
            for (var i of elmts) {

                // console.log(i.doc_name);
                var optn = i.doc_name;
                var el = document.createElement("option");
                el.textContent = optn;
                el.value = i.doc_id;
                // console.log(el.value);
                select.appendChild(el);

            }
        }
                
        // console.log(select);
    }
    const data = {
        labels: [<?php foreach($total_download as $value){ echo "'". $value->dow_datetime ."'". ','; }?>],
        datasets: [{
            label: 'จำนวนการดาวน์โหดล',
            data: [<?php foreach($total_download as $value){ echo $value->dow_download . ','; }?>],
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    };

    // config 
    const config = {
        type: 'bar',
        data,
        options: {
            scales: {
                y: {
                    ticks: {
                        stepSize: 5
                    }
                }
            },
            layout: {
                padding: 50
            }
        }
    };

    // render init block
    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );

    $(function() {
        // Initialize and change language to hindi
        $('#datepicker').datepicker($.datepicker.regional["th"]);
        // Reset language
        //$.datepicker.setDefaults($.datepicker.regional[""]);
    })

    $(function() {


        $("#datepicker").datepicker({
            language: 'th-th',
        });

        var start = moment();
        var end = moment();

        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }

        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'วันนี้': [moment(), moment()],
                '30 วันที่ผ่านมา': [moment().subtract(29, 'days'), moment()],
                'เดือนนี้': [moment().startOf('month'), moment().endOf('month')],
                'เดือนที่แล้ว': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                '6 เดือนที่ผ่านมา': [moment().subtract(6, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                '1 ปีที่ผ่านมา': [moment().subtract(12, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
            }
        }, cb);

        cb(start, end);


    });
</script>