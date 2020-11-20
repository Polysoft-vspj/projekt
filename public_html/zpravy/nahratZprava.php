<?php
 session_start();
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "testserverpolysw", "5r8Xcxv6", "testserverpolysw");
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "INSERT INTO Zpravy (Odesilatel, Prijemce , Obsah, Datum) values('$_POST[Odesilatel]','$_POST[Prijemce]', '$_POST[Obsah]', '$_POST[Datum]')";

if (mysqli_query($link, $sql)) {    
    echo "zaznam byl uspesne pridan\n";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}
mysqli_close($link);

   /*
session_destroy();
header('Location: index.php');
mysqli_close($link);
*/
?>
<button><a href="index_zprava.php">Zpìt</button>
