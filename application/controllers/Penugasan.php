<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penugasan extends CI_Controller {

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
	public function caleg()
	{
		$data['active'] = 'penugasan';
		$data['sub'] = 'menu21';
		$data['sub2'] = '';
		$url2 = 'https://andro.sitri.online/api/calegprofiles/allnf/asc';
		$data['data_caleg'] = $this->Main_model->getAPI($url2);
		$url3 = 'https://andro.sitri.online/api/calegtask/allnf/asc';
		$data['data_task'] = $this->Main_model->getAPI($url3);
		$url4 = 'https://andro.sitri.online/api/calegmandiri/allnf/asc';
		$data['task_mandiri'] = $this->Main_model->getAPI($url4);
		$this->load->view('template/header',$data);
		$this->load->view('penugasan/caleg',$data);
		$this->load->view('template/footer');
	}
	public function rekap()
	{
		$data['active'] = 'penugasan';
		$data['sub'] = 'menu23';
		$data['sub2'] = '';
		// $url2 = 'https://andro.sitri.online/api/calegprofiles/allnf/asc';
		// $data['data_caleg'] = $this->Main_model->getAPI($url2);
		// $url3 = 'https://andro.sitri.online/api/calegtask/allnf/asc';
		// $data['data_task'] = $this->Main_model->getAPI($url3);
		// $url4 = 'https://andro.sitri.online/api/calegmandiri/allnf/asc';
		// $data['task_mandiri'] = $this->Main_model->getAPI($url4);
		// $url1 = 'https://andro.sitri.online/api/kab/prov/31';
		// $data['data_provinsi'] = $this->Main_model->getAPI($url1);
		// $url5 = 'https://andro.sitri.online/api/dapil/all/asc';
		// $data['data_dapil'] = $this->Main_model->getAPI($url5);
		// $url6 = 'https://andro.sitri.online/api/strprofiles/all/asc';
		// $data['data_relawan'] = $this->Main_model->getAPI($url6);
		// $url7 = 'https://andro.sitri.online/api/calegtask/nama';
		// $data['task_group_by_nama'] = $this->Main_model->getAPI($url7);
		$this->load->view('template/header',$data);
		$this->load->view('penugasan/rekap',$data);
		$this->load->view('template/footer');	
	}
	public function detail_rekap(){
		$data['active'] = 'penugasan';
		$data['sub'] = 'menu23';
		$data['sub2'] = '';
		$penanda = $this->uri->segment(3);
		$index_task = $this->uri->segment(4);
		if($penanda=='1'){
			$url4 = 'https://andro.sitri.online/api/calegtask/nama';
			$task_group_by_nama = $this->Main_model->getAPI($url4);
			//print_r($task_group_by_nama[$index_task]);
			//echo $task_group_by_nama[$index_task]['Nama_Kegiatan'];
			$data['key_kegiatan'] = $task_group_by_nama[$index_task]['Nama_Kegiatan'];
			$url2 = 'https://andro.sitri.online/api/calegprofiles/allnf/asc';
			$data['data_caleg'] = $this->Main_model->getAPI($url2);
			$this->load->view('template/header',$data);
			$this->load->view('penugasan/task_caleg',$data);
			$this->load->view('template/footer');
		}
		else{
			$url4 = 'https://andro.sitri.online/api/strtask/nama';
			$task_group_by_nama = $this->Main_model->getAPI($url4);
			//print_r($task_group_by_nama[$index_task]);
			//echo $task_group_by_nama[$index_task]['Nama_Kegiatan'];
			$data['key_kegiatan'] = $task_group_by_nama[$index_task]['Nama_Kegiatan'];
			$url2 = 'https://andro.sitri.online/api/strprofiles/all/asc';
			$data['data_relawan'] = $this->Main_model->getAPI($url2);
			$this->load->view('template/header',$data);
			$this->load->view('penugasan/task_relawan',$data);
			$this->load->view('template/footer');
		}
	}
	public function tambah_instruksi(){
		$data['active'] = 'penugasan';
		$data['sub'] = 'menu23';
		$data['sub2'] = '';
		$where = array(
			'status' => '1'
		);
		$url6 = 'https://andro.sitri.online/api/strprofiles/all/asc';
		$data['data_relawan'] = $this->Main_model->getAPI($url6);
		//API URL
		$url = 'https://andro.sitri.online/api/kab/prov/31';
		//create a new cURL resource
		$ch = curl_init($url);
		$token = 'authan:'.$this->session->userdata('token');
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
		//return response instead of outputting
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		//execute the POST request
		$tes = curl_exec($ch);
		//close cURL resource
		curl_close($ch);
		$data['data_provinsi'] = json_decode($tes, true);

		$url2 = 'https://andro.sitri.online/api/dapil/all/asc';
		$ch2 = curl_init($url2);
		curl_setopt($ch2, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
		curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
		$tes2 = curl_exec($ch2);
		curl_close($ch2);
		$data['data_dapil'] = json_decode($tes2, true);
		$idkabupaten = '3172';
    	$where_kec['id_kabupaten'] = $idkabupaten;
		$data['data_kabupaten'] = $this->Main_model->getSelectedData('kecamatan',$where_kec);
		$url3 = 'https://andro.sitri.online/api/calegprofiles/allnf/asc';
		$data['data_caleg'] = $this->Main_model->getAPI($url3);
		$this->load->view('template/header',$data);
		$this->load->view('penugasan/tambah_instruksi',$data);
		$this->load->view('template/footer');
	}
	public function simpan_instruksi(){
		$gagal = 0;
		$wilayah = '';
		if(!empty($this->input->post('desa'))){
			$wilayah = $this->input->post('desa');
		}
		elseif(!empty($this->input->post('kecamatan'))){
			$wilayah = $this->input->post('kecamatan');
		}
		elseif(!empty($this->input->post('kabupaten'))){
			$wilayah = $this->input->post('kabupaten');
		}
		else{
			$wilayah = '0';
		}
		$data_isu = '';
		$isu = $this->input->post('isu');
		if($isu != NULL){
			for($i = 0; $i < count($isu); $i++){
				$data_isu .= $isu[$i].';';
			}
		}
		else{
			echo '';
		}
		$data_segmentasi = '';
		$segmentasi = $this->input->post('segmentasi');
		if($segmentasi != NULL){
			for($i = 0; $i < count($segmentasi); $i++){
				$data_segmentasi .= $segmentasi[$i].';';
			}
		}
		else{
			echo '';
		}
		if($this->input->post("radio1")=='semua'){
			$url3 = 'https://andro.sitri.online/api/calegprofiles/allnf/asc';
			$data_caleg = $this->Main_model->getAPI($url3);
			foreach ($data_caleg as $key => $dc) {
				$get_file_foto = '';
				if(!empty($_FILES['foto'])){
					$config = array(
					'upload_path'   => dirname($_SERVER["SCRIPT_FILENAME"]).'/assets/lampiran/',
					'allowed_types' => '*',
					'max_size'      => 8192,
					'overwrite'     => 1,
				);

				$this->load->library('upload', $config);

				$images = array();
				$files = $_FILES['foto'];
				foreach ($files['name'] as $key => $image) {
					$_FILES['images[]']['name']= $files['name'][$key];
					$_FILES['images[]']['type']= $files['type'][$key];
					$_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
					$_FILES['images[]']['error']= $files['error'][$key];
					$_FILES['images[]']['size']= $files['size'][$key];

					$images[] = time();

					$config['file_name'] = time();

					$this->upload->initialize($config);

					if ($this->upload->do_upload('images[]')) {
						$this->upload->data();
						$get_file_foto .= base_url().'assets/lampiran/'.$this->upload->data('file_name').';';
						//echo $get_file_foto;
					}
				}
				}
				$url = 'https://andro.sitri.online/api/calegtask/insert';
				$ch = curl_init($url);
				$token = 'authan:'.$this->session->userdata('token');
				$data = array(
					"Id_Caleg" => $dc['Id_Caleg'],
					"Id_Wilayah" => $wilayah,
					"Id_Dapil" => $this->input->post('dapil'),
					"Nama_Kegiatan" => $this->input->post('nama_kegiatan'),
					"Jenis_Kegiatan" => $this->input->post('jenis_kegiatan'),
					"Deskripsi_Kegiatan" => $this->input->post('deskripsi_kegiatan'),
					"Waktu" => $this->input->post('waktu')."T".$this->input->post('jam').":00.000Z",
					"Waktu_Realisasi" => $this->input->post('waktu')."T".$this->input->post('jam').":00.000Z",
					"Segmentasi" => $data_segmentasi,
					"Isu_Strategis" => $data_isu,
					"Detail_Lokasi" => $this->input->post('detail_lokasi'),
					"Foto" => "",
					"Tokoh_Dikunjungi" => $this->input->post('tokoh_dikunjungi'),
					"Lembaga_Dikunjungi" => $this->input->post('lembaga_dikunjungi'),
					"Jumlah_M" => 0,
					"Jumlah_CM" => 0,
					"Jumlah_O" => 0,
					"Jumlah_T" => 0,
					"Jumlah_BJ" => 0,
					"Attachment" => $get_file_foto,
					"IsDone" => false,
					"Status_Pelaporan" => true,
					"Notes" => ""
				);
				$payload = json_encode($data);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				$result = curl_exec($ch);
				curl_close($ch);
				//print_r($data);
				//echo "<pre>$result</pre>";
				if($result=='true'){
					echo '';
				}
				else{
					$gagal++;
				}
			}
			$url4 = 'https://andro.sitri.online/api/strprofiles/all/asc';
			$data_relawan = $this->Main_model->getAPI($url4);
			foreach ($data_relawan as $key => $dr) {
				$get_file_foto = '';
				if(!empty($_FILES['foto'])){
					$config = array(
					'upload_path'   => dirname($_SERVER["SCRIPT_FILENAME"]).'/assets/lampiran/',
					'allowed_types' => '*',
					'max_size'      => 8192,
					'overwrite'     => 1,
				);

				$this->load->library('upload', $config);

				$images = array();
				$files = $_FILES['foto'];
				foreach ($files['name'] as $key => $image) {
					$_FILES['images[]']['name']= $files['name'][$key];
					$_FILES['images[]']['type']= $files['type'][$key];
					$_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
					$_FILES['images[]']['error']= $files['error'][$key];
					$_FILES['images[]']['size']= $files['size'][$key];

					$images[] = time();

					$config['file_name'] = time();

					$this->upload->initialize($config);

					if ($this->upload->do_upload('images[]')) {
						$this->upload->data();
						$get_file_foto .= base_url().'assets/lampiran/'.$this->upload->data('file_name').';';
						//echo $get_file_foto;
					}
				}
				}
				$url = 'https://andro.sitri.online/api/strtask/insert';
				$ch = curl_init($url);
				$token = 'authan:'.$this->session->userdata('token');
				$data = array(
					"Id_Struktur" => $dr['Id_Struktur'],
					"Id_Wilayah" => $wilayah,
					"Id_Dapil" => $this->input->post('dapil'),
					"Id_Caleg" => '',
					"Nama_Kegiatan" => $this->input->post('nama_kegiatan'),
					"Jenis_Kegiatan" => $this->input->post('jenis_kegiatan'),
					"Deskripsi_Kegiatan" => $this->input->post('deskripsi_kegiatan'),
					"Waktu" => $this->input->post('waktu')."T".$this->input->post('jam').":00.000Z",
					"Waktu_Realisasi" => $this->input->post('waktu')."T".$this->input->post('jam').":00.000Z",
					"Segmentasi" => $data_segmentasi,
					"Isu_Strategis" => $data_isu,
					"Detail_Lokasi" => $this->input->post('detail_lokasi'),
					"Foto" => "",
					"Tokoh_Dikunjungi" => $this->input->post('tokoh_dikunjungi'),
					"Lembaga_Dikunjungi" => $this->input->post('lembaga_dikunjungi'),
					"Kehadiran_Caleg" => '',
					"Jumlah_M" => 0,
					"Jumlah_CM" => 0,
					"Jumlah_O" => 0,
					"Jumlah_T" => 0,
					"Jumlah_BJ" => 0,
					"Attachment" => $get_file_foto,
					"IsDone" => false,
					"StatusPelaporan" => true,
					"Notes" => ""
				);
				$payload = json_encode($data);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				$result = curl_exec($ch);
				curl_close($ch);
				//print_r($data);
				//echo "<pre>$result</pre>";
				if($result=='true'){
					echo '';
				}
				else{
					$gagal++;
				}
			}
		}
		elseif($this->input->post("radio1")=='caleg'){
			if($this->input->post("radio2")=='semua'){
				$url3 = 'https://andro.sitri.online/api/calegprofiles/allnf/asc';
				$data_caleg = $this->Main_model->getAPI($url3);
				foreach ($data_caleg as $key => $dc) {
					$get_file_foto = '';
					if(!empty($_FILES['foto'])){
						$config = array(
						'upload_path'   => dirname($_SERVER["SCRIPT_FILENAME"]).'/assets/lampiran/',
						'allowed_types' => '*',
						'max_size'      => 8192,
						'overwrite'     => 1,
					);

					$this->load->library('upload', $config);

					$images = array();
					$files = $_FILES['foto'];
					foreach ($files['name'] as $key => $image) {
						$_FILES['images[]']['name']= $files['name'][$key];
						$_FILES['images[]']['type']= $files['type'][$key];
						$_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
						$_FILES['images[]']['error']= $files['error'][$key];
						$_FILES['images[]']['size']= $files['size'][$key];

						$images[] = time();

						$config['file_name'] = time();

						$this->upload->initialize($config);

						if ($this->upload->do_upload('images[]')) {
							$this->upload->data();
							$get_file_foto .= base_url().'assets/lampiran/'.$this->upload->data('file_name').';';
							//echo $get_file_foto;
						}
					}
					}
					$url = 'https://andro.sitri.online/api/calegtask/insert';
					$ch = curl_init($url);
					$token = 'authan:'.$this->session->userdata('token');
					$data = array(
						"Id_Caleg" => $dc['Id_Caleg'],
						"Id_Wilayah" => $wilayah,
						"Id_Dapil" => $this->input->post('dapil'),
						"Nama_Kegiatan" => $this->input->post('nama_kegiatan'),
						"Jenis_Kegiatan" => $this->input->post('jenis_kegiatan'),
						"Deskripsi_Kegiatan" => $this->input->post('deskripsi_kegiatan'),
						"Waktu" => $this->input->post('waktu')."T".$this->input->post('jam').":00.000Z",
						"Waktu_Realisasi" => $this->input->post('waktu')."T".$this->input->post('jam').":00.000Z",
						"Segmentasi" => $data_segmentasi,
						"Isu_Strategis" => $data_isu,
						"Detail_Lokasi" => $this->input->post('detail_lokasi'),
						"Foto" => "",
						"Tokoh_Dikunjungi" => $this->input->post('tokoh_dikunjungi'),
						"Lembaga_Dikunjungi" => $this->input->post('lembaga_dikunjungi'),
						"Jumlah_M" => 0,
						"Jumlah_CM" => 0,
						"Jumlah_O" => 0,
						"Jumlah_T" => 0,
						"Jumlah_BJ" => 0,
						"Attachment" => $get_file_foto,
						"IsDone" => false,
						"Status_Pelaporan" => true,
						"Notes" => ""
					);
					$payload = json_encode($data);
					curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
					curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
					$result = curl_exec($ch);
					curl_close($ch);
					//print_r($data);
					//echo "<pre>$result</pre>";
					if($result=='true'){
						echo '';
					}
					else{
						$gagal++;
					}
				}
			}
			elseif($this->input->post("radio2")=='tingkat_pemilihan'){
				$url3 = 'https://andro.sitri.online/api/calegprofiles/allnf/asc';
				$data_caleg = $this->Main_model->getAPI($url3);
				foreach ($data_caleg as $key => $dc) {
					if($dc['Tingkat']==$this->input->post('tingkat_pemilihan')){
						$get_file_foto = '';
						if(!empty($_FILES['foto'])){
							$config = array(
							'upload_path'   => dirname($_SERVER["SCRIPT_FILENAME"]).'/assets/lampiran/',
							'allowed_types' => '*',
							'max_size'      => 8192,
							'overwrite'     => 1,
						);

						$this->load->library('upload', $config);

						$images = array();
						$files = $_FILES['foto'];
						foreach ($files['name'] as $key => $image) {
							$_FILES['images[]']['name']= $files['name'][$key];
							$_FILES['images[]']['type']= $files['type'][$key];
							$_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
							$_FILES['images[]']['error']= $files['error'][$key];
							$_FILES['images[]']['size']= $files['size'][$key];

							$images[] = time();

							$config['file_name'] = time();

							$this->upload->initialize($config);

							if ($this->upload->do_upload('images[]')) {
								$this->upload->data();
								$get_file_foto .= base_url().'assets/lampiran/'.$this->upload->data('file_name').';';
								//echo $get_file_foto;
							}
						}
						}
						$url = 'https://andro.sitri.online/api/calegtask/insert';
						$ch = curl_init($url);
						$token = 'authan:'.$this->session->userdata('token');
						$data = array(
							"Id_Caleg" => $dc['Id_Caleg'],
							"Id_Wilayah" => $wilayah,
							"Id_Dapil" => $this->input->post('dapil'),
							"Nama_Kegiatan" => $this->input->post('nama_kegiatan'),
							"Jenis_Kegiatan" => $this->input->post('jenis_kegiatan'),
							"Deskripsi_Kegiatan" => $this->input->post('deskripsi_kegiatan'),
							"Waktu" => $this->input->post('waktu')."T".$this->input->post('jam').":00.000Z",
							"Waktu_Realisasi" => $this->input->post('waktu')."T".$this->input->post('jam').":00.000Z",
							"Segmentasi" => $data_segmentasi,
							"Isu_Strategis" => $data_isu,
							"Detail_Lokasi" => $this->input->post('detail_lokasi'),
							"Foto" => "",
							"Tokoh_Dikunjungi" => $this->input->post('tokoh_dikunjungi'),
							"Lembaga_Dikunjungi" => $this->input->post('lembaga_dikunjungi'),
							"Jumlah_M" => 0,
							"Jumlah_CM" => 0,
							"Jumlah_O" => 0,
							"Jumlah_T" => 0,
							"Jumlah_BJ" => 0,
							"Attachment" => $get_file_foto,
							"IsDone" => false,
							"Status_Pelaporan" => true,
							"Notes" => ""
						);
						$payload = json_encode($data);
						curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
						curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
						$result = curl_exec($ch);
						curl_close($ch);
						//print_r($data);
						//echo "<pre>$result</pre>";
						if($result=='true'){
							echo '';
						}
						else{
							$gagal++;
						}
					}
					else{echo'';}
				}
			}
			elseif($this->input->post("radio2")=='dapil'){
				$url3 = 'https://andro.sitri.online/api/calegprofiles/allnf/asc';
				$data_caleg = $this->Main_model->getAPI($url3);
				foreach ($data_caleg as $key => $dc) {
					if($dc['Id_Dapil']==$this->input->post('dapil')){
						$get_file_foto = '';
						if(!empty($_FILES['foto'])){
							$config = array(
							'upload_path'   => dirname($_SERVER["SCRIPT_FILENAME"]).'/assets/lampiran/',
							'allowed_types' => '*',
							'max_size'      => 8192,
							'overwrite'     => 1,
						);

						$this->load->library('upload', $config);

						$images = array();
						$files = $_FILES['foto'];
						foreach ($files['name'] as $key => $image) {
							$_FILES['images[]']['name']= $files['name'][$key];
							$_FILES['images[]']['type']= $files['type'][$key];
							$_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
							$_FILES['images[]']['error']= $files['error'][$key];
							$_FILES['images[]']['size']= $files['size'][$key];

							$images[] = time();

							$config['file_name'] = time();

							$this->upload->initialize($config);

							if ($this->upload->do_upload('images[]')) {
								$this->upload->data();
								$get_file_foto .= base_url().'assets/lampiran/'.$this->upload->data('file_name').';';
								//echo $get_file_foto;
							}
						}
						}
						$url = 'https://andro.sitri.online/api/calegtask/insert';
						$ch = curl_init($url);
						$token = 'authan:'.$this->session->userdata('token');
						$data = array(
							"Id_Caleg" => $dc['Id_Caleg'],
							"Id_Wilayah" => $wilayah,
							"Id_Dapil" => $this->input->post('dapil'),
							"Nama_Kegiatan" => $this->input->post('nama_kegiatan'),
							"Jenis_Kegiatan" => $this->input->post('jenis_kegiatan'),
							"Deskripsi_Kegiatan" => $this->input->post('deskripsi_kegiatan'),
							"Waktu" => $this->input->post('waktu')."T".$this->input->post('jam').":00.000Z",
							"Waktu_Realisasi" => $this->input->post('waktu')."T".$this->input->post('jam').":00.000Z",
							"Segmentasi" => $data_segmentasi,
							"Isu_Strategis" => $data_isu,
							"Detail_Lokasi" => $this->input->post('detail_lokasi'),
							"Foto" => "",
							"Tokoh_Dikunjungi" => $this->input->post('tokoh_dikunjungi'),
							"Lembaga_Dikunjungi" => $this->input->post('lembaga_dikunjungi'),
							"Jumlah_M" => 0,
							"Jumlah_CM" => 0,
							"Jumlah_O" => 0,
							"Jumlah_T" => 0,
							"Jumlah_BJ" => 0,
							"Attachment" => $get_file_foto,
							"IsDone" => false,
							"Status_Pelaporan" => true,
							"Notes" => ""
						);
						$payload = json_encode($data);
						curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
						curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
						$result = curl_exec($ch);
						curl_close($ch);
						//print_r($data);
						//echo "<pre>$result</pre>";
						if($result=='true'){
							echo '';
						}
						else{
							$gagal++;
						}
					}
					else{echo'';}
				}
			}
			else{
			for($i = 0; $i < count($this->input->post('caleg')); $i++){
				$get_file_foto = '';
				if(!empty($_FILES['foto'])){
					$config = array(
					'upload_path'   => dirname($_SERVER["SCRIPT_FILENAME"]).'/assets/lampiran/',
					'allowed_types' => '*',
					'max_size'      => 8192,
					'overwrite'     => 1,
				);

				$this->load->library('upload', $config);

				$images = array();
				$files = $_FILES['foto'];
				foreach ($files['name'] as $key => $image) {
					$_FILES['images[]']['name']= $files['name'][$key];
					$_FILES['images[]']['type']= $files['type'][$key];
					$_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
					$_FILES['images[]']['error']= $files['error'][$key];
					$_FILES['images[]']['size']= $files['size'][$key];

					$images[] = time();

					$config['file_name'] = time();

					$this->upload->initialize($config);

					if ($this->upload->do_upload('images[]')) {
						$this->upload->data();
						$get_file_foto .= base_url().'assets/lampiran/'.$this->upload->data('file_name').';';
						//echo $get_file_foto;
					}
				}
				}
				$url = 'https://andro.sitri.online/api/calegtask/insert';
				$ch = curl_init($url);
				$token = 'authan:'.$this->session->userdata('token');
				$data = array(
					"Id_Caleg" => $this->input->post('caleg')[$i],
					"Id_Wilayah" => $wilayah,
					"Id_Dapil" => $this->input->post('dapil'),
					"Nama_Kegiatan" => $this->input->post('nama_kegiatan'),
					"Jenis_Kegiatan" => $this->input->post('jenis_kegiatan'),
					"Deskripsi_Kegiatan" => $this->input->post('deskripsi_kegiatan'),
					"Waktu" => $this->input->post('waktu')."T".$this->input->post('jam').":00.000Z",
					"Waktu_Realisasi" => $this->input->post('waktu')."T".$this->input->post('jam').":00.000Z",
					"Segmentasi" => $data_segmentasi,
					"Isu_Strategis" => $data_isu,
					"Detail_Lokasi" => $this->input->post('detail_lokasi'),
					"Foto" => "",
					"Tokoh_Dikunjungi" => $this->input->post('tokoh_dikunjungi'),
					"Lembaga_Dikunjungi" => $this->input->post('lembaga_dikunjungi'),
					"Jumlah_M" => 0,
					"Jumlah_CM" => 0,
					"Jumlah_O" => 0,
					"Jumlah_T" => 0,
					"Jumlah_BJ" => 0,
					"Attachment" => $get_file_foto,
					"IsDone" => false,
					"Status_Pelaporan" => true,
					"Notes" => ""
				);
				$payload = json_encode($data);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				$result = curl_exec($ch);
				curl_close($ch);
				//print_r($data);
				//echo "<pre>$result</pre>";
				if($result=='true'){
					echo '';
				}
				else{
					$gagal++;
				}
			}}
		}
		else{
			if($this->input->post('radio3')=='semua'){
				$url3 = 'https://andro.sitri.online/api/strprofiles/all/asc';
				$data_relawan = $this->Main_model->getAPI($url3);
				foreach ($data_relawan as $key => $dr) {
					$get_file_foto = '';
					if(!empty($_FILES['foto'])){
						$config = array(
						'upload_path'   => dirname($_SERVER["SCRIPT_FILENAME"]).'/assets/lampiran/',
						'allowed_types' => '*',
						'max_size'      => 8192,
						'overwrite'     => 1,
					);

					$this->load->library('upload', $config);

					$images = array();
					$files = $_FILES['foto'];
					foreach ($files['name'] as $key => $image) {
						$_FILES['images[]']['name']= $files['name'][$key];
						$_FILES['images[]']['type']= $files['type'][$key];
						$_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
						$_FILES['images[]']['error']= $files['error'][$key];
						$_FILES['images[]']['size']= $files['size'][$key];

						$images[] = time();

						$config['file_name'] = time();

						$this->upload->initialize($config);

						if ($this->upload->do_upload('images[]')) {
							$this->upload->data();
							$get_file_foto .= base_url().'assets/lampiran/'.$this->upload->data('file_name').';';
							//echo $get_file_foto;
						}
					}
					}
					$url = 'https://andro.sitri.online/api/strtask/insert';
					$ch = curl_init($url);
					$token = 'authan:'.$this->session->userdata('token');
					$data = array(
						"Id_Struktur" => $dr['Id_Struktur'],
						"Id_Wilayah" => $wilayah,
						"Id_Dapil" => $this->input->post('dapil'),
						"Id_Caleg" => '',
						"Nama_Kegiatan" => $this->input->post('nama_kegiatan'),
						"Jenis_Kegiatan" => $this->input->post('jenis_kegiatan'),
						"Deskripsi_Kegiatan" => $this->input->post('deskripsi_kegiatan'),
						"Waktu" => $this->input->post('waktu')."T".$this->input->post('jam').":00.000Z",
						"Waktu_Realisasi" => $this->input->post('waktu')."T".$this->input->post('jam').":00.000Z",
						"Segmentasi" => $data_segmentasi,
						"Isu_Strategis" => $data_isu,
						"Detail_Lokasi" => $this->input->post('detail_lokasi'),
						"Foto" => "",
						"Tokoh_Dikunjungi" => $this->input->post('tokoh_dikunjungi'),
						"Lembaga_Dikunjungi" => $this->input->post('lembaga_dikunjungi'),
						"Kehadiran_Caleg" => '',
						"Jumlah_M" => 0,
						"Jumlah_CM" => 0,
						"Jumlah_O" => 0,
						"Jumlah_T" => 0,
						"Jumlah_BJ" => 0,
						"Attachment" => $get_file_foto,
						"IsDone" => false,
						"StatusPelaporan" => true,
						"Notes" => ""
					);
					$payload = json_encode($data);
					curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
					curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
					$result = curl_exec($ch);
					curl_close($ch);
					//print_r($data);
					//echo "<pre>$result</pre>";
					if($result=='true'){
						echo '';
					}
					else{
						$gagal++;
					}
				}
			}
			elseif($this->input->post('radio3')=='tingkat_struktur'){
				$url3 = 'https://andro.sitri.online/api/strprofiles/all/asc';
				$data_relawan = $this->Main_model->getAPI($url3);
				foreach ($data_relawan as $key => $dr) {
					if($dr['Tingkat']==$this->input->post('tingkat_relawan')){
						$get_file_foto = '';
						if(!empty($_FILES['foto'])){
							$config = array(
							'upload_path'   => dirname($_SERVER["SCRIPT_FILENAME"]).'/assets/lampiran/',
							'allowed_types' => '*',
							'max_size'      => 8192,
							'overwrite'     => 1,
						);

						$this->load->library('upload', $config);

						$images = array();
						$files = $_FILES['foto'];
						foreach ($files['name'] as $key => $image) {
							$_FILES['images[]']['name']= $files['name'][$key];
							$_FILES['images[]']['type']= $files['type'][$key];
							$_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
							$_FILES['images[]']['error']= $files['error'][$key];
							$_FILES['images[]']['size']= $files['size'][$key];

							$images[] = time();

							$config['file_name'] = time();

							$this->upload->initialize($config);

							if ($this->upload->do_upload('images[]')) {
								$this->upload->data();
								$get_file_foto .= base_url().'assets/lampiran/'.$this->upload->data('file_name').';';
								//echo $get_file_foto;
							}
						}
						}
						$url = 'https://andro.sitri.online/api/strtask/insert';
						$ch = curl_init($url);
						$token = 'authan:'.$this->session->userdata('token');
						$data = array(
							"Id_Struktur" => $dr['Id_Struktur'],
							"Id_Wilayah" => $wilayah,
							"Id_Dapil" => $this->input->post('dapil'),
							"Id_Caleg" => '',
							"Nama_Kegiatan" => $this->input->post('nama_kegiatan'),
							"Jenis_Kegiatan" => $this->input->post('jenis_kegiatan'),
							"Deskripsi_Kegiatan" => $this->input->post('deskripsi_kegiatan'),
							"Waktu" => $this->input->post('waktu')."T".$this->input->post('jam').":00.000Z",
							"Waktu_Realisasi" => $this->input->post('waktu')."T".$this->input->post('jam').":00.000Z",
							"Segmentasi" => $data_segmentasi,
							"Isu_Strategis" => $data_isu,
							"Detail_Lokasi" => $this->input->post('detail_lokasi'),
							"Foto" => "",
							"Tokoh_Dikunjungi" => $this->input->post('tokoh_dikunjungi'),
							"Lembaga_Dikunjungi" => $this->input->post('lembaga_dikunjungi'),
							"Kehadiran_Caleg" => '',
							"Jumlah_M" => 0,
							"Jumlah_CM" => 0,
							"Jumlah_O" => 0,
							"Jumlah_T" => 0,
							"Jumlah_BJ" => 0,
							"Attachment" => $get_file_foto,
							"IsDone" => false,
							"StatusPelaporan" => true,
							"Notes" => ""
						);
						$payload = json_encode($data);
						curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
						curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
						$result = curl_exec($ch);
						curl_close($ch);
						//print_r($data);
						//echo "<pre>$result</pre>";
						if($result=='true'){
							echo '';
						}
						else{
							$gagal++;
						}
					}
					else{
						echo'';
					}
				}
			}
			else{
			for($i = 0; $i < count($this->input->post('relawan')); $i++){
				$get_file_foto = '';
				if(!empty($_FILES['foto'])){
					$config = array(
					'upload_path'   => dirname($_SERVER["SCRIPT_FILENAME"]).'/assets/lampiran/',
					'allowed_types' => '*',
					'max_size'      => 8192,
					'overwrite'     => 1,
				);

				$this->load->library('upload', $config);

				$images = array();
				$files = $_FILES['foto'];
				foreach ($files['name'] as $key => $image) {
					$_FILES['images[]']['name']= $files['name'][$key];
					$_FILES['images[]']['type']= $files['type'][$key];
					$_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
					$_FILES['images[]']['error']= $files['error'][$key];
					$_FILES['images[]']['size']= $files['size'][$key];

					$images[] = time();

					$config['file_name'] = time();

					$this->upload->initialize($config);

					if ($this->upload->do_upload('images[]')) {
						$this->upload->data();
						$get_file_foto .= base_url().'assets/lampiran/'.$this->upload->data('file_name').';';
						//echo $get_file_foto;
					}
				}
				}
				$url = 'https://andro.sitri.online/api/strtask/insert';
				$ch = curl_init($url);
				$token = 'authan:'.$this->session->userdata('token');
				$data = array(
					"Id_Struktur" => $this->input->post('relawan')[$i],
					"Id_Wilayah" => $wilayah,
					"Id_Dapil" => $this->input->post('dapil'),
					"Id_Caleg" => '',
					"Nama_Kegiatan" => $this->input->post('nama_kegiatan'),
					"Jenis_Kegiatan" => $this->input->post('jenis_kegiatan'),
					"Deskripsi_Kegiatan" => $this->input->post('deskripsi_kegiatan'),
					"Waktu" => $this->input->post('waktu')."T".$this->input->post('jam').":00.000Z",
					"Waktu_Realisasi" => $this->input->post('waktu')."T".$this->input->post('jam').":00.000Z",
					"Segmentasi" => $data_segmentasi,
					"Isu_Strategis" => $data_isu,
					"Detail_Lokasi" => $this->input->post('detail_lokasi'),
					"Foto" => "",
					"Tokoh_Dikunjungi" => $this->input->post('tokoh_dikunjungi'),
					"Lembaga_Dikunjungi" => $this->input->post('lembaga_dikunjungi'),
					"Kehadiran_Caleg" => '',
					"Jumlah_M" => 0,
					"Jumlah_CM" => 0,
					"Jumlah_O" => 0,
					"Jumlah_T" => 0,
					"Jumlah_BJ" => 0,
					"Attachment" => $get_file_foto,
					"IsDone" => false,
					"StatusPelaporan" => true,
					"Notes" => ""
				);
				$payload = json_encode($data);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				$result = curl_exec($ch);
				curl_close($ch);
				//print_r($data);
				//echo "<pre>$result</pre>";
				if($result=='true'){
					echo '';
				}
				else{
					$gagal++;
				}
			}}
		}
		if($gagal>0){
			$this->session->set_flashdata('gagal','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>Tambah data penugasan ada yang gagal, pastikan user telah terdaftar dalam device target.<br /></div>' );
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>Data telah berhasil ditambahkan.<br /></div>' );
		}
		echo "<script>window.location='".site_url()."/Penugasan/rekap'</script>";
		//echo $gagal;
	}
	public function tambah_task_caleg(){
		$data['active'] = 'penugasan';
		$data['sub'] = 'menu21';
		$data['sub2'] = '';
		$where = array(
			'status' => '1'
		);
		//API URL
		$url = 'https://andro.sitri.online/api/kab/prov/31';
		//create a new cURL resource
		$ch = curl_init($url);
		$token = 'authan:'.$this->session->userdata('token');
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
		//return response instead of outputting
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		//execute the POST request
		$tes = curl_exec($ch);
		//close cURL resource
		curl_close($ch);
		$data['data_provinsi'] = json_decode($tes, true);

		$url2 = 'https://andro.sitri.online/api/dapil/all/asc';
		$ch2 = curl_init($url2);
		curl_setopt($ch2, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
		curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
		$tes2 = curl_exec($ch2);
		curl_close($ch2);
		$data['data_dapil'] = json_decode($tes2, true);
		$idkabupaten = '3172';
    	$where_kec['id_kabupaten'] = $idkabupaten;
		$data['data_kabupaten'] = $this->Main_model->getSelectedData('kecamatan',$where_kec);
		$url3 = 'https://andro.sitri.online/api/calegprofiles/allnf/asc';
		$data['data_caleg'] = $this->Main_model->getAPI($url3);
		$this->load->view('template/header',$data);
		$this->load->view('penugasan/tambah_task_caleg',$data);
		$this->load->view('template/footer');
	}
	public function simpan_penugasan_caleg(){
		$gagal = 0;
		$wilayah = '';
		if(!empty($this->input->post('desa'))){
			$wilayah = $this->input->post('desa');
		}
		elseif(!empty($this->input->post('kecamatan'))){
			$wilayah = $this->input->post('kecamatan');
		}
		elseif(!empty($this->input->post('kabupaten'))){
			$wilayah = $this->input->post('kabupaten');
		}
		else{
			$wilayah = '0';
		}
		$data_isu = '';
		$isu = $this->input->post('isu');
		if($isu != NULL){
			for($i = 0; $i < count($isu); $i++){
				$data_isu .= $isu[$i].';';
			}
		}
		else{
			echo '';
		}
		$data_segmentasi = '';
		$segmentasi = $this->input->post('segmentasi');
		if($segmentasi != NULL){
			for($i = 0; $i < count($segmentasi); $i++){
				$data_segmentasi .= $segmentasi[$i].';';
			}
		}
		else{
			echo '';
		}
		if($this->input->post("radio2")=='semua'){
			$url3 = 'https://andro.sitri.online/api/calegprofiles/allnf/asc';
			$data_caleg = $this->Main_model->getAPI($url3);
			foreach ($data_caleg as $key => $dc) {
				//API URL
				$get_file_foto = '';
				if(!empty($_FILES['foto'])){
					$config = array(
					'upload_path'   => dirname($_SERVER["SCRIPT_FILENAME"]).'/assets/lampiran/',
					'allowed_types' => '*',
					'max_size'      => 8192,
					'overwrite'     => 1,
				);

				$this->load->library('upload', $config);

				$images = array();
				$files = $_FILES['foto'];
				foreach ($files['name'] as $key => $image) {
					$_FILES['images[]']['name']= $files['name'][$key];
					$_FILES['images[]']['type']= $files['type'][$key];
					$_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
					$_FILES['images[]']['error']= $files['error'][$key];
					$_FILES['images[]']['size']= $files['size'][$key];

					$images[] = time();

					$config['file_name'] = time();

					$this->upload->initialize($config);

					if ($this->upload->do_upload('images[]')) {
						$this->upload->data();
						$get_file_foto .= base_url().'assets/lampiran/'.$this->upload->data('file_name').';';
						//echo $get_file_foto;
					}
				}
				}
				$url = 'https://andro.sitri.online/api/calegtask/insert';
				$ch = curl_init($url);
				$token = 'authan:'.$this->session->userdata('token');
				$data = array(
					"Id_Caleg" => $dc['Id_Caleg'],
					"Id_Wilayah" => $wilayah,
					"Id_Dapil" => $this->input->post('dapil'),
					"Nama_Kegiatan" => $this->input->post('nama_kegiatan'),
					"Jenis_Kegiatan" => $this->input->post('jenis_kegiatan'),
					"Deskripsi_Kegiatan" => $this->input->post('deskripsi_kegiatan'),
					"Waktu" => $this->input->post('waktu')."T".$this->input->post('jam').":00.000Z",
					"Waktu_Realisasi" => $this->input->post('waktu')."T".$this->input->post('jam').":00.000Z",
					"Segmentasi" => $data_segmentasi,
					"Isu_Strategis" => $data_isu,
					"Detail_Lokasi" => $this->input->post('detail_lokasi'),
					"Foto" => "",
					"Tokoh_Dikunjungi" => $this->input->post('tokoh_dikunjungi'),
					"Lembaga_Dikunjungi" => $this->input->post('lembaga_dikunjungi'),
					"Jumlah_M" => 0,
					"Jumlah_CM" => 0,
					"Jumlah_O" => 0,
					"Jumlah_T" => 0,
					"Jumlah_BJ" => 0,
					"Attachment" => $get_file_foto,
					"IsDone" => false,
					"Status_Pelaporan" => true,
					"Notes" => ""
				);
				$payload = json_encode($data);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				$result = curl_exec($ch);
				curl_close($ch);
				//print_r($data);
				//echo "<pre>$result</pre>";
				if($result=='true'){
					echo '';
				}
				else{
					$gagal++;
				}
			}
		}
		else{
		for($i = 0; $i < count($this->input->post('caleg')); $i++){
			$get_file_foto = '';
			if(!empty($_FILES['foto'])){
				$config = array(
				'upload_path'   => dirname($_SERVER["SCRIPT_FILENAME"]).'/assets/lampiran/',
				'allowed_types' => '*',
				'max_size'      => 8192,
				'overwrite'     => 1,
			);

			$this->load->library('upload', $config);

			$images = array();
			$files = $_FILES['foto'];
			foreach ($files['name'] as $key => $image) {
				$_FILES['images[]']['name']= $files['name'][$key];
				$_FILES['images[]']['type']= $files['type'][$key];
				$_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
				$_FILES['images[]']['error']= $files['error'][$key];
				$_FILES['images[]']['size']= $files['size'][$key];

				$images[] = time();

				$config['file_name'] = time();

				$this->upload->initialize($config);

				if ($this->upload->do_upload('images[]')) {
					$this->upload->data();
					$get_file_foto .= base_url().'assets/lampiran/'.$this->upload->data('file_name').';';
					//echo $get_file_foto;
				}
			}
			}
			$url = 'https://andro.sitri.online/api/calegtask/insert';
			$ch = curl_init($url);
			$token = 'authan:'.$this->session->userdata('token');
			$data = array(
				"Id_Caleg" => $this->input->post('caleg')[$i],
				"Id_Wilayah" => $wilayah,
				"Id_Dapil" => $this->input->post('dapil'),
				"Nama_Kegiatan" => $this->input->post('nama_kegiatan'),
				"Jenis_Kegiatan" => $this->input->post('jenis_kegiatan'),
				"Deskripsi_Kegiatan" => $this->input->post('deskripsi_kegiatan'),
				"Waktu" => $this->input->post('waktu')."T".$this->input->post('jam').":00.000Z",
				"Waktu_Realisasi" => $this->input->post('waktu')."T".$this->input->post('jam').":00.000Z",
				"Segmentasi" => $data_segmentasi,
				"Isu_Strategis" => $data_isu,
				"Detail_Lokasi" => $this->input->post('detail_lokasi'),
				"Foto" => "",
				"Tokoh_Dikunjungi" => $this->input->post('tokoh_dikunjungi'),
				"Lembaga_Dikunjungi" => $this->input->post('lembaga_dikunjungi'),
				"Jumlah_M" => 0,
				"Jumlah_CM" => 0,
				"Jumlah_O" => 0,
				"Jumlah_T" => 0,
				"Jumlah_BJ" => 0,
				"Attachment" => $get_file_foto,
				"IsDone" => false,
				"Status_Pelaporan" => true,
				"Notes" => ""
			);
			$payload = json_encode($data);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			$result = curl_exec($ch);
			curl_close($ch);
			//print_r($data);
			//echo "<pre>$result</pre>";
			if($result=='true'){
				echo '';
			}
			else{
				$gagal++;
			}
		}}
		if($gagal>0){
			$this->session->set_flashdata('gagal','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>Tambah data penugasan ada yang gagal, pastikan user telah terdaftar dalam device target.<br /></div>' );
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>Data telah berhasil ditambahkan.<br /></div>' );
		}
		echo "<script>window.location='".site_url()."/Penugasan/caleg'</script>";
		//echo $gagal;
	}
    public function relawan()
	{
		$data['active'] = 'penugasan';
		$data['sub'] = 'menu22';
		$data['sub2'] = '';
		$url2 = 'https://andro.sitri.online/api/strprofiles/all/asc';
		$data['data_relawan'] = $this->Main_model->getAPI($url2);
		$url3 = 'https://andro.sitri.online/api/strtask/all/asc';
		$data['data_task'] = $this->Main_model->getAPI($url3);
		$url4 = 'https://andro.sitri.online/api/strmandiri/allnf/asc';
		$data['task_mandiri'] = $this->Main_model->getAPI($url4);
		$this->load->view('template/header',$data);
		$this->load->view('penugasan/relawan',$data);
		$this->load->view('template/footer');
	}
	public function tambah_task_relawan(){
		$data['active'] = 'penugasan';
		$data['sub'] = 'menu22';
		$data['sub2'] = '';
		$where = array(
			'status' => '1'
		);
		//API URL
		$url = 'https://andro.sitri.online/api/kab/prov/31';
		//create a new cURL resource
		$ch = curl_init($url);
		$token = 'authan:'.$this->session->userdata('token');
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
		//return response instead of outputting
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		//execute the POST request
		$tes = curl_exec($ch);
		//close cURL resource
		curl_close($ch);
		$data['data_provinsi'] = json_decode($tes, true);

		$url2 = 'https://andro.sitri.online/api/dapil/all/asc';
		$ch2 = curl_init($url2);
		curl_setopt($ch2, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
		curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
		$tes2 = curl_exec($ch2);
		curl_close($ch2);
		$data['data_dapil'] = json_decode($tes2, true);
		$where_kec['id_kabupaten'] = '3172';
		$data['data_kabupaten'] = $this->Main_model->getSelectedData('kecamatan',$where_kec);
		$url3 = 'https://andro.sitri.online/api/strprofiles/all/asc';
		$data['data_relawan'] = $this->Main_model->getAPI($url3);
		$this->load->view('template/header',$data);
		$this->load->view('penugasan/tambah_task_relawan',$data);
		$this->load->view('template/footer');
	}
	public function simpan_penugasan_relawan(){
		$gagal = 0;
		$wilayah = '';
		if(!empty($this->input->post('desa'))){
			$wilayah = $this->input->post('desa');
		}
		elseif(!empty($this->input->post('kecamatan'))){
			$wilayah = $this->input->post('kecamatan');
		}
		elseif(!empty($this->input->post('kabupaten'))){
			$wilayah = $this->input->post('kabupaten');
		}
		else{
			$wilayah = '0';
		}
		$data_isu = '';
		$isu = $this->input->post('isu');
		if($isu != NULL){
			for($i = 0; $i < count($isu); $i++){
				$data_isu .= $isu[$i].';';
			}
		}
		else{
			echo '';
		}
		$data_segmentasi = '';
		$segmentasi = $this->input->post('segmentasi');
		if($segmentasi != NULL){
			for($i = 0; $i < count($segmentasi); $i++){
				$data_segmentasi .= $segmentasi[$i].';';
			}
		}
		else{
			echo '';
		}
		if($this->input->post('radio2')=='semua'){
			$url3 = 'https://andro.sitri.online/api/strprofiles/all/asc';
			$data_relawan = $this->Main_model->getAPI($url3);
			foreach ($data_relawan as $key => $dr) {
				$get_file_foto = '';
				if(!empty($_FILES['foto'])){
					$config = array(
					'upload_path'   => dirname($_SERVER["SCRIPT_FILENAME"]).'/assets/lampiran/',
					'allowed_types' => '*',
					'max_size'      => 8192,
					'overwrite'     => 1,
				);

				$this->load->library('upload', $config);

				$images = array();
				$files = $_FILES['foto'];
				foreach ($files['name'] as $key => $image) {
					$_FILES['images[]']['name']= $files['name'][$key];
					$_FILES['images[]']['type']= $files['type'][$key];
					$_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
					$_FILES['images[]']['error']= $files['error'][$key];
					$_FILES['images[]']['size']= $files['size'][$key];

					$images[] = time();

					$config['file_name'] = time();

					$this->upload->initialize($config);

					if ($this->upload->do_upload('images[]')) {
						$this->upload->data();
						$get_file_foto .= base_url().'assets/lampiran/'.$this->upload->data('file_name').';';
						//echo $get_file_foto;
					}
				}
				}
				$url = 'https://andro.sitri.online/api/strtask/insert';
				$ch = curl_init($url);
				$token = 'authan:'.$this->session->userdata('token');
				$data = array(
					"Id_Struktur" => $dr['Id_Struktur'],
					"Id_Wilayah" => $wilayah,
					"Id_Dapil" => $this->input->post('dapil'),
					"Id_Caleg" => '',
					"Nama_Kegiatan" => $this->input->post('nama_kegiatan'),
					"Jenis_Kegiatan" => $this->input->post('jenis_kegiatan'),
					"Deskripsi_Kegiatan" => $this->input->post('deskripsi_kegiatan'),
					"Waktu" => $this->input->post('waktu')."T".$this->input->post('jam').":00.000Z",
					"Waktu_Realisasi" => $this->input->post('waktu')."T".$this->input->post('jam').":00.000Z",
					"Segmentasi" => $data_segmentasi,
					"Isu_Strategis" => $data_isu,
					"Detail_Lokasi" => $this->input->post('detail_lokasi'),
					"Foto" => "",
					"Tokoh_Dikunjungi" => $this->input->post('tokoh_dikunjungi'),
					"Lembaga_Dikunjungi" => $this->input->post('lembaga_dikunjungi'),
					"Kehadiran_Caleg" => '',
					"Jumlah_M" => 0,
					"Jumlah_CM" => 0,
					"Jumlah_O" => 0,
					"Jumlah_T" => 0,
					"Jumlah_BJ" => 0,
					"Attachment" => $get_file_foto,
					"IsDone" => false,
					"StatusPelaporan" => true,
					"Notes" => ""
				);
				$payload = json_encode($data);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				$result = curl_exec($ch);
				curl_close($ch);
				//print_r($data);
				//echo "<pre>$result</pre>";
				if($result=='true'){
					echo '';
				}
				else{
					$gagal++;
				}
			}
		}
		elseif($this->input->post('radio2')=='tingkat'){
			$url3 = 'https://andro.sitri.online/api/strprofiles/all/asc';
			$data_relawan = $this->Main_model->getAPI($url3);
			foreach ($data_relawan as $key => $dr) {
				if($dr['Tingkat']==$this->input->post('tingkat_relawan')){
					$get_file_foto = '';
					if(!empty($_FILES['foto'])){
						$config = array(
						'upload_path'   => dirname($_SERVER["SCRIPT_FILENAME"]).'/assets/lampiran/',
						'allowed_types' => '*',
						'max_size'      => 8192,
						'overwrite'     => 1,
					);

					$this->load->library('upload', $config);

					$images = array();
					$files = $_FILES['foto'];
					foreach ($files['name'] as $key => $image) {
						$_FILES['images[]']['name']= $files['name'][$key];
						$_FILES['images[]']['type']= $files['type'][$key];
						$_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
						$_FILES['images[]']['error']= $files['error'][$key];
						$_FILES['images[]']['size']= $files['size'][$key];

						$images[] = time();

						$config['file_name'] = time();

						$this->upload->initialize($config);

						if ($this->upload->do_upload('images[]')) {
							$this->upload->data();
							$get_file_foto .= base_url().'assets/lampiran/'.$this->upload->data('file_name').';';
							//echo $get_file_foto;
						}
					}
					}
					$url = 'https://andro.sitri.online/api/strtask/insert';
					$ch = curl_init($url);
					$token = 'authan:'.$this->session->userdata('token');
					$data = array(
						"Id_Struktur" => $dr['Id_Struktur'],
						"Id_Wilayah" => $wilayah,
						"Id_Dapil" => $this->input->post('dapil'),
						"Id_Caleg" => '',
						"Nama_Kegiatan" => $this->input->post('nama_kegiatan'),
						"Jenis_Kegiatan" => $this->input->post('jenis_kegiatan'),
						"Deskripsi_Kegiatan" => $this->input->post('deskripsi_kegiatan'),
						"Waktu" => $this->input->post('waktu')."T".$this->input->post('jam').":00.000Z",
						"Waktu_Realisasi" => $this->input->post('waktu')."T".$this->input->post('jam').":00.000Z",
						"Segmentasi" => $data_segmentasi,
						"Isu_Strategis" => $data_isu,
						"Detail_Lokasi" => $this->input->post('detail_lokasi'),
						"Foto" => "",
						"Tokoh_Dikunjungi" => $this->input->post('tokoh_dikunjungi'),
						"Lembaga_Dikunjungi" => $this->input->post('lembaga_dikunjungi'),
						"Kehadiran_Caleg" => '',
						"Jumlah_M" => 0,
						"Jumlah_CM" => 0,
						"Jumlah_O" => 0,
						"Jumlah_T" => 0,
						"Jumlah_BJ" => 0,
						"Attachment" => $get_file_foto,
						"IsDone" => false,
						"StatusPelaporan" => true,
						"Notes" => ""
					);
					$payload = json_encode($data);
					curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
					curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
					$result = curl_exec($ch);
					curl_close($ch);
					//print_r($data);
					//echo "<pre>$result</pre>";
					if($result=='true'){
						echo '';
					}
					else{
						$gagal++;
					}
				}else{echo'';}
			}
		}
		else{
		for($i = 0; $i < count($this->input->post('relawan')); $i++){
			$get_file_foto = '';
			if(!empty($_FILES['foto'])){
				$config = array(
				'upload_path'   => dirname($_SERVER["SCRIPT_FILENAME"]).'/assets/lampiran/',
				'allowed_types' => '*',
				'max_size'      => 8192,
				'overwrite'     => 1,
			);

			$this->load->library('upload', $config);

			$images = array();
			$files = $_FILES['foto'];
			foreach ($files['name'] as $key => $image) {
				$_FILES['images[]']['name']= $files['name'][$key];
				$_FILES['images[]']['type']= $files['type'][$key];
				$_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
				$_FILES['images[]']['error']= $files['error'][$key];
				$_FILES['images[]']['size']= $files['size'][$key];

				$images[] = time();

				$config['file_name'] = time();

				$this->upload->initialize($config);

				if ($this->upload->do_upload('images[]')) {
					$this->upload->data();
					$get_file_foto .= base_url().'assets/lampiran/'.$this->upload->data('file_name').';';
					//echo $get_file_foto;
				}
			}
			}
			$url = 'https://andro.sitri.online/api/strtask/insert';
			$ch = curl_init($url);
			$token = 'authan:'.$this->session->userdata('token');
			$data = array(
				"Id_Struktur" => $this->input->post('relawan')[$i],
				"Id_Wilayah" => $wilayah,
				"Id_Dapil" => $this->input->post('dapil'),
				"Id_Caleg" => '',
				"Nama_Kegiatan" => $this->input->post('nama_kegiatan'),
				"Jenis_Kegiatan" => $this->input->post('jenis_kegiatan'),
				"Deskripsi_Kegiatan" => $this->input->post('deskripsi_kegiatan'),
				"Waktu" => $this->input->post('waktu')."T".$this->input->post('jam').":00.000Z",
				"Waktu_Realisasi" => $this->input->post('waktu')."T".$this->input->post('jam').":00.000Z",
				"Segmentasi" => $data_segmentasi,
				"Isu_Strategis" => $data_isu,
				"Detail_Lokasi" => $this->input->post('detail_lokasi'),
				"Foto" => "",
				"Tokoh_Dikunjungi" => $this->input->post('tokoh_dikunjungi'),
				"Lembaga_Dikunjungi" => $this->input->post('lembaga_dikunjungi'),
				"Kehadiran_Caleg" => '',
				"Jumlah_M" => 0,
				"Jumlah_CM" => 0,
				"Jumlah_O" => 0,
				"Jumlah_T" => 0,
				"Jumlah_BJ" => 0,
				"Attachment" => $get_file_foto,
				"IsDone" => false,
				"StatusPelaporan" => true,
				"Notes" => ""
			);
			$payload = json_encode($data);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			$result = curl_exec($ch);
			curl_close($ch);
			//print_r($data);
			//echo "<pre>$result</pre>";
			if($result=='true'){
				echo '';
			}
			else{
				$gagal++;
			}
		}}
		if($gagal>0){
			$this->session->set_flashdata('gagal','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>Tambah data penugasan ada yang gagal, pastikan user telah terdaftar dalam device target.<br /></div>' );
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>Data telah berhasil ditambahkan.<br /></div>' );
		}
		echo "<script>window.location='".site_url()."/Penugasan/relawan'</script>";
		//echo $gagal;
	}
	public function hapus_task(){
		$where = $this->uri->segment(4);
		$url = '';
		if($this->uri->segment(3)=='1'){
			$url = 'https://andro.sitri.online/api/calegtask/delete?idTask='.$where;
		}
		elseif($this->uri->segment(3)=='2'){
			$url = 'https://andro.sitri.online/api/calegmandiri/delete?idTask='.$where;
		}
		elseif($this->uri->segment(3)=='3'){
			$url = 'https://andro.sitri.online/api/strtask/delete?idTask='.$where;
		}
		else{
			$url = 'https://andro.sitri.online/api/strmandiri/delete?idTask='.$where;
		}
		$tes = $this->Main_model->deleteAPI($url);
		if($this->uri->segment(3)=='1' or $this->uri->segment(3)=='2'){
			if ($tes=='1') {
					$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops... </strong>Data berhasil dihapus!<br /></div>' );
					echo "<script>window.location='".base_url()."Penugasan/caleg'</script>";
            }
			else{
					$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>o o o! </strong>Data gagal dihapus.<br /></div>' );
					echo "<script>window.location='".base_url()."Penugasan/caleg'</script>";
			}
		}
		else{
			if ($tes=='1') {
				$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops... </strong>Data berhasil dihapus!<br /></div>' );
				echo "<script>window.location='".base_url()."Penugasan/relawan'</script>";
			}
			else{
					$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>o o o! </strong>Data gagal dihapus.<br /></div>' );
					echo "<script>window.location='".base_url()."Penugasan/relawan'</script>";
			}
		}
	}
	public function ajax_ubah_data_penugasan(){
		if($this->input->post('status')=='1'){
			$data['id_penugasan'] = $this->input->post('id');
			$url3 = 'https://andro.sitri.online/api/calegtask/allnf/asc';
			$data['data_task'] = $this->Main_model->getAPI($url3);
			$data['status'] = '1';
			$this->load->view('penugasan/ajax_ubah_data_penugasan',$data);
		}
		else{
			$data['id_penugasan'] = $this->input->post('id');
			$url3 = 'https://andro.sitri.online/api/strtask/all/asc';
			$data['data_task'] = $this->Main_model->getAPI($url3);
			$data['status'] = '2';
			$this->load->view('penugasan/ajax_ubah_data_penugasan',$data);
		}
	}
	public function update_penugasan(){
		if($this->input->post('status')=='1'){
			$url = 'https://andro.sitri.online/api/calegtask/update';
			$data3 = array(
				"Id_Tasklist" => $this->input->post('id_tasklist'),
				"Id_Caleg" => $this->input->post('id_caleg'),
				"Id_Wilayah" => $this->input->post('id_wilayah'),
				"Id_Dapil" => $this->input->post('dapil'),
				"Nama_Kegiatan" => $this->input->post('nama_kegiatan'),
				"Jenis_Kegiatan" => $this->input->post('jenis_kegiatan'),
				"Deskripsi_Kegiatan" => $this->input->post('deskripsi_kegiatan'),
				"Waktu" => $this->input->post('waktu')."T".$this->input->post('jam').":00.000Z",
				"Waktu_Realisasi" => $this->input->post('waktu_realisasi'),
				"Segmentasi" => $this->input->post('segmentasi'),
				"Isu_Strategis" => $this->input->post('isu_strategis'),
				"Detail_Lokasi" => $this->input->post('detail_lokasi'),
				"Foto" => $this->input->post('foto'),
				"Tokoh_Dikunjungi" => $this->input->post('tokoh_dikunjungi'),
				"Lembaga_Dikunjungi" => $this->input->post('lembaga_dikunjungi'),
				"Kehadiran_Caleg" => $this->input->post('kehadiran_caleg'),
				"Jumlah_M" => $this->input->post('jumlah_m'),
				"Jumlah_CM" => $this->input->post('jumlah_cm'),
				"Jumlah_O" => $this->input->post('jumlah_o'),
				"Jumlah_T" => $this->input->post('jumlah_t'),
				"Jumlah_BJ" => $this->input->post('jumlah_bj'),
				"Attachment" => $this->input->post('attachment'),
				"IsDone" => $this->input->post('isdone'),
				"Status_Pelaporan" => $this->input->post('status_pelaporan'),
				"Notes" => $this->input->post('notes')
			);
			$result = $this->Main_model->updateAPI($url,$data3);
			$this->session->set_flashdata('sukses','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>Data telah berhasil diubah.<br /></div>' );
			echo "<script>window.location='".site_url()."/Penugasan/caleg'</script>";
		}
		else{
			$url = 'https://andro.sitri.online/api/strtask/update';
			$data3 = array(
				"Id_Tasklist" => $this->input->post('id_tasklist'),
				"Id_Struktur" => $this->input->post('Id_Struktur'),
				"Id_Wilayah" => $this->input->post('id_wilayah'),
				"Id_Dapil" => $this->input->post('dapil'),
				"Id_Caleg" => $this->input->post('id_caleg'),
				"Nama_Kegiatan" => $this->input->post('nama_kegiatan'),
				"Jenis_Kegiatan" => $this->input->post('jenis_kegiatan'),
				"Deskripsi_Kegiatan" => $this->input->post('deskripsi_kegiatan'),
				"Waktu" => $this->input->post('waktu')."T".$this->input->post('jam').":00.000Z",
				"Waktu_Realisasi" => $this->input->post('waktu_realisasi'),
				"Segmentasi" => $this->input->post('segmentasi'),
				"Isu_Strategis" => $this->input->post('isu_strategis'),
				"Detail_Lokasi" => $this->input->post('detail_lokasi'),
				"Foto" => $this->input->post('foto'),
				"Tokoh_Dikunjungi" => $this->input->post('tokoh_dikunjungi'),
				"Lembaga_Dikunjungi" => $this->input->post('lembaga_dikunjungi'),
				"Kehadiran_Caleg" => $this->input->post('kehadiran_caleg'),
				"Jumlah_M" => $this->input->post('jumlah_m'),
				"Jumlah_CM" => $this->input->post('jumlah_cm'),
				"Jumlah_O" => $this->input->post('jumlah_o'),
				"Jumlah_T" => $this->input->post('jumlah_t'),
				"Jumlah_BJ" => $this->input->post('jumlah_bj'),
				"Attachment" => $this->input->post('attachment'),
				"IsDone" => $this->input->post('isdone'),
				"Status_Pelaporan" => $this->input->post('status_pelaporan'),
				"Notes" => $this->input->post('notes')
			);
			$result = $this->Main_model->updateAPI($url,$data3);
			$this->session->set_flashdata('sukses','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>Data telah berhasil diubah.<br /></div>' );
			echo "<script>window.location='".site_url()."/Penugasan/relawan'</script>";
		}
	}
	public function download_lampiran(){
		$url3 = 'https://andro.sitri.online/api/calegtask/allnf/asc';
		$data_task = $this->Main_model->getAPI($url3);
		foreach ($data_task as $key => $value) {
			if($value['Id_Tasklist']==$this->uri->segment(3)){
				$nama = explode('/',$value['Attachment']);
				force_download($nama[5],$value['Attachment']);
			}
			else{
				echo '';
			}
		}
		
	}
	public function download_lampiran2(){
		$url3 = 'https://andro.sitri.online/api/calegmandiri/allnf/asc';
		$data_task = $this->Main_model->getAPI($url3);
		foreach ($data_task as $key => $value) {
			if($value['Id_TaskMandiri']==$this->uri->segment(3)){
				$nama = explode('/',$value['Attachment']);
				force_download($nama[5],$value['Attachment']);
			}
			else{
				echo '';
			}
		}
		
	}
	public function tes_array(){
		$fid_sarpras = $this->input->post('isu');
			if($fid_sarpras != NULL){
				$penampung = '';
				for($i = 0; $i < count($fid_sarpras); $i++){
					$penampung .= $fid_sarpras[$i].';';
				}
				echo $penampung;
            }
	        else{
	        	echo '';
			}
	}
	public function multiple(){
		$get_file_foto = '';
		if(!empty($_FILES['foto'])){
        	$config = array(
            'upload_path'   => dirname($_SERVER["SCRIPT_FILENAME"]).'/assets/lampiran/',
            'allowed_types' => '*',
            'max_size'      => 8192,
            'overwrite'     => 1,
        );

        $this->load->library('upload', $config);

        $images = array();
        $files = $_FILES['foto'];
        foreach ($files['name'] as $key => $image) {
            $_FILES['images[]']['name']= $files['name'][$key];
            $_FILES['images[]']['type']= $files['type'][$key];
            $_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
            $_FILES['images[]']['error']= $files['error'][$key];
            $_FILES['images[]']['size']= $files['size'][$key];

            $images[] = time();

            $config['file_name'] = time();

            $this->upload->initialize($config);

            if ($this->upload->do_upload('images[]')) {
                $this->upload->data();
                $get_file_foto .= base_url().'assets/lampiran/'.$this->upload->data('file_name').';';
				//echo $get_file_foto;
			}
        }
		}
		echo $get_file_foto;
	}
	public function cetak_rekap_kegiatan(){
		$data['active'] = 'penugasan';
		$data['sub'] = 'menu23';
		$data['sub2'] = '';
		//$this->load->view('template/header',$data);
		$this->load->view('penugasan/cetak_rekap_kegiatan',$data);
		//$this->load->view('template/footer');
	}
}