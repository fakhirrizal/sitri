<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

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
	private $main_table;
    function __construct() {
		parent::__construct();
		$this->main_table							= 'kecamatan';
		$this->table								= $this->config->item('table');
    }
    public function index()
	{
		$data['active'] = 'tentang';
		$data['sub'] = '';
		$data['sub2'] = '';
		$where = array(
			'status' => '1'
		);
		$data['data_aplikasi'] = $this->Main_model->getAlldata('aplikasi');
		$this->load->view('template/header',$data);
		$this->load->view('app/pengaturan',$data);
		$this->load->view('template/footer');
	}
	public function simpan_setting(){
		$where['id'] = '1';
		$data = array(
		    			'about' => $this->input->post('about'),
		    			'phone' => $this->input->post('phone'),
		    			'email' => $this->input->post('email'),
		    			'terakhir_diubah' => date('Y-m-d H-i-s')
		                );
		    	$this->Main_model->updateData('aplikasi',$data,$where);
		$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Okey! </strong>data berhasil diubah.<br /></div>' );
        echo "<script>window.location='".site_url()."/Setting/'</script>";
	}
	public function tes(){
		$url3 = 'https://andro.sitri.online/api/desa/kab/3172';
		$datadesa = $this->Main_model->getAPI($url3);
	}
	public function cobafungsi(){
		$teks = array(
			'nm_kecamatan' => 'tes jhon',
			'kml' => 'tes jhon'
		);
		echo $this->Main_model->create($this->main_table,$teks);
		//print_r($teks);
	}
}