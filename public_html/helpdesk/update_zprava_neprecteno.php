<HTML>

<HEAD><TITLE>Úprava článků</TITLE>
    <link href="css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</HEAD>

<BODY>

<?php
$servername = "localhost";
$username = "testserverpolysw";
$password = "5r8Xcxv6";
$dbname = "testserverpolysw";
$spojeni = mysqli_connect($servername, $username, $password, $dbname);
 mysqli_set_charset($spojeni, "utf8");
 
 
  $sql = "UPDATE `Zpravy` SET `zobrazeno` = 0 WHERE ID_zpravy='$_GET[oc]'";    


if (mysqli_query($spojeni, $sql)) {
    echo "Zpráva byla přečtena ";
} else {
    echo "Chyba při přečtení: " . mysqli_error($spojeni);
}

mysqli_close($spojeni);

?>

<BR>
<A HREF="index_helpdesk.php" class="btn btn-primary alert">Zpět</A>

</body>
      </html>