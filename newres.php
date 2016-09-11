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
  
  if(is_numeric($_POST['res_name'])){
	$err=true; 
	$errmsg="Please enter a valid title for resource";
  }
  
  if(is_numeric($_POST['desc'])){
	$err=true;
	$errmsg="Please enter a valid description for the book";
  }
  
  if(!$err) {
	//clean for database entry
	$clean_name=mysqli_real_escape_string($conn,$_POST['res_name']);
	$clean_desc=mysqli_real_escape_string($conn,$_POST['desc']);
	$sql = "INSERT INTO res (res_name, description) VALUES ('$clean_name', '$clean_desc')";
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
<title>Untitled Document</title>
<link href="css/main.css" rel="stylesheet" type="text/css" />
</head>
<body>

<form action="newres.php" method="post">
<table width="100%" border="1">
  <tr>
	<td colspan="3" class="hdr">Please Enter book details here </td>
	</tr>
	  <?php 
  if(isset($errmsg)){
  echo '<tr>
	<td height="38" colspan="2" valign="top"> <b>'.$errmsg.'</b></td>
  </tr>';
  } ?>
  <tr>
	<td width="21%" rowspan="3" valign="top"><table width="100%" border="0">
	  <tr>
		<td><a href="index.php">Home</a></td>
	  </tr>
	  <tr>
		<td><a href="ranking.php">View Ratings</a></td>
	  </tr>
	  <tr>
		<td><a href="newres.php">Add a Book</a></td>
	  </tr>
	  <tr>
		<td> </td>
	  </tr>
	</table> </td>
	<td width="21%" valign="top"><strong>Title:</strong></td>
	<td width="79%"><label>
	  <input name="res_name" type="text" id="res_name" size="40" maxlength="50" />
	</label></td>
  </tr>
  <tr>
	<td valign="top"><strong>Description:</strong></td>
	<td><label>
	  <textarea name="desc" cols="30" rows="10" id="desc"></textarea>
	</label></td>
  </tr>
  <tr>
	<td> </td>
	<td><label>
	  <input type="submit" name="submit" value="submit" />
	</label></td>
  </tr>
</table>
</form>
</body>
</html>