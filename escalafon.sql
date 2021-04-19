SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `tipo_identificacion` enum('DNI','CARNET_DE_EXTRANJERIA') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'DNI',
  `identificacion` int UNSIGNED NULL DEFAULT NULL,
  `nombres` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `apellidoPaterno` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `apellidoMaterno` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `usuario_identificacion_unique`(`identificacion`) USING BTREE,
  UNIQUE INDEX `usuario_id_unique`(`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of usuario
-- ----------------------------
-- password admin
INSERT INTO `usuario` VALUES (1, 'DNI', 12345678, 'JHON', 'DOE', 'DAS', 'JHON@GMAIL.COM', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918');

SET FOREIGN_KEY_CHECKS = 1;
