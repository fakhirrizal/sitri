<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usulan extends CI_Controller {

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
		$data['active'] = 'usulan';
		$data['sub'] = '';
		$data['sub2'] = '';
		$where = array(
			'status' => '1'
		);
		$url4 = 'https://andro.sitri.online/api/usulancaleg/allnew/asc';
		$data['usulan_caleg'] = $this->Main_model->getAPI($url4);
		$url5 = 'https://andro.sitri.online/api/strusulan/allnew/asc';
		$data['usulan_relawan'] = $this->Main_model->getAPI($url5);
		// $url6 = 'https://andro.sitri.online/api/strprofiles/all/asc';
		// $data['data_relawan'] = $this->Main_model->getAPI($url6);
		// $url7 = 'https://andro.sitri.online/api/calegprofiles/allnf/asc';
		// $data['data_caleg'] = $this->Main_model->getAPI($url7);
		$this->load->view('template/header',$data);
		$this->load->view('usulan/list_usulan',$data);
		$this->load->view('template/footer');
	}
	public function hapus_usulan(){
		$where = $this->uri->segment(4);
		$url = '';
		if($this->uri->segment(3)=='1'){
			$url = 'https://andro.sitri.online/api/usulancaleg/delete?idTask='.$where;
		}
		else{
			$url = 'https://andro.sitri.online/api/strusulan/delete?idTask='.$where;
		}
		$tes = $this->Main_model->deleteAPI($url);
		if ($tes=='1') {
                $this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops... </strong>Data berhasil dihapus!<br /></div>' );
                echo "<script>window.location='".base_url()."Usulan'</script>";
                }
        else{
                $this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>o o o! </strong>Data gagal dihapus.<br /></div>' );
                echo "<script>window.location='".base_url()."Usulan'</script>";
            }
	}
	public function approval(){
		$id = $this->uri->segment(3);
		$aktor = $this->uri->segment(4);
		$keputusan = $this->uri->segment(5);
		$result = '';
		if($aktor=='1'){
			$url4 = 'https://andro.sitri.online/api/usulancaleg/all/asc';
			$data_task = $this->Main_model->getAPI($url4);
			foreach($data_task as $key => $value){
				if($value['Id_CalegUsulan']==$id){
					if($keputusan=='1'){
						//API URL
						$url = 'https://andro.sitri.online/api/usulancaleg/update';
						$data = array(
							"Id_CalegUsulan"=> $id,
							"Id_Caleg"=> $value['Id_Caleg'],
							"Id_Wilayah"=> $value['Id_Wilayah'],
							"Id_Dapil"=> $value['Id_Dapil'],
							"Nama_Kegiatan"=> $value['Nama_Kegiatan'],
							"Jenis_Kegiatan"=> $value['Jenis_Kegiatan'],
							"Deskripsi_Kegiatan"=> $value['Deskripsi_Kegiatan'],
							"Waktu"=> $value['Waktu'],
							"Segmentasi"=> $value['Segmentasi'],
							"Isu_Strategis"=> $value['Isu_Strategis'],
							"Tokoh_Dikunjungi"=> $value['Tokoh_Dikunjungi'],
							"Lembaga_Dikunjungi"=> $value['Lembaga_Dikunjungi'],
							"Target_Peserta"=> $value['Target_Peserta'],
							"Status"=> "APPROVE"
						);
						$result = $this->Main_model->updateAPI($url,$data);

						$url_insert = 'https://andro.sitri.online/api/calegtask/insert';
						$data_insert = array(
							"Id_Caleg"=> $value['Id_Caleg'],
							"Id_Wilayah"=> $value['Id_Wilayah'],
							"Id_Dapil"=> $value['Id_Dapil'],
							"Nama_Kegiatan"=> $value['Nama_Kegiatan'],
							"Jenis_Kegiatan"=> $value['Jenis_Kegiatan'],
							"Deskripsi_Kegiatan"=> $value['Deskripsi_Kegiatan'],
							"Waktu"=> $value['Waktu'],
							"Waktu_Realisasi" => $value['Waktu'],
							"Segmentasi"=> $value['Segmentasi'],
							"Isu_Strategis"=> $value['Isu_Strategis'],
							"Detail_Lokasi" => '',
							"Foto" => "",
							"Tokoh_Dikunjungi"=> $value['Tokoh_Dikunjungi'],
							"Lembaga_Dikunjungi"=> $value['Lembaga_Dikunjungi'],
							"Jumlah_M" => 0,
							"Jumlah_CM" => 0,
							"Jumlah_O" => 0,
							"Jumlah_T" => 0,
							"Jumlah_BJ" => 0,
							"Attachment" => '',
							"IsDone" => false,
							"Status_Pelaporan" => true,
							"Notes" => ""
						);
						$hasil_insert = $this->Main_model->insertAPI($url_insert,$data_insert);
						echo "<pre>$hasil_insert</pre>";
					}
					else{
						//API URL
						$url = 'https://andro.sitri.online/api/usulancaleg/update';
						$ch = curl_init($url);
						$token = 'authan:'.$this->session->userdata('token');
						$data = array(
							"Id_CalegUsulan"=> $id,
							"Id_Caleg"=> $value['Id_Caleg'],
							"Id_Wilayah"=> $value['Id_Wilayah'],
							"Id_Dapil"=> $value['Id_Dapil'],
							"Nama_Kegiatan"=> $value['Nama_Kegiatan'],
							"Jenis_Kegiatan"=> $value['Jenis_Kegiatan'],
							"Deskripsi_Kegiatan"=> $value['Deskripsi_Kegiatan'],
							"Waktu"=> $value['Waktu'],
							"Segmentasi"=> $value['Segmentasi'],
							"Isu_Strategis"=> $value['Isu_Strategis'],
							"Tokoh_Dikunjungi"=> $value['Tokoh_Dikunjungi'],
							"Lembaga_Dikunjungi"=> $value['Lembaga_Dikunjungi'],
							"Target_Peserta"=> $value['Target_Peserta'],
							"Status"=> "REJECTED"
						);
						$payload = json_encode($data);
						curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
						curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
						curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
						$result = curl_exec($ch);
					}
				}
				else{
					echo '';
				}
			}
		}
		else{
			$url4 = 'https://andro.sitri.online/api/strusulan/all/asc';
			$data_task = $this->Main_model->getAPI($url4);
			foreach($data_task as $key => $value){
				if($value['Id_Usulan']==$id){
					if($keputusan=='1'){
						//API URL
						$url = 'https://andro.sitri.online/api/strusulan/update';
						$ch = curl_init($url);
						$token = 'authan:'.$this->session->userdata('token');
						$data = array(
							"Id_Usulan"=> $id,
							"Id_Struktur"=> $value['Id_Struktur'],
							"Id_Wilayah"=> $value['Id_Wilayah'],
							"Id_Dapil"=> $value['Id_Dapil'],
							"Id_Caleg"=> $value['Id_Caleg'],
							"Nama_Usulan"=> $value['Nama_Usulan'],
							"Jenis_Kegiatan"=> $value['Jenis_Kegiatan'],
							"Deskripsi_Kegiatan"=> $value['Deskripsi_Kegiatan'],
							"Waktu"=> $value['Waktu'],
							"Segmentasi"=> $value['Segmentasi'],
							"Isu_Strategis"=> $value['Isu_Strategis'],
							"Tokoh_Dikunjungi"=> $value['Tokoh_Dikunjungi'],
							"Lembaga_Dikunjungi"=> $value['Lembaga_Dikunjungi'],
							"Target_Peserta"=> $value['Target_Peserta'],
							"Status"=> "APPROVE"
						);
						$payload = json_encode($data);
						curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
						curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
						curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
						$result = curl_exec($ch);
						//echo "<pre>$result</pre>";
						//print_r($data);
						$url_insert = 'https://andro.sitri.online/api/calegtask/insert';
						$data_insert = array(
							"Id_Caleg"=> $value['Id_Caleg'],
							"Id_Wilayah"=> $value['Id_Wilayah'],
							"Id_Dapil"=> $value['Id_Dapil'],
							"Nama_Kegiatan"=> $value['Nama_Usulan'],
							"Jenis_Kegiatan"=> $value['Jenis_Kegiatan'],
							"Deskripsi_Kegiatan"=> $value['Deskripsi_Kegiatan'],
							"Waktu"=> $value['Waktu'],
							"Waktu_Realisasi" => $value['Waktu'],
							"Segmentasi"=> $value['Segmentasi'],
							"Isu_Strategis"=> $value['Isu_Strategis'],
							"Detail_Lokasi" => '',
							"Foto" => "",
							"Tokoh_Dikunjungi"=> $value['Tokoh_Dikunjungi'],
							"Lembaga_Dikunjungi"=> $value['Lembaga_Dikunjungi'],
							"Jumlah_M" => 0,
							"Jumlah_CM" => 0,
							"Jumlah_O" => 0,
							"Jumlah_T" => 0,
							"Jumlah_BJ" => 0,
							"Attachment" => '',
							"IsDone" => false,
							"Status_Pelaporan" => true,
							"Notes" => ""
						);
						//$hasil_insert = $this->Main_model->insertAPI($url_insert,$data_insert);
						//echo "<pre>$hasil_insert</pre>";
						//print_r($data_insert);
						$ch4 = curl_init($url_insert);
						$token = 'authan:'.$this->session->userdata('token');
						$payload4 = json_encode($data_insert);
						curl_setopt($ch4, CURLOPT_POSTFIELDS, $payload4);
						curl_setopt($ch4, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
						curl_setopt($ch4, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch4, CURLOPT_SSL_VERIFYPEER, false);
						$result4 = curl_exec($ch4);
						curl_close($ch4);
						//output data
						//print_r($data);
						//Output response
						//echo "<pre>$result4</pre>";
					}
					else{
						//API URL
						$url = 'https://andro.sitri.online/api/strusulan/update';
						$ch = curl_init($url);
						$token = 'authan:'.$this->session->userdata('token');
						$data = array(
							"Id_Usulan"=> $id,
							"Id_Struktur"=> $value['Id_Struktur'],
							"Id_Wilayah"=> $value['Id_Wilayah'],
							"Id_Dapil"=> $value['Id_Dapil'],
							"Id_Caleg"=> $value['Id_Caleg'],
							"Nama_Usulan"=> $value['Nama_Usulan'],
							"Jenis_Kegiatan"=> $value['Jenis_Kegiatan'],
							"Deskripsi_Kegiatan"=> $value['Deskripsi_Kegiatan'],
							"Waktu"=> $value['Waktu'],
							"Segmentasi"=> $value['Segmentasi'],
							"Isu_Strategis"=> $value['Isu_Strategis'],
							"Tokoh_Dikunjungi"=> $value['Tokoh_Dikunjungi'],
							"Lembaga_Dikunjungi"=> $value['Lembaga_Dikunjungi'],
							"Target_Peserta"=> $value['Target_Peserta'],
							"Status"=> "REJECTED"
						);
						$payload = json_encode($data);
						curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
						curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
						curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
						$result = curl_exec($ch);
					}
				}
				else{
					echo '';
				}
			}
		}
		if ($result=='true') {
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Ok! </strong>Data telah berhasil diubah.<br /></div>' );
			echo "<script>window.location='".site_url()."/Usulan'</script>";
		}
		else{
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Ups! </strong>Data gagal diubah.<br /></div>' );
			echo "<script>window.location='".site_url()."/Usulan'</script>";
		}
	}
	public function cetak_rekap_usulan_caleg(){
		$data['active'] = 'usulan';
		$data['sub'] = '';
		$data['sub2'] = '';
		$where = array(
			'status' => '1'
		);
		$url4 = 'https://andro.sitri.online/api/usulancaleg/allnew/asc';
		$data['usulan_caleg'] = $this->Main_model->getAPI($url4);
		// $url5 = 'https://andro.sitri.online/api/strusulan/all/asc';
		// $data['usulan_relawan'] = $this->Main_model->getAPI($url5);
		// $url6 = 'https://andro.sitri.online/api/strprofiles/all/asc';
		// $data['data_relawan'] = $this->Main_model->getAPI($url6);
		// $url7 = 'https://andro.sitri.online/api/calegprofiles/allnf/asc';
		// $data['data_caleg'] = $this->Main_model->getAPI($url7);
		// $this->load->view('template/header',$data);
		$this->load->view('usulan/cetak_rekap_usulan_caleg',$data);
		// $this->load->view('template/footer');
	}
	public function cetak_rekap_usulan_relawan(){
		$data['active'] = 'usulan';
		$data['sub'] = '';
		$data['sub2'] = '';
		$where = array(
			'status' => '1'
		);
		// $url4 = 'https://andro.sitri.online/api/usulancaleg/all/asc';
		// $data['usulan_caleg'] = $this->Main_model->getAPI($url4);
		$url5 = 'https://andro.sitri.online/api/strusulan/allnew/asc';
		$data['usulan_relawan'] = $this->Main_model->getAPI($url5);
		// $url6 = 'https://andro.sitri.online/api/strprofiles/all/asc';
		// $data['data_relawan'] = $this->Main_model->getAPI($url6);
		// $url7 = 'https://andro.sitri.online/api/calegprofiles/allnf/asc';
		// $data['data_caleg'] = $this->Main_model->getAPI($url7);
		// $this->load->view('template/header',$data);
		$this->load->view('usulan/cetak_rekap_usulan_relawan',$data);
		// $this->load->view('template/footer');
	}
	public function ajax_usulan_caleg(){
		//API URL
		$url = 'https://andro.sitri.online/api/usulancaleg/all/asc';
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
		$data['usulan'] = json_decode($tes, true);
		$data['id_usulan'] = $this->input->post('id');
		$this->load->view('usulan/ajax_detail_usulan_caleg',$data);
	}
	public function ajax_usulan_relawan(){
		//API URL
		$url = 'https://andro.sitri.online/api/strusulan/all/asc';
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
		$data['usulan'] = json_decode($tes, true);
		$data['id_usulan'] = $this->input->post('id');
		$this->load->view('usulan/ajax_detail_usulan_relawan',$data);
	}
	public function coba(){
		$cek = 'DKI';
		$kata = 'dki';
		$j = '1';
		if((stristr($kata,$cek)) and ($j=='1')){
			echo"1";
		}
		else{
			echo '0';
		}
		if($kata==$cek){
			echo 'sama';
		}
		else{
			echo 'beda';
		}
	}
}