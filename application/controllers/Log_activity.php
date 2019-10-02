<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_activity extends CI_Controller {

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
		$data['active'] = 'log_activity';
		$data['sub'] = '';
		$data['sub2'] = '';
		$where = array(
			'status' => '1'
		);
		$data['data_admin'] = $this->Main_model->getSelectedData('user',$where);
		$this->load->view('template/header',$data);
		$this->load->view('app/log_activity',$data);
		$this->load->view('template/footer');
    }
}