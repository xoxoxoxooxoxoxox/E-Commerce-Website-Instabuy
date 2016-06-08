<?php

session_start();

function test() {

	echo 'I am in!';
}

function sessionTooLong() {
	echo "<div id = 'error'>"."*"."Your session has been expired, please re-login."."*"."</div>";
}

function checkOnSales() {

	$data = array();
	$sql = "SELECT * FROM SpecialSales";
	$result = mysql_query($sql);

	if ($result) {
		if (mysql_num_rows($result) > 0) {
			while ($row = mysql_fetch_assoc($result)) {
				$data[] = $row;
			}
		}
		mysql_free_result($result);

	} else {
		echo 'No data in special sales table! '.mysql_error();
	}

	return $data;

}

function getHotSales() {

	$data = array();
	$sql = "SELECT * FROM (SELECT Product.productID,
										  productName,
										  productCategoryID,
										  Product.productPrice AS price,
										  ROUND(Product.productPrice * SpecialSales.price,2) AS finalPrice,
										  productImage,
										  productDescription,
										  SpecialSales.startDate AS sdate,
										  SpecialSales.endDate AS edate 
					FROM Product JOIN SpecialSales ON Product.productID = SpecialSales.productID) AS Final";
	$result = mysql_query($sql);

	if ($result) {
		if (mysql_num_rows($result) > 0) {
			while ($row = mysql_fetch_assoc($result)) {
				$data[] = $row;
			}
		}
		mysql_free_result($result);

	} else {
		echo 'No data in the order table! '.mysql_error();
	}

	return $data;
}

function getSalesProdcut($id) {

	$data = null;
	$date = date('Y-m-d');
	$sql = "SELECT * FROM (SELECT Product.productID,
										  productName,
										  productCategoryID,
										  Product.productPrice AS price,
										  ROUND(Product.productPrice * SpecialSales.price,2) AS finalPrice,
										  productImage,
										  productDescription,
										  SpecialSales.startDate AS sdate,
										  SpecialSales.endDate AS edate 
					FROM Product JOIN SpecialSales ON Product.productID = SpecialSales.productID) AS Final WHERE Final.productID = '$id' AND sdate <= '$date' AND edate >= '$date'";
	$result = mysql_query($sql);

	if ($result) {
		if (mysql_num_rows($result) == 1) {

				$data = mysql_fetch_assoc($result);

		}
		mysql_free_result($result);

	} else {
		echo 'No data in the order table! '.mysql_error();
	}

	return $data;
}

function getOrder() {
	
	$data = array();
	$memberID = $_SESSION['memberID'];
	$sql = "SELECT * FROM `CS571`.`Order` WHERE memberID = $memberID";
	$result = mysql_query($sql);

	if ($result) {
		if (mysql_num_rows($result) > 0) {
			while ($row = mysql_fetch_assoc($result)) {
				$data[] = $row;
			}
		}
		mysql_free_result($result);

	} else {
		echo 'No data in the order table! '.mysql_error();
	}

	return $data;
}

function getUser() {
	
	$data = array();
	$memberID = $_SESSION['memberID'];
	$sql = "SELECT * FROM Member WHERE id = $memberID";
	$result = mysql_query($sql);

	if ($result) {
		if (mysql_num_rows($result) > 0) {
			while ($row = mysql_fetch_assoc($result)) {
				$data[] = $row;
			}
		}
		mysql_free_result($result);

	} else {
		echo 'No data in the member table! '.mysql_error();
	}

	return $data;
}

function getPayment() {
	
	$data = array();
	$memberID = $_SESSION['memberID'];
	$sql = "SELECT * FROM PaymentMethod WHERE memberId = $memberID";
	$result = mysql_query($sql);

	if ($result) {
		if (mysql_num_rows($result) > 0) {
			while ($row = mysql_fetch_assoc($result)) {
				$data[] = $row;
			}
		}
		mysql_free_result($result);

	} else {
		echo 'No data in the payment method! '.mysql_error();
	}

	return $data;
}

function getProducts() {

	$data = array();
	$sql = "SELECT * FROM Product";
	$result = mysql_query($sql);

	if ($result) {
		if (mysql_num_rows($result) > 0) {
			while ($row = mysql_fetch_assoc($result)) {
				$data[] = $row;
			}
		}
		mysql_free_result($result);

	} else {
		echo 'No data in this table! '.mysql_error();
	}

	return $data;
}

function getTechProducts() {

	$data = array();
	$sql = "SELECT * FROM Product WHERE productCategoryID = '1'";
	$result = mysql_query($sql);

	if ($result) {
		if (mysql_num_rows($result) > 0) {
			while ($row = mysql_fetch_assoc($result)) {
				$data[] = $row;
			}
		}
		mysql_free_result($result);

	} else {
		echo 'No data in this table! '.mysql_error();
	}

	return $data;
}

function getFurProducts() {

	$data = array();
	$sql = "SELECT * FROM Product WHERE productCategoryID = '2'";
	$result = mysql_query($sql);

	if ($result) {
		if (mysql_num_rows($result) > 0) {
			while ($row = mysql_fetch_assoc($result)) {
				$data[] = $row;
			}
		}
		mysql_free_result($result);

	} else {
		echo 'No data in this table! '.mysql_error();
	}

	return $data;
}

function getCloProducts() {

	$data = array();
	$sql = "SELECT * FROM Product WHERE productCategoryID = '3'";
	$result = mysql_query($sql);

	if ($result) {
		if (mysql_num_rows($result) > 0) {
			while ($row = mysql_fetch_assoc($result)) {
				$data[] = $row;
			}
		}
		mysql_free_result($result);

	} else {
		echo 'No data in this table! '.mysql_error();
	}

	return $data;
}

function getAutoProducts() {

	$data = array();
	$sql = "SELECT * FROM Product WHERE productCategoryID = '4'";
	$result = mysql_query($sql);

	if ($result) {
		if (mysql_num_rows($result) > 0) {
			while ($row = mysql_fetch_assoc($result)) {
				$data[] = $row;
			}
		}
		mysql_free_result($result);

	} else {
		echo 'No data in this table! '.mysql_error();
	}

	return $data;
}

function cartView() {

	$memberID = $_SESSION['memberID'];
	$data = array();
	$sql = "SELECT * FROM Cart WHERE memberID = $memberID";
	$result = mysql_query($sql);

	if ($result) {
		if (mysql_num_rows($result) > 0) {
			while ($row = mysql_fetch_assoc($result)) {
				$data[] = $row;
			}
		}
		mysql_free_result($result);

	} else {
		echo 'No data in this table! '.mysql_error();
	}

	return $data;
}

function clickProduct($id) {

	$data = null;
	$sql = "SELECT * FROM Product WHERE productID = '$id'";
	$result = mysql_query($sql);

	if ($result) {
		if (mysql_num_rows($result) == 1) {

			$data = mysql_fetch_assoc($result);

		}

		mysql_free_result($result);

	} else {
		echo 'No data in this table! '.mysql_error();
	}

	return $data;
}

function orderItemSummary($id) {

	$data = array();
	$sql = "SELECT * FROM `CS571`.`OrderItem` WHERE orderID = '$id'";
	$result = mysql_query($sql);

	if ($result) {
		if (mysql_num_rows($result) > 0) {
			while ($row = mysql_fetch_assoc($result)) {
				$data[] = $row;
			}
		}

		mysql_free_result($result);

	} else {
		echo 'Cannot find order items! '.mysql_error();
	}

	return $data;
}

?>