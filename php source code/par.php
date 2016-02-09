<?php 
// Make a mysql Connection 
include("connectivity.php");

$query = "SELECT dec_reg_no, sum(partial_kg) FROM tab_automation GROUP BY dec_reg_no"; 

$result = mysql_query($query) or die(mysql_error()); 

// Print out result 
while($row = mysql_fetch_array($result)){ 
$tpartial=$row['sum(partial_kg)'] + $tpartial;

echo "<br />"; 
} 
echo "Total Partial = ". $tpartial; 
?> 



