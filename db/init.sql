-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-06-2025 a las 22:17:46
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `desercion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acciones`
--

CREATE TABLE `acciones` (
  `idaccion` int(11) NOT NULL,
  `idreporte` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `usuario` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aprendiz`
--

CREATE TABLE `aprendiz` (
  `idaprendiz` varchar(20) NOT NULL,
  `tipodoc` varchar(4) DEFAULT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `nficha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `aprendiz`
--

INSERT INTO `aprendiz` (`idaprendiz`, `tipodoc`, `nombres`, `apellidos`, `celular`, `email`, `direccion`, `nficha`) VALUES
('1001', 'CC', 'Ana', 'Gómez', '3001000001', 'ana.gomez@mail.com', 'Calle 1 #1-01', 123456),
('1002', 'TI', 'Luis', 'Torres', '3001000002', 'luis.torres@mail.com', 'Calle 1 #1-02', 123456),
('1003', 'CC', 'Sofía', 'Martínez', '3001000003', 'sofia.martinez@mail.com', 'Calle 1 #1-03', 123456),
('1004', 'TI', 'Juan', 'Rodríguez', '3001000004', 'juan.rodriguez@mail.com', 'Calle 1 #1-04', 123456),
('1005', 'CC', 'María', 'Pérez', '3001000005', 'maria.perez@mail.com', 'Calle 1 #1-05', 123456),
('1006', 'TI', 'Carlos', 'Moreno', '3001000006', 'carlos.moreno@mail.com', 'Calle 1 #1-06', 123456),
('1007', 'CC', 'Laura', 'Díaz', '3001000007', 'laura.diaz@mail.com', 'Calle 1 #1-07', 123456),
('1008', 'TI', 'Julián', 'Vargas', '3001000008', 'julian.vargas@mail.com', 'Calle 1 #1-08', 123456),
('1009', 'CC', 'Daniela', 'Ríos', '3001000009', 'daniela.rios@mail.com', 'Calle 1 #1-09', 123456),
('1010', 'TI', 'Miguel', 'Suárez', '3001000010', 'miguel.suarez@mail.com', 'Calle 1 #1-10', 123456),
('1011', 'CC', 'Camila', 'Romero', '3001000011', 'camila.romero@mail.com', 'Calle 2 #2-01', 234567),
('1012', 'TI', 'Andrés', 'Herrera', '3001000012', 'andres.herrera@mail.com', 'Calle 2 #2-02', 234567),
('1013', 'CC', 'Isabella', 'Mendoza', '3001000013', 'isabella.mendoza@mail.com', 'Calle 2 #2-03', 234567),
('1014', 'TI', 'Santiago', 'López', '3001000014', 'santiago.lopez@mail.com', 'Calle 2 #2-04', 234567),
('1015', 'CC', 'Valentina', 'Castaño', '3001000015', 'valentina.castano@mail.com', 'Calle 2 #2-05', 234567),
('1016', 'TI', 'Mateo', 'Gutiérrez', '3001000016', 'mateo.gutierrez@mail.com', 'Calle 2 #2-06', 234567),
('1017', 'CC', 'Lucía', 'Mejía', '3001000017', 'lucia.mejia@mail.com', 'Calle 2 #2-07', 234567),
('1018', 'TI', 'Tomás', 'Cardona', '3001000018', 'tomas.cardona@mail.com', 'Calle 2 #2-08', 234567),
('1019', 'CC', 'Daniel', 'Ospina', '3001000019', 'daniel.ospina@mail.com', 'Calle 2 #2-09', 234567),
('1020', 'TI', 'Mariana', 'Ruiz', '3001000020', 'mariana.ruiz@mail.com', 'Calle 2 #2-10', 234567),
('1021', 'CC', 'Alejandro', 'Patiño', '3001000021', 'alejandro.patino@mail.com', 'Calle 3 #3-01', 345678),
('1022', 'TI', 'Emily', 'Vélez', '3001000022', 'emily.velez@mail.com', 'Calle 3 #3-02', 345678),
('1023', 'CC', 'Sebastián', 'Bermúdez', '3001000023', 'sebastian.bermudez@mail.com', 'Calle 3 #3-03', 345678),
('1024', 'TI', 'Natalia', 'Arango', '3001000024', 'natalia.arango@mail.com', 'Calle 3 #3-04', 345678),
('1025', 'CC', 'Gabriel', 'Londoño', '3001000025', 'gabriel.londono@mail.com', 'Calle 3 #3-05', 345678),
('1026', 'TI', 'Sara', 'Zuluaga', '3001000026', 'sara.zuluaga@mail.com', 'Calle 3 #3-06', 345678),
('1027', 'CC', 'Felipe', 'Castro', '3001000027', 'felipe.castro@mail.com', 'Calle 3 #3-07', 345678),
('1028', 'TI', 'Nicole', 'Montoya', '3001000028', 'nicole.montoya@mail.com', 'Calle 3 #3-08', 345678),
('1029', 'CC', 'Esteban', 'Ramírez', '3001000029', 'esteban.ramirez@mail.com', 'Calle 3 #3-09', 345678),
('1030', 'TI', 'Paula', 'Morales', '3001000030', 'paula.morales@mail.com', 'Calle 3 #3-10', 345678);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha`
--

CREATE TABLE `ficha` (
  `nficha` int(11) NOT NULL,
  `idprograma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ficha`
--

INSERT INTO `ficha` (`nficha`, `idprograma`) VALUES
(123456, 1),
(234567, 2),
(345678, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motivo`
--

CREATE TABLE `motivo` (
  `idmotivo` int(11) NOT NULL,
  `descripcion` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `motivo`
--

INSERT INTO `motivo` (`idmotivo`, `descripcion`) VALUES
(1, 'Inasistencia reiterada'),
(2, 'Problemas personales'),
(3, 'Cambio de residencia'),
(4, 'Falta de conectividad'),
(5, 'Problemas de salud'),
(6, 'Falta de recursos económicos'),
(7, 'Cambio de jornada laboral'),
(8, 'Desmotivación personal'),
(9, 'Dificultades familiares'),
(10, 'Problemas académicos'),
(11, 'Ausencia prolongada sin justificación'),
(12, 'Problemas psicológicos'),
(13, 'Cambio de ciudad o país');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `idprograma` int(11) NOT NULL,
  `nombreprograma` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `programa`
--

INSERT INTO `programa` (`idprograma`, `nombreprograma`) VALUES
(1, 'Tecnología en Análisis y Desarrollo de Software'),
(2, 'Gestión Empresarial'),
(3, 'Contabilidad y Finanzas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `idreporte` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `fallas` int(11) DEFAULT NULL,
  `observaciones` varchar(255) DEFAULT NULL,
  `idaprendiz` varchar(20) NOT NULL,
  `nficha` int(11) NOT NULL,
  `idmotivo` int(11) NOT NULL,
  `estado` varchar(20) DEFAULT NULL COMMENT 'En revisión, Reingreso, Deserción'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` varchar(30) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `nombre`, `password`, `email`) VALUES
('admin', 'Daniel', '$2y$10$wFcI1WILjOclvD7xp42lMu3PE.lfXig7uizKvBxuOO9TWaT2ddr9O', 'admin@gmail');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acciones`
--
ALTER TABLE `acciones`
  ADD PRIMARY KEY (`idaccion`),
  ADD KEY `fk_acciones_reportes1_idx` (`idreporte`),
  ADD KEY `fk_acciones_usuarios1_idx` (`usuario`);

--
-- Indices de la tabla `aprendiz`
--
ALTER TABLE `aprendiz`
  ADD PRIMARY KEY (`idaprendiz`),
  ADD KEY `fk_aprendiz_ficha` (`nficha`);

--
-- Indices de la tabla `ficha`
--
ALTER TABLE `ficha`
  ADD PRIMARY KEY (`nficha`),
  ADD KEY `fk_ficha_programa_idx` (`idprograma`);

--
-- Indices de la tabla `motivo`
--
ALTER TABLE `motivo`
  ADD PRIMARY KEY (`idmotivo`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`idprograma`);

--
-- Indices de la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`idreporte`),
  ADD KEY `fk_reportes_aprendiz1_idx` (`idaprendiz`),
  ADD KEY `fk_reportes_ficha1_idx` (`nficha`),
  ADD KEY `fk_reportes_motivo1_idx` (`idmotivo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acciones`
--
ALTER TABLE `acciones`
  MODIFY `idaccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `motivo`
--
ALTER TABLE `motivo`
  MODIFY `idmotivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `programa`
--
ALTER TABLE `programa`
  MODIFY `idprograma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `idreporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acciones`
--
ALTER TABLE `acciones`
  ADD CONSTRAINT `fk_acciones_reportes1` FOREIGN KEY (`idreporte`) REFERENCES `reportes` (`idreporte`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_acciones_usuarios1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `aprendiz`
--
ALTER TABLE `aprendiz`
  ADD CONSTRAINT `fk_aprendiz_ficha` FOREIGN KEY (`nficha`) REFERENCES `ficha` (`nficha`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ficha`
--
ALTER TABLE `ficha`
  ADD CONSTRAINT `fk_ficha_programa` FOREIGN KEY (`idprograma`) REFERENCES `programa` (`idprograma`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD CONSTRAINT `fk_reportes_aprendiz1` FOREIGN KEY (`idaprendiz`) REFERENCES `aprendiz` (`idaprendiz`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reportes_ficha1` FOREIGN KEY (`nficha`) REFERENCES `ficha` (`nficha`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reportes_motivo1` FOREIGN KEY (`idmotivo`) REFERENCES `motivo` (`idmotivo`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
