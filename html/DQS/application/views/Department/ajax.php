
            <div class="col-md-12">
            <br><br>
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
            </div>
        
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    
    $(document).ready(function(){
	    get_popup();
    });

    function get_popup(){
        $.ajax({
            url: "<?php echo site_url() ?>/BKE/Admin/Contents/Management_contents_popup/get_popup_list_ajax",
            type: 'POST',
            data:{},
            dataType: 'JSON',
            success:function(data){
                console.log(data);
                create_Table(data['json_popup']);
            }

        });
    }

    function create_Table(arr_popup){
	
	let html_code = '';
	var Day = '';
	html_code += '<table class="table" id = "datatable_popup_list">';
	html_code += '<thead>';
	html_code += '<tr = "ossd_thead">';
	html_code += '<th>ลำดับ</th>';
    html_code += '<th>รูป</th>';
	html_code += '<th>ชื่อ</th>';
	html_code += '<th>วันที่เริ่ม</th>';
	html_code += '<th>วันที่สิ้นสุด</th>';
    html_code += '<th>สถานะ</th>';
	html_code += '<th>การดำเนินการ</th>';
	html_code += '</tr>';
	html_code += '</thead>';
	html_code += '<tbody>';

	arr_popup.forEach((row_popup, index_popup)=>{
		// if(row_popup['pt_path'] != '' && row_popup['vdo_path'] != ''){

			var Day_start_popup = new Date(row_popup['pu_start_date']);
			var dd = String(Day_start_popup.getDate()).padStart(2, '0');
			var mm = String(Day_start_popup.getMonth() + 1).padStart(2, '0');
			var yyyy = Day_start_popup.getFullYear()+543;
			Day_start_popup = dd + '/' + mm + '/' + yyyy;
			// Day_reg_s = Day_reg_s.toLocaleDateString();
            var Day_end_popup = new Date(row_popup['pu_end_date']);
			var dd = String(Day_end_popup.getDate()).padStart(2, '0');
			var mm = String(Day_end_popup.getMonth() + 1).padStart(2, '0');
			var yyyy = Day_end_popup.getFullYear()+543;
			Day_end_popup = dd + '/' + mm + '/' + yyyy;
            
            if (row_popup['pu_status'] == 1) {
                var check_status ='checked';
            } else {
                var check_status ='';
            }

			html_code += '<tr>';
			html_code += '<td style="text-align: center;">' + (index_popup+1) + '</td>';
			html_code += '<td style="text-align: center;">' + '<IMG SRC='+'"<?php echo base_url().'upload_file/'?>' + row_popup['pu_pic_path']+ '"'  + 'width="75" height="50">' + '</td>';
			html_code += '<td style="text-align: left;">' +  row_popup['pu_name'] + '</td>';
			html_code += '<td style="text-align: center;">' + Day_start_popup + '</td>';
			html_code += '<td style="text-align: center;">' + Day_end_popup + '</td>';
            html_code += '<td style="text-align: center;">' ;
            html_code += '<label class="switch">';
            html_code += '<input type="checkbox" disabled '+check_status+' >';
            html_code += '<span class="slider round"></span>';
            html_code += '</label>';
            html_code += '</td>';
            html_code += '<td class="td-actions" style="text-align: center;">';
			// ---------------------------------- ปุ่มแก้ไข ----------------------------------
            // html_code += '<a href="<?php echo site_url()?>/BKE/Admin/News/Management_news_list/show_news_edit/ '+row_popup['pu_id']+' ">'
			html_code += '<button type="button" style="margin-right: 10px;" rel="tooltip" class="btn btn-warning" onclick="edit_popup('+row_popup['pu_id']+')">';
			html_code += '<i class="material-icons">edit</i>';
			html_code += '</button>';
            // html_code += '</a>'
			// -----------------------------------------------------------------------------

			// ----------------------------------- ปุ่มลบ ------------------------------------
			html_code += '<button type="button" style="margin-right: 10px; rel="tooltip" class="btn btn-danger" onclick="delete_popup('+ row_popup['pu_id'] +')">';
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
	make_dataTable_byId('datatable_popup_list');
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

function delete_popup(pu_id){
	swal({
        title: "คุณต้องการลบป็อปอัปหรือไม่",
                // text: "หากคุณยืนยันการลบแล้วคุณจะไม่สามารถกู้คืนป็อปอัปนี้ได้",
                icon: "warning",
                buttons: ["ยกเลิก","ตกลง"],
                dangerMode: true,
	})
	.then((willDelete) => {
        if (willDelete) 
            {
            $.ajax({
                url: "<?php echo site_url().'/BKE/Admin/Contents/Management_contents_popup/delete_popup'?>",
                type:'POST',
                data:{
                    pu_id :  pu_id
                },
                success: function(response){
                    console.log("success")
                    swal({
                        title: "ลบสำเร็จ",
                        text: 'ป็อปอัปถูกลบเรียบร้อยแล้ว',
                        icon: 'success',
                        buttons: false,
                    }).then((confirmed)=>{
                        window.location.reload();
                    });
                }   
            });
		} 
	});
    
}

function edit_popup(pu_id){
    window.location.href="<?php echo site_url()?>/BKE/Admin/Contents/Management_contents_popup/update_popup_page/"+pu_id  ;
}
    
</script>

</body>
  





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