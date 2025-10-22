<?php
class Assets extends CI_Model {
    public function read_data() {
        $rset = $this->db->query('select * from assets');
        return $rset;
    }
}
?>