<?php 
session_start();
if(!(isset($_SESSION['auth']) && $_SESSION['auth']!=''))
{
header("Location:login.php");
}
?>
<?php
include("connectivity.php");
$uname=$_SESSION['username'];
$password=$_SESSION['password'];
$regno1= $_POST['comboocode'];
$regno2= $_POST['txtrnumber'];
$regno3= $_POST['txtyear'];
$ocode=$_SESSION['code'];
$conca = $regno1  . $regno2 . $regno3 ;
//check for autorized users
$sql1="SELECT * FROM `tab_useraccount` 
WHERE `user_name` = '$uname' AND `password` = '$password' ";
$officer=mysql_query($sql1);
$number_of_rows1 = mysql_num_rows($officer);
if($number_of_rows1==1) //if user is autorized
{
$officer1 = mysql_fetch_array($officer);
$username=$officer1[name];
$officecode=$officer1[code];
//select to check registeration no existency
$sql="SELECT * FROM `tab_automation` 
WHERE `dec_reg_no` = '$conca' ";
$result = mysql_query($sql);
  $number_of_rows = mysql_num_rows($result);            
   if($number_of_rows==1)    //if reg no exists                       
{ 
			$newArray = mysql_fetch_array($result);			
	$port = $newArray[port_of_entry];
$idate= $newArray[dep_date];
$checkingp= $newArray[checking_point];
$adate = $newArray[arr_date];
$importer = $newArray[importer_name];
$conca= $newArray[dec_reg_no];
$tkg= $newArray[totalkg];
$goods= $newArray[goods_description];
$plate= $newArray[truck_plate_number];
$cont1= $newArray[contr_nbr1];
$seal1= $newArray[seal_nbr1];
$cont2= $newArray[contr_nbr2];
$seal2= $newArray[seal_nbr2];
$officer= $newArray[officer_name];
$remark= $newArray[remark];		
   if ($officecode=='GAL' || $officecode=='MOY' || $officecode=='DEW' || $officecode=='TOCH' || $officecode=='MET' ) //check  user if port of entry 
      {
   header("Location:partial.php");
      }
         else 
     //user in data entry eg nazareth
	  {
	  header("Location:display.php");
	  }
}
else 
   //reg no not exist and check for users
{
          if ($officecode=='GAL' || $officecode=='MOY' || $officecode=='DEW' || $officecode=='TOCH' || $officecode=='MET' ) //check  user if port of entry 
{
header("Location:add.php");
}
          else
//if users are not in port of entry
         {
          print "error not registered in the port of entry";
         }
}
}
else
{
print "not autorized user";
}
?>