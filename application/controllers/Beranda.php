<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

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
		$data['active'] = 'beranda';
		$data['sub'] = 'menu01';
		$data['sub2'] = '';

        $idkabupaten = '3172';
    	$where['id_kabupaten'] = $idkabupaten;
    	//$where2['id_wilayah'] = $this->uri->segment(3);
		$data_kabupaten = $this->Main_model->getSelectedData('kabupaten',$where);
		$kml = '';
		$wilayah = '';
		$dapildpr = '';
		foreach ($data_kabupaten as $key => $value) {
			$kml = $value->kml;
			$wilayah = $value->nm_kabupaten;
			$dapildpr = $value->dapildpr;
		}
		$url3 = 'https://andro.sitri.online/api/kab/prov/31';
		$ch3 = curl_init($url3);
		$token = 'authan:'.$this->session->userdata('token');
		curl_setopt($ch3, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
		curl_setopt($ch3, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch3, CURLOPT_SSL_VERIFYPEER, false);
		$tes3 = curl_exec($ch3);
		curl_close($ch3);
		$data['data_provinsi'] = json_decode($tes3, true);

		$url2 = 'https://andro.sitri.online/api/dapil/all/asc';
		$ch2 = curl_init($url2);
		curl_setopt($ch2, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
		curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
		$tes2 = curl_exec($ch2);
		curl_close($ch2);
		$data['data_dapil'] = json_decode($tes2, true);
		//API URL
		$url = 'http://apikppn.com/api/relawan/all/asc';
		//create a new cURL resource
		$ch = curl_init($url);
		$token = 'authan:'.$this->session->userdata('token');
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
		//return response instead of outputting
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		//execute the POST request
		$tes = curl_exec($ch);
		//close cURL resource
		
		$data['data_relawan'] = json_decode($tes, true);
		$where2['id_dapil'] = $dapildpr;
		$data['wilayah'] = $wilayah;
		$data['kml'] = $kml;
		//$data['daerah'] = $this->Dashboard_model->getDataDaerah($dapildpr);
		$data['dapildpr'] = $this->Main_model->getSelectedData('dapildpr',$where2);
		//$data['caleg'] = $this->Caleg_model->get_detailcaleg($dapildpr);
		$data['data_marker'] = $this->Main_model->getSelectedData('kecamatan',$where);
		//$data['data_demografi'] = $this->Dashboard_model->demografi_perkecamatan($idkabupaten);
		//$data['data_pilpres'] = $this->Dashboard_model->pilpres_perkecamatan($idkabupaten);
		//$pilihan = $this->input->post('pilihan_kecamatan');
		$this->load->view('template/header',$data);
		//if($pilihan==NULL){
			$this->load->view('dashboard/beranda',$data);
		// }
		// else{
		// 	$data['nilaii'] = $pilihan;
		// 	$this->load->view('dashboard/beranda2',$data);
		// }
		$this->load->view('template/footer');
	}
	public function data_kecamatan()
	{
		$data['active'] = 'beranda';
		$data['sub'] = 'menu03';
		$data['sub2'] = '';
		$pilihan = $this->input->post('pilihan_kecamatan');
		$this->load->view('template/header',$data);
		if($pilihan==NULL){
			$this->load->view('dashboard/data_kecamatan',$data);
		}
		else{
			$data['nilaii'] = $pilihan;
			$this->load->view('dashboard/beranda2',$data);
		}
		$this->load->view('template/footer');
    }
	public function peta_pemenangan()
	{
		$data['active'] = 'beranda';
		$data['sub'] = 'menu02';
		$data['sub2'] = '';

        $idkabupaten = '3172';
    	$where['id_kabupaten'] = $idkabupaten;
    	//$where2['id_wilayah'] = $this->uri->segment(3);
		$data_kabupaten = $this->Main_model->getSelectedData('kabupaten',$where);
		$kml = '';
		$wilayah = '';
		$dapildpr = '';
		foreach ($data_kabupaten as $key => $value) {
			$kml = $value->kml;
			$wilayah = $value->nm_kabupaten;
			$dapildpr = $value->dapildpr;
		}
		//API URL
		$url = 'http://apikppn.com/api/relawan/all/asc';
		//create a new cURL resource
		$ch = curl_init($url);
		$token = 'authan:'.$this->session->userdata('token');
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
		//return response instead of outputting
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		//execute the POST request
		$tes = curl_exec($ch);
		//close cURL resource
		
		$data['data_relawan'] = json_decode($tes, true);
		$where2['id_dapil'] = $dapildpr;
		$data['wilayah'] = $wilayah;
		$data['kml'] = $kml;
		//$data['daerah'] = $this->Dashboard_model->getDataDaerah($dapildpr);
		$data['dapildpr'] = $this->Main_model->getSelectedData('dapildpr',$where2);
		//$data['caleg'] = $this->Caleg_model->get_detailcaleg($dapildpr);
		$data['data_marker'] = $this->Main_model->getSelectedData('kecamatan',$where);
		//$data['data_demografi'] = $this->Dashboard_model->demografi_perkecamatan($idkabupaten);
		//$data['data_pilpres'] = $this->Dashboard_model->pilpres_perkecamatan($idkabupaten);
		$this->load->view('template/header',$data);
		$this->load->view('dashboard/peta_pemenangan',$data);
		$this->load->view('template/footer');
	}
	public function peta_kec()
	{
		$data['active'] = 'beranda';
		$data['sub'] = 'menu02';
		$data['sub2'] = '';

        $idkec = $this->uri->segment(3);
    	$where['id_kecamatan'] = $idkec;
    	//$where2['id_wilayah'] = $this->uri->segment(3);
		$datakec = $this->Main_model->getSelectedData('kecamatan',$where);
		$kml = '';
		$wilayah = '';
		//$dapildpr = '';
		foreach ($datakec as $key => $value) {
			$kml = $value->kml;
			$wilayah = $value->nm_kecamatan;
			//$dapildpr = $value->dapildpr;
		}
		//API URL
		$url = 'http://apikppn.com/api/relawan/all/asc';
		//create a new cURL resource
		$ch = curl_init($url);
		$token = 'authan:'.$this->session->userdata('token');
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
		//return response instead of outputting
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		//execute the POST request
		$tes = curl_exec($ch);
		//close cURL resource
		
		$data['data_relawan'] = json_decode($tes, true);
		//$where2['id_dapil'] = $dapildpr;
		$data['wilayah'] = $wilayah;
		$data['kml'] = $kml;
		$data['id_kecamatan'] = $idkec;
		//$data['daerah'] = $this->Dashboard_model->getDataDaerah($dapildpr);
		//$data['dapildpr'] = $this->Main_model->getSelectedData('dapildpr',$where2);
		//$data['caleg'] = $this->Caleg_model->get_detailcaleg($dapildpr);
		$data['data_marker'] = $this->Main_model->getSelectedData('desa',$where);
		//$data['data_demografi'] = $this->Dashboard_model->demografi_perkecamatan($idkabupaten);
		//$data['data_pilpres'] = $this->Dashboard_model->pilpres_perkecamatan($idkabupaten);
		$this->load->view('template/header',$data);
		$this->load->view('dashboard/peta_kecamatan',$data);
		$this->load->view('template/footer');
	}
	public function ajax_jumlah_kegiatan(){
		$ur21 = 'https://andro.sitri.online/api/rw/desa/'.$this->input->post('id');
		$data['rw'] = $this->Main_model->getAPI($ur21);
		$this->load->view('dashboard/ajax_jumlah_kegiatan',$data);
	}
	public function ajax_suara_memilih(){
		$ur21 = 'https://andro.sitri.online/api/rw/desa/'.$this->input->post('id');
		$data['rw'] = $this->Main_model->getAPI($ur21);
		$this->load->view('dashboard/ajax_suara_memilih',$data);
	}
	public function ajax_persentase_suara_memilih(){
		$ur21 = 'https://andro.sitri.online/api/rw/desa/'.$this->input->post('id');
		$data['rw'] = $this->Main_model->getAPI($ur21);
		$this->load->view('dashboard/ajax_persentase_suara_memilih',$data);
	}
	public function ajax_tokoh(){
		$ur21 = 'https://andro.sitri.online/api/counttokoh/wilayah/'.$this->input->post('id');
		$data['rw'] = $this->Main_model->getAPI($ur21);
		$this->load->view('dashboard/ajax_tokoh',$data);
	}
	public function ajax_segmentasi(){
		$ur21 = 'https://andro.sitri.online/api/calegtask/countsegmenwilayah/'.$this->input->post('id');
		$data['rw'] = $this->Main_model->getAPI($ur21);
		$this->load->view('dashboard/ajax_segmentasi',$data);
	}
	public function ajax_peta(){
		$url2 = 'https://andro.sitri.online/api/calegtask/calegwilayah/'.$this->input->post('id');
		$data['data_task'] = $this->Main_model->getAPI($url2);
		$url3 = 'https://andro.sitri.online/api/kec/id/'.$this->input->post('id');
		$data['data_kec'] = $this->Main_model->getAPI($url3);
		// if($data["Message"]=='Task not found'){
		// 	echo '<div style="text-align: center;">
		// 			<p id="dynamic_pager_content2" class="well"> BELUM ADA DATA YANG TERSEDIA </p>
		// 		</div>';
		// 	echo 
		// }
		// else{
		$data['id_kec'] = $this->input->post('id');
		$this->load->view('dashboard/ajax_peta',$data);
		//$data_d['data_task'] = $data;
		//$this->load->view('laporan/ajax_tabel',$data_d);}
	}
	public function ajax_peta2(){
		$url2 = 'https://andro.sitri.online/api/calegtask/calegwilayah/'.$this->input->post('id');
		$data['data_task'] = $this->Main_model->getAPI($url2);
		$url3 = 'https://andro.sitri.online/api/desa/id/'.$this->input->post('id');
		$data['data_kel'] = $this->Main_model->getAPI($url3);
		// if($data["Message"]=='Task not found'){
		// 	echo '<div style="text-align: center;">
		// 			<p id="dynamic_pager_content2" class="well"> BELUM ADA DATA YANG TERSEDIA </p>
		// 		</div>';
		// 	echo 
		// }
		// else{
		$data['id_kel'] = $this->input->post('id');
		$this->load->view('dashboard/ajax_peta2',$data);
		//$this->load->view('dashboard/data_kec',$data);
		//$data_d['data_task'] = $data;
		//$this->load->view('laporan/ajax_tabel',$data_d);}
	}
	public function cetak_dokumen(){
		$PHPWord = $this->word; // New Word Document
        $section = $PHPWord->createSection(); // New portrait section
        // Add text elements
        $section->addText('Hello World!');
        $section->addTextBreak(2);
        $section->addText('Mohammad Rifqi Sucahyo.', array('name'=>'Verdana', 'color'=>'006699'));
        $section->addTextBreak(2);
        $PHPWord->addFontStyle('rStyle', array('bold'=>true, 'italic'=>true, 'size'=>16));
        $PHPWord->addParagraphStyle('pStyle', array('align'=>'center', 'spaceAfter'=>100));
        // Save File / Download (Download dialog, prompt user to save or simply open it)
		$section->addText('Ini Adalah Demo PHPWord untuk CI', 'rStyle', 'pStyle');
		
        $filename='just_some_random_name.docx'; //save our document as this file name
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'); //mime type
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
        $objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
        $objWriter->save('php://output');
	}
	public function filter_laporan(){
        $value = $this->input->post('id');
        $modul = $this->input->post('modul');
        if($modul=='tingkat_pemilihan'){
			$url4 = 'https://andro.sitri.online/api/calegprofiles/resumeall/'.$value;
			$data_d['data_task'] = $this->Main_model->getAPI($url4);
			$data_d['nilai'] = $value;
			$this->load->view('dashboard/ajax_dashboard',$data_d);
	    }
	    elseif($modul=='dapil'){
			$data_d['nilai'] = $value;
			$url4 = 'https://andro.sitri.online/api/calegprofiles/resumeall/'.$value;
			$data_d['data_task'] = $this->Main_model->getAPI($url4);
			$data_d['jenis'] = 'dapil';
			$this->load->view('dashboard/ajax_dashboard_dapil',$data_d);
		}
		elseif($modul=='laporanperkecamatan'){
			//$data_d['nilai'] = $value;
			$this->load->view('dashboard/chart_d');
			//echo $value;
	    }
	    elseif($modul=='kecamatan'){
			$data_d['nilai'] = $value;
			$url2 = 'https://andro.sitri.online/api/calegtask/calegwilayah/'.$this->input->post('id');
			$data = $this->Main_model->getAPI($url2);
			$data_d['data_task'] = $data;
			$data_d['jenis'] = 'kecamatan';
			$this->load->view('dashboard/ajax_dashboard_wilayah',$data_d);
		}
		elseif($modul=='tingkat_struktur'){
			echo '
			<table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
				<thead>
					<tr>
						<th width="3%">
							<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
								<input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
								<span></span>
							</label>
						</th>
						<th style="text-align: center;" width="4%"> # </th>
						<th style="text-align: center;"> Nama Struktur </th>
						<th style="text-align: center;"> Jumlah Instruksi </th>
						<th style="text-align: center;"> Jumlah Kegiatan </th>
						<th style="text-align: center;"> Target Pemilih </th>
						<th style="text-align: center;"> Jumlah Pemilih </th>
						<th style="text-align: center;"> Coverage </th>
						<th style="text-align: center;" width="8%"> Aksi </th>
					</tr>
				</thead>
				<tbody>
					<tr class="odd gradeX">
						<td>
							<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
								<input type="checkbox" class="checkboxes" name="selected_id[]" value="#"/>
								<span></span>
							</label>
						</td>
						<td style="text-align: center;">1.</td>
						<td style="text-align: center;">DPC</td>
						<td style="text-align: center;">12 Instruksi</td>
						<td style="text-align: center;">23 Kegiatan</td>
						<td style="text-align: center;">2,890 Orang</td>
						<td style="text-align: center;">2,690 Orang</td>
						<td style="text-align: center;">93 %</td>
						<td>
							
							<div class="btn-group">
								<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Aksi
									<i class="fa fa-angle-down"></i>
								</button>
								<ul class="dropdown-menu" role="menu">
									<li>
										<a data-toggle="modal" href="#detail_data">
											<i class="icon-eye"></i> Detail Data </a>
									</li>
									<li>
										<a href="#">
											<i class="icon-wrench"></i> Ubah Data </a>
									</li>
									<li>
										<a href="#">
											<i class="icon-trash"></i> Hapus Data </a>
									</li>
								</ul>
							</div>
							
						</td>
					</tr>
					<tr class="odd gradeX">
						<td>
							<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
								<input type="checkbox" class="checkboxes" name="selected_id[]" value="#"/>
								<span></span>
							</label>
						</td>
						<td style="text-align: center;">2.</td>
						<td style="text-align: center;">DPC</td>
						<td style="text-align: center;">3 Instruksi</td>
						<td style="text-align: center;">10 Kegiatan</td>
						<td style="text-align: center;">970 Orang</td>
						<td style="text-align: center;">940 Orang</td>
						<td style="text-align: center;">96 %</td>
						<td>
							
							<div class="btn-group">
								<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Aksi
									<i class="fa fa-angle-down"></i>
								</button>
								<ul class="dropdown-menu" role="menu">
									<li>
										<a data-toggle="modal" href="#detail_data">
											<i class="icon-eye"></i> Detail Data </a>
									</li>
									<li>
										<a href="#">
											<i class="icon-wrench"></i> Ubah Data </a>
									</li>
									<li>
										<a href="#">
											<i class="icon-trash"></i> Hapus Data </a>
									</li>
								</ul>
							</div>
							
						</td>
					</tr>
				</tbody>
			</table>
			';
		}
		elseif($modul=='listkecamatan'){
            //API URL
			$url = 'https://andro.sitri.online/api/kec/kab/'.$value;
			//create a new cURL resource
			$ch = curl_init($url);
			$token = 'authan:'.$this->session->userdata('token');
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
			//return response instead of outputting
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			//execute the POST request
			$tes = curl_exec($ch);
			//close cURL resource
			curl_close($ch);
			$data = json_decode($tes, true);
				echo "<option value=''>-- Pilih --</option>";
			foreach ($data as $value1) {
				echo"<option value='".$value1['Id_Kecamatan']."'>".$value1['Nama_Kecamatan']."</option>";                                              
            }                                               
		}
		elseif ($modul=='pilihandapil') {
			if($value=='DPRRI'){
				$url4 = 'https://andro.sitri.online/api/dapil/all/C';
				$data_d = $this->Main_model->getAPI($url4);
				foreach ($data_d as $value1) {
					$cek = 'DKI';
					if(stristr($value1['Nama_Dapil'],$cek)){
						echo"<option value='".$value1['Id_Dapil']."'>".$value1['Nama_Dapil']."</option>";
					}
					else{
						echo '';
					}
				}
			}
			else{
				$url4 = 'https://andro.sitri.online/api/dapil/all/B';
				$data_d = $this->Main_model->getAPI($url4);
				foreach ($data_d as $value1) {
					$cek = 'DKI';
					if(stristr($value1['Nama_Dapil'],$cek)){
						echo"<option value='".$value1['Id_Dapil']."'>".$value1['Nama_Dapil']."</option>";
					}
					else{
						echo '';
					}
				}
			}
	    }
        else{
            echo "masukan tidak valid";
        }
    }
	public function tes_string(){
		$a = 'fsd';
		//echo substr($a,0,1);
		$arr = [1,4,6,7,3,5,9,8];
		$max = max($arr);
		//echo $max;
		$url2 = 'https://andro.sitri.online/api/calegtask/countisuall/asc/';
		$dataj = $this->Main_model->getAPI($url2);
		$tmp = 0;
		$str = '';
		foreach ($dataj as $d) {
			if ($d['Jumlah'] >= $tmp) {
			$tmp = $d['Jumlah'];
			$str = $d['Isu'];
			}
			else{
				echo '';
			}
			//echo $d['Isu'];
		}
		echo $tmp;
		echo $str;
		// $maxx = max($data_a);
		// echo $maxx;
	}
	public function tes_array(){
		$arrayPie = array();
						$url5 = 'https://andro.sitri.online/api/calegtask/countsegmenall/asc';
						$kategori_keperluan = $this->Main_model->getAPI($url5);
						$url6 = 'https://andro.sitri.online/api/strtask/countsegmenall/asc';
						$strtask_segmen = $this->Main_model->getAPI($url6);
						$combine = array_combine($kategori_keperluan,$strtask_segmen);
						foreach ($combine as $key => $row) {
							$arrayPie[] =  "["."'".$row['Segmentasi']."'".",".$row['Jumlah']."]";
						}
						print_r($arrayPie[0]);
	}
	public function tes_ajax(){
		$urlxx = 'https://andro.sitri.online/api/rw/all/asc';
		$queryrw = $this->Main_model->getAPI($urlxx);
		//return $queryrw;
		header('Content-Type: application/json');
   	 	echo json_encode( $queryrw );
	}
}