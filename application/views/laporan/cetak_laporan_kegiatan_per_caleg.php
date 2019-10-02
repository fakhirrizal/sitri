

<?php 
date_default_timezone_set('Asia/Jakarta');
?>
<table border='1' class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
<thead>
	<tr>
		<td colspan='12'><p style="text-align: center;" border='1'><b>DATA LAPORAN KEGIATAN DARI CAD </b><br>DPR RI DKI JAKARTA 1 & DPRD DAPIL 4, 5, 6<br>PEMILU 2019</p><br> Update : <font color='red'><?php echo date('d-m-Y')?> | <?php echo date('H:i')?> WIB</font></td>
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
		<td style="text-align: center;" bgcolor='yellow'>COVERAGE PESERTA</td>
		<td style="text-align: center;" bgcolor='yellow'>ISU STRATEGIS</td>
		<td style="text-align: center;" bgcolor='yellow'>TANGGAL KEGIATAN</td>
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
	</tr>
</thead>
<tbody>
<?php
$no = 1;
$url3 = 'https://andro.sitri.online/api/calegtask/calegnf/'.$this->uri->segment(3);
$data_task = $this->Main_model->getAPI($url3);
//print_r($data_task);
$cek = array('Message'=>'Task not found');
if($data_task==$cek){
	echo '';
}
else{
foreach ($data_task as $key => $value) {
	if($value['IsDone']=='1'){
?>
<tr class="odd gradeX">
	<td style="text-align: center;"><?= $no++.'.'; ?></td>
	<td style="text-align: center;"><?= $data_caleg['Nama']; ?></td>
	<td style="text-align: center;"><?php
	if($data_caleg['Id_Dapil']=='string'){
		echo '';
	}
	else{
	?>
	<?php
	$url4 = 'https://andro.sitri.online/api/dapil/id/'.$data_caleg['Id_Dapil'];
	$data_dapil_detail = $this->Main_model->getAPI($url4);
	echo $data_dapil_detail['Nama_Dapil'].' ('.$data_dapil_detail['Nama_WilayahDapil'].')';
	}?></td>
	<td style="text-align: center;"><?= $value['Nama_Kegiatan']; ?></td>
	<td style="text-align: center;"><?php
		$url44 = 'https://andro.sitri.online/api/kec/id/'.substr($value['Id_Wilayah'],0,7);
		$namakecamatan = $this->Main_model->getAPI($url44);
		echo $namakecamatan['Nama_Kecamatan'];?></td>
	<td style="text-align: center;"><?php
		$url55 = 'https://andro.sitri.online/api/desa/id/'.substr($value['Id_Wilayah'],0,10);
		$namadesa = $this->Main_model->getAPI($url55);
		echo $namadesa['Nama_Desa'];?></td>
	<td style="text-align: center;"><?php echo '0'.substr($value['Id_Wilayah'],-2); ?></td>
	<td style="text-align: center;"><?= $value['Jenis_Kegiatan']; ?></td>
	<td style="text-align: center;"><?= number_format($value['Jumlah_M']).' Suara'; ?></td>
	<td style="text-align: center;"><?= $value['Isu_Strategis']; ?></td>
	<td style="text-align: center;"><?php   $tgl_acara = substr($value['Waktu'],0,10);
		$jam_acara = substr($value['Waktu'],11,5); 
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
</tr>
<?php
}else{echo'';}}}
$url4 = 'https://andro.sitri.online/api/calegmandiri/calegnf/'.$this->uri->segment(3);
$data_task_mandiri = $this->Main_model->getAPI($url4);
//print_r($data_task);
$cek = array('Message'=>'Task not found');
if($data_task_mandiri==$cek){
	echo '';
}
else{
foreach ($data_task_mandiri as $key => $value) {
	if($value['IsDone']=='1'){
?>
<tr class="odd gradeX">
	<td style="text-align: center;"><?= $no++.'.'; ?></td>
	<td style="text-align: center;"><?= $data_caleg['Nama']; ?></td>
	<td style="text-align: center;"><?php
	if($data_caleg['Id_Dapil']=='string'){
		echo '';
	}
	else{
	?>
	<?php
	$url4 = 'https://andro.sitri.online/api/dapil/id/'.$data_caleg['Id_Dapil'];
	$data_dapil_detail = $this->Main_model->getAPI($url4);
	echo $data_dapil_detail['Nama_Dapil'].' ('.$data_dapil_detail['Nama_WilayahDapil'].')';
	}?></td>
	<td style="text-align: center;"><?= $value['Nama_Kegiatan']; ?></td>
	<td style="text-align: center;"><?php
		$url44 = 'https://andro.sitri.online/api/kec/id/'.substr($value['Id_Wilayah'],0,7);
		$namakecamatan = $this->Main_model->getAPI($url44);
		echo $namakecamatan['Nama_Kecamatan'];?></td>
	<td style="text-align: center;"><?php
		$url55 = 'https://andro.sitri.online/api/desa/id/'.substr($value['Id_Wilayah'],0,10);
		$namadesa = $this->Main_model->getAPI($url55);
		echo $namadesa['Nama_Desa'];?></td>
	<td style="text-align: center;"><?php echo '0'.substr($value['Id_Wilayah'],-2); ?></td>
	<td style="text-align: center;"><?= $value['Jenis_Kegiatan']; ?></td>
	<td style="text-align: center;"><?= number_format($value['Jumlah_M']).' Suara'; ?></td>
	<td style="text-align: center;"><?= $value['Isu_Strategis']; ?></td>
	<td style="text-align: center;"><?php   $tgl_acara = substr($value['Waktu'],0,10);
		$jam_acara = substr($value['Waktu'],11,5); 
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
</tr>
<?php
}else{echo'';}}}
?>
<tbody>
<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data-Rekap.xls");
?>
</table>