<?php
class Assets extends CI_Model {
    public function read_data() {
        $this->db->select('a.*,b.site_no,b.site_name,c.staff_name');
        $this->db->from( 'assets a');
        $this->db->join( 'sites  b', 'b.site_id = a.site_id', 'left');
        $this->db->join( 'staff  c', 'c.staff_id = a.staff_id', 'left');
        return $this->db->get()->result();
    }
}
?>