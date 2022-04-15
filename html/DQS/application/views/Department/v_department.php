<!-- 
  * View of department
	* @input -
	* @output -
	* @author Kiattisak
  * @Create Date 2564-08-05
 -->
<!-- load plugin data table -->
<style>
  body {
    font-family:TH Sarabun New;
  }
  /* table {
    font-family:TH Sarabun New;
  } */
  table tr td{
    font-family:TH Sarabun New;
    font-size: 30px;
    }
</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/plugin' ?>/DataTables/datatables.css"/>
<script type="text/javascript" src="<?php echo base_url() . 'assets/plugin' ?>/DataTables/datatables.js"></script>
<link href="<?php echo base_url() . 'assets/template/material-dashboard-master' ?>/assets/css/CSS_table_list.css" rel="stylesheet" />
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
                <h4 class="card-title " style="padding-top: 10px;" >ข้อมูลหน่วยงาน</h4>
              </div>
              <div class="col-2">
                <button class="btn btn-success" data-toggle="modal" data-target="#addModal" >+ เพิ่มหน่วยงาน</button> <!-- ปุ่มเพิ่มหน่วยงาน -->
                <!-- data-toggle="modal" data-target="#addModal"  onclick="addmodal()" -->
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
$(document).ready(function(){
	get_dept();
});

function get_dept(){
    $.ajax({
      url: "<?php echo site_url() ?>/Department/Department_list/get_dept_list_ajax",
      dataType: 'JSON',
      success:function(data){
          console.log(data);
          create_Table(data['json_dept']);
      }

    });
}// recieve json then send to create data table

function create_Table(arr_dept){
  let html_code = ''; // ตัวแปร generate code html
	html_code += '<div class="table-responsive">';
	html_code += '<table class="table" id = "datatable_dept_list">';  // ส่ง datatable_dept_list  ไปสร้าง data table
	html_code += '<thead class=" text">';
	html_code += '<tr>';
	html_code += '<th style="text-align: center;">#</th>';
  html_code += '<th>ชื่อหน่วยงาน</th>';
	html_code += '<th style="text-align: center;">สถานะ</th>';
	html_code += '<th style="text-align: center;">แก้ไขชื่อ</th>';
	html_code += '</tr>';
	html_code += '</thead>';
	html_code += '<tbody>';
  // strat loop of department
  arr_dept.forEach((row_dept, index_dept)=>{
    html_code += '<tr>';
    html_code += '<td style="text-align: center;">' + (index_dept+1) + '</td>';
    html_code += '<td>' +  row_dept['dep_name'] + '</td>';
// ชื่อหน่วยงาน
    if (row_dept['station_status'] == 1) {
        var check_status ='checked';
    } else {
        var check_status ='';
    }
    // if (index_dept <25) {
    //     var edit_check ='disabled';
    // } else {
    //     var edit_check ='';
    // }
// ตรวจสอบสถานะการแสดงผลของหน่วยงาน 

    html_code += '<td style="text-align: center;">' ;
    html_code += '<label class="switch">';
    // html_code += '<input type="checkbox"  '+check_status+' '+edit_check+' onchange="update_status('+ row_dept['dep_id'] +',' +  row_dept['station_status'] + ')" >';
    html_code += '<input type="checkbox"  '+check_status+'  onchange="update_status('+ row_dept['dep_id'] +',' +  row_dept['station_status'] + ')" >';

    html_code += '<span class="slider round"></span>';
    html_code += '</label>';
    html_code += '</td>';
// สถานะของหน่วยงาน
    // html_code += '<td style="text-align: center;">' +  '<button type="button"'+edit_check+' class="btn btn-orange editModal" data-toggle="modal" data-target="#editModal" data-id= '+row_dept['dep_id']+' data-name= '+row_dept['dep_name']+' >'+'<i class="material-icons">edit</i>'+'&nbsp;</button>' + '</td>';
    html_code += '<td style="text-align: center;">' +  '<button type="button" class="btn btn-orange editModal" data-toggle="modal" data-target="#editModal" data-id= '+row_dept['dep_id']+' data-name= '+row_dept['dep_name']+' >'+'<i class="material-icons">edit</i>'+'&nbsp;</button>' + '</td>';

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
		"stateDuration": -1, //บังคับใช้ sessionStorage แทน localStorage (ดังนั้นแม้ใช้คำสั่งของ localStorage มันก็ไป save ใน sessionStorage อยู่ดี)
		"fnStateSave": function (oSettings, oData) {
				localStorage.setItem('DataTables_' + window.location.pathname, JSON.stringify(oData));
		},
		"fnStateLoad": function (oSettings) {
				var data = localStorage.getItem('DataTables_' + window.location.pathname);
				return JSON.parse(data);
		}

	});

	return datatable;
} //make_dataTable_byId
    
</script>



<!-- add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <center><input type="text" class="col-md-10" placeholder="กรอกชื่อหน่วยงาน" id="dep_name" name="dep_name" value="" required ></center>
            <br>
            <label style = "color: #FF0000;"><span id ="text_confirm_add"></span></label>
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
  var text_confirm_add = document.getElementById("text_confirm_add");
  text_confirm_add.innerHTML = "";
  $('#add-form').submit(function(){
    $.ajax({
        type: 'post',
        url: "<?php echo site_url().'/Department/Department_list/add_department'?>",
        data: {
          dep_name: $('#dep_name').val(),
            },
        dataType: 'json',
        success: function(data) {
              // console.log("succ");
              text_confirm_add.innerHTML = "มีข้อมูลนี้ในระบบอยู่แล้วหรือไม่ได้กรอกข้อมูล กรุณากรอกใหม่";
              // alert('มีข้อมูลนี้ในระบบอยู่แล้วหรือไม่ได้กรอกข้อมูล กรุณากรอกใหม่');
        },
        error: function (error) {
          // console.log("error");
          // location.reload();
        }
    });
  });

</script>

<!-- edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <center><input type="text" class="col-md-10" placeholder="กรอกชื่อหน่วยงาน" name="dep_name" id="dep_name" value="" required ></center>
            <input type="hidden" name="dep_id" id="dep_id" value=""><br>
            <label style = "color: #FF0000;"><span id ="text_confirm_edit"></span></label>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
          <input type="submit" class="btn btn-success" value="บันทึก">
        </div>
        </form>
    </div>
  </div>
</div>
<!-- send dep_id to edit modal -->
<script type="text/javascript">
  $(document).on("click", ".editModal", function () {
    var id = $(this).attr('data-id');
    $("#dep_id").val(id);
    var name = $(this).attr('data-name');
    $("#dep_name").val(name);
  });
</script>

<!-- edit modal -->
<script type="text/javascript">
  var text_confirm_edit = document.getElementById("text_confirm_edit");
  text_confirm_edit.innerHTML = "";
  $('#edit-form').submit(function(){
    $.ajax({
        type: 'post',
        url: "<?php echo site_url().'/Department/Department_list/edit_department'?>",
        data: $( "#edit-form" ).serialize(),
        dataType: 'json',
        success: function(data) {
              // console.log("succ");
              text_confirm_edit.innerHTML = "มีข้อมูลนี้ในระบบอยู่แล้วหรือไม่ได้กรอกข้อมูล กรุณากรอกใหม่";
              // alert('มีข้อมูลนี้ในระบบอยู่แล้วหรือไม่ได้กรอกข้อมูล กรุณากรอกใหม่');
        },
        error: function (error) {
          // console.log("error");
          location.reload();
        }
    });
  });

</script>


<!-- ajax update status -->
<script type="text/javascript">
function update_status(dep_id,station_status){
  $.ajax({
  url: "<?php echo site_url().'/Department/Department_list/update_status'?>",
    type: 'POST',
    data:{
      dep_id : dep_id,
      station_status : station_status
    },
    dataType: "JSON",
    success:function(data){
        get_dept();
    }
  });
}

</script>