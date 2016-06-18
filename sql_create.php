<?php

$query_create_sql = "CREATE TABLE `products` (  `id` int(10) NOT NULL,  `name` text,  `infos` varchar(1024) DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;INSERT INTO `products` (`id`, `name`, `infos`) VALUES(1, 'Coca', 'Fat but tasty'),(2, 'Coca zero', 'Light but not good');CREATE TABLE `test` (  `test` int(11) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;ALTER TABLE `products`  ADD PRIMARY KEY (`id`);ALTER TABLE `products`  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;";


?>