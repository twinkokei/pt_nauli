<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>PT. Mual Nauli</title>

  <!-- Custom fonts for this template-->
  <link rel="shortcut icon" type="text/css" href="assets/img/battle.png">
  <link href="<?=base_url();?>assets/template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this page -->
  <link href="<?= base_url();?>assets/template/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?=base_url();?>assets/template/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- <link rel="stylesheet" href=""> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
  <link rel="stylesheet" href="<?= base_url();?>assets/template/css/select2.min.css">
  <script src="<?= base_url();?>assets/template/js/select2.min.js"></script>
  <link href="<?=base_url()?>assets/alert/sweetalert2.min.css" rel="stylesheet">

  <!-- Date Picker -->
  <!-- <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>"> -->
  <link rel="stylesheet" href="<?= base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url();?>assets/template/js/jquery-ui-1.12.1/jquery-ui.css">


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Alert -->
    <?php if ($this->session->flashdata('login')): ?>
<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('login'); ?>"></div>
    <?php elseif($this->session->flashdata('pesan')): ?>
<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('pesan'); ?>"></div>
    <?php endif ?>
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" 
      href="<?= site_url('dashboard')?>">
        <div class="sidebar-brand-icon">
          <!-- <i class="fas fa-broadcast-tower"></i> -->
          <img src="assets/img/battle.png" width="50">
        </div>
        <div class="sidebar-brand-text mx-3">PT Mual Nauli</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Menu Master
      </div>

      <li <?=$this->uri->segment(1) == 'main'?'class="nav-item active"' : "" ?> class="nav-item">
        <a class="nav-link" href="<?= site_url('main/form_table')?>">
          <i class="fas fa-print"></i>
          <span>Import</span></a>
      </li>

      <li <?=$this->uri->segment(1) == 'upload_image'?'class="nav-item active"' : "" ?> class="nav-item">
        <a class="nav-link" href="<?= site_url('upload_image/list_upload')?>">
          <i class="fas fa-image"></i>
          <span>Upload Logo</span></a>
      </li>
    
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <!-- <li class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100">
            <h6>Role : 
              <?php if ($this->session->userdata('role') == 1): ?>
                Super Admin
              <?php endif ?>
              <?php if ($this->session->userdata('role') == 2): ?>
                Admin
              <?php endif ?>
            </h6>
          </li> -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <li class="nav-item no-arrow m-auto">
              
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-3 d-none d-lg-inline text-gray-600 small">

                </span>
                <img class="img-profile rounded-circle" src="https://i.pinimg.com/originals/51/f6/fb/51f6fb256629fc755b8870c801092942.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?= site_url('profile')?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        <!-- End of Topbar -->
        </nav>
        <!-- Begin Page Content -->
        <div class="container-fluid">
        <?php echo $contents;?>
        </div>
        <!-- Begin Page Content -->
      </div>
      <!-- End of Main Content -->
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>&copy; PT. Mual Nauli 2021 - Created By OlanFN</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?=site_url('admin/logout')?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url();?>assets/template/vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url();?>assets/template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url();?>assets/template/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=base_url();?>assets/template/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?=base_url();?>assets/template/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?= base_url();?>assets/template/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url();?>assets/template/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url();?>assets/template/js/demo/datatables-demo.js"></script>
  <!-- Date Picker -->
  <script src="<?= base_url();?>assets/template/js/jquery-ui-1.12.1/jquery-ui.js"></script>
  <!-- Alert -->
  <script src="<?= base_url()?>assets/alert/sweetalert2.all.min.js"></script>
  <script src="<?= base_url()?>assets/alert/alert.js"></script>
  <script src="<?= base_url()?>assets/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <!-- <script src="<?= base_url('assets/js/jQuery-2.1.4.min.js'); ?>"></script> -->
  <script src="<?= base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>"></script>
  <script>
  $(document).ready(function() {
      $('.datepicker').datepicker({
          format: 'dd-mm-yyyy',
          autoclose: true,
          todayHighlight: true,
          endDate: '0d',
      });
  });
  </script>
</body>

</html>
