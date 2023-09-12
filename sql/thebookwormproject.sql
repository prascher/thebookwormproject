CREATE database library;
CREATE USER 'library'@'localhost' IDENTIFIED BY 'library';
GRANT ALL PRIVILEGES ON libary.* TO 'library'@'localhost';
Use library;
CREATE TABLE IF NOT EXISTS `library`.`books` ( `id` INT NOT NULL AUTO_INCREMENT, `title` VARCHAR(255) NULL DEFAULT NULL, `author` VARCHAR(255) NULL DEFAULT NULL, `publisher` VARCHAR(255) NULL DEFAULT NULL, `pubdate` VARCHAR(255) NULL DEFAULT NULL, `img` VARCHAR(255) NULL DEFAULT NULL, `summary` TEXT NULL DEFAULT NULL, `ISBN` VARCHAR(17) NULL DEFAULT NULL, `shelf` VARCHAR(45) NULL DEFAULT NULL, `sub_category` VARCHAR(45) NULL DEFAULT NULL,`lentto` VARCHAR(255) NULL DEFAULT NULL, `readon` DATE NULL DEFAULT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB AUTO_INCREMENT = 25 DEFAULT CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci
