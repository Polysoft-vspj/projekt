<?php

// Starting the session, to use and
// store data in session variable
session_start();
if (!IsSet($nazev)) $nazev="";
  if (!IsSet($orderby)) $orderby="";

  require("connect.php");

?>
<!DOCTYPE html>

<html lang="cs">



<head>
   
       <style>
     #Precteno, #Odeslano, #NoveZpravy, #nove_zpravy_li,#precteno_zpravy_li,#odeslano_zpravy_li {
visibility: hidden;
}
</style>



 
 
 
  <?php if($_SESSION['uzivatel_admin']==3 ){ ?>

   <style>
   #Precteno, #Odeslano, #NoveZpravy, #nove_zpravy_li,#precteno_zpravy_li,#odeslano_zpravy_li{
visibility: visible;
}
</style>

<?php }

 ?>
 
   <?php if($_SESSION['uzivatel_admin']==4 ){ ?>

   <style>
   #Precteno, #Odeslano, #NoveZpravy, #nove_zpravy_li,#precteno_zpravy_li,#odeslano_zpravy_li{
visibility: visible;
}
</style>

<?php }

 ?>
 
    <?php if($_SESSION['uzivatel_admin']==1 ){ ?>

   <style>
  #Precteno, #Odeslano, #NoveZpravy, #nove_zpravy_li,#precteno_zpravy_li,#odeslano_zpravy_li{
visibility: visible;
}
</style>

<?php }

 ?>
        <?php if($_SESSION['uzivatel_admin']==2 ){ ?>

   <style>
  #Precteno, #Odeslano, #NoveZpravy, #nove_zpravy_li,#precteno_zpravy_li,#odeslano_zpravy_li{
visibility: visible;
}
</style>

<?php }



 ?>
 
         <?php if($_SESSION['uzivatel_admin']==5){ ?>     

   <style>
   #Precteno, #Odeslano, #NoveZpravy, #nove_zpravy_li,#precteno_zpravy_li,#odeslano_zpravy_li{
visibility: visible;
}
</style>

<?php }

 ?>
 
          <?php if($_SESSION['uzivatel_admin']==NULL){ ?>     

   <style>      
</style>

<?php }

 ?>
 


  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="description" content="">

  <meta name="author" content="Polysoft">



  <title>LOGOS POLYTECHNIKOS</title>



  <!-- Bootstrap -->

  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">



  <!-- Vlastni css -->

  <link href="../css/logoskaskados.css" rel="stylesheet">

<link rel="apple-touch-icon" sizes="180x180" href="../apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
<link rel="manifest" href="site.webmanifest">
<link href="../css/all.css" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">






</head>



<body id="page-top">



  <!-- Naviagce -->

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">

    <div class="container">

      <a class="navbar-brand js-scroll-trigger" href="../index.php"><img src="../img/logo.png" alt="logo" width="30%"></a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">

        <span class="navbar-toggler-icon"></span>

      </button>

      <div class="collapse navbar-collapse" id="navbarResponsive">

        <ul class="navbar-nav ml-auto">

          <!-- <li class="nav-item">

            <a class="nav-link js-scroll-trigger" href="#">lorem</a>

          </li> -->

          <li class="nav-item">

            <?php

             if(isset($_SESSION['uzivatel_id'])){ ?>
                <a href="../login/odhlaseni.php"><button type="button" class="btn bg-danger text-light">Odhlásit</button></a>
                  <div style="color: white !important;"><b>Uživatel:&nbsp;<?php echo $_SESSION['uzivatel_jmeno'];?>&nbsp;|&nbsp;Oprávění:&nbsp;<?php
if($_SESSION['uzivatel_admin']==5)echo Autor;
if($_SESSION['uzivatel_admin']==1)echo Redaktor;
if($_SESSION['uzivatel_admin']==2)echo Recenzent;
if($_SESSION['uzivatel_admin']==3)echo Šéfredaktor;
if($_SESSION['uzivatel_admin']==4)echo Admin;
if($_SESSION['uzivatel_admin']==0)echo Čtenář;

?>

</b></div>
 <?php if (isset($_GET['uzivatel_id']))
                {
	               session_destroy();
	               header('Location: ../index.php');
	               exit();
                }}else{ ?>
                <a href="../login/prihlaseni.php" ><button type="button" class="btn bg-danger text-light">Přihlásit</button></a>
            <?php } ?>

          </li>

        </ul>

      </div>

    </div>

  </nav>



  <header class="bg-danger text-white">

    <div class="container text-center">

      <h2>Vítejte v redakci časopisu</h2> <h1><b>LOGOS POLYTECHNIKOS</b></h1>

      <p class="lead">Projekt do předmětu <b><i>Řízení softwarových projeků</i></b> za tým Polysoft</p>

    </div>

  </header>









<div class="content">

        <!-- Creating notification when the
                user logs in -->

        <!-- Accessible only to the users that
                have logged in already -->
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="error success" >
                <h3>
                    <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>

        <!-- information of the user logged in -->
        <!-- welcome message for the logged in user -->
        <?php  if (isset($_SESSION['username'])) : ?>
            <p>
                Welcome
                <strong>
                    <?php echo $_SESSION['username']; ?>
                </strong>
            </p>
            <p>
                <a href="index.php?logout='1'" style="color: red;">
                    Click here to Logout
                </a>
            </p>
        <?php endif ?>
    </div>





		  <div class="modal fade" role="dialog" id="loginModal">

       <div class="modal-dialog">

        <div class="modal-content">

        <div class="modal-header">

         <div class="box">



  <h2>Login</h2>



  <form action="">



    <!-- Login -->



    <div class="login-form">



      <label for="username">Username</label>

      <input type="text" id="username" placeholder="Username">



      <label for="password">Password</label>

      <input type="password" id="password" placeholder="Password">



    </div>



    <!-- Register -->



    <div class="register-form">



      <label for="first-name">First Name</label>

      <input disabled type="text" id="first-name" placeholder="First Name">



      <label for="last-name">Last Name</label>

      <input disabled type="text" id="last-name" placeholder="Last Name">



      <label for="email">E-mail Adress</label>

      <input disabled type="text" id="email" placeholder="E-mail Address">



      <label for="confirm-email">Confirm E-mail Address</label>

      <input disabled type="text" id="confirm-email" placeholder="Confirm E-mail Address">



      <div class="captcha">

        <label for="captcha">What is <strong>10 + 3</strong>?</label>

        <input disabled type="text" id="captcha" placeholder="Your answer">



      </div>



    </div>



    <!-- Submit -->



    <input type="submit" id="submit" value="Login">



    <!-- Help -->



    <a href="#" class="register">Register!</a>

    <a href="#" class="forgot-password" title="Forgot password?">Forgot?</a>



  </form>

</div>

       </div>



           </div>

                     </div>

                     </div>





<hr />
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<div class="container" id="Menu_zpravy">
  <ul class="nav nav-tabs">
     <li class="active" id="nove_zpravy_li"><a data-toggle="tab" href="#NoveZpravy">Nové zprávy</a></li>
    <li id="precteno_zpravy_li"><a data-toggle="tab" href="#Precteno">Přečteno</a></li>
    <li id="odeslano_zpravy_li"><a data-toggle="tab" href="#Odeslano">Odesláno</a></li>
     <li id="napsat_zpravy_li"><a data-toggle="tab" href="#Napsat">Napsat Zprávu</a></li>
  </ul>

  <div class="tab-content">
    <div style="min-height: 400px;" id="NoveZpravy" class="tab-pane fade in active">

                <?php
                /* Attempt MySQL server connection. Assuming you are running MySQL
                server with default setting (user 'root' with no password) */
                //$link = mysqli_connect("localhost", "testserverpolysw", "5r8Xcxv6", "testserverpolysw");

                // Check connection
                if($spojeni === false){//if($link === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
                }

                // Attempt select query execution
                $name = strip_tags($_SESSION['uzivatel_jmeno']); //$name = strip_tags($_GET['uzivatel_jmeno']);
                echo "<b>Zprávy pro:</b>" . $name . "<br>"  ; //otestovani koho hledám
                $sql = "SELECT * FROM Zpravy WHERE Prijemce= '".$name."' AND zobrazeno=0 ORDER BY Datum DESC";
                if($result = mysqli_query($spojeni, $sql)){
                if(mysqli_num_rows($result) > 0){
                echo "<table class=\"table table-dark\">";
                  echo "<tr>";
                    echo "<th>Datum</th>";
                      echo "<th>Odesílatel</th>";
                     echo "<th>Text</th>";


                        echo "<th colspan=2 style=\"text-align:center\">Akce</th>";



                  echo "</tr>";

                while($row = mysqli_fetch_array($result)){
                  echo "<tr>";
                  $oc = $row[ 'ID_zpravy' ]; //
                  //$a = 0;
                    //  echo "" . $a++ . "";
                        echo "<td>" . $row['Datum'] . "</td>";
                      echo "<td>" . $row['Odesilatel'] . "</td>";
                         echo "<td>" . $row['Obsah'] . "</td>";
                         echo "<TD ALIGN=CENTER>" . "<A HREF='smazat_zpravu.php?oc=$oc' class=\"btn btn-danger\">Smazat</A></TD>";
                         echo "<TD ALIGN=CENTER>" . "<A HREF='update_zprava.php?oc=$oc' class=\"btn btn-info\">Přečteno</A></TD>";




                  echo "</tr>";
                }
                echo "</table>";

                mysqli_free_result($result);
                } else{
                echo "Nemáte žádné zprávy.";
                }
                } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($spojeni);
                }

                // Close connection
               //mysqli_close($spojeni);
                ?>










    </div>
<div  style="min-height: 400px;" id="Precteno" class="tab-pane fade">
  <?php

      /* Attempt MySQL server connection. Assuming you are running MySQL
      server with default setting (user 'root' with no password) */
      //$link = mysqli_connect("localhost", "testserverpolysw", "5r8Xcxv6", "testserverpolysw");

      // Check connection
      if($spojeni === false){//if($link === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
      }

      // Attempt select query execution
      $name = strip_tags($_SESSION['uzivatel_jmeno']); //$name = strip_tags($_GET['uzivatel_jmeno']);
      echo "<b>Zprávy pro:</b>" . $name . "<br>"  ; //otestovani koho hledám
      $sql = "SELECT * FROM Zpravy WHERE Prijemce= '".$name."' AND zobrazeno = '1' ORDER BY Datum DESC";
      if($result = mysqli_query($spojeni, $sql)){
      if(mysqli_num_rows($result) > 0){
      echo "<table class=\"table table-dark\">";
        echo "<tr>";
          echo "<th>Datum</th>";
            echo "<th>Odesílatel</th>";
           echo "<th>Text</th>";


            echo "<th colspan=2 style=\"text-align:center\">Akce</th>";

        echo "</tr>";

      while($row = mysqli_fetch_array($result)){
        echo "<tr>";
        $oc = $row[ 'ID_zpravy' ]; //
        //$a = 0;
          //  echo "" . $a++ . "";
              echo "<td>" . $row['Datum'] . "</td>";
            echo "<td>" . $row['Odesilatel'] . "</td>";
               echo "<td>" . $row['Obsah'] . "</td>";
               echo "<TD ALIGN=CENTER>" . "<A HREF='smazat_zpravu.php?oc=$oc' class=\"btn btn-danger\">Smazat</A></TD>";
               echo "<TD ALIGN=CENTER>" . "<A HREF='update_zprava_neprecteno.php?oc=$oc' class=\"btn btn-warning\">Nepřečteno</A></TD>";



        echo "</tr>";
      }
      echo "</table>";

      mysqli_free_result($result);
      } else{
      echo "Nenalezeny žádné zprávy.";
      }
      } else{
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($spojeni);
      }

      // Close connection
   // mysqli_close($spojeni);
  ?>



    </div>
<div  style="min-height: 400px;" id="Odeslano" class="tab-pane fade">
      <?php

      /* Attempt MySQL server connection. Assuming you are running MySQL
      server with default setting (user 'root' with no password) */
      //$link = mysqli_connect("localhost", "testserverpolysw", "5r8Xcxv6", "testserverpolysw");

      // Check connection
      if($spojeni === false){//if($link === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
      }

      // Attempt select query execution
      $name = strip_tags($_SESSION['uzivatel_jmeno']); //$name = strip_tags($_GET['uzivatel_jmeno']);
      echo "<b>Zprávy pro:</b>" . $name . "<br>"  ; //otestovani koho hledám
      $sql = "SELECT * FROM Zpravy WHERE Odesilatel = '".$name."' ORDER BY Datum DESC";
      if($result = mysqli_query($spojeni, $sql)){
      if(mysqli_num_rows($result) > 0){
      echo "<table class=\"table table-dark\">";
        echo "<tr>";
          echo "<th>Datum</th>";
            echo "<th>Prijemce</th>";
           echo "<th>Text</th>";


             echo "<th style=\"text-align:center\">Akce</th>";

        echo "</tr>";

      while($row = mysqli_fetch_array($result)){
        echo "<tr>";
        $oc = $row[ 'ID_zpravy' ]; //
        //$a = 0;
          //  echo "" . $a++ . "";
              echo "<td>" . $row['Datum'] . "</td>";
            echo "<td>" . $row['Prijemce'] . "</td>";
               echo "<td>" . $row['Obsah'] . "</td>";
               echo "<TD ALIGN=CENTER>" . "<A HREF='smazat_zpravu.php?oc=$oc' class=\"btn btn-danger\">Smazat</A></TD>";



        echo "</tr>";
      }
      echo "</table>";

      mysqli_free_result($result);
      } else{
      echo "Nemáte žádné odeslané zprávy.";
      }
      } else{
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($spojeni);
      }

      // Close connection
      //mysqli_close($spojeni);
      ?>
    </div>

    <div id="Napsat" class="tab-pane fade">


                <div id="Napsat_zpravu">

  <section id="Napsat_zpravu">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mx-auto">
          <h1>
           Poslat Zprávu
          </h1>
       <form action="nahratZprava.php" method="post" enctype="multipart/form-data" style="text-align: left">

          <div class="form-group">
          <label for="nazev">Odesilatel:</label>
          <!--<input type="text" class="form-control" id="Odesilatel" placeholder="Odesílatel" name="Odesilatel">   d-m-Y H:i:s    -->
          <input type="text" class="form-control" id="Odesilatel" value="<?PHP if($name != NULL) echo $name; else echo "Ctenar" ?>" name="Odesilatel"  readonly>
          </div>
          <div class="form-group">
              <label for="Prijemce">Pro:</label>
              <input type="text" class="form-control" id="Prijemce" placeholder="Prijemce" name="Prijemce">
          </div>
          <div class="form-group">
              <label for="Obsah">Obsah:</label>
              <input type="textarea" class="form-control" id="Obsah" placeholder="Zpráva + Pro čtenáře: Email pro odpověď" name="Obsah">
          </div>
          <div class="form-group">
            <label for="Datum">Datum:</label>
            <input type="text" class="form-control" id="Datum" placeholder="Datum" name="Datum" value="<?PHP  echo date("Y-m-d H:i:s ") ;?>"  readonly>

          </div>
          <div class="form-group">
             <input type="submit" class="btn btn-danger" value="Poslat" name="submit">
          </div>
        </form>


      </div>
    </div>
  </div>






        </div>

    </div>

  </div>
</div>




<!-- Tady jsou vypsany zpravy -->





      </div>

    </div>

  </section>



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

  <script src="../vendor/jquery/jquery.min.js"></script>

  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



  <!-- Plugin JavaScript -->

  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>



  <!-- Custom JavaScript for this theme -->

  <script src="../js/scrolling-nav.js"></script>



</body>



</html>
