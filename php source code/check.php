<?php 
session_start();
if(!(isset($_SESSION['auth']) && $_SESSION['auth']!=''))
{
header("Location:login.php");
}
?>
<?php
//include("connectivity.php");
    $host = "localhost";
    $user = "root";
    $pass = "admin123";
    $db = "auto_transit";
    // open connection
    $connection = mysql_connect($host, $user, $pass) or die ("Unable to connect!");
      // select database 
    mysql_select_db($db) or die ("Unable to select database!");
$uname=$_SESSION['username'];
$password=$_SESSION['password'];
$regno1= $_POST['comboocode'];
$regno4= $_POST['select'];
$regno2= $_POST['txtrnumber'];
$regno3= $_POST['txtyear'];

$ocode=$_SESSION['code'];
$conca = $regno1 . $regno4  . $regno2 . $regno3 ;
$_SESSION['conca']=$conca;
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
$pkg= $newArray[partial_kg];
$tkg= $newArray[total_kg];

$ppackage= $newArray[partial_package];
$tpackage= $newArray[total_package];

$goods= $newArray[goods_description];
$plate= $newArray[truck_plate_number];
$cont1= $newArray[contr_nbr1];
$seal1= $newArray[seal_nbr1];
$cont2= $newArray[contr_nbr2];
$seal2= $newArray[seal_nbr2];
$officer= $newArray[officer_name];
$remark= $newArray[remark];	
$partial=$newArray[ispartial];		
$packagepartial=$newArray[ispartialp];		

   if ($officecode=='GAL' || $officecode=='MOY' || $officecode=='DEW' || $officecode=='TOCH' || $officecode=='MET' ) //check  user if port of entry 
      {
	  if ($partial=='yes' )
	  {
	   	   $query = "SELECT dec_reg_no, sum(partial_kg) FROM tab_automation WHERE `dec_reg_no` LIKE '$conca%' GROUP BY dec_reg_no"; 
		$result = mysql_query($query) or die(mysql_error()); 
		while($row = mysql_fetch_array($result)){ 
		$tpartial=$row['sum(partial_kg)'] + $tpartial;    }  
		
		

	  /*$sqlpartial="SELECT SUM(partial_kg) FROM `tab_automation` 
WHERE `dec_reg_no` LIKE '$conca%' ";
$sqlresult = mysql_query($sqlpartial);
//$tpartial=$sqlresult + $pkg*/
//print " $tkg";
  if ($tpartial>=$tkg )
  {
   header("Location:dispreg1.php");
   }
  else
  {
   header("Location:partial.php");
   }
    
}
	 
	 
	 
	 
		else if ($packagepartial=='yes' )
	  {
	   	   $query = "SELECT dec_reg_no, sum(partial_package) FROM tab_automation WHERE `dec_reg_no` LIKE '$conca%' GROUP BY dec_reg_no"; 
		$tppartial = $pkg1; 
		$result = mysql_query($query) or die(mysql_error()); 
		while($row = mysql_fetch_array($result)){ 
		$tppartial=$row['sum(partial_package)'] + $tppartial;
		}
		
		
  if ($tppartial < $tpackage )
  {
   header("Location:packagepartial.php");
   }
   else if ($tppartial = $tpackage )
  {
   header("Location:dispreg2.php");
   }
  else
  {
   header("Location:dispreg2.php");
   }
    
}
	  
	 
	 
	 else
	 {
	 header("Location:dispreg.php");
	 }
   //print "partial";
      }
         else 
     //user in data entry eg nazareth
	  {
	  header("Location:checkreg.php");
	  }
}
else 
   //reg no not exist and check for users
{
          if ($officecode=='GAL' || $officecode=='MOY' || $officecode=='DEW' || $officecode=='TOCH' || $officecode=='MET' ) //check  user if port of entry 
{
header("Location:form.php");
}
          else
//if users are not in port of entry
         {
           print "<font color=red size='11'>Error!!!!</font><br>";
  print "<font color=red size='5'>The Declaration Number $conca is Not Registred in Port of Entry</font><br>";
  print "<a href='search.php'>Click here</a> <font color=red size='5'> to get back to Search </font>";
		  //print "error not registered in the port of entry";
         }
}
}
else
{
print "not autorized user";
}
?>