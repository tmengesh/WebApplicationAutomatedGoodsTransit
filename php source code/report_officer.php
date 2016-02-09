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
<title>Report By Officer Name</title>
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
.style6 {font-size: 12px}
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
        <td width="1%">&nbsp;</td>
        <td width="30%">&nbsp;</td>
        <td width="30%">&nbsp;</td>
        <td width="16%">&nbsp;</td>
        <td width="12%"><a href="admin.php" class="style4">Home</a></td>
        <td><a href="destroy.php" class="style4">Logout</a></td>
      </tr>
      
      <tr>
        <td>&nbsp;</td>
        <td colspan="5" rowspan="2"><table width="100%" height="100%" border="0">
            <tr>
              <td width="1%">&nbsp;</td>
              <td colspan="4"><div align="center"><span class="style1">Report By Officer Name </span></div></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><div align="left"><strong>Officer Name  : </strong></div></td>
              <td colspan="2"><label>
			<form action="" method="post">
              <input name="txtoname" type="text" id="txtoname"  />
              </label></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><div align="left"><strong>From: </strong></div></td>
              <td colspan="2"><div class="lineItem">
                  <div class="lineItem">Date &amp; Time(12-Hour) (dd-MMM-yyyy)</div>
                  <input name="txtfrom" type="text" id="txtfrom" size="20" maxlength="25" onfocus="blur();"/>
                  <a href="javascript:NewCal('txtfrom','ddmmmyyyy')"><img src="images/cal.gif" width="16" height="16" border="0" alt="Pick a date" /></a><a 
        href="javascript:NewCal('txtfrom','ddmmmyyyy',true,12)"></a></div></td>
            </tr>
          
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><div align="left"><strong>To:</strong></div></td>
              <td colspan="2"><span class="lineItem">
                <div class="lineItem">Date &amp; Time(12-Hour) (dd-MMM-yyyy 
                  )</div>
                <input name="txtto" type="text" id="txtto" size="20" maxlength="25" onfocus="blur();"/>
                <a href="javascript:NewCal('txtto','ddmmmyyyy')"><img src="images/cal.gif" width="16" height="16" border="0" alt="Pick a date" /></a><a 
        href="javascript:NewCal('txtfrom','ddmmmyyyy',true,12)"></a></span></td>
            </tr>
          
            <tr>
              <td>&nbsp;</td>
              <td colspan="4">&nbsp;</td>
            </tr>
            <tr>
              <td height="26">&nbsp;</td>
              <td width="15%">&nbsp;</td>
              <td width="17%"><label></label></td>
              <td width="2%"><label>
                <input type="submit" name="submit" value="search" />
              </label></td>
              <td width="65%"><input type="reset" name="reset" value="Reset" /></td>
			  </form>
            </tr>
        </table></td>
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
$oname= $_POST['txtoname'];
$dfrom= $_POST['txtfrom'];
$dto= $_POST['txtto'];
	
	if (empty( $oname))
 $message .= "Please Enter Officer Name!<BR>\n";   
if (empty( $dfrom))
 $message .= "Please Enter Initial Date!<BR>\n";   
 if (empty( $dto))
 $message .= "Please Enter Final Date!<BR>\n";
  	  
	if ( $message == "" ) // we found no errors
 {  
 
$sql="SELECT * FROM `tab_automation` 
WHERE `officer_name` LIKE '$oname%' AND `arr_date` BETWEEN '$dfrom%' AND '$dto%' ";
$result = mysql_query($sql);
  $number_of_rows = mysql_num_rows($result); 
////////////////
$sql1="SELECT * FROM `tab_automation1` 
WHERE `officer_name` LIKE '$oname%' AND `arr_date` BETWEEN '$dfrom%' AND '$dto%' ";
$result1 = mysql_query($sql1);
  $number_of_rows1 = mysql_num_rows($result1);  
  
  
//////////////////////////////////////////

           
               if($number_of_rows>=1)                          
            { 

print "<font color=\"Black\" size=\"5\"><b>Officer From Port of Entry</b></font>";
print "<table border=1 >";	

	 print "<th> Office Code </th>";		
     print "<th> Arrival Date/Time</th>";	
   	 print "<th> System Date/ Time</th>";		
	 print "<th> Registration Number </th>";		
     print "<th> Officer Name</th>";	 	
     print "<th> Remark</th>";
	 
	 
	
			while($newArray = mysql_fetch_array($result))
			{
			
			
$a1= $newArray[port_of_entry];
$a2= $newArray[arr_date];
$a6= $newArray[system_time];
$a3 = $newArray[dec_reg_no];
$a4= $newArray[officer_name];
$a5= $newArray[remark];



print "<tr>";	
print "<td> $a1</td>";	
print "<td>$a2 </td>";	
print "<td>$a6 </td>";	
print "<td> $a3</td>";	
print "<td>$a4 </td>";	
print "<td> $a5</td>";	
print "</tr>";	
 

	}
	//echo "</select>\n";
	print "</table>";	
}
else if ($number_of_rows1>=1 )
//////////////////
{
print "<br>";
print "<font color=\"Black\" size=\"5\"><b>Officer From Checking Point Office</b></font>";
print "<table border=1 align=left>";	
//while($row = mysql_fetch_array($result)){ 
		
		
		//$tpartial=$row['sum(partial_kg)'] + $tpartial;
	
	 print "<th> Office Code </th>";		
     print "<th> Arrival Date/Time</th>";	
   	 print "<th> System Date/ Time</th>";			
	 print "<th> Registration Number </th>";		
     print "<th> Officer Name</th>";	 	
     print "<th> Remark</th>";
	 
	 
	
			while($newArray1 = mysql_fetch_array($result1))
			{
			
			
$checkingp= $newArray1[checking_point];
$cdate = $newArray1[arr_date];
$sdate = $newArray1[system_time];
$conca1= $newArray1[dec_reg_no];
$officer= $newArray1[officer_name];
$remark= $newArray1[remark];	


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
echo "<p align=\"center\"><h3>Search Item Not Found</h3></p><a href=\"report_officer.php\">Back to Search Form</a><br>";
}
 ////////////////////////////////////

}
else
{
echo "<p align=\"center\"><h3>Search Item not Found</h3></p><a href=\"report_officer.php\">Back to Search Form</a><br>";
}

}
?>