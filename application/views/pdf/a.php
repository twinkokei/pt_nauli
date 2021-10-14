<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('assets/cetak/style.css')?>">
    <style>
        @media print {
            @print{
                @page :footer {color: #fff }
                @page :header {color: #fff}
            }
        }
    </style>
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
        $filter = str_replace('%20', ' ', $filter);
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
    // echo count($col_name);
    ?>
    <?php for ($i=0; $i < count($data); $i++) { ?>
    <div class="container" style="margin-bottom:70px;">
        <h1 class="title-text" style="font-size: 14px;">
            NOMOR KONTRAK : <?= $data[$i]['NO_KONTRAK'] ?>
        </h1>
        <div class="grid">
            <div class="content-box inline-block" style="border-left: 1px solid black;border-top: 1px solid black;border-bottom:1px solid black">
                <div class="grid-inside-1">
                    <table>
                        <tr>
                            <td width="40%">NASABAH</td>
                            <td>:</td>
                            <td>
                                <?php if($data[$i]['NASABAH'] == null):?>
                                    -
                                <?php else:?>
                                    <?= strtoupper($data[$i]['NASABAH']); ?>
                                <?php endif ?>
                            </td>
                        </tr>
                        <tr>
                            <td>NIK</td>
                            <td>:</td>
                            <td>
                                <?php if($data[$i]['Nomor_KTP'] == null):?>
                                    -
                                <?php else:?>
                                    <?= $data[$i]['Nomor_KTP']?>
                                <?php endif ?>
                            </td>
                        </tr>
                        <tr>
                            <td>TANGGAL LAHIR</td>
                            <td>:</td>
                            <td>
                                <?php if($data[$i]['TGL_LAHIR'] == null):?>
                                    -
                                <?php else:?>
                                    <?= date("d/m/Y", strtotime($data[$i]['TGL_LAHIR']));?>
                                <?php endif ?>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">ALAMAT</td>
                            <td valign="top">:</td>
                            <td valign="top" height="40px" max-height="40px">
                                <?php if($data[$i]['ALAMAT_RUMAH'] == null):?>
                                    -
                                <?php else:?>
                                    <?= strtoupper($data[$i]['ALAMAT_RUMAH']);?>
                                <?php endif ?>
                            </td>
                        </tr>
                        <tr>
                            <td>KOTA</td>
                            <td>:</td>
                            <td>
                                <?php if($data[$i]['KEC'] == null):?>
                                    -
                                <?php else:?>
                                    <?= strtoupper($data[$i]['KEC'] . " - " . $data[$i]['KOTA']);?>
                                <?php endif ?>
                            </td>
                        </tr>
                        <tr>
                            <td>NO TELEPON</td>
                            <td>:</td>
                            <td>
                                <?php if($data[$i]['HANDPHONE'] == null):?>
                                    -
                                <?php else:?>
                                    <?= strtoupper($data[$i]['HANDPHONE']);?>
                                <?php endif ?>
                            </td>
                        </tr>
                        <tr>
                            <td>JENIS KELAMIN</td>
                            <td>:</td>
                            <td>
                                <?php if($data[$i]['JENIS_KELAMIN'] == null):?>
                                    -
                                <?php else:?>
                                    <?= strtoupper($data[$i]['JENIS_KELAMIN']);?>
                                <?php endif ?>
                            </td>
                        </tr>
                        <tr>
                            <td>NAMA ORANG TUA</td>
                            <td>:</td>
                            <td>
                                <?php if($data[$i]['IBU_KANDUNG'] == null):?>
                                    -
                                <?php else:?>
                                    <?= strtoupper($data[$i]['IBU_KANDUNG']);?>
                                <?php endif ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="content-box inline-block" style="border-left: 1px solid black;border-top: 1px solid black;border-bottom:1px solid black">
                <div class="grid-inside-2">
                    <div class="grid3">
                        <table>
                            <tr>
                                <td><b>BILLING</b></td>
                            </tr>
                            <tr>
                                <td width="45%">TOTAL TAGHIHAN</td>
                                <td>:</td>
                                <td>
                                    <?php if($data[$i]['TOTAL_TAGIHAN'] == null):?>
                                        -
                                    <?php else:?>
                                        <?= 'Rp. '.strrev(implode('.',str_split(strrev(strval($data[$i]['TOTAL_TAGIHAN'])),3)));?>
                                    <?php endif ?>
                                </td>
                            </tr>
                            <tr>
                                <td>OPEN DATE</td>
                                <td>:</td>
                                <td>
                                    <?php if($data[$i]['OPEN_DATE'] == null):?>
                                        -
                                    <?php else:?>
                                        <?= date("d/m/Y", strtotime($data[$i]['OPEN_DATE']));?>
                                    <?php endif ?>
                                </td>
                            </tr>
                            <tr>
                                <td>WO DATE</td>
                                <td>:</td>
                                <td>
                                    <?php if($data[$i]['WO_DATE'] == null):?>
                                        -
                                    <?php else:?>
                                        <?= date("d/m/Y", strtotime($data[$i]['WO_DATE']));?>
                                    <?php endif ?>
                                </td>
                            </tr>
                            <tr>
                                <td>VIRTUAL ACCOUNT</td>
                                <td>:</td>
                                <td>
                                    <?php if($data[$i]['VIRTUAL_ACCN'] == null):?>
                                    -
                                    <?php else:?>
                                        <?= strtoupper($data[$i]['VIRTUAL_ACCN']);?>
                                    <?php endif ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="grid3" style="border-top: 1px solid black;">
                        <table>
                            <tr>
                                <td><b><?= strtoupper($data[$i]['NAMA_AGENCY']);?></b></td>
                            </tr>
                            <tr>
                                <td width="45%">ASSIGN DATE</td>
                                <td>:</td>
                                <td>
                                    <?php if($data[$i]['TGL_ASSIGN'] == null):?>
                                        -
                                    <?php else:?>
                                        <?= date("d/m/Y", strtotime($data[$i]['TGL_ASSIGN']));?>
                                    <?php endif ?>
                                </td>
                            </tr>
                            <tr>
                                <td>EXPIRED DATE</td>
                                <td>:</td>
                                <td>
                                    <?php if($data[$i]['TGL_KEMBALI'] == null):?>
                                        -
                                    <?php else:?>
                                        <?= date("d/m/Y", strtotime($data[$i]['TGL_KEMBALI']));?>
                                    <?php endif ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="content-box inline-block" style="border-right: 1px solid black;border-bottom:1px solid black;border-top:1px solid black">
                <?php 
                $conv_name = str_replace(' ', '_', $filter);
                $get_img = array();
                foreach ($image->result() as $key => $img) {
                        $get_img[] = $img->img_name;
                }
                $stats_img = 0;
                for ($z=0; $z < count($get_img); $z++) { 
                    if (strtolower($get_img[$z]) == strtolower($filter)) {
                        // echo "ketemu";
                        $stats_img = 1;
                        break;
                    }else{
                        // echo "tidak";
                    }
                }
                if ($stats_img == 1) {?>
                    <img src="<?= site_url('upload/image/'.strtolower($conv_name).'.png')?>" style="width: 100px; margin-top:20px">
                <?php }else{?>
                    <img src="<?= site_url('upload/image/no_image.png')?>" style="width: 100px; margin-top:20px">
                <?php } ?>
            </div>
        </div>
        <div class="grid1">
            <div class="content-box inline-block" style="border-left: 1px solid black;border-bottom:1px solid black;">
                <div class="grid-inside-1">
                    <table>
                        <tr>
                            <td><b>KANTOR</b></td>
                        </tr>
                        <tr>
                            <td width="80px">NAMA KANTOR</td>
                            <td>:</td>
                            <td>
                                <?php if($data[$i]['KANTOR'] == null):?>
                                    -
                                <?php else:?>
                                    <?= strtoupper($data[$i]['KANTOR']);?>
                                <?php endif ?>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">ALAMAT</td>
                            <td valign="top">:</td>
                            <td valign="top" height="30px" max-height="30px">
                                <?php if($data[$i]['ALAMAT_KANTOR'] == null):?>
                                    -
                                <?php else:?>
                                    <?= strtoupper($data[$i]['ALAMAT_KANTOR']);?>
                                <?php endif ?>
                            </td>
                        </tr>
                        <tr>
                            <td>TELEPON</td>
                            <td>:</td>
                            <td>
                                <?php if($data[$i]['TLPN_KANTOR'] == null):?>
                                    -
                                <?php else:?>
                                    <?= strtoupper($data[$i]['TLPN_KANTOR']);?>
                                <?php endif ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="content-box inline-block" style="border-right: 1px solid black;border-left: 1px solid black;border-bottom:1px solid black;">
                <div class="grid-inside-2">
                    <table>
                        <tr>
                            <td><b>RELASI</b></td>
                        </tr>
                        <tr>
                            <td>NAMA</td>
                            <td>:</td>
                            <td>
                                <?php if($data[$i]['NAMA_ECON'] == null):?>
                                    -
                                <?php else:?>
                                    <?= strtoupper($data[$i]['NAMA_ECON']);?>
                                <?php endif ?>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">ALAMAT</td>
                            <td valign="top">:</td>
                            <td valign="top" height="30px" max-height="30px">
                                <?php if($data[$i]['ALAMAT_ECON'] == null):?>
                                    -
                                <?php else:?>
                                    <?= strtoupper($data[$i]['ALAMAT_ECON']);?>
                                <?php endif ?>
                            </td>
                        </tr>
                        <tr>
                            <td>TELEPON</td>
                            <td>:</td>
                            <td>
                                <?php if($data[$i]['HP_ECON'] == null):?>
                                    -
                                <?php else:?>
                                    <?= strtoupper($data[$i]['HP_ECON']);?>
                                <?php endif ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="content-box inline-block" style="border-right: 1px solid black;border-bottom:1px solid black;">
                <table>
                    <tr>
                        <td><b>KETERANGAN :</b></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <?php } ?>
    
</body>
<script>
function convertToRupiah(angka)
{
	var rupiah = '';		
	var angkarev = angka.toString().split('').reverse().join('');
	for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
	return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
}
</script>

</html>