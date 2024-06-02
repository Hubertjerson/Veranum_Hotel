-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-06-2024 a las 21:19:16
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `veranum`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `perfil` text NOT NULL,
  `nombre` text NOT NULL,
  `usuario` text NOT NULL,
  `password` text NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `perfil`, `nombre`, `usuario`, `password`, `estado`, `fecha`) VALUES
(1, 'Administrador', 'usuario', 'admin', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 1, '2024-06-02 04:18:16'),
(6, 'Editor', 'editor', 'editor', '$2a$07$asxx54ahjppf45sd87a5au6fAHIlFrQ7jQ4XHf7fycZYUNBysO4Bq', 0, '2024-06-02 04:33:56'),
(19, 'Editor', 'jose miguel', 'editortwo', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 0, '2024-06-02 13:31:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `banner`
--

INSERT INTO `banner` (`id`, `img`, `fecha`) VALUES
(1, 'vistas/img/banner/banner01.jpg', '2024-05-26 22:44:52'),
(2, 'vistas/img/banner/banner02.jpg', '2024-05-26 22:44:52'),
(3, 'vistas/img/banner/banner03.jpg', '2024-05-26 22:44:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `ruta` text NOT NULL,
  `tipo` text NOT NULL,
  `img` text NOT NULL,
  `descripcion` text NOT NULL,
  `servicios_extra` text NOT NULL,
  `precio` float NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `ruta`, `tipo`, `img`, `descripcion`, `servicios_extra`, `precio`, `fecha`) VALUES
(1, 'habitacion-tipo-simple', 'Simple', 'vistas/img/simple/portada.png', 'Bienvenidos a nuestras acogedoras Habitaciones Simples, diseñadas para ofrecerle una estancia cómoda y tranquila. Cada habitación está equipada con todo lo necesario para asegurar su descanso y comodidad. Disfrute de una cama individual con colchón de alta calidad, baño privado con artículos de aseo gratuitos, conexión Wi-Fi de alta velocidad, escritorio de trabajo, y una TV de pantalla plana con canales por cable.', '[{ \"item\": \"cama 2 x 2\", \"icono\": \"fas fa-bed\"},\r\n{ \"item\": \"TV de 42 Pulg\", \"icono\": \"fas fa-tv\"},\r\n{ \"item\": \"Agua Caliente\", \"icono\": \"fas fa-tint\"},\r\n{ \"item\": \"Jacuzzi\", \"icono\": \"fas fa-water\"},\r\n{ \"item\": \"Baño privado\", \"icono\": \"fas fa-toilet\"},\r\n{ \"item\": \"Sofá\", \"icono\": \"fas fa-couch\"},\r\n{ \"item\": \"Balcón\", \"icono\": \"far fa-image\"},\r\n{ \"item\": \"Servicio Wifi\", \"icono\": \"fas fa-wifi\"}]', 200000, '2024-05-26 23:19:08'),
(2, 'habitacion-tipo-doble', 'Doble', 'vistas/img/doble/portada.png', 'Bienvenidos a nuestras Habitaciones Dobles, perfectas para quienes buscan espacio y confort durante su estancia. Cada habitación doble está cuidadosamente diseñada para ofrecer un ambiente relajante y moderno. Equipadas con dos camas individuales o una cama doble grande, nuestras habitaciones proporcionan un sueño reparador con colchones de alta calidad y ropa de cama suave', '[{ \"item\": \"cama 2 x 2\", \"icono\": \"fas fa-bed\"},\r\n{ \"item\": \"TV de 42 Pulg\", \"icono\": \"fas fa-tv\"},\r\n{ \"item\": \"Agua Caliente\", \"icono\": \"fas fa-tint\"},\r\n{ \"item\": \"Baño privado\", \"icono\": \"fas fa-toilet\"},\r\n{ \"item\": \"Sofá\", \"icono\": \"fas fa-couch\"},\r\n{ \"item\": \"Balcón\", \"icono\": \"far fa-image\"},\r\n{ \"item\": \"Servicio Wifi\", \"icono\": \"fas fa-wifi\"}]', 250000, '2024-05-26 23:14:45'),
(3, 'habitacion-tipo-especial', 'Especial', 'vistas/img/especial/portada.png', 'Bienvenidos a nuestras acogedoras Habitaciones especiales, diseñadas para ofrecerle una estancia cómoda y tranquila. Cada habitación está equipada con todo lo necesario para asegurar su descanso y comodidad. Disfrute de una cama especial con colchón de alta calidad, baño privado con artículos de aseo gratuitos, conexión Wi-Fi de alta velocidad, escritorio de trabajo, y una TV de pantalla plana con canales por cable.', '[{ \"item\": \"cama 2 x 2\", \"icono\": \"fas fa-bed\"},\r\n{ \"item\": \"TV de 42 Pulg\", \"icono\": \"fas fa-tv\"},\r\n{ \"item\": \"Agua Caliente\", \"icono\": \"fas fa-tint\"},\r\n{ \"item\": \"Baño privado\", \"icono\": \"fas fa-toilet\"},\r\n{ \"item\": \"Sofá\", \"icono\": \"fas fa-couch\"},\r\n{ \"item\": \"Servicio Wifi\", \"icono\": \"fas fa-wifi\"}]', 300000, '2024-05-26 23:15:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

CREATE TABLE `habitaciones` (
  `id_h` int(11) NOT NULL,
  `tipo_h` int(11) NOT NULL,
  `estilo` text NOT NULL,
  `galeria` text NOT NULL,
  `recorrido_virtual` text NOT NULL,
  `descripcion_h` text NOT NULL,
  `fecha_h` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `habitaciones`
--

INSERT INTO `habitaciones` (`id_h`, `tipo_h`, `estilo`, `galeria`, `recorrido_virtual`, `descripcion_h`, `fecha_h`) VALUES
(1, 1, 'Oriental', '[\"vistas/img/simple/oriental01.jpg\", \"vistas/img/simple/oriental02.jpg\", \"vistas/img/simple/oriental03.jpg\",\r\n\"vistas/img/simple/oriental04.jpg\"]\r\n', 'vistas/img/suite/oriental-360.jpg', '<p>Imagina una habitación simple al estilo oriental, donde la serenidad y la armonía reinan en cada detalle. Las paredes están pintadas en tonos suaves, como el blanco hueso o el beige claro, reflejando la tranquilidad y la luz natural que se filtra suavemente a través de las delicadas cortinas de lino. En el centro de la habitación, un tatami de paja natural cubre el suelo, invitando a sentarse y relajarse en su superficie suave y acolchada.\n					</p>	\n\n					<p>Una lámpara de papel de arroz cuelga delicadamente sobre un pequeño altar, iluminando suavemente el espacio y añadiendo una atmósfera de reverencia. Al lado, un futón doblado se encuentra listo para ser desplegado para el descanso nocturno, con sábanas de algodón suaves y almohadas de arroz que prometen un sueño reparador al estilo japonés.\n\nEn esta habitación simple al estilo oriental, cada elemento está cuidadosamente elegido para fomentar la paz interior y la conexión con la naturaleza, creando un refugio tranquilo y acogedor en medio del ajetreo de la vida cotidiana.\n					</p>\n					<br>\n					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '2024-05-26 23:08:27'),
(2, 1, 'Moderna', '[\"vistas/img/simple/moderna01.jpg\", \"vistas/img/simple/moderna02.jpg\", \"vistas/img/simple/moderna03.jpg\",\r\n\"vistas/img/simple/moderna04.jpg\"]\r\n\r\n', 'vistas/img/suite/moderna-360.jpg', '<p>Imagina una habitación de estilo moderno que exuda elegancia y sofisticación en cada rincón. Las líneas limpias y los colores neutros dominan el espacio, creando una sensación de amplitud y tranquilidad. Las paredes están pintadas en tonos suaves, como el gris claro o el blanco, proporcionando un telón de fondo perfecto para resaltar los elementos de diseño.\n					</p>	\n\n					<p>La tecnología también tiene su lugar en esta habitación moderna, con una televisión de pantalla plana montada en la pared y sistemas de audio discretamente integrados para disfrutar de entretenimiento multimedia sin sacrificar la estética.\n\nEn resumen, esta habitación de estilo moderno es un oasis de elegancia contemporánea, donde la funcionalidad se combina con el diseño cuidadosamente curado para crear un espacio que es a la vez acogedor y vanguardista.\n					</p>\n					<br>\n					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '2024-05-26 23:09:04'),
(3, 1, 'Africana', '[\"vistas/img/simple/africana01.jpg\", \"vistas/img/simple/africana02.jpg\", \"vistas/img/simple/africana03.jpg\",\r\n\"vistas/img/simple/africana04.jpg\"]\r\n', 'vistas/img/simple/africana-360.jpg', '<p>Imagina una habitación que irradia la riqueza cultural y la calidez del continente africano en cada detalle. Las paredes están decoradas con tejidos tradicionales en vibrantes colores y estampados geométricos, como kente, bogolan o kuba cloth, que aportan un toque de vitalidad y autenticidad al espacio.\n					</p>	\n\n					<p>La iluminación es suave y cálida, con lámparas de pie o colgantes hechas de materiales naturales como la madera, el mimbre o el cuero. Velas aromáticas y candelabros de hierro forjado añaden un toque de romanticismo y misterio al ambiente.\n\nEn esta habitación de estilo africano, cada elemento está imbuido de historia y significado, creando un espacio que celebra la diversidad y la belleza del continente africano. Es un refugio acogedor donde se puede escapar del ajetreo de la vida cotidiana y conectarse con la riqueza cultural y la naturaleza inspiradora de África.					</p>\n					<br>\n					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '2024-05-26 23:11:27'),
(4, 1, 'Clasica', '[\"vistas/img/simple/clasica01.jpg\", \"vistas/img/simple/clasica02.jpg\", \"vistas/img/simple/clasica03.jpg\",\r\n\"vistas/img/simple/clasica04.jpg\"]\r\n', 'vistas/img/simple/clasica-360.jpg', '<p>Imagina una habitación de estilo clásico, donde la elegancia atemporal y la sofisticación se entrelazan en cada detalle. Las paredes están pintadas en tonos suaves y neutros, como el blanco crema o el beige claro, creando un telón de fondo sereno y refinado para el resto de la decoración.\r\n					</p>	\r\n\r\n					<p>La iluminación es suave y cálida, con lámparas de mesa y apliques de pared en tonos dorados o plateados, creando un ambiente acogedor y romántico.\r\n\r\nEn esta habitación de estilo clásico, cada elemento está cuidadosamente seleccionado para crear un ambiente refinado y elegante que evoca la grandeza y la sofisticación de épocas pasadas. Es un refugio atemporal donde se puede disfrutar de la belleza y el confort en su forma más pura.					</p>\r\n					<br>\r\n					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '2024-05-26 23:09:53'),
(5, 1, 'Retro', '[\"vistas/img/simple/retro01.jpg\", \"vistas/img/simple/retro02.jpg\", \"vistas/img/simple/retro03.jpg\",\r\n\"vistas/img/simple/retro04.jpg\"]\r\n', 'vistas/img/simple/retro-360.jpg', '<p>Imagina una habitación con un encanto retro, donde los elementos del pasado se mezclan con un toque de nostalgia y estilo. Las paredes están adornadas con papel tapiz de patrones geométricos o florales, en colores vivos y audaces que evocan la moda y la decoración de décadas pasadas, como los años 60 y 70.					</p>	  					<p>La iluminación es suave y acogedora, con lámparas de pie de estilo retro con pantallas de colores o lámparas colgantes de metal en tonos dorados u oxidados.\n\nEn esta habitación de estilo retro, cada elemento está diseñado para transportarte a otra época, evocando la nostalgia de tiempos pasados mientras se mezcla con la comodidad y funcionalidad de la vida moderna. Es un espacio único y lleno de carácter que invita a la creatividad y la expresión personal.					</p> 					<br> 					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '2024-05-26 23:13:11'),
(6, 2, 'Oriental', '[\"vistas/img/doble/oriental01.jpg\", \"vistas/img/doble/oriental02.jpg\", \"vistas/img/doble/oriental03.jpg\",\r\n\"vistas/img/doble/oriental04.jpg\"]\r\n', 'vistas/img/doble/oriental-360.jpg', '<p>Una habitación de estilo doble oriental fusiona elementos de diseño de diferentes culturas asiáticas para crear un ambiente exótico y armonioso. Las paredes pueden estar decoradas con paneles de madera tallada o papel tapiz inspirado en motivos asiáticos, como flores de cerezo japonesas o patrones chinos tradicionales.					</p>	  					<p>La iluminación es suave y tenue, con lámparas de papel japonesas colgando del techo o lámparas de pie con pantallas de bambú. Velas perfumadas en recipientes de cerámica o metal completan la atmósfera relajante y exótica de la habitación.\r\n\r\nEn esta habitación de estilo doble oriental, se crea una fusión armoniosa de elementos culturales de Asia, que invita a la calma, la contemplación y la conexión con la belleza y la serenidad del Oriente				</p> 					<br> 					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '2024-05-26 23:10:59'),
(7, 2, 'Moderna', '[\"vistas/img/doble/moderna01.jpg\", \"vistas/img/doble/moderna02.jpg\", \"vistas/img/doble/moderna03.jpg\",\r\n\"vistas/img/doble/moderna04.jpg\"]', 'vistas/img/doble/moderna-360.jpg', '<p>Imagina una habitación de estilo moderno que exuda elegancia y sofisticación en cada rincón. Las líneas limpias y los colores neutros dominan el espacio, creando una sensación de amplitud y tranquilidad. Las paredes están pintadas en tonos suaves, como el gris claro o el blanco, proporcionando un telón de fondo perfecto para resaltar los elementos de diseño.\n					</p>	\n\n					<p>La tecnología también tiene su lugar en esta habitación moderna, con una televisión de pantalla plana montada en la pared y sistemas de audio discretamente integrados para disfrutar de entretenimiento multimedia sin sacrificar la estética.\n\nEn resumen, esta habitación de estilo moderno es un oasis de elegancia contemporánea, donde la funcionalidad se combina con el diseño cuidadosamente curado para crear un espacio que es a la vez acogedor y vanguardista.\n					</p>\n					<br>\n					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '2024-05-26 23:11:19'),
(8, 2, 'Africana', '[\"vistas/img/doble/africana01.jpg\", \"vistas/img/doble/africana02.jpg\", \"vistas/img/doble/africana03.jpg\",\r\n\"vistas/img/doble/africana04.jpg\"]\r\n', 'vistas/img/doble/africana-360.jpg', '<p>Imagina una habitación que irradia la riqueza cultural y la calidez del continente africano en cada detalle. Las paredes están decoradas con tejidos tradicionales en vibrantes colores y estampados geométricos, como kente, bogolan o kuba cloth, que aportan un toque de vitalidad y autenticidad al espacio.\n					</p>	\n\n					<p>La iluminación es suave y cálida, con lámparas de pie o colgantes hechas de materiales naturales como la madera, el mimbre o el cuero. Velas aromáticas y candelabros de hierro forjado añaden un toque de romanticismo y misterio al ambiente.\n\nEn esta habitación de estilo africano, cada elemento está imbuido de historia y significado, creando un espacio que celebra la diversidad y la belleza del continente africano. Es un refugio acogedor donde se puede escapar del ajetreo de la vida cotidiana y conectarse con la riqueza cultural y la naturaleza inspiradora de África.					</p>\n					<br>\n					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '2024-05-26 23:11:33'),
(9, 2, 'Arabe', '[\"vistas/img/doble/arabe01.jpg\", \"vistas/img/doble/arabe02.jpg\", \"vistas/img/doble/arabe03.jpg\",\r\n\"vistas/img/doble/arabe04.jpg\"]', 'vistas/img/doble/arabe-360.jpg', '<p>Una habitación de estilo árabe doble fusiona elementos de diseño inspirados en la rica cultura y tradiciones del mundo árabe para crear un ambiente exótico y lujoso. Las paredes pueden estar decoradas con detalles arquitectónicos como arcos o detalles geométricos tallados, que evocan la belleza de la arquitectura islámica.					</p>	  					<p>Las obras de arte y decoraciones típicas árabes, como jarrones de cerámica, bandejas de latón o cestas de mimbre tejidas a mano, se disponen en estanterías y mesas, añadiendo un toque de autenticidad y sofisticación al ambiente.\r\n\r\nEn esta habitación de estilo árabe doble, se crea una atmósfera de lujo y romance que invita a sumergirse en la belleza y el encanto de la cultura árabe. Es un refugio exótico y elegante donde se puede disfrutar de la hospitalidad y el confort de Oriente Medio.					</p> 					<br> 					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '2024-05-26 23:11:56'),
(10, 2, 'Romana', '[\"vistas/img/doble/romana01.jpg\", \"vistas/img/doble/romana02.jpg\", \"vistas/img/doble/romana03.jpg\",\r\n\"vistas/img/doble/romana04.jpg\"]', 'vistas/img/doble/romana-360.jpg', '<p>Una habitación de estilo doble romana fusiona elementos de diseño inspirados en la grandeza y la elegancia del Imperio Romano para crear un ambiente majestuoso y atemporal. Las paredes pueden estar decoradas con detalles arquitectónicos clásicos, como columnas corintias o molduras ornamentadas, que evocan la grandiosidad de la antigua Roma.					</p>	  					<p>Las obras de arte y decoraciones romanas, como bustos de emperadores, esculturas de dioses y diosas, o frescos inspirados en la antigua Roma, se disponen estratégicamente en estanterías y mesas, añadiendo un toque de autenticidad y nobleza al ambiente.\r\n\r\nEn esta habitación de estilo doble romana, se crea una atmósfera de grandeza y esplendor que invita a sumergirse en la historia y la cultura de la antigua Roma. Es un refugio majestuoso y elegante donde se puede disfrutar del lujo y la sofisticación de una época dorada.				</p> 					<br> 					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '2024-05-26 23:12:17'),
(11, 3, 'Caribeña', '[\"vistas/img/especial/caribena01.jpg\", \"vistas/img/especial/caribena02.jpg\", \"vistas/img/especial/caribena03.jpg\",\r\n\"vistas/img/especial/caribena04.jpg\"]', 'vistas/img/especial/caribena-360.jpg', '<p>Imagina una habitación caribeña especial, donde la alegría, el color y la relajación se combinan para crear un ambiente verdaderamente único y encantador. Las paredes están pintadas en tonos brillantes y vibrantes, como el azul turquesa, el verde esmeralda o el amarillo soleado, evocando la energía y la vitalidad de las islas tropicales.					</p>	  					<p>Las obras de arte y decoraciones caribeñas, como cuadros de paisajes tropicales, máscaras indígenas o artesanías locales, se disponen en estanterías y mesas, añadiendo un toque de autenticidad y calidez al ambiente.\r\n\r\nEn esta habitación caribeña especial, se crea una atmósfera de escapismo y relax, donde se puede disfrutar de la belleza y el encanto de las islas tropicales sin salir de casa. Es un refugio acogedor y exuberante donde se puede desconectar del estrés diario y sumergirse en la magia del Caribe.					</p> 					<br> 					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '2024-05-26 23:12:38'),
(12, 3, 'Colonial', '[\"vistas/img/especial/colonial01.jpg\", \"vistas/img/especial/colonial02.jpg\", \"vistas/img/especial/colonial03.jpg\",\r\n\"vistas/img/especial/colonial04.jpg\"]\r\n', 'vistas/img/especial/colonial-360.jpg', '<p>Imagina una habitación de estilo colonial, donde la elegancia clásica se combina con la comodidad y el encanto del pasado. Las paredes están pintadas en tonos suaves y neutros, como el blanco roto o el beige claro, creando un ambiente sereno y acogedor.					</p>	  					<p>Las obras de arte y decoraciones coloniales, como cuadros de paisajes naturales, mapas antiguos o jarrones de porcelana china, se disponen estratégicamente en estanterías y mesas, añadiendo un toque de autenticidad y distinción al ambiente.\r\n\r\nEn esta habitación de estilo colonial, se crea una atmósfera de elegancia y tradición que invita a sumergirse en la historia y el encanto del pasado. Es un refugio acogedor y refinado donde se puede disfrutar del confort y la belleza de la vida colonial.					</p> 					<br> 					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '2024-05-26 23:13:04'),
(13, 3, 'Hindu', '[\"vistas/img/especial/hindu01.jpg\", \"vistas/img/especial/hindu02.jpg\", \"vistas/img/especial/hindu03.jpg\",\r\n\"vistas/img/especial/hindu04.jpg\"]', 'vistas/img/especial/hindu-360.jpg', '<p>Imagina una habitación de estilo hindú, donde la espiritualidad, el color y la exuberancia se combinan para crear un ambiente verdaderamente único y fascinante. Las paredes están adornadas con papel tapiz o pinturas murales que representan escenas de la mitología hindú, como dioses y diosas, o motivos tradicionales como mandalas y elefantes sagrados.					</p>	  					<p>Las obras de arte y decoraciones hindúes, como estatuas de dioses y diosas, cuencos de cobre o bronce, o saris antiguos convertidos en cortinas, se disponen estratégicamente en estanterías y mesas, añadiendo un toque de autenticidad y espiritualidad al ambiente.\r\n\r\nEn esta habitación de estilo hindú, se crea una atmósfera de calma y serenidad que invita a conectar con la espiritualidad y la belleza de la cultura hindú. Es un refugio exótico y encantador donde se puede disfrutar del lujo y la tranquilidad de Oriente.					</p> 					<br> 					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '2024-05-26 23:13:33'),
(14, 3, 'Marroqui', '[\"vistas/img/especial/marroqui01.jpg\", \"vistas/img/especial/marroqui02.jpg\", \"vistas/img/especial/marroqui03.jpg\",\r\n\"vistas/img/especial/marroqui04.jpg\"]', 'vistas/img/especial/marroqui-360.jpg', '<p>Imagina una habitación de estilo marroquí, donde la exuberancia, el color y la rica tradición cultural se combinan para crear un ambiente exótico y encantador. Las paredes están pintadas en tonos cálidos y terrosos, como el ocre, el terracota o el azul cobalto, evocando la riqueza de los paisajes del norte de África.				</p>	  					<p>Las obras de arte y decoraciones marroquíes, como alfombras kilim, cojines bordados, jarrones de cerámica y bandejas de latón repujado, se disponen estratégicamente en estanterías y mesas, añadiendo un toque de autenticidad y exotismo al ambiente.\r\n\r\nEn esta habitación de estilo marroquí, se crea una atmósfera de opulencia y encanto que invita a sumergirse en la rica cultura y tradiciones del norte de África. Es un refugio exótico y lujoso donde se puede disfrutar del lujo y la belleza de Marruecos.					</p> 					<br> 					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '2024-05-26 23:13:53'),
(15, 3, 'Retro', '[\"vistas/img/especial/retro01.jpg\", \"vistas/img/especial/retro02.jpg\", \"vistas/img/especial/retro03.jpg\",\r\n\"vistas/img/especial/retro04.jpg\"]\r\n', 'vistas/img/especial/retro-360.jpg', '<p>Imagina una habitación con un encanto retro, donde los elementos del pasado se mezclan con un toque de nostalgia y estilo. Las paredes están adornadas con papel tapiz de patrones geométricos o florales, en colores vivos y audaces que evocan la moda y la decoración de décadas pasadas, como los años 60 y 70.					</p>	  					<p>La iluminación es suave y acogedora, con lámparas de pie de estilo retro con pantallas de colores o lámparas colgantes de metal en tonos dorados u oxidados.\n\nEn esta habitación de estilo retro, cada elemento está diseñado para transportarte a otra época, evocando la nostalgia de tiempos pasados mientras se mezcla con la comodidad y funcionalidad de la vida moderna. Es un espacio único y lleno de carácter que invita a la creatividad y la expresión personal.					</p> 					<br> 					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '2024-05-26 23:13:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hotel`
--

CREATE TABLE `hotel` (
  `id` int(11) NOT NULL,
  `ubicacion` text NOT NULL,
  `img` text NOT NULL,
  `precio_vacacional` float NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `hotel`
--

INSERT INTO `hotel` (`id`, `ubicacion`, `img`, `precio_vacacional`, `fecha`) VALUES
(1, 'Santiago', '', 0, '2024-05-28 22:00:13'),
(2, 'VRegion', '', 0, '2024-05-28 22:00:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes`
--

CREATE TABLE `planes` (
  `id` int(11) NOT NULL,
  `tipo` text NOT NULL,
  `img` text NOT NULL,
  `descripcion` text NOT NULL,
  `precio` float NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id_reserva` int(11) NOT NULL,
  `id_habitacion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `pago_reserva` float NOT NULL,
  `numero_transaccion` text NOT NULL,
  `codigo_reserva` text NOT NULL,
  `descripcion_reserva` text NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_salida` date NOT NULL,
  `fecha_reserva` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id_reserva`, `id_habitacion`, `id_usuario`, `pago_reserva`, `numero_transaccion`, `codigo_reserva`, `descripcion_reserva`, `fecha_ingreso`, `fecha_salida`, `fecha_reserva`) VALUES
(1, 1, 1, 200000, '', '9xc9dj19d', 'Habitación Simple Oriental', '2024-05-28', '2024-05-31', '2024-05-26 23:23:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurante`
--

CREATE TABLE `restaurante` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `restaurante`
--

INSERT INTO `restaurante` (`id`, `img`, `descripcion`, `fecha`) VALUES
(1, 'vistas/img/restaurante/plato01.png', 'Una auténtica delicia italiana: pasta al dente con salsa de tomate fresco, albahaca y queso parmesano recién rallado, acompañada de una ensalada caprese con tomate, mozzarella de búfala y hojas de albahaca, todo regado con un toque de aceite de oliva virgen extra y acompañado de una copa de vino tinto Chianti. ¡Una experiencia culinaria que deleitará tus sentidos!', '2024-05-26 23:05:46'),
(2, 'vistas/img/restaurante/plato02.png', 'Disfruta de nuestra jugosa hamburguesa clásica, preparada con carne de res de primera calidad, queso cheddar derretido, lechuga fresca, tomate maduro y cebolla caramelizada, todo servido en un esponjoso pan brioche tostado. ¡Un sabor auténtico que te encantará en cada bocado!', '2024-05-26 23:14:24'),
(3, 'vistas/img/restaurante/plato03.png', 'Una ensalada verde vibrante con hojas de lechuga fresca, espinacas tiernas y rúcula picante, acompañadas de tomates cherry dulces y crujientes tiras de pepino. Todo aderezado con una vinagreta ligera de limón y hierbas frescas, coronado con queso feta desmenuzado y unas pocas aceitunas kalamata para un toque mediterráneo. ¡Una explosión de sabores y texturas en cada bocado!', '2024-05-26 23:06:43'),
(4, 'vistas/img/restaurante/plato04.png', 'Un wrap es como una pequeña fiesta en la palma de tu mano. Imagina una tortilla suave y flexible, rellena de una deliciosa combinación de ingredientes. Puede ser un festival de sabores frescos y vibrantes, como pollo a la parrilla con lechuga crujiente, tomate jugoso, aguacate cremoso y un toque de salsa ranchera. O tal vez prefieras un toque más mediterráneo con falafel dorado, hummus cremoso, pepino fresco, tomate y un toque de salsa de yogur. Sea cual sea tu elección, el wrap es una experiencia gastronómica portátil y versátil, perfecta para disfrutar en cualquier momento del día. ¡Es como un abrazo reconfortante para tu paladar!', '2024-05-26 23:06:45'),
(5, 'vistas/img/restaurante/plato05.png', 'Los aperitivos son como la introducción perfecta a una gran comida, ¿no crees? Pueden ser pequeñas explosiones de sabor que despiertan tu apetito y te preparan para lo que está por venir. Desde clásicos como aceitunas marinadas y rebanadas de queso manchego hasta opciones más elaboradas como croquetas de jamón, buñuelos de bacalao o bruschettas de tomate y albahaca fresca. ¿Qué tal unas mini empanadas rellenas de carne picada o espinacas y queso? O quizás unos rollitos de primavera rellenos de verduras frescas y camarones, acompañados de una salsa agridulce. ¡Los aperitivos son el prólogo perfecto para una experiencia culinaria memorable!', '2024-05-26 23:06:53'),
(6, 'vistas/img/restaurante/plato06.png', 'Lorem ipsum dolor sit amet consectetur', '2024-05-26 23:07:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testimonios`
--

CREATE TABLE `testimonios` (
  `id_testimonio` int(11) NOT NULL,
  `id_res` int(11) NOT NULL,
  `id_us` int(11) NOT NULL,
  `id_hab` int(11) NOT NULL,
  `testimonio` text NOT NULL,
  `aprobado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `testimonios`
--

INSERT INTO `testimonios` (`id_testimonio`, `id_res`, `id_us`, `id_hab`, `testimonio`, `aprobado`, `fecha`) VALUES
(1, 1, 1, 1, 'Estuvo estupendo.', 0, '2024-06-01 21:10:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_u` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `foto` text NOT NULL,
  `modo` text NOT NULL,
  `verificacion` int(11) NOT NULL,
  `email_encriptado` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_u`, `nombre`, `password`, `email`, `foto`, `modo`, `verificacion`, `email_encriptado`, `fecha`) VALUES
(1, 'Jerson huaman', 'null', 'jersonhuberthuamanmoreno@gmail.com', 'https://lh3.googleusercontent.com/a/ACg8ocIZ4WhPlVwdhQ4esqiEOhk-nCWb51uSqstuP-TR9O6qNVnuorCmnQ=s96-c', 'google', 1, 'null', '2024-06-01 19:39:19'),
(2, 'Juan Lopez', '$2a$07$asxx54ahjppf45sd87a5aun1LRjT0o2gp75bDJ5l7Q98H0YYlXiEa', 'jerson.huaman.11@outlook.com', '', 'directo', 1, 'a6a7fe832723152b5afa26cab2493250', '2024-06-01 20:26:49'),
(3, 'jose miguel', '$2a$07$asxx54ahjppf45sd87a5aur0VqwJkHWOS8BLNCM3OWQtVCvREy1HS', 'jerson.huaman@outlook.com', '', 'directo', 1, '799b528a164345ee3c962bac5028aa56', '2024-06-01 21:40:33'),
(4, 'Lopez garcia', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'jerson@gmail.com', '', 'directo', 1, 'd2bef83cf40e6a35d1e866e551253aa0', '2024-06-01 21:40:37');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD PRIMARY KEY (`id_h`);

--
-- Indices de la tabla `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `planes`
--
ALTER TABLE `planes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id_reserva`);

--
-- Indices de la tabla `restaurante`
--
ALTER TABLE `restaurante`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `testimonios`
--
ALTER TABLE `testimonios`
  ADD PRIMARY KEY (`id_testimonio`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_u`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  MODIFY `id_h` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `planes`
--
ALTER TABLE `planes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `restaurante`
--
ALTER TABLE `restaurante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `testimonios`
--
ALTER TABLE `testimonios`
  MODIFY `id_testimonio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
