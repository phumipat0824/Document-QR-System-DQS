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
              <div class="col-md-10_5">
                <h4 class="card-title ">ข้อมูลแผนก </h4>
              </div>
              <div class="col-md-1_5">
                <button class="btn btn-yellow" >เพิ่มแผนก</button>
              </div>
            </div>
            <hr>
          </div><!-- div header end  -->
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
                      <td><button class="btn btn-info">แก้ไข</button></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
            </div>
      
              </div>
      



      <!-- end defual tab -->
      </div>
    </div>
  </div>
</div>
