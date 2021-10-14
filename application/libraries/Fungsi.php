<?php 
	
	/**
	 * 
	 */
	class Fungsi
	{
		protected $CI;

		function __construct()
		{
			$this->CI =& get_instance();
		}

		// function user_login()
		// {
		// 	$this->CI->load->model('M_login');
		// 	$user_id = $this->CI->session->userdata('user_id');
		// 	$user_data = $this->CI->M_login->get_user($user_id)->row();
		// 	return $user_data;
		// }

		// function chart_project()
		// {
		// 	$this->CI->load->model('M_project');
		// 	$project =  $this->CI->M_project->chart_project()->result();
		// 	return $project;
		// }

		// function count_slp()
		// {
		// 	$this->CI->load->model('M_slp');
		// 	return $this->CI->M_slp->count_slp();
		// }

		// function count_user()
		// {
		// 	$this->CI->load->model('M_dashboard');
		// 	return $this->CI->M_dashboard->get_user()->num_rows();
		// }

		// function count_product()
		// {
		// 	$this->CI->load->model('M_product');
		// 	return $this->CI->M_product->get_product()->num_rows();
		// }

		// function count_wa()
		// {
		// 	$this->CI->load->model('M_whatsapp');
		// 	return $this->CI->M_whatsapp->get_whatsapp()->num_rows();
		// }

	}

?>