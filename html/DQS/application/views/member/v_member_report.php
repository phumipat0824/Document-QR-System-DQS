<!-- script graph -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>

<!-- css style -->
    <style>
        /* dropdown date */
        #DropdownDate {
            margin-left: 450px;
        }
        
        /* graph */
        /* body {
        background-color: #f9f9fa
        }

        .flex {
            -webkit-box-flex: 1;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto
        }

        @media (max-width:991.98px) {
            .padding {
                padding: 1.5rem
            }
        }

        @media (max-width:767.98px) {
            .padding {
                padding: 1rem
            }
        }

        .padding {
            padding: 5rem
        }

        .card {
            background: #fff;
            border-width: 0;
            border-radius: .25rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, .05);
            margin-bottom: 1.5rem
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(19, 24, 44, .125);
            border-radius: .25rem
        }

        .card-header {
            padding: .75rem 1.25rem;
            margin-bottom: 0;
            background-color: rgba(19, 24, 44, .03);
            border-bottom: 1px solid rgba(19, 24, 44, .125)
        }

        .card-header:first-child {
            border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0
        }

        card-footer,
        .card-header {
            background-color: transparent;
            border-color: rgba(160, 175, 185, .15);
            background-clip: padding-box
        } */
    </style>
<!-- css style -->

<!-- main -->
<div class="content">
<div class="row" style="padding: 100px 10px 10px 20%;">
    
    <!-- text -->
    <div class="col-md-8">
    <h1 style="color:#003399; font-family:TH Sarabun New; font-weight: 900; font-size: 80px;" >รายงานสรุปผล</h1>
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
    <!-- card show number -->

    <!-- graph -->
    <!-- <script>
        $(document).ready(function() {
            var ctx = $("#chart-line");
            var myLineChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [1500, 1600, 1700, 1750, 1800, 1850, 1900, 1950, 1999, 2050],
                    datasets: [{
                        data: [86, 114, 106, 106, 107, 111, 133, 221, 783, 2478],
                        label: "Africa",
                        borderColor: "#458af7",
                        backgroundColor: '#458af7',
                        fill: false
                    }, {
                        data: [282, 350, 411, 502, 635, 809, 947, 1402, 3700, 5267],
                        label: "Asia",
                        borderColor: "#8e5ea2",
                        fill: true,
                        backgroundColor: '#8e5ea2'
                    }, {
                        data: [168, 170, 178, 190, 203, 276, 408, 547, 675, 734],
                        label: "Europe",
                        borderColor: "#3cba9f",
                        fill: false,
                        backgroundColor: '#3cba9f'
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'World population per region (in millions)'
                    }
                }
            });
        });
    </script>
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row">
                <div class="container-fluid d-flex justify-content-center">
                    <div class="col-sm-8 col-md-6">
                        <div class="card">
                            <div class="card-header">Bar chart</div>
                            <div class="card-body" style="height: 420px">
                                <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                    <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                        <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                        <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                    </div>
                                </div> <canvas id="chart-line" width="299" height="200" class="chartjs-render-monitor" style="display: block; width: 299px; height: 200px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- graph -->    

</div>
</div>