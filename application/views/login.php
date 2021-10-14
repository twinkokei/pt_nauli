<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?= base_url()?>assets/template-login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/template-login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/template-login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/template-login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/template-login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/template-login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/template-login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/template-login/css/main.css">
<!--===============================================================================================-->
<!-- Custom styles for this template-->
<link href="<?=base_url()?>assets/template-admin/css/sb-admin-2.min.css" rel="stylesheet">
<link href="<?=base_url()?>assets/alert/sweetalert2.min.css" rel="stylesheet">
<link rel="shortcut icon" type="text/css" href="assets/img/AXIE-INFINITY-LOGO.png">
</head>
<body>
	
<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('login');?>"></div>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?= base_url()?>assets/template-login/images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="post" action="<?= base_url('admin/proses_login')?>">
                    <center>
                    <img src="https://4.bp.blogspot.com/-Bx7WKcA80A4/UK0qT1-v3tI/AAAAAAAAAfM/dVeOOnMzoQg/s1600/Logo+Bank+Mega+tok.png" width="25%" style="margin-top: -50px; margin-bottom: 10px;">
                    </center>
					<span class="login100-form-title" style="margin-bottom: -20px;">
						Login Page!
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" id="email" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" id="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="login_user">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
                            Selamat datang Admin, 
						</span>
						<a class="txt2" href="#">
						    Silahkan Login!
						</a>
					</div>
<!-- 
					<div class="text-center p-t-136">
						<a class="txt2" href="#">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div> -->
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="<?= base_url()?>assets/template-login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url()?>assets/template-login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?= base_url()?>assets/template-login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url()?>assets/template-login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url()?>assets/template-login/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="<?= base_url()?>assets/template-login/js/main.js"></script>
	
	<script src="<?= base_url()?>assets/alert/sweetalert2.all.min.js"></script>
  	<script src="<?= base_url()?>assets/alert/alert.js"></script>

</body>
</html>