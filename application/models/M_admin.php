<?php
class M_admin extends CI_Model{
  function __construct() {
    
    $this->load->database();
  }
  
  

  function login_authen(){

    $usernameAdmin = $this->input->post('username');
    $passwordAdmin = $this->input->post('password');
    $this->db->select('*');
    $this->db->where('username',$usernameAdmin);
    $this->db->from('user');
    $query = $this->db->get();
    if($query->num_rows() != 1)
     echo ('<script type="text/javascript">window.alert("User tidak terdaftar");window.location.href="'.base_url("login").'" </script>');
    $row = $query->row_array();
    if (strcmp($passwordAdmin,$row['password']) != 0)
     echo ('<script type="text/javascript">window.alert("Password salah");window.location.href="'.base_url("login").'" </script>');
    else
    $newdata = array(
      'admin_id' => $row['admin_id'],
      'logged_in_admin' => TRUE
    );
    $this->session->set_userdata($newdata);
    //return true;
  }
}
