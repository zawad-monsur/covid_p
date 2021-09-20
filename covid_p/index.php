<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>COVID Patient DataBase</title>
		<link rel="stylesheet" href="css/semantic.min.css">
		<?php 
			require_once('db_config.php'); 
		?>
	</head>
	<body>
		COVID-19 PATIENT DATABASE
		</br>
	</body>
	<body>
		
		<?php
			$conn = new mysqli($servername, $username, $password, $dbname);
			if ($conn->connect_errno) {
	    			printf("Connect failed: %s\n", $conn->connect_error);
	    		exit();
			}

			$query = "SELECT * FROM patient";
		?>
	
		
		<div class= "ui grid">
			<div class= "ui four wide column" style="background: gray; min-height :70vh; ">
				<img src="">
				<div style = "background: gray; padding: 25px;">
					<h2>COVID-19 PATIENT DATABASE</h2>
				</div>
				<div style="background: gray; padding: 30px;">
					<a href="add_form.html"><button class="ui fluid button">ADD DATA</button></a>
					<br>
					<form class ="ui form" method= "post" action = "searchresult.php">
				
						<div>
						 	<input type="text" name="search_query" placeholder="Search">
						</div>
					

						<button class="ui button" type="submit">Search</button>
					</form>
				</div>
			</div>

			<div class= "ui twelve wide column ">
				<style>
					div {
					  background-image: url(fjGlXJ.jpg);
					}
				</style>

				<div class="ui text container" style="padding-top: 50px; ">

					<body>
							<?php

	 							$conn = new mysqli($servername, $username, $password, $dbname);
								if ($conn->connect_errno) {
						    			printf("Connect failed: %s\n", $conn->connect_error);
						    		exit();
								}

							 	$query = "SELECT * FROM patient";
							?>
							
							
					 		
							<table class="ui celled unstackable table" style="width: 70%">

								<t1>Patient Table</t2>

								<thead>

								<tr>

									<th>Patient ID</th>
									<th>Gender</th>
									<th>Age</th>
									<th>Blood Group</th>
									<th>Other Diseases</th>
									<th>Option</th>
									
							
								</thead>

								
								<tbody>
								
								<?php
									if ($result = $conn->query($query)) {
										$ser = 1;
										while ($row = $result->fetch_assoc()){
											printf("<tr>");
											printf("<td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td><td> <a href='db/delete.php?patient_id=%s'>Delete</a>/<a href='edit_form.php?patient_id=%s'>Edit</a> </td>", $ser,$row["gender"],$row["age"],$row["blood_group"],$row["other_diseases"],$row["patient_id"],$row["patient_id"]);
											printf("</tr>");
											$ser++;
										}
									}
								?>
								</tbody>
							</table>
						    <!-- Rest of the page content -->
						<script src="js/jquery-3.4.1.min.js"></script>
					  	<script src="js/semantic.min.js"></script>
					  	
					</body>
					

				</div>	

			</div>
 		
		</div>

</html>