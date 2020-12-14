<!DOCTYPE html>

<html lang="cs">



<head>



  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="description" content="">

  <meta name="author" content="Polysoft">



  <title>LOGOS POLYTECHNIKOS</title>



  <!-- Bootstrap -->

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">



  <!-- Vlastni css -->

  

<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">

<style>
	input{
		padding: 5px;
		margin-bottom: 15px;
		font-weight: bold;
	}
	
	
}
	
	</style>

</head>

<body id="page-top">
<div class="container bg-light" style="text-align: center">
<form action="upload.php" method="post" enctype="multipart/form-data" style="text-align: left">
  <h4><B>Select document to upload:</B></h4><br/>
 	<label for"test">
 	
 	
   <input type="file" class="btn-light" name="fileToUpload" id="fileToUpload" multiple accept=".docx,.doc,.pdf">
   
   
   
  </label><br/>
  <input type="submit" class="btn btn-danger" value="Nahrát dokument" name="submit">
</form>
<p id="filename"></p>
</div>
</body>
</html>