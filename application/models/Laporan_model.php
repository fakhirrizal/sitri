<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Laporan_model extends CI_Model{
    public function getKodeLaporanInventarisir()
    {
        
            $q = $this->db->query("select MAX(RIGHT(kode_laporan, 5)) as kd_max from laporan_inventarisir where kode_laporan like 'L-%'");
            $kd = "";
            if($q->num_rows()>0)
            {
                foreach($q->result() as $k)
                {
                    $tmp = ((int)$k->kd_max)+1;
                    $kd = sprintf("%05s", $tmp);
                }
            }
            else
            {
                $kd = "00001";
            }
            return "L-".$kd;
        
    }
    public function getKodeLaporan()
    {
        
            $q = $this->db->query("select MAX(RIGHT(kode_laporan, 5)) as kd_max from laporan_kegiatan where kode_laporan like 'L-%'");
            $kd = "";
            if($q->num_rows()>0)
            {
                foreach($q->result() as $k)
                {
                    $tmp = ((int)$k->kd_max)+1;
                    $kd = sprintf("%05s", $tmp);
                }
            }
            else
            {
                $kd = "00001";
            }
            return "L-".$kd;
        
    }
    public function getDataPemasukan($id){
        $q = $this->db->query("SELECT a.id,a.kode_laporan,a.create_date,a.status,a.kd_user FROM laporan_pemasukan a where a.kode_kegiatan='$id' and (a.status='1' or a.status='2') GROUP by a.kode_laporan");
        return $q->result();
    }
    public function getKodePemasukanAnggaran()
    {
        $q = $this->db->query("select MAX(RIGHT(kode_laporan, 4)) as kd_max from laporan_pemasukan where kode_laporan like 'PM-%'");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }
        else
        {
            $kd = "0001";
        }
        return "PM-".$kd;
    }
    public function getDataPengeluaran($id){
        $q = $this->db->query("SELECT a.id,a.kode_laporan,a.create_date,a.status,a.kd_user FROM laporan_pengeluaran a where a.kode_kegiatan='$id' and (a.status='1' or a.status='2') GROUP by a.kode_laporan");
        return $q->result();
    }
    public function getKodePengeluaranAnggaran()
    {
        $q = $this->db->query("select MAX(RIGHT(kode_laporan, 4)) as kd_max from laporan_pengeluaran where kode_laporan like 'PN-%'");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }
        else
        {
            $kd = "0001";
        }
        return "PN-".$kd;
    }
    public function getKodeFotoLaporan($kode)
    {
        if($kode=='1'){
            $q = $this->db->query("select MAX(RIGHT(kode_foto, 5)) as kd_max from foto_laporan_kegiatan where kode_foto like 'F-%'");
            $kd = "";
            if($q->num_rows()>0)
            {
                foreach($q->result() as $k)
                {
                    $tmp = ((int)$k->kd_max)+1;
                    $kd = sprintf("%05s", $tmp);
                }
            }
            else
            {
                $kd = "00001";
            }
            return "F-".$kd;
        }
        elseif($kode=='11'){
            $q = $this->db->query("select MAX(RIGHT(kode_foto, 5)) as kd_max from nota_pemasukan where kode_foto like 'F-%'");
            $kd = "";
            if($q->num_rows()>0)
            {
                foreach($q->result() as $k)
                {
                    $tmp = ((int)$k->kd_max)+1;
                    $kd = sprintf("%05s", $tmp);
                }
            }
            else
            {
                $kd = "00001";
            }
            return "F-".$kd;
        }
        else{
            $q = $this->db->query("select MAX(RIGHT(kode_foto, 5)) as kd_max from nota_pengeluaran where kode_foto like 'F-%'");
            $kd = "";
            if($q->num_rows()>0)
            {
                foreach($q->result() as $k)
                {
                    $tmp = ((int)$k->kd_max)+1;
                    $kd = sprintf("%05s", $tmp);
                }
            }
            else
            {
                $kd = "00001";
            }
            return "F-".$kd;
        }
    }
    public function getDataCSR(){
        $q = $this->db->query("SELECT a.*,c.nama_kelompok,e.nama_lengkap,(select count(cc.id) from laporan_kegiatan cc where cc.kode_kegiatan=a.kode_kegiatan and cc.status=1) as blm_disetujui from csr a left join kelompok c on a.kelompok=c.kode_kelompok left join user e on a.pic=e.kd_user where a.status='1' and (a.keterangan='approved' or a.keterangan='done')");
        return $q->result();
    }
    public function getDataKehati(){
        $q = $this->db->query("SELECT a.*,c.nama_kelompok,e.nama_lengkap,(select count(cc.id) from laporan_kegiatan cc where cc.kode_kegiatan=a.kode_kegiatan and cc.status=1) as blm_disetujui from kehati a left join kelompok c on a.kelompok=c.kode_kelompok left join user e on a.pic=e.kd_user where a.status='1' and (a.keterangan='approved' or a.keterangan='done')");
        return $q->result();
    }
    public function getDataKehatibyID($id){
        $q = $this->db->query("SELECT a.* from laporan_kehati a where a.status='1' and a.kode_kegiatan='$id' group by a.kode_laporan");
        return $q->result();
    }
    public function getDataBahanKehatibyID($id){
        $q = $this->db->query("SELECT a.*,(select sum(b.jumlah) from laporan_kehati b where b.kode_bahan=a.kode_bahan and b.status='1' and b.jenis='pengurangan') as jumlah_kurang, (select sum(b.jumlah) from laporan_kehati b where b.kode_bahan=a.kode_bahan and b.status='1' and b.jenis='penambahan') as jumlah_tambah from bahan_kehati a where a.kode_kegiatan='$id' and a.status='1'");
        return $q->result();
    }
    function getLapPemasukan($tgl_awal,$tgl_akhir,$jenis){
        return $this->db->query("SELECT * FROM laporan_pemasukan WHERE status='2' and jenis='$jenis' and create_date BETWEEN '$tgl_awal 00:00:00' AND '$tgl_akhir 23:59:59'")->result();
            }
    function getLapPengeluaran($tgl_awal,$tgl_akhir,$jenis){
        return $this->db->query("SELECT *,keperluan as keterangan FROM laporan_pengeluaran WHERE status='2' and jenis='$jenis' and create_date BETWEEN '$tgl_awal 00:00:00' AND '$tgl_akhir 23:59:59'")->result();
            }
    function getLapKegiatan($tgl_awal,$tgl_akhir,$jenis){
        return $this->db->query("SELECT * FROM laporan_kegiatan WHERE status='1' and jenis='$jenis' and create_date BETWEEN '$tgl_awal 00:00:00' AND '$tgl_akhir 23:59:59'")->result();
            }
}