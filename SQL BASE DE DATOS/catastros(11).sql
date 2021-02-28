-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 28-02-2021 a las 16:05:10
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `catastros`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cobro`
--

CREATE TABLE `cobro` (
  `co_id` int(11) NOT NULL,
  `prop_id` int(11) DEFAULT NULL,
  `co_fecha` date DEFAULT NULL,
  `co_valortotal` varchar(25) DEFAULT NULL,
  `estado` varchar(15) NOT NULL,
  `sumacobro` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cobro`
--

INSERT INTO `cobro` (`co_id`, `prop_id`, `co_fecha`, `co_valortotal`, `estado`, `sumacobro`) VALUES
(11, 17, '1899-11-30', '32131', 'Pagado', '23'),
(12, 25, '2021-02-13', '670', 'Por Pagar', '500'),
(13, 17, '2021-02-17', '123', 'Pagado', '73291'),
(15, 17, '2021-02-18', '213123', 'Por Pagar', '73291'),
(16, 17, '2021-02-18', '123', 'Pagado', '73291'),
(18, 20, '2021-02-21', '56', 'Por pagar', '73291'),
(21, 17, '2021-02-24', '45', 'Pagado', '71000'),
(24, 17, '2021-02-22', '45', 'Por pagar', '71700'),
(28, 17, '2021-02-22', '89', 'Pagado', '73991'),
(29, 18, '2021-02-23', '78', 'Por pagar', '70000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comunidad`
--

CREATE TABLE `comunidad` (
  `comu_id` int(11) NOT NULL,
  `comu_nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comunidad`
--

INSERT INTO `comunidad` (`comu_id`, `comu_nombre`) VALUES
(1, 'guantug loma'),
(2, 'ramal paredes'),
(3, 'quinche centro'),
(13, 'cuatro esquinas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecobro`
--

CREATE TABLE `detallecobro` (
  `deta_id` int(11) NOT NULL,
  `co_id` int(11) DEFAULT NULL,
  `deta_descripcionrubro` varchar(100) DEFAULT NULL,
  `deta_valorrubro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestionriego`
--

CREATE TABLE `gestionriego` (
  `ges_id` int(11) NOT NULL,
  `propi_id` varchar(100) DEFAULT NULL,
  `ges_horariego` time DEFAULT NULL,
  `ges_metroscubicosconsumo` float DEFAULT NULL,
  `ges_fecharegistro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenespropiedad`
--

CREATE TABLE `imagenespropiedad` (
  `idimagen` int(11) NOT NULL,
  `prop_id` int(11) DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `cod_log` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `contraseña` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`cod_log`, `nombre`, `apellido`, `usuario`, `contraseña`) VALUES
(5, 'William ', 'Avila', 'william', '123'),
(18, 'Anthony G', 'Arteaga ', 'admin', 'admin'),
(19, 'Juan Fernando', 'Uribe', '1', '12345'),
(20, 'luz yanneth', 'restrepo gallego', 'mriaaa', '12345'),
(21, 'Hector Javier', 'Ulpo Pilamunga', 'xavi', '12345'),
(22, 'John ', 'Paredes', 'john', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedad`
--

CREATE TABLE `propiedad` (
  `propi_id` int(11) NOT NULL,
  `propi_metros` varchar(100) DEFAULT NULL,
  `propi_longitud` varchar(100) DEFAULT NULL,
  `propi_latitud` varchar(100) DEFAULT NULL,
  `propi_sector` varchar(100) DEFAULT NULL,
  `propi_calleprincipal` varchar(100) DEFAULT NULL,
  `propi_callesecundaria` varchar(100) DEFAULT NULL,
  `propi_ciudad` varchar(100) DEFAULT NULL,
  `propi_parroquia` varchar(100) DEFAULT NULL,
  `propi_comunidad` varchar(100) NOT NULL,
  `utm` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `propiedad`
--

INSERT INTO `propiedad` (`propi_id`, `propi_metros`, `propi_longitud`, `propi_latitud`, `propi_sector`, `propi_calleprincipal`, `propi_callesecundaria`, `propi_ciudad`, `propi_parroquia`, `propi_comunidad`, `utm`) VALUES
(1, '1 619 146', '-78.620720', '-1.244874', 'Quinche las lajas', 'Cerro Azul', 'Yanahurco', 'Ambato', 'Huachi Loreto ', '   Cuatro esquinas', '29T 548929 4801142'),
(2, '1706', '-78.682075', '-1.317658', 'misquilli', 'quinche', 'bolivar', 'Ambato', 'Huachi Chico', ' quinche centro', '29T 548929 4801142'),
(3, '2291', ' -78.637733', '-1.240151', 'Atocha - Ficoa', 'dsfsdf', 'fsdfsdf', 'sdfsdf', 'Huachi Loreto', '  guantug loma', '29T 548929 4801142'),
(4, '70000', '-79.040429', '-1.708915', 'adasd', 'asdasd', 'asdasd', 'asdasdad', 'La Merced', ' ramal paredes', '29T 548929 4801142'),
(5, '700', '-78.637733', '-1.240151', 'sd', 'sad', 'asd', 'ad', 'ad', '  Quinche', '29T 548929 4801142'),
(7, '500', '-78.637733', '-1.240151', 'Ambato', 'Seymur', 'Isabella', 'Ambato', 'Huachi', '  quinche centro', '29T 548929 4801142');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietario`
--

CREATE TABLE `propietario` (
  `prop_id` int(11) NOT NULL,
  `prop_nombre` varchar(100) DEFAULT NULL,
  `prop_apellido` varchar(100) DEFAULT NULL,
  `prop_edad` int(11) DEFAULT NULL,
  `prop_direccion` varchar(100) DEFAULT NULL,
  `prop_ecivil` varchar(100) DEFAULT NULL,
  `prop_correo` varchar(100) DEFAULT NULL,
  `prop_cedula` varchar(10) DEFAULT NULL,
  `prop_telefono` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `propietario`
--

INSERT INTO `propietario` (`prop_id`, `prop_nombre`, `prop_apellido`, `prop_edad`, `prop_direccion`, `prop_ecivil`, `prop_correo`, `prop_cedula`, `prop_telefono`) VALUES
(17, 'William ', 'Avila', 25, 'Ambato', 'Soltero', 'william@gmail.com', '1802020202', '0960156596'),
(18, 'Armando Andrade', 'arteagaA ', 22, 'AVENIDA NIÑOS HEROES NO. 3', 'Soltero', 'arteaga17000@gmail.com', '0202269080', '0997174988'),
(19, 'ADRIANA CAROLINA', 'HERNANDEZ MONTERROZA', 34, 'CARRETERA MEXICO-LAREDO KM.125', 'Viudo', 'juribe@idiomas.udea.edu.co ', '24234234', '234234234'),
(20, 'ALEJANDRO', 'ABONDANO ACEVEDO', 22, 'AV. GUADALUPE S/N', 'Soltero', 'hersy@epm.net.co ', '432534534', '4534234234'),
(21, 'ANDREA CATALINA', 'ACERO CARO', 22, 'PLAZA CONSTITUCION NO. 1', 'Casado', 'jferdusi@terra.com', '3424356344', '32445321376'),
(22, 'ANDRES FELIPE', 'VILLA MONROY', 23, 'AVENIDA MIGUEL HIDALGO S/N', 'Casado', 'urestrepo @idiomas.udea.edu.co ', '123123123', '234435432'),
(23, 'ANDREA LILIANA', 'CRUZ GARCIA', 22, 'AV. 16 DE JULIO S/N', 'Soltero', ' onaranjo @idiomas.udea.edu.co ', '123123', '123123123'),
(24, 'BRIGITE', 'POLANCO RUIZ', 22, 'CENTRO DE LA COMUNIDAD', 'Casado', 'dcanas@idiomas.udea.edu.co ', '2342343354', '123123123'),
(25, 'CAMILO', 'VILLAMIZAR ARISTIZABAL', 45, 'PLAZA MORELOS NO.12', ' Divorciado', 'vhiguita@idiomas.udea,edu.co ', '123456789', '213324324'),
(26, 'ANDRES', 'ZAPATA', 34, 'AMBATO', 'Soltero', 'andresz@gmail.com', '1265756756', '2131365756'),
(41, '1', '1', 1, '1', 'Viudo', '1', '1', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietario_propiedad`
--

CREATE TABLE `propietario_propiedad` (
  `propro_codigo` int(11) NOT NULL,
  `prop_id` int(11) DEFAULT NULL,
  `propi_id` int(11) DEFAULT NULL,
  `tipodeasignacion` varchar(100) DEFAULT NULL,
  `fechadeasignacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `propietario_propiedad`
--

INSERT INTO `propietario_propiedad` (`propro_codigo`, `prop_id`, `propi_id`, `tipodeasignacion`, `fechadeasignacion`) VALUES
(12, 17, 1, 'Usuario Actual', '2021-01-20'),
(13, 16, 3, 'Usuario Actual', '2021-01-21'),
(14, 9, 2, 'Usuario Actual', '2021-01-18'),
(15, 13, 7, 'Usuario Actual', '2021-01-30'),
(16, 13, 2, 'Usuario Actual', '2021-01-30'),
(17, 23, 2, 'Usuario Actual', '2021-02-07'),
(18, 21, 5, 'Usuario Anterior', '2021-02-07'),
(19, 25, 4, 'Usuario Anterior', '2021-02-07'),
(20, 26, 1, 'Usuario Anterior', '2021-02-07'),
(21, 17, 7, 'Usuario Actual', '2021-02-13'),
(23, 17, 4, 'Usuario Actual', '2021-02-25'),
(24, 20, 4, 'Usuario Actual', '2021-02-19'),
(25, 17, 5, 'Usuario Actual', '2021-02-21'),
(26, 21, 8, 'Usuario Anterior', '2021-02-11'),
(27, 30, 8, 'Usuario Actual', '2021-02-16'),
(29, 31, 1, 'Usuario Actual', '2021-02-22'),
(30, 31, 5, 'Usuario Actual', '2021-02-22'),
(31, 32, 4, 'Usuario Anterior', '2021-02-22'),
(32, 32, 5, 'Usuario Actual', '2021-02-22'),
(34, 18, 4, 'Usuario Actual', '2021-02-23'),
(35, 33, 1, 'Usuario Actual', '2021-02-23'),
(36, 19, 1, 'Usuario Actual', '2021-02-23'),
(37, 34, 4, 'Usuario Anterior', '2021-02-25'),
(38, 34, 4, 'Usuario Actual', '2021-02-25'),
(39, 38, 2, 'Usuario Actual', '2021-02-09'),
(40, 40, 3, 'Usuario Actual', '2021-02-25'),
(47, 40, 2, 'Usuario Actual', '2021-02-25'),
(48, 22, 2, 'Usuario Actual', '2021-02-23'),
(49, 26, 3, 'Usuario Actual', '2021-02-25'),
(50, 17, 7, 'Usuario Actual', '2021-02-25'),
(51, 42, 3, 'Usuario Actual', '2021-02-26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `riego`
--

CREATE TABLE `riego` (
  `riego_id` int(11) NOT NULL,
  `propi_id` int(11) DEFAULT NULL,
  `riego_dias` varchar(100) DEFAULT NULL,
  `riego_horas` varchar(100) DEFAULT NULL,
  `riego_observaciones` varchar(100) DEFAULT NULL,
  `riego_fecha` date DEFAULT NULL,
  `prop_nombre` varchar(100) DEFAULT NULL,
  `prop_apellido` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `riego`
--

INSERT INTO `riego` (`riego_id`, `propi_id`, `riego_dias`, `riego_horas`, `riego_observaciones`, `riego_fecha`, `prop_nombre`, `prop_apellido`) VALUES
(23, 1, 'Jueves', '6-11', 'SECTOR LOS GILCES, PLAYA INGRESO A CRUCITA 1 3KM DEL SECTOR LOS ARENALES POR BELLO ALTO', '2021-02-23', 'ANDRES', 'ZAPATA'),
(24, 7, 'Lunes', '7 a 8', 'SOLAR Y CASA 32 MZ 155  Y  SOLAR Y CASA 33 MZ 155  CON UN TOTAL DE CONSTRUCCIONES DE  1.066,55 M2 PI', '2021-02-11', 'William ', 'Avila'),
(25, 2, 'Domingo', '9horas', '12 LOTES DE TERRENO DESDE 1.700 m2 HASTA 2.288 m2 UBICADOS EN LA LOTIZACIÓN LOS CANALES KM 5 VÍA NOB', '2021-02-08', 'ANDREA LILIANA', 'CRUZ GARCIA'),
(26, 4, 'Lunes', '6horas', 'BODEGAS EN LA SEGUNDA ETAPA DEL EDIF. WORLD TRADE CENTER, URB. KENNEDY NORTE, ENTRE LAS CALLES FRANC', '2021-02-25', 'William ', 'Avila'),
(27, 2, 'Viernes', '8horas', 'PLANTA EXTRACTORA Y REFINADORA DE ACEITE VEGETAL EN PRODUCCIÓN. OFICINAS BODEGAS Y TALLERES  ', '2021-02-07', 'ANDREA LILIANA', 'CRUZ GARCIA'),
(28, 1, 'Jueves', '5horas', 'CALLE 15 Y AVENIDA 13  TERRENO DE  814,62 M2  CON VARIAS CONSTRUCCIONES  COMO CANCHAS DEPORTIVAS 675', '2021-02-23', 'ANDRES', 'ZAPATA'),
(29, 3, 'Viernes', '3horas', 'LOTE DE TERRENO DE 28.000 m2 UBICADO EN LA PARROQUIA TARQUI. CALLE 333 JORGE MEDRANA CHAVEZ. CIUDADE', '2021-02-26', 'William ', 'Avila'),
(30, 7, 'Sábado', '8horas', 'SECTOR LOS GILCES, PLAYA INGRESO A CRUCITA 1 3KM DEL SECTOR LOS ARENALES', '2021-02-19', 'William ', 'Avila'),
(31, 3, 'Sábado', '3-7', 'etetert', '2021-02-26', '', '');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `terrenosvis`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `terrenosvis` (
`prop_nombre` varchar(100)
,`prop_apellido` varchar(100)
,`prop_cedula` varchar(10)
,`propi_id` int(11)
,`propi_metros` varchar(100)
,`propi_longitud` varchar(100)
,`propi_ciudad` varchar(100)
,`propi_parroquia` varchar(100)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `terrenosvista`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `terrenosvista` (
`prop_nombre` varchar(100)
,`prop_apellido` varchar(100)
,`prop_id` int(11)
,`prop_cedula` varchar(10)
,`propi_id` int(11)
,`propi_metros` varchar(100)
,`propi_comunidad` varchar(100)
,`propi_latitud` varchar(100)
,`propi_longitud` varchar(100)
,`propi_ciudad` varchar(100)
,`propi_parroquia` varchar(100)
,`tipodeasignacion` varchar(100)
,`propro_codigo` int(11)
,`fechadeasignacion` date
);

-- --------------------------------------------------------

--
-- Estructura para la vista `terrenosvis`
--
DROP TABLE IF EXISTS `terrenosvis`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `terrenosvis`  AS SELECT `propietario`.`prop_nombre` AS `prop_nombre`, `propietario`.`prop_apellido` AS `prop_apellido`, `propietario`.`prop_cedula` AS `prop_cedula`, `propietario_propiedad`.`propi_id` AS `propi_id`, `propiedad`.`propi_metros` AS `propi_metros`, `propiedad`.`propi_longitud` AS `propi_longitud`, `propiedad`.`propi_ciudad` AS `propi_ciudad`, `propiedad`.`propi_parroquia` AS `propi_parroquia` FROM ((`propietario_propiedad` join `propiedad` on(`propietario_propiedad`.`propi_id` = `propiedad`.`propi_id`)) join `propietario` on(`propietario_propiedad`.`prop_id` = `propietario`.`prop_id`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `terrenosvista`
--
DROP TABLE IF EXISTS `terrenosvista`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `terrenosvista`  AS SELECT `propietario`.`prop_nombre` AS `prop_nombre`, `propietario`.`prop_apellido` AS `prop_apellido`, `propietario`.`prop_id` AS `prop_id`, `propietario`.`prop_cedula` AS `prop_cedula`, `propietario_propiedad`.`propi_id` AS `propi_id`, `propiedad`.`propi_metros` AS `propi_metros`, `propiedad`.`propi_comunidad` AS `propi_comunidad`, `propiedad`.`propi_latitud` AS `propi_latitud`, `propiedad`.`propi_longitud` AS `propi_longitud`, `propiedad`.`propi_ciudad` AS `propi_ciudad`, `propiedad`.`propi_parroquia` AS `propi_parroquia`, `propietario_propiedad`.`tipodeasignacion` AS `tipodeasignacion`, `propietario_propiedad`.`propro_codigo` AS `propro_codigo`, `propietario_propiedad`.`fechadeasignacion` AS `fechadeasignacion` FROM ((`propietario_propiedad` join `propietario` on(`propietario_propiedad`.`prop_id` = `propietario`.`prop_id`)) join `propiedad` on(`propietario_propiedad`.`propi_id` = `propiedad`.`propi_id`)) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cobro`
--
ALTER TABLE `cobro`
  ADD PRIMARY KEY (`co_id`),
  ADD KEY `propi_id` (`prop_id`);

--
-- Indices de la tabla `comunidad`
--
ALTER TABLE `comunidad`
  ADD PRIMARY KEY (`comu_id`);

--
-- Indices de la tabla `detallecobro`
--
ALTER TABLE `detallecobro`
  ADD PRIMARY KEY (`deta_id`);

--
-- Indices de la tabla `gestionriego`
--
ALTER TABLE `gestionriego`
  ADD PRIMARY KEY (`ges_id`);

--
-- Indices de la tabla `imagenespropiedad`
--
ALTER TABLE `imagenespropiedad`
  ADD PRIMARY KEY (`idimagen`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`cod_log`);

--
-- Indices de la tabla `propiedad`
--
ALTER TABLE `propiedad`
  ADD PRIMARY KEY (`propi_id`);

--
-- Indices de la tabla `propietario`
--
ALTER TABLE `propietario`
  ADD PRIMARY KEY (`prop_id`);

--
-- Indices de la tabla `propietario_propiedad`
--
ALTER TABLE `propietario_propiedad`
  ADD PRIMARY KEY (`propro_codigo`);

--
-- Indices de la tabla `riego`
--
ALTER TABLE `riego`
  ADD PRIMARY KEY (`riego_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cobro`
--
ALTER TABLE `cobro`
  MODIFY `co_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `comunidad`
--
ALTER TABLE `comunidad`
  MODIFY `comu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `detallecobro`
--
ALTER TABLE `detallecobro`
  MODIFY `deta_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `gestionriego`
--
ALTER TABLE `gestionriego`
  MODIFY `ges_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagenespropiedad`
--
ALTER TABLE `imagenespropiedad`
  MODIFY `idimagen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `cod_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `propiedad`
--
ALTER TABLE `propiedad`
  MODIFY `propi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `propietario`
--
ALTER TABLE `propietario`
  MODIFY `prop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `propietario_propiedad`
--
ALTER TABLE `propietario_propiedad`
  MODIFY `propro_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `riego`
--
ALTER TABLE `riego`
  MODIFY `riego_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
