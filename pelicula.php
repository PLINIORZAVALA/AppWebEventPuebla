<html>
<head> <title> Consulta </title> </head>
<body>
<h2> Lista de peliculas de la vidioteca </h2>
<hr>
<?PHP
$link = mysqli_connect("localhost", "root", "", "vidioteca");
if (!$link) {
    die('Error de conexión: ' . mysqli_connect_error());
}

$resultado = mysqli_query($link, "SELECT * FROM pelicula");
if (!$resultado) {
    die('Error en la consulta: ' . mysqli_error($link));
}

echo "<table border='1'>";
echo "<tr><td>ID pelicula</td><td>Titulo</td><td>Director</td><td>Actor</td><td>Imagen</td></tr>";

while ($reg = mysqli_fetch_array($resultado)) {
    $id = $reg['id_pelicula'];
    $ti = $reg['titulo'];
    $di = $reg['director'];
    $ac = $reg['actor'];
    $im = $reg['imagen'];
    
    echo "<tr>";
    echo "<td>$id</td><td>$ti</td><td>$di</td><td>$ac</td>";
    echo "<td><a href='pelicula2.php?id_peli=$id'><img src='MisImagenes/$im' width='70' height='70'></a></td>";
    echo "</tr>";
}

echo "</table>";

mysqli_close($link);
?>
</body>
</html>
