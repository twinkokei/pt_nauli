<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('assets/cetak/style.css')?>">
</head>

<body>
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
        while($row = mysqli_fetch_array($result)) {
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
        $ctr = count($col_name);
        $a = ceil($ctr/2);
        $b = $ctr-$a;
    ?>
    <?php
    // echo $b."<br>";
    // echo "<pre>";
    // print_r($col_name);
    echo count($col_name);
    ?>
    <?php for ($i=0; $i < count($data); $i++) { ?>

        <div class="container" style="margin-bottom:225px;">
            <h1 class="title-text" style="font-size: 30px;">
                Nomor Invoice : <?= $data[$i]['NO_KONTRAK'] ?>
            </h1>
            <div class="grid">
                <div class="content-box inline-block" style="border-right: 0px;">
                    <div class="grid-inside-1">
                        <table>
                            <?php for ($j=0; $j < $a; $j++) {?>
                                <tr>
                                <?php foreach ($col_name as $key1 => $val1) {?>
                                    <?php if ($j == $key1) {?>
                                        <td style="font-size:11px;"><?= $val1;?></td>
                                        <?php if($data[$i][$j] == ""):?>
                                            <td style="font-size:11px;">: kosong;</td>
                                        <?php else:?>
                                            <td style="font-size:11px;" >: <?= $data[$i][$j]?></td>
                                        <?php endif ?>
                                    <?php }?>
                                <?php }?>
                                </tr>
                            <?php } ?>
                        </table>
                        <table>
                            <?php for ($j=0; $j < $a; $j++) {?>
                                <tr>
                                <?php foreach ($col_name as $key1 => $val1) {?>
                                    <?php if ($j == $key1) {?>
                                        <td style="font-size:11px;"><?= $val1;?></td>
                                        <?php if($data[$i][$j] == ""):?>
                                            <td style="font-size:11px;">: kosong;</td>
                                        <?php else:?>
                                            <td style="font-size:11px;" >: <?= $data[$i][$j]?></td>
                                        <?php endif ?>
                                    <?php }?>
                                <?php }?>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
                <div class="content-box inline-block" style="border-right: 0px;">
                    <div class="grid-inside-2">
                        <table>
                            <?php for ($j=$a; $j < $ctr; $j++) {?>
                                <tr>
                                <?php foreach ($col_name as $key1 => $val1) {?>
                                    <?php if ($j == $key1) {?>
                                        <td style="font-size:11px;"><?= $val1;?></td>
                                        <?php if($data[$i][$j] == ""):?>
                                            <td style="font-size:11px;">: kosong;</td>
                                        <?php else:?>
                                            <td style="font-size:11px;">: <?= $data[$i][$j]?></td>
                                        <?php endif ?>
                                    <?php }?>
                                <?php }?>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
                <div class="content-box inline-block" style="border-left: 0px;">
                    <img 
                    <?php if($data[$i]['PRODUK'] == "Akulaku"): ?> 
                        src="<?= base_url('upload/image/akulaku.png')?>"
                    <?php elseif($data[$i]['PRODUK'] == "Danamon"): ?>
                        src="<?= base_url('upload/image/danamon.png')?>"
                    <?php elseif($data[$i]['PRODUK'] == "Home Credit"): ?>
                        src="<?= base_url('upload/image/home_credit.png')?>"
                    <?php endif ?>
                    style="width: 100px; margin-left:100px">
                </div>
            </div>
        </div>
    <?php }?>
    
</body>

</html>