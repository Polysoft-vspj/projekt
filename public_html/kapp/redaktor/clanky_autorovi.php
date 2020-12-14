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

    #clanky_redaktor{

visibility: hidden;

}

</style>





 ?>

 

 

 

  <?php if($_SESSION['uzivatel_admin']==1 ){ ?>



   <style>

   #clanky_redaktor{

visibility: visible;

}

</style>



<?php }



 ?>

 

   <?php if($_SESSION['uzivatel_admin']==4 ){ ?>



   <style>

   #clanky_redaktor{

visibility: visible;

}

</style>



<?php }



 ?>





  <meta charset="utf-8">



  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



  <meta name="description" content="">



  <meta name="author" content="Polysoft">







  <title>LOGOS POLYTECHNIKOS</title>







  <!-- Bootstrap -->



  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">







  <!-- Vlastni css -->



  <link href="css/logoskaskados.css" rel="stylesheet">



<link rel="apple-touch-icon" sizes="180x180" href="../../apple-touch-icon.png">

<link rel="icon" type="image/png" sizes="32x32" href="../../favicon-32x32.png">

<link rel="icon" type="image/png" sizes="16x16" href="../../favicon-16x16.png">

<link rel="manifest" href="../../site.webmanifest">

<link href="css/all.css" rel="stylesheet">

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



           <li class="nav-item">



            <a class="nav-link js-scroll-trigger" href="index_redaktor.php">Nevyřízené články</a>



          </li> 



          <li class="nav-item">



            <?php



             if(isset($_SESSION['uzivatel_id'])){ ?>

                <a href="../login/odhlaseni.php"><button type="button" class="btn bg-danger text-light">Odhlásit</button></a>

                  <div style="color: white !important;"><b>Uživatel:&nbsp;<?php echo $_SESSION['uzivatel_jmeno'];?>&nbsp;|&nbsp;Oprávění:&nbsp;<?php

if($_SESSION['uzivatel_admin']==0)echo Autor;

if($_SESSION['uzivatel_admin']==1)echo Redaktor;

if($_SESSION['uzivatel_admin']==2)echo Recenzent;

if($_SESSION['uzivatel_admin']==3)echo Šéfredaktor;

if($_SESSION['uzivatel_admin']==4)echo Admin;



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







  






  <section id="about">



    <div class="container">



      <div class="row">



        <div class="col-lg-8 mx-auto">



   







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
</section>
<section>       

<div class="container" id ="clanky_redaktor"  style=" position: relative;  top: 20%;right:10%">



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







&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-angle-up"> Seřadit sestupně</i>&nbsp;&nbsp;



    <i class="fas fa-angle-down"> Seřadit vzestupně</i>



<HR>

<?php

											//30

											function TlacitkoProRazeni( $polozka, $popis ) {

												global $Nazev;

												return "<A HREF='?orderby=$polozka&Nazev=" .

												URLEncode( $_GET[ Nazev ] ) . "'>" . "<i class=\"fas fa-angle-down\"></i></A>&nbsp;" . $popis . "&nbsp;" .

												"<A HREF='?orderby=$polozka+DESC&Nazev=" .

												URLEncode( $_GET[ Nazev ] ) . "'>" . "<i class=\"fas fa-angle-up\"></i></A>";

											}



											// spojeni s databazi



											if ( $_GET[ Nazev ] != "" )

												$Podminka = "WHERE Nazev_clanku LIKE '" . AddSlashes( $_GET[ Nazev ] ) . "%' AND Stav like 'podáno' AND odeslat_autor like '1'";

											else

												$Podminka = "  WHERE Stav LIKE 'podáno' AND odeslat_autor like '1'";



											if ( $_GET[ orderby ] != "" )

												$Orderby = "ORDER BY $_GET[orderby]";

											else

												$Orderby = "ORDER BY Nazev_clanku";



											$sql = "select * from clanky " . $Podminka . $Orderby;





											$vysledek = mysqli_query( $spojeni, $sql );

											echo "<TABLE   class='table' class='table-striped' BORDER=0 CELLSPACING=0 CELLPADDING=4>\n";

											echo "<TR BGCOLOR=lightgrey VALIGN=TOP>\n";

											echo "<TH>" . TlacitkoProRazeni( "clanky_id", "Id článku" ) . "</TH>\n";

											echo "<TH>" . TlacitkoProRazeni( "Nazev_clanku", "Název článku" ) . "</TH>\n";

											echo "<TH>" . TlacitkoProRazeni( "Autor_clanku", "Autor článku" ) . "</TH>\n";

											echo "<TH>" . TlacitkoProRazeni( "url_clanku", "URL článku" ) . "</TH>\n";

											echo "<TH>" . TlacitkoProRazeni( "Jmeno_recenzenta", "Jméno recenzenta" ) . "</TH>\n";

											echo "<TH>" . TlacitkoProRazeni( "url_recenze", "URL recenze" ) . "</TH>\n";

											echo "<TH>" . TlacitkoProRazeni( "Stav", "Stav recenze" ) . "</TH>\n";
                                            
                                            echo "<TH>" . TlacitkoProRazeni( "namitky", "Námitky" ) . "</TH>\n";

                                            	

											echo "<TH colspan='5'></TH></tr>\n";





											if ( mysqli_num_rows( $vysledek ) > 0 ) {



												while ( $zaznam = mysqli_fetch_assoc( $vysledek ) ):







													$oc = $zaznam[ "clanky_id" ];

                                                    

												echo "<TD  ALIGN=CENTER>" . $zaznam[ "clanky_id" ] . "</TD>";

												echo "<TD  ALIGN=CENTER>" . $zaznam[ "Nazev_clanku" ] . "</TD>";

												echo "<TD  ALIGN=CENTER>" . $zaznam[ "Autor_clanku" ] . "</TD>";

												echo "<TD  ALIGN=CENTER><a href=\"../uploads/" . $zaznam[ "url_clanku" ]. "\" download> Download </TD>";

												echo "<TD  ALIGN=CENTER>" . $zaznam[ "Jmeno_recenzenta" ] . "</TD>";

												echo "<TD  ALIGN=CENTER>" . $zaznam[ "url_recenze" ] . "</TD>";

                        	                    echo "<TD  ALIGN=CENTER>" . $zaznam[ "Stav" ] . "</TD>";

                                                  


                                                echo "<TD ALIGN=CENTER>" . $zaznam[ "namitky" ] . "</TD>";
												
                                                echo "<TD ALIGN=CENTER>" . "<A HREF='zamitnout_namitku.php?oc=$oc' class=\"btn btn-warning\">Zamítnout námitku</A></TD>";
                                                
                                                echo "<TD ALIGN=CENTER>" . "<A HREF='prijmout_namitku.php?oc=$oc' class=\"btn btn-success\">Přijmout námitku</A></TD>";
                                                
                                                                                                    

                                               // echo "<A HREF='update_poslat_recenzentovi.php?oc=$oc' class=\"btn btn-info\">Poslat Recenzentovi</A></TD>"; 

                                                //php napiš   dny

                                                

                                               //echo "<TD ALIGN=CENTER>"."<label for='tentacles'>Počet dnů:</label>"

                                               //echo "<input type='number' placeholder='Dny'id='tentacles' name='tentacles'  min='1' max='100'> </TD>"

                                                    // echo " </TD>" ;

                                               

												echo "<TR VALIGN=TOP>";



												$i = $i + 1;

												endwhile;

											} else {

												echo "0 nalezených záznamů";

											}







											echo "</TABLE>";



											mysqli_close( $spojeni );

											?>





<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</div>























        </div>



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



  <footer class="py-5 bg-dark" style=" position: relative;">



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
