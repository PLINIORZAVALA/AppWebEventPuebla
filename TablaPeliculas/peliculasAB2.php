<html>
<head>


</head>
<body>
<?php 

   $link=mysqli_connect("localhost","root","");
   mysqli_select_db($link,"videoteca");
   
   $id=$_GET['id_pelicula'];
// echo "el valor es : $id";  
   mysqli_query($link,"delete from pelicula where id_pelicula = '$id'"); 
   header("Location:peliculasAB.php"); 
?> 
</body>
