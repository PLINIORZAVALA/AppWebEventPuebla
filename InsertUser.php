<?php
// Iniciar sesión
session_start();

// Conexión a la base de datos
$link = mysqli_connect("localhost", "root", "", "event");

if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

// Obtener los datos del formulario de registro
$email = $_POST['email'];
$password = $_POST['password'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$tipo_usuario = "visitante"; // Puedes cambiar el tipo según sea necesario

// Concatenar el nombre completo
$nombre_completo = $first_name . " " . $last_name;

// Encriptar la contraseña
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// Consulta preparada para insertar el nuevo usuario en la base de datos
$stmt = mysqli_prepare($link, "INSERT INTO usuarios (nombre, email, contrasena, tipo_usuario, fecha_registro) VALUES (?, ?, ?, ?, NOW())");
mysqli_stmt_bind_param($stmt, "ssss", $nombre_completo, $email, $hashed_password, $tipo_usuario);

// Ejecutar la consulta
if (mysqli_stmt_execute($stmt)) {
    echo "Registro exitoso. Redirigiendo a la página de inicio de sesión...";
    header("Location: sesion.php");
    exit();
} else {
    echo "Error en el registro: " . mysqli_stmt_error($stmt);
}

// Cerrar la conexión
mysqli_stmt_close($stmt);
mysqli_close($link);
?>
