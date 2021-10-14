<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="row card-header py-3 col-12 mx-auto">
      <div class="col-sm-12 col-md-6 col-lg-10 p-2 p-0">
        <h6 class="m-0 font-weight-bold text-primary">Table Upload Logo</h6>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-2 p-2">
        <a href="<?= site_url('upload_image/add_upload')?>" class="btn btn-success btn-block" id="btn">
        <i class="fas fa-image"></i> Add Logo
        </a>
      </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Opsi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key => $data) {?>
                        <tr>
                            <td><?= $no++;?></td>
                            <td><?= $data->img_name;?></td>
                            <td>
                              <?php if ($data->img_file == null): ?>
                              <img src="<?= base_url('upload/image/default.jpg');?>" style="width: 80px;">
                              <?php else: ?>
                              <img src="<?= base_url('upload/image/'.$data->img_file);?>" style="width: 80px;">
                              <?php endif ?>
                            </td>
                            <td class="text-center" colspan="3">
                                <button type="button" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#hapus_modal<?=$data->img_id;?>" data-backdrop="static" data-keyboard="false">
                                    <i class="fas fa-user-times"></i>
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Hapus Data-->
<?php $no = 1;
foreach ($row->result() as $key => $data) : $no++; ?>
<div class="modal fade" id="hapus_modal<?=$data->img_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open_multipart('upload_image/delete'); ?>
        <input type="hidden" id="id" name="id" value="<?=$data->img_id?>">
        <p>Anda akan menghapus data "<?=$data->img_name ?>"</p>
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
