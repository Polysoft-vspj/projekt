<?php
  
// Starting the session, to use and 
// store data in session variable 
session_start();
require("connect.php");
?> 
<!DOCTYPE html>

<html lang="cs">



<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Polysoft">
    <title>LOGOS POLYTECHNIKOS</title>
    <!-- Bootstrap -->

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Vlastni css -->
    <link href="css/logoskaskados.css" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">

    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">

    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">

    <link rel="manifest" href="/site.webmanifest">

    <link href="css/all.css" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>



<body id="page-top">



  <!-- Naviagce -->

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">

    <div class="container">

      <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="img/logo.png" alt="logo" width="300px"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">

        <span class="navbar-toggler-icon"></span>

      </button>

      <div class="collapse navbar-collapse" id="navbarResponsive">

        <ul class="navbar-nav ml-auto">
        
            <li class="nav-item" id="claneknav">
            <a class="nav-link js-scroll-trigger" href="#Navrhclanku">Nový článek</a>
          </li>
          <li class="nav-item" id="recenzenav">
            <a class="nav-link js-scroll-trigger" href="#Recenze">Recenze</a>
          </li>
         <!-- <li class="nav-item" id="temanav">
            <a class="nav-link js-scroll-trigger" href="#">Výběr téma časopisu</a>
          </li>
          <li class="nav-item" id="oponentnav">
            <a class="nav-link js-scroll-trigger" href="#">Oponentní formulář</a>
          </li>   -->
      
         

          <!-- <li class="nav-item">

            <a class="nav-link js-scroll-trigger" href="#">lorem</a>

          </li> -->

          <li class="nav-item">

            <?php
            
             if(isset($_SESSION['uzivatel_id'])){ ?>
                <a href="../login/odhlaseni.php"><button type="button" class="btn bg-danger text-light">Odhlásit</button></a> 
                  <div style="color: white !important;"><b>Uživatel:&nbsp;<?php echo $_SESSION['uzivatel_jmeno'];?>&nbsp;|&nbsp;Oprávění:&nbsp;<?php

                          if($_SESSION['uzivatel_admin']==0)echo "<i class='fas fa-book-reader' title='Čtenář'></i>"; 
                          if($_SESSION['uzivatel_admin']==5)echo "<i class='fas fa-at' title='Autor'></i>"; 
if($_SESSION['uzivatel_admin']==1)echo "<i class='fas fa-newspaper' title='Redaktor'></i>";
if($_SESSION['uzivatel_admin']==2)echo "<i class='fas fa-search'title='Recenzent'></i>"; 
if($_SESSION['uzivatel_admin']==3)echo "<i class='fas fa-users-cog' title='Šéfredaktor'></i>";
if($_SESSION['uzivatel_admin']==4)echo "<i class='fas fa-user-shield' title='Admin'></i>";

?>

</b></div>
 <?php if (isset($_GET['uzivatel_id']))
                {
	              session_destroy();
	               header('Location: ../index.php');
	               exit();
                }}else{ ?>
                <a href="login/prihlaseni.php" ><button type="button" class="btn bg-danger text-light">Přihlásit</button></a>
            <?php } ?>

          </li>

        </ul>

      </div>

    </div>
      <a href="../index.php" ><button type="button" class="btn bg-danger text-light">Zpět na hlavní stránku</button></a>
  </nav>



 




   <!-- Div autor začátek-->
  <?php
 // session_start();
mysqli_set_charset($spojeni, "utf8");
  /* Attempt MySQL server connection. Assuming you are running MySQL
  server with default setting (user 'root' with no password) */
  //$link = mysqli_connect("localhost", "testserverpolysw", "5r8Xcxv6", "testserverpolysw");

  // Check connection
  if ($spojeni === false) {//if($link === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }

  $name = strip_tags($_SESSION['uzivatel_jmeno']); //$name = strip_tags($_GET['uzivatel_jmeno']);

$sql = "SELECT clanky_id FROM clanky ORDER BY clanky_id DESC LIMIT 1";

$vysledek = mysqli_query($spojeni, $sql);
$radek = mysqli_fetch_assoc($vysledek);

$max=$radek["clanky_id"]+1;

?>
  
  
  <div id="autor">
    
    <section id="Navrhclanku">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
            <h1>
             Návrh článku
            </h1>    
         <form action="nahratClanek.php" method="post" enctype="multipart/form-data" style="text-align: left">
            <div class="form-group">
            <label for="clanky_id">ID článku:</label>
            <input  class="form-control" id="clanky_id" placeholder="ID" name="clanky_id" VALUE="<?php echo $max?>" SIZE=4 readonly>
            </div>
            <div class="form-group">
            <label for="nazev">Název článku:</label>
            <input type="text" class="form-control" id="Nazev_clanku" placeholder="Název článku" name="Nazev_clanku">
            </div>
            <div class="form-group">
                <label for="autor">Autor:</label>
                <input type="text" class="form-control" id="Autor_clanku" placeholder="Název autora" name="Autor_clanku" VALUE="<?php echo $name?>" readonly>
            </div>
             <div class="form-group">
              <p>Číslo časopisu</p>
             <select class="form-control" name="cislo"  >

                 <option value="listopad">Listopad</option>

                 <option value="prosinec">Prosinec</option>

                 <option value="leden">Leden</option>

                 <option value="unor">Únor</option>

              </select>
             </div>

                        <div class="form-group">
               <input type="file" class="btn-light" name="fileToUpload" id="fileToUpload" multiple accept=".docx,.doc,.pdf">
           
            </div>
            <div class="form-group">
               <input type="submit" class="btn btn-danger" value="Nahrát dokument" name="submit">
            </div>
          </form>  
         
          
        </div>
      </div>
    </div>
    
    
    
  </section>

      <section id="Recenze">
             <div class="col-lg-6 mx-auto">
          <h1>Seznam článků</h1>
               </div>
          <hr />
          <div class="container">

              <div>

                  Hledání podle názvu článku<BR />

                  <FORM ACTION=index.php method=get>


                      <div class="input-group mb-3 w-50" >


                          <INPUT type="text"  class="form-control" placeholder="Nazev" NAME=Nazev SIZE=11 VALUE="<?php echo $_GET[Nazev] ?>">

                          <div class="input-group-append">


                              <INPUT TYPE=SUBMIT type="text" class="form-control" placeholder="Nazev" VALUE="hledej">


                          </div>


                      </div>

                      <INPUT TYPE=HIDDEN type="text"  placeholder="Názvu" NAME=orderby VALUE="<?php echo $_GET[orderby]?>">

                  </FORM>


                  <HR>

                  <?php



                  //30



                  function TlacitkoProRazeni( $polozka, $popis ) {



                      global $Nazev;



                      return "<A HREF='?orderby=$polozka&$Nazev=" .



                          URLEncode( $_GET[ Nazev ] ) . "'>" . "<i class=\"fas fa-angle-down\"></i></A>&nbsp;" . $popis  ."&nbsp;".



                          "<A HREF='?orderby=$polozka+DESC&$Nazev=" .



                          URLEncode( $_GET[ Nazev ] ) . "'>" . "<i class=\"fas fa-angle-up\"></i></A>";



                  }


                  // spojeni s databazi


                  if ( $_GET[ Nazev ] != "" )

                      $Podminka = "WHERE Nazev_clanku LIKE '" . AddSlashes( $_GET[ Nazev ] ) . "%' AND Autor_clanku='$name'";

                  else

                      $Podminka = "WHERE Autor_clanku='$name'";


                  if ( $_GET[ orderby ] != "" )

                      $Orderby = "ORDER BY $_GET[orderby]";

                  else

                      $Orderby = "ORDER BY Nazev_clanku";



                  $sql3 = "select * from clanky " . $Podminka . $Orderby;


                  $vysledek3 = mysqli_query( $spojeni, $sql3 );


                  echo "<TABLE class='table' class='table-striped' BORDER=0 CELLSPACING=0 CELLPADDING=0>\n";


                  echo "<TR BGCOLOR=lightgrey VALIGN=TOP style=\"text-align:center\" >\n";


                  echo "<TH>" . TlacitkoProRazeni( "Nazev_clanku", "Název" ) . "</TH>\n";


                  echo "<TH>" . TlacitkoProRazeni( "url_clanku", "<i class=\"fas fa-paperclip\" data-toggle=\"tooltip\" title=\"URL článku\" ></i>" ) . "</TH>\n";


                  echo "<TH>" . TlacitkoProRazeni( "Stav", "<i class=\"fas fa-info-circle\" data-toggle=\"tooltip\" title=\"Stav recenze\" ></i>" ) . "</TH>\n";


                  echo "<TH>" . TlacitkoProRazeni( "url_recenze", "<i class=\"fas fa-paperclip\" data-toggle=\"tooltip\" title=\"URL recenze\" ></i>" ) . "</TH>\n";


                  echo "<TH colspan='2'></TH></tr>\n";

                  if ( mysqli_num_rows( $vysledek3 ) > 0 ) {
                      while ( $zaznam3 = mysqli_fetch_assoc( $vysledek3 ) ):

                          $idclanku = $zaznam3[ "clanky_id" ];

                          echo "<TD  ALIGN=CENTER>" . $zaznam3[ "Nazev_clanku" ] . "</TD>";

                          echo "<TD  ALIGN=CENTER><a href='".$zaznam3['url_clanku']."'download> Stáhnout článek</TD>";

                          echo "<TD  ALIGN=CENTER>" . $zaznam3[ "Stav" ] . "</TD>";
                          if ($zaznam3[ "odeslat_autor" ] == 1) {
                              echo "<TD  ALIGN=CENTER><a href='".$zaznam3['url_recenze']."'download> Stáhnout recenzi </TD>";

                              if ($zaznam3[ "Stav" ] != "námitka zamítnuta") {
                                  if ($zaznam3[ "Stav" ] != "námitka přijata") {
                                      echo "<TD ALIGN=CENTER>" . "<A HREF='namitka.php?oc=$idclanku' class=\"btn btn-secondary\">Námitky</A></TD>";
                                  }
                              }

                          }


                          echo "<TR VALIGN=TOP>";

                          $i = $i + 1;

                      endwhile;

                  } else {

                      echo "0 nalezených záznamů";

                  }


                  echo "</TABLE>";

                  mysqli_close( $spojeni );

                  ?>

                  <HR>

              </div>
                           <script>
                $(document).ready(function () {
                    $('[data-toggle="tooltip"]').tooltip();
                });
            </script>

              <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

              <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

              <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

          </div>
      </section>
  
  
   <?php
   //session_destroy();
   
	exit();
mysqli_close($spojeni);
?>
   
  </div>

  <div id="administrator">

      <FORM ACTION="admin_prava.php">

          <INPUT TYPE=SUBMIT VALUE="Prava" class="btn btn-dark alert">

      </FORM>
      <button><a href="admin_prava.php">Zmena prav</button>
  </div>
  
  <!-- Div autor konec-->



  <!-- <section id="" class="bg-light">

    <div class="container">

      <div class="row">

        <div class="col-lg-8 mx-auto">

          <h2>helpdesk we offer</h2>

          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut optio velit inventore, expedita quo laboriosam possimus ea consequatur vitae, doloribus consequuntur ex. Nemo assumenda laborum vel, labore ut velit dignissimos.</p>

        </div>

      </div>

    </div>

  </section>



  <section id="">

    <div class="container">

      <div class="row">

        <div class="col-lg-8 mx-auto">

          <h2>Login us</h2>

          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero odio fugiat voluptatem dolor, provident officiis, id iusto! Obcaecati incidunt, qui nihil beatae magnam et repudiandae ipsa exercitationem, in, quo totam.</p>

        </div>

      </div>

    </div>

  </section> -->



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

 


  <!-- Plugin JavaScript -->

  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>



  <!-- Custom JavaScript for this theme -->

  <script src="js/scrolling-nav.js"></script>



</body>



</html>

