<?php
session_start();

// Conexión a la base de datos
$link = mysqli_connect("localhost", "root", "", "event");
if (!$link) {
    die("Error en la conexión a la base de datos: " . mysqli_connect_error());
}

// Validar y sanitizar entradas
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
$password = trim($_POST['password']);
$first_name = htmlspecialchars(trim($_POST['first_name']));
$last_name = htmlspecialchars(trim($_POST['last_name']));

if (empty($email) || empty($password) || empty($first_name) || empty($last_name)) {
    die("Todos los campos son obligatorios.");
}

// Verificar si el correo ya existe
$query = "SELECT id_usuario FROM usuarios WHERE email = ?";
$stmt = mysqli_prepare($link, $query);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);

// Si el correo ya está registrado
if (mysqli_stmt_num_rows($stmt) > 0) {
    echo "<script>
            alert('Este correo ya está registrado.');
            window.history.back();
          </script>";
    exit();
}
mysqli_stmt_close($stmt);

// Verificar si la contraseña cumple con los requisitos
if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password)) {
    die("La contraseña no cumple con los requisitos.");
}

// Encriptar la contraseña
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// Insertar el usuario en la base de datos
$query = "INSERT INTO usuarios (nombre, email, contrasena, tipo_usuario, fecha_registro) VALUES (?, ?, ?, ?, NOW())";
$stmt = mysqli_prepare($link, $query);
$tipo_usuario = "organizador";
$nombre_completo = $first_name . " " . $last_name;
mysqli_stmt_bind_param($stmt, "ssss", $nombre_completo, $email, $hashed_password, $tipo_usuario);

if (mysqli_stmt_execute($stmt)) {
    header("Location: indexCliente.php");
    exit();
} else {
    die("Error al registrar el usuario: " . mysqli_stmt_error($stmt));
}

mysqli_stmt_close($stmt);
mysqli_close($link);
?>
