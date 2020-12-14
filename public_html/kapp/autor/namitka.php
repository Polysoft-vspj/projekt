<?php
session_start();
require ('connect.php');

$sql1 = "SELECT * from clanky WHERE clanky_id= $_GET[oc]";
$vysledek = mysqli_query($spojeni, $sql1);
$radeks = mysqli_fetch_assoc($vysledek);
$idclanku = $_GET['oc'];
if ($_POST)
{


       // $sql = "INSERT INTO clanky (namitky) VALUES ('$_POST[obsah]')  WHERE clanky_id='$idclanku'";
    $sql = "UPDATE clanky SET namitky = '$_POST[obsah]' WHERE clanky_id='$idclanku'";
        if (mysqli_query($spojeni, $sql)) {

            echo "Uživatel byl upraven";

        } else {

            echo "Chyba při opravě: " . mysqli_error($spojeni);

        }
    header('Location: index.php');
        mysqli_close($spojeni);



        exit();

}
?>

<!DOCTYPE html>
<html lang="cs-cz">
<HEAD><TITLE>Poslat námitku</TITLE>

    <link href="css/all.css" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

</HEAD>

<body>
<div class="container w-50">
    <H1>Námitky</H1>

    <!-- vypsani polozek zaznamu do formulare pro upravy -->

    <form method="post">
        <TABLE>

            <TR><TD>Název: <TD><INPUT class="form-control" NAME=nazev VALUE="<?php echo $radeks["Nazev_clanku"] ?>"SIZE=20 readonly/>
            <TR><TD>Text námitky: <TD><input type="textarea" class="form-control" id="obsah" name="obsah">

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