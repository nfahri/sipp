<?php

class Lab extends CI_Model{
	function __construct(){
		$this->load->database();
		$this->load->helper('form');
	}

	function daftar_lab(){
		$hasil = $this->db->query("select lab_id_lab_pk, lab_nama_lab from lab");
		return $hasil->result_array();
	}

	function daftar_pc_lab($id_lab){
		$hasil = $this->db->query("select *
		from data_pc
		where dp_id_lab_fk=$id_lab and dp_status=1");
		return $hasil->result_array();
	}

	function getInfoPC($id_pc){
		$hasil = $this->db->query("select * from data_pc where dp_id_pc_pk=$id_pc");
		return $hasil->result_array();
	}

	function reservasi(){		
		$id_pc = $this->input->post("id_pc");
		$nama = $this->input->post("nama");
		$nrp = $this->input->post("nrp");
		$no_telp = $this->input->post("no_telp");
		$keperluan = $this->input->post("keperluan");
		$keterangan = $this->input->post("keterangan_tambahan");
		$tgl_mulai = $this->input->post("tgl_mulai");
		$tgl_selesai = $this->input->post("tgl_selesai");

		$this->db->query("update data_pc set dp_status=0 where dp_id_pc_pk=$id_pc");

		$this->db->query("insert into peminjaman_pc(pp_id_pc_fk,pp_nama_peminjam,pp_nrp_peminjam,pp_no_telp,pp_keperluan,pp_keterangan_tambahan,pp_tanggal_mulai,pp_tanggal_selesai) 
			values($id_pc,\"$nama\",\"$nrp\",\"$no_telp\",\"$keperluan\",\"$keterangan\", str_to_date(\"$tgl_mulai\",\"%m/%d/%Y\"), str_to_date(\"$tgl_selesai\",\"%m/%d/%Y\"))");

		return($this->db->affected_rows()!=1)?false:true;
	}

	function getKepalaLab($id_lab){
		$hasil = $this->db->query("select kl_nama_kepala_lab, kl_nomor_tlp, kl_email from kepala_lab where kl_id_kepala_lab_pk=$id_lab");

		return $hasil->result_array();
	}

	function login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$hasil = $this->db->query("select pg_id_lab_fk, pg_level_akses, pg_username
					from pengguna
					where pg_username=\"$username\" and pg_password=\"$password\"");
		return $hasil->result_array();
	}

	function ubahAction(){
		$id = $this->input->post('id_pc');
		$cpu = $this->input->post('cpu');
		$ram = $this->input->post('ram');
		$memori = $this->input->post('memori');

		$hasil = $this->db->query("update data_pc
			set dp_cpu=\"$cpu\", dp_ram=\"$ram\", dp_memori=\"$memori\"
			where dp_id_pc_pk=\"$id\"");

		return($this->db->affected_rows()!=1)?false:true;
	}

	function daftarPeminjam($id_lab){
		$hasil = $this->db->query("select * from peminjaman_pc where pp_id_pc_fk in (select dp_id_pc_pk from data_pc where dp_id_lab_fk=$id_lab)");

		return $hasil->result_array();
	}

	function hapusPeminjaman($id_peminjaman){		
		$this->db->query("update data_pc set dp_status=1 where dp_id_pc_pk=(select pp_id_pc_fk from peminjaman_pc where pp_id_peminjaman_pk=$id_peminjaman)");
		$this->db->query("delete from peminjaman_pc where pp_id_peminjaman_pk=$id_peminjaman");

		return($this->db->affected_rows()!=1)?false:true;
	}
}