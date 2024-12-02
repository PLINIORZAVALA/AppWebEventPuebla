-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 21-11-2024 a las 20:18:27
-- Versión del servidor: 8.3.0
-- Versión de PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `event`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administracion_eventos`
--

CREATE TABLE IF NOT EXISTS `administracion_eventos` (
  `id_administracion` int NOT NULL AUTO_INCREMENT,
  `id_evento` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `estado` enum('aprobado','rechazado') NOT NULL,
  `fecha_revision` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `comentario_admin` text,
  PRIMARY KEY (`id_administracion`),
  KEY `id_evento` (`id_evento`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administracion_eventos`
--

INSERT INTO `administracion_eventos` (`id_administracion`, `id_evento`, `id_user`, `estado`, `fecha_revision`, `comentario_admin`) VALUES
(1, 1, 3, 'aprobado', '2024-11-03 21:44:00', 'Evento aprobado para el próximo mes.'),
(2, 2, 3, 'rechazado', '2024-11-03 21:44:13', 'El evento no cumple con los requisitos.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--


CREATE TABLE IF NOT EXISTS `eventos` (
  `id_event` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(128) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_evento` date NOT NULL,
  `hora_evento` time NOT NULL,
  `ubicacion` varchar(128) NOT NULL,
  `id_usuario` int DEFAULT NULL,
  `estado` enum('pendiente','aprobado','rechazado') DEFAULT 'pendiente',
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `imagen` varchar(64) DEFAULT NULL,
  `tipo_event` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id_event`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id_event`, `titulo`, `descripcion`, `fecha_evento`, `hora_evento`, `ubicacion`, `id_usuario`, `estado`, `fecha_creacion`, `imagen`, `tipo_event`) VALUES
(24, 'aaaaaaaaaaaa', 'aaaaaaaaaaaaaaa', '2024-11-28', '05:27:00', 'Auditorio Centra BUAP', 10, 'pendiente', '2024-11-19 07:27:55', 'const2.jpg', 'deportivos'),
(2, 'Exposición de Arte', 'Muestra de arte contemporáneo.', '2024-11-10', '18:00:00', 'Sala de Exposiciones', 2, 'pendiente', '2024-11-03 21:43:46', 'imagen2', 'familiares'),
(23, 'Tead', 'aaaaaaaaaaaaaaaaa', '2024-11-28', '19:08:00', 'Auditorio Centra BUAP', 10, 'pendiente', '2024-11-19 07:16:29', 'uploads/const1.jpg', 'culturales'),
(4, 'Concierto Clásico', 'Orquesta sinfónica con piezas clásicas.', '2024-12-22', '18:30:00', 'Teatro Municipall', 2, 'pendiente', '2024-11-06 23:25:35', 'imagen_concierto2.jpg', 'concierto'),
(5, 'Concierto de Pop', 'Artistas de pop en vivo.', '2024-12-25', '21:00:00', 'Estadio Principal', 2, 'pendiente', '2024-11-06 23:25:35', 'imagen_concierto3.jpg', 'concierto'),
(6, 'Concierto de Blues', 'Blues y más blues para los fanáticos.', '2024-12-27', '20:00:00', 'Salón Azul', 2, 'pendiente', '2024-11-06 23:25:35', 'imagen_concierto4.jpg', 'concierto'),
(7, 'Obra de Teatro Clásica', 'Obra clásica con un toque moderno.', '2024-11-15', '17:00:00', 'Teatro Principal', 2, 'pendiente', '2024-11-06 23:25:46', 'imagen_teatro1.jpg', 'teatro'),
(8, 'Comedia Musical', 'Divertida comedia con música en vivo.', '2024-11-20', '19:00:00', 'Teatro del Pueblo', 2, 'pendiente', '2024-11-06 23:25:46', 'imagen_teatro2.jpg', 'teatro'),
(9, 'Drama Contemporáneo', 'Una mirada a temas actuales.', '2024-11-25', '18:00:00', 'Auditorio Nuevo', 2, 'pendiente', '2024-11-06 23:25:46', 'imagen_teatro3.jpg', 'teatro'),
(10, 'Teatro Experimental', 'Explorando los límites del teatro.', '2024-11-28', '20:00:00', 'Centro Cultural', 2, 'pendiente', '2024-11-06 23:25:46', 'imagen_teatro4.jpg', 'teatro'),
(11, 'Partido de Fútbol', 'Clásico partido entre equipos locales.', '2024-12-01', '16:00:00', 'Estadio Local', 2, 'pendiente', '2024-11-06 23:25:57', 'imagen_deportes1.jpg', 'deportes'),
(12, 'Maratón Anual', 'Evento deportivo para todas las edades.', '2024-12-05', '07:00:00', 'Parque Central', 2, 'pendiente', '2024-11-06 23:25:57', 'imagen_deportes2.jpg', 'deportes'),
(13, 'Torneo de Basquetbol', 'Equipos de la ciudad compiten.', '2024-12-10', '15:00:00', 'Polideportivo', 2, 'pendiente', '2024-11-06 23:25:57', 'imagen_deportes3.jpg', 'deportes'),
(14, 'Competencia de Natación', 'Pruebas de natación para todas las categorías.', '2024-12-12', '09:00:00', 'Centro Acuático', 2, 'pendiente', '2024-11-06 23:25:57', 'imagen_deportes4.jpg', 'deportes'),
(15, 'Feria Familiar', 'Actividades para toda la familia.', '2024-12-03', '10:00:00', 'Parque Recreativo', 2, 'pendiente', '2024-11-06 23:26:09', 'imagen_familiares1.jpg', 'familiares'),
(16, 'Picnic Comunitario', 'Un día de convivencia al aire libre.', '2024-12-07', '11:00:00', 'Zona Verde', 2, 'pendiente', '2024-11-06 23:26:09', 'imagen_familiares2.jpg', 'familiares'),
(17, 'Festival de Comida', 'Delicias culinarias para disfrutar en familia.', '2024-12-09', '12:00:00', 'Plaza Central', 2, 'pendiente', '2024-11-06 23:26:09', 'imagen_familiares3.jpg', 'familiares'),
(18, 'Espectáculo de Títeres', 'Diversión para los más pequeños.', '2024-12-14', '14:00:00', 'Teatro Infantil', 2, 'pendiente', '2024-11-06 23:26:09', 'imagen_familiares4.jpg', 'familiares'),
(19, 'Gala Benéfica', 'Evento especial para recaudar fondos.', '2024-12-18', '19:00:00', 'Salón de Eventos', 2, 'pendiente', '2024-11-06 23:26:25', 'imagen_especiales1.jpg', 'especiales'),
(20, 'Cena de Fin de Año', 'Cena de gala para despedir el año.', '2024-12-31', '20:00:00', 'Hotel Gran Plaza', 2, 'pendiente', '2024-11-06 23:26:25', 'imagen_especiales2.jpg', 'especiales'),
(21, 'Premiación Anual', 'Reconocimiento a los mejores del año.', '2024-12-28', '17:00:00', 'Centro de Convenciones', 2, 'pendiente', '2024-11-06 23:26:25', 'imagen_especiales3.jpg', 'especiales'),
(22, 'Conferencia Magistral', 'Conferencias de expertos en el área.', '2024-12-16', '09:00:00', 'Auditorio Central', 2, 'pendiente', '2024-11-06 23:26:25', 'imagen_especiales4.jpg', 'especiales'),
(25, 'bbbbbbbbbbbbbbbbb', 'bbbbbbbbbbbbbbb', '2024-11-29', '04:32:00', 'Auditorio Centra BUAP', 10, 'pendiente', '2024-11-19 07:33:27', 'const3.jpg', 'familiares'),
(26, 'bbbbbbbbbbbbbbbbb', 'cccccccccccccc', '2024-11-28', '02:36:00', 'Auditorio Centra BUAP', 10, 'pendiente', '2024-11-19 07:34:29', 'const2.jpg', 'deportivos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `contrasena` varchar(128) NOT NULL,
  `tipo_usuario` enum('visitante','organizador','administrador') NOT NULL,
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Passw0rd!8
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `email`, `contrasena`, `tipo_usuario`, `fecha_registro`) VALUES
(8, 'Max Plinior Zavala Ayvar', 'peeps@example.com', '$2y$10$SPYqwsBUBn8YhAP3Kx6YmOxZEvPrZFg3MhnXX1kCqKJ8Uc4Bc9xaO', 'visitante', '2024-11-19 03:59:38'),
(2, 'Carlos Organizador', 'carlos@gmail.com', 'password123', 'organizador', '2024-11-03 21:43:22'),
(3, 'Luis Administrador', 'luis@example.com', 'password123', 'administrador', '2024-11-03 21:43:22'),
(4, 'Max Plinior Zavala Ayvar', 'pedro@example.com', '$2y$10$0LU3Yru9ZQXtn14AZk6RveV.hG5vBsKnqGXI.vXgfvNqciCd8ZLeC', 'visitante', '2024-11-06 23:03:20'),
(5, 'Pedro Zavala Ayvar', 'pero@example.com', '$2y$10$Zfqj5yGiihsVSe/XrQuw2OaYZCqHlUC23N/dfAsKiLkqfS3d.Hnqy', 'visitante', '2024-11-07 11:40:40'),
(6, 'Carlos Cordsss', 'juan@example.com', '$2y$10$8C0vTaHKyX56S2Qh14QnpeANgfjym8o1MzCBFZRlkwHACN6vqnVWe', 'visitante', '2024-11-07 11:44:11'),
(7, 'Luis adas asda', 'Pee@example.com', '$2y$10$1I1cCKuptd5Pl/tEYmm0/elSWHTh5RiGhx0xjeLDkyOIAc1zA.k3K', 'visitante', '2024-11-07 11:46:10'),
(9, 'Max Plinior Zavala Ayvar', 'max@example.com', '$2y$10$37uGyfegf.O7HTL5F9m3reeFEgssGgpkfZv0nFRoaO/ECN2VCk2.C', 'visitante', '2024-11-19 05:23:33'),
(10, 'Max Plinior Zavala Ayvar', 'carmen@example.com', '123456789', 'visitante', '2024-11-19 06:59:39');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
