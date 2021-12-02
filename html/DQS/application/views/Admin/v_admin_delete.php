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
                    <div class="row">
                        <div class="col-10_5">
                            <h1 class="card-title " style="padding-top: 10px;" font-size="150px;" font_color="Blue">
                                จัดการบัญชีใช้งาน
                            </h1>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div>
                            <option for="province" class="card-title " style="padding-top: 10px;" font-size="150px;">
                                <h4>ค้นหาข้อมูล</h4>
                                <!-- <?php print_r($arr_member); ?> -->
                        </div>
                    </div>
                </div>
                <br>
                <!-- div header end   -->
                <!-- <?php echo site_url() ?> -->
                <div class="card-body" style="margin-top: -20px;">

                    <div id="create_table"></div> <!-- ตำแหน่งที่สร้าง data table -->

                </div>

                <!-- end defual tab -->
            </div>
        </div>
    </div>
</div>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
$(document).ready(function() {
    // alert('1');
    get_member();
});

function get_member() {
    // alert('2');
    $.ajax({
        url: "<?php echo site_url() ?>/Admin/Admin_home/get_admin_list_ajax",
        type: 'POST',
        dataType: 'JSON',
        success: function(data) {
            console.log(data);
            create_Table(data['json_member']);
        }

    });
} // recieve json then send to create data table

function create_Table(arr_member) {
    // alert('3');
    let html_code = ''; // ตัวแปร generate code html
    html_code += '<div class="table-responsive">';
    html_code +=
        '<table class="table" id = "datatable_member_list">'; // ส่ง datatable_dept_list  ไปสร้าง data table
    html_code += '<thead class=" text">';
    html_code += '<tr>';
    html_code += '<th style="text-align: center;">#</th>';
    html_code += '<th>หน่วยงาน</th>';
    html_code += '<th>จังหวัด</th>';
    html_code += '<th>ชื่อผู้ใช้งาน</th>';
    html_code += '<th>ชื่อ-นามสกุล</th>';
    html_code += '<th style="text-align: center;"></th>';
    html_code += '<th style="text-align: center;"></th>';
    html_code += '</tr>';
    html_code += '</thead>';
    html_code += '<tbody>';
    // strat loop of department
    // arr_dept.forEach((row_dept, index_dept) => {
    //     html_code += '<tr>';
    //     // html_code += '<td style="text-align: center;">' + (index_dept + 1) + '</td>';
    //     // html_code += '<td>' + row_dept['mem_id'] + '</td>';
    //     // html_code += '<td>' + row_dept['mem_firstname'] + '</td>';
    //     // html_code += '<td>' + row_dept['mem_lastname'] + '</td>';
    //     // html_code += '<td>' + row_dept['mem_username'] + '</td>';
    //     // html_code += '<td>' + row_dept['mem_dep_id'] + '</td>';
    //     // html_code += '<td>' + row_dept['mem_pro_id'] + '</td>';
    //     // ชื่อหน่วยงาน

    //     html_code += '<td style="text-align: center;">' +
    //         '<button type="button" class="btn btn-orange editModal" data-toggle="modal" data-target="#editModal" data-id= ' +
    //         row_dept['mem_id'] + ' >' + '<i class="material-icons">edit</i>' + '&nbsp;</button>' +
    //         '</td>';
    //     // button edit data
    //     html_code += '</td>';
    //     html_code += '</tr>';
    // }); // end loop of department
    html_code += '</tbody>';
    html_code += '</table>';
    html_code += '</div>';

    $('#create_table').html(html_code); // call function create table to make data table
    make_dataTable_byId('datatable_member_list');

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



<!-- add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มหน่วยงาน</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
            </div>
            <!-- action="<?php echo site_url() ?>/Department/Department_list/add_department" -->
            <form id="add-form" method="POST" onsubmit="return false">
                <div class="modal-body">
                    <center><input type="text" class="col-md-10" placeholder="กรอกชื่อหน่วยงาน" name="dep_name"
                            required></center>
                    <input type="hidden" name="dep_active" value="1">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                    <input type="submit" class="btn btn-success" value="บันทึก">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ajax add data -->
<!-- send value from add modal to add department -->
<script type="text/javascript">
$('#add-form').submit(function() {
    $.ajax({
        type: 'post',
        url: "<?php echo site_url().'/Admin/Admin_home/get_admin_list_ajax'?>",
        data: $("#add-form").serialize(),
        dataType: 'json',
        success: function(data) {
            // console.log("succ");
            alert('มีข้อมูลนี้ในระบบอยู่แล้วหรือไม่ได้กรอกข้อมูล กรุณากรอกใหม่');
        },
        error: function(error) {
            // console.log("error");
            location.reload();
        }
    });
});
</script>

<!-- edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">แก้ไขชื่อหน่วยงาน</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
            </div>
            <!-- action="<?php echo site_url() ?>/Department/Department_list/add_department" -->
            <form id="edit-form" method="POST" onsubmit="return false">
                <div class="modal-body">
                    <center><input type="text" class="col-md-10" placeholder="กรอกชื่อหน่วยงาน" name="dep_name"
                            required></center>
                    <input type="hidden" name="dep_id" id="dep_id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                    <input type="submit" class="btn btn-success" value="บันทึก">
                </div>
            </form>
        </div>
    </div>
</div>
