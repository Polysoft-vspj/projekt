<?php



session_start();

require('Db.php');

Db::connect('localhost', 'testserverpolysw', 'testserverpolysw', '5r8Xcxv6');



if (isset($_SESSION['uzivatel_id']))

{

	header('Location: ../index.php');

	exit();

}



if ($_POST)

{

	$uzivatel = Db::queryOne('

		SELECT uzivatele_id, admin, heslo

		FROM uzivatele

		WHERE jmeno=?

	', $_POST['jmeno']);

	if (!$uzivatel || !password_verify($_POST['heslo'], $uzivatel['heslo']))

		$zprava = 'Neplatné uživatelské jméno nebo heslo';

	else

	{

		$_SESSION['uzivatel_id'] = $uzivatel['uzivatele_id'];

		$_SESSION['uzivatel_jmeno'] = $_POST['jmeno'];

		$_SESSION['uzivatel_admin'] = $uzivatel['admin'];

		header('Location: ../index.php');

		exit();

	}

}

?>



<!DOCTYPE html>

<html lang="cs-cz">

<head>

	<meta charset="utf-8" />

	<title>Přihlášení do administrace</title>

    

    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    

    <link href="../css/logoskaskados.css" rel="stylesheet">

    <style>
body {
  background-image: url(../img/bgp.png);
}
</style>

</head>



<body class="bg-danger" style=" font-size: large;">



<div class="text-white text-center">		

    	<article>

		<div class="container text-center bg-dark" style="box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);">
<div class="row">

<div class="col-sm" style="border-right: 2px solid;border-color: black;background-image: url(../img/bgV2.png);background-size:cover">
  




    </div>



    <div class="col-sm">
                  

			

            

				<?php

				if (isset($zprava))

					echo('<p>' . $zprava . '</p>');

				?>

                <div class="bg-dark container text-center login">

				<form method="post" >

					Jméno<br />

					<input type="text" name="jmeno" /><br />

					Heslo<br />

					<input type="password" name="heslo" /><br /><br>

					<input type="submit" value="Přihlásit" />

				</form>

                <br>

                <p>Pokud ještě nemáte účet, <a href="registrace.php">zaregistrujte se</a>.</p>

                <a href="../index.php"><button type="button" class="btn bg-danger text-light">Zpět na úvodní stránku</button></a>

                </div>

    


				

			

		</div>

	</article>

    

</div>

</body>

</html>