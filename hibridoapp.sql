-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 17-09-2019 a las 14:06:45
-- Versión del servidor: 5.7.17-log
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hibridoapp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` int(6) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `encargado` varchar(50) NOT NULL,
  `pais` int(3) NOT NULL,
  `departamento` int(5) NOT NULL,
  `municipio` varchar(30) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `hora` varchar(20) NOT NULL,
  `rugro` varchar(50) NOT NULL,
  `giro` varchar(50) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `telefono2` varchar(20) NOT NULL,
  `whatsapp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `comentarios` text NOT NULL,
  `username` varchar(12) NOT NULL,
  `edo` int(2) NOT NULL COMMENT '1 activo, 2 eliminada 3 disponible, 4 abandonada,4 vloqueada'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `nombre`, `encargado`, `pais`, `departamento`, `municipio`, `direccion`, `fecha`, `hora`, `rugro`, `giro`, `telefono`, `telefono2`, `whatsapp`, `email`, `comentarios`, `username`, `edo`) VALUES
(1, 'Mr. Pollo', 'Erick Nunez', 2, 27, 'Gracias', 'Bo, La Graciana', '17-09-2019', '13:45:15', '2', 'Venta de Pollo Frito', '', '', '79867387', 'mrpollo@superpollo.net', 'Es la que esta en frente de Funeraria la Graciana', 'e794f0', 1),
(2, 'Jaguar Blanco', 'Felix Sanabria', 1, 12, 'Metapán', 'Carretera Internacional Km 113', '17-09-2019', '13:47:04', '1', 'Restaurante', '24020576', '', '72710536', '', 'Contiguo a Repuestos El Leon', 'e794f0', 1),
(3, 'El Punto Electrico', 'Lino Lima', 1, 12, 'Metapán', 'Callejon Luna', '17-09-2019', '14:02:49', '12', 'Ferreteria', '', '76020987', '', '', 'Donde venden materiales eléctricos, no tienen sistema aun', 'e794f0', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_attempts`
--

CREATE TABLE `login_attempts` (
  `user_id` int(11) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_inout`
--

CREATE TABLE `login_inout` (
  `id` int(6) NOT NULL,
  `user` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `accion` int(2) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `navegador` varchar(250) NOT NULL,
  `fecha` varchar(30) NOT NULL,
  `fechaF` varchar(30) NOT NULL,
  `hora` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `login_inout`
--

INSERT INTO `login_inout` (`id`, `user`, `nombre`, `accion`, `ip`, `navegador`, `fecha`, `fechaF`, `hora`) VALUES
(1, 'e75e9a2017b9afe7939972d8fc840d67b1393316', 'Erick Adonai Nuñez', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.75 Safari/537.36', '17-09-2019', '1568700000', '13:40:55'),
(2, 'e75e9a2017b9afe7939972d8fc840d67b1393316', 'Erick Adonai Nuñez', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.75 Safari/537.36', '17-09-2019', '1568700000', '13:48:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_members`
--

CREATE TABLE `login_members` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(128) NOT NULL,
  `salt` char(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `login_members`
--

INSERT INTO `login_members` (`id`, `username`, `email`, `password`, `salt`) VALUES
(1, 'e794f0', 'aerick.nunez@gmail.com', 'eb35cf826e7bfd9c8f059167ebca239530a402ff388698d024b0e67db3b030d4f1393107f3b4fba2137dc723935ff80ad9f6a742e5dce5e5ac9a58e10396f5a1', '0a56ea826555b0669bff3f298ec7ba28a7f87df346c703b8e577b79f68564c6d9f5909b8381ec953464b20a8ff67ad5a9a9668034d3bc3c5aaa8dbeb9b526dee');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_userdata`
--

CREATE TABLE `login_userdata` (
  `id` int(6) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `tipo` int(2) NOT NULL COMMENT '1, root , 2 admin, 3 usuario',
  `user` varchar(100) NOT NULL,
  `tkn` varchar(200) NOT NULL,
  `avatar` varchar(50) NOT NULL,
  `td` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `login_userdata`
--

INSERT INTO `login_userdata` (`id`, `nombre`, `tipo`, `user`, `tkn`, `avatar`, `td`) VALUES
(1, 'Erick Adonai Nuñez Martinez', 1, 'e75e9a2017b9afe7939972d8fc840d67b1393316', '1', '1.png', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id` int(6) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `documento` varchar(100) NOT NULL,
  `fecha_nac` varchar(100) NOT NULL,
  `edo_civil` varchar(100) NOT NULL,
  `sexo` varchar(100) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `departamento` varchar(100) NOT NULL,
  `municipio` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono1` varchar(100) NOT NULL,
  `telefono2` varchar(100) NOT NULL,
  `skin` varchar(100) NOT NULL,
  `comentarios` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `edo` int(1) NOT NULL COMMENT '1, activo 0, inactivo, 2 eliminado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id`, `nombre`, `documento`, `fecha_nac`, `edo_civil`, `sexo`, `pais`, `departamento`, `municipio`, `direccion`, `email`, `telefono1`, `telefono2`, `skin`, `comentarios`, `username`, `edo`) VALUES
(1, 'V3VadkJQOStrSGw3cUptTjFIQ1JMZTVKRXFsTjhKN0xHZFRrTHlvZEVnOD0=', 'cWpiMDNnOUZCc3NUajJoOFdBR0RWZz09', 'VlZud1M4czJjclhZeHlBaTVYU2Z5dz09', 'alNuY2twSG1IaG02RWtJQmM5UzlzUT09', 'alNuY2twSG1IaG02RWtJQmM5UzlzUT09', 'alNuY2twSG1IaG02RWtJQmM5UzlzUT09', 'UGxXaTdkcTFhMi80dXFKa1dNcmZ2UT09', 'ZkxxRWVHRml6aUNqanpzdXZDM2J1QT09', 'MXFGanJyUzV5NGN1emJiTW9SaHp3VlFsZ0JRL05QQk16T2hib21zTkdXYmxlQm03SGtrNklzbzU1WUlLeW1mUQ=', 'TmFreGVlTGdJc29zNHJpQWF3RXl2VkVMUCs1T0Y0MmJaZWtLVVVjdzZxND0=', 'NVl1ZjRZMUE2bitZZVlHOFFnVXJmZz09', 'eGx2bVpNc2lMSk5IN3JjL2NTWE9OUT09', '', 'MDQraURIVHhXTmtIR2czYkp2NS8wMmtXZFVIVFR1WHJQS21sajBCc0dxTT0=', 'e794f0', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_documentos`
--

CREATE TABLE `perfil_documentos` (
  `id` int(6) NOT NULL,
  `username` varchar(20) NOT NULL,
  `documento` varchar(100) NOT NULL,
  `tipo` int(2) NOT NULL,
  `edo` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Documentos personales del usuario';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_fotos`
--

CREATE TABLE `perfil_fotos` (
  `id` int(6) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `edo` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Fotos del usuario';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(6) NOT NULL,
  `producto` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `condiciones` text NOT NULL,
  `rugro` varchar(50) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `hora` varchar(20) NOT NULL,
  `caduca` varchar(20) NOT NULL,
  `edo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `producto`, `descripcion`, `condiciones`, `rugro`, `fecha`, `hora`, `caduca`, `edo`) VALUES
(1, 'Sistema Para Restaurante', 'Sistema Completo para restaurante', 'Un solo pago o por cuotas mensuales. Incluye mantenimiento, actualizaciones y mejoras gratis.\r\nPrecio NO incluye IVA.', '1', '17-09-2019', '13:53:38', '31-12-2019', 1),
(2, 'Sistema para Ferreteria', 'Sistema completo para el manejo de una ferreteria', 'Un solo pago o por cuotas mensuales. Incluye mantenimiento, actualizaciones y mejoras gratis. Precio NO incluye IVA.', '12', '17-09-2019', '13:56:38', '31-12-2019', 1),
(3, 'Sistema para Abarroteria', 'Sistema completo para abarroteria', 'Un solo pago o por cuotas mensuales. Incluye mantenimiento, actualizaciones y mejoras gratis. Precio NO incluye IVA.', '5', '17-09-2019', '13:59:15', '31-12-2019', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_archivos`
--

CREATE TABLE `producto_archivos` (
  `id` int(6) NOT NULL,
  `archivo` varchar(50) NOT NULL,
  `producto` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `edo` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='archivos y fotos del producto';

--
-- Volcado de datos para la tabla `producto_archivos`
--

INSERT INTO `producto_archivos` (`id`, `archivo`, `producto`, `nombre`, `descripcion`, `edo`) VALUES
(1, '1568750049.pdf', '1', 'Restaurante', 'Detalles sistema para restaurante', 1),
(2, '1568750233.pdf', '2', 'Ferreteria', 'Características sistema para ferretería', 1),
(3, '1568750383.pdf', '3', 'Abarroteria', 'Detalles del sistema para Abarroteria', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_empresa`
--

CREATE TABLE `producto_empresa` (
  `id` int(6) NOT NULL,
  `producto` int(6) NOT NULL,
  `empresa` int(6) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `hora` varchar(20) NOT NULL,
  `edo` int(1) NOT NULL COMMENT '1 activo, 2 en proceso, 3 vendido, 4 pagado, 5 Eliminado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto_empresa`
--

INSERT INTO `producto_empresa` (`id`, `producto`, `empresa`, `fecha`, `hora`, `edo`) VALUES
(1, 1, 1, '17-09-2019', '14:00:45', 1),
(2, 1, 2, '17-09-2019', '14:00:57', 1),
(3, 2, 3, '17-09-2019', '14:02:55', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_precios`
--

CREATE TABLE `producto_precios` (
  `id` int(5) NOT NULL,
  `producto` int(5) NOT NULL,
  `cantidad` float(10,2) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto_precios`
--

INSERT INTO `producto_precios` (`id`, `producto`, `cantidad`, `descripcion`, `precio`) VALUES
(1, 1, 1.00, 'Un solo pago, IVA no incluido', 550.00),
(2, 1, 1.00, 'Cuota Mensual. No incluye IVA', 25.00),
(3, 2, 1.00, 'Un solo pago, NO incluye IVA', 550.00),
(4, 2, 1.00, 'Cuota Mensual', 25.00),
(5, 3, 1.00, 'Un solo pago, No incluye IVA', 550.00),
(6, 3, 1.00, 'Cuotas Mensuales, No incluye IVA', 25.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_usuario`
--

CREATE TABLE `producto_usuario` (
  `id` int(6) NOT NULL,
  `producto` int(6) NOT NULL,
  `username` varchar(12) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `hora` varchar(20) NOT NULL,
  `edo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto_usuario`
--

INSERT INTO `producto_usuario` (`id`, `producto`, `username`, `fecha`, `hora`, `edo`) VALUES
(1, 1, 'e794f0', '17-09-2019', '13:53:38', 1),
(2, 2, 'e794f0', '17-09-2019', '13:56:38', 1),
(3, 3, 'e794f0', '17-09-2019', '13:59:15', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `system_departamentos`
--

CREATE TABLE `system_departamentos` (
  `id` int(2) NOT NULL,
  `pais` int(1) DEFAULT NULL,
  `departamento` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `system_departamentos`
--

INSERT INTO `system_departamentos` (`id`, `pais`, `departamento`) VALUES
(1, 1, 'Ahuachapan'),
(2, 1, 'Cabañas'),
(3, 1, 'Chalatenango'),
(4, 1, 'Cuscatlan'),
(5, 1, 'Morazan'),
(6, 1, 'La Libertad'),
(7, 1, 'La Paz'),
(8, 1, 'La Union'),
(9, 1, 'San Miguel'),
(10, 1, 'San Salvador'),
(11, 1, 'San Vicente'),
(12, 1, 'Santa Ana'),
(13, 1, 'Sonsonate'),
(14, 1, 'Usulutan'),
(15, 2, 'Atlántida'),
(16, 2, 'Choluteca'),
(17, 2, 'Colón'),
(18, 2, 'Comayagua'),
(19, 2, 'Copán'),
(20, 2, 'Cortes'),
(21, 2, 'El Paraíso'),
(22, 2, 'Francisco Morazán'),
(23, 2, 'Gracias a Dios'),
(24, 2, 'Intibucá'),
(25, 2, 'Islas de la Bahía'),
(26, 2, 'La Paz'),
(27, 2, 'Lempira'),
(28, 2, 'Ocotepeque'),
(29, 2, 'Olancho'),
(30, 2, 'Santa Bárbara'),
(31, 2, 'Valle'),
(32, 2, 'Yoro'),
(33, 3, 'Alta Verapaz'),
(34, 3, 'Baja Verapaz'),
(35, 3, 'Chimaltenango'),
(36, 3, 'Chiquimula'),
(37, 3, 'El Progreso'),
(38, 3, 'Escuintla'),
(39, 3, 'Guatemala'),
(40, 3, 'Huehuetenango'),
(41, 3, 'Izabal'),
(42, 3, 'Jalapa'),
(43, 3, 'Jutiapa'),
(44, 3, 'Petén'),
(45, 3, 'Quetzaltenango'),
(46, 3, 'Quiché'),
(47, 3, 'Retalhuleu'),
(48, 3, 'Sacatepéquez'),
(49, 3, 'San Marcos'),
(50, 3, 'Santa Rosa'),
(51, 3, 'Sololá'),
(52, 3, 'Suchitepéquez'),
(53, 3, 'Totonicapán'),
(54, 3, 'Zacapa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `system_paises`
--

CREATE TABLE `system_paises` (
  `id` int(3) NOT NULL,
  `pais` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `system_paises`
--

INSERT INTO `system_paises` (`id`, `pais`) VALUES
(1, 'El Salvador'),
(2, 'Honduras'),
(3, 'Guatemala');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `system_rugro`
--

CREATE TABLE `system_rugro` (
  `id` int(3) NOT NULL,
  `rugro` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `system_rugro`
--

INSERT INTO `system_rugro` (`id`, `rugro`) VALUES
(1, 'Restaurante'),
(2, 'Comida Rápida'),
(3, 'Cafetería'),
(4, 'Pizzería'),
(5, 'Abarroteria'),
(6, 'Agroservicio'),
(7, 'Almacén'),
(8, 'Boutique'),
(9, 'Bar'),
(10, 'Farmacia'),
(11, 'Librería'),
(12, 'Ferreteria'),
(13, 'Zapateria'),
(14, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas`
--

CREATE TABLE `visitas` (
  `id` int(5) NOT NULL,
  `empresa` int(5) NOT NULL,
  `username` varchar(12) NOT NULL,
  `detalles` varchar(200) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `hora` varchar(20) NOT NULL,
  `edo` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas_detalles`
--

CREATE TABLE `visitas_detalles` (
  `id` int(6) NOT NULL,
  `visita` int(6) NOT NULL,
  `detalles` varchar(100) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `hora` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `login_inout`
--
ALTER TABLE `login_inout`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `login_members`
--
ALTER TABLE `login_members`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `login_userdata`
--
ALTER TABLE `login_userdata`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `perfil_documentos`
--
ALTER TABLE `perfil_documentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `perfil_fotos`
--
ALTER TABLE `perfil_fotos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto_archivos`
--
ALTER TABLE `producto_archivos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto_empresa`
--
ALTER TABLE `producto_empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto_precios`
--
ALTER TABLE `producto_precios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto_usuario`
--
ALTER TABLE `producto_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `system_departamentos`
--
ALTER TABLE `system_departamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `system_paises`
--
ALTER TABLE `system_paises`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `system_rugro`
--
ALTER TABLE `system_rugro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `visitas`
--
ALTER TABLE `visitas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `visitas_detalles`
--
ALTER TABLE `visitas_detalles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `login_inout`
--
ALTER TABLE `login_inout`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `login_members`
--
ALTER TABLE `login_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `login_userdata`
--
ALTER TABLE `login_userdata`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `perfil_documentos`
--
ALTER TABLE `perfil_documentos`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `perfil_fotos`
--
ALTER TABLE `perfil_fotos`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `producto_archivos`
--
ALTER TABLE `producto_archivos`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `producto_empresa`
--
ALTER TABLE `producto_empresa`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `producto_precios`
--
ALTER TABLE `producto_precios`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `producto_usuario`
--
ALTER TABLE `producto_usuario`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `system_paises`
--
ALTER TABLE `system_paises`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `system_rugro`
--
ALTER TABLE `system_rugro`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `visitas`
--
ALTER TABLE `visitas`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `visitas_detalles`
--
ALTER TABLE `visitas_detalles`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
