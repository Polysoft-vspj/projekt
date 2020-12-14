<?php
session_start();
require('Db.php');
Db::connect('localhost', 'testserverpolysw', 'testserverpolysw', '5r8Xcxv6');

if ($_POST)
{
    if ($_POST['heslo'] != $_POST['heslo_znovu'])
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
				INSERT INTO uzivatele (jmeno, heslo, admin)
				VALUES (?, ?, ?)
			', $_POST['jmeno'], $heslo, $_POST['prava']);

            header('Location: index.php');
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="cs-cz">
<HEAD><TITLE>Nový uživatel</TITLE>

    <link href="css/all.css" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

</HEAD>

<body>
                <div class="container w-50">
                    <H1>Nový uživatel</H1>

                    <!-- vypsani polozek zaznamu do formulare pro upravy -->

                    <form method="post">
                        <TABLE>

                            <TR><TD>Jméno: <TD><input type="text" name="jmeno" />
                            <TR><TD>Heslo: <TD><input type="password" name="heslo" />
                            <TR><TD>Heslo znovu: <TD><input type="password" name="heslo_znovu" />
                            <TR><TD>Oprávnění: </TD><TD>

                                    <select class="form-control" name="prava"  >

                                        <option value="0">Čtenář</option>

                                        <option value="1">Redaktor</option>

                                        <option value="2">Recenzent</option>

                                        <option value="3">Šéfredaktor</option>

                                        <option value="4">Admin</option>

                                        <option value="5">Autor</option>

                                    </select>

                                </TD></TR><br />
                            <tr><td><INPUT TYPE=SUBMIT VALUE="odešli" class="btn btn-success alert"></td></tr>

                    </form>
                    <tr><td>

                            <FORM ACTION="index.php">

                                <INPUT TYPE=SUBMIT VALUE="Zpět" class="btn btn-dark alert">

                            </FORM>
                        </td></tr>
                    </TABLE>



                </div>
                <?php
                if (isset($zprava))
                    echo('<p>' . $zprava . '</p>');
                ?>


</body>
</html>