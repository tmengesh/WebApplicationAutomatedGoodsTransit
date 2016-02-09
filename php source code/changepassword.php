<?php 
session_start();
if(!(isset($_SESSION['auth']) && $_SESSION['auth']!=''))
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
<title>Change Password</title>
<style type="text/css">
<!--
.style1 {font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 36px;
	color: #0000CC;
}
.style3 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 20px; color: #0000CC; }
.style4 {font-size: 20px}
-->
</style>
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
        <td colspan="4"><div align="center"><span class="style1">Change Login Password </span></div></td>
      </tr>
      <tr>
        <td width="31%">&nbsp;</td>
        <td width="44%">&nbsp;</td>
        <td><a href="search.php" class="style4">Home</a></td>
        <td><a href="destroy.php" class="style4">Logout</a></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="4" rowspan="3"><form id="form1" name="form1" method="post" action="">
          <p>&nbsp;</p>
          <table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="25%">&nbsp;</td>
              <td colspan="4"><span class="style3">Old Password </span></td>
              <td colspan="2"><label for="textfield"></label>
                <input type="password" name="txtopassword" id="txtopassword" /></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td colspan="4">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td colspan="4"><span class="style3">New Password </span></td>
              <td colspan="2"><input type="password" name="txtnpassword" id="txtnpassword" /></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td colspan="4">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
              <td rowspan="2">&nbsp;</td>
              <td colspan="4"><span class="style3">Confirm Password </span></td>
              <td colspan="2"><input type="password" name="txtcpassword" id="txtcpassword" /></td>
            </tr>
            <tr>
              <td colspan="4">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
            </tr>
			            <tr>
              <td>&nbsp;</td>
              <td width="7%">&nbsp;</td>
              <td width="8%"><label for="Submit"></label></td>
              <td width="5%">&nbsp;</td>
              <td width="10%"><input type="submit" name="submit" value="Submit" id="submit" /></td>
              <td width="11%"><input type="reset" name="Submit2" value="Clear" id="Submit2" /></td>
			            <td width="34%">&nbsp;</td>
			            </tr>
			</table>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
        </form></td>
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
        <td width="12%">&nbsp;</td>
        <td width="12%">&nbsp;</td>
      </tr>
      <tr>
        <td height="26">&nbsp;</td>
        <td colspan="4">&nbsp;</td>
      </tr>
    </table></td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>

<?php
} 
else {




$opassword = $_POST['txtopassword'];
$npassword= $_POST['txtnpassword'];
$cpassword= $_POST['txtcpassword'];
$uname= $_SESSION['username'];
/*
session_start();
$_SESSION['seal2']= $_POST['txtseal2'];
$_SESSION['officer']= $_POST['txtofficer'];
$_SESSION['remark']=$_POST['lstremark'];
//$insertedby =$_SESSION['username'];
*/




include("connectivity.php");


$message="";

if (empty( $opassword))
 $message .= "Please Enter Old Password!<BR>\n";   
 if (empty( $npassword))
 $message .= "Please Enter New Password!<BR>\n";
 if (empty( $cpassword))
 $message .= "Please Enter Confirmation new Password!<BR>\n";
 
  if ( getRow( "tab_useraccount", "password", $opassword ))
     {

     $message.= "";
	 	 
     }
   else
   {
   
   $message .= "Wrong Password!<BR>\n";
      }
  
  
  if ($npassword=$cpassword)
	 {
	 $message .= "";
	 }
	 else
	 {
 $message .= "New Password and Confirmation Passowrd didn't match!<BR>\n";  
     }
  
  
  
	  
	if ( $message == "" ) // we found no errors
 {  
	// $result="UPDATE `tab_useraccount` SET `password`=`$npassword` WHERE `user_name`='$_SESSION['username']'";
/*$sql="UPDATE tab_useraccount SET password=$npassword WHERE user_name=$_SESSION['username']";
UPDATE items,month SET items.price=month.price
WHERE items.id=month.id;
*/

//$result="UPDATE `tab_useraccount` SET `password` = '$cpassword' WHERE (`tab_useraccount`.`user_name`) = '$uname'  ";

$result=mysql_query("UPDATE `tab_useraccount` SET `password` = '$cpassword' WHERE `user_name` ='$uname'  "); 




//$sql="UPDATE tab_useraccount SET password=$npassword WHERE `user_name` = '$uname' ";
//$sql=mysql_query($result);
$sql1=mysql_affected_rows();
if ($result)
{
echo "Records updated: " . $sql1 ;
//echo $uname;
echo "<p align=\"center\"><h3>Successfull! Your Password has been Changed!</h3></p><a href=\"search.php\">Back to Search Form</a><br>";

}
else
{
 print "not";
}
}
else
{
 print "<CENTER><font color=\"Red\" size=\"3\"><p><b>$message</b><p></font></CENTER>";
 
 print "<CENTER><h3>You didn't change your password use the browsers back button to try again!!!</h3></CENTER>";
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

