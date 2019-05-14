<?php
class M_obat extends CI_Model
{
  function __construct()
  {
    # code..
    $table = 'users';
    $this->load->database();
  }
  
  

  function createObat(){
      $no_obat = $this->input->post('no_obat');
      $nama_obat = strtolower($this->input->post('nama_obat'));
      $tipe = $this->input->post('tipe');
      $data = array(
        "no_obat"   => $this->input->post('no_obat'),
        "nama_obat" => $this->input->post('nama_obat'),
        "tipe"      => $this->input->post('tipe')
      );
      $this->db->insert("obat",$data);
	}
	
	function getObat($id=FALSE){

		if(!$id){
			$query = $this->db->query('select * from obat');
			return $query->result();
		}
	}

  function read()
  {
    return $query = $this->db->query("SELECT * FROM obat");
  }

  function getLastId(){
    $last_row=$this->db->select('no_obat')->order_by('id_obat',"desc")->limit(1)->get('obat')->row();
    if ($last_row == null)
    return 0;
    else
    return $last_row->no_obat;
   
	}
	
	function getNoObatByNama($nama_obat){
		$no_obat_array = $this->db->select('no_obat')->where('nama_obat',$nama_obat)->get("obat")->result_array();
		$no_obat = $no_obat_array[0]["no_obat"];
		return $no_obat;
	}
}
