# PHP-Examples

Steps Needed to start websites:


1) Add database name, username, password, host:
DEFINE ('DB_USER', '');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', '');
DEFINE ('DB_NAME', '');

2) Add table to database [see below]

Table structure for table `users` FOR COBALT WEBSITE:

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `email` varchar(1024) NOT NULL,
  `email_code` varchar(32) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;
