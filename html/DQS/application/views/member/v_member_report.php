<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Datepicker -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script type="text/javascript" src="../../../assets/calendar/js/bootstrap-datepicker.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<!-- main -->
<div class="content">
    <div class="row" style="padding: 100px 10px 10px 20%;">

        <!-- text -->
        <div class="col-md-8">
            <h1 style="color:#003399; font-family:TH Sarabun New; font-weight: 900; font-size: 80px;">รายงานสรุปผล</h1>
        </div>
        <!-- text -->
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
                        <h4 class="card-title" style="font-family:TH Sarabun New;">จำนวนเอกสารทั้งหมด</h4>
                        <h5 class="card-title" style="font-family:TH Sarabun New;"><?php echo count($arr_doc) ?></h5>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="row justify-content-start">
                <div class="col-6">
                    <div id="chartContainer" style="height: 370px;">
                    </div>

                </div>
                <div class="col-6">
                    <div id="chartContainer2" style="height: 370px;"></div>
                </div>
                <!-- Chart -->

                <canvas id="myChart" width="400" height="400"></canvas>

                <!-- Chart -->
            </div>
        </div>

        <script>
            // function get_id() {
            //     var mem_list = document.getElementById("user_id");
            //     // console.log(mem_list);
            //     get_doc(mem_list.value);
            // }

            // function get_doc(value_mem_list) {
            //     // console.log(value_mem_list);
            //     $.ajax({
            //         type: "POST",
            //         url: "<?php echo site_url() ?>/Admin/Admin_report/get_file_ajax/",
            //         dataType: 'JSON',
            //         data: {
            //             'mem_id_list': value_mem_list
            //         },
            //         success: function(data) {
            //             console.log(data);
            //             Pie(data);
            //         }

            //     });


            // }

            window.onload = function() {

                var chart = new CanvasJS.Chart("chartContainer", {
                    theme: "light2",
                    animationEnabled: true,
                    title: {
                        text: "ชนิดของไฟล์"
                    },
                    data: [{
                        type: "pie",
                        indexLabelFontSize: 18,
                        radius: 80,
                        indexLabel: "{label} - {y}",
                        yValueFormatString: "###0.0\"%\"",
                        click: explodePie,
                        dataPoints: [{
                                y: <?php echo $all_pdf ?>,
                                label: "PDF"
                            },
                            {
                                y: <?php echo $all_img ?>,
                                label: "IMG"
                            }
                        ]
                    }]
                });
                chart.render();

                function explodePie(e) {
                    for (var i = 0; i < e.dataSeries.dataPoints.length; i++) {
                        if (i !== e.dataPointIndex)
                            e.dataSeries.dataPoints[i].exploded = false;
                    }
                }

                var chart = new CanvasJS.Chart("chartContainer2", {
                    animationEnabled: true,
                    theme: "light2", // "light1", "light2", "dark1", "dark2"
                    title: {
                        text: "ชนิดของไฟล์"
                    },
                    axisY: {
                        title: "จำนวนไฟล์"
                    },
                    data: [{
                        type: "column",
                        showInLegend: true,
                        legendMarkerColor: "grey",
                        legendText: "ชนิดไฟล์",
                        dataPoints: [{
                                y: <?php echo $pdf ?>,
                                label: "PDF"
                            },
                            {
                                y: <?php echo $img ?>,
                                label: "IMG"
                            }

                        ]
                    }]
                });
                chart.render();

            }



            // function doc_input(arr_doc) { //

            //     var select = document.getElementById("mem_doc_id");

            //     const elmts = arr_doc;

            //     // console.log(arr_doc);
            //     const doc_optn = JSON.parse(JSON.stringify(elmts));

            //     if (elmts == "") {

            //         var optn = "ไม่มีเอกสาร";
            //         var el = document.createElement("option");
            //         el.textContent = optn;
            //         el.value = "";
            //         // console.log(el.value);
            //         select.appendChild(el);

            //     } else {
            //         var optn = "เอกสารทั้งหมด";
            //         var el = document.createElement("option");
            //         el.textContent = optn;
            //         el.value = "total";
            //         // console.log(el.value);
            //         select.appendChild(el);
            //         for (var i of elmts) {

            //             // console.log(i.doc_name);
            //             var optn = i.doc_name;
            //             var el = document.createElement("option");
            //             el.textContent = optn;
            //             el.value = i.doc_id;
            //             // console.log(el.value);
            //             select.appendChild(el);

            //         }
            //     }

            //     // console.log(select);
            // }
        </script>