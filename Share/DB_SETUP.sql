-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema VTS
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema VTS
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `VTS` DEFAULT CHARACTER SET utf8 ;
USE `VTS` ;

-- -----------------------------------------------------
-- Table `VTS`.`Kategorie`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `VTS`.`Kategorie` ;

CREATE TABLE IF NOT EXISTS `VTS`.`Kategorie` (
  `Kategorie_ID` INT NOT NULL AUTO_INCREMENT,
  `Bezeichnung` VARCHAR(45) NULL,
  PRIMARY KEY (`Kategorie_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `VTS`.`Hersteller`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `VTS`.`Hersteller` ;

CREATE TABLE IF NOT EXISTS `VTS`.`Hersteller` (
  `Hersteller_ID` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NULL,
  PRIMARY KEY (`Hersteller_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `VTS`.`Artikel`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `VTS`.`Artikel` ;

CREATE TABLE IF NOT EXISTS `VTS`.`Artikel` (
  `Artikel_ID` INT NOT NULL AUTO_INCREMENT,
  `Artikelname` VARCHAR(45) NOT NULL,
  `Kategorie_ID` INT NOT NULL,
  `Hersteller_ID` INT NULL,
  `Beschreibung` VARCHAR(255) NULL,
  PRIMARY KEY (`Artikel_ID`),
  CONSTRAINT `fk_Artikel_Kategorie1`
    FOREIGN KEY (`Kategorie_ID`)
    REFERENCES `VTS`.`Kategorie` (`Kategorie_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Artikel_Hersteller1`
    FOREIGN KEY (`Hersteller_ID`)
    REFERENCES `VTS`.`Hersteller` (`Hersteller_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Artikel_Kategorie1_idx` ON `VTS`.`Artikel` (`Kategorie_ID` ASC) ;

CREATE INDEX `fk_Artikel_Hersteller1_idx` ON `VTS`.`Artikel` (`Hersteller_ID` ASC) ;


-- -----------------------------------------------------
-- Table `VTS`.`Adresse`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `VTS`.`Adresse` ;

CREATE TABLE IF NOT EXISTS `VTS`.`Adresse` (
  `Adresse_ID` INT NOT NULL AUTO_INCREMENT,
  `Straße` VARCHAR(45) NULL,
  `Hausnummer` VARCHAR(45) NULL,
  `PLZ` INT NULL,
  `Stadt` VARCHAR(45) NULL,
  `Stadtteil` VARCHAR(45) NULL,
  `Bundesland` VARCHAR(45) NULL,
  `Land` VARCHAR(45) NULL,
  PRIMARY KEY (`Adresse_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `VTS`.`Kundentyp`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `VTS`.`Kundentyp` ;

CREATE TABLE IF NOT EXISTS `VTS`.`Kundentyp` (
  `Kundentyp_ID` INT NOT NULL AUTO_INCREMENT,
  `Bezeichung` VARCHAR(45) NULL,
  PRIMARY KEY (`Kundentyp_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `VTS`.`Kunde`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `VTS`.`Kunde` ;

CREATE TABLE IF NOT EXISTS `VTS`.`Kunde` (
  `Kunde_ID` INT NOT NULL AUTO_INCREMENT,
  `LoginName` VARCHAR(45) NOT NULL,
  `Name` VARCHAR(45) NOT NULL,
  `Vorname` VARCHAR(45) NOT NULL,
  `Telefon` VARCHAR(45) NOT NULL,
  `Email` VARCHAR(45) NOT NULL,
  `Passwort` VARCHAR(255) NOT NULL,
  `Adresse_ID` INT NOT NULL,
  `Kundentyp_ID` INT NOT NULL,
  PRIMARY KEY (`Kunde_ID`),
  CONSTRAINT `Adresse_ID`
    FOREIGN KEY (`Adresse_ID`)
    REFERENCES `VTS`.`Adresse` (`Adresse_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Kunde_Kundentyp1`
    FOREIGN KEY (`Kundentyp_ID`)
    REFERENCES `VTS`.`Kundentyp` (`Kundentyp_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `Adresse_ID_idx` ON `VTS`.`Kunde` (`Adresse_ID` ASC) ;

CREATE INDEX `fk_Kunde_Kundentyp1_idx` ON `VTS`.`Kunde` (`Kundentyp_ID` ASC) ;

CREATE UNIQUE INDEX `Email_UNIQUE` ON `VTS`.`Kunde` (`Email` ASC) ;

CREATE UNIQUE INDEX `LoginName_UNIQUE` ON `VTS`.`Kunde` (`LoginName` ASC) ;


-- -----------------------------------------------------
-- Table `VTS`.`Bezahlmethode`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `VTS`.`Bezahlmethode` ;

CREATE TABLE IF NOT EXISTS `VTS`.`Bezahlmethode` (
  `Bezahlmethode_ID` INT NOT NULL AUTO_INCREMENT,
  `Bezeichnung` VARCHAR(45) NULL,
  PRIMARY KEY (`Bezahlmethode_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `VTS`.`Bestellstatus`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `VTS`.`Bestellstatus` ;

CREATE TABLE IF NOT EXISTS `VTS`.`Bestellstatus` (
  `Bestellstatus_ID` INT NOT NULL AUTO_INCREMENT,
  `Bezeichnung` VARCHAR(45) NULL,
  PRIMARY KEY (`Bestellstatus_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `VTS`.`Bestellung`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `VTS`.`Bestellung` ;

CREATE TABLE IF NOT EXISTS `VTS`.`Bestellung` (
  `Bestellung_ID` INT NOT NULL AUTO_INCREMENT,
  `Bestelldatum` TIMESTAMP(6) NOT NULL,
  `Versanddatum` TIMESTAMP(6) NULL,
  `Lieferkosten` DOUBLE NOT NULL,
  `Kunde_ID` INT NOT NULL,
  `Bezahlmethode_ID` INT NOT NULL,
  `Rechnungsadresse_ID` INT NOT NULL,
  `Lieferdresse_ID` INT NOT NULL,
  `Bestellstatus_ID` INT NOT NULL,
  PRIMARY KEY (`Bestellung_ID`),
  CONSTRAINT `Kunde_ID`
    FOREIGN KEY (`Kunde_ID`)
    REFERENCES `VTS`.`Kunde` (`Kunde_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `Lieferadresse_ID`
    FOREIGN KEY (`Lieferdresse_ID`)
    REFERENCES `VTS`.`Adresse` (`Adresse_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Bestellung_Bezahlmethode1`
    FOREIGN KEY (`Bezahlmethode_ID`)
    REFERENCES `VTS`.`Bezahlmethode` (`Bezahlmethode_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Bestellung_Adresse1`
    FOREIGN KEY (`Rechnungsadresse_ID`)
    REFERENCES `VTS`.`Adresse` (`Adresse_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Bestellung_Bestellstatus1`
    FOREIGN KEY (`Bestellstatus_ID`)
    REFERENCES `VTS`.`Bestellstatus` (`Bestellstatus_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `Kunde_ID_idx` ON `VTS`.`Bestellung` (`Kunde_ID` ASC) ;

CREATE INDEX `Lieferadresse_ID_idx` ON `VTS`.`Bestellung` (`Lieferdresse_ID` ASC) ;

CREATE INDEX `fk_Bestellung_Bezahlmethode1_idx` ON `VTS`.`Bestellung` (`Bezahlmethode_ID` ASC) ;

CREATE INDEX `fk_Bestellung_Adresse1_idx` ON `VTS`.`Bestellung` (`Rechnungsadresse_ID` ASC) ;

CREATE INDEX `fk_Bestellung_Bestellstatus1_idx` ON `VTS`.`Bestellung` (`Bestellstatus_ID` ASC) ;


-- -----------------------------------------------------
-- Table `VTS`.`Packung`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `VTS`.`Packung` ;

CREATE TABLE IF NOT EXISTS `VTS`.`Packung` (
  `Packung_ID` INT NOT NULL AUTO_INCREMENT,
  `Packungsgroessee` INT NULL,
  `Verkaufspreis` DOUBLE NULL,
  `Mindestbestand` INT NULL,
  `Lagermenge` INT NULL,
  `Artikel_ID` INT NOT NULL,
  PRIMARY KEY (`Packung_ID`),
  CONSTRAINT `fk_Packung_Artikel1`
    FOREIGN KEY (`Artikel_ID`)
    REFERENCES `VTS`.`Artikel` (`Artikel_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Packung_Artikel1_idx` ON `VTS`.`Packung` (`Artikel_ID` ASC) ;


-- -----------------------------------------------------
-- Table `VTS`.`Bestellungsposition`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `VTS`.`Bestellungsposition` ;

CREATE TABLE IF NOT EXISTS `VTS`.`Bestellungsposition` (
  `Bestellungsposition_ID` INT NOT NULL AUTO_INCREMENT,
  `Preis` DOUBLE NULL,
  `Anzahl` INT NULL,
  `Bestellpositionsnummer` VARCHAR(45) NULL,
  `Bestellung_ID` INT NOT NULL,
  `Packung_ID` INT NOT NULL,
  PRIMARY KEY (`Bestellungsposition_ID`),
  CONSTRAINT `fk_Bestellungsposition_Bestellung1`
    FOREIGN KEY (`Bestellung_ID`)
    REFERENCES `VTS`.`Bestellung` (`Bestellung_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Bestellungsposition_Packung1`
    FOREIGN KEY (`Packung_ID`)
    REFERENCES `VTS`.`Packung` (`Packung_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Bestellungsposition_Bestellung1_idx` ON `VTS`.`Bestellungsposition` (`Bestellung_ID` ASC) ;

CREATE INDEX `fk_Bestellungsposition_Packung1_idx` ON `VTS`.`Bestellungsposition` (`Packung_ID` ASC) ;


-- -----------------------------------------------------
-- Table `VTS`.`Bestellfaehigkeit`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `VTS`.`Bestellfaehigkeit` ;

CREATE TABLE IF NOT EXISTS `VTS`.`Bestellfaehigkeit` (
  `Bestellfaehigkeit_ID` INT NOT NULL AUTO_INCREMENT,
  `Kundentyp_ID` INT NOT NULL,
  `Kategorie_ID` INT NOT NULL,
  PRIMARY KEY (`Bestellfaehigkeit_ID`),
  CONSTRAINT `fk_Bestellfaehigkeit_Kundentyp1`
    FOREIGN KEY (`Kundentyp_ID`)
    REFERENCES `VTS`.`Kundentyp` (`Kundentyp_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Bestellfaehigkeit_Kategorie1`
    FOREIGN KEY (`Kategorie_ID`)
    REFERENCES `VTS`.`Kategorie` (`Kategorie_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Bestellfaehigkeit_Kundentyp1_idx` ON `VTS`.`Bestellfaehigkeit` (`Kundentyp_ID` ASC) ;

CREATE INDEX `fk_Bestellfaehigkeit_Kategorie1_idx` ON `VTS`.`Bestellfaehigkeit` (`Kategorie_ID` ASC) ;


-- -----------------------------------------------------
-- Table `VTS`.`Lieferant`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `VTS`.`Lieferant` ;

CREATE TABLE IF NOT EXISTS `VTS`.`Lieferant` (
  `Lieferant_ID` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NULL,
  `Adresse_ID` INT NOT NULL,
  PRIMARY KEY (`Lieferant_ID`),
  CONSTRAINT `fk_Lieferant_Adresse1`
    FOREIGN KEY (`Adresse_ID`)
    REFERENCES `VTS`.`Adresse` (`Adresse_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Lieferant_Adresse1_idx` ON `VTS`.`Lieferant` (`Adresse_ID` ASC) ;


-- -----------------------------------------------------
-- Table `VTS`.`Lieferfaehigkeit`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `VTS`.`Lieferfaehigkeit` ;

CREATE TABLE IF NOT EXISTS `VTS`.`Lieferfaehigkeit` (
  `Lieferfaehigkeit_ID` INT NOT NULL AUTO_INCREMENT,
  `Preis` DOUBLE NULL,
  `Versandkosten` DOUBLE NULL,
  `Lieferant_ID` INT NOT NULL,
  `Packung_ID` INT NOT NULL,
  PRIMARY KEY (`Lieferfaehigkeit_ID`),
  CONSTRAINT `fk_Lieferfaehigkeit_Lieferant1`
    FOREIGN KEY (`Lieferant_ID`)
    REFERENCES `VTS`.`Lieferant` (`Lieferant_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Lieferfaehigkeit_Packung1`
    FOREIGN KEY (`Packung_ID`)
    REFERENCES `VTS`.`Packung` (`Packung_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Lieferfaehigkeit_Lieferant1_idx` ON `VTS`.`Lieferfaehigkeit` (`Lieferant_ID` ASC) ;

CREATE INDEX `fk_Lieferfaehigkeit_Packung1_idx` ON `VTS`.`Lieferfaehigkeit` (`Packung_ID` ASC) ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `VTS`.`Kategorie`
-- -----------------------------------------------------
START TRANSACTION;
USE `VTS`;
INSERT INTO `VTS`.`Kategorie` (`Kategorie_ID`, `Bezeichnung`) VALUES (1, 'Test');
INSERT INTO `VTS`.`Kategorie` (`Kategorie_ID`, `Bezeichnung`) VALUES (2, 'Medizinischer Test');
INSERT INTO `VTS`.`Kategorie` (`Kategorie_ID`, `Bezeichnung`) VALUES (3, 'Training');

COMMIT;


-- -----------------------------------------------------
-- Data for table `VTS`.`Hersteller`
-- -----------------------------------------------------
START TRANSACTION;
USE `VTS`;
INSERT INTO `VTS`.`Hersteller` (`Hersteller_ID`, `Name`) VALUES (12, 'Hotgen');
INSERT INTO `VTS`.`Hersteller` (`Hersteller_ID`, `Name`) VALUES (1, 'Sensitivo');
INSERT INTO `VTS`.`Hersteller` (`Hersteller_ID`, `Name`) VALUES (2, 'MR Sanicom');
INSERT INTO `VTS`.`Hersteller` (`Hersteller_ID`, `Name`) VALUES (3, 'Anbio');
INSERT INTO `VTS`.`Hersteller` (`Hersteller_ID`, `Name`) VALUES (4, 'Deni');
INSERT INTO `VTS`.`Hersteller` (`Hersteller_ID`, `Name`) VALUES (5, 'Clungene');
INSERT INTO `VTS`.`Hersteller` (`Hersteller_ID`, `Name`) VALUES (6, 'NanoRepro');
INSERT INTO `VTS`.`Hersteller` (`Hersteller_ID`, `Name`) VALUES (7, 'MP Biomedicals');
INSERT INTO `VTS`.`Hersteller` (`Hersteller_ID`, `Name`) VALUES (8, 'LEPU');
INSERT INTO `VTS`.`Hersteller` (`Hersteller_ID`, `Name`) VALUES (9, 'Dia Sure');
INSERT INTO `VTS`.`Hersteller` (`Hersteller_ID`, `Name`) VALUES (10, 'LABNOVATION');
INSERT INTO `VTS`.`Hersteller` (`Hersteller_ID`, `Name`) VALUES (11, 'DIAGNOS');
INSERT INTO `VTS`.`Hersteller` (`Hersteller_ID`, `Name`) VALUES (DEFAULT, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `VTS`.`Artikel`
-- -----------------------------------------------------
START TRANSACTION;
USE `VTS`;
INSERT INTO `VTS`.`Artikel` (`Artikel_ID`, `Artikelname`, `Kategorie_ID`, `Hersteller_ID`, `Beschreibung`) VALUES (1, 'Corona Schnelltest Selbsttest', 1, 1, 'Gibt erste Anhaltspunkte darüber, ob aktuell eine Covid-19 Infektion vorliegen könnte');
INSERT INTO `VTS`.`Artikel` (`Artikel_ID`, `Artikelname`, `Kategorie_ID`, `Hersteller_ID`, `Beschreibung`) VALUES (2, 'Corona Schnelltest Selbsttest', 1, 12, 'Antigen-Schnelltest für die Eigenanwendung. Gibt erste Anhaltspunkte darüber, ob aktuell eine Covid-19 Infektion vorliegen könnte');
INSERT INTO `VTS`.`Artikel` (`Artikel_ID`, `Artikelname`, `Kategorie_ID`, `Hersteller_ID`, `Beschreibung`) VALUES (3, 'Corona Schnelltest Selbsttest', 1, 2, 'Liefert ein schnelles Ergebnis über das mögliche Vorliegen einer Infektion mit SARS-CoV-2');
INSERT INTO `VTS`.`Artikel` (`Artikel_ID`, `Artikelname`, `Kategorie_ID`, `Hersteller_ID`, `Beschreibung`) VALUES (4, 'Corona Schnelltest Selbsttest', 1, 3, 'Antigen-Schnelltest für die Eigenanwendung. Gibt erste Anhaltspunkte darüber, ob aktuell eine Infektion mit SARS-CoV-2 vorliegen könnte');
INSERT INTO `VTS`.`Artikel` (`Artikel_ID`, `Artikelname`, `Kategorie_ID`, `Hersteller_ID`, `Beschreibung`) VALUES (5, 'Corona Schnelltest Selbsttest', 1, 4, 'Gibt erste Anhaltspunkte darüber, ob aktuell eine Infektion mit SARS-CoV-2 vorliegen könnte');
INSERT INTO `VTS`.`Artikel` (`Artikel_ID`, `Artikelname`, `Kategorie_ID`, `Hersteller_ID`, `Beschreibung`) VALUES (6, 'Corona Schnelltest Selbsttest', 1, 5, 'Antigen-Schnelltest für die Eigenanwendung. Gibt erste Anhaltspunkte darüber, ob aktuell eine Infektion mit SARS-CoV-2 vorliegen könnte');
INSERT INTO `VTS`.`Artikel` (`Artikel_ID`, `Artikelname`, `Kategorie_ID`, `Hersteller_ID`, `Beschreibung`) VALUES (7, 'Corona Schnelltest Selbsttest', 1, 6, 'Liefert ein schnelles Ergebnis über das mögliche Vorliegen viraler SARS-CoV-2-Antigenen');
INSERT INTO `VTS`.`Artikel` (`Artikel_ID`, `Artikelname`, `Kategorie_ID`, `Hersteller_ID`, `Beschreibung`) VALUES (8, 'Corona Schnelltest Selbsttest', 1, 7, 'Antigen-Schnelltest für die Eigenanwendung. Gibt erste Anhaltspunkte darüber, ob aktuell eine Covid-19 Infektion vorliegen könnte');
INSERT INTO `VTS`.`Artikel` (`Artikel_ID`, `Artikelname`, `Kategorie_ID`, `Hersteller_ID`, `Beschreibung`) VALUES (9, 'Corona Schnelltest Selbsttest', 1, 8, 'liefert ein schnelles Ergebnis über das mögliche Vorliegen einer Infektion mit SARS-CoV-2.');
INSERT INTO `VTS`.`Artikel` (`Artikel_ID`, `Artikelname`, `Kategorie_ID`, `Hersteller_ID`, `Beschreibung`) VALUES (10, 'Schnelltest Schulung', 3, NULL, 'Kontraindikationen für die Durchführung der Schnelltests');
INSERT INTO `VTS`.`Artikel` (`Artikel_ID`, `Artikelname`, `Kategorie_ID`, `Hersteller_ID`, `Beschreibung`) VALUES (11, 'Corona Antigen Schnelltest', 2, 6, 'Einfache Anwendung - Vorderer Nasenabstrich');
INSERT INTO `VTS`.`Artikel` (`Artikel_ID`, `Artikelname`, `Kategorie_ID`, `Hersteller_ID`, `Beschreibung`) VALUES (12, 'Antigen Schnelltest VORDERER NASENABSTRICH', 2, 9, 'Schmerzfrei - Vorderer Nasenabstrich');
INSERT INTO `VTS`.`Artikel` (`Artikel_ID`, `Artikelname`, `Kategorie_ID`, `Hersteller_ID`, `Beschreibung`) VALUES (13, 'Antigen Schnelltest VORDERER NASENABSTRICH', 2, 10, 'Einfache Durchführung - Vorderer Nasenabstrich');
INSERT INTO `VTS`.`Artikel` (`Artikel_ID`, `Artikelname`, `Kategorie_ID`, `Hersteller_ID`, `Beschreibung`) VALUES (14, 'Antigen Schnelltest VORDERER NASENABSTRICH', 2, 11, 'Hohe Sensitivität (98,1%) und Spezifität (100%)');

COMMIT;


-- -----------------------------------------------------
-- Data for table `VTS`.`Adresse`
-- -----------------------------------------------------
START TRANSACTION;
USE `VTS`;
INSERT INTO `VTS`.`Adresse` (`Adresse_ID`, `Straße`, `Hausnummer`, `PLZ`, `Stadt`, `Stadtteil`, `Bundesland`, `Land`) VALUES (1, 'Vorstadtstraße', '24', 73494, 'Rosenberg', 'Hohenberg', 'Baden-Württemberg', 'Deutschland');

COMMIT;


-- -----------------------------------------------------
-- Data for table `VTS`.`Kundentyp`
-- -----------------------------------------------------
START TRANSACTION;
USE `VTS`;
INSERT INTO `VTS`.`Kundentyp` (`Kundentyp_ID`, `Bezeichung`) VALUES (1, 'Privatkunde');
INSERT INTO `VTS`.`Kundentyp` (`Kundentyp_ID`, `Bezeichung`) VALUES (2, 'Medizinischer Kunde');

COMMIT;


-- -----------------------------------------------------
-- Data for table `VTS`.`Kunde`
-- -----------------------------------------------------
START TRANSACTION;
USE `VTS`;
INSERT INTO `VTS`.`Kunde` (`Kunde_ID`, `LoginName`, `Name`, `Vorname`, `Telefon`, `Email`, `Passwort`, `Adresse_ID`, `Kundentyp_ID`) VALUES (1, 'mvidmar', 'Vidmar', 'Marcel', '015755797545', 'marcel.vidmar.mv@gmail.com', 'gast', 1, 1);

COMMIT;


-- -----------------------------------------------------
-- Data for table `VTS`.`Bezahlmethode`
-- -----------------------------------------------------
START TRANSACTION;
USE `VTS`;
INSERT INTO `VTS`.`Bezahlmethode` (`Bezahlmethode_ID`, `Bezeichnung`) VALUES (1, 'PayPal');
INSERT INTO `VTS`.`Bezahlmethode` (`Bezahlmethode_ID`, `Bezeichnung`) VALUES (2, 'Überweisung');
INSERT INTO `VTS`.`Bezahlmethode` (`Bezahlmethode_ID`, `Bezeichnung`) VALUES (3, 'Rechnung');

COMMIT;


-- -----------------------------------------------------
-- Data for table `VTS`.`Bestellstatus`
-- -----------------------------------------------------
START TRANSACTION;
USE `VTS`;
INSERT INTO `VTS`.`Bestellstatus` (`Bestellstatus_ID`, `Bezeichnung`) VALUES (1, 'Aufgegeben');
INSERT INTO `VTS`.`Bestellstatus` (`Bestellstatus_ID`, `Bezeichnung`) VALUES (2, 'Warte auf Bezahlung');
INSERT INTO `VTS`.`Bestellstatus` (`Bestellstatus_ID`, `Bezeichnung`) VALUES (3, 'Mahnung');
INSERT INTO `VTS`.`Bestellstatus` (`Bestellstatus_ID`, `Bezeichnung`) VALUES (4, 'Abgebrochen');
INSERT INTO `VTS`.`Bestellstatus` (`Bestellstatus_ID`, `Bezeichnung`) VALUES (5, 'In Bearbeitung');
INSERT INTO `VTS`.`Bestellstatus` (`Bestellstatus_ID`, `Bezeichnung`) VALUES (6, 'In Zustellung');
INSERT INTO `VTS`.`Bestellstatus` (`Bestellstatus_ID`, `Bezeichnung`) VALUES (7, 'Zugestellt');
INSERT INTO `VTS`.`Bestellstatus` (`Bestellstatus_ID`, `Bezeichnung`) VALUES (8, 'Archiviert');

COMMIT;


-- -----------------------------------------------------
-- Data for table `VTS`.`Packung`
-- -----------------------------------------------------
START TRANSACTION;
USE `VTS`;
INSERT INTO `VTS`.`Packung` (`Packung_ID`, `Packungsgroessee`, `Verkaufspreis`, `Mindestbestand`, `Lagermenge`, `Artikel_ID`) VALUES (1, 5, 20.95, 100, 30, 1);
INSERT INTO `VTS`.`Packung` (`Packung_ID`, `Packungsgroessee`, `Verkaufspreis`, `Mindestbestand`, `Lagermenge`, `Artikel_ID`) VALUES (2, 1, 3.95, 250, 350, 2);
INSERT INTO `VTS`.`Packung` (`Packung_ID`, `Packungsgroessee`, `Verkaufspreis`, `Mindestbestand`, `Lagermenge`, `Artikel_ID`) VALUES (3, 5, 19.99, 100, 200, 2);
INSERT INTO `VTS`.`Packung` (`Packung_ID`, `Packungsgroessee`, `Verkaufspreis`, `Mindestbestand`, `Lagermenge`, `Artikel_ID`) VALUES (4, 5, 22.95, 100, 90, 3);
INSERT INTO `VTS`.`Packung` (`Packung_ID`, `Packungsgroessee`, `Verkaufspreis`, `Mindestbestand`, `Lagermenge`, `Artikel_ID`) VALUES (5, 5, 18.95, 100, 250, 4);
INSERT INTO `VTS`.`Packung` (`Packung_ID`, `Packungsgroessee`, `Verkaufspreis`, `Mindestbestand`, `Lagermenge`, `Artikel_ID`) VALUES (6, 5, 18.95, 100, 125, 5);
INSERT INTO `VTS`.`Packung` (`Packung_ID`, `Packungsgroessee`, `Verkaufspreis`, `Mindestbestand`, `Lagermenge`, `Artikel_ID`) VALUES (7, 20, 69.95, 50, 94, 5);
INSERT INTO `VTS`.`Packung` (`Packung_ID`, `Packungsgroessee`, `Verkaufspreis`, `Mindestbestand`, `Lagermenge`, `Artikel_ID`) VALUES (8, 5, 20.95, NULL, NULL, 6);
INSERT INTO `VTS`.`Packung` (`Packung_ID`, `Packungsgroessee`, `Verkaufspreis`, `Mindestbestand`, `Lagermenge`, `Artikel_ID`) VALUES (9, 5, 19.95, NULL, NULL, 7);
INSERT INTO `VTS`.`Packung` (`Packung_ID`, `Packungsgroessee`, `Verkaufspreis`, `Mindestbestand`, `Lagermenge`, `Artikel_ID`) VALUES (10, 1, 4.35, NULL, NULL, 8);
INSERT INTO `VTS`.`Packung` (`Packung_ID`, `Packungsgroessee`, `Verkaufspreis`, `Mindestbestand`, `Lagermenge`, `Artikel_ID`) VALUES (11, 1, 4.35, NULL, NULL, 9);
INSERT INTO `VTS`.`Packung` (`Packung_ID`, `Packungsgroessee`, `Verkaufspreis`, `Mindestbestand`, `Lagermenge`, `Artikel_ID`) VALUES (12, 1, 13.70, NULL, NULL, 10);
INSERT INTO `VTS`.`Packung` (`Packung_ID`, `Packungsgroessee`, `Verkaufspreis`, `Mindestbestand`, `Lagermenge`, `Artikel_ID`) VALUES (13, 20, 94.00, NULL, NULL, 11);
INSERT INTO `VTS`.`Packung` (`Packung_ID`, `Packungsgroessee`, `Verkaufspreis`, `Mindestbestand`, `Lagermenge`, `Artikel_ID`) VALUES (14, 20, 94.00, NULL, NULL, 12);
INSERT INTO `VTS`.`Packung` (`Packung_ID`, `Packungsgroessee`, `Verkaufspreis`, `Mindestbestand`, `Lagermenge`, `Artikel_ID`) VALUES (15, 20, 94.00, NULL, NULL, 13);
INSERT INTO `VTS`.`Packung` (`Packung_ID`, `Packungsgroessee`, `Verkaufspreis`, `Mindestbestand`, `Lagermenge`, `Artikel_ID`) VALUES (16, 25, 117.51, NULL, NULL, 14);

COMMIT;


-- -----------------------------------------------------
-- Data for table `VTS`.`Bestellfaehigkeit`
-- -----------------------------------------------------
START TRANSACTION;
USE `VTS`;
INSERT INTO `VTS`.`Bestellfaehigkeit` (`Bestellfaehigkeit_ID`, `Kundentyp_ID`, `Kategorie_ID`) VALUES (1, 1, 1);
INSERT INTO `VTS`.`Bestellfaehigkeit` (`Bestellfaehigkeit_ID`, `Kundentyp_ID`, `Kategorie_ID`) VALUES (2, 1, 2);
INSERT INTO `VTS`.`Bestellfaehigkeit` (`Bestellfaehigkeit_ID`, `Kundentyp_ID`, `Kategorie_ID`) VALUES (3, 2, 1);
INSERT INTO `VTS`.`Bestellfaehigkeit` (`Bestellfaehigkeit_ID`, `Kundentyp_ID`, `Kategorie_ID`) VALUES (4, 2, 2);
INSERT INTO `VTS`.`Bestellfaehigkeit` (`Bestellfaehigkeit_ID`, `Kundentyp_ID`, `Kategorie_ID`) VALUES (5, 2, 3);

COMMIT;

