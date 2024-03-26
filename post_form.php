<?php
	$name = $_POST['name'];
	$matricNo = $_POST['matricNo'];
	$addressCu = $_POST['addressCu'];
	$addressHo = $_POST['addressHo'];
	$email = $_POST['email'];
	$phoneNum = $_POST['phoneNum'];

	// Database connection
	$conn = new mysqli('localhost','root','','test2');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(name, matricNo, addressHo, email, phoneNum) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $name, $matricNo, $addressCu, $addressHo, $addressHo, $phoneNum);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>