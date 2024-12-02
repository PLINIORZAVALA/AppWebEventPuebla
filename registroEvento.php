<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Evento</title>
    <link rel="stylesheet" href="sesionStyle.css">
    <style>
        .regresar-btn {
            position: fixed;
            top: 20px;
            left: 20px;
            padding: 10px 15px;
            background-color: #add8e6; /* Color azul claro */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-panel">
            <h2>Registrar Evento</h2>
            <form action="InsertEvent.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" id="titulo" name="titulo" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea id="descripcion" name="descripcion" required></textarea>
                </div>
                <div class="form-group">
                    <label for="fecha_evento">Fecha del Evento</label>
                    <input type="date" id="fecha_evento" name="fecha_evento" required>
                </div>
                <div class="form-group">
                    <label for="hora_evento">Hora del Evento</label>
                    <input type="time" id="hora_evento" name="hora_evento" required>
                </div>
                <div class="form-group">
                    <label for="ubicacion">Ubicación</label>
                    <input type="text" id="ubicacion" name="ubicacion" required>
                </div>
                <div class="form-group">
                    <label for="imagen">Imagen del Evento</label>
                    <input type="file" id="imagen" name="imagen" accept="image/*" required>
                </div>
                <div class="form-group">
                    <label for="tipo_evento">Tipo de Evento</label>
                    <select id="tipo_evento" name="tipo_evento" required>
                        <option value="familiares">concierto</option>
                        <option value="culturales">teatros</option>
                        <option value="deportivos">deportes</option>
                        <option value="familiares">familiares</option>
                        <option value="especiales">especiales</option>
                    </select>
                </div>
                <button class="submit-btn" type="submit">Registrar Evento</button>
            </form>
        </div>
    </div>
    <button class="regresar-btn" onclick="window.history.back();">Regresar</button>
</body>
</html>
