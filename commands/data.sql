
-- -----------------------------------------------------
-- Table `transports`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `transports` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `transport_type` VARCHAR(45) NULL,
  `description` VARCHAR(255) NULL,
  `date_created` DATETIME NULL,
  `date_updated` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gammu_settings`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gammu_settings` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `transport` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `smpp_transport_idx` (`transport` ASC),
  CONSTRAINT `gammu_transport`
    FOREIGN KEY (`transport`)
    REFERENCES `transports` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `smst_settings`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `smst_settings` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `host` VARCHAR(45) NULL,
  `outgoing_folder` VARCHAR(255) NULL,
  `transport` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `smst_transport_idx` (`transport` ASC),
  CONSTRAINT `smst_transport`
    FOREIGN KEY (`transport`)
    REFERENCES `transports` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `smpp_settings`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `smpp_settings` (
  `id` INT NOT NULL,
  `transport` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `smpp_transport_idx` (`transport` ASC),
  CONSTRAINT `smpp_transport`
    FOREIGN KEY (`transport`)
    REFERENCES `transports` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `keywords`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `keywords` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `api_id` VARCHAR(45) NOT NULL COMMENT 'unique id for keyword api',
  `keyword` VARCHAR(5) NOT NULL COMMENT 'key text identifying messages belonging to this api',
  `auto_reply` TINYINT(1) NOT NULL COMMENT 'send default SMS in response to user SMS',
  `auto_reply_text` VARCHAR(200) NULL COMMENT 'default reply SMS text',
  `forward_to` VARCHAR(150) NOT NULL COMMENT 'url for handling keywork messages',
  `reply_transport` INT NOT NULL COMMENT 'transport to which keyword replies are sent',
  `date__added` DATETIME NULL,
  `date_updated` DATETIME NULL,
  `transport` INT NOT NULL COMMENT 'transport to which keyword belongs',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `keyword_UNIQUE` (`api_id` ASC),
  INDEX `keyword_transport_idx` (`transport` ASC),
  INDEX `keyword_reply_transport_idx` (`reply_transport` ASC),
  CONSTRAINT `keyword_transport`
    FOREIGN KEY (`transport`)
    REFERENCES `transports` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `keyword_reply_transport`
    FOREIGN KEY (`reply_transport`)
    REFERENCES `transports` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;
