CREATE TABLE `users` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
   INSERT INTO `users` (`id`, `username`, `password`) VALUES
   (1, 'Neel', '2398'), (1, 'jay', '9876')
