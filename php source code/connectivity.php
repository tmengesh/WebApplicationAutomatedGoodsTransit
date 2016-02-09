 <?php
 $link;
 connectToDB();
 function connectToDB()
 {
 global $link;
 $link = mysql_connect( "localhost","root","admin123"); //"harry", "elbomonkey"
 if ( ! $link )
 die( "Couldn't connect to MySQL" );
 mysql_select_db( "auto_transit", $link )
 or die ( "Couldn't open custom: ".mysql_error() );
  }
 function getRow( $table, $fnm, $fval )
 {
 global $link;
 $result = mysql_query( "SELECT * FROM $table WHERE $fnm='$fval'",
 $link );
 if ( ! $result )
 die ( "getRow fatal error: ".mysql_error() );
 return mysql_fetch_array( $result );
 }
?>