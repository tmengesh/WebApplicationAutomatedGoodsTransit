<?php 
session_start();
if(!(isset($_SESSION['auth']) && $_SESSION['auth']!=''))
{
header("Location:login.php");
}
?>
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
WHERE `dec_reg_no` = '$conca' ";
$result = mysql_query($sql);
  $number_of_rows = mysql_num_rows($result);            
               if($number_of_rows==1)                          
            { 
			$newArray = mysql_fetch_array($result);
			
			$port = $newArray[port_of_entry];
$idate= $newArray[dep_date];
$checkingp= $newArray[checking_point];
$adate = $newArray[arr_date];
$importer = $newArray[importer_name];
$conca= $newArray[dec_reg_no];
$tkg= $newArray[total_kg];
$goods= $newArray[goods_description];
$plate= $newArray[truck_plate_number];
$cont1= $newArray[contr_nbr1];
$seal1= $newArray[seal_nbr1];
$cont2= $newArray[contr_nbr2];
$seal2= $newArray[seal_nbr2];
$officer= $newArray[officer_name];
$remark= $newArray[remark];			
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
    <td width="76%"><div align="center"><img src="images/logo.gif" width="700" height="88" /></div></td>
    <td width="15%">&nbsp;</td>
  </tr>  
  <tr>
    <td>&nbsp;</td>
    <td>	
	<form name="x" action="form1.php" method="post">
	
	<table width="100%" height="100%" border="0">
      <tr>
        <td width="1%" rowspan="2">&nbsp;</td>
        <td><div align="center"></div></td>
        <td width="14%">&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td><a href="destroy.php" class="style2">Logout</a></td>
      </tr>
      <tr>
        <td colspan="5"><div align="center"><span class="style1">Declaration Already Exits </span></div></td>
      </tr>
      
      <tr>
        <td>&nbsp;</td>
        <td colspan="5" rowspan="4">
		<?php
}

 $sql1="SELECT * FROM `tab_automation` 
WHERE `dec_reg_no` LIKE '$conca%' ";


$result1 = mysql_query($sql1);
  $number_of_rows1 = mysql_num_rows($result1);            
               if($number_of_rows1>=1)                          
            { 

print "<font color=\"Black\" size=\"5\"><b>From Port of Entry</b></font>";
print "<table border=1 align=center>";	
//while($row = mysql_fetch_array($result)){ 
		
		
		//$tpartial=$row['sum(partial_kg)'] + $tpartial;
	
	print "<th> Port of Entry </th>";		
     print "<th> Port Initial Date/ Time </th>";	
     print "<th> Checking Point Office</th>";
	 print "<th> Checking Point Arrival Date/ Time</th>";		
     print "<th> Name of Importer</th>";
	 print "<th> Registration Number </th>";		
     print "<th> Total KG</th>";	
     print "<th> Partial KG</th>";
	 print "<th> Description of Goods</th>";		
     print "<th> Truck Plate Number</th>";
	 print "<th> Container Number1 </th>";		
     print "<th> Seal Number1</th>";	
     print "<th> Container Number2</th>";
	 print "<th> Seal Number2</th>";	
     print "<th> Officer Name</th>";	 	
     print "<th> Remark</th>";
	 
	 
	
			while($newArray1 = mysql_fetch_array($result1))
			{
			
			
$a1= $newArray1[port_of_entry];
$a2 = $newArray1[dep_date];
$a3= $newArray1[checking_point];
$a4= $newArray1[arr_date];
$a5= $newArray1[importer_name];
$a6 = $newArray1[dec_reg_no];
$a7= $newArray1[total_kg];
$a8= $newArray1[partial_kg];
$a9= $newArray1[goods_description];
$a10 = $newArray1[truck_plate_number];
$a11= $newArray1[contr_nbr1];
$a12= $newArray1[seal_nbr1];
$a13= $newArray1[contr_nbr2];
$a14 = $newArray1[seal_nbr2];
$a15= $newArray1[officer_name];
$a16= $newArray1[remark];



print "<tr>";	
print "<td> $a1</td>";	
print "<td>$a2 </td>";	
print "<td> $a3</td>";	
print "<td>$a4 </td>";	
print "<td> $a5</td>";	
print "<td>$a6 </td>";	
print "<td> $a7</td>";	
print "<td>$a8 </td>";	
print "<td> $a9</td>";	
print "<td>$a10 </td>";	
print "<td> $a11</td>";	
print "<td>$a12 </td>";	
print "<td> $a13</td>";	
print "<td>$a14 </td>";	
print "<td> $a15</td>";	
print "<td>$a16 </td>";	
	
print "</tr>";	
 

	}
	//echo "</select>\n";
	print "</table>";



	}
?>
		</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        </tr>
      
	   <tr>
        <td height="26">&nbsp;</td>
        <td width="20%">&nbsp;</td>
        <td colspan="2"><a href="search.php" class="style2">Back to Search </a>          <label></label></td>
        <td width="24%">&nbsp;</td>
        <td width="21%">&nbsp;</td>
	   </tr>
    </table>
    </form>    </td>
  <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
