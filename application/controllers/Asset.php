<?php
class Asset extends CI_Controller {
    public function index() {
        $this->load->model('asset_model');
        $data['assets'] = $this->asset_model->get_data();
        $this->load->view("asset/list",$data);
    }
    public function view($asset_id="") {
        $this->load->model('Asset_model');
        $data['asset'] = $this->Asset_model->get_data($asset_id);
        $this->load->view("asset/view",$data);
    }
    public function edit($asset_id="") {
        $this->load->model('Asset_model');
        $data['asset'] = $this->Asset_model->get_data($asset_id);
         $this->load->view("asset/view",$data);
    }
    public function delete($asset_id="") {
        $this->load->model('Asset_model');
        $data['asset'] = $this->Asset_model->get_data($asset_id);
         $this->load->view("asset/view",$data);
    }

}
?>