

<?php 
date_default_timezone_set('Asia/Jakarta'); 
?>
<table border='1' class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
<thead>
	<tr>
		<td colspan='12'><p style="text-align: center;" border='1'><b>DATA USULAN KEGIATAN DARI CAD </b><br>DPR RI DKI JAKARTA 1 & DPRD DAPIL 4, 5, 6<br>PEMILU 2019</p><br> Update : <font color='red'><?php echo date('d-m-Y')?> | <?php echo date('H:i')?> WIB</font></td>
	</tr>
	<tr>
		<td style="text-align: center;" bgcolor='yellow' width='10px'>NO</td>
		<td style="text-align: center;" bgcolor='yellow'>CAD</td>
		<td style="text-align: center;" bgcolor='yellow'></td>
		<td style="text-align: center;" bgcolor='yellow'>NAMA KEGIATAN</td>
		<td style="text-align: center;" bgcolor='yellow'>Kecamatan</td>
		<td style="text-align: center;" bgcolor='yellow'>Kelurahan</td>
		<td style="text-align: center;" bgcolor='yellow'>RW</td>
		<td style="text-align: center;" bgcolor='yellow'>TIPE KEGIATAN</td>
		<td style="text-align: center;" bgcolor='yellow'>TARGET PESERTA</td>
		<td style="text-align: center;" bgcolor='yellow'>ISU STRATEGIS</td>
		<td style="text-align: center;" bgcolor='yellow'>TANGGAL KEGIATAN</td>
		<td style="text-align: center;" bgcolor='yellow'>PIC Kegiatan</td>
	</tr>
	<tr>
		<td style="text-align: center;"  width='10px'>No</td>
		<td style="text-align: center;" >CAD</td>
		<td style="text-align: center;" bgcolor='yellow'>DAPIL</td>
		<td style="text-align: center;" >NAMA</td>
		<td style="text-align: center;" >Kecamatan</td>
		<td style="text-align: center;" >Kelurahan</td>
		<td style="text-align: center;" >RW</td>
		<td style="text-align: center;" >TIPE</td>
		<td style="text-align: center;" >Jumlah</td>
		<td style="text-align: center;" >Isu</td>
		<td style="text-align: center;" >Tanggal</td>
		<td style="text-align: center;" >PIC</td>
	</tr>
</thead>
<tbody>
<?php
$n=1;
// $url1 = 'https://andro.sitri.online/api/calegtask/all/asc';
// $cetakexceldpp = $this->Main_model->getAPI($url1);
// print_r($cetakexceldpp);
foreach ($usulan_caleg as $dolay)
{
	if($dolay['Status']=='string'){
		echo '';
		}
		else{
?>
	<tr>
		<td style="text-align: center;"><?= $n++; ?></td>
		<td style="text-align: center;"><?php
		$url2 = 'https://andro.sitri.online/api/calegprofiles/idnf/'.$dolay['Id_Caleg'];
		$namacaleg = $this->Main_model->getAPI($url2);
		echo $namacaleg['Nama'];
		?></td>
		<td style="text-align: center;"><?php
		$url3 = 'https://andro.sitri.online/api/dapil/id/'.$dolay['Id_Dapil'];
		$namadapil = $this->Main_model->getAPI($url3);
		echo $namadapil['Nama_Dapil'];
		?></td>
		<td style="text-align: center;"><?= $dolay['Nama_Kegiatan']; ?></td>
		<td style="text-align: center;"><?php
		$url4 = 'https://andro.sitri.online/api/kec/id/'.substr($dolay['Id_Wilayah'],0,7);
		$namakecamatan = $this->Main_model->getAPI($url4);
		echo $namakecamatan['Nama_Kecamatan'];?></td>
		<td style="text-align: center;"><?php
		$url5 = 'https://andro.sitri.online/api/desa/id/'.substr($dolay['Id_Wilayah'],0,10);
		$namadesa = $this->Main_model->getAPI($url5);
		echo $namadesa['Nama_Desa'];?></td>
		<td style="text-align: center;"><?php
		$url6 = 'https://andro.sitri.online/api/rw/id/'.$dolay['Id_Wilayah'];
		$namarw = $this->Main_model->getAPI($url6);
		$cek['Message'] = 'Sequence contains more than one element';
		if($namarw==$cek){
			echo '0'.substr($dolay['Id_Wilayah'],-2);
		}else{
		echo $namarw['Nomor_Rw'];}?></td>
		<td style="text-align: center;"><?= $dolay['Jenis_Kegiatan']; ?></td>
		<td style="text-align: center;"><?= $dolay['Target_Peserta']; ?></td>
		<td style="text-align: center;"><?= $dolay['Isu_Strategis']; ?></td>
		<td style="text-align: center;"><?php   $tgl_acara = substr($dolay['Waktu'],0,10);
                                                                        $jam_acara = substr($dolay['Waktu'],11,5); 
                                                                        $tanggal_acara = explode('-', $tgl_acara);
                                                                        $tanggal_tampil = '';
                                                                            if ($tanggal_acara[1]=="01") {
                                                                             $tanggal_tampil = $tanggal_acara[2]." Januari ".$tanggal_acara[0];
                                                                            }elseif ($tanggal_acara[1]=="02") {
                                                                             $tanggal_tampil = $tanggal_acara[2]." Februari ".$tanggal_acara[0];
                                                                            }elseif ($tanggal_acara[1]=="03") {
                                                                             $tanggal_tampil = $tanggal_acara[2]." Maret ".$tanggal_acara[0];
                                                                            }elseif ($tanggal_acara[1]=="04") {
                                                                             $tanggal_tampil = $tanggal_acara[2]." April ".$tanggal_acara[0];
                                                                            }elseif ($tanggal_acara[1]=="05") {
                                                                             $tanggal_tampil = $tanggal_acara[2]." Mei ".$tanggal_acara[0];
                                                                            }elseif ($tanggal_acara[1]=="06") {
                                                                             $tanggal_tampil = $tanggal_acara[2]." Juni ".$tanggal_acara[0];
                                                                            }elseif ($tanggal_acara[1]=="07") {
                                                                             $tanggal_tampil = $tanggal_acara[2]." Juli ".$tanggal_acara[0];
                                                                            }elseif ($tanggal_acara[1]=="08") {
                                                                             $tanggal_tampil = $tanggal_acara[2]." Agustus ".$tanggal_acara[0];
                                                                            }elseif ($tanggal_acara[1]=="09") {
                                                                             $tanggal_tampil = $tanggal_acara[2]." September ".$tanggal_acara[0];
                                                                            }elseif ($tanggal_acara[1]=="10") {
                                                                             $tanggal_tampil = $tanggal_acara[2]." Oktober ".$tanggal_acara[0];
                                                                            }elseif ($tanggal_acara[1]=="11") {
                                                                             $tanggal_tampil = $tanggal_acara[2]." November ".$tanggal_acara[0];
                                                                            }else {
                                                                             $tanggal_tampil = $tanggal_acara[2]." Desember ".$tanggal_acara[0];
                                                                            }
                                                                        echo $tanggal_tampil.' (Pukul '.$jam_acara.')';
                                                                ?></td>
		<td style="text-align: center;"></td>
	</tr>
<?php
}}
?>
<tbody>
<?php

// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");

// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=Data-Rekap.xls");

// Tambahkan table
// include "../pilihan_menu/tamu.php";

?>
</table>