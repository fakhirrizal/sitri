<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

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
	public function dapil()
	{
		$data['active'] = 'master';
		$data['sub'] = 'menu11';
		$data['sub2'] = '';
		$where = array(
			'status' => '1'
		);
		$data['data_admin'] = $this->Main_model->getSelectedData('user',$where);
		$url4 = 'https://andro.sitri.online/api/dapil/all/C';
		$data['dprri'] = $this->Main_model->getAPI($url4);
		$url5 = 'https://andro.sitri.online/api/dapil/all/B';
		$data['dprdprov'] = $this->Main_model->getAPI($url5);
		$this->load->view('template/header',$data);
		$this->load->view('master/dapil',$data);
		$this->load->view('template/footer');
		
    }
    public function dpt()
	{
		$data['active'] = 'master';
		$data['sub'] = 'menu12';
		$data['sub2'] = '';
		$where = array(
			'status' => '1'
		);
		$data['data_admin'] = $this->Main_model->getSelectedData('user',$where);
		$this->load->view('template/header',$data);
		$this->load->view('master/dpt',$data);
		$this->load->view('template/footer');
		
    }
    public function caleg()
	{
		$data['active'] = 'master';
		$data['sub'] = 'menu13';
		$data['sub2'] = '';
		$where = array(
			'status' => '1'
		);
		//API URL
		$url = 'https://andro.sitri.online/api/calegprofiles/allnf/asc';
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
		$data['data_caleg'] = json_decode($tes, true);
		//$data['prov'] = $this->Main_model->getAllData('provinsi');
		$this->load->view('template/header',$data);
		$this->load->view('master/caleg',$data);
		$this->load->view('template/footer');
		
	}
	public function tambah_data_caleg(){
		$data['active'] = 'master';
		$data['sub'] = 'menu13';
		$data['sub2'] = '';
		$where = array(
			'status' => '1'
		);
		//API URL
		$url = 'https://andro.sitri.online/api/prov/all/asc';
		$ch = curl_init($url);
		$token = 'authan:'.$this->session->userdata('token');
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$tes = curl_exec($ch);
		curl_close($ch);
		$data['data_provinsi'] = json_decode($tes, true);

		$url2 = 'https://andro.sitri.online/api/dapil/all/asc';
		$ch2 = curl_init($url2);
		curl_setopt($ch2, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
		curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
		$tes2 = curl_exec($ch2);
		curl_close($ch2);
		$data['data_dapil'] = json_decode($tes2, true);
		$this->load->view('template/header',$data);
		$this->load->view('master/tambah_data_caleg',$data);
		$this->load->view('template/footer');
	}
	public function ubah_data_caleg(){
		$data['active'] = 'master';
		$data['sub'] = 'menu13';
		$data['sub2'] = '';
		$where = array(
			'status' => '1'
		);
		//API URL
		$url = 'https://andro.sitri.online/api/prov/all/asc';
		$ch = curl_init($url);
		$token = 'authan:'.$this->session->userdata('token');
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$tes = curl_exec($ch);
		curl_close($ch);
		$data['data_provinsi'] = json_decode($tes, true);

		$url2 = 'https://andro.sitri.online/api/dapil/all/asc';
		$ch2 = curl_init($url2);
		curl_setopt($ch2, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
		curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
		$tes2 = curl_exec($ch2);
		curl_close($ch2);
		$data['data_dapil'] = json_decode($tes2, true);
		$url3 = 'https://andro.sitri.online/api/calegprofiles/idnf/'.$this->uri->segment(3);
		$ch3 = curl_init($url3);
		curl_setopt($ch3, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
		//return response instead of outputting
		curl_setopt($ch3, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch3, CURLOPT_SSL_VERIFYPEER, false);
		//execute the POST request
		$tes3 = curl_exec($ch3);
		//close cURL resource
		curl_close($ch3);
		$data['data_caleg'] = json_decode($tes3, true);
		$this->load->view('template/header',$data);
		$this->load->view('master/ubah_data_caleg',$data);
		$this->load->view('template/footer');
	}
	public function simpan_data_caleg(){
		//API URL
		$url = 'https://andro.sitri.online/api/userdatas/register';
		//create a new cURL resource
		$ch = curl_init($url);
		$token = 'authan:'.$this->session->userdata('token');
		//setup request to send json via POST
		$data = array(
		  "Email" => $this->input->post('email'),
		  "Password" => $this->input->post('password'),
		  "Role" => 'CAD'
		);
		$payload = json_encode($data);
		//attach encoded JSON string to the POST fields
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		//set the content type to application/json
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
		//return response instead of outputting
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		//execute the POST request
		$result = curl_exec($ch);
		//close cURL resource
		curl_close($ch);
		//output data
		//print_r($data);
		//Output response
		//echo "<pre>$result</pre>";
		$url2 = 'https://andro.sitri.online/api/userdatas/getId';
		$ch2 = curl_init($url2);
		$datau = array(
			'Email' => $this->input->post('email'),
			'Password' => $this->input->post('password'),
		);
		$payload2 = json_encode($datau);
		curl_setopt($ch2, CURLOPT_POSTFIELDS, $payload2);
		curl_setopt($ch2, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
		curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
		$result2 = curl_exec($ch2);
		curl_close($ch2);
		$dataa = json_decode($result2, true);
		//echo $dataa['id'];

		$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/assets/foto_profil/'; //path folder
        $config['allowed_types'] = 'jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '3072'; //maksimum besar file 3M
        $config['max_width']  = '5000'; //lebar maksimum 5000 px
        $config['max_height']  = '5000'; //tinggi maksimu 5000 px
		$config['file_name'] = $nmfile; //nama yang terupload nantinya
		$nama_file = '';

        $this->upload->initialize($config);    

        if(isset($_FILES['foto']['name']))
        {
            if(!$this->upload->do_upload('foto'))
            {
            	echo '';
            }
            else
            {
				$gbr = $this->upload->data();
				$get_file_foto = base_url('assets/foto_profil/').$gbr['file_name'];
				$nama_file = base64_encode(file_get_contents($get_file_foto));
            }
		}
		//echo $nama_file;

		$url3 = 'https://andro.sitri.online/api/calegprofiles/insert';
		$ch3 = curl_init($url3);
		$data3 = array(
		  "Id_Caleg" => $dataa['id'],
		  "Id_Dapil" => $this->input->post('dapil'),
		  "Tingkat" => $this->input->post('tingkat_dapil'),
		  "No_Urut" => $this->input->post('nomor_urut'),
		  "Nama" => $this->input->post('nama'),
		  "Telepon" => $this->input->post('telepon'),
		  "Tempat_Lahir" => $this->input->post('tempat_lahir'),
		  "Tanggal_Lahir" => $this->input->post('tanggal_lahir')."T00:00:00",
		  "Alamat" => $this->input->post('alamat'),
		  "Desa" => $this->input->post('desa'),
		  "Kecamatan" => $this->input->post('kecamatan'),
		  "Kabupaten" => $this->input->post('kabupaten'),
		  "Provinsi" => $this->input->post('provinsi'),
		  "Foto" => $nama_file,
		  "Target_Suara" => $this->input->post('target_suara')
		);
		$payload3 = json_encode($data3);
		curl_setopt($ch3, CURLOPT_POSTFIELDS, $payload3);
		curl_setopt($ch3, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
		curl_setopt($ch3, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch3, CURLOPT_SSL_VERIFYPEER, false);
		$result3 = curl_exec($ch3);
		curl_close($ch3);
		$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>Data telah berhasil ditambahkan.<br /></div>' );
        echo "<script>window.location='".site_url()."/Master/caleg'</script>";
	}
	public function update_data_caleg(){
		$url = 'https://andro.sitri.online/api/calegprofiles/update';
		$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/assets/foto_profil/'; //path folder
        $config['allowed_types'] = 'jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '3072'; //maksimum besar file 3M
        $config['max_width']  = '5000'; //lebar maksimum 5000 px
        $config['max_height']  = '5000'; //tinggi maksimu 5000 px
		$config['file_name'] = $nmfile; //nama yang terupload nantinya
		$nama_file = '';

        $this->upload->initialize($config);    

        if(isset($_FILES['foto']['name']))
        {
            if(!$this->upload->do_upload('foto'))
            {
            	$nama_file = $this->input->post('foto');
            }
            else
            {
				$gbr = $this->upload->data();
				$get_file_foto = base_url('assets/foto_profil/').$gbr['file_name'];
				$nama_file = base64_encode(file_get_contents($get_file_foto));
            }
		}
		$data3 = array(
			"Id_Caleg" => $this->input->post('id'),
			"Id_Dapil" => $this->input->post('id_dapil'),
			"Tingkat" => $this->input->post('tingkat_dapil'),
			"No_Urut" => $this->input->post('nomor_urut'),
			"Nama" => $this->input->post('nama'),
			"Telepon" => $this->input->post('telepon'),
			"Tempat_Lahir" => $this->input->post('tempat_lahir'),
			"Tanggal_Lahir" => $this->input->post('tanggal_lahir')."T00:00:00",
			"Alamat" => $this->input->post('alamat'),
			"Desa" => $this->input->post('desa'),
			"Kecamatan" => $this->input->post('kecamatan'),
			"Kabupaten" => $this->input->post('kabupaten'),
			"Provinsi" => $this->input->post('provinsi'),
			"Foto" => $nama_file,
			"Target_Suara" => $this->input->post('target_suara')
		  );
		$result = $this->Main_model->updateAPI($url,$data3);
		$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>Data telah berhasil diubah.<br /></div>' );
        echo "<script>window.location='".site_url()."/Master/caleg'</script>";
	}
	public function hapus_data_caleg(){
		$where = $this->uri->segment(3);
		$url = 'https://andro.sitri.online/api/calegprofiles/delete?idCaleg='.$where;
		$tes = $this->Main_model->deleteAPI($url);
		$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Ooops! </strong>Data berhasil dihapus.<br /></div>' );
		echo "<script>window.location='".site_url()."/Master/caleg'</script>";
	}
    public function relawan()
	{
		$data['active'] = 'master';
		$data['sub'] = 'menu14';
		$data['sub2'] = '';
		//API URL
		$url = 'https://andro.sitri.online/api/strprofiles/all/asc';
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
		$data['data_relawan'] = json_decode($tes, true);
		$this->load->view('template/header',$data);
		$this->load->view('master/relawan',$data);
		$this->load->view('template/footer');
		
	}
	public function ajax_detail_relawan(){
		//API URL
		$url = 'https://andro.sitri.online/api/strprofiles/id/'.$this->input->post('id');
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
		$data['row'] = json_decode($tes, true);
		$this->load->view('master/ajax_detail_relawan',$data);
	}
	public function tambah_data_relawan(){
		$data['active'] = 'master';
		$data['sub'] = 'menu14';
		$data['sub2'] = '';
		$where = array(
			'status' => '1'
		);
		//API URL
		$url = 'https://andro.sitri.online/api/kec/kab/3172';
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
		$data['data_provinsi'] = json_decode($tes, true);

		$url2 = 'https://andro.sitri.online/api/dapil/all/asc';
		$ch2 = curl_init($url2);
		curl_setopt($ch2, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
		curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
		$tes2 = curl_exec($ch2);
		curl_close($ch2);
		$data['data_dapil'] = json_decode($tes2, true);
		$this->load->view('template/header',$data);
		$this->load->view('master/tambah_data_relawan',$data);
		$this->load->view('template/footer');
	}
	public function simpan_data_relawan(){
		//API URL
		$url = 'https://andro.sitri.online/api/userdatas/register';
		//create a new cURL resource
		$ch = curl_init($url);
		$token = 'authan:'.$this->session->userdata('token');
		//setup request to send json via POST
		$data = array(
		  "Email" => $this->input->post('email'),
		  "Password" => $this->input->post('password'),
		  "Role" => 'STRUKTUR'
		);
		$payload = json_encode($data);
		//attach encoded JSON string to the POST fields
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		//set the content type to application/json
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
		//return response instead of outputting
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		//execute the POST request
		$result = curl_exec($ch);
		//close cURL resource
		curl_close($ch);
		//output data
		//print_r($data);
		//Output response
		//echo "<pre>$result</pre>";
		$url2 = 'https://andro.sitri.online/api/userdatas/getId';
		$ch2 = curl_init($url2);
		$datau = array(
			'Email' => $this->input->post('email'),
			'Password' => $this->input->post('password'),
		);
		$payload2 = json_encode($datau);
		curl_setopt($ch2, CURLOPT_POSTFIELDS, $payload2);
		curl_setopt($ch2, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
		curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
		$result2 = curl_exec($ch2);
		curl_close($ch2);
		$dataa = json_decode($result2, true);
		//echo $dataa['id'];

		$url3 = 'https://andro.sitri.online/api/strprofiles/insert';
		$ch3 = curl_init($url3);
		$data3 = array(
		  "Id_Struktur" => $dataa['id'],
		  "Nama" => $this->input->post('nama'),
		  "Tingkat" => $this->input->post('tingkat'),
		  "Alamat" => $this->input->post('alamat'),
		  "Id_Dapil" => $this->input->post('dapil'), 
		  "Id_Desa" => $this->input->post('desa'),
		  "Id_Kecamatan" => $this->input->post('kecamatan'),
		  "Id_Kabupaten" => '3172',
		  "Id_Provinsi" => '31',
		  "Target_Suara" => $this->input->post('target_suara')
		);
		$payload3 = json_encode($data3);
		curl_setopt($ch3, CURLOPT_POSTFIELDS, $payload3);
		curl_setopt($ch3, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
		curl_setopt($ch3, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch3, CURLOPT_SSL_VERIFYPEER, false);
		$result3 = curl_exec($ch3);
		curl_close($ch3);
		//Output response
		//print_r($data3);
		//echo "<pre>".$result3."</pre>";
		$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>Data telah berhasil ditambahkan.<br /></div>' );
        echo "<script>window.location='".site_url()."/Master/relawan'</script>";
	}
	public function ubah_data_relawan(){
		$data['active'] = 'master';
		$data['sub'] = 'menu14';
		$data['sub2'] = '';
		$url = 'https://andro.sitri.online/api/strprofiles/id/'.$this->uri->segment(3);
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
		$data['row'] = json_decode($tes, true);
		//API URL
		$url2 = 'https://andro.sitri.online/api/kec/kab/3172';
		//create a new cURL resource
		$ch2 = curl_init($url2);
		curl_setopt($ch2, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
		//return response instead of outputting
		curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
		//execute the POST request
		$tes2 = curl_exec($ch2);
		//close cURL resource
		curl_close($ch2);
		$data['data_provinsi'] = json_decode($tes2, true);

		$this->load->view('template/header',$data);
		$this->load->view('master/ubah_data_relawan',$data);
		$this->load->view('template/footer');
	}
	public function update_data_relawan(){
		$url = 'https://andro.sitri.online/api/strprofiles/update';
		$data3 = array(
			"Id_Struktur" => $this->input->post('id_struktur'),
			"Nama" => $this->input->post('nama'),
			"Tingkat" => $this->input->post('tingkat'),
			"Alamat" => $this->input->post('alamat'),
			"Id_Dapil" => $this->input->post('id_dapil'),
			"Id_Desa" => $this->input->post('id_desa'),
			"Id_Kecamatan" => $this->input->post('id_kecamatan'),
			"Id_Kabupaten" => '3172',
			"Id_Provinsi" => '31',
			"Target_Suara" => $this->input->post('target_suara')
		  );
		$result = $this->Main_model->updateAPI($url,$data3);
		$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>Data telah berhasil diubah.<br /></div>' );
        echo "<script>window.location='".site_url()."/Master/relawan'</script>";
	}
    public function admin()
	{
		$data['active'] = 'master';
		$data['sub'] = 'menu15';
		$data['sub2'] = '';
		$where = array(
			'status' => '1'
		);
		$data['data_admin'] = $this->Main_model->getSelectedData('user',$where);
		$this->load->view('template/header',$data);
		$this->load->view('master/admin',$data);
		$this->load->view('template/footer');
		
	}
	public function simpan_admin(){
		$hasil = '';
		$url_insert = 'https://andro.sitri.online/api/userdatas/register';
		$data_insert = array(
			"Email"=> $this->input->post('email'),
			"Password"=> $this->input->post('password'),
			"Role"=> $this->input->post('role'),
		);
		$hasil_insert = $this->Main_model->insertAPI($url_insert,$data_insert);
		if($this->input->post('role')=='dapil'){
			$data = array(
			'kd_user' => $this->Master_model->getKodeAdmin(),
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'email' => $this->input->post('email'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'password_api' => $this->input->post('password'),
			'role' => 'dapil',
			'id_wilayah' => $this->input->post('wilayah'),
			'create_date' => date('Y-m-d H-i-s')
			);
			$hasil = $this->Main_model->tambahdata('user',$data);
		}
		elseif($this->input->post('role')=='dpc'){
			$data = array(
			'kd_user' => $this->Master_model->getKodeAnggotaKelompok(),
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'email' => $this->input->post('email'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'password_api' => $this->input->post('password'),
			'role' => 'dpc',
			'create_date' => date('Y-m-d H-i-s')
			);
			$hasil = $this->Main_model->tambahdata('user',$data);
		}
		else{
			$data = array(
			'kd_user' => $this->Master_model->getKodeCDO(),
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'email' => $this->input->post('email'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'password_api' => $this->input->post('password'),
			'role' => 'dpd',
			'create_date' => date('Y-m-d H-i-s')
			);
			$hasil = $this->Main_model->tambahdata('user',$data);
		}
		if($hasil>0){
			$this->session->set_flashdata('sukses','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data admin baru telah berhasil ditambahkan.<br /></div>' );
            echo "<script>window.location='".site_url()."/Master/admin/'</script>";
		}
		else{
			$this->session->set_flashdata('gagal','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal ditambahkan.<br /></div>' );
            echo "<script>window.location='".site_url()."/Master/admin/'</script>";
		}
	}
	public function ubah_admin(){
		$where['id'] = $this->input->post('id');
		$data_admin = $this->Main_model->getSelectedData('user',$where);
		$role = '';
		foreach ($data_admin as $key => $value) {
			$role = $value->role;
		}
		$this->db->trans_start();
		if($role==$this->input->post('role')){
			$data = array(
						'nama_lengkap' => $this->input->post('nama_lengkap'),
						'username' => $this->input->post('username'),
						);
			$this->Main_model->updateData('user',$data,$where);
		}
		else{
			$data = array(
						'kd_user' => '',
						);
			$this->Main_model->updateData('user',$data,$where);
			if($this->input->post('role')=='dpd'){
				$data_ubah = array(
						'kd_user' => $this->Master_model->getKodeCDO(),
						'nama_lengkap' => $this->input->post('nama_lengkap'),        
						'username' => $this->input->post('username'),
						'role' => 'dpd'                   
						);
				$this->Main_model->updateData('user',$data_ubah,$where);
			}
			elseif($this->input->post('role')=='dpc'){
				$data_ubah = array(
						'kd_user' => $this->Master_model->getKodeAnggotaKelompok(),
						'nama_lengkap' => $this->input->post('nama_lengkap'),        
						'username' => $this->input->post('username'),
						'role' => 'dpc'                   
						);
				$this->Main_model->updateData('user',$data_ubah,$where);
			}
			else{
				$data_ubah = array(
						'kd_user' => $this->Master_model->getKodeAdmin(),
						'nama_lengkap' => $this->input->post('nama_lengkap'),        
						'username' => $this->input->post('username'),                   
						'role' => 'dapil'
						);
				$this->Main_model->updateData('user',$data_ubah,$where);
			}
			
		}
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal diubah.<br /></div>' );
            echo "<script>window.location='".base_url()."Master/admin/'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil diubah.<br /></div>' );
            echo "<script>window.location='".base_url()."Master/admin/'</script>";
		}
	}
	public function cek_username(){
		$where['username'] = $this->input->post('username'); 
		$data = $this->Main_model->getSelectedData('user',$where);
		if($data==NULL){
			echo " ✔ Username masih tersedia";
		}else{
			echo " ❌ Username tidak tersedia";
			}
	}
	public function hapus_admin(){
		$where['id'] = $this->uri->segment(3);
		$data = array(
		    			'status' => '0'
		                );
		    	$this->Main_model->updateData('user',$data,$where);
		$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data berhasil dihapus.<br /></div>' );
        echo "<script>window.location='".site_url()."Master/admin/'</script>";
	}
	public function mulitple_deleted(){
        if (count($this->input->post('selected_id')) > 0 ) {
            $all = implode(",", $this->input->post('selected_id'));
            $query="UPDATE user a set a.status='0' WHERE 1 AND a.id IN($all)";
            $this->Main_model->manualQuery($query);
            $this->session->set_flashdata('sukses','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>okey! </strong>data berhasil dihapus.<br /></div>' );
            echo "<script>window.location='".site_url()."/Beranda/'</script>";
        }else{
            $this->session->set_flashdata('gagal','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal dihapus.<br /></div>' );
            echo "<script>window.location='".site_url()."/Beranda/'</script>";
        }
	}
	public function ambil_data(){
        $value = $this->input->post('id');
        $modul = $this->input->post('modul');
        if($modul=='kabupaten'){
            //API URL
			$url = 'https://andro.sitri.online/api/kab/prov/'.$value;
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
				echo"<option value='".$value1['Id_Kabupaten']."'>".$value1['Nama_Kabupaten']."</option>";                                              
            }                                                                                        
        }
        elseif($modul=='kecamatan'){
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
        elseif($modul=='desa'){
            //API URL
			$url = 'https://andro.sitri.online/api/desa/kec/'.$value;
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
				echo"<option value='".$value1['Id_Desa']."'>".$value1['Nama_Desa']."</option>";                                              
            }                                               
		}
		elseif($modul=='rw'){
            //API URL
			$url = 'https://andro.sitri.online/api/rw/desa/'.$value;
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
				echo"<option value='".$value1['Id_Rw']."'>".$value1['Nomor_Rw']."</option>";                                              
            }                                               
        }
        elseif($modul=='caleg'){
	    	//API URL
			$url = 'https://andro.sitri.online/api/calegprofiles/idnf/'.$value;
			//create a new cURL resource
			$ch = curl_init($url);
			$token = 'authan:'.$this->session->userdata('token');
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
			//return response instead of outputting
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			//execute the POST request
			$result = curl_exec($ch);
			//close cURL resource
			curl_close($ch);
			$data_caleg = json_decode($result, true);
	        		echo '<input type="hidden" name="Id_Dapil" value="'.$data_caleg['Id_Dapil'].'">';
	    }
	    elseif ($modul=='dapil') {
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
	    elseif ($modul=='caleg_perdapil') {
	    	//API URL
			$url = 'https://andro.sitri.online/api/calegprofiles/dapil/'.$value;
			//create a new cURL resource
			$ch = curl_init($url);
			$token = 'authan:'.$this->session->userdata('token');
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
			//return response instead of outputting
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			//execute the POST request
			$result = curl_exec($ch);
			//close cURL resource
			curl_close($ch);
			$data_caleg = json_decode($result, true);  
			// echo '<option value="">-- Pilih --</option>';
			// foreach ($data_caleg as $dc) {
			// 	echo '<option value="'.$dc['Id_Caleg'].'">'.$dc['Nama'].'</option>';
			// }
			
                                                    foreach ($data_caleg as $value) {
                                                    echo '
                                                    <div class="col-md-3">
                                                        <div class="md-checkbox">
                                                            <input type="checkbox" id="'.$value['Id_Caleg'].'" name="nama[]" value="'.$value['Id_Caleg'].'" class="md-check">
                                                            <label for="'.$value['Id_Caleg'].'">
                                                                <span class="inc"></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span> '.$value['Nama'].' </label>
                                                        </div>
                                                    </div>';
                                                    }
			//print_r($query);
	    }
	    elseif ($modul=='relawan_pertingkat') {
	    	//API URL
			$url = 'https://andro.sitri.online/api/relawan/tingkat/'.$value;
			//create a new cURL resource
			$ch = curl_init($url);
			$token = 'authan:'.$this->session->userdata('token');
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
			//return response instead of outputting
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			//execute the POST request
			$result = curl_exec($ch);
			//close cURL resource
			curl_close($ch);
			$data_relawan = json_decode($result, true);  
			// echo '<option value="">-- Pilih --</option>';
			// foreach ($data_caleg as $dc) {
			// 	echo '<option value="'.$dc['Id_Caleg'].'">'.$dc['Nama'].'</option>';
			// }
			
                                                    foreach ($data_relawan as $value) {
                                                    echo '
                                                    <div class="col-md-3">
                                                        <div class="md-checkbox">
                                                            <input type="checkbox" id="'.$value['Id_Relawan'].'" name="nama[]" value="'.$value['Id_Relawan'].'" class="md-check">
                                                            <label for="'.$value['Id_Relawan'].'">
                                                                <span class="inc"></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span> '.$value['Nama'].' </label>
                                                        </div>
                                                    </div>';
                                                    }
			//print_r($query);
	    }
	    elseif ($modul=='relawan_bysatgas') {
	    	//API URL
			$url = 'https://andro.sitri.online/api/relawan/all/asc/';
			//create a new cURL resource
			$ch = curl_init($url);
			$token = 'authan:'.$this->session->userdata('token');
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
			//return response instead of outputting
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			//execute the POST request
			$result = curl_exec($ch);
			//close cURL resource
			curl_close($ch);
			$data_relawan = json_decode($result, true);  
			// echo '<option value="">-- Pilih --</option>';
			// foreach ($data_caleg as $dc) {
			// 	echo '<option value="'.$dc['Id_Caleg'].'">'.$dc['Nama'].'</option>';
			// }
			
                                            foreach ($data_relawan as $value1) {
                                                if($value1['Satgas']==$value){
                                                    echo '
                                                    <div class="col-md-3">
                                                        <div class="md-checkbox">
                                                            <input type="checkbox" id="'.$value1['Id_Relawan'].'" name="nama[]" value="'.$value1['Id_Relawan'].'" class="md-check">
                                                            <label for="'.$value1['Id_Relawan'].'">
                                                                <span class="inc"></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span> '.$value1['Nama'].' </label>
                                                        </div>
                                                    </div>';
                                                }
                                                else{
                                                	echo '';
                                                }
                                            }
			//print_r($query);
	    }
        elseif($modul=='relawan'){
	    	//API URL
			$url = 'https://andro.sitri.online/api/relawan/id/'.$value;
			//create a new cURL resource
			$ch = curl_init($url);
			$token = 'authan:'.$this->session->userdata('token');
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
			//return response instead of outputting
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			//execute the POST request
			$result = curl_exec($ch);
			//close cURL resource
			curl_close($ch);
			$data_relawan = json_decode($result, true);                       
	        
	        	if($data_relawan['TingkatRelawan']=='PROVINSI'){
	        		echo '<input type="hidden" name="wilayah" value="'.$data_relawan['Id_Provinsi'].'">';
	        	}
	        	elseif ($data_relawan['TingkatRelawan']=='KABUPATEN') {
	        		echo '<input type="hidden" name="wilayah" value="'.$data_relawan['Id_Kabupaten'].'">';
	        	}
	        	elseif ($data_relawan['TingkatRelawan']=='KECAMATAN') {
	        		echo '<input type="hidden" name="wilayah" value="'.$data_relawan['Id_Kecamatan'].'">';
	        	}
	        	else{
	        		echo '<input type="hidden" name="wilayah" value="'.$data_relawan['Id_Desa'].'">';
	        	}
	    }
        else{
            echo "";
        }
	}
	public function upload(){
		$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/assets/foto_profil/'; //path folder
        $config['allowed_types'] = 'jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '3072'; //maksimum besar file 3M
        $config['max_width']  = '5000'; //lebar maksimum 5000 px
        $config['max_height']  = '5000'; //tinggi maksimu 5000 px
		$config['file_name'] = $nmfile; //nama yang terupload nantinya
		$nama_file = '';

        $this->upload->initialize($config);    

        if(isset($_FILES['foto']['name']))
        {
            if(!$this->upload->do_upload('foto'))
            {
            	echo '';
            }
            else
            {
				$gbr = $this->upload->data();
				$get_file_foto = base_url('assets/foto_profil/').$gbr['file_name'];
				$nama_file = base64_encode(file_get_contents($get_file_foto));
            }
		}
		echo $nama_file;
	}
	public function tes(){
		$token = 'authan:'.$this->session->userdata('token');
		$url3 = 'https://andro.sitri.online/api/calegprofiles/insert';
		$ch3 = curl_init($url3);
		$data3 = array(
		  "Id_Caleg" => 'k',
		  "Id_Dapil" => "string",
		  "Tingkat" => $this->input->post('tingkat'),
		  "No_Urut" => $this->input->post('nomor_urut'),
		  "Nama" => $this->input->post('nama'),
		  "Telepon" => $this->input->post('telepon'),
		  "Tempat_Lahir" => $this->input->post('tempat_lahir'),
		  "Tanggal_Lahir" => $this->input->post('tanggal_lahir')."T00:00:00",
		  "Alamat" => $this->input->post('alamat'),
		  "Desa" => $this->input->post('desa'),
		  "Kecamatan" => $this->input->post('kecamatan'),
		  "Kabupaten" => $this->input->post('kabupaten'),
		  "Provinsi" => $this->input->post('provinsi'),
		  "Foto" => 'f',
		  "Target_Suara" => $this->input->post('target_suara')
		);
		$payload3 = json_encode($data3);
		curl_setopt($ch3, CURLOPT_POSTFIELDS, $payload3);
		curl_setopt($ch3, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
		curl_setopt($ch3, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch3, CURLOPT_SSL_VERIFYPEER, false);
		$result3 = curl_exec($ch3);
		curl_close($ch3);
		//print_r($data3);
		//output data
		print_r($data3);
		//Output response
		echo "<pre>".$result3."</pre>";
	}
	public function teskarakter(){
		$kata = 'Aku disini dan engkau disana';
		$cek = 'dan';
		if(stristr($kata,$cek)){
			echo 'benar';
		}
		else{
			echo 'salah';
		}
	}
}
