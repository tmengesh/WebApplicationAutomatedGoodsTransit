<?php
if (isset($_POST['txtusername']) || isset($_POST['txtpassword'])) {
    // form submitted
    // check for required values
    if (empty($_POST['txtusername'])) {

        die ("ERROR: Please enter username!");
    }
    if (empty($_POST['txtpassword'])) {
        die ("ERROR: Please enter password!");
    } 
	         
    // set server access variables
   $host = "localhost";
    $user = "root";
    $pass = "admin123";
    $db = "auto_transit";
    
    // open connection
    $connection = mysql_connect($host, $user, $pass) or die ("Unable to connect!");

    
    // select database 
    mysql_select_db($db) or die ("Unable to select database!");
    
    // create query
    $query = "SELECT * FROM tab_useraccount WHERE user_name = '" . $_POST['txtusername'] . "' AND password = '" . $_POST['txtpassword'] . "'";

    
    // execute query
    $result = mysql_query($query) or die ("Error in query: $query. " . mysql_error());
    
    // see if any rows were returned
    if (mysql_num_rows($result) == 1) {
	
	$newArray = mysql_fetch_array($result);
	if ($newArray[password]=='admin123' )
	{ 
	session_start();
        $_SESSION['admin'] = 1;
		$_SESSION['username']=$_POST['txtusername'];
		       	header("Location:admin.php"); 
	   
	}
	

      else {  // if a row was returned
        // authentication was successful
        // create session and set cookie with username
        session_start();
        $_SESSION['auth'] = 1;
		$_SESSION['username']=$_POST['txtusername'];
		$_SESSION['password']=$_POST['txtpassword'];
		$_SESSION['code']=$newArray[code];
		
		  	header("Location:search.php");   
        echo "Access granted!"; }
    }
    else {
        // no result
        // authentication failed
       
		header("Location:login.php");      
    }
    
    // free result set memory
    mysql_free_result($result);

    
    // close connection
    mysql_close($connection);
}
else {
    // no submission
    // display login form
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>User Login</title>
<style type="text/css">
<!--
.style2 {
	font-family: "Times New Roman", Times, serif;
	font-size: 24px;
}
-->
</style>
</head>

<body bgcolor="#FFFFCC">
<table width="100%" height="100%" border="0" bgcolor="#FFFFCC">
  <tr>
    <td width="1%" height="21">&nbsp;</td>
    <td colspan="9"><div align="center"><img src="images/logo.gif" width="700" height="88" /></div></td>
    <td width="1%">&nbsp;</td>
  </tr>
  <tr>
    <td height="391" rowspan="5">&nbsp;</td>
    <td colspan="9" bgcolor="#FFFFCC">&nbsp;</td>
    <td rowspan="5">&nbsp;</td>
  </tr>
  <tr>
    <td width="19%" height="24">&nbsp;</td>
    <td colspan="7" rowspan="3"><form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <table width="100%" height="100%" border="0">
        <tr>
          <td width="7%">&nbsp;</td>
          <td width="26%"><span class="style2">User Name: </span></td>
          <td width="67%"><label>
            <input name="txtusername" type="text" id="txtusername" />
          </label></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><span class="style2">Password:</span></td>
          <td><input name="txtpassword" type="password" id="txtpassword" /></td>
        </tr>
        <tr>
          <td height="21">&nbsp;</td>
          <td>&nbsp;</td>
          <td><label>
            <input type="submit" name="Submit" value="Login" />
            <input type="reset" name="Submit2" value="Clear" />
          </label></td>
        </tr>
      </table>
        </form>
    </td>
    <td width="17%">&nbsp;</td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
    <td height="21">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="9">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="9">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>

<?php
}


?>