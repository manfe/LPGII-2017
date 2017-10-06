-- -----------------------------------------------------
-- Schema login
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `login` ;

-- -----------------------------------------------------
-- Schema login
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `login` DEFAULT CHARACTER SET latin1 ;
USE `login` ;

-- -----------------------------------------------------
-- Table `login`.`accounts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `login`.`accounts` (
  `idaccount` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(250) NULL DEFAULT NULL,
  `password` VARCHAR(250) NULL DEFAULT NULL,
  `cidade` VARCHAR(250) NULL DEFAULT NULL,
  PRIMARY KEY (`idaccount`))
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `login`.`categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `login`.`categories` (
  `id_category` INT(11) NOT NULL AUTO_INCREMENT,
  `nome_category` VARCHAR(250) NULL DEFAULT NULL,
  PRIMARY KEY (`id_category`))
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `login`.`products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `login`.`products` (
  `id_product` INT(11) NOT NULL AUTO_INCREMENT,
  `nome_product` VARCHAR(250) NULL DEFAULT NULL,
  `valor_product` DECIMAL(10,2) NULL DEFAULT NULL,
  `id_category` INT(11) NOT NULL,
  PRIMARY KEY (`id_product`),
  INDEX `fk_products_category_idx` (`id_category` ASC),
  CONSTRAINT `fk_products_cat`
    FOREIGN KEY (`id_category`)
    REFERENCES `login`.`categories` (`id_category`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = latin1;