<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    function __construct() {
        parent::__construct();
    }
    public function index()
	{
		$urlxx = 'https://andro.sitri.online/api/rw/all/asc';
		$queryrw = $this->Main_model->getAPI($urlxx);
		//return $queryrw;
		header('Content-Type: application/json');
   	 	echo json_encode( $queryrw );
	}
	public function chart1(){
		$urlku = 'https://andro.sitri.online/api/strtask/segmensemua';
		$queryku = $this->Main_model->getAPI($urlku);
		header('Content-Type: application/json');
   	 	echo json_encode( $queryku );
	}
	public function chart2(){
		$urlku = 'https://andro.sitri.online/api/calegtask/countsegmenall/asc';
		$queryku = $this->Main_model->getAPI($urlku);
		header('Content-Type: application/json');
   	 	echo json_encode( $queryku );
	}
	public function chart3(){
		$urlku = 'https://andro.sitri.online/api/strtask/isusemua';
		$queryku = $this->Main_model->getAPI($urlku);
		header('Content-Type: application/json');
   	 	echo json_encode( $queryku );
	}
	public function chart4(){
		$urlku = 'https://andro.sitri.online/api/calegtask/countisuall/asc';
		$queryku = $this->Main_model->getAPI($urlku);
		header('Content-Type: application/json');
   	 	echo json_encode( $queryku );
	}
	public function chart5(){
		$arrayPie5 = array();
		$url0 = 'https://andro.sitri.online/api/calegtask/nama';
		$instruksi_caleg = $this->Main_model->getAPI($url0);
		$url1 = 'https://andro.sitri.online/api/strtask/nama';
		$instruksi_str = $this->Main_model->getAPI($url1);
		$url2 = 'https://andro.sitri.online/api/strmandiri/allnf/asc';
		$mandiri_str = $this->Main_model->getAPI($url2);
		$url3 = 'https://andro.sitri.online/api/calegmandiri/allnf/asc';
		$mandiri_caleg = $this->Main_model->getAPI($url3);
		$kategori_keperluan5 = array(
			$array_l = array(
				'Keterangan' => 'Instruksi Caleg',
				'Jumlah' => count($instruksi_caleg),
			),
			$array_l = array(
				'Keterangan' => 'Instruksi Struktur',
				'Jumlah' => count($instruksi_str),
			),
			$array_l = array(
				'Keterangan' => 'Kegiatan Mandiri Caleg',
				'Jumlah' => count($mandiri_caleg),
			),
			$array_l = array(
				'Keterangan' => 'Kegiatan Mandiri Struktur',
				'Jumlah' => count($mandiri_str),
			),
		);
		// foreach ($kategori_keperluan5 as $key => $row) {
		// 	$arrayPie5[] =  "["."'".$row['Keterangan']."'".",".$row['Jumlah']."]";
		// }
		foreach ($kategori_keperluan5 as $key => $row) {
		$arrayPie5[] = array(
			'Keterangan' => $row['Keterangan'],
			'Jumlah' => $row['Jumlah']
		);}
		header('Content-Type: application/json');
   	 	echo json_encode( $arrayPie5 );
	}
	public function chart6(){
		$arrayPie6 = array();
		$suara0 = 0;
		$suara1 = 0;
		$suara2 = 0;
		$suara3 = 0;
		$suara4 = 0;
		$url4 = 'https://andro.sitri.online/api/calegtask/allnf/asc';
		$task_caleg = $this->Main_model->getAPI($url4);
		foreach ($task_caleg as $key => $value) {
			$suara0 += $value['Jumlah_M'];
			$suara1 += $value['Jumlah_CM'];
			$suara2 += $value['Jumlah_O'];
			$suara3 += $value['Jumlah_T'];
			$suara4 += $value['Jumlah_BJ'];
		}
		$url5 = 'https://andro.sitri.online/api/strtask/all/asc';
		$task_str = $this->Main_model->getAPI($url5);
		foreach ($task_str as $key => $value) {
			$suara0 += $value['Jumlah_M'];
			$suara1 += $value['Jumlah_CM'];
			$suara2 += $value['Jumlah_O'];
			$suara3 += $value['Jumlah_T'];
			$suara4 += $value['Jumlah_BJ'];
		}
		$url2 = 'https://andro.sitri.online/api/strmandiri/allnf/asc';
		$mandiri_str = $this->Main_model->getAPI($url2);
		foreach ($mandiri_str as $key => $value) {
			$suara0 += $value['Jumlah_M'];
			$suara1 += $value['Jumlah_CM'];
			$suara2 += $value['Jumlah_O'];
			$suara3 += $value['Jumlah_T'];
			$suara4 += $value['Jumlah_BJ'];
		}
		$url3 = 'https://andro.sitri.online/api/calegmandiri/allnf/asc';
		$mandiri_caleg = $this->Main_model->getAPI($url3);
		foreach ($mandiri_caleg as $key => $value) {
			$suara0 += $value['Jumlah_M'];
			$suara1 += $value['Jumlah_CM'];
			$suara2 += $value['Jumlah_O'];
			$suara3 += $value['Jumlah_T'];
			$suara4 += $value['Jumlah_BJ'];
		}
		$kategori_keperluan6 = array(
			$array_l = array(
				'Keterangan' => 'Suara Memilih',
				'Jumlah' => $suara0,
			),
			$array_l = array(
				'Keterangan' => 'Cenderung Memilih',
				'Jumlah' => $suara1,
			),
			$array_l = array(
				'Keterangan' => 'Oportunis',
				'Jumlah' => $suara2,
			),
			$array_l = array(
				'Keterangan' => 'Menolak',
				'Jumlah' => $suara3,
			),
			$array_l = array(
				'Keterangan' => 'Belum Jelas',
				'Jumlah' => $suara4,
			),
		);
		//print_r($kategori_keperluan6);
		// foreach ($kategori_keperluan6 as $key => $row) {
		// 	$arrayPie6[] =  "["."'".$row['Keterangan']."'".",".$row['Jumlah']."]";
		// }
		foreach ($kategori_keperluan6 as $key => $row) {
			$arrayPie6[] = array(
				'Keterangan' => $row['Keterangan'],
				'Jumlah' => $row['Jumlah']
			);}
			header('Content-Type: application/json');
			echo json_encode( $arrayPie6 );
	}
	public function chart7(){
		$arrayPie8 = array();
		$url5 = 'https://andro.sitri.online/api/kec/kab/3172';
		$kec = $this->Main_model->getAPI($url5);
		foreach ($kec as $key => $row) {
			$url6 = 'https://andro.sitri.online/api/coverageall/wilayah/'.$row['Id_Kecamatan'];
			$coverage = $this->Main_model->getAPI($url6);
				//$arrayPie8[] =  "["."'".$row['Nama_Kecamatan']."'".",".$coverage['jumlah']."]";
				$arrayPie8[] = array(
					'Nama_Kecamatan' => $row['Nama_Kecamatan'],
					'jumlah' => $coverage['jumlah']
				);
		}
		header('Content-Type: application/json');
		echo json_encode( $arrayPie8 );
	}
	public function chart8(){
		$arrayPie8 = array();
		$urfl5['id_kabupaten'] = '3172';
		$kategdori_keperluan = $this->Main_model->getSelectedData('kecamatan',$urfl5);
			foreach ($kategdori_keperluan as $key => $fff) {
				$url6 = 'https://andro.sitri.online/api/coveragecaleg/wilayah/'.$fff->id_kecamatan;
				$coveragerw = $this->Main_model->getAPI($url6);
				$urlxx = 'https://andro.sitri.online/api/rw/all/asc';
				$queryrw = $this->Main_model->getAPI($urlxx);
				$jumlah_rw = 0;
				foreach ($queryrw as $key => $xx) {
					if($xx['Id_Kecamatan']==$fff->id_kecamatan){
						$jumlah_rw++;
					}
					else{
						echo '';
					}
				}
				$persentase = $coveragerw['jumlah']/$jumlah_rw*100;
				$string_persentase = ' ('.number_format($persentase,2)." %)";
				//echo "{ name: '".$fff->nm_kecamatan." (".number_format($persentase,2)." %)',data: [".$coveragerw['jumlah']."]},";
				$arrayPie8[] = array(
					'Nama_Kecamatan' => $fff->nm_kecamatan.$string_persentase,
					'jumlah' => $coveragerw['jumlah']
				);
			}
		header('Content-Type: application/json');
		echo json_encode( $arrayPie8 );
	}
	public function chart9(){
		$arrayPie8 = array();
		$urfl5['id_kabupaten'] = '3172';
		$kategdori_keperluan = $this->Main_model->getSelectedData('kecamatan',$urfl5);
			foreach ($kategdori_keperluan as $key => $fff) {
				$url6 = 'https://andro.sitri.online/api/coveragecaleg/'.$fff->id_kecamatan.'/DPR';
				$coveragerw = $this->Main_model->getAPI($url6);
				$urlxx = 'https://andro.sitri.online/api/rw/all/asc';
				$queryrw = $this->Main_model->getAPI($urlxx);
				$jumlah_rw = 0;
				foreach ($queryrw as $key => $xx) {
					if($xx['Id_Kecamatan']==$fff->id_kecamatan){
						$jumlah_rw++;
					}
					else{
						echo '';
					}
				}
				$persentase = $coveragerw['jumlah']/$jumlah_rw*100;
				$string_persentase = ' ('.number_format($persentase,2)." %)";
				//echo "{ name: '".$fff->nm_kecamatan." (".number_format($persentase,2)." %)',data: [".$coveragerw['jumlah']."]},";
				$arrayPie8[] = array(
					'Nama_Kecamatan9' => $fff->nm_kecamatan.$string_persentase,
					'jumlah9' => $coveragerw['jumlah']
				);
			}
		header('Content-Type: application/json');
		echo json_encode( $arrayPie8 );
	}
	public function chart10(){
		$arrayPie8 = array();
		$urfl5['id_kabupaten'] = '3172';
		$kategdori_keperluan = $this->Main_model->getSelectedData('kecamatan',$urfl5);
			foreach ($kategdori_keperluan as $key => $fff) {
				$url6 = 'https://andro.sitri.online/api/coveragecaleg/'.$fff->id_kecamatan.'/DPRD';
				$coveragerwdprd = $this->Main_model->getAPI($url6);
				$urlxxx = 'https://andro.sitri.online/api/rw/all/asc';
				$queryrw = $this->Main_model->getAPI($urlxxx);
				$jumlah_rw_ = 0;
				foreach ($queryrw as $key => $xxx) {
					if($xxx['Id_Kecamatan']==$fff->id_kecamatan){
						$jumlah_rw_++;
					}
					else{
						echo '';
					}
				}
				//$persentase = $coveragerwdprd['jumlah']/$jumlah_rw_*100;
				//echo "{ name: '".$fff->nm_kecamatan." (".number_format($persentase,2)." %)',data: [".$coveragerwdprd['jumlah']."]},";
				$persentase = $coveragerwdprd['jumlah']/$jumlah_rw_*100;
				$string_persentase = ' ('.number_format($persentase,2)." %)";
				//echo "{ name: '".$fff->nm_kecamatan." (".number_format($persentase,2)." %)',data: [".$coveragerw['jumlah']."]},";
				$arrayPie8[] = array(
					'Nama_Kecamatan10' => $fff->nm_kecamatan.$string_persentase,
					'jumlah10' => $coveragerwdprd['jumlah']
				);
			}
		header('Content-Type: application/json');
		echo json_encode( $arrayPie8 );
	}
	public function chart11(){
		$arrayPie8 = array();
		$urfl5['id_kabupaten'] = '3172';
		$kategdori_keperluan = $this->Main_model->getSelectedData('kecamatan',$urfl5);
		foreach ($kategdori_keperluan as $key => $fff) {
			$suara0 = 0;
			$url7 = 'https://andro.sitri.online/api/calegtask/allnf/asc';
			$task_caleg7 = $this->Main_model->getAPI($url7);
			foreach ($task_caleg7 as $key => $value) {
				if(stristr($value['Id_Wilayah'],$fff->id_kecamatan)){
					if(stristr($value['Id_Dapil'],'C')){
						$suara0 += $value['Jumlah_M'];
					}
					else{
						echo'';
					}
				} else {
				echo '';
				}
			}
			$url8 = 'https://andro.sitri.online/api/strtask/all/asc';
			$task_str8 = $this->Main_model->getAPI($url8);
			foreach ($task_str8 as $key => $value) {
				if(stristr($value['Id_Wilayah'],$fff->id_kecamatan)){
					if(stristr($value['Id_Dapil'],'C')){
						$suara0 += $value['Jumlah_M'];
					}
					else{
						echo'';
					}
				} else {
				echo '';
				}
			}
			$url9 = 'https://andro.sitri.online/api/strmandiri/allnf/asc';
			$mandiri_str9 = $this->Main_model->getAPI($url9);
			foreach ($mandiri_str9 as $key => $value) {
				if(stristr($value['Id_Wilayah'],$fff->id_kecamatan)){
					if(stristr($value['Id_Dapil'],'C')){
						$suara0 += $value['Jumlah_M'];
					}
					else{
						echo'';
					}
				} else {
				echo '';
				}
			}
			$url10 = 'https://andro.sitri.online/api/calegmandiri/allnf/asc';
			$mandiri_caleg10 = $this->Main_model->getAPI($url10);
			foreach ($mandiri_caleg10 as $key => $value) {
				if(stristr($value['Id_Wilayah'],$fff->id_kecamatan)){
					if(stristr($value['Id_Dapil'],'C')){
						$suara0 += $value['Jumlah_M'];
					}
					else{
						echo'';
					}
				} else {
				echo '';
				}
			}
			//$string_persentase = " (Target Suara : ".$fff->target_suara.")";
			$persen = $suara0/$fff->target_suara*100;
			$string_persentase = " (".number_format($persen,2)." %)";
			//echo "{ name: '".$fff->nm_kecamatan." (Target Suara : ".$fff->target_suara.")',data: [".$suara0."]},";
			$arrayPie8[] = array(
				'kecamatan' => $fff->nm_kecamatan.$string_persentase,
				'suara' => $suara0
			);
		}
		header('Content-Type: application/json');
		echo json_encode( $arrayPie8 );
	}
	public function chart12(){
		$arrayPie8 = array();
		$urfl5['id_kabupaten'] = '3172';
		$kategdori_keperluan = $this->Main_model->getSelectedData('kecamatan',$urfl5);
			foreach ($kategdori_keperluan as $key => $fff) {
				$suara01 = 0;
				$url10 = 'https://andro.sitri.online/api/calegtask/allnf/asc';
				$task_caleg10 = $this->Main_model->getAPI($url10);
				foreach ($task_caleg10 as $key => $value) {
					if(stristr($value['Id_Wilayah'],$fff->id_kecamatan)){
						if(stristr($value['Id_Dapil'],'B')){
							$suara01 += $value['Jumlah_M'];
						}
						else{
							echo'';
						}
					} else {
					echo '';
					}
				}
				$url11 = 'https://andro.sitri.online/api/strtask/all/asc';
				$task_str11 = $this->Main_model->getAPI($url11);
				foreach ($task_str11 as $key => $value) {
					if(stristr($value['Id_Wilayah'],$fff->id_kecamatan)){
						if(stristr($value['Id_Dapil'],'B')){
							$suara01 += $value['Jumlah_M'];
						}
						else{
							echo'';
						}
					} else {
					echo '';
					}
				}
				$url12 = 'https://andro.sitri.online/api/strmandiri/allnf/asc';
				$mandiri_str12 = $this->Main_model->getAPI($url12);
				foreach ($mandiri_str12 as $key => $value) {
					if(stristr($value['Id_Wilayah'],$fff->id_kecamatan)){
						if(stristr($value['Id_Dapil'],'B')){
							$suara01 += $value['Jumlah_M'];
						}
						else{
							echo'';
						}
					} else {
					echo '';
					}
				}
				$url13 = 'https://andro.sitri.online/api/calegmandiri/allnf/asc';
				$mandiri_caleg13 = $this->Main_model->getAPI($url13);
				foreach ($mandiri_caleg13 as $key => $value) {
					if(stristr($value['Id_Wilayah'],$fff->id_kecamatan)){
						if(stristr($value['Id_Dapil'],'B')){
							$suara01 += $value['Jumlah_M'];
						}
						else{
							echo'';
						}
					} else {
					echo '';
					}
				}
				//$string_persentase = " (Target Suara : ".$fff->target_suara.")";
				$persen = $suara01/$fff->target_suara*100;
				$string_persentase = " (".number_format($persen,2)." %)";
				//echo "{ name: '".$fff->nm_kecamatan." (Target Suara : ".$fff->target_suara.")',data: [".$suara01."]},";
				$arrayPie8[] = array(
					'kecamatan12' => $fff->nm_kecamatan.$string_persentase,
					'suara12' => $suara01
				);
		}
		header('Content-Type: application/json');
		echo json_encode( $arrayPie8 );
	}
	public function chart13(){
		$arrayPie8 = array();
		$urfl5['id_kabupaten'] = '3172';
		$kategdori_keperluan = $this->Main_model->getSelectedData('kecamatan',$urfl5);
			foreach ($kategdori_keperluan as $key => $fff) {
				$keg = 0;
				$url7 = 'https://andro.sitri.online/api/calegtask/allnf/asc';
				$task_caleg7 = $this->Main_model->getAPI($url7);
				foreach ($task_caleg7 as $key => $value) {
					if(stristr($value['Id_Wilayah'],$fff->id_kecamatan)){
						if(stristr($value['Id_Dapil'],'C')){
							$keg += count($value['Id_Tasklist']);
						}
						else{
							echo'';
						}
					} else {
					echo '';
					}
				}
				$url8 = 'https://andro.sitri.online/api/strtask/all/asc';
				$task_str8 = $this->Main_model->getAPI($url8);
				foreach ($task_str8 as $key => $value) {
					if(stristr($value['Id_Wilayah'],$fff->id_kecamatan)){
						if(stristr($value['Id_Dapil'],'C')){
							$keg += count($value['Id_Tasklist']);
						}
						else{
							echo'';
						}
					} else {
					echo '';
					}
				}
				$url9 = 'https://andro.sitri.online/api/strmandiri/allnf/asc';
				$mandiri_str9 = $this->Main_model->getAPI($url9);
				foreach ($mandiri_str9 as $key => $value) {
					if(stristr($value['Id_Wilayah'],$fff->id_kecamatan)){
						if(stristr($value['Id_Dapil'],'C')){
							$keg += count($value['Id_TaskMandiri']);
						}
						else{
							echo'';
						}
					} else {
					echo '';
					}
				}
				$url10 = 'https://andro.sitri.online/api/calegmandiri/allnf/asc';
				$mandiri_caleg10 = $this->Main_model->getAPI($url10);
				foreach ($mandiri_caleg10 as $key => $value) {
					if(stristr($value['Id_Wilayah'],$fff->id_kecamatan)){
						if(stristr($value['Id_Dapil'],'C')){
							$keg += count($value['Id_TaskMandiri']);
						}
						else{
							echo'';
						}
					} else {
					echo '';
					}
				}
				//echo "{ name: '".$fff->nm_kecamatan."',data: [".$keg."]},";
				$arrayPie8[] = array(
					'nm_kecamatan' => $fff->nm_kecamatan,
					'kegiatan' => $keg
				);
			}
		header('Content-Type: application/json');
		echo json_encode( $arrayPie8 );
	}
	public function chart14(){
		$arrayPie8 = array();
		$urfl5['id_kabupaten'] = '3172';
		$kategdori_keperluan = $this->Main_model->getSelectedData('kecamatan',$urfl5);
			foreach ($kategdori_keperluan as $key => $fff) {
				$keg1 = 0;
				$url7 = 'https://andro.sitri.online/api/calegtask/allnf/asc';
				$task_caleg7 = $this->Main_model->getAPI($url7);
				foreach ($task_caleg7 as $key => $value) {
					if(stristr($value['Id_Wilayah'],$fff->id_kecamatan)){
						if(stristr($value['Id_Dapil'],'B')){
							$keg1 += count($value['Id_Tasklist']);
						}
						else{
							echo'';
						}
					} else {
					echo '';
					}
				}
				$url8 = 'https://andro.sitri.online/api/strtask/all/asc';
				$task_str8 = $this->Main_model->getAPI($url8);
				foreach ($task_str8 as $key => $value) {
					if(stristr($value['Id_Wilayah'],$fff->id_kecamatan)){
						if(stristr($value['Id_Dapil'],'B')){
							$keg1 += count($value['Id_Tasklist']);
						}
						else{
							echo'';
						}
					} else {
					echo '';
					}
				}
				$url9 = 'https://andro.sitri.online/api/strmandiri/allnf/asc';
				$mandiri_str9 = $this->Main_model->getAPI($url9);
				foreach ($mandiri_str9 as $key => $value) {
					if(stristr($value['Id_Wilayah'],$fff->id_kecamatan)){
						if(stristr($value['Id_Dapil'],'B')){
							$keg1 += count($value['Id_TaskMandiri']);
						}
						else{
							echo'';
						}
					} else {
					echo '';
					}
				}
				$url10 = 'https://andro.sitri.online/api/calegmandiri/allnf/asc';
				$mandiri_caleg10 = $this->Main_model->getAPI($url10);
				foreach ($mandiri_caleg10 as $key => $value) {
					if(stristr($value['Id_Wilayah'],$fff->id_kecamatan)){
						if(stristr($value['Id_Dapil'],'B')){
							$keg1 += count($value['Id_TaskMandiri']);
						}
						else{
							echo'';
						}
					} else {
					echo '';
					}
				}
				//echo "{ name: '".$fff->nm_kecamatan."',data: [".$keg1."]},";
				$arrayPie8[] = array(
					'nm_kecamatan2' => $fff->nm_kecamatan,
					'kegiatan2' => $keg1
				);
			}
		header('Content-Type: application/json');
		echo json_encode( $arrayPie8 );
	}
	public function chart15(){
		$arrayPie8 = array();
		$urfl5['id_kabupaten'] = '3172';
		$kategdori_keperluan = $this->Main_model->getSelectedData('kecamatan',$urfl5);
			foreach ($kategdori_keperluan as $key => $fff) {
				$url14 = 'https://andro.sitri.online/api/kunjungan/tingkat/'.$fff->id_kecamatan.'/DPRRI';
				$task_caleg14 = $this->Main_model->getAPI($url14);
				// $cad = 0;
				// $url14 = 'https://andro.sitri.online/api/calegprofiles/allnf/asc';
				// $task_caleg14 = $this->Main_model->getAPI($url14);
				// foreach ($task_caleg14 as $key => $value) {
				// 		if(stristr($value['Id_Dapil'],'C')){
				// 			$url1 = 'https://andro.sitri.online/api/calegtask/allnf/asc';
				// 			$task_caleg1 = $this->Main_model->getAPI($url1);
				// 			foreach ($task_caleg1 as $key => $row) {
				// 				if($row['Id_Caleg']==$value['Id_Caleg']){
				// 					if((stristr($row['Id_Wilayah'],$fff->id_kecamatan)) and ($row['Kehadiran_Caleg']=='Hadir')){
				// 						$cad++;
				// 					}
				// 					else{
				// 						echo'';
				// 					}
				// 				}
				// 				else{echo'';}
				// 			}
				// 		}
				// 		else{
				// 			echo'';
				// 		}
				// }
				$arrayPie8[] = array(
					'nm_kecamatan3' => $fff->nm_kecamatan,
					'kegiatan3' => $task_caleg14['Jumlah']
				);
			}
		header('Content-Type: application/json');
		echo json_encode( $arrayPie8 );
	}
	public function chart16(){
		$arrayPie8 = array();
		$urfl5['id_kabupaten'] = '3172';
		$kategdori_keperluan = $this->Main_model->getSelectedData('kecamatan',$urfl5);
			foreach ($kategdori_keperluan as $key => $fff) {
				$url14 = 'https://andro.sitri.online/api/kunjungan/tingkat/'.$fff->id_kecamatan.'/DPRD';
				$task_caleg14 = $this->Main_model->getAPI($url14);
				// $cad1 = 0;
				// $url15 = 'https://andro.sitri.online/api/calegprofiles/allnf/asc';
				// $task_caleg15 = $this->Main_model->getAPI($url15);
				// foreach ($task_caleg15 as $key => $value) {
				// 		if(stristr($value['Id_Dapil'],'B')){
				// 			$url1 = 'https://andro.sitri.online/api/calegtask/allnf/asc';
				// 			$task_caleg1 = $this->Main_model->getAPI($url1);
				// 			foreach ($task_caleg1 as $key => $row) {
				// 				if($row['Id_Caleg']==$value['Id_Caleg']){
				// 					if((stristr($row['Id_Wilayah'],$fff->id_kecamatan)) and ($row['Kehadiran_Caleg']=='Hadir')){
				// 						$cad1++;
				// 					}
				// 					else{
				// 						echo'';
				// 					}
				// 				}
				// 				else{echo'';}
				// 			}
				// 		}
				// 		else{
				// 			echo'';
				// 		}
				// }
				$arrayPie8[] = array(
					'nm_kecamatan4' => $fff->nm_kecamatan,
					'kegiatan4' => $task_caleg14['Jumlah']
				);
			}
		header('Content-Type: application/json');
		echo json_encode( $arrayPie8 );
	}
	public function chart17(){
		$arrayPie8 = array();
		$urfl5['id_kecamatan'] = $this->uri->segment(3);
		$kategdori_keperluan = $this->Main_model->getSelectedData('desa',$urfl5);
			foreach ($kategdori_keperluan as $key => $fff) {
				$url6 = 'https://andro.sitri.online/api/coveragecaleg/wilayah/'.$fff->id_desa;
				$coveragerw = $this->Main_model->getAPI($url6);
				$urlxx = 'https://andro.sitri.online/api/rw/all/asc';
				$queryrw = $this->Main_model->getAPI($urlxx);
				$jumlah_rw = 0;
				foreach ($queryrw as $key => $xx) {
					if($xx['Id_Desa']==$fff->id_desa){
						$jumlah_rw++;
					}
					else{
						echo '';
					}
				}
				$persentase = $coveragerw['jumlah']/$jumlah_rw*100;
				$string_persentase = ' ('.number_format($persentase,2)." %)";
				//echo "{ name: '".$fff->nm_kecamatan." (".number_format($persentase,2)." %)',data: [".$coveragerw['jumlah']."]},";
				$arrayPie8[] = array(
					'Nama_Kecamatan' => $fff->nm_desa.$string_persentase,
					'jumlah' => $coveragerw['jumlah']
				);
			}
		header('Content-Type: application/json');
		echo json_encode( $arrayPie8 );
	}
	public function chart18(){
		$arrayPie8 = array();
		$urfl5['id_kecamatan'] = $this->uri->segment(3);
		$kategdori_keperluan = $this->Main_model->getSelectedData('desa',$urfl5);
			foreach ($kategdori_keperluan as $key => $fff) {
				$url6 = 'https://andro.sitri.online/api/coveragecaleg/'.$fff->id_desa.'/DPR';
				$coveragerw = $this->Main_model->getAPI($url6);
				$urlxx = 'https://andro.sitri.online/api/rw/all/asc';
				$queryrw = $this->Main_model->getAPI($urlxx);
				$jumlah_rw = 0;
				foreach ($queryrw as $key => $xx) {
					if($xx['Id_Desa']==$fff->id_desa){
						$jumlah_rw++;
					}
					else{
						echo '';
					}
				}
				$persentase = $coveragerw['jumlah']/$jumlah_rw*100;
				$string_persentase = ' ('.number_format($persentase,2)." %)";
				//echo "{ name: '".$fff->nm_kecamatan." (".number_format($persentase,2)." %)',data: [".$coveragerw['jumlah']."]},";
				$arrayPie8[] = array(
					'Nama_Kecamatan9' => $fff->nm_desa.$string_persentase,
					'jumlah9' => $coveragerw['jumlah']
				);
			}
		header('Content-Type: application/json');
		echo json_encode( $arrayPie8 );
	}
	public function chart19(){
		$arrayPie8 = array();
		$urfl5['id_kecamatan'] = $this->uri->segment(3);
		$kategdori_keperluan = $this->Main_model->getSelectedData('desa',$urfl5);
			foreach ($kategdori_keperluan as $key => $fff) {
				$url6 = 'https://andro.sitri.online/api/coveragecaleg/'.$fff->id_desa.'/DPRD';
				$coveragerwdprd = $this->Main_model->getAPI($url6);
				$urlxxx = 'https://andro.sitri.online/api/rw/all/asc';
				$queryrw = $this->Main_model->getAPI($urlxxx);
				$jumlah_rw_ = 0;
				foreach ($queryrw as $key => $xxx) {
					if($xxx['Id_Desa']==$fff->id_desa){
						$jumlah_rw_++;
					}
					else{
						echo '';
					}
				}
				//$persentase = $coveragerwdprd['jumlah']/$jumlah_rw_*100;
				//echo "{ name: '".$fff->nm_kecamatan." (".number_format($persentase,2)." %)',data: [".$coveragerwdprd['jumlah']."]},";
				$persentase = $coveragerwdprd['jumlah']/$jumlah_rw_*100;
				$string_persentase = ' ('.number_format($persentase,2)." %)";
				//echo "{ name: '".$fff->nm_kecamatan." (".number_format($persentase,2)." %)',data: [".$coveragerw['jumlah']."]},";
				$arrayPie8[] = array(
					'Nama_Kecamatan10' => $fff->nm_desa.$string_persentase,
					'jumlah10' => $coveragerwdprd['jumlah']
				);
			}
		header('Content-Type: application/json');
		echo json_encode( $arrayPie8 );
	}
	public function chart20(){
		$arrayPie8 = array();
		$urfl5['id_kecamatan'] = $this->uri->segment(3);
		$kategdori_keperluan = $this->Main_model->getSelectedData('desa',$urfl5);
		foreach ($kategdori_keperluan as $key => $fff) {
			$suara0 = 0;
			$url7 = 'https://andro.sitri.online/api/calegtask/allnf/asc';
			$task_caleg7 = $this->Main_model->getAPI($url7);
			foreach ($task_caleg7 as $key => $value) {
				if(stristr($value['Id_Wilayah'],$fff->id_desa)){
					if(stristr($value['Id_Dapil'],'C')){
						$suara0 += $value['Jumlah_M'];
					}
					else{
						echo'';
					}
				} else {
				echo '';
				}
			}
			$url8 = 'https://andro.sitri.online/api/strtask/all/asc';
			$task_str8 = $this->Main_model->getAPI($url8);
			foreach ($task_str8 as $key => $value) {
				if(stristr($value['Id_Wilayah'],$fff->id_desa)){
					if(stristr($value['Id_Dapil'],'C')){
						$suara0 += $value['Jumlah_M'];
					}
					else{
						echo'';
					}
				} else {
				echo '';
				}
			}
			$url9 = 'https://andro.sitri.online/api/strmandiri/allnf/asc';
			$mandiri_str9 = $this->Main_model->getAPI($url9);
			foreach ($mandiri_str9 as $key => $value) {
				if(stristr($value['Id_Wilayah'],$fff->id_desa)){
					if(stristr($value['Id_Dapil'],'C')){
						$suara0 += $value['Jumlah_M'];
					}
					else{
						echo'';
					}
				} else {
				echo '';
				}
			}
			$url10 = 'https://andro.sitri.online/api/calegmandiri/allnf/asc';
			$mandiri_caleg10 = $this->Main_model->getAPI($url10);
			foreach ($mandiri_caleg10 as $key => $value) {
				if(stristr($value['Id_Wilayah'],$fff->id_desa)){
					if(stristr($value['Id_Dapil'],'C')){
						$suara0 += $value['Jumlah_M'];
					}
					else{
						echo'';
					}
				} else {
				echo '';
				}
			}
			//$string_persentase = " (Target Suara : ".$fff->target_suara.")";
			$persen = $suara0/$fff->target_suara*100;
			$string_persentase = " (".number_format($persen,2)." %)";
			//echo "{ name: '".$fff->nm_kecamatan." (Target Suara : ".$fff->target_suara.")',data: [".$suara0."]},";
			$arrayPie8[] = array(
				'kecamatan' => $fff->nm_desa.$string_persentase,
				'suara' => $suara0
			);
		}
		header('Content-Type: application/json');
		echo json_encode( $arrayPie8 );
	}
	public function chart21(){
		$arrayPie8 = array();
		$urfl5['id_kecamatan'] = $this->uri->segment(3);
		$kategdori_keperluan = $this->Main_model->getSelectedData('desa',$urfl5);
			foreach ($kategdori_keperluan as $key => $fff) {
				$suara01 = 0;
				$url10 = 'https://andro.sitri.online/api/calegtask/allnf/asc';
				$task_caleg10 = $this->Main_model->getAPI($url10);
				foreach ($task_caleg10 as $key => $value) {
					if(stristr($value['Id_Wilayah'],$fff->id_desa)){
						if(stristr($value['Id_Dapil'],'B')){
							$suara01 += $value['Jumlah_M'];
						}
						else{
							echo'';
						}
					} else {
					echo '';
					}
				}
				$url11 = 'https://andro.sitri.online/api/strtask/all/asc';
				$task_str11 = $this->Main_model->getAPI($url11);
				foreach ($task_str11 as $key => $value) {
					if(stristr($value['Id_Wilayah'],$fff->id_desa)){
						if(stristr($value['Id_Dapil'],'B')){
							$suara01 += $value['Jumlah_M'];
						}
						else{
							echo'';
						}
					} else {
					echo '';
					}
				}
				$url12 = 'https://andro.sitri.online/api/strmandiri/allnf/asc';
				$mandiri_str12 = $this->Main_model->getAPI($url12);
				foreach ($mandiri_str12 as $key => $value) {
					if(stristr($value['Id_Wilayah'],$fff->id_desa)){
						if(stristr($value['Id_Dapil'],'B')){
							$suara01 += $value['Jumlah_M'];
						}
						else{
							echo'';
						}
					} else {
					echo '';
					}
				}
				$url13 = 'https://andro.sitri.online/api/calegmandiri/allnf/asc';
				$mandiri_caleg13 = $this->Main_model->getAPI($url13);
				foreach ($mandiri_caleg13 as $key => $value) {
					if(stristr($value['Id_Wilayah'],$fff->id_desa)){
						if(stristr($value['Id_Dapil'],'B')){
							$suara01 += $value['Jumlah_M'];
						}
						else{
							echo'';
						}
					} else {
					echo '';
					}
				}
				//$string_persentase = " (Target Suara : ".$fff->target_suara.")";
				$persen = $suara01/$fff->target_suara*100;
				$string_persentase = " (".number_format($persen,2)." %)";
				//echo "{ name: '".$fff->nm_kecamatan." (Target Suara : ".$fff->target_suara.")',data: [".$suara01."]},";
				$arrayPie8[] = array(
					'kecamatan12' => $fff->nm_desa.$string_persentase,
					'suara12' => $suara01
				);
		}
		header('Content-Type: application/json');
		echo json_encode( $arrayPie8 );
	}
	public function chart22(){
		$arrayPie8 = array();
		$urfl5['id_kecamatan'] = $this->uri->segment(3);
		$kategdori_keperluan = $this->Main_model->getSelectedData('desa',$urfl5);
			foreach ($kategdori_keperluan as $key => $fff) {
				$keg = 0;
				$url7 = 'https://andro.sitri.online/api/calegtask/allnf/asc';
				$task_caleg7 = $this->Main_model->getAPI($url7);
				foreach ($task_caleg7 as $key => $value) {
					if(stristr($value['Id_Wilayah'],$fff->id_desa)){
						if(stristr($value['Id_Dapil'],'C')){
							$keg += count($value['Id_Tasklist']);
						}
						else{
							echo'';
						}
					} else {
					echo '';
					}
				}
				$url8 = 'https://andro.sitri.online/api/strtask/all/asc';
				$task_str8 = $this->Main_model->getAPI($url8);
				foreach ($task_str8 as $key => $value) {
					if(stristr($value['Id_Wilayah'],$fff->id_desa)){
						if(stristr($value['Id_Dapil'],'C')){
							$keg += count($value['Id_Tasklist']);
						}
						else{
							echo'';
						}
					} else {
					echo '';
					}
				}
				$url9 = 'https://andro.sitri.online/api/strmandiri/allnf/asc';
				$mandiri_str9 = $this->Main_model->getAPI($url9);
				foreach ($mandiri_str9 as $key => $value) {
					if(stristr($value['Id_Wilayah'],$fff->id_desa)){
						if(stristr($value['Id_Dapil'],'C')){
							$keg += count($value['Id_TaskMandiri']);
						}
						else{
							echo'';
						}
					} else {
					echo '';
					}
				}
				$url10 = 'https://andro.sitri.online/api/calegmandiri/allnf/asc';
				$mandiri_caleg10 = $this->Main_model->getAPI($url10);
				foreach ($mandiri_caleg10 as $key => $value) {
					if(stristr($value['Id_Wilayah'],$fff->id_desa)){
						if(stristr($value['Id_Dapil'],'C')){
							$keg += count($value['Id_TaskMandiri']);
						}
						else{
							echo'';
						}
					} else {
					echo '';
					}
				}
				//echo "{ name: '".$fff->nm_kecamatan."',data: [".$keg."]},";
				$arrayPie8[] = array(
					'nm_kecamatan' => $fff->nm_desa,
					'kegiatan' => $keg
				);
			}
		header('Content-Type: application/json');
		echo json_encode( $arrayPie8 );
	}
	public function chart23(){
		$arrayPie8 = array();
		$urfl5['id_kecamatan'] = $this->uri->segment(3);
		$kategdori_keperluan = $this->Main_model->getSelectedData('desa',$urfl5);
			foreach ($kategdori_keperluan as $key => $fff) {
				$keg1 = 0;
				$url7 = 'https://andro.sitri.online/api/calegtask/allnf/asc';
				$task_caleg7 = $this->Main_model->getAPI($url7);
				foreach ($task_caleg7 as $key => $value) {
					if(stristr($value['Id_Wilayah'],$fff->id_desa)){
						if(stristr($value['Id_Dapil'],'B')){
							$keg1 += count($value['Id_Tasklist']);
						}
						else{
							echo'';
						}
					} else {
					echo '';
					}
				}
				$url8 = 'https://andro.sitri.online/api/strtask/all/asc';
				$task_str8 = $this->Main_model->getAPI($url8);
				foreach ($task_str8 as $key => $value) {
					if(stristr($value['Id_Wilayah'],$fff->id_desa)){
						if(stristr($value['Id_Dapil'],'B')){
							$keg1 += count($value['Id_Tasklist']);
						}
						else{
							echo'';
						}
					} else {
					echo '';
					}
				}
				$url9 = 'https://andro.sitri.online/api/strmandiri/allnf/asc';
				$mandiri_str9 = $this->Main_model->getAPI($url9);
				foreach ($mandiri_str9 as $key => $value) {
					if(stristr($value['Id_Wilayah'],$fff->id_desa)){
						if(stristr($value['Id_Dapil'],'B')){
							$keg1 += count($value['Id_TaskMandiri']);
						}
						else{
							echo'';
						}
					} else {
					echo '';
					}
				}
				$url10 = 'https://andro.sitri.online/api/calegmandiri/allnf/asc';
				$mandiri_caleg10 = $this->Main_model->getAPI($url10);
				foreach ($mandiri_caleg10 as $key => $value) {
					if(stristr($value['Id_Wilayah'],$fff->id_desa)){
						if(stristr($value['Id_Dapil'],'B')){
							$keg1 += count($value['Id_TaskMandiri']);
						}
						else{
							echo'';
						}
					} else {
					echo '';
					}
				}
				//echo "{ name: '".$fff->nm_kecamatan."',data: [".$keg1."]},";
				$arrayPie8[] = array(
					'nm_kecamatan2' => $fff->nm_desa,
					'kegiatan2' => $keg1
				);
			}
		header('Content-Type: application/json');
		echo json_encode( $arrayPie8 );
	}
	public function chart24(){
		$arrayPie8 = array();
		$urfl5['id_kecamatan'] = $this->uri->segment(3);
		$kategdori_keperluan = $this->Main_model->getSelectedData('desa',$urfl5);
			foreach ($kategdori_keperluan as $key => $fff) {
				$cad = 0;
				$url14 = 'https://andro.sitri.online/api/calegprofiles/allnf/asc';
				$task_caleg14 = $this->Main_model->getAPI($url14);
				foreach ($task_caleg14 as $key => $value) {
					// if(stristr($value['Kecamatan'],$fff->id_kecamatan)){
						if(stristr($value['Id_Dapil'],'C')){
							//$cad += count($value['Id_Caleg']);
							$url1 = 'https://andro.sitri.online/api/calegtask/allnf/asc';
							$task_caleg1 = $this->Main_model->getAPI($url1);
							foreach ($task_caleg1 as $key => $row) {
								if($row['Id_Caleg']==$value['Id_Caleg']){
									if((stristr($row['Id_Wilayah'],$fff->id_desa)) and ($row['Kehadiran_Caleg']=='Hadir')){
										$cad++;
									}
									else{
										echo'';
									}
								}
								else{echo'';}
							}
						}
						else{
							echo'';
						}
					// } else {
					// echo '';
					// }
				}
				//echo "{ name: '".$fff->nm_kecamatan."',data: [".$cad."]},";
				$arrayPie8[] = array(
					'nm_kecamatan3' => $fff->nm_desa,
					'kegiatan3' => $cad
				);
			}
		header('Content-Type: application/json');
		echo json_encode( $arrayPie8 );
	}
	public function chart25(){
		$arrayPie8 = array();
		$urfl5['id_kecamatan'] = $this->uri->segment(3);
		$kategdori_keperluan = $this->Main_model->getSelectedData('desa',$urfl5);
			foreach ($kategdori_keperluan as $key => $fff) {
				$cad1 = 0;
				$url15 = 'https://andro.sitri.online/api/calegprofiles/allnf/asc';
				$task_caleg15 = $this->Main_model->getAPI($url15);
				foreach ($task_caleg15 as $key => $value) {
					// if(stristr($value['Kecamatan'],$fff->id_kecamatan)){
						if(stristr($value['Id_Dapil'],'B')){
							//$cad1 += count($value['Id_Caleg']);
							$url1 = 'https://andro.sitri.online/api/calegtask/allnf/asc';
							$task_caleg1 = $this->Main_model->getAPI($url1);
							foreach ($task_caleg1 as $key => $row) {
								if($row['Id_Caleg']==$value['Id_Caleg']){
									if((stristr($row['Id_Wilayah'],$fff->id_desa)) and ($row['Kehadiran_Caleg']=='Hadir')){
										$cad1++;
									}
									else{
										echo'';
									}
								}
								else{echo'';}
							}
						}
						else{
							echo'';
						}
					// } else {
					// echo '';
					// }
				}
				//echo "{ name: '".$fff->nm_kecamatan."',data: [".$cad1."]},";
				$arrayPie8[] = array(
					'nm_kecamatan4' => $fff->nm_desa,
					'kegiatan4' => $cad1
				);
			}
		header('Content-Type: application/json');
		echo json_encode( $arrayPie8 );
	}
}