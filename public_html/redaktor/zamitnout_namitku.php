
<?php
require("connect.php");

  
             
  $sql = "UPDATE clanky SET Stav = 'námitka zamítnuta' WHERE clanky_id = '$_GET[oc]'";

if (mysqli_query($spojeni, $sql)) {

echo '<script language="javascript">';
  header("location: clanky_autorovi.php#clanky_redaktor");
 //header('Location: index_sefredaktor.php');

echo '</script>';


} else {
    echo "Nastala chyba " . mysqli_error($spojeni);
   
}

mysqli_close($spojeni);

?>
