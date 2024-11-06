<?php 
session_start();

// Conexión a la base de datos
$link = mysqli_connect("localhost", "root", "", "event");

if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

// Obtener los datos del formulario
$email = $_POST['email'];  // Ajustado a 'email' para coincidir con el campo del formulario
$password = $_POST['password'];

// Consulta preparada para prevenir inyección SQL
$stmt = mysqli_prepare($link, 'SELECT nombre, contrasena, tipo_usuario FROM usuarios WHERE email = ?');
mysqli_stmt_bind_param($stmt, 's', $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Verificar si se encontraron resultados
if ($row = mysqli_fetch_array($result)) {
    // Verificar si la contraseña es correcta
    if ($row["contrasena"] === $password) {  // Cambiar a password_verify si usas hash
        $_SESSION["k_username"] = $row['nombre']; // Guardar el nombre del usuario logueado
        echo 'Has sido logueado correctamente ' . $_SESSION['k_username'] . '<p>';
        
        // Redireccionar según el tipo de usuario
        if ($row["tipo_usuario"] == "administrador") {
            header("Location: indexAdm.php");
        } else {
            header("Location: indexCliente.php");
        }
        exit; // Asegúrate de salir después de la redirección
    } else {
        echo "Contraseña incorrecta";
        echo '<a href="index.php">Regresar</a></p>';
    }
} else {
    echo "Login incorrecto";
    echo '<a href="index.php">Regresar</a></p>';
}

// Cerrar la conexión
mysqli_close($link);
?>
