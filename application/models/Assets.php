<?php
class Assets extends CI_Model {
    public function read_data() {
        $this->db->select('a.*,b.site_no,b.site_name');
        $this->db->from( 'assets a');
        $this->db->join( 'sites  b', 'b.site_id = a.site_id', 'left');
        return $this->db->get()->result();
    }
}
?>