-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-12-2021 a las 15:23:58
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_municipalidad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asiste`
--

CREATE TABLE `asiste` (
  `nombre_usuario` varchar(50) NOT NULL,
  `id_evento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_noticia`
--

CREATE TABLE `categoria_noticia` (
  `nombre_categoria` varchar(50) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contribucion`
--

CREATE TABLE `contribucion` (
  `id_contribucion` int(11) NOT NULL,
  `nombre_contribucion` varchar(50) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `descripcion_contribucion` text NOT NULL,
  `departamento` varchar(50) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emprendedor`
--

CREATE TABLE `emprendedor` (
  `id_emprendedor` int(11) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `nombre_emprendedor` varchar(50) NOT NULL,
  `direccion_emprendedor` varchar(100) NOT NULL,
  `celular_emprendedor` int(9) NOT NULL,
  `telefono_emprendedor` int(7) NOT NULL,
  `correo_emprendedor` varchar(50) NOT NULL,
  `rubro_emprendedor` varchar(27) NOT NULL,
  `imagen_emprendedor` longblob NOT NULL,
  `tipo_imagen` varchar(9) NOT NULL,
  `facebook` varchar(50) DEFAULT NULL,
  `instagram` varchar(50) DEFAULT NULL,
  `informacion` text NOT NULL,
  `visitas_emprendedor` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `id_evento` int(11) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `id_lugar` int(11) NOT NULL,
  `nombre_evento` varchar(50) NOT NULL,
  `fecha_evento` date NOT NULL,
  `imagen_evento` longblob DEFAULT NULL,
  `descripcion_evento` text NOT NULL,
  `visitas_evento` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen_contribucion`
--

CREATE TABLE `imagen_contribucion` (
  `id_imagen` int(11) NOT NULL,
  `id_contribucion` int(11) NOT NULL,
  `imagen_contribuciones` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen_opinion`
--

CREATE TABLE `imagen_opinion` (
  `id_imagen` int(11) NOT NULL,
  `id_opinion` int(11) NOT NULL,
  `imagen_opiniones` longblob NOT NULL,
  `tipo_imagen` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen_producto`
--

CREATE TABLE `imagen_producto` (
  `id_producto` int(11) NOT NULL,
  `id_emprendedor` int(11) NOT NULL,
  `imagen_emprendedores` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugar`
--

CREATE TABLE `lugar` (
  `id_lugar` int(11) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `latitud_lugar` float(8,6) NOT NULL,
  `longitud_lugar` float(9,6) NOT NULL,
  `categoria_lugar` varchar(20) NOT NULL,
  `nombre_lugar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `me_gusta`
--

CREATE TABLE `me_gusta` (
  `nombre_usuario` varchar(50) NOT NULL,
  `id_noticia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE `noticia` (
  `id_noticia` int(11) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `titulo_noticia` varchar(100) NOT NULL,
  `fecha_noticia` date NOT NULL,
  `bajada_noticia` varchar(200) NOT NULL,
  `lead_noticia` varchar(400) NOT NULL,
  `cuerpo_noticia` text NOT NULL,
  `nombre_categoria` varchar(50) NOT NULL,
  `imagen_noticia` longblob NOT NULL,
  `visitas_noticia` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opinion`
--

CREATE TABLE `opinion` (
  `id_opinion` int(11) NOT NULL,
  `nombre_opinion` varchar(50) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `descripcion_opinion` text NOT NULL,
  `fecha_opinion` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubro_emprendedor`
--

CREATE TABLE `rubro_emprendedor` (
  `nombre_rubro` varchar(50) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `nombre_usuario` varchar(50) NOT NULL,
  `contraseña` varchar(32) NOT NULL,
  `rol` varchar(7) NOT NULL,
  `correo_usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asiste`
--
ALTER TABLE `asiste`
  ADD PRIMARY KEY (`nombre_usuario`,`id_evento`),
  ADD KEY `asiste_evento` (`id_evento`);

--
-- Indices de la tabla `categoria_noticia`
--
ALTER TABLE `categoria_noticia`
  ADD PRIMARY KEY (`nombre_categoria`),
  ADD KEY `admin_categoria_noticia` (`nombre_usuario`);

--
-- Indices de la tabla `contribucion`
--
ALTER TABLE `contribucion`
  ADD PRIMARY KEY (`id_contribucion`),
  ADD KEY `contribucion-usuario` (`nombre_usuario`);

--
-- Indices de la tabla `emprendedor`
--
ALTER TABLE `emprendedor`
  ADD PRIMARY KEY (`id_emprendedor`),
  ADD KEY `admin-emprendedor` (`nombre_usuario`),
  ADD KEY `emprendedor_rubro` (`rubro_emprendedor`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `admin-evento` (`nombre_usuario`),
  ADD KEY `lugar-evento` (`id_lugar`);

--
-- Indices de la tabla `imagen_contribucion`
--
ALTER TABLE `imagen_contribucion`
  ADD PRIMARY KEY (`id_imagen`),
  ADD KEY `contribucion-imagen` (`id_contribucion`);

--
-- Indices de la tabla `imagen_opinion`
--
ALTER TABLE `imagen_opinion`
  ADD PRIMARY KEY (`id_imagen`),
  ADD KEY `opinion-imagen` (`id_opinion`);

--
-- Indices de la tabla `imagen_producto`
--
ALTER TABLE `imagen_producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_emprendedor` (`id_emprendedor`);

--
-- Indices de la tabla `lugar`
--
ALTER TABLE `lugar`
  ADD PRIMARY KEY (`id_lugar`),
  ADD KEY `usuario_lugar` (`nombre_usuario`);

--
-- Indices de la tabla `me_gusta`
--
ALTER TABLE `me_gusta`
  ADD PRIMARY KEY (`nombre_usuario`,`id_noticia`),
  ADD KEY `megusta_noticia` (`id_noticia`);

--
-- Indices de la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`id_noticia`),
  ADD KEY `admin-noticia` (`nombre_usuario`),
  ADD KEY `categoria_noticia` (`nombre_categoria`);

--
-- Indices de la tabla `opinion`
--
ALTER TABLE `opinion`
  ADD PRIMARY KEY (`id_opinion`),
  ADD KEY `opinion-usuario` (`nombre_usuario`);

--
-- Indices de la tabla `rubro_emprendedor`
--
ALTER TABLE `rubro_emprendedor`
  ADD PRIMARY KEY (`nombre_rubro`),
  ADD KEY `usuario_rubro_emprededor` (`nombre_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`nombre_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contribucion`
--
ALTER TABLE `contribucion`
  MODIFY `id_contribucion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `emprendedor`
--
ALTER TABLE `emprendedor`
  MODIFY `id_emprendedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagen_contribucion`
--
ALTER TABLE `imagen_contribucion`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagen_opinion`
--
ALTER TABLE `imagen_opinion`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagen_producto`
--
ALTER TABLE `imagen_producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lugar`
--
ALTER TABLE `lugar`
  MODIFY `id_lugar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `noticia`
--
ALTER TABLE `noticia`
  MODIFY `id_noticia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `opinion`
--
ALTER TABLE `opinion`
  MODIFY `id_opinion` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asiste`
--
ALTER TABLE `asiste`
  ADD CONSTRAINT `asiste_evento` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id_evento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asiste_usuario` FOREIGN KEY (`nombre_usuario`) REFERENCES `usuario` (`nombre_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `categoria_noticia`
--
ALTER TABLE `categoria_noticia`
  ADD CONSTRAINT `admin_categoria_noticia` FOREIGN KEY (`nombre_usuario`) REFERENCES `usuario` (`nombre_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `contribucion`
--
ALTER TABLE `contribucion`
  ADD CONSTRAINT `contribucion-usuario` FOREIGN KEY (`nombre_usuario`) REFERENCES `usuario` (`nombre_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `emprendedor`
--
ALTER TABLE `emprendedor`
  ADD CONSTRAINT `admin-emprendedor` FOREIGN KEY (`nombre_usuario`) REFERENCES `usuario` (`nombre_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `emprendedor_rubro` FOREIGN KEY (`rubro_emprendedor`) REFERENCES `rubro_emprendedor` (`nombre_rubro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `admin-evento` FOREIGN KEY (`nombre_usuario`) REFERENCES `usuario` (`nombre_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lugar-evento` FOREIGN KEY (`id_lugar`) REFERENCES `lugar` (`id_lugar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `imagen_contribucion`
--
ALTER TABLE `imagen_contribucion`
  ADD CONSTRAINT `contribucion-imagen` FOREIGN KEY (`id_contribucion`) REFERENCES `contribucion` (`id_contribucion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `imagen_opinion`
--
ALTER TABLE `imagen_opinion`
  ADD CONSTRAINT `opinion-imagen` FOREIGN KEY (`id_opinion`) REFERENCES `opinion` (`id_opinion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `imagen_producto`
--
ALTER TABLE `imagen_producto`
  ADD CONSTRAINT `id_emprendedor` FOREIGN KEY (`id_emprendedor`) REFERENCES `emprendedor` (`id_emprendedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `lugar`
--
ALTER TABLE `lugar`
  ADD CONSTRAINT `usuario_lugar` FOREIGN KEY (`nombre_usuario`) REFERENCES `usuario` (`nombre_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `me_gusta`
--
ALTER TABLE `me_gusta`
  ADD CONSTRAINT `megusta_noticia` FOREIGN KEY (`id_noticia`) REFERENCES `noticia` (`id_noticia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `megusta_usuario` FOREIGN KEY (`nombre_usuario`) REFERENCES `usuario` (`nombre_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD CONSTRAINT `admin-noticia` FOREIGN KEY (`nombre_usuario`) REFERENCES `usuario` (`nombre_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `categoria_noticia` FOREIGN KEY (`nombre_categoria`) REFERENCES `categoria_noticia` (`nombre_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `opinion`
--
ALTER TABLE `opinion`
  ADD CONSTRAINT `opinion-usuario` FOREIGN KEY (`nombre_usuario`) REFERENCES `usuario` (`nombre_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rubro_emprendedor`
--
ALTER TABLE `rubro_emprendedor`
  ADD CONSTRAINT `usuario_rubro_emprededor` FOREIGN KEY (`nombre_usuario`) REFERENCES `usuario` (`nombre_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
