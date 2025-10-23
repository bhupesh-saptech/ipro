<?php
class Asset extends CI_Controller {
    public function index() {
        $this->load->model('AssetModel');
        $data['assets'] = $this->AssetModel->get_data();
        $this->load->view("assets/list",$data);
    }
    public function view($id="") {
        $this->load->model('AssetModel');
        $data['asset'] = $this->AssetModel->get_data($id);
         $this->load->view("assets/view",$data);
    }
    public function edit($id="") {
        $this->load->model('AssetModel');
        $data['asset'] = $this->AssetModel->get_data($id);
         $this->load->view("assets/view",$data);
    }
    public function delete($id="") {
        $this->load->model('AssetModel');
        $data['asset'] = $this->AssetModel->get_data($id);
         $this->load->view("assets/view",$data);
    }

}
?>