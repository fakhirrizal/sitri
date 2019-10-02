<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

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
	/* Kegiatan Caleg */
    public function kegiatan_caleg()
	{
		$data['active'] = 'laporan';
		$data['sub'] = 'menu31';
		$data['sub2'] = '';
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

		$url3 = 'https://andro.sitri.online/api/calegprofiles/allnf/asc';
		$data['data_caleg'] = $this->Main_model->getAPI($url3);

		$url4 = 'https://andro.sitri.online/api/calegtask/allnf/asc';
		$ch4 = curl_init($url4);
		curl_setopt($ch4, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
		curl_setopt($ch4, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch4, CURLOPT_SSL_VERIFYPEER, false);
		$tes4 = curl_exec($ch4);
		curl_close($ch4);
		$data['caleg_task'] = json_decode($tes4, true);

		$url5 = 'https://andro.sitri.online/api/calegmandiri/allnf/asc';
		$ch5 = curl_init($url5);
		curl_setopt($ch5, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
		curl_setopt($ch5, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch5, CURLOPT_SSL_VERIFYPEER, false);
		$tes5 = curl_exec($ch5);
		curl_close($ch5);
		$data['task_mandiri'] = json_decode($tes5, true);
		$this->load->view('template/header',$data);
		$this->load->view('laporan/kegiatan_caleg',$data);
		$this->load->view('template/footer');
	}
	public function detail_caleg(){
		$data['active'] = 'laporan';
		$data['sub'] = 'menu31';
		$data['sub2'] = '';
		$value = $this->uri->segment(3);
		$url3 = 'https://andro.sitri.online/api/calegprofiles/idnf/'.$value;
		$data['data_caleg'] = $this->Main_model->getAPI($url3);
		// $url4 = 'https://andro.sitri.online/api/calegtask/caleg/'.$value;
		// $data['data_task'] = $this->Main_model->getAPI($url4);
		// $url5 = 'https://andro.sitri.online/api/calegmandiri/caleg/'.$value;
		// $data['task_mandiri'] = $this->Main_model->getAPI($url5);
		$this->load->view('template/header',$data);
		$this->load->view('laporan/detail_caleg',$data);
		$this->load->view('template/footer');
	}
	public function cetak_laporan_kegiatan_caleg()
	{
		$data['active'] = 'laporan';
		$data['sub'] = 'menu31';
		$data['sub2'] = '';
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

		$url3 = 'https://andro.sitri.online/api/calegprofiles/allnf/asc';
		$data['data_caleg'] = $this->Main_model->getAPI($url3);

		$url4 = 'https://andro.sitri.online/api/calegtask/allnf/asc';
		$ch4 = curl_init($url4);
		curl_setopt($ch4, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
		curl_setopt($ch4, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch4, CURLOPT_SSL_VERIFYPEER, false);
		$tes4 = curl_exec($ch4);
		curl_close($ch4);
		$data['caleg_task'] = json_decode($tes4, true);

		$url5 = 'https://andro.sitri.online/api/calegmandiri/allnf/asc';
		$ch5 = curl_init($url5);
		curl_setopt($ch5, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
		curl_setopt($ch5, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch5, CURLOPT_SSL_VERIFYPEER, false);
		$tes5 = curl_exec($ch5);
		curl_close($ch5);
		$data['task_mandiri'] = json_decode($tes5, true);
		// $this->load->view('template/header',$data);
		$this->load->view('laporan/cetak_laporan_kegiatan_caleg',$data);
		// $this->load->view('template/footer');
	}
	public function cetak_laporan_kegiatan_per_caleg()
	{
		$data['active'] = 'laporan';
		$data['sub'] = 'menu31';
		$data['sub2'] = '';
		$value = $this->uri->segment(3);
		$url3 = 'https://andro.sitri.online/api/calegprofiles/idnf/'.$value;
		$data['data_caleg'] = $this->Main_model->getAPI($url3);
		// $this->load->view('template/header',$data);
		$this->load->view('laporan/cetak_laporan_kegiatan_per_caleg',$data);
		// $this->load->view('template/footer');
	}
	/* Kegiatan Relawan */
	public function cetak_laporan_kegiatan_per_relawan()
	{
		$data['active'] = 'laporan';
		$data['sub'] = 'menu32';
		$data['sub2'] = '';
		$value = $this->uri->segment(3);
		$url3 = 'https://andro.sitri.online/api/strprofiles/id/'.$value;
		$data['data_str'] = $this->Main_model->getAPI($url3);
		// $this->load->view('template/header',$data);
		$this->load->view('laporan/cetak_laporan_kegiatan_per_relawan',$data);
		// $this->load->view('template/footer');
    }
	public function kegiatan_relawan()
	{
		$data['active'] = 'laporan';
		$data['sub'] = 'menu32';
		$data['sub2'] = '';
		//API URL
		$url = 'https://andro.sitri.online/api/kab/prov/31';
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

		$url3 = 'https://andro.sitri.online/api/strprofiles/all/asc';
		$data['data_relawan'] = $this->Main_model->getAPI($url3);

		$url4 = 'https://andro.sitri.online/api/strtask/all/asc';
		$ch4 = curl_init($url4);
		curl_setopt($ch4, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
		curl_setopt($ch4, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch4, CURLOPT_SSL_VERIFYPEER, false);
		$tes4 = curl_exec($ch4);
		curl_close($ch4);
		$data['relawan_task'] = json_decode($tes4, true);

		$url5 = 'https://andro.sitri.online/api/strmandiri/allnf/asc';
		$ch5 = curl_init($url5);
		curl_setopt($ch5, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
		curl_setopt($ch5, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch5, CURLOPT_SSL_VERIFYPEER, false);
		$tes5 = curl_exec($ch5);
		curl_close($ch5);
		$data['task_mandiri'] = json_decode($tes5, true);
		$this->load->view('template/header',$data);
		$this->load->view('laporan/kegiatan_relawan',$data);
		$this->load->view('template/footer');
	}
	public function detail_relawan(){
		$data['active'] = 'laporan';
		$data['sub'] = 'menu32';
		$data['sub2'] = '';
		$value = $this->uri->segment(3);
		$url3 = 'https://andro.sitri.online/api/strprofiles/id/'.$value;
		$data['data_relawan'] = $this->Main_model->getAPI($url3);
		// $url4 = 'https://andro.sitri.online/api/calegtask/caleg/'.$value;
		// $data['data_task'] = $this->Main_model->getAPI($url4);
		// $url5 = 'https://andro.sitri.online/api/calegmandiri/caleg/'.$value;
		// $data['task_mandiri'] = $this->Main_model->getAPI($url5);
		$this->load->view('template/header',$data);
		$this->load->view('laporan/detail_relawan',$data);
		$this->load->view('template/footer');
	}
	/* Lainnya */
	public function filter_laporan(){
        $value = $this->input->post('id');
        $modul = $this->input->post('modul');
        if($modul=='tingkat_pemilihan'){
			$data_d['pembagi'] = '';
			$url4 = 'https://andro.sitri.online/api/calegprofiles/resumeall/'.$value;
			$data_d['data_task'] = $this->Main_model->getAPI($url4);
			$rwrw = 'https://andro.sitri.online/api/rw/all/asc';
			$datarw = $this->Main_model->getAPI($rwrw);
			$jumlahrw = 0;
			foreach ($datarw as $key => $drw) {
				if($drw['Id_Kabupaten']=='3172'){
					$jumlahrw++;
				}
				else{echo'';}
			}
			$data_d['pembagi'] = $jumlahrw;
			$this->load->view('laporan/ajax_tabel',$data_d);
		}
		if($modul=='tingkat_pemilihan_relawan'){
			$url4 = 'https://andro.sitri.online/api/strprofiles/resumeall/'.$value;
			$data_d['data_task'] = $this->Main_model->getAPI($url4);
			$this->load->view('laporan/ajax_tabel3',$data_d);
	    }
	    elseif($modul=='dapil'){
			$url4 = 'https://andro.sitri.online/api/calegprofiles/resumeall/'.$value;
			$data_d['pembagi'] = '';
			$data_d['data_task'] = $this->Main_model->getAPI($url4);
			if($value=='B2081'){
				$data_d['pembagi'] = 89+62+94;
			}
			elseif($value=='B2082'){
				$data_d['pembagi'] = 6+16+10+14+11+16+9+9+5+6+12+16+6+10+10+17+18+13+10+13+14+11;
			}
			elseif($value=='B2083'){
				$data_d['pembagi'] = 53+14+10+12+6+7+5+5+8+6+12+8+6+6+53;
			}
			else{
				$rwrw = 'https://andro.sitri.online/api/rw/all/asc';
				$datarw = $this->Main_model->getAPI($rwrw);
				$jumlahrw = 0;
				foreach ($datarw as $key => $drw) {
					if($drw['Id_Kabupaten']=='3172'){
						$jumlahrw++;
					}
					else{echo'';}
				}
				$data_d['pembagi'] = $jumlahrw;
			}
			$this->load->view('laporan/ajax_tabel',$data_d);
	    }
	    elseif($modul=='kecamatan'){
			$url2 = 'https://andro.sitri.online/api/calegtask/calegwilayah/'.$this->input->post('id');
			$data = $this->Main_model->getAPI($url2);
			$data_d['data_task'] = $data;
			$data_d['id'] = $value;
			//$this->load->view('laporan/ajax_tabel2',$data_d);
			//print_r($data);
			$cek = array('Message'=>'Task not found');
			if($data==$cek){
				echo '<div style="text-align: center;">
				<p id="dynamic_pager_content2" class="well">Belum ada data yang tersedia</p>
			</div>';
			}
			else{
				$url21 = 'https://andro.sitri.online/api/rw/kec/'.$this->input->post('id');
				$data_d['pembagi'] = count($this->Main_model->getAPI($url21));
				$this->load->view('laporan/ajax_tabel2',$data_d);
			}
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
            echo "";
        }
    }
}