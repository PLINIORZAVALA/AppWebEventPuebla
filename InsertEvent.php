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

// Subir la imagen
$target_dir = "uploads/";
$imagen = basename($_FILES["imagen"]["name"]); // Solo toma el nombre del archivo
$target_file = $target_dir . $imagen;

// Mover el archivo a la carpeta de destino
if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
    // El archivo fue subido correctamente
} else {
    die("Error al subir la imagen.");
}

// Consulta preparada para insertar el evento
$stmt = mysqli_prepare($link, "INSERT INTO eventos (titulo, descripcion, fecha_evento, hora_evento, ubicacion, id_usuario, estado, fecha_creacion, imagen, tipo_event) VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), ?, ?)");
if (!$stmt) {
    die("Error en la preparación de la consulta: " . mysqli_error($link));
}

mysqli_stmt_bind_param($stmt, "sssssssss", $titulo, $descripcion, $fecha_evento, $hora_evento, $ubicacion, $id_usuario, $estado, $imagen, $tipo_evento);

// Ejecutar la consulta
if (mysqli_stmt_execute($stmt)) {
    echo "Evento registrado exitosamente.";
    header("Location: index.php");
    exit();
} else {
    die("Error en el registro del evento: " . mysqli_stmt_error($stmt));
}

// Cerrar la conexión
mysqli_stmt_close($stmt);
mysqli_close($link);
?>
