<?php
  include "dbconn.php";
  include "functions.php";
  $err=false;
  $errmsg="";
  //rating has been submitted
  if(isset($_POST['submit'])){
    //clean them first
    //The check below will fail if the user does not select a rating before submitting the form
    if(empty($_POST['radiobutton'])){
      $err=true;
      $errmsg="Please select a rating!";
    }
    //The check below will fail if the application does not pick up a bookid
    if(!is_numeric($_POST['id'])){
      $err=true;
      $errmsg="An internal error has occurred. Our apologies for the inconvenience";
    }
    //if no errors then insert the rating into the ratings table
    if(!$err){
      insert_rating($conn,$_POST['id'],$_POST['radiobutton']);
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
<link href="rating.css" rel="stylesheet" type="text/css" />
<title>Ratings::main</title>
</head>
<body>
<table width="100%" border="1" class="brdr">
  <tr>
    <td height="34" colspan="3" valign="top" class="hdr">Please rate this resource</td>
  </tr>
  <?php 
  if(isset($errmsg)){
  echo '<tr>
    <td height="38" colspan="2" valign="top"> <b>'.$errmsg.'</b></td>
  </tr>';
  } ?>
  <tr>
    <td width="19%" valign="top"><table width="100%" border="0">
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
    </table></td>
    <td width="39%" height="241" valign="top"><?php $id=showres($conn);
  ?></td>
    <td width="42%" valign="top"><?php showbox($id);?>  </td>
  </tr>
    </table>
</body>
</html> 