<?php

include 'Encoding.php';

 session_start();



/* Attempt MySQL server connection. Assuming you are running MySQL



server with default setting (user 'root' with no password) */



$link = mysqli_connect("localhost", "testserverpolysw", "5r8Xcxv6", "testserverpolysw");

//$mysqli->query("SET NAMES utf8");

mysqli_set_charset($link, "utf8");

// Check connection



if($link === false){



    die("ERROR: Could not connect. " . mysqli_connect_error());



}







 











$target_dir = "../uploads/";







$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);



$download = "http://testserverpolysw.php5.cz/uploads/". basename($_FILES["fileToUpload"]["name"]);



$uploadOk = 1;



$stav = $_POST[stavy];

//$stav ="ěščřžýáíé";

//$str = iconv('windows-1250', 'UTF-8', $stav);

//$str = mb_convert_encoding($stav, "Windows-1252", "UTF-8");



use \ForceUTF8\Encoding;

//$utf8_string = Encoding::toUTF8("ěščřžýáíé");

//$utf8_string = Encoding::fixUTF8($utf8_string);



$docFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));



//settype($stav, "string");

$sql = "UPDATE clanky SET Jmeno_recenzenta = '$_POST[Jmeno_recenzenta]',  url_recenze = '$download', Stav = '$stav' WHERE clanky_id ='$_POST[clanky_id]'";

//$sql ="UPDATE clanky SET Jmeno_recenzenta = 'AdminTest', url_recenze = 'http://testserverpolysw.php5.cz/uploads/sde.docx', Stav = 'vráceno z důvodu tématické nevhodnosti' WHERE clanky_id ='34'"

//$sql ="INSERT INTO Stavy (jmeno_stavu, komu) values ('ěščřžýáíé','ěščřžýáíé')";



if (mysqli_query($link, $sql)) {

echo mb_detect_encoding($stav);

    echo "Recenze byla uspesne pridana\n";

	echo "\n";

	echo $_POST[Jmeno_recenzenta];

	echo "\n";

	echo $download;

echo "\n";



} else {



    echo "Error: " . $sql . "<br>" . mysqli_error($link);

echo mb_detect_encoding($stav);

}



























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



 



//mysqli_close($link);







?>







    <button><a href="index.php">Zpet</button>







<?php



//session_destroy();



//header('Location: ../testtomas/index.php');



//mysqli_close($link);



?>