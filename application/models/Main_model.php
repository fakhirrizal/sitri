<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Main_model extends CI_Model{
    function manualQuery($q)
            {
                return $this->db->query($q);
            }	
  
    function tambahdata($tabel,$data){
          $res = $this->db->insert($tabel,$data);
          return $res;
        }
    public function getSelectedData($table,$data)
        {
            return $this->db->get_where($table, $data)->result();
		}
	function create($table, $data)
	{
		$t = $this->table;
		$s_t = $t[$table];
		$this->db->trans_begin();
		$this->db->trans_strict(FALSE);
		$new_id = FALSE;
		if ($this->db->insert($s_t, $data)) {
			$new_id = $this->db->insert_id();
		}
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
		} else {
			$this->db->trans_commit();
		}

		return $new_id;
	}
	function getAlldata($table){ 
            return $this->db->get($table)->result();
        }//query buat nampilin semua data dari sebuah tabel
    function updateData($table,$data,$field_key)
    {
        $this->db->update($table,$data,$field_key);
    }
    function deleteData($table,$data)
    {
        $this->db->delete($table,$data);
	}
	function getAPI($url){
		$ch2 = curl_init($url);
		$token = 'authan:'.$this->session->userdata('token');
		curl_setopt($ch2, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
		curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
		$tes2 = curl_exec($ch2);
		curl_close($ch2);
		$hasil = json_decode($tes2, true);
		return $hasil;
	}
	function deleteAPI($url){
		$ch = curl_init($url);
		$token = 'authan:'.$this->session->userdata('token');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE"); 
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$tes = curl_exec($ch);
		if(curl_error($ch))
			{
			    echo 'error:' . curl_error($ch);
			}
		curl_close($ch);
		$hasil = json_decode($tes, true);
		return $hasil;
	}
	function updateAPI($url,$data){
		$ch = curl_init($url);
		$token = 'authan:'.$this->session->userdata('token');
		$payload = json_encode($data);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$result = curl_exec($ch);
		$hasil = json_decode($result, true);
		return $hasil;
	}
	function insertAPI($url,$data){
		$ch = curl_init($url);
		$token = 'authan:'.$this->session->userdata('token');
		$payload = json_encode($data);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$result = curl_exec($ch);
		curl_close($ch);
		$hasil = json_decode($result, true);
		return $hasil;
	}
}