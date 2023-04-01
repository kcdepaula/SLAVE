DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users` (
  `user_id` int(8) unsigned NOT NULL auto_increment, 
  `user_lastname` varchar(180) NOT NULL default '',
  `user_firstname` varchar(180) NOT NULL default '',
  `user_email` varchar(180) NOT NULL default '',
  `user_phone` varchar(20) NOT NULL default'',
  `user_address` varchar(50) NOT NULL default'',
  `user_password` varchar(180) NOT NULL default '',
  `user_date_added` date NOT NULL default '0000-00-00',
  `user_time_added` time NOT NULL default '00:00:00',	
  `user_date_updated` date NOT NULL default '0000-00-00',
  `user_time_updated` time NOT NULL default '00:00:00',
  `user_status` int(1) NOT NULL default '0',
  `user_token` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10000001;

DROP TABLE IF EXISTS `tbl_order`;
CREATE TABLE `tbl_order` (
  `order_id` int(8) unsigned NOT NULL auto_increment,
  `customer_name` varchar(50) NOT NULL default '', 
  `user_id` int(8) NOT NULL default'0',
  `quantity` int (8) NOT NULL default '0',
  `product_name` varchar (50) NOT NULL default '',
  `delivery_id` int (8) NOT NULL default '0',
  `product_id` int(8) NOT NULL default'0',
  PRIMARY KEY  (`order_id`),
  KEY (`user_id`),
  KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10000001;

DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE `tbl_product` (
  `product_id` int(8) unsigned NOT NULL auto_increment, 
  `product_name` VARCHAR (30) NOT NULL DEFAULT '',
  `product_description` VARCHAR (500) NOT NULL DEFAULT '',
  `product_type` VARCHAR(10) NOT NULL default '',
  `product_price` VARCHAR (30) NOT NULL DEFAULT '',
  `product_size` VARCHAR (30) NOT NULL DEFAULT '',
  PRIMARY KEY  (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10000001;
