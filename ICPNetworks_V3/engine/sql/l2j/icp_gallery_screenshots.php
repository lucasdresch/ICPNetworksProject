<?php
$createTable[9] = "CREATE TABLE `icp_gallery_screenshots` (`id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT, `legend` varchar(40) NOT NULL DEFAULT 'No legend', `author` varchar(40) NOT NULL DEFAULT 'No author', `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, `screenshot` varchar(250) NOT NULL DEFAULT 'Sem foto', `status` int(11) NOT NULL DEFAULT '0', `account` varchar(40) NOT NULL DEFAULT 'No account', PRIMARY KEY (`id`)) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
$tableName[9] = "icp_gallery_screenshots";
$columnsValue[9] = array();