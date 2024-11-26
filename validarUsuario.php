<?php
session_start();

// Conexión a la base de datos
$link = mysqli_connect("localhost", "root", "", "event");

if (!$link) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Obtener los datos del formulario
$email = $_POST['email'];
$password = $_POST['password'];

// Validar correo electrónico
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Correo electrónico inválido.");
}

// Consulta preparada para prevenir inyección SQL
$stmt = mysqli_prepare($link, 'SELECT id_usuario, nombre, contrasena, tipo_usuario FROM usuarios WHERE email = ?');
mysqli_stmt_bind_param($stmt, 's', $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Verificar si se encontraron resultados
if ($row = mysqli_fetch_array($result)) {
    // Verificar si la contraseña es correcta (texto plano)
    if ($row["contrasena"] === $password) {
        $_SESSION["id_usuario"] = $row['id_usuario'];
        $_SESSION["k_username"] = $row['nombre']; 
        $_SESSION["tipo_usuario"] = $row['tipo_usuario'];

        // Redirigir según el tipo de usuario
        if ($row["tipo_usuario"] == "administrador") {
            header("Location: indexAdm.php");
        } else {
            header("Location: indexCliente.php");
        }
        exit;
    } else {
        echo "Credenciales inválidas.";
        echo '<br><a href="index.php">Regresar</a>';
    }
} else {
    echo "Credenciales inválidas.";
    echo '<br><a href="index.php">Regresar</a>';
}

// Cerrar la conexión
mysqli_close($link);
?>
