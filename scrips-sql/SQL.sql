-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema libreria_la_fuente
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema libreria_la_fuente
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `libreria_la_fuente` DEFAULT CHARACTER SET utf8 ;
USE `libreria_la_fuente` ;

-- -----------------------------------------------------
-- Table `libreria_la_fuente`.`persona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `libreria_la_fuente`.`persona` (
  `cc_persona` INT NOT NULL,
  `nombre` VARCHAR(50) NOT NULL,
  `apellido` VARCHAR(50) NOT NULL,
  `teléfono` VARCHAR(20) NOT NULL,
  `e-mail` VARCHAR(150) NOT NULL,
  `g_sanguíneo` VARCHAR(3) NULL,
  PRIMARY KEY (`cc_persona`),
  UNIQUE INDEX `e-mail_UNIQUE` (`e-mail` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `libreria_la_fuente`.`dirección`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `libreria_la_fuente`.`dirección` (
  `id_dir` INT NOT NULL AUTO_INCREMENT,
  `cc_persona` INT NOT NULL,
  `país` VARCHAR(100) NOT NULL,
  `departamento` VARCHAR(45) NULL,
  `ciudad` VARCHAR(100) NOT NULL,
  `barrio` VARCHAR(50) NOT NULL,
  `nombre_vía` VARCHAR(45) NOT NULL,
  `numero_residencia` VARCHAR(10) NOT NULL,
  `codigo_postal` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`id_dir`),
  INDEX `cc_persona_idx` (`cc_persona` ASC) ,
  CONSTRAINT `cc_persona`
    FOREIGN KEY (`cc_persona`)
    REFERENCES `libreria_la_fuente`.`persona` (`cc_persona`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `libreria_la_fuente`.`proveedor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `libreria_la_fuente`.`proveedor` (
  `id_proveedor` INT NOT NULL AUTO_INCREMENT,
  `cc_persona` INT NOT NULL,
  `nombre_empresa` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_proveedor`),
  INDEX `cc_persona_idx` (`cc_persona` ASC) ,
  CONSTRAINT `fk_cc_persona_prov`
    FOREIGN KEY (`cc_persona`)
    REFERENCES `libreria_la_fuente`.`persona` (`cc_persona`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `libreria_la_fuente`.`producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `libreria_la_fuente`.`producto` (
  `id_producto` INT NOT NULL AUTO_INCREMENT,
  `categoria_producto` VARCHAR(45) NOT NULL,
  `fecha_ingreso` DATETIME NOT NULL,
  `precio_fabrica` DECIMAL NOT NULL,
  `stock` INT NULL,
  `id_proveedor` INT NOT NULL,
  PRIMARY KEY (`id_producto`, `id_proveedor`),
  INDEX `id_proveedor_idx` (`id_proveedor` ASC) ,
  CONSTRAINT `fk_id_proveedor_producto`
    FOREIGN KEY (`id_proveedor`)
    REFERENCES `libreria_la_fuente`.`proveedor` (`id_proveedor`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `libreria_la_fuente`.`libro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `libreria_la_fuente`.`libro` (
  `ISBN` INT NOT NULL,
  `id_producto` INT NOT NULL,
  `título` VARCHAR(100) NOT NULL,
  `autor` VARCHAR(100) NOT NULL,
  `categoria_libro` VARCHAR(45) NOT NULL,
  `precio_venta` DECIMAL(5,2) NOT NULL,
  PRIMARY KEY (`ISBN`, `id_producto`),
  INDEX `id_producto_idx` (`id_producto` ASC) ,
  CONSTRAINT `fk_id_producto_libro`
    FOREIGN KEY (`id_producto`)
    REFERENCES `libreria_la_fuente`.`producto` (`id_producto`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `libreria_la_fuente`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `libreria_la_fuente`.`cliente` (
  `id_cliente` INT NOT NULL AUTO_INCREMENT,
  `cc_persona` INT NOT NULL,
  PRIMARY KEY (`id_cliente`),
  INDEX `cc_persona_idx` (`cc_persona` ASC) ,
  CONSTRAINT `fk_cc_persona_client`
    FOREIGN KEY (`cc_persona`)
    REFERENCES `libreria_la_fuente`.`persona` (`cc_persona`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `libreria_la_fuente`.`empleado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `libreria_la_fuente`.`empleado` (
  `id_empleado` INT NOT NULL AUTO_INCREMENT,
  `cc_persona` INT NOT NULL,
  `cargo` VARCHAR(45) NOT NULL,
  `salario` DECIMAL(45) NOT NULL,
  PRIMARY KEY (`id_empleado`),
  INDEX `cc_persona_idx` (`cc_persona` ASC) ,
  CONSTRAINT `fk_cc_persona_empl`
    FOREIGN KEY (`cc_persona`)
    REFERENCES `libreria_la_fuente`.`persona` (`cc_persona`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `libreria_la_fuente`.`ventas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `libreria_la_fuente`.`ventas` (
  `id_ventas` INT NOT NULL AUTO_INCREMENT,
  `id_cliente` INT NOT NULL,
  `id_empleado` INT NOT NULL,
  `fecha_venta` DATE NOT NULL,
  `Cantidad` INT NOT NULL,
  `precio_total_venta` DECIMAL(5,2) NOT NULL,
  PRIMARY KEY (`id_ventas`),
  INDEX `fk_ventas_cliente1_idx` (`id_cliente` ASC) ,
  INDEX `id_empleado_idx` (`id_empleado` ASC) ,
  CONSTRAINT `fk_id_ventas`
    FOREIGN KEY (`id_cliente`)
    REFERENCES `libreria_la_fuente`.`cliente` (`id_cliente`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_id_empleado`
    FOREIGN KEY (`id_empleado`)
    REFERENCES `libreria_la_fuente`.`empleado` (`id_empleado`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `libreria_la_fuente`.`ventas_con_producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `libreria_la_fuente`.`ventas_con_producto` (
  `id_ventas` INT NOT NULL,
  `id_producto` INT NOT NULL,
  INDEX `fk_ventas_has_producto_producto1_idx` (`id_producto` ASC) ,
  INDEX `fk_ventas_has_producto_ventas1_idx` (`id_ventas` ASC) ,
  CONSTRAINT `fk_ventas_has_producto_ventas1`
    FOREIGN KEY (`id_ventas`)
    REFERENCES `libreria_la_fuente`.`ventas` (`id_ventas`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_ventas_has_producto_producto1`
    FOREIGN KEY (`id_producto`)
    REFERENCES `libreria_la_fuente`.`producto` (`id_producto`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `libreria_la_fuente`.`jornada`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `libreria_la_fuente`.`jornada` (
  `id_jornada` INT NOT NULL AUTO_INCREMENT,
  `id_empleado` INT NOT NULL,
  `fecha_jornada` DATE NOT NULL,
  `h_incio` TIME NOT NULL,
  `h_fin` TIME NOT NULL,
  `horas_acumuladas` DECIMAL(5,2) NOT NULL,
  `dias_mes_acumuladas` INT NOT NULL,
  `descansos_pendientes` INT NOT NULL,
  `novedades` TINYINT NOT NULL,
  PRIMARY KEY (`id_jornada`),
  INDEX `id_empleado_idx` (`id_empleado` ASC) ,
  CONSTRAINT `fk_id_empleado_jornada`
    FOREIGN KEY (`id_empleado`)
    REFERENCES `libreria_la_fuente`.`empleado` (`id_empleado`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `libreria_la_fuente`.`administrador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `libreria_la_fuente`.`administrador` (
  `id_admi` INT NOT NULL AUTO_INCREMENT,
  `id_empleado` INT NOT NULL,
  PRIMARY KEY (`id_admi`, `id_empleado`),
  INDEX `fk_administrador_empleado1_idx` (`id_empleado` ASC) ,
  CONSTRAINT `fk_id_empleado_admin`
    FOREIGN KEY (`id_empleado`)
    REFERENCES `libreria_la_fuente`.`empleado` (`id_empleado`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `libreria_la_fuente`.`Caja`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `libreria_la_fuente`.`Caja` (
  `id_caja` INT NOT NULL AUTO_INCREMENT,
  `id_empleado` INT NOT NULL,
  PRIMARY KEY (`id_caja`),
  INDEX `id_empleado_idx` (`id_empleado` ASC) ,
  CONSTRAINT `fk_id_empleado_caja`
    FOREIGN KEY (`id_empleado`)
    REFERENCES `libreria_la_fuente`.`empleado` (`id_empleado`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `libreria_la_fuente`.`Almacen`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `libreria_la_fuente`.`Almacen` (
  `id_almacen` INT NOT NULL AUTO_INCREMENT,
  `id_empleado` INT NOT NULL,
  PRIMARY KEY (`id_almacen`),
  INDEX `fk_Almacen_empleado1_idx` (`id_empleado` ASC) ,
  CONSTRAINT `fk_id_empleado_almacen`
    FOREIGN KEY (`id_empleado`)
    REFERENCES `libreria_la_fuente`.`empleado` (`id_empleado`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `libreria_la_fuente`.`ausencias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `libreria_la_fuente`.`ausencias` (
  `id_ausencias` INT NOT NULL AUTO_INCREMENT,
  `id_jornada` INT NOT NULL,
  `descripcion` TEXT NOT NULL,
  `adjunto` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_ausencias`, `id_jornada`),
  INDEX `fk_ausencia_idx` (`id_jornada` ASC) ,
  CONSTRAINT `fk_ausencia`
    FOREIGN KEY (`id_jornada`)
    REFERENCES `libreria_la_fuente`.`jornada` (`id_jornada`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `libreria_la_fuente`.`Sesiones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `libreria_la_fuente`.`Sesiones` (
  `id_sesiones` INT NOT NULL AUTO_INCREMENT,
  `rol` VARCHAR(45) NOT NULL,
  `usuario` VARCHAR(20) NOT NULL,
  `contraseña` VARCHAR(45) NOT NULL,
  `cc_persona` INT NOT NULL,
  PRIMARY KEY (`id_sesiones`),
  UNIQUE INDEX `usuario_UNIQUE` (`usuario` ASC) ,
  INDEX `fk_sesiones_idx` (`cc_persona` ASC) ,
  CONSTRAINT `fk_sesiones`
    FOREIGN KEY (`cc_persona`)
    REFERENCES `libreria_la_fuente`.`persona` (`cc_persona`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
