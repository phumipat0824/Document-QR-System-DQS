<?php //ส่วนใหญ่มี insert/update/delete 
?>
<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once 'DQS_model.php';

class Da_DQS_province extends DQS_model
{

    public $pro_id;
    public $pro_name;
    public $pro_short;


    public function __construct()
    {
        parent::__construct();
    }

    public function insert()
    { //เวลามีหลายDBต้องบอกชื่อDB.ตาราง ต้องใช้ " ห้ามใช้ '
        $sql = "INSERT INTO {$this->db_name}.DQS_Province(pro_id,pro_name,pro_short) 
                VALUES (?,?,?)";
        $this->db->query($sql, array($this->pro_id, $this->pro_name, $this->pro_short));
    }
}
