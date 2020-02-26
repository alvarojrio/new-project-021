/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : new_foliashop

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-02-26 19:01:46
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `carrinho`
-- ----------------------------
DROP TABLE IF EXISTS `carrinho`;
CREATE TABLE `carrinho` (
  `cod_carrinho` int(11) NOT NULL AUTO_INCREMENT,
  `cod_produto` int(11) DEFAULT NULL,
  `cod_evento` int(11) DEFAULT NULL,
  `valor` decimal(15,2) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cod_carrinho`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of carrinho
-- ----------------------------
INSERT INTO `carrinho` VALUES ('3', '5', '12', '120.00', '2', '8a02562cf175e3b2d13acf8caa2e2fd0', '2020-02-26 17:25:37', '2020-02-26 17:25:37');
INSERT INTO `carrinho` VALUES ('4', '5', '12', '120.00', '1', 'f813af62e61ae8e1f3517424adb4273b', '2020-02-26 17:27:44', '2020-02-26 17:27:44');
INSERT INTO `carrinho` VALUES ('5', '5', '12', '120.00', '5', '74a0aaac6c1c27744e5fa9d19c5362de', '2020-02-26 17:38:46', '2020-02-26 17:38:46');

-- ----------------------------
-- Table structure for `eventos`
-- ----------------------------
DROP TABLE IF EXISTS `eventos`;
CREATE TABLE `eventos` (
  `cod_evento` int(11) NOT NULL AUTO_INCREMENT,
  `cod_local` int(11) DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fim` time DEFAULT NULL,
  `nome_evento` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `venda_grupo` int(11) DEFAULT '0' COMMENT '1=sim, 0=não',
  `tipo_grupo` int(11) DEFAULT '0' COMMENT '0=nenhum, 1=grupo',
  PRIMARY KEY (`cod_evento`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of eventos
-- ----------------------------
INSERT INTO `eventos` VALUES ('12', '1', '2020-01-02', '2020-02-03', '10:00:00', '23:00:00', 'VILLA MIX BH 2019', '2020-02-25 21:36:53', '2020-02-25 21:36:53', '1', '0', '0');
INSERT INTO `eventos` VALUES ('13', '1', '2020-10-10', '2020-10-10', '10:00:00', '10:00:00', 'alvaro', null, null, '0', '0', '0');

-- ----------------------------
-- Table structure for `eventos_detalhes`
-- ----------------------------
DROP TABLE IF EXISTS `eventos_detalhes`;
CREATE TABLE `eventos_detalhes` (
  `cod_detalhe` int(11) NOT NULL AUTO_INCREMENT,
  `cod_evento` int(11) DEFAULT NULL,
  `imagem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descricao` mediumtext COLLATE utf8mb4_unicode_ci,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cod_detalhe`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of eventos_detalhes
-- ----------------------------
INSERT INTO `eventos_detalhes` VALUES ('9', '12', 'imagens/LXNGIpyxspfyntmzy7fsy0mqpknzwcH3TT5VMl6O.jpeg', '<p><strong>Excurs&atilde;o Villa Mix Belo Horizonte saindo do Rio de Janeiro, pacote completo com ingressos, hot&eacute;is e transporte! Sobre este evento </strong></p>\n\n<p>--- EM BREVE VALORES -----</p>\n\n<p>Villa Mix Belo Horizonte 2019 Nosso pacote para o Villa Mix Belo Horizonte 2019 n&atilde;o poderia ser diferente dos outros anos n&eacute; ? Pool Party CONFIRMADA COM OPEN BAR ! Com o sucesso da nossa Pool Party em 2018, Trazemos NOVIDADES.</p>\n\n<p>...::::: ATRA&Ccedil;&Otilde;ES :::::...</p>\n\n<p>DJ Betinho (Residente) Fabiano e Bonatto (Sertanejo) A All Time Party/Folia Rio que juntas levaram mais de 700 pessoas para o Villa Mix BH do ano passado, se juntaram para fazer o inexplic&aacute;vel para seus clientes, se liga:</p>\n\n<p>&nbsp;</p>\n\n<p>? DATA: 30/03/2018</p>\n\n<p>? Sa&iacute;das: S&atilde;o Gon&ccedil;alo, Niter&oacute;i, Rio de Janeiro. ? &Ocirc;nibus Executivo Super luxo. ✈ Pacote a&eacute;reo, saindo do Rio de Janeiro valor sob-consulta. ? Hotel com piscina e Su&iacute;tes duplas completas com caf&eacute; da manh&atilde;.</p>\n\n<p>? Pool Party OPEN BAR ?</p>\n\n<p>? Atra&ccedil;&otilde;es na Pool Party: A dupla consagrada Fabiano &amp; Bonatto. ? Cobertura Fotogr&aacute;fica com Drone e fot&oacute;grafos profissionais, ? Valores Rodovi&aacute;rio + Hotel da Pool Party Esuites R$ 399,00 via dep&oacute;sito banc&aacute;rio ou 10x de R$43,90 no cart&atilde;o de cr&eacute;dito.</p>\n\n<p>? INGRESSOS EM BREVE</p>\n\n<p>☑ Maiores informa&ccedil;&otilde;es: ? (21) 98310-2430 - ?(21) 97579-0635 ? Av. Rio Branco, 181 sala 2009 Hor&aacute;rio: 10h as 19h - Segunda a Sexta.</p>', 'VILLA MIX BH 2019', '2020-02-25 01:11:22', '2020-02-24 22:11:22');

-- ----------------------------
-- Table structure for `eventos_ingressos`
-- ----------------------------
DROP TABLE IF EXISTS `eventos_ingressos`;
CREATE TABLE `eventos_ingressos` (
  `cod_ingresso` int(11) NOT NULL AUTO_INCREMENT,
  `cod_evento` int(11) DEFAULT NULL,
  `tipo_ingresso` enum('doacao','gratuito','pago') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `regra_inicio` enum('vendas','data') COLLATE utf8mb4_unicode_ci DEFAULT 'data',
  `data_inicio` date DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  `status` int(11) DEFAULT '1' COMMENT '0 = desativado, 1 = ativado',
  `hora_fim` time DEFAULT NULL,
  `preco` decimal(15,2) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cod_ingresso`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of eventos_ingressos
-- ----------------------------
INSERT INTO `eventos_ingressos` VALUES ('4', '12', 'doacao', 'PACOTE E-SUITES (DUPLO)\r\nR$399,00 + R$39,86 taxa', '56', 'data', '1992-10-10', '10:00:00', '2020-10-10', '1', '23:00:00', '120.00', '2020-02-26 18:12:38', '2020-02-26 18:12:38');
INSERT INTO `eventos_ingressos` VALUES ('5', '12', 'doacao', 'PACOTE E-SUITES (DUPLO)\r\nR$399,00 + R$39,86 taxa', '90', 'data', '1992-10-10', '10:00:00', '2020-10-10', '1', '23:00:00', '120.00', null, null);
INSERT INTO `eventos_ingressos` VALUES ('6', '12', 'doacao', 'PUTARIA GENERALIZADA (DUPLO)', '56', 'data', '1992-10-10', '10:00:00', '2020-10-10', '1', '23:00:00', '120.00', '2020-02-26 18:40:25', '2020-02-26 18:40:25');
INSERT INTO `eventos_ingressos` VALUES ('7', '12', 'doacao', 'PUTARIA GENERALIZADA', '56', 'data', '1992-10-10', '10:00:00', '2020-10-10', '1', '23:00:00', '120.00', '2020-02-26 18:40:21', '2020-02-26 18:40:21');
