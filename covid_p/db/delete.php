 <?php 
	
	$patient_id = $_GET['patient_id'];
	
	require_once('../db_config.php');

	$sql = "DELETE FROM patient where Patient_ID='$patient_id'";

	$conn = new mysqli($servername, $username, $password, $dbname);

	$result = $conn->query($sql);
	
	$conn->close();

	if (!$result)
	{
		echo "Error during deletion!<br>";
		echo "<a href='../index.php'>Back</a>";
		echo mysqli_error($conn);
	}
	else
	{
		echo "Successfully deleted!<br>";
		header("Location: ../index.php"); 
	}

	$conn->close();

	
	

?>