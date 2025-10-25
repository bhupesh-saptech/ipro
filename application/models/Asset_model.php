<?php
class Asset_model extends CI_Model {
   
    public function get_data($asset_id = '') {
        
        $this->db->select('a.*,b.site_no,b.site_name,c.staff_name');
        $this->db->from( 'assets a');
        $this->db->join( 'sites  b', 'b.site_id = a.site_id', 'left');
        $this->db->join( 'staff  c', 'c.staff_id = a.staff_id', 'left');
        if($asset_id != '') {
             $this->db->where('a.asset_id', $asset_id);
             return $this->db->get()->row();
        } else {
            return $this->db->get()->result();
        }
    }
}
?>