<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_main extends CI_Model {

    function get_table($param = null){
        // var_dump($param);
        // $this->db->select('*');
        // $this->db->from($param);
        // $query = $this->db->get();
        $query = $this->db->query('select * from ' .$param);
        return $query;
    }

    function get_file()
    {
        $this->db->select('*');
        $this->db->from('tb_upFile');
        $query = $this->db->get();
        return $query;
    }

    function get_kategori($param = null)
    {
        $query = $this->db->query("SELECT DISTINCT produk from " .$param);
        return $query;
    }

    function add_upFile()
    {
        $table_name = $this->input->post('file_name');
        $data = [
            "file_name"     => $this->input->post('file_name')
        ];
        $this->db->insert('tb_upFile', $data);
    }

    function delete_table($nama_table)
    {   
        $query = $this->db->query('drop table '.$nama_table);
        return $query;
    }

    function delete_file()
    {
        $id = $this->input->post('id', true);
        $this->db->where('file_id', $id);
        $this->db->delete('tb_upfile');
    }

    function import()
    {
        
        $message = '';
        if(isset($_POST["import"]))
        {
        if($_FILES["database"]["name"] != '')
        {
        $array = explode(".", $_FILES["database"]["name"]);
        $extension = end($array);
        if($extension == 'sql')
        {
        $connect = mysqli_connect("localhost", "root", "", "db_ptnauli");
        $output = '';
        $count = 0;
        $file_data = file($_FILES["database"]["tmp_name"]);
        foreach($file_data as $row)
        {
            $start_character = substr(trim($row), 0, 2);
            if($start_character != '--' || $start_character != '/*' || $start_character != '//' || $row != '')
            {
            $output = $output . $row;
            $end_character = substr(trim($row), -1, 1);
            if($end_character == ';')
            {
            if(!mysqli_query($connect, $output))
            {
            $count++;
            }
            $output = '';
            }
            }
        }
        if($count > 0)
        {
            $message = '<label class="text-danger">There is an error in Database Import</label>';
        }
        else
        {
            $message = '<label class="text-success">Database Successfully Imported</label>';
        }
        }
        else
        {
        $message = '<label class="text-danger">Invalid File</label>';
        }
        }
        else
        {
        $message = '<label class="text-danger">Please Select Sql File</label>';
        }
        }
    }

}

/* End of file M_main.php */
