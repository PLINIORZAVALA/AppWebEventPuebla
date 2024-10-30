<html>
<head> <title> Consulta </title> </head>
<body>
<h2> Detalles de la película </h2>
<hr>
<?PHP
$id = $_GET['id_peli'];
$link = mysqli_connect("localhost", "root", "", "vidioteca");

if (!$link) {
    die('Error de conexión: ' . mysqli_connect_error());
}

$resultado = mysqli_query($link, "SELECT * FROM pelicula WHERE id_pelicula = '$id'");
if (!$resultado) {
    die('Error en la consulta: ' . mysqli_error($link));
}

$ren = mysqli_fetch_array($resultado);

$ti = $ren['titulo'];
$di = $ren['director'];
$ac = $ren['actor'];
$im = $ren['imagen'];

echo "<img src='MisImagenes/$im' width='70' height='70'> <br>";
echo "Titulo: $ti <br>";
echo "Director: $di <br>";
echo "Actor: $ac <br>";
echo "Imagen: $im <br>";
echo "Resumen: <br>";

mysqli_close($link);
?>
</body>
</html>
