<?php

include_once('connection.php');

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username = test_input($_POST["username"]);
	$password = test_input($_POST["password"]);

	try {
		$conn = new PDO("mysql:host=localhost;dbname=shop_db", "root", "");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$stmt = $conn->prepare("SELECT * FROM adminlogin");
		$stmt->execute();
		$users = $stmt->fetchAll();

		foreach($users as $user) {
			if(($user['name'] == $username) && ($user['password'] == $password)) {
				header("location: products_admin.php");
				exit();
			}
		}

		echo "<script language='javascript'>";
		echo "alert('WRONG INFORMATION')";
		echo "</script>";
	} catch(PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
		die();
	}
}

?>
