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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
<?php include("header.html"); ?>
<title>Ratings</title>
</head>
<body style="background-color:#FFFFFF;">
 <?php include("navbar.html"); ?>

<main>
<section>

<?php 
  if(isset($errmsg)){
  echo $errmsg;
  } ?>
  <span style="position: fixed; bottom: 3%; right: 3%"><a href="newres.php" class="btn-floating btn-large waves-effect waves-light red"><i class="fa fa-plus" aria-hidden="true"></i></a></span>
  </section>
  
  <section class="container">
  <div class="page-header">
  <h1><br>
          <center>Tutorials on C Language</center></h1>
    </div>

<div class="row active-with-click">
  <?php rankings($conn, 'C'); ?> 

 </div>
  </section>
 <!--<?php $id=showres($conn); showbox($id);?>-->

    <script src="js/index.js"></script>
</body>
</html> 