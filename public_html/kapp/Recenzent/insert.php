<HTML>

<HEAD><TITLE>Vložení údajů</TITLE>
    <link href="css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</HEAD>

<BODY>
<?php
require("connect.php");

//@$vysledek = mysql_query("INSERT INTO sklad values('$_GET[cislo]','$_GET[nazev]','$_GET[cena]', '$_GET[mistnost]')");
$sql = "INSERT INTO clanky (clanky_id, Nazev_clanku, Autor_clanku, url_clanku, Jmeno_recenzenta, url_recenze, Stav) values('$_GET[clanky_id]','$_GET[Nazev_clanku]','$_GET[Autor_clanku]', '$_GET[url_clanku]', '$_GET[Jmeno_recenzenta]', '$_GET[url_recenze]', '$_GET[Stav]')";



if (mysqli_query($spojeni, $sql)) {
    echo "Záznam byl úspešně přidán";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($spojeni);
}
mysqli_close($spojeni);

?>

<BR>
<A HREF="index.php" class="btn btn-primary alert">Prohlížení článků</A>


    </body>
      </html>



