              
<?php
require("connect.php");

  $sql = "UPDATE clanky SET odeslat_autor = '1' WHERE clanky_id = '$_GET[oc]'";
  $sql = "UPDATE clanky SET Stav = 'vráceno z dùvodu tématické nevhodnosti' WHERE clanky_id = '$_GET[oc]'";

if (mysqli_query($spojeni, $sql)) {
  
echo '<script language="javascript">';
  header("location: index_sefredaktor.php#clanky_sefredaktor");
 //header('Location: index_sefredaktor.php');
   
echo '</script>';
                
 
} else {
    echo "Nastala chyba " . mysqli_error($spojeni);
}

mysqli_close($spojeni);

?>

