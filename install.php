<?php
$mdr = "CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `string` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;
INSERT INTO `orders` (`id`, `string`) VALUES
(2, 'a:5:{s:5:\"Fanta\";a:3:{s:8:\"quantity\";i:3;s:2:\"id\";s:1:\"3\";s:4:\"name\";s:5:\"Fanta\";}s:12:\"Jus d''orange\";a:3:{s:8:\"quantity\";i:2;s:2:\"id\";s:2:\"12\";s:4:\"name\";s:12:\"Jus d''orange\";}s:12:\"Jus de pomme\";a:3:{s:8:\"quantity\";i:6;s:2:\"id\";s:2:\"13\";s:4:\"name\";s:12:\"Jus de pomme\";}s:5:\"Vodka\";a:3:{s:8:\"quantity\";i:1;s:2:\"id\";s:1:\"6\";s:4:\"name\";s:5:\"Vodka\";}s:12:\"Jack daniels\";a:3:{s:8:\"quantity\";i:2;s:2:\"id\";s:1:\"7\";s:4:\"name\";s:12:\"Jack daniels\";}}'),
(13, 'a:1:{s:4:\"Coca\";a:4:{s:8:\"quantity\";i:1;s:2:\"id\";s:1:\"1\";s:5:\"price\";N;s:4:\"name\";s:4:\"Coca\";}}'),
(14, 'a:1:{s:4:\"Coca\";a:4:{s:8:\"quantity\";i:1;s:2:\"id\";s:1:\"1\";s:5:\"price\";N;s:4:\"name\";s:4:\"Coca\";}}'),
(15, 'a:1:{s:4:\"Coca\";a:4:{s:8:\"quantity\";i:1;s:2:\"id\";s:1:\"1\";s:5:\"price\";N;s:4:\"name\";s:4:\"Coca\";}}'),
(16, 's:0:\"\";'),
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` text,
  `infos` varchar(1024) DEFAULT NULL,
  `price` int(10) DEFAULT NULL,
  `jus` tinyint(1) DEFAULT NULL,
  `soda` tinyint(1) DEFAULT NULL,
  `photo` text,
  `alcool` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;
INSERT INTO `products` (`id`, `name`, `infos`, `price`, `jus`, `soda`, `photo`, `alcool`) VALUES
(3, 'Fanta', 'osef', 2, 1, 1, 'ressources/fanta.png', 0),
(4, 'Ice tea', NULL, 2, 1, 0, 'ressources/icetea.png', 0),
(5, 'Fanta lemon', NULL, 0, 1, 1, 'ressources/fantalemon.png', 0),
(6, 'Vodka', NULL, 5, 0, 0, 'ressources/vodka.png', 1),
(7, 'Jack Daniels', NULL, 7, 0, 0, 'ressources/jack.png', 1),
(9, 'Heineken', NULL, 3, 0, 0, 'ressources/heineken.png', 1),
(10, 'Coca zero', NULL, 0, 0, 1, 'ressources/cocazero.png', 0),
(11, 'Oasis', NULL, 2, 1, 1, 'ressources/oasis.png', 0),
(12, 'Jus d''orange', NULL, 0, 1, 0, 'ressources/orange.png', 0),
(28, 'Jus de pomme', NULL, 2, 1, 0, 'ressources/pomme.png', 0),
(29, 'Desperados', NULL, 6, 0, 0, 'ressources/desperados.png', 1),
(30, 'Coca cola', NULL, 2, 0, 1, 'ressources/coca.png', 0);
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `login` text NOT NULL,
  `password` varchar(150) NOT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;
INSERT INTO `users` (`id`, `login`, `password`, `admin`) VALUES
(4, 'coucou', '1411077a0c1d53da29065d332c1fe59ac653dac2ee2b38a8d07fc54aa3f5f285b875071c39f06b369994d2b9b80891eb022294d6555c9d58b58f9c4fb7a776b4', NULL),
(9, 'maxime', 'f91c98162afdec4e45cc93d62ccc8560c931f55f2ce9ba609f077fc679b6c5d58988f0229b9644cfd0ff25f9362a4c15cda5996a5f7b1d87028c8fad00904bfc', 1);"
// $query_create_sql = \"CREATE TABLE `products` (  `id` int(10) NOT NULL,  `name` text,  `infos` varchar(1024) DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;INSERT INTO `products` (`id`, `name`, `infos`) VALUES(1, 'Coca', 'Fat but tasty'),(2, 'Coca zero', 'Light but not good');CREATE TABLE `test` (  `test` int(11) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;ALTER TABLE `products`  ADD PRIMARY KEY (`id`);ALTER TABLE `products`  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;\";

?>