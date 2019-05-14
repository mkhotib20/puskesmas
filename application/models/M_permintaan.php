<?php
class M_permintaan extends CI_Model
{

  function __construct()
  {
    # code..
    $table = 'penerimaan';
		$this->load->database();
		$this->load->model('M_stok');
  }
  
  

  function create(){
      $no_permintaan = $this->input->post('no_permintaan');
      $tgl_permintaan = $this->input->post('tgl_permintaan');
			$nama_obat = strtolower($this->input->post('nama_obat'));
			$jumlah = $this->input->post('jumlah');
			

			$no_obat = $this->db->select('no_obat')->where('nama_obat',$nama_obat)->get("obat")->result_array();
      $obat = $no_obat[0]["no_obat"];
		// echo var_dump($no_obat[0]["no_obat"]);
      $data = array(
				'no_permintaan' => $no_permintaan,
			 'no_obat' => $no_obat[0]["no_obat"],
			 'jumlah' => $jumlah,
			 'tgl_permintaan' => $tgl_permintaan
			 
			);
      $data2 = array(
       'tgl_laporan' => $tgl_permintaan,
       'no_obat' => $obat,
       'jumlah_terima' => $jumlah,
      );


      $cek =  $this->M_stok->cekLaporan($obat);
      $cekTGL = $this->M_stok->cekTGL($tgl_permintaan);
      if ($cekTGL==0) {
        $this->db->insert("laporan",$data2);        
      }else{
        if ($cek==0) {
          $this->db->insert("laporan",$data2);
        }
        else{
          $this->db->query("UPDATE laporan SET jumlah_minta=jumlah_minta+$jumlah WHERE no_obat='$obat' AND tgl_laporan='$tgl_permintaan' ");
        }     
      }
			
			$this->db->insert("permintaan",$data);
			
  }

  function getLastId(){
    $last_row=$this->db->select('no_permintaan')->order_by('id',"desc")->limit(1)->get("permintaan")->row();
    if ($last_row == null)
    return 0;
    else
    return $last_row->no_permintaan;
  }
}
