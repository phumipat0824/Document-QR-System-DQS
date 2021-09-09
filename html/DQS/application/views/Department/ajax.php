<div class="main-panel">
  <div class="container">
    <div class="content">
      <div class=" container-fluid">
      <!-- defual tab -->
            <a href="<?php echo site_url() . '/BKE/Admin/Contents/Management_contents_popup/show_popup_input'; ?> ">
                        <button type="button" class="btn float-right btn-info btn-lg"> เพิ่มป็อปอัป </button>
                    </a>
                <div class="card">
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
            url: "<?php echo site_url() ?>/DQS/Department/Department_list/get_dept_list_ajax",
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
	var Day = '';
	html_code += '<table class="table" id = "datatable_dept_list">';
	html_code += '<thead>';
	html_code += '<tr>';
	html_code += '<th>#</th>';
    html_code += '<th>ชื่อแผนก</th>';
	html_code += '<th>สถานะ</th>';
	html_code += '<th>แก้ไขล่าสุด</th>';
	html_code += '<th>แก้ไขชื่อ</th>';
    html_code += '<th>สถานะ</th>';
	html_code += '</tr>';
	html_code += '</thead>';
	html_code += '<tbody>';

	arr_dept.forEach((row_dept, index_dept)=>{
		

			var Day_start_dept = new Date(row_dept['dept_start_date']);
			var dd = String(Day_start_dept.getDate()).padStart(2, '0');
			var mm = String(Day_start_dept.getMonth() + 1).padStart(2, '0');
			var yyyy = Day_start_dept.getFullYear()+543;
			Day_start_dept = dd + '/' + mm + '/' + yyyy;
			// Day_reg_s = Day_reg_s.toLocaleDateString();
            var Day_end_dept = new Date(row_dept['dept_end_date']);
			var dd = String(Day_end_dept.getDate()).padStart(2, '0');
			var mm = String(Day_end_dept.getMonth() + 1).padStart(2, '0');
			var yyyy = Day_end_dept.getFullYear()+543;
			Day_end_dept = dd + '/' + mm + '/' + yyyy;
            
            if (row_dept['dep_activity'] == 1) {
                var check_activity ='checked';
            } else {
                var check_activity ='';
            }

			html_code += '<tr>';
			html_code += '<td style="text-align: center;">' + (index_dept+1) + '</td>';
			html_code += '<td style="text-align: center;">' + '<IMG SRC='+'"<?php echo base_url().'upload_file/'?>' + row_dept['dept_pic_path']+ '"'  + 'width="75" height="50">' + '</td>';
			html_code += '<td style="text-align: left;">' +  row_dept['dep_name'] + '</td>';
			html_code += '<td style="text-align: center;">' + Day_start_dept + '</td>';
			html_code += '<td style="text-align: center;">' + Day_end_dept + '</td>';
            html_code += '<td style="text-align: center;">' ;
            html_code += '<label style="" class="switch">';
            html_code += '<indeptt type="checkbox" disabled '+check_activity+' >';
            html_code += '<span class="slider round"></span>';
            html_code += '</label>';
            html_code += '</td>';
            html_code += '<td class="td-actions" style="text-align: center;">';
			// ---------------------------------- ปุ่มแก้ไข ----------------------------------
            // html_code += '<a href="<?php echo site_url()?>/BKE/Admin/News/Management_news_list/show_news_edit/ '+row_dept['dept_id']+' ">'
			html_code += '<button type="button" style="margin-right: 10px;" rel="tooltip" class="btn btn-warning" onclick="edit_dept('+row_dept['dep_id']+')">';
			html_code += '<i class="material-icons">edit</i>';
			html_code += '</button>';
            // html_code += '</a>'
			// -----------------------------------------------------------------------------

			// ----------------------------------- ปุ่มลบ ------------------------------------
			html_code += '<button type="button" style="margin-right: 10px; rel="tooltip" class="btn btn-danger" onclick="delete_dept('+ row_dept['dept_id'] +')">';
			html_code += '<i class="material-icons">close</i>';
			html_code += '</button>';
			// -----------------------------------------------------------------------------

			html_code += '</td>';
			html_code += '</tr>';

			
		// }
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