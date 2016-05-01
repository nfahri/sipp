<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('Layout');
		$this->load->model("Lab");
		$this->load->library('session');
	}

	public function index(){		
		$data["daftar_lab"] = $this->Lab->daftar_lab();
		$this->layout->render('index2', $data);
	}

	public function lab($id_lab){		
		if(($this->session->userdata('akses')!=NULL && $this->session->userdata('lab')==$id_lab) || ($this->session->userdata('akses')==NULL)){
			$data["daftar_lab"] = $this->Lab->daftar_lab();
			$data["daftar_pc"] = $this->Lab->daftar_pc_lab($id_lab);
			$data["id_lab"] = $id_lab;
			$this->layout->render("daftar_pc_lab",$data);
		}
	}

	public function login(){
		$this->load->helper('form');
		if($_SERVER['REQUEST_METHOD']=='GET'){
			$data["daftar_lab"] = $this->Lab->daftar_lab();
			$this->layout->render("form_login", $data);
		}
		else{
			
			$this->load->helper('url');
			$data["daftar_lab"] = $this->Lab->daftar_lab();
			$login = $this->Lab->login();
			if(sizeof($login)==0){
				$this->session->set_flashdata('status_login','gagal');
				redirect(base_url()."beranda/login", $data);
			}
			else{
				$this->session->set_flashdata('status_login','berhasil');
				$this->session->set_userdata('username',$login[0]["pg_username"]);
				$this->session->set_userdata('akses',$login[0]["pg_level_akses"]);
				$this->session->set_userdata('lab',$login[0]["pg_id_lab_fk"]);
				// var_dump($login);
				// var_dump($this->session->userdata);
				// exit();
				redirect(base_url()."beranda",$data);
			}
		}

	}

	public function logout(){
		
		$this->load->helper('url');
		$data["daftar_lab"] = $this->Lab->daftar_lab();
		$this->session->sess_destroy();
		redirect(base_url()."beranda",$data);
	}

	public function ubahDetail($id_pc){
		$this->load->helper('url');
		if($_SERVER['REQUEST_METHOD']=='GET'){
			$data['info_pc'] = $this->Lab->daftar_pc_lab($id_pc);
			$this->layout->render('form_ubah_detail',$data);
		}
		else{
			$this->load->helper('form');
			if($this->Lab->ubahAction()){
				$this->session->set_flashdata('status_ganti_detail','berhasil');
				redirect(base_url()."beranda/lab/".$this->session->userdata('lab'));
			}

		}
	}

	// public function ubahAction(){
	// 	$this->load->helper('form');
	
	// 	$id_lab = $this->input->post('id_lab');
	// 	if($this->Lab->ubahDeskripsi()){
	// 		$this->session->set_flashdata('status_ubah','berhasil');
	// 		redirect(base_url()."Beranda/lab/".$id_lab);
	// 	}
	// }
		
}
