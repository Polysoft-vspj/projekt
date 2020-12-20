 
  
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

$sql = "INSERT INTO Zpravy (Odesilatel, Prijemce , Obsah, Datum, email,helpdesk) values('$_POST[Odesilatel]','$_POST[Prijemce]', '$_POST[Obsah]', '$_POST[Datum]','$_POST[email]','1')";

if (mysqli_query($spojeni, $sql)) {    
    echo "Helpdesk byl uspesne pridan\n";
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
<button><a href="index_helpdesk.php">Zpět</button>
