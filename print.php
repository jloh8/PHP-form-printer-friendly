<?php include('server.php') ?>

<?php session_start();?>
<?php
if (!isset($_SESSION['username'])) {
  $_SESSION['msg'] = "You must log in first";
  header('location: login.php');
}
?>

<?php

$sql = "SELECT * FROM time1 WHERE day IN (SELECT max(day) FROM time1)";
$records=mysqli_query($db, $sql);
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Employee Data</title>
  </head>
  <body>
    <table   width="600" border = '1' cellpadding = '1' cellspacing='1'>
      <tr>
        <th>Product</th>
        <th>Services</th>
        <th>Description</th>
        <th>time</th>
      </tr>


      <?php
      while($employee=mysqli_fetch_array($records)){
        echo"<tr>";
        echo "<td>".$employee['product']."</td>";
        echo "<td>".$employee['service']."</td>";
        echo "<td>".$employee['description']."</td>";
        echo "<td>".$employee['day']."</td>";

        echo"</tr>";
      }
       ?>


    </table>
  </body>
</html>
