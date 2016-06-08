<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function index() {

		session_start();
		$this->load->helper('url');
		$this->load->view('logout_view');

	}

}
?>