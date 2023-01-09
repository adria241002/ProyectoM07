-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 21-12-2021 a las 10:14:07
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fabricante`
--

DROP DATABASE IF EXISTS tienda_info;
CREATE DATABASE tienda_info;
USE tienda_info;

CREATE TABLE `fabricante` (
  `codigo` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `logoFabricante` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `fabricante`
--

INSERT INTO `fabricante` (`codigo`, `nombre`, `logoFabricante`) VALUES
(1, 'Asus', 'https://dlcdnimgs.asus.com/websites/global/Sno/79183.jpg'),
(2, 'Lenovo', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSBCOhkSLvA5hjJqs7hVYXavEZ0fCkslVPVEgge8WRpBQ-8d0yJGbHgfVH4-19YVu8KxWw&usqp=CAU'),
(3, 'Hewlett-Packard', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ad/HP_logo_2012.svg/200px-HP_logo_2012.svg.png'),
(4, 'Samsung', 'https://images.samsung.com/is/image/samsung/assets/global/about-us/brand/logo/mo/360_197_1.png'),
(5, 'Seagate', 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7f/Seagate_logo.svg/320px-Seagate_logo.svg.png'),
(6, 'Crucial', 'https://1000marcas.net/wp-content/uploads/2021/05/Crucial-Logo.png'),
(7, 'Gigabyte', 'https://logos-marcas.com/wp-content/uploads/2020/11/Gigabyte-Logo.png'),
(8, 'Huawei', 'https://1000marcas.net/wp-content/uploads/2019/12/Huawei-Logo.png'),
(9, 'Xiaomi', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ae/Xiaomi_logo_%282021-%29.svg/512px-Xiaomi_logo_%282021-%29.svg.png'),
(10, 'Intel', 'https://1000marcas.net/wp-content/uploads/2020/02/Intel-Logo-2005.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `codigo` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` double NOT NULL,
  `codigo_fabricante` int(10) UNSIGNED NOT NULL,
  `imagen` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codigo`, `nombre`, `precio`, `codigo_fabricante`, `imagen`) VALUES
(1, 'Disco duro SATA3 1TB', 86.99, 5, 'https://assets.mmsrg.com/isr/166325/c1/-/pixelboxx-mss-79312403/fee_786_587_png'),
(2, 'Memoria RAM DDR4 8GB', 120, 6, 'https://content.crucial.com/content/dam/crucial/dram-products/desktop/images/product/crucial-ddr4-4-8gb-udimm-image.psd.transform/medium-png/image.png'),
(3, 'Disco SSD 1 TB', 150.99, 4, 'https://img.pccomponentes.com/articles/14/149213/evo860-2-copia.jpg'),
(4, 'GeForce GTX 1050Ti', 185, 7, 'https://thumb.pccomponentes.com/w-530-530/articles/10/106067/1111.jpg'),
(5, 'GeForce GTX 1080 Xtreme', 755, 6, 'https://static.gigabyte.com/StaticFile/Image/Global/c9b4b713fd1f80f6c82e70d4821b3aec/Product/15126/png/500'),
(6, 'Monitor 24 LED Full HD', 202, 1, 'https://thumb.pccomponentes.com/w-530-530/articles/22/222225/1.jpg'),
(7, 'Monitor 27 LED Full HD', 245.99, 1, 'https://assets.mmsrg.com/isr/166325/c1/-/ASSET_MMS_83594269/fee_786_587_png'),
(8, 'Portátil Yoga 520', 559, 2, 'https://www.mundoconsumible.com/26541-thickbox_default/lenovo-yoga-520-14ikb-81c8-ci5-8gb-1tb-14---tactil-windows-10.jpg'),
(9, 'Portátil Ideapd 320', 444, 2, 'https://www.dominiovirtual.es/23078-large_default/portatil-lenovo-ideapad-320-15ikb.jpg'),
(10, 'Impresora HP Deskjet 3720', 59.99, 3, 'https://siabyte.com/1129-large_default/hp-deskjet-3720-impresora-wifi.jpg'),
(11, 'Impresora HP Laserjet Pro M26nw', 180, 3, 'https://www.tiendacartucho.es/analisis-impresoras/wp-content/uploads/2018/05/HP-LaserJet-Pro-MFP-M26nw.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `fabricante`
--
ALTER TABLE `fabricante`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `codigo_fabricante` (`codigo_fabricante`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `fabricante`
--
ALTER TABLE `fabricante`
  MODIFY `codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`codigo_fabricante`) REFERENCES `fabricante` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;