-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 13-09-2019 a las 01:37:29
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
(1, 'Mr Pollo', 'Erick Nunez', 2, 27, 'Gracias', 'Bo. Las Mercedes', '12-09-2019', '14:46:32', 'Comida Rapida', 'Venta de Pollo Frito', '76985263', '87894565', '87985989', 'aerick.nunez@gmail.com', 'Es el mejor pollo que hay en la zona', '37532f', 1),
(2, 'Restaurante Jaguar Blanco', 'Felix Sanabria', 1, 12, 'Metapan', 'Carretera Internacional, Km 13 y medio', '12-09-2019', '14:52:06', 'Restaurante', 'Restaurante', '24157895', '69586523', '78458578', 'jaguar@jaguarblanco.com', 'Restaurante de metapan', '37532f', 1),
(3, 'Super Pollo', 'Geovany Maldonado', 2, 16, 'Choluteca', 'Barrio El centro, media cuadra de electra', '12-09-2019', '21:24:57', 'Comida Rapida', 'Venta de Pollo frito', '78956856', '', '78451265', '', 'Es el local que es carca de electra el que siempre pasa lleno', '49cd4b', 1);

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
  `hora` varchar(30) NOT NULL,
  `td` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, '37532f', 'aerick.nunez@gmail.com', 'b29fc11ac3f99cbcbaf9315d1c04b59fe1d031d8c38157d85f4cee3fd854666a14586ac574cd8dc15051ae25ac9c2822c7bc6f02a487e2bbf6776d7d946afbce', 'ef3d8269f272c60401db1b545ae0ed82a02096a0db8124e39472b976f2a13b8ea81fee1bdda3d9a993d33a3e2e6ee5f61001442e1244604b232e1a7f928606ee'),
(2, '49cd4b', 'jazmin@gmail.com', '427774e2ab3780aa8cc0d17760301526bcfc314d45457dfdbac7b328913081a9fdb2b1f23045fc1b15cca3401814ffae673ad6e7164f3b6beca6c23bb065e025', 'a23fe17712a31041a1ccc8c428c55b4cc644b80031ed39ab5fd9279530e88d2e49b8c48004747ad6339d385a2295b4e89c3cbab8b78d98ecd2392195d5fe5582');

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
(1, 'Erick Adonai Nunez', 1, 'b87ef42c90066fabe1932e38ac4ce9215e028e9f', '1', '1.png', 0),
(2, 'Jazmin Azucena Nunez', 3, 'be4b6d1aa45ba1a3fb5d2326a795fee53a1eb2ba', '1', '1.png', 0);

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
(1, 'b1Zoby91OVFtUWZXM3lubHRYYmgxdjVndmpQUUsyRmZwMGVMUm1FZ3hkQT0=', 'cWpiMDNnOUZCc3NUajJoOFdBR0RWZz09', 'VlZud1M4czJjclhZeHlBaTVYU2Z5dz09', 'alNuY2twSG1IaG02RWtJQmM5UzlzUT09', 'alNuY2twSG1IaG02RWtJQmM5UzlzUT09', 'alNuY2twSG1IaG02RWtJQmM5UzlzUT09', 'UGxXaTdkcTFhMi80dXFKa1dNcmZ2UT09', 'Z0IxaTVWRXQrY0hzTVJqMXhlMWJQQT09', 'MXFGanJyUzV5NGN1emJiTW9SaHp3UWxUUys4WXE1S2krdi9IWFBlUUJwQT0=', 'TmFreGVlTGdJc29zNHJpQWF3RXl2VkVMUCs1T0Y0MmJaZWtLVVVjdzZxND0=', 'NVl1ZjRZMUE2bitZZVlHOFFnVXJmZz09', 'NVl1ZjRZMUE2bitZZVlHOFFnVXJmZz09', '', 'U1VrUWRORW8vS29zdHRVenVFMWNRUXY2MGtGa3RSajlWais2QmZkSDZVND0=', '37532f', 1),
(2, 'Nm00VWF4RytGNWtONTlMRjVvaGYzeGVvSWN1OWtOdnZUbHVRZ04za1J5ND0=', 'eGpqMUhmYjIwckZqbW05dlNTU1h2dz09', 'R1lKRy9MWnlhQWlZU3laeEk4V3c0UT09', 'alNuY2twSG1IaG02RWtJQmM5UzlzUT09', 'L2c0Y1lJRGY2WkFIREd4V1hlaVRnUT09', 'alNuY2twSG1IaG02RWtJQmM5UzlzUT09', 'UGxXaTdkcTFhMi80dXFKa1dNcmZ2UT09', 'Z0IxaTVWRXQrY0hzTVJqMXhlMWJQQT09', 'MXFGanJyUzV5NGN1emJiTW9SaHp3VFllRGZqRVJDOHpjbTBNd1B5ZTdaOD0=', 'UTRnTmpFQ0FVRDBpajFsNjZ3T2o3ZTBUcUtpNjBpcHE2TDgwOFBtZklQQT0=', 'NVl1ZjRZMUE2bitZZVlHOFFnVXJmZz09', 'NVl1ZjRZMUE2bitZZVlHOFFnVXJmZz09', '', 'OFlHVWZYeVdjamlNK2wwczF2Si8vMUh2ZW04eEVxZG96TkxKVWhLR21sST0=', '49cd4b', 1);

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

--
-- Volcado de datos para la tabla `perfil_fotos`
--

INSERT INTO `perfil_fotos` (`id`, `foto`, `username`, `edo`) VALUES
(1, '1568320810.png', '37532f', 0),
(2, '1568320835.jpg', '37532f', 0),
(3, '1568321926.png', '49cd4b', 1),
(4, '1568359773.jpg', '37532f', 0),
(5, '1568359815.jpg', '37532f', 1);

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
(1, 'Sistema Para Restaurante', 'Sistema completo para restaurante, lleva el control de todos los movimientos del negocio', 'Un solo pago, incluye garantía y soporte gratis', 'Restaurante', '12-09-2019', '14:54:06', '2019-12-31', 1),
(2, 'Sistema para Farmacia', 'Sistema completo para el manejo de una farmacia', 'Un solo Pago, contiene garantía y soporte gratis', 'Farmacia', '13-09-2019', '01:22:41', '31-12-2019', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_archivos`
--

CREATE TABLE `producto_archivos` (
  `id` int(6) NOT NULL,
  `archivo` varchar(50) NOT NULL,
  `producto` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `edo` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='archivos y fotos del producto';

--
-- Volcado de datos para la tabla `producto_archivos`
--

INSERT INTO `producto_archivos` (`id`, `archivo`, `producto`, `descripcion`, `edo`) VALUES
(1, '1568321678.pdf', '1', 'Descripcion General del Sistema', 1);

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
  `edo` int(1) NOT NULL COMMENT '1 activo, 2 en proceso, 3 cancelado, 4 eliminado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto_empresa`
--

INSERT INTO `producto_empresa` (`id`, `producto`, `empresa`, `fecha`, `hora`, `edo`) VALUES
(8, 1, 3, '13-09-2019', '01:08:56', 1),
(9, 2, 3, '13-09-2019', '01:08:58', 1);

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
(1, 1, 1.00, 'Precio Incluye IVA', 550.00),
(2, 2, 1.00, 'Un solo Pago Incluye IVA', 550.00);

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
(7, 1, '37532f', '12-09-2019', '15:01:58', 1),
(9, 2, '37532f', '12-09-2019', '15:05:25', 1),
(11, 2, '49cd4b', '12-09-2019', '15:13:56', 1);

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
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `login_members`
--
ALTER TABLE `login_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `login_userdata`
--
ALTER TABLE `login_userdata`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `perfil_documentos`
--
ALTER TABLE `perfil_documentos`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `perfil_fotos`
--
ALTER TABLE `perfil_fotos`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `producto_archivos`
--
ALTER TABLE `producto_archivos`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `producto_empresa`
--
ALTER TABLE `producto_empresa`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `producto_precios`
--
ALTER TABLE `producto_precios`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `producto_usuario`
--
ALTER TABLE `producto_usuario`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `system_paises`
--
ALTER TABLE `system_paises`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
