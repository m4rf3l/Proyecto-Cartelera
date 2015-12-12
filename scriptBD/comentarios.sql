<<<<<<< HEAD
CREATE TABLE IF NOT EXISTS `comentarios`
(
	`id` int UNSIGNED AUTO_INCREMENT,
	`nombre` varchar(50) NOT NULL,
	`apellido` varchar(50) NOT NULL,
	`sucursal` int NOT NULL,
	`asunto` varchar(100) NOT NULL,
	`comentario` varchar(500) NOT NULL,
	primary key(`id`)
=======
CREATE TABLE IF NOT EXISTS `comentarios`
(
	`id` int UNSIGNED AUTO_INCREMENT,
	`nombre` varchar(50) NOT NULL,
	`apellido` varchar(50) NOT NULL,
	`sucursal` int NOT NULL,
	`asunto` varchar(100) NOT NULL,
	`comentario` varchar(500) NOT NULL,
	primary key(`id`)
>>>>>>> 7b285c11bfecfc2c1fc8e8e0ff3b66b87f9c750a
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 AUTO_INCREMENT=1;