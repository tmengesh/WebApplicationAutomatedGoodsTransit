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
<title>Create New User</title>
<style type="text/css">
<!--
.style1 {font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 36px;
	color: #0000CC;
}
.style3 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 20px; color: #0000CC; }
.style4 {
	color: #0000CC;
	font-size: 20px;
}
.style5 {font-size: 20px}
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
        <td colspan="5"><div align="center"><span class="style1">Create New User Account </span></div></td>
      </tr>
      <tr>
        <td width="31%">&nbsp;</td>
        <td width="30%">&nbsp;</td>
        <td width="18%">&nbsp;</td>
        <td width="9%"><a href="admin.php" class="style5">Home</a></td>
        <td width="11%"><span class="style4"><a href="destroy.php">Logout</a></span></td>
      </tr>
      
      <tr>
        <td height="147">&nbsp;</td>
        <td colspan="5"><form id="form1" name="form1" method="post" action="">
          <p>&nbsp;</p>
              <table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="29%">&nbsp;</td>
                  <td colspan="2"><span class="style3">User Name </span></td>
                  <td colspan="2"><label for="textfield"></label>
                  <input type="text" name="txtuname" id="txtuname" /></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td colspan="2">&nbsp;</td>
                  <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td colspan="2"><span class="style3">Password</span></td>
                  <td colspan="2"><input type="password" name="txtpassword" id="txtpassword" /></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td colspan="2">&nbsp;</td>
                  <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td colspan="2"><span class="style3">Officer Name </span></td>
                  <td colspan="2"><input type="text" name="txtoname" id="txtoname" /></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td colspan="2">&nbsp;</td>
                  <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td colspan="2"><span class="style3">Officer Code </span></td>
                  <td colspan="2"><input type="text" name="txtocode" id="txtocode" /></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td colspan="2">&nbsp;</td>
                  <td colspan="2">&nbsp;</td>
			    </tr>
                <tr>
                  
                  <td>&nbsp;</td>
                  <td width="9%">&nbsp;</td>
                  <td width="11%"><label for="Submit"></label>
                  <input type="submit" name="submit" value="Create" id="submit" /></td>
                  <td width="11%"><input type="reset" name="Submit2" value="Clear" id="Submit2" /></td>
                  <td width="40%">&nbsp;</td>
	                    </tr>
              </table>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
        </form></td>
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




$uname = $_POST['txtuname'];
$password= $_POST['txtpassword'];
$oname= $_POST['txtoname'];
$ocode= $_POST['txtocode'];
$uuname= $_SESSION['username'];
/*
session_start();
$_SESSION['seal2']= $_POST['txtseal2'];
$_SESSION['officer']= $_POST['txtofficer'];
$_SESSION['remark']=$_POST['lstremark'];
//$insertedby =$_SESSION['username'];
*/




include("connectivity.php");


$message="";

if (empty( $uname))
 $message .= "Please Enter User Name!<BR>\n";   
 if (empty( $password))
 $message .= "Please Enter Password!<BR>\n";
 if (empty( $oname))
 $message .= "Please Enter Officer Name!<BR>\n";
 if (empty( $ocode))
 $message .= "Please Enter Offic Code!<BR>\n";
 
  
  
  if ( !getRow( "tab_useraccount", "user_name", $uname ))
     {

     $message.= "";
	 	 
     }
   else
   {
   
   $message .= "user already exists!<BR>\n";
      }
  
 
     
  
  
  
	  
	if ( $message == "" ) // we found no errors
 {  
	// $result="UPDATE `tab_useraccount` SET `password`=`$npassword` WHERE `user_name`='$_SESSION['username']'";
/*$sql="UPDATE tab_useraccount SET password=$npassword WHERE user_name=$_SESSION['username']";
UPDATE items,month SET items.price=month.price
WHERE items.id=month.id;
*/

//$result="UPDATE `tab_useraccount` SET `password` = '$cpassword' WHERE (`tab_useraccount`.`user_name`) = '$uname'  ";

$result=mysql_query("INSERT INTO `tab_useraccount` VALUES ('$uname','$password','$oname','$ocode' ) "); 




//$sql="UPDATE tab_useraccount SET password=$npassword WHERE `user_name` = '$uname' ";
//$sql=mysql_query($result);
$sql1=mysql_affected_rows();
if ($result)
{
echo "<p align=\"center\"><h3>User Account has been Successfully Created! </h3></p><a href=\"admin.php\">Back to Admin Page</a><br>";

}
else
{
 print "not";
}
}
else
{
 print "<CENTER><font color=\"Red\" size=\"3\"><p><b>$message</b><p></font></CENTER>";
 
 print "<CENTER><h3>You didn't create user use the browsers back button to try again!!!</h3></CENTER>";
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

