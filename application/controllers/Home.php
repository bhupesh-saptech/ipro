<?php
class Home extends CI_Controller {
    public function index() {
        $this->load->model('assets');
        $data['assets'] = $this->assets->read_data();
        //  echo "<pre>";
        //  print_r($data['assets']);

       $this->load->view("home",$data);
    }

}
?>