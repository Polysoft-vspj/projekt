  <meta charset="utf-8" content="text/html;charset=UTF-8">
<?php
require("connect.php");
 session_start();
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
//$link = mysqli_connect("localhost", "testserverpolysw", "5r8Xcxv6", "testserverpolysw");
// Check connection
if($spojeni === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "INSERT INTO Zpravy (Odesilatel, Prijemce , Obsah, Datum, email) values('$_POST[Odesilatel]','$_POST[Prijemce]', '$_POST[Obsah]', '$_POST[Datum]','$_POST[email]')";

if (mysqli_query($spojeni, $sql)) {    
    echo "zaznam byl uspesne pridan\n";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($spojeni);
}
mysqli_close($spojeni);

   /*
session_destroy();
header('Location: index.php');
mysqli_close($link);
*/
?>
<button><a href="index_zprava.php">Zpět</button>
