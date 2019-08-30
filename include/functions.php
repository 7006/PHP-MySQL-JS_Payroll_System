<?php 

function get_data(){
	$mysqli = mysqli_connect("localhost", "root", "123passwd", "plants");
	$querry = "SELECT * FROM payroll";
	$res = mysqli_query($mysqli, $querry);
	$rows = mysqli_fetch_all($res,MYSQLI_ASSOC);
	mysqli_close($mysqli);
	return $rows;
}


function add_new_row(){
	$coefficient = 0.15;
	$product_cost;
	switch ($_GET['department']) {

		case 'TV sets':
			$product_cost = 1000;
			break;
		case 'Mobile phones':
			$product_cost = 500;
			break;
		case 'Computers':
			$product_cost = 1500;
			break;
		
		default:
			//raise error
			echo "Error: Invalid department name.";
			return false;
			break;
	}

	$sql_querry = "INSERT INTO payroll (department, amount, product_cost, coefficient, name)
VALUES ('".$_GET['department']."', ".$_GET['amount'].", $product_cost, $coefficient, '".$_GET['name']."')";
	
	$mysqli = mysqli_connect("localhost", "root", "123passwd", "plants");

	if (!$mysqli) {
	    die("Connection failed: " . mysqli_connect_error());
	}


	if (mysqli_query($mysqli, $sql_querry)) {
	    // echo "New record created successfully";
	} else {
	    echo "Error: " . $sql_querry . "<br>" . mysqli_error($mysqli);
	}

	mysqli_close($mysqli);

}


function edit_existing_row(){
	//duplicating code
	$department = $_GET['department'];
	$amount = $_GET['amount'];
	$name = $_GET['name'];
	$coefficient = 0.15;
	$product_cost;
	$id = $_GET['id'];

	switch ($_GET['department']) {

		case 'TV sets':
			$product_cost = 1000;
			break;
		case 'Mobile phones':
			$product_cost = 500;
			break;
		case 'Computers':
			$product_cost = 1500;
			break;
		
		default:
			//raise error
			echo "Error: Invalid department name.";
			return false;
			break;
	}


	$sql_querry = "UPDATE payroll SET department = '$department', amount = $amount, product_cost = $product_cost, coefficient = $coefficient, name = '$name' WHERE id = $id";


	$mysqli = mysqli_connect("localhost", "root", "123passwd", "plants");
	if (!$mysqli) {
	    die("Connection failed: " . mysqli_connect_error());
	}	
	if (mysqli_query($mysqli, $sql_querry)) {
	    // echo "Record edited successfully";
	} else {
	    echo "Error: " . $sql_querry . "<br>" . mysqli_error($mysqli);
	}

	mysqli_close($mysqli);
}
function delete_row(){
	$id = $_GET['id'];
	$mysqli = mysqli_connect("localhost", "root", "123passwd", "plants");
	$querry = "DELETE FROM payroll WHERE id = $id;";
	mysqli_query($mysqli, $querry);
}


 ?>












