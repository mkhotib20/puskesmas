<?php
class M_pemakaian extends CI_Model
{

  function __construct()
  {
    # code..
    $table = 'pemakaian';
		$this->load->database();
		$this->load->model('M_obat');
		$this->load->model('M_stok');
  }
  
  

  function create(){
  	
			$no_pemakaian = $this->input->post('no_pemakaian');
			$obat = $this->input->post('no_obat');
      		$tgl_pemakaian = $this->input->post('tgl_pemakaian');
			$jumlah_pemakaian = $this->input->post('jumlah_pemakaian');
			$batch_no = $this->db->query("SELECT * FROM stok_obat where no_obat=$obat and jumlah_stok>0 order BY exp_date asc limit 1")->result_array();
		  	foreach ($batch_no as $bo) {
		  	 	$batch_number = $bo['batch_no'];
		  	 } 
			

		
		$totalStok =	$this->M_stok->getUsableTotalStokByBatch($batch_number);
		
		if ($jumlah_pemakaian > $totalStok){
			echo ('<script type="text/javascript">window.alert("Stok tidak cukup");window.location.href="'.base_url("pemakaian").'" </script>');
		}
		else{

			$dataUse = array('batch_no' => $batch_number,
											'jumlah_pemakaian' => $jumlah_pemakaian
											);

			
			$stok_total =	$this->M_stok->getStockByObat($obat);
			$stok_sisa = $stok_total-$jumlah_pemakaian;
			$this->M_stok->consume($dataUse); //mengurangi stok
		 
			$data = array(
			'no_pemakaian' => $no_pemakaian,
			 'batch_no' => $batch_number,
			 'jumlah_pemakaian' => $jumlah_pemakaian,
			 'tgl_pemakaian' => $tgl_pemakaian
			);
			$data2 = array(
			 'tgl_laporan' => $tgl_pemakaian,
			 'no_obat' => $obat,
			 'jumlah_pakai' => $jumlah_pemakaian,
			 'stok_obat' =>$stok_sisa
			);


			$cek =	$this->M_stok->cekLaporan($obat);
			$cekTGL =	$this->M_stok->cekTGL($tgl_pemakaian);
			if ($cekTGL==0) {
				$this->db->insert("laporan",$data2);				
			}else{
				if ($cek==0) {
					$this->db->insert("laporan",$data2);
				}
				else{
					$this->db->query("UPDATE laporan SET jumlah_pakai=jumlah_pakai+$jumlah_pemakaian WHERE no_obat='$obat' AND tgl_laporan='$tgl_pemakaian' ");
					echo $this->db->query("UPDATE laporan SET stok_obat=$stok_sisa WHERE no_obat='$obat' AND tgl_laporan='$tgl_pemakaian'");
				}			
			}

			$this->db->insert("pemakaian",$data);

			redirect('pemakaian');
		}
  }

  function getLastId(){
    $last_row=$this->db->select('no_pemakaian')->order_by('id',"desc")->limit(1)->get("pemakaian")->row();
    if ($last_row == null)
    return 0;
    else
    return $last_row->no_pemakaian;
  }
}
