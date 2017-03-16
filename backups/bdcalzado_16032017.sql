-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 16-03-2017 a las 01:11:28
-- Versión del servidor: 5.1.41
-- Versión de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bdcalzado`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

DROP TABLE IF EXISTS `empresa`;
CREATE TABLE IF NOT EXISTS `empresa` (
  `nEmpId` int(11) NOT NULL AUTO_INCREMENT,
  `cEmpNombre` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cEmpDescripcion` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cEmpDireccionFiscal` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cEmpTelefono` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cEmpCelular` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cEmpEmail` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cEmpRuc` varchar(11) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nIdRubro` int(11) DEFAULT NULL,
  `cEmpLogoChico` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cEmpLogoGrande` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cEmpLogoFondo` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nEmpPropia` int(11) DEFAULT NULL COMMENT '1=si,0=no',
  `cEmpEstado` int(11) DEFAULT NULL COMMENT '1=activo,0=inactivo',
  PRIMARY KEY (`nEmpId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`nEmpId`, `cEmpNombre`, `cEmpDescripcion`, `cEmpDireccionFiscal`, `cEmpTelefono`, `cEmpCelular`, `cEmpEmail`, `cEmpRuc`, `nIdRubro`, `cEmpLogoChico`, `cEmpLogoGrande`, `cEmpLogoFondo`, `nEmpPropia`, `cEmpEstado`) VALUES
(1, 'Dluanas', 'Sistema Calzado', NULL, '261811', '987654321', 'empresa@gmail.com', '12346548', 1, 'ima1.jpg', 'ima1.jpg', 'ima1.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `nMenId` int(11) NOT NULL AUTO_INCREMENT,
  `nModId` int(11) NOT NULL,
  `cMenMenu` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cMenUrl` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `cMenOrden` tinyint(4) NOT NULL,
  `cMenActivo` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `cMenSobreNombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`nMenId`),
  KEY `nModId` (`nModId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=9 ;

--
-- Volcar la base de datos para la tabla `menu`
--

INSERT INTO `menu` (`nMenId`, `nModId`, `cMenMenu`, `cMenUrl`, `cMenOrden`, `cMenActivo`, `cMenSobreNombre`) VALUES
(1, 1, 'Dashboard', 'dashboard', 1, '1', 'Menu Principal'),
(2, 2, 'Empresa', 'empresa', 2, '0', 'Datos Empresa'),
(3, 3, 'Usuario', 'usuarios', 3, '1', 'Datos Usuario-Permisos'),
(4, 4, 'productos', 'productos', 4, '0', 'Productos'),
(5, 4, 'Persona', 'persona', 5, '1', 'Persona'),
(6, 5, 'Nuevo Paciente', 'paciente/nuevo', 6, '0', 'Nuevo Paciente'),
(7, 5, 'Listar Pacientes', 'paciente/listarpacientes', 2, '0', 'Listar Paciente'),
(8, 4, 'pruebas', 'paciente', 1, '0', 'Nuevo Paciente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

DROP TABLE IF EXISTS `modulo`;
CREATE TABLE IF NOT EXISTS `modulo` (
  `nModId` int(11) NOT NULL AUTO_INCREMENT,
  `cModModulo` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nModOrden` tinyint(4) DEFAULT NULL,
  `cModIcono` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cModEstado` char(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`nModId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`nModId`, `cModModulo`, `nModOrden`, `cModIcono`, `cModEstado`) VALUES
(1, 'Principal', 1, 'fa-dashboard', '1'),
(2, 'Empresa', 2, 'fa fa-bank', '0'),
(3, 'Usuarios', 3, 'fa fa-child', '1'),
(4, 'Mantenedores', 4, 'fa fa-steam', '1'),
(5, 'Gestión Pacientes', 2, 'fa fa-child', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisorol`
--

DROP TABLE IF EXISTS `permisorol`;
CREATE TABLE IF NOT EXISTS `permisorol` (
  `nPermRolId` int(11) NOT NULL AUTO_INCREMENT,
  `nIdRol` int(11) NOT NULL,
  `nMenId` int(11) NOT NULL,
  `dPermFechaInicio` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `dPermFechaFin` datetime DEFAULT NULL,
  `cPermActivo` char(1) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`nPermRolId`),
  KEY `nIdRol` (`nIdRol`),
  KEY `nMenId` (`nMenId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Volcar la base de datos para la tabla `permisorol`
--

INSERT INTO `permisorol` (`nPermRolId`, `nIdRol`, `nMenId`, `dPermFechaInicio`, `dPermFechaFin`, `cPermActivo`) VALUES
(1, 1, 1, '2016-05-10 14:57:46', '2017-03-10 07:09:11', '0'),
(2, 1, 2, '2016-05-10 14:58:14', '2016-05-10 14:45:37', '0'),
(3, 1, 3, '2016-05-10 15:45:01', NULL, '0'),
(4, 1, 4, '2016-05-10 15:45:01', '2016-05-10 22:38:34', '0'),
(5, 1, 5, '2016-05-10 15:45:13', '2017-03-10 07:18:31', '0'),
(6, 3, 1, '2016-05-10 15:45:25', '2017-03-15 23:56:50', '0'),
(7, 3, 2, '2016-05-10 15:45:25', '2016-05-11 12:23:38', '0'),
(8, 3, 3, '2016-05-10 15:45:25', '2017-03-15 23:56:50', '0'),
(9, 3, 4, '2016-05-10 15:45:25', NULL, '0'),
(10, 3, 5, '2016-05-10 15:45:25', '2017-03-15 23:46:25', '0'),
(11, 2, 1, '2016-05-10 15:45:47', '2017-03-15 23:56:41', '0'),
(12, 2, 2, '2016-05-10 15:45:47', '2016-05-10 14:46:16', '0'),
(13, 2, 3, '2016-05-10 15:45:47', NULL, '0'),
(14, 2, 5, '2016-05-10 15:45:47', NULL, '0'),
(15, 1, 4, '2016-05-10 23:36:35', '2016-05-10 22:38:34', '0'),
(16, 1, 2, '2016-05-10 23:37:17', NULL, '0'),
(17, 1, 4, '2016-05-10 23:37:42', '2016-05-10 22:38:34', '0'),
(18, 1, 5, '2016-05-10 23:37:42', '2017-03-10 07:18:31', '0'),
(19, 2, 4, '2016-05-11 11:08:16', '2016-05-11 13:45:04', '0'),
(20, 2, 2, '2016-05-11 14:44:40', NULL, '0'),
(21, 1, 6, '2016-05-11 16:06:32', '2017-03-10 07:09:11', '0'),
(22, 1, 7, '2016-05-22 09:30:27', '2017-03-10 07:09:11', '0'),
(23, 1, 8, '2016-05-22 09:30:27', NULL, '0'),
(24, 2, 6, '2017-03-10 07:06:49', NULL, '0'),
(25, 2, 7, '2017-03-10 07:07:00', NULL, '0'),
(26, 3, 3, '2017-03-10 07:07:10', '2017-03-15 23:56:50', '0'),
(27, 3, 6, '2017-03-10 07:07:10', NULL, '0'),
(28, 3, 7, '2017-03-10 07:07:10', NULL, '0'),
(29, 1, 7, '2017-03-10 07:08:22', '2017-03-10 07:09:11', '0'),
(30, 1, 1, '2017-03-10 07:09:14', NULL, '0'),
(31, 1, 6, '2017-03-10 07:09:14', NULL, '0'),
(32, 1, 7, '2017-03-10 07:09:14', NULL, '0'),
(33, 1, 5, '2017-03-10 07:20:50', NULL, '0'),
(34, 1, 1, '2017-03-10 08:15:27', NULL, '0'),
(35, 1, 3, '2017-03-10 08:15:27', NULL, '0'),
(36, 1, 5, '2017-03-10 08:15:27', NULL, '0'),
(37, 2, 1, '2017-03-10 08:15:32', '2017-03-15 23:56:41', '0'),
(38, 3, 1, '2017-03-10 08:15:38', '2017-03-15 23:56:50', '0'),
(39, 3, 3, '2017-03-16 00:43:37', '2017-03-15 23:56:50', '0'),
(40, 3, 5, '2017-03-16 00:43:37', '2017-03-15 23:46:25', '0'),
(41, 3, 1, '2017-03-16 00:56:02', '2017-03-15 23:56:50', '0'),
(42, 2, 3, '2017-03-16 00:56:17', NULL, '0'),
(43, 3, 3, '2017-03-16 00:56:31', NULL, '0'),
(44, 1, 1, '2017-03-16 01:04:17', NULL, '1'),
(45, 1, 3, '2017-03-16 01:04:17', NULL, '1'),
(46, 1, 5, '2017-03-16 01:04:17', NULL, '1'),
(47, 3, 1, '2017-03-16 01:04:24', NULL, '1'),
(48, 2, 3, '2017-03-16 01:04:29', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

DROP TABLE IF EXISTS `persona`;
CREATE TABLE IF NOT EXISTS `persona` (
  `nPerId` int(11) NOT NULL AUTO_INCREMENT,
  `cPerNombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cPerApellidoPaterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cPerApellidoMaterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cPerDni` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `cPerDireccion` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `cPerTelefono` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cPerCelular` varchar(11) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cPerEstado` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `tPerFechaRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `tPerFechaBaja` timestamp NULL DEFAULT NULL,
  `nSurId` int(10) DEFAULT NULL,
  PRIMARY KEY (`nPerId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=18 ;

--
-- Volcar la base de datos para la tabla `persona`
--

INSERT INTO `persona` (`nPerId`, `cPerNombres`, `cPerApellidoPaterno`, `cPerApellidoMaterno`, `cPerDni`, `cPerDireccion`, `cPerTelefono`, `cPerCelular`, `cPerEstado`, `tPerFechaRegistro`, `tPerFechaBaja`, `nSurId`) VALUES
(1, 'Cristian', 'Gonzalez', 'Torres', '46088871', 'CAjamarca 108 urb Aranjuez', '261811', '987713704', '1', '2016-04-19 22:19:17', NULL, 1),
(2, 'Andy', 'xxx', 'xxx', '11111111', 'xxx', 'xxx', NULL, '1', '2016-04-19 22:20:50', NULL, 0),
(3, 'Ernestina', 'Pancracia', 'xxx', '22222222', 'xxx', 'xxxx', NULL, '1', '2016-04-19 22:22:37', NULL, 0),
(4, 'Julia', 'Torres', 'Alva', '33333333', 'xxx', NULL, NULL, '1', '2016-04-27 22:19:52', NULL, NULL),
(5, 'Fidel', 'Torres', 'xxx', '44444444', '', NULL, NULL, '1', '2016-04-27 22:21:20', NULL, NULL),
(6, 'Gloria', 'Torres', 'Alva', '55555555', '', NULL, NULL, '1', '2016-04-27 22:21:20', NULL, NULL),
(7, 'Franca', 'Alva', 'Leon', '', '', NULL, NULL, '1', '2016-04-27 22:21:20', NULL, NULL),
(8, 'Emilia', 'Rodriguez', 'Rebaza', '', '', NULL, NULL, '1', '2016-04-27 22:21:20', NULL, NULL),
(9, 'Fernando', 'Luque', 'xxx', '', '', NULL, NULL, '1', '2016-04-27 22:21:20', NULL, NULL),
(10, 'Pedro', 'Suarez', 'Vertiz', '', '', NULL, NULL, '1', '2016-04-28 11:42:33', NULL, NULL),
(11, 'Roxana', 'Merino', 'Pul', '', '', NULL, NULL, '1', '2016-04-28 11:42:34', NULL, NULL),
(12, 'Carlos', 'Pichon', '322', '', '', NULL, NULL, '1', '2016-04-28 11:42:34', NULL, NULL),
(13, 'Diego', 'Torres', 'ddd', '', '', NULL, NULL, '1', '2016-04-28 11:42:34', NULL, NULL),
(14, 'Briguitte', 'Torres', 'Algo', '87654321', 'Cable Magico', '12412424', '981924124', '1', '2016-05-13 10:58:56', NULL, NULL),
(15, 'Carlos', 'Perez', 'Rojas', '26181122', 'Los sauces', '2626218181', '9871515616', '1', '2016-05-13 15:24:45', NULL, NULL),
(16, 'juana', 'luanas', 'flores', '11212312', 'algo', '123123123', '535353', '1', '2017-03-16 00:19:44', NULL, NULL),
(17, 'Diego', 'Castrado', 'Alvarado', '43837512', 'xxx', '12312', '123', '1', '2017-03-16 01:07:24', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `nIdRol` int(11) NOT NULL AUTO_INCREMENT,
  `cNombre` varchar(50) NOT NULL,
  `nEstado` char(1) NOT NULL,
  PRIMARY KEY (`nIdRol`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `rol`
--

INSERT INTO `rol` (`nIdRol`, `cNombre`, `nEstado`) VALUES
(1, 'Administrador', '1'),
(2, 'Asistente', '1'),
(3, 'Almacenero', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `nUsuCodigo` int(11) NOT NULL AUTO_INCREMENT,
  `nPerId` int(11) NOT NULL,
  `cUsuUsuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cUsuClave` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cUsuEstado` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `cUsuTipo` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `nIdRol` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`nUsuCodigo`),
  KEY `fk_Usuario_Persona1` (`nPerId`),
  KEY `fk_Usuario_Rol1` (`nIdRol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=12 ;

--
-- Volcar la base de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nUsuCodigo`, `nPerId`, `cUsuUsuario`, `cUsuClave`, `cUsuEstado`, `cUsuTipo`, `nIdRol`) VALUES
(1, 1, 'cri', '1234', '1', 'A', 1),
(6, 2, '11111111', '123456', '1', '', 3),
(7, 3, '22222222', '123', '1', '', 2),
(8, 4, '33333333', '123', '1', '', 3),
(9, 14, '87654321', '123', '1', '', 2),
(10, 16, '11212312', '123', '1', '', 3),
(11, 17, '43837512', '1234', '1', '', 3);

--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Usuario_Persona1` FOREIGN KEY (`nPerId`) REFERENCES `persona` (`nPerId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuario_Rol1` FOREIGN KEY (`nIdRol`) REFERENCES `rol` (`nIdRol`);

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `USP_EMP_S_EMPRESAS`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_EMP_S_EMPRESAS`(IN accion int)
select *
from empresa p
order by 1 desc$$

DROP PROCEDURE IF EXISTS `USP_PER_I_PERSONA`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PER_I_PERSONA`(
	-- IN nPerId int(11),
	IN v_cPerNombres varchar(50),
	IN v_cPerApellidoPaterno varchar(50),
	IN v_cPerApellidoMaterno varchar(50),
	IN v_cPerDni char(8),
	IN v_cPerDireccion varchar(90),
	IN v_cPerTelefono varchar(20),
	IN v_cPerCelular varchar(11)
)
BEGIN
	INSERT INTO persona(cPerNombres, cPerApellidoPaterno, cPerApellidoMaterno, cPerDni, cPerDireccion, cPerTelefono, cPerCelular,cPerEstado)
	VALUES( v_cPerNombres,v_cPerApellidoPaterno,v_cPerApellidoMaterno,v_cPerDni,v_cPerDireccion,v_cPerTelefono,v_cPerCelular,'1');
END$$

DROP PROCEDURE IF EXISTS `USP_PER_S`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PER_S`(IN `p_tipo` VARCHAR(5))
BEGIN
IF p_tipo='LPU' THEN -- Lista Personas Con Usuarios 
    SELECT p.nPerId,u.nUsuCodigo,p.cPerNombres,p.cPerApellidoPaterno,
        p.cPerApellidoMaterno,p.cPerDni,
        u.cUsuClave,
        r.cNombre as rol, r.nIdRol
    from persona p 
        INNER JOIN usuario u ON p.nPerId = u.nPerId
        INNER JOIN rol r on r.nIdRol=u.nIdRol
    WHERE p.cPerEstado ='1' and u.cUsuEstado = '1';
ELSE
    SELECT nPerId,cPerNombres,cPerApellidoPaterno,cPerApellidoMaterno,cPerDni,
    cPerDireccion,cPerTelefono,cPerCelular,cPerEstado from persona;
END IF;

END$$

DROP PROCEDURE IF EXISTS `USP_PER_S_DNI`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PER_S_DNI`(IN `v_cPerDni` VARCHAR(8))
BEGIN
    SELECT 
        p.nPerId,p.cPerNombres,p.cPerApellidoPaterno,p.cPerApellidoMaterno, p.cPerDni 
    FROM persona p where p.cPerDni =v_cPerDni and nPerId NOT IN (select nPerId from usuario) ;

END$$

DROP PROCEDURE IF EXISTS `USP_ROL_S_ROLES`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_ROL_S_ROLES`(IN `p_tipo` VARCHAR(5))
BEGIN
IF p_tipo='CBO' THEN -- COMBO ROLEs
    select nIdRol,cNombre,nEstado
 from
rol
where nEstado=1
order by nIdRol desc;
ELSE
    select nIdRol,cNombre,nEstado
 from
rol
where nEstado=1
order by nIdRol desc;
END IF;

END$$

DROP PROCEDURE IF EXISTS `USP_S_MENU`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_S_MENU`(
    IN p_opt VARCHAR(3),
    IN p_criterio INT
)
BEGIN
    IF p_opt='LXM' THEN -- Lista Menus de Modulo
--        SELECT nMenId,cMenMenu,cMenUrl,cMenOrden FROM menu where nModId = p_criterio AND cMenActivo = 0 ;
--        SELECT nMenId,cMenMenu,cMenUrl,cMenOrden FROM menu where nModId = p_criterio;
        SELECT me.nMenId,me.cMenMenu,me.cMenUrl,me.cMenOrden FROM menu me
        inner join modulo mo on me.nModId=mo.nModId
        where me.cMenActivo='1' and mo.cModEstado='1' and me.nModId = p_criterio;
    END IF;
END$$

DROP PROCEDURE IF EXISTS `USP_S_MODULOS`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_S_MODULOS`()
BEGIN
    SELECT nModId,cModModulo,nModOrden,cModIcono FROM modulo where cModEstado='1' ORDER BY nModOrden DESC;
END$$

DROP PROCEDURE IF EXISTS `USP_S_PERMISOS_ROL`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_S_PERMISOS_ROL`(
IN p_idrol INT
)
BEGIN
     /*select nMenId from permiso where nUsuCodigo=p_nUsuCodigo AND cPermActivo=1;*/
    select p.nMenId from permisorol p
    inner join menu me on me.nMenId=p.nMenId
    inner join modulo mo on mo.nModId=me.nModId
    where p.nIdRol=p_idrol and p.cPermActivo=1 and me.cMenActivo=1 and mo.cModEstado=1;
END$$

DROP PROCEDURE IF EXISTS `USP_USU_I_REGISTRAR`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_USU_I_REGISTRAR`(
IN v_nPerId INT,
IN v_cUsuUsuario varchar(100),
IN v_cUsuClave varchar(100),
IN v_nidRol int
)
BEGIN
-- IF v_UsuTipo

INSERT INTO `usuario`
(
`nPerId`,
`cUsuUsuario`,
`cUsuClave`,
`cUsuEstado`,
`nIdRol`
)
VALUES
(
v_nPerId,
v_cUsuUsuario,
v_cUsuClave,
'1',
v_nidRol
);


END$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
