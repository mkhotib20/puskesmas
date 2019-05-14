<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_admin extends CI_Controller {
	function __construct()
		{
			parent::__construct();
			$this->load->model('M_admin');
			$this->load->model('M_obat');
			$this->load->model('M_penerimaan');
			$this->load->model('M_permintaan');
			$this->load->model('M_pemakaian');
			$this->load->model('M_stok');
			$this->load->helper(array('form', 'url'));
	}
	
	public function index($page="", $menuName="dashboard")	{
		if($_SESSION['logged_in_admin']){
			$obat = $this->M_stok->readStok()->result_array();
			$stokObat = $this->laporan->readStok()->result_array();
			$today = date('Y-m-d');
			$exp = date('Y-m-d', strtotime("+60 days"));	
			
			$expDate = $this->M_stok->readExp($today, $exp)->num_rows();

			

			$data = array('var' => $page,'menuName'=>$menuName, 'jumlahObat'=>$obat, 'exp'=>$expDate, 'result'=>$stokObat);
			$this->load->view("admin/layout/header", $data);
			$this->load->view("admin/index", $data);
			$this->load->view("admin/layout/footer");
		}
		else{
			redirect('login');
		}
		
	}
	public function login(){
		
	 $this->load->helper('form');
	 $this->load->library('form_validation');
	 $this->form_validation->set_rules('username', 'username', 'required');
	 $this->form_validation->set_rules('password', 'password', 'required');
	 if ($this->form_validation->run() == FALSE)
		 $this->load->view('admin/login');
		 else
		{
			$this->M_admin->login_authen();
		 if ($_SESSION['logged_in_admin'] == TRUE) {
		 	
		 	redirect(base_url());
		 }
		 else{
		 	echo ('<script type="text/javascript">window.alert("User12 tidak terdaftar");window.location.href="'.base_url("login").'" </script>');
		 }
		 
		 
		 
		}
	}

	public function obat($menuName="obat"){
		if($_SESSION['logged_in_admin']){
			$this->load->library('form_validation');

			$this->form_validation->set_rules('nama_obat', 'nama_obat', 'required');
			$this->form_validation->set_rules('no_obat', 'no_obat', 'required');
			$this->form_validation->set_rules('tipe', 'tipe', 'required');
			
			if ($this->form_validation->run() == FALSE)
			{
				$nextId = $this->M_obat->getLastId()+1;
				$data = array('menuName'=>$menuName,
								'nextId' => $nextId
							 );
				$this->load->view("admin/layout/header",$data);
				$this->load->view("admin/obat");
				$this->load->view("admin/layout/footer");
			}
			else{
				$this->M_obat->createObat();
				redirect('obat');
			}
		}
		else
		redirect('login');
	}
	public function pemakaian($menuName="pemakaian"){
		if($_SESSION['logged_in_admin']){
			$this->load->library('form_validation');
			$obat = $this->M_obat->read()->result_array();

			$this->form_validation->set_rules('no_pemakaian', 'no_pemakaian', 'required');
			$this->form_validation->set_rules('tgl_pemakaian', 'tgl_pemakaian', 'required');
			$this->form_validation->set_rules('no_obat', 'no_obat', 'required');
			$this->form_validation->set_rules('jumlah_pemakaian', 'jumlah_pemakaian', 'required');
			
			if ($this->form_validation->run() == FALSE)
			{
			$data = array('menuName'=>$menuName, 'obat'=>$obat,
							'nextId' => $this->M_pemakaian->getLastId()+1					
		);
			$this->load->view("admin/layout/header",$data);
			$this->load->view("admin/pemakaian");
			$this->load->view("admin/layout/footer");
			}
			else{
				$this->M_pemakaian->create();
				
			}
		}
		else
		redirect('login');
	}
	public function print($jenisLaporan, $bulan="", $tahun=0){
		if($_SESSION['logged_in_admin']){
			switch ($jenisLaporan) {
				case 'stok':
					$result = $this->laporan->readStok()->result_array();
					break;
				case 'pemakaian':
					$result = $this->laporan->readPemakaian()->result_array();
					break;
				case 'penerimaan':
					$result = $this->laporan->readPenerimaan()->result_array();
					break;
				case 'permintaan':
					$result = $this->laporan->readPermintaan()->result_array();
					break;
				case 'keseluruhan':
					if ($bulan=="" || $tahun==0) {
						$result = $this->laporan->readLaporan()->result_array();
					}
					else
						$result = $this->laporan->readLaporanBulan($bulan,$tahun)->result_array();
					break;
				
				default:
					break;
			}		
			
			$data = array('result'=>$result,'jenisLaporan'=>$jenisLaporan);
			$this->load->view("admin/print", $data);
		}
		else
		redirect('login');
	}
	public function permintaan($menuName="permintaan"){
		if($_SESSION['logged_in_admin']){
			$this->load->library('form_validation');
			$obat = $this->M_obat->read()->result_array();

			$this->form_validation->set_rules('no_permintaan', 'no_permintaan', 'required');
			$this->form_validation->set_rules('tgl_permintaan', 'tgl_permintaan', 'required');
			$this->form_validation->set_rules('nama_obat', 'nama_obat', 'required');
			$this->form_validation->set_rules('jumlah', 'jumlah', 'required');
			
			
			if ($this->form_validation->run() == FALSE)
				{
					$data = array('menuName'=>$menuName, 'obat'=>$obat,
									'nextId' =>$this->M_permintaan->getLastId()+1
				);
					$this->load->view("admin/layout/header",$data);
					$this->load->view("admin/permintaan");
					$this->load->view("admin/layout/footer");
				}
			else{
				$this->M_permintaan->create();
				redirect('permintaan');
			}
		}
		else
		redirect('login');
	}
	public function penerimaan($menuName="penerimaan"){
		if($_SESSION['logged_in_admin']){
			$this->load->library('form_validation');

			$this->form_validation->set_rules('batch_no', 'batch_no', 'required');
			$this->form_validation->set_rules('tgl_penerimaan', 'tgl_penerimaan', 'required');
			$this->form_validation->set_rules('nama_obat', 'nama_obat', 'required');
			$this->form_validation->set_rules('jumlah', 'jumlah', 'required');
			$this->form_validation->set_rules('exp_date', 'exp_date', 'required');
			$obat = $this->M_obat->read()->result_array();
			if ($this->form_validation->run() == FALSE)
			{
			$data = array('menuName'=>$menuName, 'obat'=>$obat,
						'nextId'=>$this->M_penerimaan->getLastId()+1,
						'listObat'=> json_encode($this->M_obat->getObat())
						);
						
			$this->load->view("admin/layout/header",$data);
			$this->load->view("admin/penerimaan", $data);
			$this->load->view("admin/layout/footer");
			// $this->load->view("admin/script/penerimaan-script",$data);
			}
			else{
		
				$this->M_penerimaan->create();
				
				redirect('penerimaan');
			}
		}
		else
		redirect('login');
	}
	
	public function logout(){
		session_destroy();
		redirect('');
	}
	public function laporanPemakaian($menuName="laporanPemakaian", $subMenu=""){
		if($_SESSION['logged_in_admin']){
			$result = $this->laporan->readPemakaian()->result_array();
			$data = array('menuName'=>$menuName,'result'=>$result);
			$this->load->view("admin/layout/header",$data);
			$this->load->view("admin/laporanPemakaian");
			$this->load->view("admin/layout/footer");
		}
		else
		redirect('login');
	}
	public function laporanPenerimaan($menuName="laporanPenerimaan", $subMenu=""){
		if($_SESSION['logged_in_admin']){
			$result = $this->laporan->readPenerimaan()->result_array();
			$data = array('menuName'=>$menuName,'result'=>$result);
			$this->load->view("admin/layout/header",$data);
			$this->load->view("admin/laporanPenerimaan");
			$this->load->view("admin/layout/footer");
		}
		else
		redirect('login');
	}
	public function laporanPermintaan($menuName="laporanPermintaan", $subMenu=""){
		if($_SESSION['logged_in_admin']){
			$result = $this->laporan->readPermintaan()->result_array();
			$data = array('menuName'=>$menuName,'result'=>$result);
			$this->load->view("admin/layout/header",$data);
			$this->load->view("admin/laporanPermintaan");
			$this->load->view("admin/layout/footer");
		}
		else
		redirect('login');
	}
	public function laporanKeseluruhan($menuName="laporanKeseluruhan", $subMenu=""){
		if($_SESSION['logged_in_admin']){
			$result = $this->laporan->readLaporan()->result_array();
			$data = array('menuName'=>$menuName,'result'=>$result);
			$this->load->view("admin/layout/header",$data);
			$this->load->view("admin/laporan");
			$this->load->view("admin/layout/footer");
		}
		else
		redirect('login');
	}
	public function laporanKeseluruhanBulan($menuName="laporanKeseluruhan", $subMenu=""){
		if($_SESSION['logged_in_admin']){
			$bulan = $_GET['bulan'];
			$tahun = $_GET['tahun'];
			$result = $this->laporan->readLaporanBulan($bulan, $tahun)->result_array();
			$data = array('menuName'=>$menuName,'result'=>$result);
			$this->load->view("admin/layout/header",$data);
			$this->load->view("admin/laporan");
			$this->load->view("admin/layout/footer");
		}
		else
		redirect('login');
	}
	public function laporanStok($menuName="laporanStok", $subMenu=""){
		if($_SESSION['logged_in_admin']){
			$result = $this->laporan->readStok()->result_array();
			$data = array('menuName'=>$menuName,'result'=>$result);
			$this->load->view("admin/layout/header",$data);
			$this->load->view("admin/laporanStok");
			$this->load->view("admin/layout/footer");
		}
		else
		redirect('login');
	}
}
