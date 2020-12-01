<?php
require("connect.php");
$sql1 = "SELECT * from uzivatele WHERE uzivatele_id= $_GET[oc]";
$vysledek = mysqli_query($spojeni, $sql1);
$radeks = mysqli_fetch_assoc($vysledek);
//echo $radeks["jmeno"];
?>
<HTML>

<HEAD><TITLE>Úprava údajů</TITLE>

    <link href="css/all.css" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

</HEAD>

<BODY>

<div class="container w-50">
    <H1>Úprava uživatele</H1>

    <!-- vypsani polozek zaznamu do formulare pro upravy -->

    <FORM ACTION="uprav.php" METHOD=GET>

        <TABLE>

            <?php echo "ID uživatele je: ". $radeks["uzivatele_id"];

            ?>
                                         

            <TR><TD>Jméno: <TD><INPUT class="form-control" NAME=jmeno VALUE="<?php echo $radeks["jmeno"] ?>"SIZE=20>
            <TR><TD>Aktuální opránění: <TD><INPUT readonly class="form-control" NAME=pravoakt VALUE="
                 <?php
                    if($radeks["admin"]==0)echo Čtenář;

                    if($radeks["admin"]==1)echo Redaktor;

                    if($radeks["admin"]==2)echo Recenzent;

                    if($radeks["admin"]==3)echo Šéfredaktor;

                    if($radeks["admin"]==4)echo Admin;

                    if($radeks["admin"]==5)echo Autor;?>
            "SIZE=20>

            <TR><TD>Změnit stav opránění: </TD><TD>

                    <select class="form-control" name="prava"  >

                        <option value="0">Čtenář</option>

                        <option value="1">Redaktor</option>

                        <option value="2">Recenzent</option>

                        <option value="3">Šéfredaktor</option>

                        <option value="4">Admin</option>

                        <option value="5">Autor</option>

                    </select>

                </TD></TR><br />

        </TABLE>

        <INPUT TYPE=hidden name=uzivatele_id VALUE="<?php echo $radeks["uzivatele_id"];?>">

        <br />

        <INPUT TYPE=SUBMIT VALUE="odešli" class="btn btn-success alert">

    </FORM>



    <FORM ACTION="index.php">

        <INPUT TYPE=SUBMIT VALUE="Zpět" class="btn btn-dark alert">

    </FORM>

    <?php

    mysqli_close($spojeni);

    ?>

</div>

</BODY>

</HTML>
