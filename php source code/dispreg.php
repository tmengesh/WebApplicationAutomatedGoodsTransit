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
    <td width="76%"><img src="images/logo.gif" width="700" height="88" /></td>
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
      <input name="txtidate" id="txtidate" size="25" onfocus="blur();" value="<?php print "$idate";?>"/>
    <a 
        href="javascript:NewCal('txtidate','ddmmmyyyy',true,12)"></a></div>		</td>
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
          <input name="txtidate2" id="txtidate2" size="25" onfocus="blur();" value="<?php print "$adate";?>"/>
          <a 
        href="javascript:NewCal('txtarrtime','ddmmmyyyy',true,12)"></a></span></td>
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
        <td colspan="2"><div align="left"><strong>Description of Goods: </strong></div></td>
        <td colspan="3"><input name="txtgoods" type="text" id="txtgoods" onfocus="blur();" value="<?php print "$goods";?>"/></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><div align="left"><strong>Truck Plate Number: </strong></div></td>
        <td colspan="3"><input name="txtplate" type="text" id="txtplate" onfocus="blur();" value="<?php print "$plate";?>"/></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><div align="left"><strong>Container Number1: </strong></div></td>
        <td colspan="3"><input name="txtcont1" type="text" id="txtcont1" onfocus="blur();" value="<?php print "$cont1";?>"/></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><div align="left"><strong>Seal Number1: </strong></div></td>
        <td colspan="3"><input name="txtseal1" type="text" id="txtseal1" onfocus="blur();" value="<?php print "$seal1";?>"/></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><div align="left"><strong>Container Number2: </strong></div></td>
        <td colspan="3"><input name="txtcont2" type="text" id="txtcont2" onfocus="blur();" value="<?php print "$cont2";?>"/></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><div align="left"><strong>Seal Number2: </strong></div></td>
        <td colspan="3"><input name="txtseal2" type="text" id="txtseal2" onfocus="blur();" value="<?php print "$seal2";?>"/></td>
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
<?php
	}
	 else
			{
		//	 session_start();
			echo "<p align=\"center\"><h3>Data didn't exitst, Go to registration form</h3></p><a href=\"form.php\"><h3>Go to registration form!</h3></a>";
			}
?>