<?php
function showres($conn){
	$Per_Page=1;
	$sql="SELECT COUNT(*) AS Total FROM res WHERE category='C'";
	$sql_result=mysqli_query($conn, $sql);
	$result_array=mysqli_fetch_array($sql_result);
	$Total=$result_array['Total'];
	// 	Create a new SELECT Query with the
	// 	ORDER BY clause and without the COUNT(*)
	$sql="Select * FROM res WHERE category='C' order by res_id";
	
	// 	Append a LIMIT clause to the sql statement
	if(empty($_GET['Result_Set'])) {
		$Result_Set=0;
		$sql.=" LIMIT $Result_Set, $Per_Page";
	}
	
	else
	{
		$Result_Set=$_GET['Result_Set'];
		$sql.=" LIMIT $Result_Set, $Per_Page";
	}
	
	// 	Run The Query With a Limit to get result
	$sql_result=mysqli_query($conn, $sql);
	$sql_rows=mysqli_num_rows($sql_result);
	
	// 	Display Results using a for loop
	for ($a=0; $a < $sql_rows; $a++) {
		$sql_array=mysqli_fetch_array($sql_result);
		$rID=$sql_array['res_ID'];
		$descr=$sql_array['description'];
		$res_name=$sql_array['res_name'];
		echo '<table border="0">';
		echo '<tr>';
		echo '<td><b>'.$res_name.'</b><br><br><i>'.$descr.'</i></td>';
		echo '</tr>';
		echo '</table>';
	}
	
	echo "<br>";
	
	// 	Create Next / Prev Links and $Result_Set Value
	if($Total>0)
	{
		
		if($Result_Set<$Total&& $Result_Set>0) {
			$Res1=$Result_Set-$Per_Page;
			echo '<A HREF="' .$_SERVER['PHP_SELF']. '?Result_Set='.$Res1.'"><< Previous Res</A> ';
		}
		
		// Calculate and Display Page # Links
		$Pages=$Total / $Per_Page;
		
		if ($Pages>1) {
			for ($b=0,$c=1; $b < $Pages; $b++,$c++) {
				$Res1=$Per_Page * $b;
				//echo '<A HREF="' .$_SERVER['PHP_SELF']. '?Result_Set='.$Res1.'"> '.$c.'</A> ';
			}
			
		}
		
		if ($Result_Set>=0 && $Result_Set<$Total) {
			$Res1=$Result_Set+$Per_Page;
			if ($Res1<$Total) {	
				echo '<A HREF="' .$_SERVER['PHP_SELF']. '?Result_Set='.$Res1.'"> Next Res >></A>';	
			}	
		}
	}
	
	return $rID;
	
}


function showbox($aID){
echo '<form id="form1" name="form1" method="post" action="' .$_SERVER['PHP_SELF']. '">
<table width="90%" border="0">
  <tr>
    <td bgcolor="#CCCCCC">Please select a rating </td>
  </tr>
  <tr>
    <td><label>
      <input name="radiobutton" type="radio" value="5" />
      5 - Excellent</label></td>
  </tr>
  <tr>
    <td><label>
      <input name="radiobutton" type="radio" value="4" />
      4 - 
      Very Good</label></td>
  </tr>
  <tr>
    <td>
      <input name="radiobutton" type="radio" value="3" />
      3 - Good</td>
  </tr>
  <tr>
    <td><label>
      <input name="radiobutton" type="radio" value="2" />
      2 - Between Good and Bad</label></td>
  </tr>
  <tr>
    <td><label>
      <input name="radiobutton" type="radio" value="1" />
      1 - Bad</label></td>
  </tr>
  <tr>
    <td><label>
      <input type="submit" name="submit" value="submit" />
      <input type="hidden" name="id" value="'.$aID.'" />
    </label></td>
  </tr>
</table>
</form>';
}

function insert_rating($conn,$resid,$rating){
	
	$currdate = date('d-m-Y');
	$sql="INSERT INTO ratings(res_id,rating_val,rating_date)values($resid,$rating,NOW())";
	mysqli_query($conn,$sql);
	
}

function insert_res_details($res_name,$description){
	
	$sql="INSERT INTO res(res_name,description)values($res_name,$description)";
	mysql_query($sql);
	
}

function rankings($conn){
	
	$sql="SELECT AVG(ratings.rating_val) as ave,res.res_name FROM ratings,res WHERE ratings.res_id = res.res_ID ORDER BY ave LIMIT 3";
	$res=mysqli_query($conn, $sql);
	if($res){
		echo '<table width="100%" border="1"><tr><td>Book</td><td>Rank</td></tr>';
		while($row=mysqli_fetch_array($res)){	
			echo '<tr><td>'.$row['res_name'].'</td><td>'.$row['ave'].'</td></tr>';	
		}	
		echo '</table>';
	}	
}

?>