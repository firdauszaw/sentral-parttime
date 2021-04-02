CREATE TABLE `user` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `res_address` varchar(250) NOT NULL,
  `res_contact` varchar(250) NOT NULL,
  `mob_contact` varchar(250) NOT NULL,
  `dob` varchar(250) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `token` varchar(250) NOT NULL,
  `profilepicture` varchar(250) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;

  CREATE TABLE `temp_user` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `res_address` varchar(250) NOT NULL,
  `res_contact` varchar(250) NOT NULL,
  `mob_contact` varchar(250) NOT NULL,
  `dob` varchar(250) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `token` varchar(250) NOT NULL,
  `profilepicture` varchar(250) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;

