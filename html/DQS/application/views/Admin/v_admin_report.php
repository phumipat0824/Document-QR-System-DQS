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
        <div class="dropdown" id="DropdownDate">
            <a class="btn btn-secondary dropdown-toggle" id="dropdownDate" data-toggle="dropdown" style="font-family:TH Sarabun New; font-size: 20px;">
                <span class="material-icons">
                    calendar_month
                </span>
                ค้นหาช่วงเวลา
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownDate">
                <a class="dropdown-item">Something else here</a>
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

        <!-- script graph -->
        <div class="col-md-8">
            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
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
        </script>
        </head>