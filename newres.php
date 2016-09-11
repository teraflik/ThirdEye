<?php
include "dbconn.php";
include "functions.php";

if(isset($_POST['submit'])){
  $err=false;
  $errmsg=""; 
  if(empty($_POST['res_name'])){  
	$err=true;
	$errmsg="Please enter a name for the resource.";
  } 
  if(empty($_POST['desc'])){
	$err=true;
	$errmsg="Please enter a description.";
  }
  if(empty($_POST['categ'])){
	$err=true;
	$errmsg="Please enter a category.";
  }
  
  if(is_numeric($_POST['res_name'])){
	$err=true; 
	$errmsg="Please enter a valid title for resource";
  }
  
  if(is_numeric($_POST['desc'])){
	$err=true;
	$errmsg="Please enter a valid description for the resource";
  }
  
  if(!$err) {
	//clean for database entry
	$clean_name=mysqli_real_escape_string($conn,$_POST['res_name']);
	$clean_desc=mysqli_real_escape_string($conn,$_POST['desc']);
	$clean_categ=mysqli_real_escape_string($conn,$_POST['categ']);
	$sql = "INSERT INTO res (res_name, category, description) VALUES ('$clean_name','$clean_categ', '$clean_desc')";
	if(mysqli_query($conn, $sql)){
	  echo "Records added successfully.";
	}
	else{ 
	  echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
	}
  }
  
}
?>

<!DOCTYPE html >
<html>
<head>

<?php include("header.html"); ?>

<title>Untitled Document</title>
</head>
<body style="background-color: white;">
	<?php include("navbar.html"); ?>
	<?php if(isset($errmsg)){ echo '<b>'.$errmsg.'</b>'; } ?>
<main style="padding-top:10%">
	<form action="newres.php" method="post">
 	 <div class="form-group row">
	<div class="input-group col-xs-8 col-xs-offset-3 col-sm-5">
	  <span class="input-group-addon" id="basic-addon1">Resource Name: </span>
	  <input name="res_name" type="text" class="form-control" placeholder="Name" aria-describedby="basic-addon1">
	</div>
	</div>

	<div class="form-group row">
	<div class="input-group col-xs-8 col-xs-offset-3 col-sm-5">
	  <span class="input-group-addon" id="basic-addon1">Description: </span>
	  <input name="desc" type="text" class="form-control" placeholder="Enter description" aria-describedby="basic-addon1">
	</div>
	</div>

	<div class="form-group row">
	<div class="input-group col-xs-8 col-xs-offset-3 col-sm-5">
	  <span class="input-group-addon" id="basic-addon1">Category: </span>
	  <input name="categ" type="text" class="form-control" placeholder="Enter Category of Resource" aria-describedby="basic-addon1">
	</div>
	</div>

	<div class="form-group row">
	<div class="input-group col-xs-8 col-xs-offset-3 col-sm-5">
	<center><button type="submit" name="submit" value="submit" class="btn btn-default">Submit</button></center>
	</div></div>
	</form>
	</main>
</body>
</html>