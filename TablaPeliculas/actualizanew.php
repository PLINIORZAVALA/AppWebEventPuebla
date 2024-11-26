<HTML>
<HEAD>
<TITLE>Actualizar.php</TITLE>
</HEAD>
<BODY>
<h1>Actualizar un registro</h1>
<br>
<?php
   $link=mysqli_connect("localhost","root","");
   mysqli_select_db($link,"videoteca");
   $id=$_GET['id_pelicula'];

   //echo "<br> id Pelicula = $id";

echo '<FORM METHOD="POST" ACTION="actualiza2new.php">';
$result=mysqli_query($link,"select titulo,director,actor from pelicula where id_pelicula='$id'");
$row = mysqli_fetch_array($result);
$ti=$row["titulo"];
$di=$row["director"];
$ac=$row["actor"];

echo "Titulo  : <INPUT TYPE='text' NAME='titulo' value='$ti' SIZE='50'><br>";
echo "director: <INPUT TYPE='text' NAME='director' value='$di' SIZE='50'><br>";
echo "Actor   : <INPUT TYPE='text' NAME='actor' value='$ac' SIZE='50'><br>";
echo "<input type='hidden' name='id' value='$id'>";
?>
<br>
<hr>
 
<INPUT TYPE="SUBMIT" value="Actualizar">
</FORM>
</BODY>
</HTML> 