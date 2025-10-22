<?php
class Assets extends CI_Model {
    public function read_data() {
        
        return $this->db->get('assets')->result();
    }
}
?>