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
              <div class="col-10_5 col-sm-8">
                <h4 class="card-title " style="padding-top: 10px;" >ข้อมูลแผนก </h4>
              </div>
              <div class="col-1_5 col-sm-4">
                <button class="btn btn-yellow"  >เพิ่มแผนก</button>
              </div>
            </div>
            <hr>
          </div>
           div header end  
          <div class="card-body" style="margin-top: -20px;">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text">
                  <tr>
                    <th>#</th>
                    <th>ชื่อแผนก</th>
                    <th>สถานะ</th>
                    <th>แก้ไขล่าสุด</th>
                    <th>แก้ไขชื่อ</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=0; ?>
                  <?php foreach ($arr_dept as $dept) { $i++?>
                    <tr>
                      <td><?php echo $i ?></td>
                      <td><?php echo $dept->dep_name ?></td>
                      <td><?php echo $dept->dep_active ?></td>
                      <td><?php echo $dept->dep_timestamp ?></td>
                      <td><button class="btn btn-info " style="height: 40px;" ><i class="material-icons" style="padding-top: 10px;" >edit</i></button></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      
      <div class="card" style="margin-top: 10%;">
          <div class="card-header">
          </div>
        <div class="card-body">
          <div id="create_table"></div>
        </div>
      </div>


      <!-- end defual tab -->
      </div>
    </div>
  </div>
</div>



<script>
  $(document).ready(function(){
	    get_dept();
    });

  function get_dept(){
    $.ajax({
      url: "<?php echo site_url() ?>/Department/Department_list/get_dept_list_ajax",
      type: 'POST',
      data:{},
      dataType: 'json',
      success:function(json_data){
      console.log(json_data);
      create_Table(data['json_dept']);
      }

    });
}

function create_Table(arr_dept){
	
	let html_code = '';
	var Day = '';
	html_code += '<table class="table" id = "datatable_dept_list">';
	html_code += '<thead>';
	html_code += '<tr>';
	html_code += '<th>#</th>';
  html_code += '<th>ชื่อแผนก</th>';
	html_code += '<th>สถานะ</th>';
	html_code += '<th>แก้ไขล่าสุด</th>';
	html_code += '<th>แก้ไขชื่อ</th>';
	html_code += '</tr>';
	html_code += '</thead>';
	html_code += '<tbody>';
  arr_dept.forEach((row_dept, index_dept)=>{
    html_code += '<tr>';
    html_code += '<td style="text-align: center;">' + (index_dept+1) + '</td>';
    html_code += '<td style="text-align: left;">' +  row_dept['dep_name'] + '</td>';
    html_code += '<td style="text-align: left;">' +  row_dept['dep_active'] + '</td>';
    html_code += '<td style="text-align: left;">' +  row_dept['dep_timestamp'] + '</td>';
    html_code += '<td style="text-align: left;">' +  '<button class="btn btn-info ">'+'<i class="material-icons">edit</i>'+'&nbsp;</button>' + '</td>';
    html_code += '</td>';
		html_code += '</tr>';
  });
  html_code += '</tbody>';
	html_code += '</table>';

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
		search: "ค้นหา :_INdeptT_",
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
}
    
</script>