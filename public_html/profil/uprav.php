<HTML>

<HEAD><TITLE>Úprava uživatelů</TITLE>

    <link href="css/all.css" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

</HEAD>
<BODY>
<?php

require("connect.php");

//$sql = "UPDATE uzivatele SET jmeno = '$_GET[jmeno]', admin = '$_GET[prava]' WHERE uzivatele_id='$_GET[uzivatele_id]'";
$sql = "UPDATE uzivatele SET jmeno = '$_GET[jmeno]' WHERE uzivatele_id='$_GET[uzivatele_id]'";

if (mysqli_query($spojeni, $sql)) {

    echo "Uživatel byl upraven";

} else {

    echo "Chyba při opravě: " . mysqli_error($spojeni);

}



mysqli_close($spojeni);



?>







<BR>

<A HREF="index.php" class="btn btn-primary alert">Prohlížení článů</A>



</body>

</html>