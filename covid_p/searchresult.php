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

$patient_id  = null;
if (is_int((int)$search_query)) $patient_id = (int)$search_query;

/* Query to get database*/
$query = "SELECT patient.patient_id, patient.gender, patient.age, patient.blood_group, patient.other_diseases, person.name,person.phone, person.visitor_id, 
(SELECT hospital_name FROM hospital WHERE treatment_id = patient.treatment_id) AS hospital_name
FROM patient INNER JOIN person ON patient.patient_id = person.patient_id WHERE LOWER(person.name) LIKE LOWER('%" . $search_query . "%') 
OR person.patient_id = " . $patient_id;
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
                 <th>#</th>
                 <th>Name</th>
                 <th>Gender</th>
                 <th>Age</th>
                 <th>Blood Group</th>
                 <th>Hospital</th>
                 <th>Other Diseases</th>
                 <th>ID</th>
                 <th>Phone</th>
                 <th>Visitor ID </th>
             </tr>
         </thead>
         <tbody>
          <?php

          /*Showing datas in table*/

          if ($result = $conn->query($query)) {
             $rows = [];
             while ($row = $result->fetch_assoc()) {
                 $rows[] = $row;
             }

             if(count($rows) > 0) {
                foreach ($rows as $index => $row) {
                    echo "
                    <tr>
                        <td>" . ($index + 1) . " </td> " . "
                        <td>" . $row["name"] . " </td> " . "
                        <td>" . $row["gender"] . " </td> " . "
                        <td>" . $row["age"] . " </td> " . "
                        <td>" . $row["blood_group"] . " </td> " . "
                        <td>" . $row["hospital_name"] . " </td> " . "
                        <td>" . $row["other_diseases"] . " </td> " . "
                        <td>" . $row["patient_id"] . " </td> " . "
                        <td>" . $row["phone"] . " </td> " . "
                        <td>" . $row["visitor_id"] . " </td> " . "
                    </tr>
                    ";
                }
            } else {
                echo "
                    <tr>
                        <td colspan='10'>No data found</td>
                    </tr>
                    ";
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