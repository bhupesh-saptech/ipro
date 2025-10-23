<?php
class Home extends CI_Controller {
    public function index() {
        $this->load->model('assets');
        $data['assets'] = $this->assets->read_data();
       $this->load->view("assets",$data);
    }

}
?>