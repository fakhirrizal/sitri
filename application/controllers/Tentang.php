<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang extends CI_Controller {

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
		$data['active'] = 'tentang';
		$data['sub'] = '';
		$data['sub2'] = '';
		$where = array(
			'status' => '1'
		);
		$data['data_admin'] = $this->Main_model->getSelectedData('user',$where);
		$this->load->view('template/header',$data);
		$this->load->view('app/tentang',$data);
		$this->load->view('template/footer');
	}
	public function tes(){
		$data['active'] = 'tentang';
		$data['sub'] = '';
		$data['sub2'] = '';
		// $string = 'a|b|c|d|e|f';

		// $tags = explode('|' , $string);


		// foreach($tags as $i =>$key) {

		// 	echo $i.' '.$key .'</br>';

		// }
		$this->load->view('template/header',$data);
		$this->load->view('app/coba');
		$this->load->view('template/footer');
	}
	public function tes2(){
		$url = 'https://andro.sitri.online/api/userdatas/register';
		$data = array(
		  "Email" => 'tesmodel@tes.com',
		  "Password" => 'tesmodelinsert',
		  "Role" => 'CAD'
		);
		//$result = $this->Main_model->insertAPI($url,$data);
		$array = array('apel', 'mangga', 'Durian', 'Mangga', 'Apel', 'MANGGA');
		$array2 = array_map('strtolower', $array);
		print_r($array2);
		$kendaraan = ['Mobil', 'Motor', 'Sepeda', 'Truk', 'Bus'];
		asort($kendaraan);
		//echo '<pre>'; print_r($kendaraan);
		print_r($kendaraan);

		$url5 = 'https://andro.sitri.online/api/calegtask/countsegmenall/asc';
		$kategori_keperluan = $this->Main_model->getAPI($url5);
		print_r($kategori_keperluan);

		$tess = array(
			$array_l = array(
				'Segmentasi' => '5',
				'Jumlah' => '5',
			),
			$array_l = array(
				'Segmentasi' => '7',
				'Jumlah' => '57',
			)
		);
		print_r($tess);
	}
	public function tes3(){
		// $data['active'] = '';
		// $data['sub'] = '';
		// $data['sub2'] = '';
		// $where = array('id'=>$this->session->userdata('id'));
		// $data['data_profil'] = $this->Main_model->getSelectedData('user',$where);
		// $this->load->view('template/header',$data);
		// $this->load->view('dashboard/coba');
		// $this->load->view('template/footer');
		$url5 = 'https://andro.sitri.online/api/calegtask/countsegmenall/asc';
		$kategori_keperluan = $this->Main_model->getAPI($url5);
		$url = 'https://andro.sitri.online/api/userdatas/login';
				$ch = curl_init($url);
				$datau = array(
					'Email' => 'string',
					'Password' => 'string'
				);
				$payload = json_encode($datau);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				$result = curl_exec($ch);
				curl_close($ch);
		//output data
		print_r($result);
		//Output response
		echo "<pre>$result</pre>";
		//echo $token;
	}
	public function tes4(){
		//API URL
		$url = 'https://andro.sitri.online/api/userdatas/login';
		//create a new cURL resource
		$ch = curl_init($url);
		//setup request to send json via POST
		//ini register dulu di apinya mas dhica baru diganti email sama passwordnya
		$datau = array(
			'Email' => 'string',
			'Password' => 'string'
		);
		$payload = json_encode($datau);
		//attach encoded JSON string to the POST fields
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		//set the content type to application/json
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
		//return response instead of outputting
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		//execute the POST request
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
		$result = curl_exec($ch);
		//close cURL resource
		curl_close($ch);
		$dataa = json_decode($result, true);
		
			// $sess_data['username'] = $value->username;
			// $sess_data['id'] = $value->id;
			// $sess_data['status'] = $value->status;
			// $sess_data['email'] = $this->input->post('email');
			echo $dataa['Token'];
			// $this->session->set_userdata($sess_data);
		
	}
	public function testes(){
		$url5 = 'https://andro.sitri.online/api/rw/kab/3172';
		$kategori_keperluan = $this->Main_model->getAPI($url5);
		echo count($kategori_keperluan);
	}
}