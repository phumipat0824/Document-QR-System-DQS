
     <?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once 'Da_DQS_folder.php';

class M_DQS_folder extends Da_DQS_folder
{

 
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all()
    {
        $sql = "SELECT * from {$this->db_name}.DQS_Folder";
        $query = $this->db->query($sql);
        return $query;
    }
    public function get_by_id($fol_mem_id)
    {
        $sql = "SELECT * FROM {$this->db_name}.DQS_Folder  WHERE fol_mem_id = $fol_mem_id";
        $query = $this->db->query($sql);
        return $query;
    }
    
}
