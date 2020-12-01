<?php



  require("connect.php");



?>











<HTML>







<HEAD><TITLE>Recenze</TITLE>



    <link href="css/all.css" rel="stylesheet">



    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">



<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />



</HEAD>







<BODY>



<div class="container w-50">



<?php



$sql = "select * from clanky where clanky_id=$_GET[oc]";



$vysledek = mysqli_query($spojeni, $sql);  







$radeks = mysqli_fetch_assoc($vysledek) 















?>





	

	<section >

    <div class="container">

      <div class="row">

        <div class="col-lg-8 mx-auto">

            <h1>

             Recenze

            </h1>    

         <form action="nahratRecenzi.php" method="post" enctype="multipart/form-data" style="text-align: left">

			 

            <div class="form-group">

            <?php echo "ID článku je: ". $radeks["clanky_id"];?>

            </div>

			 
<INPUT readonly hidden class="form-control" 			name="clanky_id"	id="clanky_id"	 	VALUE="<?php echo $radeks["clanky_id"] ?>"SIZE=20>

            <TR><TD>Název článku: <TD><INPUT readonly class="form-control" 			name="Nazev_clanku"	id="Nazev_clanku"	 	VALUE="<?php echo $radeks["Nazev_clanku"] ?>"SIZE=20>

			<TR><TD>Autor článku: <TD><INPUT readonly class="form-control" 		name="Autor_clanku"	id="Autor_clanku"		 VALUE="<?php echo $radeks["Autor_clanku"] ?>"SIZE=20>

			<TR><TD>URL článku: <TD><INPUT readonly class="form-control" 		name="url_clanku"	id="url_clanku"		 VALUE="<?php echo $radeks["url_clanku"] ?>"SIZE=20>

			<TR><TD>Jméno recenzenta: <TD><INPUT  class="form-control" 		name="Jmeno_recenzenta"	id="Jmeno_recenzenta"	VALUE="<?php echo $radeks["Jmeno_recenzenta"] ?>"SIZE=20>

			<TR><TD>URl recenzenta: <TD><INPUT readonly  class="form-control" 	name="url_recenze" 	id="url_recenze"		VALUE="<?php echo $radeks["url_recenze"] ?>"SIZE=20>

			<TR><TD>Aktuální stav recenze: <TD><INPUT readonly class="form-control" name="Stav" 		id="Stav"			 VALUE="<?php echo $radeks["Stav"] ?>"SIZE=20>	

			<TR><TD>Změnit stav recenze: </TD><TD>

				<select class="form-control" name="stavy"  >

					<option value="přijato">přijato</option>

					<option value="přijato s výhradami">přijato s výhradami</option>

					<option value="vráceno z důvodu nevhodnosti příspevku">vráceno z důvodu nevhodnosti příspevku</option>

					<option value="vráceno z důvodu tématické nevhodnosti">vráceno z důvodu tématické nevhodnosti</option>

					<option value="zamítnuto">zamítnuto</option>

	

				</select>

			</TD></TR><br />
				

            <div class="form-group">

               <input type="file" class="btn-light" name="fileToUpload" id="fileToUpload" multiple accept=".docx,.doc,.pdf">

           

            </div>

            <div class="form-group">

               <input type="submit" class="btn btn-danger" value="Nahrát dokument" name="submit">

            </div>

			 










          </form>  

         

          

        </div>

      </div>

    </div>

    

    

    

  </section>

	

	

<FORM ACTION="index.php">



<INPUT TYPE=SUBMIT VALUE="Zpět" class="btn btn-dark alert">



</FORM>	

	

	

	

	

	

	



<script>	submitForms = function(){

    document.getElementById("form1").submit();

    document.getElementById("form2").submit();

}

</script>

	



	



	



	



    <?php



mysqli_close($spojeni);



?>



</div>



</BODY>



</HTML>



