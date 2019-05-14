<?php
class M_stok extends CI_Model
{

  function __construct()
  {
    # code..
		$table = 'penerimaan';
		$this->load->model("M_obat");
    $this->load->database();
  }
  function readStok()
  {
    return $query = $this->db->query("SELECT SUM(jumlah_stok) as jumlahStok FROM stok_obat");
  }
  
  public function readExp($date1, $date2)
  {
  	return $this->db->query("SELECT * FROM `stok_obat` WHERE (exp_date BETWEEN '$date1' AND '$date2')");
  }
  
  public function getExpDate($no_obat){
  		$query = $this->db->query("SELECT no_obat, exp_date FROM stok_obat where no_obat='$no_obat' and jumlah_stok>0 order BY exp_date asc limit 1")->result();
		$expDate = $query[0]->exp_date;
		return $expDate;
  }

  function create($penerimaan){
			
		$data=array(
			'batch_no' => $penerimaan["batch_no"],
			'no_obat' => $penerimaan["no_obat"],
			'jumlah_stok' => $penerimaan["jumlah"],
			'exp_date' => $penerimaan['exp_date']
		);
		// echo var_dump($penerimaan["batch_no"]);
		$this->db->insert('stok_obat',$data);
  }

	function consume($data){

		 $pemakaian = $data["jumlah_pemakaian"];
		 $batch_no = $data["batch_no"];
		return $query = $this->db->query("UPDATE stok_obat SET jumlah_stok=jumlah_stok-$pemakaian WHERE batch_no=$batch_no ");

	}

	function getUsableTotalStokByBatch($batch_no){

		$this->db->select_sum('jumlah_stok','total_stok');
		$this->db->from('stok_obat');
		$this->db->join('penerimaan','penerimaan.batch_no = stok_obat.batch_no','left');
		$this->db->where('stok_obat.batch_no =',$batch_no);
		$this->db->where('stok_obat.exp_date >', date('Y-m-d'));
		$query = $this->db->get()->result();
		$total_stok = $query[0]->total_stok;
		return $total_stok;
		
	}
	function getStockByObat($no_obat){
		$query = $this->db->query("SELECT sum(jumlah_stok) as totalStok FROM stok_obat where no_obat = '$no_obat' GROUP BY no_obat")->result();
		$total_stok = $query[0]->totalStok;
		return $total_stok;
		
	}
	public function cekLaporan($no_obat)
	{
		$query = $this->db->query("SELECT EXISTS(SELECT * FROM laporan WHERE no_obat='$no_obat') as cek")->result();
		$boolean = $query[0]->cek;
		return $boolean;
	}
	public function cekTGL($tgl)
	{
		$query = $this->db->query("SELECT EXISTS(SELECT * FROM laporan WHERE tgl_laporan='$tgl') as cekTGL")->result();
		$boolean = $query[0]->cekTGL;
		return $boolean;
	}
	public function tglExp($no_obat)
	{
		$query = $this->db->query("SELECT no_obat, exp_date, jumlah_stok FROM stok_obat where no_obat='$no_obat' and jumlah_stok>0 order BY exp_date asc limit 1")->result();
		$expDate = $query[0];
		return $expDate;
	}
 
}
