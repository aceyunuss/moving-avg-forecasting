/*
 Navicat Premium Data Transfer

 Source Server         : local mysql
 Source Server Type    : MySQL
 Source Server Version : 100418
 Source Host           : 127.0.0.1:3306
 Source Schema         : movag-db

 Target Server Type    : MySQL
 Target Server Version : 100418
 File Encoding         : 65001

 Date: 10/06/2022 18:50:23
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for uom
-- ----------------------------
DROP TABLE IF EXISTS `uom`;
CREATE TABLE `uom`  (
  `uom_id` int NOT NULL AUTO_INCREMENT,
  `uom_val` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`uom_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of uom
-- ----------------------------
INSERT INTO `uom` VALUES (1, '1/2 inc');
INSERT INTO `uom` VALUES (2, '3/4 inc');
INSERT INTO `uom` VALUES (3, '1 inc');
INSERT INTO `uom` VALUES (4, '1 1/4 inc');
INSERT INTO `uom` VALUES (5, '1 1/2 inc');
INSERT INTO `uom` VALUES (6, '2 inc');
INSERT INTO `uom` VALUES (7, '2 1/2 inc');
INSERT INTO `uom` VALUES (8, '3 inc');
INSERT INTO `uom` VALUES (9, '4 inc');
INSERT INTO `uom` VALUES (10, '5 inc');
INSERT INTO `uom` VALUES (11, '6 inc');

SET FOREIGN_KEY_CHECKS = 1;
