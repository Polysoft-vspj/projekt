
<?php                                                                                  
$servername = "localhost";
$username = "testserverpolysw";
$password = "5r8Xcxv6";
$dbname = "testserverpolysw";
$spojeni = mysqli_connect($servername, $username, $password, $dbname);
//mysqli_query("SET COLLATION_CONNECTION='utf8_general_ci'");
mysqli_set_charset($spojeni, "utf8");
//$spojeni->set_charset("utf8");
//MySQL_Query("SET NAMES 'cp1250'");
?>
