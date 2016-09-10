<?php
include "dbconn.php";
include "functions.php";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="css/main.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table width="100%" border="1">
  <tr>
    <td width="17%"><table width="100%" border="0">
      <tr>
        <td><a href="index.php">Home</a></td>
      </tr>
      <tr>
        <td><a href="ranking.php">View Ratings</a></td>
      </tr>
      <tr>
        <td><a href="newres.php">Add a Resource</a></td>
      </tr>
      <tr>
        <td> </td>
      </tr>
    </table> </td>
    <td width="83%" valign="top"><?php rankings($conn); ?></td>
  </tr>
</table>
</body>
</html>