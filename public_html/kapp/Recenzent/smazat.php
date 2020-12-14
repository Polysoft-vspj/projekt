<HTML xmlns="http://www.w3.org/1999/html">
<HEAD>
<TITLE>Potvrzení smazání</TITLE>
    <link href="css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</HEAD>
<BODY>
<div class="container w-50">
<H1>Potvrzení smazání</H1>
<?php
  require("connect.php");

  $sql = "SELECT * from clanky WHERE clanky_id= $_GET[oc]";

$vysledek = mysqli_query($spojeni, $sql);
 
$radek = mysqli_fetch_assoc($vysledek);
  
$oc=$radek[clanky_id];
echo "Chcete článek opravdu smazat? <BR>";

echo " Id článku: ".$radek[clanky_id]."<BR> ";
echo "Název článku:        ". $radek[Nazev_clanku]."<BR> ";
echo "Auto článku:        ". $radek[Autor_clanku]."<BR>";
echo "url článku:        ". $radek[url_clanku]."<BR>";
echo "Jméno recenzenta:        ". $radek[Jmeno_recenzenta]."<BR>";
echo "url recenze:        ". $radek[url_recenzenta]."<BR><BR>";
  mysqli_close($spojeni);
?>
<FORM ACTION=delete.php method=GET>
<INPUT TYPE=HIDDEN NAME=oc VALUE="<?php echo $_GET[oc] ?>">
<INPUT TYPE=SUBMIT VALUE="Ano" class="btn btn-success alert">
</FORM>



<FORM ACTION=index.php>
<INPUT TYPE=SUBMIT VALUE="Zpět" class="btn btn-dark alert">
</FORM>
</div>
</BODY>
</HTML>
