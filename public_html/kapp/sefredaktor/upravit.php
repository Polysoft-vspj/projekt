<?php
  require("connect.php");
?>


<HTML>

<HEAD><TITLE>Úprava údajů</TITLE>
    <link href="css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</HEAD>

<BODY>
<div class="container w-50">
<?php
$sql = "select * from clanky where clanky_id=$_GET[oc]";
$vysledek = mysqli_query($spojeni, $sql);  

//@$vysledek = mysql_query("select * from sklad2 where cislo=$_GET[oc]");

//$pocet=mysql_num_rows($vysledek);
$radeks = mysqli_fetch_assoc($vysledek) 


//$OC = $radeks["cislo"];
//$Nazev= $radeks["nazev"];
//$cena = $radeks["cena"];
//$Mistnost = $r[3];

//endwhile;



?>
<H1>Úprava článků</H1>

<!-- vypsani polozek zaznamu do formulare pro upravy -->
<FORM ACTION="update.php" METHOD=GET>
<TABLE>
<?php echo "ID článku je: ". $radeks["clanky_id"];
?>

<TR><TD>Název článku: <TD><INPUT readonly class="form-control" NAME=Nazev_clanku VALUE="<?php echo $radeks["Nazev_clanku"] ?>"SIZE=20>
<TR><TD>Autor článku: <TD><INPUT readonly class="form-control" NAME=Autor_clanku VALUE="<?php echo $radeks["Autor_clanku"] ?>"SIZE=20>
<TR><TD>URL článku: <TD><INPUT readonly class="form-control" NAME=url_clanku VALUE="<?php echo $radeks["url_clanku"] ?>"SIZE=20>
<TR><TD>Jméno recenzenta: <TD><INPUT  class="form-control" NAME=Jmeno_recenzenta VALUE="<?php echo $radeks["Jmeno_recenzenta"] ?>"SIZE=20>
<TR><TD>URl recenzenta: <TD><INPUT  class="form-control" NAME=url_recenze VALUE="<?php echo $radeks["url_recenze"] ?>"SIZE=20>
<TR><TD>Aktuální stav recenze: <TD><INPUT readonly class="form-control" NAME=Stav VALUE="<?php echo $radeks["Stav"] ?>"SIZE=20>	
<TR><TD>Změnit stav recenze: </TD><TD>
	<select class="form-control" name="stavy"  >
	<!--	<option value="podáno">podáno</option>
		<option value="předáno recenzentům">předáno recenzentům</option>   -->
		<option value="přijato">přijato</option>
		<option value="přijato s výhradami">přijato s výhradami</option>
		<option value="vráceno z důvodu nevhodnosti příspevku">vráceno z důvodu nevhodnosti příspevku</option>
		<option value="vráceno z důvodu tématické nevhodnosti">vráceno z důvodu tématické nevhodnosti</option>
		<option value="zamítnuto">zamítnuto</option>
	
	</select>
	</TD></TR><br />
	
	
	
	
	
	





</TABLE>
<INPUT TYPE=hidden name=clanky_id VALUE="<?php echo $radeks["clanky_id"];?>">
<br>
<INPUT TYPE=SUBMIT VALUE="odešli" class="btn btn-success alert">
</FORM>

<FORM ACTION=vsechny_clanky.php>
<INPUT TYPE=SUBMIT VALUE="Zpět" class="btn btn-dark alert">
</FORM>
    <?php
mysqli_close($spojeni);
?>
</div>
</BODY>
</HTML>
