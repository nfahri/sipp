<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('Layout');
		$this->load->model("Lab");
		$this->load->library('session');
	}

	public function formPeminjaman($id_lab, $id_pc){
		$data["daftar_lab"] = $this->Lab->daftar_lab();
		$data["info_pc"] = $this->Lab->getInfoPC($id_pc);
		$data["id_lab"] = $id_lab;
		$style1 = "<link rel=\"stylesheet\" href=\"//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css\">";
  		$style2 = "<script src=\"//code.jquery.com/ui/1.11.4/jquery-ui.js\"></script>";
  		$data["styles"] = array($style1, $style2);
		$this->layout->render("form_peminjaman", $data);
	}

	public function action(){
		$this->load->helper('form');
		$id_lab = $this->input->post('id_lab');
		if($this->Lab->reservasi()){
			$this->session->set_flashdata('status_peminjaman','berhasil');
			$this->session->set_flashdata('kepala_lab',$this->Lab->getKepalaLab($id_lab));
			redirect(base_url()."Beranda/lab/".$id_lab);
		}
		$this->session->set_flashdata('status_peminjaman','gagal');
		redirect(base_url()."Beranda/lab/".$id_lab);
	}

	public function lab($id_lab){
		$this->load->helper('url');
		$data['daftar_peminjam'] = $this->Lab->daftarPeminjam($id_lab);
		$this->layout->render('daftar_peminjam', $data);
	}

	public function hapusPeminjaman($id_peminjaman){
		$this->load->helper('url');
		if($this->Lab->hapusPeminjaman($id_peminjaman)){
			$this->session->set_flashdata('status_hapus_peminjaman','berhasil');
			redirect(base_url()."peminjaman/lab/".$this->session->userdata('lab'));
		}
	}
}
