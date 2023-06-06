-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema db_pizzaria
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema db_pizzaria
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_pizzaria` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `db_pizzaria` ;

-- -----------------------------------------------------
-- Table `db_pizzaria`.`funcionario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_pizzaria`.`funcionario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `administrador` TINYINT(1) NULL DEFAULT '0',
  `nome` VARCHAR(255) NOT NULL,
  `email` VARCHAR(70) NULL DEFAULT NULL,
  `senha` VARCHAR(50) NOT NULL,
  `data_cadastro` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `db_pizzaria`.`produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_pizzaria`.`produto` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `estoque` INT NOT NULL,
  `preco` DOUBLE NOT NULL,
  `observacoes` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `db_pizzaria`.`venda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_pizzaria`.`venda` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `data_venda` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `delivery` TINYINT(1) NULL DEFAULT '0',
  `valor_total` DOUBLE NULL DEFAULT NULL,
  `id_funcionario` INT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `id_funcionario` (`id_funcionario` ASC) VISIBLE,
  CONSTRAINT `venda_ibfk_1`
    FOREIGN KEY (`id_funcionario`)
    REFERENCES `db_pizzaria`.`funcionario` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `db_pizzaria`.`venda_produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_pizzaria`.`venda_produto_assoc` (
  `id_produto` INT NULL DEFAULT NULL,
  `id_venda` INT NULL DEFAULT NULL,
  `quantidade_produto` INT NULL DEFAULT NULL,
  `valor_item_venda` DOUBLE NULL DEFAULT NULL,
  INDEX `id_produto` (`id_produto` ASC) VISIBLE,
  INDEX `id_venda` (`id_venda` ASC) VISIBLE,
  CONSTRAINT `venda_produto_ibfk_1`
    FOREIGN KEY (`id_produto`)
    REFERENCES `db_pizzaria`.`produto` (`id`),
  CONSTRAINT `venda_produto_ibfk_2`
    FOREIGN KEY (`id_venda`)
    REFERENCES `db_pizzaria`.`venda` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
