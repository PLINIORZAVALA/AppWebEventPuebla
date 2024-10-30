<HTML>
<HEAD>
<TITLE>Actualizar2.php</TITLE>
</HEAD>
<BODY>

<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"videoteca");
$ti=$_REQUEST['titulo'];
$di=$_REQUEST['director'];
$ac=$_REQUEST['actor'];
$id=$_REQUEST['id'];
echo "$ti<br>";
echo "$di<br>";
echo "$ac<br>";
echo "$id<br>";
mysqli_query($link,"Update pelicula Set titulo='$ti',director='$di',actor='$ac' Where id_pelicula='$id'");
header("Location: peliculasAB.php");
?>

</BODY>
</HTML> 