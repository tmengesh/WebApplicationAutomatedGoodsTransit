<?php 
session_start();
if(!(isset($_SESSION['auth']) && $_SESSION['auth']!=''))
{
header("Location:login.php");
}
?>
<?php
$uname=$_SESSION['username'];
include("connectivity.php");
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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script language='javascript'>
<!-- //
function setReadOnly(obj)
{
if(obj.value == "yes")
{
document.forms[0].mytext.style.backgroundColor = "#ffffff";
document.forms[0].mytext.readOnly = 0;
document.forms[0].mytext.value = "";

} else {
document.forms[0].mytext.style.backgroundColor = "#eeeeee";
document.forms[0].mytext.readOnly = 1;
document.forms[0].mytext.value = "Not applicable!";
}
}
// -->
</script>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Welcome to Transit Goods Movment Control Form</title>
<style type="text/css">
<!--
.style1 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 36px;
	color: #0000CC;
}
.style6 {font-size: 12px}
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
</head bgcolor="#FFFFCC">

<body onLoad="document.x.txtpkg.disabled=true ; document.x.txtppackage.disabled=true" bgcolor="#FFFFCC">


<table width="100%" height="100%" border="0" bgcolor="#FFFFCC">
  <tr>
    <td width="9%" height="46">&nbsp;</td>
    <td width="76%"><img src="images/logo.gif" width="700" height="88" /></td>
    <td width="15%">&nbsp;</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>
	
	
	
<?php
if (!isset($_POST['submit'])) {
?>
	<form name="x" action="" method="post">
	
	<table width="100%" height="100%" border="0">
      <tr>
        <td width="1%" rowspan="2">&nbsp;</td>
        <td><div align="center"></div></td>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td colspan="2"><a href="destroy.php" class="style2">Logout</a></td>
      </tr>
      <tr>
        <td colspan="6"><span class="style1">Transit Goods Movement Control Form </span></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><div align="left"><strong>Port of Entry: </strong></div></td>
        <td colspan="4"><label>
        <input name="comboport" type="text" id="comboport"  onfocus="blur();" value="<?php echo "$officecode" ; ?>" size="5" maxlength="5"/>
        </label></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><div align="left"><strong>Port Initial Date/ Time: </strong></div></td>
        <td colspan="4">
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
        <td colspan="4"><input name="combocpoint" type="text" id="combocpoint"  onfocus="blur();" value="<?php echo "$officecode" ; ?>" size="5"/></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><div align="left"><strong>Checking Point Arrival Date/ Time: </strong></div></td>
        <td colspan="4"><span class="lineItem">
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
        <td colspan="4"><label>
          <input name="txtimportername" type="text" id="txtimportername" />
        </label></td>
      </tr>
      
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><div align="left"><strong>Registration Number <br />
            </strong><span class="style6">(Office Code  + Registration Number + Year): </span></div></td>
        <td colspan="4"><select name="comboocode" id="comboocode" >
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
<input name="txtrnumber" type="text" id="txtrnumber" maxlength="5" width="15" size="5"  />
+
<input name="txtyear" type="text" id="txtyear" maxlength="4" width="15"  size="4"/></td>
      </tr>
	  	  <tr>
        <td>&nbsp;</td>
        <td colspan="2"><div align="left"><strong>Total KG : </strong></div></td>
        <td><input name="txtkg" type="text" id="txtkg" size="10" maxlength="10" /></td>
        <td>&nbsp;</td>
        <td width="17%"><strong>Total Package :</strong></td>
	  	  <td width="19%"><input name="txtpackage" type="text" id="txtpackage" size="10" maxlength="10" /></td>
	  	  </tr>
      <tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><div align="left"><strong>Partial: </strong><span class="style6">(Mark if its partial): </span></div></td>
		
        <td>Partial</td>
        <td>Yes
          <input type="radio" name="rad1" onclick="this.form.txtpkg.disabled=false;this.form.txtpkg.focus()" value="yes"/>
          <label></label>
          No
         <input type="radio" name="rad1" onclick="this.form.txtpkg.disabled=true" checked="checked" value="no" /></td>
        <td>Partial Package </td>
        <td>Yes
          <input type="radio" name="rad2" onclick="this.form.txtppackage.disabled=false;this.form.txtppackage.focus()" value="yes"/>
          <label></label>
No
<input type="radio" name="rad2" onclick="this.form.txtppackage.disabled=true" checked="checked" value="no" /></td>
      </tr>
	   <tr>
        <td>&nbsp;</td>
        <td colspan="2"><div align="left"><strong>Partial KG : </strong></div></td>
        <td><input name="txtpkg" type="text" id="txtpkg" size="10" maxlength="10"/></td>
        <td>&nbsp;</td>
        <td><strong>Partial  Package :</strong></td>
        <td><input name="txtppackage" type="text" id="txtppackage" size="10" maxlength="10"/></td>
	   </tr>
	  <tr>
        <td>&nbsp;</td>
        <td colspan="2"><div align="left"><strong>Description of Goods: </strong></div></td>
		
        <td colspan="4"><input name="txtgoods" type="text" id="txtgoods" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><div align="left"><strong>Truck Plate Number: </strong></div></td>
        <td colspan="4"><input name="txtplate" type="text" id="txtplate" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><div align="left"><strong>Container Number1: </strong></div></td>
        <td colspan="4"><input name="txtcont1" type="text" id="txtcont1" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><div align="left"><strong>Seal Number1: </strong></div></td>
        <td colspan="4"><input name="txtseal1" type="text" id="txtseal1" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><div align="left"><strong>Container Number2: </strong></div></td>
        <td colspan="4"><input name="txtcont2" type="text" id="txtcont2" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><div align="left"><strong>Seal Number2: </strong></div></td>
        <td colspan="4"><input name="txtseal2" type="text" id="txtseal2" /></td>
      </tr>
        <td>&nbsp;</td>
        <td colspan="2"><div align="left"><strong>Officer Name: </strong></div></td>
        <td colspan="4"><input name="txtofficer" type="text" id="txtofficer" value="<?php echo "$username" ; ?>"  onfocus="blur();"/></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><div align="left"><strong>Remark:</strong></div></td>
        <td colspan="4"><label>
          <textarea name="lstremark" id="lstremark" ></textarea>
        </label></td>
      </tr>
	   <tr>
        <td height="26">&nbsp;</td>
        <td width="24%">&nbsp;</td>
        <td width="10%"><label>
          <input type="submit" name="submit" value="Register" />
        </label></td>
        <td width="9%"><label>
          <input type="reset" name="reset" value="Clear" />
        </label></td>
        <td width="20%">&nbsp;</td>
        <td colspan="2">&nbsp;</td>
	   </tr>
    </table>
    </form>    </td>
    
<?php
} 
else {
$tkg= $_POST['txtkg'];
$pkg= $_POST['txtpkg'];
$tpackage= $_POST['txtpackage'];
$ppackage= $_POST['txtppackage'];

/*$query = "SELECT dec_reg_no, sum(partial_kg) FROM tab_automation WHERE `dec_reg_no` LIKE '$conca%' GROUP BY dec_reg_no"; 
		$result = mysql_query($query) or die(mysql_error()); 
		while($row = mysql_fetch_array($result)){ 
		$tpartial=$row['sum(partial_kg)'] + $tpartial;
		}*/
  if ($pkg > $tkg)
  {
  print "<font color=red size='11'>Error!!!!</font><br>";
  print "<font color=red size='5'>You are trying to insert partial KG which is above the total KG</font><br>";
  print "<a href='form.php'>Click here</a> <font color=red size='5'> to get back to Registartion Form </font>";
  
  }
  
  if ($ppackage > $tpackage)
  {
  print "<font color=red size='11'>Error!!!!</font><br>";
  print "<font color=red size='5'>You are trying to insert partial Package which is above the total Package</font><br>";
  print "<a href='form.php'>Click here</a> <font color=red size='5'> to get back to Registartion Form </font>";
  
  }
	else
	{



$port = $_POST['comboport'];
$idate= $_POST['txtidate'];
$checkingp= $_POST['combocpoint'];
$adate = $_POST['txtarrtime'];
$importer = $_POST['txtimportername'];
$regno1= $_POST['comboocode'];
$regno2= $_POST['txtrnumber'];
$regno3= $_POST['txtyear'];
$regno4= $_POST['select'];

$goods= $_POST['txtgoods'];
$plate= $_POST['txtplate'];

$cont1= $_POST['txtcont1'];
$seal1= $_POST['txtseal1'];
$cont2= $_POST['txtcont2'];

$seal2= $_POST['txtseal2'];

$officer= $_POST['txtofficer'];

$remark=$_POST['lstremark'];
//$insertedby =$_SESSION['username'];
$conca = $regno1 . $regno4  . $regno2 . $regno3 ;

/*$port = $_SESSION['port'];
$idate = $_SESSION['idate'];
$chekingp = $_SESSION['chekingp'];
$adate = $_SESSION['adate'];
$importer = $_SESSION['importer'];
$regno1 = $_SESSION['regno1'];
$regno2 = $_SESSION['regno2'];
$regno3 = $_SESSION['regno3'];

$goods = $_SESSION['goods'];
$plate = $_SESSION['plate'];

$cont1 = $_SESSION['cont1'];
$seal1 = $_SESSION['seal1'];
$cont2 = $_SESSION['cont2'];

$seal2 = $_SESSION['seal2'];

$officer = $_SESSION['officer'];

$remark =$_SESSION['remark'];
$insertedby =$_SESSION['username'];
$conca = $regno1  + $regno2 + $regno3 ;

*/

 //session_start();

$_SESSION['port'] = $_POST['comboport'];
$_SESSION['idate']= $_POST['txtidate'];
//$_SESSION['checkingp'] = $_POST['combocpoint'];
$_SESSION['adate']= $_POST['txtarrtime'];
$_SESSION['importer']= $_POST['txtimportername'];
//$_SESSION['regno1']= $_POST['comboocode'];
$_SESSION['regno2']= $_POST['txtrnumber'];
$_SESSION['regno3']= $_POST['txtyear'];

$_SESSION['goods']= $_POST['txtgoods'];
$_SESSION['plate']= $_POST['txtplate'];

$_SESSION['cont1']= $_POST['txtcont1'];
$_SESSION['seal1']= $_POST['txtseal1'];
$_SESSION['cont2']= $_POST['txtcont2'];
$_SESSION['tkg']= $_POST['txtkg'];
$_SESSION['pkg']= $_POST['txtpkg'];
$_SESSION['seal1']= $_POST['txtseal1'];

$_SESSION['officer']= $_POST['txtofficer'];

$_SESSION['remark']=$_POST['lstremark'];
//$insertedby =$_SESSION['username'];

$rad1=$_POST["rad1"];
$rad2=$_POST["rad2"];




$message="";
if(($_POST["rad1"]=="yes") && ($pkg)=="")
   $message .= "Please Enter Partial KG!<BR>\n";  
if(($_POST["rad2"]=="yes") && ($ppackage)=="")
   $message .= "Please Enter Partial Package!<BR>\n";  
if (empty( $port))
 $message .= "Please Enter Port of Entry!<BR>\n";   
 if (empty( $idate))
 $message .= "Please Enter Port Initial Date/Time!<BR>\n";
 if (empty( $checkingp))
 $message .= "Please Enter Checking Point Office!<BR>\n";
 if (empty( $adate))
 $message .= "Please Enter Arrival Date/Time!<BR>\n";
 if (empty( $tkg))
 $message .= "Please Enter Total KG!<BR>\n";
 
 
 
 if (empty( $importer))
 $message .= "Please Enter Name of Importer!<BR>\n";
 if (empty( $regno1))
 $message .= "Please Enter Office Code!<BR>\n";
 if (empty( $regno2))
 $message .= "Please Enter Registration Number!<BR>\n";
 if (empty( $regno3))
 $message .= "Please Enter Year!<BR>\n";
  if (empty( $goods))
 $message .= "Please Enter Goods Description!<BR>\n";

 if (empty( $plate))
 $message .= "Please Enter Truck Plate Number!<BR>\n";
  if (empty( $officer))
 $message .= "Please Enter Officer Name!<BR>\n";
  
  if ( !getRow( "tab_automation", "dec_reg_no", $conca ))
     {

     $message .= "";
     }
   else
   {
   
   $message .= "Declaration Number Already Exists!<BR>\n";
      }
  
  
  
  
	  
	if ( $message == "" ) // we found no errors
 {  
$result="INSERT INTO `tab_automation` ( `port_of_entry` , `dep_date` , `checking_point` , `arr_date` , `importer_name` , `dec_reg_no` , `total_kg` , `total_package` , `ispartial` , `partial_kg` , `partial_package` , `ispartialp` , `goods_description` , `truck_plate_number` , `contr_nbr1` , `seal_nbr1` , `contr_nbr2` , `seal_nbr2` , `officer_name` ,  `system_time` , `remark` ) 
VALUES ('$port', '$idate', '$checkingp', '$adate', '$importer', '$conca', '$tkg' , '$tpackage' , '$rad1' , '$pkg' , '$ppackage' , '$rad2' , '$goods', '$plate', '$cont1', '$seal1', '$cont2', 'seal2', '$officer', NOW(), '$remark')" ;

$sql=mysql_query($result);



if ($sql)
{

echo "<p align=\"center\"><h3>Your Insertion has been done Successfully!</h3></p><a href=\"search.php\">Go to Search Form</a><br>";

}
else
{
print "Not Inserted $conca ";
}
}
else
{
 print "<CENTER><font color=\"Red\" size=\"3\"><p><b>$message</b><p></font></CENTER>";
 
 print "<CENTER><h3>Your insertion is not Successfull<br />
  Use the browsers back button to fill the form again!!!</h3></CENTER>";
}
}
}
?>
<td>&nbsp;</td>
  </tr>
</table>
</body>
</html>

	 <?php
   
 exit;
 
 ?>