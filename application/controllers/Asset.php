<?php
class Asset extends CI_Controller {
    public function index() {
        $this->load->model('AssetModel');
        $data['assets'] = $this->AssetModel->get_data();
        $this->load->view("asset/list",$data);
    }
    public function view($asset_id="") {
        $this->load->model('AssetModel');
        $data['asset'] = $this->AssetModel->get_data($asset_id);
        $this->load->view("asset/view",$data);
    }
    public function edit($asset_id="") {
        $this->load->model('AssetModel');
        $data['asset'] = $this->AssetModel->get_data($asset_id);
         $this->load->view("asset/view",$data);
    }
    public function delete($asset_id="") {
        $this->load->model('AssetModel');
        $data['asset'] = $this->AssetModel->get_data($asset_id);
         $this->load->view("asset/view",$data);
    }

}
?>