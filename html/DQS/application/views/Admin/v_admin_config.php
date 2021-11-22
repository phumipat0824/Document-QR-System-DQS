<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/plugin' ?>/DataTables/datatables.css" />
<script type="text/javascript" src="<?php echo base_url() . 'assets/plugin' ?>/DataTables/datatables.js"></script>
<link href="<?php echo base_url() . 'assets/template/material-dashboard-master' ?>/assets/css/CSS_table_list.css"
    rel="stylesheet" />

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
                                </h1s>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div>
                            <option for="province" class="card-title " style="padding-top: 10px;" font-size="150px;">
                                <h4>ค้นหาข้อมูล</h4>
                                <label for=""></label>
                                <?php print_r($arr_member); ?>

                        </div>
                    </div>
                </div>
                <br>
                <!-- div header end   -->


                <div class="card-body" style="margin-top: -20px;">

                    <div id="create_table"></div>

                </div>

                <br>
                <form>

                    <div class="card">
                        <div class="card-body ">
                            <table class="table" id="datatable_anime_list">
                                <thead>
                                    <tr class="thead_color">
                                        <th class="text-center">หน่วยงาน</th>
                                        <th>จังหวัด</th>
                                        <th>ชื่อผู้ใช้งาน</th>
                                        <th>ชื่อ-นามสกุล</th>
                                        <th>รหัสพนักงาน</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <table>
                                    <?php for($i = 0; $i < count($arr_member); $i++){?>
                                    <tr>
                                        <td>
                                            <?php echo $arr_member[$i]->dep_name; ?>
                                        </td>
                                    </tr>

                                    <?php } ?>
                                </table>
                            </table>
                        </div>
                    </div>
                </form>