<!-- edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">แก้ไขชื่อโฟลเดอร์</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <!-- action="<?php echo site_url() ?>/Department/Department_list/add_department" -->
      <form id="edit-form" method="POST" onsubmit="return false">
        <div class="modal-body">
            <center><input type="text" class="col-md-10" placeholder="กรอกชื่อโฟลเดอร์" name="dep_name" required ></center>
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