<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_image extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_upload');
    }
    
    public function add_upload()
    {
        $this->template->load('template_admin', 'upload/add_upload');
    }

    public function add_proses()
    {
        $this->M_upload->add_upload();
        $this->session->set_flashdata('pesan', 'Ditambah');
        redirect('upload_image/list_upload', 'refresh');
    }

    public function list_upload()
    {
        $data['row'] = $this->M_upload->get_upload();
        $this->template->load('template_admin', 'upload/list_upload', $data);
    }

    public function delete()
    {
        $this->M_upload->delete();
        $this->session->set_flashdata('pesan', 'Dihapus');
        redirect('upload_image/list_upload', 'refresh');
    }

}

/* End of file Upload_image.php */
