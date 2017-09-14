create database Compass;
use Compass;
CREATE TABLE IF NOT EXISTS Role (
`id` int(10) NOT NULL AUTO_INCREMENT,
  `descriptionRole` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
);
INSERT INTO `Role` (`id`, `descriptionRole`) VALUES
(1, 'Administrador');
CREATE TABLE IF NOT EXISTS User (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identificationCard` varchar(100) NOT NULL,
  `firstname` varchar(128) NOT NULL,
  `surnames` varchar(228) NOT NULL,
  `phone` varchar(64) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `idRole` int(10) ,
    PRIMARY KEY (`id`),
CONSTRAINT `fk_user_role` 
FOREIGN KEY ( `idRole`) 
REFERENCES Role (`id`) 
ON DELETE NO ACTION 
ON UPDATE NO ACTION);


INSERT INTO `User` (
`identificationCard`,
  `firstname`,
  `surnames`, 
  `phone`, 
  `email`, 
  `address`,
  `idRole`) VALUES
('334543432', 'Gabriel','Solano Valerín','87654534', 'gasolano21@gmail.com', 'Cartago, San Rafael',1);
select * from user