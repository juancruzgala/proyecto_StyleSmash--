-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-06-2025 a las 05:00:58
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gauna_galarza`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `activo` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `descripcion`, `activo`) VALUES
(1234, 'Paletas', 1),
(1235, 'Bolsos', 1),
(1263, 'Pelotas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `id_consulta` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mensaje` text NOT NULL,
  `respondido` enum('SI','NO') NOT NULL DEFAULT 'NO',
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`id_consulta`, `nombre`, `email`, `mensaje`, `respondido`, `fecha`) VALUES
(1, 'Lautaro Gimenez', 'lautarogimenex@gmail.com', 'Hacen Envios al interior?', 'SI', '2025-06-18 12:01:44'),
(2, 'Lautaro Gimenez', 'lautarogimenex@gmail.com', 'Puedo abonar mitad efectivo y mitad transferencia?', 'SI', '2025-06-18 14:50:56'),
(3, 'Lucia  Gauna', 'luciigauna@gmail.com', 'Las paletas inlcuyen cubregrip?', 'NO', '2025-06-18 16:07:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id_perfil` int(2) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `baja` varchar(2) DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id_perfil`, `descripcion`, `baja`) VALUES
(1, 'admin', 'NO'),
(2, 'cliente', 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre_prod` varchar(100) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `precio` float(10,2) NOT NULL,
  `precio_vta` float(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `stock_min` int(11) NOT NULL,
  `eliminado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre_prod`, `imagen`, `categoria_id`, `precio`, `precio_vta`, `stock`, `stock_min`, `eliminado`) VALUES
(1, 'Paleta bullpadel XPLO', 'bulxplo.png', 1234, 190000.00, 500000.00, 4, 2, 'SI'),
(2, 'Bolso varlion', 'bolsovarlion.jpg', 1235, 390000.00, 150000.00, 6, 2, 'NO'),
(3, 'Bolso Adidas', 'bolsoadidas.jpg', 1235, 120000.00, 250000.00, 4, 1, 'NO'),
(4, 'Pelotas Adidas', 'pelotaadidas.jpg', 1263, 40000.00, 80000.00, 6, 3, 'NO'),
(5, 'Paleta Adidas Metalbone', 'Metalbone.jpg', 1234, 250000.00, 600000.00, 3, 1, 'NO'),
(6, 'Paleta Nox AT10', 'paletanox.jpeg', 1234, 200000.00, 550000.00, 4, 1, 'NO'),
(7, 'Paleta Head Gravity', 'paletahead.png', 1234, 230000.00, 480000.00, 3, 1, 'NO'),
(8, 'Pelotas Wilson', 'pelotawilson.jpg', 1263, 35000.00, 65000.00, 4, 1, 'NO'),
(9, 'Pelotas bullpadel', 'pelotasbul.png', 1263, 40000.00, 70000.00, 3, 1, 'NO'),
(10, 'Bolso Babolat', 'bolsobab.png', 1235, 140000.00, 260000.00, 4, 1, 'NO'),
(11, 'Bolso bullpadel', 'bolsobul.png', 1235, 160000.00, 300000.00, 3, 1, 'NO'),
(12, 'Paleta Wilson Bela', 'paletawilson.jpeg', 1234, 200000.00, 400000.00, 3, 1, 'NO'),
(13, 'Paleta Royal Pole', 'Royalpole.png', 1234, 100000.00, 190000.00, 10, 1, 'NO'),
(14, 'Paleta Siux Fenix PRO', 'paletasiux.jpg', 1234, 260000.00, 450000.00, 4, 1, 'NO'),
(15, 'Paleta Babolat Technical Viper', 'viper.png', 1234, 300000.00, 550000.00, 2, 1, 'NO'),
(16, 'Pelota Odea x2', 'pelotaodea.jpg', 1263, 5000.00, 10000.00, 20, 1, 'NO'),
(17, 'Pelota Nox x3', 'pelotanox.jpg', 1263, 10000.00, 20000.00, 10, 1, 'NO'),
(18, 'Bolso bela', 'bolso bela.png', 1235, 160000.00, 300000.00, 3, 1, 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `id_perfil` int(2) NOT NULL DEFAULT 2,
  `baja` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `email`, `usuario`, `pass`, `id_perfil`, `baja`) VALUES
(1, 'Lucia', 'Gauna', 'luciigauna@gmail.com', '@lu0502', '$2y$10$Du5P0VrtY7ob2l/UWN7MXOcWX0YyKLf6YZqDZcdwFtS1j/Zuw5iFm', 2, 'NO'),
(2, 'DARIO', 'GORDIOLA', 'dariogordiola22@gmail.com', '@DarioG', '$2y$10$Yo2QHijHH82Hm5ILuWBQsekRUtGjFKwuO9vfaIcDcHd1M4Z4FNBvm', 1, 'NO'),
(3, 'Lautaro', 'Gimenez', 'lautarogimenex@gmail.com', '@LautiG', '$2y$10$NWr5UnID2CjX1WMu5acSvuqMMWonxRqy9gxG2ShL40aJ/MOdH4Vm2', 2, 'NO'),
(4, 'Tomas', 'Gimenez', 'tomigimenez@gmail.com', '@Tomas05', '$2y$10$7MMOTQ7AX0cLPnv6TtCVvOJQLcAjg8.ZLigzbQti9gcs5N1q17ZuS', 2, 'NO'),
(5, 'Juan Cruz', 'Galarza', 'juancruzgala@gmail.com', '@Juan01', '$2y$10$rbmSm1cea7xUNokurCLXReLg59qdGvIli0dImDv4JtTQonij9LSnq', 2, 'NO'),
(6, 'Victoria', 'Perfetto', 'vickyperfetto@gmail.com', '@Vi011', '$2y$10$pXWRMc873xoaalIVMLE/G.RWfiDry2sVUm.zFmitF9WyeLkU/5q7e', 2, 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_cabecera`
--

CREATE TABLE `ventas_cabecera` (
  `venta_id` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `id_usuario` int(11) NOT NULL,
  `total_venta` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas_cabecera`
--

INSERT INTO `ventas_cabecera` (`venta_id`, `fecha`, `id_usuario`, `total_venta`) VALUES
(13, '2025-06-13 00:00:00', 1, 250000.00),
(14, '2025-06-13 00:00:00', 1, 80000.00),
(15, '2025-06-13 00:00:00', 1, 250000.00),
(16, '2025-06-13 00:00:00', 1, 600000.00),
(17, '2025-06-13 00:00:00', 1, 150000.00),
(18, '2025-06-18 03:53:24', 3, 1230000.00),
(19, '2025-06-18 05:49:47', 3, 70000.00),
(20, '2025-06-18 06:04:26', 6, 250000.00),
(21, '2025-06-18 06:12:56', 1, 250000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_detalle`
--

CREATE TABLE `ventas_detalle` (
  `id` int(11) NOT NULL,
  `venta_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas_detalle`
--

INSERT INTO `ventas_detalle` (`id`, `venta_id`, `producto_id`, `cantidad`, `precio`) VALUES
(8, 13, 3, 1, 250000.00),
(9, 14, 4, 1, 80000.00),
(10, 15, 3, 1, 250000.00),
(14, 16, 5, 1, 600000.00),
(16, 17, 2, 1, 150000.00),
(18, 18, 5, 1, 600000.00),
(19, 18, 2, 1, 150000.00),
(20, 18, 7, 1, 480000.00),
(21, 19, 9, 1, 70000.00),
(22, 20, 3, 1, 250000.00),
(23, 21, 3, 1, 250000.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id_consulta`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `perfil_id` (`id_perfil`);

--
-- Indices de la tabla `ventas_cabecera`
--
ALTER TABLE `ventas_cabecera`
  ADD PRIMARY KEY (`venta_id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `venta_id` (`venta_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1264;

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id_perfil` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ventas_cabecera`
--
ALTER TABLE `ventas_cabecera`
  MODIFY `venta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_perfil`) REFERENCES `perfiles` (`id_perfil`);

--
-- Filtros para la tabla `ventas_cabecera`
--
ALTER TABLE `ventas_cabecera`
  ADD CONSTRAINT `ventas_cabecera_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  ADD CONSTRAINT `ventas_detalle_ibfk_1` FOREIGN KEY (`venta_id`) REFERENCES `ventas_cabecera` (`venta_id`),
  ADD CONSTRAINT `ventas_detalle_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
