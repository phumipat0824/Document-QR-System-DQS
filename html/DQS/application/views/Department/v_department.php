<!-- load plugin data table -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/plugin' ?>/DataTables/datatables.css"/>
<script type="text/javascript" src="<?php echo base_url() . 'assets/plugin' ?>/DataTables/datatables.js"></script>
<link href="<?php echo base_url() . 'assets/template/material-dashboard-master' ?>/assets/css/CSS_table_list.css" rel="stylesheet" />

<div class="main-panel">
  <div class="container">
    <div class="content">
      <div class=" container-fluid">
      <!-- defual tab --> 

      
      <div class="row" style="margin-top: 10%;">
        <div class="col md-12"></div>
        <div class="card">
          <div class="card-header ">
            <div class="row">
              <div class="col-10_5">
                <h4 class="card-title " style="padding-top: 10px;" >ข้อมูลแผนก </h4>
              </div>
              <div class="col-1_5">
                <button class="btn btn-yellow"  >เพิ่มแผนก</button>
              </div>
            </div>
            <hr>
          </div>
           <!-- div header end   -->
          
      
          
            
            
            
              <div class="card-body" style="margin-top: -20px;">
                
                  <div id="create_table"></div>
                
              </div>
            
          


      <!-- end defual tab -->
      </div>
    </div>
  </div>
</div>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
  $(document).ready(function(){
	    get_dept();
    });

  function get_dept(){
    $.ajax({
      url: "<?php echo site_url() ?>/Department/Department_list/get_dept_list_ajax",
      type: 'POST',
      data:{},
      dataType: 'JSON',
      success:function(data){
          console.log(data);
          create_Table(data['json_dept']);
      }

  });
    
}

function create_Table(arr_dept){
  let html_code = '';

	html_code += '<div class="table-responsive">';
	html_code += '<table class="table" id = "datatable_dept_list">';
	html_code += '<thead class=" text">';
	html_code += '<tr>';
	html_code += '<th style="text-align: center;">#</th>';
  html_code += '<th>ชื่อแผนก</th>';
	html_code += '<th style="text-align: center;">สถานะ</th>';
	html_code += '<th style="text-align: center;">แก้ไขล่าสุด</th>';
	html_code += '<th style="text-align: center;">แก้ไขชื่อ</th>';
	html_code += '</tr>';
	html_code += '</thead>';
	html_code += '<tbody>';
  arr_dept.forEach((row_dept, index_dept)=>{
    html_code += '<tr>';
    html_code += '<td style="text-align: center;">' + (index_dept+1) + '</td>';
    html_code += '<td>' +  row_dept['dep_name'] + '</td>';

    if (row_dept['dep_active'] == 1) {
        var check_status ='checked';
    } else {
        var check_status ='';
    }


    html_code += '<td style="text-align: center;">' ;
    html_code += '<label class="switch">';
    html_code += '<input type="checkbox"  '+check_status+' >';
    html_code += '<span class="slider round"></span>';
    html_code += '</label>';
    html_code += '</td>';

    html_code += '<td style="text-align: center;">' +  row_dept['dep_timestamp'] + '</td>';
    html_code += '<td style="text-align: center;">' +  '<button class="btn btn-orange ">'+'<i class="material-icons">edit</i>'+'&nbsp;</button>' + '</td>';
    html_code += '</td>';
		html_code += '</tr>';
  });
  html_code += '</tbody>';
	html_code += '</table>';
  html_code += '</div>';

	$('#create_table').html(html_code);
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
				"first": "",
				"last": "",
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

