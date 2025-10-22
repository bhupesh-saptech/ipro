<?php
class Home extends CI_Controller {
    public function index() {
        $this->load->model('assets');
        $rset = $this->assets->read_data();
        echo '<pre>';
        print_r($rset);
        // $this->load->view("Home",$data);
    }

}
?>