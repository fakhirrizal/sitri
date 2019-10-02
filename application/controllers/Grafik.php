<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafik extends CI_Controller {

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
    public function grafik1()
	{
		$data['active'] = 'beranda';
		$data['sub'] = 'grafik1';
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
			$this->load->view('dashboard/grafik1',$data);
		// }
		// else{
		// 	$data['nilaii'] = $pilihan;
		// 	$this->load->view('dashboard/beranda2',$data);
		// }
		$this->load->view('template/footer');
	}
	public function grafik2()
	{
		$data['active'] = 'beranda';
		$data['sub'] = 'grafik2';
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
			$this->load->view('dashboard/grafik2',$data);
		// }
		// else{
		// 	$data['nilaii'] = $pilihan;
		// 	$this->load->view('dashboard/beranda2',$data);
		// }
		$this->load->view('template/footer');
	}
	public function grafik3()
	{
		$data['active'] = 'beranda';
		$data['sub'] = 'grafik3';
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
			$this->load->view('dashboard/grafik3',$data);
		// }
		// else{
		// 	$data['nilaii'] = $pilihan;
		// 	$this->load->view('dashboard/beranda2',$data);
		// }
		$this->load->view('template/footer');
	}
}