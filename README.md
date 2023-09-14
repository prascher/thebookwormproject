# thebookwormproject
A project dedicated to helping catalog books and more.

Use the following command to setup database.

~~```CREATE TABLE IF NOT EXISTS `library`.`books` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NULL DEFAULT NULL,
  `author` VARCHAR(255) NULL DEFAULT NULL,
  `publisher` VARCHAR(255) NULL DEFAULT NULL,
  `pubdate` VARCHAR(255) NULL DEFAULT NULL,
  `img` VARCHAR(255) NULL DEFAULT NULL,
  `summary` TEXT NULL DEFAULT NULL,
  `ISBN` VARCHAR(17) NULL DEFAULT NULL,
  `shelf` VARCHAR(45) NULL DEFAULT NULL,
  `lentto` VARCHAR(255) NULL DEFAULT NULL,
  `readon` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 25
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci```~~

~~***Please Create database named library or please edit it to fit***~~

***Please run the sql file in the sql folder/directory***

# About the CSS
The CSS included was designed to give an appearance I though looked good feel free to edit it to better match your taste, if you don't like the colorscheme I did.

# Roadmap of features

Currently, there is no roadmap for new features

There are a few I am considering, but they are not ready yet.

# Issues

I will try to keep an eye on open issues.

However, if I either miss your issue and you figure out a fix or you feel like helping out on this project, feel free to open pull request with your bug fix or improvement.
