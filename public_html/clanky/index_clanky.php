<?php
session_start();
if (!IsSet($nazev)) $nazev="";
if (!IsSet($orderby)) $orderby="";
require("connect.php");?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <style>
        #Redaktor, #Sefredaktor,#Autor,#Administrator,#Recenzent{            visibility: hidden;        }
    </style>
    <?php if($_SESSION['uzivatel_admin']==3 ){ ?>
        <style>            #Sefredaktor{                visibility: visible;            }
        </style>
    <?php }    ?>
    <?php if($_SESSION['uzivatel_admin']!=1&&$_SESSION['uzivatel_admin']!=2&&$_SESSION['uzivatel_admin']!=3&&$_SESSION['uzivatel_admin']!=4&&$_SESSION['uzivatel_admin']!=5 ){ ?>
        <style>            #schovat{                visibility: hidden;            }            #schovat{                visibility: hidden;            }            .ukazat{                visibility: hidden;            }        </style>    <?php }    ?>    <?php if($_SESSION['uzivatel_admin']==1 ){ ?>        <style>            #Redaktor{                visibility: visible;            }        </style>    <?php }    ?>    <?php if($_SESSION['uzivatel_admin']==2 ){ ?>        <style>
        #Recenzent{                visibility: visible;            }
    </style>    <?php }    ?>    <?php if($_SESSION['uzivatel_admin']==4 ){ ?>
        <style>            #Redaktor,#Sefredaktor,#Autor,#Administrator, #Recenzent{                visibility: visible;            }
        </style>
    <?php }    ?>
    <?php if($_SESSION['uzivatel_admin']==5 ){ ?>
        <style>            #Autor{                visibility: visible;            }        </style>    <?php }    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Polysoft">
    <title>LOGOS POLYTECHNIKOS</title>
    <!-- Bootstrap -->    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">    <!-- Vlastni css -->
    <link href="css/logoskaskados.css" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest"></head><body id="page-top">
<!-- Naviagce --><nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">
            <img src="img/logo.png" alt="logo" width="300px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">                <!-- <li class="nav-item">                  <a class="nav-link js-scroll-trigger" href="#">lorem</a>                </li> -->
                <li class="nav-item" id="Administrator">
                    <a class="nav-link js-scroll-trigger" href="../administrator/index.php"><b>Administrátor</b></a>
                </li>
                <li class="nav-item" id="Autor">                    <a class="nav-link js-scroll-trigger" href="../autor/index.php"><b>Autor</b></a>                </li>
                <li class="nav-item" id="Redaktor">                    <a class="nav-link js-scroll-trigger" href="../redaktor/index_redaktor.php"><b>Redaktor</b></a>                </li>
                <li class="nav-item" id="Sefredaktor">                    <a class="nav-link js-scroll-trigger" href="../sefredaktor/index_sefredaktor.php"><b>Šéfredaktor</b></a>                </li>
                <li class="nav-item" id="Recenzent">                    <a class="nav-link js-scroll-trigger" href="../Recenzent/index.php"><b>Recenzent</b></a>                </li>
                <li class="nav-item" id="Clanky">                    <a class="nav-link js-scroll-trigger" href="../index.php"><b>Úvod</b></a>                </li>
                <li class="nav-item" id="Zpravy">                    <a class="nav-link js-scroll-trigger" href="../zpravy/index_zprava.php"><b>Zprávy</b></a>                </li>
            </ul>
        </div>
    </div>
    <ul class="navbar-nav ml-auto">
        <div id="schovat" style="color: white !important;"><b>Uživatel:&nbsp;<?php echo $_SESSION['uzivatel_jmeno'];?>&nbsp;|&nbsp;Oprávění:&nbsp;
                <?php                if($_SESSION['uzivatel_admin']==0)echo Čtenář;                if($_SESSION['uzivatel_admin']==5)echo Autor;                if($_SESSION['uzivatel_admin']==1)echo Redaktor;                if($_SESSION['uzivatel_admin']==2)echo Recenzent;                if($_SESSION['uzivatel_admin']==3)echo Šéfredaktor;                if($_SESSION['uzivatel_admin']==4)echo Admin;
                ?>
            </b>
        </div>
        <li class="" id="">            <a class="nav-link js-scroll-trigger"> </a>        </li>
        <?php        if(isset($_SESSION['uzivatel_id'])){ ?>
        <li class="nav-item">            <a href="../login/odhlaseni.php"><button type="button" class="btn bg-danger text-light">Odhlásit</button></a>
            <?php if (isset($_GET['uzivatel_id']))            {                session_destroy();                header('Location: ../index.php');                exit();            }}else{ ?>
                <a href="../login/prihlaseni.php" ><button type="button" class="btn bg-danger text-light">Přihlásit</button></a>
            <?php } ?>
        </li>
    </ul>
</nav>
<header class="bg-danger text-white">
    <div class="container text-center">
        <h2>Vítejte v redakci časopisu</h2>
        <h1><b>LOGOS POLYTECHNIKOS</b></h1>
        <p class="lead">Projekt do předmětu <b><i>Řízení softwarových projeků</i></b> za tým Polysoft</p>
    </div></header>
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h1>Čísla časopisů</h1>
                <br>
                <br>


                <?php
                echo "<h2>Listopadové číslo časopisu</h2>";
                $sql1 = "select * from clanky where Zverejneno = 1 and cislo_c = 'listopad'";
                $vysledek1 = mysqli_query( $spojeni, $sql1 );
                echo "<TABLE class='table' class='table-striped' BORDER=0 CELLSPACING=0 CELLPADDING=4>\n";
                echo "<TR BGCOLOR=lightgrey VALIGN=TOP>\n";
                echo "<TD ALIGN=CENTER><b>" . ( "Název článku" ) . "</b></TD>\n";
                echo "<TD ALIGN=CENTER><b>" . ( "Autor článku" ) . "</b></TD>\n";
                echo "<TD ALIGN=CENTER><b>" . ( "URL článku" ) . "</b></TD>\n";
                echo "<TH colspan='2'></TH></tr>\n";
                if ( mysqli_num_rows( $vysledek1 ) > 0 ) {
                    while ( $zaznam = mysqli_fetch_assoc( $vysledek1 ) ):
                        $oc = $zaznam[ "clanky_id" ];
                    echo "<TD  ALIGN=CENTER>" . $zaznam[ "Nazev_clanku" ] . "</TD>";
                    echo "<TD  ALIGN=CENTER>" . $zaznam[ "Autor_clanku" ] . "</TD>";
                    echo "<TD  ALIGN=CENTER><a href='".$zaznam['url_clanku']."' download> Download </TD>";
                    echo "<TR VALIGN=TOP>";                        $i = $i + 1;
                    endwhile;
                } else {
                    echo "0 nalezených záznamů";
                }
                echo "</TABLE>";
                echo "<br>";
                echo "<br>";

                // prosincové čislo
                echo "<h2>Prosincové číslo časopisu</h2>";
                $sql2 = "select * from clanky where Zverejneno = 1 and cislo_c = 'prosinec'";
                $vysledek2 = mysqli_query( $spojeni, $sql2 );
                echo "<TABLE class='table' class='table-striped' BORDER=0 CELLSPACING=0 CELLPADDING=4>\n";
                echo "<TR BGCOLOR=lightgrey VALIGN=TOP>\n";
                echo "<TD ALIGN=CENTER><b>" . ( "Název článku" ) . "</b></TD>\n";
                echo "<TD ALIGN=CENTER><b>" . ( "Autor článku" ) . "</b></TD>\n";
                echo "<TD ALIGN=CENTER><b>" . ( "URL článku" ) . "</b></TD>\n";
                echo "<TH colspan='2'></TH></tr>\n";
                if ( mysqli_num_rows( $vysledek2 ) > 0 ) {
                    while ( $zaznam = mysqli_fetch_assoc( $vysledek2 ) ):
                        $oc = $zaznam[ "clanky_id" ];
                        echo "<TD  ALIGN=CENTER>" . $zaznam[ "Nazev_clanku" ] . "</TD>";
                        echo "<TD  ALIGN=CENTER>" . $zaznam[ "Autor_clanku" ] . "</TD>";
                        echo "<TD  ALIGN=CENTER><a href='".$zaznam['url_clanku']."' download> Download </TD>";
                        echo "<TR VALIGN=TOP>";                        $i = $i + 1;
                    endwhile;
                } else {
                    echo "0 nalezených záznamů";
                }
                echo "</TABLE>";
                echo "<br>";
                echo "<br>";

                // lednové číslo
                echo "<h2>Lednové číslo časopisu</h2>";
                $sql3 = "select * from clanky where Zverejneno = 1 and cislo_c = 'leden'";
                $vysledek3 = mysqli_query( $spojeni, $sql3 );
                echo "<TABLE class='table' class='table-striped' BORDER=0 CELLSPACING=0 CELLPADDING=4>\n";
                echo "<TR BGCOLOR=lightgrey VALIGN=TOP>\n";
                echo "<TD ALIGN=CENTER><b>" . ( "Název článku" ) . "</b></TD>\n";
                echo "<TD ALIGN=CENTER><b> " . ( "Autor článku" ) . "</b></TD>\n";
                echo "<TD ALIGN=CENTER><b>" . ( "URL článku" ) . "</b></TD>\n";
                echo "<TH colspan='2'></TH></tr>\n";
                if ( mysqli_num_rows( $vysledek3 ) > 0 ) {
                    while ( $zaznam = mysqli_fetch_assoc( $vysledek3 ) ):
                        $oc = $zaznam[ "clanky_id" ];
                        echo "<TD  ALIGN=CENTER>" . $zaznam[ "Nazev_clanku" ] . "</TD>";
                        echo "<TD  ALIGN=CENTER>" . $zaznam[ "Autor_clanku" ] . "</TD>";
                        echo "<TD  ALIGN=CENTER><a href='".$zaznam['url_clanku']."' download> Download </TD>";
                        echo "<TR VALIGN=TOP>";                        $i = $i + 1;
                    endwhile;
                } else {
                    echo "0 nalezených záznamů";
                }
                echo "</TABLE>";
                echo "<br>";
                echo "<br>";

                // unorové cislo
                echo "<h2>Únorové číslo časopisu</h2>";
                $sql4 = "select * from clanky where Zverejneno = 1 and cislo_c = 'unor'";
                $vysledek4 = mysqli_query( $spojeni, $sql4 );
                echo "<TABLE class='table' class='table-striped' BORDER=0 CELLSPACING=0 CELLPADDING=4>\n";
                echo "<TR BGCOLOR=lightgrey VALIGN=TOP>\n";
                echo "<TD ALIGN=CENTER><b>" . ( "Název článku" ) . "</b></TD>\n";
                echo "<TD ALIGN=CENTER><b>" . ( "Autor článku" ) . "</b></TD>\n";
                echo "<TD ALIGN=CENTER><b>" . ( "URL článku" ) . "</b></TD>\n";
                echo "<TH colspan='2'></TH></tr>\n";
                if ( mysqli_num_rows( $vysledek4 ) > 0 ) {
                    while ( $zaznam = mysqli_fetch_assoc( $vysledek4 ) ):
                        $oc = $zaznam[ "clanky_id" ];
                        echo "<TD  ALIGN=CENTER>" . $zaznam[ "Nazev_clanku" ] . "</TD>";
                        echo "<TD  ALIGN=CENTER>" . $zaznam[ "Autor_clanku" ] . "</TD>";
                        echo "<TD  ALIGN=CENTER><a href='".$zaznam['url_clanku']."' download> Download </TD>";
                        echo "<TR VALIGN=TOP>";                        $i = $i + 1;
                    endwhile;
                } else {
                    echo "0 nalezených záznamů";
                }
                echo "</TABLE>";



                mysqli_close( $spojeni );
                ?>
            </div>
        </div>
    </div>
</section>
<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Polysoft 2020</p>
    </div>
    <!-- /.container -->
</footer>
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Plugin JavaScript --><script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom JavaScript for this theme -->
<script src="js/scrolling-nav.js"></script>
</body>
</html>