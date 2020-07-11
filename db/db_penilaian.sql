/*
 Navicat Premium Data Transfer

 Source Server         : Local
 Source Server Type    : MySQL
 Source Server Version : 100408
 Source Host           : localhost:3306
 Source Schema         : db_penilaian

 Target Server Type    : MySQL
 Target Server Version : 100408
 File Encoding         : 65001

 Date: 11/07/2020 18:45:07
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tm_mata_pelajaran
-- ----------------------------
DROP TABLE IF EXISTS `tm_mata_pelajaran`;
CREATE TABLE `tm_mata_pelajaran`  (
  `id_mata_pelajaran` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(254) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_mata_pelajaran`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tm_mata_pelajaran
-- ----------------------------
INSERT INTO `tm_mata_pelajaran` VALUES (6, 'Tembak Dekat');
INSERT INTO `tm_mata_pelajaran` VALUES (7, 'Tembak Jauh');

-- ----------------------------
-- Table structure for tm_pengguna
-- ----------------------------
DROP TABLE IF EXISTS `tm_pengguna`;
CREATE TABLE `tm_pengguna`  (
  `id_pengguna` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(254) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(254) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` varchar(254) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `telp` varchar(254) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(254) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_pengguna`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tm_pengguna
-- ----------------------------
INSERT INTO `tm_pengguna` VALUES (1, 'Admin', 'admin@gmail.com', 'Admin', '0987654321', 'f45731e3d39a1b2330bbf93e9b3de59e');
INSERT INTO `tm_pengguna` VALUES (6, 'Subagyo', 'hardi.subagyo@gmail.com', 'Bogor barat ', '123123123', '7488e331b8b64e5794da3fa4eb10ad5d');

-- ----------------------------
-- Table structure for tm_siswa
-- ----------------------------
DROP TABLE IF EXISTS `tm_siswa`;
CREATE TABLE `tm_siswa`  (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(254) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nomor` varchar(254) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nrp` varchar(254) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `asal_satuan` varchar(254) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nsl_panjang` varchar(254) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nsl_pendek` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kelas` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_siswa`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tm_siswa
-- ----------------------------
INSERT INTO `tm_siswa` VALUES (5, 'Abi', '001', '539173', 'Kopassus', '001', '001', 'A');
INSERT INTO `tm_siswa` VALUES (6, 'Bambang', '002', '516502', 'Non Kopassus', '002', '002', 'A');
INSERT INTO `tm_siswa` VALUES (7, 'Imran', '003', '531930', 'Kopassus', '003', '003', 'A');
INSERT INTO `tm_siswa` VALUES (8, 'Sugeng', '004', '530401', 'Non Kopassus', '004', '004', 'A');
INSERT INTO `tm_siswa` VALUES (9, 'Widodo', '005', '530402', 'Non Kopassus', '005', '005', 'B');
INSERT INTO `tm_siswa` VALUES (10, 'Cipto', '006', '530403', 'Kopassus', '006', '006', 'B');

-- ----------------------------
-- Table structure for tm_slide
-- ----------------------------
DROP TABLE IF EXISTS `tm_slide`;
CREATE TABLE `tm_slide`  (
  `id_slide` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(254) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_slide`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tm_slide
-- ----------------------------
INSERT INTO `tm_slide` VALUES (8, '200705082211-OP.jpg');
INSERT INTO `tm_slide` VALUES (9, '200705082216-OP1.jpg');

-- ----------------------------
-- Table structure for tr_nilai
-- ----------------------------
DROP TABLE IF EXISTS `tr_nilai`;
CREATE TABLE `tr_nilai`  (
  `id_nilai` int(32) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(32) NULL DEFAULT NULL,
  `id_mata_pelajaran` int(32) NULL DEFAULT NULL,
  `nilai` int(32) NULL DEFAULT NULL,
  `tanggal` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_nilai`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tr_nilai
-- ----------------------------
INSERT INTO `tr_nilai` VALUES (1, 9, 6, 10, '2020-07-10');
INSERT INTO `tr_nilai` VALUES (2, 9, 7, 20, '2020-07-10');
INSERT INTO `tr_nilai` VALUES (3, 10, 6, 30, '2020-07-10');
INSERT INTO `tr_nilai` VALUES (4, 10, 7, 40, '2020-07-10');
INSERT INTO `tr_nilai` VALUES (5, 5, 6, 1, '2020-07-30');
INSERT INTO `tr_nilai` VALUES (6, 5, 7, 2, '2020-07-30');
INSERT INTO `tr_nilai` VALUES (7, 6, 6, 3, '2020-07-30');
INSERT INTO `tr_nilai` VALUES (8, 6, 7, 4, '2020-07-30');
INSERT INTO `tr_nilai` VALUES (9, 7, 6, 5, '2020-07-30');
INSERT INTO `tr_nilai` VALUES (10, 7, 7, 6, '2020-07-30');
INSERT INTO `tr_nilai` VALUES (11, 8, 6, 7, '2020-07-30');
INSERT INTO `tr_nilai` VALUES (12, 8, 7, 8, '2020-07-30');
INSERT INTO `tr_nilai` VALUES (13, 9, 6, 90, '2020-08-06');
INSERT INTO `tr_nilai` VALUES (14, 9, 7, 90, '2020-08-06');
INSERT INTO `tr_nilai` VALUES (15, 10, 6, 80, '2020-08-06');
INSERT INTO `tr_nilai` VALUES (16, 10, 7, 80, '2020-08-06');

-- ----------------------------
-- Table structure for tr_pemasukan
-- ----------------------------
DROP TABLE IF EXISTS `tr_pemasukan`;
CREATE TABLE `tr_pemasukan`  (
  `id_pemasukan` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NULL DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nominal` int(20) NULL DEFAULT NULL,
  PRIMARY KEY (`id_pemasukan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tr_pemasukan
-- ----------------------------
INSERT INTO `tr_pemasukan` VALUES (10, '2020-07-04', 'dari bank', 9000000);
INSERT INTO `tr_pemasukan` VALUES (11, '2020-07-16', 'asd', 12000000);

-- ----------------------------
-- Table structure for tr_pengeluaran
-- ----------------------------
DROP TABLE IF EXISTS `tr_pengeluaran`;
CREATE TABLE `tr_pengeluaran`  (
  `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NULL DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nominal` int(20) NULL DEFAULT NULL,
  `struk` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_pengeluaran`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tr_pengeluaran
-- ----------------------------
INSERT INTO `tr_pengeluaran` VALUES (9, '2020-07-29', 'terbaik', 1000000, '200705074333-OP.jpg');
INSERT INTO `tr_pengeluaran` VALUES (12, '2020-07-09', 'asdas', 9000000, NULL);

SET FOREIGN_KEY_CHECKS = 1;
