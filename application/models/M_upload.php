<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_upload extends CI_Model {

    function get_upload()
    {
        $this->db->select('*');
        $this->db->from('tb_upimg');
        $query = $this->db->get();
        return $query;
    }

    function add_upload()
    {
        $nama_gambar = $this->input->post('img_name');
		$config['upload_path']          = './upload/image';
		// jika ffolder path belum di buat
		if(!is_dir($config['upload_path'])){
			mkdir($config['upload_path'], 0755, true);
		}
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['file_name']			= $nama_gambar;
		$config['overwrite']			= true;
		$config['max_size']             = 10000;
        
		$this->load->library('upload', $config);
        if (!$this->upload->do_upload('img_file'))
        {
            $data = [
                    'img_name'          => $this->input->post('img_name'),
                ];
                $this->db->insert('tb_upimg', $data);
        }else{
            $gambar = $this->upload->data();
            $gambar = $gambar['file_name'];
            $data = [
                'img_name'              => $this->input->post('img_name'),
                'img_file'			    => $gambar
            ];
            
            $this->db->insert('tb_upimg', $data);
        }
            
    }

    function delete()
    {
    	$id = $this->input->post('id', true);
    	$this->db->where('img_id', $id);
    	$this->db->delete('tb_upimg');
    }

}

/* End of file M_upload.php */
