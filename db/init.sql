
CREATE SCHEMA IF NOT EXISTS `desercion` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
USE `desercion`;


CREATE TABLE IF NOT EXISTS `programa` (
  `idprograma` INT NOT NULL AUTO_INCREMENT,
  `nombreprograma` VARCHAR(100) NULL,
  PRIMARY KEY (`idprograma`)
) ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `ficha` (
  `nficha` INT NOT NULL,
  `idprograma` INT NOT NULL,
  PRIMARY KEY (`nficha`),
  INDEX `fk_ficha_programa_idx` (`idprograma` ASC),
  CONSTRAINT `fk_ficha_programa`
    FOREIGN KEY (`idprograma`)
    REFERENCES `programa` (`idprograma`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `aprendiz` (
  `idaprendiz` VARCHAR(20) NOT NULL,
  `tipodoc` VARCHAR(4) NULL,
  `nombres` VARCHAR(50) NULL,
  `apellidos` VARCHAR(50) NULL,
  `celular` VARCHAR(20) NULL,
  `email` VARCHAR(100) NULL,
  `direccion` VARCHAR(100) NULL,
  PRIMARY KEY (`idaprendiz`)
) ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `motivo` (
  `idmotivo` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(40) NULL,
  PRIMARY KEY (`idmotivo`)
) ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `reportes` (
  `idreporte` INT NOT NULL AUTO_INCREMENT,
  `fecha` DATE NULL,
  `fallas` INT NULL,
  `observaciones` VARCHAR(255) NULL,
  `idaprendiz` VARCHAR(20) NOT NULL,
  `nficha` INT NOT NULL,
  `idmotivo` INT NOT NULL,
  `estado` VARCHAR(20) NULL COMMENT 'En revisión, Reingreso, Deserción',
  PRIMARY KEY (`idreporte`),
  INDEX `fk_reportes_aprendiz1_idx` (`idaprendiz` ASC),
  INDEX `fk_reportes_ficha1_idx` (`nficha` ASC),
  INDEX `fk_reportes_motivo1_idx` (`idmotivo` ASC),
  CONSTRAINT `fk_reportes_aprendiz1`
    FOREIGN KEY (`idaprendiz`)
    REFERENCES `aprendiz` (`idaprendiz`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reportes_ficha1`
    FOREIGN KEY (`nficha`)
    REFERENCES `ficha` (`nficha`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reportes_motivo1`
    FOREIGN KEY (`idmotivo`)
    REFERENCES `motivo` (`idmotivo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuario` VARCHAR(30) NOT NULL,
  `nombre` VARCHAR(50) NULL,
  `password` VARCHAR(255) NULL,
  `email` VARCHAR(100) NULL,
  PRIMARY KEY (`usuario`)
) ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `acciones` (
  `idaccion` INT NOT NULL AUTO_INCREMENT,
  `idreporte` INT NOT NULL,
  `fecha` DATE NULL,
  `descripcion` VARCHAR(100) NULL,
  `usuario` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`idaccion`),
  INDEX `fk_acciones_reportes1_idx` (`idreporte` ASC),
  INDEX `fk_acciones_usuarios1_idx` (`usuario` ASC),
  CONSTRAINT `fk_acciones_reportes1`
    FOREIGN KEY (`idreporte`)
    REFERENCES `reportes` (`idreporte`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_acciones_usuarios1`
    FOREIGN KEY (`usuario`)
    REFERENCES `usuarios` (`usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;
