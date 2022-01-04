<!-- load plugin data table -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/plugin' ?>/DataTables/datatables.css" />
<script type="text/javascript" src="<?php echo base_url() . 'assets/plugin' ?>/DataTables/datatables.js"></script>
<link href="<?php echo base_url() . 'assets/template/material-dashboard-master' ?>/assets/css/CSS_table_list.css"
    rel="stylesheet" />
<!-- ===================================== -->
<div class="main-panel">
    <div class="container">
        <div class="content">
            <div class=" container-fluid">
                <!-- defual tab -->


                <div class="row" style="margin-top: 10%;">
                    <div class="col md-12"></div>
                    <div class="card">
                        <!-- div header start   -->
                        <div class="card-header ">
                            <div class="row">
                                <div class="col-10">
                                    <h4 class="card-title " style="padding-top: 10px;">จัดการบัญชีผู้ใช้งาน </h4>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <!-- div header end   -->

                        <div class="card-body" style="margin-top: -20px;">

                            <div id="create_table"></div> <!-- ตำแหน่งที่สร้าง data table -->

                        </div>

                        <!-- end defual tab -->
                    </div>
                </div>
            </div>
        </div>


        <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->

        <script>
        $(document).ready(function() {
            get_dept();
        });

        function get_dept() {
            $.ajax({
                url: "<?php echo site_url() ?>/Admin/Admin_home/get_admin_list_ajax",
                dataType: 'JSON',
                success: function(data) {
                    console.log(data);
                    create_Table(data['json_member']);
                }

            });
        } // recieve json then send to create data table

        function create_Table(arr_dept) {
            let html_code = ''; // ตัวแปร generate code html
            html_code += '<div class="table-responsive">';
            html_code +=
                '<table class="table" id = "datatable_dept_list">'; // ส่ง datatable_dept_list  ไปสร้าง data table
            html_code += '<thead class=" text">';
            html_code += '<tr>';

            html_code += '<th>จังหวัด</th>';
            html_code += '<th>ชื่อผู้ใช้งาน</th>';
            html_code += '<th>ชื่อ - นามสกุล</th>';
            html_code += '<th></th>';
            html_code += '<th></th>';
            html_code += '</tr>';
            html_code += '</thead>';
            html_code += '<tbody>';
            // strat loop of department
            arr_dept.forEach((row_dept, index_dept) => {
                html_code += '<tr>';
                html_code += '<td>' + row_dept['dep_name'] + '</td>';
                html_code += '<td>' + row_dept['dep_name'] + '</td>';
                // ชื่อหน่วยงาน



                html_code += '<td style="text-align: center;">';
                html_code += '</td>';
                // สถานะของหน่วยงาน
                html_code += '<td style="text-align: center;">' +
                    '<button type="button" class="btn btn-orange editModal" data-toggle="modal" data-target="#editModal" data-id= ' +
                    row_dept['dep_id'] + ' data-name= ' + row_dept['dep_name'] + ' >' +
                    '<i class="material-icons">edit</i>' + '&nbsp;</button>' + '</td>';
                // button edit data
                html_code += '</td>';
                html_code += '</tr>';
            }); // end loop of department
            html_code += '</tbody>';
            html_code += '</table>';
            html_code += '</div>';

            $('#create_table').html(html_code); // call function create table to make data table
            make_dataTable_byId('datatable_dept_list');

        }

        function make_dataTable_byId(id_name) {
            var datatable = $('#' + id_name).DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "ทั้งหมด"]
                ],
                language: {
                    lengthMenu: "แสดง _MENU_ รายการ",
                    emptyTable: "ไม่พบข้อมูลในตาราง",
                    search: "ค้นหา :_INPUT_",
                    searchPlaceholder: "ค้นหาข้อมูลในตาราง...",
                    info: "แสดงหน้าที่ _START_ จาก _PAGES_ หน้า ทั้งหมด _TOTAL_ รายการ",
                    infoEmpty: "แสดงหน้าที่ 0 จาก 0 หน้า รายการทั้งหมด 0 รายการ",
                    zeroRecords: "ไม่พบข้อมูลที่ค้นหาในตาราง",
                    infoFiltered: "",
                    paginate: {
                        "first": "หน้าแรก",
                        "last": "หน้าสุดท้าย",
                        "next": "หน้าถัดไป",
                        "previous": "ก่อนหน้า"
                    },
                },

                //save stage in sessionStorage of browser
                //(sessionStorage ดีกว่า localStorage ตรงที่พอปิด tab หรือปิด browser มันจะหายไปเอง)
                "bStateSave": true,
                "stateDuration": -
                    1, //บังคับใช้ sessionStorage แทน localStorage (ดังนั้นแม้ใช้คำสั่งของ localStorage มันก็ไป save ใน sessionStorage อยู่ดี)
                "fnStateSave": function(oSettings, oData) {
                    localStorage.setItem('DataTables_' + window.location.pathname, JSON.stringify(oData));
                },
                "fnStateLoad": function(oSettings) {
                    var data = localStorage.getItem('DataTables_' + window.location.pathname);
                    return JSON.parse(data);
                }

            });

            return datatable;
        } //make_dataTable_byId
        </script>



        <script>
        $(document).ready(function() {
            $('.deleteModal').click(function(e) {
                e.preventDefault();
                var mem_id = $(this).val();
                // console.log(mem_id);

                Swal.fire({
                    title: 'ยืนยันการลบบัญชีผู้ใช้',
                    showCancelButton: true,
                    confirmButtonColor: '#0c83e2',
                    cancelButtonColor: '#fffff',
                    confirmButtonText: 'ยืนยัน',
                    cancelButtonText: 'ยกเลิก'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "<?php echo site_url().'/Admin/Admin_home/delete_admin'?>",
                            type: 'POST',
                            data: {
                                mem_id: mem_id
                            },
                            success: function(response) {

                                window.location.reload();

                            }
                        });

                    }
                })


            });
        });
        </script>
        <style>
        /*ปรับรูปแบบตัวอักษร */
        @import url('https://fonts.googleapis.com/css2?family=Sarabun&display=swap');

        * {
            font-family: 'Sarabun', sans-serif;
        }
        </style>