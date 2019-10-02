<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		if(($this->session->userdata('id'))==NULL){
		$this->load->view('user/login');
		}else{
			redirect('Tentang');
		}
	}
	public function masuk(){
		$where = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);
		$cek = $this->Main_model->getSelectedData('user',$where);
		if($cek!=NULL){
			foreach ($cek as $key => $value) {
				$url = 'https://andro.sitri.online/api/userdatas/login';
				$ch = curl_init($url);
				$datau = array(
					'Email' => $value->email,
					'Password' => $value->password_api
				);
				$payload = json_encode($datau);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				$result = curl_exec($ch);
				curl_close($ch);
				$dataa = json_decode($result, true);
				$sess_data['username'] = $value->username;
				$sess_data['id'] = $value->id;
				$sess_data['kd_user'] = $value->kd_user;
				$sess_data['role'] = $value->role;
				$sess_data['id_wilayah'] = $value->id_wilayah;
				$sess_data['token'] = $dataa['Token'];
				$this->session->set_userdata($sess_data);
				$datatoken = array(
					'token' => $dataa['Token']
				);
				$this->Main_model->updateData('user',$datatoken,$where);
				// print_r($datau);
				// print_r($datatoken);
			}
			$data_log = array(
                        'aktor' => $this->session->userdata('kd_user'),
                        'keterangan' => 'Login aplikasi (via web apps)',
                        'waktu' => date('Y-m-d H-i-s')
                    );
            $this->Main_model->tambahdata('log_activity',$data_log);
			redirect('Tentang');
		}
		else{
			$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible" role="alert" style="text-align: justify;">
											  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											  <strong>Ups! </strong>Username atau Password yang Anda masukkan tidak valid.
											</div>' );
			echo "<script>window.location='".base_url()."'</script>";
		}
	}
	public function profil(){
		$data['active'] = '';
		$data['sub'] = '';
		$data['sub2'] = '';
		$where = array('id'=>$this->session->userdata('id'));
		$data['data_profil'] = $this->Main_model->getSelectedData('user',$where);

		$this->load->view('template/header',$data);
		$this->load->view('user/profil',$data);
		$this->load->view('template/footer');
	}	
	public function ganti_sandi(){
		$data['active'] = '';
		$data['sub'] = '';
		$data['sub2'] = '';
		$where = array('id'=>$this->session->userdata('id'));
		$data['data_profil'] = $this->Main_model->getSelectedData('user',$where);
		$this->load->view('template/header',$data);
		$this->load->view('user/ganti_sandi',$data);
		$this->load->view('template/footer');
	}
	
	public function ubah_profil(){
		$ambil_data = array('id'=>$this->session->userdata('id'));
		$data_profil = $this->Main_model->getSelectedData('user',$ambil_data);
		foreach ($data_profil as $key => $value) {
			if($value->username==$this->input->post('username')){
				$where = array('id'=>$this->session->userdata('id'));
		        $data = array(
		                'nama_lengkap' => $this->input->post('nama_lengkap'),        
		                'username' => $this->input->post('username'),                   
		                );
		        $this->Main_model->updateData('user',$data,$where);
			}
			else{
				$where_cek = array('username'=>$this->input->post('username'));
				$cek = $this->Main_model->getSelectedData('user',$where_cek);
				if($cek==NULL){
					$where = array('id'=>$this->session->userdata('id'));
			        $data = array(
			                'nama_lengkap' => $this->input->post('nama_lengkap'),        
			                'username' => $this->input->post('username'),                   
			                );
			        $this->Main_model->updateData('user',$data,$where);
				}
				else{
					$where = array('id'=>$this->session->userdata('id'));
			        $data = array(
			                'nama_lengkap' => $this->input->post('nama_lengkap')                   
			                );
			        $this->Main_model->updateData('user',$data,$where);
					$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>Username telah digunakan.<br /></div>' );
					redirect('User/profil');
				}
			}
			$data_log = array(
                        'aktor' => $this->session->userdata('kd_user'),
                        'keterangan' => 'Update profil (via web apps)',
                        'waktu' => date('Y-m-d H-i-s')
                    );
            $this->Main_model->tambahdata('log_activity',$data_log);

       		$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>Profil Anda telah berhasil diubah.<br /></div>' );
			redirect('User/profil');
		}
	}
	public function ubah_sandi(){
		$where_cek = array(
			'id' => $this->session->userdata('id'),
			'password' => $this->input->post('password')
		);
		$cek = $this->Main_model->getSelectedData('user',$where_cek);
		if($cek!=NULL){
			$where = array('id'=>$this->session->userdata('id'));
			$data = array('password'=>$this->input->post('password_new'));
			$this->Main_model->updateData('user',$data,$where);

			$data_log = array(
                        'aktor' => $this->session->userdata('kd_user'),
                        'keterangan' => 'Mengubah kata sandi akun (via web apps)',
                        'waktu' => date('Y-m-d H-i-s')
                    );
            $this->Main_model->tambahdata('log_activity',$data_log);

			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>Password telah berhasil diubah.<br /></div>' );
			redirect('User/ganti_sandi');
		}
		else{
			$this->session->set_flashdata('gagal','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Ups! </strong>Password yang Anda masukkan tidak valid.<br /></div>' );
	   		redirect('User/ganti_sandi');
		}
	}
	public function ubah_foto(){
        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/assets/foto_profil/'; //path folder
        $config['allowed_types'] = 'jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '3072'; //maksimum besar file 3M
        $config['max_width']  = '5000'; //lebar maksimum 5000 px
        $config['max_height']  = '5000'; //tinggi maksimu 5000 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        $this->upload->initialize($config);    

        if(isset($_FILES['foto']['name']))
         {
             if(!$this->upload->do_upload('foto'))
             {
                $a = $this->upload->display_errors();
                echo "<script>alert('".$a."')</script>";
                echo "<script>window.location='".site_url('User/profil')."'</script>";
             }
             else
             {
                $gbr = $this->upload->data();                
                
                $where = array('id'=>$this->session->userdata('id'));
                $get_file_foto = base_url().'assets/foto_profil/'.$gbr['file_name'];
                $data = array(
                'foto' => base64_encode(file_get_contents($get_file_foto))
                );

                $res = $this->Main_model->updateData("user",$data,$where); //akses model untuk menyimpan ke database           

                $data_log = array(
                        'aktor' => $this->session->userdata('kd_user'),
                        'keterangan' => 'Mengubah foto profil (via web apps)',
                        'waktu' => date('Y-m-d H-i-s')
                    );
                $this->Main_model->tambahdata('log_activity',$data_log);               

                $this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>Foto telah berhasil diubah.<br /></div>' );
                echo "<script>window.location='".site_url()."/User/profil'</script>";
                }
         }
	}
	public function feed(){
		$data['active'] = 'feed';
		$data['sub'] = '';
		$data['sub2'] = '';
		$where['status'] = '1';
		$data['data_feed'] = $this->Main_model->getSelectedData('feed',$where);
		$this->load->view('template/header',$data);
		$this->load->view('feed');
		$this->load->view('template/footer');
	}
	public function log_activity(){
		$data['active'] = 'log_activity';
		$data['sub'] = '';
		$data['sub2'] = '';
		$data['data_log'] = $this->Master_model->data_log();
		$this->load->view('template/header',$data);
		$this->load->view('log_activity');
		$this->load->view('template/footer');
	}
	// public function hapus_log(){

	// }
	public function kosongkan_log(){
        $this->Master_model->kosongkan_log();
        $this->session->set_flashdata('sukses','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button></i>Log activity telah dikosongkan.<br /></div>' );
        echo "<script>window.location='".site_url()."User/log_activity'</script>";
    }
	public function bantuan(){
		$data['active'] = '';
		$data['sub'] = '';
		$data['sub2'] = '';
		$this->load->view('template/header',$data);
		$this->load->view('bantuan');
		$this->load->view('template/footer');
	}
	public function tentang(){
		$data['active'] = 'tentang';
		$data['sub'] = '';
		$data['sub2'] = '';
		$this->load->view('template/header',$data);
		$this->load->view('tentang');
		$this->load->view('template/footer');
	}
	public function keluar(){
		$this->session->sess_destroy();
	    echo "<script>window.location='".base_url()."'</script>";
	}
}