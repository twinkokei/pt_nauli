<?php
    // var_dump($param);
    // $this->db->select('*');
    // $this->db->from($param);
    // $query = $this->db->get();
    // print_r($query->result());
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_ptnauli";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $data = array();
    $sql = "SELECT * FROM $param WHERE produk like '%$filter%'";
    $result = $conn->query($sql);
    while($row = mysqli_fetch_row($result)) {
        // echo "<pre>";
        // print_r($row);
        $data[] = $row;
    }
    $col_name = array();
    $sql1 = "DESCRIBE $param";
    $result1 = $conn->query($sql1);
    while($row1 = mysqli_fetch_array($result1)) {
        // echo "<pre>";
        // count($row1);
        $col_name[] =  $row1["Field"];
        // echo "<pre>";
        // print_r($row1);
        // foreach ($row as $key) {
        //     print_r($row[3]);
        // }
    }
    // echo count($col_name);
    // foreach ($col_name as $row) {
    //     echo "<pre>";
    //     print_r($row);
    // }
?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Import</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="row card-header py-3 col-12 mx-auto">
      <div class="col-sm-12 col-md-6 col-lg-10 p-2 p-0">
        <h6 class="m-0 font-weight-bold text-primary">Data Import</h6>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-2 p-2">
        <a href="<?= site_url('main/data_print')?>" class="btn btn-warning btn-block" id="btn" target="_blank">
        <i class="fas fa-print"></i> Print
        </a>
      </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NO</th>
                        <?php 
                        foreach ($col_name as $row1) {?>
                        <th><?= $row1?></th>
                        <?php }?>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>NO</th>
                        <?php 
                        foreach ($col_name as $row1) {?>
                        <th><?= $row1?></th>
                        <?php }?>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $no = 1;
                    for ($i=0; $i < count($data); $i++) { 
                        echo "<tr>";
                        // echo count($data)."<br>";
                        // print_r($data[0]);
                        // break;
                        echo "<td>".$no++."</td>";
                        for ($j=0; $j < count($col_name); $j++) { ?>
                            <!-- echo "<pre>"; -->
                            <!-- print_r($data[$i][$j]); -->
                            <td><?= $data[$i][$j]?></td>
                        <?php }?>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>