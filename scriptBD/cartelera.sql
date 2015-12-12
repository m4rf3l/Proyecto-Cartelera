
CREATE TABLE IF NOT EXISTS `ciudad`
(
	`id` int NOT NULL,
	`nombre` varchar(20) NOT NULL,
	primary key (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=UTF8;

CREATE TABLE IF NOT EXISTS `sucursal`
(
	`id` int NOT NULL,
	`nombre` varchar(50) NOT NULL,
	`id_ciudad` int NOT NULL,
	primary key (`id`),
	foreign key (`id_ciudad`) references ciudad (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

CREATE TABLE IF NOT EXISTS `pelicula`
(
	`id` int NOT NULL,
	`titulo` varchar(60) NOT NULL,
	`idioma` varchar(30) NOT NULL,
	`estreno` int NOT NULL,
	`anio` int NOT NULL,
	`fecha` varchar(20) NOT NULL,
	`clasificacion` varchar(5) NOT NULL,
	`genero` varchar(30) NOT NULL,
	`duracion` varchar(15) NOT NULL,
	`horarios` varchar(100) NOT NULL,
	`director` varchar(50) NOT NULL,
	`reparto` varchar(250) NOT NULL,
	`sinopsis` varchar(400) NOT NULL,
	`ruta` varchar(100) NOT NULL, 
	primary key (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

CREATE TABLE IF NOT EXISTS `sucursalpelicula`
(
	`id_sucursal` int NOT NULL,
	`id_pelicula` int NOT NULL,
	primary key(`id_sucursal`, `id_pelicula`),
	foreign key (`id_sucursal`) references sucursal (`id`),
	foreign key (`id_pelicula`) references pelicula (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;


INSERT INTO `ciudad` (`id`, `nombre`) VALUES
(1, 'Culiacan'),
(2, 'Mazatlan'),
(3, 'Los Mochis');


INSERT INTO `sucursal` (`id`,`nombre`,`id_ciudad`) VALUES
(1, 'CineSuyu - Zapata', 1),
(2, 'CineSuyu - La Lomita', 1),
(3, 'CineSuyu - La Playita', 2),
(4, 'CineSuyu - Pescado', 2),
(5, 'CineSuyu - Del Olmo', 3),
(6, 'CineSuyu - Santa Rosa', 3);


INSERT INTO `pelicula` (`id`, `titulo`, `idioma`, `estreno`, `anio`, `fecha`,`clasificacion`, `genero`, `duracion`, `horarios`, `director`, `reparto`, `sinopsis`, `ruta`) VALUES
(1, 'Avatar', 'Ingles', 0, 2009, '24/11/2009','B-15', 'Ciencia ficcion', '161 min', '1:00p.m. 5:30p.m. 9:45p.m. 11:00p.m.', 'James Cameron', 'Sam Worthington, Zoe Saldana, Sigourney Weaver, Stephen Lang, Michelle Rodriguez, Giovanni Ribisi, Joel David Moore, Wes Studi, CCH Pounder, Laz Alonso, Dileep Rao', 'Año 2154. Jake Sully (Sam Worthington), un ex-marine condenado a vivir en una silla de ruedas, sigue siendo, a pesar de ello, un autentico guerrero...','avatar.jpg'),
(2, 'Titanic', 'Español', 0, 1997,'10/08/1997','B', 'Romance', '195 min', '12:10p.m. 3:30p.m. 7:15p.m. 10:00p.m.', 'James Cameron', 'Leonardo DiCaprio, Kate Winslet, Billy Zane, Kathy Bates, Frances Fisher, Gloria Stuart, Bill Paxton, Bernard Hill, David Warner, Victor Garber, Jonathan Hyde, Suzy Amis, Danny Nucci', 'Jack (DiCaprio), un joven artista, gana en una partida de cartas un pasaje para viajar a America en el Titanic, el transatlantico mas grande y seguro jamas construido...','titanic.jpg'),
(3, 'Forrest Gump', 'Español', 0, 1994, '07/10/1994','A','Comedia', '142 min', '2:20p.m. 4:40p.m. 9:10p.m. 10:50p.m.', 'Robert Zemeckis', 'Tom Hanks, Robin Wright, Gary Sinise, Mykelti Williamson, Sally Field, Rebecca Williams, Michael Conner Humphreys, Harold G. Herthum, Haley Joel Osment', 'Forrest Gump (Tom Hanks) sufre desde pequeño un cierto retraso mental. A pesar de todo, gracias a su tenacidad y a su buen corazon sera protagonista de acontecimientos cruciales de su pais...','gump.jpg'),
(4, 'El Señor de los Anillos: La Comunidad del Anillo', 'Ingles', 0, 2001, '15/01/2001','A', 'Fantastico', '180 min', '4:20p.m. 7:40p.m. 10:50p.m.', 'Peter Jackson', 'Elijah Wood, Ian McKellen, Viggo Mortensen, Sean Astin, Sean Bean, John Rhys-Davies, Orlando Bloom, Dominic Monaghan, Billy Boyd, Cate Blanchett', 'En la Tierra Media, el Señor Oscuro Sauron ordeno a los Elfos que forjaran los Grandes Anillos de Poder. Tres para los reyes Elfos, siete para los Señores Enanos, y nueve para los Hombres Mortales...','anillo.jpg'),
(5, 'Batman: El Caballero de la Noche', 'Ingles', 0, 2008, '24/08/2008','B-15','Thriller', '152 min', '1:00p.m. 3:20p.m. 5:50p.m. 8:10p.m. 10:45p.m.', 'Christopher Nolan', 'Christian Bale, Heath Ledger, Aaron Eckhart, Michael Caine, Gary Oldman, Morgan Freeman, Maggie Gyllenhaal, Eric Roberts, Cillian Murphy, Michael Jai White', 'Batman/Bruce Wayne (Christian Bale) regresa para continuar su guerra contra el crimen. Con la ayuda del teniente Jim Gordon (Gary Oldman) y del Fiscal del Distrito Harvey Dent (Aaron Eckhart), Batman se propone destruir el crimen organizado en la ciudad de Gotham...','caballero.jpg'),
(6, '300', 'Español', 0, 2006, '29/07/2006','C','Accion', '117 min', '4:20p.m. 7:40p.m. 10:50p.m. 11:15p.m.','Zack Snyder', 'Gerard Butler, Lena Headey, David Wenham, Dominic West, Vincent Regan, Rodrigo Santoro, Michael Fassbender, Andrew Tieman, Andrew Pleavin', 'Adaptacion del comic de Frank Miller (autor del comic Sin City) sobre la famosa batalla de las Termopilas (480 a. C.). El objetivo de Jerjes, emperador de Persia, era la conquista de Grecia, lo que desencadeno las Guerras Medicas...','300.jpg'),
(7, 'El Origen', 'Ingles', 0, 2010, '15/02/2010','B-15','Ciencia ficcion', '148 min', '2:10p.m. 5:40p.m. 8:20p.m. 10:30p.m.','Christopher Nolan', 'Leonardo DiCaprio, Joseph Gordon-Levitt, Ellen Page, Ken Watanabe, Marion Cotillard, Tom Hardy, Cillian Murphy, Tom Berenger, Michael Caine, Dileep Rao', 'Dom Cobb (DiCaprio) es un experto en el arte de apropiarse, durante el sueño, de los secretos del subconsciente ajeno. La extraña habilidad de Cobb le ha convertido en un hombre muy cotizado en el mundo del espionaje...','origen.jpg'),
(8, 'En el Corazon del Mar', 'Español', 1, 2015, '15/12/2015','B','Accion', '122 min', '11:20a.m. 1:50p.m. 4:50p.m. 7:15p.m. 9:50p.m.','Ron Howard', 'Chris Hemsworth, Benjamin Walker, Cillian Murphy, Ben Whishaw', 'En el invierno de 1820, Owen Chase y otros marineros de la tripulacion del Essex sobrevivieron en alta mar en durisimas condiciones despues de que el barco chocara con una enorme ballena blanca. Owen, obsesionado con la idea de dar caza al cetaceo, se enfrento a las tormentas y a la desesperacion...','corazon.jpg'),
(9, 'Los Juegos del Hambre: Sinsajo, Parte II', 'Español', 1, 2015, '17/12/2015','B','Ciencia ficcion', '136 min', '12:20p.m. 3:40p.m. 6:50p.m. 9:15p.m.','Francis Lawrence', 'Jennifer Lawrence, Josh Hutcherson, Liam Hemsworth, Julianne Moore', 'Despues de ser simbolizado como el "Sinsajo" Katniss Everdeen y el Distrito 13 participan en una revolucion total contra el autocratico Capitolio...','sinsajo.jpg'),
(10, 'Victor Frankenstein', 'Ingles', 1, 2015, '21/12/2015','B','Ciencia ficcion', '110 min', '1:20p.m. 3:40p.m. 5:50p.m. 7:15p.m. 10:30p.m.','Paul McGuigan', 'Daniel Radcliffe, James McAvoy, Jessica Brown Findlay, Andrew Scott', 'El cientifico radical Victor Frankenstein y su igualmente brillante protegido Igor Strausman comparten una vision noble de ayudar a la humanidad a traves de su investigacion pionera en la inmortalidad. Pero los experimentos de Victor ir demasiado lejos, y su obsesion tiene consecuencias terribles...','frankenstein.jpg');


INSERT INTO `sucursalpelicula` (`id_sucursal`, `id_pelicula`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),

(2, 8),
(2, 9),
(2, 3),
(2, 4),
(2, 5),
(2, 7),

(3, 8),
(3, 9),
(3, 10),
(3, 6),
(3, 7),
(3, 1),
(3, 2),

(4, 9),
(4, 10),
(4, 1),
(4, 4),
(4, 6),

(5, 8),
(5, 9),
(5, 7),
(5, 5),
(5, 3),
(5, 6),
(5, 2),

(6, 8),
(6, 9),
(6, 10),
(6, 6),
(6, 4),
(6, 1),
(6, 2);
