-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema eventos
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema eventos
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `eventos` DEFAULT CHARACTER SET utf8 ;
USE `eventos` ;

-- -----------------------------------------------------
-- Table `eventos`.`USUARIO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eventos`.`USUARIO` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `USER` VARCHAR(45) NOT NULL,
  `PASSWORD` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `USER_UNIQUE` (`USER` ASC),
  UNIQUE INDEX `ID_UNIQUE` (`ID` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eventos`.`CATEGORIA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eventos`.`CATEGORIA` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `NOME` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `NOME_UNIQUE` (`NOME` ASC),
  UNIQUE INDEX `ID_UNIQUE` (`ID` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eventos`.`ATRACAO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eventos`.`ATRACAO` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `NOME` VARCHAR(45) NOT NULL,
  `LOCAL` VARCHAR(100) NOT NULL,
  `HORARIO` VARCHAR(45) NOT NULL,
  `DESCRICAO` MEDIUMTEXT NOT NULL,
  `ID_CAT` INT NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `ID_UNIQUE` (`ID` ASC),
  UNIQUE INDEX `NOME_UNIQUE` (`NOME` ASC),
  INDEX `fk_ATRACAO_CATEGORIA_idx` (`ID_CAT` ASC),
  CONSTRAINT `fk_ATRACAO_CATEGORIA`
    FOREIGN KEY (`ID_CAT`)
    REFERENCES `eventos`.`CATEGORIA` (`ID`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
