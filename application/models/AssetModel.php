<?php
class AssetModel extends CI_Model {
   
    public function get_data($id = '') {
        
        $this->db->select('a.*,b.site_no,b.site_name,c.staff_name');
        $this->db->from( 'assets a');
        $this->db->join( 'sites  b', 'b.site_id = a.site_id', 'left');
        $this->db->join( 'staff  c', 'c.staff_id = a.staff_id', 'left');
        // if($id != '') {
        //     $this->db->where('a.id', '$id');
        // }
        return $this->db->get()->result();
    }
}
?>