create database svshop;
use svshop;

DROP TABLE IF EXISTS `camisa`;
CREATE TABLE `camisa` (
  `idCamisa` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `descricao` VARCHAR(100) NOT NULL,
  `tamanho` CHAR(1) NOT NULL,
  `sexo` CHAR(1) NOT NULL,
  `preco` DECIMAL(10, 2) NOT NULL,
  `quantidade` INT NOT NULL CHECK (`quantidade` >= 0),
  `foto_frente` VARCHAR(255) DEFAULT NULL,
  `foto_verso` VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (`idCamisa`)
) ENGINE=InnoDB;

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `idCliente` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `senha` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB;

DROP TABLE IF EXISTS `compras`;
CREATE TABLE `compras` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome_cliente` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `endereco` VARCHAR(255) NOT NULL,
  `cep` VARCHAR(20) NOT NULL,
  `valor_total` DECIMAL(10, 2) NOT NULL,
  `data_compra` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

DROP TABLE IF EXISTS `detalhes_compra`;
CREATE TABLE `detalhes_compra` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `compra_id` INT NOT NULL,
  `produto_id` INT NOT NULL,
  `quantidade` INT NOT NULL,
  `preco` DECIMAL(10, 2) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`compra_id`) REFERENCES `compras`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`produto_id`) REFERENCES `camisa`(`idCamisa`) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE INDEX idx_idCamisa ON camisa(idCamisa);
CREATE INDEX idx_compra_id ON detalhes_compra(compra_id);
CREATE INDEX idx_produto_id ON detalhes_compra(produto_id);