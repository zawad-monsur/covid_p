<!doctype html>

<html lang="en">

<?php
  require_once('db_config.php'); 
  $patient_id = $_GET['patient_id'];
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_errno) {
        printf("Connect failed: %s\n", $conn->connect_error);
      exit();
  }

  $query = "SELECT * FROM patient WHERE patient_id=$patient_id";
  $result = $conn->query($query);
  $row = $result->fetch_assoc();

?>

<head>
  <meta charset="utf-8">
  <title>Edit info</title>
  <link rel="stylesheet" href="css/semantic.min.css">
</head>

<body>

<div style="background-color: #B0E0E6; padding: 2%;">
	<h1>Update Existing patient Info</h1>
	<h4>The data will be updated into the main database</h4>
</div>
<br>
      <div class="ui text container">
          <form class="ui form" method="post" action="db/update.php">
          <div class="field" style="display: none;">
            <label>Patient_ID</label>
            <input type="text" name="id_entry" value="<?php echo $row['patient_id'] ?>" >
          </div>

          <div class="field">
            <label>Gender</label>
            <input type="text" name="gender_entry" value=" <?php echo $row['gender'] ?>" placeholder="gender">
          </div>

          

          <div class="field">
            <label>Age</label>
            <input type="text" name="age_entry" value=" <?php echo $row['age'] ?>" placeholder="age">
          </div>

          <div class="field">
            <label>Blood_Group</label>
            <input type="text" name="bg_entry" value=" <?php echo $row['blood_group'] ?>" placeholder="blood_group">
          </div>

          <div class="field">
            <label>Diseases</label>
            <input type="text" name="disease_entry" value=" <?php echo $row['other_diseases'] ?>" placeholder="other_diseases">
          </div>

          

          <button class="ui button" type="submit">Submit</button>
        </form>
    </div>
      <script src="js/jquery-3.4.1.min.js"></script>
      <script src="js/semantic.min.js"></script>
  </body>

</html>