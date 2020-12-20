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

  $sql = "SELECT * from Zpravy WHERE ID_zpravy= $_GET[oc]";

$vysledek = mysqli_query($spojeni, $sql);

$radek = mysqli_fetch_assoc($vysledek);

$oc=$radek[ID_zpravy];
echo "Chcete zprávu opravdu smazat? <BR>";
echo " Id Zpravy: ".$radek[ID_zpravy]."<BR> ";
echo " Zpráva: ".$radek[Obsah]."<BR> ";

  mysqli_close($spojeni);
?>
<FORM ACTION=delete_zprava.php method=GET>
<INPUT TYPE=HIDDEN NAME=oc VALUE="<?php echo $_GET[oc] ?>">
<INPUT TYPE=SUBMIT VALUE="Ano" class="btn btn-success alert">
</FORM>                                            

<FORM ACTION=index_helpdesk.php>
<INPUT TYPE=SUBMIT VALUE="Zpět" class="btn btn-dark alert">
</FORM>
</div>
</BODY>
</HTML>
