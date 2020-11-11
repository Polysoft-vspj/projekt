<?php
session_start();
require('Db.php');
Db::connect('localhost', 'testserverpolysw', 'testserverpolysw', '5r8Xcxv6');

if ($_POST)
{
	if ($_POST['rok'] != date('Y'))
		$zprava = 'Chybně vyplněný antispam.';
	else if ($_POST['heslo'] != $_POST['heslo_znovu'])
		$zprava = 'Hesla nesouhlasí';
	else
	{
		$existuje = Db::querySingle('
			SELECT COUNT(*)
			FROM uzivatele
			WHERE jmeno=?
			LIMIT 1
		', $_POST['jmeno']);
		if ($existuje)
			$zprava = 'Uživatel s touto přezdívkou je již v databázi obsažen.';
		else
		{
			$heslo = password_hash($_POST['heslo'], PASSWORD_DEFAULT);
			Db::query('
				INSERT INTO uzivatele (jmeno, heslo)
				VALUES (?, ?)
			', $_POST['jmeno'], $heslo);
			$_SESSION['uzivatel_id'] = Db::getLastId();
			$_SESSION['uzivatel_jmeno'] = $_POST['jmeno'];
			$_SESSION['uzivatel_admin'] = 0;
			header('Location: ../index.php');
			exit();
		}
	}
}
?>

<!DOCTYPE html>
<html lang="cs-cz">
<head>
	<meta charset="utf-8" />
	<title>Registrace</title>
    
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="../css/logoskaskados.css" rel="stylesheet">
    
</head>

<body class="bg-danger">
<div class="text-white text-center">
	<article>
		<div>
        <h1 style="padding-top: 30px">Registrace</h1>
			<section>
				<?php
					if (isset($zprava))
						echo('<p>' . $zprava . '</p>');
				?>
                <div class="bg-dark container text-center login">
				<form method="post">
					Jméno<br />
					<input type="text" name="jmeno" /><br />
					Heslo<br />
					<input type="password" name="heslo" /><br />
					Heslo znovu<br />
					<input type="password" name="heslo_znovu" /><br />
					Zadejte aktuální rok (antispam)<br />
					<input type="text" name="rok" /><br /><br>
					<input type="submit" value="Registrovat" />
				</form>
                <a href="prihlaseni.php"><button type="button" class="btn bg-danger text-light">Zpět na přihlášení</button></a>
                </div>
                
			</section>
		</div>
	</article>
    </div>
</body>
</html>