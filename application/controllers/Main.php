<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('M_main');
        $this->load->model('M_upload');
    }

    function tes()
    {
        $this->load->view('pdf/a');
        
    }

    public function form_table()
    {
        if ($this->M_main->get_file()->num_rows() > 0) {
            $param = $this->M_main->get_file()->result();
            foreach ($param as $row) {
                $kalimat = $row->file_name;
                $nama_table = substr($kalimat,0,-4);
                // echo $nama_table;
            }
            $data['row'] = $this->M_main->get_file();
            $data['kategori'] = $this->M_main->get_kategori($nama_table);
            $this->template->load('template_admin', 'main/form_table', $data);
        }else{
            $param = $this->M_main->get_file()->result();
            foreach ($param as $row) {
                $kalimat = $row->file_name;
                $nama_table = substr($kalimat,0,-4);
                // echo $nama_table;
            }
            $data['row'] = $this->M_main->get_file();
            $this->template->load('template_admin', 'main/form_table', $data);
        }
    }

    public function add_upFile()
    {
        $this->M_main->add_upFile();
        $this->session->set_flashdata('pesan', 'Ditambah');
        redirect('pegawai', 'refresh');
    }
    
    public function data_table()
    {
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
            $this->template->load('template_admin', 'main/data_table', $data);
        }else{
            $this->load->view('main/import');
        }
    }
    
    public function dataTable($kat)
    {
        $kat = str_replace('%20', ' ', $kat);
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
            $data['filter'] = urldecode($kat);
            $data['image'] = $this->M_upload->get_upload();
            // var_dump($data['param']);
            $query = $this->db->query("SELECT * FROM ".$data['param']." WHERE produk like '%".$data['filter']."%'");
            $result = $query->row();

            if ($result != null) {
                $this->load->view('pdf/a', $data);
            }else{
            $this->session->set_flashdata('pesan', 'NULL');
            redirect('','refresh');
            }
        }else{
            $this->load->view('main/import');
        }
    }
    
    public function dataTable_danamon()
    {
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
            $data['filter'] = 'danamon';
            $data['param'] = $nama_table;

            $query = $this->db->query("SELECT * FROM ".$data['param']." WHERE produk like '%".$data['filter']."%'");
            $result = $query->row();

            if ($result != null) {
                $this->load->view('pdf/a', $data);
            }else{
            $this->session->set_flashdata('pesan', 'NULL');
            redirect('','refresh');
            
            }
        }else{
            $this->load->view('main/import');
        }
    }

    public function dataTable_akulaku()
    {
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
            
            $data['filter'] = 'akulaku';
            $data['param'] = $nama_table;

            $query = $this->db->query("SELECT * FROM ".$data['param']." WHERE produk like '%".$data['filter']."%'");
            $result = $query->row();

            if ($result != null) {
                $this->load->view('pdf/a', $data);
            }else{
            $this->session->set_flashdata('pesan', 'NULL');
            redirect('','refresh');
            
            }
        }else{
            $this->load->view('main/import');
        }
    }

    public function delete_table()
    {
        $param = $this->input->post('file_name');
        $nama_table = substr($param, 0, -4);
        // echo $nama_table;
        // exit;
        $this->M_main->delete_table($nama_table);
        $this->M_main->delete_file();
        $this->session->set_flashdata('pesan', 'Dihapus');
        redirect('main/form_table','refresh');
        
    }

    public function data_print()
    {
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
            $this->load->view('pdf/test', $data);
        }else{
            $this->load->view('main/import');
        }
    }

}

/* End of file Main.php */
