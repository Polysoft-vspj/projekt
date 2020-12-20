
<?php
require("connect.php");

$sql = "DELETE FROM Zpravy WHERE ID_zpravy = '$_GET[oc]'";

if (mysqli_query($spojeni, $sql)) {
    echo "Záznam byl úspěšně smazán";
} else {
    echo "Chyba při mazání: " . mysqli_error($spojeni);
}

mysqli_close($spojeni);
 ?>

<HTML>
<HEAD>
    <link href="../css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</HEAD>
<BODY>
<BR>
<A HREF="index_helpdesk.php" class="btn btn-primary alert">zpět</A>
</BODY>
</HTML>





