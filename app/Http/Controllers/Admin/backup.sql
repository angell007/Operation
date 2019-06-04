
-- CREATE TABLE `articulos` (
--   `id` int(10) UNSIGNED NOT NULL,
--   `servicio_id` int(10) UNSIGNED DEFAULT NULL,
--   `tipo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `marca` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `modelo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `serie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `imei1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `imei2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `almacen_compra` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `numero_factura_compra` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `numero_vertificado_garantia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id`, `servicio_id`, `tipo`, `marca`, `modelo`, `serie`, `imei1`, `imei2`, `almacen_compra`, `numero_factura_compra`, `numero_vertificado_garantia`, `created_at`, `updated_at`) VALUES
(6, 4, 'otro', 'Lg', '12345-123', '123Af', '123', '233', 'Desconocido', '11011111', '10101000', '2019-04-29 07:51:23', '2019-04-29 16:52:34'),
(8, 7, NULL, 'LG', '43UK6200PDB', '901MXC5638JK', NULL, NULL, 'LG Electronics', 'CARTA CAMBIO', NULL, '2019-04-30 02:30:27', '2019-04-30 02:30:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

-- CREATE TABLE `cargos` (
--   `id` int(10) UNSIGNED NOT NULL,
--   `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cargos`
--

-- INSERT INTO `cargos` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
-- (2, 'Tecnico', 'Tecnico de planta 24/7', '2019-04-25 23:34:56', '2019-04-25 23:34:56'),
-- (3, 'Auxiliar Call Center', 'Realizar llamadas de seguimiento y satisfaccion a los clientes despues de terminados los servicios.', '2019-04-27 03:04:16', '2019-04-27 03:04:16'),
-- (4, 'Recepcionista', 'Persona encargada de recepción de productos y toma de servicios y/o solicitudes', '2019-04-30 02:06:59', '2019-04-30 02:06:59'),
-- (5, 'Administrador', 'Administrador del CSA', '2019-04-30 02:07:22', '2019-04-30 02:07:22'),
-- (6, 'Gerente', 'Gerente encargado del CSA', '2019-04-30 02:07:36', '2019-04-30 02:07:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

-- CREATE TABLE `categorias` (
--   `id` int(10) UNSIGNED NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

-- CREATE TABLE `clientes` (
--   `id` int(10) UNSIGNED NOT NULL,
--   `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `apellido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `sexo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `identificacion` int(10) UNSIGNED NOT NULL,
--   `tipo_identificacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `ciudad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `departamento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `tipo_casa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `barrio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `opcional_telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `name`, `apellido`, `sexo`, `email`, `identificacion`, `tipo_identificacion`, `ciudad`, `departamento`, `direccion`, `tipo_casa`, `barrio`, `telefono`, `opcional_telefono`, `created_at`, `updated_at`) VALUES
(3, 'Carmen', 'Castillo', 'Mujer', 'carmencastillo@gmail.com', 37926256, '1', 'Barrancabermeja', 'Santander', 'Calle 54 # 21-34', 'Casa', 'Palmira', '3214145111', NULL, '2019-04-27 03:13:11', '2019-04-27 03:13:11'),
(4, 'Fernando', 'Castillo', 'Hombre', 'fernandogomez@hotmail.com', 13245234, '1', 'Yondo', 'Antioquia', 'Cra 23 # 12 -34', 'Casa', 'Gaitan', '3013452714', NULL, '2019-04-27 03:33:49', '2019-04-27 03:33:49'),
(5, 'Mauricio', 'Cardenas', 'Hombre', 'mauriciocardenas@hotmail.com', 1096214563, '1', 'Barrancabermeja', 'Santander', 'Dg 87 # 12-34', 'Casa', 'Buenos Aires', '3116785431', NULL, '2019-04-27 03:39:06', '2019-04-27 03:39:06'),
(6, 'Angell', 'Dark', 'Hombre', 'a1ngellphp@gmail.com', 1096216532, '3', 'Barrancabermeja', 'Santander', 'Sur', 'Apartamento', 'Brisas', '3172603279', NULL, '2019-04-29 04:11:26', '2019-04-29 17:22:05'),
(7, 'Lizeth', 'Carreño', 'Mujer', 'lizethcarre@hotmail.com', 123456789, '1', 'Barrancabermeja', 'SANTANDER', 'El Centro', 'Apartamento', 'Laureles', '3017865432', NULL, '2019-04-30 02:30:27', '2019-04-30 02:30:27'),
(9, 'Judith', 'Linares', 'Mujer', 'j.linares@hotmail.com', 1096222354, 'Cedula', 'Barrancabermeja', 'Santander', 'Cra 19#45-12', 'Casa', 'Torcoroma', '3152462365', NULL, '2019-04-30 04:27:12', '2019-04-30 04:27:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles`
--

-- CREATE TABLE `detalles` (
--   `id` int(10) UNSIGNED NOT NULL,
--   `producto_id` int(10) UNSIGNED NOT NULL,
--   `factura_id` int(10) UNSIGNED NOT NULL,
--   `cantidad` int(10) UNSIGNED NOT NULL,
--   `precio` decimal(10,2) NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_pedidos`
--

-- CREATE TABLE `estado_pedidos` (
--   `id` int(10) UNSIGNED NOT NULL,
--   `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estado_pedidos`
--

INSERT INTO `estado_pedidos` (`id`, `name`, `descripcion`, `created_at`, `updated_at`) VALUES
(2, 'Backorder', 'Pedido que ha sido solicitado a casa matriz', '2019-04-27 04:28:20', '2019-04-27 04:28:20'),
(3, 'En progreso', 'En proceso de despacho', '2019-04-27 04:28:45', '2019-04-27 04:28:45'),
(5, 'Completado y recibido', 'El pedido ha sido recibido en el CSA', '2019-04-27 04:29:25', '2019-04-27 04:29:25'),
(6, 'Los repuestos han sido solicitados', 'El repuesto fue solicitado al proveedor, esperando confirmación de estado', '2019-04-30 02:01:39', '2019-04-30 02:01:39'),
(7, 'Repuesto en ruta hacia el CSA', 'El repuesto se encuentra en camino hacia el CSA', '2019-04-30 02:02:41', '2019-04-30 02:02:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

-- CREATE TABLE `facturas` (
--   `id` int(10) UNSIGNED NOT NULL,
--   `vendedor_id` int(10) UNSIGNED NOT NULL,
--   `cliente_id` int(10) UNSIGNED NOT NULL,
--   `fecha` date NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

-- CREATE TABLE `migrations` (
--   `id` int(10) UNSIGNED NOT NULL,
--   `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `batch` int(11) NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modo_servicios`
--

-- CREATE TABLE `modo_servicios` (
--   `id` int(10) UNSIGNED NOT NULL,
--   `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `modo_servicios`
--

INSERT INTO `modo_servicios` (`id`, `name`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Garantia', 'Serviciop que incluye garantia', '2019-04-25 23:46:07', '2019-04-25 23:46:07'),
(2, 'Fuera de garantía', 'Servicio fuera de garantía', '2019-04-27 04:29:48', '2019-04-27 04:29:48'),
(3, 'Garantía domicilio (In Home)', 'Producto en garantía revisado o atendido en domicilio', '2019-04-27 04:30:26', '2019-04-27 04:30:26'),
(4, 'Garantía domicilio (Pick up & Delicery)', 'Garantía atendida a domicilio pero que fue necesario trasladar al CSA para su reparación, posteriormente entregada en casa del cliente.', '2019-04-27 04:31:19', '2019-04-27 04:31:19'),
(5, 'Fuera de garantía Domicilio', 'Producto fuera de garantía atendido en domicilio del cliente', '2019-04-27 04:32:01', '2019-04-27 04:32:01'),
(6, 'Garantía Preventa (DOA Inspection)', 'Producto aún no vendido por el almacén distribuidor con defectos', '2019-04-27 04:32:34', '2019-04-27 04:32:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

-- CREATE TABLE `notas` (
--   `id` int(10) UNSIGNED NOT NULL,
--   `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `servicio_id` int(10) UNSIGNED NOT NULL,
--   `user_id` int(10) UNSIGNED NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id`, `descripcion`, `servicio_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'cosas raras', 4, 1096216530, '2019-05-13 21:02:06', '2019-05-13 21:02:06'),
(2, 'Pedí repuesto', 11, 1096231702, '2019-05-14 04:11:34', '2019-05-14 04:11:34'),
(3, 'No se pudo conseguir repuesto para este servicio, con el proveedor encargado.', 11, 1096216529, '2019-05-14 08:21:12', '2019-05-14 08:21:12'),
(4, 'Se realizó nueva solicitud a otro proveedor para verificar disponibilidad y tiempo de llegada de la parte', 11, 1096231702, '2019-05-15 03:33:45', '2019-05-15 03:33:45'),
(5, 'Producto ya habia sido intervenido.', 9, 1096231919, '2019-05-15 03:39:57', '2019-05-15 03:39:57'),
(6, 'Se requiere proceder con la solicitud de la tarjeta main board para dar solución al síntoma no enciende', 7, 1096231702, '2019-05-15 03:43:58', '2019-05-15 03:43:58'),
(7, 'Cliente llamo, se informo que el producto esta ok para entrega', 11, 1096231919, '2019-05-17 23:39:21', '2019-05-17 23:39:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

--
-- Volcado de datos para la tabla `password_resets`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

-- CREATE TABLE `pedidos` (
--   `id` int(10) UNSIGNED NOT NULL,
--   `estado_pedido_id` int(10) UNSIGNED NOT NULL,
--   `numero_pedido_interno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `numero_pedido_proveedor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `costo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `cantidad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

-- CREATE TABLE `productos` (
--   `id` int(10) UNSIGNED NOT NULL,
--   `servicio_id` int(10) UNSIGNED DEFAULT NULL,
--   `factura_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
--   `proveedor_id` int(10) UNSIGNED NOT NULL,
--   `referencia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
--   `costo_entrada` text COLLATE utf8mb4_unicode_ci NOT NULL,
--   `total` text COLLATE utf8mb4_unicode_ci NOT NULL,
--   `cantidad` text COLLATE utf8mb4_unicode_ci NOT NULL,
--   `iva` text COLLATE utf8mb4_unicode_ci NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

-- INSERT INTO `productos` (`id`, `servicio_id`, `factura_id`, `proveedor_id`, `referencia`, `descripcion`, `costo_entrada`, `total`, `cantidad`, `iva`, `created_at`, `updated_at`) VALUES
-- (1, 4, 'gh013', 101, '1011', '121', '12000', '228000', '25', '19', '2019-05-13 21:19:12', '2019-05-13 21:19:12'),
-- (2, 11, 'PART1245', 1, 'EBT67475858', 'Tarjeta principal', '100000', '1900000', '1', '19', '2019-05-15 03:35:43', '2019-05-15 03:35:43'),
-- (3, 11, 'PART1245', 1, '1626374', 'Main board', '100000', '1900000', '1', '19', '2019-05-15 03:36:15', '2019-05-15 03:36:15'),
-- (4, NULL, '008765', 3, 'ADAPTADOR K-SPK50BLED', 'Cargadores para parlantes.', '30.000', '570', '2', '019', '2019-05-16 03:12:04', '2019-05-16 03:12:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedors`
--

-- CREATE TABLE `proveedors` (
--   `id` int(10) UNSIGNED NOT NULL,
--   `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `nit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `ciudad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `telefono_opcional` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `proveedors`
--

INSERT INTO `proveedors` (`id`, `name`, `nit`, `direccion`, `ciudad`, `telefono`, `telefono_opcional`, `descripcion`, `created_at`, `updated_at`) VALUES
(2, 'SAMSUNG', '1245654987', 'BOGOTA', 'BOGOTA', '321165465', '231565644', 'PRUEBA', '2019-04-25 22:50:13', '2019-04-29 12:53:42'),
(3, 'KALLEY', '890900943', 'BOGOTA', 'BOGOTA', '031-345627', NULL, 'Kalley Electrodomesticos', '2019-05-16 02:57:13', '2019-05-16 02:57:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reazon_pendientes`
--

-- CREATE TABLE `reazons` (
--   `id` int(10) UNSIGNED NOT NULL,
--   `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reazon_pendientes`
--



INSERT INTO `razons` (`id`, `name`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Aceptado', 'El servicio ha sido Aceptado ', '2019-04-25 23:50:43', '2019-04-25 23:50:43'),
(2, 'Los repuestos han sido solicitados', '“”', '2019-04-27 04:33:16', '2019-04-27 04:33:16'),
(3, 'Los repuestos están en backorder', 'Estado asignado cuando los repuestos han sido escaldados a solicitud de pedido para casa matriz', '2019-04-27 04:33:46', '2019-04-27 04:33:46'),
(4, 'Primera visita concertada', 'Paso inicial en un servicio a domicilio, concertar visita', '2019-04-27 04:34:23', '2019-04-27 04:34:23'),
(5, 'Autorizado y pendiente solicitar repuesto', 'Los repuestos están pendiente por solicitar al proveedor(es)', '2019-04-30 02:05:38', '2019-04-30 02:05:38'),
(6, 'Servicio terminado', 'Servicio terminado.', '2019-04-30 02:09:27', '2019-04-30 02:09:27'),
(7, 'Partes entregadas en ASC/Pendiente Instalar', 'Repuestos recibidos sin instalar.', '2019-04-30 03:23:44', '2019-04-30 03:23:44'),
(8, 'Estudio de Cambio', 'Servicio en estudio de posible cambio.', '2019-04-30 03:24:32', '2019-04-30 03:24:32'),
(9, 'Soporte técnico con fábrica', 'Se eleva consulta técnica con fábrica para solicitar soporte a ingeniería.', '2019-04-30 03:30:28', '2019-04-30 03:30:28'),
(10, 'Cliente ausente, no hay contacto', 'Cuando no se logra tener contacto en un servicio garantía domicilio', '2019-04-27 04:34:51', '2019-04-27 04:34:51'),
(11, 'Cotización Solicitada', 'El cotización fue solicitada por correo u otro medio al proveedor(es)', '2019-04-30 02:03:55', '2019-04-30 02:03:55'),
(12, 'Autorizado y en proceso de reparación', 'El producto fue autorizado en su costo, debe ser reparado por el técnico', '2019-04-30 02:05:04', '2019-04-30 02:05:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

-- CREATE TABLE `servicios` (
--   `id` int(10) UNSIGNED NOT NULL,
--   `producto_id` int(10) UNSIGNED DEFAULT NULL,
--   `razon_id` int(10) UNSIGNED DEFAULT NULL,
--   `tipo_id` int(10) UNSIGNED NOT NULL,
--   `modo_servicio_id` int(10) UNSIGNED NOT NULL,
--   `user_id` int(10) UNSIGNED NOT NULL,
--   `cliente_id` int(10) UNSIGNED NOT NULL,
--   `fecha_inicio` date NOT NULL,
--   `fecha_reparado` date DEFAULT NULL,
--   `fecha_finalizado` date DEFAULT NULL,
--   `mano_obra` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `valor_asegurado_producto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `happy_call_estado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `happy_call_calificacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `valor_cotizado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `valor_total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `reporte_tecnico` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `reporte_cliente` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `ubicacion_producto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `producto_id`, `razon_id`, `tipo_id`, `modo_servicio_id`, `user_id`, `cliente_id`, `fecha_inicio`, `fecha_reparado`, `fecha_finalizado`, `mano_obra`, `valor_asegurado_producto`, `happy_call_estado`, `happy_call_calificacion`, `valor_cotizado`, `valor_total`, `reporte_tecnico`, `reporte_cliente`, `ubicacion_producto`, `created_at`, `updated_at`) VALUES
(7, NULL, 6, 1, 3, 1096231702, 123456789, '2019-04-30', '2019-05-17', NULL, '100000', '1000000', 'Realizado', '1', '210000', '210000', 'No enciende, main board dañada requiere cambio.', NULL, NULL, '2019-04-30 02:30:27', '2019-05-17 23:35:29'),
(9, NULL, 6, 1, 1, 1096231702, 123456789, '2019-04-30', '2019-04-29', '2019-04-29', '100000', '1000000', 'Realizado', '10', '250000', '250000', 'No enciende, cambio de main board. Producto ya había sido intervenido por un tercero, no aplica garantía.', 'no prende', NULL, '2019-04-30 03:10:17', '2019-05-15 04:29:46'),
(11, NULL, 1, 1, 1, 1298884, 1096222354, '2019-04-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-30 04:40:47', '2019-04-30 04:40:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoo_servicios`
--

-- CREATE TABLE `tipoo_servicios` (
--   `id` int(10) UNSIGNED NOT NULL,
--   `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipoo_servicios`
--

INSERT INTO `tipo` (`id`, `name`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Tecnico', 'Servicio de visitas', '2019-04-25 23:46:57', '2019-04-25 23:46:57'),
(2, 'Developer', 'Desarrollo de software', '2019-04-27 04:35:32', '2019-04-27 04:35:32'),
(3, 'Instalación', 'Instalaciones en general de todo tipo', '2019-04-27 04:35:46', '2019-04-27 04:35:46'),
(4, 'Venta', 'Ventas de productos y/o programas', '2019-04-30 03:13:58', '2019-04-30 03:13:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

-- CREATE TABLE `users` (
--   `id` int(10) UNSIGNED NOT NULL,
--   `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `cargo_id` int(10) UNSIGNED DEFAULT NULL,
--   `identificacion` int(10) UNSIGNED NOT NULL,
--   `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

-- INSERT INTO `users` (`id`, `name`, `email`, `cargo_id`, `identificacion`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
-- (4, 'Jeferson Hernan Torres Bolivar', 'jefersonfix@hotmail.com', NULL, 1096231702, '$2y$10$e.mRcc2uV1C2ASLL4e4TKuUTEsuTcQctiD.I2a7XXJkxKejTv.tZq', 'AXEi8gI5Sw7qzxxbwVv7swEIud9OpEMDw53rguE6qzwgik9xCu9W98ZjpKbp', '2019-04-30 02:00:40', '2019-04-30 02:00:40'),
-- (5, 'Lisnery Aguas', 'lis_110@hotmail.com', NULL, 1096231919, '$2y$10$0KV6GHYl.bKuHCsCnVrYS.nAhlr3cZZFNaIlDF3Ps8.16biGPsgFS', 'TdyePEcFM1RbP1tx1rYSIkcTOJmtE9sRMTcdmoUIOZeAY4vClqOuyMWVGaJF', '2019-04-30 02:56:52', '2019-04-30 02:56:52'),
-- (6, 'Luz Tarazona', 'tarazonapadilla@hotmail.com', NULL, 1298884, '$2y$10$CPq5Lv16RZi0287OkXiTlOIv8lby1ymTFfgaAbf2TiR0sPRnb4I/C', '1BXNK3rVHeIQMwhTN97KKdsC40McCmZHxxiXDP8PyQZIa39WkAr0BI8Ml4J8', '2019-04-30 04:18:19', '2019-04-30 04:18:19'),
-- (7, 'Gabriel Luna', 'itsggabo@gmail.com', NULL, 1096253454, '$2y$10$vs18pRbGmzJX7B.Y0cp0UOxLIq9kMuTfXyhg93Szib3obsQsBA.s6', NULL, '2019-04-30 15:52:26', '2019-04-30 15:52:26'),
-- (8, 'Lina María', 'redbega@gmail.com', NULL, 1096231844, '$2y$10$X9JJmO9OlFRgnSYWL0w38OrfwZoDUqtrNIgfqsB8wC2l4eu8eDdva', NULL, '2019-04-30 16:44:05', '2019-04-30 16:44:05'),
-- (9, 'Johan', 'jesteban.ocampo@gmail.com', NULL, 909090909, '$2y$10$svvwFhhZiMN.7E7Teh1nseXYHwvZJNTO1IjVGshiGTBnTxbBtZjfi', NULL, '2019-05-04 02:29:23', '2019-05-04 02:29:23'),
-- (11, 'Pepito', 'pepito1234@gmail.com', NULL, 1234, '$2y$10$vgAL7f5PcX24iVgtwUzFbepe/dwbHqimaLq4A9l2.ymdlnzRPxAh2', 'Gc1waUgzVNoXQZwJHfZwws1WDXA2MKsqpDSu4nIihIVpqy7xxv8g7e9rrc0w', '2019-05-10 22:36:19', '2019-05-10 22:36:19'),
-- (18, 'jair', 'pedrozojair@gmail.com', NULL, 1096217877, '$2y$10$YgJ/3GmCnO0kwqukzYYsPeZTm/POdX8pdXkgvaewj9fgvEpeYhnHq', NULL, '2019-05-16 00:29:48', '2019-05-16 00:29:48'),
-- (20, 'Angell', 'admin@example.com', NULL, 1234567890, '$2y$10$rVnWbNiBWtRodSxIxyN.AeETb7VjTT0MlIx9AkgWobUE434PGQxzC', NULL, '2019-06-01 23:49:58', '2019-06-01 23:49:58');
