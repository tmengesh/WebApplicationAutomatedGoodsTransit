<?php 
session_start();
if(!(isset($_SESSION['admin']) && $_SESSION['admin']!=''))
{
header("Location:login.php");
}
?>
<?php
if (!isset($_POST['submit'])) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Report By Declaration Number</title>
<style type="text/css">
<!--
.style1 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 36px;
	color: #0000CC;
}
.style2 {
	font-size: 14px;
	font-weight: bold;
}
.style3 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 20px; color: #0000CC; }
.style4 {font-size: 20px}
.style9 {	font-size: 11px;
	font-weight: bold;
}
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
    <td><table width="100%" height="100%" border="0">
      <tr>
        <td width="1%" rowspan="2">&nbsp;</td>
        <td colspan="5"><div align="center"><span class="style1">Report By  Declaration Number </span></div></td>
      </tr>
      <tr>
        <td width="30%">&nbsp;</td>
        <td width="30%">&nbsp;</td>
        <td width="19%">&nbsp;</td>
        <td width="9%"><a href="admin.php" class="style4">Home</a></td>
        <td><a href="destroy.php" class="style4">Logout</a></td>
      </tr>
      
      <tr>
        <td>&nbsp;</td>
        <td colspan="5" rowspan="3"><form id="form1" name="form1" method="post" action="">
         
		  <p>&nbsp;</p>
          <table width="100%" height="100%" border="0">
            <tr>
              <td width="4%">&nbsp;</td>
              <td colspan="4">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
              <td rowspan="2">&nbsp;</td>
              <td colspan="4" rowspan="2"><div align="left"><span class="style2">Registration Number<br />
                <span class="style9">(Office Code +   Serial Code +Registration Number + Year ):</span></span></div></td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2"><select name="comboocode" id="comboocode" >
                <option selected="selected" value="AAL">AAL</option>
                <option value="AWA">AWA</option>
                <option value="BAH">BAH</option>
                <option value="COM">COM</option>
                <option value="DDL">DDL</option>
                <option value="DJI">DJI</option>
                <option value="GON">GON</option>
                <option value="JIJ">JIJ</option>
                <option value="MEK">MEK</option>
                <option value="NAZ">NAZ</option>
              </select>
                +
                <select name="select" id="select" >
                  <option selected="selected" value="C">C</option>
                  <option value="G">G</option>
                  <option value="S">S</option>
                </select>
+
<input name="txtrnumber" type="text" id="txtrnumber" size="5" maxlength="5" width="15"/>
+
<input name="txtyear" type="text" id="txtyear" size="4" maxlength="4" width="15" /></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td width="19%">&nbsp;</td>
              <td width="9%"><input type="submit" name="submit" value="Search" /></td>
              <td width="7%"><input type="reset" name="reset" value="Clear" /></td>
              <td width="11%">&nbsp;</td>
              <td width="26%">&nbsp;</td>
              <td width="24%">&nbsp;</td>
            </tr>
          </table>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
        </form>        </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td height="21">&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td width="11%">&nbsp;</td>
      </tr>

      <tr>
        <td height="26">&nbsp;</td>
        <td colspan="5">&nbsp;</td>
      </tr>
    </table></td>
   
<td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?php
}
else
{
include("connectivity.php");
$regno1= $_POST['comboocode'];
$regno4= $_POST['select'];
$regno2= $_POST['txtrnumber'];
$regno3= $_POST['txtyear'];

$ocode=$_SESSION['code'];
$conca = $regno1 . $regno4  . $regno2 . $regno3 ;
	
	if (empty( $regno1))
 $message .= "Please Enter Office Code!<BR>\n";   
	if (empty( $regno2))
 $message .= "Please Enter Registartion Number!<BR>\n";   

 if (empty( $regno3))
 $message .= "Please Enter Year!<BR>\n";
  	  
	if ( $message == "" ) // we found no errors
 {  
 
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
   	 print "<th> System Date/ Time</th>";	
     print "<th> Name of Importer</th>";
	 print "<th> Registration Number </th>";		
     print "<th> Total KG</th>";	
     print "<th> Partial KG</th>";
	 print "<th> Total Package</th>";	
     print "<th> Partial Package</th>";
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
$ppackage= $newArray1[partial_package];
$tpackage= $newArray1[total_package];
$a9= $newArray1[goods_description];
$a10 = $newArray1[truck_plate_number];
$a11= $newArray1[contr_nbr1];
$a12= $newArray1[seal_nbr1];
$a13= $newArray1[contr_nbr2];
$a14 = $newArray1[seal_nbr2];
$a15= $newArray1[officer_name];
$a16= $newArray1[remark];
$a17= $newArray1[system_time];


print "<tr>";	
print "<td> $a1</td>";	
print "<td>$a2 </td>";	
print "<td> $a3</td>";	
print "<td>$a4 </td>";	
print "<td> $a17</td>";	
print "<td> $a5</td>";	
print "<td>$a6 </td>";	
print "<td> $a7</td>";	
print "<td>$a8 </td>";	
print "<td>$tpackage</td>";	
print "<td>$ppackage </td>";	
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
else
{
echo "<p align=\"center\"><h3>Registration Number Doesn't Exist</h3></p><a href=\"report_declaration.php\">Back to Search Form</a><br>";
}
 ////////////////////////////////////

$sql="SELECT * FROM `tab_automation1` 
WHERE `dec_reg_no` LIKE '$conca%' ";


$result = mysql_query($sql);
  $number_of_rows = mysql_num_rows($result);            
               if($number_of_rows>=1)                          
            { 
print "<br>";
print "<font color=\"Black\" size=\"5\"><b>Checking Point Offices</b></font>";
print "<table border=1 align=left>";	
//while($row = mysql_fetch_array($result)){ 
		
		
		//$tpartial=$row['sum(partial_kg)'] + $tpartial;
	
	print "<th> Checking Point </th>";		
     print "<th> Checking Point Arrival Date/Time</th>";	
   	 print "<th> System Date/ Time</th>";	
     print "<th> Registration Number</th>";
	 print "<th> Officer Name</th>";		
     print "<th> Remark</th>";
	 
	 
	
			while($newArray = mysql_fetch_array($result))
			{
			
			
$checkingp= $newArray[checking_point];
$cdate = $newArray[arr_date];
$sdate = $newArray[system_time];
$conca1= $newArray[dec_reg_no];
$officer= $newArray[officer_name];
$remark= $newArray[remark];	


print "<tr>";	
print "<td> $checkingp</td>";	
print "<td>$cdate </td>";	
print "<td>$sdate </td>";	
print "<td> $conca1</td>";	
print "<td>$officer </td>";	
print "<td>$remark </td>";	
print "</tr>";	
 

	}
	//echo "</select>\n";
	print "</table>";	

}
else
{

}
}
else
{
 print "<CENTER><font color=\"Red\" size=\"3\"><p><b>$message</b><p></font></CENTER>";
 
 print "<CENTER><h3>Your insertion is not Successfull<br />
  Use the browsers back button to fill the form again!!!</h3></CENTER>";
}
}

?>