<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Evento</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 80%;
            max-width: 1000px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .left-panel {
            flex: 1;
            padding: 40px;
            background-color: #2980b9;
            color: white;
            border-radius: 10px 0 0 10px;
            text-align: center;
        }

        .left-panel h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .form-panel {
            flex: 1.5;
            padding: 40px;
        }

        .form-panel h2 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            color: #2980b9;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-size: 1rem;
            margin-bottom: 8px;
            display: block;
            color: #333;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            margin-top: 5px;
        }

        .form-group input:focus {
            border-color: #2980b9;
            outline: none;
            background-color: #fff;
        }

        .submit-btn {
            width: 100%;
            padding: 12px;
            background-color: #2980b9;
            color: white;
            font-size: 1.1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #3498db;
        }

        .regresar-btn {
            position: fixed;
            top: 20px;
            left: 20px;
            padding: 10px 15px;
            background-color: #f39c12;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }

        .regresar-btn:hover {
            background-color: #e67e22;
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
                        <option value="concierto">Concierto</option>
                        <option value="teatros">Teatro</option>
                        <option value="deportivos">Deporte</option>
                        <option value="familiares">Familiares</option>
                        <option value="especiales">Especiales</option>
                    </select>
                </div>
                <button class="submit-btn" type="submit">Registrar Evento</button>
            </form>
        </div>
    </div>
    <button class="regresar-btn" onclick="window.history.back();">Regresar</button>
</body>
</html>
