-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 02-07-2024 a las 01:12:26
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `proyectoads`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `privilegios`
-- 

CREATE TABLE `privilegios` (
  `idPrivilegio` int(11) NOT NULL,
  `labelPrivilegio` varchar(20) NOT NULL,
  `pathPrivilegio` varchar(250) NOT NULL,
  `iconPrivilegio` varchar(20) NOT NULL,
  `namePrivilegio` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `privilegios`
-- 

INSERT INTO `privilegios` VALUES (1, 'emitir boleta', '../moduloVentas/indexEmitirBoleta.php', 'boleta.png', 'emitirBoleta');
INSERT INTO `privilegios` VALUES (2, 'emitir proforma', '../moduloVentas/indexEmitirProforma.php', 'proforma.png', 'emitirProforma');
INSERT INTO `privilegios` VALUES (3, 'registrar despacho', '../moduloVentas/indexRegistrarDespacho.php', 'despacho.png', 'registrarDespacho');
INSERT INTO `privilegios` VALUES (4, 'cambiar password', 'moduloSeguridad/indexCambiarPasswortd.php', 'cambiarPassword.png', 'cambiar password');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `usuarios`
-- 

CREATE TABLE `usuarios` (
  `login` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL,
  `pregunta_clave` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `usuarios`
-- 

INSERT INTO `usuarios` VALUES ('Carlos', '12345', 'carlos123@tazon.com', 1, 'perro');
INSERT INTO `usuarios` VALUES ('Jose', '123456', 'jose123@tazon.com', 1, 'gato');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `usuariosprivilegios`
-- 

CREATE TABLE `usuariosprivilegios` (
  `login` varchar(20) NOT NULL,
  `idPrivilegio` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `usuariosprivilegios`
-- 

INSERT INTO `usuariosprivilegios` VALUES ('Carlos', 1);
INSERT INTO `usuariosprivilegios` VALUES ('Carlos', 2);
INSERT INTO `usuariosprivilegios` VALUES ('Carlos', 3);
INSERT INTO `usuariosprivilegios` VALUES ('Jose', 4);
INSERT INTO `usuariosprivilegios` VALUES ('Jose', 2);
