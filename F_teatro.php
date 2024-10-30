<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Aplicacion de eventos puebla</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<div id="wrap">
  <div id="masthead">
    <h1>Eventos Puebla </h1>
    <h2><a href="registro.php">Registrarse</a> | <a href="sesion.php">Iniciar Sesión</a> </h2>
  </div>
  <div id="menucontainer">
    <div id="menunav">
    <ul>
        <li><a href="F_conciertos.php"><span>Conciertos</span></a></li>
        <li><a href="F_teatro.php" class="current"><span>Teatros</span></a></li>
        <li><a href="F_deporte.php"><span>Deportes</span></a></li>
        <li><a href="F_familiares.php"><span>Familiares</span></a></li>
        <li><a href="F_especiales.php"><span>Especiales</span></a></li>
        <li><a href="#"><span>Todos</span></a></li>
      </ul>
    </div>
  </div>
  <div id="container">
    <div id="content">
      <h3>Teatros</h3>
      <p>&nbsp;</p>
      <p>
	  <?PHP
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"vidioteca");
$resultado=mysqli_query($link,"select * from pelicula");
echo "<table border='1'>";
echo"<TR><TD>ID pelicula</TD><TD>Titulo</TD><TD>Director</TD><TD>Actor</TD>
     <TD>Imagen</TD></TR>";
while($ren=mysqli_fetch_array($resultado))
{
  $id=$ren['id_pelicula'];
  $ti=$ren['titulo'];
  $di=$ren['director'];
  $ac=$ren['actor'];
  $im=$ren['imagen'];
  echo"<TR><TD>$id</TD><TD>$ti</TD><TD>$di</TD><TD>$ac</TD>
  <TD><A href='F_teatros2.php?id_peli=$id'>
     <img src='MisImagenes/$im' width='70' height='70'> </A> </TD></TR>";
}
echo "</table>";
mysqli_close($link);
?>

	  
	  
	  
	  &nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>.</p>
    </div>
    </div>
  <div id="footer"> <a href="#">Registrase</a> | <a href="mailto:denise@mitchinson.net">Iniciar Sesión</a> | <a href="http://validator.w3.org/check?uri=referer">html</a> | <a href="http://jigsaw.w3.org/css-validator">css</a> | &copy; 2007 Anyone | Design by <a href="http://www.mitchinson.net"> www.mitchinson.net</a></div>
</div>
</body>
</html>