<?php 
	

	$id =  $_POST['id_entry'];
	$gender = $_POST['gender_entry'];
	$age = $_POST['age_entry'];
	$bg = $_POST['bg_entry'];
	$dis = $_POST['disease_entry'];
		
	// echo $id;
	require_once('../db_config.php');
	$sql = "Update patient SET gender='$gender', age='$age', blood_group='$bg', other_diseases='$dis' WHERE patient_id='$id' ";
	echo "$sql";
	$conn = new mysqli($servername, $username, $password, $dbname);

	$result = $conn->query($sql);
	$conn->close();

	if (!$result)
	{
		echo "Error during update!<br>";
		echo mysqli_error($conn);
	}
	else
	{
		echo "Successfully updated patient info of $name. <br>";
		header("Location: ../index.php");  
	}

	//$conn->close();

	echo "<a href='../index.php'>Back</a>"
	// php header("Location: ../index.php'"); 

?>