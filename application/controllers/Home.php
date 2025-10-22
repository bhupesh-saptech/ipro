<?php
class Home extends CI_Controller {
    public function index() {
        $this->load->model('assets');
        $data['arr'] = $this->assets->read_data();
        echo "<pre>";
        print_r($data['arr']);

        //  $this->load->view("home",$data);
    }

}
?>