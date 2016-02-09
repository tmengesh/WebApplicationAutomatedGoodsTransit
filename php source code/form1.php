<title>Your insertion is successfull</title><?php
include("connectivity.php");
$port = $_POST['comboport'];
$idate= $_POST['txtidate'];
$checkingp= $_POST['combocpoint'];
$adate = $_POST['txtarrtime'];
$importer = $_POST['txtimportername'];
$conca= $_POST['comboport2'];

$goods= $_POST['txtgoods'];
$plate= $_POST['txtplate'];

$cont1= $_POST['txtcont1'];
$seal1= $_POST['txtseal1'];
$cont2= $_POST['txtcont2'];

$seal2= $_POST['txtseal2'];

$officer= $_POST['txtofficer'];

$remark=$_POST['lstremark'];




$result="INSERT INTO `tab_automation1` ( `checking_point` , `arr_date` , `system_time` , `dec_reg_no` , `officer_name` , `remark` ) 
VALUES ( '$checkingp', '$adate', NOW(), '$conca' , '$officer', '$remark')" ;

$sql=mysql_query($result);



if ($sql)
{

echo "<p align=\"center\"><h3>Successfull! Your Updation has been done!</h3></p><a href=\"search.php\">Go to Search Form</a><br>";

}
else
{
print "Insertion not Done <a href=\"search.php\">Go to Search Form</a>";
}

?>