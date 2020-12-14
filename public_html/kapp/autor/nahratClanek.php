<?php

 session_start();

/* Attempt MySQL server connection. Assuming you are running MySQL

server with default setting (user 'root' with no password) */

$link = mysqli_connect("localhost", "testserverpolysw", "5r8Xcxv6", "testserverpolysw");
mysqli_set_charset($link, "utf8");
// Check connection

if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());



}



 





$target_dir = "../uploads/";



$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$download = "http://testserverpolysw.php5.cz/uploads/". basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1;



$docFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));







// Check if file already exists



if (file_exists($target_file)) {



  echo "Sorry, file already exists.";



  $uploadOk = 0;



}







// Check file size



if ($_FILES["fileToUpload"]["size"] > 500000) {



  echo "Sorry, your file is too large.";



  $uploadOk = 0;



}







// Allow certain file formats



if($docFileType != "pdf" && $docFileType != "doc" && $docFileType != "docx") {



  echo "Sorry, only PDF, DOC & DOCX files are allowed.";



  $uploadOk = 0;



}







// Check if $uploadOk is set to 0 by an error



if ($uploadOk == 0) {



  echo "Sorry, your file was not uploaded.";



// if everything is ok, try to upload file



} else {



  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {



    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";



  } else {



    echo "Sorry, there was an error uploading your file.";



  }



}

$sql = "INSERT INTO clanky (clanky_id, Nazev_clanku, Autor_clanku, url_clanku) values('$_POST[clanky_id]','$_POST[Nazev_clanku]','$_POST[Autor_clanku]', '$download')";

//$sql = "UPDATE uzivatele SET admin = '$_GET[selectpravo]' WHERE jmeno='$_GET[nazev_uziv]'";

if (mysqli_query($link, $sql)) {

    echo "zaznam byl uspesne pridans\n";

} else {

    echo "Error: " . $sql . "<br>" . mysqli_error($link);

}

mysqli_close($link);



?>



    <button><a href="index.php">Zpet</button>



<?php

//session_destroy();

//header('Location: ../testtomas/index.php');

//mysqli_close($link);

?>