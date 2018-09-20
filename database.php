<?php include('server.php') ?>
<?php session_start();?>
<?php
if (!isset($_SESSION['username'])) {
  $_SESSION['msg'] = "You must log in first";
  header('location: login.php');
}
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("location: login.php");
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Database for penguin excellence</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="registration\jquery-3.3.1.js"></script>
  <script src="registration\script.js"></script>
</head>
<body>
  <div class="header">
  	<h2>Enter Database</h2>
  </div>

  <form method="post" action="database.php">
    <?php include('errors.php');?>
  	<div class="input-group">
  	  <label>Product</label>
  	  <input type="text" name="product" value="<?php echo $product; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Services</label>
  	  <input type="text" name="service" value="<?php echo $service; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Description</label>
  	  <input type="text" name="description" value = "<?php echo $description; ?>">
  	</div>


    <div class="input-group">
      <label>location</label>
      <input type="text" name="location" value = "<?php echo $location; ?>">
    </div>
  



    <div class="input-group">
  	  <button type="submit" class="btn" name="input_data">Input data</button>
  	</div>
<p> <a href="database.php?logout='1'" style="color: red;">logout</a> </p>
  </form>
</body>
</html>
