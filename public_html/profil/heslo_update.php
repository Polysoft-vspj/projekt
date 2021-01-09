<?php
session_start();
require('Db.php');
require ('connect.php');

$sql1 = "SELECT * from uzivatele WHERE uzivatele_id= $_GET[oc]";
$vysledek = mysqli_query($spojeni, $sql1);
$radeks = mysqli_fetch_assoc($vysledek);
$uziv = $_GET['oc'];
if ($_POST)
{
    if ($_POST['heslo'] != $_POST['heslo_znovu'])
        $zprava = 'Hesla nesouhlasí';
    else
    {
        $heslo = password_hash($_POST['heslo'], PASSWORD_DEFAULT);

       $sql = "UPDATE uzivatele SET heslo = '$heslo' WHERE uzivatele_id='$_GET[oc]'";
        header('Location: index.php');
       if (mysqli_query($spojeni, $sql)) {

            echo "Uživatel byl upraven";

        } else {

            echo "Chyba při opravě: " . mysqli_error($spojeni);

        }

        mysqli_close($spojeni);



            exit();
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

            <TR><TD>Jméno: <TD><INPUT class="form-control" NAME=jmeno VALUE="<?php echo $radeks["jmeno"] ?>"SIZE=20 readonly/>
            <TR><TD>Heslo: <TD><input type="password" name="heslo" />
            <TR><TD>Heslo znovu: <TD><input type="password" name="heslo_znovu" />
            <br />
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