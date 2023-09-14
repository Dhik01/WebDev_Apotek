<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

//fungsi-fungsi untuk user admin============================================
	public function admin(){
		$this->session->sess_destroy(); //untuk menghapus session
		$this->load->view('apotek/login_admin');
	}	

	public function validasi_admin(){ //validasi login
		$username = $this->input->post('username'); 
		$password = $this->input->post('password'); 
		$select='id';
		$where = array( 'username' => $username, 'password' => md5($password) ); 
		$cek = $this->M_login->cek_login($select,"tb_admin",$where)->num_rows();
		if($cek > 0){
			//membuat variable session
			$data_session = array( 'nama' => $username, 'status' => "login_admin" );
			$this->session->set_userdata($data_session);
			//echo "sukses";
			redirect(base_url("C_apotek/index"));
		}else{ 
			//echo "Username dan password salah !"; 
			redirect(base_url("Login/admin", 'refresh'));
			
		}
	}
}

//end of file Login.php
//location : application\controllers\