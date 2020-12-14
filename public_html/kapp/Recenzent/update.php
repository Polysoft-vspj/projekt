<HTML>



<HEAD><TITLE>Úprava článků</TITLE>

    <link href="css/all.css" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

</HEAD>



<BODY>



<?php

require("connect.php");


$download = "http://testserverpolysw.php5.cz/uploads/". basename($_FILES["fileToUpload"]["name"]);

  $sql = "UPDATE clanky SET Nazev_clanku = '$_GET[Nazev_clanku]', Autor_clanku = '$_GET[Autor_clanku]',  url_clanku = '$_GET[url_clanku]',  Jmeno_recenzenta = '$_GET[Jmeno_recenzenta]',  url_recenze = '$download',  Stav = '$_GET[stavy]' WHERE clanky_id='$_GET[clanky_id]'";



if (mysqli_query($spojeni, $sql)) {

    echo "Článek byl upraven";

} else {

    echo "Chyba při opravě: " . mysqli_error($spojeni);

}



mysqli_close($spojeni);



?>

	





<BR>

<A HREF="index.php" class="btn btn-primary alert">Prohlížení článů</A>



</body>

      </html>