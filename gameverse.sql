-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 02-09-2024 a las 23:38:49
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gameverse`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int NOT NULL,
  `nombre` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `apellido_materno` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `apellido_paterno` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `calle` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `colonia` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `codigo_postal` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `telefono` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `correo` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `sexo` tinyint(1) NOT NULL DEFAULT '0',
  `banco` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `numero_cuenta` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `tipo_cuenta_bancaria` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `tipo_usuario` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT 'CLI'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellido_materno`, `apellido_paterno`, `calle`, `colonia`, `codigo_postal`, `telefono`, `correo`, `sexo`, `banco`, `numero_cuenta`, `tipo_cuenta_bancaria`, `tipo_usuario`) VALUES
(1, 'Jose', 'García', 'Pérezito', 'Av. de los Robles', 'Bosques del Este', '54321', '5551234567', 'Jose.garcia@example.com', 0, 'Banco del Ahorro', '1234567890', '1', 'CLI'),
(3, 'khkjhkjsf', 'sfdsfsdfs', 'La tuya', 'sfdskjfhksdfhk', 'sfsdfdsf', '55875', '2447855656', 'lalala@gmail.com', 1, 'bancomer', '46465464646464646464', '2', 'CLI'),
(5, 'Sebastian', 'bañuelos', 'Farias', 'nose', 'tampoco', '48590', '5454784554', 'che@causa.com', 1, 'BBVA', '45454545458787878787', '0', 'CLI'),
(6, 'sigma', 'sfsfdsf', 'jksfhsf', 'sdfsdfdsfs', 'sdfsfsdf', '45487', '5448763144', 'dfsdfsd@sdfsds', 1, 'Banamex', '78975668787979797979', '3', 'CLI'),
(7, 'tyjtyugjghjghj', 'gjghjghgj', 'bhjgjgj', 'ghgjgh', 'fyjuyuyu', '58686', '4564785785', 'gjgjg@gg', 0, 'hjjhjgg', '87787878787787878788', '0', 'CLI'),
(8, 'fdsfdsfds', 'dsfdsf', 'sfdsfdsf', 'sdfsdfds', 'sfdsfdsf', '54666', '5454545454', 'dfdsf@fs', 0, 'fdsfdsfs', '54545454545454545454', '0', 'CLI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `imagen` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT 'assets/img/default_producto.png',
  `precio` double NOT NULL,
  `categoria` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `especificaciones` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `existencias` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `descuento` int NOT NULL DEFAULT '0',
  `descripcion` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `id_proveedor` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `imagen`, `precio`, `categoria`, `especificaciones`, `existencias`, `descuento`, `descripcion`, `id_proveedor`) VALUES
(1, 'Fantasy Quest: El Reino Perdido', 'assets/img/default_producto.png', 100, 'Aventura', 'Plataforma: PC, Requerimientos mínimos: Windows 10, Intel Core i5, 8GB RAM, Tarjeta gráfica NVIDIA GeForce GTX 1060.', '100 ', 50, 'Embárcate en una emocionante aventura en el reino mágico de Fantasy Quest. Explora vastos paisajes, completa misiones épicas y descubre secretos ancestrales mientras luchas contra poderosos enemigos. ¿Tienes lo que se necesita para salvar el reino perdido?', 1),
(3, 'The Legend of Heroes: Trails of Cold Steel IV', 'assets/img/default_producto.png', 50.63, 'Accion', 'Plataforma: PlayStation 4, Requerimientos mínimos: PlayStation 4 existencias: 150', '100 ', 0, 'Únete a la épica conclusión de la saga Trails of Cold Steel y prepárate para una emocionante aventura llena de acción, intriga política y batallas estratégicas.\r\nid_proveedor: 1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int NOT NULL,
  `nombre` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `telefono` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `calle` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `colonia` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `ruc_proveedor` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `correo` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `fecha_registro` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `foto_proveedor` varchar(200) COLLATE utf8mb4_bin NOT NULL DEFAULT 'assets/img/default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `nombre`, `telefono`, `calle`, `colonia`, `ruc_proveedor`, `correo`, `fecha_registro`, `foto_proveedor`) VALUES
(1, 'MegaGames Inc', '1234567890', 'De los Jugadores', 'Gamersville', '1234567890', 'info@megagames.com', '2024-01-15', 'assets/img/default.jpg'),
(5, 'VideoGameEmpire', '5555555555', '789 Oak Street', 'Console District', 'VGE555555', 'support@videogameempire.com', '2024-03-25', 'assets/img/default.jpg'),
(6, 'Pegt', '5552223333', '321 Maple Street', 'Retro Avenue', 'PP222333', 'sales@pixelperfect.com', '2024-04-30', 'assets/img/default.jpg'),
(12, ' elimaz', '5654654654', 'fhfghgfh', 'fhfhfghgfh', '4655464646', 'fhgfh@gdf', '2024-05-14', 'uploads/proveedores/dsfdsfprueba_admin.jpeg'),
(13, 'osas', '4254554545', 'sdfdsf', 'sdfdsf', '5454545453', 'dfsdf@dgds', '2024-05-14', 'uploads/proveedores/sdfdsf9257133ca788a4537f84e1be1496fab7.jpg'),
(14, 'sony', '5484847848', 'sdfkskjdgkjd', 'dsfdsfds', '5455484848', 'fdsfs@fsfs', '2024-05-19', 'uploads/proveedores/sonyimages.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `nombre` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `apellido_materno` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `apellido_paterno` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `edad` int NOT NULL,
  `sexo` tinyint(1) NOT NULL DEFAULT '0',
  `rfc` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `calle` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `colonia` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `telefono` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `correo` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `estatus` tinyint(1) NOT NULL DEFAULT '1',
  `tipo_usuario` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT 'CAJ',
  `fecha_registro` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `usuario` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `clave_acceso` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `foto_perfil` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT 'assets/img/default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido_materno`, `apellido_paterno`, `edad`, `sexo`, `rfc`, `calle`, `colonia`, `telefono`, `correo`, `estatus`, `tipo_usuario`, `fecha_registro`, `usuario`, `clave_acceso`, `foto_perfil`) VALUES
(2, 'Adrian Uriel', 'Miranda', 'Navarro', 17, 0, 'NAMA03010JHVC', 'brillante', 'joyas del pedregal', '1234567890', 'zxuan.Av@gmail.com', 1, 'ADM', '2024-01-15', 'zxuan', 'cisco123', 'uploads/usuarios/zxuanprueba_admin.jpeg'),
(3, 'Paul Didier', 'Fernandez', 'Palacios', 20, 0, 'SDF54545DSF5S', 'llanitos', 'ixtapanet', '3225896477', 'blaz@gmail.com', 1, 'CAJ', '2024-04-30', 'Blaz', 'cisco123', 'assets/img/prueba_admin.jpeg'),
(6, 'Yael', 'Camacho', 'Valle', 20, 0, 'SDF7D5F54DS', 'San vicente alv', 'Salvanos dios', '3225874688', 'Noby@manco.com', 1, 'CAJ', '2024-05-02', 'Noby', 'cisco12', 'assets/img/prueba_admin.jpeg'),
(22, 'Avi', 'Amor', 'Mi', 20, 1, 'LKSKLDS5OLAKI', 'Av. de los Robles', 'Bosques', '3222706966', 'Avi@gmail.com', 1, 'ADM', '08-05-2024', 'solodeurii', 'cisco123', 'uploads/usuarios/solodeuriIMG-20240429-WA0034.jpg'),
(23, 'elsapito', 'Lopez', 'Gomez', 25, 1, 'OVERCOOKPE', 'Calle 5 de Mayo', 'Centro', '9876543210', 'elsapato@gmail.com', 0, 'ADM', '08-05-2024', 'lalaq89', '123456', 'assets/img/prueba_admin.jpeg'),
(24, 'María', 'Martínez', 'González', 30, 1, 'KLDFJWELRKJWL', 'Calle de la Rosa', 'San Antonio', '6543217890', 'maria@hotmail.com', 0, 'CAJ', '08-05-2024', 'maria20', 'abcd1234', 'uploads/usuarios/maria201311951.jpg'),
(25, 'Juan', 'García', 'Pérez', 25, 0, 'ABCDE1234567', 'Calle de la Rosa', 'Colonia del Bosque', '9876543210', 'juan@example.com', 0, 'CAJ', '2024-05-08', 'juangp', 'pass', 'assets/img/prueba_admin.jpeg'),
(26, 'Ana', 'Hernández', 'Gómez', 30, 1, 'FGHIJ5678901K', 'Avenida del Sol', 'Centro', '6543210987', 'ana@example.com', 0, 'CAJ', '2024-05-08', 'ana123', 'pass', 'assets/img/prueba_admin.jpeg'),
(27, 'Carlitos', 'Martínez', 'López', 28, 0, 'HIJKL2345678M', 'Avenida de los Pinos', 'Fraccionamiento Acacia', '7418529630', 'carlos@example.com', 1, 'ADM', '2024-05-08', 'carlosm', 'pass', 'assets/img/prueba_admin.jpeg'),
(29, 'Aldo', 'López', 'Ramirez', 30, 1, 'OPQRSJ567890O', 'Calle del la nai', 'Llanitos', '3698522470', 'aldo@example.com', 0, 'CAJ', '2024-05-08', 'aldos', 'cisco123', 'uploads/usuarios/aldose528a62d-c894-4e98-84bb-5e944de90ae8.jpg'),
(30, 'elsa', 'García', 'Pérez', 25, 0, 'ABCDE123456', 'Calle de la Rosa', 'Colonia del Bosque', '9876543210', 'juan@example.com', 0, 'CAJ', '2024-05-08', 'juangp', 'pass', 'assets/img/prueba_admin.jpeg'),
(32, 'Carlitod', 'Martínez', 'López', 28, 0, 'HIJKL234567', 'Avenida de los Pinos', 'Fraccionamiento Acacia', '7418529630', 'carlos@example.com', 0, 'ADM', '2024-05-08', 'carlosma', 'pass', 'uploads/usuarios/carlosmae528a62d-c894-4e98-84bb-5e944de90ae8.jpg'),
(33, 'María', 'Gómez', 'Hernández', 35, 1, 'LMNOP345678', 'Calle de la Luna', 'Fraccionamiento del Valle', '8529637410', 'maria@example.com', 1, 'CAJ', '2024-05-08', 'mariag', 'pass', 'uploads/usuarios/mariagcodigo-de-etica-1.png'),
(34, 'Pedro', 'López', 'Martínez', 27, 0, 'OPQRS456789', 'Calle del Bosque', 'Fraccionamiento Los Pinos', '3698521470', 'pedro@example.com', 1, 'CAJ', '2024-05-08', 'pedrol', 'password', 'assets/img/prueba_admin.jpeg'),
(36, 'Daniel', 'Martínez', 'Gómez', 32, 0, 'UVWXY678901', 'Calle del Sol', 'Fraccionamiento del Bosque', '1472583690', 'daniel@example.com', 1, 'CAJ', '2024-05-08', 'danield', '123', 'assets/img/prueba_admin.jpeg'),
(37, 'Sofía', 'Gómez', 'López', 26, 1, 'WXYZA789012', 'Calle de la Aurora', 'Fraccionamiento Los Robles', '9637418520', 'sofia@example.com', 0, 'ADM', '2024-05-08', 'pensal', 'pass', 'assets/img/prueba_admin.jpeg'),
(44, 'asdasd', 'Miranda', 'asdasd', 54, 0, 'SDSDSDSDDCCCC', 'asdsdad', 'adasdas', '4444454545', 'asdssd@asdas', 1, 'CAJ', '2024-05-12', 'kaka', 'cisco123', 'assets/img/prueba_admin.jpeg'),
(50, 'sdfsdfsd', 'laksdsd', 'dsfssdfdsf', 52, 0, 'DFDSFDSFDSFJJ', 'fdsfsf', 'sdfdsfsdds', '4544878787', 'dsfdsfsdf@dsfs', 1, 'CAJ', '2024-05-12', 'dfdsfdsfs', 'cisco123', 'assets/img/default.jpg'),
(51, 'sdfdsfsdf', 'fsgdgdf', 'fsfdsf', 33, 0, 'DSGGDGNDFKJGD', 'dsklfjdskfjdskl', 'dgjdlg', '2147851545', 'sfdskfs@fsdf', 1, 'CAJ', '2024-05-12', 'fskfdkjfds', 'cisco123', 'assets/img/default.jpg'),
(52, 'sdfdsf', 'sdfsdf', 'sdfsdf', 18, 0, 'KJGKKJGKJGKJG', 'sdfdsf', 'sfsdfds', '2222222222', 'Jose.garcia@example.com', 1, 'CAJ', '2024-05-13', 'kfhjfddf', 'cisco123', 'assets/img/default.jpg'),
(53, 'uri', 'werew', 'ewr', 19, 0, 'SFDSFDSFDSFDS', 'wefdsfsdf', 'sdfsfsfsf', '1221255454', 'sfsf@sfsf', 1, 'CAJ', '2024-05-13', 'uri', 'cisco123', 'assets/img/default.jpg'),
(54, 'adri', 'sdfds', 'sdfsdf', 19, 0, 'SDFSDFSDFSDFD', 'sfsdfdsfds', 'sdfsddfs', '4564565465', 'sfsdfs@dfgdfg', 1, 'ADM', '2024-05-13', 'adri', 'cisco123', 'uploads/usuarios/adri9257133ca788a4537f84e1be1496fab7.jpg'),
(55, 'asdasd', 'asdasd', 'asdasd', 23, 0, 'SDFSDF4SD4F54', 'asdasd', 'asdasd', '4545487878', 'asd@sdf', 1, 'CAJ', '2024-05-13', 'sisi', 'cisco123', 'uploads/usuarios/sisi9257133ca788a4537f84e1be1496fab7.jpg'),
(56, 'sfsdf', 'sdfdsf', 'sdfdsf', 23, 0, 'DGDFGDF545546', 'gjghjghjgh', 'gjghjhgj', '3354564565', 'hjghj@gfhf', 1, 'CAJ', '2024-05-13', 'lolita', 'cisco123', 'uploads/usuarios/lolita9257133ca788a4537f84e1be1496fab7.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `proveedores_id_productos` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
