<?php
$createTable[20] = "CREATE TABLE `icp_shop_items_auction` (`id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT, `bidId` int(11) NOT NULL, `account` varchar(255) NOT NULL, `value` int(11) NOT NULL DEFAULT '0', `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, PRIMARY KEY (`id`)) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
$tableName[20] = "icp_shop_items_auction";
$columnsValue[20] = array();