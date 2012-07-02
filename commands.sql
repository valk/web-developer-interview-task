/* 'message' be deleted first, because of the cascading constraints*/
DROP TABLE IF EXISTS `message`;   

DROP TABLE IF EXISTS `customer`;

DROP TABLE IF EXISTS `recipient`;


CREATE TABLE `customer` (
  `customer_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`customer_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `recipient` (
  `recipient_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`recipient_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `message` (
  `customer_id` int(10) unsigned NOT NULL DEFAULT '0',
  `recipient_id` int(10) unsigned NOT NULL DEFAULT '0',
  `message` text NOT NULL,
  `received` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  INDEX recipient_idx (recipient_id),
    FOREIGN KEY (customer_id) REFERENCES customer(customer_id) ON DELETE CASCADE,
  INDEX customer_idx (customer_id),
    FOREIGN KEY (recipient_id) REFERENCES recipient(recipient_id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;







