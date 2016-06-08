<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instabuy extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	//-----------------------
	// Product pages display
	//-----------------------

	public function index() {

		session_start();
		$this->load->helper('url');

		if (!empty($_SESSION['memberID']) && ((time() - $_SESSION['loggedin_time']) > 300)) { 

			unset($_SESSION['loggedin_time']);
			session_destroy();
			header("location: http://cs-server.usc.edu:8436/CodeIgniter/index.php/logout");

		} else {

			$this->load->model('instabuy_model');
			$results = $this->instabuy_model->welcome();
			$this->load->view('welcome_view', $results);

		}

	}

	public function technologies() {

		session_start();
		$this->load->helper('url');

		if (!empty($_SESSION['memberID']) && ((time() - $_SESSION['loggedin_time']) > 300)) { 

			unset($_SESSION['loggedin_time']);
			session_destroy();
			header("location: http://cs-server.usc.edu:8436/CodeIgniter/index.php/logout");

		} else {

			$this->load->model('instabuy_model');
			$results = $this->instabuy_model->technologies();
			$this->load->view('technologies_view', $results);

		}

	}

	public function furnitures() {

		session_start();
		$this->load->helper('url');

		if (!empty($_SESSION['memberID']) && ((time() - $_SESSION['loggedin_time']) > 300)) { 

			unset($_SESSION['loggedin_time']);
			session_destroy();
			header("location: http://cs-server.usc.edu:8436/CodeIgniter/index.php/logout");

		} else {

			$this->load->model('instabuy_model');
			$results = $this->instabuy_model->furnitures();
			$this->load->view('furnitures_view', $results);

		}

	}

	public function clothings() {

		session_start();
		$this->load->helper('url');

		if (!empty($_SESSION['memberID']) && ((time() - $_SESSION['loggedin_time']) > 300)) { 

			unset($_SESSION['loggedin_time']);
			session_destroy();
			header("location: http://cs-server.usc.edu:8436/CodeIgniter/index.php/logout");

		} else {

			$this->load->model('instabuy_model');
			$results = $this->instabuy_model->clothings();
			$this->load->view('clothings_view', $results);

		}

	}

	public function automobiles() {

		session_start();
		$this->load->helper('url');

		if (!empty($_SESSION['memberID']) && ((time() - $_SESSION['loggedin_time']) > 300)) { 

			unset($_SESSION['loggedin_time']);
			session_destroy();
			header("location: http://cs-server.usc.edu:8436/CodeIgniter/index.php/logout");

		} else {

			$this->load->model('instabuy_model');
			$results = $this->instabuy_model->automobiles();
			$this->load->view('automobiles_view', $results);

		}

	}

	public function hotSales() {

		session_start();
		$this->load->helper('url');

		if (!empty($_SESSION['memberID']) && ((time() - $_SESSION['loggedin_time']) > 300)) { 

			unset($_SESSION['loggedin_time']);
			session_destroy();
			header("location: http://cs-server.usc.edu:8436/CodeIgniter/index.php/logout");

		} else {

			$this->load->model('instabuy_model');
			$results = $this->instabuy_model->hotSales();
			$this->load->view('hotSales_view', $results);

		}

	}

	//-------------------------------------
	// Click product title to show details
	//-------------------------------------

	public function product($productID) {

		session_start();
		$this->load->helper('url');

		if (!empty($_SESSION['memberID']) && ((time() - $_SESSION['loggedin_time']) > 300)) { 

			unset($_SESSION['loggedin_time']);
			session_destroy();
			header("location: http://cs-server.usc.edu:8436/CodeIgniter/index.php/logout");

		} else {

			$this->load->model('instabuy_model');
			$results = $this->instabuy_model->product($productID);
			$this->load->view('product_view', $results);

		}

	}

	public function salesProduct($productID) {

		session_start();
		$this->load->helper('url');

		if (!empty($_SESSION['memberID']) && ((time() - $_SESSION['loggedin_time']) > 300)) { 

			unset($_SESSION['loggedin_time']);
			session_destroy();
			header("location: http://cs-server.usc.edu:8436/CodeIgniter/index.php/logout");

		} else {
			
			$this->load->model('instabuy_model');
			$results = $this->instabuy_model->salesProduct($productID);
			$this->load->view('salesProduct_view', $results);

		}

	}

}
?>