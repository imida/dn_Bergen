-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema bergendb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bergendb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bergendb` DEFAULT CHARACTER SET utf8 ;
USE `bergendb` ;

-- -----------------------------------------------------
-- Table `bergendb`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bergendb`.`User` (
  `idUser` INT NOT NULL AUTO_INCREMENT,
  `Firstname` VARCHAR(45) NOT NULL,
  `Lastname` VARCHAR(45) NOT NULL,
  `Email` VARCHAR(45) NOT NULL,
  `Password` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE INDEX `Email_UNIQUE` (`Email` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bergendb`.`Activitytype`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bergendb`.`Activitytype` (
  `idActivitytype` VARCHAR(45) NOT NULL,
  `Menutext` VARCHAR(45) NULL,
  `Tittletext` VARCHAR(45) NULL,
  PRIMARY KEY (`idActivitytype`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bergendb`.`Activity`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bergendb`.`Activity` (
  `idActivity` INT NOT NULL,
  `Text` LONGTEXT NULL,
  `Header` VARCHAR(45) NULL,
  `Picture` VARCHAR(100) NULL,
  `Latitude` DECIMAL(9,5) NULL,
  `Longitude` DECIMAL(9,5) NULL,
  `Activitytype_idActivitytype` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idActivity`, `Activitytype_idActivitytype`),
  INDEX `fk_Activity_Activitytype1_idx` (`Activitytype_idActivitytype` ASC) ,
  CONSTRAINT `fk_Activity_Activitytype1`
    FOREIGN KEY (`Activitytype_idActivitytype`)
    REFERENCES `bergendb`.`Activitytype` (`idActivitytype`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bergendb`.`Userplan`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bergendb`.`Userplan` (
  `idUserplan` INT NOT NULL AUTO_INCREMENT,
  `ActivityDate` DATE NULL,
  `Activity_idActivity` INT NOT NULL,
  `User_idUser` INT NOT NULL,
  PRIMARY KEY (`idUserplan`, `Activity_idActivity`, `User_idUser`),
  INDEX `fk_Userplan_Activity1_idx` (`Activity_idActivity` ASC) ,
  INDEX `fk_Userplan_User1_idx` (`User_idUser` ASC) ,
  CONSTRAINT `fk_Userplan_Activity1`
    FOREIGN KEY (`Activity_idActivity`)
    REFERENCES `bergendb`.`Activity` (`idActivity`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Userplan_User1`
    FOREIGN KEY (`User_idUser`)
    REFERENCES `bergendb`.`User` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
