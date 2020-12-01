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
   #Redaktor, #Sefredaktor,#Autor,#Administrator,#Recenzent{
visibility: hidden;
}
</style>

 <?php if($_SESSION['uzivatel_admin']==3 ){ ?>

   <style>
   #Sefredaktor{
visibility: visible;
}
</style>

<?php }

 ?>

<?php if($_SESSION['uzivatel_admin']!=1&&$_SESSION['uzivatel_admin']!=2&&$_SESSION['uzivatel_admin']!=3&&$_SESSION['uzivatel_admin']!=4&&$_SESSION['uzivatel_admin']!=5 ){ ?>

   <style>
   #schovat{
visibility: hidden;
}
#schovat{
visibility: hidden;
}

.ukazat{
visibility: hidden;
}

</style>

<?php }

 ?>




  <?php if($_SESSION['uzivatel_admin']==1 ){ ?>

   <style>
   #Redaktor{
visibility: visible;
}
</style>

<?php }

 ?>

    <?php if($_SESSION['uzivatel_admin']==2 ){ ?>

        <style>
            #Recenzent{
                visibility: visible;
            }
        </style>

    <?php }

    ?>
 
        <?php if($_SESSION['uzivatel_admin']==4 ){ ?>

   <style>
   #Redaktor,#Sefredaktor,#Autor,#Administrator, #Recenzent{
visibility: visible;
}
</style>
 <?php }

 ?>

    <?php if($_SESSION['uzivatel_admin']==5 ){ ?>

        <style>
            #Autor{
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

<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">





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

          <!-- <li class="nav-item">

            <a class="nav-link js-scroll-trigger" href="#">lorem</a>

          </li> -->
            <li class="nav-item" id="Administrator">

                <a class="nav-link js-scroll-trigger" href="administrator/index.php"><b>Administrátor</b></a>

            </li>
            <li class="nav-item" id="Autor">

                <a class="nav-link js-scroll-trigger" href="autor/index.php"><b>Autor</b></a>

            </li>
             <li class="nav-item" id="Redaktor">

            <a class="nav-link js-scroll-trigger" href="redaktor/index_redaktor.php"><b>Redaktor</b></a>

          </li> 
          
           <li class="nav-item" id="Sefredaktor">

            <a class="nav-link js-scroll-trigger" href="sefredaktor/index_sefredaktor.php"><b>Šéfredaktor</b></a>

          </li>
          
          <li class="nav-item" id="Recenzent">

            <a class="nav-link js-scroll-trigger" href="Recenzent/index.php"><b>Recenzent</b></a>

	  <li class="nav-item" id="Clanky">

                <a class="nav-link js-scroll-trigger" href="kappa/index_clanky.php"><b>Články</b></a>

          </li>

          </li>  
          <li class="nav-item" id="Zpravy">

            <a class="nav-link js-scroll-trigger" href="zpravy/index_zprava.php"><b>Zprávy</b></a>

          </li> 

             
         

        </ul>
      </div>



    </div>
<ul class="navbar-nav ml-auto">



 <div id="schovat" style="color: white !important;"><b>Uživatel:&nbsp;<?php echo $_SESSION['uzivatel_jmeno'];?>&nbsp;|&nbsp;Oprávění:&nbsp;<?php
                          if($_SESSION['uzivatel_admin']==0)echo Čtenář;
                          if($_SESSION['uzivatel_admin']==5)echo Autor;
if($_SESSION['uzivatel_admin']==1)echo Redaktor;
if($_SESSION['uzivatel_admin']==2)echo Recenzent;
if($_SESSION['uzivatel_admin']==3)echo Šéfredaktor;
if($_SESSION['uzivatel_admin']==4)echo Admin;


     




?>




</b></div>
<li class="" id="">

            <a class="nav-link js-scroll-trigger"> </a>

          </li> 

<?php
            
             if(isset($_SESSION['uzivatel_id'])){ ?>
         
<li class="nav-item">

            
                <a href="login/odhlaseni.php"><button type="button" class="btn bg-danger text-light">Odhlásit</button></a> 
                 
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

  </nav>



  <header class="bg-danger text-white">

    <div class="container text-center">

      <h2>Vítejte v redakci časopisu</h2> <h1><b>LOGOS POLYTECHNIKOS</b></h1>

      <p class="lead">Projekt do předmětu <b><i>Řízení softwarových projeků</i></b> za tým Polysoft</p>

    </div>

  </header>



  <section id="about">

    <div class="container">

      <div class="row">

        <div class="col-lg-8 mx-auto">

          <p class="lead"><b>LOGOS POLYTECHNIKOS je vysokoškolský odborný recenzovaný časopis</b>, který slouží pro publikační aktivity akademických pracovníků Vysoké školy polytechnické Jihlava i jiných vysokých škol, univerzit a výzkumných organizací. Je veden na seznamu recenzovaných odborných a vědeckých časopisů ERIH PLUS - European Reference Index for the Humanities and the Social Sciences (https://dbh.nsd.uib.no/publiseringskanaler/erihplus/periodical/info?id=488187).</p>

         

		  <p>Od roku 2010 do roku 2018 byl časopis vydáván čtyřikrát ročně v elektronické a tištěné podobě. Od roku 2019 vychází třikrát ročně v elektronické verzi. Redakční rada časopisu sestává z interních i externích odborníků. Funkci šéfredaktora zastává prorektor pro tvůrčí a projektovou činnost Vysoké školy polytechnické Jihlava. Funkce odpovědných redaktorů jednotlivých čísel přísluší vedoucím kateder Vysoké školy polytechnické Jihlava. Veškeré vydávané příspěvky prochází recenzním řízením a jsou pečlivě redigovány.</p> 



		  <p>Tematické a obsahové zaměření časopisu reflektuje potřeby oborových kateder Vysoké školy polytechnické Jihlava. Na základě souhlasu odpovědného redaktora mohou katedry poskytnout publikační prostor i odborníkům bez zaměstnanecké vazby k Vysoké škole polytechnické Jihlava.</p>



		  <p>V časopise je možné publikovat odborné články, statě, přehledové studie, recenze a další typy odborných příspěvků v českém, slovenském a anglickém jazyce. Do recenzního řízení jsou přijímány příspěvky tematicky odpovídající zaměření časopisu a formálně upravené dle redakční šablony (viz níže).</p>

          

          <h3>Pro autory (přispěvatele)</h3>

          <p><a href="http://www.vspj.cz/soubory/download/id/7344">Pokyny pro přispěvatele</a><br/>

		  <a href="https://www.vspj.cz/soubory/download/id/4186">Šablona</a><br/>

          <a href="http://www.vspj.cz/soubory/download/id/7345">Recenzní řízení</a></p><br/>

          

          <h3>Jazyky, ve kterých lze publikovat:</h3>

		  <p>angličtina, čeština a slovenština</p>

		  

		  <h3>Termíny uzávěrek pro sběr příspěvků:</h3>

<p><ul>

<li>1/2020 - ošetřovatelství, porodní asistence a další zdravotnické obory (31. 12. 2019)</li>

<li>2/2020 - ošetřovatelství, porodní asistence a další zdravotnické obory, sociologie, sport, psychologie, sociální práce (30. 4. 2020)</li>

<li>3/2020 - ekonomika, management, marketing, statistika, operační výzkum, finanční matematika, pojišťovniství, cestovní ruch, regionální rozvoj, veřejná správa (31. 8. 2020)</li>

</ul></p>      

         

          <p>Pokud rozsah doručených příspěvků překročí kapacitu příslušného vydání, bude přijímání příspěvků ukončeno před uvedeným termínem.</p>



<p>Adresa pro odesílání příspěvků: <a href="logos@vspj.cz">logos@vspj.cz</a></p>

<p>Kontaktní osoba: Bc. Zuzana Mafková: <a href="mailto:zuzana.mafkova@vspj.cz">zuzana.mafkova@vspj.cz</a></p>

<p>Adresa nakladatele: Vysoká škola polytechnická Jihlava, redakce LOGOS POLYTECHNIKOS, Tolstého 1556/16, 586 01 Jihlava </p>

 

<p><b>ISSN 2464-7551 (Online)</b></p>

<p><i>

Registrace MK ČR E 19390 – pro čísla z let 2010 až 2018 (vydávání tištěné verze časopisu bylo ukončeno).

ISSN 1804-3682 (Print) – pro čísla z let 2010 až 2018 (vydávání tištěné verze časopisu bylo ukončeno).</i></p>



<h3>Šéfredaktor</h3>

doc. Ing. Zdeněk Horák, Ph.D. (Vysoká škola polytechnická Jihlava) 

<h3>Redakční rada</h3>

<p>prof. PhDr. RNDr. Martin Boltižiar, PhD. (Univerzita Konštantína Filozofa v Nitre)<br/>

prof. RNDr. Helena Brožová, CSc. (Česká zemědělská univerzita v Praze)<br/>

doc. PhDr. Lada Cetlová, PhD. (Vysoká škola polytechnická Jihlava)<br/>

prof. Mgr. Ing. Martin Dlouhý, Dr. MSc. (Vysoká škola ekonomická v Praze)<br/>

prof. Ing. Tomáš Dostál, DrSc. (Vysoká škola polytechnická Jihlava)<br/>

doc. Ing. Jiří Dušek, Ph.D. (Vysoká škola evropských a regionálních studií)<br/>

doc. RNDr. Petr Gurka, CSc. (Vysoká škola polytechnická Jihlava)<br/>

Ing. Veronika Hedija, Ph.D. (Vysoká škola polytechnická Jihlava)<br/>

doc. Ing. Zdeněk Horák, Ph.D. (Vysoká škola polytechnická Jihlava)<br/>

Ing. Ivica Linderová, PhD. (Vysoká škola polytechnická Jihlava)<br/>

prof. MUDr. Aleš Roztočil, CSc. (Vysoká škola polytechnická Jihlava)<br/>

doc. PhDr. David Urban, Ph.D. (Vysoká škola polytechnická Jihlava)<br/>

doc. Dr. Ing. Jan Voráček, CSc. (Vysoká škola polytechnická Jihlava)<br/>

RNDr. PaedDr. Ján Veselovský, PhD. (Univerzita Konštantína Filozofa v Nitre)<br/>

doc. Ing. Libor Žídek, Ph.D. (Masarykova univerzita Brno)<br/></p>

        

<h5>Aktuální ročník/číslo časopisu</h5>
<p><a href="http://www.vspj.cz/soubory/download/id/7778">2020/Ročník 11/Číslo 1<br /></a><a href="http://www.vspj.cz/soubory/download/id/7874" title="Logos Polytechnikos 2/2020">2020/Ročník 11/Číslo 2</a></p>
<h5></h5>
<h5>Archiv</h5>
<p><a href="http://www.vspj.cz/soubory/download/id/7354">2019/Ročník 10/Číslo1<br /></a><a href="http://www.vspj.cz/soubory/download/id/7454">2019/Ročník 10/Číslo 2<br /></a><a href="http://www.vspj.cz/soubory/download/id/7648" title="Logos Polytechnikos 3/2019">2019/Ročník 10/Číslo 3</a></p>
<p><a href="http://www.vspj.cz/soubory/download/id/6942">2018/Ročník 9/Číslo 1<br /></a><a href="http://www.vspj.cz/soubory/download/id/6914">2018/Ročník 9/Číslo 2 </a><br /><a href="http://www.vspj.cz/soubory/download/id/7192">2018/Ročník 9/Číslo 3</a><br /><a href="http://www.vspj.cz/soubory/download/id/7408">2018/Ročník 9/Číslo 4</a></p>
<p><a href="http://www.vspj.cz/soubory/download/id/5966">2017/Ročník 8/Číslo 1<br /></a><a href="http://www.vspj.cz/soubory/download/id/6130">2017/Ročník 8/Číslo 2</a><br /><a href="http://www.vspj.cz/soubory/download/id/6282">2017/Ročník 8/Číslo 3<br /></a><a href="http://www.vspj.cz/soubory/download/id/6564">2017/Ročník 8/Číslo 4</a></p>
<p><a href="http://www.vspj.cz/soubory/download/id/5087">2016/Ročník 7/Číslo 1 <br /></a><a href="http://www.vspj.cz/soubory/download/id/5303">2016/Ročník 7/Číslo 2 <br /></a><a href="http://www.vspj.cz/soubory/download/id/6027">2016/Ročník 7/Číslo 3<br /></a><a href="http://www.vspj.cz/soubory/download/id/5711">2016/Ročník 7/Číslo 4</a></p>
<p><a href="http://www.vspj.cz/soubory/download/id/5083">2015/Ročník 6/Číslo 1</a><a href="http://www.vspj.cz/soubory/download/id/2962"><br /> </a><a href="http://www.vspj.cz/soubory/download/id/5084">2015/Ročník 6/Číslo 2</a><a href="http://www.vspj.cz/soubory/download/id/5085"><br />2015/Ročník 6/Číslo 3<br /></a><a href="http://www.vspj.cz/soubory/download/id/5086">2015/Ročník 6/Číslo 4</a></p>
<p><a href="http://www.vspj.cz/soubory/download/id/5079">2014/Ročník 5/Číslo 1</a><a href="http://www.vspj.cz/soubory/download/id/2962"><br /> </a><a href="http://www.vspj.cz/soubory/download/id/5080">2014/Ročník 5/Číslo 2</a><a href="http://www.vspj.cz/soubory/download/id/2962"><br /> </a><a href="http://www.vspj.cz/soubory/download/id/5081">2014/Ročník 5/Číslo 3<br /></a><a href="http://www.vspj.cz/soubory/download/id/5082">2014/Ročník 5/Číslo 4</a></p>
<p><a href="http://www.vspj.cz/soubory/download/id/5075">2013/Ročník 4/Číslo 1</a><br /> <a href="http://www.vspj.cz/soubory/download/id/5076">2013/Ročník 4/Číslo 2</a><br /> <a href="http://www.vspj.cz/soubory/download/id/5077">2013/Ročník 4/Číslo 3</a><br /> <a href="http://www.vspj.cz/soubory/download/id/5078">2013/Ročník 4/Číslo 4</a></p>
<p><a href="http://www.vspj.cz/soubory/download/id/5071">2012/Ročník 3/Číslo 1</a><br /> <a href="http://www.vspj.cz/soubory/download/id/5072">2012/Ročník 3/Číslo 2</a><br /> <a href="http://www.vspj.cz/soubory/download/id/5121">2012/Ročník 3/Číslo 3</a><br /><a href="http://www.vspj.cz/soubory/download/id/5074">2012/Ročník 3/Číslo 4</a></p>
<p><a href="https://www.vspj.cz/soubory/download/id/5067">2011/Ročník 2/Číslo 1</a><br /> <a href="https://www.vspj.cz/soubory/download/id/5068">2011/Ročník 2/Číslo 2</a><br /><a href="https://www.vspj.cz/soubory/download/id/5069">2011/Ročník 2/Číslo 3</a><br /> <a href="https://www.vspj.cz/soubory/download/id/5070">2011/Ročník 2/Číslo 4</a></p>
<p><a href="https://www.vspj.cz/soubory/download/id/5063">2010/Ročník 1/Číslo 1</a><br /> <a href="https://www.vspj.cz/soubory/download/id/5064">2010/Ročník 1/Číslo 2</a><br /> <a href="https://www.vspj.cz/soubory/download/id/5065">2010/Ročník 1/Číslo 3</a><br /> <a href="https://www.vspj.cz/soubory/download/id/5066">2010/Ročník 1/Číslo 4</a></p>
       

       

       

       

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



  <!-- Plugin JavaScript -->

  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>



  <!-- Custom JavaScript for this theme -->

  <script src="js/scrolling-nav.js"></script>



</body>



</html>

