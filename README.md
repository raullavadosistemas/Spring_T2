"# Sprint_01" 
Base de Datos
Create database bdproyecto
DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(100) NOT NULL,
  `estado` enum('0','1') NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_categoria`),
  KEY `fk_categoria_usuarios_idx` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `categoria`, `estado`, `id_usuario`) VALUES
(2, 'clavos', '1', 1),
(6, 'socalos', '1', 1),
(7, 'cementos', '1', 1),
(9, 'tuberias', '1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `dni_cliente` varchar(100) NOT NULL,
  `nombre_cliente` varchar(100) NOT NULL,
  `apellido_cliente` varchar(100) NOT NULL,
  `telefono_cliente` varchar(100) NOT NULL,
  `correo_cliente` varchar(100) NOT NULL,
  `direccion_cliente` varchar(100) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `estado` enum('0','1') NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_cliente`),
  KEY `fk_clientes_usuario_idx` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `dni_cliente`, `nombre_cliente`, `apellido_cliente`, `telefono_cliente`, `correo_cliente`, `direccion_cliente`, `fecha_ingreso`, `estado`, `id_usuario`) VALUES
(5, '159966666', 'Jorge', 'Rodriguez', '459966666', 'jorge@gmail.com', 'california', '2018-02-05', '1', 1),
(6, '45', 'karla', 'rodriguez', '789', 'karla@gmail.com', 'chicago', '2018-02-13', '1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

DROP TABLE IF EXISTS `compras`;
CREATE TABLE IF NOT EXISTS `compras` (
  `id_compras` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_compra` date NOT NULL,
  `numero_compra` varchar(100) NOT NULL,
  `proveedor` varchar(100) NOT NULL,
  `dni_proveedor` varchar(100) NOT NULL,
  `comprador` varchar(100) NOT NULL,
  `moneda` varchar(100) NOT NULL,
  `subtotal` varchar(100) NOT NULL,
  `total_iva` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `tipo_pago` varchar(100) NOT NULL,
  `estado` enum('0','1') NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  PRIMARY KEY (`id_compras`),
  KEY `fk_compras_usuario_idx` (`id_usuario`),
  KEY `fk_compras_proveedor_idx` (`id_proveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id_compras`, `fecha_compra`, `numero_compra`, `proveedor`, `dni_proveedor`, `comprador`, `moneda`, `subtotal`, `total_iva`, `total`, `tipo_pago`, `estado`, `id_usuario`, `id_proveedor`) VALUES
(3, '2020-09-10', 'F000001', 'Unique SAC', '14789', 'eyter', 'S/.', '12.52', '3', '16', 'EFECTIVO', '0', 1, 3),
(4, '2020-09-13', 'F000002', 'Datcomm SAC', '10065789', 'raul', 'EUR', '40.54', '8', '49', 'EFECTIVO', '1', 3, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compras`
--

DROP TABLE IF EXISTS `detalle_compras`;
CREATE TABLE IF NOT EXISTS `detalle_compras` (
  `id_detalle_compras` int(11) NOT NULL AUTO_INCREMENT,
  `numero_compra` varchar(100) NOT NULL,
  `dni_proveedor` varchar(100) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `producto` varchar(100) NOT NULL,
  `moneda` varchar(100) NOT NULL,
  `precio_compra` varchar(100) NOT NULL,
  `cantidad_compra` varchar(100) NOT NULL,
  `descuento` varchar(100) NOT NULL,
  `importe` varchar(100) NOT NULL,
  `fecha_compra` date NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `estado` enum('0','1') NOT NULL,
  `id_categoria` int(11) NOT NULL,
  PRIMARY KEY (`id_detalle_compras`),
  KEY `fk_detalle_compras_producto_idx` (`id_producto`),
  KEY `fk_detalle_compras_usuario_idx` (`id_usuario`),
  KEY `fk_detalle_compras_proveedor_idx` (`id_proveedor`),
  KEY `fk_detalle_compras_categoria_idx` (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_compras`
--

INSERT INTO `detalle_compras` (`id_detalle_compras`, `numero_compra`, `dni_proveedor`, `id_producto`, `producto`, `moneda`, `precio_compra`, `cantidad_compra`, `descuento`, `importe`, `fecha_compra`, `id_usuario`, `id_proveedor`, `estado`, `id_categoria`) VALUES
(24, 'F000001', '14789', 11, 'Clavos de cementos', 'S/.', '12.52', '1', '0', '12.52', '2020-09-10', 1, 3, '0', 2),
(25, 'F000002', '10065789', 11, 'Clavos de cementos', 'S/.', '12.52', '2', '0', '25.04', '2020-09-13', 3, 18, '1', 2),
(26, 'F000002', '10065789', 16, 'Sol', 'EUR', '15.5', '1', '0', '15.5', '2020-09-13', 3, 18, '1', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ventas`
--

DROP TABLE IF EXISTS `detalle_ventas`;
CREATE TABLE IF NOT EXISTS `detalle_ventas` (
  `id_detalle_ventas` int(11) NOT NULL AUTO_INCREMENT,
  `numero_venta` varchar(100) NOT NULL,
  `dni_cliente` varchar(100) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `producto` varchar(100) NOT NULL,
  `moneda` varchar(100) NOT NULL,
  `precio_venta` varchar(100) NOT NULL,
  `cantidad_venta` varchar(100) NOT NULL,
  `descuento` varchar(100) NOT NULL,
  `importe` varchar(100) NOT NULL,
  `fecha_venta` date NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `estado` enum('0','1') NOT NULL,
  PRIMARY KEY (`id_detalle_ventas`),
  KEY `fk_detalle_ventas_producto_idx` (`id_producto`),
  KEY `fk_detalle_ventas_usuario_idx` (`id_usuario`),
  KEY `fk_detalle_ventas_clientes_idx` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

DROP TABLE IF EXISTS `empresa`;
CREATE TABLE IF NOT EXISTS `empresa` (
  `id_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `dni_empresa` varchar(100) NOT NULL,
  `nombre_empresa` varchar(100) NOT NULL,
  `direccion_empresa` varchar(100) NOT NULL,
  `correo_empresa` varchar(100) NOT NULL,
  `telefono_empresa` varchar(100) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_empresa`),
  KEY `fk_empresa_usuario_idx` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `dni_empresa`, `nombre_empresa`, `direccion_empresa`, `correo_empresa`, `telefono_empresa`, `id_usuario`) VALUES
(1, '1223459988', 'eyter', 'california san jose', 'eyterdaniel@gmail.com', '12899665588', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

DROP TABLE IF EXISTS `permisos`;
CREATE TABLE IF NOT EXISTS `permisos` (
  `id_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id_permiso`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id_permiso`, `nombre`) VALUES
(1, 'Categoria'),
(2, 'Productos'),
(3, 'Proveedores'),
(4, 'Compras'),
(5, 'Clientes'),
(6, 'Ventas'),
(7, 'Reporte de Compras'),
(8, 'Reporte de Ventas'),
(9, 'Usuarios'),
(10, 'Empresa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) NOT NULL,
  `producto` varchar(100) NOT NULL,
  `presentacion` varchar(100) NOT NULL,
  `unidad` varchar(45) NOT NULL,
  `moneda` varchar(45) NOT NULL,
  `precio_compra` varchar(45) NOT NULL,
  `precio_venta` varchar(45) NOT NULL,
  `stock` varchar(45) NOT NULL,
  `estado` enum('0','1') NOT NULL,
  `imagen` varchar(45) NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `fk_producto_categoria_idx` (`id_categoria`),
  KEY `fk_producto_usuario_idx` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `id_categoria`, `producto`, `presentacion`, `unidad`, `moneda`, `precio_compra`, `precio_venta`, `stock`, `estado`, `imagen`, `fecha_vencimiento`, `id_usuario`) VALUES
(11, 2, 'Clavos de cementos', 'Saco', 'kilo', 'S/.', '12.52', '15', '2', '1', '946043822.png', '2020-09-09', 1),
(15, 7, 'caño', 'Caja', 'Gramo', 'S/.', '15.28', '15.48', '0', '1', '576985623.png', '2020-09-17', 1),
(16, 6, 'Sol', 'Saco', 'Kilo', 'EUR', '15.5', '25.50', '1', '1', '31949919.png', '2020-09-17', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE IF NOT EXISTS `proveedor` (
  `id_proveedor` int(11) NOT NULL AUTO_INCREMENT,
  `dni` varchar(45) NOT NULL,
  `razon_social` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `fecha` date NOT NULL,
  `estado` enum('0','1') NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_proveedor`),
  KEY `fk_proveedor_usuario_idx` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `dni`, `razon_social`, `telefono`, `correo`, `direccion`, `fecha`, `estado`, `id_usuario`) VALUES
(3, '14789', 'Unique SAC', '12399888', 'unic@gmail.com', 'Lima Central', '2018-01-29', '1', 1),
(18, '10065789', 'Datcomm SAC', '98797979', 'datcom@gmail.com', 'el aire', '2020-09-02', '1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `dni` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `cargo` enum('0','1') NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `password2` varchar(100) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `estado` enum('0','1') NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombres`, `apellidos`, `dni`, `telefono`, `correo`, `direccion`, `cargo`, `usuario`, `password`, `password2`, `fecha_ingreso`, `estado`) VALUES
(1, 'eyter', 'higuera', '1', '123456', 'eyter@gmail.com', 'san jose', '1', 'daniel', 'Qw/*12345678', 'Qw/*12345678', '2017-12-26', '1'),
(2, 'alejandro', 'perez', '12', '12968566', 'alejandro@gmail.com', 'california', '0', 'alejandro', 'Qw/*12345678', 'Qw/*12345678', '2018-02-13', '1'),
(3, 'raul', 'lavado', '70283557', '934520062', 'raul@hotmail.com', 'Condominio sol de retablo', '1', 'rlavado', 'Noah@01041995', 'Noah@01041995', '2020-09-01', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_permiso`
--

DROP TABLE IF EXISTS `usuario_permiso`;
CREATE TABLE IF NOT EXISTS `usuario_permiso` (
  `id_usuario_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_permiso` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario_permiso`),
  KEY `fk_usuario_permiso_usuario_idx` (`id_usuario`),
  KEY `fk_usuario_permiso_permiso_idx` (`id_permiso`)
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario_permiso`
--

INSERT INTO `usuario_permiso` (`id_usuario_permiso`, `id_usuario`, `id_permiso`) VALUES
(32, 2, 1),
(33, 2, 2),
(101, 1, 2),
(102, 1, 3),
(103, 1, 4),
(104, 1, 5),
(105, 1, 6),
(106, 1, 7),
(107, 1, 8),
(108, 1, 9),
(109, 1, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

DROP TABLE IF EXISTS `ventas`;
CREATE TABLE IF NOT EXISTS `ventas` (
  `id_ventas` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_venta` date NOT NULL,
  `numero_venta` varchar(100) NOT NULL,
  `cliente` varchar(100) NOT NULL,
  `dni_cliente` varchar(100) NOT NULL,
  `vendedor` varchar(100) NOT NULL,
  `moneda` varchar(100) NOT NULL,
  `subtotal` varchar(100) NOT NULL,
  `total_iva` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `tipo_pago` varchar(100) NOT NULL,
  `estado` enum('0','1') NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  PRIMARY KEY (`id_ventas`),
  KEY `fk_ventas_usuario_idx` (`id_usuario`),
  KEY `fk_ventas_cliente_idx` (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_ventas`, `fecha_venta`, `numero_venta`, `cliente`, `dni_cliente`, `vendedor`, `moneda`, `subtotal`, `total_iva`, `total`, `tipo_pago`, `estado`, `id_usuario`, `id_cliente`) VALUES
(2, '2018-02-07', 'F000001', 'Jorge', '159966666', 'eyter', 'USD$', '200', '40', '240', 'EFECTIVO', '1', 1, 5),
(3, '2018-02-07', 'F000002', 'Jorge', '159966666', 'eyter', 'USD$', '490', '98', '588', 'EFECTIVO', '1', 1, 5);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `fk_categoria_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_clientes_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `fk_compras_proveedor` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id_proveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_compras_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_compras`
--
ALTER TABLE `detalle_compras`
  ADD CONSTRAINT `fk_detalle_compras_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_compras_producto` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_compras_proveedor` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id_proveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_compras_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  ADD CONSTRAINT `fk_detalle_ventas_clientes` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_ventas_producto` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_ventas_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `fk_empresa_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_producto_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producto_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `fk_proveedor_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  ADD CONSTRAINT `fk_usuario_permiso_permiso` FOREIGN KEY (`id_permiso`) REFERENCES `permisos` (`id_permiso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_permiso_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `fk_ventas_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ventas_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;
