<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<!-- Language script -->
<script src='../../../assets/calendar/datepick/datepicker-th.js' type='text/javascript'></script>
<link href="assets/bootstrap-datepicker-thai/css/datepicker.css" rel="stylesheet">
<script type="text/javascript" src="../../../assets/calendar/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="../../../assets/calendar/js/bootstrap-datepicker-thai.js"></script>
<script type="text/javascript" src="../../../assets/calendar/js/locales/bootstrap-datepicker.th.js"></script>
<!-- css style -->
<style>
    /* dropdown date */
    #DropdownDate {
        margin-left: 450px;
    }
</style>
<!-- css style -->

<!-- main -->
<div class="content">
    <div class="row" style="padding: 100px 10px 10px 20%;">

        <!-- text -->
        <div class="col-md-8">
            <h1 style="color:#003399; font-family:TH Sarabun New; font-weight: 900; font-size: 80px;">รายงานสรุปผล</h1>
        </div>
        <!-- text -->

        <!-- dropdown date -->
        <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
            <i class="fa fa-calendar"></i>&nbsp;
            <span></span> <i class="fa fa-caret-down"></i>
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

        <!-- script graph -->
        <div class="chart">
            <!-- Chart wrapper -->
            <canvas id="chart-bars" class="chart-canvas"></canvas>
        </div>

        <script>
            window.onload = function() {

                var chart = new CanvasJS.Chart("chartContainer", {
                    animationEnabled: true,
                    title: {
                        text: "จำนวนการแสกนและดาวน์โหลด"
                    },
                    axisY: {
                        title: "จำนวนการเข้าชม",
                        titleFontColor: "#000000",
                        lineColor: "#000000",
                        labelFontColor: "#000000",
                        tickColor: "#000000"
                    },
                    toolTip: {
                        shared: true
                    },
                    legend: {
                        cursor: "pointer",
                        itemclick: toggleDataSeries
                    },
                    data: [{
                            type: "column",
                            name: "จำนวนการเข้าชม",
                            legendText: "จำนวนการเข้าชม",
                            showInLegend: true,
                            dataPoints: [{
                                    label: "1/12/2021",
                                    y: 266
                                },
                                {
                                    label: "2/12/2021",
                                    y: 302
                                },
                                {
                                    label: "3/12/2021",
                                    y: 157
                                },
                                {
                                    label: "4/12/2021",
                                    y: 148
                                },
                                {
                                    label: "5/12/2021",
                                    y: 152
                                },
                                {
                                    label: "6/12/2021",
                                    y: 100
                                }
                            ]
                        },
                        {
                            type: "column",
                            name: "จำนวนการดาวน์โหลด ",
                            legendText: "จำนวนการดาวน์โหลด",
                            // axisYType: "secondary",
                            showInLegend: true,
                            dataPoints: [{
                                    label: "1/12/2021",
                                    y: 141
                                },
                                {
                                    label: "2/12/2021",
                                    y: 225
                                },
                                {
                                    label: "3/12/2021",
                                    y: 341
                                },
                                {
                                    label: "4/12/2021",
                                    y: 474
                                },
                                {
                                    label: "5/12/2021",
                                    y: 285
                                },
                                {
                                    label: "6/12/2021",
                                    y: 312
                                }
                            ]
                        }
                    ]
                });
                chart.render();

                function toggleDataSeries(e) {
                    if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                        e.dataSeries.visible = false;
                    } else {
                        e.dataSeries.visible = true;
                    }
                    chart.render();
                }

            }

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