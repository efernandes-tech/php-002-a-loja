SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
CREATE DATABASE IF NOT EXISTS `php-002-a-loja` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `php-002-a-loja`;

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

INSERT INTO `categorias` (`id`, `nome`) VALUES
(6, 'Games'),
(7, 'Livros'),
(8, 'Celulares');

CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `descricao` text,
  `categoria_id` int(11) DEFAULT NULL,
  `usado` tinyint(1) DEFAULT '0',
  `isbn` varchar(255) DEFAULT NULL,
  `tipoProduto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

INSERT INTO `produtos` (`id`, `nome`, `preco`, `descricao`, `categoria_id`, `usado`, `isbn`, `tipoProduto`) VALUES
(28, 'Livro de CodeIgniter 3', '39.00', 'Livro da casa do cÃ³digo', 7, 0, NULL, NULL),
(35, 'iPhone 4s', '999.00', 'Usado', 8, 1, NULL, NULL),
(39, 'teste', '1.00', '', 6, 0, NULL, NULL);

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

/*Senha:12345*/
INSERT INTO `usuarios` (`id`, `email`, `senha`) VALUES
(NULL, 'teste@teste.com', '827ccb0eea8a706c4c34a16891f84e7b');
SET FOREIGN_KEY_CHECKS=1;