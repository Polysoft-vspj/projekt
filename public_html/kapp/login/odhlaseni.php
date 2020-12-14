<?php

 
session_start();
require('Db.php');
Db::connect('localhost', 'testserverpolysw', 'testserverpolysw', '5r8Xcxv6');

if (isset($_SESSION['uzivatel_id']))
{
	session_destroy();
	header('Location: ../index.php');
	exit();
}


?>


<!DOCTYPE html>
<html lang="cs-cz">
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="styl.css" type="text/css" />
	<title>Odhlášení</title>
</head>

<body>
</body>
</html>