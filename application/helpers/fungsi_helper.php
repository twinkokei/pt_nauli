<?php 

	function ceksdh_login_pegawai()
	{
		$CI =& get_instance();
		$user_session = $CI->session->userdata('user_id');
		// $email = $CI->session->userdata('email');
		// $user = $CI->fungsi->user_login()->status;
		if ($user_session != 0) {
			$CI->session->set_flashdata('login', 'sudah login');
			// echo "<script>alert('Sudah Login, Logout Dulu Bosss')</script>";
			redirect('dashboard','refresh');
		}
	}

	function cekblm_login_pegawai()
	{
		$CI =& get_instance();
		$user_session = $CI->session->userdata('user_id');
		// $user = $CI->fungsi->user_login()->status;
		if (!$user_session) {
			$CI->session->set_flashdata('login', 'belum login');
			redirect('admin','refresh');
		}
	}

 ?>
