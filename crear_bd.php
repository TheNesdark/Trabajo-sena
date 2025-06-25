<?php
require_once 'config.php'; // Debe definir $pdo como instancia de PDO

$db = 'railway';

// 1. Crear tablas
$tablas = [
    "CREATE TABLE IF NOT EXISTS `programa` (
        `idprograma` int(11) NOT NULL AUTO_INCREMENT,
        `nombreprograma` varchar(100) DEFAULT NULL,
        PRIMARY KEY (`idprograma`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci AUTO_INCREMENT=4",

    "CREATE TABLE IF NOT EXISTS `ficha` (
        `nficha` int(11) NOT NULL,
        `idprograma` int(11) NOT NULL,
        PRIMARY KEY (`nficha`),
        KEY `fk_ficha_programa_idx` (`idprograma`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci",

    "CREATE TABLE IF NOT EXISTS `motivo` (
        `idmotivo` int(11) NOT NULL AUTO_INCREMENT,
        `descripcion` varchar(40) DEFAULT NULL,
        PRIMARY KEY (`idmotivo`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci AUTO_INCREMENT=14",

    "CREATE TABLE IF NOT EXISTS `usuarios` (
        `usuario` varchar(30) NOT NULL,
        `nombre` varchar(50) DEFAULT NULL,
        `password` varchar(255) DEFAULT NULL,
        `email` varchar(100) DEFAULT NULL,
        PRIMARY KEY (`usuario`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci",

    "CREATE TABLE IF NOT EXISTS `aprendiz` (
        `idaprendiz` varchar(20) NOT NULL,
        `tipodoc` varchar(4) DEFAULT NULL,
        `nombres` varchar(50) DEFAULT NULL,
        `apellidos` varchar(50) DEFAULT NULL,
        `celular` varchar(20) DEFAULT NULL,
        `email` varchar(100) DEFAULT NULL,
        `direccion` varchar(100) DEFAULT NULL,
        `nficha` int(11) NOT NULL,
        PRIMARY KEY (`idaprendiz`),
        KEY `fk_aprendiz_ficha` (`nficha`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci",

    "CREATE TABLE IF NOT EXISTS `reportes` (
        `idreporte` int(11) NOT NULL AUTO_INCREMENT,
        `fecha` date DEFAULT NULL,
        `fallas` int(11) DEFAULT NULL,
        `observaciones` varchar(255) DEFAULT NULL,
        `idaprendiz` varchar(20) NOT NULL,
        `nficha` int(11) NOT NULL,
        `idmotivo` int(11) NOT NULL,
        `estado` varchar(20) DEFAULT NULL COMMENT 'En revisión, Reingreso, Deserción',
        PRIMARY KEY (`idreporte`),
        KEY `fk_reportes_aprendiz1_idx` (`idaprendiz`),
        KEY `fk_reportes_ficha1_idx` (`nficha`),
        KEY `fk_reportes_motivo1_idx` (`idmotivo`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci AUTO_INCREMENT=4",

    "CREATE TABLE IF NOT EXISTS `acciones` (
        `idaccion` int(11) NOT NULL AUTO_INCREMENT,
        `idreporte` int(11) NOT NULL,
        `fecha` date DEFAULT NULL,
        `descripcion` varchar(100) DEFAULT NULL,
        `usuario` varchar(30) NOT NULL,
        PRIMARY KEY (`idaccion`),
        KEY `fk_acciones_reportes1_idx` (`idreporte`),
        KEY `fk_acciones_usuarios1_idx` (`usuario`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci AUTO_INCREMENT=4"
];

foreach ($tablas as $sql) {
    $pdo->exec($sql);
}

// 2. Insertar datos en programa
$pdo->exec("INSERT IGNORE INTO `programa` (`idprograma`, `nombreprograma`) VALUES
    (1, 'Tecnología en Análisis y Desarrollo de Software'),
    (2, 'Gestión Empresarial'),
    (3, 'Contabilidad y Finanzas')");

// 3. Insertar datos en ficha
$pdo->exec("INSERT IGNORE INTO `ficha` (`nficha`, `idprograma`) VALUES
    (123456, 1),
    (234567, 2),
    (345678, 3)");

// 4. Insertar datos en motivo
$pdo->exec("INSERT IGNORE INTO `motivo` (`idmotivo`, `descripcion`) VALUES
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
    (13, 'Cambio de ciudad o país')");


// 6. Insertar datos en aprendiz
$pdo->exec("INSERT IGNORE INTO `aprendiz` (`idaprendiz`, `tipodoc`, `nombres`, `apellidos`, `celular`, `email`, `direccion`, `nficha`) VALUES
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
('1030', 'TI', 'Paula', 'Morales', '3001000030', 'paula.morales@mail.com', 'Calle 3 #3-10', 345678)
");

// 7. Agregar claves foráneas (después de insertar datos para evitar errores)
$restricciones = [
    "ALTER TABLE `ficha` ADD CONSTRAINT `fk_ficha_programa` FOREIGN KEY (`idprograma`) REFERENCES `programa` (`idprograma`) ON DELETE NO ACTION ON UPDATE NO ACTION",
    "ALTER TABLE `aprendiz` ADD CONSTRAINT `fk_aprendiz_ficha` FOREIGN KEY (`nficha`) REFERENCES `ficha` (`nficha`) ON DELETE NO ACTION ON UPDATE NO ACTION",
    "ALTER TABLE `reportes` ADD CONSTRAINT `fk_reportes_aprendiz1` FOREIGN KEY (`idaprendiz`) REFERENCES `aprendiz` (`idaprendiz`) ON DELETE NO ACTION ON UPDATE NO ACTION",
    "ALTER TABLE `reportes` ADD CONSTRAINT `fk_reportes_ficha1` FOREIGN KEY (`nficha`) REFERENCES `ficha` (`nficha`) ON DELETE NO ACTION ON UPDATE NO ACTION",
    "ALTER TABLE `reportes` ADD CONSTRAINT `fk_reportes_motivo1` FOREIGN KEY (`idmotivo`) REFERENCES `motivo` (`idmotivo`) ON DELETE NO ACTION ON UPDATE NO ACTION",
    "ALTER TABLE `acciones` ADD CONSTRAINT `fk_acciones_reportes1` FOREIGN KEY (`idreporte`) REFERENCES `reportes` (`idreporte`) ON DELETE NO ACTION ON UPDATE NO ACTION",
    "ALTER TABLE `acciones` ADD CONSTRAINT `fk_acciones_usuarios1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION"
];

foreach ($restricciones as $sql) {
    try {
        $pdo->exec($sql);
    } catch (PDOException $e) {
        // Ignorar error si ya existe la restricción
    }
}

echo "Base de datos importada correctamente por partes.";
?>
