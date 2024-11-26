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
  <a href="index.php"><h1>Eventos puebla</h1></a>
    <h2><a href="registro.php">Registrarse</a> | <a href="sesion.php">Iniciar Sesión</a> </h2>
  </div>
  <div id="menucontainer">
    <div id="menunav">
      <ul>
        <li><a href="index.php" class="current"><span>Conciertos</span></a></li>
        <li><a href="consultaInternauta.php" ><span>Teatros</span></a></li>
        <li><a href="registro.php"><span>Deportes</span></a></li>
        <li><a href="acceso.php"><span>Familiares</span></a></li>
        <li><a href="contacto.php"><span>Especiales</span></a></li>
        <li><a href="F_todos.php" "><span>Todos</span></a></li>
      </ul>
    </div>
  </div>
  <div id="container">
    <div id="content">
      <h3>Teatros</h3>
      <p>&nbsp;</p>
      <p>
<?PHP
$id=$_GET['id_peli'];
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"vidioteca");
$resultado=mysqli_query($link,"select * from pelicula where id_pelicula='$id'");
$ren=mysqli_fetch_array($resultado);
  $ti=$ren['titulo'];
  $di=$ren['director'];
  $ac=$ren['actor'];
  $im=$ren['imagen'];
  
echo "<img src='MisImagenes/$im' width='300' height='300'> <br>";
echo "Titulo: $ti <br>"; 
echo "Director: $di <br>";
echo "Actor: $ac <br>";
echo "Resumen: <br>";
?>

	  
	  
	  
	  &nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>.</p>
    </div>
    </div>
    <div id="footer"> <a href="#">Registrase</a> | <a href="tfmeur@gmail.com">Iniciar Sesión</a> | <a href="#">html</a> | &copy; 20024 Plmax | Design by <a href="#"> www </a>
  </div>
</div>
</body>
</html>