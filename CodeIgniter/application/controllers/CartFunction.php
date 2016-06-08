<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CartFunction extends CI_Controller {

	public function cartView() {

		session_start();
		$this->load->helper('url');

		if (!empty($_SESSION['memberID']) && ((time() - $_SESSION['loggedin_time']) > 300)) { 

			unset($_SESSION['loggedin_time']);
			session_destroy();
			header("location: http://cs-server.usc.edu:8436/CodeIgniter/index.php/logout");

		} else {
			
			$this->load->model('instabuy_model');
			$results = $this->instabuy_model->cartView();
			$this->load->view('cart_view', $results);

		}

	}

	public function cart() {

		session_start();
		$this->load->helper('url');

		$memberID = $_SESSION['memberID'];
		$submit = $_POST['submit'];

		$action = 0; // 0 = Initial, 1 = ???, 2 = Add or Update or Remove item

		if (empty($memberID)) {

			header('location: http://cs-server.usc.edu:8436/CodeIgniter/index.php/LoggingProcess');

		} else {

			if ($submit == 'Add to cart') {

				$productID = $_POST['productID'];
				$productName = $_POST['productName'];
				$productPrice = $_POST['productPrice'];
				$productQuantity = $_POST['productQuantity'];
				$total = $productPrice * $productQuantity;

				$this->load->model('instabuy_model');
				$results = $this->instabuy_model->cartAddItem($memberID, $productID, $productName, $productPrice, $productQuantity, $total, $action);


			} elseif ($submit == 'Remove') {

				// getting product ID and member ID for deletion
				$productID = $_POST['productID'];

				$this->load->model('instabuy_model');
				$results = $this->instabuy_model->cartRemoveItem($memberID, $productID, $action);

			} elseif ($submit == 'Update') {

				// getting quantatity, product ID, product price and member ID for an update
				$productID = $_POST['productID'];
				$productPrice = $_POST['productPrice'];
				$productQuantity = $_POST['changeQuantity'];

				// update total
				$productTotal = $productQuantity * $productPrice;

				$this->load->model('instabuy_model');
				$results = $this->instabuy_model->cartUpdateItem($memberID, $productID, $productPrice, $productQuantity, $productTotal, $action);

			}

		}

		if ($results == 0) {

			echo 'Error! Action is incompleted!';

		} elseif ($results == 2) {

			$this->load->model('instabuy_model');
			$results = $this->instabuy_model->cartView();

			$this->load->view('cart_view', $results);

		}

	}

}
?>