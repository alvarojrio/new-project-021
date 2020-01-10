/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : new_foliashop

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-01-10 09:40:36
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for eventos
-- ----------------------------
DROP TABLE IF EXISTS `eventos`;
CREATE TABLE `eventos` (
  `cod_evento` int(11) NOT NULL AUTO_INCREMENT,
  `cod_local` int(11) DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fim` time DEFAULT NULL,
  `nome_evento` varchar(300) DEFAULT '',
  PRIMARY KEY (`cod_evento`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eventos
-- ----------------------------
INSERT INTO `eventos` VALUES ('1', '1', null, null, null, null, '123');
INSERT INTO `eventos` VALUES ('2', null, null, null, null, null, null);
INSERT INTO `eventos` VALUES ('3', null, null, null, null, null, null);
INSERT INTO `eventos` VALUES ('4', null, null, null, null, null, null);
INSERT INTO `eventos` VALUES ('5', null, null, null, null, null, null);
INSERT INTO `eventos` VALUES ('6', null, null, null, null, null, null);
INSERT INTO `eventos` VALUES ('7', null, null, null, null, null, null);
INSERT INTO `eventos` VALUES ('8', null, null, null, null, null, null);
INSERT INTO `eventos` VALUES ('9', null, null, null, null, null, null);
INSERT INTO `eventos` VALUES ('10', null, null, null, null, null, null);

-- ----------------------------
-- Table structure for eventos_detalhes
-- ----------------------------
DROP TABLE IF EXISTS `eventos_detalhes`;
CREATE TABLE `eventos_detalhes` (
  `cod_detalhe` int(11) NOT NULL AUTO_INCREMENT,
  `cod_evento` int(11) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cod_detalhe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eventos_detalhes
-- ----------------------------

-- ----------------------------
-- Table structure for eventos_ingressos
-- ----------------------------
DROP TABLE IF EXISTS `eventos_ingressos`;
CREATE TABLE `eventos_ingressos` (
  `cod_ingresso` int(11) NOT NULL AUTO_INCREMENT,
  `cod_evento` int(11) DEFAULT NULL,
  `tipo_ingresso` enum('doacao','gratuito','pago') DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  `regra_inicio` enum('vendas','data') DEFAULT 'data',
  `data_inicio` date DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  `status` int(11) DEFAULT 1 COMMENT '0 = desativado, 1 = ativado',
  `hora_fim` time DEFAULT NULL,
  PRIMARY KEY (`cod_ingresso`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eventos_ingressos
-- ----------------------------
INSERT INTO `eventos_ingressos` VALUES ('5', '7', 'pago', 'teste', '5', '52.00', 'data', '2020-01-06', '13:54:39', '2020-01-06', '1', '09:53:29');
