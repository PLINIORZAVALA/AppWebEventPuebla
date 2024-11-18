<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Usuario</title>
</head>
<body>
<?php 
// Conexión a la base de datos
$link = mysqli_connect("localhost", "root", "", "event");

if (!$link) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Verificar que el ID esté en la URL
if (isset($_GET['id_usuario']) && is_numeric($_GET['id_usuario'])) { // Corregido
    $id = (int) $_GET['id_usuario'];  // Convertir a entero para seguridad

    // Ejecutar la consulta de eliminación
    $query = "DELETE FROM usuarios WHERE id_usuario = $id"; 
    if (mysqli_query($link, $query)) {
        // Redirigir después de la eliminación
        header("Location: elimUserAB.php");
        exit();
    } else {
        echo "Error al eliminar el usuario: " . mysqli_error($link);
    }
} else {
    echo "ID de usuario no válido.";
}

// Cerrar la conexión
mysqli_close($link);
?>
</body>
</html>
