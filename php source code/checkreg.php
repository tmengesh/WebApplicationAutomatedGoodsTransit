<?php 
session_start();
if(!(isset($_SESSION['auth']) && $_SESSION['auth']!=''))
{
header("Location:login.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Welcome to Transit Goods Movment Control Form</title>
<style type="text/css">
<!--
.style1 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 36px;
	color: #0000CC;}
.style2 {font-size: 20px}
-->
</style>
<SCRIPT language=JavaScript>
	<!--
		if (document.images)
		{
		calimg= new Image(16,16); 
		calimg.src="images/cal.gif"; 
		}
	//-->
</SCRIPT>
<script language="javascript" type="text/javascript" src="datetimepicker.js"></script> 
</head>
<body bgcolor="#FFFFCC">
<table width="100%" height="100%" border="0" bgcolor="#FFFFCC">
  <tr>
    <td width="9%" height="46">&nbsp;</td>
    <td width="76%"><img src="images/logo.gif" width="700" height="88" /></td>
    <td width="15%">&nbsp;</td>
  </tr>  
  <tr>
    <td>&nbsp;</td>
    <td>	
	   </td>
  <td>&nbsp;</td>
  </tr>
  
	
  <?php
include("connectivity.php");
$conca=$_SESSION['conca'];
$uname=$_SESSION['username'];
//$conca = $regno1  . $regno2 . $regno3 ;
$sql1="SELECT * FROM `tab_useraccount` 
WHERE `user_name` = '$uname' ";
$officer=mysql_query($sql1);
$number_of_rows1 = mysql_num_rows($officer);
if($number_of_rows1==1)
{
$officer1 = mysql_fetch_array($officer);
$username=$officer1[name];
$officecode=$officer1[code];
}
else
{
}


$sql="SELECT * FROM `tab_automation` 
WHERE `dec_reg_no` LIKE '$conca%' ";
$result = mysql_query($sql);
  $number_of_rows = mysql_num_rows($result);            
               if($number_of_rows>=1)                          
            { 
			print "<table border=1 align=center>";	
//while($row = mysql_fetch_array($result)){ 
		
		
		//$tpartial=$row['sum(partial_kg)'] + $tpartial;
	
	print "<th> Port of Entry</th>";		
     print "<th> Port Initial Time</th>";	
	 print "<th> Importer Name</th>";		
     print "<th> Registration Number</th>";
	 print "<th> Total KG</th>";		
     print "<th> Partial KG</th>";
	 
	 print "<th> Total Package</th>";		
     print "<th> Partial Package</th>";

	 print "<th> Goods Description</th>";		
     print "<th> Plate No</th>";
	 print "<th> Container No1</th>";	
	
     print "<th> Seal No1</th>";
	 print "<th> Container No2</th>";	
	
     print "<th> Seal No2</th>";
	 
	
			while($newArray = mysql_fetch_array($result))
			{
			
			
			$port = $newArray[port_of_entry];
$idate= $newArray[dep_date];
$checkingp= $newArray[checking_point];
$adate = $newArray[arr_date];
$importer = $newArray[importer_name];
$conca1= $newArray[dec_reg_no];
$concaa[]= $newArray[dec_reg_no];
$tkg= $newArray[total_kg];
$pkg= $newArray[partial_kg];

$ppackage= $newArray[partial_package];
$tpackage= $newArray[total_package];

$goods= $newArray[goods_description];
$plate= $newArray[truck_plate_number];
$cont1= $newArray[contr_nbr1];
$seal1= $newArray[seal_nbr1];
$cont2= $newArray[contr_nbr2];
$seal2= $newArray[seal_nbr2];
$officer= $newArray[officer_name];
$remark= $newArray[remark];	
//echo "<option value='$conca1'>$conca1</option>\n";      
print "<tr>";	
print "<td> $port</td>";	
print "<td>$idate </td>";	
print "<td> $importer</td>";	
print "<td>$conca1 </td>";	
print "<td>$tkg </td>";	
print "<td> $pkg</td>";	
print "<td>$tpackage </td>";	
print "<td> $ppackage</td>";	
print "<td>$goods </td>";	
print "<td> $plate</td>";	
print "<td>$cont1 </td>";	
print "<td>$seal1 </td>";	
print "<td> $cont2</td>";	
print "<td> $seal2</td>";	
print "</tr>";	
 

	}
	//echo "</select>\n";
	print "</table>";	
			?>	     
			<br />
	<form action="checkreg1.php" method="post">	
	Please Enter Registration Code
	<select name="regnolist" size="1" id="Combobox1">
	
<?
 
for ($i = 0; $i < count($concaa); $i++) {
$option .= "<option ";
$option .= "value=\"$concaa[$i]\">$concaa[$i]</option> \n";
}
echo $option;
?>
</select>
<input name="" type="submit" value="submit" />
</form>
<?php
	}
	 else
			{
		//	 session_start();
			echo "<p align=\"center\"><h3>Data didn't exitst, Go to registration form</h3></p><a href=\"search.php\"><h3>Go to Search Form!</h3></a>";
			}
?>
</table>
</body>
</html>