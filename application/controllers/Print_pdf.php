<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Print_pdf extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('M_main');
    }
    
    public function index()
    {
        
        $this->load->library('mypdf');

        if ($this->M_main->get_file()->num_rows() > 0) {
            $param = $this->M_main->get_file()->result();
            foreach ($param as $row) {
                $kalimat = $row->file_name;
                $nama_table = substr($kalimat,0,-4);
                // echo $nama_table;
            }
            // exit;
            // $data['param'] = $this->input->post('param');
            # code...
            // $data['param'] = $this->input->post('param');
            $data['param'] = $nama_table;
            // var_dump($data['param']);
            $this->mypdf->generate('pdf/print_pdf.php', $data);
            // $this->load->view('pdf/test', $data);
        }else{
            $this->load->view('main/import');
        }

        
    }

}

/* End of file Print_pdf.php */
