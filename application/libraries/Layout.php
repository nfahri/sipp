<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Layout
{
	function __construct() {
		$this->ci = &get_instance();
		$this->ci->load->model('Lab');
		$this->ci->load->helper('url');
	}

	function render($url, $data=NULL) {
		$this->ci->load->view('template/header', $data);
		$this->ci->load->view($url, $data);
		// $this->ci->load->view('template/footer', $data);
	}
}