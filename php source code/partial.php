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
//end
$sql="SELECT * FROM `tab_automation` 
WHERE `dec_reg_no` LIKE '$conca%' ";
$result = mysql_query($sql);
  $number_of_rows = mysql_num_rows($result);            
               if($number_of_rows>=1)                          
            { 
			$dec_reg_num=$number_of_rows;
			$newArray = mysql_fetch_array($result);
			
$port = $newArray[port_of_entry];
//$idate= $newArray[dep_date];
$checkingp= $newArray[checking_point];
//$adate = $newArray[arr_date];
$importer = $newArray[importer_name];
$conca1= $newArray[dec_reg_no];
$concaa=$conca1 ."/". $dec_reg_num;
$tkg= $newArray[total_kg];
$goods= $newArray[goods_description];
//$plate= $newArray[truck_plate_number];
//$cont1= $newArray[contr_nbr1];
//$seal1= $newArray[seal_nbr1];
//$cont2= $newArray[contr_nbr2];
//$seal2= $newArray[seal_nbr2];
//$remark= $newArray[remark];

$officer= $newArray[officer_name];


//$port = $_POST['comboport'];
$idate= $_POST['txtidate'];
//$checkingp= $_POST['combocpoint'];
$adate = $_POST['txtarrtime'];
//$importer = $_POST['txtimportername'];
//$tkg= $_POST['txtkg'];
$pkg= $_POST['txtpkg'];
//$goods= $_POST['txtgoods'];
$plate= $_POST['txtplate'];

$cont1= $_POST['txtcont1'];
$seal1= $_POST['txtseal1'];
$cont2= $_POST['txtcont2'];

$seal2= $_POST['txtseal2'];

$pakage= $_POST['txtpackage'];

//$officer= $_POST['txtofficer'];

$remark=$_POST['lstremark'];



?>	
<?php
if (!isset($_POST['submit'])) {
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
	<form name="x" action="" method="post">
	
	<table width="100%" height="100%" border="0">
      <tr>
        <td width="1%" rowspan="2">&nbsp;</td>
        <td><div align="center"></div></td>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td><a href="destroy.php" class="style2">Logout</a></td>
      </tr>
      <tr>
        <td colspan="5"><span class="style1">Transit Goods Movement Control Form </span></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><div align="left"><strong>Port of Entry: </strong></div></td>
        <td colspan="3"><label>
        <input name="comboport" type="text" id="comboport" onfocus="blur();" value="<?php print "$port";?>" size="5"/>
        </label></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><div align="left"><strong>Port Initial Date/ Time: </strong></div></td>
        <td colspan="3">
		<div class="lineItem">
        <div class="lineItem">Date &amp; Time(12-Hour) (dd-MMM-yyyy 
          hh:mm:ss)</div>
          <input name="txtidate" id="txtidate" size="25"  onfocus="blur();"/>
      <a 
        href="javascript:NewCal('txtidate','ddmmmyyyy',true,12)"><img height="16" 
        alt="Pick a date" src="images/cal.gif" width="16" 
        border="0" /></a></div>		</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><div align="left"><strong>Checking Point Office: </strong></div></td>
        <td colspan="3"><input name="combocpoint" type="text" id="comboport3" onfocus="blur();" value="<?php print "$officecode";?>" size="5"/></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><div align="left"><strong>Checking Point Arrival Date/ Time: </strong></div></td>
        <td colspan="3"><span class="lineItem">
          <div class="lineItem">Date &amp; Time(12-Hour) (dd-MMM-yyyy 
            hh:mm:ss)</div>
          <input name="txtarrtime" id="txtarrtime" size="25" onfocus="blur();" />
          <a 
        href="javascript:NewCal('txtarrtime','ddmmmyyyy',true,12)"><img height="16" 
        alt="Pick a date" src="images/cal.gif" width="16" 
        border="0" /></a></span></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><div align="left"><strong>Name of Importer: </strong></div></td>
        <td colspan="3"><label>
          <input name="txtimportername" type="text" id="txtimportername" onfocus="blur();" value="<?php print "$importer";?>"/>
        </label></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><div align="left"><strong>Registration Number (Office Code   + Registration Number + Year): </strong></div></td>
        <td colspan="3"><input name="comboport2" type="text" id="comboport2" onfocus="blur();" value="<?php print "$conca";?>"/></td>
      </tr>
       <tr>
        <td>&nbsp;</td>
        <td colspan="2"><div align="left"><strong>Total KG : </strong></div></td>
        <td colspan="3"><input name="txtkg" type="text" id="txtkg" onfocus="blur();" value="<?php print "$tkg";?>"/></td>
      </tr>
	  <tr>
        <td>&nbsp;</td>
        <td colspan="2"><div align="left"><strong>Partial KG : </strong></div></td>
        <td colspan="3"><input name="txtpkg" type="text" id="txtpkg"/></td>
      </tr>
	  <tr>
        <td>&nbsp;</td>
        <td colspan="2"><div align="left"><strong>Number of Package (if any)  : </strong></div></td>
        <td colspan="3"><input name="txtpackage" type="text" id="txtpackage"/></td>
      </tr>
	  <tr>
        <td>&nbsp;</td>
        <td colspan="2"><div align="left"><strong>Description of Goods: </strong></div></td>
        <td colspan="3"><input name="txtgoods" type="text" id="txtgoods" onfocus="blur();" value="<?php print "$goods";?>"/></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><div align="left"><strong>Truck Plate Number: </strong></div></td>
        <td colspan="3"><input name="txtplate" type="text" id="txtplate"/></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><div align="left"><strong>Container Number1: </strong></div></td>
        <td colspan="3"><input name="txtcont1" type="text" id="txtcont1"/></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><div align="left"><strong>Seal Number1: </strong></div></td>
        <td colspan="3"><input name="txtseal1" type="text" id="txtseal1" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><div align="left"><strong>Container Number2: </strong></div></td>
        <td colspan="3"><input name="txtcont2" type="text" id="txtcont2"/></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><div align="left"><strong>Seal Number2: </strong></div></td>
        <td colspan="3"><input name="txtseal2" type="text" id="txtseal2"/></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><div align="left"><strong>Officer Name: </strong></div></td>
        <td colspan="3"><input name="txtofficer" type="text" id="txtofficer" value="<?php echo "$username" ; ?>"  onfocus="blur();"/></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><div align="left"><strong>Remark:</strong></div></td>
        <td colspan="3"><label>
          <textarea name="lstremark" id="lstremark" ></textarea>
        </label></td>
      </tr>
	   <tr>
        <td height="26">&nbsp;</td>
        <td width="24%">&nbsp;</td>
        <td width="10%"><label>
          <input type="submit" name="submit" value="Register" />
        </label></td>
        <td width="13%"><label>
          <input type="reset" name="reset" value="Clear" />
        </label></td>
        <td width="31%">&nbsp;</td>
        <td width="21%">&nbsp;</td>
	   </tr>
    </table>
    </form>    </td>
  <td>&nbsp;</td>
  </tr>
</table>
<?php
	}
	else{
	
	/*$sqlpartial="SELECT SUM(partial_kg) FROM `tab_automation` 
WHERE `dec_reg_no` LIKE '$conca%' ";
$sqlresult = mysql_query($sqlpartial);
$tpartial=$sqlresult + $pkg*/
 $query = "SELECT dec_reg_no, sum(partial_kg) FROM tab_automation WHERE `dec_reg_no` LIKE '$conca%' GROUP BY dec_reg_no"; 
		$tpartial = $pkg; 
		$result = mysql_query($query) or die(mysql_error()); 
		while($row = mysql_fetch_array($result)){ 
		$tpartial=$row['sum(partial_kg)'] + $tpartial;
		}
  if ($tpartial > $tkg)
  {
  print "<font color=red size='11'>Error!!!!</font><br>";
  print "<font color=red size='5'>You are trying to insert partial KG which is above the total KG</font><br>";
  print "<a href='search.php'>Click here</a> <font color=red size='5'> to get back to Registartion Form </font>";
  
  }
	else
	{
	
		
	
	$message="";
 if (empty( $idate))
 $message .= "Please Enter Port Initial Date/Time!<BR>\n";
  if (empty( $adate))
 $message .= "Please Enter Arrival Date/Time!<BR>\n";
   if (empty( $plate))
 $message .= "Please Enter Truck Plate Number!<BR>\n";
     
	  
	if ( $message == "" ) // we found no errors
 {  
 $rad1="yes";
$result1="INSERT INTO `tab_automation` ( `port_of_entry` , `dep_date` , `checking_point` , `arr_date` , `importer_name` , `dec_reg_no` , `total_kg` , `ispartial` , `partial_kg` ,  `partial_package` ,`goods_description` , `truck_plate_number` , `contr_nbr1` , `seal_nbr1` , `contr_nbr2` , `seal_nbr2` , `officer_name` ,  `system_time` ,  `remark` ) 
VALUES ('$port', '$idate', '$checkingp', '$adate', '$importer', '$concaa', '$tkg' , '$rad1' , '$pkg' , '$pakage' , '$goods', '$plate', '$cont1', '$seal1', '$cont2', 'seal2', '$officer', NOW(),'$remark')" ;

$sql2=mysql_query($result1);
if ($sql2)
{

echo "<p align=\"center\"><h3>Your Insertion has been done Successfully!</h3></p><a href=\"search.php\">Go to Search Form</a><br> ";

}
else
{
print "Not Inserted $conca ";
}
}

	
	
	
	}
		 }
			} 
			
?>
</body>
</html>
 <?php
   
 exit;
 
 ?>