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
     #Precteno, #Odeslano, #NoveZpravy, #nove_zpravy_li,#precteno_zpravy_li,#odeslano_zpravy_li, #email_ctenar {
visibility: hidden;
}
</style>



 
 
 
  <?php if($_SESSION['uzivatel_admin']==3 ){ ?>

   <style>
#Napsat{
visibility: visible;
}
</style>

<?php }

 ?>
 
   <?php if($_SESSION['uzivatel_admin']==4 ){ ?>

   <style>
   #Precteno, #Odeslano, #NoveZpravy, #nove_zpravy_li,#precteno_zpravy_li,#odeslano_zpravy_li,#Napsat{
visibility: visible;
}
#Napsat,#napsat_zpravy_li{
visibility: hidden;
}
</style>

<?php }

 ?>
 
    <?php if($_SESSION['uzivatel_admin']==1 ){ ?>

   <style>
#Napsat{
visibility: visible;
}
</style>

<?php }

 ?>
 <?php if($_SESSION['uzivatel_admin']==2 ){ ?>      
  <style>
#Napsat{
visibility: visible;
}
</style>

<?php }



 ?>
 
         <?php if($_SESSION['uzivatel_admin']==5){ ?>     

   <style>
   #Napsat{
visibility: visible;
}
</style>

<?php }

 ?>
 
          <?php if($_SESSION['uzivatel_admin']==NULL){ ?>     

   <style>    
   #email_ctenar  {
visibility: visible;
}
</style>

<?php }

 ?>
 
 
 

  <meta charset="utf-8" content="text/html;charset=UTF-8">

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

      <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="../img/logo.png" alt="logo" width="300px"></a>

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
                <a href="../login/prihlaseni.php" ><button type="button" class="btn bg-danger text-light">Přihlásit</button></a>
            <?php } ?>

          </li>

        </ul>

      </div>

    </div>
           <a href="../index.php" ><button type="button" class="btn bg-danger text-light">Zpět na hlavní stránku</button></a>
  </nav>



  








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

                           
<hr />
      <!--
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" >
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
     -->



  
   <section>
   


<div class="container" id="Menu_zpravy"   style=" position: relative;  top: 20%;bot: 20%;">

  
   <ul class="nav nav-pills justify-content-center" id="myTab" role="tablist">
    	<li class="nav-item active" id="nove_zpravy_li"> 
		<a class="nav-link active"  data-toggle="tab" href="#NoveZpravy"  role="tab" aria-controls="NoveZpravy"  aria-selected="true">
    		Nové HelpDesk zprávy</a>
	</li>


   <!-- <li class="nav-item" id="precteno_zpravy_li">            <a class="nav-link"  data-toggle="pill" href="#Precteno"   role="tab"  aria-selected="false">      Přečteno</a></li> -->
    <!--<li class="nav-item" id="odeslano_zpravy_li">            <a class="nav-link"  data-toggle="pill" href="#Odeslano"   role="tab"  aria-selected="false">      Odesláno</a></li> -->
     <li class="nav-item" id="napsat_zpravy_li">              <a class="nav-link"  data-toggle="pill" href="#Napsat"   role="tab"  aria-selected="false">        Napsat helpdesk</a></li>            
    
   
    </ul >
  

         
      
 
  <div class="tab-content" >  
    <div  style="min-height: 400px;" id="NoveZpravy" class="tab-pane fade show active">

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
                echo "<b>Helpdesk pro:</b>" . $name . "<br>"  ; //otestovani koho hledám
               // $sql = "SELECT * FROM Zpravy WHERE Prijemce= '".$name."' AND zobrazeno=0 ORDER BY Datum DESC";
               $sql = "SELECT * FROM Zpravy WHERE Prijemce='".$name."' AND zobrazeno=0 AND helpdesk=1 ORDER BY Datum DESC";
                if($result = mysqli_query($spojeni, $sql)){
                if(mysqli_num_rows($result) > 0){
                echo "<table class=\"table table-dark\">";
                  echo "<tr>";
                    echo "<th>Datum</th>";
                      echo "<th>Odesílatel</th>";
                      echo "<th>E-mail</th>";
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
                       echo "<td>" . $row['email'] . "</td>";
                         echo "<td>" . $row['Obsah'] . "</td>";
                         echo "<TD ALIGN=CENTER>" . "<A HREF='smazat_zpravu.php?oc=$oc' class=\"btn btn-danger\">Smazat</A></TD>";
                        // echo "<TD ALIGN=CENTER>" . "<A HREF='update_zprava.php?oc=$oc' class=\"btn btn-info\">Přečteno</A></TD>";




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
            echo "<th>E-mail</th>";
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
            echo "<td>" . $row['email'] . "</td>";
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

    <div id="Napsat"  style="min-height: 400px; "  class="tab-pane fade">                 

  <section  style="min-height: 400px;max-height: 600px;" id="Napsat_zpravu">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mx-auto">
          <h1>
           Poslat Help Desk
          </h1>
           Tato zpráva se pošle adminovi
       <form action="nahratZprava.php" method="post" enctype="multipart/form-data" style="text-align: left">

          <div class="form-group">
          <label for="nazev">Odesilatel:</label>
          <!--<input type="text" class="form-control" id="Odesilatel" placeholder="Odesílatel" name="Odesilatel">   d-m-Y H:i:s    -->
          <input type="text" class="form-control" id="Odesilatel" value="<?PHP if($name != NULL) echo $name; else echo "Ctenar" ?>" name="Odesilatel"  hidden>
          </div>
          <div class="form-group">
             
                      
                        <input type="text" class="form-control" name="Prijemce"  id="Prijemce" value="admin" hidden>            
                                  	
                                            
                                
                                 
              <!--  <input type="text" class="form-control" id="Prijemce" placeholder="Prijemce" name="Prijemce">   -->
          </div>
          <div class="form-group">
              <label for="Obsah">Obsah:</label>  Obsah:
              <textarea class="form-control" rows="4" cols="50" id="Obsah" placeholder="Zpráva" name="Obsah">    </textarea>
          </div>
          
          <div class="form-group" id='email_ctenar'>
              <?php
                               if($row["admin"] == 0) echo "
                               <label for=\"email\">Email:</label>
                               <input type=\"email\" placeholder=\"E-mail pro odpověď\" class=\"form-control\" id=\"email\" name=\"email\">";
                                 ?>
                                      
                  </div>
                  
          <div class="form-group">
            <label for="Datum">Datum:</label>
            <input type="text" class="form-control" id="Datum" placeholder="Datum" name="Datum" value="<?PHP  echo date("Y-m-d H:i:s ") ;?>"  hidden>

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
