<?php
class Home extends CI_Controller {
    public function index() {
        $this->load->model('assets');
        $data['arr'] = $this->assets->read_data();
        print_r($data['arr']);

        //  $this->load->view("home",$data);
    }

}
?>