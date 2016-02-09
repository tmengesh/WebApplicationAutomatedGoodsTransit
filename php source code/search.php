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
<title>Welcome to Transit Form</title>
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
.style7 {font-size: 14px}
.style9 {
	font-size: 11px;
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
        <td colspan="4"><div align="center"><span class="style1">Search Declaration Number </span></div></td>
      </tr>
      <tr>
        <td width="30%">&nbsp;</td>
        <td width="30%">&nbsp;</td>
        <td>&nbsp;</td>
        <td><a href="destroy.php" class="style4">Logout</a></td>
      </tr>
      
      <tr>
        <td>&nbsp;</td>
        <td colspan="4" rowspan="3"><form id="form1" name="form1" method="post" action="check.php">
         
		  <p>&nbsp;</p>
          <table width="100%" height="100%" border="0">
            <tr>
              <td width="4%">&nbsp;</td>
              <td colspan="4">&nbsp;</td>
              <td width="50%">&nbsp;</td>
            </tr>
            <tr>
              <td rowspan="2">&nbsp;</td>
              <td colspan="4" rowspan="2"><div align="left"><span class="style2">Registration Number<br /> 
                    </span><span class="style7"><span class="style9">(Office Code +   Serial Code +Registration Number + Year ):</span></span> </div></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><select name="comboocode" id="comboocode" >
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
              <td>&nbsp;</td>
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
        <td width="31%"><a href="changepassword.php"><span class="style3">Change Password </span></a></td>
        <td width="8%">&nbsp;</td>
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

	