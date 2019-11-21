-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema ewarren1DBCSCI481
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema ewarren1DBCSCI481
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ewarren1DBCSCI481` DEFAULT CHARACTER SET utf8 ;
USE `ewarren1DBCSCI481` ;

-- -----------------------------------------------------
-- Table `ewarren1DBCSCI481`.`Product`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ewarren1DBCSCI481`.`Product` ;

CREATE TABLE IF NOT EXISTS `ewarren1DBCSCI481`.`Product` (
  `product_name` VARCHAR(25) NOT NULL,
  `product_price` DOUBLE NOT NULL,
  `quanity_in_stock` INT NOT NULL,
  `product_status` VARCHAR(45) NOT NULL,
  `product_description` VARCHAR(200) NOT NULL,
  `product_inventory_id` INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`product_inventory_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ewarren1DBCSCI481`.`Customer`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ewarren1DBCSCI481`.`Customer` ;

CREATE TABLE IF NOT EXISTS `ewarren1DBCSCI481`.`Customer` (
  `customer_first_name` VARCHAR(30) NOT NULL,
  `customer_middle_name` VARCHAR(30) NOT NULL,
  `customer_last_name` VARCHAR(45) NOT NULL,
  `customer_address` VARCHAR(100) NOT NULL,
  `customer_ZIP` VARCHAR(45) NOT NULL,
  `customer_State` VARCHAR(45) NOT NULL,
  `customer_phone_num` VARCHAR(13) NOT NULL,
  `customer_cell_phone` VARCHAR(13) NOT NULL,
  `customer_id` INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`customer_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ewarren1DBCSCI481`.`Payment_Type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ewarren1DBCSCI481`.`Payment_Type` ;

CREATE TABLE IF NOT EXISTS `ewarren1DBCSCI481`.`Payment_Type` (
  `idPayment_Type` INT NOT NULL AUTO_INCREMENT,
  `Payment_Description` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`idPayment_Type`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ewarren1DBCSCI481`.`Order`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ewarren1DBCSCI481`.`Order` ;

CREATE TABLE IF NOT EXISTS `ewarren1DBCSCI481`.`Order` (
  `order_ID` INT NOT NULL AUTO_INCREMENT,
  `order_Quantity` INT NOT NULL,
  `order_date` DATE NOT NULL,
  `order_status` VARCHAR(45) NOT NULL,
  `Customer_customer_id` INT NOT NULL,
  `Payment_Type_idPayment_Type` INT NOT NULL,
  `order_Total_Cost` DOUBLE NOT NULL,
  `Product_product_inventory_id` INT NOT NULL,
  PRIMARY KEY (`order_ID`, `order_date`, `Product_product_inventory_id`),
  INDEX `fk_Order_Customer1_idx` (`Customer_customer_id` ASC),
  INDEX `fk_Order_Payment_Type1_idx` (`Payment_Type_idPayment_Type` ASC),
  INDEX `fk_Order_Product1_idx` (`Product_product_inventory_id` ASC),
  CONSTRAINT `fk_Order_Customer1`
    FOREIGN KEY (`Customer_customer_id`)
    REFERENCES `ewarren1DBCSCI481`.`Customer` (`customer_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Order_Payment_Type1`
    FOREIGN KEY (`Payment_Type_idPayment_Type`)
    REFERENCES `ewarren1DBCSCI481`.`Payment_Type` (`idPayment_Type`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Order_Product1`
    FOREIGN KEY (`Product_product_inventory_id`)
    REFERENCES `ewarren1DBCSCI481`.`Product` (`product_inventory_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ewarren1DBCSCI481`.`Invoice`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ewarren1DBCSCI481`.`Invoice` ;

CREATE TABLE IF NOT EXISTS `ewarren1DBCSCI481`.`Invoice` (
  `invoiceNumID` INT NOT NULL AUTO_INCREMENT,
  `shipmentName` VARCHAR(45) NOT NULL,
  `Customer_customer_id` INT NOT NULL,
  `invoiceDate` DATE NOT NULL,
  `shipAddress` VARCHAR(45) NOT NULL,
  `shipCity` VARCHAR(45) NOT NULL,
  `shipRegion` VARCHAR(45) NOT NULL,
  `shipZIP` INT NOT NULL,
  `shipCountry` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`invoiceNumID`, `Customer_customer_id`),
  INDEX `fk_Invoice_Customer1_idx` (`Customer_customer_id` ASC),
  CONSTRAINT `fk_Invoice_Customer1`
    FOREIGN KEY (`Customer_customer_id`)
    REFERENCES `ewarren1DBCSCI481`.`Customer` (`customer_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ewarren1DBCSCI481`.`Order Details`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ewarren1DBCSCI481`.`Order Details` ;

CREATE TABLE IF NOT EXISTS `ewarren1DBCSCI481`.`Order Details` (
  `Product_product_inventory_id` INT NOT NULL,
  `unit price` DOUBLE NOT NULL,
  `quantity_in_stock` INT NOT NULL,
  `discount_pecentage` DOUBLE NOT NULL,
  `Order_order_ID` INT NOT NULL,
  INDEX `fk_Order Details_Product1_idx` (`Product_product_inventory_id` ASC),
  INDEX `fk_Order Details_Order1_idx` (`Order_order_ID` ASC),
  CONSTRAINT `fk_Order Details_Product1`
    FOREIGN KEY (`Product_product_inventory_id`)
    REFERENCES `ewarren1DBCSCI481`.`Product` (`product_inventory_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Order Details_Order1`
    FOREIGN KEY (`Order_order_ID`)
    REFERENCES `ewarren1DBCSCI481`.`Order` (`order_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ewarren1DBCSCI481`.`Invoice_has_Order`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ewarren1DBCSCI481`.`Invoice_has_Order` ;

CREATE TABLE IF NOT EXISTS `ewarren1DBCSCI481`.`Invoice_has_Order` (
  `Invoice_invoiceNumID` INT NOT NULL,
  `Invoice_Customer_customer_id` INT NOT NULL,
  `Order_order_ID` INT NOT NULL,
  `Order_order_date` DATE NOT NULL,
  PRIMARY KEY (`Invoice_invoiceNumID`, `Invoice_Customer_customer_id`, `Order_order_ID`, `Order_order_date`),
  INDEX `fk_Invoice_has_Order_Order1_idx` (`Order_order_ID` ASC, `Order_order_date` ASC),
  INDEX `fk_Invoice_has_Order_Invoice1_idx` (`Invoice_invoiceNumID` ASC, `Invoice_Customer_customer_id` ASC),
  CONSTRAINT `fk_Invoice_has_Order_Invoice1`
    FOREIGN KEY (`Invoice_invoiceNumID` , `Invoice_Customer_customer_id`)
    REFERENCES `ewarren1DBCSCI481`.`Invoice` (`invoiceNumID` , `Customer_customer_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Invoice_has_Order_Order1`
    FOREIGN KEY (`Order_order_ID` , `Order_order_date`)
    REFERENCES `ewarren1DBCSCI481`.`Order` (`order_ID` , `order_date`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
