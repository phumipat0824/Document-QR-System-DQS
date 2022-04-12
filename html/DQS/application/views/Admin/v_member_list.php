<!-- load plugin data table -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/plugin' ?>/DataTables/datatables.css" />
<script type="text/javascript" src="<?php echo base_url() . 'assets/plugin' ?>/DataTables/datatables.js"></script>
<link href="<?php echo base_url() . 'assets/template/material-dashboard-master' ?>/assets/css/CSS_table_list.css"
    rel="stylesheet" />
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- ===================================== -->

/*
* v_member_list
* Display delete data for member
* @input -
* @output delete data of member
* @author Apinya
* @Create Date 2565-01-04
*/

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
                                <div class="card-header card-header-warning" style=" height: 60px; width: 300px;">

                                    <h5 class="card-title"
                                        style="margin-left: 50px; font-family:TH Sarabun New; font-size:2.5em;">
                                        จัดการบัญชีผู้ใช้งาน </h4>
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


        <script>
        $(document).ready(function() {
            get_mem();
        });

        function get_mem() {
            $.ajax({
                url: "<?php echo site_url() .'/Admin/Admin_home/get_mem_list_ajax'?>",
                dataType: 'JSON',
                success: function(data) {
                    console.log(data);
                    create_Table(data['json_mem']);
                }

            });
        } // recieve json then send to create data table

        function create_Table(arr_mem) {
            let html_code = ''; // ตัวแปร generate code html
            html_code += '<div class="table-responsive">';
            html_code +=
                '<table class="table" id="datatable_mem_list">'; // ส่ง datatable_mem_list  ไปสร้าง data table
            html_code += '<thead class=" text">';
            html_code += '<tr>';
            html_code += '<th>จังหวัด</th>';
            html_code += '<th>ชื่อผู้ใช้งาน</th>';
            html_code += '<th>ชื่อ - นามสกุล</th>';
            html_code += '<th>หน่วยงาน</th>';
            html_code += '<th>อีเมล</th>';
            html_code += '<th style="text-align: center;">ดำเนินการ</th>';
            html_code += '</tr>';
            html_code += '</thead>';
            html_code += '<tbody>';
            // strat loop of department
            arr_mem.forEach((row_mem, index_mem) => {
                html_code += '<tr>';
                html_code += '<td>' + row_mem['pro_name'] + '</td>';
                html_code += '<td>' + row_mem['mem_username'] + '</td>';
                html_code += '<td   >' + row_mem['mem_firstname'] + ' ' + row_mem['mem_lastname'] + '</td>';
                html_code += '<td>' + row_mem['dep_name'] + '</td>';
                let text = row_mem['mem_email'];
                let result = text.indexOf('@');
                let result2 = result - 3;
                let total_email = text.substr(0, result2) + '***' + text.substr(result);
                html_code += '<input type="hidden" id="' + row_mem['mem_id'] + '" value="' + row_mem[
                    'mem_email'] + '">';

                html_code += '<td> <div id="email' + row_mem['mem_id'] + '">' + total_email +
                    '</div></td>';


                html_code += '<td style="text-align: center;">' +
                    '<button type="button" class="btn bg-gradient-primary" onclick="show_email(' +
                    row_mem[
                        'mem_id'] + ')" >' +
                    '<i id="eye' + row_mem['mem_id'] + '" class="far fa-eye-slash"></i>' + '</button>';





                html_code += '<a href="<?php echo site_url() ?>/Member/Member_edit/show_member_edit/' + row_mem[
                        'mem_id'] + '">' +
                    '<i class="far fa-edit"></i>' + '</a>';
                // button edit data
                html_code += '<button type="button" class="btn bg-gradient-primary" onclick="delete_member(' +
                    row_mem[
                        'mem_id'] + ')">' +
                    '<i class="fas fa-trash">' + '</button>' + '</td>';
                // button delete data
                html_code += '</td>';
                html_code += '</tr>';
            });
            html_code += '</tbody>';
            html_code += '</table>';
            html_code += '</div>';

            $('#create_table').html(html_code); // call function create table to make data table
            make_dataTable_byId('datatable_mem_list');

        }


        /*
         * v_member_list
         * Display create email
         * @input -
         * @output 62160***@go.buu.ac.th
         * @author Apinya
         * @Create Date 2565-08-04
         */

        function show_email(mem_id) {

            var email = $('#' + mem_id).val();
            var x = document.getElementById("email" + mem_id);
            console.log(email);
            console.log(x.innerHTML);
            if (x.innerHTML == email) {
                let result = email.indexOf('@');
                let result2 = result - 3;
                let total_email = email.substr(0, result2) + '***' + email.substr(result);
                $("#email" + mem_id).html(total_email);
                $('#eye' + mem_id).removeClass('far fa-eye').addClass('far fa-eye-slash');

                // $('#eye').removeClass('far fa-eye-slash').addClass('fas fa-trash');

            } else {
                $("#email" + mem_id).html(email);
                // $('#eye').removeClass('fas fa-trash').addClass('far fa-eye-slash');
                $('#eye' + mem_id).removeClass('far fa-eye-slash').addClass('far fa-eye');

            }
            // html_code += '<td style="text-align: center;">' +
            //     '<button type="button" class="btn bg-gradient-primary" onclick='
            // row_mem['mem_email'] + '">' + '<i class="far fa-eye-eye"></i>' + '</button>' + '</td>';

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
                    localStorage.setItem('DataTables_' + window.location.pathname, JSON.stringify(
                        oData));
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
        function delete_member(mem_id) {
            console.log(mem_id);

            Swal.fire({
                title: 'ยืนยันการลบบัญชีผู้ใช้',
                showCancelButton: true,
                confirmButtonColor: '#518FF6',
                cancelButtonColor: '#fffff',
                confirmButtonColor: 'green',
                cancelButtonColor: 'red',
                cancelButtonText: 'ยกเลิก',
                confirmButtonText: 'บันทึก'

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
        };
        </script>

        <style>
        /*ปรับรูปแบบตัวอักษร */
        @import url('https://fonts.googleapis.com/css2?family=Sarabun&display=swap');

        * {
            font-family: 'Sarabun', sans-serif;
        }
        </style>