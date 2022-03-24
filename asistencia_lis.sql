-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2022 at 11:10 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asistencia_lis`
--
CREATE DATABASE IF NOT EXISTS `asistencia_lis` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci;
USE `asistencia_lis`;

-- --------------------------------------------------------

--
-- Table structure for table `alumnos`
--

CREATE TABLE `alumnos` (
  `id_alumno` int(11) NOT NULL,
  `nombre_alumno` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nacimiento_alumno` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombre_encargado` date NOT NULL,
  `correo_encargado` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telefono_encargado` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `alumnos_faltas`
--

CREATE TABLE `alumnos_faltas` (
  `id_falta_alumno` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_falta` int(11) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `alumnos_grados`
--

CREATE TABLE `alumnos_grados` (
  `id_alumno_grado` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_grado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `asistencia`
--

CREATE TABLE `asistencia` (
  `id_asistencia` int(11) NOT NULL,
  `id_alumno_grado` int(11) NOT NULL,
  `fecha_asistencia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faltas`
--

CREATE TABLE `faltas` (
  `id_falta` int(11) NOT NULL,
  `id_tipo_falta` int(11) NOT NULL,
  `nombre_falta` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grados`
--

CREATE TABLE `grados` (
  `id_grado` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `nombre_grado` varchar(10) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `anio` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profesores`
--

CREATE TABLE `profesores` (
  `id_profesor` int(11) NOT NULL,
  `nombre_profesor` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nacimiento_profesor` date NOT NULL,
  `correo_profesor` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telefono_profesor` int(8) NOT NULL,
  `contrasena_profesor` varchar(75) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `token_profesor` varchar(15) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tipos_faltas`
--

CREATE TABLE `tipos_faltas` (
  `id_tipo_falta` int(11) NOT NULL,
  `nombre_tipo_falta` varchar(10) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Dumping data for table `tipos_faltas`
--

INSERT INTO `tipos_faltas` (`id_tipo_falta`, `nombre_tipo_falta`) VALUES
(1, 'Leve'),
(2, 'Media'),
(3, 'Grave');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id_alumno`);

--
-- Indexes for table `alumnos_faltas`
--
ALTER TABLE `alumnos_faltas`
  ADD PRIMARY KEY (`id_falta_alumno`),
  ADD KEY `id_falta` (`id_falta`),
  ADD KEY `id_alumno` (`id_alumno`);

--
-- Indexes for table `alumnos_grados`
--
ALTER TABLE `alumnos_grados`
  ADD PRIMARY KEY (`id_alumno_grado`),
  ADD KEY `id_alumno` (`id_alumno`),
  ADD KEY `id_grado` (`id_grado`);

--
-- Indexes for table `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`id_asistencia`),
  ADD KEY `id_alumno_grado` (`id_alumno_grado`);

--
-- Indexes for table `faltas`
--
ALTER TABLE `faltas`
  ADD PRIMARY KEY (`id_falta`),
  ADD KEY `id_tipo_falta` (`id_tipo_falta`);

--
-- Indexes for table `grados`
--
ALTER TABLE `grados`
  ADD PRIMARY KEY (`id_grado`),
  ADD UNIQUE KEY `nombre_grado` (`nombre_grado`),
  ADD KEY `id_profesor` (`id_profesor`);

--
-- Indexes for table `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`id_profesor`),
  ADD UNIQUE KEY `correo_profesor` (`correo_profesor`),
  ADD UNIQUE KEY `telefono_profesor` (`telefono_profesor`);

--
-- Indexes for table `tipos_faltas`
--
ALTER TABLE `tipos_faltas`
  ADD PRIMARY KEY (`id_tipo_falta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `alumnos_faltas`
--
ALTER TABLE `alumnos_faltas`
  MODIFY `id_falta_alumno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `alumnos_grados`
--
ALTER TABLE `alumnos_grados`
  MODIFY `id_alumno_grado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `id_asistencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faltas`
--
ALTER TABLE `faltas`
  MODIFY `id_falta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grados`
--
ALTER TABLE `grados`
  MODIFY `id_grado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id_profesor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipos_faltas`
--
ALTER TABLE `tipos_faltas`
  MODIFY `id_tipo_falta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumnos_faltas`
--
ALTER TABLE `alumnos_faltas`
  ADD CONSTRAINT `alumnos_faltas_ibfk_1` FOREIGN KEY (`id_falta`) REFERENCES `faltas` (`id_falta`),
  ADD CONSTRAINT `alumnos_faltas_ibfk_2` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`);

--
-- Constraints for table `alumnos_grados`
--
ALTER TABLE `alumnos_grados`
  ADD CONSTRAINT `alumnos_grados_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`),
  ADD CONSTRAINT `alumnos_grados_ibfk_2` FOREIGN KEY (`id_grado`) REFERENCES `grados` (`id_grado`);

--
-- Constraints for table `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `asistencia_ibfk_1` FOREIGN KEY (`id_alumno_grado`) REFERENCES `alumnos_grados` (`id_alumno_grado`);

--
-- Constraints for table `faltas`
--
ALTER TABLE `faltas`
  ADD CONSTRAINT `faltas_ibfk_1` FOREIGN KEY (`id_tipo_falta`) REFERENCES `tipos_faltas` (`id_tipo_falta`);

--
-- Constraints for table `grados`
--
ALTER TABLE `grados`
  ADD CONSTRAINT `grados_ibfk_1` FOREIGN KEY (`id_profesor`) REFERENCES `profesores` (`id_profesor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
