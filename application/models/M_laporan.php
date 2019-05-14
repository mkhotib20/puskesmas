<?php 
/**
 * 
 */
class M_laporan extends CI_Model
{
	
	function readPemakaian(){
		return $query = $this->db->query("SELECT pemakaian.id, stok_obat.no_obat, jumlah_pemakaian, obat.nama_obat, tgl_pemakaian FROM pemakaian INNER JOIN (stok_obat inner join obat on stok_obat.no_obat=obat.id_obat) on pemakaian.batch_no=stok_obat.batch_no
");

	}
	function readPenerimaan(){
		return $query = $this->db->query("SELECT penerimaan.id, obat.nama_obat, jumlah, tgl_penerimaan FROM penerimaan INNER JOIN obat on penerimaan.no_obat=obat.id_obat");

	}
	function readPermintaan(){
		return $query = $this->db->query("SELECT permintaan.id, obat.nama_obat, jumlah, tgl_permintaan FROM permintaan INNER JOIN obat on permintaan.no_obat=obat.id_obat");

	}
	function readLaporan(){
		return $query = $this->db->query("SELECT * FROM laporan, obat WHERE laporan.no_obat = obat.no_obat");

	}
	function readLaporanBulan($bulan, $tahun){
		return $query = $this->db->query("SELECT * FROM laporan, obat WHERE laporan.no_obat = obat.no_obat AND MONTHNAME(laporan.tgl_laporan)= '$bulan' AND YEAR(laporan.tgl_laporan)= '$tahun'");

	}
	function readStok(){
		return $query = $this->db->query("SELECT * FROM stok_obat INNER JOIN obat on stok_obat.no_obat=obat.id_obat");

	}
	function readStokExp($date1, $date2){
		return $query = $this->db->query("SELECT * FROM stok_obat INNER JOIN obat on stok_obat.no_obat=obat.id_obat WHERE (exp_date BETWEEN '$date1' AND '$date2')");

	}
}
 ?>