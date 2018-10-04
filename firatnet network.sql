-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema firatnet_network
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema firatnet_network
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `firatnet_network` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
USE `firatnet_network` ;

-- -----------------------------------------------------
-- Table `firatnet_network`.`lines`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `firatnet_network`.`line` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `firatnet_network`.`districts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `firatnet_network`.`district` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `firatnet_network`.`broadcaster`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `firatnet_network`.`broadcaster` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `district_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_broadcaster_district1_idx` (`district_id` ASC) VISIBLE,
  CONSTRAINT `fk_broadcaster_district1`
    FOREIGN KEY (`district_id`)
    REFERENCES `firatnet_network`.`district` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `firatnet_network`.`Subscriber`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `firatnet_network`.`Subscriber` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `line_id` INT NOT NULL,
  `broadcaster_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Subscriber_line_idx` (`line_id` ASC) VISIBLE,
  INDEX `fk_Subscriber_broadcaster1_idx` (`broadcaster_id` ASC) VISIBLE,
  CONSTRAINT `fk_Subscriber_line`
    FOREIGN KEY (`line_id`)
    REFERENCES `firatnet_network`.`line` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Subscriber_broadcaster1`
    FOREIGN KEY (`broadcaster_id`)
    REFERENCES `firatnet_network`.`broadcaster` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
