<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Master_model extends CI_Model{
    public function getKodeCDO()
    {
        $q = $this->db->query("select MAX(RIGHT(kd_user, 3)) as kd_max from user where kd_user like 'C-%'");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return "C-".$kd;
    }
    public function getKodeAdmin()
    {
        $q = $this->db->query("select MAX(RIGHT(kd_user, 3)) as kd_max from user where kd_user like 'A-%'");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return "A-".$kd;
    }
    public function getKodeAnggotaKelompok()
    {
        $q = $this->db->query("select MAX(RIGHT(kd_user, 3)) as kd_max from user where kd_user like 'K-%'");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return "K-".$kd;
    }
    public function data_log(){
        $q = $this->db->query("SELECT a.*,b.nama_lengkap,b.role from log_activity a left join user b on a.aktor=b.kd_user");
        return $q->result();
    }
    function kosongkan_log(){
        $q = $this->db->query("TRUNCATE TABLE log_activity");
        return $q;
    }
}