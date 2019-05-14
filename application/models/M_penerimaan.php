<?php
class M_penerimaan extends CI_Model
{

  function __construct()
  {
    # code..
    $table = 'penerimaan';
		$this->load->database();
		$this->load->model('M_stok');
		$this->load->model('M_obat');
  }
  
  

  function create(){
	      $tgl_penerimaan = $this->input->post('tgl_penerimaan');
			$nama_obat = strtolower($this->input->post('nama_obat'));
			$jumlah = $this->input->post('jumlah');
			$exp_date = $this->input->post('exp_date');
			$batch_no = $this->input->post('batch_no');

			$no_obat = $this->db->select('no_obat')->where('nama_obat',$nama_obat)->get("obat")->result_array();
	
      $data = array(
      	'batch_no'=>$batch_no,
			 'no_obat' => $no_obat[0]["no_obat"],
			 'jumlah' => $jumlah,
			 'tgl_penerimaan' => $tgl_penerimaan,
			 'exp_date'	=>	$exp_date
			);
		    $stok_total =	$this->M_stok->getStockByObat($no_obat[0]["no_obat"]);
			$stok_sisa = $stok_total+$jumlah;
			$data2 = array(
			 'tgl_laporan' => $tgl_penerimaan,
			 'no_obat' => $no_obat[0]["no_obat"],
			 'jumlah_terima' => $jumlah,
			 'stok_obat' =>$stok_sisa
			);
			$obat = $no_obat[0]["no_obat"];
			echo $cek =	$this->M_stok->cekLaporan($obat);
			$cekTGL =	$this->M_stok->cekTGL($tgl_penerimaan);
			if ($cekTGL==0) {
				$this->db->insert("laporan",$data2);				
			}else{
				if ($cek==0) {
					$this->db->insert("laporan",$data2);
				}
				else{
					$this->db->query("UPDATE laporan SET jumlah_terima=jumlah_terima+$jumlah WHERE no_obat='$obat' AND tgl_laporan='$tgl_penerimaan'");
					$this->db->query("UPDATE laporan SET stok_obat=$stok_sisa WHERE no_obat='$obat' AND tgl_laporan='$tgl_penerimaan'");
				}			
			}

			$this->db->insert("penerimaan",$data);
			$this->M_stok->create($data);
  }

  function getLastId(){
    $last_row=$this->db->select('id')->order_by('id',"desc")->limit(1)->get("penerimaan")->row();
    if ($last_row == null)
    return 0;
    else
    return $last_row->id;
  }
}
