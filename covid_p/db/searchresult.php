<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Search Result</title>
		<link rel="stylesheet" href="css/semantic.min.css">
		<?php 
			require_once('db_config.php'); 
		?>
	</head>
	<body>
		<?php

			$search_query = $_POST['search_query'];

			$conn = new mysqli($servername, $username, $password, $dbname);
			if ($conn->connect_errno) {
	    			printf("Connect failed: %s\n", $conn->connect_error);
	    		exit();
			}

        /* Query to get database*/

			//$query = "SELECT patient_id,gender,age,blood_group,other_diseases,p.name,p.phone  FROM patient JOIN person p USING (patient_id)";
        	$query = "SELECT * FROM patient WHERE patient_id='$search_query'"
		?>
		
		<div class="ui grid">
			<div class="ui four wide column" style="background: gray; min-height: 100vh;">
				<div style="padding: 20px;">
					<h1>Search Result</h1>
					<p>Searched for '<?php echo $search_query; ?>'</p>
				</div>
				<div style="padding: 30px;">
					<a href="index.php"><button class="ui fluid button">Back</button></a>
					<br>
				</div>
			</div>
			<div class="ui twelve wide column">
				<div class="ui text container" style="padding-top: 50px;">
					<table class="ui celled unstackable table">
						<thead>
						<tr>
							<th>N0.</th>
							<th>Name</th>
							<th>Gender</th>
							<th>Age</th>
							<th>Blood Group</th>
							<th>Other Diseases</th>
							<th>ID</th>
							<th>Phone</th>
							
						</tr>
						</thead>
						<tbody>
						<?php

						/*Showing datas in table*/

						
						if ($result = $conn->query($query)) {
							$ser = 1;
							while ($row = $result->fetch_assoc()){                
								printf("<tr>");
								printf("<td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td> <a href='db/delete.php?id=%s'>Delete</a> <a href='edit_form.php?id=%s'>Edit</a> </td>", $ser, $row["p.name"], $row["gender"], $row["age"], $row["blood_group"], $row["other_diseases"] $row["patient_id"], $row["p.phone"]);
								printf("</tr>");
								$ser++;
							}
						}
						?>
						</tbody>
					</table>
				</div>

			</div>
		</div>

		
	    <!-- Rest of the page content -->
	<script src="js/jquery-3.4.1.min.js"></script>
  	<script src="js/semantic.min.js"></script>
	</body>
</html>