-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 09-07-2014 a las 19:23:54
-- Versión del servidor: 5.5.37-cll
-- Versión de PHP: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `amigosd4_gestos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(64) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'adminamigosdelgesto', '$2y$10$XYimkNoeEgxVWaipYOEMtuhM8AWg7RyfsGUBX8FQJ5jv4Q8go.ocm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `url_imagen` text NOT NULL,
  `url_video` text NOT NULL,
  `id_categoria_padre` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`, `url_imagen`, `url_video`, `id_categoria_padre`, `status`) VALUES
(30, 'Números', '../resources/categories/Numeros/numeros.jpg', '../resources/categories/Numeros/video1.webm', 0, 1),
(32, 'Abecedario', '../resources/categories/Abecedario/abecedario.jpg', '../resources/categories/Abecedario/CuentaNomina.webm', 0, 1),
(37, 'Pronombres personales y relativos', '../resources/categories/Pronombrespersonalesyrelativos/10519278_10152276373713845_2105197710_n.jpg', '', 0, 1),
(41, 'Adverbios y Conjunciones', '../resources/categories/AdverbiosyConjunciones/10528163_10152276373643845_1464855221_n.jpg', '', 0, 1),
(43, 'Adverbios de Afirmación', '../resources/categories/AdverbiosdeAfirmacion/10008491_10203338157048482_1420568410_n.jpg', '', 41, 1),
(45, 'Adverbios de tiempo', '../resources/categories/Adverbiosdetiempo/imagendelacategoria.jpg', '', 41, 1),
(47, 'Adverbios de negación', '../resources/categories/Adverbiosdenegacion/10521346_10203343717649535_831833822_n.jpg', '', 41, 1),
(49, 'Adverbios de Modo', '../resources/categories/AdverbiosdeModo/10449786_10203338157368490_5838077_n.jpg', '', 41, 1),
(50, 'Adverbios de Cantidad', '../resources/categories/AdverbiosdeCantidad/10501378_10203338157408491_112754979_n.jpg', '', 41, 1),
(52, 'Adverbios de Lugar', '../resources/categories/AdverbiosdeLugar/10489199_10203338156888478_1562434577_n.jpg', '', 41, 1),
(55, 'Conjunciones', '../resources/categories/Conjunciones/10490122_10203338157128484_1202795064_n.jpg', '', 41, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejemplo`
--

CREATE TABLE IF NOT EXISTS `ejemplo` (
  `id_ejemplo` int(11) NOT NULL AUTO_INCREMENT,
  `id_gesto` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `url_imagen` text NOT NULL,
  PRIMARY KEY (`id_ejemplo`),
  KEY `fk_ejemplo_gesto_idx` (`id_gesto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `ejemplo`
--

INSERT INTO `ejemplo` (`id_ejemplo`, `id_gesto`, `titulo`, `url_imagen`) VALUES
(1, 10, 'Uno', '../resources/gestures/1-Uno/examples/139653252718011.png'),
(2, 11, 'Dos', '../resources/gestures/2-Dos/examples/139653259072582.png'),
(3, 12, 'Tres', '../resources/gestures/3-Tres/examples/139653263743643.png'),
(4, 13, 'Cuatro', '../resources/gestures/4-Cuatro/examples/139653267381654.png'),
(5, 14, 'Cinco', '../resources/gestures/5-Cinco/examples/139653269145355.png'),
(6, 15, 'Seis', '../resources/gestures/6-Seis/examples/139653271134676.png'),
(7, 16, 'Siete', '../resources/gestures/7-Siete/examples/139653274479767.png'),
(8, 17, 'Ocho', '../resources/gestures/8-Ocho/examples/139653276564188.png'),
(9, 18, 'Nueve', '../resources/gestures/9-Nueve/examples/139653278563399.png'),
(10, 10, 'Uno', '../resources/gestures/1-Uno/examples/139653461012031.jpg'),
(11, 11, 'Dos', '../resources/gestures/2-Dos/examples/13965347626812.jpg'),
(12, 12, 'Tres', '../resources/gestures/3-Tres/examples/139653487571653.jpg'),
(13, 13, 'Cuatro', '../resources/gestures/4-Cuatro/examples/139653494358244.jpg'),
(14, 14, 'Cinco', '../resources/gestures/5-Cinco/examples/139653507991415.jpg'),
(15, 15, 'Seis', '../resources/gestures/6-Seis/examples/13965351817046.jpg'),
(16, 16, 'Siete', '../resources/gestures/7-Siete/examples/139653524974297.jpg'),
(17, 17, 'Ocho', '../resources/gestures/8-Ocho/examples/139653530612318.jpg'),
(18, 18, 'Nueve', '../resources/gestures/9-Nueve/examples/139653536594359.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gesto`
--

CREATE TABLE IF NOT EXISTS `gesto` (
  `id_gesto` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `definicion` text,
  `url_video` text NOT NULL,
  `url_imagen` text NOT NULL,
  PRIMARY KEY (`id_gesto`),
  KEY `fk_gest_categoria_idx` (`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=104 ;

--
-- Volcado de datos para la tabla `gesto`
--

INSERT INTO `gesto` (`id_gesto`, `id_categoria`, `titulo`, `definicion`, `url_video`, `url_imagen`) VALUES
(10, 30, '1 - Uno', 'Uno', '../resources/gestures/1-Uno/1.mp4', '../resources/gestures/1-Uno/1.jpg'),
(11, 30, '2 - Dos', 'Dos', '../resources/gestures/2-Dos/2.mp4', '../resources/gestures/2-Dos/2.jpg'),
(12, 30, '3 - Tres', 'Tres', '../resources/gestures/3-Tres/3.mp4', '../resources/gestures/3-Tres/3.jpg'),
(13, 30, '4 - Cuatro', 'Cuatro', '../resources/gestures/4-Cuatro/4.mp4', '../resources/gestures/4-Cuatro/4.jpg'),
(14, 30, '5 - Cinco', 'Cinco', '../resources/gestures/5-Cinco/5.mp4', '../resources/gestures/5-Cinco/5.jpg'),
(15, 30, '6 - Seis', 'Seis', '../resources/gestures/6-Seis/6.mp4', '../resources/gestures/6-Seis/6.jpg'),
(16, 30, '7 - Siete', 'Siete', '../resources/gestures/7-Siete/7.mp4', '../resources/gestures/7-Siete/7.jpg'),
(17, 30, '8 - Ocho', 'Ocho', '../resources/gestures/8-Ocho/8.mp4', '../resources/gestures/8-Ocho/8.jpg'),
(18, 30, '9 - Nueve', 'Nueve', '../resources/gestures/9-Nueve/9.mp4', '../resources/gestures/9-Nueve/9.jpg'),
(20, 32, 'B', 'Segunda letra del abecedario español y del orden latino internacional, que representa un fonema consonántico labial y sonoro. Su nombre es be, be alta o be larga.', '../resources/gestures/B/B.mp4', '../resources/gestures/B/b.jpg'),
(22, 32, 'D', 'Quinta letra del abecedario español, y cuarta del orden latino internacional, que representa un fonema consonántico dental y sonoro. Su nombre es de.', '../resources/gestures/D/D.mp4', '../resources/gestures/D/d.jpg'),
(23, 32, 'C', 'Tercera letra del abecedario español y del orden latino internacional, que representa, ante las vocales e, i, un fonema consonántico fricativo, interdental, sordo, identificado con el alveolar o dental en zonas de seseo, y en los demás casos un fonema oclusivo, velar y sordo. Su nombre es ce.', '../resources/gestures/C/C.mp4', '../resources/gestures/C/c.jpg'),
(24, 32, 'E', 'Sexta letra del abecedario español, y quinta del orden latino internacional, que representa un fonema vocálico medio y palatal.', '../resources/gestures/E/E.mp4', '../resources/gestures/E/e.jpg'),
(25, 32, 'F', 'Séptima letra del abecedario español, y sexta del orden latino internacional, que representa un fonema consonántico fricativo, labiodental, sordo. Su nombre es efe.', '../resources/gestures/F/F.mp4', '../resources/gestures/F/f.jpg'),
(26, 32, 'G', 'Octava letra del abecedario español, y séptima del orden latino internacional, que representa, ante las vocales e, i, un fonema consonántico fricativo velar y sordo, y en los demás casos un fonema consonántico velar y sonoro.', '../resources/gestures/G/G.mp4', '../resources/gestures/G/g.jpg'),
(27, 32, 'H', 'Novena letra del abecedario español, y octava del orden latino internacional. Su nombre es hache. En la lengua general no representa sonido alguno. Suele aspirarse en la dicción de algunas zonas españolas y americanas y en determinadas voces de origen extranjero.', '../resources/gestures/H/H.mp4', '../resources/gestures/H/h.jpg'),
(28, 32, 'I', 'Décima letra del abecedario español, y novena del orden latino internacional, que representa un sonido vocálico cerrado y palatal.', '../resources/gestures/I/I.mp4', '../resources/gestures/I/i.jpg'),
(29, 32, 'J', 'Undécima letra del abecedario español, y décima del orden latino internacional, que representa un fonema consonántico de articulación fricativa, velar y sorda. Su nombre es jota. La mayor o menor tensión con que se articula en diferentes países y regiones produce variedades que van desde la vibrante a la simple aspiración.', '../resources/gestures/J/J.mp4', '../resources/gestures/J/j.jpg'),
(30, 32, 'K', 'Duodécima letra del abecedario español, y undécima del orden latino internacional, que representa un fonema consonántico oclusivo, velar y sordo. Su nombre es ka.', '../resources/gestures/K/K.mp4', '../resources/gestures/K/k.jpg'),
(31, 32, 'A', 'Primera letra del abecedario español y del orden latino internacional, que representa un fonema vocálico abierto y central.', '../resources/gestures/A/A.mp4', '../resources/gestures/A/a.jpg'),
(35, 37, 'Yo', 'Pronombre personal de primera persona de singular, que en la oración desempeña la función de sujeto.', '../resources/gestures/Yo/yo.mp4', '../resources/gestures/Yo/yo2.jpg'),
(36, 37, 'Tu', 'Forma del determinante posesivo en segunda persona del singular.', '../resources/gestures/Tu/tu.mp4', '../resources/gestures/Tu/tu2.jpg'),
(37, 37, 'El', 'Pronombre personal de primera persona de singular. Pronombre con el cual la persona que habla o escribe se refiere a una tercera persona distinta del  interlocutor.', '../resources/gestures/El/el.mp4', '../resources/gestures/El/el.jpg'),
(38, 37, 'Ella', 'Pronombre personal de tercera persona femenina del singular.', '../resources/gestures/Ella/ella.mp4', '../resources/gestures/Ella/ella.jpg'),
(39, 37, 'Ellos', 'Pronombre personal de tercera persona de plural.', '../resources/gestures/Ellos/ellos.mp4', '../resources/gestures/Ellos/ellos.jpg'),
(40, 37, 'Ellas', 'Pronombre personal de tercera persona femenina en plural.', '../resources/gestures/Ellas/ellas.mp4', '../resources/gestures/Ellas/ellas.jpg'),
(41, 37, 'Ustedes', 'Forma del pronombre personal de segunda persona, que en la oración desempeña la función de sujeto y de complemento con preposición.', '../resources/gestures/Ustedes/ustedes.mp4', '../resources/gestures/Ustedes/ustedes.jpg'),
(42, 37, 'Nosotros', 'Pronombre personal de primera persona de plural.', '../resources/gestures/Nosotros/nosotros.mp4', '../resources/gestures/Nosotros/nosotros.jpg'),
(43, 37, 'Quien', 'Introduce una oración que indica la identidad o la característica de una persona. "vimos a quien tú ya sabes; él es quien tiene que dar el primer paso; mi  amigo, a quien no conoces, suele hacer cosas así".', '../resources/gestures/Quien/quien.mp4', '../resources/gestures/Quien/quien.jpg'),
(44, 37, 'Cual', 'Introduce una oración con información sobre el nombre al que dicha oración complementa.', '../resources/gestures/Cual/cual.mp4', '../resources/gestures/Cual/descarga.jpg'),
(48, 43, 'Si', 'Indica afirmación o asentimiento, especialmente como respuesta a una pregunta.', '../resources/gestures/Si/si.mp4', '../resources/gestures/Si/si.jpg'),
(60, 49, 'Cómodo ', 'Indica que la persona se encuentra a gusto.', '../resources/gestures/Comodo/comodo.mp4', '../resources/gestures/Comodo/comodo.jpg'),
(62, 49, 'Bien', 'Del mejor modo posible o de un modo correcto de acuerdo con una norma implícita, una convención sobreentendida, lo que se supone o espera que debería ser u ocurrir, etc.', '../resources/gestures/Bien/bien.mp4', '../resources/gestures/Bien/bien.jpg'),
(63, 49, 'Despacio', 'Con lentitud, a una velocidad inferior a la habitual o a la que se considera normal.', '../resources/gestures/Despacio/despacio.mp4', '../resources/gestures/Despacio/despacio2.jpg'),
(64, 49, 'Mal ', 'De un modo que no se considera correcto o adecuado de acuerdo con una norma sobreentendida, o de forma total o parcialmente contraria a lo que se supone o espera que debería ser u ocurrir.', '../resources/gestures/Mal/mal.mp4', '../resources/gestures/Mal/mal.jpg'),
(65, 49, 'Rápido ', 'A gran velocidad, con rapidez. Con prontitud, enseguida. En muy poco tiempo.', '../resources/gestures/Rapido/rapido.mp4', '../resources/gestures/Rapido/rapido3.jpg'),
(67, 50, 'Cuántos', 'Se usa para preguntar una cantidad o número.', '../resources/gestures/Cuantos/cuantos.mp4', '../resources/gestures/Cuantos/cuantos2.jpg'),
(68, 50, 'Más', 'Establece una comparación de superioridad entre un término y otro u otros que pueden ser explícitos o quedar implícitos; se utiliza para comparar cifras, medidas, etc., pero también para contraponer situaciones, acciones, etc.', '../resources/gestures/Mas/mas.mp4', '../resources/gestures/Mas/mas.jpg'),
(69, 50, 'Menos', 'Se utiliza para comparar cifras, medidas, etc., indicando la inferioridad, pero también para contraponer situaciones, acciones, etc.; establece una comparación de inferioridad entre un término y otro u otros que pueden ser explícitos o quedar implícitos.', '../resources/gestures/Menos/menos.mp4', '../resources/gestures/Menos/menos.jpg'),
(70, 50, 'Mucho', 'Indica que la acción denotada por el verbo se produce en una intensidad o grado elevados, especialmente cuando es mayor de lo que se esperaba o de lo que suele considerarse normal.', '../resources/gestures/Mucho/mucho.mp4', '../resources/gestures/Mucho/mucho2.jpg'),
(71, 50, 'Poco', 'Indica que la acción denotada por el verbo se produce en una intensidad o grado bajos, especialmente cuando es menor de lo que se esperaba o de lo que suele considerarse normal.', '../resources/gestures/Poco/poco.mp4', '../resources/gestures/Poco/poco.jpg'),
(72, 37, 'Suyo', 'Forma del posesivo de tercera persona del singular; indica que el nombre al que acompaña pertenece, se relaciona, está asociado, etc., con una tercera persona distinta de la persona que habla o escribe y de su interlocutor, o con la persona a la que se habla cuando se la trata de usted.', '../resources/gestures/Suyo/suyo.mp4', '../resources/gestures/Suyo/el.jpg'),
(73, 52, 'Abajo ', 'En dirección a un lugar que está en una posición inferior a otro que se toma como referencia.', '../resources/gestures/Abajo/abajo.mp4', '../resources/gestures/Abajo/abajo2.jpg'),
(74, 52, 'Arriba', 'En dirección a un lugar que está en una posición superior a otro que se toma como referencia.', '../resources/gestures/Arriba/arriba.mp4', '../resources/gestures/Arriba/arriba2.jpg'),
(75, 52, 'Cerca ', 'En un lugar próximo a otro que se toma como referencia.', '../resources/gestures/Cerca/cerca.mp4', '../resources/gestures/Cerca/cerca.jpg'),
(77, 52, 'Detrás', 'En la parte posterior de una persona o cosa, o en lugar más retrasado.', '../resources/gestures/Detras/detras.mp4', '../resources/gestures/Detras/detras.jpg'),
(78, 52, 'Donde', 'Introduce una oración que indica el lugar en el que está u ocurre algo.', '../resources/gestures/Donde/donde.mp4', '../resources/gestures/Donde/donde.jpg'),
(79, 52, 'Frente', 'Enfrente o en un lugar que está delante de la parte exterior que se considera principal en algo', '../resources/gestures/Frente/frente.mp4', '../resources/gestures/Frente/frente.jpg'),
(80, 52, 'Lejos', 'En un lugar situado a gran distancia de otro lugar que se toma como referencia.', '../resources/gestures/Lejos/lejos.mp4', '../resources/gestures/Lejos/lejos.jpg'),
(85, 43, 'También ', 'Indica que cierta información nueva se añade a otra ya conocida o expresada con anterioridad.', '../resources/gestures/Tambien/tambien.mp4', '../resources/gestures/También /prueba.jpg'),
(86, 52, 'Delante', 'En un lugar que está en una posición anterior a otro que se toma como referencia, que puede ser el propio observador u otra persona o cosa, o en un lugar  que queda más próximo al observador que otro lugar que está alineado con estos.', '../resources/gestures/Delante/delante.mp4', '../resources/gestures/Delante/prueba.jpg'),
(87, 49, 'Solamente', 'Se utiliza para cuantificar oraciones o sintagmas, e indica que no se incluye ninguna otra cosa además de la que se expresa.', '../resources/gestures/Solamente/solamente.mp4', '../resources/gestures/Solamente/prueba.jpg'),
(88, 47, 'Jamás', 'En ninguna ocasión.', '../resources/gestures/Jamas/jamas.mp4', '../resources/gestures/Jamás/prueba.jpg'),
(89, 47, 'Nada', 'De ninguna manera, de ningún modo.', '../resources/gestures/Nada/nada.mp4', '../resources/gestures/Nada/prueba.jpg'),
(90, 47, 'No', 'Se utiliza para negar; puede constituir por sí solo una respuesta negativa.', '../resources/gestures/No/no.mp4', '../resources/gestures/No/prueba.jpg'),
(91, 45, 'Ahora', 'Indica el momento mismo en el que se habla o se escribe.', '../resources/gestures/Ahora/ahora.mp4', '../resources/gestures/Ahora/prueba.jpg'),
(92, 45, 'Antes', 'Precediendo en el tiempo, inmediatamente o en un momento no muy lejano; puede referirse tanto al tiempo del cual se habla como al momento en el que se habla o se escribe.', '../resources/gestures/Antes/antes.mp4', '../resources/gestures/Antes/prueba.jpg'),
(93, 45, 'Cuando', 'Introduce una oración que indica el tiempo en el que se sitúa u ocurre algo. Introduce una oración que indica una condición o una situación hipotética, con carácter general o bien en el futuro.', '../resources/gestures/Cuando/cuando.mp4', '../resources/gestures/Cuando/prueba.jpg'),
(94, 45, 'Despues', 'Más tarde en el tiempo, inmediatamente o en un momento no muy lejano; puede referirse tanto al tiempo del cual se habla como al momento en el que se habla o se escribe.', '../resources/gestures/Despues/despues.mp4', '../resources/gestures/Despues/prueba.jpg'),
(95, 45, 'Entonces', 'En el momento o en el tiempo del cual se está hablando. Inmediatamente después en el tiempo.', '../resources/gestures/Entonces/entonces.mp4', '../resources/gestures/Entonces/prueba.jpg'),
(96, 45, 'Nunca', 'En ninguna ocasión.', '../resources/gestures/Nunca/nunca.mp4', '../resources/gestures/Nunca/prueba.jpg'),
(97, 45, 'Siempre', 'En cualquier momento del tiempo, sin interrupción; se puede referir a la totalidad del tiempo o a la totalidad del tiempo considerado.', '../resources/gestures/Siempre/siempre.mp4', '../resources/gestures/Siempre/prueba.jpg'),
(98, 45, 'Tarde', 'Después del momento señalado, acostumbrado, previsto o considerado conveniente. A una hora avanzada en relación con la parte del día que se considera o después de lo que es habitual.', '../resources/gestures/Tarde/tarde.mp4', '../resources/gestures/Tarde/prueba.jpg'),
(99, 45, 'Temprano', 'Antes del momento señalado, acostumbrado, previsto o considerado conveniente; generalmente indica el principio de un período de tiempo largo.', '../resources/gestures/Temprano/temprano.mp4', '../resources/gestures/Temprano/prueba.jpg'),
(100, 55, 'Pero', 'Introduce una circunstancia que matiza, se opone o contradice parcialmente lo dicho o lo que ello permite deducir o suponer.', '../resources/gestures/Pero/pero.mp4', '../resources/gestures/Pero/prueba.jpg'),
(101, 55, 'Porque', 'Introduce una oración en la que se indica la causa o la explicación de algo que se expresa.', '../resources/gestures/Porque/porque.mp4', '../resources/gestures/Porque/prueba.jpg'),
(102, 55, 'Sino', 'Introduce una afirmación que se opone a una negación previa; se utiliza para enlazar dos palabras, sintagmas u oraciones.', '../resources/gestures/Sino/sino.mp4', '../resources/gestures/Sino/prueba.jpg'),
(103, 55, 'Y', 'Se utiliza para enlazar dos palabras, grupos de palabras u oraciones que están en el mismo nivel sintáctico y tienen la misma función; indica adición.', '../resources/gestures/Y/y.mp4', '../resources/gestures/Y/Y-300.png');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ejemplo`
--
ALTER TABLE `ejemplo`
  ADD CONSTRAINT `fk_ejemplo_gesto` FOREIGN KEY (`id_gesto`) REFERENCES `gesto` (`id_gesto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `gesto`
--
ALTER TABLE `gesto`
  ADD CONSTRAINT `fk_gest_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
