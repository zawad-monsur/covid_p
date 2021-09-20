<?php 
	
	$id =  $_POST['id_entry'];
	$gender = $_POST['gender_entry'];
	$age = $_POST['age_entry'];
	$bg = $_POST['bg_entry'];
	$dis = $_POST['disease_entry'];
	
	
	require_once('../db_config.php');

	$sql = "Insert into patient VALUES(NULL,'$gender', '$age' , '$bg' , '$dis')";

	$conn = new mysqli($servername, $username, $password, $dbname);

	$result = $conn->query($sql);
	$conn->close();

	if (!$result)
	{
		echo "Error during insertion!<br>";
		echo mysqli_error($conn);
	}
	else
	{
		echo "Successfully added contact info. <br>";
		header("Location: ../index.php"); 
	}

	//$conn->close();

	echo "<a href='../index.php'>Back</a>"
	// php header("Location: ../index.php'"); 

?>