
CREATE TABLE IF NOT EXISTS `Ciudad`
(
	`id_ciudad` int NOT NULL,
	`nombre_cd` varchar(20) NOT NULL,
	primary key (`id_ciudad`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `Sucursal`
(
	`id_sucursal` int NOT NULL,
	`nombre_suc` varchar(50) NOT NULL,
	`id_ciudad` int NOT NULL,
	primary key (`id_sucursal`),
	foreign key (`id_ciudad`) references Ciudad (`id_ciudad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `Pelicula`
(
	`id_pelicula` int NOT NULL,
	`titulo` varchar(60) NOT NULL,
	`idioma` varchar(30) NOT NULL,
	`estreno` int NOT NULL,
	`año` int NOT NULL,
	`clasificacion` varchar(30) NOT NULL,
	`duracion` varchar(15) NOT NULL,
	`horarios` varchar(100) NOT NULL,
	`director` varchar(50) NOT NULL,
	`reparto` varchar(250) NOT NULL,
	`sinopsis` varchar(400) NOT NULL,
	`rutaImg` varchar(100) NOT NULL, 
	primary key (`id_pelicula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `SucursalPelicula`
(
	`id_sucursal` int NOT NULL,
	`id_pelicula` int NOT NULL,
	primary key(`id_sucursal`, `id_pelicula`),
	foreign key (`id_sucursal`) references Sucursal (`id_sucursal`),
	foreign key (`id_pelicula`) references Pelicula (`id_pelicula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `Ciudad` (`id_ciudad`, `nombre_cd`) VALUES
(1, 'Culiacan'),
(2, 'Mazatlan'),
(3, 'Los Mochis');


INSERT INTO `Sucursal` (`id_sucursal`,`nombre_suc`,`id_ciudad`) VALUES
(1, 'CineSuyu - Zapata', 1),
(2, 'CineSuyu - La Lomita', 1),
(3, 'CineSuyu - La Playita', 2),
(4, 'CineSuyu - Pescado', 2),
(5, 'CineSuyu - Del Olmo', 3),
(6, 'CineSuyu - Santa Rosa', 3);


INSERT INTO `Pelicula` (`id_pelicula`, `titulo`, `idioma`, `estreno`, `año`, `clasificacion`, `duracion`, `horarios`, `director`, `reparto`, `sinopsis`, `rutaImg`) VALUES
(1, 'Avatar', 'Ingles', 0, 2009, 'Ciencia ficcion', '161 min', '1:00 p.m 5:30 p.m 9:45 p.m 11:00 p.m', 'James Cameron', 'Sam Worthington, Zoe Saldana, Sigourney Weaver, Stephen Lang, Michelle Rodriguez, Giovanni Ribisi, Joel David Moore, Wes Studi, CCH Pounder, Laz Alonso, Dileep Rao', 'Año 2154. Jake Sully (Sam Worthington), un ex-marine condenado a vivir en una silla de ruedas, sigue siendo, a pesar de ello, un autentico guerrero...','images/posters/Avatar.jpg'),
(2, 'Titanic', 'Español', 0, 1997,'Romance', '195 min', '12:10 p.m 3:30 p.m 7:15 p.m 10:00 p.m', 'James Cameron', 'Leonardo DiCaprio, Kate Winslet, Billy Zane, Kathy Bates, Frances Fisher, Gloria Stuart, Bill Paxton, Bernard Hill, David Warner, Victor Garber, Jonathan Hyde, Suzy Amis, Danny Nucci', 'Jack (DiCaprio), un joven artista, gana en una partida de cartas un pasaje para viajar a America en el Titanic, el transatlantico mas grande y seguro jamas construido...','images/posters/Titanic.jpg'),
(3, 'Forrest Gump', 'Español', 0, 1994,'Comedia', '142 min', '2:20 p.m 4:40 p.m 9:10 p.m 10:50 p.m', 'Robert Zemeckis', 'Tom Hanks, Robin Wright, Gary Sinise, Mykelti Williamson, Sally Field, Rebecca Williams, Michael Conner Humphreys, Harold G. Herthum, Haley Joel Osment', 'Forrest Gump (Tom Hanks) sufre desde pequeño un cierto retraso mental. A pesar de todo, gracias a su tenacidad y a su buen corazon sera protagonista de acontecimientos cruciales de su pais...','images/posters/ForrestGump.jpg'),
(4, 'El Señor de los Anillos: La Comunidad del Anillo', 'Ingles', 0, 2001,'Fantastico', '180 min', '4:20 p.m 7:40 p.m 10:50 p.m', 'Peter Jackson', 'Elijah Wood, Ian McKellen, Viggo Mortensen, Sean Astin, Sean Bean, John Rhys-Davies, Orlando Bloom, Dominic Monaghan, Billy Boyd, Cate Blanchett', 'En la Tierra Media, el Señor Oscuro Sauron ordeno a los Elfos que forjaran los Grandes Anillos de Poder. Tres para los reyes Elfos, siete para los Señores Enanos, y nueve para los Hombres Mortales...','images/posters/ComunidadAnillo.jpg'),
(5, 'Batman: El Caballero de la Noche', 'Ingles', 0, 2008,'Thriller', '152 min', '1:00 p.m 3:20 p.m 5:50 p.m 8:10 p.m 10:45 p.m', 'Christopher Nolan', 'Christian Bale, Heath Ledger, Aaron Eckhart, Michael Caine, Gary Oldman, Morgan Freeman, Maggie Gyllenhaal, Eric Roberts, Cillian Murphy, Michael Jai White', 'Batman/Bruce Wayne (Christian Bale) regresa para continuar su guerra contra el crimen. Con la ayuda del teniente Jim Gordon (Gary Oldman) y del Fiscal del Distrito Harvey Dent (Aaron Eckhart), Batman se propone destruir el crimen organizado en la ciudad de Gotham...','images/posters/CaballeroNoche.jpg'),
(6, '300', 'Español', 0, 2006,'Accion', '117 min', '4:20 p.m 7:40 p.m 10:50 p.m 11:15 p.m.','Zack Snyder', 'Gerard Butler, Lena Headey, David Wenham, Dominic West, Vincent Regan, Rodrigo Santoro, Michael Fassbender, Andrew Tieman, Andrew Pleavin', 'Adaptacion del comic de Frank Miller (autor del comic Sin City) sobre la famosa batalla de las Termopilas (480 a. C.). El objetivo de Jerjes, emperador de Persia, era la conquista de Grecia, lo que desencadeno las Guerras Medicas...','images/posters/300.jpg'),
(7, 'El Origen', 'Ingles', 0, 2010,'Ciencia ficcion', '148 min', '2:10 p.m 5:40 p.m 8:20 p.m 10:30 p.m.','Christopher Nolan', 'Leonardo DiCaprio, Joseph Gordon-Levitt, Ellen Page, Ken Watanabe, Marion Cotillard, Tom Hardy, Cillian Murphy, Tom Berenger, Michael Caine, Dileep Rao', 'Dom Cobb (DiCaprio) es un experto en el arte de apropiarse, durante el sueño, de los secretos del subconsciente ajeno. La extraña habilidad de Cobb le ha convertido en un hombre muy cotizado en el mundo del espionaje...','images/posters/Origen.jpg'),
(8, 'En el Corazon del Mar', 'Español', 1, 2015,'Accion', '122 min', '11:20 a.m 1:50 p.m 4:50 p.m 7:15 p.m. 9:50 p.m.','Ron Howard', 'Chris Hemsworth, Benjamin Walker, Cillian Murphy, Ben Whishaw', 'En el invierno de 1820, Owen Chase y otros marineros de la tripulacion del Essex sobrevivieron en alta mar en durisimas condiciones despues de que el barco chocara con una enorme ballena blanca. Owen, obsesionado con la idea de dar caza al cetaceo, se enfrento a las tormentas y a la desesperacion...','images/posters/CorazonMar.jpg'),
(9, 'Los Juegos del Hambre: Sinsajo, Parte II', 'Español', 1, 2015,'Ciencia ficcion', '136 min', '12:20 p.m 3:40 p.m 6:50 p.m 9:15 p.m.','Francis Lawrence', 'Jennifer Lawrence, Josh Hutcherson, Liam Hemsworth, Julianne Moore', 'Despues de ser simbolizado como el "Sinsajo" Katniss Everdeen y el Distrito 13 participan en una revolucion total contra el autocratico Capitolio...','images/posters/Sinsajo2.jpg'),
(10, 'Victor Frankenstein', 'Ingles', 1, 2015,'Ciencia ficcion', '110 min', '1:20 p.m 3:40 p.m 5:50 p.m 7:15 p.m. 10:30 p.m.','Paul McGuigan', 'Daniel Radcliffe, James McAvoy, Jessica Brown Findlay, Andrew Scott', 'El cientifico radical Victor Frankenstein y su igualmente brillante protegido Igor Strausman comparten una vision noble de ayudar a la humanidad a traves de su investigacion pionera en la inmortalidad. Pero los experimentos de Victor ir demasiado lejos, y su obsesion tiene consecuencias terribles...','images/posters/VictorFrankenstein.jpg');


INSERT INTO `SucursalPelicula` (`id_sucursal`, `id_pelicula`) VALUES
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
(6, 2),
(6, 3);