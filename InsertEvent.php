<?php
// Iniciar sesión
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['id_usuario'])) {
    header("Location: sesion.php");
    exit();
}

// Conexión a la base de datos
$link = mysqli_connect("localhost", "root", "", "event");
if (!$link) {
    die("Error de conexión: " . mysqli_connect_error());
}


// Obtener los datos del formulario
$titulo = $_POST['titulo'] ?? '';
$descripcion = $_POST['descripcion'] ?? '';
$fecha_evento = $_POST['fecha_evento'] ?? '';
$hora_evento = $_POST['hora_evento'] ?? '';
$ubicacion = $_POST['ubicacion'] ?? '';
$tipo_evento = $_POST['tipo_evento'] ?? '';
$id_usuario = $_SESSION['id_usuario'] ?? null; // ID del usuario logueado
$estado = "pendiente";

// Validar datos requeridos
if (empty($titulo) || empty($descripcion) || empty($fecha_evento) || empty($hora_evento) || empty($ubicacion) || empty($tipo_evento)) {
    die("Todos los campos son obligatorios.");
}

// Validar que la fecha y hora del evento no sean anteriores a la actual
$current_datetime = new DateTime();
$evento_datetime = DateTime::createFromFormat('Y-m-d H:i', $fecha_evento . ' ' . $hora_evento);

// Verificar que la fecha del evento sea válida
if (!$evento_datetime || $evento_datetime < $current_datetime) {
    echo "<script>alert('La fecha y hora del evento deben ser posteriores a la fecha y hora actuales.');
    window.history.back();
    </script>";
    exit();
}

// Subir la imagen
$target_dir = "uploads/";
$imagen = basename($_FILES["imagen"]["name"]); // Solo toma el nombre del archivo
$target_file = $target_dir . $imagen;

// Mover el archivo a la carpeta de destino
if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
    // El archivo fue subido correctamente
} else {
    echo "<script>alert('Error al subir la imagen.');</script>";
    exit();
}

// Consulta preparada para insertar el evento
$stmt = mysqli_prepare($link, "INSERT INTO eventos (titulo, descripcion, fecha_evento, hora_evento, ubicacion, id_usuario, estado, fecha_creacion, imagen, tipo_event) VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), ?, ?)");
if (!$stmt) {
    echo "<script>alert('Error en la preparación de la consulta.');</script>";
    exit();
}

mysqli_stmt_bind_param($stmt, "sssssssss", $titulo, $descripcion, $fecha_evento, $hora_evento, $ubicacion, $id_usuario, $estado, $imagen, $tipo_evento);

// Ejecutar la consulta
if (mysqli_stmt_execute($stmt)) {
    echo "<script>alert('Evento registrado exitosamente.'); window.location.href = 'indexCliente.php';</script>";
    exit();
} else {
    echo "<script>alert('Error en el registro del evento.');</script>";
    exit();
}

// Cerrar la conexión
mysqli_stmt_close($stmt);
mysqli_close($link);
?>

