<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Concierto</title>
</head>
<body>

<?php
// Conexión a la base de datos
$link = mysqli_connect("localhost", "root", "", "event");

if (!$link) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Verificar que los datos del formulario hayan sido enviados
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_usuario = isset($_POST['id_usuario']) ? (int) $_POST['id_usuario'] : 0;
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($link, $_POST['nombre']) : '';
    $email = isset($_POST['email']) ? mysqli_real_escape_string($link, $_POST['email']) : '';
    $contrasena = isset($_POST['contrasena']) ? mysqli_real_escape_string($link, $_POST['contrasena']) : '';
    $tipo_usuario = isset($_POST['tipo_usuario']) ? mysqli_real_escape_string($link, $_POST['tipo_usuario']) : '';

    // Verificar que los campos obligatorios no estén vacíos
    if ($id_usuario && $nombre && $email && $contrasena && $tipo_usuario) {
        // Actualizar los datos del usuario
        $query = "UPDATE usuarios SET nombre = ?, email = ?, contrasena = ?, tipo_usuario = ? WHERE id_usuario = ?";
        $stmt = mysqli_prepare($link, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssssi", $nombre, $email, $contrasena, $tipo_usuario, $id_usuario);

            if (mysqli_stmt_execute($stmt)) {
                // Redirigir al usuario a otra página después de la actualización
                header("Location: elimUserAB.php");
                exit(); // Detener el script después de la redirección
            } else {
                echo "Error al ejecutar la consulta: " . mysqli_error($link);
            }

            mysqli_stmt_close($stmt); // Cerrar la sentencia preparada
        } else {
            echo "Error al preparar la consulta: " . mysqli_error($link);
        }
    } else {
        echo "Por favor, complete todos los campos obligatorios.";
    }
}

// Cerrar la conexión
mysqli_close($link);
?>

</body>
</html>
