CREATE DATABASE `notebook` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE `notebook`.`note` (
`id` bigint( 20 ) unsigned NOT NULL AUTO_INCREMENT ,
`name` varchar( 100 ) DEFAULT NULL ,
`email` varchar( 100 ) DEFAULT NULL ,
`content` varchar( 5000 ) DEFAULT NULL ,
`timedate` int( 11 ) DEFAULT NULL ,
PRIMARY KEY ( `id` ) ,
UNIQUE KEY `id` ( `id` )
) ENGINE = InnoDB DEFAULT CHARSET = utf8 AUTO_INCREMENT =11;
