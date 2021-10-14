
<?php 
$message = '';
if(isset($_POST["import"]))
{
 if($_FILES["database"]["name"] != '')
 {
  
	
	$connect = mysqli_connect("localhost", "root", "", "db_ptnauli");
	$nama_table = $_FILES['database']['name'];
	$nama_table = str_replace(' ', '_', $nama_table);
	$nama_table = str_replace('-', '_', $nama_table);
	$query = "INSERT INTO tb_upfile SET file_name = '$nama_table'";
	mysqli_query($connect, $query); 
 
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
 $this->session->flashdata('pesan', 'Ditambah');
 redirect('main/form_table');
}
?>


<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data File Import</h1>
<p class="mb-4">Data Table File yang di import tidak boleh lebih dari 1,
	<br>jika ingin import file baru maka harus menghapus file yang lama dulu.</p>

<div class="card shadow mb-4">
	<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		<h5 class="m-0 font-weight-bold text-primary">Form Table Import</h5>
		<div class="right">
			<a href="https://sqlizer.io/#/" target="_blank" class="btn btn-warning">
			<i class="fas fa-file-excel"></i> Convert to SQL
			</a>
		</div>
	</div>
	<?php echo form_open_multipart(); ?>
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">File Import</label>
				<div class="col-sm-9">
					<input type="file" class="custom-file-input" id="database" name="database">
					<label class="form-control custom-file-label" for="database">Pilih File	</label>
				</div>
			</div>
		</div>
		<div class="card-footer">
		<!-- <div class="form-group row"> -->
			<input type="submit" name="import" class="btn btn-success" value="Import"
			<?php if($this->M_main->get_file()->num_rows() > 0):?>
			disabled
			<?php endif ?>>
			<button type="Reset" class="btn btn-secondary"><i class="fas fa-spinner"></i> Reset</button>
		</div>
		<!-- </div> -->
	<?php echo form_close(); ?>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="row card-header py-3 col-12 mx-auto">
      <div class="col-sm-12 col-md-6 col-lg-10 p-2 p-0">
        <h5 class="m-0 font-weight-bold text-primary">Table User</h5>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-2 p-2">
      </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Opsi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key => $data) {?>
                        <tr>
                            <td><?= $no++;?></td>
                            <td><?= $data->file_name;?></td>
                            <td class="text-center" colspan="2">
                                <!-- Default dropleft button -->
                                <div class="btn-group dropbottom">
                                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">  
                                  <i class="fas fa-print"></i> Print
                                  </button>
                                  <div class="dropdown-menu">
                                    <!-- Dropdown menu links -->
                                    <?php foreach ($kategori->result_array() as $key => $kat) {?>
                                      <a class="dropdown-item" href="<?= site_url('main/dataTable/'.$kat['produk'])?>" target="_blank"><?= $kat['produk']?></a>
                                    <?php }?>
                                    <!-- <a class="dropdown-item" href="<?= site_url('main/dataTable_akulaku')?>" target="_blank">Akulaku</a>
                                    <a class="dropdown-item" href="<?= site_url('main/dataTable_danamon')?>" target="_blank">Danamon</a>
                                    <a class="dropdown-item" href="<?= site_url('main/dataTable_homeCredit')?>" target="_blank">Home Credit</a> -->
                                  </div>
                                </div>
                                <!-- <a href="<?= site_url('main/data_table')?>"class="btn btn-warning btn-square">
                                  <span><i class="fas fa-search-plus"></i> Detail</span>
                                </a> -->
                                <button type="button" class="btn btn-danger btn-square" data-toggle="modal" data-target="#hapus_modal<?=$data->file_id;?>" data-backdrop="static" data-keyboard="false">
                                    <span><i class="fas fa-trash-alt"></i> Hapus</span>
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal Filter-->
<?php $no = 1;
foreach ($row->result() as $key => $data) : $no++; ?>
<div class="modal fade" id="hapus_modal<?=$data->file_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open_multipart('main/delete_table'); ?>
        <input type="hidden" id="id" name="id" value="<?=$data->file_id?>">
        <input type="hidden" id="file_name" name="file_name" value="<?=$data->file_name?>">
        <p>Anda akan menghapus data "<?=$data->file_name ?>"</p>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <button class="btn btn-danger" type="submit">Hapus</button>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
<!-- Akhir Modal Filter -->

<!-- Modal Hapus Data-->
<?php $no = 1;
foreach ($row->result() as $key => $data) : $no++; ?>
<div class="modal fade" id="hapus_modal<?=$data->file_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open_multipart('main/delete_table'); ?>
        <input type="hidden" id="id" name="id" value="<?=$data->file_id?>">
        <input type="hidden" id="file_name" name="file_name" value="<?=$data->file_name?>">
        <p>Anda akan menghapus data "<?=$data->file_name ?>"</p>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <button class="btn btn-danger" type="submit">Hapus</button>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
<!-- Akhir Modal Hapus Data -->
