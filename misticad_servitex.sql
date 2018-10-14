-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2018 a las 15:18:57
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `misticad_servitex`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `albumes_fotos`
--

CREATE TABLE `albumes_fotos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(128) DEFAULT NULL,
  `url` varchar(128) DEFAULT NULL,
  `imagen` varchar(128) DEFAULT NULL,
  `imagen_title` varchar(128) DEFAULT NULL,
  `descripcion` text,
  `orden` smallint(5) UNSIGNED DEFAULT NULL,
  `destacado` tinyint(4) DEFAULT '0',
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `ruta_amazon` varchar(256) DEFAULT NULL,
  `seo_description` varchar(150) DEFAULT NULL,
  `seo_title` varchar(150) DEFAULT NULL,
  `seo_keywords` varchar(150) DEFAULT NULL,
  `idioma_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `albumes_fotos`
--

INSERT INTO `albumes_fotos` (`id`, `nombre`, `url`, `imagen`, `imagen_title`, `descripcion`, `orden`, `destacado`, `estado`, `ruta_amazon`, `seo_description`, `seo_title`, `seo_keywords`, `idioma_id`) VALUES
(1, 'Regalos Personalizados', 'regalos-personalizados', 'album_foto01.jpg', 'Regalos Personalizados', '<p>Te presentamos una selecci&oacute;n de los regalos para empresas y eventos m&aacute;s efectivos y originales para regalar a tus clientes, seguro que van a llevar tu marca siempre con ellos.</p>\r\n', 1, 0, 1, NULL, 'Regalos Personalizados', 'Regalos Personalizados', 'Regalos Personalizados', 1),
(2, 'Regalos de Empresa mas Vendidos', 'regalos-de-empresa-mas-vendidos', 'album_foto02.jpg', 'Regalos de Empresa mas Vendidos', '<p>Estos son reclamos publicitarios que tienen una alta rentabilidad y visibilidad de marca</p>\r\n', 2, 0, 1, NULL, 'Regalos de Empresa mas Vendidos', 'Regalos de Empresa mas Vendidos', 'Regalos de Empresa mas Vendidos', 1),
(3, 'Regalos Publicitarios mas Originales', 'regalos-publicitarios-mas-originales', 'imagen.jpg', 'Regalos Publicitarios mas Originales', '<p>En los que se refiere a regalo promocional muchas empresas buscan regalos de empresa originales para sorprender a sus clientes, ya que saben que cuanto m&aacute;s alto sea el impacto al hacer el regalo, m&aacute;s tiempo se va a recordar su marca. Sin embargo, no solo se trata de regalar regalos publicitarios originales, sino que tambi&eacute;n tienen que ser funcionales y visibles, ya que esto garantizar&aacute; la visibilidad del logo impreso al cliente y a terceras personas. En est&aacute;s secci&oacute;n encontrar&aacute;s regalos de empresa original baratos para grandes promociones, y tambi&eacute;n los m&aacute;s exclusivos para sorprender a tus clientes m&aacute;s importantes.</p>\r\n', 3, 0, 1, NULL, 'Regalos Publicitarios mas Originales', 'Regalos Publicitarios mas Originales', 'Regalos Publicitarios mas Originales', 1),
(4, 'Regalos Promocionales de Lujo', NULL, 'imagen.jpg', 'Regalos Promocionales de Lujo', '<p>En muchas campa&ntilde;as publicitarias se buscan art&iacute;culos de merchandising y regalos de empresa baratos para promociones de gran alcance donde el presupuesto para el detalle del cliente es m&aacute;s bien bajo. Estamos hablando de regalos baratos personalizados con el logo de empresa que est&eacute;n por debajo del euro, incluyendo la personalizaci&oacute;n, lo cual nos lleva art&iacute;culos de publicidad cl&aacute;sicos como bol&iacute;grafos, cajas de l&aacute;pices de colores o abridores de botellas.Sin embargo en tu b&uacute;squeda de regalos publicitarios baratos, tienes que tener en cuenta que cuantos m&aacute;s art&iacute;culos compres el precio por unidad ser&aacute; m&aacute;s bajo, con lo que te interesa realizar un pedido grande en lugar de varios pedidos peque&ntilde;os.</p>\r\n', 4, 0, 1, NULL, 'Regalos Promocionales de Lujo', 'Regalos Promocionales de Lujo', 'Regalos Promocionales de Lujo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `albumes_videos`
--

CREATE TABLE `albumes_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(128) DEFAULT NULL,
  `url` varchar(128) DEFAULT NULL,
  `video` varchar(128) DEFAULT NULL,
  `video_title` varchar(128) DEFAULT NULL,
  `descripcion` text,
  `orden` smallint(5) UNSIGNED DEFAULT NULL,
  `destacado` tinyint(4) DEFAULT '0',
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `ruta_amazon` varchar(256) DEFAULT NULL,
  `seo_description` varchar(150) DEFAULT NULL,
  `seo_title` varchar(150) DEFAULT NULL,
  `seo_keywords` varchar(150) DEFAULT NULL,
  `idioma_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `albumes_videos`
--

INSERT INTO `albumes_videos` (`id`, `nombre`, `url`, `video`, `video_title`, `descripcion`, `orden`, `destacado`, `estado`, `ruta_amazon`, `seo_description`, `seo_title`, `seo_keywords`, `idioma_id`) VALUES
(1, 'album_video01', 'album_video01', 'album_video01.jpg', 'album_video01', 'descripcion album videos1', 1, 0, 1, NULL, 'descripcion seo1', 'titulo seo1', 'keywords seo1', 1),
(2, 'album_video02', 'album_video02', 'album_video02.jpg', 'album_video02', 'descripcion album videos2', 2, 0, 1, NULL, 'descripcion seo2', 'titulo seo2', 'titulo seo2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(128) DEFAULT NULL,
  `resumen` varchar(256) DEFAULT NULL,
  `descripcion` text,
  `orden` bigint(20) DEFAULT NULL,
  `destacado` tinyint(4) NOT NULL DEFAULT '0',
  `autor` varchar(64) DEFAULT NULL,
  `url` varchar(128) DEFAULT NULL,
  `seo_title` varchar(150) DEFAULT NULL,
  `seo_description` varchar(150) DEFAULT NULL,
  `seo_keywords` varchar(150) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `idioma_id` bigint(20) UNSIGNED DEFAULT NULL,
  `creado` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modificado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id`, `nombre`, `resumen`, `descripcion`, `orden`, `destacado`, `autor`, `url`, `seo_title`, `seo_description`, `seo_keywords`, `estado`, `idioma_id`, `creado`, `modificado`) VALUES
(1, 'articulo 01', 'Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit ph', 'Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna.Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna. Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna. Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna.Suspendisse potenti...', 1, 1, 'pc', 'articulo01', 'titulo seo', 'descripcion seo', 'keywords seo', 1, 1, '2017-01-01 10:50:20', '2017-04-10 10:50:20'),
(2, 'articulo 02', 'Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit ph', 'Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna.Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna. Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna. Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna.Suspendisse potenti...', 2, 1, 'laptop', 'articulo02', 'titulo seo', 'descripcion seo', 'keywords seo', 1, 1, '2017-01-05 10:50:20', '2017-01-06 10:50:20'),
(3, 'articulo 03', 'Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit ph', 'Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna.Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna. Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna. Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna.Suspendisse potenti...', 3, 1, 'impresora', 'articulo03', 'titulo seo', 'descripcion seo', 'keywords seo', 1, 1, '2017-02-01 10:50:20', '2017-02-10 10:50:20'),
(4, 'articulo 04', 'Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit ph', 'Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna.Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna. Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna. Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna.Suspendisse potenti...', 4, 0, 'sofa', 'articulo04', 'titulo seo', 'descripcion seo', 'keywords seo', 1, 1, '2017-03-01 10:50:20', '2017-03-10 10:50:20'),
(5, 'articulo 05', 'Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit ph', '<p>Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna.Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna. Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna. Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna.Suspendisse potenti...</p>\r\n', 5, 0, 'camisa', 'articulo04', 'titulo seo', 'descripcion seo', 'keywords seo', 1, 1, '2017-04-01 10:50:20', '2017-11-15 11:37:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atributos`
--

CREATE TABLE `atributos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(128) DEFAULT NULL,
  `estado` tinyint(3) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `atributos`
--

INSERT INTO `atributos` (`id`, `nombre`, `estado`) VALUES
(1, 'talla', 1),
(2, 'color', 1),
(3, 'material', 1),
(4, 'capacidad', 1),
(5, 'velocidad', 1),
(6, 'marca', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(128) DEFAULT NULL,
  `subtitulo` varchar(128) DEFAULT NULL,
  `resumen` varchar(256) DEFAULT NULL,
  `btn_titulo` varchar(128) DEFAULT NULL,
  `link` varchar(128) DEFAULT NULL,
  `imagen` varchar(64) DEFAULT NULL,
  `imagen_title` varchar(128) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `tipo_banner_id` bigint(20) UNSIGNED NOT NULL,
  `creado` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modificado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `banners`
--

INSERT INTO `banners` (`id`, `titulo`, `subtitulo`, `resumen`, `btn_titulo`, `link`, `imagen`, `imagen_title`, `orden`, `estado`, `tipo_banner_id`, `creado`, `modificado`) VALUES
(1, '', 'BANNER-HOME-01', 'BANNER-HOME', 'Ver mas', '', 'BANNER-HOME-01.jpg', 'BANNER-HOME-01', 1, 1, 1, '2017-01-10 10:50:20', '2017-11-07 18:14:57'),
(2, '', 'Regalos Personalizados', '', 'Ver mas', 'www.google.com.pe', '20180116122643.jpg', 'banner-02', 2, 1, 2, '2017-02-10 10:50:20', '2018-01-16 20:57:40'),
(3, '', 'Merchandising Ecológicos ', '', 'Ver mas', 'www.google.com.pe', '20180116121633.jpg', 'banner-01', 3, 1, 2, '2017-03-10 10:50:20', '2018-01-16 20:58:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carritos`
--

CREATE TABLE `carritos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo_pedido` varchar(64) DEFAULT NULL,
  `token` varchar(128) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `fecha_venta` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `costo_envio` decimal(10,2) DEFAULT NULL,
  `codigo_descuento` varchar(45) DEFAULT NULL,
  `porcentaje_descuento` varchar(45) DEFAULT NULL,
  `cliente_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carro_detalle`
--

CREATE TABLE `carro_detalle` (
  `id` int(10) UNSIGNED NOT NULL,
  `imagen` varchar(128) DEFAULT NULL,
  `nombre` varchar(256) DEFAULT NULL,
  `codigo` varchar(64) DEFAULT NULL,
  `cantidad` int(16) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL,
  `peso` varchar(128) DEFAULT NULL,
  `talla` varchar(128) DEFAULT NULL,
  `imagen_title` varchar(128) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `producto_id` bigint(20) UNSIGNED NOT NULL,
  `carrito_id` bigint(20) UNSIGNED NOT NULL,
  `atributo_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(128) DEFAULT NULL,
  `imagen` varchar(64) DEFAULT NULL,
  `descripcion` text,
  `resumen` varchar(256) DEFAULT NULL,
  `url` varchar(256) DEFAULT NULL,
  `orden` smallint(6) DEFAULT NULL,
  `seo_description` varchar(150) DEFAULT NULL,
  `seo_title` varchar(150) DEFAULT NULL,
  `banner` varchar(64) DEFAULT NULL,
  `destacado` tinyint(4) NOT NULL DEFAULT '0',
  `seo_keywords` varchar(150) DEFAULT NULL,
  `imagen_title` varchar(128) DEFAULT NULL,
  `atributos` varchar(128) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `padre_id` bigint(20) UNSIGNED DEFAULT '0',
  `tipo_categoria_id` bigint(20) UNSIGNED NOT NULL,
  `creado` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modificado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `imagen`, `descripcion`, `resumen`, `url`, `orden`, `seo_description`, `seo_title`, `banner`, `destacado`, `seo_keywords`, `imagen_title`, `atributos`, `estado`, `padre_id`, `tipo_categoria_id`, `creado`, `modificado`) VALUES
(1, 'Categoria Principal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 1, NULL, 1, '2017-01-10 10:50:20', '2017-01-10 10:50:20'),
(2, 'Merchandising', '20171123122630.jpg', '', NULL, 'merchandising', 1, 'Merchandising', 'Merchandising', NULL, 0, 'Merchandising', 'Merchandising', NULL, 1, 1, 1, '2017-11-23 12:26:30', '2018-01-30 17:39:24'),
(3, 'Textiles', '20171123122724.jpg', '', NULL, 'textiles', 2, 'Textiles', 'Textiles', NULL, 0, 'Textiles', 'Textiles', NULL, 1, 1, 1, '2017-11-23 12:27:24', '2018-01-30 17:39:31'),
(4, 'Agendas publicitarias', '20171201164802.jpg', '', NULL, 'agendaspublicitarias', 1, 'Agendas publicitarias', 'Agendas publicitarias', NULL, 1, 'Agendas publicitarias', '20171123123523', NULL, 0, 2, 1, '2017-11-23 12:35:23', '2018-01-30 17:39:42'),
(5, 'Altavoces bluetooth', '20171201164844.jpg', '', NULL, 'altavoces-bluetooth', 2, 'Altavoces bluetooth', 'Altavoces bluetooth', NULL, 1, 'Altavoces bluetooth', '20171123123701', NULL, 0, 2, 1, '2017-11-23 12:37:01', '2018-01-30 17:39:39'),
(6, 'Bidones de agua', '20171201164920.jpg', '', NULL, 'bidones-de-agua', 3, 'Bidones de agua', 'Bidones de agua', NULL, 1, 'Bidones de agua', '20171123124312', NULL, 0, 2, 1, '2017-11-23 12:39:26', '2018-01-30 17:39:34'),
(7, 'Bolígrafos publicitarios', '20171201165015.jpg', '', NULL, 'boligrafos-publicitarios', 4, 'Boligrafos publicitarios', 'Boligrafos publicitarios', NULL, 0, 'Boligrafos publicitarios', '20171123124037', NULL, 0, 2, 1, '2017-11-23 12:40:37', '2018-01-30 17:39:45'),
(8, 'Bragas de cuello personalizadas', '20171201165045.jpg', '', NULL, 'bragas-de-cuello-personalizadas', 5, 'Bragas de cuello personalizadas', 'Bragas de cuello personalizadas', NULL, 0, 'Bragas de cuello personalizadas', '20171123124359', NULL, 0, 2, 1, '2017-11-23 12:43:59', '2018-01-30 17:39:52'),
(9, 'Calendarios publicitarios', '20171201165114.jpg', '', NULL, 'calendarios-publicitarios', 6, 'Calendarios publicitarios', 'Calendarios publicitarios', NULL, 0, 'Calendarios publicitarios', '20171123124607', NULL, 0, 2, 1, '2017-11-23 12:46:07', '2018-01-30 17:39:58'),
(10, 'Gafas de sol personalizadas', '20171201165136.jpg', '', NULL, 'gafas-de-sol-personalizadas', 7, 'Gafas de sol personalizadas', 'Gafas de sol personalizadas', NULL, 0, 'Gafas de sol personalizadas', '20171123124725', NULL, 0, 2, 1, '2017-11-23 12:47:25', '2018-01-30 17:39:48'),
(11, 'Gorras-publicitarias', '20171201164947.jpg', '', NULL, 'gorras-publicitarias', 3, 'gorras-publicitarias', 'gorras-publicitarias', NULL, 0, 'gorras-publicitarias', '20171123125034', NULL, 0, 2, 1, '2017-11-23 12:50:34', '2018-01-30 17:39:55'),
(12, 'Libretas de notas', '20171201165233.jpg', '', NULL, 'libretas-de-notas', 9, 'libretas de notas', 'libretas de notas', NULL, 0, 'libretas de notas', '20171123125149', NULL, 0, 2, 1, '2017-11-23 12:51:49', '2018-01-30 17:40:04'),
(13, 'Llaveros-publicitarios', '20171201165343.jpg', '', NULL, 'llaveros-publicitarios', 10, 'llaveros-publicitarios', 'llaveros-publicitarios', NULL, 0, 'llaveros-publicitarios', '20171123125334', NULL, 0, 2, 1, '2017-11-23 12:53:34', '2018-01-30 17:40:17'),
(14, 'Polos', '20180126144240.png', '', NULL, 'polos', 1, 'Polos', 'Polos', NULL, 1, 'Polos', '20171201165451', NULL, 1, 3, 1, '2017-11-23 13:22:30', '2018-01-30 17:40:14'),
(15, 'Gorros', '20180126144646.png', '', NULL, 'gorros', 2, 'Gorros', 'Gorros', NULL, 1, 'Gorros', '20171201165533', NULL, 1, 3, 1, '2017-11-23 13:22:58', '2018-01-30 17:40:11'),
(16, 'Casacas', '20180126144703.png', '', NULL, 'casacas', 3, 'Casacas', 'Casacas', NULL, 1, 'Casacas', '20171201165551', NULL, 1, 3, 1, '2017-11-23 13:23:17', '2018-01-30 17:40:08'),
(17, 'Bolsos', '20180126144714.png', '', NULL, 'bolsos', 4, 'Bolsos', 'Bolsos', NULL, 0, 'Bolsos', '20171201165612', NULL, 1, 3, 1, '2017-11-23 13:23:44', '2018-01-30 17:40:20'),
(18, 'Maletines', '20180126144724.png', '', NULL, 'maletines', 5, 'Maletines', 'Maletines', NULL, 0, 'Maletines', '20171201165629', NULL, 1, 3, 1, '2017-11-23 13:24:18', '2018-01-30 17:40:33'),
(19, 'Camisas', '20180126144735.png', '', NULL, 'camisas', 6, 'Camisas', 'Camisas', NULL, 0, 'Camisas', '20171201165643', NULL, 1, 3, 1, '2017-11-23 13:25:29', '2018-01-30 17:40:30'),
(20, 'uniformes', '20180126144747.png', '', NULL, 'uniformes', 7, 'uniformes', 'uniformes', NULL, 0, 'uniformes', '20171201165702', NULL, 1, 3, 1, '2017-11-29 19:41:22', '2018-01-30 17:40:27'),
(21, 'chalecos', '20180126144803.png', '', NULL, 'chalecos', 8, 'chalecos', 'chalecos', NULL, 0, 'chalecos', '20180125174957', NULL, 1, 3, 1, '2017-11-29 19:42:29', '2018-01-30 17:40:24'),
(22, 'camisetas deportivas', '20180126144813.png', '', NULL, 'camisetas-deportivas', 9, 'camisetas deportivas', 'camisetas deportivas', NULL, 0, 'camisetas deportivas', '20171201165858', NULL, 1, 3, 1, '2017-11-29 19:42:55', '2018-01-30 17:40:36'),
(23, 'mandiles', '20180126144825.png', '', NULL, 'mandiles', 10, 'mandiles', 'mandiles', NULL, 0, 'mandiles', '20171201165924', NULL, 1, 3, 1, '2017-11-29 19:44:48', '2018-01-30 17:40:41'),
(24, 'Antiestres', '20180130105510.jpg', '', '', 'antiestres', 1, 'Antiestres', 'Antiestres', NULL, 0, 'Antiestres', 'antiestres', NULL, 1, 2, 1, '2018-01-30 09:14:38', '2018-01-30 17:40:44'),
(25, 'Artículos de Escritorio', '20180130110620.jpg', '', '', 'articulos-de-escritorio', 2, 'Artículos de Escritorio', 'Artículos de Escritorio', NULL, 0, 'Artículos de Escritorio', 'articulos-de-oficina', NULL, 1, 2, 1, '2018-01-30 10:06:21', '2018-01-30 17:40:48'),
(26, 'Artículos Personales', '20180130110657.jpg', '', '', 'articulos-personales', 3, 'Artículos Personales', 'Artículos Personales', NULL, 0, 'Artículos Personales', 'articulos-personales', NULL, 1, 2, 1, '2018-01-30 10:06:57', '2018-01-30 17:41:11'),
(27, 'Bolsos y Maletines', '20180130110725.jpg', '', '', 'bolsos-y-maletines', 4, 'Bolsos y Maletines', 'Bolsos y Maletines', NULL, 0, 'Bolsos y Maletines', 'bolso-y-maletines', NULL, 1, 2, 1, '2018-01-30 10:07:26', '2018-01-30 17:41:19'),
(28, 'Linea Ecológica', '20180130110749.jpg', '', '', 'linea-ecologica', 5, 'Linea Ecológica', 'Linea Ecológica', NULL, 0, 'Linea Ecológica', 'linea-ecologica', NULL, 1, 2, 1, '2018-01-30 10:07:49', '2018-01-30 17:41:29'),
(29, 'Llaveros', '20180130110814.jpg', '', '', 'llaveros', 6, 'Llaveros', 'Llaveros', NULL, 0, 'Llaveros', 'llaveros', NULL, 1, 2, 1, '2018-01-30 10:08:15', '2018-01-30 17:41:16'),
(30, 'Memorias USB', '20180130110923.jpg', '', '', 'memorias-usb', 7, 'Memorias USB', 'Memorias USB', NULL, 0, 'Memorias USB', 'memoria-usb', NULL, 1, 2, 1, '2018-01-30 10:09:24', '2018-01-30 17:41:14'),
(31, 'Mug', '20180130110947.jpg', '', '', 'mug', 8, 'Mug', 'Mug', NULL, 0, 'Mug', 'mug', NULL, 1, 2, 1, '2018-01-30 10:09:47', '2018-01-30 17:41:25'),
(32, 'Resaltadores', '20180130111027.jpg', '', '', 'resaltadores', 9, 'Resaltadores', 'Resaltadores', NULL, 0, 'Resaltadores', 'resaltadores', NULL, 1, 2, 1, '2018-01-30 10:10:27', '2018-01-30 17:41:22'),
(33, 'Tazas Sublimadas', '20180130111120.jpg', '', '', 'tazas-sublimadas', 10, 'Tazas Sublimadas', 'Tazas Sublimadas', NULL, 0, 'Tazas Sublimadas', 'tazas-sublimadas', NULL, 1, 2, 1, '2018-01-30 10:11:20', '2018-01-30 17:41:32'),
(34, 'Tecnológico USB', '20180130111153.jpg', '', '', 'tecnologico-usb', 11, 'Tecnológico USB', 'Tecnológico USB', NULL, 0, 'Tecnológico USB', 'tecnologico-usb', NULL, 1, 2, 1, '2018-01-30 10:11:53', '2018-01-30 17:41:35'),
(35, 'Tomatodos', '20180130111321.jpg', '', '', 'tomatodos', 12, 'Tomatodos', 'Tomatodos', NULL, 0, 'Tomatodos', 'tomatodos', NULL, 1, 2, 1, '2018-01-30 10:13:21', '2018-01-30 17:41:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_productos`
--

CREATE TABLE `categorias_productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `producto_id` bigint(20) UNSIGNED NOT NULL,
  `categoria_id` bigint(20) UNSIGNED NOT NULL,
  `estado` tinyint(4) DEFAULT '1',
  `orden` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombres` varchar(64) DEFAULT NULL,
  `apellidos` varchar(64) DEFAULT NULL,
  `correo` varchar(128) NOT NULL,
  `telefono` varchar(16) DEFAULT NULL,
  `ruc` varchar(11) DEFAULT NULL,
  `razon_social` varchar(128) DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `codigo` varchar(64) DEFAULT NULL,
  `fecha_codigo` datetime DEFAULT NULL,
  `imagen` varchar(128) DEFAULT NULL,
  `logo` varchar(128) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `descripcion` text,
  `idioma_id` bigint(20) UNSIGNED NOT NULL,
  `imagen_title` varchar(128) DEFAULT NULL,
  `estado_id` bigint(20) UNSIGNED NOT NULL,
  `password` varchar(250) NOT NULL,
  `creado` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modificado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `direccion` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombres`, `apellidos`, `correo`, `telefono`, `ruc`, `razon_social`, `dni`, `codigo`, `fecha_codigo`, `imagen`, `logo`, `estado`, `descripcion`, `idioma_id`, `imagen_title`, `estado_id`, `password`, `creado`, `modificado`, `direccion`) VALUES
(1, 'Juan', 'Perez', 'juanperez@cuvox.de', '8745633', '1234567890', 'Juancito SAC', '12345678', NULL, NULL, 'imagen01.jpg', NULL, 1, NULL, 1, 'imagen01', 1, '$2y$10$EkmWRqZT8CJw80n3YSFQD.zf1muVABiX4Wqc4VoeEZJYN9O6wIxc2', '2017-01-10 10:50:20', '2017-11-02 11:36:28', 'villa'),
(2, 'jose', 'alvarez', 'jalvarez@cuvox.de', '1234567', '1234567896', 'jalvarez sac', '78945612', NULL, NULL, 'imagen02.jpg', NULL, 1, NULL, 1, 'imagen02', 1, '$2y$10$EkmWRqZT8CJw80n3YSFQD.zf1muVABiX4Wqc4VoeEZJYN9O6wIxc2', '2017-01-10 10:50:20', '2017-11-02 13:26:45', 'san luis'),
(3, 'cesar', 'fernandez', 'cesar.9151@gmail.com', '1234567', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, NULL, 1, '$2y$10$EGEkkoJ0HqvHVDfGKN8Rn.Pd9iM1Iz5pWaMpMex3n986eRYd70d3G', '2017-11-02 15:33:19', '2017-11-02 15:33:19', NULL),
(4, 'Yolanda', 'Pérez Rodríguez', 'yolandaperezrodriguez5@gmail.com', '995556087', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, NULL, 1, '$2y$10$mQOE/XRj3dFE6YusgcIk5.o5loJ8oh6CJeGycNN.Lg/AKsU6bSXb.', '2018-03-02 15:02:28', '2018-03-02 21:03:01', NULL),
(5, 'elvin', 'gonzalez', 'ing.elvingonzalez@gmail.com', '920825205', NULL, NULL, NULL, 'd4bf543c1a398cc2a91b30d55708fa53', NULL, NULL, NULL, 2, NULL, 1, NULL, 1, '$2y$10$P.CiPOxKVdMtTb1Jvqxe2eM.MVwnBSDcpNviyorZEn.W9ieORNTn.', '2018-09-15 21:00:43', '2018-09-15 21:00:43', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes_web`
--

CREATE TABLE `clientes_web` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(256) DEFAULT NULL,
  `razon_social` varchar(128) DEFAULT NULL,
  `ruc` varchar(11) DEFAULT NULL,
  `correo` varchar(128) NOT NULL,
  `telefono` varchar(16) DEFAULT NULL,
  `logo` varchar(128) DEFAULT NULL,
  `creado` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modificado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `direccion` varchar(256) DEFAULT NULL,
  `orden` bigint(20) UNSIGNED DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `idioma_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes_web`
--

INSERT INTO `clientes_web` (`id`, `url`, `razon_social`, `ruc`, `correo`, `telefono`, `logo`, `creado`, `modificado`, `direccion`, `orden`, `estado`, `idioma_id`) VALUES
(1, 'jose', 'joselunaSAC', '12345678901', 'jose@hotmail.com', '1597531', 'clienteweb01.jpg', '2017-01-10 10:50:20', '2017-02-10 10:50:20', 'villa el salvador', 1, 1, 1),
(2, 'daniel', 'danielSAC', '45673456711', 'daniel@hotmail.com', '5807890', 'clienteweb02.jpg', '2017-02-10 10:50:20', '2017-03-10 10:50:20', 'Surco', 2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(128) DEFAULT NULL,
  `correo` varchar(128) DEFAULT NULL,
  `comentario` text,
  `respuesta` text,
  `aprobado` tinyint(4) NOT NULL DEFAULT '0',
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `autor_respuesta` varchar(45) DEFAULT 'admin',
  `articulo_id` bigint(20) UNSIGNED NOT NULL,
  `idioma_id` bigint(20) UNSIGNED NOT NULL,
  `creado` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modificado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `nombre`, `correo`, `comentario`, `respuesta`, `aprobado`, `estado`, `autor_respuesta`, `articulo_id`, `idioma_id`, `creado`, `modificado`) VALUES
(1, 'Jone doe', 'Jone doe@', 'Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti.', 'Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti.', 0, 1, 'admin', 1, 1, '2017-01-10 10:50:20', '2017-01-11 14:11:25'),
(2, 'mike', 'mike@', 'Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti.', 'very goog Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 0, 1, 'admin', 1, 1, '2017-01-12 10:50:20', '2017-01-15 14:11:25'),
(3, 'mike', 'mike@', 'Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti.', 'good', 0, 1, 'admin', 2, 1, '2017-02-01 10:50:20', '2017-03-01 14:11:25'),
(4, 'onrents', 'onrents@', 'Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti.', 'I don like', 0, 1, 'admin', 2, 1, '2017-04-01 10:50:20', '2017-05-01 14:11:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuraciones`
--

CREATE TABLE `configuraciones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `llave` varchar(150) DEFAULT NULL,
  `valor` text,
  `descripcion` text,
  `tipo` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0: input\n1: text area\n2: imagenes',
  `estado` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `configuraciones`
--

INSERT INTO `configuraciones` (`id`, `llave`, `valor`, `descripcion`, `tipo`, `estado`) VALUES
(1, 'correo_notificaciones', 'cesar.9151@gmail.com', 'Correo al que llegaran las notificaciones de la web.', 0, 1),
(2, 'pie_pagina', 'Copyright ©2017 Importaciones D&L. Todos los derechos reservados.', 'Texto que aparece como pie de página en la web.', 0, 1),
(3, 'correo_from', 'solucionesajax@cuvox.de', 'Correo de contacto', 0, 1),
(4, 'direccion', 'San Luis , 6487, Lima', 'Direccion de la Empresa que aparece en el lado izquierdo de la web.', 0, 1),
(5, 'dominio', 'www.yourdomain.com', 'Direccion web de la pagina', 0, 1),
(6, 'telefono_whatsapp', '947296182', 'Número de Whatsapp', 0, 1),
(7, 'telefono', '(01) 3216547', 'Es el numero de telefono que ira en el header del portal', 0, 1),
(8, 'texto_pie', '<p>Bienvenido <strong><a href=\"http://www.servitex.com\" style=\"color: #03a9f4;\">Servitex.com</a></strong> &nbsp;empresa dedicada a la comercializaci&oacute;n de regalos promocionales y regalos de empresa. En este cat&aacute;logo electr&oacute;nico de regalos promocionales podr&aacute; encontrar una selecci&oacute;n de los art&iacute;culos promocionales que ponemos a su disposici&oacute;n tanto de importaci&oacute;n como de fabricaci&oacute;n nacional, as&iacute; como regalos PERSONALIZADOS que podr&aacute;n ser creados a la medida de sus necesidades. Si no encuentra el art&iacute;culo promocional que precisa no dude en contactar con nosotros.</p>\r\n', 'Texto sobre nosotros', 1, 1),
(9, 'enlace_facebook', 'https://www.facebook.com', 'Direcion de fanpage Facebook', 0, 1),
(10, 'enlace_twitter', 'https://www.twitter.com', 'Red social Twiter', 0, 1),
(11, 'enlace_youtube', 'https://www.youtube.com', 'Direccion de canal de youtube', 0, 1),
(12, 'enlace_google_plus', 'https://www.google.com', 'Direccion de pagina de google+', 0, 1),
(13, 'enlace_instagram', 'https://www.instagram.com', 'Red Social Instagram', 0, 1),
(14, 'enlace_pinterest', 'https://www.pinterest.com', 'Red social Pinterest', 0, 1),
(15, 'logo', 'logo.jpg', 'logo de la empresa', 2, 1),
(16, 'nombre_comercial', 'servitex', 'nombre comercial', 0, 1),
(17, 'tipo_activacion', '1', '{\"valores\":{\"1\":\"si\",\"2\":\"No\"},\"descripcion\":\"tipo de activacion de cuenta\"}', 3, 1),
(18, 'moneda', 'S/', 'tipo de moneda', 0, 1),
(19, 'tipo_tienda', '2', '{\"valores\":{\"1\":\"Pedidos\",\"2\":\"Cotizaciones\"},\"descripcion\":\"tipo de tienda cotizaci\\u00f3n o pedidos\"}', 3, 1),
(20, 'horario', '8:00 - 19:00, Lunes - Domingo', 'Horario de atención', 1, 1),
(21, 'paginacion_textiles', '12', 'paginacion textiles', 0, 1),
(22, 'paginacion_servicios', '12', 'paginacion servicios', 0, 1),
(23, 'pag_cat_merchandising', '12', 'paginacion merchandising', 0, 1),
(24, 'pag_cat_textiles', '12', 'paginacion textiles', 0, 1),
(25, 'paginacion_productos', '36', 'paginacion por productos de categoria merchandising o texiles', 0, 1),
(26, 'paginacion_ofertas', '36', 'paginacion ofertas', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizaciones`
--

CREATE TABLE `cotizaciones` (
  `id` int(11) UNSIGNED NOT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `fecha` datetime DEFAULT NULL,
  `cliente_id` int(11) NOT NULL,
  `total` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cotizaciones`
--

INSERT INTO `cotizaciones` (`id`, `codigo`, `estado`, `fecha`, `cliente_id`, `total`) VALUES
(1, '1509486738', 2, '2017-10-31 16:52:18', 1, NULL),
(2, '1509486765', 2, '2017-10-31 16:52:45', 1, NULL),
(3, '1511477095', 2, '2017-11-23 17:44:55', 3, NULL),
(4, '1520266596', 2, '2018-03-05 11:16:36', 4, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_atributos`
--

CREATE TABLE `detalle_atributos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(128) DEFAULT NULL,
  `descripcion` varchar(256) DEFAULT NULL,
  `atributo_id` bigint(20) UNSIGNED NOT NULL,
  `valor` varchar(32) DEFAULT NULL,
  `estado` tinyint(3) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_atributos`
--

INSERT INTO `detalle_atributos` (`id`, `nombre`, `descripcion`, `atributo_id`, `valor`, `estado`) VALUES
(1, 'Small', 'talla chica', 1, 'S', 1),
(2, 'Medium', 'talla mediana', 1, 'M', 1),
(3, 'Large', 'talla grande', 1, 'L', 1),
(4, 'Rojo', '', 2, '#f21356', 1),
(5, 'Azul', NULL, 2, '#000033', 1),
(6, 'Amarillo', NULL, 2, '#FFFF00', 1),
(7, 'Algodon', NULL, 3, 'Algodon', 1),
(8, 'Lino', NULL, 3, 'Lino', 1),
(9, 'Seda', NULL, 3, 'Seda', 1),
(10, '2GB', NULL, 4, '2GB', 1),
(11, '4GB', NULL, 4, '4GB', 1),
(12, '8GB', NULL, 4, '8GB', 1),
(13, '1333', NULL, 5, '1333 ghz', 1),
(14, '2600', NULL, 5, '2600 ghz', 1),
(15, '800', NULL, 5, '800 ghz', 1),
(16, 'Kingstong', NULL, 6, 'Kingsthong', 1),
(17, 'Datatravel', NULL, 6, 'Datatravel', 1),
(18, 'Toshiba', NULL, 6, 'Toshiba', 1),
(19, 'celeste', 'celeste', 2, '#2de8e8', 1),
(20, 'verdesss', 'verdesss', 2, '#703f3f', 1),
(21, '', '', 2, '	#703f3f	', 0),
(22, 'Negro', 'negro', 2, '#191818', 1),
(23, 'Marrón', 'marrón', 2, '#bf5938', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_cotizacion`
--

CREATE TABLE `detalle_cotizacion` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(256) DEFAULT NULL,
  `imagen` varchar(128) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `atributo_id` int(11) DEFAULT NULL,
  `producto_id` bigint(20) UNSIGNED NOT NULL,
  `cotizacion_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_cotizacion`
--

INSERT INTO `detalle_cotizacion` (`id`, `nombre`, `imagen`, `cantidad`, `precio`, `subtotal`, `estado`, `atributo_id`, `producto_id`, `cotizacion_id`) VALUES
(3, 'agenda publicitaria bolsillo', '20171123144931.jpg', 2, '0.00', '0.00', 1, NULL, 18, 3),
(4, 'Set de Herramientas', '20180130174758.jpg', 100, '0.00', '0.00', 1, NULL, 39, 4),
(5, 'Set de Oficina', '20180130173209.jpg', 100, '0.00', '0.00', 1, NULL, 37, 4),
(6, 'Miniset de Escritorio', '20180130172133.jpg', 100, '0.00', '0.00', 1, NULL, 34, 4),
(7, 'Kit de Herramientas', '20180130171436.jpg', 100, '0.00', '0.00', 1, NULL, 31, 4),
(8, 'Set de Herramientas con Linterna', '20180130183749.jpg', 100, '0.00', '0.00', 1, NULL, 55, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id`, `name`, `estado`) VALUES
(1, 'cotizado', 1),
(2, 'pendiente', 1),
(3, 'aceptado', 1),
(4, 'entregado', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `estado` varchar(128) DEFAULT NULL,
  `ubigeo` varchar(64) DEFAULT NULL,
  `pais_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `estado`, `ubigeo`, `pais_id`) VALUES
(1, 'AMAZONAS', '01', 1),
(2, 'ANCASH', '02', 1),
(3, 'APURIMAC', '03', 1),
(4, 'AREQUIPA', '04', 1),
(5, 'AYACUCHO', '05', 1),
(6, 'CAJAMARCA', '06', 1),
(7, 'CALLAO', '07', 1),
(8, 'CUSCO', '08', 1),
(9, 'HUANCAVELICA', '09', 1),
(10, 'HUANUCO', '10', 1),
(11, 'ICA', '11', 1),
(12, 'JUNIN', '12', 1),
(13, 'LA LIBERTAD', '13', 1),
(14, 'LAMBAYEQUE', '14', 1),
(15, 'LIMA', '15', 1),
(16, 'LORETO', '16', 1),
(17, 'MADRE DE DIOS', '17', 1),
(18, 'MOQUEGUA', '18', 1),
(19, 'PASCO', '19', 1),
(20, 'PIURA', '20', 1),
(21, 'PUNO', '21', 1),
(22, 'SAN MARTIN', '22', 1),
(23, 'TACNA', '23', 1),
(24, 'TUMBES', '24', 1),
(25, 'UCAYALI', '25', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE `fotos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(128) DEFAULT NULL,
  `imagen` varchar(128) DEFAULT NULL,
  `imagen_title` varchar(128) DEFAULT NULL,
  `descripcion` text,
  `orden` bigint(20) UNSIGNED DEFAULT NULL,
  `destacado` tinyint(4) DEFAULT '0',
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `ruta_amazon` varchar(256) DEFAULT NULL,
  `album_id` bigint(20) UNSIGNED DEFAULT NULL,
  `idioma_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `fotos`
--

INSERT INTO `fotos` (`id`, `nombre`, `imagen`, `imagen_title`, `descripcion`, `orden`, `destacado`, `estado`, `ruta_amazon`, `album_id`, `idioma_id`) VALUES
(1, 'Regalos Publicitarios más originales', '20180214162103.jpg', 'Los-regalos-corporativos-más-originales', '<p>descripcion1</p>\r\n', 1, 1, 1, NULL, 1, 1),
(2, 'Artículos publicitarios para niños', '20180214162306.jpg', 'Artículos-publicitarios-para-niños', '<p>descripcion2</p>\r\n', 2, 1, 1, NULL, 1, 1),
(3, 'LIBRETA CUADRANTS A5', '20180214163253.jpg', 'LIBRETA-CUADRANTS-A5', '<p>descripcion3</p>\r\n', 3, 1, 1, NULL, 2, 1),
(4, 'BOLSA ECO LONG', '20180214163404.jpg', 'BOLSA-ECO-LONG', '<p>descripcion4</p>\r\n', 4, 1, 1, NULL, 2, 1),
(5, 'Bolsa Impermeable Bayside XL', '20180214155443.jpg', 'mas-originales-01', '<p>descripcion5</p>\r\n', 5, 0, 1, NULL, 3, 1),
(6, 'Paraguas Blizzard', '20180214165909.jpg', 'Paraguas-Blizzard', '<p>descripcion6</p>\r\n', 1, 1, 1, NULL, 4, 1),
(7, 'solofoto01', '20180214153059.jpg', 'banner-abajo-01', 'descripcionsolofoto1', 1, 0, 1, NULL, NULL, 1),
(8, 'solofoto02', '20180214153219.jpg', 'banner-abajo-02', 'descripcionsolofoto2', 2, 0, 1, NULL, NULL, 1),
(9, 'Palo Selfie Smile', '20180214155847.jpg', 'Palo-Selfie-Smile', '', 1, 1, 1, NULL, 3, NULL),
(10, 'Altavoz Bluetooth Multitask', '20180214155946.jpg', 'Altavoz-Bluetooth-Multitask', '', 2, 1, 1, NULL, 3, NULL),
(11, 'Altavoz Bluetooth Spoty', '20180214160030.jpg', 'Altavoz-Bluetooth-Spoty', '', 3, 1, 1, NULL, 3, NULL),
(12, 'Bolsa Impermeable Bayside', '20180214160116.jpg', 'Bolsa-Impermeable-Bayside', '', 4, 1, 1, NULL, 3, NULL),
(13, 'Gafas Virtual View', '20180214160208.jpg', 'Gafas-Virtual-View', '', 7, 1, 1, NULL, 3, NULL),
(14, 'Estuche Powerfolder', '20180214160250.jpg', 'Estuche-Powerfolder', '', 6, 1, 1, NULL, 3, NULL),
(15, 'Riñonera Runclub', '20180214160359.jpg', 'Riñonera-Runclub', '', 8, 1, 1, NULL, 3, NULL),
(16, 'Teleobjetivo Zoom', '20180214160445.jpg', 'Teleobjetivo-Zoom', '', 9, 1, 1, NULL, 3, NULL),
(17, 'Tripode Publicitario Take3', '20180214160524.jpg', 'Tripode-Publicitario-Take3', '', 10, 1, 1, NULL, 3, NULL),
(18, 'Altavoz Bluetooth Dance', '20180214160609.jpg', 'Altavoz-Bluetooth-Dance', '', 11, 1, 1, NULL, 3, NULL),
(19, 'Drone Hover', '20180214160658.jpg', 'Drone-Hover', '', 12, 1, 1, NULL, 3, NULL),
(20, 'Mando Juegos Gaming', '20180214160731.jpg', 'Mando-Juegos-Gaming', '', 13, 1, 1, NULL, 3, NULL),
(21, 'Gafas Virtual Basic', '20180214161039.jpg', 'Gafas-Virtual-Basic', '', 14, 1, 1, NULL, 3, NULL),
(22, 'Gafas virtual Plus', '20180214161122.jpg', 'Gafas-virtual-Plus', '', 15, 1, 1, NULL, 3, NULL),
(23, 'Auriculares Soul', '20180214161220.jpg', 'Auriculares-Soul', '', 16, 1, 1, NULL, 3, NULL),
(24, 'Usb personalizados', '20180214162435.jpg', 'Usb-personalizados', '', 3, 1, 1, NULL, 1, NULL),
(25, 'Regalos publicitarios para ferias y congresos', '20180214162544.jpg', 'Regalos-publicitarios-para-ferias-y-congresos', '', 4, 1, 1, NULL, 1, NULL),
(26, 'TAZA SUBLIM', '20180214163439.jpg', 'TAZA-SUBLIM', '', 1, 1, 1, NULL, 2, NULL),
(27, 'MOCHILA ECO', '20180214163520.jpg', 'MOCHILA-ECO', '', 2, 1, 1, NULL, 2, NULL),
(28, 'BOLÍGRAFO COOL', '20180214163605.jpg', 'BOLÍGRAFO-COOL', '', 5, 1, 1, NULL, 2, NULL),
(29, 'LLAVERO CIRCLE', '20180214163658.jpg', 'LLAVERO-CIRCLE', '', 6, 1, 1, NULL, 2, NULL),
(30, 'BOTELLA ALUMINIO URBAN ', '20180214163804.jpg', 'BOTELLA-ALUMINIO-URBAN', '', 7, 1, 1, NULL, 2, NULL),
(31, 'GORRA URBAN STYLE', '20180214163843.jpg', 'GORRA-URBAN-STYLE', '', 8, 1, 1, NULL, 2, NULL),
(32, 'Paraguas Plegables Trend', '20180214170111.jpg', 'Paraguas-Plegables-Trend', '', 2, 1, 1, NULL, 4, NULL),
(33, 'Termo Mug Set', '20180214170327.jpg', 'Termo-Mug-Set', '', 3, 1, 1, NULL, 4, NULL),
(34, 'Bolígrafo Publicidad Parchis', '20180214170746.jpg', 'Bolígrafo-Publicidad-Parchis', '', 4, 1, 1, NULL, 4, NULL),
(35, 'DATASHIELD', '20180214170900.jpg', 'DATASHIELD', '', 5, 1, 1, NULL, 4, NULL),
(36, 'Maletín Portátil DuoTone 13”', '20180214171003.jpg', 'Maletín-Portátil-DuoTone-13”', '', 6, 1, 1, NULL, 4, NULL),
(37, 'Smartwatch One', '20180214171137.jpg', 'Smartwatch-One', '', 7, 1, 1, NULL, 4, NULL),
(38, 'Altavoz Bluetooth Soul', '20180214171235.jpg', 'Altavoz-Bluetooth-Soul', '', 8, 1, 1, NULL, 4, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos_proyecto`
--

CREATE TABLE `fotos_proyecto` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(128) DEFAULT NULL,
  `imagen` varchar(128) DEFAULT NULL,
  `imagen_title` varchar(128) DEFAULT NULL,
  `descripcion` text,
  `orden` smallint(5) UNSIGNED DEFAULT NULL,
  `ruta_amazon` varchar(256) DEFAULT NULL,
  `destacado` tinyint(4) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `galeria_proyecto_id` bigint(20) UNSIGNED NOT NULL,
  `idioma_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `fotos_proyecto`
--

INSERT INTO `fotos_proyecto` (`id`, `nombre`, `imagen`, `imagen_title`, `descripcion`, `orden`, `ruta_amazon`, `destacado`, `estado`, `galeria_proyecto_id`, `idioma_id`) VALUES
(1, 'foto-proyecto01', 'foto-proyecto01.jpg', 'foto-proyecto01', NULL, 1, NULL, NULL, 1, 1, 1),
(2, 'foto-proyecto02', 'foto-proyecto02.jpg', 'foto-proyecto02', NULL, 2, NULL, NULL, 1, 1, 1),
(3, 'foto-proyecto03', 'foto-proyecto03.jpg', 'foto-proyecto03', NULL, 3, NULL, NULL, 1, 2, 1),
(4, 'foto-proyecto04', 'foto-proyecto04.jpg', 'foto-proyecto04', NULL, 4, NULL, NULL, 1, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galerias_proyecto`
--

CREATE TABLE `galerias_proyecto` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(128) DEFAULT NULL,
  `url` varchar(128) DEFAULT NULL,
  `imagen` varchar(128) DEFAULT NULL,
  `imagen_title` varchar(128) DEFAULT NULL,
  `descripcion` text,
  `orden` smallint(5) UNSIGNED DEFAULT NULL,
  `ruta_amazon` varchar(256) DEFAULT NULL,
  `destacado` tinyint(4) NOT NULL DEFAULT '0',
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `proyecto_id` bigint(20) UNSIGNED NOT NULL,
  `idioma_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `galerias_proyecto`
--

INSERT INTO `galerias_proyecto` (`id`, `nombre`, `url`, `imagen`, `imagen_title`, `descripcion`, `orden`, `ruta_amazon`, `destacado`, `estado`, `proyecto_id`, `idioma_id`) VALUES
(1, 'galeria-proyecto 01', 'galeria-proyecto-01', 'galeria_proyecto01.jpg', 'galeria_proyecto01', 'descripcion', 1, NULL, 1, 1, 1, 1),
(2, 'galeria-proyecto 02', 'galeria-proyecto-02', 'galeria_proyecto02.jpg', 'galeria_proyecto02', 'descripcion', 2, NULL, 0, 1, 1, 1),
(3, 'galeria-proyecto 03', 'galeria-proyecto-03', 'galeria_proyecto03.jpg', 'galeria_proyecto03', 'descripcion', 3, NULL, 1, 1, 2, 1),
(4, 'galeria-proyecto 04', 'galeria-proyecto-04', 'galeria_proyecto04.jpg', 'galeria_proyecto04', 'descripcion', 4, NULL, 1, 1, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria_articulos`
--

CREATE TABLE `galeria_articulos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imagen` varchar(128) DEFAULT NULL,
  `imagen_title` varchar(128) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `ruta_amazon` varchar(256) DEFAULT NULL,
  `articulo_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `galeria_articulos`
--

INSERT INTO `galeria_articulos` (`id`, `imagen`, `imagen_title`, `estado`, `ruta_amazon`, `articulo_id`) VALUES
(1, 'articulo01.jpg', 'articulo-01', 1, NULL, 1),
(2, 'articulo02.jpg', 'articulo-02', 1, NULL, 2),
(3, 'articulo03.jpg', 'articulo-03', 1, NULL, 3),
(4, 'articulo04.jpg', 'articulo-04', 1, NULL, 4),
(5, 'articulo05.jpg', 'articulo-05', 1, NULL, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria_productos`
--

CREATE TABLE `galeria_productos` (
  `id` bigint(20) NOT NULL,
  `imagen` varchar(128) DEFAULT NULL,
  `imagen_title` varchar(128) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `ruta_amazon` varchar(256) DEFAULT NULL,
  `producto_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `galeria_productos`
--

INSERT INTO `galeria_productos` (`id`, `imagen`, `imagen_title`, `estado`, `ruta_amazon`, `producto_id`) VALUES
(3, '20171123144737.jpg', 'agenda-publicitaria-2018-dia-pagina-1', 1, '', 17),
(4, '20171123144737_1.jpg', 'agenda-publicitaria-2018-dia-pagina-2', 1, '', 17),
(5, '20171123144931.jpg', 'agenda-publicitaria-de-bolsillo-semana-vista_1', 1, '', 18),
(6, '20171123144931_1.jpg', 'agenda-publicitaria-de-bolsillo-semana-vista-2', 1, '', 18),
(7, '20180130154957.jpg', 'casa-antiestres', 1, '', 19),
(8, '20180130162235.jpg', 'casco-antiestres', 1, '', 20),
(9, '20180130162459.jpg', 'corazon-antiestres', 1, '', 21),
(10, '20180130162808.jpg', 'doctor-antiestres', 1, '', 22),
(11, '20180130163145.jpg', 'Fidget-Spinner-Plastico', 1, '', 23),
(12, '20180130163335.jpg', 'Gota-Antiestres', 1, '', 24),
(13, '20180130163708.jpg', 'Pelota-Antiestres', 1, '', 25),
(14, '20180130163851.jpg', 'Pelota-Antiestres-Mundo', 1, '', 26),
(15, '20180130164104.jpg', 'Pelota-Antiestres-Futbol', 1, '', 27),
(16, '20180130164216.jpg', 'Tractor-Antiestres', 1, '', 28),
(17, '20180130165607.jpg', 'Alcancia-Chanchito', 1, '', 29),
(18, '20180130170953.jpg', 'Calendario-Perpetuo', 1, '', 30),
(19, '20180130171436.jpg', 'Kit-de-Herramientas', 1, '', 31),
(20, '20180130171705.jpg', 'Libreta-de-Cuerina', 1, '', 32),
(21, '20180130171849.jpg', 'Libreta-Dynamo', 1, '', 33),
(22, '20180130172133.jpg', 'Miniset-de-Escritorio', 1, '', 34),
(23, '20180130172331.jpg', 'Mouse-Portaretrato', 1, '', 35),
(24, '20180130172953.jpg', 'Portataco-Cuerina', 1, '', 36),
(25, '20180130173209.jpg', 'Ser-de-Oficina', 1, '', 37),
(26, '20180130173636.jpg', 'Set-de-Lapices-y-Crayolas', 1, '', 38),
(27, '20180130174758.jpg', 'Set-de-Herramientas', 1, '', 39),
(28, '20180130180246.jpg', 'Almohada-Cervical', 1, '', 40),
(29, '20180130180704.jpg', 'Espejo-Dobles', 1, '', 41),
(30, '20180130180856.jpg', 'Espejo-Plástico', 1, '', 42),
(31, '20180130181155.jpg', 'Frasco-para-Gel-Antibacterial', 1, '', 43),
(32, '20180130181407.jpg', 'Frasco-para-Gel-Antibacterial-02', 1, '', 44),
(33, '20180130181633.jpg', 'Gel-Antibacterial-con-Sujetador-de-Silicona', 1, '', 45),
(34, '20180130181826.jpg', 'Gel-Antibacterial-con-Spray', 1, '', 46),
(35, '20180130182048.jpg', 'Kits-Costura', 1, '', 47),
(36, '20180130182247.jpg', 'Lustrador-de-Calzado', 1, '', 48),
(37, '20180130182447.jpg', 'Manta-Polar', 1, '', 49),
(38, '20180130182947.jpg', 'Espejo-de-Cartera', 1, '', 50),
(39, '20180130183101.jpg', 'Mini-Espejo', 1, '', 51),
(40, '20180130183207.jpg', 'Mini-Espejo-02', 1, '', 52),
(41, '20180130183405.jpg', 'Pulverizador-de-Agua', 1, '', 53),
(42, '20180130183525.jpg', 'Set-de-Espejo-con-Kit-de-Costura', 1, '', 54),
(43, '20180130183749.jpg', 'Set-de-Herramientas-con-Linterna', 1, '', 55),
(44, '20180130184000.jpg', 'Set-de-Oficina', 1, '', 56),
(45, '20180130184233.jpg', 'Set-Manicure', 1, '', 57),
(46, '20180130184445.jpg', 'Set-Manicure-02', 1, '', 58),
(47, '20180131095243.jpg', 'Bolsa-Mochila', 1, '', 59),
(48, '20180131095357.jpg', 'Bolsa-Notex', 1, '', 60),
(49, '20180131095655.jpg', 'Bolsa-de-Playa', 1, '', 61),
(50, '20180131095759.jpg', 'Bolsa-Trolley-Plegable', 1, '', 62),
(51, '20180131100056.jpg', 'Bolso-Ecológico', 1, '', 63),
(52, '20180131100149.jpg', 'Bolso-Marinero', 1, '', 64),
(53, '20180131100323.jpg', 'Bolso-Yute', 1, '', 65),
(54, '20180131100423.jpg', 'Lonchera-Cooler', 1, '', 66),
(55, '20180131100542.jpg', 'Lonchera-de-Neoprene', 1, '', 67),
(56, '20180131100812.jpg', 'Maletin', 1, '', 68),
(57, '20180131100920.jpg', 'Maletin-Carrito', 1, '', 69),
(58, '20180131101112.jpg', 'Maletin-Deportivo', 1, '', 70),
(59, '20180131101233.jpg', 'Maletin-Ejecutivo', 1, '', 71),
(60, '20180131101517.jpg', 'Maletín-Ejecutivo-01', 1, '', 72),
(61, '20180131101622.jpg', 'Maletín-Ejecutivo-02', 1, '', 73),
(62, '20180131101934.jpg', 'Mochila', 1, '', 74),
(63, '20180131102103.jpg', 'Mochila-Publicitaria', 1, '', 75),
(64, '20180131102149.jpg', 'Mochila-Morral', 1, '', 76),
(65, '20180131102334.jpg', 'Mochila-con-Cremallera-Personalizada', 1, '', 77),
(66, '20180131102501.jpg', 'Mochila-Plana', 1, '', 78),
(67, '20180131102858.jpg', 'Monedero-Camel', 1, '', 79),
(68, '20180131102958.jpg', 'Morral-de-Lona', 1, '', 80),
(69, '20180131103049.jpg', 'Portadocumentos', 1, '', 81),
(70, '20180131105403.jpg', 'Casa-Ecológica', 1, '', 82),
(71, '20180131105644.jpg', 'Cuaderno-con-Tapa-Dura', 1, '', 83),
(72, '20180131105756.jpg', 'Cubo-Ecológico', 1, '', 84),
(73, '20180131110000.jpg', 'Libreta-Ecológica', 1, '', 85),
(74, '20180131110240.jpg', 'Libreta-Ecológica-01', 1, '', 86),
(75, '20180131110417.jpg', 'Libreta-Ecológica-02', 1, '', 87),
(76, '20180131110620.jpg', 'Libreta-Ecológica-03', 1, '', 88),
(77, '20180131110822.jpg', 'Libreta-Ecológica-04', 1, '', 89),
(78, '20180131111036.jpg', 'Libreta-Ecológica-05', 1, '', 90),
(79, '20180131111443.jpg', 'Memo-Set-Ecológico', 1, '', 91),
(80, '20180131111740.jpg', 'Notebook', 1, '', 92),
(81, '20180131112039.jpg', 'Porta-Post-It-Ecológico', 1, '', 93),
(82, '20180131112419.jpg', 'Porta-Pos-it', 1, '', 94),
(83, '20180131112626.jpg', 'Porta-Pos-it-01', 1, '', 95),
(84, '20180131112913.jpg', 'Post-It-Anillado', 1, '', 96),
(85, '20180131113110.jpg', 'Libreta-Ecológica-06', 1, '', 97),
(86, '20180131113231.jpg', 'Set-Ecológico', 1, '', 98),
(87, '20180131114427.jpg', 'Llavero-Casco-Destapador', 1, '', 99),
(88, '20180131115352.jpg', 'Llavero-Herramienta-Linterna', 1, '', 100),
(89, '20180131115720.jpg', 'Llavero-Multiusos', 1, '', 101),
(90, '20180131115905.jpg', 'Llavero-Corazón-Antiestrés', 1, '', 102),
(91, '20180131120047.jpg', 'Llavero-Antiestrés-Pelota', 1, '', 103),
(92, '20180131120306.jpg', 'Llavero-Circular-Wincha', 1, '', 104),
(93, '20180131120517.jpg', 'Llavero-con-Herramientas', 1, '', 105),
(94, '20180131121224.jpg', 'Llavero-Corazón-Wincha', 1, '', 106),
(95, '20180131121931.jpg', 'Llavero-Metal', 1, '', 107),
(96, '20180131122058.jpg', 'Llavero-Metal-01', 1, '', 108),
(97, '20180131122210.jpg', 'Llavero-Metal-02', 1, '', 109),
(98, '20180131122337.jpg', 'Llavero-Destapador', 1, '', 110),
(99, '20180131122652.jpg', 'Llavero-Multifuncional', 1, '', 111),
(100, '20180131122808.jpg', 'Llavero-Rectangular-Linterna', 1, '', 112),
(101, '20180131122955.jpg', 'Llavero-Transparente', 1, '', 113),
(102, '20180131123122.jpg', 'Llavero-Casco-Antiestrés', 1, '', 114),
(103, '20180131123231.jpg', 'Llavero-Casco-Linterna', 1, '', 115),
(104, '20180131123511.jpg', 'Llavero-Redondo-Linterna', 1, '', 116),
(105, '20180131123638.jpg', 'Llavero-Wincha', 1, '', 117),
(106, '20180131124024.jpg', 'Llavero-Destapador-01', 1, '', 118),
(107, '20180131124234.jpg', 'Llavero-Pelota-Antiestrés', 1, '', 119),
(108, '20180131142100.jpg', 'Memoria-USB-8GB', 1, '', 120),
(109, '20180131142223.jpg', 'Memoria-USB-4GB', 1, '', 121),
(110, '20180131142826.jpg', 'Memoria-Llave-USB-8GB', 1, '', 122),
(111, '20180131144219.jpg', 'Memoria-Tarjeta-USB-8GB', 1, '', 123),
(112, '20180131150930.jpg', 'Memoria-USB-4,-6-y-8-GB', 1, '', 124),
(113, '20180131151102.jpg', 'Memoria-USB-8GB-01', 1, '', 125),
(114, '20180131151406.jpg', 'Memoria-Leather-USB-8GB', 1, '', 126),
(115, '20180131151716.jpg', 'Jarro-Mug', 1, '', 127),
(116, '20180131151923.jpg', 'Mug-de-Acero', 1, '', 128),
(117, '20180131152058.jpg', 'Mug-Térmico', 1, '', 129),
(118, '20180131152219.jpg', 'Taza-Head-Eléctrica', 1, '', 130),
(119, '20180131152626.jpg', 'Taza-Térmica', 1, '', 131),
(120, '20180131153305.jpg', 'Tomatodo-Flexible', 1, '', 132),
(121, '20180131153858.jpg', 'Tomatodo-Ergonómico', 1, '', 133),
(122, '20180131154050.jpg', 'Tomatodo-Plástico', 1, '', 134),
(123, '20180131154230.jpg', 'Tomatodo-Tapa-Chupón', 1, '', 135),
(124, '20180131154402.jpg', 'Tomatodo-con-Agarradera', 1, '', 136),
(125, '20180131154813.jpg', 'Tomatodo-Plástico-01', 1, '', 137),
(126, '20180131155141.jpg', 'Audifonos-Redondos', 1, '', 138),
(127, '20180131155442.jpg', 'Boligrafo-Laser', 1, '', 139),
(128, '20180131155704.jpg', 'Estuche-de-Plástico', 1, '', 140),
(129, '20180131155823.jpg', 'Memoria-USB-8GB', 1, '', 141),
(130, '20180131160106.jpg', 'USB-Llavero-SimilL-Cuero', 1, '', 142),
(131, '20180131160252.jpg', 'Power-Bank-Cuadradp', 1, '', 143),
(132, '20180131160519.jpg', 'USB-Llavero-SimilL-Cuero', 1, '', 144),
(133, '20180131160720.jpg', 'USB-Llave-con-Estuche', 1, '', 145),
(134, '20180131160945.jpg', 'USB-Madera', 1, '', 146),
(135, '20180131161531.jpg', 'Taza-Mágica', 1, '', 147),
(136, '20180131161628.jpg', 'Taza-Acero-para-Camping', 1, '', 148),
(137, '20180131161727.jpg', 'Taza-Bicolor', 1, '', 149),
(138, '20180131161828.jpg', 'Taza-con-Cucharita', 1, '', 150),
(139, '20180131161942.jpg', 'Taza-con-Cuadro-Blanco', 1, '', 151),
(140, '20180131162100.jpg', 'Taza-Cónica-Sublimada', 1, '', 152),
(141, '20180131162206.jpg', 'Taza-Dorada', 1, '', 153),
(142, '20180131162337.jpg', 'Taza-con-Mensaje', 1, '', 154),
(143, '20180131162504.jpg', 'Termo-para-Sublimacion', 1, '', 155),
(144, '20180131162620.jpg', 'Tomatodo-para-Sublimacion', 1, '', 156),
(145, '20180131162802.jpg', 'Vaso-Plástico-Pastillero', 1, '', 157),
(146, '20180131163018.jpg', 'Vaso-Ceramico', 1, '', 158),
(147, '20180131163853.jpg', 'Resaltador-Chisguete', 1, '', 159),
(148, '20180131164003.jpg', 'Resaltador-Pirámide', 1, '', 160),
(149, '20180131164153.jpg', 'Resaltador-con-Touch', 1, '', 161),
(150, '20180131164316.jpg', 'Resaltador-Corazón', 1, '', 162),
(151, '20180131164430.jpg', 'Resaltador-3-Colores-con-Lapicero', 1, '', 163),
(152, '20180131164933.jpg', 'Resaltador-Tipo-Crayola', 1, '', 164),
(153, '20180131165045.jpg', 'Resaltador-Líquido', 1, '', 165),
(154, '20180131165544.jpg', 'Resaltador-Iphone', 1, '', 166),
(155, '20180131165754.jpg', 'Set.-Resaltador-de-5-pzas.', 1, '', 167),
(156, '20180131165916.jpg', 'Resaltador-Estrella', 1, '', 168),
(157, '20180131170048.jpg', 'Resaltador-01', 1, '', 169),
(158, '20180131170154.jpg', 'Resaltador-Mano', 1, '', 170),
(159, '20180131170557.jpg', 'Resaltador-Tipo-Crayola-01', 1, '', 171),
(160, '20180131170847.jpg', 'Resaltador-Limpiador-Teclado', 1, '', 172),
(161, '20180131171011.jpg', 'Resaltador-con-Lapicero', 1, '', 173),
(162, '20180131171133.jpg', 'Resaltador-Tipo-Crayola-02', 1, '', 174),
(163, '20180131171248.jpg', 'Resaltador-en-Pote', 1, '', 175),
(164, '20180131171410.jpg', 'Resaltador-Flor', 1, '', 176),
(165, '20180131171547.jpg', 'Resaltador-Gota', 1, '', 177),
(166, '20180131171706.jpg', 'Resaltador-Jeringa', 1, '', 178),
(167, '20180131171832.jpg', 'Resaltador-Muñeco', 1, '', 179),
(168, '20180131172000.jpg', 'Resaltador-Tipo-Crayola-03', 1, '', 180),
(169, '20180131172116.jpg', 'Resaltador-Triangular', 1, '', 181),
(170, '20180131172239.jpg', 'Resaltador-5-Puntas', 1, '', 182),
(171, '20180131173005.jpg', 'Resaltador-02', 1, '', 183),
(172, '20180131173226.jpg', 'Resaltador-03', 1, '', 184),
(173, '20180131173841.jpg', 'Resaltador-Foco', 1, '', 185),
(174, '20180131174031.jpg', 'Resaltador-04', 1, '', 186),
(175, '20180213125656.jpg', 'Polo', 1, '', 187),
(176, '20180213125809.jpg', 'Camisero-con-Pie-de-Cuello', 1, '', 188),
(177, '20180213125904.jpg', 'Camisero-Dama', 1, '', 189),
(178, '20180213130004.jpg', 'Camisero-Dray', 1, '', 190),
(179, '20180213130154.jpg', 'Camisero-Pique', 1, '', 191),
(180, '20180213130251.jpg', 'Camisero-Pyma-Corte-Dama', 1, '', 192),
(181, '20180213142917.jpg', 'Polo-Camisero-Naranja', 1, '', 193),
(182, '20180213143125.jpg', 'Jersey-Dama-Rangla', 1, '', 194),
(183, '20180213143718.jpg', 'Polo-Manga-Raglan', 1, '', 195),
(184, '20180213143828.jpg', 'Polos-Dray-Jaspeado', 1, '', 196),
(185, '20180213143943.jpg', 'T-shirt--Jaspeado-Dama', 1, '', 197),
(186, '20180213144120.jpg', 'T-shirt-Cuello-V', 1, '', 198),
(187, '20180213144428.jpg', 'T-shirt-Manga-Larga', 1, '', 199),
(188, '20180213144540.jpg', 'T-shirt-Manga-Rangla', 1, '', 200),
(189, '20180213144636.jpg', 'T-shit-Caballero', 1, '', 201),
(190, '20180213150850.jpg', 'Jockeys-5-Tapas', 1, '', 202),
(191, '20180213151123.jpg', 'Jockeys-5-Tapas-01', 1, '', 203),
(192, '20180213151308.jpg', 'Jockeys-5-Tapas-02', 1, '', 204),
(193, '20180213151445.jpg', 'Gorra-Tapa-Cuello', 1, '', 205),
(194, '20180213151652.jpg', 'Gorro-Lana', 1, '', 206),
(195, '20180213152321.jpg', 'Jockeys-5-Tapas-03', 1, '', 207),
(196, '20180213152505.jpg', 'Gorro-Sublimado', 1, '', 208),
(197, '20180213152641.jpg', 'Gorro-Sublimado', 0, '', 209),
(198, '20180213152642.jpg', 'Jockeys-6-Tapas', 1, '', 209),
(199, '20180213153136.jpg', 'Gorro-y-Chalina', 1, '', 210),
(200, '20180213153316.jpg', 'Gorro-Tapa-Cuello', 1, '', 211),
(201, '20180213154002.jpg', 'Gorro-Guillian', 1, '', 212),
(202, '20180213154119.jpg', 'Viseras', 1, '', 213),
(203, '20180213154246.jpg', 'Sombrero-Tipo-Safari', 1, '', 214),
(204, '20180213154353.jpg', 'Visera-Drill', 1, '', 215),
(205, '20180213154516.jpg', 'Visera-en-Kappa', 1, '', 216),
(206, '20180213160939.jpg', 'Casaca-Roja', 1, '', 217),
(207, '20180213161200.jpg', 'Casaca-Polar-Caballero', 1, '', 218),
(208, '20180213161346.jpg', 'Casaca-Acolchada-Cuello-Neru', 1, '', 219),
(209, '20180213161542.jpg', 'Casaca-Acolchada', 1, '', 220),
(210, '20180213161705.jpg', 'Casaca-con-Fibra', 1, '', 221),
(211, '20180213161902.jpg', 'Casaca-Dama-Polar', 1, '', 222),
(212, '20180213162045.jpg', 'Casaca-Drill-con-Cintas-Reflectivas', 1, '', 223),
(213, '20180213162325.jpg', 'Casaca-Ejecutivo', 1, '', 224),
(214, '20180213162703.jpg', 'Casaca-Impermable-con-forro-de-fibra', 1, '', 225),
(215, '20180213162910.jpg', 'Casaca-Impermeable-Bicolor', 1, '', 226),
(216, '20180213163118.jpg', 'Casaca-Leganda', 1, '', 227),
(217, '20180213163251.jpg', 'Casaca-Manga-Rangla', 1, '', 228),
(218, '20180213163550.jpg', 'Casaca-Mina', 1, '', 229),
(219, '20180213163811.jpg', 'casaca-polar-dama', 1, '', 230),
(220, '20180213164043.jpg', 'Casaxa-Polar', 1, '', 231),
(221, '20180213164510.jpg', 'CASACA-REFLECTIVA', 1, '', 232),
(222, '20180213164738.jpg', 'casaca-soft-concinta-reflectiva', 1, '', 233),
(223, '20180213164927.jpg', 'casaca-soft-shell', 1, '', 234),
(224, '20180213165254.jpg', 'casaca-soft-shell-01', 1, '', 235),
(225, '20180213165404.jpg', 'casaca-taslan-cin-cinta-reflectiva', 1, '', 236),
(226, '20180213165729.jpg', 'casaca-soft-shell-02', 1, '', 237),
(227, '20180213170139.jpg', 'casasa-micro-polar', 1, '', 238),
(228, '20180213170245.jpg', 'chaqueta-piel-de-durazno', 1, '', 239),
(229, '20180213170508.jpg', 'Casaca-Manga-Rangla-01', 1, '', 240),
(230, '20180213170657.jpg', 'polera-jaspeada', 1, '', 241),
(231, '20180213170840.jpg', 'soft-shell-cuello-alto', 1, '', 242),
(232, '20180213171032.jpg', 'soft-shell-beige', 1, '', 243),
(233, '20180213171354.jpg', 'soft-shell-corte-hombro', 1, '', 244),
(234, '20180213171528.jpg', 'soft-shell-corte-sisa', 1, '', 245),
(235, '20180213173428.jpg', 'blusa-oxford', 1, '', 246),
(236, '20180213173527.jpg', 'CAMISA-ALTA-VISIVILIDAD', 1, '', 247),
(237, '20180213173740.jpg', 'CAMISACO', 1, '', 248),
(238, '20180213173857.jpg', 'Camisa-Caballero', 1, '', 249),
(239, '20180213174006.jpg', 'camisas-dama-con-banda-reflectiva', 1, '', 250),
(240, '20180213174624.jpg', 'CHALECO--CINTA-REFLECTIVA', 1, '', 251),
(241, '20180213174857.jpg', 'Chaleco-Dama', 1, '', 252),
(242, '20180213175014.jpg', 'chaleco-acolchado', 1, '', 253),
(243, '20180213175108.jpg', 'CHALECO-ALTA-VISIBILIDAD', 1, '', 254),
(244, '20180213175212.jpg', 'Chaleco-Casaca', 1, '', 255),
(245, '20180213175357.jpg', 'chaleco-con-fibra', 1, '', 256),
(246, '20180213175459.jpg', 'chaleco-multibolsillo-soft-shell', 1, '', 257),
(247, '20180213175607.jpg', 'Chaleco-Naranja', 1, '', 258),
(248, '20180213175959.jpg', 'Chaleco-negro', 1, '', 259),
(249, '20180213180140.jpg', 'chaleco-polar-dama', 1, '', 260),
(250, '20180213180240.jpg', 'chaleco-reportero', 1, '', 261),
(251, '20180213180359.jpg', 'chaleco-soft-shell-griss', 1, '', 262),
(252, '20180214112632.jpg', 'Chaleco-Dama-Sport', 1, '', 263),
(253, '20180214112945.jpg', 'Polo-manga-larga', 1, '', 264),
(254, '20180214113218.jpg', 'Polo-Publicitario', 1, '', 265),
(255, '20180214113417.jpg', 'Polo-Rangla-manga-larga', 1, '', 266),
(256, '20180214114050.jpg', 'Polo-Sport', 1, '', 267),
(257, '20180214114232.jpg', 'Camisero-Deportivo', 1, '', 268),
(258, '20180214114443.jpg', 'Polera-con-Capucha', 1, '', 269),
(259, '20180214114604.jpg', 'Polo-Foto', 1, '', 270),
(260, '20180214114942.jpg', 'Polo-Rangle-para-Dama', 1, '', 271),
(261, '20180214115140.jpg', 'Polo-Sublimado-Total', 1, '', 272),
(262, '20180214115959.jpg', 'Polera-Franela', 1, '', 273),
(263, '20180214120142.jpg', 'Polo-Dama-Cuello-V', 1, '', 274),
(264, '20180214120422.jpg', 'Polo-Rangla-Bicolor', 1, '', 275);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria_servicios`
--

CREATE TABLE `galeria_servicios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imagen` varchar(128) DEFAULT NULL,
  `imagen_title` varchar(128) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `servicios_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `galeria_servicios`
--

INSERT INTO `galeria_servicios` (`id`, `imagen`, `imagen_title`, `estado`, `servicios_id`) VALUES
(1, '20180116130539.jpg', 'serigrafia', 1, 1),
(2, '20180116130830.jpg', 'tampografia', 1, 2),
(3, '20180116131147.jpg', 'bordado', 1, 3),
(4, '20180116131312.jpg', 'laser', 1, 4),
(5, '20180116131811.jpg', 'transfer-ceramico', 1, 5),
(6, '20180116131952.jpg', 'impresion-digital', 1, 6),
(7, '20180116151125.jpg', 'transfer-digital', 1, 7),
(8, '20180116152124.jpg', 'transfer-serigrafico', 1, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idiomas`
--

CREATE TABLE `idiomas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(128) DEFAULT NULL,
  `estado` tinyint(3) UNSIGNED DEFAULT '1',
  `icono` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `idiomas`
--

INSERT INTO `idiomas` (`id`, `nombre`, `estado`, `icono`) VALUES
(1, 'español', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(128) DEFAULT NULL,
  `telefono` int(11) UNSIGNED DEFAULT NULL,
  `correo` varchar(128) DEFAULT NULL,
  `asunto` varchar(128) DEFAULT NULL,
  `mensaje` text,
  `respuesta` text,
  `empresa` varchar(128) DEFAULT NULL,
  `ruc` int(11) UNSIGNED DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '2',
  `creado` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modificado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `nombre`, `telefono`, `correo`, `asunto`, `mensaje`, `respuesta`, `empresa`, `ruc`, `estado`, `creado`, `modificado`) VALUES
(1, 'Richard Mariluz Gonzales', 1234567, 'rmariluzgonzales@gmail.com', 'Test', 'Test', 'rpta1', 'mariluz S.A.C.', 4294967295, 2, '2017-01-10 10:50:20', '2017-07-01 14:11:25'),
(2, 'cesar', 7654231, 'cesar.9151@gmail.com', 'Test', 'Test', 'rpta2', 'cesar S.A.C.', 4294967295, 2, '2017-02-10 10:50:20', '2017-10-20 18:13:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles`
--

CREATE TABLE `niveles` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(128) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `niveles`
--

INSERT INTO `niveles` (`id`, `nombre`, `estado`) VALUES
(1, 'superadministrador', 1),
(2, 'administrador', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pais` varchar(128) DEFAULT NULL,
  `codigo` varchar(10) DEFAULT NULL,
  `zona` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id`, `pais`, `codigo`, `zona`) VALUES
(1, 'Peru', 'PE', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas_frecuentes`
--

CREATE TABLE `preguntas_frecuentes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pregunta` varchar(128) DEFAULT NULL,
  `respuesta` text,
  `autor` varchar(128) DEFAULT NULL,
  `orden` tinyint(3) UNSIGNED DEFAULT NULL,
  `mail_autor` varchar(128) DEFAULT NULL,
  `estado` tinyint(3) UNSIGNED DEFAULT NULL,
  `idioma_id` bigint(20) UNSIGNED DEFAULT NULL,
  `creado` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modificado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `preguntas_frecuentes`
--

INSERT INTO `preguntas_frecuentes` (`id`, `pregunta`, `respuesta`, `autor`, `orden`, `mail_autor`, `estado`, `idioma_id`, `creado`, `modificado`) VALUES
(1, '¿Pregunta?', '-Respuesta', 'Autor', 1, 'autor@cuvox.de', 1, 1, '2017-01-10 10:50:20', '2017-07-10 10:50:20'),
(2, '¿Pregunta2?', '-Respuesta2', 'a2', 2, 'a2@gmail.com', 1, 1, '2017-02-10 10:50:20', '2017-06-10 10:50:20'),
(3, '¿Pregunta3?', '-Respuesta3', 'a3', 3, 'a3@gmail.com', 1, 1, '2017-03-10 10:50:20', '2017-05-10 10:50:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(256) DEFAULT NULL,
  `descripcion` text,
  `resumen` varchar(255) DEFAULT NULL,
  `codigo` int(11) DEFAULT NULL,
  `url` varchar(128) DEFAULT NULL,
  `orden` bigint(20) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `precio_oferta` decimal(10,2) DEFAULT NULL,
  `oferta` tinyint(4) NOT NULL DEFAULT '2',
  `tags` varchar(128) DEFAULT NULL,
  `destacado` tinyint(4) NOT NULL DEFAULT '1',
  `fecha_ingreso` datetime DEFAULT NULL,
  `seo_title` varchar(150) DEFAULT NULL,
  `seo_description` varchar(150) DEFAULT NULL,
  `seo_keywords` varchar(150) DEFAULT NULL,
  `cantidad` bigint(20) UNSIGNED DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `categoria_id` bigint(20) UNSIGNED NOT NULL,
  `creado` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modificado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `resumen`, `codigo`, `url`, `orden`, `precio`, `precio_oferta`, `oferta`, `tags`, `destacado`, `fecha_ingreso`, `seo_title`, `seo_description`, `seo_keywords`, `cantidad`, `estado`, `categoria_id`, `creado`, `modificado`) VALUES
(17, 'Agenda publicitaria 2018', '', 'Agenda publicitaria 2018', 12345, 'agenda-publicitaria-2018', 1, '20.00', '18.00', 1, NULL, 1, NULL, 'Agenda publicitaria 2018', 'Agenda publicitaria 2018', 'Agenda publicitaria 2018', 0, 0, 4, '2017-11-23 14:47:38', '2018-01-30 15:07:51'),
(18, 'agenda publicitaria bolsillo', '', 'agenda publicitaria bolsillo', 123, 'agenda-publicitaria-bolsillo', 2, '15.00', '10.00', 1, NULL, 0, NULL, 'agenda publicitaria bolsillo', 'agenda publicitaria bolsillo', 'agenda publicitaria bolsillo', 0, 0, 4, '2017-11-23 14:49:31', '2018-01-30 15:07:51'),
(19, 'Casa Antiestres', '<p><strong>Medidas:&nbsp;</strong><br />\r\n6.4 x 8 cm. Largo: 7.5 cm.</p>\r\n\r\n<p><strong>Material:</strong><br />\r\nEspuma de goma.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual,&nbsp;en bolsita de pl&aacute;stico transparente.</p>\r\n', 'Casa Antiestres', 0, 'casa-antiestres', 1, '0.00', '0.00', 2, NULL, 0, NULL, 'Casa Antiestres', 'Casa Antiestres', 'Casa Antiestres', 0, 1, 24, '2018-01-30 14:49:57', '2018-01-30 20:49:57'),
(20, 'Casco Antiestres', '<p><strong>Medidas:&nbsp;</strong><br />\r\n5.2 x 8.2 cm. (Aprox.)</p>\r\n\r\n<p><strong>Colores:</strong><br />\r\nBlanco, rojo, azul y amarillo.</p>\r\n\r\n<p><strong>Material:</strong><br />\r\nEspuma de goma con aplicaciones en alto relieve.</p>\r\n\r\n<p><strong>Presentacion del producto:</strong><br />\r\nIndividual, en bolsa de pl&aacute;stico transparente.</p>\r\n', 'Casco Antiestres', 0, 'casco-antiestres', 2, '0.00', '0.00', 2, NULL, 0, NULL, 'Casco Antiestres', 'Casco Antiestres', 'Casco Antiestres', 0, 1, 24, '2018-01-30 15:22:35', '2018-01-30 21:22:35'),
(21, 'Corazón Antiestres', '<p><strong>Medidas:&nbsp;</strong><br />\r\n7 x 7 cm. (Aprox.)</p>\r\n\r\n<p><strong>Material:</strong><br />\r\nEspuma de goma.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual,&nbsp;en bolsita de pl&aacute;stico transparente.</p>\r\n', 'Corazón Antiestres', 0, 'corazon-antiestres', 3, '0.00', '0.00', 2, NULL, 0, NULL, 'Corazón Antiestres', 'Corazón Antiestres', 'Corazón Antiestres', 0, 1, 24, '2018-01-30 15:25:00', '2018-01-30 21:25:00'),
(22, 'Doctor Antiestres', '<p><strong>Medidas:&nbsp;</strong><br />\r\n9.3 x 7 cm. (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nDise&ntilde;o m&eacute;dico.</p>\r\n\r\n<p><strong>Material:</strong><br />\r\nEspuma de goma en alto relieve.<br />\r\n<br />\r\n<strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en bolsa de pl&aacute;stico transparente.</p>\r\n', 'Doctor Antiestres', 0, 'doctor-antiestres', 4, '0.00', '0.00', 2, NULL, 0, NULL, 'Doctor Antiestres', 'Doctor Antiestres', 'Doctor Antiestres', 0, 1, 24, '2018-01-30 15:28:09', '2018-01-30 21:28:09'),
(23, 'Fidget Spinner Plastico', '<p>Fidget Spinner Plastico</p>\r\n', 'Fidget Spinner Plastico', 0, 'fidget-spinner-plastico', 5, '0.00', '0.00', 2, NULL, 0, NULL, 'Fidget Spinner Plastico', 'Fidget Spinner Plastico', 'Fidget Spinner Plastico', 0, 1, 24, '2018-01-30 15:31:45', '2018-01-30 21:31:45'),
(24, 'Gota Antiestres', '<p><strong>Medidas:&nbsp;</strong><br />\r\nAltura: 8 cm. (Aprox.) Di&aacute;metro: 5.91 cm. (Aprox.)</p>\r\n\r\n<p><strong>Material:</strong><br />\r\nEspuma de goma.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual,&nbsp;en bolsita de pl&aacute;stico transparente.</p>\r\n', 'Gota Antiestres', 0, 'gota-antiestres', 6, '0.00', '0.00', 2, NULL, 0, NULL, 'Gota Antiestres', 'Gota Antiestres', 'Gota Antiestres', 0, 1, 24, '2018-01-30 15:33:36', '2018-01-30 21:33:36'),
(25, 'Pelota Antiestres', '<p><strong>Medidas:&nbsp;</strong><br />\r\nDi&aacute;metro: 6.3 cm. (Aprox.)</p>\r\n\r\n<p><strong>Colores:</strong><br />\r\nAzul, rojo, blanco, negro, verde, anaranjado, amarillo, celeste, morado, rosado y&nbsp;verde lim&oacute;n.</p>\r\n\r\n<p><strong>Material:</strong><br />\r\nEspuma de goma en alto relieve.</p>\r\n', 'Pelota Antiestres', 0, 'pelota-antiestres', 7, '0.00', '0.00', 2, NULL, 0, NULL, 'Pelota Antiestres', 'Pelota Antiestres', 'Pelota Antiestres', 0, 1, 24, '2018-01-30 15:37:09', '2018-01-30 21:37:09'),
(26, 'Pelota Antiestres Mundo', '<p><strong>Medidas:&nbsp;</strong><br />\r\nDi&aacute;metro: 6.3 cm. (Aprox.)</p>\r\n\r\n<p><strong>Material:</strong><br />\r\nEspuma de goma.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual,&nbsp;en bolsita de pl&aacute;stico transparente.</p>\r\n', 'Pelota Antiestres Mundo', 0, 'pelota-antiestres-mundo', 8, '0.00', '0.00', 2, NULL, 0, NULL, 'Pelota Antiestres Mundo', 'Pelota Antiestres Mundo', 'Pelota Antiestres Mundo', 0, 1, 24, '2018-01-30 15:38:51', '2018-01-30 21:38:51'),
(27, 'Pelota Antiestres Futbol', '<p><strong>Medidas:&nbsp;</strong><br />\r\nDi&aacute;metro: 6.3 cm. (Aprox.)</p>\r\n\r\n<p><strong>Material:</strong><br />\r\nEspuma de goma.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual,&nbsp;en bolsita de pl&aacute;stico transparente.</p>\r\n', 'Pelota Antiestres Futbol', 0, 'pelota-antiestres-futbol', 9, '0.00', '0.00', 2, NULL, 0, NULL, 'Pelota Antiestres Futbol', 'Pelota Antiestres Futbol', 'Pelota Antiestres Futbol', 0, 1, 24, '2018-01-30 15:41:05', '2018-01-30 21:41:05'),
(28, 'Tractor Antiestres', '<p><strong>Medidas:&nbsp;</strong><br />\r\nDi&aacute;metro: 6.3 cm. (Aprox.)</p>\r\n\r\n<p><strong>Material:</strong><br />\r\nEspuma de goma.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual,&nbsp;en bolsita de pl&aacute;stico transparente.</p>\r\n', 'Tractor Antiestres', 0, 'tractor-antiestres', 10, '0.00', '0.00', 2, NULL, 0, NULL, 'Tractor Antiestres', 'Tractor Antiestres', 'Tractor Antiestres', 0, 1, 24, '2018-01-30 15:42:16', '2018-01-30 21:42:16'),
(29, 'Alcancía Chanchito ', '<p><strong>Medidas:&nbsp;</strong><br />\r\nAncho: 8 cm. / Alto: 7.6 cm. / Largo: 10 cm. (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nAlcanc&iacute;a de PVC en forma de cerdito, nariz quitap&oacute;n.</p>\r\n\r\n<p><strong>Medidas:</strong><br />\r\nAncho: 8 cm.<br />\r\nAlto: 7.6 cm.<br />\r\nLargo: 10 cm.<br />\r\n<br />\r\n<strong>Colores:</strong><br />\r\nAzul, rosado, verde, blanco, gris, morado y anaranjado.<br />\r\n<br />\r\n<strong>Presentaci&oacute;n:</strong><br />\r\nIndividual, en bolsita plastica transparente.</p>\r\n', 'Alcancía Chanchito ', 0, 'alcancia-chanchito', 1, '0.00', '0.00', 2, NULL, 0, NULL, 'Alcancía Chanchito ', 'Alcancía Chanchito ', 'Alcancía Chanchito ', 0, 1, 25, '2018-01-30 15:56:08', '2018-01-30 21:56:08'),
(30, 'Calendario Perpetuo', '<p>calendario-perpetuo</p>\r\n', 'Calendario Perpetuo', 0, 'calendario-perpetuo', 2, '0.00', '0.00', 2, NULL, 0, NULL, 'Calendario Perpetuo', 'Calendario Perpetuo', 'Calendario Perpetuo', 0, 1, 25, '2018-01-30 16:09:53', '2018-01-30 22:09:53'),
(31, 'Kit de Herramientas', '<p><strong>Medidas:&nbsp;</strong><br />\r\nAncho: 4.5 cm. / Alto: 2 cm. / Largo: 11 cm. (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nLinterna de mano&nbsp;con 2 destornilladores planos, 2 destornilladores estrella&nbsp;y 2 destornilladores hexagonales.&nbsp;Incluye una wincha de 1 mt. y nivel&nbsp;de burbuja.</p>\r\n\r\n<p><strong>Medidas:</strong><br />\r\nAncho: 4.5 cm.<br />\r\nAlto: 2&nbsp;cm.<br />\r\nLargo: 11 cm.</p>\r\n\r\n<p><strong>Colores:</strong><br />\r\nAzul, rojo y negro.</p>\r\n\r\n<p><strong>Presentaci&oacute;n:</strong><br />\r\nIndividual, en cajita de cart&oacute;n blanco.</p>\r\n', 'Kit de Herramientas', 0, 'kit-de-herramientas', 3, '0.00', '0.00', 2, NULL, 0, NULL, 'Kit de Herramientas', 'Kit de Herramientas', 'Kit de Herramientas', 0, 1, 25, '2018-01-30 16:14:37', '2018-01-30 22:14:37'),
(32, 'Libreta de Cuerina', '<p><strong>Medidas:&nbsp;</strong><br />\r\nAncho: 9.5 cm. / Alto: 14.5 cm. (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nLibreta acolchada, con una calculadora, un lapicero y una libreta para notas de hojas rayadas.</p>\r\n\r\n<p><strong>Medidas:</strong><br />\r\nAncho: 9.5 cm.<br />\r\nAlto: 14.5 cm.</p>\r\n\r\n<p><strong>Colores:</strong><br />\r\nNegro, azul, rojo y gris.</p>\r\n\r\n<p><strong>Presentaci&oacute;n:</strong><br />\r\nIndividual, en cajita de cart&oacute;n blanco.</p>\r\n', 'Libreta de Cuerina', 0, 'libreta-de-cuerina', 4, '0.00', '0.00', 2, NULL, 0, NULL, 'Libreta de Cuerina', 'Libreta de Cuerina', 'Libreta de Cuerina', 0, 1, 25, '2018-01-30 16:17:05', '2018-01-30 22:17:05'),
(33, 'Libreta Dynamo', '<p><strong>Medidas:&nbsp;</strong><br />\r\nAncho: 5 cm. / Largo: 10 cm. (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nLinterna manual.</p>\r\n\r\n<p><strong>Medidas:</strong><br />\r\nAncho: 5 cm.<br />\r\nLargo: 10 cm.<br />\r\n<br />\r\n<strong>Colores:</strong><br />\r\nAzul, rojo, anaranjado, verde y negro.<br />\r\n<br />\r\n<strong>Presentaci&oacute;n:</strong><br />\r\nIndividual, en cajita.</p>\r\n', 'Libreta Dynamo', 0, 'libreta-dynamo', 5, '0.00', '0.00', 2, NULL, 0, NULL, 'Libreta Dynamo', 'Libreta Dynamo', 'Libreta Dynamo', 0, 1, 25, '2018-01-30 16:18:50', '2018-01-30 22:18:50'),
(34, 'Miniset de Escritorio', '<p><strong>Medidas:</strong><br />\r\nAncho: 9 cm. / Alto: 2 cm. / Largo: 5.7 cm. (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nEstuche de pl&aacute;stico transparente, incluye&nbsp;1&nbsp;engrampador, saca grapas&nbsp;y dispensador con cinta adhesiva.</p>\r\n\r\n<p><strong>Medidas:<br />\r\n(Estuche)</strong><br />\r\nAncho: 9 cm.<br />\r\nAlto: 2 cm.<br />\r\nLargo: 5.7 cm.</p>\r\n\r\n<p><strong>Colores:</strong><br />\r\nAzul, rojo y blanco.<br />\r\n<br />\r\n<strong>Presentaci&oacute;n:</strong><br />\r\nIndividual, en bolsita plastica transparente.</p>\r\n', 'Miniset de Escritorio', 0, 'miniset-de-escritorio', 6, '0.00', '0.00', 2, NULL, 0, NULL, 'Miniset de Escritorio', 'Miniset de Escritorio', 'Miniset de Escritorio', 0, 1, 25, '2018-01-30 16:21:33', '2018-01-30 22:21:33'),
(35, 'Mouse Portaretrato', '<p>Mouse Portaretrato</p>\r\n', 'Mouse Portaretrato', 0, 'mouse-portaretrato', 7, '0.00', '0.00', 2, NULL, 0, NULL, 'Mouse Portaretrato', 'Mouse Portaretrato', 'Mouse Portaretrato', 0, 1, 25, '2018-01-30 16:23:32', '2018-01-30 22:23:32'),
(36, 'Portataco Cuerina', '<p><strong>Medidas:&nbsp;</strong><br />\r\nAncho: 7 cm. / Alto: 10.5 cm. (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nLibreta de pl&aacute;stico&nbsp;con lapicero y taco de hojas blancas.</p>\r\n\r\n<p><strong>Medidas:</strong><br />\r\nAncho: 7 cm.<br />\r\nAlto: 10.5 cm.</p>\r\n\r\n<p><strong>Colores:</strong><br />\r\nRojo, negro, anaranjado, verde, amarillo y blanco.</p>\r\n\r\n<p><strong>Presentaci&oacute;n:</strong><br />\r\nIndividual, en bolsita plastica transparente.</p>\r\n', 'Portataco Cuerina', 0, 'portataco-cuerina', 8, '0.00', '0.00', 2, NULL, 0, NULL, 'Portataco Cuerina', 'Portataco Cuerina', 'Portataco Cuerina', 0, 1, 25, '2018-01-30 16:29:54', '2018-01-30 22:29:54'),
(37, 'Set de Oficina', '<p><strong>Medidas:&nbsp;</strong><br />\r\nAlto: 7,5 cm Ancho: 7 cm. (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nPote de pl&aacute;stico trasl&uacute;cido que contiene: 1 Saca grapas &middot; 1 Engrapadora + repuestos &middot; 1 Cinta Adhesiva &middot; 1 Perforadora de un hueco<br />\r\n<br />\r\n<strong>Colores:</strong><br />\r\nBlanco, Rojo y Azul</p>\r\n\r\n<p><strong>Presentaci&oacute;n del Producto:</strong><br />\r\nIndividual en bolsa de pl&aacute;stico transparente.</p>\r\n', 'Set de Oficina', 0, 'set-de-oficina', 9, '0.00', '0.00', 2, NULL, 0, NULL, 'Set de Oficina', 'Set de Oficina', 'Set de Oficina', 0, 1, 25, '2018-01-30 16:32:09', '2018-01-30 22:33:16'),
(38, 'Set de Lapices y Crayolas', '<p><strong>Medidas:</strong><br />\r\nAncho: 10 cm. / Alto: 14 cm. / Largo: 9 cm. (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nPortalapicero con lapiceros y crayolas</p>\r\n\r\n<p><strong>Presentaci&oacute;n:</strong><br />\r\nIndividual, en bolsita&nbsp;plastica de burbujas&nbsp;transparente y caja.</p>\r\n', 'Set de Lapices y Crayolas', 0, 'set-de-lapices-y-crayolas', 10, '0.00', '0.00', 2, NULL, 0, NULL, 'Set de Lapices y Crayolas', 'Set de Lapices y Crayolas', 'Set de Lapices y Crayolas', 0, 1, 25, '2018-01-30 16:36:36', '2018-01-30 22:36:36'),
(39, 'Set de Herramientas', '<p><strong>Descripci&oacute;n:</strong><br />\r\nLinterna de mano&nbsp;con 2 destornilladores planos, 2 destornilladores estrella&nbsp;y 2 destornilladores hexagonales.&nbsp;Incluye una wincha de 1 mt. y nivel&nbsp;de burbuja.</p>\r\n\r\n<p><strong>Medidas:</strong><br />\r\nAncho: 4.5 cm.<br />\r\nAlto: 2&nbsp;cm.<br />\r\nLargo: 11 cm.</p>\r\n\r\n<p><strong>Colores:</strong><br />\r\nAzul, rojo y negro.</p>\r\n\r\n<p><strong>Presentaci&oacute;n:</strong><br />\r\nIndividual, en cajita de cart&oacute;n blanco.</p>\r\n', 'Set de Herramientas', 0, 'set-de-herramientas', 11, '0.00', '0.00', 2, NULL, 0, NULL, 'Set de Herramientas', 'Set de Herramientas', 'Set de Herramientas', 0, 1, 25, '2018-01-30 16:47:59', '2018-01-30 22:47:59'),
(40, 'Almohada Cervical', '<p><strong>Descripci&oacute;n:</strong><br />\r\nAlmohadilla de pana inflable.</p>\r\n\r\n<p><strong>Medidas:</strong><br />\r\nAncho: 38 cm.<br />\r\nAlto: 26.5 cm.</p>\r\n\r\n<p><strong>Colores:</strong><br />\r\nRojo, negro, gris, verde y azul.<br />\r\n<br />\r\n<strong>Presentaci&oacute;n:</strong><br />\r\nIndividual, en bolsita plastica transparente.</p>\r\n', 'Almohada Cervical', 0, 'almohada-cervical', 1, '0.00', '0.00', 2, NULL, 0, NULL, 'Almohada Cervical', 'Almohada Cervical', 'Almohada Cervical', 0, 1, 26, '2018-01-30 17:02:46', '2018-01-30 23:02:46'),
(41, 'Espejo Dobles', '<p><strong>Medidas:&nbsp;</strong><br />\r\n7 cm. Espesor: 1 cm.</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nEspejo de cartera pl&aacute;stico, que contiene: 1 espejo normal y 1 espejo de aumento + 1 peine.<br />\r\n<br />\r\n<strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en bolsita pl&aacute;stica transparente.</p>\r\n', 'Espejo Dobles', 0, 'espejo-dobles', 2, '0.00', '0.00', 2, NULL, 0, NULL, 'Espejo Dobles', 'Espejo Dobles', 'Espejo Dobles', 0, 1, 26, '2018-01-30 17:07:04', '2018-01-30 23:07:04'),
(42, 'Espejo Plástico', '<p><strong>Medidas:&nbsp;</strong><br />\r\n7.3 x 6.5 cm. Espesor: 1.5 cm. (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nDoble espejo de cartera pl&aacute;stico: uno convencional y uno de aumento.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en bolsita pl&aacute;stica transparente.</p>\r\n', 'Espejo Plástico', 0, 'espejo-plastico', 3, '0.00', '0.00', 2, NULL, 0, NULL, 'Espejo Plástico', 'Espejo Plástico', 'Espejo Plástico', 0, 1, 26, '2018-01-30 17:08:56', '2018-01-30 23:08:56'),
(43, 'Frasco para Gel Antibacterial', '<p><strong>Medidas:&nbsp;</strong><br />\r\nAlto: 7cm Ancho: 5,2cm Espesor: 2,3cm (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nFrasco de gel, con sujetador de silicona de diferentes colores para llevarlo colgado y tenerlo accesible. Capacidad: 40 ml.<br />\r\n<br />\r\n<strong>Colores: </strong><br />\r\nAzul, Rojo, Verde, Blanco, Negro, Naranja, Amarillo, Morado, Verde Lim&oacute;n, Rosado, Turquesa.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en bolsita pl&aacute;stica transparente.</p>\r\n', 'Frasco para Gel Antibacterial', 0, 'frasco-para-gel-antibacterial', 4, '0.00', '0.00', 2, NULL, 0, NULL, 'Frasco para Gel Antibacterial', 'Frasco para Gel Antibacterial', 'Frasco para Gel Antibacterial', 0, 1, 26, '2018-01-30 17:11:56', '2018-01-30 23:11:56'),
(44, 'Frasco para Gel Antibacterial', '<p><strong>Medidas:&nbsp;</strong><br />\r\nAlto: 9,5cm Ancho: 3,5cm Espesor: 2cm (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nFrasco de gel, con sujetador de silicona de diferentes colores para llevarlo colgado y tenerlo accesible. Capacidad: 40 ml.</p>\r\n\r\n<p><strong>Colores: </strong><br />\r\nAzul, Rojo, Verde, Blanco, Negro, Naranja, Amarillo, Morado, Verde Lim&oacute;n, Rosado, Turquesa.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en bolsita pl&aacute;stica transparente.</p>\r\n', 'Frasco para Gel Antibacterial', 0, 'frasco-para-gel-antibacterial', 5, '0.00', '0.00', 2, NULL, 0, NULL, 'Frasco para Gel Antibacterial', 'Frasco para Gel Antibacterial', 'Frasco para Gel Antibacterial', 0, 1, 26, '2018-01-30 17:14:08', '2018-01-30 23:14:08'),
(45, 'Gel Antibacterial con Sujetador de Silicona', '<p><strong>Descripci&oacute;n:</strong><br />\r\nFrasco con limpiador bactericida en gel (gel antis&eacute;ptico), con sujetador de silicona de diferentes colores para llevarlo colgado y tenerlo accesible.</p>\r\n\r\n<p><strong>Capacidad:</strong><br />\r\n30 ml.</p>\r\n\r\n<p><strong>Colores de sujetador:</strong><br />\r\nAzul, rosado, verde lim&oacute;n, verde, amarillo, naranja, morado, rojo, turquesa, negro y blanco.</p>\r\n\r\n<p><strong>Color gel:</strong><br />\r\nTransparente.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en bolsita pl&aacute;stica transparente.</p>\r\n', 'Gel Antibacterial con Sujetador de Silicona', 0, 'gel-antibacterial-con-sujetador-de-silicona', 6, '0.00', '0.00', 2, NULL, 0, NULL, 'Gel Antibacterial con Sujetador de Silicona', 'Gel Antibacterial con Sujetador de Silicona', 'Gel Antibacterial con Sujetador de Silicona', 0, 1, 26, '2018-01-30 17:16:33', '2018-01-30 23:16:33'),
(46, 'Gel Antibacterial con Spray', '<p><strong>Medidas:&nbsp;</strong><br />\r\nAltura: 13.5 cm. Di&aacute;metro: 1 cm.</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nFrasco pl&aacute;stico trasl&uacute;cido, vac&iacute;o, modelo lapicero&nbsp;de 10ml. de capacidad.<br />\r\n<br />\r\n<strong>Colores:</strong><br />\r\nBlanco, azul rojo, verde y anaranjado.<br />\r\n<br />\r\n<strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en bolsita pl&aacute;stica transparente.</p>\r\n', 'Gel Antibacterial con Spray', 0, 'gel-antibacterial-con-spray', 7, '0.00', '0.00', 2, NULL, 0, NULL, 'Gel Antibacterial con Spray', 'Gel Antibacterial con Spray', 'Gel Antibacterial con Spray', 0, 1, 26, '2018-01-30 17:18:26', '2018-01-30 23:18:26'),
(47, 'Kits Costura', '<p><strong>Descripci&oacute;n:</strong><br />\r\nEstuche de pl&aacute;stico, incluye&nbsp;tijera, agujas, hilo, ojal, botones, imperdibles y pinza.</p>\r\n\r\n<p><strong>Medidas: (Estuche)</strong><br />\r\nAncho: 7 cm.<br />\r\nAlto: 1.5 cm.<br />\r\nLargo: 6.2 cm.</p>\r\n\r\n<p><strong>Colores:</strong><br />\r\nAzul, rojo y&nbsp;blanco.</p>\r\n\r\n<p><strong>Presentaci&oacute;n:</strong><br />\r\nIndividual, en bolsita plastica transparente.</p>\r\n', 'Kits Costura', 0, 'kits-costura', 8, '0.00', '0.00', 2, NULL, 0, NULL, 'Kits Costura', 'Kits Costura', 'Kits Costura', 0, 1, 26, '2018-01-30 17:20:49', '2018-01-30 23:20:49'),
(48, 'Lustrador de Calzado', '<p>lustrador-de-calzado</p>\r\n', 'Lustrador de Calzado', 0, 'lustrador-de-calzado', 9, '0.00', '0.00', 2, NULL, 0, NULL, 'Lustrador de Calzado', 'Lustrador de Calzado', 'Lustrador de Calzado', 0, 1, 26, '2018-01-30 17:22:47', '2018-01-30 23:22:47'),
(49, 'Manta Polar', '<p>Manta Polar</p>\r\n', 'Manta Polar', 0, 'manta-polar', 10, '0.00', '0.00', 2, NULL, 0, NULL, 'Manta Polar', 'Manta Polar', 'Manta Polar', 0, 1, 26, '2018-01-30 17:24:47', '2018-01-30 23:24:47'),
(50, 'Espejo de Cartera', '<p><strong>Medidas:&nbsp;</strong><br />\r\n7 cm. Espesor: 1 cm.</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nEspejo de cartera pl&aacute;stico, que contiene: 1 espejo normal y 1 espejo de aumento + 1 peine.<br />\r\n<br />\r\n<strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en bolsita pl&aacute;stica transparente.</p>\r\n', 'Espejo de Cartera', 0, 'espejo-de-cartera', 11, '0.00', '0.00', 2, NULL, 0, NULL, 'Espejo de Cartera', 'Espejo de Cartera', 'Espejo de Cartera', 0, 1, 26, '2018-01-30 17:29:48', '2018-01-30 23:29:48'),
(51, 'Mini Espejo', '<p><strong>Medidas:&nbsp;</strong><br />\r\nDi&aacute;metro: 6.5 cm. (Incluido gancho) Largo: 7.5 cm. (Aprox.) Espesor: 2.5 cm.</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nEspejo para cartera pl&aacute;stico, con cepillo para cabello.<br />\r\n<br />\r\n<strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en bolsita pl&aacute;stica transparente.</p>\r\n', 'Mini Espejo', 0, 'mini-espejo', 12, '0.00', '0.00', 2, NULL, 0, NULL, 'Mini Espejo', 'Mini Espejo', 'Mini Espejo', 0, 1, 26, '2018-01-30 17:31:01', '2018-01-30 23:31:01'),
(52, 'Mini Espejo', '<p><strong>Medidas:&nbsp;</strong><br />\r\n7.3 x 6.5 cm. Espesor: 1.5 cm. (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nDoble espejo de cartera pl&aacute;stico: uno convencional y uno de aumento.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en bolsita pl&aacute;stica transparente.</p>\r\n', 'Mini Espejo', 0, 'mini-espejo', 13, '0.00', '0.00', 2, NULL, 0, NULL, 'Mini Espejo', 'Mini Espejo', 'Mini Espejo', 0, 1, 26, '2018-01-30 17:32:08', '2018-01-30 23:32:08'),
(53, 'Pulverizador de Agua', '<p><strong>Medidas:&nbsp;</strong><br />\r\nAltura: 21 cm. Di&aacute;metro: 4 cm. (Aprox.)</p>\r\n\r\n<p><strong>Material:</strong><br />\r\nPl&aacute;stico.</p>\r\n\r\n<p><strong>Capacidad:</strong><br />\r\n100 ml.</p>\r\n\r\n<p><strong>Colores:</strong><br />\r\nRojo, azul y blanco.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en caja de cart&oacute;n color blanca.&nbsp;</p>\r\n', 'Pulverizador de Agua', 0, 'pulverizador-de-agua', 14, '0.00', '0.00', 2, NULL, 0, NULL, 'Pulverizador de Agua', 'Pulverizador de Agua', 'Pulverizador de Agua', 0, 1, 26, '2018-01-30 17:34:05', '2018-01-30 23:34:05'),
(54, 'Set de Espejo con Kit de Costura', '<p>Set de Espejo con Kit de Costura</p>\r\n', 'Set de Espejo con Kit de Costura', 0, 'set-de-espejo-con-kit-de-costura', 15, '0.00', '0.00', 2, NULL, 0, NULL, 'Set de Espejo con Kit de Costura', 'Set de Espejo con Kit de Costura', 'Set de Espejo con Kit de Costura', 0, 1, 26, '2018-01-30 17:35:25', '2018-01-30 23:35:25'),
(55, 'Set de Herramientas con Linterna', '<p>Set de Herramientas con Linterna</p>\r\n', 'Set de Herramientas con Linterna', 0, 'set-de-herramientas-con-linterna', 16, '0.00', '0.00', 2, NULL, 0, NULL, 'Set de Herramientas con Linterna', 'Set de Herramientas con Linterna', 'Set de Herramientas con Linterna', 0, 1, 26, '2018-01-30 17:37:49', '2018-01-30 23:37:49'),
(56, 'Set de Oficina', '<p><strong>Medidas:&nbsp;</strong><br />\r\nAlto: 7,5 cm Ancho: 7 cm. (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nPote de pl&aacute;stico trasl&uacute;cido que contiene: 1 Saca grapas &middot; 1 Engrapadora + repuestos &middot; 1 Cinta Adhesiva &middot; 1 Perforadora de un hueco</p>\r\n\r\n<p><strong>Colores:</strong><br />\r\nBlanco, Rojo y Azul</p>\r\n\r\n<p><strong>Presentaci&oacute;n del Producto:</strong><br />\r\nIndividual en bolsa de pl&aacute;stico transparente.</p>\r\n', 'Set de Oficina', 0, 'set-de-oficina', 17, '0.00', '0.00', 2, NULL, 0, NULL, 'Set de Oficina', 'Set de Oficina', 'Set de Oficina', 0, 1, 26, '2018-01-30 17:40:01', '2018-01-30 23:40:01'),
(57, 'Set Manicure', '<p><strong>Medidas:&nbsp;</strong><br />\r\n10 x 2 cm. (Aprox.) Largo: 5 cm.</p>\r\n\r\n<p><strong>escripci&oacute;n:</strong><br />\r\nEstuche pl&aacute;stico trasl&uacute;cido que contiene: 1 pinza, 1 tijera, 1 corta u&ntilde;as y 1 removedor de cut&iacute;cula.</p>\r\n\r\n<p><strong>Colores:</strong><br />\r\nBlanco y rosado.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, bolsita de pl&aacute;stico transparente.</p>\r\n', 'Set Manicure', 0, 'set-manicure', 18, '0.00', '0.00', 2, NULL, 0, NULL, 'Set Manicure', 'Set Manicure', 'Set Manicure', 0, 1, 26, '2018-01-30 17:42:33', '2018-01-30 23:42:33'),
(58, 'Set Manicure', '<p><strong>Medidas:&nbsp;</strong><br />\r\n12 x 4.5 cm. Espesor: 3 cm. (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nSet de manicure de metal, que con contiene: 1 lima, 1 tijera, 1 corta u&ntilde;as y 1 removedor de cut&iacute;cula.</p>\r\n\r\n<p><strong>Color:</strong><br />\r\nPlateado.<br />\r\n<br />\r\n<strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en cajita de cart&oacute;n blanca.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Set Manicure', 0, 'set-manicure', 19, '0.00', '0.00', 2, NULL, 0, NULL, 'Set Manicure', 'Set Manicure', 'Set Manicure', 0, 1, 26, '2018-01-30 17:44:45', '2018-01-30 23:44:45'),
(59, 'Bolsa Mochila', '<p>Bolsa Mochila</p>\r\n', 'Bolsa Mochila', 0, 'bolsa-mochila', 1, '0.00', '0.00', 2, NULL, 0, NULL, 'Bolsa Mochila', 'Bolsa Mochila', 'Bolsa Mochila', 0, 1, 27, '2018-01-31 08:52:43', '2018-01-31 14:52:43'),
(60, 'Bolsa Notex', '', 'Bolsa Notex', 0, 'bolsa-notex', 2, '0.00', '0.00', 2, NULL, 0, NULL, 'Bolsa Notex', 'Bolsa Notex', 'Bolsa Notex', 0, 1, 27, '2018-01-31 08:53:58', '2018-01-31 14:53:58'),
(61, 'Bolsa de Playa', '<p>Bolsa de Playa</p>\r\n', 'Bolsa de Playa', 0, 'bolsa-de-playa', 3, '0.00', '0.00', 2, NULL, 0, NULL, 'Bolsa de Playa', 'Bolsa de Playa', 'Bolsa de Playa', 0, 1, 27, '2018-01-31 08:56:55', '2018-01-31 14:56:55'),
(62, 'Bolsa Trolley Plegable', '<p>Bolsa Trolley Plegable</p>\r\n', 'Bolsa Trolley Plegable', 0, 'bolsa-trolley-plegable', 4, '0.00', '0.00', 2, NULL, 0, NULL, 'Bolsa Trolley Plegable', 'Bolsa Trolley Plegable', 'Bolsa Trolley Plegable', 0, 1, 27, '2018-01-31 08:57:59', '2018-01-31 14:57:59'),
(63, 'Bolso Ecológico', '<p>Bolso Ecol&oacute;gico</p>\r\n', 'Bolso Ecológico', 0, 'bolso-ecologico', 5, '0.00', '0.00', 2, NULL, 0, NULL, 'Bolso Ecológico', 'Bolso Ecológico', 'Bolso Ecológico', 0, 1, 27, '2018-01-31 09:00:56', '2018-01-31 15:00:56'),
(64, 'Bolso Marinero', '<p>Bolso Marinero</p>\r\n', 'Bolso Marinero', 0, 'bolso-marinero', 6, '0.00', '0.00', 2, NULL, 0, NULL, 'Bolso Marinero', 'Bolso Marinero', 'Bolso Marinero', 0, 1, 27, '2018-01-31 09:01:49', '2018-01-31 15:01:49'),
(65, 'Bolso Yute', '<p>Bolso Yute</p>\r\n', 'Bolso Yute', 0, 'bolso-yute', 7, '0.00', '0.00', 2, NULL, 0, NULL, 'Bolso Yute', 'Bolso Yute', 'Bolso Yute', 0, 1, 27, '2018-01-31 09:03:23', '2018-01-31 15:03:23'),
(66, 'Lonchera Cooler', '<p>Lonchera Cooler</p>\r\n', 'Lonchera Cooler', 0, 'lonchera-cooler', 8, '0.00', '0.00', 2, NULL, 0, NULL, 'Lonchera Cooler', 'Lonchera Cooler', 'Lonchera Cooler', 0, 1, 27, '2018-01-31 09:04:23', '2018-01-31 15:04:23'),
(67, 'Lonchera de Neoprene', '<p>Lonchera de Neoprene</p>\r\n', 'Lonchera de Neoprene', 0, 'lonchera-de-neoprene', 9, '0.00', '0.00', 2, NULL, 0, NULL, 'Lonchera de Neoprene', 'Lonchera de Neoprene', 'Lonchera de Neoprene', 0, 1, 27, '2018-01-31 09:05:42', '2018-01-31 15:05:42'),
(68, 'Maletín', '<p>Malet&iacute;n</p>\r\n', 'Maletín', 0, 'maletin', 10, '0.00', '0.00', 2, NULL, 0, NULL, 'Maletín', 'Maletín', 'Maletín', 0, 1, 27, '2018-01-31 09:08:12', '2018-01-31 15:12:53'),
(69, 'Maletín Carrito', '<p>Malet&iacute;n Carrito</p>\r\n', 'Maletín Carrito', 0, 'maletin-carrito', 11, '0.00', '0.00', 2, NULL, 0, NULL, 'Maletín Carrito', 'Maletín Carrito', 'Maletín Carrito', 0, 1, 27, '2018-01-31 09:09:20', '2018-01-31 15:13:46'),
(70, 'Maletín Deportivo', '<p>Malet&iacute;n Deportivo</p>\r\n', 'Maletín Deportivo', 0, 'maletin-deportivo', 12, '0.00', '0.00', 2, NULL, 0, NULL, 'Maletín Deportivo', 'Maletín Deportivo', 'Maletín Deportivo', 0, 1, 27, '2018-01-31 09:11:12', '2018-01-31 15:14:10'),
(71, 'Maletín Ejecutivo', '<p>Malet&iacute;n Ejecutivo</p>\r\n', 'Maletín Ejecutivo', 0, 'maletin-ejecutivo', 13, '0.00', '0.00', 2, NULL, 0, NULL, 'Maletín Ejecutivo', 'Maletín Ejecutivo', 'Maletín Ejecutivo', 0, 1, 27, '2018-01-31 09:12:33', '2018-01-31 15:12:33'),
(72, 'Maletín Ejecutivo', '<p>Malet&iacute;n Ejecutivo</p>\r\n', 'Maletín Ejecutivo 01', 0, 'maletin-ejecutivo', 14, '0.00', '0.00', 2, NULL, 0, NULL, 'Maletín Ejecutivo', 'Maletín Ejecutivo', 'Maletín Ejecutivo', 0, 1, 27, '2018-01-31 09:15:17', '2018-01-31 15:15:17'),
(73, 'Maletín Ejecutivo', '<p>Malet&iacute;n Ejecutivo</p>\r\n', 'Maletín Ejecutivo', 0, 'maletin-ejecutivo', 15, '0.00', '0.00', 2, NULL, 0, NULL, 'Maletín Ejecutivo', 'Maletín Ejecutivo', 'Maletín Ejecutivo', 0, 1, 27, '2018-01-31 09:16:22', '2018-01-31 15:16:22'),
(74, 'Mochila', '<p>Mochila</p>\r\n', 'Mochila', 0, 'mochila', 16, '0.00', '0.00', 2, NULL, 0, NULL, 'Mochila', 'Mochila', 'Mochila', 0, 1, 27, '2018-01-31 09:19:34', '2018-01-31 15:19:34'),
(75, 'Mochila Publicitaria', '<p>Mochila Publicitaria</p>\r\n', 'Mochila Publicitaria', 0, 'mochila-publicitaria', 17, '0.00', '0.00', 2, NULL, 0, NULL, 'Mochila Publicitaria', 'Mochila Publicitaria', 'Mochila Publicitaria', 0, 1, 27, '2018-01-31 09:21:03', '2018-01-31 15:21:03'),
(76, 'Mochila Morral', '<p>Mochila Morral</p>\r\n', 'Mochila Morral', 0, 'mochila-morral', 18, '0.00', '0.00', 2, NULL, 0, NULL, 'Mochila Morral', 'Mochila Morral', 'Mochila Morral', 0, 1, 27, '2018-01-31 09:21:50', '2018-01-31 15:21:50'),
(77, 'Mochila con Cremallera', '<p>Mochila con Cremallera Contraste Personalizada azul</p>\r\n', 'Mochila con Cremallera', 0, 'mochila-con-cremallera', 19, '0.00', '0.00', 2, NULL, 0, NULL, 'Mochila con Cremallera', 'Mochila con Cremallera Personalizad', 'Mochila con Cremallera', 0, 1, 27, '2018-01-31 09:23:34', '2018-01-31 15:26:18'),
(78, 'Mochila Plana', '<p>Mochila Plana con salida auriculares y bolsillos personalizada.</p>\r\n', 'Mochila Plana', 0, 'mochila-plana', 20, '0.00', '0.00', 2, NULL, 0, NULL, 'Mochila Plana', 'Mochila Plana', 'Mochila Plana', 0, 1, 27, '2018-01-31 09:25:01', '2018-01-31 15:25:01'),
(79, 'Monedero Camel', '<p>Monedero Camel</p>\r\n', 'Monedero Camel', 0, 'monedero-camel', 21, '0.00', '0.00', 2, NULL, 0, NULL, 'Monedero Camel', 'Monedero Camel', 'Monedero Camel', 0, 1, 27, '2018-01-31 09:28:59', '2018-01-31 15:28:59'),
(80, 'Morral de Lona', '<p>Morral de Lona</p>\r\n', 'Morral de Lona', 0, 'morral-de-lona', 22, '0.00', '0.00', 2, NULL, 0, NULL, 'Morral de Lona', 'Morral de Lona', 'Morral de Lona', 0, 1, 27, '2018-01-31 09:29:58', '2018-01-31 15:29:58'),
(81, 'Portadocumentos', '<p>Portadocumentos</p>\r\n', 'Portadocumentos', 0, 'portadocumentos', 23, '0.00', '0.00', 2, NULL, 0, NULL, 'Portadocumentos', 'Portadocumentos', 'Portadocumentos', 0, 1, 27, '2018-01-31 09:30:50', '2018-01-31 15:30:50'),
(82, 'Casa Ecológica', '<p><strong>Medidas:&nbsp;</strong><br />\r\n11cm x 6.5cm (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nPorta notas con 300 hojas de notas blancas, 25 hojas 5C banderas adhesivas.</p>\r\n\r\n<p><strong>Colores:</strong> Natural.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\n1pc&nbsp;en caja blanca de&nbsp;cart&oacute;n.</p>\r\n', 'Casa Ecológica', 0, 'casa-ecologica', 1, '0.00', '0.00', 2, NULL, 0, NULL, 'Casa Ecológica', 'Casa Ecológica', 'Casa Ecológica', 0, 1, 28, '2018-01-31 09:54:03', '2018-01-31 15:54:03'),
(83, 'Cuaderno con Tapa Dura', '<p><strong>Medidas:&nbsp;</strong><br />\r\n9 x 14cm (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nLibreta cubierta de poliuretano&nbsp;de&nbsp;&nbsp;80 hojas de papel crema con l&iacute;nea, banda el&aacute;stica, marcador de cinta.</p>\r\n\r\n<p><strong>Colores:</strong><br />\r\nAzul, naranja, negro, rojo, verde.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en bolsita pl&aacute;stica transparente.</p>\r\n', 'Cuaderno con Tapa Dura', 0, 'cuaderno-con-tapa-dura', 2, '0.00', '0.00', 2, NULL, 0, NULL, 'Cuaderno con Tapa Dura', 'Cuaderno con Tapa Dura', 'Cuaderno con Tapa Dura', 0, 1, 28, '2018-01-31 09:56:44', '2018-01-31 15:56:44'),
(84, 'Cubo Ecológico', '<p><strong>Medidas:&nbsp;</strong><br />\r\n9 x 9 x 9cm, 2mm cubierta (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nCubo ecol&oacute;gico, 500 hojas notas 5C, 50 hojas de notas adhesivas amarillas, 25 hojas 5C banderas adhesivas.&nbsp;</p>\r\n\r\n<p><strong>Colores:</strong><br />\r\nNatural, negro, rojo, azul.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en bolsita pl&aacute;stica transparente.</p>\r\n', 'Cubo Ecológico', 0, 'cubo-ecologico', 3, '0.00', '0.00', 2, NULL, 0, NULL, 'Cubo Ecológico', 'Cubo Ecológico', 'Cubo Ecológico', 0, 1, 28, '2018-01-31 09:57:57', '2018-01-31 15:57:57'),
(85, 'Libreta Ecológica', '<p><strong>Medidas:</strong><br />\r\n9 x 14 cm. (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nLibreta anillada de aprox. 50 hojas blancas rayadas; incluye 1 lapicero modelo 9103.</p>\r\n\r\n<p><strong>Colores:</strong><br />\r\nRojo, negro, anaranjado, verde y azul.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en bolsita pl&aacute;stica transparente.</p>\r\n', 'Libreta Ecológica', 0, 'libreta-ecologica', 4, '0.00', '0.00', 2, NULL, 0, NULL, 'Libreta Ecológica', 'Libreta Ecológica', 'Libreta Ecológica', 0, 1, 28, '2018-01-31 10:00:00', '2018-01-31 16:00:00'),
(86, 'Libreta Ecológica', '<p><strong>Medidas:&nbsp;</strong><br />\r\n10.5 x 8.5 cm. (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nContiene 20 hojas aprox. color amarillo, 5 post it en diferentes colores.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en bolsita de pl&aacute;stica transparente.</p>\r\n', 'Libreta Ecológica', 0, 'libreta-ecologica', 5, '0.00', '0.00', 2, NULL, 0, NULL, 'Libreta Ecológica', 'Libreta Ecológica', 'Libreta Ecológica', 0, 1, 28, '2018-01-31 10:02:40', '2018-01-31 16:02:40'),
(87, 'Libreta Ecológica', '<p><strong>Medidas:&nbsp;</strong><br />\r\n18 x 12.5 cm.</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nLibreta ecol&oacute;gica que contiene 5 post it medianos de diferentes colores, 1 lapicero ecol&oacute;gico y 70 hojas blancas.<br />\r\n<br />\r\n<strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en bolsita pl&aacute;stica transparente.</p>\r\n', 'Libreta Ecológica', 0, 'libreta-ecologica', 6, '0.00', '0.00', 2, NULL, 0, NULL, 'Libreta Ecológica', 'Libreta Ecológica', 'Libreta Ecológica', 0, 1, 28, '2018-01-31 10:04:18', '2018-01-31 16:04:18'),
(88, 'Libreta Ecológica', '<p><strong>Medidas:&nbsp;</strong><br />\r\n18 x 12.5 cm.</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nLibreta ecol&oacute;gica que contiene 5 post it medianos de diferentes colores, 1 lapicero ecol&oacute;gico y 70 hojas blancas.<br />\r\n<br />\r\n<strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en bolsita pl&aacute;stica transparente.</p>\r\n', 'Libreta Ecológica', 0, 'libreta-ecologica', 7, '0.00', '0.00', 2, NULL, 0, NULL, 'Libreta Ecológica', 'Libreta Ecológica', 'Libreta Ecológica', 0, 1, 28, '2018-01-31 10:06:20', '2018-01-31 16:06:20'),
(89, 'Libreta Ecológica', '<p><strong>Medidas:&nbsp;</strong><br />\r\n15 x 10 cm.</p>\r\n\r\n<p><strong>Colores:</strong><strong>Descripci&oacute;n:&nbsp;</strong><br />\r\nLibreta ecol&oacute;gica que contiene 6 tacos post it de diferentes colores, 50 hojas blancas y un lapicero ecol&oacute;gico.</p>\r\n\r\n<p>Natural,&nbsp;azul y&nbsp;rojo.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en bolsa pl&aacute;stica transparente.</p>\r\n', 'Libreta Ecológica', 0, 'libreta-ecologica', 8, '0.00', '0.00', 2, NULL, 0, NULL, 'Libreta Ecológica', 'Libreta Ecológica', 'Libreta Ecológica', 0, 1, 28, '2018-01-31 10:08:23', '2018-01-31 16:08:23'),
(90, 'Libreta Ecológica', '<p><strong>Medidas:&nbsp;</strong><br />\r\n18.5 x 18 cm. (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nColor natural, contiene 50 hojas blancas rayadas, 1 lapicero ecol&oacute;gico, 1 taco post it grande, 1 taco post it mediano y 5 post it peque&ntilde;os de diferentes colores.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del Producto:</strong><br />\r\nIndividual, en bolsita de pl&aacute;stica transparente.</p>\r\n', 'Libreta Ecológica', 0, 'libreta-ecologica', 9, '0.00', '0.00', 2, NULL, 0, NULL, 'Libreta Ecológica', 'Libreta Ecológica', 'Libreta Ecológica', 0, 1, 28, '2018-01-31 10:10:37', '2018-01-31 16:10:37'),
(91, 'Memo Set Ecológico', '<p><strong>Medidas:&nbsp;</strong><br />\r\n10.5 x 8.5 cm. (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nContiene 20 hojas aprox. color amarillo, 5 post it en diferentes colores.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en bolsita de pl&aacute;stica transparente.</p>\r\n', 'Memo Set Ecológico', 0, 'memo-set-ecologico', 10, '0.00', '0.00', 2, NULL, 0, NULL, 'Memo Set Ecológico', 'Memo Set Ecológico', 'Memo Set Ecológico', 0, 1, 28, '2018-01-31 10:14:43', '2018-01-31 16:14:43'),
(92, 'Notebook', '<p><strong>Medidas:&nbsp;</strong><br />\r\n7.5 x 7 cm. (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nMini libreta con espiral (argolla color negro), contiene 5 tacos chicos en colores: celeste, anaranjado, verde lim&oacute;n, fucsia y amarillo y 5 post it peque&ntilde;os en colores: amarillo, fucsia, verde lim&oacute;n, anaranjado y celeste.</p>\r\n\r\n<p><strong>Colores de tapa:</strong><br />\r\nNatural, negro y blanco.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en bolsita de pl&aacute;stico transparente.</p>\r\n', 'Notebook', 0, 'notebook', 11, '0.00', '0.00', 2, NULL, 0, NULL, 'Notebook', 'Notebook', 'Notebook', 0, 1, 28, '2018-01-31 10:17:40', '2018-01-31 16:17:40'),
(93, 'Porta Post It Ecológico', '<p><strong>Medidas:&nbsp;</strong><br />\r\n8.5 x 8cm (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nPorta post-it con 25 hojas 5C bandera adhesiva, 25 hojas de notas adhesivas amarillas.</p>\r\n\r\n<p><strong>Colores:</strong><br />\r\nNegro, blanco, natural, rojo, azul</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en bolsita pl&aacute;stica transparente.</p>\r\n', 'Porta Post It Ecológico', 0, 'porta-post-it-ecologico', 12, '0.00', '0.00', 2, NULL, 0, NULL, 'Porta Post It Ecológico', 'Porta Post It Ecológico', 'Porta Post It Ecológico', 0, 1, 28, '2018-01-31 10:20:39', '2018-01-31 16:20:39'),
(94, 'Porta Pos-it', '<p><strong>Medidas:&nbsp;</strong><br />\r\n8,3cm x 5,4cm</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nPorta post-it con 25 hojas de notas adhesivas.</p>\r\n\r\n<p><strong>Colores:</strong><br />\r\nNegro, blanco, natural, rojo, azul, plateado</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en bolsita pl&aacute;stica transparente.</p>\r\n', 'Porta Pos-it', 0, 'porta-pos-it', 13, '0.00', '0.00', 2, NULL, 0, NULL, 'Porta Pos-it', 'Porta Pos-it', 'Porta Pos-it', 0, 1, 28, '2018-01-31 10:24:19', '2018-01-31 16:24:19'),
(95, 'Porta Pos-it', '<p><strong>Medidas:&nbsp;</strong><br />\r\n8.5 x 8cm (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nPorta post-it con 25 hojas 5C bandera adhesiva, 25 hojas de notas adhesivas amarillas.</p>\r\n\r\n<p><strong>Colores:</strong><br />\r\nNegro, blanco, natural, rojo, azul</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en bolsita pl&aacute;stica transparente.</p>\r\n', 'Porta Pos-it', 0, 'porta-pos-it', 14, '0.00', '0.00', 2, NULL, 0, NULL, 'Porta Pos-it', 'Porta Pos-it', 'Porta Pos-it', 0, 1, 28, '2018-01-31 10:26:26', '2018-01-31 16:26:26'),
(96, 'Post It Anillado', '<p><strong>Medidas:&nbsp;</strong><br />\r\n7.5 x 7 cm. (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nMini libreta con espiral (argolla color negro), contiene 5 tacos chicos en colores: celeste, anaranjado, verde lim&oacute;n, fucsia y amarillo y 5 post it peque&ntilde;os en colores: amarillo, fucsia, verde lim&oacute;n, anaranjado y celeste.</p>\r\n\r\n<p><strong>Colores de tapa:</strong><br />\r\nNatural, negro y blanco.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en bolsita de pl&aacute;stico transparente.</p>\r\n', 'Post It Anillado', 0, 'post-it-anillado', 15, '0.00', '0.00', 2, NULL, 0, NULL, 'Post It Anillado', 'Post It Anillado', 'Post It Anillado', 0, 1, 28, '2018-01-31 10:29:14', '2018-01-31 16:29:14'),
(97, 'Libreta Ecológica', '<p><strong>Medidas:&nbsp;</strong><br />\r\n18 x 13 cm.</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nLibreta ecol&oacute;gica que contiene: 1 lapicero ecol&oacute;gico, 5 post it peque&ntilde;os de diferentes colores, ruleta giratoria en la tapa para se&ntilde;alar el d&iacute;a de la semana y 70 hojas ecol&oacute;gicas rayadas.</p>\r\n\r\n<p><strong>Colores:</strong><br />\r\nAzul, rojo, negro, verde y anaranjado.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en bolsita pl&aacute;stica transparente.</p>\r\n', 'Libreta Ecológica', 0, 'libreta-ecologica', 16, '0.00', '0.00', 2, NULL, 0, NULL, 'Libreta Ecológica', 'Libreta Ecológica', 'Libreta Ecológica', 0, 1, 28, '2018-01-31 10:31:10', '2018-01-31 16:31:10'),
(98, 'Set Ecológico', '<p><strong>Medidas:&nbsp;</strong><br />\r\n16 x 6.5 cm. Alto: 2 cm. (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nForma de caja rectangular de color natural, con un bolsillo en la parte interior de la tapa donde se ubica la regla de 12 cm. Contiene adem&aacute;s, 1 lapicero ecol&oacute;gico, 2 tacos post it medianos en colores: rosado y amarillo y 5 post it chicos en colores: fucsia, anaranjado, rosado, amarillo y verde lim&oacute;n.<br />\r\n<br />\r\n<strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en bolsa de pl&aacute;stico transparente.</p>\r\n', 'Set Ecológico', 0, 'set-ecologico', 17, '0.00', '0.00', 2, NULL, 0, NULL, 'Set Ecológico', 'Set Ecológico', 'Set Ecológico', 0, 1, 28, '2018-01-31 10:32:32', '2018-01-31 16:32:32'),
(99, 'Llavero Casco Destapador', '<p><strong>Medidas:&nbsp;</strong><br />\r\n4.8 x 3.7 cm. (Aprox.)</p>\r\n\r\n<p><strong>Colores:</strong><br />\r\nRojo, blanco, azul, y amarillo.</p>\r\n', 'Llavero Casco Destapador', 0, 'llavero-casco-destapador', 1, '0.00', '0.00', 2, NULL, 0, NULL, 'Llavero Casco Destapador', 'Llavero Casco Destapador', 'Llavero Casco Destapador', 0, 1, 29, '2018-01-31 10:44:27', '2018-01-31 16:44:27'),
(100, 'Llavero Herramienta Linterna', '<p><strong>Medidas:&nbsp;</strong><br />\r\n5.5 x 7 cm.</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\n2 Desarmadores planos y 2 desarmadores estrella, 1 wincha de un metro&nbsp;y 1 linterna.<br />\r\n<br />\r\n<strong>Colores:</strong><br />\r\nAzul trasl&uacute;cido, rojo trasl&uacute;cido y plateado s&oacute;lido.<br />\r\n<br />\r\n<strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en bolsita pl&aacute;stica de burbujas, transparente.</p>\r\n', 'Llavero Herramienta Linterna', 0, 'llavero-herramienta-linterna', 2, '0.00', '0.00', 2, NULL, 0, NULL, 'Llavero Herramienta Linterna', 'Llavero Herramienta Linterna', 'Llavero Herramienta Linterna', 0, 1, 29, '2018-01-31 10:53:53', '2018-01-31 16:53:53'),
(101, 'Llavero Multiusos', '<p><strong>Medidas:&nbsp;</strong><br />\r\n9.5 x 2.5 cm.</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\n1 Tijera, 1 destapador, 1 lija&nbsp;y&nbsp;1 cuchilla.</p>\r\n\r\n<p><strong>Colores:</strong><br />\r\nNegro, azul y plateado.</p>\r\n', 'Llavero Multiusos', 0, 'llavero-multiusos', 3, '0.00', '0.00', 2, NULL, 0, NULL, 'Llavero Multiusos', 'Llavero Multiusos', 'Llavero Multiusos', 0, 1, 29, '2018-01-31 10:57:20', '2018-01-31 16:57:20'),
(102, 'Llavero Corazón Antiestrés', '<p><strong>Medidas:&nbsp;</strong><br />\r\n5 x 5 cm. Esp.: 3.6 cm. (Aprox.)</p>\r\n', 'Llavero Corazón Antiestrés', 0, 'llavero-corazon-antiestres', 4, '0.00', '0.00', 2, NULL, 0, NULL, 'Llavero Corazón Antiestrés', 'Llavero Corazón Antiestrés', 'Llavero Corazón Antiestrés', 0, 1, 29, '2018-01-31 10:59:06', '2018-01-31 16:59:06'),
(103, 'Llavero Antiestrés Pelota', '<p><strong>Medidas:&nbsp;</strong><br />\r\nDi&aacute;metro: 4 cm. (Aprox.)</p>\r\n', 'Llavero Antiestrés Pelota', 0, 'llavero-antiestres-pelota', 5, '0.00', '0.00', 2, NULL, 0, NULL, 'Llavero Antiestrés Pelota', 'Llavero Antiestrés Pelota', 'Llavero Antiestrés Pelota', 0, 1, 29, '2018-01-31 11:00:47', '2018-01-31 17:00:47'),
(104, 'Llavero Circular Wincha', '<p><strong>Medidas:&nbsp;</strong><br />\r\n4.2 x 4.2 cm. Esp.: 0.9 cm. (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nWincha de 1 mt.</p>\r\n', 'Llavero Circular Wincha', 0, 'llavero-circular-wincha', 6, '0.00', '0.00', 2, NULL, 0, NULL, 'Llavero Circular Wincha', 'Llavero Circular Wincha', 'Llavero Circular Wincha', 0, 1, 29, '2018-01-31 11:03:07', '2018-01-31 17:03:07'),
(105, 'Llavero con Herramientas', '<p><strong>Medidas:&nbsp;</strong><br />\r\nDi&aacute;metro: 5 cm. Esp.: 1.3 cm. (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nContiene 2 desarmadores planos y 2 desarmadores estrella de diferentes vol&uacute;menes.</p>\r\n\r\n<p><strong>Colores:</strong><br />\r\nVerde, rojo, azul y plateado.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual en bolsita pl&aacute;stica transparente.</p>\r\n', 'Llavero con Herramientas', 0, 'llavero-con-herramientas', 7, '0.00', '0.00', 2, NULL, 0, NULL, 'Llavero con Herramientas', 'Llavero con Herramientas', 'Llavero con Herramientas', 0, 1, 29, '2018-01-31 11:05:17', '2018-01-31 17:05:17'),
(106, 'Llavero Corazón Wincha', '<p><strong>Medidas:&nbsp;</strong><br />\r\n4.2 x 4.2 cm. Esp.: 0.9 cm. (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nWincha de 1 mt.</p>\r\n', 'Llavero Corazón Wincha', 0, 'llavero-corazon-wincha', 8, '0.00', '0.00', 2, NULL, 0, NULL, 'Llavero Corazón Wincha', 'Llavero Corazón Wincha', 'Llavero Corazón Wincha', 0, 1, 29, '2018-01-31 11:12:24', '2018-01-31 17:12:24'),
(107, 'Llavero Metal', '<p><strong>Medidas:&nbsp;</strong><br />\r\n7.5 x 2.5 cm. (Aprox.)</p>\r\n\r\n<p><strong>Material:</strong><br />\r\nMetal.</p>\r\n', 'Llavero Metal', 0, 'llavero-metal', 9, '0.00', '0.00', 2, NULL, 0, NULL, 'Llavero Metal', 'Llavero Metal', 'Llavero Metal', 0, 1, 29, '2018-01-31 11:19:32', '2018-01-31 17:19:32'),
(108, 'Llavero Metal', '<p><strong>Medidas:&nbsp;</strong><br />\r\n8.5 x 3.5 cm. (Aprox.)</p>\r\n\r\n<p><strong>Material:</strong><br />\r\nMetal.</p>\r\n', 'Llavero Metal', 0, 'llavero-metal', 10, '0.00', '0.00', 2, NULL, 0, NULL, 'Llavero Metal', 'Llavero Metal', 'Llavero Metal', 0, 1, 29, '2018-01-31 11:20:58', '2018-01-31 17:20:58'),
(109, 'Llavero Metal', '<p><strong>Medidas:&nbsp;</strong><br />\r\n8 x 3 cm. (Aprox.)</p>\r\n\r\n<p><strong>Material:</strong><br />\r\nMetal.</p>\r\n', 'Llavero Metal', 0, 'llavero-metal', 11, '0.00', '0.00', 2, NULL, 0, NULL, 'Llavero Metal', 'Llavero Metal', 'Llavero Metal', 0, 1, 29, '2018-01-31 11:22:10', '2018-01-31 17:22:10'),
(110, 'Llavero Destapador', '<p><strong>Colores:</strong><br />\r\nRojo, blanco, azul, y amarillo.</p>\r\n', 'Llavero Destapador', 0, 'llavero-destapador', 12, '0.00', '0.00', 2, NULL, 0, NULL, 'Llavero Destapador', 'Llavero Destapador', 'Llavero Destapador', 0, 1, 29, '2018-01-31 11:23:38', '2018-01-31 17:40:35'),
(111, 'Llavero Multifuncional', '<p>Llavero Multifuncional Wincha</p>\r\n', 'Llavero Multifuncional', 0, 'llavero-multifuncional', 13, '0.00', '0.00', 2, NULL, 0, NULL, 'Llavero Multifuncional', 'Llavero Multifuncional', 'Llavero Multifuncional', 0, 1, 29, '2018-01-31 11:26:52', '2018-01-31 17:26:52'),
(112, 'Llavero Rectangular Linterna', '<p><strong>Medidas:&nbsp;</strong><br />\r\nLargo: 6 cm. Ancho: 2.4 cm. Esp.: 0.7 cm. (Aprox.)</p>\r\n\r\n<p><strong>Colores:</strong><br />\r\nAnaranjado, rojo, verde, azul, plateado y negro.</p>\r\n', 'Llavero Rectangular Linterna', 0, 'llavero-rectangular-linterna', 14, '0.00', '0.00', 2, NULL, 0, NULL, 'Llavero Rectangular Linterna', 'Llavero Rectangular Linterna', 'Llavero Rectangular Linterna', 0, 1, 29, '2018-01-31 11:28:08', '2018-01-31 17:28:08'),
(113, 'Llavero Transparente', '<p>Llavero Transparente</p>\r\n', 'Llavero Transparente', 0, 'llavero-transparente', 15, '0.00', '0.00', 2, NULL, 0, NULL, 'Llavero Transparente', 'Llavero Transparente', 'Llavero Transparente', 0, 1, 29, '2018-01-31 11:29:55', '2018-01-31 17:29:55'),
(114, 'Llavero Casco Antiestrés', '<p><strong>Medidas:&nbsp;</strong><br />\r\n5.7 x 4.9 cm. Alto: 3 cm. (Aprox.)</p>\r\n\r\n<p><strong>Colores:</strong><br />\r\nBlanco, azul, rojo y amarillo.</p>\r\n', 'Llavero Casco Antiestrés', 0, 'llavero-casco-antiestres', 16, '0.00', '0.00', 2, NULL, 0, NULL, 'Llavero Casco Antiestrés', 'Llavero Casco Antiestrés', 'Llavero Casco Antiestrés', 0, 1, 29, '2018-01-31 11:31:23', '2018-01-31 17:31:23'),
(115, 'Llavero Casco Linterna', '<p><strong>Medidas:&nbsp;</strong><br />\r\n4.8 x 3.4 cm. Alto: 2 cm. (Aprox.)</p>\r\n\r\n<p><strong>Colores:</strong><br />\r\nRojo, blanco, amarillo y azul.</p>\r\n', 'Llavero Casco Linterna', 0, 'llavero-casco-linterna', 17, '0.00', '0.00', 2, NULL, 0, NULL, 'Llavero Casco Linterna', 'Llavero Casco Linterna', 'Llavero Casco Linterna', 0, 1, 29, '2018-01-31 11:32:31', '2018-01-31 17:32:31'),
(116, 'Llavero Redondo Linterna', '<p><strong>Medidas:&nbsp;</strong><br />\r\nDi&aacute;metro: &Oslash; 5 cm.</p>\r\n\r\n<p><strong>Material:</strong><br />\r\nPl&aacute;stico.</p>\r\n\r\n<p><strong>Colores:</strong><br />\r\nAnaranjado, rojo, verde, azul, negro y plateado.</p>\r\n', 'Llavero Redondo Linterna', 0, 'llavero-redondo-linterna', 18, '0.00', '0.00', 2, NULL, 0, NULL, 'Llavero Redondo Linterna', 'Llavero Redondo Linterna', 'Llavero Redondo Linterna', 0, 1, 29, '2018-01-31 11:35:11', '2018-01-31 17:35:11');
INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `resumen`, `codigo`, `url`, `orden`, `precio`, `precio_oferta`, `oferta`, `tags`, `destacado`, `fecha_ingreso`, `seo_title`, `seo_description`, `seo_keywords`, `cantidad`, `estado`, `categoria_id`, `creado`, `modificado`) VALUES
(117, 'Llavero Wincha', '<p><strong>Medidas:&nbsp;</strong><br />\r\n4.2 x 4.2 cm. Esp.: 0.9 cm. (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nWincha de 1 mt.</p>\r\n', 'Llavero Wincha', 0, 'llavero-wincha', 19, '0.00', '0.00', 2, NULL, 0, NULL, 'Llavero Wincha', 'Llavero Wincha', 'Llavero Wincha', 0, 1, 29, '2018-01-31 11:36:38', '2018-01-31 17:36:38'),
(118, 'Llavero Destapador', '<p><strong>Material:</strong><br />\r\nMetal</p>\r\n', 'Llavero Destapador', 0, 'llavero-destapador', 20, '0.00', '0.00', 2, NULL, 0, NULL, 'Llavero Destapador', 'Llavero Destapador', 'Llavero Destapador', 0, 1, 29, '2018-01-31 11:40:25', '2018-01-31 17:40:25'),
(119, 'Llavero Pelota Antiestrés', '<p><strong>Medidas:&nbsp;</strong><br />\r\nDi&aacute;metro: 4 cm. (Aprox.)</p>\r\n\r\n<p><strong>Colores:</strong><br />\r\nAzul, rojo, blanco, verde, anaranjado y amarillo.</p>\r\n', 'Llavero Pelota Antiestrés', 0, 'llavero-pelota-antiestres', 21, '0.00', '0.00', 2, NULL, 0, NULL, 'Llavero Pelota Antiestrés', 'Llavero Pelota Antiestrés', 'Llavero Pelota Antiestrés', 0, 1, 29, '2018-01-31 11:42:35', '2018-01-31 17:42:35'),
(120, 'Memoria USB 8GB', '<p><strong>Medidas:&nbsp;</strong><br />\r\nAltura: 6.3 cm. Ancho: 2.8 cm. Esp.: 1 cm. (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nMemoria USB llavero de 8GB.</p>\r\n\r\n<p><strong>Material:</strong><br />\r\nMadera.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en bolsita pl&aacute;stica transparente.</p>\r\n', 'Memoria USB 8GB', 0, 'memoria-usb-8gb', 1, '0.00', '0.00', 2, NULL, 0, NULL, 'Memoria USB 8GB', 'Memoria USB 8GB', 'Memoria USB 8GB', 0, 1, 30, '2018-01-31 13:21:01', '2018-01-31 19:21:01'),
(121, 'Memoria USB 4GB', '<p><strong>Medidas:&nbsp;</strong><br />\r\nAltura: 6.5 cm. Ancho: 2 cm. (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nMemoria USB de 4GB.</p>\r\n\r\n<p><strong>Material:</strong><br />\r\nCart&oacute;n.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en bolsita pl&aacute;stica transparente.</p>\r\n', 'Memoria USB 4GB', 0, 'memoria-usb-4gb', 2, '0.00', '0.00', 2, NULL, 0, NULL, 'Memoria USB 4GB', 'Memoria USB 4GB', 'Memoria USB 4GB', 0, 1, 30, '2018-01-31 13:22:23', '2018-01-31 19:22:23'),
(122, 'Memoria Llave USB 8GB', '<p><strong>Medidas:&nbsp;</strong><br />\r\n(Estuche) Largo: 9 cm. - 4.5 x 2 cm. / Llave: 5.5 x 2.5 cm.</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nMemoria&nbsp;USB met&aacute;lico de 8GB, en forma de llave.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, estuche de metal&nbsp;con&nbsp;tapa de mica pl&aacute;stica transparente&nbsp;y eva troquelada color negro.</p>\r\n', 'Memoria Llave USB 8GB', 0, 'memoria-llave-usb-8gb', 3, '0.00', '0.00', 2, NULL, 0, NULL, 'Memoria Llave USB 8GB', 'Memoria Llave USB 8GB', 'Memoria Llave USB 8GB', 0, 1, 30, '2018-01-31 13:28:26', '2018-01-31 19:28:26'),
(123, 'Memoria Tarjeta USB 8GB', '<p><strong>Medidas:&nbsp;</strong><br />\r\nEstuche: 10.5 x 7 cm. / Tarjeta: 8.5 x 5 cm.</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nMemoria USB de 8GB, pl&aacute;stica en forma de tarjeta&nbsp;con estuche pl&aacute;stico blanco trasl&uacute;cido y eva troquelada color blanco.<br />\r\n<br />\r\n<strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, el estuche con la tarjeta viene&nbsp;en bolsita pl&aacute;stica transparente.</p>\r\n', 'Memoria Tarjeta USB 8GB', 0, 'memoria-tarjeta-usb-8gb', 4, '0.00', '0.00', 2, NULL, 0, NULL, 'Memoria Tarjeta USB 8GB', 'Memoria Tarjeta USB 8GB', 'Memoria Tarjeta USB 8GB', 0, 1, 30, '2018-01-31 13:42:19', '2018-01-31 19:42:19'),
(124, 'Memoria USB 4, 6 y 8 GB', '<p><strong>Medidas:&nbsp;</strong><br />\r\nAltura: 5.4 cm. Ancho: 1.9 cm. Esp.: 1.1 cm. (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nMemoria USB de 4, 6 y 8 GB.</p>\r\n\r\n<p><strong>Colores:</strong><br />\r\nRojo, azul y negro.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en bolsita pl&aacute;stica transparente.</p>\r\n', 'Memoria USB 4, 6 y 8 GB', 0, 'memoria-usb-4-6-y-8-gb', 5, '0.00', '0.00', 2, NULL, 0, NULL, 'Memoria USB 4, 6 y 8 GB', 'Memoria USB 4, 6 y 8 GB', 'Memoria USB 4, 6 y 8 GB', 0, 1, 30, '2018-01-31 14:09:31', '2018-01-31 20:09:31'),
(125, 'Memoria USB 8GB', '<p><strong>Medidas:&nbsp;</strong>Altura:<br />\r\n7 cm. Ancho: 2 cm. (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nMemoria USB pl&aacute;stico de 8GB.</p>\r\n\r\n<p><strong>Colores:</strong><br />\r\nAzul, rojo, negro, blanco y plateado.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en bolsita pl&aacute;stica transparente.</p>\r\n', 'Memoria USB 8GB', 0, 'memoria-usb-8gb', 6, '0.00', '0.00', 2, NULL, 0, NULL, 'Memoria USB 8GB', 'Memoria USB 8GB', 'Memoria USB 8GB', 0, 1, 30, '2018-01-31 14:11:02', '2018-01-31 20:11:02'),
(126, 'Memoria Leather USB', '<p><strong>Medidas:&nbsp;</strong><br />\r\n(Estuche) Largo: 11.5 cm. / USB: 8.5 x 3.1 cm.</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nMemoria de 8 y 16 GB en estuche de cuero, con elegante sujetador de metal para llevarlo colgado.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en caja met&aacute;lica&nbsp;con eva troquelada color negro.</p>\r\n', 'Memoria Leather USB', 0, 'memoria-leather-usb', 7, '0.00', '0.00', 2, NULL, 0, NULL, 'Memoria Leather USB', 'Memoria Leather USB', 'Memoria Leather USB', 0, 1, 30, '2018-01-31 14:14:06', '2018-01-31 20:14:06'),
(127, 'Jarro Mug', '<p><strong>Medidas:&nbsp;</strong><br />\r\nAlto: 17 cm. Di&aacute;metro: 8 cm. (Aprox.)</p>\r\n\r\n<p><strong>Capacidad:</strong><br />\r\n450 ml. Aprox.</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nInterior totalmente pl&aacute;stico en color negro, por fuera cuerpo de metal en color plateado, el borde del jarro, el mango (asa) y la base son de pl&aacute;stico color negro.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual en bolsa de pl&aacute;stico transparente dentro de una caja de cart&oacute;n color blanco.</p>\r\n', 'Jarro Mug', 0, 'jarro-mug', 1, '0.00', '0.00', 2, NULL, 0, NULL, 'Jarro Mug', 'Jarro Mug', 'Jarro Mug', 0, 1, 31, '2018-01-31 14:17:16', '2018-01-31 20:17:16'),
(128, 'Mug de Acero', '<p>&nbsp;</p>\r\n\r\n<p><strong>Medidas:&nbsp;</strong><br />\r\nAlto: 18.5 cm. Di&aacute;metro: 8 cm. (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nInterior de metal, por fuera cuerpo de metal con recubriento en el medio de acr&iacute;lico trasl&uacute;cido de color (ver colores disponibles), asa y tapa de pl&aacute;stico negro.</p>\r\n\r\n<p><strong>Capacidad:</strong><br />\r\n450 ml. (Aprox.)</p>\r\n\r\n<p><strong>Colores:</strong><br />\r\nAzul y rojo.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en bolsa pl&aacute;stica dentro de una caja de cart&oacute;n color blanco.</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nInterior de metal, por fuera cuerpo de metal con recubriento en el medio de acr&iacute;lico trasl&uacute;cido de color (ver colores disponibles), asa y tapa de pl&aacute;stico negro.</p>\r\n', 'Mug de Acero', 0, 'mug-de-acero', 2, '0.00', '0.00', 2, NULL, 0, NULL, 'Mug de Acero', 'Mug de Acero', 'Mug de Acero', 0, 1, 31, '2018-01-31 14:19:23', '2018-01-31 20:19:23'),
(129, 'Mug Térmico', '<p><strong>Medidas:&nbsp;</strong><br />\r\nAlto: 18.5 cm. Di&aacute;metro: 8 cm.</p>\r\n\r\n<p><strong>Capacidad:</strong><br />\r\n450 ml.<br />\r\n<br />\r\n<strong>Descripci&oacute;n:</strong><br />\r\nJarro de interior de pl&aacute;stico color negro, por fuera cuerpo, tapa y asa de pl&aacute;stico color negro con aplicaciones de metal plateado.<br />\r\n<br />\r\n<strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en bolsa de pl&aacute;stico transparente dentro de una caja de cart&oacute;n color blanco.</p>\r\n', 'Mug Térmico', 0, 'mug-termico', 3, '0.00', '0.00', 2, NULL, 0, NULL, 'Mug Térmico', 'Mug Térmico', 'Mug Térmico', 0, 1, 31, '2018-01-31 14:20:59', '2018-01-31 20:20:59'),
(130, 'Taza Head Eléctrica', '<p><strong>Medidas:&nbsp;</strong><br />\r\n16 x 8 cm. (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nJarro met&aacute;lico de 450 ml. (Aprox.) Con tapa de pl&aacute;stico con ret&eacute;n para evitar p&eacute;rdidas y cable de conexi&oacute;n USB, con adaptador para auto, para mantener el calor.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en caja de cart&oacute;n blanca.</p>\r\n', 'Taza Head Eléctrica', 0, 'taza-head-electrica', 4, '0.00', '0.00', 2, NULL, 0, NULL, 'Taza Head Eléctrica', 'Taza Head Eléctrica', 'Taza Head Eléctrica', 0, 1, 31, '2018-01-31 14:22:19', '2018-01-31 20:22:19'),
(131, 'Taza Térmica', '<p><strong>Medidas:&nbsp;</strong>Alto:<br />\r\n17 cm. Di&aacute;metro: 8 cm. (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nJarro totalmente pl&aacute;stico, por fuera cuerpo de colores trasl&uacute;cidos, el borde del jarro, el mango (asa) y la base son de pl&aacute;stico color negro.</p>\r\n\r\n<p><strong>Capacidad:</strong><br />\r\n450 ml. (Aprox.)<br />\r\n<br />\r\n<strong>Colores:</strong><br />\r\nAnaranjado, verde, rojo y azul.<br />\r\n<br />\r\n<strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en bolsa de pl&aacute;stico transparente dentro de una caja de cart&oacute;n color blanco.</p>\r\n', 'Taza Térmica', 0, 'taza-termica', 5, '0.00', '0.00', 2, NULL, 0, NULL, 'Taza Térmica', 'Taza Térmica', 'Taza Térmica', 0, 1, 31, '2018-01-31 14:26:26', '2018-01-31 20:26:26'),
(132, 'Tomatodo Flexible', '<p><strong>Medidas:&nbsp;</strong>Altura:<br />\r\n28.8 cm. Ancho: 12.4 cm. (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nTotalmente polietileno con llavero arnes, para agua fr&iacute;a.</p>\r\n\r\n<p><strong>Capacidad:</strong><br />\r\n500 ml. (Aprox.)</p>\r\n', 'Tomatodo Flexible', 0, 'tomatodo-flexible', 1, '0.00', '0.00', 2, NULL, 0, NULL, 'Tomatodo Flexible', 'Tomatodo Flexible', 'Tomatodo Flexible', 0, 1, 35, '2018-01-31 14:33:06', '2018-01-31 20:33:06'),
(133, 'Tomatodo Ergonómico', '<p><strong>Medidas:&nbsp;</strong><br />\r\nAltura: 26.5 cm. Di&aacute;metro: 7.5 cm. (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nTomatodo totalmente pl&aacute;stico PVC&nbsp;de acabado trasl&uacute;cido&nbsp;y cuerpo ergon&oacute;mico.</p>\r\n\r\n<p><strong>Capacidad:</strong><br />\r\n750 ml. (Aprox.)</p>\r\n\r\n<p><strong>Colores:</strong><br />\r\nAzul, rojo, anaranjado, verde, amarillo, morado, verde lim&oacute;n, gris, turquesa, negro y blanco.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en bolsa de pl&aacute;stico transparente.</p>\r\n', 'Tomatodo Ergonómico', 0, 'tomatodo-ergonomico', 2, '0.00', '0.00', 2, NULL, 0, NULL, 'Tomatodo Ergonómico', 'Tomatodo Ergonómico', 'Tomatodo Ergonómico', 0, 1, 35, '2018-01-31 14:38:59', '2018-01-31 20:38:59'),
(134, 'Tomatodo Plástico', '<p><strong>Medidas:&nbsp;</strong><br />\r\nAltura: 23.5 cm. Diametro: 7 (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nTomatodo pl&aacute;stico de cuerpo de color s&oacute;lido y trasl&uacute;cido, con tapa de color s&oacute;lido. Para agua fr&iacute;a.</p>\r\n\r\n<p><strong>Capacidad:</strong><br />\r\n450 ml. (Aprox.)</p>\r\n\r\n<p><strong>Colores:</strong><br />\r\nRojo, Azul, Verde, Verde Lim&oacute;n, Negro, Blanco, Turquesa y Naranja.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en bolsa de pl&aacute;stico transparente.</p>\r\n', 'Tomatodo Plástico', 0, 'tomatodo-plastico', 3, '0.00', '0.00', 2, NULL, 0, NULL, 'Tomatodo Plástico', 'Tomatodo Plástico', 'Tomatodo Plástico', 0, 1, 35, '2018-01-31 14:40:50', '2018-01-31 20:40:50'),
(135, 'Tomatodo Tapa Chupón', '<p><strong>Medidas:&nbsp;</strong><br />\r\nAltura: 24.3 cm. Ancho: 7.1 cm. (Aprox.)</p>\r\n\r\n<p><strong>Capacidad:</strong><br />\r\n750 ml. (Aprox.)</p>\r\n\r\n<p><strong>Colores:</strong><br />\r\nNegro, azul y rojo.</p>\r\n\r\n<p><strong>Material:</strong><br />\r\nTotalmente pl&aacute;stico, para agua fr&iacute;a.</p>\r\n', 'Tomatodo Tapa Chupón', 0, 'tomatodo-tapa-chupon', 4, '0.00', '0.00', 2, NULL, 0, NULL, 'Tomatodo Tapa Chupón', 'Tomatodo Tapa Chupón', 'Tomatodo Tapa Chupón', 0, 1, 35, '2018-01-31 14:42:30', '2018-01-31 20:42:30'),
(136, 'Tomatodo con Agarradera', '<p><strong>Medidas:&nbsp;</strong><br />\r\nAltura (Incluida el asa): 25.5 cm. Di&aacute;metro: 7.5 cm. (Aprox.)</p>\r\n\r\n<p><strong>Material:</strong><br />\r\nPl&aacute;stico AS, para agua fr&iacute;a.</p>\r\n\r\n<p><strong>Capacidad:</strong><br />\r\n800 ml. (Aprox.)</p>\r\n\r\n<p><strong>Colores:</strong>&nbsp;<br />\r\nAzul, rojo, negro, verde y anaranjado.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en bolsita pl&aacute;stica transparente.</p>\r\n', 'Tomatodo con Agarradera', 0, 'tomatodo-con-agarradera', 5, '0.00', '0.00', 2, NULL, 0, NULL, 'Tomatodo con Agarradera', 'Tomatodo con Agarradera', 'Tomatodo con Agarradera', 0, 1, 35, '2018-01-31 14:44:03', '2018-01-31 20:44:03'),
(137, 'Tomatodo Plástico', '<p><strong>Medidas:&nbsp;</strong><br />\r\nAlto: 26 cm. Di&aacute;metro: 7 cm. (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nTomatodo totalmente pl&aacute;stico PVC de acabado trasl&uacute;cido.</p>\r\n\r\n<p><strong>Colores:</strong> azul, rojo, anaranjado, verde, negro y blanco.</p>\r\n\r\n<p><strong>Capacidad:</strong> 700 ml.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del Producto:</strong><br />\r\nIndividual en bolsa de pl&aacute;stico transparente.</p>\r\n', 'Tomatodo Plástico', 0, 'tomatodo-plastico', 6, '0.00', '0.00', 2, NULL, 0, NULL, 'Tomatodo Plástico', 'Tomatodo Plástico', 'Tomatodo Plástico', 0, 1, 35, '2018-01-31 14:48:14', '2018-01-31 20:48:14'),
(138, 'Audífonos Redondos', '<p>Aud&iacute;fonos Redondos</p>\r\n', 'Audífonos Redondos', 0, 'audifonos-redondos', 1, '0.00', '0.00', 2, NULL, 0, NULL, 'Audífonos Redondos', 'Audífonos Redondos', 'Audífonos Redondos', 0, 1, 34, '2018-01-31 14:51:42', '2018-01-31 20:51:42'),
(139, 'Bolígrafo Laser', '<p><strong>Medidas:&nbsp;</strong><br />\r\nEstuche: Largo 18cm, Ancho: 3.50 cm / Lapicero: Largo 14.50 cm. Aprox. Diametro: 0.98 cm. Aprox.</p>\r\n\r\n<p><strong>Color de lapicero:</strong><br />\r\nPlateado.<br />\r\n<br />\r\n<strong>Color de estuche de metal:</strong><br />\r\nPlateado.</p>\r\n\r\n<p><strong>Funciones:</strong><br />\r\nPuntero luz roja (Bot&oacute;n)<br />\r\nPunta palm (Punta pl&aacute;stica que sale girando al lado contrario de la salida del lapicero)<br />\r\nLapicero tinta color negro</p>\r\n\r\n<p><strong>Descripci&oacute;n del producto:</strong><br />\r\nLapicero met&aacute;lico de sistema giratorio, con 3 funciones, viene con estuche de metal y 3 pilas de repuesto.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del Producto:</strong><br />\r\nIndividual, en caja de cart&oacute;n plastificado color plomo.</p>\r\n', 'Bolígrafo Laser', 0, 'boligrafo-laser', 2, '0.00', '0.00', 2, NULL, 0, NULL, 'Bolígrafo Laser', 'Bolígrafo Laser', 'Bolígrafo Laser', 0, 1, 34, '2018-01-31 14:54:42', '2018-01-31 20:54:42'),
(140, 'Estuche de Plástico', '<p><strong>Medidas:&nbsp;</strong><br />\r\n4.4 x 2 cm. Largo: 9.4 cm. Espesor: 2 cm. (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nEstuche pl&aacute;stico transparente. (solo para USB&acute;s del c&oacute;digo UD-511)</p>\r\n\r\n<p><strong>Color:</strong><br />\r\nBlanco transparente.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en bolsita pl&aacute;stica transparente.</p>\r\n', 'Estuche de Plástico', 7278, 'estuche-de-plastico', 3, '0.00', '0.00', 2, NULL, 0, NULL, 'Estuche de Plástico', 'Estuche de Plástico', 'Estuche de Plástico', 0, 1, 34, '2018-01-31 14:57:04', '2018-01-31 20:57:04'),
(141, 'Memoria USB 8GB', '<p><strong>Medidas:&nbsp;</strong><br />\r\nAltura: 6.5 cm. Ancho: 2 cm. (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nMemoria USB de 8GB.</p>\r\n\r\n<p><strong>Material:</strong><br />\r\nCart&oacute;n.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en bolsita pl&aacute;stica transparente.</p>\r\n', 'Memoria USB 8GB', 0, 'memoria-usb-8gb', 4, '0.00', '0.00', 2, NULL, 0, NULL, 'Memoria USB 8GB', 'Memoria USB 8GB', 'Memoria USB 8GB', 0, 1, 34, '2018-01-31 14:58:23', '2018-01-31 20:58:23'),
(142, 'USB Llavero SimilL Cuero', '<p><strong>Medidas:&nbsp;</strong><br />\r\n(Estuche) Largo: 11.5 cm. / USB: 8.5 x 3.1 cm.</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nMemoria de 8GB en estuche de cuero, con elegante sujetador de metal para llevarlo colgado.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en caja met&aacute;lica&nbsp;con eva troquelada color negro.</p>\r\n', 'USB Llavero SimilL Cuero', 0, 'usb-llavero-simill-cuero', 5, '0.00', '0.00', 2, NULL, 0, NULL, 'USB Llavero SimilL Cuero', 'USB Llavero SimilL Cuero', 'USB Llavero SimilL Cuero', 0, 1, 34, '2018-01-31 15:01:07', '2018-01-31 21:01:07'),
(143, 'Power Bank Cuadrado', '<p>Power Bank Cuadrado</p>\r\n', 'Power Bank Cuadrado', 0, 'power-bank-cuadrado', 6, '0.00', '0.00', 2, NULL, 0, NULL, 'Power Bank Cuadrado', 'Power Bank Cuadrado', 'Power Bank Cuadrado', 0, 1, 34, '2018-01-31 15:02:52', '2018-01-31 21:02:52'),
(144, 'USB Cuero', '<p>USB Cuero</p>\r\n', 'USB Cuero', 0, 'usb-cuero', 7, '0.00', '0.00', 2, NULL, 0, NULL, 'USB Cuero', 'USB Cuero', 'USB Cuero', 0, 1, 34, '2018-01-31 15:05:19', '2018-01-31 21:05:19'),
(145, 'USB Llave con Estuche', '<p><strong>Medidas:&nbsp;</strong><br />\r\n(Estuche) Largo: 9 cm. - 4.5 x 2 cm. / Llave: 5.5 x 2.5 cm.</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nMemoria USB met&aacute;lico de 4GB de capacidad, en forma de llave&nbsp;con estuche pl&aacute;stico blanco trasl&uacute;cido y eva troquelada color blanco.</p>\r\n\r\n<p><strong>Colores:</strong><br />\r\nAzul, rojo, negro,&nbsp;blanco y plateado.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, el estuche con el USB viene&nbsp;en bolsita pl&aacute;stica transparente.</p>\r\n', 'USB Llave con Estuche', 0, 'usb-llave-con-estuche', 8, '0.00', '0.00', 2, NULL, 0, NULL, 'USB Llave con Estuche', 'USB Llave con Estuche', 'USB Llave con Estuche', 0, 1, 34, '2018-01-31 15:07:20', '2018-01-31 21:07:20'),
(146, 'USB Madera', '<p><strong>Medidas:&nbsp;</strong><br />\r\nAltura: 6.3 cm. Ancho: 2.8 cm. Esp.: 1 cm. (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nMemoria USB llavero de 8GB.</p>\r\n\r\n<p><strong>Material:</strong><br />\r\nMadera.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en bolsita pl&aacute;stica transparente.</p>\r\n', 'USB Madera', 0, 'usb-madera', 9, '0.00', '0.00', 2, NULL, 0, NULL, 'USB Madera', 'USB Madera', 'USB Madera', 0, 1, 34, '2018-01-31 15:09:45', '2018-01-31 21:09:45'),
(147, 'Taza Mágica', '<p>Taza M&aacute;gica</p>\r\n', 'Taza Mágica', 0, 'taza-magica', 1, '0.00', '0.00', 2, NULL, 0, NULL, 'Taza Mágica', 'Taza Mágica', 'Taza Mágica', 0, 1, 33, '2018-01-31 15:15:32', '2018-01-31 21:15:32'),
(148, 'Taza Acero para Camping', '<p>Taza Acero para Camping</p>\r\n', 'Taza Acero para Camping', 0, 'taza-acero-para-camping', 2, '0.00', '0.00', 2, NULL, 0, NULL, 'Taza Acero para Camping', 'Taza Acero para Camping', 'Taza Acero para Camping', 0, 1, 33, '2018-01-31 15:16:28', '2018-01-31 21:16:28'),
(149, 'Taza Bicolor', '<p>Taza Bicolor</p>\r\n', 'Taza Bicolor', 0, 'taza-bicolor', 3, '0.00', '0.00', 2, NULL, 0, NULL, 'Taza Bicolor', 'Taza Bicolor', 'Taza Bicolor', 0, 1, 33, '2018-01-31 15:17:27', '2018-01-31 21:17:27'),
(150, 'Taza con Cucharita', '<p>Taza con Cucharita</p>\r\n', 'Taza con Cucharita', 0, 'taza-con-cucharita', 4, '0.00', '0.00', 2, NULL, 0, NULL, 'Taza con Cucharita', 'Taza con Cucharita', 'Taza con Cucharita', 0, 1, 33, '2018-01-31 15:18:28', '2018-01-31 21:18:28'),
(151, 'Taza con Cuadro Blanco', '<p>Taza con Cuadro Blanco</p>\r\n', 'Taza con Cuadro Blanco', 0, 'taza-con-cuadro-blanco', 5, '0.00', '0.00', 2, NULL, 0, NULL, 'Taza con Cuadro Blanco', 'Taza con Cuadro Blanco', 'Taza con Cuadro Blanco', 0, 1, 33, '2018-01-31 15:19:42', '2018-01-31 21:19:42'),
(152, 'Taza Cónica Sublimada', '<p>Taza C&oacute;nica Sublimada</p>\r\n', 'Taza Cónica Sublimada', 0, 'taza-conica-sublimada', 6, '0.00', '0.00', 2, NULL, 0, NULL, 'Taza Cónica Sublimada', 'Taza Cónica Sublimada', 'Taza Cónica Sublimada', 0, 1, 33, '2018-01-31 15:21:00', '2018-01-31 21:21:00'),
(153, 'Taza Dorada', '<p>Taza Dorada</p>\r\n', 'Taza Dorada', 0, 'taza-dorada', 7, '0.00', '0.00', 2, NULL, 0, NULL, 'Taza Dorada', 'Taza Dorada', 'Taza Dorada', 0, 1, 33, '2018-01-31 15:22:06', '2018-01-31 21:22:06'),
(154, 'Taza con Mensaje', '<p>Taza con Mensaje</p>\r\n', 'Taza con Mensaje', 0, 'taza-con-mensaje', 8, '0.00', '0.00', 2, NULL, 0, NULL, 'Taza con Mensaje', 'Taza con Mensaje', 'Taza con Mensaje', 0, 1, 33, '2018-01-31 15:23:37', '2018-01-31 21:23:37'),
(155, 'Termo para Sublimacion', '<p>Termo para Sublimacion</p>\r\n', 'Termo para Sublimacion', 0, 'termo-para-sublimacion', 9, '0.00', '0.00', 2, NULL, 0, NULL, 'Termo para Sublimacion', 'Termo para Sublimacion', 'Termo para Sublimacion', 0, 1, 33, '2018-01-31 15:25:04', '2018-01-31 21:25:04'),
(156, 'Tomatodo para Sublimacion', '<p>Tomatodo para Sublimacion</p>\r\n', 'Tomatodo para Sublimacion', 0, 'tomatodo-para-sublimacion', 10, '0.00', '0.00', 2, NULL, 0, NULL, 'Tomatodo para Sublimacion', 'Tomatodo para Sublimacion', 'Tomatodo para Sublimacion', 0, 1, 33, '2018-01-31 15:26:21', '2018-01-31 21:26:21'),
(157, 'Vaso Plástico Pastillero', '<p>Vaso Pl&aacute;stico Pastillero</p>\r\n', 'Vaso Plástico Pastillero', 0, 'vaso-plastico-pastillero', 11, '0.00', '0.00', 2, NULL, 0, NULL, 'Vaso Plástico Pastillero', 'Vaso Plástico Pastillero', 'Vaso Plástico Pastillero', 0, 1, 33, '2018-01-31 15:28:02', '2018-01-31 21:28:02'),
(158, 'Vaso Cerámico', '<p><strong>Medidas:&nbsp;</strong><br />\r\nAlto: 14,7cm Di&aacute;metro: 9,5cm (Aprox.)</p>\r\n\r\n<p><em><strong>Descripci&oacute;n:</strong></em><br />\r\nMug Cer&aacute;mico con accesorios de silicona para llevar l&iacute;quidos de altas temperaturas sin sufrir quemaduras.</p>\r\n\r\n<p><strong>Capacidad:</strong><br />\r\n400ml</p>\r\n\r\n<p><strong>Colores de silicona disponibles:</strong><br />\r\nAzul, Rojo, Verde, Blanco, Negro, Naranja, Rosado, Verde lim&oacute;n, Gris</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\n1pc&nbsp;en caja blanca de cart&oacute;n.</p>\r\n', 'Vaso Cerámico', 0, 'vaso-ceramico', 12, '0.00', '0.00', 2, NULL, 0, NULL, 'Vaso Cerámico', 'Vaso Cerámico', 'Vaso Cerámico', 0, 1, 33, '2018-01-31 15:30:19', '2018-01-31 21:30:19'),
(159, 'Resaltador Chisguete', '<p><strong>Medidas:&nbsp;</strong><br />\r\nLargo: 13.5 cm. (Aprox.) Di&aacute;metro: 2 cm. (Aprox.)</p>\r\n\r\n<p><strong>Color de resaltador:</strong><br />\r\nAmarillo.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en bolsita pl&aacute;stica transparente.</p>\r\n', 'Resaltador Chisguete', 0, 'resaltador-chisguete', 1, '0.00', '0.00', 2, NULL, 0, NULL, 'Resaltador Chisguete', 'Resaltador Chisguete', 'Resaltador Chisguete', 0, 1, 32, '2018-01-31 15:38:54', '2018-01-31 21:38:54'),
(160, 'Resaltador Pirámide', '<p><strong>Medidas:&nbsp;</strong><br />\r\n7.8 x 8.6 cm. (Aprox.)</p>\r\n', 'Resaltador Pirámide', 0, 'resaltador-piramide', 2, '0.00', '0.00', 2, NULL, 0, NULL, 'Resaltador Pirámide', 'Resaltador Pirámide', 'Resaltador Pirámide', 0, 1, 32, '2018-01-31 15:40:03', '2018-01-31 21:40:03'),
(161, 'Resaltador con Touch', '<p><strong>Medidas:&nbsp;</strong><br />\r\n5 x 2 cm. Estuche: Largo 8.5 cm.</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nEstuche pl&aacute;stico transparente, con 3 crayolas&nbsp;de color: amarillo, verde y rosado; y en el otro extremo del resaltador llevan una punta touch color negro para pantallas t&aacute;ctiles.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en bolsita pl&aacute;stica transparente.</p>\r\n', 'Resaltador con Touch', 0, 'resaltador-con-touch', 3, '0.00', '0.00', 2, NULL, 0, NULL, 'Resaltador con Touch', 'Resaltador con Touch', 'Resaltador con Touch', 0, 1, 32, '2018-01-31 15:41:53', '2018-01-31 21:41:53'),
(162, 'Resaltador Corazón', '<p>Resaltador Coraz&oacute;n</p>\r\n', 'Resaltador Corazón', 0, 'resaltador-corazon', 4, '0.00', '0.00', 2, NULL, 0, NULL, 'Resaltador Corazón', 'Resaltador Corazón', 'Resaltador Corazón', 0, 1, 32, '2018-01-31 15:43:16', '2018-01-31 21:43:16'),
(163, 'Resaltador 3 Colores con Lapicero', '<p><strong>Medidas:&nbsp;</strong><br />\r\n15.5 x 2 cm aprox.</p>\r\n', 'Resaltador 3 Colores con Lapicero', 0, 'resaltador-3-colores-con-lapicero', 5, '0.00', '0.00', 2, NULL, 0, NULL, 'Resaltador 3 Colores con Lapicero', 'Resaltador 3 Colores con Lapicero', 'Resaltador 3 Colores con Lapicero', 0, 1, 32, '2018-01-31 15:44:31', '2018-01-31 21:44:31'),
(164, 'Resaltador Tipo Crayola', '<p>Resaltador Tipo Crayola</p>\r\n', 'Resaltador Tipo Crayola', 0, 'resaltador-tipo-crayola', 6, '0.00', '0.00', 2, NULL, 0, NULL, 'Resaltador Tipo Crayola', 'Resaltador Tipo Crayola', 'Resaltador Tipo Crayola', 0, 1, 32, '2018-01-31 15:49:34', '2018-01-31 21:49:34'),
(165, 'Resaltador Líquido', '<p><strong>Medidas:&nbsp;</strong><br />\r\nSoporte: Ancho 14,6cm Alto 3cm - Resaltadores: Alto: 8cm Di&aacute;metro: 1,6cm (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nSoporte Blanco que contiene resaltadores de colores&nbsp;Azul, Verde, Amarillo y&nbsp;Fucsia.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nBolsita pl&aacute;stica transparente.</p>\r\n', 'Resaltador Líquido', 0, 'resaltador-liquido', 7, '0.00', '0.00', 2, NULL, 0, NULL, 'Resaltador Líquido', 'Resaltador Líquido', 'Resaltador Líquido', 0, 1, 32, '2018-01-31 15:50:45', '2018-01-31 21:50:45'),
(166, 'Resaltador Iphone', '<p><strong>Medidas:&nbsp;</strong><br />\r\nAlto: 11,7cm Ancho: 6,1cm (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nEstuche en forma de Celular Iphone que contiene resaltadores de colores Azul, Verde, Amarillo, Naranja y&nbsp;Fucsia</p>\r\n\r\n<p><strong>Colores del estuche Iphone: </strong><br />\r\nAzul, Rojo, Blanco, Negro.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nBolsita pl&aacute;stica transparente.</p>\r\n', 'Resaltador Iphone', 0, 'resaltador-iphone', 8, '0.00', '0.00', 2, NULL, 0, NULL, 'Resaltador Iphone', 'Resaltador Iphone', 'Resaltador Iphone', 0, 1, 32, '2018-01-31 15:55:44', '2018-01-31 21:55:44'),
(167, 'Set. Resaltador de 5 pzas.', '<p><strong>Medidas:&nbsp;</strong><br />\r\n8.7 x 8.7 x 2.4 cm aprox.</p>\r\n', 'Set. Resaltador de 5 pzas.', 0, 'set-resaltador-de-5-pzas', 9, '0.00', '0.00', 2, NULL, 0, NULL, 'Set. Resaltador de 5 pzas.', 'Set. Resaltador de 5 pzas.', 'Set. Resaltador de 5 pzas.', 0, 1, 32, '2018-01-31 15:57:55', '2018-01-31 21:57:55'),
(168, 'Resaltador Estrella', '<p><strong>Medidas:&nbsp;</strong><br />\r\n9.7 x 9.7 cm. Esp.: 1.4 cm. (Aprox.)</p>\r\n', 'Resaltador Estrella', 0, 'resaltador-estrella', 10, '0.00', '0.00', 2, NULL, 0, NULL, 'Resaltador Estrella', 'Resaltador Estrella', 'Resaltador Estrella', 0, 1, 32, '2018-01-31 15:59:16', '2018-01-31 21:59:16'),
(169, 'Resaltador', '<p><strong>Medidas:&nbsp;</strong><br />\r\nEstuche: 7.8 x 12.5 cm. Resaltador: 5.5 x 1 cm.</p>\r\n', 'Resaltador', 0, 'resaltador', 11, '0.00', '0.00', 2, NULL, 0, NULL, 'Resaltador', 'Resaltador', 'Resaltador', 0, 1, 32, '2018-01-31 16:00:48', '2018-01-31 22:00:48'),
(170, 'Resaltador Mano', '<p><strong>Medidas:&nbsp;</strong><br />\r\nLargo: 9 cm. Ancho: 7 cm. (Aprox.)</p>\r\n', 'Resaltador Mano', 0, 'resaltador-mano', 12, '0.00', '0.00', 2, NULL, 0, NULL, 'Resaltador Mano', 'Resaltador Mano', 'Resaltador Mano', 0, 1, 32, '2018-01-31 16:01:55', '2018-01-31 22:01:55'),
(171, 'Resaltador Tipo Crayola', '<p><strong>Medidas:&nbsp;</strong><br />\r\nBase: Ancho: 6 cm. C/ lado. Alto: 3 cm. - Base con crayola: 5.5 x 6 cm.</p>\r\n\r\n<p><strong>Colores de crayola:</strong><br />\r\nFucsia,&nbsp;amarillo y verde.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en bolsita pl&aacute;stica transparente.</p>\r\n', 'Resaltador Tipo Crayola', 0, 'resaltador-tipo-crayola', 13, '0.00', '0.00', 2, NULL, 0, NULL, 'Resaltador Tipo Crayola', 'Resaltador Tipo Crayola', 'Resaltador Tipo Crayola', 0, 1, 32, '2018-01-31 16:05:57', '2018-01-31 22:05:57'),
(172, 'Resaltador Limpiador Teclado', '<p><strong>Medidas:&nbsp;</strong><br />\r\n11 x 10 cm.</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nForma de mu&ntilde;eco, contiene un limpiador de teclado, resaltadores de colores en brazitos (fucsia y amarillo) en piernitas (azul y verde).<br />\r\nCuerpo totalmente en color blanco.</p>\r\n\r\n<p><strong>Presentacion del producto:</strong><br />\r\nIndividual, en bolsita de pl&aacute;stico transparente.</p>\r\n', 'Resaltador Limpiador Teclado', 0, 'resaltador-limpiador-teclado', 14, '0.00', '0.00', 2, NULL, 0, NULL, 'Resaltador Limpiador Teclado', 'Resaltador Limpiador Teclado', 'Resaltador Limpiador Teclado', 0, 1, 32, '2018-01-31 16:08:47', '2018-01-31 22:08:47'),
(173, 'Resaltador con Lapicero', '<p><strong>Medidas:&nbsp;</strong><br />\r\nLargo: 15 cm. (Aprox.) Di&aacute;metro: 1.5 cm. (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nResaltador tipo crayola, con salida de sistema giratorio, a un extremo del cuerpo&nbsp;y lapicero con tapa al otro extremo.</p>\r\n\r\n<p><strong>Color de resaltador:</strong><br />\r\nAmarillo.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en bolsita pl&aacute;stica transparente.</p>\r\n', 'Resaltador con Lapicero', 0, 'resaltador-con-lapicero', 15, '0.00', '0.00', 2, NULL, 0, NULL, 'Resaltador con Lapicero', 'Resaltador con Lapicero', 'Resaltador con Lapicero', 0, 1, 32, '2018-01-31 16:10:12', '2018-01-31 22:10:12'),
(174, 'Resaltador Tipo Crayola', '<p><strong>Medidas:&nbsp;</strong><br />\r\n8.4 x 4.6 cm. (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nEstuche transparente, contiene 3 crayolas&nbsp;color amarillo, verde y fucsia.</p>\r\n', 'Resaltador Tipo Crayola', 0, 'resaltador-tipo-crayola', 16, '0.00', '0.00', 2, NULL, 0, NULL, 'Resaltador Tipo Crayola', 'Resaltador Tipo Crayola', 'Resaltador Tipo Crayola', 0, 1, 32, '2018-01-31 16:11:34', '2018-01-31 22:11:34'),
(175, 'Resaltador en Pote', '<p><strong>Medidas:&nbsp;</strong><br />\r\nPote: 8 x 5.5 cm (Aprox.) Largo: 7.3 cm. (Aprox.)</p>\r\n', 'Resaltador en Pote', 0, 'resaltador-en-pote', 17, '0.00', '0.00', 2, NULL, 0, NULL, 'Resaltador en Pote', 'Resaltador en Pote', 'Resaltador en Pote', 0, 1, 32, '2018-01-31 16:12:48', '2018-01-31 22:12:48'),
(176, 'Resaltador Flor', '<p><strong>Medidas:&nbsp;</strong><br />\r\n11 x 11 cm.</p>\r\n', 'Resaltador Flor', 0, 'resaltador-flor', 18, '0.00', '0.00', 2, NULL, 0, NULL, 'Resaltador Flor', 'Resaltador Flor', 'Resaltador Flor', 0, 1, 32, '2018-01-31 16:14:10', '2018-01-31 22:14:10'),
(177, 'Resaltador Gota', '<p><strong>Medidas:&nbsp;</strong><br />\r\n6 x 5.5 x 1.4 cm aprox.</p>\r\n', 'Resaltador Gota', 0, 'resaltador-gota', 19, '0.00', '0.00', 2, NULL, 0, NULL, 'Resaltador Gota', 'Resaltador Gota', 'Resaltador Gota', 0, 1, 32, '2018-01-31 16:15:47', '2018-01-31 22:15:47'),
(178, 'Resaltador Jeringa', '<p><strong>Medidas:&nbsp;</strong><br />\r\nLargo: 13.5 cm. (Aprox.) Di&aacute;metro: 1.5 cm. (Aprox.)</p>\r\n\r\n<p><strong>Colores de resaltador:</strong><br />\r\nAmarillo, verde, rosado y azul.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nIndividual, en bolsita pl&aacute;stica transparente.</p>\r\n', 'Resaltador Jeringa', 0, 'resaltador-jeringa', 20, '0.00', '0.00', 2, NULL, 0, NULL, 'Resaltador Jeringa', 'Resaltador Jeringa', 'Resaltador Jeringa', 0, 1, 32, '2018-01-31 16:17:06', '2018-01-31 22:17:06'),
(179, 'Resaltador Muñeco', '<p><strong>Medidas:&nbsp;</strong><br />\r\n9.2 x 7.2 cm. Esp.: 1.6 cm. (Aprox.)</p>\r\n', 'Resaltador Muñeco', 0, 'resaltador-muneco', 21, '0.00', '0.00', 2, NULL, 0, NULL, 'Resaltador Muñeco', 'Resaltador Muñeco', 'Resaltador Muñeco', 0, 1, 32, '2018-01-31 16:18:33', '2018-01-31 22:18:33'),
(180, 'Resaltador Tipo Crayola', '<p><strong>Medidas:&nbsp;</strong><br />\r\n10.3 x 5 cm. (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nEstuche color blanco s&oacute;lido, contiene 3 crayolas color amarillo, verde y fucsia.</p>\r\n', 'Resaltador Tipo Crayola', 0, 'resaltador-tipo-crayola', 23, '0.00', '0.00', 2, NULL, 0, NULL, 'Resaltador Tipo Crayola', 'Resaltador Tipo Crayola', 'Resaltador Tipo Crayola', 0, 1, 32, '2018-01-31 16:20:01', '2018-01-31 22:20:01'),
(181, 'Resaltador Triangular', '<p><strong>Medidas:&nbsp;</strong><br />\r\n8 x 8 cm. Esp.: 1.3 cm. (Aprox.)</p>\r\n', 'Resaltador Triangular', 0, 'resaltador-triangular', 22, '0.00', '0.00', 2, NULL, 0, NULL, 'Resaltador Triangular', 'Resaltador Triangular', 'Resaltador Triangular', 0, 1, 32, '2018-01-31 16:21:17', '2018-01-31 22:21:17'),
(182, 'Resaltador 5 Puntas', '<p><strong>Medidas:&nbsp;</strong><br />\r\n10.5 x 8.5 cm. Esp.: 1.3 cm. (Aprox.)</p>\r\n', 'Resaltador 5 Puntas', 0, 'resaltador-5-puntas', 24, '0.00', '0.00', 2, NULL, 0, NULL, 'Resaltador 5 Puntas', 'Resaltador 5 Puntas', 'Resaltador 5 Puntas', 0, 1, 32, '2018-01-31 16:22:39', '2018-01-31 22:22:39'),
(183, 'Resaltador', '<p><strong>Medidas:&nbsp;</strong><br />\r\nAlto: 8,6cm Ancho: 8,6cm (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nEstuche transparente que contiene 4 resaltadores Azul, Verde, Amarillo y Fucsia</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nBolsita pl&aacute;stica transparente.</p>\r\n', 'Resaltador', 0, 'resaltador', 25, '0.00', '0.00', 2, NULL, 0, NULL, 'Resaltador', 'Resaltador', 'Resaltador', 0, 1, 32, '2018-01-31 16:30:06', '2018-01-31 22:30:27'),
(184, 'Resaltador', '<p><strong>Medidas:&nbsp;</strong><br />\r\nAlto: 1,4cm Di&aacute;metro: 7cm (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nResaltador en forma de c&iacute;rculo</p>\r\n\r\n<p><strong>Colores:</strong><br />\r\nBlanco</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nBolsita pl&aacute;stica transparente.</p>\r\n', 'Resaltador', 0, 'resaltador', 26, '0.00', '0.00', 2, NULL, 0, NULL, 'Resaltador', 'Resaltador', 'Resaltador', 0, 1, 32, '2018-01-31 16:32:26', '2018-01-31 22:32:26'),
(185, 'Resaltador Foco', '<p><strong>Medidas:&nbsp;</strong><br />\r\nAlto: 7,5cm Ancho: 4,5cm (Aprox.)</p>\r\n\r\n<p><strong>Descripci&oacute;n:</strong><br />\r\nResaltador en forma de foco</p>\r\n\r\n<p><strong>Colores:</strong><br />\r\nAzul, Verde, Rosado, Amarillo, Naranja.</p>\r\n\r\n<p><strong>Presentaci&oacute;n del producto:</strong><br />\r\nBolsita pl&aacute;stica transparente.</p>\r\n', 'Resaltador Foco', 0, 'resaltador-foco', 27, '0.00', '0.00', 2, NULL, 0, NULL, 'Resaltador Foco', 'Resaltador Foco', 'Resaltador Foco', 0, 1, 32, '2018-01-31 16:38:42', '2018-01-31 22:38:42'),
(186, 'Resaltador', '<p><strong>Medidas:&nbsp;</strong><br />\r\nAlto: 1.7cm Ancho:15.9cm</p>\r\n\r\n<p><strong>Colores: </strong><br />\r\nFucsia - Anaranjado - Amarillo - Verde - Turquesa</p>\r\n', 'Resaltador', 0, 'resaltador', 28, '0.00', '0.00', 2, NULL, 0, NULL, 'Resaltador', 'Resaltador', 'Resaltador', 0, 1, 32, '2018-01-31 16:40:31', '2018-01-31 22:40:31'),
(187, 'Camisero Altavisivilidad', '<p>Algod&oacute;n &nbsp;20/1 &nbsp;color amarillo fosforescente, cuello y pu&ntilde;os &nbsp;tejido color &nbsp;azul marino</p>\r\n\r\n<p>cintas reflectivas 3M, pechera lleva 3 botones.</p>\r\n', 'Polo', 123, 'camisero-altavisivilidad', 1, '0.00', '0.00', 2, NULL, 1, NULL, 'Camisero Altavisivilidad', 'Camisero Altavisivilidad', 'Camisero Altavisivilidad', 0, 1, 14, '2018-02-13 11:56:56', '2018-02-14 16:12:37'),
(188, 'Camisero con Pie de Cuello', '<p>Camisero con Pie de Cuello</p>\r\n', 'Camisero con Pie de Cuello', 0, 'camisero-con-pie-de-cuello', 2, '0.00', '0.00', 2, NULL, 1, NULL, 'Camisero con Pie de Cuello', 'Camisero con Pie de Cuello', 'Camisero con Pie de Cuello', 0, 1, 14, '2018-02-13 11:58:09', '2018-02-13 17:58:09'),
(189, 'Camisero Dama', '<p>Camisero Dama</p>\r\n', 'Camisero Dama', 0, 'camisero-dama', 3, '0.00', '0.00', 2, NULL, 1, NULL, 'Camisero Dama', 'Camisero Dama', 'Camisero Dama', 0, 1, 14, '2018-02-13 11:59:04', '2018-02-13 17:59:04'),
(190, 'Camisero Tipo Tomm', '<p>Pique compactado titulo 24/1azul marino reactivo&nbsp;</p>\r\n\r\n<p>Acabados &nbsp;pie de cuello, pechera 2 botones.</p>\r\n\r\n<p>pu&ntilde;os y cuello tejido.</p>\r\n', 'Camisero Dray', 0, 'camisero-tipo-tomm', 4, '0.00', '0.00', 2, NULL, 1, NULL, 'Camisero Dray', 'Camisero Dray', 'Camisero Dray', 0, 1, 14, '2018-02-13 12:00:04', '2018-02-14 16:17:38'),
(191, 'Camisero Pique', '<p>Algod&oacute;n pique titulo 24/1 color azulino, pechera con 3 botones</p>\r\n\r\n<p>manga corta, cuello y pu&ntilde;os tejidos.</p>\r\n', 'Camisero Pique', 0, 'camisero-pique', 5, '0.00', '0.00', 2, NULL, 1, NULL, 'Camisero Pique', 'Camisero Pique', 'Camisero Pique', 0, 1, 14, '2018-02-13 12:01:54', '2018-02-14 16:19:16'),
(192, 'Camisero Pyma Corte Dama', '<p>Gamuza &nbsp;Pyma 50/1 color celeste, corte entallado, pechera con 4 botones.</p>\r\n\r\n<p>cuello y pu&ntilde;os tejidos.&nbsp;</p>\r\n', 'Camisero Pyma Corte Dama', 0, 'camisero-pyma-corte-dama', 6, '0.00', '0.00', 2, NULL, 1, NULL, 'Camisero Pyma Corte Dama', 'Camisero Pyma Corte Dama', 'Camisero Pyma Corte Dama', 0, 1, 14, '2018-02-13 12:02:52', '2018-02-14 16:18:23'),
(193, 'Camisero Geologo', '<p>Algod&oacute;n Jersey Peinado 24/1 color naranja reactivo</p>\r\n\r\n<p>cuello tejido, pu&ntilde;os rib. Lleva bandas reflectivas.</p>\r\n', 'Polo Camisero Naranja', 0, 'camisero-geologo', 7, '0.00', '0.00', 2, NULL, 1, NULL, 'Camisero Geologo', 'Camisero Geologo', 'Camisero Geologo', 0, 1, 14, '2018-02-13 13:29:18', '2018-02-14 16:15:15'),
(194, 'Jersey Dama Rangla', '<p>Jersey Dama Rangla</p>\r\n', 'Jersey Dama Rangla', 0, 'jersey-dama-rangla', 8, '0.00', '0.00', 2, NULL, 1, NULL, 'Jersey Dama Rangla', 'Jersey Dama Rangla', 'Jersey Dama Rangla', 0, 1, 14, '2018-02-13 13:31:26', '2018-02-13 19:31:26'),
(195, 'Polo Manga Raglan', '<p>Polo Manga Raglan</p>\r\n', 'Polo Manga Raglan', 0, 'polo-manga-raglan', 9, '0.00', '0.00', 2, NULL, 1, NULL, 'Polo Manga Raglan', 'Polo Manga Raglan', 'Polo Manga Raglan', 0, 1, 14, '2018-02-13 13:37:19', '2018-02-13 19:37:19'),
(196, 'Polos Dray Jaspeado', '<p>Dri fit &nbsp;manga rangla corta, cuello redondo.</p>\r\n\r\n<p>color &nbsp;gir jaspeado.</p>\r\n', 'Polos Dray Jaspeado', 5, 'polos-dray-jaspeado', 10, '0.00', '0.00', 2, NULL, 1, NULL, 'Polos Dray Jaspeado', 'Polos Dray Jaspeado', 'Polos Dray Jaspeado', 0, 1, 14, '2018-02-13 13:38:29', '2018-02-14 16:16:28'),
(197, 'T-shirt  Jaspeado Dama', '<p>T-shirt &nbsp;Jaspeado Dama</p>\r\n', 'T-shirt  Jaspeado Dama', 0, 't-shirt-jaspeado-dama', 11, '0.00', '0.00', 2, NULL, 1, NULL, 'T-shirt  Jaspeado Dama', 'T-shirt  Jaspeado Dama', 'T-shirt  Jaspeado Dama', 0, 1, 14, '2018-02-13 13:39:44', '2018-02-13 19:39:44'),
(198, 'T-shirt Cuello V', '<p>T-shirt Cuello V</p>\r\n', 'T-shirt Cuello V', 0, 't-shirt-cuello-v', 12, '0.00', '0.00', 2, NULL, 1, NULL, 'T-shirt Cuello V', 'T-shirt Cuello V', 'T-shirt Cuello V', 0, 1, 14, '2018-02-13 13:41:20', '2018-02-13 19:41:20'),
(199, 'T-shirt Manga Larga', '<p>T-shirt Manga Larga</p>\r\n', 'T-shirt Manga Larga', 0, 't-shirt-manga-larga', 13, '0.00', '0.00', 2, NULL, 0, NULL, 'T-shirt Manga Larga', 'T-shirt Manga Larga', 'T-shirt Manga Larga', 0, 1, 14, '2018-02-13 13:44:29', '2018-02-13 19:44:29'),
(200, 'T-shirt Manga Rangla', '<p>T-shirt Manga Rangla</p>\r\n', 'T-shirt Manga Rangla', 0, 't-shirt-manga-rangla', 14, '0.00', '0.00', 2, NULL, 1, NULL, 'T-shirt Manga Rangla', 'T-shirt Manga Rangla', 'T-shirt Manga Rangla', 0, 1, 14, '2018-02-13 13:45:41', '2018-02-13 19:45:41'),
(201, 'T-shit Caballero', '<p>T-shit Caballero</p>\r\n', 'T-shit Caballero', 0, 't-shit-caballero', 15, '0.00', '0.00', 2, NULL, 1, NULL, 'T-shit Caballero', 'T-shit Caballero', 'T-shit Caballero', 0, 1, 14, '2018-02-13 13:46:36', '2018-02-13 19:46:36'),
(202, 'Jockeys 5 Tapas', '<p>Tela drill , frontal acolchado, tafilete interior.</p>\r\n', 'Jockeys 5 Tapas', 0, 'jockeys-5-tapas', 1, '0.00', '0.00', 2, NULL, 1, NULL, 'Jockeys 5 Tapas', 'Jockeys 5 Tapas', 'Jockeys 5 Tapas', 0, 1, 15, '2018-02-13 14:08:50', '2018-02-13 20:09:02'),
(203, 'Jockeys 5 Tapas', '<p>Tela polyester &nbsp;jaspeada con malla</p>\r\n', 'Jockeys 5 Tapas', 0, 'jockeys-5-tapas', 2, '0.00', '0.00', 2, NULL, 1, NULL, 'Jockeys 5 Tapas', 'Jockeys 5 Tapas', 'Jockeys 5 Tapas', 0, 1, 15, '2018-02-13 14:11:23', '2018-02-13 20:11:23'),
(204, 'Jockeys 5 Tapas', '<p>Tela polyester &nbsp;jaspeada con malla</p>\r\n', 'Jockeys 5 Tapas', 0, 'jockeys-5-tapas', 3, '0.00', '0.00', 2, NULL, 1, NULL, 'Jockeys 5 Tapas', 'Jockeys 5 Tapas', 'Jockeys 5 Tapas', 0, 1, 15, '2018-02-13 14:13:08', '2018-02-13 20:13:08'),
(205, 'Gorra Tapa Cuello', '<p>Tela polar , visera forrado con &nbsp;despuntes.</p>\r\n', 'Gorra Tapa Cuello', 0, 'gorra-tapa-cuello', 4, '0.00', '0.00', 2, NULL, 1, NULL, 'Gorra Tapa Cuello', 'Gorra Tapa Cuello', 'Gorra Tapa Cuello', 0, 1, 15, '2018-02-13 14:14:45', '2018-02-13 20:14:45'),
(206, 'Gorro Lana', '<p>Tejido en dralon, bordado logotipo.</p>\r\n', 'Gorro Lana', 0, 'gorro-lana', 5, '0.00', '0.00', 2, NULL, 1, NULL, 'Gorro Lana', 'Gorro Lana', 'Gorro Lana', 0, 1, 15, '2018-02-13 14:16:53', '2018-02-13 20:16:53'),
(207, 'Jockeys 5 Tapas', '<p>Tela polyester con espuma y malla&nbsp;</p>\r\n', 'Jockeys 5 Tapas', 0, 'jockeys-5-tapas', 6, '0.00', '0.00', 2, NULL, 1, NULL, 'Jockeys 5 Tapas', 'Jockeys 5 Tapas', 'Jockeys 5 Tapas', 0, 1, 15, '2018-02-13 14:23:21', '2018-02-13 20:23:21'),
(208, 'Gorro Sublimado', '<p>Modelo 5 tapas con malla. Impresi&oacute;n personalizadas.</p>\r\n', 'Gorro Sublimado', 0, 'gorro-sublimado', 7, '0.00', '0.00', 2, NULL, 1, NULL, 'Gorro Sublimado', 'Gorro Sublimado', 'Gorro Sublimado', 0, 1, 15, '2018-02-13 14:25:05', '2018-02-13 20:25:53'),
(209, 'Jockeys 6 Tapas', '<p>Copa &nbsp;de malla con viseta acolchada</p>\r\n', 'Jockeys 6 Tapas', 0, 'jockeys-6-tapas', 9, '0.00', '0.00', 2, NULL, 1, NULL, 'Jockeys 6 Tapas', 'Jockeys 6 Tapas', 'Jockeys 6 Tapas', 0, 1, 15, '2018-02-13 14:26:42', '2018-02-13 20:26:42'),
(210, 'Gorro y Chalina', '<p>Tela polar ajustable, logotipo bordado</p>\r\n', 'Gorro y Chalina', 0, 'gorro-y-chalina', 8, '0.00', '0.00', 2, NULL, 1, NULL, 'Gorro y Chalina', 'Gorro y Chalina', 'Gorro y Chalina', 0, 1, 15, '2018-02-13 14:31:37', '2018-02-13 20:31:37'),
(211, 'Gorro Tapa Cuello', '<p>Tela drill , corte 6 tapas con cordon elasticado y tip top.&nbsp;</p>\r\n', 'Gorro Tapa Cuello', 0, 'gorro-tapa-cuello', 10, '0.00', '0.00', 2, NULL, 1, NULL, 'Gorro Tapa Cuello', 'Gorro Tapa Cuello', 'Gorro Tapa Cuello', 0, 1, 15, '2018-02-13 14:33:16', '2018-02-13 20:33:16'),
(212, 'Gorro Guillian', '<p>Gorro Guillian</p>\r\n', 'Gorro Guillian', 0, 'gorro-guillian', 11, '0.00', '0.00', 2, NULL, 1, NULL, 'Gorro Guillian', 'Gorro Guillian', 'Gorro Guillian', 0, 1, 15, '2018-02-13 14:40:02', '2018-02-13 20:40:02'),
(213, 'Viseras', '<p>Microporoso con con broches plasticos.</p>\r\n', 'Viseras', 0, 'viseras', 12, '0.00', '0.00', 2, NULL, 1, NULL, 'Viseras', 'Viseras', 'Viseras', 0, 1, 15, '2018-02-13 14:41:20', '2018-02-13 20:41:20'),
(214, 'Sombrero Tipo Safari', '<p>Tela Drill, ala ancha &nbsp;brinda mayor proteccion al sol.</p>\r\n', 'Sombrero Tipo Safari', 0, 'sombrero-tipo-safari', 13, '0.00', '0.00', 2, NULL, 1, NULL, 'Sombrero Tipo Safari', 'Sombrero Tipo Safari', 'Sombrero Tipo Safari', 0, 1, 15, '2018-02-13 14:42:46', '2018-02-13 20:42:46'),
(215, 'Visera Drill', '', 'Visera Drill', 0, 'visera-drill', 14, '0.00', '0.00', 2, NULL, 1, NULL, 'Visera Drill', 'Visera Drill', 'Visera Drill', 0, 1, 15, '2018-02-13 14:43:54', '2018-02-13 20:43:54'),
(216, 'Visera en Kappa', '<p>Tela dray, regulador &nbsp;velcro</p>\r\n', 'Visera en Kappa', 0, 'visera-en-kappa', 15, '0.00', '0.00', 2, NULL, 1, NULL, 'Visera en Kappa', 'Visera en Kappa', 'Visera en Kappa', 0, 1, 15, '2018-02-13 14:45:16', '2018-02-13 20:45:16'),
(217, 'Casaca Roja', '<p>Polar Antipeeling, bolsillos multiples.</p>\r\n\r\n<p>Logotipo &nbsp;bordado</p>\r\n', 'Casaca Roja', 0, 'casaca-roja', 1, '0.00', '0.00', 2, NULL, 1, NULL, 'Casaca Roja', 'Casaca Roja', 'Casaca Roja', 0, 1, 16, '2018-02-13 15:09:39', '2018-02-13 21:09:39'),
(218, 'Casaca Polar Caballero', '<p>SOFT SHELL , CIERRE FRONTAL IMPORTADO, BOLSILLOS DIAGONAL CON&nbsp;CREMALLERA, PU&Ntilde;OS REGULADOS CON PEGA PEGA</p>\r\n', 'Casaca Polar Caballero', 0, 'casaca-polar-caballero', 2, '0.00', '0.00', 2, NULL, 1, NULL, 'Casaca Polar Caballero', 'Casaca Polar Caballero', 'Casaca Polar Caballero', 0, 1, 16, '2018-02-13 15:12:01', '2018-02-13 21:12:01'),
(219, 'Casaca Acolchada Cuello Neru', '<p>Tela Nylon con fibra, forro de tafeta, pu&ntilde;os y basta ajustable.</p>\r\n', 'Casaca Acolchada Cuello Neru', 0, 'casaca-acolchada-cuello-neru', 3, '0.00', '0.00', 2, NULL, 1, NULL, 'Casaca Acolchada Cuello Neru', 'Casaca Acolchada Cuello Neru', 'Casaca Acolchada Cuello Neru', 0, 1, 16, '2018-02-13 15:13:47', '2018-02-13 21:13:47'),
(220, 'Casaca Acolchada', '<p>Tela Taslan impermeable, acabados con fibra interior, forro de tafeta, bolsillos con cierre&nbsp;bolsillos diagonales&nbsp;</p>\r\n', 'Casaca Acolchada', 0, 'casaca-acolchada', 4, '0.00', '0.00', 2, NULL, 1, NULL, 'Casaca Acolchada', 'Casaca Acolchada', 'Casaca Acolchada', 0, 1, 16, '2018-02-13 15:15:42', '2018-02-13 21:15:42'),
(221, 'Casaca con Fibra', '<p>Tela Impermeable con fibra interior , forro tafeta&nbsp;cierre frontal.</p>\r\n', 'Casaca con Fibra', 0, 'casaca-con-fibra', 5, '0.00', '0.00', 2, NULL, 1, NULL, 'Casaca con Fibra', 'Casaca con Fibra', 'Casaca con Fibra', 0, 1, 16, '2018-02-13 15:17:05', '2018-02-13 21:17:05'),
(222, 'Casaca Dama Polar', '<p>Soft Shell, cierre frontal, bolsillos multiples con cremallera.&nbsp;corte ornamentales bicolor.</p>\r\n', 'Casaca Dama Polar', 0, 'casaca-dama-polar', 6, '0.00', '0.00', 2, NULL, 1, NULL, 'Casaca Dama Polar', 'Casaca Dama Polar', 'Casaca Dama Polar', 0, 1, 16, '2018-02-13 15:19:02', '2018-02-13 21:19:02'),
(223, 'Casaca Drill con Cintas Reflectivas', '<p>Tela Drill Nuevo Mundo, acabado &nbsp;cuello camisa , cintas reflectivas , forro interior &nbsp;polar</p>\r\n', 'Casaca Drill con Cintas Reflectivas', 0, 'casaca-drill-con-cintas-reflectivas', 7, '0.00', '0.00', 2, NULL, 1, NULL, 'Casaca Drill con Cintas Reflectivas', 'Casaca Drill con Cintas Reflectivas', 'Casaca Drill con Cintas Reflectivas', 0, 1, 16, '2018-02-13 15:20:45', '2018-02-13 21:20:45'),
(224, 'Casaca Ejecutivo', '<p>SOFT SHELL , CIERRE FRONTAL IMPORTADO, BOLSILLOS DIAGONAL CON&nbsp;CREMALLERA, PU&Ntilde;OS REGULADOS CON PEGA PEGA</p>\r\n', 'Casaca Ejecutivo', 0, 'casaca-ejecutivo', 8, '0.00', '0.00', 2, NULL, 1, NULL, 'Casaca Ejecutivo', 'Casaca Ejecutivo', 'Casaca Ejecutivo', 0, 1, 16, '2018-02-13 15:23:26', '2018-02-13 21:23:26'),
(225, 'Casaca Impermable con forro de fibra', '<p>Taslan pesado acabado con interior &nbsp;fibra con forro &nbsp;coquitos.&nbsp;capucha fijo.</p>\r\n', 'Casaca Impermable con forro de fibra', 0, 'casaca-impermable-con-forro-de-fibra', 9, '0.00', '0.00', 2, NULL, 1, NULL, 'Casaca Impermable con forro de fibra', 'Casaca Impermable con forro de fibra', 'Casaca Impermable con forro de fibra', 0, 1, 16, '2018-02-13 15:27:03', '2018-02-13 21:27:03'),
(226, 'Casaca Impermeable Bicolor', '<p>Manga rangla tela Soft Shell, pechera y espalda fribra&nbsp;acanalada con bolsillo con cremallera.</p>\r\n', 'Casaca Impermeable Bicolor', 0, 'casaca-impermeable-bicolor', 10, '0.00', '0.00', 2, NULL, 1, NULL, 'Casaca Impermeable Bicolor', 'Casaca Impermeable Bicolor', 'Casaca Impermeable Bicolor', 0, 1, 16, '2018-02-13 15:29:10', '2018-02-13 21:29:10'),
(227, 'Casaca Leganda', '<p>Tela Legand, capucha fija , cierre frontal, forro tafeta&nbsp;&nbsp;pu&ntilde;os ajustable con belcro, corte ornamentales.&nbsp;tapacierre interior.</p>\r\n', 'Casaca Leganda', 0, 'casaca-leganda', 11, '0.00', '0.00', 2, NULL, 1, NULL, 'Casaca Leganda', 'Casaca Leganda', 'Casaca Leganda', 0, 1, 16, '2018-02-13 15:31:19', '2018-02-13 21:31:19'),
(228, 'Casaca Manga Rangla', '<p>Manga rangla tela Soft Shell, pechera y espalda fribra&nbsp;acanalada con bolsillo con cremallera.</p>\r\n', 'Casaca Manga Rangla', 0, 'casaca-manga-rangla', 12, '0.00', '0.00', 2, NULL, 1, NULL, 'Casaca Manga Rangla', 'Casaca Manga Rangla', 'Casaca Manga Rangla', 0, 1, 16, '2018-02-13 15:32:51', '2018-02-13 21:32:51'),
(229, 'Casaca Mina', '<p>Tela enjebado &nbsp;con forro polar.cinta reflectiva 3M</p>\r\n\r\n<p>capucha desmontable, pu&ntilde;os elasticados. Pretina &nbsp;lleva cordon ajustable.</p>\r\n', 'Casaca Mina', 0, 'casaca-mina', 13, '0.00', '0.00', 2, NULL, 1, NULL, 'Casaca Mina', 'Casaca Mina', 'Casaca Mina', 0, 1, 16, '2018-02-13 15:35:50', '2018-02-13 21:35:50'),
(230, 'Casaca Polar Dama', '<p>Soft Shell rojo, corte entallado, sin forro. 2 bolsillo con cremallera, cierre frontal.</p>\r\n\r\n<p>Logotipo bordado.</p>\r\n', 'Casaca Polar Dama', 0, 'casaca-polar-dama', 14, '0.00', '0.00', 2, NULL, 1, NULL, 'Casaca Polar Dama', 'Casaca Polar Dama', 'Casaca Polar Dama', 0, 1, 16, '2018-02-13 15:38:11', '2018-02-13 21:38:11');
INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `resumen`, `codigo`, `url`, `orden`, `precio`, `precio_oferta`, `oferta`, `tags`, `destacado`, `fecha_ingreso`, `seo_title`, `seo_description`, `seo_keywords`, `cantidad`, `estado`, `categoria_id`, `creado`, `modificado`) VALUES
(231, 'Casaca Polar', '<p>Casaca Polar</p>\r\n', 'Casaca Polar', 0, 'casaca-polar', 15, '0.00', '0.00', 2, NULL, 1, NULL, 'Casaca Polar', 'Casaca Polar', 'Casaca Polar', 0, 1, 16, '2018-02-13 15:40:44', '2018-02-13 21:40:44'),
(232, 'CASACA REFLECTIVA', '<p>Polynan fosforescente , con cinta reflectiva 3M</p>\r\n\r\n<p>capucha embolsado. Pu&ntilde;os y pretina rib.</p>\r\n', 'CASACA REFLECTIVA', 0, 'casaca-reflectiva', 16, '0.00', '0.00', 2, NULL, 1, NULL, 'CASACA REFLECTIVA', 'CASACA REFLECTIVA', 'CASACA REFLECTIVA', 0, 1, 16, '2018-02-13 15:45:10', '2018-02-13 21:45:10'),
(233, 'casaca soft concinta reflectiva', '<p>casaca soft concinta reflectiva</p>\r\n', 'casaca soft concinta reflectiva', 0, 'casaca-soft-concinta-reflectiva', 17, '0.00', '0.00', 2, NULL, 1, NULL, 'casaca soft concinta reflectiva', 'casaca soft concinta reflectiva', 'casaca soft concinta reflectiva', 0, 1, 16, '2018-02-13 15:47:39', '2018-02-13 21:47:39'),
(234, 'casaca soft shell', '<p>SOFT SHELL - corte entallado , bolsillos con cremallera.</p>\r\n', 'casaca soft shell', 0, 'casaca-soft-shell', 18, '0.00', '0.00', 2, NULL, 1, NULL, 'casaca soft shell', 'casaca soft shell', 'casaca soft shell', 0, 1, 16, '2018-02-13 15:49:28', '2018-02-13 21:49:28'),
(235, 'casaca soft shell', '<p>Soft Shell, cierre frontal, bolsillos multiples con cremallera.</p>\r\n\r\n<p>corte ornamentales bicolor.</p>\r\n', 'casaca soft shell', 0, 'casaca-soft-shell', 19, '0.00', '0.00', 2, NULL, 1, NULL, 'casaca soft shell', 'casaca soft shell', 'casaca soft shell', 0, 1, 16, '2018-02-13 15:52:55', '2018-02-13 21:52:55'),
(236, 'casaca taslan cin cinta reflectiva', '<p>TASLAN FOSFORESCENTE, CINTA REFLECCTIVA 3M</p>\r\n\r\n<p>capucha desmontable, forro polar.</p>\r\n', 'casaca taslan cin cinta reflectiva', 0, 'casaca-taslan-cin-cinta-reflectiva', 20, '0.00', '0.00', 2, NULL, 1, NULL, 'casaca taslan cin cinta reflectiva', 'casaca taslan cin cinta reflectiva', 'casaca taslan cin cinta reflectiva', 0, 1, 16, '2018-02-13 15:54:04', '2018-02-13 21:54:04'),
(237, 'casaca soft shell', '<p>casaca soft shell</p>\r\n', 'casaca soft shell', 0, 'casaca-soft-shell', 21, '0.00', '0.00', 2, NULL, 1, NULL, 'casaca soft shell', 'casaca soft shell', 'casaca soft shell', 0, 1, 16, '2018-02-13 15:57:29', '2018-02-13 21:57:29'),
(238, 'casaca micro polar', '<p>Polar Antipeeling, bolsillos multiples.</p>\r\n\r\n<p>Logotipo &nbsp;bordado</p>\r\n', 'casaca micro polar', 0, 'casaca-micro-polar', 22, '0.00', '0.00', 2, NULL, 1, NULL, 'casaca micro polar', 'casaca micro polar', 'casaca micro polar', 0, 1, 16, '2018-02-13 16:01:40', '2018-02-13 22:01:40'),
(239, 'chaqueta piel de durazno', '<p>chaqueta piel de durazno</p>\r\n', 'chaqueta piel de durazno', 0, 'chaqueta-piel-de-durazno', 23, '0.00', '0.00', 2, NULL, 1, NULL, 'chaqueta piel de durazno', 'chaqueta piel de durazno', 'chaqueta piel de durazno', 0, 1, 16, '2018-02-13 16:02:45', '2018-02-13 22:02:45'),
(240, 'Casaca Manga Rangla', '<p>Polar Antipeeling, bolsillos multiples.</p>\r\n\r\n<p>Logotipo &nbsp;bordado</p>\r\n', 'Casaca Manga Rangla', 0, 'casaca-manga-rangla', 24, '0.00', '0.00', 2, NULL, 1, NULL, 'Casaca Manga Rangla', 'Casaca Manga Rangla', 'Casaca Manga Rangla', 0, 1, 16, '2018-02-13 16:05:09', '2018-02-13 22:05:09'),
(241, 'polera jaspeada', '<p>Polynan jaspeado, cuello alto con cremallera&nbsp;</p>\r\n', 'polera jaspeada', 0, 'polera-jaspeada', 25, '0.00', '0.00', 2, NULL, 1, NULL, 'polera jaspeada', 'polera jaspeada', 'polera jaspeada', 0, 1, 16, '2018-02-13 16:06:57', '2018-02-13 22:06:57'),
(242, 'soft shell cuello alto', '<p>soft shell cuello alto</p>\r\n', 'soft shell cuello alto', 0, 'soft-shell-cuello-alto', 27, '0.00', '0.00', 2, NULL, 1, NULL, 'soft shell cuello alto', 'soft shell cuello alto', 'soft shell cuello alto', 0, 1, 16, '2018-02-13 16:08:41', '2018-02-13 22:08:41'),
(243, 'soft shell beige', '<p>Soft Shell, cierre frontal, bolsillos multiples con cremallera.</p>\r\n', 'soft shell beige', 0, 'soft-shell-beige', 26, '0.00', '0.00', 2, NULL, 1, NULL, 'soft shell beige', 'soft shell beige', 'soft shell beige', 0, 1, 16, '2018-02-13 16:10:32', '2018-02-13 22:10:32'),
(244, 'soft shell corte hombro', '<p>Soft Shell, cierre frontal, bolsillos multiples con cremallera.</p>\r\n\r\n<p>corte ornamentales bicolor.</p>\r\n', 'soft shell corte hombro', 0, 'soft-shell-corte-hombro', 28, '0.00', '0.00', 2, NULL, 1, NULL, 'soft shell corte hombro', 'soft shell corte hombro', 'soft shell corte hombro', 0, 1, 16, '2018-02-13 16:13:55', '2018-02-13 22:13:55'),
(245, 'soft shell corte sisa', '<p>Tela Impermeable, pu&ntilde;os y pretina elasticado.</p>\r\n\r\n<p>cierre frontal y 2 bolsillos con cremallera</p>\r\n', 'soft shell corte sisa', 0, 'soft-shell-corte-sisa', 29, '0.00', '0.00', 2, NULL, 1, NULL, 'soft shell corte sisa', 'soft shell corte sisa', 'soft shell corte sisa', 0, 1, 16, '2018-02-13 16:15:28', '2018-02-13 22:15:28'),
(246, 'blusa oxford', '<p>Oxford Creditex &nbsp;100 % algod&oacute;n , manga larga</p>\r\n\r\n<p>Corte princesa</p>\r\n', 'blusa oxford', 0, 'blusa-oxford', 1, '0.00', '0.00', 2, NULL, 1, NULL, 'blusa oxford', 'blusa oxford', 'blusa oxford', 0, 1, 19, '2018-02-13 16:34:29', '2018-02-13 22:34:29'),
(247, 'CAMISA ALTA VISIVILIDAD', '<p>CAMISA ALTA VISIVILIDAD</p>\r\n', 'CAMISA ALTA VISIVILIDAD', 0, 'camisa-alta-visivilidad', 2, '0.00', '0.00', 2, NULL, 1, NULL, 'CAMISA ALTA VISIVILIDAD', 'CAMISA ALTA VISIVILIDAD', 'CAMISA ALTA VISIVILIDAD', 0, 1, 19, '2018-02-13 16:35:28', '2018-02-13 22:35:28'),
(248, 'CAMISACO', '<p>CAMISACO</p>\r\n', 'CAMISACO', 0, 'camisaco', 3, '0.00', '0.00', 2, NULL, 1, NULL, 'CAMISACO', 'CAMISACO', 'CAMISACO', 0, 1, 19, '2018-02-13 16:37:40', '2018-02-13 22:37:40'),
(249, 'Camisa Caballero', '<p>Tela Oxford &nbsp;Creditex 100 % algod&oacute;n, manga larga</p>\r\n\r\n<p>Logotipo bordado</p>\r\n', 'Camisa Caballero', 0, 'camisa-caballero', 4, '0.00', '0.00', 2, NULL, 1, NULL, 'Camisa Caballero', 'Camisa Caballero', 'Camisa Caballero', 0, 1, 19, '2018-02-13 16:38:58', '2018-02-13 22:38:58'),
(250, 'camisas dama con banda reflectiva', '<p>camisas dama con banda reflectiva</p>\r\n', 'camisas dama con banda reflectiva', 0, 'camisas-dama-con-banda-reflectiva', 5, '0.00', '0.00', 2, NULL, 1, NULL, 'camisas dama con banda reflectiva', 'camisas dama con banda reflectiva', 'camisas dama con banda reflectiva', 0, 1, 19, '2018-02-13 16:40:07', '2018-02-13 22:40:07'),
(251, 'Chaleco de Seguridad', '<p>Drill Nuevo Mundo Cod. 384, cinta reflectiva 3M</p>\r\n', 'Chaleco de Seguridad', 0, 'chaleco-de-seguridad', 1, '0.00', '0.00', 2, NULL, 1, NULL, 'Chaleco de Seguridad', 'Chaleco de Seguridad', 'Chaleco de Seguridad', 0, 1, 21, '2018-02-13 16:46:25', '2018-02-13 22:46:25'),
(252, 'Chaleco Dama', '<p>Nylon con fibra interior, cierre frontal , cuello semi alto.</p>\r\n', 'Chaleco Dama', 0, 'chaleco-dama', 2, '0.00', '0.00', 2, NULL, 1, NULL, 'Chaleco Dama', 'Chaleco Dama', 'Chaleco Dama', 0, 1, 21, '2018-02-13 16:48:57', '2018-02-13 22:48:57'),
(253, 'chaleco acolchado', '<p>Polyester con fibra interior.</p>\r\n', 'chaleco acolchado', 0, 'chaleco-acolchado', 3, '0.00', '0.00', 2, NULL, 1, NULL, 'chaleco acolchado', 'chaleco acolchado', 'chaleco acolchado', 0, 1, 21, '2018-02-13 16:50:15', '2018-02-13 22:50:15'),
(254, 'CHALECO ALTA VISIBILIDAD', '<p>CHALECO ALTA VISIBILIDAD</p>\r\n', 'CHALECO ALTA VISIBILIDAD', 0, 'chaleco-alta-visibilidad', 4, '0.00', '0.00', 2, NULL, 1, NULL, 'CHALECO ALTA VISIBILIDAD', 'CHALECO ALTA VISIBILIDAD', 'CHALECO ALTA VISIBILIDAD', 0, 1, 21, '2018-02-13 16:51:08', '2018-02-13 22:51:08'),
(255, 'Chaleco Casaca', '<p>Chaleco Casaca</p>\r\n', 'Chaleco Casaca', 0, 'chaleco-casaca', 5, '0.00', '0.00', 2, NULL, 0, NULL, 'Chaleco Casaca', 'Chaleco Casaca', 'Chaleco Casaca', 0, 1, 21, '2018-02-13 16:52:13', '2018-02-13 22:52:13'),
(256, 'chaleco con fibra', '<p>Fibra &nbsp;acanalada , 2 bolsillos diagonales, entallado en cintura.</p>\r\n', 'chaleco con fibra', 0, 'chaleco-con-fibra', 6, '0.00', '0.00', 2, NULL, 1, NULL, 'chaleco con fibra', 'chaleco con fibra', 'chaleco con fibra', 0, 1, 21, '2018-02-13 16:53:57', '2018-02-13 22:53:57'),
(257, 'chaleco multibolsillo soft shell', '<p>chaleco multibolsillo soft shell</p>\r\n', 'chaleco multibolsillo soft shell', 0, 'chaleco-multibolsillo-soft-shell', 7, '0.00', '0.00', 2, NULL, 1, NULL, 'chaleco multibolsillo soft shell', 'chaleco multibolsillo soft shell', 'chaleco multibolsillo soft shell', 0, 1, 21, '2018-02-13 16:55:00', '2018-02-13 22:55:00'),
(258, 'Chaleco Naranja', '<p>Chaleco Naranja</p>\r\n', 'Chaleco Naranja', 0, 'chaleco-naranja', 8, '0.00', '0.00', 2, NULL, 1, NULL, 'Chaleco Naranja', 'Chaleco Naranja', 'Chaleco Naranja', 0, 1, 21, '2018-02-13 16:56:07', '2018-02-13 22:56:07'),
(259, 'Chaleco negro', '<p>Chaleco negro</p>\r\n', 'Chaleco negro', 0, 'chaleco-negro', 9, '0.00', '0.00', 2, NULL, 1, NULL, 'Chaleco negro', 'Chaleco negro', 'Chaleco negro', 0, 1, 21, '2018-02-13 16:59:59', '2018-02-13 22:59:59'),
(260, 'chaleco polar dama', '<p>Polar Anteepiling, bolsillos diaagonales con cierre.</p>\r\n', 'chaleco polar dama', 0, 'chaleco-polar-dama', 11, '0.00', '0.00', 2, NULL, 1, NULL, 'chaleco polar dama', 'chaleco polar dama', 'chaleco polar dama', 0, 1, 21, '2018-02-13 17:01:40', '2018-02-13 23:01:40'),
(261, 'chaleco reportero', '<p>chaleco reportero</p>\r\n', 'chaleco reportero', 0, 'chaleco-reportero', 10, '0.00', '0.00', 2, NULL, 1, NULL, 'chaleco reportero', 'chaleco reportero', 'chaleco reportero', 0, 1, 21, '2018-02-13 17:02:40', '2018-02-13 23:02:40'),
(262, 'chaleco soft shell griss', '<p>no lleva forro , cierre diagonales, cuello alto.</p>\r\n', 'chaleco soft shell griss', 0, 'chaleco-soft-shell-griss', 12, '0.00', '0.00', 2, NULL, 1, NULL, 'chaleco soft shell griss', 'chaleco soft shell griss', 'chaleco soft shell griss', 0, 1, 21, '2018-02-13 17:03:59', '2018-02-13 23:03:59'),
(263, 'Chaleco Dama Sport', '<p>Tela Polynan con venas blancas y &nbsp;canesu gris jaspeado</p>\r\n\r\n<p>cuello alto,cierre frontal, corte entallado.</p>\r\n', 'Chaleco Dama Sport', 0, 'chaleco-dama-sport', 16, '0.00', '0.00', 2, NULL, 1, NULL, 'Chaleco Dama Sport', 'Chaleco Dama Sport', 'Chaleco Dama Sport', 0, 1, 14, '2018-02-14 10:26:33', '2018-02-14 16:26:33'),
(264, 'Polo manga larga', '<p>Algod&oacute;n &nbsp;peinado titulo 30/1 color azul acero, doble fijado</p>\r\n\r\n<p>talla est&aacute;ndar. Estampado plastisol</p>\r\n', 'Polo manga larga', 0, 'polo-manga-larga', 17, '0.00', '0.00', 2, NULL, 1, NULL, 'Polo manga larga', 'Polo manga larga', 'Polo manga larga', 0, 1, 14, '2018-02-14 10:29:46', '2018-02-14 16:29:46'),
(265, 'Polo Publicitario', '<p>Algod&oacute;n &nbsp;peinado titulo 30/1 color rojo doble fijado</p>\r\n\r\n<p>talla est&aacute;ndar. Estampado plastisol</p>\r\n', 'Polo Publicitario', 0, 'polo-publicitario', 18, '0.00', '0.00', 2, NULL, 1, NULL, 'Polo Publicitario', 'Polo Publicitario', 'Polo Publicitario', 0, 1, 14, '2018-02-14 10:32:18', '2018-02-14 16:32:18'),
(266, 'Polo Rangla manga larga ', '<p>Algod&oacute;n jersey peinado 24/1 &nbsp;colores reactivos, cuello redondo</p>\r\n\r\n<p>manga 3/4 .</p>\r\n', 'Polo Rangla manga larga ', 0, 'polo-rangla-manga-larga', 19, '0.00', '0.00', 2, NULL, 1, NULL, 'Polo Rangla manga larga ', 'Polo Rangla manga larga ', 'Polo Rangla manga larga ', 0, 1, 14, '2018-02-14 10:34:17', '2018-02-14 16:34:17'),
(267, 'Polo Sport', '<p>Dri fit , &nbsp;sublimado solo en pechera.</p>\r\n', 'Polo Sport', 0, 'polo-sport', 20, '0.00', '0.00', 2, NULL, 1, NULL, 'Polo Sport', 'Polo Sport', 'Polo Sport', 0, 1, 14, '2018-02-14 10:40:51', '2018-02-14 16:40:51'),
(268, 'Camisero Deportivo', '<p>Dri fit &nbsp;color gris oscuro, cuello de la misma tela , pechera 3 botones</p>\r\n\r\n<p>manga corta con basta.</p>\r\n', 'Camisero Deportivo', 0, 'camisero-deportivo', 21, '0.00', '0.00', 2, NULL, 1, NULL, 'Camisero Deportivo', 'Camisero Deportivo', 'Camisero Deportivo', 0, 1, 14, '2018-02-14 10:42:33', '2018-02-14 16:42:33'),
(269, 'Polera con Capucha', '<p>Gamuza afranelada, lleva bolsillos y capucha</p>\r\n', 'Polera con Capucha', 0, 'polera-con-capucha', 22, '0.00', '0.00', 2, NULL, 1, NULL, 'Polera con Capucha', 'Polera con Capucha', 'Polera con Capucha', 0, 1, 14, '2018-02-14 10:44:44', '2018-02-14 16:44:44'),
(270, 'Polo Foto', '<p>Algod&oacute;n Jersey peinado 24/1 color blanco optico.</p>\r\n\r\n<p>Impreso en laser &nbsp;foto.</p>\r\n', 'Polo Foto', 0, 'polo-foto', 23, '0.00', '0.00', 2, NULL, 1, NULL, 'Polo Foto', 'Polo Foto', 'Polo Foto', 0, 1, 14, '2018-02-14 10:46:04', '2018-02-14 16:46:04'),
(271, 'Polo Rangle para Dama', '<p>Algod&oacute;n jersey peinado 24/1 &nbsp;colores reactivos, cuello redondo</p>\r\n\r\n<p>manga 3/4 .</p>\r\n', 'Polo Rangle para Dama', 0, 'polo-rangle-para-dama', 24, '0.00', '0.00', 2, NULL, 1, NULL, 'Polo Rangle para Dama', 'Polo Rangle para Dama', 'Polo Rangle para Dama', 0, 1, 14, '2018-02-14 10:49:43', '2018-02-14 16:49:43'),
(272, 'Polo Sublimado Total', '<p>Dri fit , sublimado total, seg&uacute;n &nbsp;archivo del cliente</p>\r\n', 'Polo Sublimado Total', 0, 'polo-sublimado-total', 25, '0.00', '0.00', 2, NULL, 1, NULL, 'Polo Sublimado Total', 'Polo Sublimado Total', 'Polo Sublimado Total', 0, 1, 14, '2018-02-14 10:51:41', '2018-02-14 16:51:41'),
(273, 'Polera Franela', '<p>Gamuza afranelada, color entero , cuello redondo con tapete.&nbsp;</p>\r\n\r\n<p>Estampado en alto relieve plastisol.</p>\r\n', 'Polera Franela', 0, 'polera-franela', 26, '0.00', '0.00', 2, NULL, 1, NULL, 'Polera Franela', 'Polera Franela', 'Polera Franela', 0, 1, 14, '2018-02-14 10:59:59', '2018-02-14 16:59:59'),
(274, 'Polo Dama Cuello V', '<p>Algod&oacute;n Jersey &nbsp;rojo reactivo, cuello v</p>\r\n\r\n<p>manga corta, corte se&ntilde;ido.</p>\r\n', 'Polo Dama Cuello V', 0, 'polo-dama-cuello-v', 27, '0.00', '0.00', 2, NULL, 1, NULL, 'Polo Dama Cuello V', 'Polo Dama Cuello V', 'Polo Dama Cuello V', 0, 1, 14, '2018-02-14 11:01:42', '2018-02-14 17:01:42'),
(275, 'Polo Rangla Bicolor', '<p>Algod&oacute;n jersey peinado 24/1 colores reactivos, cuello redondo</p>\r\n\r\n<p>manga larga&nbsp;</p>\r\n', 'Polo Rangla Bicolor', 0, 'polo-rangla-bicolor', 28, '0.00', '0.00', 2, NULL, 1, NULL, 'Polo Rangla Bicolor', 'Polo Rangla Bicolor', 'Polo Rangla Bicolor', 0, 1, 14, '2018-02-14 11:04:22', '2018-02-14 17:04:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_atributos`
--

CREATE TABLE `productos_atributos` (
  `productos_id` bigint(20) UNSIGNED NOT NULL,
  `atributos_multiples_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(128) DEFAULT NULL,
  `url` varchar(128) DEFAULT NULL,
  `imagen` varchar(128) DEFAULT NULL,
  `imagen_title` varchar(128) DEFAULT NULL,
  `descripcion` text,
  `orden` bigint(20) UNSIGNED DEFAULT NULL,
  `ruta_amazon` varchar(256) DEFAULT NULL,
  `destacado` tinyint(4) NOT NULL DEFAULT '0',
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `seo_title` varchar(150) DEFAULT NULL,
  `seo_description` varchar(150) DEFAULT NULL,
  `seo_keywords` varchar(150) DEFAULT NULL,
  `creado` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modificado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idioma_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`id`, `nombre`, `url`, `imagen`, `imagen_title`, `descripcion`, `orden`, `ruta_amazon`, `destacado`, `estado`, `seo_title`, `seo_description`, `seo_keywords`, `creado`, `modificado`, `idioma_id`) VALUES
(1, 'Osinergim', 'osinergim', 'proyecto01.jpg', 'proyecto01', 'Mantenimiento', 1, NULL, 1, 1, 'title1', 'description1', 'keywords1', '2017-01-10 10:50:20', '2017-07-10 10:50:20', 1),
(2, 'Obras de Ingeniería S.A.', 'obras-de-ingenieria-sa', 'proyecto02.jpg', 'proyecto02', 'Mantenimiento2', 2, NULL, 0, 1, 'title2', 'description2', 'keywords2', '2017-02-10 10:50:20', '2017-06-10 10:50:20', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(64) DEFAULT NULL,
  `descripcion` text,
  `seccion` varchar(32) DEFAULT NULL,
  `imagen` varchar(128) DEFAULT NULL,
  `imagen_title` varchar(128) DEFAULT NULL,
  `seo_title` varchar(150) DEFAULT NULL,
  `seo_description` varchar(150) DEFAULT NULL,
  `seo_keywords` varchar(150) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `visible` tinyint(4) NOT NULL DEFAULT '1',
  `orden` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`id`, `titulo`, `descripcion`, `seccion`, `imagen`, `imagen_title`, `seo_title`, `seo_description`, `seo_keywords`, `estado`, `visible`, `orden`) VALUES
(1, 'Inicio', 'Inicio', 'inicio', 'banner01.jpg', 'banner01', 'inicio', 'inicio', 'inicio', 1, 2, 1),
(2, 'Nosotros', '<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n', 'nosotros', 'nosotros.jpg', 'nosotros', 'Nosotros', 'Nosotros', 'Nosotros', 1, 1, 2),
(3, 'Servicios', 'Servicios', 'servicios', 'banner03.jpg', 'banner03', 'servicios', 'des_servicios', 'key_servicios', 1, 1, 3),
(4, 'Blog', '<p>Articulos</p>\r\n', 'articulos', 'articulos.jpg', 'articulos', 'Artículos', 'des_articulos', 'key_articulos', 1, 1, 4),
(5, 'Productos', '<p>Productos y categorias</p>\r\n', 'productos', 'productos.jpg', 'productos', 'Productos', 'Productos', 'Productos', 1, 2, 5),
(6, 'Preguntas Frecuentes', 'Preguntas frecuentes', 'prg_frecuentes', 'banner06.jpg', 'banner06', 'preguntas frecuentes', 'des_prg_frecuentes', 'key_prg_frecuentes', 1, 1, 6),
(7, 'contactenos', '<p>llame ahora y reciba un descuento</p>\r\n', 'contactenos', 'contactenos.jpg', 'contactenos', 'Contáctenos', 'Contáctenos', 'Contáctenos', 1, 2, 7),
(8, 'Testimonios', 'Testimonios', 'testimonios', 'banner08.jpg', 'banner08', 'testimonios', 'des_testimonios', 'key_testimonios', 1, 2, 8),
(9, 'Banners', 'Banners', 'banners', 'banner09.jpg', '', 'banners', 'des_banners', 'key_banners', 1, 2, 9),
(10, 'Solo Servicios', '<p>Solo Servicios</p>\r\n', 'solo_servicios', '20180116130149.jpg', 'banner-internos-servicios', 'servicios', 'servicios', 'servicios', 1, 1, 10),
(11, 'REGALOS PERSONALIZADOS', '<p>REGALOS PERSONALIZADOS</p>\r\n', 'galeria_albumes_fotos', '20180214151621.jpg', 'banner', 'REGALOS PERSONALIZADOS', 'REGALOS PERSONALIZADOS', 'REGALOS PERSONALIZADOS', 1, 1, 11),
(12, 'Galeria de videos', 'Galeria de videos', 'galeria_albumes_videos', 'banner12.jpg', 'banner11', 'galeria de videos', 'des_gal_videos', 'key_gal_videos', 1, 1, 12),
(13, 'Clientes', 'Clientes', 'clientes', 'banner13.jpg', 'banner13', 'clientes', 'des_clientes', 'key_clientes', 1, 1, 13),
(14, 'Proyectos', 'Proyectos', 'proyectos', 'banner14.jpg', 'banner14', 'proyectos', 'des_proyectos', 'key_proyectos', 1, 1, 14),
(15, 'Ofertas', 'Ofertas', 'ofertas', 'ofertas.jpg', 'ofertas', 'ofertas', 'ofertas', 'ofertas', 1, 1, 15),
(16, 'merchandising', '<p>merchandising</p>\r\n', 'merchandising', '20171118115242.jpg', '20171117172723', 'merchandising', 'merchandising', 'merchandising', 1, 2, 16),
(17, 'textiles', '<p>textiles</p>\r\n', 'textiles', '20171118115254.jpg', '20171117175201', 'textiles', 'textiles', 'textiles', 1, 2, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

CREATE TABLE `sedes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo_globo` varchar(256) DEFAULT NULL,
  `texto_globo` text,
  `direccion` varchar(256) NOT NULL,
  `telefono` varchar(256) NOT NULL,
  `correo` varchar(256) NOT NULL,
  `titulo` varchar(256) NOT NULL,
  `imagen` varchar(128) NOT NULL,
  `imagen_title` varchar(128) NOT NULL,
  `orden` bigint(20) DEFAULT NULL,
  `latitud_centro` varchar(50) DEFAULT NULL,
  `longitud_centro` varchar(50) DEFAULT NULL,
  `latitud_punto` varchar(50) DEFAULT NULL,
  `longitud_punto` varchar(50) DEFAULT NULL,
  `zoom` bigint(20) DEFAULT NULL,
  `tipo_mapa` varchar(20) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sedes`
--

INSERT INTO `sedes` (`id`, `titulo_globo`, `texto_globo`, `direccion`, `telefono`, `correo`, `titulo`, `imagen`, `imagen_title`, `orden`, `latitud_centro`, `longitud_centro`, `latitud_punto`, `longitud_punto`, `zoom`, `tipo_mapa`, `estado`) VALUES
(1, NULL, NULL, 'Sector 2 Grupo 5 Manzana M Lote 11', '2878808', 'rmariluzgonzales@gmail.com', 'Villa el Salvador', '20170309112319.jpg', '20170309112319', 1, '-12.216853106638633', '-76.9430923461914', '-12.215364109259195', '-76.94445490837097', 14, 'roadmap', 1),
(2, NULL, NULL, 'Jr Tumbes', '2885451', 'ajax@ajax.com', 'San Luis', '20170309115002.jpg', '20170309115002', 2, '-12.080076945612944', '-76.99453711509705', '-12.080229068802474', ' -76.9947999715805', 18, 'roadmap', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(128) DEFAULT NULL,
  `url` varchar(128) DEFAULT NULL,
  `descripcion` text,
  `resumen` varchar(256) DEFAULT NULL,
  `orden` bigint(20) UNSIGNED DEFAULT NULL,
  `seo_title` varchar(150) DEFAULT NULL,
  `seo_description` varchar(150) DEFAULT NULL,
  `seo_keywords` varchar(150) DEFAULT NULL,
  `destacado` tinyint(4) NOT NULL DEFAULT '0',
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `categoria_id` bigint(20) UNSIGNED DEFAULT NULL,
  `idioma_id` bigint(20) UNSIGNED DEFAULT NULL,
  `creado` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modificado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `nombre`, `url`, `descripcion`, `resumen`, `orden`, `seo_title`, `seo_description`, `seo_keywords`, `destacado`, `estado`, `categoria_id`, `idioma_id`, `creado`, `modificado`) VALUES
(1, 'Serigrafía', 'serigrafia', '<p>Los regalos serigrafiados con el logo de la empresa son muy populares como productos de publicidad ya que se trata de una t&eacute;cnica de impresi&oacute;n econ&oacute;mica.</p>\r\n', 'Los regalos serigrafiados con el logo de la empresa son muy populares como productos de publicidad ya que se trata de una técnica de impresión económica.', 1, 'Serigrafía', 'Serigrafía', 'Serigrafía', 0, 1, NULL, NULL, '2017-11-20 14:08:24', '2018-01-16 20:46:41'),
(2, 'Tampografía', 'tampografia', '<p>La tampograf&iacute;a es la t&eacute;cnica que mediante sellos de goma llenos de color se imprime la marca de la empresa en los regalos promocionales, con un acabado m&aacute;s n&iacute;tido que por serigraf&iacute;a.</p>\r\n', 'La tampografía es la técnica que mediante sellos de goma llenos de color se imprime la marca de la empresa en los regalos promocionales, con un acabado más nítido que por serigrafía.', 1, 'Tampografía', 'Tampografía', 'sTampografía', 0, 1, NULL, NULL, '2017-11-20 14:08:47', '2018-01-16 20:55:42'),
(3, 'Bordado', 'bordado', '<p>El bordado es una t&eacute;cnica muy popular en productos publicitarios como las gorras, el textil o las bolsas publicitarias donde el logo se cose con hilos de tejido.</p>\r\n', 'El bordado es una técnica muy popular en productos publicitarios como las gorras, el textil o las bolsas publicitarias donde el logo se cose con hilos de tejido.', 1, 'Bordado', 'Bordado', 'Bordado', 0, 1, NULL, NULL, '2017-11-20 14:09:02', '2018-01-16 20:56:10'),
(4, 'Laser', 'laser', '<p>El grabado a l&aacute;ser se puede realizar en regalos de publicidad fabricados en metal o madera, el acabado en muy profesional y el logo impreso es pr&aacute;cticamente imborrable.</p>\r\n', 'El grabado a láser se puede realizar en regalos de publicidad fabricados en metal o madera, el acabado en muy profesional y el logo impreso es prácticamente imborrable.', 1, 'Laser', 'Laser', 'Laser', 0, 1, NULL, NULL, '2017-11-20 14:09:22', '2018-01-16 20:56:26'),
(5, 'Transfer Cerámico', 'transfer-ceramico', '<p>La t&eacute;cnica de impresi&oacute;n por transfer cer&aacute;mico se aplica a tazas y art&iacute;culos promocionales de cer&aacute;mica donde el logo se imprime en una hoja y se transfiere mediante agua.</p>\r\n', 'La técnica de impresión por transfer cerámico se aplica a tazas y artículos promocionales de cerámica donde el logo se imprime en una hoja y se transfiere mediante agua.', 1, 'Transfer Cerámico', 'Transfer Cerámico', 'Transfer Cerámico', 0, 1, NULL, NULL, '2017-11-20 14:09:40', '2018-01-16 20:56:46'),
(6, 'Impresión DIgital', 'impresion-digital', '<p>La impresi&oacute;n digital en el merchandising personalizado se realiza colocando el producto debajo de una impresora digital de cuatro colores que va a imprimir el logotipo.</p>\r\n', 'La impresión digital en el merchandising personalizado se realiza colocando el producto debajo de una impresora digital de cuatro colores que va a imprimir el logotipo.', 1, 'Impresión DIgital', 'Impresión DIgital', 'Impresión DIgital', 0, 1, NULL, NULL, '2017-11-20 14:10:01', '2018-01-16 21:07:49'),
(7, 'Transfer Digital', 'transfer-digital', '<p>Si quieres imprimir productos de merchandising con logotipos de muchos colores, la impresi&oacute;n mediante transfer digital es la soluci&oacute;n ya que permite marcaje de calidad fotogr&aacute;fica del dise&ntilde;o.</p>\r\n', 'Si quieres imprimir productos de merchandising con logotipos de muchos colores, la impresión mediante transfer digital es la solución ya que permite marcaje de calidad fotográfica del diseño.', 1, 'Transfer Digital', 'Transfer Digital', 'Transfer Digital', 0, 1, NULL, NULL, '2018-01-16 14:11:25', '2018-01-16 21:07:59'),
(8, 'Transfer Serigráfico', 'transfer-serigrafico', '<p>M&aacute;s barato que el transfer digital es el transfer serigr&aacute;fico ya que se imprime el logo en una hoja mediante serigraf&iacute;a (que permite de 1 a 8 colores) y luego se transfiere al producto.</p>\r\n', 'Más barato que el transfer digital es el transfer serigráfico ya que se imprime el logo en una hoja mediante serigrafía (que permite de 1 a 8 colores) y luego se transfiere al producto.', 1, 'Transfer Serigráfico', 'Transfer Serigráfico', 'Transfer Serigráfico', 0, 1, NULL, NULL, '2018-01-16 14:21:25', '2018-01-16 21:08:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_productos`
--

CREATE TABLE `solicitud_productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(128) DEFAULT NULL,
  `correo` varchar(256) DEFAULT NULL,
  `telefono` varchar(256) DEFAULT NULL,
  `mensaje` text,
  `respuesta` text,
  `link` varchar(256) DEFAULT NULL,
  `empresa` varchar(128) DEFAULT NULL,
  `ruc` int(11) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '2',
  `creado` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modificado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `producto_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_servicios`
--

CREATE TABLE `solicitud_servicios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(128) DEFAULT NULL,
  `correo` varchar(256) DEFAULT NULL,
  `telefono` varchar(256) DEFAULT NULL,
  `mensaje` text,
  `respuesta` text,
  `link` varchar(256) DEFAULT NULL,
  `empresa` varchar(128) DEFAULT NULL,
  `ruc` int(11) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '2',
  `servicio_id` bigint(20) UNSIGNED NOT NULL,
  `creado` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modificado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `solicitud_servicios`
--

INSERT INTO `solicitud_servicios` (`id`, `nombre`, `correo`, `telefono`, `mensaje`, `respuesta`, `link`, `empresa`, `ruc`, `estado`, `servicio_id`, `creado`, `modificado`) VALUES
(1, 'probando1', 'cesar@gmail.com', '1234567', 'probando1', NULL, NULL, 'probando1', NULL, 2, 1, '2017-11-23 15:48:24', '2017-11-23 15:48:24'),
(2, 'probando1', 'cesar.9151@gmail.com', '1234567', 'probando1', NULL, NULL, 'probando1', NULL, 2, 1, '2017-11-23 16:21:23', '2017-11-23 16:21:23'),
(3, 'prueba1', 'cesar.9151@gmail.com', '12354', 'qqqqqqq', NULL, NULL, 'prueba', NULL, 2, 2, '2017-11-24 15:33:17', '2017-11-24 15:33:17'),
(4, 'prueba2', 'cesar.9151@gmail.com', '1234567', 'prueba2', NULL, NULL, 'prueba2', NULL, 2, 2, '2017-11-24 15:52:41', '2017-11-24 15:52:41'),
(5, 'prueba3', 'cesar.9151@gmail.com', '1234567', 'prueba3', NULL, NULL, 'prueba3', NULL, 2, 1, '2017-11-24 16:52:24', '2017-11-24 16:52:24'),
(6, 'prueba1', 'cesar.9151@gmail.com', '12354', 'qqqqqqqq', NULL, NULL, 'prueba', NULL, 2, 1, '2017-11-25 10:40:15', '2017-11-25 10:40:15'),
(7, 'prueba1', 'prueba1@gmail.com', 'prueba1', 'prueba1', NULL, NULL, 'prueba1', NULL, 2, 1, '2017-12-18 15:27:03', '2017-12-18 21:27:03'),
(8, 'prueba1', 'prueba1@gmail.com', '12354', 'prueba2', NULL, NULL, 'prueba', NULL, 2, 1, '2017-12-18 15:37:22', '2017-12-18 21:37:22'),
(9, 'prueba2', 'prueba1@gmail.com', '12354', 'prueba2', NULL, NULL, 'prueba', NULL, 2, 1, '2017-12-18 15:37:45', '2017-12-18 21:37:45'),
(10, 'prueba3', 'prueba3@gmail.com', '1234567', 'prueba3', NULL, NULL, 'prueba3', NULL, 2, 1, '2017-12-18 15:39:03', '2017-12-18 21:39:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_atributos`
--

CREATE TABLE `stock_atributos` (
  `id` bigint(20) NOT NULL,
  `cantidad` bigint(20) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `detalle_atributos_id` bigint(20) UNSIGNED NOT NULL,
  `productos_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_atributos_multiples`
--

CREATE TABLE `stock_atributos_multiples` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cantidad` bigint(20) UNSIGNED DEFAULT NULL,
  `atributos` varchar(128) NOT NULL,
  `precio` float UNSIGNED DEFAULT NULL,
  `precio_oferta` float UNSIGNED DEFAULT NULL,
  `atributos_nombres` varchar(128) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `producto_id` bigint(20) UNSIGNED DEFAULT NULL,
  `creado` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modificado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `stock_atributos_multiples`
--

INSERT INTO `stock_atributos_multiples` (`id`, `cantidad`, `atributos`, `precio`, `precio_oferta`, `atributos_nombres`, `estado`, `producto_id`, `creado`, `modificado`) VALUES
(7, 10, '4', 10, 8, '#FF0000', 1, 17, '2017-11-23 14:52:37', '2017-11-23 14:52:37'),
(8, 10, '22', 10, 9, '#191818', 1, 17, '2017-11-23 14:52:37', '2017-11-23 14:52:37'),
(13, 20, '5', 15, 13, '#000033', 1, 18, '2017-11-27 10:30:06', '2017-11-27 10:30:06'),
(14, 21, '23', 16, 14, '#bf5938', 1, 18, '2017-11-27 10:30:06', '2017-11-27 10:30:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscriptores`
--

CREATE TABLE `suscriptores` (
  `id` int(10) UNSIGNED NOT NULL,
  `correo` varchar(125) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `suscriptores`
--

INSERT INTO `suscriptores` (`id`, `correo`, `estado`, `creado`) VALUES
(1, 'prueba@hotmail.com', 1, '2017-11-29 21:26:39'),
(2, 'prueba2@hotmail.com', 1, '2017-11-29 21:49:39'),
(3, 'prueba3@hotmail.com', 1, '2017-11-29 22:11:09'),
(4, 'prueba4@hotmail.com', 1, '2017-11-29 22:17:39'),
(5, 'prueba5@hotmail.com', 1, '2017-11-29 22:19:24'),
(6, 'prueba6@hotmail.com', 1, '2017-11-29 22:21:53'),
(7, 'prueba7@hotmail.com', 1, '2017-11-30 16:50:17'),
(8, 'prueba8@hotmail.com', 1, '2017-11-30 16:52:30'),
(9, 'yolandaperezrodriguez5@gmail.com', 1, '2018-03-02 17:09:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testimonios`
--

CREATE TABLE `testimonios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(128) DEFAULT NULL,
  `testimonio` text,
  `imagen` varchar(128) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `idioma_id` bigint(20) UNSIGNED DEFAULT NULL,
  `creado` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modificado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `testimonios`
--

INSERT INTO `testimonios` (`id`, `nombre`, `testimonio`, `imagen`, `estado`, `idioma_id`, `creado`, `modificado`) VALUES
(1, 'Juan Perez', 'Testimonio1', 'foto01.jpg', 1, 1, '2017-01-10 10:50:20', '2017-07-10 10:50:20'),
(2, 'jose P', 'Testimonio2', 'foto02.jpg', 1, 1, '2017-02-10 10:50:20', '2017-06-10 10:50:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_banners`
--

CREATE TABLE `tipo_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_tipo` varchar(64) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_banners`
--

INSERT INTO `tipo_banners` (`id`, `nombre_tipo`, `estado`) VALUES
(1, 'general', 1),
(2, 'promociones', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_categorias`
--

CREATE TABLE `tipo_categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(128) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_categorias`
--

INSERT INTO `tipo_categorias` (`id`, `nombre`, `estado`) VALUES
(1, 'productos', 1),
(2, 'servicios', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(128) DEFAULT NULL,
  `usuario` varchar(128) NOT NULL,
  `password` varchar(64) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `activo` tinyint(4) NOT NULL DEFAULT '1',
  `nivel_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `estado`, `activo`, `nivel_id`) VALUES
(1, 'Administrador', 'admin', '$2y$10$EkmWRqZT8CJw80n3YSFQD.zf1muVABiX4Wqc4VoeEZJYN9O6wIxc2', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(128) DEFAULT NULL,
  `codigo_video` varchar(128) DEFAULT NULL,
  `video_title` varchar(128) DEFAULT NULL,
  `descripcion` text,
  `orden` bigint(20) UNSIGNED DEFAULT NULL,
  `destacado` tinyint(4) DEFAULT '0',
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `ruta_amazon` varchar(256) DEFAULT NULL,
  `album_id` bigint(20) UNSIGNED NOT NULL,
  `idioma_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `videos`
--

INSERT INTO `videos` (`id`, `nombre`, `codigo_video`, `video_title`, `descripcion`, `orden`, `destacado`, `estado`, `ruta_amazon`, `album_id`, `idioma_id`) VALUES
(1, 'video01', 'zBP4fIHHzW8', 'video01', 'descripcion video1', 1, 0, 1, NULL, 1, 1),
(2, 'video02', 'vKi37Mf5Icg', 'video02', 'descripcion video2', 2, 0, 1, NULL, 1, 1),
(3, 'video03', 'pbmMwv94NRM', 'video03', 'descripcion video3', 3, 0, 1, NULL, 1, 1),
(4, 'video04', 'vbrmRc0If0s', 'video04', 'descripcion video1', 1, 0, 1, NULL, 2, 1),
(5, 'video05', 'v4qyzX2q01g', 'video05', 'descripcion video2', 2, 0, 1, NULL, 2, 1),
(6, 'video06', 'pbmMwv94NRM', 'video06', 'descripcion video3', 3, 0, 1, NULL, 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `albumes_fotos`
--
ALTER TABLE `albumes_fotos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_albumes_idiomas1_idx` (`idioma_id`);

--
-- Indices de la tabla `albumes_videos`
--
ALTER TABLE `albumes_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_albumes_idiomas2_idx` (`idioma_id`);

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_articulos_idiomas1_idx` (`idioma_id`);

--
-- Indices de la tabla `atributos`
--
ALTER TABLE `atributos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_banners_tipo_banners1_idx` (`tipo_banner_id`);

--
-- Indices de la tabla `carritos`
--
ALTER TABLE `carritos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_carro_clientes1_idx` (`cliente_id`);

--
-- Indices de la tabla `carro_detalle`
--
ALTER TABLE `carro_detalle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_carro_detalle_productos1_idx` (`producto_id`),
  ADD KEY `fk_carro_detalle_carro1_idx` (`carrito_id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categorias_categorias1_idx` (`padre_id`),
  ADD KEY `fk_categorias_tipo_categorias1_idx` (`tipo_categoria_id`);

--
-- Indices de la tabla `categorias_productos`
--
ALTER TABLE `categorias_productos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_categorias_productos_productos1_idx` (`producto_id`),
  ADD KEY `fk_categorias_productos_categorias1_idx` (`categoria_id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_clientes_idiomas1_idx` (`idioma_id`),
  ADD KEY `fk_clientes_estados1_idx` (`estado_id`);

--
-- Indices de la tabla `clientes_web`
--
ALTER TABLE `clientes_web`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo_UNIQUE` (`correo`),
  ADD KEY `fk_clientes_web_idiomas1_idx` (`idioma_id`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comentarios_idiomas1_idx` (`idioma_id`),
  ADD KEY `fk_comentarios_articulos1_idx` (`articulo_id`);

--
-- Indices de la tabla `configuraciones`
--
ALTER TABLE `configuraciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_atributos`
--
ALTER TABLE `detalle_atributos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detalle_atributos_atributos1_idx` (`atributo_id`);

--
-- Indices de la tabla `detalle_cotizacion`
--
ALTER TABLE `detalle_cotizacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detalle_cotizacion_productos1_idx` (`producto_id`),
  ADD KEY `fk_detalle_cotizacion_cotizaciones1_idx` (`cotizacion_id`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo_UNIQUE` (`ubigeo`),
  ADD KEY `fk_estados_paises1_idx` (`pais_id`);

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_fotos_albumes1_idx` (`album_id`),
  ADD KEY `fk_fotos_idiomas1_idx` (`idioma_id`);

--
-- Indices de la tabla `fotos_proyecto`
--
ALTER TABLE `fotos_proyecto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_fotos_proyecto_galerias_proyecto1_idx` (`galeria_proyecto_id`),
  ADD KEY `fk_fotos_proyecto_idiomas1_idx` (`idioma_id`);

--
-- Indices de la tabla `galerias_proyecto`
--
ALTER TABLE `galerias_proyecto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_galeria_proyectos_proyectos1_idx` (`proyecto_id`),
  ADD KEY `fk_galeria_proyectos_idiomas1_idx` (`idioma_id`);

--
-- Indices de la tabla `galeria_articulos`
--
ALTER TABLE `galeria_articulos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_galeria_articulos_articulos1_idx` (`articulo_id`);

--
-- Indices de la tabla `galeria_productos`
--
ALTER TABLE `galeria_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_galerias_productos1_idx` (`producto_id`);

--
-- Indices de la tabla `galeria_servicios`
--
ALTER TABLE `galeria_servicios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_galeria_servicios_servicios1_idx` (`servicios_id`);

--
-- Indices de la tabla `idiomas`
--
ALTER TABLE `idiomas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `niveles`
--
ALTER TABLE `niveles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo_UNIQUE` (`codigo`);

--
-- Indices de la tabla `preguntas_frecuentes`
--
ALTER TABLE `preguntas_frecuentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_preguntas_frecuentes_idiomas1_idx` (`idioma_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_productos_categorias1_idx` (`categoria_id`);

--
-- Indices de la tabla `productos_atributos`
--
ALTER TABLE `productos_atributos`
  ADD PRIMARY KEY (`productos_id`,`atributos_multiples_id`),
  ADD KEY `fk_productos_has_stock_atributos_multiples_stock_atributos__idx` (`atributos_multiples_id`),
  ADD KEY `fk_productos_has_stock_atributos_multiples_productos1_idx` (`productos_id`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_proyectos_idiomas1_idx` (`idioma_id`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_servicios_categorias1_idx` (`categoria_id`),
  ADD KEY `fk_servicios_idiomas1_idx` (`idioma_id`);

--
-- Indices de la tabla `solicitud_productos`
--
ALTER TABLE `solicitud_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_solicitud_productos_productos1_idx` (`producto_id`);

--
-- Indices de la tabla `solicitud_servicios`
--
ALTER TABLE `solicitud_servicios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_solicitud_informacion_servicios1_idx` (`servicio_id`);

--
-- Indices de la tabla `stock_atributos`
--
ALTER TABLE `stock_atributos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_stock_atributos_detalle_atributos1_idx` (`detalle_atributos_id`),
  ADD KEY `fk_stock_atributos_productos1_idx` (`productos_id`);

--
-- Indices de la tabla `stock_atributos_multiples`
--
ALTER TABLE `stock_atributos_multiples`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_stock_detalle_atributo_productos1_idx` (`producto_id`);

--
-- Indices de la tabla `suscriptores`
--
ALTER TABLE `suscriptores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `testimonios`
--
ALTER TABLE `testimonios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Testimonios_idiomas1_idx` (`idioma_id`);

--
-- Indices de la tabla `tipo_banners`
--
ALTER TABLE `tipo_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_categorias`
--
ALTER TABLE `tipo_categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario_UNIQUE` (`usuario`),
  ADD KEY `fk_usuarios_niveles1_idx` (`nivel_id`);

--
-- Indices de la tabla `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_videos_albumes1_idx` (`album_id`),
  ADD KEY `fk_videos_idiomas1_idx` (`idioma_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `albumes_fotos`
--
ALTER TABLE `albumes_fotos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `albumes_videos`
--
ALTER TABLE `albumes_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `atributos`
--
ALTER TABLE `atributos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `carritos`
--
ALTER TABLE `carritos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `carro_detalle`
--
ALTER TABLE `carro_detalle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `categorias_productos`
--
ALTER TABLE `categorias_productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `clientes_web`
--
ALTER TABLE `clientes_web`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `configuraciones`
--
ALTER TABLE `configuraciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `detalle_atributos`
--
ALTER TABLE `detalle_atributos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `detalle_cotizacion`
--
ALTER TABLE `detalle_cotizacion`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `fotos_proyecto`
--
ALTER TABLE `fotos_proyecto`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `galerias_proyecto`
--
ALTER TABLE `galerias_proyecto`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `galeria_articulos`
--
ALTER TABLE `galeria_articulos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `galeria_productos`
--
ALTER TABLE `galeria_productos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=265;

--
-- AUTO_INCREMENT de la tabla `galeria_servicios`
--
ALTER TABLE `galeria_servicios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `idiomas`
--
ALTER TABLE `idiomas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `niveles`
--
ALTER TABLE `niveles`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `preguntas_frecuentes`
--
ALTER TABLE `preguntas_frecuentes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=276;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `sedes`
--
ALTER TABLE `sedes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `solicitud_productos`
--
ALTER TABLE `solicitud_productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `solicitud_servicios`
--
ALTER TABLE `solicitud_servicios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `stock_atributos`
--
ALTER TABLE `stock_atributos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `stock_atributos_multiples`
--
ALTER TABLE `stock_atributos_multiples`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `suscriptores`
--
ALTER TABLE `suscriptores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `testimonios`
--
ALTER TABLE `testimonios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_banners`
--
ALTER TABLE `tipo_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_categorias`
--
ALTER TABLE `tipo_categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `albumes_fotos`
--
ALTER TABLE `albumes_fotos`
  ADD CONSTRAINT `fk_albumes_idiomas1` FOREIGN KEY (`idioma_id`) REFERENCES `idiomas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `albumes_videos`
--
ALTER TABLE `albumes_videos`
  ADD CONSTRAINT `fk_albumes_idiomas2` FOREIGN KEY (`idioma_id`) REFERENCES `idiomas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `fk_articulos_idiomas1` FOREIGN KEY (`idioma_id`) REFERENCES `idiomas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `banners`
--
ALTER TABLE `banners`
  ADD CONSTRAINT `fk_banners_tipo_banners1` FOREIGN KEY (`tipo_banner_id`) REFERENCES `tipo_banners` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `carritos`
--
ALTER TABLE `carritos`
  ADD CONSTRAINT `fk_carro_clientes1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `carro_detalle`
--
ALTER TABLE `carro_detalle`
  ADD CONSTRAINT `fk_carro_detalle_carro1` FOREIGN KEY (`carrito_id`) REFERENCES `carritos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_carro_detalle_productos1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD CONSTRAINT `fk_categorias_categorias1` FOREIGN KEY (`padre_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_categorias_tipo_categorias1` FOREIGN KEY (`tipo_categoria_id`) REFERENCES `tipo_categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `categorias_productos`
--
ALTER TABLE `categorias_productos`
  ADD CONSTRAINT `fk_categorias_productos_categorias1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_categorias_productos_productos1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_clientes_estados1` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_clientes_idiomas1` FOREIGN KEY (`idioma_id`) REFERENCES `idiomas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `clientes_web`
--
ALTER TABLE `clientes_web`
  ADD CONSTRAINT `fk_clientes_web_idiomas1` FOREIGN KEY (`idioma_id`) REFERENCES `idiomas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `fk_comentarios_articulos1` FOREIGN KEY (`articulo_id`) REFERENCES `articulos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comentarios_idiomas1` FOREIGN KEY (`idioma_id`) REFERENCES `idiomas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_atributos`
--
ALTER TABLE `detalle_atributos`
  ADD CONSTRAINT `fk_detalle_atributos_atributos1` FOREIGN KEY (`atributo_id`) REFERENCES `atributos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_cotizacion`
--
ALTER TABLE `detalle_cotizacion`
  ADD CONSTRAINT `fk_detalle_cotizacion_cotizaciones1` FOREIGN KEY (`cotizacion_id`) REFERENCES `cotizaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_cotizacion_productos1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estados`
--
ALTER TABLE `estados`
  ADD CONSTRAINT `fk_estados_paises1` FOREIGN KEY (`pais_id`) REFERENCES `paises` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD CONSTRAINT `fk_fotos_albumes1` FOREIGN KEY (`album_id`) REFERENCES `albumes_fotos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_fotos_idiomas1` FOREIGN KEY (`idioma_id`) REFERENCES `idiomas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `fotos_proyecto`
--
ALTER TABLE `fotos_proyecto`
  ADD CONSTRAINT `fk_fotos_proyecto_galerias_proyecto1` FOREIGN KEY (`galeria_proyecto_id`) REFERENCES `galerias_proyecto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_fotos_proyecto_idiomas1` FOREIGN KEY (`idioma_id`) REFERENCES `idiomas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `galerias_proyecto`
--
ALTER TABLE `galerias_proyecto`
  ADD CONSTRAINT `fk_galeria_proyectos_idiomas1` FOREIGN KEY (`idioma_id`) REFERENCES `idiomas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_galeria_proyectos_proyectos1` FOREIGN KEY (`proyecto_id`) REFERENCES `proyectos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `galeria_articulos`
--
ALTER TABLE `galeria_articulos`
  ADD CONSTRAINT `fk_galeria_articulos_articulos1` FOREIGN KEY (`articulo_id`) REFERENCES `articulos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `galeria_productos`
--
ALTER TABLE `galeria_productos`
  ADD CONSTRAINT `fk_galerias_productos1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `galeria_servicios`
--
ALTER TABLE `galeria_servicios`
  ADD CONSTRAINT `fk_galeria_servicios_servicios1` FOREIGN KEY (`servicios_id`) REFERENCES `servicios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `preguntas_frecuentes`
--
ALTER TABLE `preguntas_frecuentes`
  ADD CONSTRAINT `fk_preguntas_frecuentes_idiomas1` FOREIGN KEY (`idioma_id`) REFERENCES `idiomas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_productos_categorias1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos_atributos`
--
ALTER TABLE `productos_atributos`
  ADD CONSTRAINT `fk_productos_has_stock_atributos_multiples_productos1` FOREIGN KEY (`productos_id`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_productos_has_stock_atributos_multiples_stock_atributos_mu1` FOREIGN KEY (`atributos_multiples_id`) REFERENCES `stock_atributos_multiples` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD CONSTRAINT `fk_proyectos_idiomas1` FOREIGN KEY (`idioma_id`) REFERENCES `idiomas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD CONSTRAINT `fk_servicios_categorias1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_servicios_idiomas1` FOREIGN KEY (`idioma_id`) REFERENCES `idiomas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `solicitud_productos`
--
ALTER TABLE `solicitud_productos`
  ADD CONSTRAINT `fk_solicitud_productos_productos1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `solicitud_servicios`
--
ALTER TABLE `solicitud_servicios`
  ADD CONSTRAINT `fk_solicitud_informacion_servicios1` FOREIGN KEY (`servicio_id`) REFERENCES `servicios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `stock_atributos`
--
ALTER TABLE `stock_atributos`
  ADD CONSTRAINT `fk_stock_atributos_detalle_atributos1` FOREIGN KEY (`detalle_atributos_id`) REFERENCES `detalle_atributos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_stock_atributos_productos1` FOREIGN KEY (`productos_id`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `stock_atributos_multiples`
--
ALTER TABLE `stock_atributos_multiples`
  ADD CONSTRAINT `fk_stock_detalle_atributo_productos1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `testimonios`
--
ALTER TABLE `testimonios`
  ADD CONSTRAINT `fk_Testimonios_idiomas1` FOREIGN KEY (`idioma_id`) REFERENCES `idiomas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_niveles1` FOREIGN KEY (`nivel_id`) REFERENCES `niveles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `fk_videos_albumes1` FOREIGN KEY (`album_id`) REFERENCES `albumes_videos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_videos_idiomas1` FOREIGN KEY (`idioma_id`) REFERENCES `idiomas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
