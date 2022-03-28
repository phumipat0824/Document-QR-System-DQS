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
        <div class="row g-0">
            <div class="col-sm-6 col-md-8"></div>
            <div class="col-6 col-md-4">
                <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                    <i class="fa fa-calendar"></i>&nbsp;
                    <span></span> <i class="fa fa-caret-down"></i>
                </div>
            </div>

        </div>

        <!-- dropdown date -->

        <!-- card show number -->
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header card-header-icon card-header">
                        <div class="card-icon" style="background-color: #139447;">
                            <i class="material-icons">preview</i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title" style="font-family:TH Sarabun New;">จำนวนการเข้าชม</h4>

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
    const data = {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        datasets: [{
            label: 'จำนวรไฟล์ทั้งหมด',
            data: [8, 2, 6, 9, 2, 3, 9],
            backgroundColor: 'rgba(255, 26, 104, 0.2)',
            borderColor: 'rgba(255, 26, 104, 1)',
            borderWidth: 1
        }, {
            label: 'จำนวนการดาวน์โหดล',
            data: [28, 12, 16, 9, 12, 13, 9],
            backgroundColor: 'rgba(54, 162, 235, 0.2)',

            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }, {
            label: 'จำนวนการสแกน',
            data: [15, 15, 16, 19, 22, 13, 19],
            backgroundColor: 'rgba(255, 206, 86, 0.2)',

            borderColor: 'rgba(255, 206, 86, 1)',
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